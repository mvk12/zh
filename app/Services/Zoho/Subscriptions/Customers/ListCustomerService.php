<?php

namespace App\Services\Zoho\Subscriptions\Customers;

use App\Services\Zoho\AbstractZohoService;

class ListCustomerService extends AbstractZohoService
{
    const METHOD = 'GET';

    private $token = null;
    private $url = null;

    public function __construct(string $token)
    {
        parent::__construct();

        $this->token = $token;
        $this->url = config('services.zoho.subscriptions.apiUrl').'v1/customers';
    }

    public function __invoke(string $organizationId, array $filters = [])
    {
        $_headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Zoho-oauthtoken '.$this->token,
            'X-com-zoho-subscriptions-organizationid' => $organizationId,
        ];

        $this->_LogRequest(self::METHOD, $this->url.(empty($filters) ? '' : '?'.\http_build_query($filters)), $_headers);

        $response = $this->client->request(self::METHOD, $this->url, [
            'headers' => $_headers,
            'query' => $filters,
        ]);

        $strBody = (string) $response->getBody();

        $this->_LogResponse($response);

        return  [
            'raw' => $strBody,
            'statusCode' => (int) $response->getStatusCode(),
            'data' => \json_decode($strBody, true),
        ];
    }
}
