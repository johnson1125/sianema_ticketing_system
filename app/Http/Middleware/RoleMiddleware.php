<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $hasAccess = $request->user()->hasRole($role);
        if (! $request->user() || !$hasAccess ) {
            // You can redirect to another page or abort with 403
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

