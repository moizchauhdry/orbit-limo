<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\UserPermission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_array = [
            [
                'name' => 'manage_users',
                'type' => 'parent',
                'order' => 1,
            ],
            [
                'name' => 'manage_permissions',
                'type' => 'parent',
                'order' => 2,
            ],
            [
                'name' => 'manage_drivers',
                'type' => 'parent',
                'order' => 3,
            ],
            [
                'name' => 'manage_configurations',
                'type' => 'parent',
                'order' => 4,
            ],
        ];

        foreach ($permission_array as $permission_arr) {
            Permission::updateOrCreate(['name' => $permission_arr['name']], $permission_arr);
        }

        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            UserPermission::updateOrCreate(['user_id' => 1, 'permission_id' => $permission->id], [
                'user_id' => 1,
                'permission_id' => $permission->id
            ]);
        }
    }
}
