<?php

namespace Database\Factories;

use Carbon\Carbon;
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

        $activationDate = Carbon::now()->addDay();
        $expirationDate = $activationDate->copy()->addYear(2);

        return [
            'card_number' => $this->faker->numerify('####################'),
            'pin' => $this->faker->numerify('####'),
            'activation_date' => $activationDate->format('Y-m-d H:i'),
            'expiration_date' => $expirationDate->format('Y-m-d'),
            'balance' => $this->faker->randomFloat(2, 5000, 100000),
        ];
    }
}
