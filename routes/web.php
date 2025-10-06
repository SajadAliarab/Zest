<?php

use App\Http\Controllers\Web\VerifyEmailUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/email/verify/{id}/{hash}', VerifyEmailUserController::class)
    ->name('verification.verify');
