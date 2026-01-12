<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Book</title>
    <link rel="stylesheet" href="{{ asset('css/book.css') }}">
</head>
<body>

<section class="booking">
    <h1>Book</h1>

    <div class="card">
        <form>
            <input type="text" placeholder="Nama">

            <select>
                <option selected disabled>Workshop</option>
                <option>UI/UX</option>
                <option>Web Development</option>
                <option>Data Analyst</option>
            </select>

            <input type="text" placeholder="Nomor WhatsApp">
            <input type="email" placeholder="Email">

            <select>
                <option selected disabled>Pembayaran</option>
                <option>Transfer Bank</option>
                <option>E-Wallet</option>
            </select>

            <button type="submit">Bayar</button>
        </form>
    </div>
</section>

<footer class="footer">
    <div class="footer-left">
        <div class="wa-icon"></div>
        <div>
            <p>Let’s Join Our</p>
            <h2>Community</h2>
        </div>
    </div>

    <div class="footer-right">
        <h3>Contact</h3>
        <p>Instagram</p>
        <p>Instagram</p>
        <p>Instagram</p>
    </div>
</footer>

</body>
</html>
