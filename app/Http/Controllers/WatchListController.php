<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Watchlist;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class WatchListController extends Controller
{
    public function index(User $user) {
        $movies = $user->watchlistMovies;
        $shows = $user->watchlistShows;
        $medias = $movies->mergeRecursive($shows);

        $path = "/" . auth()->user()->id . '/watchlists/';

        return view('watchlists.index', [
            'medias' => $this->paginate($medias, 5, null, ['path' => $path])
        ]);
    }

    public function store(Request $request) {
        Watchlist::create([
            'media_id' => $request['mediaId'],
            'media_type' => "App\Models\\" . ucwords($request['mediaType']),
            'user_id' => auth()->user()->id
        ]);
    }

    public function destroy(Request $request) {
        Watchlist::firstWhere([
            'media_id' => $request['mediaId'],
            'media_type' => "App\Models\\" . ucwords($request['mediaType']),
            'user_id' => auth()->user()->id
        ])->delete();
    }

    private function paginate($items, $perPage = 10, $page = null, $options = []) {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage)->values(), $items->count(), $perPage, $page, $options);
    }
}
