<?php

namespace App\Http\Controllers\API\Zoho\Subscriptions;

use App\Http\Controllers\API\Zoho\ZohoApiController;
use App\Services\Zoho\Subscriptions\Subscriptions\ListSubscriptionsService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ListSubscriptionsController extends ZohoApiController
{
    public function __invoke(Request $request)
    {
        $service = new ListSubscriptionsService($this->token, \config('services.zoho.currentOrganizationId'));

        return \response()->json(Arr::get($service(), 'data.subscriptions'));
    }
}
