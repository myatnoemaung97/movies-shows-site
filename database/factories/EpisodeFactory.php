<?php

namespace Database\Factories;

use App\Models\Season;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Episode>
 */
class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'season_id' => 1,
            'episode_number' => fake()->numberBetween(1,5),
            'run_time' => fake()->numberBetween(20, 80),
            'title' => fake()->words(3, true),
            'description' => fake()->sentence,
            'release_date' => fake()->date,
        ];
    }
}
