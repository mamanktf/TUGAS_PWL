<?php
require 'auth.php';
require '../config/database.php';

$stmt = $pdo->query("SELECT * FROM orders ORDER BY id DESC");
$orders = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pembelian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen">

    <!-- Background -->
    <div class="fixed inset-0 -z-20 overflow-hidden">
        <img src="../images/loginbg.jpg"
             class="w-full h-full object-cover blur-lg scale-110">
    </div>

    <div class="fixed inset-0 bg-pink-900/20 -z-10"></div>

    <!-- Navbar -->
    <nav class="bg-pink-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <h1 class="text-3xl font-bold text-white">
                🛒 Kelola Pembelian
            </h1>

            <a href="index.php"
               class="bg-white text-pink-600 px-5 py-2 rounded-xl font-semibold hover:bg-pink-100 transition">
                Dashboard
            </a>

        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-8">

        <?php if(isset($_GET['success'])): ?>
            <div class="mb-5 p-4 rounded-xl bg-green-100 border border-green-300 text-green-700">
                ✅ Status pesanan berhasil diperbarui.
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-pink-500 text-white">
                        <tr>
                            <th class="p-4">ID</th>
                            <th class="p-4">Customer</th>
                            <th class="p-4">Phone</th>
                            <th class="p-4">Alamat</th>
                            <th class="p-4">Payment</th>
                            <th class="p-4">Barang Dibeli</th>
                            <th class="p-4">Total</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Tanggal</th>
                            <th class="p-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php foreach($orders as $o): ?>
                    <?php
                            $itemStmt = $pdo->prepare("
                                SELECT product_name, qty
                                FROM order_items
                                WHERE order_id = ?
                            ");
                            $itemStmt->execute([$o['id']]);
                            $items = $itemStmt->fetchAll();
                            ?>
                            <td class="p-4">

                                    <?php if(empty($items)): ?>

                                        <span class="text-gray-400 italic">
                                            Tidak ada data
                                        </span>

                                    <?php else: ?>

                                        
                                    <?php endif; ?>

                                    </td>

                        <tr class="border-b hover:bg-pink-50">

                            <td class="p-4 text-center">
                                <?= $o['id']; ?>
                            </td>

                            <td class="p-4">
                                <?= htmlspecialchars($o['fullname']); ?>
                            </td>

                            <td class="p-4">
                                <?= htmlspecialchars($o['phone']); ?>
                            </td>

                            <td class="p-4">
                                <?= htmlspecialchars($o['address']); ?>
                            </td>

                            <td class="p-4 text-center">
                                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">
                                    <?= htmlspecialchars($o['payment']); ?>
                                </span>
                            </td>
                                <td class="p-4">

                                <?php foreach($items as $item): ?>

                                    <div class="mb-1">
                                        🌸 <?= htmlspecialchars($item['product_name']); ?>
                                        <span class="text-gray-500">
                                            ×<?= $item['qty']; ?>
                                        </span>
                                    </div>

                                <?php endforeach; ?>

                                </td>
                            <td class="p-4 font-bold text-pink-600">
                                Rp <?= number_format($o['total'],0,',','.'); ?>
                            </td>

                            <td class="p-4 text-center">

                                <?php
                                if($o['status'] == 'Pending'){
                                    echo '<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">Pending</span>';
                                }
                                elseif($o['status'] == 'Diproses'){
                                    echo '<span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">Diproses</span>';
                                }
                                elseif($o['status'] == 'Selesai'){
                                    echo '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">Selesai</span>';
                                }
                                else{
                                    echo '<span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold">'.$o['status'].'</span>';
                                }
                                ?>

                            </td>

                            <td class="p-4 text-center">
                                <?= date('d M Y H:i', strtotime($o['created_at'])); ?>
                            </td>

                            <td class="p-4 text-center">

                                <?php if($o['status'] == 'Pending'): ?>

                                    <a href="update_status.php?id=<?= $o['id']; ?>&status=Diproses"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">
                                        Diproses
                                    </a>

                                <?php elseif($o['status'] == 'Diproses'): ?>

                                    <a href="update_status.php?id=<?= $o['id']; ?>&status=Selesai"
                                       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition">
                                        Selesai
                                    </a>

                                <?php else: ?>

                                    <span class="text-green-600 font-semibold">
                                        ✔ Pesanan Selesai
                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>