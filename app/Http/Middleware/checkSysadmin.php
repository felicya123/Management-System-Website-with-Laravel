<?php

namespace App\Http\Middleware;

use Closure;

class checkSysadmin
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
        if(Auth::user() != null && Auth::user()->division == "Sysadmin"){
            return $next($request);
        }
        return redirect('/');
    }
}

