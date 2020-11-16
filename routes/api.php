<?php

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

Route::middleware('cors:api')->post('/login', [App\Http\Controllers\ApiController::class, 'login']);

Route::middleware('cors:api')->post(
    '/submit-product', 
    [App\Http\Controllers\ApiController::class, 'submitProduct']
);

Route::middleware('cors:api')->get(
    '/all-products', 
    [App\Http\Controllers\ApiController::class, 'listProducts']
);

Route::middleware('cors:api')->post(
    '/set-product-approval-status', 
    [App\Http\Controllers\ApiController::class, 'setProductApprovalStatus']
);
