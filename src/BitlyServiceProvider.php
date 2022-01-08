<?php

namespace NoamanMahmoud\BitlyLink;
use Illuminate\Support\ServiceProvider;

class BitlyServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any package services.
     *
     * @return void
     */

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/Bitly.php' => config_path('Bitly.php'),
        ],'Bitly');
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/Bitly.php', 'Bitly'
        );
    }
}