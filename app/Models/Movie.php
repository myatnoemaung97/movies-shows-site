<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'age_rating', 'release_date', 'description', 'run_time', 'poster', 'thumbnail', 'trailer'];

    public function reviews()
    {
        return $this->morphMany(Review::class, 'media');
    }

    public function actors()
    {
        return $this->morphToMany(Person::class, 'media', 'media_crews')
            ->wherePivot('role', 'actor');
    }

    public function directors()
    {
        return $this->morphToMany(Person::class, 'media', 'media_crews')
            ->wherePivot('role', 'director');
    }

    public function writers()
    {
        return $this->morphToMany(Person::class, 'media', 'media_crews')
            ->wherePivot('role', 'writer');
    }

    public function mediacrew()
    {
        return $this->morphMany(MediaCrew::class, 'media');
    }

    public function genres()
    {
        return $this->morphToMany(Genre::class, 'media', 'media_genres');
    }


}
