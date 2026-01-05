<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminRole
{

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check of de gebruiker is ingelogd EN de admin rol heeft.
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request); // Toegang verleend, ga door.
        }

        // Geen toegang, toon een 'Verboden' foutmelding.
        abort(403, 'Unauthorized Action.');
    }

}
