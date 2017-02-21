<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfNotRentAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'rent_admin')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/rent/admin/login');
        }
        return $next($request);
    }
}
