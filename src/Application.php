<?php

namespace Yan\PingPPDashboard;

use Yan\Foundation\Kernel\ServiceContainer;

/**
 * Class Application
 *
 * @property \Yan\PingPPDashboard\Dashboard\DashboardClient $dashboard
 *
 * @package Yan\PingPPDashboard
 */
class Application extends ServiceContainer
{
    protected $providers = [
        Auth\ServiceProvider::class,
        Dashboard\ServiceProvider::class,
    ];

    public function __construct(array $config = [])
    {
        $this->defaultConfig = $config;

        parent::__construct();
    }
}