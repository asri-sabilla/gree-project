@extends('layout.master')

@section('content')

<section class="profile-page">

    <div class="profile-info">
        <p><strong>Nama :</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
    </div>

    <h2 class="workshop-title">Workshop mu</h2>

    @if($bookings->isEmpty())
        <p>Kamu belum mendaftar workshop.</p>
    @else
        <div class="workshop-list">
            @foreach($bookings as $booking)
                <div class="workshop-item">
                    <div>
                        <h4>{{ $booking->workshop }}</h4>

                        <p>
                            Status:
                            <strong class="
                                {{ $booking->status === 'Sukses' ? 'text-success' : '' }}
                                {{ $booking->status === 'Failed' ? 'text-danger' : '' }}
                            ">
                                {{ $booking->status ?? 'Pending' }}
                            </strong>
                        </p>

                        @if($booking->status === 'Sukses')
                            <a href="https://chat.whatsapp.com/Ca6zovqCI5uJWmWtL2xCHS"
                               target="_blank"
                               class="btn btn-success btn-sm mt-2 d-inline-flex align-items-center gap-2">
                                <i class="bi bi-whatsapp"></i>
                                Join Grup WhatsApp
                            </a>
                        @endif
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</section>

@endsection
