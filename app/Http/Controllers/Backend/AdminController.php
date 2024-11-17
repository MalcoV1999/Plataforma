<?php

namespace App\Http\Controllers\Backend;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (auth()->check() && auth()->user()->hasRole("admin")) {
            // El usuario tiene el rol de 'admin'
            return view("admin.dashboard");
        }

        abort(403, "No tienes acceso a esta sección");
    }
    public function testRole()
    {
        $user = auth()->user();

        // Verifica si el usuario tiene el rol "buyer"
        if ($user->hasRole("buyer")) {
            return "El usuario tiene el rol de 'buyer'";
        }

        return "El usuario no tiene el rol de 'buyer'";
    }
}
