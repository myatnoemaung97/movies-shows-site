<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Show;
use App\Services\ImageService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class SeasonController extends Controller
{
    public function show(Request $request, Show $show, Season $season) {
        if ($request->ajax()) {
            $episodes = $season->episodes;

            return DataTables::of($episodes)
                ->editColumn('created_at', function($e) {
                    return Carbon::parse($e->created_at)->format("Y-m-d H:i:s");
                })

                ->editColumn('updated_at', function($e) {
                    return Carbon::parse($e->updated_at)->format("Y-m-d H:i:s");
                })

                ->addColumn('action', function ($e) use ($season, $show) {

                    $details = "<a href='/admin/shows/$show->slug/seasons/$season->season_number/episodes/$e->episode_number' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = "<a href='/admin/shows/$show->slug/seasons/$season->season_number/episodes/$e->episode_number/edit' class='btn btn-sm btn-success' style='margin-right: 10px;'>Edit</a>";
                    $delete = '<a href="" class="deleteEpisodeButton btn btn-sm btn-danger" data-episode_number="' . $e->episode_number . '" data-show_slug="' . $show->slug . '" data-season_number="' . $season->season_number . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.seasons.show', [
            'show' => $show,
            'currentSeason' => $season,
            'seasons' => $show->seasons()->orderBy('season_number')->get(),
        ]);
    }

    public function create(Show $show) {
        return view('admin.seasons.create', [
            'show' => $show
        ]);
    }

    public function store(Request $request, Show $show) {
        $attributes = $this->validateSeason($request, $show);

        $image = $request->file('poster');

        $attributes['poster'] = ImageService::store($image);
        $attributes['thumbnail'] = ImageService::makeThumbnail($image, [150, 300]);

        $attributes['show_id'] = $show->id;
        $attributes['season_number'] = $request->get('season_number');

        Season::create($attributes);

        return redirect(route('shows.show', $request['showSlug']))->with('create', 'Season');
    }

    public function edit(Show $show, Season $season) {
        return view('admin.seasons.edit', [
            'season' => $season,
            'show' => $show
        ]);
    }

    public function update(Request $request, Show $show, Season $season) {
        $attributes = $this->validateSeason($request, $show, $season);

        $image = $request->file('poster');

        if ($image) {
            $attributes['poster'] = ImageService::store($image);
            $attributes['thumbnail'] = ImageService::makeThumbnail($image, [150, 300]);

            ImageService::delete($season->poster);
            ImageService::delete($season->thumbnail);
        }

        $season->update($attributes);

        return redirect(route('seasons.show', [$show->slug, $season->season_number]))->with('update', 'Season');
    }

    public function destroy(Show $show, Season $season) {
        ImageService::delete($season->poster);
        ImageService::delete($season->thumbnail);

        $season->delete();

        return redirect(route('shows.show', $show->slug))->with('delete', 'Season');
    }

    private function validateSeason(Request $request, Show $show, Season $season = null) {
        $messages = [
            'season_number.unique' => "The show already has a season number " . $request['season_number']
        ];

        $rules = [
            'release_date' => 'required|date',
            'trailer' => 'required',
            'poster.*' => 'mimes:jpg,jpeg,png,bmp,svg',
        ];

        if ($request->isMethod('POST')) {
            $rules['season_number'] = [
                'required',
                'numeric',
                'min:0',
                Rule::unique('seasons')->where(function ($query) use ($show, $season) {
                    return $query->where('show_id', $show->id);
                })
            ];
            $rules['poster'] = 'required|image';
        } else {
            $rules['season_number'] = [
                'required',
                'numeric',
                'min:0',
                Rule::unique('seasons')->where(function ($query) use ($season, $show) {
                    return $query->where('show_id', $show->id)->whereNot('season_number', $season->season_number);
                })
            ];
        }

        return $request->validate($rules, $messages);
    }

}
