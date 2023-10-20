<?php

namespace Database\Factories;

use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Season>
 */
class SeasonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws \Exception
     */
    public function definition(): array
    {
        return [
            'show_id' => 1,
            'season_number' => fake()->numberBetween(1, 3),
            'release_date' => fake()->date,
            'poster' => '/storage/image-placeholder.jpg',
            'trailer' => 'youtube.com'
        ];
    }
}
