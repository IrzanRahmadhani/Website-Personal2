  <?php
  session_start();
  $koneksi = new mysqli("localhost", "root", "", "azuraya_db");

  $id = $_GET['id'] ?? 0;
  $produk = $koneksi->query("SELECT * FROM produk WHERE id = $id")->fetch_assoc();

  if (!$produk) {
    echo "<h2>Produk tidak ditemukan.</h2>";
    exit;
  }
  ?>

  <!DOCTYPE html>
  <html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($produk['nama']) ?></title>
    <link rel="stylesheet" href="style.css">
  <style>
      :root {
        --primary: #fcf346;
        --dark: #040400;
        --accent: red;
        --green: #3bb143;
      }

      body {
        margin: 0;
        font-family: "Montserrat", sans-serif;
        background-color: #fff;
        color: var(--dark);
        line-height: 1.6;
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
        max-width: 100%;
      }

      .cart-icon {
        position: absolute;
        right: 20px;
        top: 20px;
        cursor: pointer;
        z-index: 20;
      }
      .cart-icon img {
        width: 40px;
        transition: transform 0.3s ease;
      }
      .cart-icon img:hover {
        transform: scale(1.1);
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

      .mobile-menu a {
        display: block;
        padding: 15px;
        color: white;
        text-decoration: none;
        font-weight: 600;
      }
      .mobile-menu a:hover {
        background-color: var(--primary);
        color: var(--dark);
      }

      .btn-back {
    display: inline-block;
    margin: 30px 20px 0;
    font-size: 14px;
    color: #fcf346;
    text-decoration: none;
    border: 2px solid #fcf346;
    padding: 8px 18px;
    border-radius: 10px;
    background-color: #040400;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.12);
    font-weight: bold;
    transition: all 0.3s ease;
  }
  .btn-back:hover {
    background-color: #fcf346;
    color: #040400;
    border-color: #040400;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
  } 

      .product-detail {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 40px;
        padding: 60px 20px;
      }

      .product-images img {
        width: 100%;
        max-width: 320px;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      }

      .product-info {
        max-width: 500px;
      }
      .product-info h1 {
        font-size: 26px;
        font-weight: bold;
        margin-bottom: 10px;
      }
      .price {
        font-size: 22px;
        color: var(--accent);
        margin-bottom: 15px;
      }
      .desc {
        font-size: 16px;
        margin-bottom: 20px;
      }
      .specs {
        list-style: none;
        padding: 0;
      }
      .specs li {
        margin: 8px 0;
        position: relative;
        padding-left: 25px;
      }
      .specs li::before {
        content: "✔";
        color: var(--green);
        font-weight: bold;
        position: absolute;
        left: 0;
      }

      .qty-wrapper {
        display: flex;
        align-items: center;
        gap: 5px;
        margin-bottom: 15px;
      }
      .qty-btn {
        background: var(--primary);
        color: black;
        font-size: 20px;
        font-weight: bold;
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
      }
      .qty-btn:hover {
        background-color: var(--dark);
        color: var(--primary);
      }
      #qty-input {
        width: 50px;
        text-align: center;
        font-size: 18px;
        border: 1px solid #ccc;
        border-radius: 8px;
        height: 40px;
        pointer-events: none;
      }

      .purchase-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
      }
      .btn-cart {
        background-color: navy;
        color: white;
        padding: 12px 24px;
        border-radius: 30px;
        font-weight: bold;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: 0.3s ease;
      }
      .btn-cart:hover {
        background-color: #001f4d;
      }
      .btn-buy {
        background-color: crimson;
        color: white;
        padding: 12px 24px;
        border-radius: 30px;
        font-weight: bold;
        font-size: 16px;
        border: none;
        cursor: pointer;
        transition: 0.3s ease;
      }
      .btn-buy:hover {
        background-color: #a60023;
      }

      .delivery-info {
        background: #f9f9f9;
        padding: 20px;
        margin-top: 30px;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      }
      .delivery-info h4 {
        margin-top: 15px;
        font-size: 16px;
        font-weight: 600;
      }
      .couriers img,
      .payments img {
        height: 30px;
        margin: 5px 10px 5px 0;
        vertical-align: middle;
      }

      .scrollToTopBtn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: var(--primary);
        color: black;
        border: none;
        border-radius: 50%;
        width: 55px;
        height: 55px;
        font-size: 26px;
        cursor: pointer;
        display: none;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
      }
      .scrollToTopBtn:hover {
        background-color: var(--dark);
        color: var(--primary);
      }

      @keyframes shake {
    0%, 100% { transform: translateX(0); }
    20% { transform: translateX(-3px); }
    40% { transform: translateX(3px); }
    60% { transform: translateX(-2px); }
    80% { transform: translateX(2px); }
  }

  .cart-icon.shake img {
    animation: shake 0.4s ease;
  }

  .back-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    background-color: #fcf346;
    padding: 10px;
    margin: 20px auto;
    border-radius: 50px;
    text-decoration: none;
    font-weight: bold;
    color: #040400;
    transition: 0.3s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  }
  .back-btn:hover {
    background-color: #f1e000;
    transform: scale(1.05);
  }



    </style>

  </head>
  <body>
