<?php

namespace Database\Seeders;

use App\Models\Basket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Product::factory(50)->create();
        Basket::factory(1)->hasAttached(
            Product::all()->random(5),
            fn () => ['quantity' => fake()->numberBetween(1, 5)]
        )->create();
    }
}
