<?php

namespace Yan\PingPPDashboard\Auth;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider  implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['accessToken'] = function ($app) {
            return new AccessToken($app);
        };
    }
}