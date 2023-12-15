<?php

namespace Tests\Feature;

use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function signInAsUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        return $user;
    }

    protected function generateActivationAndExpirationDates(): array
    {
        $activationDate = Carbon::now()->addDay();
        $expirationDate = $activationDate->copy()->addYear(2);

        return [
            'activation_date' => $activationDate->format('Y-m-d H:i'),
            'expiration_date' => $expirationDate->format('Y-m-d'),
        ];
    }

    public function test_api_returns_cards_list()
    {
        $this->signInAsUser();

        $card = Card::factory()->create();

        $response = $this->getJson('api/cards');

        $response->assertJsonFragment([
            'card_number' => $card->card_number,
            'pin' => $card->pin,
            'expiration_date' => $card->expiration_date,
            'balance' => $card->balance,
        ]);
    }

    public function test_api_card_store_successful()
    {
        $this->signInAsUser();

        $dates = $this->generateActivationAndExpirationDates();

        $card = [
            'card_number' => '22222222222222222222',
            'pin' => 1234,
            'activation_date' => $dates['activation_date'],
            'expiration_date' => $dates['expiration_date'],
            'balance' => 222,
        ];

        $response = $this->postJson('api/cards', $card);

        $response->assertStatus(201);
        $response->assertJsonFragment($card);
    }

    public function test_api_card_delete_successful()
    {
        $this->signInAsUser();

        $card = Card::factory()->create();

        $response = $this->deleteJson("api/cards/{$card->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('cards', ['id' => $card->id]);

    }

    public function test_api_card_updated_successful()
    {
       $this->signInAsUser();

        $card = Card::factory()->create();

        $dates = $this->generateActivationAndExpirationDates();

        $updatedData = [
            'card_number' => $card->card_number,
            'pin' => 5678,
            'activation_date' => $dates['activation_date'],
            'expiration_date' => $dates['expiration_date'],
            'balance' => 500,
        ];

        $response = $this->putJson("api/cards/{$card->id}", $updatedData);

        $response->assertStatus(200);

        $response->assertJsonFragment($updatedData);

        $updatedCard = Card::find($card->id);

        $this->assertEquals($updatedData['card_number'], $updatedCard->card_number);
        $this->assertEquals($updatedData['pin'], $updatedCard->pin);
        $this->assertEquals($updatedData['activation_date'], $updatedCard->activation_date->format('Y-m-d H:i'));
        $this->assertEquals($updatedData['expiration_date'], $updatedCard->expiration_date);
        $this->assertEquals($updatedData['balance'], $updatedCard->balance);
    }
}
