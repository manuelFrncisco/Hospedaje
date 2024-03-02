<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && ($request->user()->level_id != 2 && $request->user()->level_id != 3)) {
            // El usuario no tiene permisos suficientes
            return redirect()->route('home')->with('error', 'No tienes permisos para acceder a esta página.');
        }

        return $next($request);
    }
}
