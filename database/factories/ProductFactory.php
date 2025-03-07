<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\Product>
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->words(3, true), // Generates a string of 3 words
            'description' => $this->faker->paragraph,       // Generates a paragraph
            'price'       => $this->faker->randomFloat(2, 1, 1000), // 2 decimal places, between 1 and 1000
            'stock'       => $this->faker->numberBetween(0, 100),   // Stock between 0 and 100
        ];
    }
}
