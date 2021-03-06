<?php

namespace Database\Seeders;

use App\Models\{
    Tenant,
    Plan
};
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '23882706000129',
            'name' => 'EspecializaTi',
            'url' => 'especializati',
            'email' => 'carlos@especializati.com.br',
        ]);
    }
}
