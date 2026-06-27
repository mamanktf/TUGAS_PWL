<?php
session_start();

/* =========================
   CEK JIKA SUDAH LOGIN
========================= */

if (isset($_SESSION['user'])) {

    header("Location: index.php");
    exit();
}

/* =========================
   PROSES LOGIN
========================= */

if (isset($_POST['login'])) {

    require_once 'config/database.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    /* =========================
       VALIDASI INPUT
    ========================= */

    if (empty($username) || empty($password)) {

        $error = "Username dan password wajib diisi!";

    } else {

        /* =========================
           CEK USERNAME
        ========================= */

        $stmt = $pdo->prepare(
            "SELECT * FROM users WHERE username = ?"
        );

        $stmt->execute([$username]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        /* =========================
           VERIFIKASI PASSWORD
        ========================= */

        if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user'] = $user['username'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    if($user['role'] == 'admin'){
        header("Location: admin/index.php");
    } else {
        header("Location: index.php");
    }

    exit();

        } else {

            $error = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Login - Flower Shop</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/styleLogin.css?v=<?php echo time(); ?>">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

</head>

<body>

    <!-- LOGIN BOX -->
    <div class="signup">

        <form method="POST">

            <!-- TITLE -->
            <h1>
                🌸 Flower Login
            </h1>

            <!-- USERNAME -->
            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Masukkan username"
                required
                autocomplete="off"
            >

            <!-- PASSWORD -->
            <label>Password</label>

            <div class="password-box">

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                >

                <i class="fa-solid fa-eye" id="togglePassword"></i>

            </div>

            <!-- BUTTON -->
            <button type="submit" name="login">

                <i class="fa-solid fa-right-to-bracket"></i>
                Login

            </button>

            <!-- ERROR -->
            <?php if(isset($error)): ?>

                <p class="error">
                    <?php echo htmlspecialchars($error); ?>
                </p>

            <?php endif; ?>

            <!-- SIGNUP LINK -->
            <a href="signup.php" class="signup-link">

                Belum punya akun?
                <b>Signup</b>

            </a>

        </form>

    </div>
<script>

const password = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");

togglePassword.addEventListener("click", () => {

    if(password.type === "password"){

        password.type = "text";
        togglePassword.classList.replace("fa-eye","fa-eye-slash");

    }else{

        password.type = "password";
        togglePassword.classList.replace("fa-eye-slash","fa-eye");

    }

});

</script>
</body>
</html>