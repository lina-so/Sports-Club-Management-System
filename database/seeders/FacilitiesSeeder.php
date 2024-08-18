<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facility::create(['name' => 'LockerRoom','status'=>'available']);
        Facility::create(['name' => 'Restroom', 'status'=>'available']);
    }
}
