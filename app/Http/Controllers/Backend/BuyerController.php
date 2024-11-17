<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    // Constructor para proteger las rutas de este controlador
    public function __construct()
    {
        $this->middleware(["auth", "role:buyer"])->except("loginForm", "login");
    }

    // Dashboard del comprador
    public function dashboard()
    {
        $user = auth()->user(); // Usuario autenticado
        return view("buyer.dashboard", compact("user")); // Pasar el usuario a la vista
    }

    // Mostrar formulario de login
    public function loginForm()
    {
        return view("buyer.auth.login"); // Retorna la vista del formulario de inicio de sesión
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($request->only("email", "password"))) {
            $user = auth()->user();

            // Verificar si el usuario tiene el rol de 'buyer'
            if ($user->hasRole("buyer")) {
                return redirect()->route("buyer.dashboard"); // Redirige al dashboard del comprador
            }

            // Si no es un comprador, cerramos la sesión
            Auth::logout();
            return back()->withErrors([
                "email" => "No tienes acceso como comprador.",
            ]);
        }

        // Si la autenticación falla, regresar con un error
        return back()->withErrors(["email" => "Credenciales inválidas."]);
    }

    // Cerrar sesión del comprador
    public function logout()
    {
        Auth::logout(); // Cierra la sesión actual
        return redirect()->route("buyer.loginForm"); // Redirige al formulario de inicio de sesión
    }
}
