<?php
session_start();

/* =========================
   CEK JIKA SUDAH LOGIN
========================= */

if(isset($_SESSION['user'])){
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Signup - Flower Shop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styleLogin.css?v=<?php echo time(); ?>">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

</head>

<body>

    <!-- SIGNUP BOX -->
    <div class="signup">

        <form action="signup_process.php" method="POST">

            <!-- TITLE -->
            <h1>
                🌸 Flower Signup
            </h1>

            <!-- USERNAME -->
            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Masukkan username"
                required
                minlength="3"
                maxlength="20"
                autocomplete="off"
            >

            <!-- EMAIL -->
            <label>Email</label>

            <input
                type="email"
                name="email"
                placeholder="Masukkan email"
                required
                autocomplete="off"
            >

            <!-- PASSWORD -->
            <label>Password</label>

            <input
                type="password"
                name="pw"
                placeholder="Masukkan password"
                required
                minlength="6"
            >

            <!-- BUTTON -->
            <button type="submit">

                <i class="fa-solid fa-user-plus"></i>
                Signup

            </button>

            <!-- LOGIN LINK -->
            <a href="login.php" class="signup-link">

                Sudah punya akun?
                <b>Login</b>

            </a>

        </form>

    </div>

</body>

</html>