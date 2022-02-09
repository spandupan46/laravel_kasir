<?php

use App\Http\Controllers\TripayCallbackController;
use App\Http\Controllers\TripayController;
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

// Route::get('data', function)
Route::get('/data', function () {
    return 'ok';
});
// Route::middleware('auth:api')->('status_tripay', [TripayCallbackController::class, 'handle']);

// Route::post('/status_tripay', [TripayCallbackController::class, 'handle']);

// Route::post('/status_tripay', [TripayCallbackController::class, 'handle']);
Route::post('/CodeTransaksi', [TripayController::class, 'AmbilKodeTransaksi']);

