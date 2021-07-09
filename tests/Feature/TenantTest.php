<?php

namespace Tests\Feature;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test Get All Tenants
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        //https://laravel.com/docs/8.x/database-testing
        Tenant::factory()->count(10)->create();
        //factory(Tenant::class, 10)->create();

        $response = $this->getJson('/api/v1/tenants');

        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }
}
