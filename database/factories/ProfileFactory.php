<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'picture' => '/pictures/santa.jpg',
            'mobile' => 1234567890,
            'country' => $this->faker->country(),
            'address' => $this->faker->address(),
            'profileable_type' => '\App\Models\User',
            'profileable_id' => $this->faker->numberBetween(1,250)
        ];
    }
}
