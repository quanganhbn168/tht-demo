<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IntroController;
use App\Http\Controllers\ServiceCategoryController;
// use App\Http\Controllers\ToggleController;

Route::middleware(['auth'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Route::post('/toggle', [ToggleController::class, 'toggle'])->name('admin.toggle');
    Route::resource('intros', IntroController::class);

    Route::resource('categories', CategoryController::class);
    Route::post('/categories/{category}/toggle-status', [CategoryController::class, 'toggleStatus'])
      ->name('categories.toggle-status');
    Route::resource('products', ProductController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('post-categories', PostCategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('slides', SlideController::class);
    Route::post('/slides/{slide}/toggle-status', [SlideController::class, 'toggleStatus'])
      ->name('slides.toggle-status');
    Route::resource('projects', ProjectController::class);
    Route::resource('service_categories', ServiceCategoryController::class);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('contacts', ContactController::class)->only(['index', 'destroy']);
});
