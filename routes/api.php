<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Profile\ProfileUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->middleware('apiLang')->group(function () {
        Route::post('register', [AuthController::class,'register']);
        Route::post('login' , [AuthController::class , 'login']);
        Route::post('otp-reste-password' , [AuthController::class , 'otpResetPassword']);
        Route::post('logout' , [AuthController::class , 'logout'])->middleware('auth:sanctum');
    });

    Route::prefix('profile')->middleware(['api','apiLang'])->group(function(){
        Route::post('profile' , [ProfileUserController::class , 'profile']);
    });
});
