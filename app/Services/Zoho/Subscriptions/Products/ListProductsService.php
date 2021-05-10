<?php

namespace App\Services\Zoho\Subscriptions\Products;

use GuzzleHttp\Client;

class ListProductsService
{
    private $client;
    private $token = null;

    public function __construct(string $token)
    {
        $this->token = $token;
        $this->client = new Client([
            'base_uri' => config('services.zoho.subscriptions.apiUrl'),
            'http_errors' => false,
        ]);
    }

    public function __invoke(string $organizationId)
    {
        $response = $this->client->request('GET', 'v1/products', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Zoho-oauthtoken '.$this->token,
                'X-com-zoho-subscriptions-organizationid' => $organizationId,
            ],
        ]);

        $strBody = (string) $response->getBody();

        return  [
            'raw' => $strBody,
            'data' => \json_decode($strBody, true),
        ];
    }
}
