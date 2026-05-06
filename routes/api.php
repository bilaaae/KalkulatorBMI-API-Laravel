<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BMIController;
use App\Http\Controllers\Api\AuthController;
Route::post('/bmi', [BMIController::class, 'calculate']);
Route::get('/bmi', [BMIController::class, 'calculateGet']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);