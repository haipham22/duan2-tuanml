<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class ValidateAdmin
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
        if(Auth::check() && !Auth::user()->is_admin) {
            return redirect('/');
        }
        return $next($request);
    }
}
