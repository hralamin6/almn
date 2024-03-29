<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        $gate->define('isAdmin', function ($user){
            return $user->type == 'admin';
        });
        $gate->define('isBlogger', function ($user){
            return $user->type == 'blogger';
        });
        $gate->define('isUser', function ($user){
            return $user->type == 'user';
        });
    }
}
