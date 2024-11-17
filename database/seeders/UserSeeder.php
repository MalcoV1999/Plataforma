<?php
namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder; // Asegúrate de importar Seeder
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear los roles si no existen
        $roles = ['superadmin', 'admin', 'assistant', 'buyer'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Datos de usuarios
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

        // Crear usuarios y asignar roles
        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'username' => $userData['username'],
                'email' => $userData['email'],
                'status' => $userData['status'],
                'password' => $userData['password'],
            ]);

            $role = Role::where('name', $userData['role'])->first();
            if ($role) {
                $user->assignRole($role);
            }
        }
    }
}
