<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index() {
        $movies = Movie::latest();

        return view('movies.index', [
            'count' => $movies->count(),
            'movies' => $movies->paginate(12)
        ]);
    }

    public function show(Movie $movie) {
        return view('movies.show', [
            'movie' => $movie,
            'isInWatchlist' => (bool) auth()->user()?->watchlists()->firstWhere(['media_id' => $movie->id, 'media_type' => "App\Models\Movie"]),
            'review' => auth()->user()?->reviews()->firstWhere(['media_id' => $movie->id, 'media_type' => "App\Models\Movie"]),
        ]);
    }
}
