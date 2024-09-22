<?php

namespace BehinInit\App\Http\Middleware;

use BehinInit\App\Http\Controllers\AccessController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Access
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $access_name = null)
    {
        $guards = empty($guards) ? [null] : $guards;

        if(!Auth::id()){
            return abort(403, 'ابتدا وارد شوید');
        }
        $route = $request->route()->uri();
        $access_name = $access_name ? $access_name : $route;
        $a = new AccessController($access_name);
        if(!$a->check()){
            return abort(403, "Forbidden For Route: " . $access_name);
        }



        return $next($request);
    }
}
