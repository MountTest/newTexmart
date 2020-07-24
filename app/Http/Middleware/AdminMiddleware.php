<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role->name == 'admin' || auth()->check() && auth()->user()->role->name == 'operator') {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
