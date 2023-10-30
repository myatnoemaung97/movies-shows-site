<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = ['show_id', 'season_number', 'release_date', 'poster', 'thumbnail', 'trailer'];

    public function show() {
        return $this->belongsTo(Show::class);
    }

    public function episodes() {
        return $this->hasMany(Episode::class);
    }
}
