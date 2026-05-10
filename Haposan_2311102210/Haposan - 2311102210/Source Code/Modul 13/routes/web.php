<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\PackageController;

// Rute Tampilan Login dengan pengecekan sesi aktif
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/admin/packages');
    }
    return view('auth.login');
})->name('login');

// Rute Eksekusi Login (Submit Form)
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Rute Pemusnahan Sesi (Logout)
Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Rute CRUD Package diproteksi penuh oleh Middleware Auth
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('packages', PackageController::class);
});
