<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BMIController;

Route::post('/bmi', [BMIController::class, 'calculate']);