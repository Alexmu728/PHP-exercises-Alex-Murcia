<?php

use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/users', [UserController::class, 'index']);

Route::middleware(['auth:sanctum'])->group(function(){
    Route::get('/events', [EventController::class, 'index']);
    Route::delete('/events/{name}', [EventController::class, 'destroy']);
    Route::post('/events', [EventController::class, 'store']);
    Route::delete('/users/{name}', [UserController::class, 'destroy']);
    Route::post('/users', [UserController::class, 'store']);

    Route::post('/enroll/{eventid]', [UserController::class, 'enroll']);
    Route::get('/dentist/events/{dentistid}', [UserController::class, 'assigned']);
    Route::get('/attendants/{eventid}', [EventController::class, 'attendants']);

    Route::middleware([\App\Http\Middleware\IsAdmin::class])->group(function(){
        Route::get('/dentists', [UserController::class, 'dentists']);
    });
});
