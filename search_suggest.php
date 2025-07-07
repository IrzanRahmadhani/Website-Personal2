<?php
$koneksi = new mysqli("localhost", "root", "", "azuraya_db");
header('Content-Type: application/json');

$q = $_GET['q'] ?? '';
$result = [];

if (!empty($q)) {
    $stmt = $koneksi->prepare("SELECT id, nama, gambar FROM produk WHERE nama LIKE CONCAT('%', ?, '%') LIMIT 5");
    $stmt->bind_param("s", $q);
    $stmt->execute();
    $query = $stmt->get_result();

    while ($row = $query->fetch_assoc()) {
        $result[] = [
            'id' => $row['id'],
            'nama' => $row['nama'],
            'gambar' => 'uploads/' . $row['gambar']
        ];
    }
    $stmt->close();
}

echo json_encode($result);
?>
