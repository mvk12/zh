<?php

namespace App\Http\Controllers\API\Zoho\Subscriptions;

use App\Http\Controllers\API\Zoho\ZohoApiController;
use App\Services\Zoho\Subscriptions\Subscriptions\BuyOneTimeAddonService;
use Illuminate\Http\Request;

class CreatorAddonSubscriptionController extends ZohoApiController
{
    public function __invoke(Request $request, $subscriptionId)
    {
        $service = new BuyOneTimeAddonService($this->token, (string) \config('services.zoho.currentOrganizationId'), $subscriptionId);
        $serviceData = $service($request->all());

        return response()->json($serviceData['data'], $serviceData['statusCode']);
    }
}
