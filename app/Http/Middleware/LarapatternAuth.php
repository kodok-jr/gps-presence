<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LarapatternAuth
{
    /**
     * Handle an incoming request
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)  {
        if (Auth::guard(config('larapattern.auth.guard', 'web'))->guest()) {
            return redirect()->route('administrator.login');
        }

        return $next($request);
    }
}
