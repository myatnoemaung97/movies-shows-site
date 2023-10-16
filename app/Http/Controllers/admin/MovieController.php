<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index() {
        return view('admin.movies.index', [
            'movies' => Movie::latest()->get()
        ]);
    }
}
