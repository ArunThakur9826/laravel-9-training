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



    'google' => [
        'client_id' => '515461934082-kmg267am02kc2o10lsvtl06cjmk2hu6i.apps.googleusercontent.com', //USE FROM Google DEVELOPER ACCOUNT
        'client_secret' => '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', //USE FROM Google DEVELOPER ACCOUNT
		'redirect' => 'https://development.brstdev.com/arunt/php-taining/laravel9/public/google/callback/',
      ],



      'facebook' => [
        'client_id' => '870329487273883', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '3150d9455092f28779c5ce586d088f7e', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://development.brstdev.com/arunt/php-taining/laravel9/public/facebook/callback/',
      ],


      'linkedin' => [
        'client_id' => '772to2knnbk8xd',
        'client_secret' => 'fLdQ61wk6gfpulF2',
        'redirect' => 'https://development.brstdev.com/arunt/php-taining/laravel9/public/auth/linkedin/callback',

    ],
];
