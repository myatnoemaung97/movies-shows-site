<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'age_rating', 'release_date', 'description', 'poster', 'thumbnail', 'trailer', 'status', 'rating'];

    public function seasons() {
        return $this->hasMany(Season::class);
    }

    public function reviews() {
        return $this->morphMany(Review::class, 'media');
    }

    public function actors() {
        return $this->morphToMany(Person::class, 'media', 'media_crews')
            ->wherePivot('role', 'actor');
    }

    public function directors() {
        return $this->morphToMany(Person::class, 'media', 'media_crews')
            ->wherePivot('role', 'director');
    }

    public function creators() {
        return $this->morphToMany(Person::class, 'media', 'media_crews')
            ->wherePivot('role', 'creator');
    }

    public function genres() {
        return $this->morphToMany(Genre::class, 'media', 'media_genres');
    }

}
