<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("citizens", CitizenController::class);
Route::resource("addresses", AddressController::class);
Route::resource("tasks", TaskController::class);
Route::resource("subjects", SubjectController::class);

Route::get("/task/recent", [TaskController::class, "recent"]);
Route::get("/tasks/filter", [TaskController::class, "filter"]);
