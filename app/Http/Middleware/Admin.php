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
			// Auth::user() - returnina prisijungusi vartotoja
			if(Auth::check()) { // Auth::check() returnina True/false, ar prisijunges ar ne
				if (Auth::user()->role == 'admin') { // jei userio role yra admin
					// dd(Auth::user()); - pacheckinti koks vartotojas
					return $next($request); // cia praeina laisvai jeigu salyga ivykdyta, tokia logika
				}
				return abort (404, 'You have to be an admin'); // cia nepraeina, nes ne adminas
			}
			return abort (404, 'You have to be logged in'); // neleidzia praeiti irgi, duoda aborto zinute
		}
}
