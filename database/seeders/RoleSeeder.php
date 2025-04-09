<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Optional: Create some basic permissions and assign to admin
        // Uncomment if you want to add permissions
        /*
        $permissions = [
            'view-dashboard',
            'manage-users',
            'manage-products',
            'manage-orders',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $adminRole->givePermissionTo(Permission::all());
        $userRole->givePermissionTo(['view-dashboard']);
        */
    }
}
