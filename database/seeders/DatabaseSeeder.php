<?php

namespace Database\Seeders;

use App\Models\Calls;
use App\Models\Ratings;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
        User::factory()->count(50)->create([
            'role' => 'user',
        ]);
        User::factory()->count(50)->create([
            'role' => 'agent',
        ]);


        Calls::factory()->count(200)->create();
        Ratings::factory()->count(200)->create();
    }
}
