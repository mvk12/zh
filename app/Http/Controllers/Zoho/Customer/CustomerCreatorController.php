<?php

namespace App\Http\Controllers\Zoho\Customer;

use App\Http\Controllers\Controller;
use App\Models\SystemConfig;
// use App\Http\Requests\Zoho\CustomerCreatorRequest;
use App\Services\Zoho\Subscriptions\Customers\CreateCustomerService;
use Illuminate\Http\Request;

class CustomerCreatorController extends Controller
{
    private $jwt;

    public function __construct()
    {
        $_config = SystemConfig::where('key_code', 'zoho.refresh_token')->first();

        $this->jwt = $_config ? $_config->key_value : null;
    }

    public function index(Request $request)
    {
        $viewData = [
            'token' => $this->jwt,
        ];

        return \view('zoho.customer.index', $viewData);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $token = $this->jwt;
        $organizationId = \config('services.zoho.currentOrganizationId');

        $service = new CreateCustomerService($token, $organizationId);

        $response = $service($data);

        dd($response);
    }
}
