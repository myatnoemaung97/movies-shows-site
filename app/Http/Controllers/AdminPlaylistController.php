<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Playlist;
use App\Models\PlaylistMedia;
use App\Models\Show;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminPlaylistController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $movies = Playlist::query();

            return DataTables::of($movies)
                ->editColumn('created_at', function ($p) {
                    return Carbon::parse($p->created_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('updated_at', function ($p) {
                    return Carbon::parse($p->updated_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('no_of_medias', function ($p) {
                    return $p->medias->count();
                })
                ->addColumn('action', function ($p) {

                    $details = "<a href='/admin/playlists/$p->id' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('playlists.edit', $p->id) . '" class="btn btn-sm btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deletePlaylistButton btn btn-sm btn-danger" data-id="' . $p->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.playlists.index');
    }

    public function create() {
        return view('admin.playlists.create', [
            'medias' => Movie::all()->mergeRecursive(Show::all())
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'medias' => 'required'
        ]);

        DB::transaction(function () use ($request) {
            $playlist = Playlist::create([
                'name' => $request['name'],
                'user_id' => auth()->user()->id,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ]);

            $playlistMedias = array_map(function ($media) use ($playlist) {
                $media = explode(',', $media);
                return new PlaylistMedia([
                    'playlist_id' => $playlist->id,
                    'media_id' => $media[0],
                    'media_type' => "App\Models\\" . $media[1]
                ]);
            }, $request['medias']);

            $playlist->medias()->saveMany($playlistMedias);
        });

        return redirect(route('playlists.index'))->with('create', 'Playlist');
    }

    public function show(Playlist $playlist) {
        return view('admin.playlists.show', [
            'playlist' => $playlist
        ]);
    }

    public function edit(Playlist $playlist) {
        return view('admin.playlists.edit', [
            'playlist' => $playlist,
            'medias' => Movie::all()->mergeRecursive(Show::all())
        ]);
    }

    public function update(Playlist $playlist, Request $request) {
        $request->validate([
            'name' => 'required',
            'medias' => 'required'
        ]);

        DB::transaction(function () use ($request, $playlist) {
            $playlist->update(['name' => $request['name']]);

            PlaylistMedia::where('playlist_id', $playlist->id)->delete();

            $playlistMedias = array_map(function ($media) use ($playlist) {
                $media = explode(',', $media);
                return new PlaylistMedia([
                    'playlist_id' => $playlist->id,
                    'media_id' => $media[0],
                    'media_type' => "App\Models\\" . $media[1]
                ]);
            }, $request['medias']);

            $playlist->medias()->saveMany($playlistMedias);
        });

        return redirect(route('playlists.show', $playlist->id))->with('update', 'Playlist');
    }

    public function destroy(Playlist $playlist) {
        $playlist->delete();

        return 'scccess';
    }

}
