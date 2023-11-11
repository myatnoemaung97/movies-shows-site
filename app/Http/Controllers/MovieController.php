<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request) {

        $query = Movie::latest();

        if (empty($request->all())) {

            return view('movies.index', [
                'count' => $query->count(),
                'movies' => $query->paginate(12)
            ]);
        }

        $sort = $request['sort'];
        $title = $request['title'];
        $genres = $request['genres'];
        $minRating = $request['min_rating'];
        $yearFrom = $request['year_from'];
        $yearTo = $request['year_to'];

        if ($title) {
            $query = $query->where('title', 'like', '%' . $title . '%');
        }

        if ($minRating) {
            $query = $query->where('rating', '>', $minRating);
        }

        if ($yearFrom) {
            $query = $query->whereYear('release_date', '>', $yearFrom);
        }

        if ($yearTo) {
            $query = $query->whereYear('release_date', '<', $yearTo);
        }

        if ($sort) {
            $query = $query->orderByRaw($sort);
        }
        
        $updatedMediaGrid = view('partials.media_grid',
            ['count' => $query->get()->count(), 'type' => 'movie', 'sort' => $sort, 'medias' => $query->paginate(12)])->render();

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
