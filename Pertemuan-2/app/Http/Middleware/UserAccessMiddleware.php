<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        // Cek apakah user sudah login dan memiliki role yang sesuai
        if (Auth::check() && Auth::user()->role == $userType) {
            return $next($request);
        }

        // Jika user tidak memiliki akses, kirim pesan error
        return response()->json([
            'error' => 'You do not have permission to access this page',
            'userType' => $userType
        ], 403);
    }
}
