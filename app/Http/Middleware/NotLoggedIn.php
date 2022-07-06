<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class NotLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $requestedurl=url()->current();

        if(\Session::has('userid'))
        {
           
           return redirect($requestedurl);  
        }
        else
        {
            return redirect('/login');
        }
        return $next($request);
    }
}
