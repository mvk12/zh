<?php

use App\Http\Controllers\Zoho\Customer\CustomerCreatorController;
use App\Http\Controllers\Zoho\Customer\CustomerListController;
use App\Http\Controllers\Zoho\RedirectStateController;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/zoho')->group(function () {
    Route::view('/start', 'zoho.start')->name('zoho.start');

    Route::get('/token', function (Request $request) {
        return view('zoho.token', $request->all());
    })->name('zoho.token');

    Route::any('/redirect', [RedirectStateController::class, 'index']);

    Route::get('/customers/form', [CustomerCreatorController::class, 'index'])->name('zoho.customer.index');
    Route::post('/customer/store', [CustomerCreatorController::class, 'store'])->name('zoho.customer.store');
    Route::get('/customers', [CustomerListController::class, 'list'])->name('zoho.customers.list');
});
