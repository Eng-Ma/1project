<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dasbhoard\CustomerController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\LevelController;
use App\Http\Controllers\Dashboard\VideoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WebsiteController;
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

Route::controller(AuthController::class)
    ->group(function () {
    Route::get('login', 'login')->name('login')->middleware('guest');
    Route::post('login', 'login')->middleware('guest');
    Route::get('logout', 'logout')->middleware('auth');
});

Route::group(['middleware' => 'auth'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('', 'index');
        Route::get('stores', 'stores');
        Route::get('products', 'products');
        Route::get('create-store', 'createStore');
        Route::post('store-store', 'storeStore');
        Route::get('edit-store/{id}', 'editStore');
        Route::post('update-store/{id}', 'updateStore');
        Route::delete('delete-store/{id}', 'deleteStore');
        Route::get('create-product', 'createProduct');
        Route::post('store-product', 'storeProduct');
        Route::get('edit-product/{id}', 'editProduct');
        Route::post('update-product/{id}', 'updateProduct');
        Route::delete('delete-product/{id}', 'deleteProduct');
        Route::get('payment-transactions', 'paymentTransactions');
    });
});

Route::controller(WebsiteController::class)
    ->prefix('site')
    ->group(function () {
        Route::get('', 'index');
        Route::get('stores', 'stores');
        Route::get('stores/{id}', 'products');
        Route::post('purchase/{id}', 'purchase');
    });
