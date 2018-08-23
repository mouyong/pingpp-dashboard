<?php

namespace Yan\PingPPDashboard\Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use Yan\Foundation\Kernel\Auth\AccessToken;
use Yan\Foundation\Kernel\ServiceContainer;

class TestCase extends BaseTestCase
{
    public function mockApiClient($name, $methods = [], ServiceContainer $app = null)
    {
        $methods = implode(',', array_merge([
            'httpGet', 'httpPost', 'httpPostJson', 'httpUpload',
            'request', 'requestRaw', 'registerMiddlewares',
        ], (array) $methods));

        $client = \Mockery::mock($name."[{$methods}]", [
                $app ?? \Mockery::mock(ServiceContainer::class),
                \Mockery::mock(AccessToken::class)
            ])->shouldAllowMockingProtectedMethods();
        $client->allows()->registerHttpMiddlewares()->andReturnNull();

        return $client;
    }

    public function tearDown()
    {
        \Mockery::close();

        parent::tearDown();
    }
}