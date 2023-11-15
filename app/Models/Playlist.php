<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'pinned' => 'boolean'
    ];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medias() {
        return $this->hasMany(PlaylistMedia::class);
    }

    public function movies()
    {
        $playlistMedias = PlaylistMedia::where(['playlist_id' => $this->id, 'media_type' => 'App\Models\Movie'])->pluck('media_id');
        return Movie::whereIn('id', $playlistMedias)->get();
    }

    public function shows()
    {
        $playlistMedias = PlaylistMedia::where(['playlist_id' => $this->id, 'media_type' => 'App\Models\Show'])->pluck('media_id');
        return Show::whereIn('id', $playlistMedias)->get();
    }
}
