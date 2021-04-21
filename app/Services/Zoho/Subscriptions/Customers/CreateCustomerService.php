<?php

namespace App\Services\Zoho\Subscriptions\Customers;

use GuzzleHttp\Client;

class CreateCustomerService
{
    private $client;
    private $token = null;
    private $organizationId = null;

    public function __construct(string $token, string $organizationId)
    {
        $this->token = $token;
        $this->organizationId = $organizationId;
        $this->client = new Client([
            'base_uri' => config('services.zoho.subscriptions.apiUrl'),
            'http_errors' => false,
        ]);
    }

    public function __invoke(array $data)
    {
        $response = $this->client->request('POST', 'v1/customers', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Zoho-oauthtoken '.$this->token,
                'X-com-zoho-subscriptions-organizationid' => $this->organizationId,
            ],
            'json' => $data,
        ]);

        $strBody = (string) $response->getBody();

        return  [
            'raw' => $strBody,
            'data' => \json_decode($strBody),
        ];
    }
}
