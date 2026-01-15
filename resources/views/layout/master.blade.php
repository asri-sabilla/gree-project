<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GREE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>

@include('layout.header')

<main>
    @yield('content')
</main>

@include('layout.footer')

<script>
document.addEventListener("DOMContentLoaded", function () {

    const navbar = document.querySelector(".navbar");
    const navLinks = document.querySelectorAll(".menu a");
    const sections = document.querySelectorAll("[id]");

    function onScroll() {
        let current = "";

        sections.forEach(section => {
            const top = section.offsetTop - 120;
            const height = section.offsetHeight;

            if (window.scrollY >= top && window.scrollY < top + height) {
                current = section.getAttribute("id");
            }
        });

        // === ACTIVE MENU ===
        navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.getAttribute("href").includes("#" + current)) {
                link.classList.add("active");
            }
        });

        // === NAVBAR BLUR ===
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    }

    window.addEventListener("scroll", onScroll);
    onScroll();
});

// ===== NEWS SLIDER NAVIGATION =====
const newsSlider = document.getElementById('newsSlider');
const newsSliderLeft = document.getElementById('newsSliderLeft');
const newsSliderRight = document.getElementById('newsSliderRight');

if (newsSlider && newsSliderLeft && newsSliderRight) {
    const scrollAmount = 280; // card width + gap
    
    newsSliderLeft.addEventListener('click', () => {
        newsSlider.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    });
    
    newsSliderRight.addEventListener('click', () => {
        newsSlider.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });
}

// ===== PROGRAM MODAL =====
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