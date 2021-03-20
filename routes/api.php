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

Route::post('/product/valid',
    [\App\Http\Controllers\ProductController::class, 'validProduct']
);
Route::post('/product/addPromoCode',
    [\App\Http\Controllers\ProductController::class, 'addPromoCode']
);
