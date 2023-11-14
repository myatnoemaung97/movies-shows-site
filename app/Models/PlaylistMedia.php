<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistMedia extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function playlist() {
        return $this->belongsTo(Playlist::class);
    }



}
