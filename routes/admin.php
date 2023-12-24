<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminAuthController::class, 'login'])->name('login');

    Route::get('forgot-password', [AdminAuthController::class, 'passwordRequest'])
        ->name('password.request');

    Route::post('forgot-password', [AdminAuthController::class, 'passwordEmail'])
        ->name('password.email');

    Route::get('reset-password/{token}', [AdminAuthController::class, 'passwordReset'])
        ->name('password.reset');

    Route::post('reset-password', [AdminAuthController::class, 'passwordStore'])
        ->name('password.store');

    // Protected Admin Routes
    Route::group(['middleware' => ['auth', 'user.type:admin']], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    });
});