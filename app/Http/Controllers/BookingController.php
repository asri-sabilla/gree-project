<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\booking;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\DaftarBooking;

class BookingController extends Controller
{
    //Eloquent ORM
    public function cekobject(){
        $booking = new booking;
        dump($booking);
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'workshop' => 'required',
    //         'whatsapp' => 'required',
    //         'email' => 'required|email',
    //         'metode_pembayaran' => 'required'
    //     ]);

    //     Booking::create($request->all());

    //     return redirect()->back()->with('success', 'Data berhasil disimpan');
    // }

    public function insertBook(){
        $booking = new booking;
        $booking->nama = 'Sari Citra Lestari';
        $booking->workshop = 'menanam buah di pekarangan';
        $booking->whatsapp = '08123456789';
        $booking->email = 'sari@example.com';
        $booking->metode_pembayaran = 'Dana';
        $booking->save();
        dump($booking);
    }

    public function input(){
        Booking::create(
        [
        'nama' => 'Rudi Permana',
        'workshop' => 'menanam sayur di pekarangan',
        'whatsapp' => '08123456789',
        'email' => 'rudi@example.com',
        'metode_pembayaran' => 'Gopay',
        ]
        );
        return "Berhasil di proses";
    }

    public function update(){
        $booking = booking::find(1);
        $booking->workshop = 'Mengecek kesegaran buah';
        $booking->metode_pembayaran = 'Transfer Bank BSI';
        $booking->save();
        dump($booking);
    }

    public function delete(){
        $booking = booking::find(1);
        $booking->delete();
        dump($booking);
        // error jika booking tidak ditemukan
    }

    // Form Processing & Form Validation Booking
    public function index()
    {
        $bookings = booking::all();
            return view('admin.bookings.index',['bookings' => $bookings]);
    }   

    public function prosesForm(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama' => 'required|min:3|max:50',
            'workshop' => 'required',
            'whatsapp' => 'required|min:10|max:14',
            'email' => 'required|email',
            'metode_pembayaran' => 'required',
            'bukti_bayar' => 'nullable|image|max:2048',
        ],
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size
            karakter.',
            'max' => ':attribute maskimal berisi :max
            karakter.',
            'min' => ':attribute minimal berisi :min
            karakter.',
            'email' => 'harus diisi dengan alamat email
            yang valid.',
            'in' => ':attribute yang dipilih tidak
            valid.',
        ]
    );

        if ($validator->fails()) {
            return
                redirect('/')->withErrors($validator)->withInput();
        }
            else {

        echo $request->nama; echo "<br>";
        echo $request->workshop; echo "<br>";
        echo $request->whatsapp; echo "<br>";
        echo $request->email; echo "<br>";
        echo $request->metode_pembayaran; echo "<br>";
    }
}
    public function prosesFormRequest(DaftarBooking $request)
    {
       $validateData = $request->validated();
        dump($validateData);
    }

    //CRUD Booking
    public function create()
    {
        return view('form-booking');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|min:3|max:50',
            'workshop' => 'required',
            'whatsapp' => 'required|min:10|max:14',
            'email' => 'required|email',
            'metode_pembayaran' => 'required',
            'bukti_bayar' => 'nullable|image|max:2048',
        ]);
        $namaFile = null;

    if($request->hasFile('bukti_bayar')){
        $file = $request->file('bukti_bayar');
        $namaFile = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('bukti'), $namaFile);
    }
        $validateData['bukti_bayar'] = $namaFile;

        $booking = booking::create($validateData);
        return view('success', ['booking' => $booking]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Sukses,Failed'
        ]);

        $booking = booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return back();
    }

}