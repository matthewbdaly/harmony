<?php

namespace Matthewbdaly\Harmony\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider
 */
class HarmonyServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'harmony');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
