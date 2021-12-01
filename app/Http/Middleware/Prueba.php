<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Prueba
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if (! $request->user()->hasRole($role)) {
         redirect()->route('home');
        }
        else{
            return 'ERROR';
        }
    
    }
}
