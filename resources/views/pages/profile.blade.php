@extends('layout.master')

@section('content')

<section class="profile-page">

 <div class="profile-info">
    <p><strong>Nama :</strong> {{ session('nama') }}</p>
    <p><strong>Nomor WhatsApp :</strong> {{ session('wa') }}</p>
</div>




    <!-- WORKSHOP MU -->
    <h2 class="workshop-title" id="workshopTitle">Workshop mu</h2>

    <div class="workshop-list" id="workshopList">

        <div class="workshop-item">
            <div>
                <h4>Menanam padi</h4>
                <p>19 Januari 2026</p>
            </div>

            <div class="workshop-right">
                <span class="price">Rp 90.000</span>
            </div>
        </div>

    </div>

</section>

<script>
function showSuccess() {
    document.getElementById('successBox').style.display = 'block';
}
</script>

@endsection
