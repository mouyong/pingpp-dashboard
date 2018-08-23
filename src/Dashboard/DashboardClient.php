<?php

namespace Yan\PingPPDashboard\Dashboard;

use Yan\Foundation\Kernel\BaseClient;

class DashboardClient extends BaseClient
{
    protected $baseUri = 'https://dashboard2.pingxx.com';

    public function queryChargeOrder($orderId)
    {
        $response = $this->httpGet('api/charge/list', [
            'order_no' => $orderId,
        ]);

        return $response;
    }
}