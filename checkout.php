<?php
session_start();
$checkout_items = $_SESSION["checkout_items"] ?? [];

function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Checkout - Azuraya</title>
  <link rel="stylesheet" href="style.css">
  <style>
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

    .form-checkout {
      background-color: white;
      padding: 20px;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: auto;
    }

    .cart-item {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .cart-item img {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    label {
      display: block;
      margin-top: 14px;
      font-weight: bold;
    }

    input[type="text"],
    textarea,
    select {
      width: 100%;
      padding: 10px;
      border-radius: 12px;
      border: 1px solid #ccc;
      margin-top: 6px;
    }

    input[type="submit"] {
  background: black;
  color: yellow;
  border: none;
  padding: 12px 20px;
  border-radius: 20px;
  margin-top: 20px;
  cursor: pointer;
  transition: background-color 0.3s ease, color 0.3s ease;
}

input[type="submit"]:hover {
  background: #333;
  color: white; /* ✅ Efek font putih saat hover */
}


    table {
      width: 100%;
      margin-bottom: 20px;
      border-collapse: collapse;
    }

    table th, table td {
      padding: 10px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    
    .btn-back-icon {
  position: absolute;
  top: 30px;
  left: 30px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  background-color:rgb(0, 0, 0);
  border-radius: 50%;
  width: 45px;
  height: 45px;
  text-decoration: none;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  transition: transform 0.2s ease;
  z-index: 10;
}

.btn-back-icon:hover {
  transform: scale(1.05);
  background-color: #f1e000;
}
  </style>
</head>
<body>
<a href="cart.php" class="btn-back-icon" title="Kembali">
  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="yellow " stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
  </svg>
</a>

  <header>Checkout</header>

  <div class="container">
    <?php if (empty($checkout_items)): ?>
      <div class="alert">Belum ada produk yang dipilih untuk checkout.</div>
    <?php else: ?>
      <div class="form-checkout">
        <h2>Ringkasan Pesanan</h2>
        <table>
          <tr>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
          </tr>
          <?php
            $total = 0;
            foreach ($checkout_items as $item):
              $nama = $item['name'];
              $harga = $item['price'];
              $gambar = $item['image'];
              $qty = $item['qty'];
              $subtotal = $harga * $qty;
              $total += $subtotal;
          ?>
          <tr>
            <td>
              <div class="cart-item">
                <img src="<?= htmlspecialchars($gambar) ?>" alt="<?= htmlspecialchars($nama) ?>">
                <div><?= htmlspecialchars($nama) ?></div>
              </div>
            </td>
            <td><?= $qty ?></td>
            <td><?= formatRupiah($subtotal) ?></td>
          </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="2"><strong>Total</strong></td>
            <td><strong><?= formatRupiah($total) ?></strong></td>
          </tr>
        </table>

        <h3>Informasi Pengiriman</h3>
        <form action="order_success.php" method="post">
          <label>Nama Lengkap:</label>
          <input type="text" name="nama" required>

          <label>Alamat Pengiriman:</label>
          <textarea name="alamat" required></textarea>

          <label>Metode Pengiriman:</label>
          <select name="pengiriman" required>
            <option value="">-- Pilih --</option>
            <option value="Ambil di Toko">Ambil di Toko</option>
            <option value="JNE">JNE</option>
            <option value="JNT">JNT</option>
            <option value="Antar Aja">Antar Aja</option>
          </select>

          <label>Metode Pembayaran:</label>
          <select name="pembayaran" required>
            <option value="">-- Pilih --</option>
            <option value="COD via WhatsApp">COD via WhatsApp</option>
            <option value="Transfer Bank via WhatsApp">Transfer Bank </option>
          </select>

          <input type="submit" value="Konfirmasi Pesanan">
        </form>
      </div>
    <?php endif; ?>
  </div>
</body>
</html>
