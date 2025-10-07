<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CarWashController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\PaymentController;

// Auth
Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

// Public APIs
Route::apiResource('car-washes', CarWashController::class)->only(['index', 'show']);
Route::apiResource('discounts', DiscountController::class)->only(['index', 'show']);

// Protected APIs
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/user', [UserController::class, 'profile']);
    Route::apiResource('cars', CarController::class)->only(['index', 'show']);
    Route::apiResource('bookings', BookingController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
    Route::apiResource('payments', PaymentController::class)->only(['index', 'store', 'show']);
});
