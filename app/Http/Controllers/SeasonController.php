<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Show;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function show($showSlug, $seasonNumber) {
        $show = Show::firstWhere('slug', $showSlug);

        $currentSeason = Season::firstWhere(['show_id' => $show->id, 'season_number' => $seasonNumber]);
        $show = $currentSeason->show;

        return view('admin.seasons.show', [
            'show' => $show,
            'currentSeason' => $currentSeason,
            'seasons' => $show->seasons()->orderBy('season_number')->get(),
            'episodes' => $currentSeason->episodes
        ]);
    }

    public function create($show) {
        return view('admin.seasons.create', [
            'show' => Show::findOrFail($show)
        ]);
    }

    public function store(Request $request) {
        $showId = $request->get('showId');
        $attributes = $this->validateSeason($request);

        $attributes['poster'] = '/storage/' . $request->file('poster')->store();
        $attributes['show_id'] = $showId;
        $attributes['season_number'] = $request->get('season_number');

        Season::create($attributes);

        return redirect(route('shows.show', $request['showSlug']))->with('create', 'Show');
    }

    public function edit($showId, $seasonId) {
        $season = Season::findOrFail($seasonId);

        return view('admin.seasons.edit', [
            'season' => $season,
            'show' => $season->show
        ]);
    }

    public function update(Request $request, $showSlug, $seasonId) {
        $attributes = $this->validateSeason($request);

        $season = Season::findOrFail($seasonId);

        $oldPosterPath = public_path($season->poster);

        if ($request->file('poster')) {
            $attributes['poster'] = '/storage/' . $request->file('poster')->store();

            if (file_exists($oldPosterPath) && basename($oldPosterPath) !== 'image-placeholder.jpg') {
                unlink($oldPosterPath);
            }
        }

        $season->update($attributes);

        return redirect("/admin/shows/". $season->show->slug . "/seasons/$seasonId")->with('update', 'Season');
    }

    public function destroy($showSlug, $seasonId) {
        $season = Season::findOrFail($seasonId);

        $path = public_path($season->poster);
        if (file_exists($path) && basename($path) !== 'image-placeholder.jpg') {
            unlink($path);
        }

        $season->delete();

        return redirect("/admin/shows/$showSlug")->with('delete', 'Season');
    }

    private function validateSeason(Request $request) {
        $rules = [
            'release_date' => 'required|date',
            'trailer' => 'required',
            'poster.*' => 'mimes:jpg,jpeg,png,bmp,svg',
            'season_number' => 'required|numeric'
        ];

        if ($request->isMethod('patch')) {
            unset($rules['poster']);
        } else {
            $rules['poster'] = 'required|image';
        }

        return $request->validate($rules);
    }

}
