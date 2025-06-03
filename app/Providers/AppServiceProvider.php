<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('admin-access', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('manage-users', function ($user) {
            return $user->hasRole('admin');
        });

        Gate::define('view-admin-dashboard', function ($user) {
            return $user->hasRole('admin');
        });

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->hasRole('admin');
        });
    }
}
