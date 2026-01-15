@extends('admin.layouts.app')

@section('content')

<div class="container mt-4">
    <h3>Data Booking User</h3>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Workshop</th>
                <th>Whatsapp</th>
                <th>Email</th>
                <th>Metode Bayar</th>
                <th>Bukti Bayar</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($bookings as $booking)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $booking->nama }}</td>
                <td>{{ $booking->workshop }}</td>
                <td>{{ $booking->whatsapp }}</td>
                <td>{{ $booking->email }}</td>
                <td>{{ $booking->metode_pembayaran }}</td>

                <td>
                    @if($booking->bukti_bayar)
                        <a href="{{ asset('bukti/'.$booking->bukti_bayar) }}"
                           target="_blank"
                           class="btn btn-sm btn-info">
                            Lihat
                        </a>
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')

            <select name="status"
            class="form-select form-select-sm
                {{ $booking->status == 'Pending' ? 'bg-warning text-dark' : '' }}
                {{ $booking->status == 'Sukses' ? 'bg-success text-white' : '' }}
                {{ $booking->status == 'Failed' ? 'bg-danger text-white' : '' }}"
            onchange="updateStatusSelect(this); this.form.submit();">
                <option value="Pending"
                    {{ $booking->status == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>
                <option value="Sukses"
                    {{ $booking->status == 'Sukses' ? 'selected' : '' }}>
                    Sukses
                </option>
                <option value="Failed"
                    {{ $booking->status == 'Failed' ? 'selected' : '' }}>
                    Failed
                </option>       
            </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">
                    Tidak ada data booking
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<script>
function updateStatusSelect(select) {
    select.classList.remove(
        'bg-warning', 'bg-success', 'bg-danger',
        'text-dark', 'text-white'
    );

    if (select.value === 'Sukses') {
        select.classList.add('bg-success', 'text-white');
    } else if (select.value === 'Failed') {
        select.classList.add('bg-danger', 'text-white');
    } else {
        select.classList.add('bg-warning', 'text-dark');
    }
}
</script>

@endsection
