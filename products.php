<?php
$koneksi = new mysqli("localhost", "root", "", "azuraya_db");

$search = $_GET['search'] ?? '';
if (!empty($search)) {
    // filter produk berdasarkan nama atau kategori
    $products = $koneksi->query("SELECT * FROM produk WHERE nama LIKE '%$search%' OR kategori LIKE '%$search%'");
} else {
    $products = $koneksi->query("SELECT * FROM produk");
}
?>


<!-- Mulai HTML seperti products.html kamu -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Azuraya Vapor Store Purnama</title>
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      font-family: "Montserrat", sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
    background-color: var(--header-bg, #fcf346);
    color: var(--header-color, #040400);
    padding: 35px 40px;
    display: flex;
    justify-content: center;
    align-items: center;
      /* position: sticky; */
  /* top: 0; */
    z-index: 100;  /* Pastikan header tetap berada di atas konten lain */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}




        .logo img {
            width: 250px;
            height: auto;
            max-width: 100%;
        }

        .cart-icon {
            position: absolute;
            right: 20px; /* Posisikan di pojok kanan atas */
            top: 20px;
            cursor: pointer;
            z-index: 20;
        }

        .cart-icon img {
            width: 40px;
            height: auto;
            transition: transform 0.3s ease;
        }

        .cart-icon img:hover {
            transform: scale(1.1); /* Efek zoom saat hover */
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            font-size: 12px;
            font-weight: bold;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }


        /* Hamburger menu on the left (without animation) */
        .hamburger {
            display: block;
            cursor: pointer;
            position: absolute;
            left: 20px;
            top: 20px;
            z-index: 10; /* Ensure it's above the banner */
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: black;
            margin: 5px;
        }

        .contact-icon {
            position: absolute;
            bottom: 20px; /* Jarak dari bawah */
            left: 85%;
            transform: translateX(-50%); /* Memastikan ikon berada di tengah horizontal */
            width: 50px;
            height: 50px;
        }

        .contact-icon a {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 90%;
            height: 100%;
        }

        .contact-icon img {
            width: 100%;
            height: auto;
            border-radius: 50%; /* Membuat ikon berbentuk lingkaran */
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .contact-icon img:hover {
            transform: scale(1.1); /* Efek zoom saat hover */
            background-color: yellow; /* Efek latar belakang kuning */
        }

        /* Mobile menu styling with smooth transition */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: -260px; /* Start hidden */
            background-color: black;
            width: 250px;
            height: 100vh; /* Ubah height menjadi 100vh agar memenuhi layar */
            z-index: 1000; /* Pastikan berada di atas elemen lain */
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
            opacity: 0;
            padding-top: 20px; /* Beri sedikit padding atas agar lebih rapi */
        }

        .menu-logo {
            text-align: absolute; /* Membuat logo berada di tengah */
            padding: 20px 0; /* Memberikan jarak di atas dan bawah */
            border-bottom: 2px solid yellow; /* Menambahkan garis pemisah */
        }

        .menu-logo img {
            width: 200px; /* Sesuaikan ukuran logo */
            max-width: 80%;
            height: auto;
        }

        .mobile-menu a {
            color: white;
            padding: 10px;
            display: block;
            text-decoration: none;
            font-weight: bold;
        }

        .mobile-menu a:hover {
            background-color: yellow;
            color: white;
        }

        .mobile-menu .menu-item {
            margin-bottom: 10px;
        }

        /* Open mobile menu */
        .mobile-menu.open {
            transform: translateX(260px);
            opacity: 1;
        }

        /* Search Bar Styling */
        .search-bar-container {
  text-align: center;
  margin: 30px 0;
}

.search-bar {
  position: relative; /* PENTING */
  display: flex;
  align-items: center;
  justify-content: space-between;
  border: 2px solid #040400;
  border-radius: 25px;
  padding: 5px;
  max-width: 500px;
  margin: 0 auto;
}

        .search-bar input {
            flex: 1;
            padding: 2px;
            border: none;
            border-radius: 25px 0 0 25px;
            font-size: 16px;
            outline: none;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #040400;
            color: #fcf346;
            border: none;
            border-radius: 0 25px 25px 0;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }

        footer {
            background-color: #111;
            color: #fff;
            padding: 40px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 10%; /* This creates a 10% gap from the video section */
        }

        footer .footer-column img {
            width: 50%;
            max-width: 180px; /* Batasi ukuran maksimum */
            height: auto;
            margin-top: 15px;
        }

        footer .footer-column {
            flex: 1 1 200px;
            margin: 10px;
        }

        footer .footer-column h4 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #fcf346;
        }

        footer .footer-column p,
        footer .footer-column a {
            color: white;
            font-size: 15px;
            text-decoration: none;
        }

        footer .footer-column a:hover {
            color: #fcf346;
        }

        footer .social-icons {
    display: flex;
    gap: 10px;
}

        footer .social-icons img {
    width: 22px; /* Ukuran ikon agar pas di dalam lingkaran */
    height: auto;
}


        footer .social-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px; /* Sesuaikan ukuran lingkaran */
    height: 45px;
    border-radius: 50%;
    background-color: #fcf346;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

        footer .social-icons a:hover {
            background-color: #fff;
            color: #0f0;
        }

        footer .subscribe {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        footer .subscribe input {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            flex: 1;
        }

        footer .subscribe button {
            padding: 10px 20px;
            background-color: #0f0;
            border: none;
            color: #111;
            cursor: pointer;
            border-radius: 5px;
            font-size: 14px;
        }

        footer .subscribe button:hover {
            background-color: #fff;
            color: #0f0;
        }

        footer .bottom-text {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #fcf346;
        }

        .product-showcase {
            padding: 40px 20px;
            background-color: #f9f9f9;
        }

        .product-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .product-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            width: calc(20% - 20px);
            text-align: center;
            box-sizing: border-box;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-item h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product-item p {
            font-size: 14px;
            color: #666;
            margin-bottom: 15px;
        }

        .product-item a {
            text-decoration: none;
            background-color: #040400;
            color: #fcf346;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .product-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .product-item a:hover {
            background-color: #fcf346;
            color: #040400;
        }

        .product-item {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 15px;
    padding: 20px;
    transition: all 0.3s ease;
    position: relative;
}

.product-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
}

