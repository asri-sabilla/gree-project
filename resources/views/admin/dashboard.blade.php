@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h3>Dashboard Admin</h3>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h5>Total Workshop</h5>
                <h2>{{ $workshopCount }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <h5>Total User</h5>
                <h2>{{ $userCount }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection