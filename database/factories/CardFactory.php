<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_number' => $this->faker->numerify('####################'),
            'pin' => $this->faker->numerify('####'),
            'activation_date' => $this->faker->dateTimeThisYear(),
            'expiration_date' => $this->faker->dateTimeBetween('now', '+2 years')->format('Y-m-d'),
            'balance' => $this->faker->randomFloat(2, 5000, 100000),
        ];
    }
}
