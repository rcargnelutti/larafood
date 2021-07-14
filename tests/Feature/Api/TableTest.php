<?php

namespace Tests\Feature\Api;

use App\Models\Table;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TableTest extends TestCase
{
    /**
     * Error Get Tables by Tenant.
     *
     * @return void
     */
    public function testGetAllTablesTenantError()
    {
        $response = $this->getJson('/api/v1/tables');
        //$response->dump();
        $response->assertStatus(422);
    }

    /**
     * Get Tables by Tenant.
     *
     * @return void
     */
    public function testGetAllTablesByTenant()
    {
        $tenant = Tenant::factory()->create();
        //$tenant->dump();
        $response = $this->getJson("/api/v1/tables?token_company={$tenant->id}");
        //$response->dump();
        $response->assertStatus(200);
    }

    /**
     * Erro Get Table By Tenant.
     *
     * @return void
     */
    public function testErrorGetTableByTenant()
    {
        $table = 'fake_value';
        $tenant = Tenant::factory()->create();

        $response = $this->getJson("/api/v1/tables/{$table}?token_company={$tenant->id}");
        //$response->dump();
        $response->assertStatus(404);
    }

    /**
     * Get Table By Tenant.
     *
     * @return void
     */
    public function testGetTableByTenant()
    {
        $table = Table::factory()->create();
        $tenant = Tenant::factory()->create();

        $response = $this->getJson("/api/v1/tables/{$table->uuid}?token_company={$tenant->id}");
        //$response->dump();
        $response->assertStatus(200);
    }
}
