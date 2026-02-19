<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\ProdiController;


Route::get('/prodi', [ProdiController::class, 'index']);
Route::get('/prodi/create', [ProdiController::class, 'create']);
Route::post('/prodi/store', [ProdiController::class, 'store']);
Route::get('/prodi/{kd_prodi}/edit', [ProdiController::class, 'edit']);
Route::post('/prodi/{kd_prodi}/update', [ProdiController::class, 'update']);
Route::get('/prodi/destroy/{kd_prodi}', [ProdiController::class, 'destroy']);


Route::get('/mahasiswa', [mahasiswaController::class, 'index']);
Route::get('/mahasiswa/create', [mahasiswaController::class, 'create']);
Route::post('/mahasiswa/store', [mahasiswaController::class, 'store']);
Route::get('/mahasiswa/edit/{id}', [mahasiswaController::class, 'edit']);
Route::post('/mahasiswa/update/{id}', [mahasiswaController::class, 'update']);
Route::get('/mahasiswa/destroy/{id}', [mahasiswaController::class, 'destroy']);


Route::get('/', function () {
    $title = 'Dashboard';
    $slug = 'dashboard';
    return view('dashboard', compact('title', 'slug'));
});

Route::get('dashboard', function () {
    $title = 'Dashboard';
    $slug = 'dashboard';
    return view('dashboard', compact('title', 'slug'));
});