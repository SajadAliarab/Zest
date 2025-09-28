<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\SignUpController;



Route::name('api.')
    ->group(function () {
        Route::name('v1.')
            ->prefix('v1')
            ->group(function () {
                Route::name('auth.')
                    ->prefix('auth')
                    ->group(function () {
                        Route::post('/',SignUpController::class)->name('signup');
                    });

            });
    });
