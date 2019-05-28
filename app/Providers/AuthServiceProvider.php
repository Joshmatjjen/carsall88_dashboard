<?php

namespace App\Providers;
use Laravel\Passport\Passport;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('isAdmin', function($user){
            return $user->type === 'admin';
        });

        Gate::define('isDeveloper', function($user){
            return $user->type === 'developer';
        });

        Gate::define('isMechanic', function($user){
            return $user->type === 'Mechanic';
        });

        Gate::define('isUser', function($user){
            return $user->type === 'user';
        });

        Gate::define('isAdminORDeveloper', function($user){
            if($user->type === 'admin' || $user->type === 'developer'){
                return  true;
            }
        });

        Gate::define('isAdminORDeveloperORMechanic', function($user){
            if($user->type === 'admin' || $user->type === 'developer' || $user->type === 'mechanic'){
                return  true;
            }
        });

        Passport::routes();
        //
    }
}
