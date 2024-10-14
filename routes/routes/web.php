<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;


// Group routes for home and posts
Route::group([], function () {

    // Home routes
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

    // Posts routes
    Route::get('/recent-posts/{days_ago}', [PostsController::class, 'recentPosts'])
        ->where('days_ago', '[0-9]+') // Ensure days_ago is numeric
        ->name('posts.recent.index');

    Route::get('/posts/{id}', [PostsController::class, 'show'])
        ->where('id', '[a-zA-Z]{1}') // Ensure id is a single character (alpha)
        ->name('posts.show');

    Route::get('/variable', [ExampleController::class, 'showVariable'])->name('example.variable');
    Route::get('/array', [ExampleController::class, 'showArray'])->name('example.array');
    Route::get('/array/{id}', [ExampleController::class, 'showArrayElement'])->name('example.element');
    Route::get('/styled-array', [ExampleController::class, 'showStyledArray'])->name('example.styled_array');

    Route::get('/', [UserController::class, 'index'])->name('home'); // Home page with FORM and EDAD buttons
    Route::get('/form', [UserController::class, 'showForm'])->name('form'); // Form for Name and Lastname
    Route::post('/form', [UserController::class, 'submitForm'])->name('form.submit'); // POST route to handle form submission

    Route::get('/age', [UserController::class, 'showAgeForm'])->name('age'); // Form for Age
    Route::post('/age', [UserController::class, 'submitAge'])->name('age.submit'); // POST route to handle age submission
    Route::get('/result', [UserController::class, 'showResult'])->name('result'); // Page to show the result (Age)
    
    Route::get('/dashboard', [WebsiteController::class, 'showDashboard'])->name('dashboard');
    Route::get('/events', [WebsiteController::class, 'showEvents'])->name('events');
    Route::post('/events/{event_id}/book', [WebsiteController::class, 'bookTicket'])->name('book_ticket');
});
