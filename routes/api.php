<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// User Module
Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function ($router) {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/refresh', [AuthController::class, 'refresh']);
        Route::get('/user-profile', [AuthController::class, 'userProfile']);    
    }
);

// Category Module
Route::group([
        'middleware' => 'api',
        'prefix' => 'auth'
    ], function ($router) {
        Route::get('category', [CategoryController::class, 'index']);
        Route::get('category/{id}', [CategoryController::class, 'show']);
        Route::post('category', [CategoryController::class, 'store']);
        Route::put('category/{id}', [CategoryController::class, 'update']);
        Route::delete('category/{id}', [CategoryController::class, 'delete']);
    }
);

// Product Module
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::get('product', [ProductController::class, 'index']);
    Route::get('product/{id}', [ProductController::class, 'show']);
    Route::post('product', [ProductController::class, 'store']);
    Route::put('product/{id}', [ProductController::class, 'update']);
    Route::delete('product/{id}', [ProductController::class, 'delete']);
}
);


