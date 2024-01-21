<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('admin', function(User $user){
            return $user->level === 'admin';
        });
        Gate::define('seller', function(User $user){
            return Auth()->User()->level !== 'customer';
        });
        Gate::define('customer', function(User $user){
            return $user->level === 'customer';
        });
    }
}
