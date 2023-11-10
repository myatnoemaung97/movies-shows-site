<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Show>
 */
class ShowFactory extends Factory
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
            'poster' => '/storage/image-placeholder.jpg',
            'thumbnail' => '/storage/media-thumbnail.jpg',
            'trailer' => 'youtube.com',
            'status' => 'on going',
            'description' => fake()->paragraph(),
            'rating' => fake()->numberBetween(1.0, 10.0),
        ];
    }
}
