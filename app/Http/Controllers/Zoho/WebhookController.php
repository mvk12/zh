<?php

namespace App\Http\Controllers\Zoho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        \Log::debug('SERVER: '.PHP_EOL.json_encode($_SERVER));
        \Log::debug('GET: '.PHP_EOL.json_encode($_GET));
        \Log::debug('POST: '.PHP_EOL.json_encode($_POST));

        return \response()->json(array_merge(['time' => time()], $request->all()));
    }
}
