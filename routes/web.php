<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login/{role}', function ($role) {
    // Validasi role yang dibolehkan
    if (!in_array($role, ['user', 'vendor'])) {
        abort(404); // Jika role tidak valid, tampilkan 404
    }

    return view('auth.login', ['role' => ucfirst($role)]);
})->name('login');

Route::post('/login/{role}', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard sesuai role
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/admin/settings', function () {
        return view('admin.settings');
    })->name('admin.settings');
});

Route::middleware(['auth:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    Route::get('/user/profile', function () {
        return view('user.profile');
    })->name('user.profile');
});

Route::middleware(['auth:vendor'])->group(function () {
    Route::get('/vendor/dashboard', function () {
        return view('vendor.dashboard');
    })->name('vendor.dashboard');
    Route::get('/vendor/schedule', function () {
        return view('vendor.schedule');
    })->name('vendor.schedule');
});
