<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Workshop</title>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">

            <h3>Edit Workshop</h3>
            <hr>

            <form action="{{ route('admin.workshops.update', $workshop->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           value="{{ old('title', $workshop->title) }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description"
                              class="form-control @error('description') is-invalid @enderror"
                              rows="3">{{ old('description', $workshop->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date"
                           name="date"
                           class="form-control"
                           value="{{ old('date', $workshop->date) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text"
                           name="lokasi"
                           class="form-control"
                           value="{{ old('lokasi', $workshop->lokasi) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number"
                           name="price"
                           class="form-control"
                           value="{{ old('price', $workshop->price) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Poster</label><br>

                    @if ($workshop->poster)
                        <img src="{{ asset('uploads/'.$workshop->poster) }}"
                            width="120"
                            class="mb-2 img-thumbnail">
                    @endif

                    <input type="file" name="poster" class="form-control">
                </div>


                <button type="submit" class="btn btn-primary">
                    Update
                </button>
                <a href="{{ route('admin.workshops.index') }}" class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>
</div>

</body>
</html>