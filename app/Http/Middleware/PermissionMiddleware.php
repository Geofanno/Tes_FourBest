<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $permission)
    {
        if (!Auth::user()->permissions->contains('name', $permission)) {
            abort(403);
        }
        return $next($request);
    }
}
