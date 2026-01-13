@extends('layouts.auth')

@section('title', 'Login | GREE')

@section('content')
<div class="login-container">
    <div class="bg-circle"></div>
    <div class="login-overlay"></div>

    <div class="login-card">
        <div class="logo">
            <img src="{{ asset('img/gree.png') }}" alt="GREE Logo">
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

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

            <div class="forgot">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                @endif
            </div>

            <button type="submit" class="btn-login">Login</button>

            <div class="switch-auth">
                Don’t have an account?
                <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div>
</div>
@endsection
