<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    // 'google' => [
    //     'client_id'     => env('GOOGLE_CLIENT_ID'),
    //     'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    //     'redirect'      => env('GOOGLE_REDIRECT')
    // ],
    'google' => [
        'client_id'     => '767693761590-544ggek7v3r8rnl2smc95b284a5smdkl.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'http://127.0.0.1:8000/google/callback',
    ],
];
