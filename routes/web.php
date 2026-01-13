<?php
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/book', function () {
return view('book');
});


Route::get('/success', function () {
    return view('success');
})->name('success');