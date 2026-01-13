<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Data Pendaftar Workshop</title>
</head>
<body>

<div class="container p-4 bg-white">
    <h1 class="mb-4 text-center">Data Pendaftar Workshop</h1>

    @if ($bookings->count())
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Workshop</th>
                    <th>WhatsApp</th>
                    <th>Email</th>
                    <th>Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $booking->nama }}</td>
                        <td>{{ $booking->workshop }}</td>
                        <td>{{ $booking->whatsapp }}</td>
                        <td>{{ $booking->email }}</td>
                        <td>{{ $booking->metode_pembayaran }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-dark text-center">
            Tidak ada data pendaftar...
        </div>
    @endif
</div>

</body>
</html>
