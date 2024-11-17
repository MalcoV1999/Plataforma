<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all(); // Obtiene todos los roles disponibles

        return view("user.index", compact("users", "roles"));
    }

    public function create()
    {
        $roles = Role::all(); // Pasa los roles a la vista
        return view("user.create", compact("roles"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "username" => "nullable|string|max:255",
            "image" => "nullable|string|max:255",
            "phone" => "nullable|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "role" => "required|exists:roles,name", // Verifica que el rol existe en la tabla 'roles'
            "status" => "required|in:active,inactive",
            "password" => "required|string|min:8|confirmed",
        ]);

        // Crea el usuario
        $user = User::create([
            "name" => $request->input("name"),
            "username" => $request->input("username") ?: null, // Si no se proporciona, será nulo
            "phone" => $request->input("phone") ?: null, // Igual para el teléfono
            "image" =>
                $request->input("image") ?: "uploads/default_profile.png", // Imagen por defecto
            "email" => $request->input("email"),
            "status" => $request->input("status"),
            "password" => Hash::make($request->input("password")), // Encripta la contraseña
        ]);

        // Asigna el rol al usuario
        $user->assignRole($request->input("role"));

        return redirect()
            ->route("user.show", $user->id)
            ->with("success", "Usuario creado y rol asignado.");
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view("user.show", ["user" => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Pasa los roles a la vista
        return view("user.edit", compact("user", "roles"));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            "name" => "required|string|max:255",
            "username" => "nullable|string|max:255",
            "image" => "nullable|string|max:255",
            "phone" => "nullable|string|max:255",
            "email" =>
                "required|string|email|max:255|unique:users,email," . $id,
            "role" => "required|exists:roles,name", // Verifica que el rol existe
            "status" => "required|in:active,inactive",
            "password" => "nullable|string|min:8|confirmed",
        ]);

        // Actualiza el usuario
        $user->update([
            "name" => $request->input("name"),
            "username" => $request->input("username"),
            "image" => $request->input("image") ?: $user->image,
            "phone" => $request->input("phone"),
            "email" => $request->input("email"),
            "status" => $request->input("status"),
            "password" => $request->filled("password")
                ? Hash::make($request->input("password"))
                : $user->password,
        ]);

        // Sincroniza el rol del usuario
        $user->syncRoles([$request->input("role")]);

        return redirect()
            ->route("user.show", $user->id)
            ->with("success", "Usuario actualizado y rol sincronizado.");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()
            ->route("user.index")
            ->with("success", "Usuario eliminado.");
    }

    public function assignRole(Request $request, $id)
    {
        $request->validate([
            "role" => "required|exists:roles,name", // Verifica que el rol existe
        ]);

        $user = User::findOrFail($id);
        $role = $request->input("role");

        $user->syncRoles([$role]); // Asigna el nuevo rol y elimina los anteriores

        return redirect()
            ->route("user.index")
            ->with(
                "success",
                "Rol '{$role}' asignado al usuario '{$user->name}'."
            );
    }
}
