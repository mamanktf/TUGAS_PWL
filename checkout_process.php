<?php
session_start();

/* =========================
   CEK LOGIN
========================= */

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

/* =========================
   CEK CART
========================= */

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

/* =========================
   CEK METHOD
========================= */

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: checkout.php");
    exit();
}

/* =========================
   KONEKSI DATABASE
========================= */

require_once 'config/database.php';

/* =========================
   AMBIL DATA
========================= */

$username = $_SESSION['user'];

$fullname = trim($_POST['fullname']);
$phone    = trim($_POST['phone']);
$address  = trim($_POST['address']);
$payment  = trim($_POST['payment']);

/* =========================
   VALIDASI
========================= */

if (
    empty($fullname) ||
    empty($phone) ||
    empty($address) ||
    empty($payment)
) {
    die("Semua field wajib diisi!");
}

/* =========================
   HITUNG TOTAL
========================= */

$total = 0;

foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

/* =========================
   SIMPAN ORDER
========================= */

try {

    $pdo->beginTransaction();

    // Simpan ke orders
    $stmt = $pdo->prepare("
        INSERT INTO orders
        (username, fullname, phone, address, payment, total)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $username,
        $fullname,
        $phone,
        $address,
        $payment,
        $total
    ]);

    // Ambil ID order
    $orderId = $pdo->lastInsertId();

    // Simpan detail barang
    $detail = $pdo->prepare("
        INSERT INTO order_items
        (order_id, product_id, product_name, price, qty, subtotal)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    foreach ($_SESSION['cart'] as $productId => $item) {

        $subtotal = $item['price'] * $item['quantity'];

        $detail->execute([
            $orderId,
            $productId,
            $item['name'],
            $item['price'],
            $item['quantity'],
            $subtotal
        ]);
    }

    $pdo->commit();

    // Kosongkan cart
    unset($_SESSION['cart']);

    header("Location: success.php");
    exit();

} catch (PDOException $e) {

    $pdo->rollBack();

    die("Database Error: " . $e->getMessage());
}