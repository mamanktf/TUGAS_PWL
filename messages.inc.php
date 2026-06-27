<?php
session_start();

/* =========================
   VALIDASI METHOD POST
========================= */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    /* =========================
       AMBIL DATA FORM
    ========================= */

    $name     = trim($_POST["name"]);
    $email    = trim($_POST["email"]);
    $phone    = trim($_POST["phone"]);
    $subject  = trim($_POST["subject"]);
    $message  = trim($_POST["message"]);

    /* =========================
       VALIDASI INPUT
    ========================= */

    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($subject) ||
        empty($message)
    ) {

        $_SESSION['contact_error'] = "Semua field wajib diisi!";

        header("Location: index.php#contact");
        exit();
    }

    // validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $_SESSION['contact_error'] = "Format email tidak valid!";

        header("Location: index.php#contact");
        exit();
    }

    try {

        /* =========================
           KONEKSI DATABASE
        ========================= */

        require_once 'config/database.php';

        /* =========================
           INSERT DATA
        ========================= */

        $query = "
            INSERT INTO messages 
            (name, email, phone, subject, message)
            VALUES (?, ?, ?, ?, ?)
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute([
            $name,
            $email,
            $phone,
            $subject,
            $message
        ]);

        /* =========================
           TUTUP KONEKSI
        ========================= */

        $stmt = null;
        $pdo = null;

        /* =========================
           SUCCESS MESSAGE
        ========================= */

        $_SESSION['contact_success'] = "Pesan berhasil dikirim!";

        header("Location: index.php#contact");
        exit();

    } catch (PDOException $e) {

        $_SESSION['contact_error'] = "Database error: " . $e->getMessage();

        header("Location: index.php#contact");
        exit();
    }

} else {

    header("Location: index.php");
    exit();
}
?>