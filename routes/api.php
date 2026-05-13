<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BMIController;
use App\Http\Controllers\Api\AuthController;
Route::post('/bmi', [BMIController::class, 'calculate']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/history/{user_id}', [BMIController::class, 'history']);
