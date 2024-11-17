<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear los roles si no existen
        $roles = ["superadmin", "admin", "assistant", "buyer"];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(["name" => $roleName]);
        }

        // Datos de usuarios
        $users = [
            [
                "name" => "Superadmin User",
                "username" => "superadminUser",
                "email" => "superadmin@gmail.com",
                "role" => "superadmin",
                "status" => "active",
                "password" => bcrypt("12345678"),
            ],
            [
                "name" => "Admin User",
                "username" => "adminUser",
                "email" => "admin@gmail.com",
                "role" => "admin",
                "status" => "active",
                "password" => bcrypt("12345678"),
            ],
            [
                "name" => "Assistant User",
                "username" => "assistantUser",
                "email" => "assistant@gmail.com",
                "role" => "assistant",
                "status" => "active",
                "password" => bcrypt("12345678"),
            ],
            [
                "name" => "Buyer User",
                "username" => "buyerUser",
                "email" => "buyer@gmail.com",
                "role" => "buyer",
                "status" => "active",
                "password" => bcrypt("12345678"),
            ],
        ];

        // Crear usuarios y asignar roles
        foreach ($users as $userData) {
            $user = User::updateOrCreate(
                // Identifica al usuario único por su email
                ["email" => $userData["email"]],
                [
                    "name" => $userData["name"],
                    "username" => $userData["username"],
                    "status" => $userData["status"],
                    "password" => $userData["password"],
                ]
            );

            // Buscar el rol y asignarlo al usuario
            $role = Role::where("name", $userData["role"])->first();
            if ($role) {
                $user->syncRoles([$role->name]); // Asegurar que el usuario tenga solo este rol
            } else {
                $this->command->error("El rol {$userData["role"]} no existe.");
            }
        }
    }
}
