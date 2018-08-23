<?php

namespace Yan\PingPPDashboard\Dashboard;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider  implements ServiceProviderInterface
{
    public function register(Container $pimple)
    {
        $pimple['dashboard'] = function ($app) {
            return new DashboardClient($app);
        };
    }
}