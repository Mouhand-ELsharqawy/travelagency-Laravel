<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SecurityCheck>
 */
class SecurityCheckFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pessenger_ones_id' => fake()->randomDigitNotZero(1,100), 
            'CheckResult' => fake()->word(2), 
            'comments' => fake()->sentence(2)
        ];
    }
}
