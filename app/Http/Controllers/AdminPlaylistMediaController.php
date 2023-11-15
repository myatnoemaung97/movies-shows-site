<?php

namespace App\Http\Controllers;

use App\Models\PlaylistMedia;
use Illuminate\Http\Request;

class AdminPlaylistMediaController extends Controller
{
    public static function store($playlist, $medias) {
        $playlistMedias = array_map(function ($media) use ($playlist) {
            $media = explode(',', $media);
            return new PlaylistMedia([
                'playlist_id' => $playlist->id,
                'media_id' => $media[0],
                'media_type' => "App\Models\\" . $media[1]
            ]);
        }, $medias);

        $playlist->medias()->saveMany($playlistMedias);
    }
}
