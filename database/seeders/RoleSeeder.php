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

        
        $superAdmin = Role::firstOrCreate(['name' => 'Super Manager']);
        $superAdmin->syncPermissions(Permission::all());

        $admin = Role::firstOrCreate(['name' => 'Manager']);
        $admin->syncPermissions(['manage products', 'view reports']);

        $assistant = Role::firstOrCreate(['name' => 'Asistent']);
        $assistant->syncPermissions(['view reports']);

        $buyer = Role::firstOrCreate(['name' => 'Purchaser']);
        $buyer->syncPermissions(['make purchases']);
    }
}

