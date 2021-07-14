<?php

namespace Tests\Feature\Api;

use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Evaluationtest extends TestCase
{
    /**
     * Teste Error Create New Evaluation.
     *
     * @return void
     */
    public function testErrorCreateNewEvaluation()
    {
        $order = 'fake_value';

        $response = $this->postJson("/auth/v1/orders/{$order}/evaluations");
        //$response->dump();
        $response->assertStatus(401);
    }

    /**
     * Teste Create New Evaluation.
     *
     * @return void
     */
    public function testCreateNewEvaluation()
    {
        $client = Client::factory()->create();
        $token = $client->createToken(Str::random(10))->plainTextToken;

        $order = $client->orders()->save(Order::factory()->make());

        $payload = [
            'stars' => 5,
            'comment' => Str::random(10),
        ];

        $headers = [
            'Authorization' => "Bearer {$token}",
        ];

        $response = $this->postJson(
            "/auth/v1/orders/{$order}/evaluations",
            $payload,
            $headers
        );
        $response->assertStatus(201);
    }
}
