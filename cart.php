<?php
session_start();

function validate_cart($cart) {
    foreach ($cart as $code => $item) {
        if (!isset($item['code'], $item['name'], $item['price'], $item['image'], $item['qty'])) {
            return false;
        }
    }
    return true;
}

if (!validate_cart($_SESSION['cart'] ?? [])) {
    $_SESSION['cart'] = [];
    $_SESSION['cart_reset_due_to_error'] = true;
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

$cart_items = $_SESSION["cart"];
$total = 0;

// Tangani POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $code = $_POST["code"] ?? '';

    // Tambah/kurang qty
    if (isset($_POST["action"])) {
        foreach ($_SESSION["cart"] as &$item) {
            if ($item["code"] === $code) {
                if ($_POST["action"] === "plus") $item["qty"]++;
                if ($_POST["action"] === "minus" && $item["qty"] > 1) $item["qty"]--;
                break;
            }
        }
    }

    // Hapus terpilih
    if (isset($_POST["delete_selected"]) && isset($_POST["selected"])) {
        foreach ($_POST["selected"] as $sel_code) {
            unset($_SESSION["cart"][$sel_code]);
        }
    }

    // Checkout terpilih
    if (isset($_POST["checkout_selected"]) && isset($_POST["selected"])) {
        $_SESSION["checkout_items"] = array_intersect_key($_SESSION["cart"], array_flip($_POST["selected"]));
        header("Location: checkout.php");
        exit;
    }

    // Checkout satu item
    if (isset($_POST["checkout_single"]) && $code) {
        $_SESSION["checkout_items"] = [$code => $_SESSION["cart"][$code]];
        header("Location: checkout.php");
        exit;
    }

    header("Location: cart.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 1em; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }

        .qty-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
        }

        .qty-controls button {
            padding: 4px 8px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            background-color: #f1c40f;
            color: #000;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .qty-controls input {
            width: 40px;
            text-align: center;
            font-size: 16px;
            border: none;
            background: transparent;
            font-weight: bold;
        }

        .btn {
            background-color: black;
            color: yellow;
            padding: 10px 18px;
            text-decoration: none;
            border: none;
            border-radius: 32px;
            cursor: pointer;
            transition: 0.25s ease-in-out;
        }

        .btn:hover {
            background-color: #333;
            color: #ffe600;
        }

        .total {
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
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
    <script>
        function toggleAll(source) {
            const checkboxes = document.querySelectorAll('input[name="selected[]"]');
            for (let cb of checkboxes) {
                cb.checked = source.checked;
            }
        }
    </script>
</head>
<body>
<a href="products.php" class="btn-back-icon" title="Kembali">
  <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="yellow " stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
  </svg>
</a>


<?php if (isset($_SESSION['cart_reset_due_to_error'])): ?>
    <div style="background:#f44336;color:white;padding:10px;margin:10px 0;border-radius:6px;">
        ⚠️ Keranjang rusak, sudah direset otomatis.
    </div>
    <?php unset($_SESSION['cart_reset_due_to_error']); ?>
<?php endif; ?>

<header><h2>Keranjang Belanja</h2></header>
<div class="container">
    <?php if (empty($cart_items)): ?>
        <p>Keranjang kamu kosong.</p>
    <?php else: ?>
        <form method="POST">
            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="toggleAll(this)"></th>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($cart_items as $item): 
                    $subtotal = $item["price"] * $item["qty"];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td><input type="checkbox" name="selected[]" value="<?= htmlspecialchars($item["code"]) ?>"></td>
                        <td><img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" style="width:60px; height:auto; border-radius:8px;"></td>
                        <td><?= htmlspecialchars($item["name"]) ?></td>
                        <td>Rp<?= number_format($item["price"], 0, ',', '.') ?></td>
                        <td>
                            <div class="qty-controls">
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="code" value="<?= $item["code"] ?>">
                                    <button name="action" value="minus">-</button>
                                </form>
                                <input type="text" value="<?= $item["qty"] ?>" readonly>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="code" value="<?= $item["code"] ?>">
                                    <button name="action" value="plus">+</button>
                                </form>
                            </div>
                        </td>
                        <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
                        <td>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="code" value="<?= $item["code"] ?>">
                                <button type="submit" name="checkout_single" class="btn">Checkout</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total">Total Semua: Rp<?= number_format($total, 0, ',', '.') ?></div>
            <br>
            <button type="submit" name="delete_selected" class="btn">Hapus Terpilih</button>
            <button type="submit" name="checkout_selected" class="btn">Checkout Terpilih</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
