<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index() {
        return view('playlists.index', [
            'playlists' => Playlist::all()
        ]);
    }

    public function show(Playlist $playlist) {
        return view('playlists.show', [
            'playlist' => $playlist
        ]);
    }

}
