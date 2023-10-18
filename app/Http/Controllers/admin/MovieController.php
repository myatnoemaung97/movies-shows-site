<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MediaCrewController;
use App\Models\Movie;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index() {
        return view('admin.movies.index', [
            'movies' => Movie::latest()->get()
        ]);
    }

    public function create() {
        return view('admin.movies.create', [
            'people' => Person::all()
        ]);
    }

    public function store(Request $request) {
        $attributes = $this->validateMovie($request);

        $attributes['poster'] = '/storage/' . $request->file('poster')->store();

        $movie = Movie::create($attributes);

        MediaCrewController::store($movie->id, 'App\Models\Movie', [
            'director' => $attributes['directors'],
            'actor' => $attributes['cast']
        ]);

        return redirect(route('movies.index'));
    }

    public function show($id) {
        return view('admin.movies.show', [
            'movie' => Movie::findOrFail($id)
        ]);
    }

    public function edit($id) {
        return view('admin.movies.edit', [
            'movie' => Movie::findOrFail($id),
            'people' => Person::all()
        ]);
    }

    public function update(Request $request, $id) {
        $attributes = $this->validateMovie($request);

        $movie = Movie::findOrFail($id);

        if ($request->file('poster')) {
            $attributes['poster'] = '/storage/' . $request->file('poster')->store();
        }

        Storage::disk('public')->delete($movie->poster);

        $movie->update($attributes);

        MediaCrewController::update($movie->id, 'App\Models\Movie', [
            'director' => $attributes['directors'],
            'actor' => $attributes['cast']
        ]);

        return redirect("/admin/movies/$id");
    }

    private function validateMovie(Request $request) {
        $rules = [
            'title' => 'required',
            'age_rating' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'run_time' => 'required',
            'directors' => 'required',
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
