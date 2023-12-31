<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function movies() {
        return $this->morphedByMany(Movie::class, 'media', 'media_crews');
    }

    public function shows() {
        return $this->morphedByMany(Show::class, 'media', 'media_crews');
    }


}
