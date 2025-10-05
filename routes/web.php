<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/email/verify/{id}/{hash}', \App\Http\Controllers\Web\VerifyEmailUserController::class)
    ->name('verification.verify');
