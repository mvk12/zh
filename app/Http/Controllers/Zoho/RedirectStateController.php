<?php

namespace App\Http\Controllers\Zoho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectStateController extends Controller
{
    public function index(Request $request)
    {
        \Log::info(__FILE__);
        \Log::info(\json_encode([
            'SERVER' => $_SERVER,
            'GET' => $_GET,
            'POST' => $_POST,
            'RequestAll' => $request->all(),
        ], JSON_PRETTY_PRINT));

        if ($request->filled('state')) {
            switch ($request->input('state')) {
                case 'FETCH_CODE':
                    return \redirect()->route('zoho.token', ['code' => $request->input('code')]);
                    break;
                default:
                    dd($request->all());
                    break;
            }
        } else {
            dd($request->all());
        }
    }
}
