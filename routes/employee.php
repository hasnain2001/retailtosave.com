<?php

use App\Http\Controllers\employee\EmployeeController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([RoleMiddleware::class])->group(function() {
    Route::controller(EmployeeController::class)->name('employee.')->prefix('employee')->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
});
