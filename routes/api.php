<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiPlayerController;
use App\Http\Controllers\Api\AuthController;

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
    Route::middleware('auth:sanctum')->get('user', [AuthController::class, 'user']);

    // Players API (Bearer token required). Includes POST /players → store (add player).
    Route::middleware('auth:sanctum')->apiResource('players', ApiPlayerController::class);
});