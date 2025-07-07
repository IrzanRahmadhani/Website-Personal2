<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $code = $_POST["product_code"];
    $name = $_POST["product_name"];
    $price = $_POST["product_price"];
    $image = $_POST["product_image"];
    $qty = isset($_POST["qty"]) ? (int)$_POST["qty"] : 1;

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }

    // Cek apakah item sudah ada di cart
    if (isset($_SESSION["cart"][$code])) {
        $_SESSION["cart"][$code]["qty"] += $qty;
    } else {
        $_SESSION["cart"][$code] = [
    "code" => $code, // WAJIB ADA!
    "name" => $name,
    "price" => $price,
    "image" => $image,
    "qty" => $qty,
];

    }

    // Hitung total semua qty di keranjang
    $totalQty = 0;
    foreach ($_SESSION["cart"] as $item) {
        $totalQty += $item["qty"];
    }

    echo json_encode([
        "status" => "success",
        "total" => $totalQty
    ]);
    exit;
}

echo json_encode(["status" => "error"]);
?>
