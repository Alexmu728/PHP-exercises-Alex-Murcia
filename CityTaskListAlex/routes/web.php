<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("citizens", CitizenController::class);
Route::resource("addresses", AddressController::class);
Route::resource("tasks", TaskController::class);
Route::resource("subjects", SubjectController::class);

Route::get("/addresses/create", [AddressController::class, "create"])->name("addresses.create");
Route::get("/task/recent", [TaskController::class, "recent"]);
Route::get("/tasks/filter", [TaskController::class, "filter"])->name("tasks.filter");

//home
Route::get("/", [HomeController::class, "index"])->name("home");

//edit
Route::get("/tasks/{id}/edit", [TaskController::class, "edit"])->name("tasks.edit");
Route::get("/addresses/{id}/edit", [AddressController::class, "edit"])->name("addresses.edit");
Route::get("/subjects/{id}/edit", [SubjectController::class, "edit"])->name("subjects.edit");

//search
Route::get("/tasks/search", [TaskController::class, "search"])->name("task.search");
Route::get("/citizens/search", [CitizenController::class, "search"])->name("citizen.search");
Route::get("/subjects/search", [SubjectController::class, "search"])->name("subject.search");
Route::get("/addresses/search", [AddressController::class, "search"])->name("address.search");

Route::post("/addresses", [AddressController::class, "store"])->name("addresses.store");