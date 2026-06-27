<?php
session_start();

if (!isset($_SESSION['user'])) {

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Checkout Berhasil</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{

            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            background:#f8f8f8;

        }

        .success-box{

            background:#fff;
            padding:4rem;
            border-radius:1rem;
            text-align:center;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
            max-width:500px;

        }

        .success-box i{

            font-size:7rem;
            color:#e84393;
            margin-bottom:2rem;

        }

        .success-box h1{

            font-size:3rem;
            margin-bottom:1rem;
            color:#333;

        }

        .success-box p{

            font-size:1.6rem;
            color:#666;
            margin-bottom:2rem;

        }

        .success-box a{

            display:inline-block;
            padding:1rem 2rem;
            background:#e84393;
            color:#fff;
            text-decoration:none;
            border-radius:5rem;
            transition:.3s;

        }

        .success-box a:hover{

            background:#333;

        }

    </style>

</head>

<body>

<div class="success-box">

    <i class="fa-solid fa-circle-check"></i>

    <h1>
        Checkout Berhasil!
    </h1>

    <p>
        Terima kasih sudah berbelanja di
        Florist Premium 🌸
    </p>

    <a href="index.php">

        Kembali Belanja

    </a>

</div>

</body>
</html>