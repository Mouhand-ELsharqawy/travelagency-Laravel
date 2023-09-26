<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoFlyList>
 */
class NoFlyListFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ActiveFrom' => fake()->date(), 
            'ActiveTo' => fake()->date(), 
            'reason' => fake()->sentence(2), 
            'pessenger_ones_id' => fake()->randomDigitNotZero(1,100) 
        ];
    }
}
