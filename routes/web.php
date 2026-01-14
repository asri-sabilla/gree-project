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

Route::get('/profile', function () {
    return view('pages.profile');
})->name('profile');

Route::post('/booking', function (Request $request) {

    session([
        'nama'     => $request->nama,
        'workshop' => $request->workshop,
        'wa'       => $request->wa,
        'email'    => $request->email,
        'payment'  => $request->payment,
        'booked'   => true,
    ]);

    return redirect()->route('success');

})->name('booking.submit');

Route::get('/success', function () {
    return view('pages.success');
})->name('success');

