<?php
namespace App\Http\Controllers\Backend;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function assignRole(Request $request, $id)
    {
        $request->validate([
            "role" => "required|exists:roles,name", // Verifica que el rol existe en la tabla 'roles'
        ]);

        $user = User::findOrFail($id); // Encuentra el usuario por su ID
        $role = $request->input("role"); // Obtén el rol del formulario

        $user->syncRoles([$role]); // Asigna el nuevo rol y elimina los anteriores

        return redirect()
            ->route("user.index")
            ->with(
                "success",
                "Rol '{$role}' asignado al usuario '{$user->name}'."
            );
    }
}
