<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'manage-users']);
        Permission::create(['name'=>'manage-roles']);
        Permission::create(['name'=>'manage-permissions']);

        $adminRole=Role::create(['name'=>'admin']);
        $managerRole=Role::create(['name'=>'manager']);

        $adminRole->givePermissionTo(['manage-users','manage-roles','manage-permissions']);
        $managerRole->givePermissionTo(['manage-users']);
    }
}
