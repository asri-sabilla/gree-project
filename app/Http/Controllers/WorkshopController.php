<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function daftarMahasiswa()
    {
        return view('halaman',['judul' => 'Daftar Mahasiswa']);
    }
    public function tabelMahasiswa()
    {
        return view('halaman',['judul' => 'Tabel Mahasiswa']);
    }
    public function blogMahasiswa()
    {
        return view('halaman',['judul' => 'Blog Mahasiswa']);
    }
}
