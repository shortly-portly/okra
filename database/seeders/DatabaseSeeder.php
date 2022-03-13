<?php

namespace Database\Seeders;

use App\Models\Objective;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)
            ->has(Objective::factory(10)->hasKeyResults(10))
            ->create();
    }
}
