<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
    
        // Opcional: si usas MySQL 8.0 o MariaDB 10.2 o superior
        // puedes usar longitud completa con utf8mb4
        // Schema::defaultStringLength(255);
    }
}
