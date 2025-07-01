<?php

return [

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // default guard tetap web
        'passwords' => env('AUTH_PASSWORD_BROKER', 'admins'), // diganti ke 'admins'
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users', // opsional, kalau kamu pakai User model biasa
        ],
        'trash' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'eco' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class, // default User model
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
    ],

    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        // opsional jika kamu pakai model User juga
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
