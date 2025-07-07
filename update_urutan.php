<?php
$koneksi = new mysqli("localhost", "root", "", "azuraya_db");
$data = json_decode(file_get_contents("php://input"), true);

foreach ($data as $item) {
  $id = intval($item['id']);
  $urutan = intval($item['urutan']);
  $koneksi->query("UPDATE produk SET urutan = $urutan WHERE id = $id");
}

echo "Urutan berhasil diperbarui.";
