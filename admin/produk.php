<?php
require 'auth.php';
require '../config/database.php';

$stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen">
<!-- Background -->
<div class="fixed inset-0 -z-20 overflow-hidden">
    <img
        src="../assets/images/loginbg.jpg"
        class="w-full h-full object-cover scale-110 blur-lg"
        alt="">
</div>

<div class="fixed inset-0 bg-pink-900/20 -z-10"></div>

<!-- Navbar -->
<nav class="bg-pink-600 shadow-lg">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-3xl font-bold text-white">
            📦 Kelola Produk
        </h1>

        <div class="flex gap-3">

            <a href="index.php"
               class="bg-white text-pink-600 px-4 py-2 rounded-xl font-semibold">
                Dashboard
            </a>

            <a href="../logout.php"
               class="bg-red-500 text-white px-4 py-2 rounded-xl font-semibold">
                Logout
            </a>

        </div>

    </div>

</nav>

<div class="max-w-7xl mx-auto p-8">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">

        <h2 class="text-4xl font-bold text-white">
            Data Produk
        </h2>

        <a href="tambah_produk.php"
           class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-3 rounded-xl shadow-lg">

            + Tambah Produk

        </a>

    </div>

    <!-- Table -->
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

        <table class="w-full">

            <thead class="bg-pink-500 text-white">

                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Gambar</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Harga</th>
                    <th class="p-4">Stok</th>
                    <th class="p-4">Aksi</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach($products as $p): ?>

                <tr class="border-b hover:bg-pink-50">

                    <td class="p-4 text-center">
                        <?= $p['id']; ?>
                    </td>

                    <td class="p-4">

                        <img
                            src="../assets/images/<?= htmlspecialchars($p['image']); ?>"
                            class="w-20 h-20 object-cover rounded-xl mx-auto">

                    </td>

                    <td class="p-4 font-semibold">
                        <?= htmlspecialchars($p['name']); ?>
                    </td>

                    <td class="p-4 font-bold text-pink-600">
                        Rp <?= number_format($p['price'],0,',','.'); ?>
                    </td>

                    <td class="p-4 text-center">
                        <?= $p['stock']; ?>
                    </td>

                    <td class="p-4">

                        <div class="flex gap-2 justify-center">

                            <a href="edit_produk.php?id=<?= $p['id']; ?>"
                               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

                            <a href="hapus_produk.php?id=<?= $p['id']; ?>"
                               onclick="return confirm('Yakin hapus produk?')"
                               class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

                                Hapus

                            </a>

                        </div>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>
```

</body>
</html>
