<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AuthController;

Route::get('/home', 'App\Http\Controllers\RecipeController@index')->name('home');

Route::get('/forum', function () {
    return view('forum');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el login (cuando el formulario de login se envía)
Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/common-recipes', function () {
    return view('common-recipes');
});
Route::get('/search-results', function () {
    return view('search-results');
});
Route::get('/recipe-detail', function () {
    return view('recipe-detail');
});
Route::get('/payment', function () {
    return view('payment');
});
Route::get('/profile', function () {
    return view('profile');
});


Route::get('/recipes', 'App\Http\Controllers\RecipeController@index')->name('recipes');
Route::get('/recipe/{title}', [RecipeController::class, 'show']);
