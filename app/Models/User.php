<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class
User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_admin' => 'boolean',
        'is_banned' => 'boolean',
        'is_like' => 'boolean'
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function watchlists() {
        return $this->hasMany(Watchlist::class);
    }

    public function playlists() {
        return $this->hasMany(Playlist::class);
    }

    public function watchlistMovies() {
        return $this->morphedByMany(Movie::class, 'media', 'watchlists');
    }

    public function watchlistShows() {
        return $this->morphedByMany(Show::class, 'media', 'watchlists');
    }

    public function reviewMovies() {
        return $this->morphedByMany(Movie::class, 'media', 'reviews');
    }

    public function likeDislikes() {
        return $this->hasMany(LikeDislike::class);
    }

    public function likedReviews() {
        return $this->belongsToMany(Review::class, 'like_dislikes')
            ->where('is_like', true);
    }

    public function dislikedReviews() {
        return $this->belongsToMany(Review::class, 'like_dislikes')
            ->where('is_like', false);
    }
}
