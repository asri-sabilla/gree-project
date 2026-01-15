<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $bookings = booking::where('email', $user->email)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('profil', compact('user', 'bookings'));
    }
}
