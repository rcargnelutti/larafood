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
        //Tenant::truncate();
        //https://laravel.com/docs/8.x/database-testing
        Tenant::factory()->count(10)->create();
        //factory(Tenant::class, 10)->create();

        $response = $this->getJson('/api/v1/tenants');
        //$response->dump();
        $response->assertStatus(200)
                    ->assertJsonCount(10, 'data');
    }

    /**
     * Test Get Error Single Tenants
     *
     * @return void
     */
    public function testErrorGetTenant()
    {
        //Tenant::factory()->create();
        $tenant = 'fake_value';

        $response = $this->getJson("/api/v1/tenants/{$tenant}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     * Test Get Error Single Tenants
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {
        $tenant = Tenant::factory()->create();

        $response = $this->getJson("/api/v1/tenants/{$tenant->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
