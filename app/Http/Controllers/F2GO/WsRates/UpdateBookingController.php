<?php

namespace App\Http\Controllers\F2GO\WsRates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateBookingController extends Controller
{
    public function store(Request $request)
    {
        $formData = $request->except('_token');
        foreach (array_keys($formData) as $key) {
            if ($formData[$key] == null) {
                $formData[$key] = '';
            }
        }

        \Log::debug(__FILE__.PHP_EOL.json_encode($formData, JSON_PRETTY_PRINT));

        $URL = 'http://extended.front2go.online/WHSEngine/ws_rates.asmx/UpdateBooking';
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $URL,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => http_build_query($formData),
            CURLOPT_RETURNTRANSFER => true,
        ]);
        $response = curl_exec($curl);
        curl_close($curl);
        \Log::debug(__FILE__.PHP_EOL.$response);

        return \response($response, 200, ['Content_Type' => 'text/plain']);
    }
}
