<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;
use Illuminate\Support\Str;
use App\Http\Requests\DaftarWorkshop;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth; 

class WorkshopController extends Controller
{

 public function create()
    {
        return view('admin.workshops.create');
    }

public function store(Request $request) 
{
    $this->authorize('create', workshop::class);

    $validateData = $request->validate([
        'title' => 'required|min:5',
        'description' => 'required',
        'date' => 'required|date',
        'lokasi' => 'required',
        'price' => 'required|numeric',
        'poster' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('poster')) {
    $file = $request->file('poster');
    $name = time().'.'.$file->getClientOriginalExtension();
    $file->move(public_path('uploads'), $name);

    $data['poster'] = $name;
}

    $workshop =Workshop::create([
        'title' => $validateData['title'],
        'description' => $validateData['description'],
        'date' => $validateData['date'],
        'lokasi' => $validateData['lokasi'],
        'price' => $validateData['price'],
        'poster' => $validateData['poster'],
    ]);

    $request->session()->flash('new_workshop_id', $workshop->id);
    $request->session()->flash('pesan', "Penambahan data {$validateData['title']} berhasil");
    return redirect()->route('admin.workshops.index');
}

    //read
    public function index()
    {
        $workshops = Workshop::all();
            return view('admin.workshops.index',['workshops' => $workshops]);
    }

    //show
    public function show(workshop $workshop)
    {
        return view('admin.workshops.show',['workshop' => $workshop]);
    }

    //edit
    public function edit($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('admin.workshops.edit', compact('workshop'));
    }

    //destroy
    public function destroy($id)
    {
    $workshop = Workshop::findOrFail($id);

    // hapus file poster kalau ada
    if ($workshop->poster && file_exists(storage_path('app/public/uploads/'.$workshop->poster))) {
        unlink(storage_path('app/public/uploads/'.$workshop->poster));
    }

    // hapus data
    $workshop->delete();

    return redirect()->route('admin.workshops.index')
        ->with('pesan', "Workshop dengan judul '{$workshop->title}' berhasil dihapus.");
    }

    //update
    public function update(Request $request, $id)
{
    $workshop = Workshop::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|min:5',
        'description' => 'required',
        'date' => 'required|date',
        'lokasi' => 'required',
        'price' => 'required|numeric',
        'poster' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('poster')) {

        if ($workshop->poster && file_exists(storage_path('app/public/uploads/' . $workshop->poster))) {
            unlink(storage_path('app/public/uploads/' . $workshop->poster));
        }

        $namaFile = time() . '_' . $request->poster->getClientOriginalName();
        $request->poster->storeAs('public/uploads', $namaFile);
        $validated['poster'] = $namaFile;
    }

    $workshop->update($validated);

    return redirect()->route('admin.workshops.index')
        ->with('pesan', 'Data workshop berhasil diupdate');
    }

    //middleware
    public function tabelWorkshop()
    {
        return 'Tabel data workshop';
    }

    public function __construct()
    {

    // Middleware aktif untuk satu route
    $this->middleware('Admin')->only('daftarWorkshop');
    
    }
}