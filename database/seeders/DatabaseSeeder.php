<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\DaySeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\ClubSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\Blog\BlogSeeder;
use Database\Seeders\FacilitiesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // FacilitiesSeeder::class,
            // DaySeeder::class,
            // ClubSeeder::class,
            CategorySeeder::class,

        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
