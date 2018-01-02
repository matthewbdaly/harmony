<?php

namespace Matthewbdaly\Harmony\Providers;

use Illuminate\Support\ServiceProvider;
use Matthewbdaly\Harmony\Console\Commands\TransformerMakeCommand;
use Matthewbdaly\Harmony\Console\Commands\ControllerMakeCommand;

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
                ControllerMakeCommand::class,
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
