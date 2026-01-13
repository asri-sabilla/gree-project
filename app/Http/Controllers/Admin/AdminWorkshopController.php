<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminWorkshopController extends Controller
{
    public function insert()
    {
        $result = DB::table('workshops')->insert([
            'title' => 'Pelestarian Lingkungan Hidup',
            'description' => 'Workshop tentang pelestarian lingkungan hidup dan sumber daya alam.',
            'date' => '1998-05-12',
            'lokasi' => 'Jakarta',
            'price' => 500000,
            'poster' => 'dummy.jpg',
            'created_at' => now(),
            'updated_at' => now(),

        ]);

        dd('$result');
    }}
//     // READ
//     public function index()
//     {
//         $workshops = Workshop::all();
//         return view('admin.workshop.index', compact('workshops'));
//     }

//     // FORM CREATE
//     public function create()
//     {
//         return view('admin.workshop.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'nama_workshop' => 'required',
//             'deskripsi' => 'required',
//             'tanggal' => 'required|date',
//             'lokasi' => 'required',
//             'harga' => 'required|numeric',
//             'poster' => 'required|image'
//         ]);

//         // upload file
//         $posterPath = $request->file('poster')->store('posters','public');

//         DB::table('workshops')->insert([
//             'nama_workshop' => $request->nama_workshop,
//             'deskripsi' => $request->deskripsi,
//             'tanggal' => $request->tanggal,
//             'lokasi' => $request->lokasi,
//             'harga' => $request->harga,
//             'poster' => $posterPath,
//             'created_at' => now(),
//             'updated_at' => now()
//         ]);

//         return redirect()->route('admin.dashboard')
//             ->with('success','Workshop berhasil ditambahkan');
//     }
// }
//     // FORM EDIT
//     public function edit(Workshop $workshop)
//     {
//         return view('admin.workshop.edit', compact('workshop'));
//     }

//     // UPDATE
//     public function update(Request $request, Workshop $workshop)
//     {
//         $validated = $request->validate([
//             'title' => 'required|min:5',
//             'description' => 'required',
//             'date' => 'required|date',
//             'price' => 'required|numeric|min:0',
//             'poster' => 'nullable|image|mimes:jpg,png|max:2048'
//         ]);

//         // Jika ganti poster
//         if ($request->hasFile('poster')) {
//             Storage::disk('public')->delete($workshop->poster);

//             $validated['poster'] = $request->file('poster')
//                                             ->store('posters','public');
//         }

//         $workshop->update($validated);

//         return redirect()
//             ->route('admin.workshops.index')
//             ->with('success','Workshop berhasil diupdate');
//     }

//     // DELETE
//     public function destroy(Workshop $workshop)
//     {
//         Storage::disk('public')->delete($workshop->poster);
//         $workshop->delete();

//         return redirect()
//             ->route('admin.workshops.index')
//             ->with('success','Workshop berhasil dihapus');
//     }
// }