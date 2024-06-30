<?php

use App\Http\Controllers\Backend\DosenController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

/** Dosen Route */
Route::get('dosen/dashboard', [DosenController::class, 'dashboard'])->middleware(['auth', 'role:dosen'])->name('dosen.dashboard');


// Route::get('dosen/profile',[ProfileController::class, 'index'])->name('dosen.profile');
// Route::post('dosen/profile/update',[ProfileController::class, 'updateProfile'])->name('dosen.profile.update');
// Route::post('dosen/profile/update/password',[ProfileController::class, 'updatePassword'])->name('dosen.password.update');
