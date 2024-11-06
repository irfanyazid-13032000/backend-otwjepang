<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth as Authentication;


class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Check if the user is not authenticated
         if (!Authentication::check()) {
            // Redirect to the  route if not authenticated
            return redirect()->route('login');
        }

        return $next($request); // Proceed if authenticated
    }
}
