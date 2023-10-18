<?php

namespace App\Http\Controllers;

use App\Models\MediaCrew;
use App\Models\Person;

class MediaCrewController extends Controller
{
    public static function store($mediaId, $mediaType, $crews) {
        $mediaCrewRecords = [];

        foreach ($crews as $role => $people) {
            foreach ($people as $person) {
                $mediaCrewRecords[] = [
                    'media_id' => $mediaId,
                    'media_type' => $mediaType,
                    'person_id' => Person::firstOrCreate(['name' => $person])->id,
                    'role' => $role,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
        }

        MediaCrew::insert($mediaCrewRecords);
    }

    public static function update($mediaId, $mediaType, $crews) {
        self::destroy($mediaId, $mediaType);

        self::store($mediaId, $mediaType, $crews);
    }

    public static function destroy($mediaId, $mediaType) {
        MediaCrew::where([
            ['media_id', $mediaId],
            ['media_type', $mediaType]
        ])->delete();
    }

}

