<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

Route::get('/', function () {
    return view('auth.home');  
});
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::middleware('role:admin')->get('/admin', [HomeController::class, 'admin'])->name('admin');
    Route::middleware('role:teacher')->get('/teacher', [HomeController::class, 'teacher'])->name('teacher');
    Route::middleware('role:student')->get('/student', [HomeController::class, 'student'])->name('student');
});

Gate::define('is-admin', fn ($user) => $user->role === 'admin');
Gate::define('is-teacher', fn ($user) => $user->role === 'teacher');
Gate::define('is-student', fn ($user) => $user->role === 'student');
