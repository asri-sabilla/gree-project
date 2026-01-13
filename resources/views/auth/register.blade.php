@extends('layouts.auth')

@section('title', 'Register | GREE')

@section('content')
<div class="login-container">
    <div class="bg-circle"></div>
    <div class="login-overlay"></div>

    <div class="login-card">
        <div class="logo">
            <img src="{{ asset('img/gree.png') }}" alt="GREE Logo">
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input 
                type="text"
                name="name"
                placeholder="Full Name"
                value="{{ old('name') }}"
                required
            >
            @error('name')
                <small style="color:red">{{ $message }}</small>
            @enderror

            <input 
                type="email"
                name="email"
                placeholder="Email"
                value="{{ old('email') }}"
                required
            >
            @error('email')
                <small style="color:red">{{ $message }}</small>
            @enderror

            <input 
                type="password"
                name="password"
                placeholder="Password"
                required
            >
            @error('password')
                <small style="color:red">{{ $message }}</small>
            @enderror

            <input 
                type="password"
                name="password_confirmation"
                placeholder="Confirm Password"
                required
            >

            <button type="submit" class="btn-login">
                Register
            </button>

            <div class="switch-auth">
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
