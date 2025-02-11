<?php

use App\Http\Middleware\ApiRateLimitMiddleware;
use App\Http\Middleware\CheckApiKeyMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([CheckApiKeyMiddleware::class, ApiRateLimitMiddleware::class])->group(function () {
    Route::apiResource('locations', App\Http\Controllers\LocationController::class);
});
