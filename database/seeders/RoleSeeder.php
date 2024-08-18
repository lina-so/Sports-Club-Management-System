<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permission_role')->delete();
        DB::table('permissions')->delete();
        DB::table('roles')->delete();

        $roles = ['Admin','coach','player'];
        $permissions = [
            'update-permission',

            'create-user',
            'update-user',
            'view-user',
            'delete-user',

            'create-subscription',
            'update-subscription',
            'view-subscription',
            'delete-subscription',

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


        ];

        $permissionIds = [];
        foreach ($permissions as $permission) {
            $per = Permission::create(['name' => $permission]);
            $permissionIds[] = $per->id;
        }

        for ($i = 0; $i < 2; $i++) {
            $role = Role::create(['name' => $roles[$i]]);
            for ($j = $i; $j < count($permissions); $j ++) {
                $role->permissions()->attach($permissionIds[$j],['type' => 'allow']);
            }
        }

    }
}
