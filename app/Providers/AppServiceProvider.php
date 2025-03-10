<?php

namespace App\Providers;

use App\Models\Categories;
use Illuminate\Support\ServiceProvider;
use App\Models\Product;

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
        view()->share('logo', asset('images/logo.png'));
        view()->share('products', Product::all());
        view()->share('categories', Categories::all());
    }
}
