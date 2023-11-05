<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Show;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function show(Show $show, Season $season) {
        return view('seasons.show', [
            'season' => $season,
        ]);
    }
}
