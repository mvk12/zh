<?php

namespace App\Http\Controllers\API\Zoho\Payments;

use App\Http\Controllers\API\Zoho\ZohoApiController;
use App\Services\Zoho\Subscriptions\Payments\CreatePaymentService;
use Illuminate\Http\Request;

class CreatorPaymentController extends ZohoApiController
{
    public function __invoke(Request $request)
    {
        $service = new CreatePaymentService($this->token, (string) \config('services.zoho.currentOrganizationId'));
        $serviceData = $service($request->all());

        return response()->json($serviceData['data'], $serviceData['statusCode']);
    }
}
