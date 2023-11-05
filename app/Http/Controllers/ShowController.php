<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index() {
        $shows = Show::latest();

        return view('shows.index', [
            'count' => $shows->count(),
            'shows' => $shows->paginate(12)
        ]);
    }

    public function show(Show $show) {
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
            'isInWatchlist' => (bool) auth()->user()?->watchlists()->firstWhere(['media_id' => $show->id, 'media_type' => "App\Models\Show"])
        ]);
    }

}