<header>
  <div class="logo">
    <img src="logo-landscape-BL.png" alt="Azuraya Logo">
  </div>
  <div class="cart-icon">
    <a href="cart.php">
      <img src="cart.png" alt="Cart">
      <span class="cart-badge">
        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
      </span>
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
    <div class="menu-item contact-icon">
        <a href="#">
            <img src="wa icon white.png" alt="Contact" width="40" height="40">
        </a>
    </div>
</div>

</header>

<section style="background-color: #fff; padding: 20px;">
  <a href="products.php" class="back-btn" title="Kembali" style="margin-bottom: 20px; display: inline-flex;">
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="black" viewBox="0 0 24 24">
      <path d="M15 18l-6-6 6-6" stroke="#040400" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <span style="margin-left:6px;"></span>
  </a>

  <main class="product-detail">
    <!-- isi gambar dan deskripsi tetap di sini -->
    <div class="product-images">
      <img src="uploads/<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>">
    </div>
    <div class="product-info">
      <h1><?= htmlspecialchars($produk['nama']) ?></h1>
      <p class="price">Rp<?= number_format($produk['harga'], 0, ',', '.') ?></p>
      <p class="desc"><?= htmlspecialchars($produk['deskripsi']) ?></p>
      <ul class="specs">
        <li>Kategori: <?= htmlspecialchars($produk['kategori']) ?></li>
        <li>ID Produk: <?= $produk['id'] ?></li>
      </ul>
      <form id="addCartForm" method="POST" class="purchase-form">
        <input type="hidden" name="product_name" value="<?= htmlspecialchars($produk['nama']) ?>">
        <input type="hidden" name="product_price" value="<?= $produk['harga'] ?>">
        <input type="hidden" name="product_image" value="uploads/<?= htmlspecialchars($produk['gambar']) ?>">
        <input type="hidden" name="product_code" value="<?= $produk['id'] ?>">
        <div class="qty-wrapper">
          <button type="button" class="qty-btn" onclick="changeQty(-1)">−</button>
          <input type="text" name="qty" id="qty-input" value="1" readonly>
          <button type="button" class="qty-btn" onclick="changeQty(1)">+</button>
        </div>
        <div class="purchase-buttons">
          <button type="submit" class="btn-cart">+ Tambah ke Keranjang</button>
          <button type="submit" formaction="checkout.php" class="btn-buy">Beli Sekarang</button>
        </div>
      </form>
      <div id="cart-message" style="display:none; margin-top:10px; font-weight:bold; color:green;"></div>
    </div>
    <div class="delivery-info">
      <h4>Pick up from the Azuraya Store</h4>
      <h4>Courier Delivery</h4>
      <div class="couriers"><img src="jnt.webp" alt="J&T"></div>
      <h4>Payment</h4>
      <div class="payments"><img src="payment.webp" alt="Visa"></div>
    </div>
  </main>
  <script>
  function toggleMenu(open) {
    const mobileMenu = document.querySelector('.mobile-menu');
    if (open) {
        mobileMenu.classList.add('open');
    } else {
        mobileMenu.classList.remove('open');
    }
}


  function changeQty(change) {
    const input = document.getElementById("qty-input");
    let value = parseInt(input.value) || 1;
    value = Math.max(1, value + change);
    input.value = value;
  }

  document.getElementById("addCartForm").addEventListener("submit", function(e) {
    const clickedButton = document.activeElement;
    if (clickedButton && clickedButton.classList.contains("btn-cart")) {
      e.preventDefault();
      const formData = new FormData(this);

      fetch("addtocart.php", {
        method: "POST",
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        if (data.status === "success") {
          const msg = document.getElementById("cart-message");
          msg.innerText = "✔️ Produk berhasil dimasukkan ke keranjang!";
          msg.style.display = "block";

          const badge = document.querySelector(".cart-badge");
          badge.textContent = data.total;

          const cartIcon = document.querySelector(".cart-icon");
          cartIcon.classList.add("shake");
          setTimeout(() => cartIcon.classList.remove("shake"), 500);

          setTimeout(() => {
            msg.style.display = "none";
          }, 3000);
        } else {
          alert("Gagal menambahkan produk.");
        }
      })
      .catch(error => {
        alert("Gagal menambahkan ke keranjang.");
      });
    }
  });
  </script>
  </body>
  </html>
