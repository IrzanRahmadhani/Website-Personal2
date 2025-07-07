<?php
// admin_manage.php
$koneksi = new mysqli("localhost", "root", "", "azuraya_db");

// Hapus produk jika tombol hapus diklik
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  $koneksi->query("DELETE FROM produk WHERE id = $id");
  header("Location: admin_manage.php");
  exit;
}

$produk = $koneksi->query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Manajemen Produk - Azuraya</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: "Montserrat", sans-serif;
      background: #f9f9f9;
      padding: 20px;
    }
    .container {
  position: relative;
  max-width: 1000px;
  margin: auto;
  background: #fff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #fcf346;
    }
    img {
      width: 80px;
      border-radius: 8px;
    }
    .btn {
      padding: 6px 12px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }
    .edit {
      background-color: orange;
      color: white;
    }
    .hapus {
      background-color: crimson;
      color: white;
    }
    .btn:hover {
      opacity: 0.9;
    }

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
<div class="container">
  <h2>Manajemen Produk Azuraya</h2>

<a href="dashboard.php" class="back-btn" title="Kembali">
  <!-- Ikon panah kiri tebal (hanya kepala) -->
  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="black" viewBox="0 0 24 24">
    <path d="M15 18l-6-6 6-6" stroke="#040400" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
</a>
  <table>

  <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <thead>
      <tr>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody id="sortable-produk">
  <?php while ($row = $produk->fetch_assoc()): ?>
    <tr class="produk-row" data-id="<?= $row['id'] ?>">
      <td><img src="uploads/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= $row['nama'] ?>"></td>
      <td><?= htmlspecialchars($row['nama']) ?></td>
      <td>Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
      <td><?= htmlspecialchars($row['kategori']) ?></td>
      <td>
        <a href="admin_edit.php?id=<?= $row['id'] ?>" class="btn edit">Edit</a>
        <a href="admin_manage.php?hapus=<?= $row['id'] ?>" class="btn hapus" onclick="return confirm('Yakin mau hapus produk ini?')">Hapus</a>
      </td>
    </tr>
  <?php endwhile; ?>
</tbody>

  </table>
</div>
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
  const sortable = new Sortable(document.getElementById('sortable-produk'), {
    animation: 150,
    onEnd: function () {
      const rows = document.querySelectorAll('.produk-row');
      let order = [];

      rows.forEach((row, index) => {
        order.push({ id: row.dataset.id, urutan: index + 1 });
      });

      fetch('update_urutan.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(order)
      })
      .then(res => res.text())
      .then(res => console.log('Urutan disimpan:', res));
    }
  });
</script>

</script>
</body>
</html>
