<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminAuthController;
use Illuminate\Support\Facades\Route;

// Admin authentication routes (for guests)
Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// Protected admin routes (for authenticated admin users)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
    Route::get('/users/{user}', [AdminDashboardController::class, 'showUser'])->name('users.show');
    Route::patch('/users/{user}/role', [AdminDashboardController::class, 'updateUserRole'])->name('users.update-role');
    Route::delete('/users/{user}', [AdminDashboardController::class, 'deleteUser'])->name('users.delete');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});
