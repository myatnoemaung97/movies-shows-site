<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'age_rating', 'release_date', 'description', 'run_time', 'poster', 'trailer'];

    public function reviews()
    {
        return $this->morphMany(Review::class, 'media');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
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


}
