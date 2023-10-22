<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class MovieController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $movies = Movie::query();

            return DataTables::of($movies)
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/movies/$a->slug' class='btn btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('movies.edit', $a->slug) . '" class="btn btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deleteMovieButton btn btn-danger" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.movies.index');
    }

    public function create() {
        return view('admin.movies.create', [
            'people' => Person::all(),
            'genres' => Genre::all()
        ]);
    }

    public function store(Request $request) {
        $attributes = $this->validateMovie($request);

        $attributes['poster'] = '/storage/' . $request->file('poster')->store();

        $attributes['slug'] = Str::slug($attributes['title']) . '-' . date('Y', strtotime($attributes['release_date']));

        $movie = Movie::create($attributes);

        MediaGenreController::store($movie, $attributes['genres']);

        MediaCrewController::store($movie->id, 'App\Models\Movie', [
            'director' => $attributes['directors'],
            'actor' => $attributes['cast']
        ]);

        return redirect(route('movies.index'))->with('create', 'Movie');
    }

    public function show($slug) {
        return view('admin.movies.show', [
            'movie' => Movie::firstWhere('slug', $slug)
        ]);
    }

    public function edit($slug) {
        return view('admin.movies.edit', [
            'movie' => Movie::firstWhere('slug', $slug),
            'people' => Person::all(),
            'genres' => Genre::all()
        ]);
    }

    public function update(Request $request, $id) {
        $attributes = $this->validateMovie($request);

        $movie = Movie::findOrFail($id);

        $oldPosterPath = public_path($movie->poster);

        if ($request->file('poster')) {
            $attributes['poster'] = '/storage/' . $request->file('poster')->store();

            if (file_exists($oldPosterPath) && basename($oldPosterPath) !== 'image-placeholder.jpg') {
                unlink($oldPosterPath);
            }
        }

        $attributes['slug'] = Str::slug($attributes['title']) . '-' . date('Y', strtotime($attributes['release_date']));

        $movie->update($attributes);

        MediaGenreController::store($movie, $attributes['genres']);

        MediaCrewController::update($movie->id, 'App\Models\Movie', [
            'director' => $attributes['directors'],
            'actor' => $attributes['cast']
        ]);

        return redirect("/admin/movies/$movie->slug")->with('update', 'Movie');
    }

    public function destroy($id) {
        $movie = Movie::findOrFail($id);

        $path = public_path($movie->poster);
        if (file_exists($path) && basename($path) !== 'image-placeholder.jpg') {
            unlink($path);
        }

        $movie->delete();

        MediaGenreController::destroy($movie->id, 'App\Models\Movie');

        MediaCrewController::destroy($movie->id, 'App\Models\Movie');

        return 'success';
    }


    private function validateMovie(Request $request) {
        $rules = [
            'title' => 'required',
            'age_rating' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'run_time' => 'required',
            'directors' => 'required',
            'genres' => 'required',
            'cast' => 'required',
            'trailer' => 'required',
            'poster.*' => 'mimes:jpg,jpeg,png,bmp,svg',
        ];

        if ($request->isMethod('patch')) {
            unset($rules['poster']);
        } else {
            $rules['poster'] = 'required|image';
        }

        return $request->validate($rules);
    }
}
