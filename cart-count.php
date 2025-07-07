<?php
session_start();

$totalQty = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $totalQty += $item['qty'];
    }
}
echo $totalQty;
