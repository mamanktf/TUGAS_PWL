<?php
require 'auth.php';
require '../config/database.php';

if (!isset($_GET['id']) || !isset($_GET['status'])) {
    header("Location: orders.php");
    exit();
}

$id = (int) $_GET['id'];

$status = $_GET['status'];

$allowed = [
    'Pending',
    'Diproses',
    'Selesai'
];

if (!in_array($status, $allowed)) {
    die("Status tidak valid.");
}

$stmt = $pdo->prepare("
UPDATE orders
SET status=?
WHERE id=?
");

$stmt->execute([
    $status,
    $id
]);

header("Location: orders.php");
exit();