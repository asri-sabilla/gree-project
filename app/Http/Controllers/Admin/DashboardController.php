<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workshop;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function tampil()
    {
        // ambil semua data pendaftar workshop
        $bookings = Booking::latest()->get();

        return view('admin.registrations.index', [
            'bookings' => $bookings
        ]);
    }
}

//     public function index()
//         {
//         return view('welcome');
//         }
//     public function tampil()
// {
//     $arrUser = [
//         "Risa Lestari",
//         "Rudi Hermawan",
//         "Bambang Kusumo",
//         "Lisa Permata"
//     ];

//     return view('admin.registrations.index', [
//         'user' => $arrUser
//     ]);
// }