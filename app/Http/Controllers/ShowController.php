<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Show;
use App\Services\FilterService;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index(Request $request) {
        $query = Show::latest();

        $query = FilterService::filter($query, $request);

        if ($request['sort'] && !$request['page']) {
            $updatedMediaGrid = view('partials.media_grid',
                ['count' => $query->get()->count(), 'type' => 'show', 'sort' => $request['sort'], 'medias' => $query->paginate(12)->withQueryString()])->render();

            return response()->json([
                'updatedMediaGrid' => $updatedMediaGrid
            ]);
        }

        return view('shows.index', [
            'count' => $query->count(),
            'shows' => $query->paginate(12)->withQueryString(),
            'filters' => [
                'title' => $request['title'],
                'genres' => array($request['genres'])[0],
                'minRating' => $request['min_rating'],
                'yearFrom' => $request['year_from'],
                'yearTo' => $request['year_to']
            ],
        ]);
    }

    public function show(Show $show) {
        $user = auth()->user();

        $start = date('Y', strtotime($show->release_date));
        $currentSeason = $show->seasons()->orderBy('season_number', 'desc')->first();

        if ($show->status === 'on going') {
            $end = 'current';
        } else {
            $end = date('Y', strtotime($currentSeason->release_date));
        }

        return view('shows.show', [
            'period' => $start . ' - ' . $end,
            'show' => $show,
            'currentSeason' => $currentSeason,
            'isInWatchlist' => (bool) $user?->watchlists()->firstWhere(['media_id' => $show->id, 'media_type' => "App\Models\Show"]),
            'review' => $user?->reviews()->firstWhere(['media_id' => $show->id, 'media_type' => "App\Models\Show"]),
            'likedReviews' => $user?->likedReviews,
            'dislikedReviews' => $user?->dislikedReviews,
        ]);
    }

}
