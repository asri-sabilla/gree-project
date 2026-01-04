<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | GREE</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

<div class="login-container">
    <div class="bg-circle"></div>
    <div class="login-overlay"></div>

    <div class="login-card">
        <div class="logo">
            <img src="{{ asset('images/gree.png') }}" alt="GREE Logo">
        </div>

        <form>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Password" required>

            <div class="forgot">
                <a href="#">Forgot Password?</a>
            </div>

            <button class="btn-login">Login</button>

            <div class="switch-auth">
                Don’t have an account?
                <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div>

</div>

</body>
</html>
