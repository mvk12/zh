<?php

namespace App\Http\Controllers\API\Zoho\Plans;

use App\Http\Controllers\API\Zoho\ZohoApiController;
use App\Services\Zoho\Subscriptions\Plans\ListPlansService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ListPlansController extends ZohoApiController
{
    public function __invoke(Request $request)
    {
        $service = (new ListPlansService($this->token));

        return \response()->json(Arr::get($service(\config('services.zoho.currentOrganizationId')), 'data.plans'));
    }
}
