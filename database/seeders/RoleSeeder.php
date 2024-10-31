<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'manage products',
            'view reports',
            'manage users',
            'make purchases',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        
        $superAdmin = Role::firstOrCreate(['name' => 'superadmin']);
        $superAdmin->syncPermissions(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncPermissions(['manage products', 'view reports']);

        $assistant = Role::firstOrCreate(['name' => 'assistant']);
        $assistant->syncPermissions(['view reports']);

        $buyer = Role::firstOrCreate(['name' => 'buyer']);
        $buyer->syncPermissions(['make purchases']);
    }
}


