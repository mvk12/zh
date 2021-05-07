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
        $_method = 'POST';
        $_headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Zoho-oauthtoken '.$this->token,
            'X-com-zoho-subscriptions-organizationid' => $this->organizationId,
        ];

        $this->_LogRequest($_method, config('services.zoho.subscriptions.apiUrl').'v1/customers', $_headers, \json_encode($data));

        $response = $this->client->request('POST', 'v1/customers', [
            'headers' => $_headers,
            'body' => json_encode($data),
        ]);

        $statusCode = (int) $response->getStatusCode();
        $headers = $response->getHeaders();
        $strBody = (string) $response->getBody();

        $this->_LogResponse($statusCode, $response->getReasonPhrase(), $headers, $strBody);

        return  [
            'raw' => $strBody,
            'data' => \json_decode($strBody),
        ];
    }

    private function _LogRequest($_method, $_url, $_headers, $strBody)
    {
        $_httpRequest = $_method.' '.$_url.' HTTP/1.1'.PHP_EOL;
        foreach ($_headers as $key => $value) {
            $_httpRequest .= $key.': '.$value.PHP_EOL;
        }

        $_httpRequest .= PHP_EOL;
        $_httpRequest .= $strBody.PHP_EOL;
        $_httpRequest .= PHP_EOL;

        \Log::debug(__FILE__.' - NEW REQUEST - '.PHP_EOL.$_httpRequest);
    }

    private function _LogResponse(int $statusCode, $reasonPhrase, $headers, $strBody)
    {
        $_httpResponse = 'HTTP/1.1 '.$statusCode.' '.$reasonPhrase.PHP_EOL;
        foreach ($headers as $key => $value) {
            $_httpResponse .= $key.': '.implode('', $value).PHP_EOL;
        }
        $_httpResponse .= PHP_EOL;
        $_httpResponse .= $strBody.PHP_EOL;
        $_httpResponse .= PHP_EOL;

        \Log::debug(__FILE__.' - NEW RESPONSE - '.PHP_EOL.$_httpResponse);
    }
}
