<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ParkingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('parking')->controller(ParkingController::class)->group(function() {
    Route::get('/', 'index');
    Route::post('/add', 'store');
    Route::get('/{id}', 'show');
});

Route::prefix('car')->controller(CarController::class)->group(function() {
    Route::get('/', 'index');
    Route::post('/add', 'store');
    Route::get('/latest', 'latest');
    Route::get('/{license_plate}', 'show');
    Route::delete('/{id}', 'destroy');
});