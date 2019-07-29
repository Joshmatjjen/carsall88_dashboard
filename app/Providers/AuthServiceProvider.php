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
            return $user->type === 'Admin';
        });

        Gate::define('isDeveloper', function($user){
            return $user->type === 'Developer';
        });

        Gate::define('isMechanic', function($user){
            return $user->type === 'Mechanic';
        });

        Gate::define('isUser', function($user){
            return $user->type === 'User';
        });

        Gate::define('isAdminORDeveloper', function($user){
            if($user->type === 'Admin' || $user->type === 'Developer'){
                return  true;
            }
        });

        Gate::define('isAdminORDeveloperORMechanic', function($user){
            if($user->type === 'Admin' || $user->type === 'Developer' || $user->type === 'Mechanic'){
                return  true;
            }
        });

        Passport::routes();
        //
    }
}
