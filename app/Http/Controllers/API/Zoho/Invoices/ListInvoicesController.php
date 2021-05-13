<?php

namespace App\Http\Controllers\API\Zoho\Invoices;

use App\Http\Controllers\API\Zoho\ZohoApiController;
use App\Services\Zoho\Subscriptions\Invoices\ListInvoicesService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ListInvoicesController extends ZohoApiController
{
    public function __invoke(Request $request)
    {
        $service = new ListInvoicesService($this->token, (string) \config('services.zoho.currentOrganizationId'));
        $serviceData = $service($request->all());

        return response()->json(Arr::get($serviceData, 'data'), $serviceData['statusCode']);
    }
}
