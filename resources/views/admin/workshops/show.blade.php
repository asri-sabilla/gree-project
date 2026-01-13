<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Detail Workshop - {{ $workshop->title }}</title>
</head>
<body>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h3 class="mb-3">Detail Workshop</h3>
            <hr>

            {{-- POSTER --}}
            @if ($workshop->poster)
                <div class="mb-4 text-center">
                    <img src="{{ asset('storage/uploads/'.$workshop->poster) }}"
                         class="img-fluid rounded"
                         style="max-height: 350px">
                </div>
            @endif

            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <strong>Judul:</strong> {{ $workshop->title }}
                </li>

                <li class="list-group-item">
                    <strong>Deskripsi:</strong><br>
                    {{ $workshop->description }}
                </li>

                <li class="list-group-item">
                    <strong>Tanggal:</strong>
                    {{ \Carbon\Carbon::parse($workshop->date)->format('d M Y') }}
                </li>

                <li class="list-group-item">
                    <strong>Lokasi:</strong> {{ $workshop->lokasi }}
                </li>

                <li class="list-group-item">
                    <strong>Harga:</strong>
                    Rp {{ number_format($workshop->price, 0, ',', '.') }}
                </li>
            </ul>

            <a href="{{ route('admin.workshops.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            {{-- <a href="{{ route('workshops.edit', $workshop->id) }}"
               class="btn btn-warning ms-2">
                Edit
            </a> --}}

        </div>
    </div>
</div>

</body>
</html>
