<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Review - Florist Premium</title>

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/review.css">

</head>

<body>

<!-- ================= HEADER START ================= -->
<header>

    <!-- TOGGLER -->
    <input type="checkbox" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <!-- LOGO -->
    <a href="index.php" class="logo">
        florist.premium<span>.</span>
    </a>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="index.php#home">Home</a>
        <a href="index.php#about">Tentang</a>
        <a href="index.php#products">Produk</a>
        <a href="review.php">Review</a>
        <a href="kontak.php">Kontak</a>
    </nav>

    <!-- ICONS -->
    <div class="icons">

        <a href="javascript:void(0)" class="fas fa-heart"></a>

        <a href="cart.php" class="fas fa-shopping-cart"></a>

        <?php if(isset($_SESSION['user'])): ?>

            <span class="user-login">
                👤 <?php echo htmlspecialchars($_SESSION['user']); ?>
            </span>

            <a href="logout.php" class="logout-btn">
                Logout
            </a>

        <?php else: ?>

            <a href="login.php" class="fas fa-user"></a>

        <?php endif; ?>

    </div>

</header>
<!-- ================= HEADER END ================= -->


<!-- ================= REVIEW SECTION START ================= -->
<section class="review" id="review">

    <h1 class="heading">
        customer <span>reviews</span>
    </h1>

    <div class="box-container">

       <!-- REVIEW 1 -->
<div class="box">

    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    </div>

    <p>
        Bunganya sangat fresh dan cantik.
        Pengiriman cepat dan packing rapi banget.
        Recommended untuk hadiah anniversary.
    </p>

    <div class="user">

        <img src="assets/images/asep.jpg" alt="Asep Bengkel">

        <div class="user-info">
            <h3>Asep Bengkel</h3>
            <span>Pelanggan Setia</span>
        </div>

    </div>

    <span class="fas fa-quote-right"></span>

</div>

<!-- REVIEW 2 -->
<div class="box">

    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    </div>

    <p>
        Banyak pilihan bunga aesthetic dan premium.
        Admin juga ramah dan fast response.
        Pasti order lagi di sini.
    </p>

    <div class="user">

        <img src="assets/images/maul.jpg" alt="Bagas Maulana">

        <div class="user-info">
            <h3>Bagas Maulana</h3>
            <span>Happy Customer</span>
        </div>

    </div>

    <span class="fas fa-quote-right"></span>

</div>

<!-- REVIEW 3 -->
<div class="box">

    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
    </div>

    <p>
        Bouquet datang sesuai foto bahkan lebih bagus.
        Bunganya tahan lama dan wangi banget.
        Cocok buat surprise pasangan.
    </p>

    <div class="user">

        <img src="assets/images/Feby.jpg" alt="Feby Yuni">

        <div class="user-info">
            <h3>Feby Yuni</h3>
            <span>Verified Buyer</span>
        </div>

    </div>

    <span class="fas fa-quote-right"></span>

</div>

<!-- REVIEW 4 -->
<div class="box">

    <div class="stars">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
    </div>

    <p>
        Pelayanan sangat memuaskan dan kualitas bunga premium.
        Harganya worth it dengan kualitas sebagus ini.
    </p>

    <div class="user">

        <img src="assets/images/Fahmi.png" alt="Fahmi Firdaus">

        <div class="user-info">
            <h3>Fahmi Firdaus</h3>
            <span>Florist Lover</span>
        </div>

    </div>

    <span class="fas fa-quote-right"></span>

</div>

    <!-- BUTTON -->
    <div class="back-home">

        <a href="index.php" class="btn">
            ← Kembali ke Home
        </a>

    </div>

</section>
<!-- ================= REVIEW SECTION END ================= -->


<!-- ================= FOOTER START ================= -->
<section class="footer">

    <div class="footer-container">

        <div class="footer-box">

            <h3>Florist Premium</h3>

            <p>
                Toko bunga premium dengan kualitas terbaik untuk berbagai momen spesial Anda.
            </p>

        </div>

        <div class="footer-box">

            <h3>Menu</h3>

            <a href="index.php#home">Home</a>
            <a href="index.php#products">Produk</a>
            <a href="review.php">Review</a>
            <a href="kontak.php">Kontak</a>

        </div>

        <div class="footer-box">

            <h3>Follow Us</h3>

            <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>

        </div>

    </div>

    <div class="credit">
        © 2025 Florist Premium | All Rights Reserved
    </div>

</section>
<!-- ================= FOOTER END ================= -->

</body>
</html>