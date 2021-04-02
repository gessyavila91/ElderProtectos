<?php

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
    return view('elder');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/custom', function () {
    return view('customMat');
});

Route::get('/orders', function () {
    return view('orders');
});
Route::get('/myprofile', function () {
    return view('myprofile');
});
Route::get('/success', function () {
    return view('success');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/404', function () {
    return view('404');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

require __DIR__.'/product.php';
