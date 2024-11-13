<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
