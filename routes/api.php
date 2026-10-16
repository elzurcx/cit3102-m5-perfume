<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PerfumeController;

// Public routes: no token required
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes: a valid token is required
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/perfumes', [PerfumeController::class, 'index']);
    Route::post('/perfumes', [PerfumeController::class, 'store']);
    Route::get('/perfumes/{perfume}', [PerfumeController::class, 'show']);
    Route::put('/perfumes/{perfume}', [PerfumeController::class, 'update']);
    Route::delete('/perfumes/{perfume}', [PerfumeController::class, 'destroy']);
});