<?php

use App\Http\Controllers\Auth\BladeAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('homepage');
})->name('home');

// Blade-based authentication routes
Route::middleware('guest')->group(function () {
    // Registration routes (both sign-up and register for compatibility)
    Route::get('sign-up', [BladeAuthController::class, 'showRegistrationForm'])->name('register');
    Route::get('register', [BladeAuthController::class, 'showRegistrationForm']);
    Route::post('sign-up', [BladeAuthController::class, 'register']);
    Route::post('register', [BladeAuthController::class, 'register']);
    
    // Login routes (both sign-in and login for compatibility)
    Route::get('sign-in', [BladeAuthController::class, 'showLoginForm'])->name('login');
    Route::get('login', [BladeAuthController::class, 'showLoginForm']);
    Route::post('sign-in', [BladeAuthController::class, 'login']);
    Route::post('login', [BladeAuthController::class, 'login']);
    
    Route::get('forgot-password', [BladeAuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('forgot-password', [BladeAuthController::class, 'sendPasswordResetLink'])->name('password.email');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [BladeAuthController::class, 'logout'])->name('logout');
});

// Services routes (available to authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('services', [ServicesController::class, 'index'])->name('services.index');
    Route::get('services/contact', [ServicesController::class, 'contact'])->name('services.contact');
    Route::get('services/category/{category}', [ServicesController::class, 'category'])->name('services.category');
    Route::get('services/{service}', [ServicesController::class, 'show'])->name('services.show');
    Route::post('services/inquiry', [ServicesController::class, 'submitInquiry'])->name('services.submit-inquiry');
});

// CSRF Test route for debugging
Route::get('/csrf-test', function () {
    return view('csrf-test');
})->name('csrf.test');

// CSRF Debug route
Route::get('/csrf-debug', function () {
    return view('csrf-debug');
})->name('csrf.debug');

// Admin login debug page
Route::get('/admin-debug', function () {
    return view('admin-login-debug');
})->name('admin.debug');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
