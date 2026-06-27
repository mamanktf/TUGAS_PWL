<?php
require 'auth.php';
require '../config/database.php';

if (!isset($_GET['id'])) {
    header("Location: users.php");
    exit();
}

$id = (int)$_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    die("User tidak ditemukan.");
}

$error = "";

if (isset($_POST['simpan'])) {

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $role     = $_POST['role'];

    // Cek username selain milik sendiri
    $cek = $pdo->prepare("SELECT id FROM users WHERE username=? AND id!=?");
    $cek->execute([$username, $id]);

    if ($cek->rowCount() > 0) {
        $error = "Username sudah digunakan.";
    }

    // Cek email selain milik sendiri
    else {

        $cek = $pdo->prepare("SELECT id FROM users WHERE email=? AND id!=?");
        $cek->execute([$email, $id]);

        if ($cek->rowCount() > 0) {

            $error = "Email sudah digunakan.";

        } else {

            $update = $pdo->prepare("
                UPDATE users
                SET username=?, email=?, role=?
                WHERE id=?
            ");

            $update->execute([
                $username,
                $email,
                $role,
                $id
            ]);

           $_SESSION['success'] = "Data user berhasil diubah.";

header("Location: users.php");
exit();
        }

    }

}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit User</title>

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

✏️ Edit User

</h1>

<a href="users.php"
class="bg-white text-pink-600 px-5 py-2 rounded-xl font-semibold">

Kembali

</a>

</div>

</nav>

<div class="max-w-xl mx-auto mt-10">

<div class="bg-white rounded-3xl shadow-xl p-8">

<?php if($error): ?>

<div class="bg-red-100 text-red-700 border border-red-300 p-3 rounded-lg mb-5">

<?= $error ?>

</div>

<?php endif; ?>

<form method="POST">

<label class="font-semibold">

Username

</label>

<input
type="text"
name="username"
required
value="<?= htmlspecialchars($user['username']); ?>"
class="w-full border rounded-xl p-3 mt-2 mb-5">

<label class="font-semibold">

Email

</label>

<input
type="email"
name="email"
required
value="<?= htmlspecialchars($user['email']); ?>"
class="w-full border rounded-xl p-3 mt-2 mb-5">

<label class="font-semibold">

Role

</label>

<select
name="role"
class="w-full border rounded-xl p-3 mt-2 mb-6">

<option value="user"
<?= $user['role']=="user"?"selected":""; ?>>

User

</option>

<option value="admin"
<?= $user['role']=="admin"?"selected":""; ?>>

Admin

</option>

</select>

<div class="flex gap-3">

<button
type="submit"
name="simpan"
class="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-xl">

💾 Simpan

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