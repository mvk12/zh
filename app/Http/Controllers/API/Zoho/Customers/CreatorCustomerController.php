<?php

namespace App\Http\Controllers\API\Zoho\Customers;

use App\Http\Controllers\API\Zoho\ZohoApiController;
use App\Services\Zoho\Subscriptions\Customers\CreateCustomerService;
use Illuminate\Http\Request;

class CreatorCustomerController extends ZohoApiController
{
    public function __invoke(Request $request)
    {
        $service = new CreateCustomerService($this->token, (string) \config('services.zoho.currentOrganizationId'));
        $serviceData = $service($request->all());

        return response()->json($serviceData['data'], $serviceData['statusCode']);
    }
}
