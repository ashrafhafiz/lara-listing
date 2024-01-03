<?php

use App\Models\ImageGallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Dashboard\AmenityController;
use App\Http\Controllers\Admin\Dashboard\ListingController;
use App\Http\Controllers\Admin\Dashboard\CategoryController;
use App\Http\Controllers\Admin\Dashboard\LocationController;
use App\Http\Controllers\Admin\Dashboard\HeroSectionController;
use App\Http\Controllers\Admin\Dashboard\ImageGalleryController;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [AdminAuthController::class, 'login'])->name('login');

        Route::get('forgot-password', [AdminAuthController::class, 'passwordRequest'])
            ->name('password.request');

        Route::post('forgot-password', [AdminAuthController::class, 'passwordEmail'])
            ->name('password.email');

        Route::get('reset-password/{token}', [AdminAuthController::class, 'passwordReset'])
            ->name('password.reset');

        Route::post('reset-password', [AdminAuthController::class, 'passwordStore'])
            ->name('password.store');
    });
    // Protected Admin Routes
    Route::group(['middleware' => ['auth', 'user.type:admin']], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

        Route::get('profile', [AdminProfileController::class, 'index'])->name('profile.index');
        Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::put('password-update', [AdminProfileController::class, 'passwordUpdate'])->name('password.update');

        Route::get('sections/hero', [HeroSectionController::class, 'index'])->name('sections.hero.index');
        Route::put('sections/hero', [HeroSectionController::class, 'store'])->name('sections.hero.store');

        Route::resource('listings/category', CategoryController::class);
        Route::resource('listings/location', LocationController::class);
        Route::resource('listings/amenity', AmenityController::class);
        Route::resource('listings/listing', ListingController::class);

        Route::get('listings/image-gallery/{listing}/edit', [ImageGalleryController::class, 'index'])->name('image-gallery.index');
        Route::post('listings/image-gallery', [ImageGalleryController::class, 'store'])->name('image-gallery.store');
        Route::post('listings/image-gallery/uploads', [ImageGalleryController::class, 'uploads'])->name('image-gallery.uploads');
    });
});
