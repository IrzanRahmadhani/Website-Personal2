<?php
// admin_produk.php
$koneksi = new mysqli("localhost", "root", "", "azuraya_db");

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];

    // Upload gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $target = "uploads/" . basename($gambar);

    if (move_uploaded_file($tmp, $target)) {
        $query = "INSERT INTO produk (nama, harga, kategori, deskripsi, gambar)
                  VALUES ('$nama', '$harga', '$kategori', '$deskripsi', '$gambar')";
        if ($koneksi->query($query)) {
            $message = "✅ Produk berhasil ditambahkan.";
        } else {
            $message = "❌ Gagal menambahkan produk: " . $koneksi->error;
        }
    } else {
        $message = "❌ Upload gambar gagal.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Tambah Produk - Azuraya</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body { font-family: "Montserrat", sans-serif; background: #f9f9f9; padding: 20px; }
    .form-container {
      max-width: 600px; 
      margin: 0 auto; 
      background: #fff;
      padding: 30px; 
      border-radius: 12px; 
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      position: relative;
    }
    input, textarea, select, button {
      width: 100%; padding: 10px; margin: 10px 0;
      border-radius: 8px; border: 1px solid #ccc; font-size: 16px;
    }
    button { background-color: #fcf346; color: black; font-weight: bold; cursor: pointer; }
    button:hover { background-color: #e0db2d; }
    .msg { padding: 10px; margin-top: 15px; font-weight: bold; }
    .success { background: #d4edda; color: #155724; }
    .error { background: #f8d7da; color: #721c24; }

       .back-btn {
  position: fixed;
  top: 20px;
  left: 20px;
  background-color: #fcf346;
  padding: 10px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 2px 6px rgba(0,0,0,0.2);
  transition: background-color 0.3s ease, transform 0.2s ease;
  z-index: 1000;
  text-decoration: none;
}

.back-btn:hover {
  background-color: #f1e000;
  transform: scale(1.05);
}
  </style>
</head>
<body>
  <a href="dashboard.php" class="back-btn" title="Kembali">
  <!-- Ikon panah kiri tebal (hanya kepala) -->
  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="black" viewBox="0 0 24 24">
    <path d="M15 18l-6-6 6-6" stroke="#040400" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
</a>

<div class="form-container">
  <h2>Tambah Produk Baru - Azuraya</h2>

  <?php if (isset($message)): ?>
    <div class="msg <?= strpos($message, '✅') !== false ? 'success' : 'error' ?>">
      <?= $message ?>
    </div>
  <?php endif; ?>

  <form action="" method="POST" enctype="multipart/form-data">
    <label>Nama Produk:</label>
    <input type="text" name="nama" required>

    <label>Harga Produk:</label>
    <input type="number" name="harga" required>

    <label>Kategori:</label>
    <select name="kategori" required>
      <option value="Liquid">Liquid</option>
      <option value="Device">Device</option>
      <option value="Pod">Pod</option>
      <option value="Aksesoris">Aksesoris</option>
      <option value="Atomizer">Atomizer</option>
      <option value="Minikopi">Minikopi</option>
    </select>

    <label>Deskripsi:</label>
    <textarea name="deskripsi" rows="4" required></textarea>

    <label>Upload Gambar:</label>
    <input type="file" name="gambar" accept="image/*" required>

    <button type="submit" name="submit">Simpan Produk</button>
  </form>
</div>
</body>
</html>
