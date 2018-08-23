<?php

namespace Yan\PingPPDashboard\Auth;

use Psr\Http\Message\RequestInterface;
use Yan\Foundation\Kernel\Auth\BearerToken;

class AccessToken extends BearerToken
{
    protected $endpointToGetToken = 'https://passport.pingxx.com/api/user/login';

    protected $tokenKey = 'data.message.token';

    public function applyQuery(RequestInterface $request, array $requestOptions = []): RequestInterface
    {
        parse_str($request->getUri()->getQuery(), $query);

        $query = http_build_query(array_merge([
            'app_id' => $this->app['config']->get('app.app_id'),
            'live_mode' => $this->app['config']->get('app.live_mode'),
        ], $query));

        return $request->withUri($request->getUri()->withQuery($query));
    }

    protected function getCredentials(): array
    {
        $user = $this->app['config']['user'];

        return [
            'email' => $user['email'],
            'password' => $user['password'],
            'system' => $user['system'] ?? 'platform',
        ];
    }
}