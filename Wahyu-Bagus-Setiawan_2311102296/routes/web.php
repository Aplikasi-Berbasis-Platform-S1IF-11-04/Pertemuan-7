<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Dashboard\InventoryController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticationController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authenticate'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
});

Route::redirect('/', '/inventory');