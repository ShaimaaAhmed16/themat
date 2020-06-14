<?php

namespace App\Http\Middleware;

use Closure;

class IsActive
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
        if ($request->user('client-web')->status !=true ) {
//            Auth::logout();
            flash()->error('هذا المستخدم غير مفعل');
            return back();
            //return redirect(route('login.client'));
        }
        return $next($request);
    }
}
