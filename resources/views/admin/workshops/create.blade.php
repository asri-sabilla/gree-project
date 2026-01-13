<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Workshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h3 class="mb-3">Form Tambah Workshop</h3>
            <hr>

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ALERT ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.workshops.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- TITLE --}}
                <div class="mb-3">
                    <label class="form-label">Judul Workshop</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}">
                </div>

                {{-- DESCRIPTION --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description"
                              class="form-control"
                              rows="4">{{ old('description') }}</textarea>
                </div>

                {{-- DATE --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date"
                           name="date"
                           class="form-control"
                           value="{{ old('date') }}">
                </div>

                {{-- LOKASI --}}
                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text"
                           name="lokasi"
                           class="form-control"
                           value="{{ old('lokasi') }}">
                </div>

                {{-- PRICE --}}
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number"
                           name="price"
                           class="form-control"
                           value="{{ old('price') }}">
                </div>

                {{-- POSTER --}}
                <div class="mb-4">
                    <label class="form-label">Poster Workshop</label>
                    <input type="file"
                           name="poster"
                           class="form-control">
                    <small class="text-muted">
                        Format JPG/PNG, Max 2MB
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Workshop
                </button>

            </form>

        </div>
    </div>
</div>

</body>
</html>