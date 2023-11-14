<?php

namespace App\Services;

class FilterService
{

    public static function filter($query, $filters) {
        if ($filters['title']) {
            $query = $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if ($filters['genres']) {
            $query = $query->whereHas('genres', function ($query) use ($filters) {
                $query->where('media_type', 'App\Models\Movie')->whereIn('genre_id', $filters['genres']);
            });
        }

        if ($filters['min_rating']) {
            $query = $query->where('rating', '>', $filters['min_rating']);
        }

        if ($filters['year_from']) {
            $query = $query->whereYear('release_date', '>', $filters['year_from']);
        }

        if ($filters['year_to']) {
            $query = $query->whereYear('release_date', '<', $filters['year_to']);
        }

        if ($filters['sort']) {
            $query = $query->orderByRaw($filters['sort']);
        }

        return $query;
    }
}
