<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Superadmin User',
                'username' => 'superadminUser',
                'email'=> 'superadmin@gmail.com',
                'role'=> 'superadmin',
                'status'=> 'active',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name' => 'Admin User',
                'username' => 'adminUser',
                'email'=> 'admin@gmail.com',
                'role'=> 'admin',
                'status'=> 'active',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name' => 'Assistant User',
                'username' => 'assistantUser',
                'email'=> 'assistant@gmail.com',
                'role'=> 'assistant',
                'status'=> 'active',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name' => 'Buyer User',
                'username' => 'buyerUser',
                'email'=> 'buyer@gmail.com',
                'role'=> 'buyer',
                'status'=> 'active',
                'password'=> bcrypt('12345678'),
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create($userData);
            $role = Role::where('name', $userData['role'])->first();
            if ($role) {
                $user->assignRole($role);
            }
        }
    }
}
