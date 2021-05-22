<?php

namespace App\Http\Controllers\Zoho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WebhookController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        \Log::debug(__FILE__);
        \Log::debug('REQUEST: '.PHP_EOL.json_encode($request->all()));
        \Log::debug('SERVER: '.PHP_EOL.json_encode($_SERVER, JSON_PRETTY_PRINT));
        \Log::debug('GET: '.PHP_EOL.json_encode($_GET, JSON_PRETTY_PRINT));
        \Log::debug('POST: '.PHP_EOL.json_encode($_POST, JSON_PRETTY_PRINT));

        $filename = Str::slug(\uniqid('', true)).'.json';

        Storage::put('tmp/'.$filename, json_encode($request->all()));

        return \response()->json(array_merge(['time' => time()], $request->all()));
    }
}
