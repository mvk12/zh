<?php

namespace App\Http\Controllers\API\Zoho;

use App\Http\Controllers\Controller;
use App\Models\SystemConfig;

abstract class ZohoApiController extends Controller
{
    protected $token = '';

    public function __construct()
    {
        $config = SystemConfig::where('key_code', 'zoho.access_token')->first();
        if ($config) {
            $this->token = $config->key_value;
        }
    }
}
