<?php
require 'auth.php';
require '../config/database.php';

$stmt = $pdo->query("SELECT * FROM users ORDER BY id ASC");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen">

<!-- Background -->
<div class="fixed inset-0 -z-20 overflow-hidden">
    <img src="../assets/images/loginbg.jpg"
         class="w-full h-full object-cover blur-lg scale-110">
</div>

<div class="fixed inset-0 bg-pink-900/20 -z-10"></div>

<!-- Navbar -->
<nav class="bg-pink-600 shadow-lg">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-3xl font-bold text-white">
            👥 Kelola User
        </h1>

        <a href="index.php"
           class="bg-white text-pink-600 px-5 py-2 rounded-xl font-semibold hover:bg-pink-100 transition">
            Dashboard
        </a>

    </div>

</nav>

<div class="max-w-7xl mx-auto p-8">

    <?php if(isset($_SESSION['success'])): ?>

<div class="mb-5 p-4 rounded-xl bg-green-100 border border-green-300 text-green-700">
    ✅ <?= $_SESSION['success']; ?>
</div>

<?php unset($_SESSION['success']); ?>

<?php endif; ?>

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-3xl font-bold text-white">

            Daftar User

        </h2>

    </div>

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-pink-500 text-white">

                    <tr>

                        <th class="p-4">ID</th>
                        <th class="p-4">Username</th>
                        <th class="p-4">Email</th>
                        <th class="p-4">Role</th>
                        <th class="p-4">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($users as $u): ?>

                    <tr class="border-b hover:bg-pink-50">

                        <td class="p-4 text-center">

                            <?= $u['id']; ?>

                        </td>

                        <td class="p-4">

                            <?= htmlspecialchars($u['username']); ?>

                        </td>

                        <td class="p-4">

                            <?= htmlspecialchars($u['email']); ?>

                        </td>

                        <td class="p-4 text-center">

                            <?php if($u['role']=="admin"): ?>

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">

                                    Admin

                                </span>

                            <?php else: ?>

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">

                                    User

                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="p-4 text-center">

                            <div class="flex justify-center gap-2 flex-wrap">

                                <a href="edit_user.php?id=<?= $u['id']; ?>"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg transition">

                                    ✏ Edit

                                </a>

                                <a href="reset_password.php?id=<?= $u['id']; ?>"
                                   class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">

                                    🔑 Reset

                                </a>

                                <?php if($u['username'] == $_SESSION['user']): ?>

                                    <span class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-semibold">

                                        Akun Aktif

                                    </span>

                                <?php else: ?>

                                    <a href="hapus_user.php?id=<?= $u['id']; ?>"
                                       onclick="return confirm('Yakin ingin menghapus user ini?')"
                                       class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">

                                        🗑 Hapus

                                    </a>

                                <?php endif; ?>

                            </div>

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