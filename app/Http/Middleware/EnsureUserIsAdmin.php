<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If user is not authenticated, redirect to admin login
        if (!$request->user()) {
            return redirect()->route('admin.login');
        }

        // If user is authenticated but not admin, redirect to admin login with error
        if (!$request->user()->isAdmin()) {
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Access denied. Admin privileges required.'
            ]);
        }

        return $next($request);
    }
}
