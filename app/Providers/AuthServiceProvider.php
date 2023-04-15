<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

       // dd($user->roles->first()->slug);
        Gate::define('admin', function($user)
                {
                    //dd($user->roles->first()->slug);
                    return $user->roles->first()->slug=='admin';
                });
                Gate::define('act', function($user)
                {
                    return $user->roles->first()->slug=='act';
                });

    }
}
