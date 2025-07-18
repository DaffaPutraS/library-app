<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Jika user tidak login, redirect ke login
        if (!$request->user()) {
            return redirect()->route('login');
        }
        
        // Jika tidak ada role yang diperlukan, izinkan
        if (empty($roles)) {
            return $next($request);
        }
        
        // Jika role user cocok dengan yang diizinkan
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }
        
        // Jika tidak punya akses
        return abort(403, 'Anda tidak memiliki akses ke halaman ini');
    }
}