<?php

use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('home');
});

Route::get('/license-plate/create', [CarController::class, 'createLicensePlate'])->name('license-plate.create');
Route::post('/license-plate/store', [CarController::class, 'storeLicensePlate'])->name('license-plate.store');

Route::get('/cars/create/{car_id}', [CarController::class, 'create'])->name('cars.create'); 
Route::post('/cars/{car_id}', [CarController::class, 'store'])->name('cars.store');
