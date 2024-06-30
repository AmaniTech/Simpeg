<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\DosenController;
use App\Http\Controllers\Backend\MahasiswaController;
use App\Http\Controllers\Backend\GajiController;
use App\Http\Controllers\Backend\HitungController;
use App\Http\Controllers\Backend\JadwalController;
use App\Http\Controllers\Backend\JurusanController;
use App\Http\Controllers\Backend\MatkulController;
use App\Http\Controllers\Backend\ScheduleController;
use App\Http\Controllers\Backend\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;

Route::middleware('guest')->group(function () {
    // Route::get('register', [RegisteredUserController::class, 'create'])
    //     ->name('register');

    // Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    // Route::get('verify-email', EmailVerificationPromptController::class)
    //     ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //     ->middleware('throttle:6,1')
    //     ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

Route::get('/', function () {
    return view('auth/login');
});


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/update', [ProfileController::class, 'updateProfile']);
    Route::post('/profile/update/password', [ProfileController::class, 'updatePassword']);
});



Route::group(['auth', "middleware" => 'role:dosen'], function () {
    // Route::get('dosen/dashboard', [DosenController::class, 'dashboard'])->middleware(['auth', 'role:dosen'])->name('dosen.dashboard');
    // dosen route
    Route::get('dosen/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');

    /** Jadwal Prefix */
    Route::get('dosen/schedule', [ScheduleController::class, 'index'])->name('dosen.schedule');
    Route::get('dosen/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::patch('dosen/schedule/edit/{id}', [ScheduleController::class, 'update'])->name('schedule.updates');
    Route::get('/schedule/edit/{id}', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy'])->name('schedule.delete');

    Route::get('dosen/gaji', [GajiController::class, 'gajiSaya'])->name('dosen.gaji');
    Route::get('dosen/profile', [DosenController::class, 'profile'])->name('dosen.profile');
    Route::get('/dosen/{id}/rjabatan/create', [DosenController::class, 'createJabatan'])->name('dosen.profile.createJabatan');
    Route::get('/dosen/{id}/rpenelitian/create', [DosenController::class, 'createPenelitian'])->name('dosen.profile.createPenelitian');
    Route::get('/dosen/{id}/rpendidikan/create', [DosenController::class, 'createPendidikan'])->name('dosen.profile.createPendidikan');
    Route::get('/dosen/{id}/rjabatan/{jabatanId}/edit', [DosenController::class, 'editJabatan'])->name('dosen.profile.editJabatan');
    Route::get('/dosen/{id}/rpenelitian/{penelitianId}/edit', [DosenController::class, 'editPenelitian'])->name('dosen.profile.editrpenelitian');
    Route::get('/dosen/{id}/rpendidikan/{pendidikanId}/edit', [DosenController::class, 'editPendidikan'])->name('dosen.profile.editrpendidikan');
    Route::post('/rjabatan/{id}', [DosenController::class, 'storeJabatan'])->name('dosen.profile.rjabatan');
    Route::post('/rpenelitian/{id}', [DosenController::class, 'storeRpenelitian'])->name('dosen.profile.rpenelitian');
    Route::post('/rpendidikan/{id}', [DosenController::class, 'storeRpendidikan'])->name('dosen.profile.rpendidikan');
    Route::post('/dosen/profile/update/{id}', [DosenController::class, 'update'])->name('dosen.profile.update');
    Route::patch('/dosen/profile/update-jabatan/{id}/{jabatanId}', [DosenController::class, 'updateJabatan'])->name('dosen.profile.updateJabatan');
    Route::patch('/dosen/profile/update-penelitian/{id}/{penelitianId}', [DosenController::class, 'updatePenelitian'])->name('dosen.profile.updatePenelitian');
    Route::patch('/dosen/profile/update-pendidikan/{id}/{pendidikanId}', [DosenController::class, 'updatePendidikan'])->name('dosen.profile.updatePendidikan');
    Route::delete('dosen/{id}/jabatan/{jabatanId}', [DosenController::class, 'deleteJabatan'])->name('dosen.deleteJabatan');
    Route::delete('dosen/{id}/penelitian/{penelitianId}', [DosenController::class, 'deletePenelitian'])->name('dosen.deletePenelitian');
    Route::delete('dosen/{id}/pendidikan/{pendidikanId}', [DosenController::class, 'deletePendidikan'])->name('dosen.deletePendidikan');
});

Route::group(['auth', "middleware" => 'role:mahasiswa'], function () {

    Route::get('/mahasiswa/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');

    //Schedule
    Route::get('mahasiswa/schedule', [JadwalController::class, 'schedule'])->name('mahasiswa.schedule');
    Route::get('mahasiswa/schedule/edit{id}', [JadwalController::class, 'ubah'])->name('mahasiswa.schedule.edit');
    Route::patch('mahasiswa/schedule/update/{id}', [JadwalController::class, 'updateKeterangan'])->name('mahasiswa.schedule.updates');
});

// Admin Panel
Route::group(["middleware" => 'role:admin'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/dosen', [AdminController::class, 'dosen'])->name('admin.dosen');
    Route::get('admin/dosen/profile/{id}', [AdminController::class, 'showDosen'])->name('dosen.showProfile');
    Route::get('admin/dosen/{id}/rjabatan/create', [AdminController::class, 'createJabatan'])->name('dosen.createJabatan');
    Route::post('admin/dosen/{id}/rjabatan', [AdminController::class, 'storeJabatan'])->name('dosen.storeJabatan');
    Route::get('admin/dosen/{id}/rjabatan/{jabatanId}/edit', [AdminController::class, 'editJabatan'])->name('dosen.editJabatan');
    Route::put('admin/dosen/{id}/rjabatan/{jabatanId}', [AdminController::class, 'updateJabatan'])->name('dosen.updateJabatan');

    Route::get('admin/dosen/{id}/rpenelitian/create', [AdminController::class, 'createPenelitian'])->name('dosen.createPenelitian');
    Route::post('admin/dosen/{id}/rpenelitian', [AdminController::class, 'storePenelitian'])->name('dosen.storePenelitian');
    Route::get('admin/dosen/{id}/rpenelitian/{penelitianId}/edit', [AdminController::class, 'editPenelitian'])->name('dosen.editPenelitian');
    Route::put('admin/dosen/{id}/rpenelitian/{penelitianId}', [AdminController::class, 'updatePenelitian'])->name('dosen.updatePenelitian');

    Route::get('admin/user', [AdminController::class, 'user'])->name('admin.users');
    Route::get('admin/users/create', [AdminController::class, 'createUser'])->name('users.create');
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::get('/users/edit/{id}', [AdminController::class, 'editUser'])->name('users.edits');
    Route::patch('/users/update/{id}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('users.delete');

    //? Mahasiswa
    Route::get('admin/mahasiswa', [AdminController::class, 'mahasiswa'])->name('admin.mahasiswa');
    Route::get('admin/mahasiswa/create', [AdminController::class, 'createMahasiswa'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [AdminController::class, 'addMahasiswa'])->name('mahasiswa.store');
    Route::get('/mahasiswa/edit/{id}', [AdminController::class, 'editMahasiswa'])->name('mahasiswa.edits');
    Route::patch('/mahasiswa/update/{id}', [AdminController::class, 'updateMahasiswa'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [AdminController::class, 'destroyMahasiswa'])->name('mahasiswa.delete');

    /**Prefis SKS */
    Route::get('admin/sks', [AdminController::class, 'sks'])->name('admin.sks');
    Route::get('admin/sks/create', [AdminController::class, 'createSks'])->name('sks.create');
    Route::post('/sks', [AdminController::class, 'storeSks'])->name('sks.store');

    /** Hitung Matkul Prefix */
    Route::get('admin/dosenmatkul', [HitungController::class, 'hitung'])->name('admin.hitung');
    Route::get('/hitung/show/{id}', [HitungController::class, 'editHitung'])->name('edit.hitung');
    Route::patch('/hitung/update/{id}', [HitungController::class, 'update'])->name('update.hitung');
    Route::get('/hitung/edit/{id}', [HitungController::class, 'showHitung'])->name('show.hitung');
    Route::delete('/hapusmatkul/{id}', [HitungController::class, 'deleteMatkul'])->name('delete.hitung');

    /** Jurusan Prefix */
    Route::get('admin/jurusan', [JurusanController::class, 'index'])->name('admin.jurusan');
    Route::get('admin/jurusans/create', [JurusanController::class, 'create'])->name('jurusan.create');
    Route::post('/jurusan', [JurusanController::class, 'store'])->name('jurusan.store');
    Route::patch('admin/jurusans/edit/{id}', [JurusanController::class, 'update'])->name('jurusan.updates');
    Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
    Route::delete('/jurusans/{id}', [JurusanController::class, 'destroy'])->name('jurusan.delete');

    /** Matkul Prefix */
    Route::get('admin/matkul', [MatkulController::class, 'index'])->name('admin.matkul');
    Route::get('admin/matkul/create', [MatkulController::class, 'create'])->name('matkul.create');
    Route::post('/matkul', [MatkulController::class, 'store'])->name('matkul.store');
    Route::patch('admin/matkul/edit/{id}', [MatkulController::class, 'update'])->name('matkul.updates');
    Route::get('/matkul/edit/{id}', [MatkulController::class, 'edit'])->name('matkul.edit');
    Route::delete('/matkul/{id}', [MatkulController::class, 'destroy'])->name('matkul.delete');

    /** Total Gaju Prefix */
    Route::get('admin/totalgaji', [HitungController::class, 'totalgaji'])->name('admin.total');

    /** Jadwal Prefix */
    Route::get('admin/jadwal', [JadwalController::class, 'index'])->name('dosen.jadwal');
    Route::get('admin/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::patch('admin/jadwal/edit/{id}', [JadwalController::class, 'update'])->name('jadwal.updates');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.delete');

    Route::delete('/delete/{id}', [AdminController::class, 'delete'])->name('dosen.delete');
    Route::get('/dosen/edit/{id}', [AdminController::class, 'edit'])->name('dosen.edits');
    Route::get('/sks/edit/{id}', [AdminController::class, 'editSks'])->name('sks.edits');
    Route::patch('/dosen/update/{id}', [AdminController::class, 'update'])->name('dosen.updates');
    Route::patch('/sks/update/{id}', [AdminController::class, 'updateSks'])->name('sks.updates');
    Route::resource('dosen', AdminController::class);

    /** Gaji Prefix */
    Route::get('admin/gaji', [GajiController::class, 'index'])->name('admin.gaji');
    Route::get('admin/gaji/create', [GajiController::class, 'create'])->name('gaji.create');
    Route::post('/gaji', [GajiController::class, 'store'])->name('gaji.store');
    Route::patch('admin/gaji/edit/{id}', [GajiController::class, 'update'])->name('gaji.updates');
    Route::get('/gaji/edit/{id}', [GajiController::class, 'edit'])->name('gaji.edit');
    Route::delete('/gaji/{id}', [GajiController::class, 'destroy'])->name('gaji.delete');
});
