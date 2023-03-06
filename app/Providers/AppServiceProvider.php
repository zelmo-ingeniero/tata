<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//para paginate fecha
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

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
        //para paginate
        Paginator::useBootstrap();
        //para fechas en mexicano
        Carbon::setUTF8(true);
        Carbon::setLocale(config("app.locale"));
        setlocale(LC_ALL, "es_MX", "es", "ES", "es_MX.utf8");
    }
}
