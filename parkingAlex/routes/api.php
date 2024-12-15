<?php

use App\Http\Controllers\ParkingLotController;
use App\Http\Controllers\CarController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/cars', [CarController::class, 'index']);
Route::get('/parking-lots', [ParkingLotController::class, 'index']);
Route::get('/cars/{license_plate}', [CarController::class, 'show']);
Route::delete('/cars/{license_plate}', [CarController::class, 'destroy']);
Route::get('/latest-cars', [CarController::class, 'latest']);
Route::post('/cars', [CarController::class, 'store']);
Route::post('/cars/to-parking-lot', [CarController::class, 'storeCarInParkingLot']);
