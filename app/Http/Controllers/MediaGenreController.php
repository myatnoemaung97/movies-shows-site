<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\MediaCrew;
use App\Models\MediaGenre;
use Illuminate\Http\Request;

class MediaGenreController extends Controller
{
    public static function store($movie, $genres) {
        $genres = array_map(function ($genre) {
            return Genre::firstOrCreate(['name' => $genre])->id;
        }, $genres);

        $movie->genres()->sync($genres);
    }

    public static function destroy($mediaId, $mediaType) {
        MediaGenre::where([
            ['media_id', $mediaId],
            ['media_type', $mediaType]
        ])->delete();
    }
}
