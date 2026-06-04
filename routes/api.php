<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BMIController;

Route::post(
    '/register',
    [AuthController::class, 'register']
);

Route::post(
    '/login',
    [AuthController::class, 'login']
);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',
    [AuthController::class, 'logout']
);

    Route::post(
        '/bmi',
        [BMIController::class, 'calculate']
    );

    Route::get(
        '/history',
        [BMIController::class, 'history']
    );
});