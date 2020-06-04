<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        $roles = array_slice(func_get_args(), 2);

        foreach ($roles as $role) {
                if (Auth::check()){
                    if (Auth::user()->has_role($role)) {
                        return $next($request);
                    }
                }
        }
        return back();
    }
}
