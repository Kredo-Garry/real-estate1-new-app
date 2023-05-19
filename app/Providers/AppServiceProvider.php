<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Pagination\Paginator;
use App\Models\User;

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
        
        Gate::define('admin', function($user){
            return $user->role_id === User::ADMIN_ROLE_ID
                ? Response::allow()
                : Response::deny('An administrator account is needed to access this page.');
        });
        
        Paginator::useBootstrap();
    }
}
