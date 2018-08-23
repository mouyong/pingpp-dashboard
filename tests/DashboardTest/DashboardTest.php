<?php

namespace Yan\PingPPDashboard\Tests\DashboardTest;

use Yan\PingPPDashboard\Tests\TestCase;
use Yan\PingPPDashboard\Dashboard\DashboardClient;

class DashboardTest extends TestCase
{
    public function testQueryChargeOrder()
    {
        $client = $this->mockApiClient(DashboardClient::class);

        $orderId = '20180821202858gXLuzTcTKVmJo4Hs';
        $client->expects()->httpGet('api/charge/list', [
            'order_id' => $orderId
        ])->andReturn('mock-result')->once();
        $this->assertSame('mock-result', $client->queryChargeOrder($orderId));
    }
}
