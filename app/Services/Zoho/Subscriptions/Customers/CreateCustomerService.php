<?php

namespace App\Services\Zoho\Subscriptions\Customers;

use App\Services\Zoho\AbstractZohoService;

class CreateCustomerService extends AbstractZohoService
{
    const METHOD = 'POST';

    private $token = null;
    private $organizationId = null;
    private $url = null;

    public function __construct(string $token, string $organizationId)
    {
        parent::__construct();

        $this->token = $token;
        $this->organizationId = $organizationId;
        $this->url = config('services.zoho.subscriptions.apiUrl').'v1/customers';
    }

    public function __invoke(array $data)
    {
        $_headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Zoho-oauthtoken '.$this->token,
            'X-com-zoho-subscriptions-organizationid' => $this->organizationId,
        ];

        $this->_LogRequest(self::METHOD, $this->url, $_headers, \json_encode($data));

        $response = $this->client->request(self::METHOD, $this->url, [
            'headers' => $_headers,
            'body' => json_encode($data),
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
