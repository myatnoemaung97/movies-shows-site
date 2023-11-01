<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Person;
use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class AdminMovieController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $movies = Movie::query();

            return DataTables::of($movies)
                ->editColumn('created_at', function ($e) {
                    return Carbon::parse($e->created_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('updated_at', function ($e) {
                    return Carbon::parse($e->updated_at)->format("Y-m-d H:i:s");
                })
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/movies/$a->slug' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('movies.edit', $a->slug) . '" class="btn btn-sm btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deleteMovieButton btn btn-sm btn-danger" data-id="' . $a->slug . '">Delete</a>';

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

        DB::transaction(function () use ($request, $attributes) {
            $image = $request->file('poster');

            $attributes['poster'] = ImageService::store($image);
            $attributes['thumbnail'] = ImageService::makeThumbnail($image, [180, 270]);

            $attributes['slug'] = Str::slug($attributes['title']) . '-' . date('Y', strtotime($attributes['release_date']));

            $movie = Movie::create($attributes);

            MediaGenreController::store($movie, $attributes['genres']);

            MediaCrewController::store($movie->id, 'App\Models\Movie', [
                'director' => $attributes['directors'],
                'actor' => $attributes['cast']
            ]);
        });

        return redirect(route('movies.index'))->with('create', 'Movie');
    }

    public function show(Movie $movie) {
        return view('admin.movies.show', [
            'movie' => $movie
        ]);
    }

    public function edit(Movie $movie) {
        return view('admin.movies.edit', [
            'movie' => $movie,
            'people' => Person::all(),
            'genres' => Genre::all()
        ]);
    }

    public function update(Request $request, Movie $movie) {
        $attributes = $this->validateMovie($request);

        DB::transaction(function () use ($request, $attributes, $movie) {
            $image = $request->file('poster');

            if ($image) {
                $attributes['poster'] = ImageService::store($image);
                $attributes['thumbnail'] = ImageService::makeThumbnail($image, [185, 300]);

                ImageService::delete($movie->poster);
                ImageService::delete($movie->thumbnail);
            }

            $attributes['slug'] = Str::slug($attributes['title']) . '-' . date('Y', strtotime($attributes['release_date']));

            $movie->update($attributes);

            MediaGenreController::store($movie, $attributes['genres']);

            MediaCrewController::update($movie->id, 'App\Models\Movie', [
                'director' => $attributes['directors'],
                'actor' => $attributes['cast']
            ]);
        });

        return redirect("/admin/movies/$movie->slug")->with('update', 'Movie');
    }

    public function destroy(Movie $movie) {
        ImageService::delete($movie->poster);
        ImageService::delete($movie->thumbnail);

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
