<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\IServiceA;
use App\Contracts\IServiceB;
use App\Contracts\IServiceC;
use App\Contracts\IServiceD;
use App\Contracts\IServiceAggregator;

use App\Services\ServiceA;
use App\Services\ServiceC;
use App\Services\ServiceD;
use App\Services\ServiceAext;
use App\Services\ServiceAggregator;

class SampleServiceProvider extends ServiceProvider
{
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
        // $this->app is the Laravel Service Container
        $this->app->bind(ServiceA::class, function($app) {
            // $app is the Laravel Service Container and could be used here to resolve sub-dependencies of the object we are building
            return new ServiceA();
        });

        $this->app->resolving(ServiceA::class, function ($api, $app) {
            echo "resolving ServiceA<br/>";
        });

        $this->app->bind(IServiceA::class, function($app) {
            return new ServiceA();
        });

        $this->app->resolving(IServiceA::class, function ($api, $app) {
            echo "resolving IServiceA<br/>";
        });
        
        $this->app->bind(IServiceD::class, function($app, $with) {
            
            if(count($with) === 0)
            {
                $with = [ 'value' => 'value-D' ];
            }

            return new ServiceD($with['value']);
        });

        $this->app->resolving(IServiceD::class, function ($api, $app) {
            echo "resolving IServiceD<br/>";
        });
        
        // Binding instance like singleton
        $serviceC = new ServiceC();
        $this->app->instance(IServiceC::class, $serviceC);

        // primitive value for contextual binding. Note that it works on constructor
        $this->app->when('App\Http\Controllers\ServiceContainerSampleController')
                  ->needs('$primitive')
                  ->give('primitive-value');

        $this->app->tag([ IServiceA::class, IServiceB::class, IServiceC::class ], 'services');

        $this->app->bind(IServiceAggregator::class, function ($app) {
            var_dump($app->tagged('services'));
            echo "Note that ServiceA is resolved another time because IServiceA create it</br/>";
            return new ServiceAggregator();
        });

        //The extend method allows the decoration resolved services
        $this->app->extend(ServiceA::class, function($service) {
            echo "extending ServiceA, but very poor extension<br/>";
            return new ServiceA('value-A-ext');
        });
    }
}