<?php

namespace App\Http\Controllers\Zoho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OauthTokenController extends Controller
{
    public function index(Request $request)
    {
        $code = '';

        $viewData = compact('code');

        return \view('zoho.token', $viewData);
    }

    public function execute(Request $request)
    {
        \Log::info(__FILE__);
        \Log::info(\json_encode([
            'SERVER' => $_SERVER,
            'GET' => $_GET,
            'POST' => $_POST,
            'RequestAll' => $request->all(),
        ], JSON_PRETTY_PRINT));

        dd($request->all());
    }
}
