<?php
require 'auth.php';
require '../config/database.php';

if (!isset($_GET['id'])) {
    header("Location: users.php");
    exit();
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT id, username FROM users WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    die("User tidak ditemukan.");
}

$error = "";

if (isset($_POST['reset'])) {

    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    if (strlen($password) < 6) {

        $error = "Password minimal 6 karakter.";

    } elseif ($password != $confirm) {

        $error = "Konfirmasi password tidak sama.";

    } else {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $update = $pdo->prepare("
            UPDATE users
            SET password=?
            WHERE id=?
        ");

       $_SESSION['success'] = "Password berhasil direset.";

header("Location: users.php");
exit();
    }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reset Password</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="min-h-screen">

<!-- Background -->

<div class="fixed inset-0 -z-20 overflow-hidden">

<img src="../assets/images/loginbg.jpg"

class="w-full h-full object-cover blur-lg scale-110">

</div>

<div class="fixed inset-0 bg-pink-900/20 -z-10"></div>

<nav class="bg-pink-600 shadow-lg">

<div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

<h1 class="text-3xl font-bold text-white">

🔑 Reset Password

</h1>

<a href="users.php"

class="bg-white text-pink-600 px-5 py-2 rounded-xl font-semibold">

Kembali

</a>

</div>

</nav>

<div class="max-w-xl mx-auto mt-10">

<div class="bg-white rounded-3xl shadow-xl p-8">

<p class="mb-6">

Reset password untuk

<b><?= htmlspecialchars($user['username']); ?></b>

</p>

<?php if($error): ?>

<div class="bg-red-100 border border-red-300 text-red-700 rounded-xl p-3 mb-5">

<?= $error; ?>

</div>

<?php endif; ?>

<form method="POST">

<label class="font-semibold">

Password Baru

</label>

<input

type="password"

name="password"

required

class="w-full border rounded-xl p-3 mt-2 mb-5">

<label class="font-semibold">

Konfirmasi Password

</label>

<input

type="password"

name="confirm"

required

class="w-full border rounded-xl p-3 mt-2 mb-6">

<div class="flex gap-3">

<button

type="submit"

name="reset"

class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl">

🔑 Reset Password

</button>

<a

href="users.php"

class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-3 rounded-xl">

Batal

</a>

</div>

</form>

</div>

</div>

</body>

</html>