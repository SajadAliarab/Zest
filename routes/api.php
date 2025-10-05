<?php

use App\Http\Controllers\Api\V1\Auth\SignInController;
use App\Http\Controllers\Api\V1\Auth\SignUpController;
use App\Http\Controllers\Api\V1\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::name('api.')
    ->group(function () {
        Route::name('v1.')
            ->prefix('v1')
            ->group(function () {
                Route::name('auth.')
                    ->prefix('auth')
                    ->group(function () {
                        Route::post('/', SignUpController::class)->name('signup');
                        Route::post('/login', SignInController::class)->name('login');
                    });
                Route::post('/email/verification-notification', VerifyEmailController::class)
                    ->middleware(['auth:sanctum', 'throttle:6,1']);

            });
    });
