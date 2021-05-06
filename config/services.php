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
        'selfclient' => [
            'id' => env('ZOHO_SELF_CLIENT_ID'),
            'secret' => env('ZOHO_SELF_CLIENT_SECRET'),
        ],
        'accounts' => [
            'url' => env('ZOHO_ACCOUNTS_URL'),
            'authUrl' => env('ZOHO_ACCOUNTS_AUTH_URL'),
            'tokenUrl' => env('ZOHO_ACCOUNTS_TOKEN_URL'),
        ],
        'currentOrganizationId' => env('ZOHO_CURRENT_ORGANIZATION_ID'),
        'redirectUrl' => env('ZOHO_SUBSCRIPTIONS_REDIRECT_URL'),
        'subscriptions' => [
            'apiUrl' => env('ZOHO_SUBSCRIPTIONS_API_URL'),
        ],
    ],
];
