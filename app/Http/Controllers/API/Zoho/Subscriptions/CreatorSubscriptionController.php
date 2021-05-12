<?php

namespace App\Http\Controllers\API\Zoho\Subscriptions;

use App\Http\Controllers\API\Zoho\ZohoApiController;
use App\Services\Zoho\Subscriptions\Subscriptions\CreateSubscriptionService;
use Illuminate\Http\Request;

class CreatorSubscriptionController extends ZohoApiController
{
    public function __invoke(Request $request)
    {
        $service = new CreateSubscriptionService($this->token, (string) \config('services.zoho.currentOrganizationId'));
        $serviceData = $service($request->all());

        return response()->json($serviceData['data'], $serviceData['statusCode']);
    }
}
