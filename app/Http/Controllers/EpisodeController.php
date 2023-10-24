<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EpisodeController extends Controller
{
    public function create(Show $show, Season $season) {
        //dd(request()->routeIs('episodes.create'));
        return view('admin.episodes.create', [
            'show' => $show,
            'season' => $season
        ]);
    }

    public function store(Request $request, Show $show, Season $season) {
        $attributes = $this->validateEpisode($request, $season);

        $attributes['season_id'] = $season->id;

        Episode::create($attributes);

        return redirect(route('seasons.show', [$show->slug, $season->season_number]))->with('create', 'Episode');
    }

    public function show(Show $show, Season $season, Episode $episode) {

        return view('admin.episodes.show', [
            'show' => $show,
            'seasons' => $show->seasons,
            'currentSeason' => $season,
            'episode' => $episode
        ]);
    }

    public function edit(Show $show, Season $season, Episode $episode) {
        return view('admin.episodes.edit', [
            'show' => $show,
            'season' => $season,
            'episode' => $episode
        ]);
    }

    public function update(Request $request, Show $show, Season $season, Episode $episode) {
        $attributes = $this->validateEpisode($request, $season, $episode);

        $episode->update($attributes);

        return redirect(route('episodes.show', [$show->slug, $season->season_number, $episode->episode_number]))->with('update', 'Episode');
    }

    public function destroy(Show $show, Season $season, Episode $episode) {
        $episode->delete();

        return 'success';
    }

    private function validateEpisode(Request $request, Season $season, Episode $episode = null) {
        $customMessages = [
            'episode_number.unique' => "The season already has an episode number " . $request['episode_number'],
        ];

        $rules = [
            'release_date' => 'required|date',
            'title' => 'required',
            'run_time' => 'required|numeric|min:0',
            'description' => 'required'
        ];

        if ($request->isMethod('POST')) {
            $rules['episode_number'] = [
                'required',
                'numeric',
                'min:0',
                Rule::unique('episodes')->where(function ($query) use ($season) {
                    return $query->where('season_id', $season->id);
                })
            ];
        } else {
            $rules['episode_number'] = [
                'required',
                'numeric',
                'min:0',
                Rule::unique('episodes')->where(function ($query) use ($season, $episode) {
                    return $query->where('season_id', $season->id)->whereNot('episode_number', $episode->episode_number);
                })
            ];
        }

        return $request->validate($rules, $customMessages);
    }
}
