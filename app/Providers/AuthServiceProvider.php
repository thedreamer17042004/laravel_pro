<?php

namespace App\Providers;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // app(Gate::class)->before(function(Authorize $auth, $route) {
        //     if(method_exists($auth, 'hasPermission')){
        //         return $auth->hasPermission($route) ?  $auth->hasPermission($route) : false;
        //     }

        //     return false;
        // });
        Gate::before(function (User $user, string $ability) {
            if ($user->hasPermission($ability)) {
                return true;
            }
            return false;
        });
    }
}
