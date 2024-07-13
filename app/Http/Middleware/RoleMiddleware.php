<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::user()->roles->contains('name', $role)) {
            abort(403);
        }
        return $next($request);
    }
}
