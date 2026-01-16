<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Products::class;
    public function definition(): array
    {
        return [
            'name'        => fake()->words(3, true),
            'description' => fake()->optional()->paragraph(),
            'price'       => fake()->randomFloat(2, 3_000_000, 50_000_000),
        ];
    }
}
