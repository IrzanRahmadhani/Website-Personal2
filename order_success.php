<?php
session_start();

// Ambil data dari form
$nama = $_POST['nama'] ?? '';
$alamat = $_POST['alamat'] ?? '';

// Bersihkan data cart setelah checkout
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Pembelian Berhasil - Azuraya</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: #fffdea;
      font-family: "Montserrat", sans-serif;
      margin: 0;
      padding: 0;
    }

    .success-box {
      background-color: white;
      padding: 40px 30px;
      border-radius: 16px;
      text-align: center;
      max-width: 500px;
      margin: 60px auto;
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }

    .checkmark-circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      display: inline-block;
      stroke-width: 2;
      stroke: #f1c40f;
      stroke-miterlimit: 10;
      margin: 0 auto 30px;
      box-shadow: inset 0px 0px 0px #f1c40f;
      animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both;
      position: relative;
    }

    .checkmark {
      width: 100px;
      height: 100px;
      stroke: #fff;
      stroke-width: 6;
      stroke-linecap: round;
      stroke-linejoin: round;
      fill: none;
      stroke-dasharray: 48;
      stroke-dashoffset: 48;
      animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards 0.5s;
      position: absolute;
      top: 0;
      left: 0;
    }

    @keyframes stroke {
      100% {
        stroke-dashoffset: 0;
      }
    }

    @keyframes scale {
      0%, 100% {
        transform: none;
      }
      50% {
        transform: scale(1.1);
      }
    }

    @keyframes fill {
      100% {
        box-shadow: inset 0px 0px 0px 50px #f1c40f;
      }
    }

    h1 {
      color: #f1c40f;
      font-size: 26px;
      margin-bottom: 15px;
    }

    p {
      font-size: 16px;
      color: #333;
      line-height: 1.5;
    }

    .btn {
      background-color: #000;
      color: #f1c40f;
      padding: 10px 20px;
      border: none;
      border-radius: 32px;
      text-decoration: none;
      display: inline-block;
      margin: 10px 5px;
      font-weight: bold;
      transition: 0.3s ease;
    }

    .btn:hover {
      background-color: #333;
    }
  </style>
</head>
<body>
  <div class="success-box">
    <div class="checkmark-circle">
      <svg class="checkmark" viewBox="0 0 52 52">
        <path d="M14 27l8 8 16-16" />
      </svg>
    </div>
    <h1>Pembelian Berhasil!</h1>
    <p>Terima kasih, <strong><?= htmlspecialchars($nama) ?></strong> 💛</p>
    <p>Pesanan kamu akan segera diproses dan dikirim ke:</p>
    <p><strong><?= nl2br(htmlspecialchars($alamat)) ?></strong></p>
    <p>Kami akan menghubungi kamu via WhatsApp untuk konfirmasi lebih lanjut.</p>

    <a href="products.php
    " class="btn">Kembali Belanja</a>
    <a class="btn" href="https://wa.me/6285176957835?text=Halo%20Azuraya%2C%20saya%20<?= urlencode($nama) ?>%20ingin%20konfirmasi%20pesanan%20ke%3A%20<?= urlencode($alamat) ?>.%20Terima%20kasih!" target="_blank">
      Konfirmasi via WhatsApp
    </a>
  </div>
</body>
</html>
