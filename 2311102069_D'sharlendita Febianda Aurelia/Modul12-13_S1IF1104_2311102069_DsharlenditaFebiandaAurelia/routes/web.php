<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;

Route::get('/', [MahasiswaController::class, 'index']);
Route::get('/get-mahasiswa', [MahasiswaController::class, 'getData']);

Route::get('/tambah-mahasiswa', [MahasiswaController::class, 'create']);
Route::post('/store-mahasiswa', [MahasiswaController::class, 'store']);

Route::get('/edit-mahasiswa/{id}', [MahasiswaController::class, 'edit']);
Route::post('/update-mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/delete-mahasiswa/{id}', [MahasiswaController::class, 'destroy']);
