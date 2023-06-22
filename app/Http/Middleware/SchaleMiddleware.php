<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SchaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public final function handle(Request $request, Closure $next): Response
    {
        if ($request->is('schale/*')  && !Auth::guard('schale')->check())
            abort(405);

        return $next($request);
    }
}
