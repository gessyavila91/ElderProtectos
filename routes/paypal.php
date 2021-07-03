<?php


use App\Models\matComponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Paypal API Routes
|--------------------------------------------------------------------------
|
|
*/

Route::post('api/payment/paypal/createOrder',
    [\App\payment\paypal\Controllers\PaypalController::class, 'createOrder']
);

Route::get('api/payment/paypal/getOrderDetails',
    [\App\payment\paypal\Controllers\PaypalController::class, 'getOrderDetails']
);