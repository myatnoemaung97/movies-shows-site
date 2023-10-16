<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        return view('admin.movies.index', [
            'movies' => Movie::latest()->get()
        ]);
    }

    public function create() {

        return view('admin.movies.create');
    }

    public function store(Request $request) {
        dd($request->all());
        dd('hello');
    }
}
