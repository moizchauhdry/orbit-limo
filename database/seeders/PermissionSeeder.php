<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',

            'driver-list',
            'driver-create',
            'driver-edit',
            'driver-delete',

            'booking-list',
            'booking-create',
            'booking-edit',
            'booking-delete',

            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',

            'vehicle-list',
            'vehicle-create',
            'vehicle-edit',
            'vehicle-delete',

            'coupon-list',
            'coupon-create',
            'coupon-edit',
            'coupon-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
