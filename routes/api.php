<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;

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

Route::group(
    [],
    static function () {
        Route::get('/products', [ProductController::class, 'index']);
        Route::post('/login', [AuthController::class, 'login']);
    }
);

Route::group(
    ['middleware' => 'auth:api'],
    static function () {
        Route::post('/cart/{product}', [ProductController::class, 'order']);
        Route::post('/order', [ProductController::class, 'createOrder']);
    }
);
