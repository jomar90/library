<?php

namespace Database\Factories;

use App\Models\Publisher;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => ucwords(fake()->words(3, true)),
            'publisher_id' => Publisher::factory(),
            'author' => fake()->name(),
            'publication_year' => fake()->year(),
            'pages' => fake()->numberBetween(100, 1000),
            'user_id' => User::factory()
        ];
    }
}
