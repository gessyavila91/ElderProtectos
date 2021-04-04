<?php

use App\Models\matComponent;
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
Route::post('/product/fetch',
    [\App\Http\Controllers\ProductController::class, 'fetchProduct']
);
Route::post('/product/addProduct',
    [\App\Http\Controllers\ProductController::class, 'addProduct']
);
Route::post('/product/addPromoCode',
    [\App\Http\Controllers\ProductController::class, 'addPromoCode']
);
Route::post('/product/removeProduct',
    [\App\Http\Controllers\ProductController::class, 'removeProductFromShoppingCar']
);
Route::post('/product/editProduct',
    [\App\Http\Controllers\ProductController::class, 'editProductFromShoppingCar']
);
Route::post('/product/checkout',
    [\App\Http\Controllers\ProductController::class, 'checkout']
);
Route::get('/product/initShoppingCar',
    [\App\Http\Controllers\ProductController::class, 'initShoppingCar']
);
Route::post('/product/preview',
    [\App\Http\Controllers\ProductController::class, 'preview']
);
