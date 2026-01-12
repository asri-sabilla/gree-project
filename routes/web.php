<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/news', function () {
    return view('pages.news');
})->name('news');

Route::get('/program', function () {
    return view('pages.program');
})->name('program');

Route::get('/program/detail', function () {
    return view('pages.program-detail');
})->name('program.detail');

Route::get('/program/payment', function () {
    return view('pages.program-payment');
})->name('program.payment');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
