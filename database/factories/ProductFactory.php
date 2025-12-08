<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stock_id' => Str::random(63),
            'name' => fake()->words(
                fake()->numberBetween(1, 5),
                true
            ),
            'price' => fake()->randomFloat(2, 1, 1000),
            'stock_quantity' => fake()->numberBetween(1, 100),
        ];
    }
}
