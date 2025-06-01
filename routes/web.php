<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MargaController;
use App\Http\Controllers\PasanganController;
use App\Http\Controllers\FamilyTreeController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\ForgotPasswordController;
Route::get('/', function() {
    return view('login');
})->middleware('guest')->name('login');

Route::post('/login', [AuthManager::class, 'login'])->name('login.action');

Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');

Route::get('/marga', [MargaController::class, 'index'])->name('marga')->middleware('auth');

Route::resource('marga', MargaController::class)->middleware('auth');

Route::get('/pasangan', [PasanganController::class, 'index'])->name('marga')->middleware('auth');

Route::resource('pasangan', PasanganController::class)->middleware('auth');

Route::get('/error404', function() {
    return view(view: 'errors.404');
})->name('error404')->middleware('auth');

Route::get('/register', [AuthManager::class, 'register'])->name('register')->middleware('guest');
Route::post('/register', [AuthManager::class, 'registerAction'])->name('register.action')->middleware('guest');

Route::get('/marga/count', function() {
    return response()->json(['count' => \App\Models\Marga::count()]);
})->name('marga.count');

Route::get('/marga/check', function() {
    $userId = auth()->user()->id_user;
    $exists = \App\Models\Marga::where('created_by', $userId)->exists();
    return response()->json(['exists' => $exists]);
})->name('marga.check');

// routes/web.php
Route::get('/pohon-keluarga/{id_marga}', [FamilyTreeController::class, 'show'])->name('pohon-keluarga.show')->middleware('auth');

Route::get('/familytree', [FamilyTreeController::class, 'index'])->name('familytree.index');
Route::get('/familytree/user/{id_user}', [FamilyTreeController::class, 'getUserDetails'])->name('familytree.getUserDetails');



Route::get('/logactivity', [LogActivityController::class, 'index'])->name('logactivity.index')->middleware('auth');
Route::middleware(['auth'])->group(function() {
    Route::get('/settings', [App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [App\Http\Controllers\SettingController::class, 'update'])->name('settings.update');
});

Route::get('forgot-password', function() {
    return view('auth.forgot_password');
})->name('password.request');

Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
