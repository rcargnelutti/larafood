<?php

namespace Database\Seeders;

use App\Models\{
    Tenant,
    User,
    Tetnant
};
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Rodrigo Cargnelutti',
            'email' => 'cargnelutti@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
