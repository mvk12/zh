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

    'zoho' => [
        'currentToken' => env('ZOHO_CURRENT_TOKEN'),
        'currentOrganizationId' => env('ZOHO_CURRENT_ORGANIZATION_ID'),
        'url' => env('ZOHO_SUBSCRIPTIONS_URL'),
        'authUrl' => env('ZOHO_SUBSCRIPTIONS_AUTH_URL'),
        'tokenUrl' => env('ZOHO_SUBSCRIPTIONS_TOKEN_URL'),
        'clientId' => env('ZOHO_SUBSCRIPTIONS_CLIENT_ID'),
        'clientSecret' => env('ZOHO_SUBSCRIPTIONS_CLIENT_SECRET'),
        'redirectUrl' => env('ZOHO_SUBSCRIPTIONS_REDIRECT_URL'),
        'subscriptions' => [
            'apiUrl' => env('ZOHO_SUBSCRIPTIONS_API_URL'),
        ],
    ],
];
