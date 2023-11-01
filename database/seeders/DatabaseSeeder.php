<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Content;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\MediaCrew;
use App\Models\MediaGenre;
use App\Models\Movie;
use App\Models\Person;
use App\Models\Playlist;
use App\Models\PlaylistMedia;
use App\Models\Review;
use App\Models\Season;
use App\Models\Show;
use App\Models\User;
use App\Models\Watchlist;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // creates a user
        $user = User::factory()->create();

        // creates a movie
        $movie = Movie::factory()->create();

        // creates a show
        $show = Show::factory()->create();

        // creates a season
        $season = Season::factory()->create([
            'show_id' => $show->id,
            'season_number' => 1
        ]);

        // creates 5 episodes
        for ($i = 1; $i <= 5; $i++) {
            Episode::factory()->create([
                'season_id' => $season->id,
                'episode_number' => $i
            ]);
        }

        // user reviews movie
        Review::create([
            'user_id' => $user->id,
            'media_id' => $movie->id,
            'media_type' => 'App\Models\Movie',
            'rating' => 4,
            'body' => 'I love this movie'
        ]);

        // user reviews show
        Review::create([
            'user_id' => $user->id,
            'media_id' => $show->id,
            'media_type' => 'App\Models\Show',
            'rating' => 3,
            'body' => 'My favourite show on TV right now'
        ]);

        // creates a person
        $actor = Person::factory()->create([
            'name' => 'Ryan Gosling',
            'roles' => 'Actor'
        ]);

        // creates a person
        $actress = Person::factory()->create([
            'name' => 'Ana De Armas',
            'roles' => 'Actor'
        ]);

        // creates a person
        $director = Person::factory()->create([
            'name' => 'Christopher Nolan',
            'roles' => 'Director'
        ]);

        // creates a media crew for movie
        MediaCrew::create([
            'media_id' => $movie->id,
            'media_type' => 'App\Models\Movie',
            'person_id' => $actor->id,
            'role' => 'actor'
        ]);

        // creates a media crew for movie
        MediaCrew::create([
            'media_id' => $movie->id,
            'media_type' => 'App\Models\Movie',
            'person_id' => $director->id,
            'role' => 'director'
        ]);

        // creates a media crew for show
        MediaCrew::create([
            'media_id' => $show->id,
            'media_type' => 'App\Models\Show',
            'person_id' => $actor->id,
            'role' => 'actor'
        ]);

        // user adds a movie to watchlist
        Watchlist::create([
            'user_id' => $user->id,
            'media_id' => $movie->id,
            'media_type' => 'App\Models\Movie'
        ]);

        // user creates a playlist
        $playlist = Playlist::create([
            'user_id' => $user->id,
            'name' => 'My Fav Movies',
            'description' => 'A list of my fav movies'
        ]);

        // user adds a movie to the playlist
        PlaylistMedia::create([
            'playlist_id' => $playlist->id,
            'media_id' => $movie->id,
            'media_type' => 'App\Models\Movie'
        ]);

        // creates an article
        $article = Article::factory()->create();

        // creates content for article
        Content::create([
            'article_id' => $article->id,
            'image' => '/images/image.png',
            'body' => "This is content's body",
        ]);

        Movie::factory(30)->create();
        Show::factory(30)->create();
        Person::factory(50)->create();
        User::factory(5)->create();
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345',
            'is_admin' => true
        ]);

        for ($i = 1; $i <= 5; $i++) {
            Season::create([
                'show_id' => 2,
                'season_number' => $i,
                'poster' => '/storage/image-placeholder.jpg',
                'thumbnail' => '/storage/media-thumbnail.jpg',
                'trailer' => 'youtube.com',
                'release_date' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        Genre::factory(5)->create();

        MediaGenre::create([
            'media_id' => 1,
            'media_type' => 'App\Models\Movie',
            'genre_id' => 1
        ]);

        MediaGenre::create([
            'media_id' => 1,
            'media_type' => 'App\Models\Show',
            'genre_id' => 2
        ]);

        Article::factory(36)->create();

        for ($i = 1; $i <= 5; $i++) {
            Content::create([
                'article_id' => 1,
                'body' => fake()->paragraphs(2, true),
                'image' => '/storage/image-placeholder.jpg'
            ]);
        }


    }
}
