<?php

// use App\Http\Controllers\Backend\DosenController;
use App\Http\Controllers\Backend\MahasiswaController;
use Illuminate\Support\Facades\Route;

/** Mahasiswa Route */
Route::get('mahasiswa/dashboard', [MahasiswaController::class, 'dashboard'])->middleware(['auth', 'role:mahasiswa'])->name('mahasiswa.dashboard');
