<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\IServiceB;
use App\Services\ServiceB;

class DeferredSampleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Once a singleton binding is resolved, the same object instance will be returned on subsequent calls into the container
        $this->app->singleton(IServiceB::class, function ($app) {
            return new ServiceB();
        });

        $this->app->resolving(IServiceB::class, function ($api, $app) {
            echo "resolving singleton IServiceB<br/>";
        });
    }

    /**
     * Get the services container bindings registered by the provider.
     * 
     * @return array
     */
    public function provides()
    {
        return [ IServiceB::class ];
    }
}