<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([RoleMiddleware::class])->group(function() {
    Route::controller(AdminController::class)->name('admin.')->group(function() {
        Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    });
});
