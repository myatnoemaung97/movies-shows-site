<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->name,
            'role' => fake()->randomElement(['Actor', 'Director']),
            'biography' => fake()->paragraphs(2, true),
            'image' => '/storage/image-placeholder.jpg',
            'thumbnail' => '/storage/cele-thumbnail.jpg',
        ];
    }
}
