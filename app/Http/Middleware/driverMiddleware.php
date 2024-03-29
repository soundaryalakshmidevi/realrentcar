<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'driver') {
            return $next($request);
        }

        return redirect()->route('driver.login'); // Redirect to driver login if not a driver
    }
}
