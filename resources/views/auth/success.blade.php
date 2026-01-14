<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Workshop Berhasil</title>
    <link rel="stylesheet" href="{{ asset('css/success.css') }}">
</head>
<body>

<section class="success">
    <div class="success-card">

        <!-- LEFT -->
        <div class="success-left">
            <h1>Yey kamu sudah<br>terdaftar workshop<br>kami</h1>

            <p class="info">
                Berikut rincian workshop yang kamu daftar,  
                info selanjutnya akan admin hubungi via WhatsApp dan Email
            </p>

            <p class="join">
                Klik link dibawah untuk join komunitas hijau disana  
                ada banyak info seru lain nya!
            </p>
        </div>

        <!-- RIGHT -->
        <div class="success-right">
            <p><strong>Nama :</strong> {{ session('nama') }}</p>
            <p><strong>Workshop :</strong> {{ session('workshop') }}</p>
            <p><strong>Nomor WhatsApp :</strong> {{ session('wa') }}</p>
            <p><strong>Email :</strong> {{ session('email') }}</p>
            <p><strong>Pembayaran :</strong> {{ session('payment') }}</p>
        </div>

    </div>
</section>

<footer class="footer">
    <div class="footer-left">
        <h2>Let’s Join Our<br>Community</h2>
        <div class="wa-icon">
            <a href="https://chat.whatsapp.com/Ca6zovqCI5uJWmWtL2xCHS" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg">
            </a>
        </div>
    </div>

    <div class="footer-right">
        <h3>Contact</h3>
        <p>Instagram</p>
    </div>
</footer>

</body>
</html>
