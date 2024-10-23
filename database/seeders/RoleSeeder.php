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
            Permission::create(['name' => $permission]);
        }

      
        $superAdmin = Role::create(['name' => 'Super Manager']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin = Role::create(['name' => 'Manager']);
        $admin->givePermissionTo(['manage products', 'view reports']);

        $assistant = Role::create(['name' => 'Asistent']);
        $assistant->givePermissionTo('view reports');

        $buyer = Role::create(['name' => 'Purchaser']);
        $buyer->givePermissionTo('make purchases');
    }
}

