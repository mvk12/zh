<?php

namespace App\Http\Controllers\F2GO\WsRates;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class UpdateBookingController extends Controller
{
    public function store(Request $request)
    {
        $payload = [
            '@attributes' => [
                'xmlns:soap' => 'http://www.w3.org/2003/05/soap-envelope',
                'xmlns:tem' => 'http://tempuri.org/',
            ],
            'soap:Header' => '',
            'soap:Body' => [
                'tem:UpdateBooking' => [
                    'tem:sLnTy' => '',
                    'tem:sCrTy' => '',
                    'tem:sp_cod_hotel' => $request->input('sp_cod_hotel'),
                    'tem:sp_clave_reserva' => $request->input('sp_clave_reserva'),
                    'tem:sp_email' => $request->input('sp_email'),
                    'tem:sp_nombre_titular' => [
                        'tem:string' => [
                            0 => '1',
                            1 => $request->input('sp_nombre_titular'),
                        ],
                    ],
                    'tem:sp_apellidos_titular' => [
                        'tem:string' => [
                            0 => '1',
                            1 => $request->input('sp_apellidos_titular'),
                        ],
                    ],
                    'tem:sp_adultostit' => [
                        'tem:string' => [
                            0 => '1',
                            1 => $request->input('sp_adultostit'),
                        ],
                    ],
                    'tem:sp_cod_thab' => $request->input('sp_cod_thab'),
                    'tem:dp_fecha_entrada' => $request->input('dp_fecha_entrada'),
                    'tem:dp_fecha_salida' => $request->input('dp_fecha_salida'),
                    'tem:ksp_cod_emis' => '',
                    'tem:sp_nombre_acomp' => $request->filled('sp_nombre_acomp') ? ['tem:string' => ['1', $request->input('sp_nombre_acomp')]] : '',
                    'tem:sp_apellidos_acomp' => $request->filled('sp_apellidos_acomp') ? ['tem:string' => ['1', $request->input('sp_apellidos_acomp')]] : '',
                    'tem:sp_adulto' => [
                        'tem:string' => $request->input('sp_adulto'),
                    ],
                    'tem:ip_rooms' => [
                        'tem:int' => [
                            0 => '1',
                            1 => $request->input('ip_rooms'),
                        ],
                    ],
                    'tem:NotasReservacion' => $request->input('NotasReservacion'),
                ],
            ],
        ];

        $domDocument = \App\Utilities\LaLit\Array2XML::createXML('soap:Envelope', $payload);
        $domDocument->formatOutput = false;
        $xml = $domDocument->saveXML();
        $xml = str_replace('<?xml version="1.0" encoding="utf-8" standalone="no"?>', '', $xml);
        $xml = preg_replace('/(\t|\n|\n\r|\r)/', '', $xml);
        \Log::debug(__FILE__.PHP_EOL.json_encode($payload, JSON_PRETTY_PRINT));
        \Log::debug(__FILE__.PHP_EOL.$xml);

        $client = new Client([
            'http_errors' => false,
        ]);

        $URL = 'http://extended.front2go.online/WHSEngine/ws_rates.asmx';

        $responseClient = $client->request(
            'POST',
            $URL,
            [
                'headers' => [
                    'Content-Type' => 'application/soap+xml;charset=UTF-8;action="http://tempuri.org/UpdateBooking"',
                ],
                'body' => $xml,
            ]
        );

        $response = (string) $responseClient->getBody();
        \Log::debug(__FILE__.PHP_EOL.$response);
        \Log::debug(__FILE__.PHP_EOL.json_encode(\App\Utilities\LaLit\XML2Array::createArray($response), JSON_PRETTY_PRINT));

        return \response($response, 200, ['Content_Type' => 'text/plain']);
    }
}
