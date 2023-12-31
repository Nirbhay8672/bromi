<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Superadmin
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
		if (Auth::user()->role_id == 3) {
            return $next($request);
        }
		return redirect('/logout');
        return redirect('/')->with('warning', trans('auth.sufficient_permissions'));
    }
}
