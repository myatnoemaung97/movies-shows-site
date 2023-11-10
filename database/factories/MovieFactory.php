<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'slug' => fake()->slug,
            'age_rating' => fake()->randomElement(['G', 'PG', 'PG-13', 'R']),
            'release_date' => fake()->date,
            'description' => fake()->paragraph(),
            'run_time' => fake()->numberBetween(60, 240),
            'poster' => '/storage/image-placeholder.jpg',
            'thumbnail' => '/storage/media-thumbnail.jpg',
            'trailer' => 'youtube.com',
            'rating' => fake()->numberBetween(1.0, 10.0),
        ];
    }
}
