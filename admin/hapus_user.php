<?php
require 'auth.php';
require '../config/database.php';

if (!isset($_GET['id'])) {
    header("Location: users.php");
    exit();
}

$id = (int)$_GET['id'];

// Ambil data user
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    die("User tidak ditemukan.");
}

// Mencegah admin menghapus akun yang sedang login
if ($user['username'] == $_SESSION['user']) {
    die("Anda tidak dapat menghapus akun yang sedang digunakan.");
}

// Hapus user
$delete = $pdo->prepare("DELETE FROM users WHERE id = ?");
$delete->execute([$id]);

$_SESSION['success'] = "User berhasil dihapus.";

header("Location: users.php");
exit();
?>