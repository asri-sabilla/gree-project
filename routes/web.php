<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WorkshopController;

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/daftar-mahasiswa',[WorkshopController::class,'daftarMahasiswa'])->middleware('auth');
Route::get('/tabel-mahasiswa',[WorkshopController::class,'tabelMahasiswa'])->middleware('auth');
Route::get('/blog-mahasiswa',[WorkshopController::class,'blogMahasiswa'])->middleware('auth');