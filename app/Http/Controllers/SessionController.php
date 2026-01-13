<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class SessionController extends Controller {

    public function index()
    {
        echo '<ul>';
        echo '<li><a href=/buat-session>Buat Session</a></li>';
        echo '<li><a href=/akses-session>Akses Session</a></li>';
        echo '<li><a href=/hapus-session>Hapus Session</a></li>';
        echo '<li><a href=/flash-session>Flash Session</a></li>';
        echo '</ul>';
    }
    public function buatSession()
    {
        session(['hakAkses' => 'admin','nama' => 'Asri']);
        return "Session sudah dibuat";

    }
    public function aksesSession()
    {
        # Menggunakan helper function
        if (session()->has('hakAkses'))
        {
        echo "Session 'hakAkses' terdeteksi: ". session('hakAkses');
        }
        echo '<hr>';
        dump(session()->all());
    }
    public function hapusSession()
    {
        session()->forget('hakAkses');
        return "Session 'hakAkses' telah dihapus";
        
        // session()->flush();
        // return "Semua session telah dihapus";
    }
    public function flashSession()
    {
}
}