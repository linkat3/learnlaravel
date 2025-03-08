<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
//use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
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
        Model::preventLazyLoading();//para mensaje de aviso del uso Lazy y poner indicar mínimo de carga de sql
        
        //Paginator::useBootstrapFive();
    }
}
