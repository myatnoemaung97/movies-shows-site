<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Services\FilterService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request) {

        $query = Movie::latest();

        $query = FilterService::filter($query, $request);

        if ($request['sort'] && !$request['page']) {
            $updatedMediaGrid = view('partials.media_grid',
                ['count' => $query->get()->count(), 'type' => 'movie', 'sort' => $request['sort'], 'medias' => $query->paginate(12)->withQueryString()])->render();

            return response()->json([
                'updatedMediaGrid' => $updatedMediaGrid
            ]);
        }

        return view('movies.index', [
            'count' => $query->count(),
            'movies' => $query->paginate(12)->withQueryString(),
            'filters' => [
                'title' => $request['title'],
                'genres' => array($request['genres'])[0],
                'minRating' => $request['min_rating'],
                'yearFrom' => $request['year_from'],
                'yearTo' => $request['year_to']
            ],
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
