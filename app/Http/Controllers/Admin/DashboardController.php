<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Workshop;

class DashboardController extends Controller
{
    public function index()
        {
        return view('welcome');
        }
    public function tampil()
{
    $arrUser = [
        "Risa Lestari",
        "Rudi Hermawan",
        "Bambang Kusumo",
        "Lisa Permata"
    ];

    return view('admin.registrations.index', [
        'user' => $arrUser
    ]);
}
}