.product-item h3 {
    font-size: 16px;
    color: #222;
    font-weight: 600;
}

.product-item h4 {
    color: #000;
    font-size: 14px;
    margin-top: 5px;
}

.product-item a {
    margin-top: 10px;
    display: inline-block;
    font-size: 14px;
    padding: 10px 18px;
    border-radius: 25px;
    transition: background 0.3s ease;
}

.product-item a:hover {
    background-color: #ffec00;
    color: black;
}

@keyframes fadeInUp {
    from {
        transform: translateY(20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.product-item {
    animation: fadeInUp 0.8s ease forwards;
}


footer .location-container {
    display: flex;
    align-items: center;
    gap: 5px; /* Jarak antara logo dan teks */
    margin-top: -20px;
}

footer .location-container img {
    width: 30px; /* Ukuran lebih kecil untuk maps */
    height: auto;
}

footer .location-container a {
    font-size: 15px;
    color: white;
    text-decoration: none;
    margin-top: 20px;
}

footer .location-container a:hover {
    color: yellow; /* Efek hover untuk perubahan warna */
}

.scrollToTopBtn {
          position: fixed;
          bottom: 20px;
          right: 20px;
          background-color: yellow;
          color: black;
          border: none;
          border-radius: 50%; /* Membuat tombol berbentuk lingkaran */
          width: 60px; /* Lebar tombol */
          height: 60px; /* Tinggi tombol */
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 30px; /* Ukuran font */
          cursor: pointer;
          display: none;
          transition: background-color 0.3s ease;
        }

        .scrollToTopBtn:hover {
          background-color: yellow;
        }

        /* Banner Section */
.banner {
    position: relative;
    width: 300px;
    height: 100%;
    margin-right: 20px; /* Space between the banner and the products */
}

.banner-slider {
    display: flex;
    overflow: hidden;
    height: 100%;
}

.banner-slide {
    width: 100%;
    flex: 0 0 100%;
}

.banner-slide img {
    width: 100%;
    height: auto;
}

.banner-controls {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    display: flex;
    justify-content: space-between;
    width: 100%;
    z-index: 10;
}

.banner-controls button {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s;
}

.banner-controls button:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

/* ===== Animasi Hover Produk Card ===== */
.produk-card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.produk-card:hover {
  transform: translateY(-5px) scale(1.02);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
}

/* ===== Animasi Fade In Saat Scroll ===== */
.fade-in {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}
.fade-in.show {
  opacity: 1;
  transform: translateY(0);
}

/* ===== Animasi Shake Badge Keranjang ===== */
@keyframes shake {
  0%, 100% { transform: translateX(0); }
  25% { transform: translateX(-4px); }
  50% { transform: translateX(4px); }
  75% { transform: translateX(-4px); }
}
.cart-badge.shake {
  animation: shake 0.4s;
}

/* ===== Overlay Loading Saat Checkout ===== */
.loading-overlay {
  position: fixed;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.7);
  color: white;
  font-size: 2rem;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  pointer-events: none;
  z-index: 9999;
  transition: opacity 0.3s ease;
}
.loading-overlay.active {
  opacity: 1;
  pointer-events: all;
}

/* ===== Animasi Tombol Klik ===== */
button {
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
button:active {
  transform: scale(0.95);
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
}

.btn-lihat {
  display: inline-block;
  background-color: #040400;
  color: #fcf346;
  padding: 10px 20px;
  border-radius: 16px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
}
.btn-lihat:hover {
  background-color: #fcf346;
  color: #040400;
}

.product-item {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 15px;
    padding: 20px;
    transition: all 0.3s ease;
    position: relative;
    box-sizing: border-box;
}

.product-info {
    flex-grow: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.btn-lihat {
    margin-top: auto;
    align-self: center;
    background-color: #040400;
    color: #fcf346;
    padding: 10px 20px;
    border-radius: 16px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.btn-lihat:hover {
    background-color: #fcf346;
    color: #040400;
}

.admin-icon {
  position: absolute;
  right: 80px; /* sedikit ke kiri dari cart */
  top: 20px;
  z-index: 20;
  cursor: pointer;
}

.admin-icon img {
  width: 36px;
  height: auto;
  transition: transform 0.3s ease;
}

.admin-icon img:hover {
  transform: scale(1.1);
}

.suggestion-box {
  position: absolute;
  top: 100%;
  left: 0;
  width: 100%;
  max-height: 300px;
  overflow-y: auto;
  background-color: #fff;
  border: 1px solid #ccc;
  border-top: none;
  z-index: 999;
}

.suggestion-box .suggestion-item {
  display: flex;
  align-items: center;
  padding: 10px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.suggestion-box .suggestion-item img {
  width: 40px;
  height: 40px;
  object-fit: cover;
  border-radius: 5px;
  margin-right: 10px;
}

.suggestion-box .suggestion-item:hover {
  background-color: #fcf346;
  color: black;
}



  </style>
</head>
<body>
<header>
  <div class="logo">
    <img src="logo-landscape-BL.png" alt="Azuraya Logo" />
  </div>

<!-- Ikon Login Admin -->
<div class="admin-icon">
  <a href="login.php" title="Login Admin">
    <img src="admin.png" alt="Admin Login" width="36" />
  </a>
</div>
  
  <div class="cart-icon">
    <a href="cart.php">
      <img src="cart.png" alt="Cart" width="40" />
      <span class="cart-badge">0</span>
    </a>
  </div>
  <!-- Hamburger Menu (mouse hover to toggle) -->
    <div class="hamburger" onmouseover="toggleMenu(true)" onmouseout="toggleMenu(false)">
        <div></div>
        <div></div>
        <div></div>
    </div>
</header>

<!-- Mobile Menu (hidden by default) -->
<div class="mobile-menu" onmouseover="toggleMenu(true)" onmouseout="toggleMenu(false)">
    <div class="menu-logo">
        <img src="LOGO-LANDSCAPE.png" alt="Azuraya Logo">
    </div>
    <div class="menu-item">
        <a href="HOME.html">Home</a>
    </div>
    <div class="menu-item">
        <a href="products.php">Products</a>
    </div>
    <div class="menu-item">
        <a href="about.php">About Us</a>
    </div>
</div>
<div class="search-bar-container">
  <form class="search-bar" action="products.php" method="GET" autocomplete="off">
    <input type="text" name="search" id="searchInput" placeholder="Cari Produk atau Kategori..." />
    <button type="submit">Cari</button>
    <div id="suggestions" class="suggestion-box"></div>
  </form>
</div>


<div class="loading-overlay" id="loadingOverlay">Loading...</div>

<!-- Produk Section Dinamis -->
<section class="product-showcase">
  <div class="product-container">
    <?php if ($products->num_rows == 0): ?>
  <p style="text-align: center;">Tidak ada produk ditemukan untuk "<?= htmlspecialchars($search) ?>"</p>
<?php endif; ?>

    <?php foreach ($products as $p): ?>
      <div class="product-item fade-in">
        <img src="uploads/<?= htmlspecialchars($p['gambar']) ?>" alt="<?= htmlspecialchars($p['nama']) ?>">
        <div class="product-info">
          <h3><?= htmlspecialchars($p['nama']) ?></h3>
          <h4>Rp<?= number_format($p['harga'], 0, ',', '.') ?></h4>
        </div>
        <a href="DetailProduk.php?id=<?= $p['id'] ?>" class="btn-lihat">Lihat Produk</a>
      </div>
    <?php endforeach; ?>
  </div>
</section>


<!-- Tombol Scroll ke Atas -->
<button id="scrollToTopBtn" class="scrollToTopBtn">&#8593;</button>

<!-- Footer sama persis -->
<!-- Footer Section -->
<footer>
    <div class="footer-column">
        <img src="logo-landscape.png" alt="footer">
        <p>Jl. Purnama 1, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78121. Samping Toko Bali
            Makmur</p>
        <div class="location-container">
            <img src="maps.png" alt="maps">
            <a href="https://www.google.com/maps/place/Azuraya+Vapor+Store+Purnama/@-0.0551826,109.3240917,17z/data=!3m1!4b1!4m6!3m5!1s0x2e1d59669739e191:0x96816d9380a71285!8m2!3d-0.055188!4d109.3266666!16s%2Fg%2F11vbqq3pxt?entry=ttu&g_ep=EgoyMDI1MDEyOS4xIKXMDSoASAFQAw%3D%3D">
                Location
            </a>
        </div>


    </div>
    <div class="footer-column">
        <h4>TAUTAN LANGSUNG</h4>
        <a href="HOME.html">Beranda</a><br>
        <a href="products.php">Shop</a><br>
        <a href="about.php">About Us</a><br>
        <a href="http://wa.link/8zu5j5">Mendukung</a><br>
    </div>
    <div class="footer-column">
        <h4>HUBUNGI KAMI</h4>
        <p>Jika Anda memiliki pertanyaan atau ingin berkomunikasi langsung, hubungi kami sosial media kami yang
            tercantum.</p>
        <div class="social-icons">
            <a href="https://www.instagram.com/azuraya_purnama/" target="_blank">
                <img src="ig icon.png" width="23 px" alt="Instagram Icon">
            </a>
            <a href="http://wa.link/8zu5j5" target="_blank">
                <img src="wa icon.png" width="33 px" alt="WhatsApp Icon">
            </a>
            <a href="https://www.tiktok.com/@azuraya.purnama?is_from_webapp=1&sender_device=pc" target="_blank">
                <img src="tiktok icon.png" width="30px" alt="TikTok Icon">
            </a>
        </div>
</footer>
<script>
    // Toggle hamburger menu visibility on hover
    function toggleMenu(open) {
        const mobileMenu = document.querySelector('.mobile-menu');
        if (open) {
            mobileMenu.classList.add('open');
        } else {
            mobileMenu.classList.remove('open');
        }
    }

    // Tombol Scroll ke Atas
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    window.onscroll = function () {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            scrollToTopBtn.style.display = "block";
        } else {
            scrollToTopBtn.style.display = "none";
        }
    };

    scrollToTopBtn.onclick = function () {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    // Slider jika ada
    let index = 0;
    function moveSlide(step) {
        const slides = document.querySelectorAll('.banner-slide');
        const totalSlides = slides.length;
        index = (index + step + totalSlides) % totalSlides;
        const slider = document.querySelector('.banner-slider');
        if (slider) {
            slider.style.transform = 'translateX(' + (-index * 100) + '%)';
        }
    }

    function currentSlide(n) {
        index = n;
        const slider = document.querySelector('.banner-slider');
        if (slider) {
            slider.style.transform = 'translateX(' + (-index * 100) + '%)';
        }
    }

    setInterval(() => {
        moveSlide(1);
    }, 3000);

// === Fade-in saat scroll ===
const fadeEls = document.querySelectorAll(".fade-in");
window.addEventListener("scroll", () => {
  fadeEls.forEach((el) => {
    const rect = el.getBoundingClientRect();
    if (rect.top < window.innerHeight - 100) {
      el.classList.add("show");
    }
  });
});

// === Efek shake badge keranjang ===
function shakeCartBadge() {
  const badge = document.querySelector(".cart-badge");
  if (badge) {
    badge.classList.remove("shake");
    void badge.offsetWidth; // Trigger reflow
    badge.classList.add("shake");
  }
}

// === Tampilkan loading saat form disubmit ===
const forms = document.querySelectorAll("form");
forms.forEach(form => {
  form.addEventListener("submit", () => {
    document.getElementById("loadingOverlay").classList.add("active");
  });
});


// Sembunyikan overlay saat halaman selesai dimuat
window.addEventListener('load', () => {
  document.getElementById('loadingOverlay').classList.remove('active');
});

// Sembunyikan juga saat kembali dari Back/Forward cache
window.addEventListener('pageshow', () => {
  document.getElementById('loadingOverlay').classList.remove('active');
});

document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("searchInput");
  const suggestions = document.getElementById("suggestions");

  input.addEventListener("input", function () {
    const query = this.value;
    if (query.length < 2) {
      suggestions.innerHTML = "";
      return;
    }

    fetch("search_suggest.php?q=" + encodeURIComponent(query))
      .then(res => res.json())
      .then(data => {
        let html = "";
        data.forEach(item => {
html += `<div onclick="selectSuggestion('${item.nama.replace(/'/g, "\\'")}')">${item.nama}</div>`;
        });
        suggestions.innerHTML = html;
      });
  });
});

function selectSuggestion(name) {
  const input = document.getElementById("searchInput");
  input.value = name;
  document.getElementById("suggestions").innerHTML = "";
}

function selectSuggestion(name) {
  const input = document.getElementById("searchInput");
  input.value = name;
  document.getElementById("suggestions").innerHTML = "";

  // Optional: langsung kirim form
  input.form.submit(); // atau window.location.href = ...
}

document.addEventListener("DOMContentLoaded", function () {
  const input = document.getElementById("searchInput");
  const suggestions = document.getElementById("suggestions");

  input.addEventListener("input", function () {
    const query = this.value;
    if (query.length < 2) {
      suggestions.innerHTML = "";
      return;
    }

    fetch("search_suggest.php?q=" + encodeURIComponent(query))
      .then(res => res.json())
      .then(data => {
        let html = "";
        data.forEach(item => {
          html += `
            <div class="suggestion-item" onclick="window.location.href='DetailProduk.php?id=${item.id}'">
              <img src="${item.gambar}" alt="${item.nama}">
              <span>${item.nama}</span>
            </div>
          `;
        });
        suggestions.innerHTML = html;
      });
  });

  // Optional: Klik di luar, sembunyikan suggestion
  document.addEventListener("click", function (e) {
    if (!document.querySelector(".search-bar").contains(e.target)) {
      suggestions.innerHTML = "";
    }
  });
});
</script>
</body>
</html>
