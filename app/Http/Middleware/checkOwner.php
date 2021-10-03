<?php

namespace App\Http\Middleware;

use Closure;
use \Illuminate\Support\Facades\Auth;

class checkOwner
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
        if(Auth::user() != null && Auth::user()->division == "IT_Owner"){
            return $next($request);
        }
        return $next($request);
    }
}