<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 use App\Http\Controllers\ProductController;

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
    // public function boot(): void
    // {
    //     //
    // }
   

public function boot()
{
    view()->composer('*', function ($view) {
        $view->with('cartCount', ProductController::cartItem());
    });
}
}
