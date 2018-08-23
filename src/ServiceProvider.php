<?php

namespace Yan\PingPPDashboard;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $defer = true;

    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/pingpp_dashboard.php' => config_path('pingpp_dashboard.php'),
        ]);
    }

    public function register()
    {
        $this->app->singleton(Application::class, function () {
            return new Application(config('pingpp_dashboard'));
        });

        $this->app->alias(Application::class, 'pingpp-dashboard');
    }

    public function provides()
    {
        return [Application::class, 'pingpp-dashboard'];
    }
}