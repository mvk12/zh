<?php

namespace App\Services\Zoho\Subscriptions\Subscriptions;

use App\Services\Zoho\AbstractZohoService;

class ListSubscriptionsService extends AbstractZohoService
{
    const METHOD = 'GET';

    private $token = null;
    private $organizationId = null;
    private $url = null;

    public function __construct(string $token, string $organizationId)
    {
        parent::__construct();

        $this->token = $token;
        $this->organizationId = $organizationId;
        $this->url = config('services.zoho.subscriptions.apiUrl').'v1/subscriptions';
    }

    public function __invoke(array $filters = [])
    {
        $_headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Zoho-oauthtoken '.$this->token,
            'X-com-zoho-subscriptions-organizationid' => $this->organizationId,
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
