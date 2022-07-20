<?php

namespace Tiran133\Laravel;


use Illuminate\Support\ServiceProvider;
use Tiran133\IPInfoDB;

class IPInfoDBServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('ipinfodb.php'),
        ]);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;

        // merge default config
        $this->mergeConfigFrom(
            __DIR__ . '/config/config.php',
            'ipinfodb'
        );

        // create image
        $app->singleton('ipinfodb', function ($app) {
            return new IPInfoDB($app['config']->get('ipinfodb.api_key'));
        });
    }


    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'ipinfodb',
        ];
    }
}
