<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionController extends Controller
{

public function collection()
{
    $workshop00 = new \stdClass();
    $workshop00->title = "Menanam Tomat Segar";
    $workshop00->description = "Belajar menanam benih tomat yang baik dan benar di rumah";
    $workshop00->date = "Sunday, 11 January 2026";
    $workshop00->price = "Rp 25.000";

    $workshop01 = new \stdClass();
    $workshop01->title = "Urban Farming & Hidroponik";
    $workshop01->description = "Memanfaatkan ruang terbatas di perkotaan untuk bertani secara hidroponik";
    $workshop01->date = "Thursday, 22 January 2026";
    $workshop01->price = "Rp 30.000";

    $workshop02 = new \stdClass();
    $workshop02->title = "Pertanian Presisi (Smart Farming) & Agroteknologi";
    $workshop02->description = "Mengintegrasikan teknologi modern seperti Internet of Things (IoT), sensor, dan drone ke dalam proses pertanian";
    $workshop02->date = "Saturday, 7 February 2026";
    $workshop02->price = "Rp 55.000";

     $workshops = collect([
        0 => $workshop00,
        1 => $workshop01,
        2 => $workshop02,
        ]);
    dump($workshops);
    }
} 