<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    protected $model = Product::class; // 🔥 QUAN TRỌNG

    public function definition(): array
    {
        return [
            "name"=>fake()->words(3,true),
            "price"=>fake()->randomFloat(0,1000,500000),
            "stock"=>fake()->numberBetween(0,200),
            //
        ];
    }
}
