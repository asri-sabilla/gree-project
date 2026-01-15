<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="{{ asset('css/book.css') }}">

<title>Form Booking</title>
</head>
<body>

<div class="container pt-4 bg-white">
  <div class="row justify-content-center">
    <div class="col-md-6 col-xl-5">

<section class="booking">
<h1>Pendaftaran Workshop</h1>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="card">
    <label for="nama">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama" name="nama">
    @error('nama')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="workshop">Workshop</label>
    <select class="form-control" name="workshop" id="workshop">
        <option value="">-- Pilih Workshop --</option>
        <option value="Hari Panen Bersama">Hari Panen Bersama</option>
        <option value="Kunjungan Edukasi Kebun">Kunjungan Edukasi Kebun</option>
        <option value="Kelas Menanam Dasar">Kelas Menanam Dasar</option>
        <option value="Workshop Tanaman Organik">Workshop Tanaman Organik</option>
        <option value="Belajar Berkebun untuk Pemula">Belajar Berkebun untuk Pemula</option>
        <option value="Kelas Perawatan Tanaman">Kelas Perawatan Tanaman</option>
        <option value="Edukasi Pertanian Berkelanjutan">Edukasi Pertanian Berkelanjutan</option>
        <option value="Farm Experience untuk Anak">Farm Experience untuk Anak</option>
        <option value="Kelas Tanaman Pangan">Kelas Tanaman Pangan</option>
        <option value="Workshop Urban Farming">Workshop Urban Farming</option>
    </select>

    <label for="whatsapp">No WhatsApp</label>
    <input type="text" class="form-control" id="whatsapp" name="whatsapp">
    @error('whatsapp')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email">
    @error('email')
        <div class="text-danger">{{ $message }}</div>
    @enderror

    <label for="metode_pembayaran">Metode Pembayaran</label>
    <select class="form-control" name="metode_pembayaran" id="metode_pembayaran">
        <option value="">-- Pilih Metode --</option>
        <option value="Transfer Bank BSI - 7256813978">Transfer Bank BSI - 7256813978</option>
        <option value="Dana - 085925285385">Dana - 085925285385</option>
        <option value="Gopay - 085839172283">Gopay - 085839172283</option>
    </select>

    <label for="bukti_bayar">Upload Bukti Pembayaran</label>
        <label class="form-label">Bukti Pembayaran</label>
        <input type="file" name="bukti_bayar" class="form-control">
        <small class="text-muted"> Format JPG/PNG, Max 2MB</small>

    <button type="submit" class="btn btn-primary mb-2"> Daftar </button>
    </div>
    </section>
    </form>
    </div>
    </div>
    </div>
</body>
</html>