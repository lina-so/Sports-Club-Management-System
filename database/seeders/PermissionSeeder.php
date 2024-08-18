<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->delete();
        $permissions = [
            'create-user',
            'update-user',
            'view-user',
            'delete-user',

            'create-subscription',
            'update-subscription',
            'view-subscription',
            'delete-subscription',
            'show-subscription',

            'create-facility',
            'update-facility',
            'view-facility',
            'delete-facility',
            'show-facility',

            'create-club',
            'update-club',
            'view-club',
            'delete-club',
            'show-club',

            'create-sport',
            'update-sport',
            'view-sport',
            'delete-sport',
            'show-sport',

            'update-permission',

        ];
        foreach($permissions as $permission)
        {
            Permission::create(['name'=>$permission]);
        }
    }
}
