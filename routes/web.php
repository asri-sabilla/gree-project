<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\SessionController;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\AdminWorkshopController;
use App\Http\Controllers\Admin\DashboardController;

//data user registrations
Route::get('/user',[DashboardController::class,'tampil']);

//Eloquent ORM
Route::get('/cek-object',[BookingController::class,'cekobject']);
Route::get('/insertBook',[BookingController::class,'insertBook']);
Route::get('/input', [BookingController::class,'input']);
Route::get('/update', [BookingController::class,'update']);
Route::get('/delete', [BookingController::class,'delete']);

//insert data
Route::get('/insert', [AdminWorkshopController::class, 'insert']);

//collection
Route::get('/collection',[CollectionController::class,'collection']);

//session
// Route::get('/',[SessionController::class,'index']);
Route::get('/buat-session',[SessionController::class,'buatSession']);
Route::get('/akses-session',[SessionController::class,'aksesSession']);
Route::get('/hapus-session',[SessionController::class,'hapusSession']);
Route::get('/flash-session',[SessionController::class,'flashSession']);

//Form Booking
Route::get('/form',[BookingController::class,'index']);
Route::post('/proses-form',[BookingController::class,'prosesForm']);
Route::post('/proses-form-validator',[BookingController::class, 'prosesFormValidator']);
Route::post('/proses-form-request',[BookingController::class, 'prosesFormRequest']);

//CRUD Booking
Route::get('/bookings',[BookingController::class,'index'])->name('bookings.index');
Route::get('/bookings/create',[BookingController::class,'create'])->name('bookings.create');
Route::post('/bookings',[BookingController::class,'store'])->name('bookings.store');

// CRUD workshop
// Route::get('/workshops',[WorkshopController::class,'index'])->name('workshops.index');
// Route::post('/workshops', [WorkshopController::class, 'store'])->name('workshops.store');
// Route::get('/workshops/create',[WorkshopController::class,'create'])->name('workshops.create');
// Route::get('/workshops/{id}',[WorkshopController::class,'show'])->name('workshops.show');
// Route::get('/workshops/{id}/edit', [WorkshopController::class, 'edit'])->name('workshops.edit');
// Route::patch('/workshops/{id}', [WorkshopController::class, 'update'])->name('workshops.update');
// Route::delete('/workshops/{id}', [WorkshopController::class, 'destroy'])->name('workshops.destroy');

//middleware
Route::get('/tabel-workshop',[WorkshopController::class,'tabelWorkshop'])->middleware('admin');

//authentication
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/workshops', [WorkshopController::class, 'index'])
        ->name('admin.workshops.index');

    Route::get('/workshops/create', [WorkshopController::class, 'create'])
        ->name('admin.workshops.create');

    Route::post('/workshops', [WorkshopController::class, 'store'])
        ->name('admin.workshops.store');

    Route::get('/workshops/{id}/edit', [WorkshopController::class, 'edit'])
        ->name('admin.workshops.edit');

    Route::put('/workshops/{id}', [WorkshopController::class, 'update'])
        ->name('admin.workshops.update');

    Route::delete('/workshops/{id}', [WorkshopController::class, 'destroy'])
        ->name('admin.workshops.destroy');
});

//policy
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('workshops/{workshop}',[WorkshopController::class,'show'])
->name('workshops.show')->middleware('auth')->middleware('can:view,workshop');