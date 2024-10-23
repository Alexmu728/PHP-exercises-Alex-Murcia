<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\MountainController;

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

// Posts routes
Route::get('/recent-posts/{days_ago}', [PostsController::class, 'recentPosts'])
    ->where('days_ago', '[0-9]+')
    ->name('posts.recent.index');

Route::get('/posts/{id}', [PostsController::class, 'show'])
    ->where('id', '[a-zA-Z]{1}')
    ->name('posts.show');

// Example routes
Route::get('/variable', [ExampleController::class, 'showVariable'])->name('example.variable');
Route::get('/array', [ExampleController::class, 'showArray'])->name('example.array');
Route::get('/array/{id}', [ExampleController::class, 'showArrayElement'])->name('example.element');
Route::get('/styled-array', [ExampleController::class, 'showStyledArray'])->name('example.styled_array');

// User routes
Route::get('/user', [UserController::class, 'index'])->name('user.index'); // <-- Aquí cambiamos el name
Route::get('/form', [UserController::class, 'showForm'])->name('form');
Route::post('/form', [UserController::class, 'submitForm'])->name('form.submit');

Route::get('/age', [UserController::class, 'showAgeForm'])->name('home.age');
Route::post('/age', [UserController::class, 'submitAge'])->name('age.submit');
Route::get('/result', [UserController::class, 'showResult'])->name('home.result');

// Website routes
Route::get('/dashboard', [WebsiteController::class, 'showDashboard'])->name('dashboard');
Route::get('/events', [WebsiteController::class, 'showEvents'])->name('events');
Route::post('/events/{event_id}/book', [WebsiteController::class, 'bookTicket'])->name('book_ticket');

Route::get('/mountains', MountainController::class);