<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DentistController;
use App\Http\Controllers\ClientController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("/dentists", DentistController::class);
Route::resource("/clients", ClientController::class);

Route::get("/dentists/create", [DentistController::class, "create"])->name("dentists.create");
Route::get("/clients/create", [ClientController::class, "create"])->name("clients.create");

Route::get("/dentists/{id}/create", [DentistController::class, "edit"])->name("dentists.edit");