<?php

namespace App\Services\Zoho;

use GuzzleHttp\Client;

class AbstractZohoService
{
    protected $client = null;

    public function __construct()
    {
        $this->client = new Client([
            'http_errors' => false,
        ]);
    }

    final public function _LogRequest($_method, $_url, $_headers, $strBody = '')
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

    final public function _LogResponse($response)
    {
        \Log::info(\get_class($response));

        $statusCode = (int) $response->getStatusCode();
        $reasonPhrase = $response->getReasonPhrase();
        $headers = $response->getHeaders();
        $strBody = (string) $response->getBody();

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
