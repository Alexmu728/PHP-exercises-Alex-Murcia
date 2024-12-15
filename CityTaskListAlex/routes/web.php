<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/search', [TaskController::class, 'search'])->name('task.search');
    Route::get('citizens/search', [CitizenController::class, 'search'])->name('citizen.search');
    Route::get('addresses/search', [AddressController::class, 'search'])->name('address.search');
    Route::get('subjects/search', [SubjectController::class, 'search'])->name('subject.search');
    Route::resource('citizens', CitizenController::class);
    Route::resource('addresses', AddressController::class);
    Route::resource('subjects', SubjectController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login'); // Aquí se usa showLoginForm en lugar de create
Route::post('login', [LoginController::class, 'login']); // Usamos login en lugar de store
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);

