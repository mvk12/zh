<?php

namespace App\Services\Zoho\Subscriptions\Plans;

use App\Services\Zoho\AbstractZohoService;

class ListPlansService extends AbstractZohoService
{
    const METHOD = 'GET';

    private $token = null;
    private $url = null;

    public function __construct(string $token)
    {
        parent::__construct();

        $this->token = $token;
        $this->url = config('services.zoho.subscriptions.apiUrl').'v1/plans';
    }

    public function __invoke(string $organizationId)
    {
        $_headers = [
            'Accept' => 'application/json',
            'Authorization' => 'Zoho-oauthtoken '.$this->token,
            'X-com-zoho-subscriptions-organizationid' => $organizationId,
        ];

        $this->_LogRequest(self::METHOD, $this->url, $_headers);

        $response = $this->client->request(self::METHOD, $this->url, [
            'headers' => $_headers,
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
