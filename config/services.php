<?php

return [
    'twitch' => [
        'key' => env('TWITCH_HELIX_KEY'),
        'secret' => env('TWITCH_HELIX_SECRET'),
        'token' => env('TWITCH_ACCESS_TOKEN'),
    ],

    'outlook' => [
        'password' => env('OUTLOOK_APP_PASSWORD')
    ],

    'ukblabberbox' => [
        'password' => env('UKBB_PASSWORD')
    ],

    'sketchni' => [
        'password' => env('SKETCHNI_PASSWORD')
    ],

    'linkcraft' => [
        'password' => env('LINKCRAFT_PASSWORD')
    ]
];
