<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class SecretArea
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Sentinel::getUser())
        {
            return redirect()->route('auth.login.form');
        }
        return $next($request);
    }
}
