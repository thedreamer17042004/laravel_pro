<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

     public function handle($request, Closure $next, ...$guards)
     {
        if(!Auth::check()) {
            return redirect()->route('loginAdmin');
        }

        $user = Auth::user();



        $route = $request->route()->getName();

        if($user->cant($route)) {
            return redirect()->route('admin.error',
             ['code'=>403]
            );
        }

        
        return $next($request);
     }
   
}
