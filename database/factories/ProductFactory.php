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
    public function definition(): array
    {
        return [
            'supplier_id' => rand(1,5),
            'title' => $this->faker->title(),
            'picture' => '/pictures/eggs.jpg',
            'quantity' => $this->faker->randomDigit(),
            'supplierable_type' => 'App\Models\Supplier',
            'supplierable_id' => $this->faker->randomDigit(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigit()
        ];
    }
}
