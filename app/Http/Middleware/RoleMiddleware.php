<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next, string $role)
    {
         // Pastikan pengguna sudah login
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // Abort jika tidak memiliki izin
        abort(403, 'Akses ditolak. Anda tidak memiliki izin untuk halaman ini.');
    }
}
