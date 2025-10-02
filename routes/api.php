<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CarWashController;
use App\Http\Controllers\Api\DiscountController;
use App\Http\Controllers\Api\PaymentController;

Route::middleware('guest')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('api.login');
    Route::post('/register', [AuthController::class, 'register'])->name('api.register');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::get('/me', [AuthController::class, 'me'])->name('api.me');

    // Protected resource routes
    Route::get('/user', [UserController::class, 'profile'])->name('api.user.profile');

    Route::get('/bookings', [BookingController::class, 'index'])->name('api.bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('api.bookings.store');

    Route::post('/payments', [PaymentController::class, 'store'])->name('api.payments.store');
});

// Public routes (tidak butuh login)
Route::get('/car-washes', [CarController::class, 'index'])->name('api.cars.index');
Route::get('/discounts', [DiscountController::class, 'index'])->name('api.discounts.index');
