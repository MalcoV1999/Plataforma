<?php
namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(
        Request $request,
        Closure $next,
        string ...$guards
    ): Response {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                // Redirige según el rol del usuario
                if ($user->hasRole("superadmin")) {
                    return redirect("/superadmin/dashboard");
                } elseif ($user->hasRole("admin")) {
                    return redirect("/admin/dashboard");
                } elseif ($user->hasRole("assistant")) {
                    return redirect("/assistant/dashboard");
                } elseif ($user->hasRole("buyer")) {
                    return redirect("/buyer");
                }

                // Redirección predeterminada
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
