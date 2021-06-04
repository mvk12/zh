<?php

use App\Http\Controllers\Zoho\WebhookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/zoho')->group(function () {
    Route::any('/webhook', WebhookController::class);
});

Route::name('f2go.ws_rates.update-booking.')->prefix('/f2go/ws_rates/update-booking')->group(function () {
    Route::post('/', [\App\Http\Controllers\F2GO\WsRates\UpdateBookingController::class, 'store'])->name('store');
    Route::get('/', function () {
        return \view('f2go.ws_rates.updatebooking', []);
    });
});
Route::view('/{any?}/{all?}', 'app');
