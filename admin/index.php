<?php
require 'auth.php';
require '../config/database.php';

$totalProduk = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$totalUser = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalOrder = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();

$totalPendapatan = $pdo->query("
    SELECT COALESCE(SUM(total),0)
    FROM orders
")->fetchColumn();
?>

<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="min-h-screen">
<!-- Background -->
<div class="fixed inset-0 -z-20 overflow-hidden">
    <img
        src="../assets/images/loginbg.jpg"
        alt="Background"
        class="w-full h-full object-cover scale-110 blur-lg">
</div>

<!-- Overlay -->
<div class="fixed inset-0 bg-pink-900/20 -z-10"></div>

<!-- Navbar -->
<nav class="bg-pink-600 shadow-lg">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-3xl font-bold text-white">
            🌸 Flower Shop Admin
        </h1>

        <div class="flex items-center gap-4">

            <span class="text-white font-medium">
                <?= $_SESSION['user']; ?>
            </span>

            <a href="../logout.php"
               class="bg-white text-pink-600 px-5 py-2 rounded-xl font-semibold hover:bg-pink-50 transition">
                Logout
            </a>

        </div>

    </div>

</nav>

<!-- Content -->
<div class="max-w-7xl mx-auto p-8">

    <!-- Welcome -->
    <div class="bg-white rounded-3xl p-8 shadow-xl mb-8">

        <h2 class="text-4xl font-bold text-pink-600">
            Selamat Datang, <?= $_SESSION['user']; ?> 🌸
        </h2>

        <p class="text-slate-600 mt-3">
            Kelola produk, pesanan, dan data toko melalui dashboard admin.
        </p>

    </div>

    <!-- Statistik -->
    <div class="grid md:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-3xl p-6 shadow-xl">
            <p class="text-slate-500">Total Produk</p>
            <h3 class="text-5xl font-bold text-pink-600 mt-3">
                <?= $totalProduk ?>
            </h3>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-xl">
            <p class="text-slate-500">Total User</p>
            <h3 class="text-5xl font-bold text-blue-500 mt-3">
                <?= $totalUser ?>
            </h3>
        </div>

        <div class="bg-white rounded-3xl p-6 shadow-xl">
            <p class="text-slate-500">Total Order</p>
            <h3 class="text-5xl font-bold text-green-500 mt-3">
                <?= $totalOrder ?>
                
            </h3>
        </div>
        <div class="bg-white rounded-3xl p-6 shadow-xl">

    <p class="text-slate-500">
        Total Pendapatan
    </p>

    <h3 class="text-3xl font-bold text-purple-600 mt-3">
        Rp <?= number_format($totalPendapatan,0,',','.'); ?>
    </h3>

</div>

    </div>

    <!-- Menu -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <a href="produk.php"
           class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition">

            <div class="text-6xl mb-4">📦</div>

            <h3 class="text-2xl font-bold text-slate-800">
                Kelola Produk
            </h3>

            <p class="text-slate-500 mt-2">
                Tambah, edit dan hapus produk bunga.
            </p>

        </a>

        <a href="orders.php"
           class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition">

            <div class="text-6xl mb-4">🛒</div>

            <h3 class="text-2xl font-bold text-slate-800">
                Kelola Pembelian
            </h3>

            <p class="text-slate-500 mt-2">
                Lihat dan kelola pesanan pelanggan.
            </p>

        </a>

        <a href="users.php"
   class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl hover:-translate-y-2 transition">

    <div class="text-6xl mb-4">
        👥
    </div>

    <h3 class="text-2xl font-bold text-slate-800">
        Kelola User
    </h3>

    <p class="text-slate-500 mt-2">
        Tambah, edit, reset password, dan hapus akun pengguna.
    </p>

</a>

    </div>

</div>
```

</body>
</html>
