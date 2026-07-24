<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\Seller\StoreController as ApiStoreController;
use App\Http\Controllers\Api\Seller\ProductController as ApiProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public API routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

Route::get('/reviews', [ReviewController::class, 'index']);
Route::post('/reviews', [ReviewController::class, 'store']); // allows guests/logged-in users

Route::get('/stores/{id}', [ApiStoreController::class, 'getStorePublic']);

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [ProfileController::class, 'show']);

    // Seller Specific API Routes
    Route::middleware('role:seller')->group(function () {
        Route::get('/seller/store', [ApiStoreController::class, 'show']);
        Route::post('/seller/store', [ApiStoreController::class, 'store']);
        Route::put('/seller/store', [ApiStoreController::class, 'update']);

        Route::apiResource('/seller/products', ApiProductController::class)->names([
            'index' => 'api.seller.products.index',
            'store' => 'api.seller.products.store',
            'show' => 'api.seller.products.show',
            'update' => 'api.seller.products.update',
            'destroy' => 'api.seller.products.destroy',
        ]);
    });
});
