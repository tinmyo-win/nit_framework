<?php

use App\Providers\AppServiceProvider;
use App\Providers\RequestServiceProvider;

return [
    'name' => env('APP_NAME'),
    'debug' => env('APP_DEBUG', false),

    'providers' => [
        AppServiceProvider::class,
        RequestServiceProvider::class,
    ]
];