<?php

namespace App\Http\Middleware;

use App\Enums\Status;
use Closure;
use Illuminate\Http\Request;

class CheckAccountStatusMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->status->is(Status::INACTIVE)) {

            auth()->logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return to_route('login')->withErrors(['email' => 'تم إيقاف حسابك. الرجاء التواصل مع أحد المديرين.']);
        }

        return $next($request);
    }
}
