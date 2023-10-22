<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Person;
use App\Models\Season;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ShowController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $shows = Show::query();

            return DataTables::of($shows)
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/shows/$a->slug' class='btn btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('shows.edit', $a->id) . '" class="btn btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deleteShowButton btn btn-danger" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.shows.index');
    }

    public function show($slug) {
        $show = Show::firstWhere('slug', $slug);

        return view('admin.shows.show', [
            'show' => $show,
            'seasons' => $show->seasons()->orderBy('season_number')->get()
        ]);
    }

    public function create() {
        return view('admin.shows.create', [
            'people' => Person::all(),
            'genres' => Genre::all()
        ]);
    }

    public function store(Request $request) {
        $attributes = $this->validateShow($request);

        $posterPath = '/storage/' . $request->file('poster')->store();
        $attributes['poster'] = $posterPath;

        $attributes['slug'] = Str::slug($attributes['title']) . '-' . date('Y', strtotime($attributes['release_date']));

        $show = Show::create($attributes);

        MediaGenreController::store($show, $attributes['genres']);

        MediaCrewController::store($show->id, 'App\Models\Show', [
            'creator' => $attributes['creators'],
            'actor' => $attributes['cast']
        ]);

        $sourcePath = public_path($posterPath);
        $seasonPoster = '/storage/' . 's01' . basename($posterPath);
        $destinationPath = public_path($seasonPoster);

        File::copy($sourcePath, $destinationPath);

        Season::create([
            'show_id' => $show->id,
            'season_number' => 1,
            'poster' => $seasonPoster,
            'trailer' => 'youtube.com',
            'release_date' => $attributes['release_date'],
        ]);

        return redirect(route('shows.index'))->with('create', 'Show');
    }

    public function edit($id) {
        return view('admin.shows.edit', [
            'show' => Show::findOrFail($id),
            'people' => Person::all(),
            'genres' => Genre::all()
        ]);
    }

    public function update(Request $request, $id) {
        $attributes = $this->validateShow($request);

        $show = Show::findOrFail($id);

        $oldPosterPath = public_path($show->poster);

        if ($request->file('poster')) {
            $attributes['poster'] = '/storage/' . $request->file('poster')->store();

            if (file_exists($oldPosterPath) && basename($oldPosterPath) !== 'image-placeholder.jpg') {
                unlink($oldPosterPath);
            }
        }

        $attributes['slug'] = Str::slug($attributes['title']) . '-' . date('Y', strtotime($attributes['release_date']));

        $show->update($attributes);

        MediaGenreController::store($show, $attributes['genres']);

        MediaCrewController::update($show->id, 'App\Models\Show', [
            'creator' => $attributes['creators'],
            'actor' => $attributes['cast']
        ]);

        return redirect("/admin/shows/$show->slug")->with('update', 'Show');
    }

    public function destroy($id) {
        $show = Show::findOrFail($id);

        $path = public_path($show->poster);
        if (file_exists($path) && basename($path) !== 'image-placeholder.jpg') {
            unlink($path);
        }

        $show->delete();

        MediaGenreController::destroy($show->id, 'App\Models\Movie');

        MediaCrewController::destroy($show->id, 'App\Models\Show');

        return 'success';
    }

    private function validateShow(Request $request) {
        $rules = [
            'title' => 'required',
            'age_rating' => 'required',
            'release_date' => 'required|date',
            'status' => 'required',
            'description' => 'required',
            'genres' => 'required',
            'creators' => 'required',
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
