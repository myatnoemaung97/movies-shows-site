<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request) {
        if (empty($request->all())) {
            $movies = Movie::latest();

            return view('movies.index', [
                'count' => $movies->count(),
                'movies' => $movies->paginate(12)
            ]);
        }

        $sort = $request['sort'];
        $title = $request['title'];
        $genres = $request['genres'];
        $minRating = $request['min_rating'];
        $yearFrom = $request['year_from'];
        $yearTo = $request['year_to'];

        if ($sort) {
            $movies = Movie::orderByRaw($sort);
        }

        if ($title) {

        }

        $updatedMediaGrid = view('partials.media_grid',
            ['count' => $movies->get()->count(), 'type' => 'movie', 'sort' => $sort, 'medias' => $movies->paginate(12)])->render();

        return response()->json([
            'updatedMediaGrid' => $updatedMediaGrid
        ]);
    }

    public function show(Movie $movie) {
        $user = auth()->user();

        return view('movies.show', [
            'movie' => $movie,
            'isInWatchlist' => (bool)$user?->watchlists()->firstWhere(['media_id' => $movie->id, 'media_type' => "App\Models\Movie"]),
            'review' => $user?->reviews()->firstWhere(['media_id' => $movie->id, 'media_type' => "App\Models\Movie"]),
            'likedReviews' => $user?->likedReviews,
            'dislikedReviews' => $user?->dislikedReviews,
        ]);
    }
}
