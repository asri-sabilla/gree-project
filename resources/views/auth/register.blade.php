<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | GREE</title>

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
            <input type="text" placeholder="Nama" required>
            <input type="email" placeholder="Email" required>
            <input type="password" placeholder="Password" required>
            <input type="confirm_password" placeholder="Confirm Password" required>
            <button class="btn-login">Register</button>

            <div class="switch-auth">
                Already have an account?
                <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>

</div>

</body>
</html>
