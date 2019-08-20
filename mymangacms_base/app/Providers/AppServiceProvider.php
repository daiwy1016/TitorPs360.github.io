<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //escapeboy/jraty 包
        // "escapeboy/jraty": "dev-master",
        //include __DIR__.'/../../vendor/escapeboy/jraty/src/Escapeboy/Jraty/Jraty.php';
        //use Escapeboy\Jraty;
        // $this->app->singleton('Jraty', function () {
        //       return new Jraty();
        // });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
