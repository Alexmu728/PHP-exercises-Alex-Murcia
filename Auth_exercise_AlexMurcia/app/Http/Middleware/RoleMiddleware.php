<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        
        if ($user && in_array($user->role, $roles)) {
            return $next($request);  // Continuar si el rol del usuario es uno de los permitidos
        }

        // Redirigir si el usuario no tiene el rol adecuado
        return redirect('/dashboard')->with('error', 'You do not have permission to access this page.');
    }
}
