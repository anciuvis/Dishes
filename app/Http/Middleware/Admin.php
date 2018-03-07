<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // idedam kelia iki Auth bibliotekos

class Admin
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
			Auth::user(); // returnina prisijungusi vartotoja
			return $next($request);
    }
}
