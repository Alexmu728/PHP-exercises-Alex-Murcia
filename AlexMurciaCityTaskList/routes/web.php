<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("citizens", CitizenController::class);
Route::resource("addresses", AddressController::class);
Route::resource("tasks", TaskController::class);
Route::resource("subjects", SubjectController::class);

Route::get("/task/recent", [TaskController::class, "recent"]);
Route::get("/tasks/filter", [TaskController::class, "filter"])->name("tasks.filter");
Route::get("/tasjs/search", [TaskController::class, "search"])->name("tasks.search");

Route::post("/addresses", [AddressController::class, "store"])->name("addresses.store");