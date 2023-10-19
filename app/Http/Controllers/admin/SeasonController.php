<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Season;

class SeasonController extends Controller
{
    public function show($id) {
        $season = Season::findOrFail($id);
        $show = $season->show;

        return view('admin.seasons.show', [
            'show' => $show,
            'season' => $season,
            'seasons' => $show->seasons
        ]);
    }

}
