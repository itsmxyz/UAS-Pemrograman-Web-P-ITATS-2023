<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SRTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public final function handle(Request $request, Closure $next): Response
    {
        if ($request->is('schale/dashboard', 'logout-schale',
                'data-siswa', 'schale/sensei', 'data-sekretaris')
            && !Auth::guard('schale')->check()) {
            return redirect('/DADA');
        }
        return $next($request);
    }
}
