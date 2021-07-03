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

Route::post('api/payment/paypal/getOrderDetails',
    [\App\payment\paypal\Controllers\PaypalController::class, 'getOrderDetails']
);

Route::get('api/payment/paypal/getOrderDetails',
    [\App\payment\paypal\Controllers\PaypalController::class, 'getOrderDetails']
);

Route::post('api/payment/paypal/patchOrder',
    [\App\payment\paypal\Controllers\PaypalController::class, 'patchOrder']
);

Route::post('api/payment/paypal/captureOrder',
    [\App\payment\paypal\Controllers\PaypalController::class, 'captureOrder']
);