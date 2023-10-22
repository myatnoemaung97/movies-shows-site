<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function movies() {
        return $this->morphedByMany(Movie::class, 'media', 'media_genres');
    }

    public function shows() {
        return $this->morphedByMany(Show::class, 'media', 'media_genres');
    }
}
