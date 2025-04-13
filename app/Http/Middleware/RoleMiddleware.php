<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  mixed  ...$roles  One or more roles that are allowed
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Ensure the user is authenticated.
        if (!Auth::check()) {
            // If the user is not logged in, redirect them to the login page.
            return redirect()->route('login');
        }

        $userRole = Auth::user()->role;

        // Check if the user's role is one of the allowed roles.
        if (!in_array($userRole, $roles)) {
            // Option 1: Abort with a 403 error if unauthorized.
            abort(403, 'You do not have permission to access this resource.');
            // Option 2: Alternatively, you could redirect the user with an error message.
            // return redirect()->route('dashboard')->with('error', 'Unauthorized access.');
        }

        // If role is allowed, let the request proceed.
        return $next($request);
    }
}
