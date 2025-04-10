<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Login;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Company::factory()
            ->count(1000)
            ->has(
                User::factory()
                    ->count(50)
                    ->has(Login::factory()->count(50))
            )->create();
    }
}
