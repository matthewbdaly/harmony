<?php

namespace Matthewbdaly\Harmony\Providers;

use Illuminate\Support\ServiceProvider;
use Matthewbdaly\Harmony\Console\Commands\TransformerMakeCommand;

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
        if ($this->app->runningInConsole()) {
            $this->commands([
                TransformerMakeCommand::class,
            ]);
        }
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
