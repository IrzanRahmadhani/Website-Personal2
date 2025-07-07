<?php
// admin_edit.php
$koneksi = new mysqli("localhost", "root", "", "azuraya_db");

$id = intval($_GET['id'] ?? 0);
if (!$id) {
  echo "<h2>ID produk tidak valid.</h2>";
  exit;
}

$result = $koneksi->query("SELECT * FROM produk WHERE id = $id");
if (!$result || $result->num_rows === 0) {
  echo "<h2>Produk dengan ID $id tidak ditemukan.</h2>";
  exit;
}

$produk = $result->fetch_assoc();

if (isset($_POST['update'])) {
  $nama = $_POST['nama'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];
  $deskripsi = $_POST['deskripsi'];

  $gambarBaru = $produk['gambar'];
  if (!empty($_FILES['gambar']['name'])) {
    $gambarBaru = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $gambarBaru);
  }

  $koneksi->query("UPDATE produk SET nama='$nama', harga='$harga', kategori='$kategori', deskripsi='$deskripsi', gambar='$gambarBaru' WHERE id=$id");
  header("Location: admin_manage.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Produk</title>
  <link rel="stylesheet" href="style.css">
  <style>
    
    body { font-family: "Montserrat", sans-serif; background: #f9f9f9; padding: 20px; }
    .form-container {
      max-width: 600px; margin: 0 auto; background: #fff;
      padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    input, textarea, select, button {
      width: 100%; padding: 10px; margin: 10px 0;
      border-radius: 8px; border: 1px solid #ccc; font-size: 16px;
    }
    button {
      background-color: orange; color: white; font-weight: bold; cursor: pointer;
    }
    button:hover {
      background-color: darkorange;
    }
    .back-btn {
      margin-top: 10px;
      background-color: #555;
    }
  </style>
</head>
<body>
<div class="form-container">
  <h2>Edit Produk</h2>
  <form method="POST" enctype="multipart/form-data">
    <label>Nama Produk:</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($produk['nama']) ?>" required>

    <label>Harga:</label>
    <input type="number" name="harga" value="<?= $produk['harga'] ?>" required>

    <label>Kategori:</label>
    <select name="kategori" required>
      <option value="Liquid" <?= $produk['kategori'] == 'Liquid' ? 'selected' : '' ?>>Liquid</option>
      <option value="Device" <?= $produk['kategori'] == 'Device' ? 'selected' : '' ?>>Device</option>
      <option value="Pod" <?= $produk['kategori'] == 'Pod' ? 'selected' : '' ?>>Pod</option>
      <option value="Aksesoris" <?= $produk['kategori'] == 'Aksesoris' ? 'selected' : '' ?>>Aksesoris</option>
    </select>

    <label>Deskripsi:</label>
    <textarea name="deskripsi" rows="4" required><?= htmlspecialchars($produk['deskripsi']) ?></textarea>

    <label>Ganti Gambar (opsional):</label>
    <input type="file" name="gambar" accept="image/*">
    <p>Gambar saat ini: <strong><?= htmlspecialchars($produk['gambar']) ?></strong></p>

    <button type="submit" name="update">Simpan Perubahan</button>
  </form>
  <a href="dashboard.php"><button class="back-btn">Kembali ke Dashboard</button></a>
</div>
</body>
</html>
