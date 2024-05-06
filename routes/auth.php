<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('login', [AuthenticatedSessionController::class, 'login']);
    Route::post('login', [AuthenticatedSessionController::class, 'login']);

    Route::get('register', [RegisteredUserController::class, 'register']);
    Route::post('register', [RegisteredUserController::class, 'register']);

    Route::get('added', [RegisteredUserController::class, 'added']);
    Route::post('added', [RegisteredUserController::class, 'added']);

});

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
