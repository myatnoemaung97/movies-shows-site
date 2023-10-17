<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Models\Person;
use Illuminate\Http\Request;

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

        $attributes['poster'] = $request->file('poster')->store();

        $movie = Movie::create($attributes);

        return redirect(route('movies.index'));
    }

    public function show($id) {
        return view('admin.movies.show', [
            'movie' => Movie::findOrFail($id)
        ]);
    }

    private function validateMovie(Request $request) {
        return $request->validate([
            'title' => 'required',
            'age_rating' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'run_time' => 'required',
            'directors' => 'required',
            'cast' => 'required',
            'poster' => 'required|image',
            'poster.*' => 'mimes:jpg,jpeg,png,bmp',
            'trailer' => 'required'
        ]);
    }
}
