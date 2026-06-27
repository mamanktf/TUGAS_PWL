<?php
session_start();

/* =========================
   CEK METHOD POST
========================= */

if($_SERVER["REQUEST_METHOD"] == "POST"){

    /* =========================
       AMBIL DATA FORM
    ========================= */

    $username = trim($_POST["username"]);
    $email    = trim($_POST["email"]);
    $password = trim($_POST["pw"]);

    try{

        require_once 'config/database.php';

        /* =========================
           VALIDASI INPUT
        ========================= */

        if(empty($username) || empty($email) || empty($password)){

            die("Semua field wajib diisi!");

        }

        /* =========================
           CEK USERNAME SUDAH ADA
        ========================= */

        $checkUser = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $checkUser->execute([$username]);

        if($checkUser->rowCount() > 0){

            die("Username sudah digunakan!");

        }

        /* =========================
           CEK EMAIL SUDAH ADA
        ========================= */

        $checkEmail = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $checkEmail->execute([$email]);

        if($checkEmail->rowCount() > 0){

            die("Email sudah digunakan!");

        }

        /* =========================
           INSERT USER
        ========================= */

        $query = "INSERT INTO users (username, email, password)
                  VALUES (?, ?, ?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([

            $username,
            $email,
            $password

        ]);

        /* =========================
           SESSION LOGIN OTOMATIS
        ========================= */

        $_SESSION['user'] = $username;

        /* =========================
           CLOSE CONNECTION
        ========================= */

        $stmt = null;
        $pdo  = null;

        /* =========================
           REDIRECT
        ========================= */

        header("Location: index.php");
        exit();

    }catch(PDOException $e){

        die("Query Failed : " . $e->getMessage());

    }

}else{

    header("Location: signup.php");
    exit();

}
?>