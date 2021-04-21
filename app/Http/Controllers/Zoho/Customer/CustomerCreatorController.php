<?php

namespace App\Http\Controllers\Zoho\Customer;

use App\Http\Controllers\Controller;
// use App\Http\Requests\Zoho\CustomerCreatorRequest;
use App\Services\Zoho\Subscriptions\Customers\CreateCustomerService;
use Illuminate\Http\Request;

class CustomerCreatorController extends Controller
{
    public function index(Request $request)
    {
        $viewData = [
            'token' => config('services.zoho.currentToken'),
        ];

        return \view('zoho.customer.index', $viewData);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $token = \config('services.zoho.currentToken');
        $organizationId = \config('services.zoho.currentOrganizationId');

        $service = new CreateCustomerService($token, $organizationId);

        $response = $service($data);

        dd($response);
    }
}
