<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Data Workshop</title>
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-12">

            <form action="{{ route('logout') }}" method="POST" class="mb-3">
                @csrf
                <button type="submit" class="btn btn-danger">
                    Logout
                </button>
            </form>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Data Workshop</h3>
                <a href="{{ route('admin.workshops.create') }}" class="btn btn-primary">
                    + Tambah Workshop
                </a>
            </div>

            @if(session()->has('pesan'))
                <div class="alert alert-success">
                    {{ session()->get('pesan') }}
                </div>
            @endif

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th>Harga</th>
                        <th>Poster</th>
                        <th class="text-center">Aksi</th>
                        <th>Status</th> 
                    </tr>
                </thead>

                <tbody>
                @forelse ($workshops as $workshop)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <a href="{{ route('workshops.show', $workshop->id) }}">
                                {{ $workshop->title }}
                            </a>
                        </td>

                        <td>{{ $workshop->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($workshop->date)->format('d-m-Y') }}</td>
                        <td>{{ $workshop->lokasi }}</td>
                        <td>Rp {{ number_format($workshop->price, 0, ',', '.') }}</td>

                        <td>
                            @if ($workshop->poster)
                                <img src="{{ asset('storage/uploads/'.$workshop->poster) }}"
                                     width="80"
                                     class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td class="text-center">
                            <a href="{{ route('admin.workshops.edit', $workshop->id) }}"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.workshops.destroy', $workshop->id) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>

                        <td class="text-center">
                        @if(session('new_workshop_id') == $workshop->id)
                            <span class="badge bg-warning text-dark">Draft</span>
                        @else
                            <span class="badge bg-primary">Publish</span>
                        @endif
                    </td>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">
                            Tidak ada data workshop
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
