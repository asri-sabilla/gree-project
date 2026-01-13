@extends('layout.master')

@section('content')

<section id="home" class="no-padding">
    @include('components.hero')
</section>

<section id="about">
    @include('components.vission-mission')
    @include('components.our-team')
</section>

<section id="program">
    @include('components.news')
</section>

@endsection