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
        $currentSeason = $show->seasons()->orderBy('release_date', 'desc')->first();

        if ($show->status === 'on going') {
            $end = 'current';
        } else {
            $end = date('Y', strtotime($currentSeason->release_date));
        }

        return view('shows.show', [
            'start' => $start,
            'end' => $end,
            'show' => $show,
            'currentSeason' => $currentSeason
        ]);
    }

}
