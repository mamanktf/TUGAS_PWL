<?php
session_start();

/* =========================
   HAPUS SEMUA SESSION
========================= */

// kosongkan session
$_SESSION = [];

// hancurkan session
session_destroy();

/* =========================
   REDIRECT KE LOGIN
========================= */

header("Location: login.php");
exit();
?>