<?php

namespace App\Http\Middleware;

use RealRashid\SweetAlert\Facades\Alert;
use Closure;
use Auth;

class AdminAccess
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
        if(Auth::check() && Auth::user()->role != 'user') {
            
        return $next($request);
    }

    Alert::error('Error', 'You are not allowed to access this page');

    return redirect(route('dashboard'));
    // ->with('error', 'You are not allowed to access this page.');

}
}
