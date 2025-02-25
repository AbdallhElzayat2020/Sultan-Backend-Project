<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceARLangForDashboardMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale('ar');

        return $next($request);
    }
}
