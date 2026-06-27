<?php
session_start();

/* =========================
   CEK METHOD POST
========================= */

if ($_SERVER["REQUEST_METHOD"] !== "POST") {

    header("Location: signup.php");
    exit();
}

/* =========================
   KONEKSI DATABASE
========================= */

require_once 'config/database.php';

/* =========================
   AMBIL DATA FORM
========================= */

$username = trim($_POST['username']);
$email    = trim($_POST['email']);
$password = trim($_POST['pw']);

/* =========================
   VALIDASI INPUT
========================= */

if (
    empty($username) ||
    empty($email) ||
    empty($password)
) {

    $_SESSION['error'] = "Semua field wajib diisi!";
    header("Location: signup.php");
    exit();
}

/* =========================
   VALIDASI EMAIL
========================= */

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $_SESSION['error'] = "Format email tidak valid!";
    header("Location: signup.php");
    exit();
}

/* =========================
   CEK USERNAME SUDAH ADA
========================= */

$checkUser = $pdo->prepare(
    "SELECT * FROM users WHERE username = ?"
);

$checkUser->execute([$username]);

if ($checkUser->rowCount() > 0) {

    $_SESSION['error'] = "Username sudah digunakan!";
    header("Location: signup.php");
    exit();
}

/* =========================
   HASH PASSWORD
========================= */

$hashedPassword = password_hash(
    $password,
    PASSWORD_DEFAULT
);

/* =========================
   INSERT USER
========================= */

try {

    $stmt = $pdo->prepare(
        "INSERT INTO users (username, email, password)
         VALUES (?, ?, ?)"
    );

    $stmt->execute([
        $username,
        $email,
        $hashedPassword
    ]);

    $_SESSION['success'] = "Signup berhasil!";

    header("Location: login.php");
    exit();

} catch (PDOException $e) {

    die("Database Error: " . $e->getMessage());
}
?>