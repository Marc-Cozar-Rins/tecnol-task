<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' =>$this->faker->word(),
            'description' =>$this->faker->paragraph(),
            'price' =>$this->faker->numberBetween(1, 100),
            'quota' =>$this->faker->numberBetween(50, 200),
            'status' =>1,
        ];
    }
}
