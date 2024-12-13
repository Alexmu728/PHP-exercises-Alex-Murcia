<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Ruta para la página principal
Route::get('/', function () {
    return view('auth.home');  // Página donde se muestran los formularios de login y registro
});

// Ruta para el dashboard (asegúrate de que la ruta esté protegida con middleware de autenticación)
Route::get('/dashboard', [HomeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas para los diferentes roles
Route::middleware('auth')->group(function () {
    // Ruta para la página de administración (solo admin puede acceder)
    Route::middleware('role:admin')->get('/admin', [HomeController::class, 'admin'])->name('admin');

    // Ruta para la página de organización escolar (solo admin y teachers pueden acceder)
    Route::middleware('role:admin,teacher')->get('/school_organization', [HomeController::class, 'schoolOrganization'])->name('school_organization');

    // Ruta para los eventos (cualquier rol puede acceder)
    Route::middleware('role:admin,teacher,student')->get('/events', [HomeController::class, 'events'])->name('events');
    
    // Ruta para editar el perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');  // Esta ruta debe existir en ProfileController

    // Ruta para actualizar el perfil del usuario
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Esta ruta debe existir en ProfileController

    // Ruta para eliminar el perfil del usuario (opcional)
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta para el logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rutas de login y register
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);
