<?php

namespace App\Http\Controllers\Zoho\Subscription;

use App\Http\Controllers\Controller;
use App\Models\SystemConfig;
use App\Services\Zoho\Subscriptions\Customers\ListCustomerService;
use App\Services\Zoho\Subscriptions\Plans\ListPlansService;
use App\Services\Zoho\Subscriptions\Subscriptions\CreateSubscriptionService;
use Illuminate\Http\Request;

class SubscriptionCreatorController extends Controller
{
    private $jwt;

    public function __construct()
    {
        $_config = SystemConfig::where('key_code', 'zoho.access_token')->first();

        $this->jwt = $_config ? $_config->key_value : null;
    }

    public function index(Request $request)
    {
        $viewData = [
            'token' => $this->jwt,
        ];

        $_data = (new ListCustomerService($this->jwt))(\config('services.zoho.currentOrganizationId'));
        $viewData['customers'] = \collect($_data['data']['customers']);

        $_data = (new ListPlansService($this->jwt))(\config('services.zoho.currentOrganizationId'));

        $viewData['plans'] = $_data['data']['plans'];

        return \view('zoho.subscription.index', $viewData);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $data['auto_collect'] = false;

        \Log::debug(PHP_EOL.json_encode($data, JSON_PRETTY_PRINT));

        $service = new CreateSubscriptionService($this->jwt, (string) \config('services.zoho.currentOrganizationId'));

        $response = $service($data);

        dd($response);
    }
}
