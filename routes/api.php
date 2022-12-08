<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('customer/store', [ApiController::class, 'customer_store']);
Route::post('customer/update_avatar', [ApiController::class, 'update_avatar']);
Route::post('customer/update', [ApiController::class, 'update_customer_data']);
Route::post('customer/watch_video', [ApiController::class, 'watch_video']);
Route::get('customer/report', [ApiController::class, 'customer_report']);
Route::post('customer/store_pdf', [ApiController::class, 'store_pdf']);
Route::post('firebase/store_token', [ApiController::class, 'store_firebase_token']);
Route::get('levels', [ApiController::class, 'levels']);
Route::get('categories', [ApiController::class, 'categories']);
Route::get('categories/{level_id}', [ApiController::class, 'categories_by_level']);
Route::get('videos', [ApiController::class, 'videos']);
Route::get('videos/{video_id}', [ApiController::class, 'video']);
