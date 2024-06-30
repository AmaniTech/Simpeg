<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;

/** Admin Route */
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

/**  Profile Routes */
Route::get('admin/profile',[ProfileController::class, 'index'])->name('admin.profile');
Route::post('admin/profile/update',[ProfileController::class, 'updateProfile'])->name('admin.profile.update');
Route::post('admin/profile/update/password',[ProfileController::class, 'updatePassword'])->name('admin.password.update');
