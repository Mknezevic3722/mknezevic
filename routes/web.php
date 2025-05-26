<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name("home");

Route::get('/o-nama', function () {
    return view('o-nama');
})->name("o-nama");


