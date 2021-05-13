<?php

namespace App\Http\Controllers\API\Zoho\Customers;

use App\Http\Controllers\API\Zoho\ZohoApiController;
use App\Services\Zoho\Subscriptions\Customers\ListCustomerService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ListCustomersController extends ZohoApiController
{
    public function __invoke(Request $request)
    {
        $service = new ListCustomerService($this->token);
        $serviceData = $service(\config('services.zoho.currentOrganizationId'), $request->all());

        return response()->json(Arr::get($serviceData, 'data'), $serviceData['statusCode']);
    }
}
