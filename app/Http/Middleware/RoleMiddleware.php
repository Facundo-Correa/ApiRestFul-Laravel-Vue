<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle($request, Closure $next, $role)
    {
        if ($role == 'comercioProv'){
            //dd($role,Auth::user()->role);
            if (Auth::user()->role != 'comercio' && Auth::user()->role != 'proveedor')
                throw new AuthorizationException();
        } else {
            if (Auth::user()->role != $role) throw new AuthorizationException();
        }


        return $next($request);
    }
}
