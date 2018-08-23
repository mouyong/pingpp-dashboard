<?php

return [
    'app' => [
        'app_id' => env('PINGPP_APP_ID', ''),
        'live_mode' => env('PINGPP_LIVE_MODE', 1),
    ],

    'user' => [
        'email' => env('PINGPP_EMAIL', ''),
        'password' => env('PINGPP_PASSWORD', ''),
        'system' => 'platform',
    ],

    'http' => [
        'timeout' => 3.0
    ]
];