<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('admin')->user();

        if (!$user || $user->role !== 'superadmin') {
            abort(403, 'Akses ditolak. Hanya superadmin yang bisa masuk.');
        }

        return $next($request);
    }
}
