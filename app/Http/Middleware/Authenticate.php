<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
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

        dd($user->can($route));
        // dd($route);
     }
    // protected function redirectTo($request)
    // {
    //     if (!$request->expectsJson()) {
    //         return route('login');
    //     }
    // }
}
