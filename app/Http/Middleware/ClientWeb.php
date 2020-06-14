<?php

namespace App\Http\Middleware;

use Closure;

class ClientWeb
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
        if(auth()->guard('client-web')->check())
            return $next($request);

        else
            return redirect()->route('login.client');
    }
}
