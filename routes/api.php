<?php

use App\Http\Controllers\API\Zoho\Customers\CreatorCustomerController;
use App\Http\Controllers\API\Zoho\Customers\ListCustomersController;
use App\Http\Controllers\API\Zoho\Invoices\ListInvoicesController;
use App\Http\Controllers\API\Zoho\Payments\CreatorPaymentController;
use App\Http\Controllers\API\Zoho\Plans\ListPlansController;
use App\Http\Controllers\API\Zoho\Subscriptions\CreatorAddonSubscriptionController;
use App\Http\Controllers\API\Zoho\Subscriptions\CreatorSubscriptionController;
use App\Http\Controllers\API\Zoho\Subscriptions\ListSubscriptionsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'zoho', 'middleware' => 'auth:api'], function () {
    Route::get('customers', ListCustomersController::class);
    Route::post('customers', CreatorCustomerController::class);

    Route::get('invoices', ListInvoicesController::class);

    Route::get('plans', ListPlansController::class);

    Route::get('subscriptions', ListSubscriptionsController::class);
    Route::post('subscriptions', CreatorSubscriptionController::class);

    Route::post('subscriptions/{subscriptionId}/addons', CreatorAddonSubscriptionController::class);

    Route::post('payments', CreatorPaymentController::class);
});
