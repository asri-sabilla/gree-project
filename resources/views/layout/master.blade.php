<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GREE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('layout.header')

<main>
    @yield('content')
</main>

@include('layout.footer')

<script>
const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".navbar a");

window.addEventListener("scroll", () => {
    let current = "";
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        if (scrollY >= sectionTop) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach(link => {
        link.classList.remove("active");
        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
        }
    });
});

const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".navbar a");

window.addEventListener("scroll", () => {
    let current = "";
    sections.forEach(section => {
        const sectionTop = section.offsetTop - 120;
        if (scrollY >= sectionTop) {
            current = section.getAttribute("id");
        }
    });

    navLinks.forEach(link => {
        link.classList.remove("active");
        if (link.getAttribute("href") === "#" + current) {
            link.classList.add("active");
        }
    });
});

/* ===== PROGRAM MODAL ===== */
const cards = document.querySelectorAll('.program-card');
const modal = document.getElementById('programModal');
const closeBtn = document.querySelector('.close');

cards.forEach(card => {
    card.addEventListener('click', () => {
        document.getElementById('modalTitle').innerText = card.dataset.title;
        document.getElementById('modalDesc').innerText = card.dataset.desc;
        document.getElementById('modalDate').innerText = "Tanggal: " + card.dataset.date;
        document.getElementById('modalPrice').innerText = "Harga: " + card.dataset.price;
        modal.style.display = 'flex';
    });
});

closeBtn.onclick = () => modal.style.display = 'none';
window.onclick = e => { if (e.target === modal) modal.style.display = 'none'; }

</script>

<div id="programModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3 id="modalTitle"></h3>
        <p id="modalDesc"></p>
        <p id="modalDate"></p>
        <p id="modalPrice"></p>
    </div>
</div>

</body>
</html>

