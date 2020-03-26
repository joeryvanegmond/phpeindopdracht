<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckManager
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
        if (Auth::user() != null)
        {
            $userRoles = Auth::user()->roles->pluck('name');

            if($userRoles->contains('manager'))
            {
                return $next($request);
            } else
            {
                return redirect('/unauthorized');
            }
        } else
        {
            return redirect('login');
        }
    }
}
