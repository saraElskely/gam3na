<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
    'client_id' => '214739249039533',
    'client_secret' => 'b2b1fdfa17eb4478ae9c568778d14a6b',
    'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],

    'twitter' => [
        'client_id' => '3HlAlZMbnXSp3xo8l8n5IfRuq',
        'client_secret' => 'wSoRtAZ5TL73iGJm1Ksq8yfBvH6JKKmbdMCKmKt8ElTMIHRRyP',
        'redirect' => 'http://127.0.0.1:8000/login/twitter/callback',
    ],

    'google' => [
        'client_id' => '457065386822-8t4dik08vkfs1okp570uicsgt2nfd85a.apps.googleusercontent.com',
        'client_secret' => 'yoaOBWJ201NXRnuVyasg9B8R',
        'redirect' => 'http://127.0.0.1:8000/login/google/callback',
    ],

];
