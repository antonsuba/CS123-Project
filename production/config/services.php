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

    /*
    |--------------------------------------------------------------------------
    | Localhost OAuth Services
    |--------------------------------------------------------------------------
    */
    
    'facebook' => [
        'client_id' => '1822291917986039',
        'client_secret' => 'f3c18ba2ed5c62844ef50e404e10a3f6',
        'redirect' => 'http://localhost:8000/auth/facebook/callback/facebook',
    ],
    
    /*
    |--------------------------------------------------------------------------
    | Homestead OAuth Services
    |--------------------------------------------------------------------------
    */
    /*
    'facebook' => [
        'client_id' => '1822295657985665',
        'client_secret' => '1d1aa281bc6a0bb691614f7203a92c3b',
        'redirect' => 'http://wildcard.local/auth/facebook/callback/facebook',
    ],*/

];
