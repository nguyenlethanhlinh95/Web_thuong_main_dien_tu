<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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

        if (Auth::check())
        {
            //check if admin redirect to dark board
            if (Auth::user()->isAdmin())
            {
                return $next($request);
            }
            // redirect to home
            return redirect()->route('index');
        }
        return redirect('login');
    }
}
