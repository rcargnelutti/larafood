<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * Error Create New Client
     *
     * @return void
     */
    public function testErrorCreateNewClient()
    {
        //Client::truncate();

        $payload = [
            'name' => 'Rodrigo Cargnelutti',
            'email' => 'cargnelutti@gmail.com',
        ];
        $response = $this->postJson('/api/auth/register', $payload);
        //$response->dump();
        $response->assertStatus(422)
                ->assertExactJson([
                    'message' => 'The given data was invalid.',
                    'errors' => [
                        //'password' => ['The password field is required.']
                        'password' => [trans('validation.required', ['attribute' => 'password'])],
                    ]
                ]);
    }

    /**
     * Success Create New Client
     *
     * @return void
     */
    public function testSuccessCreateNewClient()
    {
        $payload = [
            'name' => 'Rodrigo Cargnelutti',
            'email' => 'cargnelutti@gmail.com',
            'password' => '12345678',
        ];
        $response = $this->postJson('/api/auth/register', $payload);
        //$response->dump();
        $response->assertStatus(201);

    }

}
