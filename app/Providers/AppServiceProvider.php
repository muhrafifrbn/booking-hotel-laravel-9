<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Gate;

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

        // Authorization
        Gate::define("admin", function(User $user){
            return $user->hak_akses == "admin";
        });

        Gate::define("user", function(User $user){
            return $user->hak_akses != "admin" AND $user->hak_akses != "resepsionis";
        });

        Gate::define("resepsionis", function(User $user){
            return $user->hak_akses == "resepsionis";
        });
       
        // Redirect Authenticated Users
        RedirectIfAuthenticated::redirectUsing(function () {
            return route('utama');
        });
    }
}
