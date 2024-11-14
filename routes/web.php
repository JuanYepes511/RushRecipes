<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::get('/home', 'App\Http\Controllers\RecipeController@index')->name('recipes');

Route::get('/forum', function () {
    return view('forum');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

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
