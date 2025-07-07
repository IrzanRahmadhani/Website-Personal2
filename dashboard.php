<?php
session_start();
if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Azuraya</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: "Montserrat", sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #fcf346;
            color: #040400;
            padding: 30px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 800px;
            margin: 60px auto;
            padding: 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            text-align: center;
        }

        .card h2 {
            font-size: 28px;
            color: #040400;
        }

        .card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #040400;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #333;
        }

        .btn.red {
            background-color: crimson;
        }

        .btn.yellow {
            background-color: #fcf346;
            color: #040400;
        }

        .btn.yellow:hover {
            background-color: #e6db2d;
        }
    </style>
</head>
<body>
<header>Dashboard Admin - Azuraya</header>

<div class="container">
    <div class="card">
        <h2>Halo, MinZur!</h2>
        <p>Selamat datang di panel pengelolaan produk Azuraya.</p>
        <a href="admin_produk.php" class="btn yellow">Tambah Produk Baru</a>
        <a href="admin_manage.php" class="btn">Edit / Hapus Produk</a>
        <a href="logout.php" class="btn red">Logout</a>
    </div>
</div>

</body>
</html>