<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Jika rute saat ini adalah login atau register, lewati middleware
        if (in_array($request->route()->getName(), ['login', 'register'])) {
            return $next($request);
        }

        // Cek apakah pengguna sudah login
        if (!auth()->check()) {
            return redirect('/login'); // Redirect ke login jika belum login
        }

        return $next($request);
    }
    
}
