<?php

/* =========================
   DATABASE CONFIG
========================= */

$host = "sql203.infinityfree.com";
$dbname = "if0_42281450_flowershop";
$dbusername = "if0_42281450";
$dbpassword = "password_database";

/* =========================
   DSN CONNECTION
========================= */

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

/* =========================
   CONNECT DATABASE
========================= */

try{

    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    // mode error PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // hasil query associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

}catch(PDOException $e){

    die("Connection failed : " . $e->getMessage());

}
?>