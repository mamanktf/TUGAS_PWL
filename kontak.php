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
    <title>Florist Premium</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/kontak.css">
    <link rel="stylesheet" href="assets/css/review.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

</head>

<body>

<!-- ================= HEADER ================= -->
<header>

    <input type="checkbox" id="toggler">
    <label for="toggler" class="fas fa-bars"></label>

    <!-- LOGO -->
    <a href="#home" class="logo">
        florist.premium<span>.</span>
    </a>

    <!-- NAVBAR -->
    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#about">Tentang</a>
        <a href="#products">Produk</a>
        <a href="#review">Review</a>
        <a href="#contact">Kontak</a>
    </nav>

    <!-- ICON -->
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

<!-- ================= HOME ================= -->
<section class="home" id="home">

    <div class="content">

        <h3>Fresh Flowers</h3>

        <span>
            Natural & Beautiful Flowers
        </span>

        <p>
            Buket bunga premium untuk hadiah ulang tahun,
            wisuda, anniversary, dan berbagai momen spesial lainnya.
        </p>

        <a href="#products" class="btn">
            Shop Now
        </a>

    </div>

</section>

<!-- ================= ABOUT ================= -->
<section class="about" id="about">

    <h1 class="heading">
        <span>About</span> Us
    </h1>

    <div class="row">

        <!-- VIDEO -->
        <div class="video-container">

            <video src="assets/video/videoo.mp4" loop autoplay muted></video>

            <h3>Best Flower Sellers</h3>

        </div>

        <!-- CONTENT -->
        <div class="content">

            <h3>Why Choose Us?</h3>

            <p>
                Kami menyediakan berbagai jenis bunga segar
                dengan kualitas premium dan harga terbaik.
            </p>

            <p>
                Pengiriman cepat, packing aman,
                dan pelayanan ramah menjadi prioritas kami.
            </p>

            <a href="#products" class="btn">
                Learn More
            </a>

        </div>

    </div>

</section>

<!-- ================= ICONS ================= -->
<section class="icons-container">

    <div class="icons">

        <img src="assets/images/icons1.png" alt="delivery">

        <div class="info">
            <h3>Free Delivery</h3>
            <span>On All Orders</span>
        </div>

    </div>

    <div class="icons">

        <img src="assets/images/icons2.png" alt="returns">

        <div class="info">
            <h3>10 Days Returns</h3>
            <span>Moneyback Guarantee</span>
        </div>

    </div>

    <div class="icons">

        <img src="assets/images/icons3.png" alt="offers">

        <div class="info">
            <h3>Offers & Gifts</h3>
            <span>On All Orders</span>
        </div>

    </div>

    <div class="icons">

        <img src="assets/images/icons4.png" alt="payment">

        <div class="info">
            <h3>Secure Payments</h3>
            <span>Protected by Paypal</span>
        </div>

    </div>

</section>

<!-- ================= PRODUCTS ================= -->
<section class="products" id="products">

    <h1 class="heading">
        Latest <span>Products</span>
    </h1>

    <div class="box-container">

        <!-- PRODUCT 1 -->
        <div class="box">

            <span class="discount">-10%</span>

            <div class="image">

                <img src="assets/images/jualan1.jpeg" alt="Flower 1">

                <div class="icons">

                    <a href="javascript:void(0)" class="fas fa-heart"></a>

                    <a href="cart.php?action=add&id=1&name=FlowerBouquet1&price=129900" class="cart-btn">
                        Add To Cart
                    </a>

                    <a href="javascript:void(0)" class="fas fa-share"></a>

                </div>

            </div>

            <div class="content">

                <h3>Flower Bouquet</h3>

                <div class="price">
                    Rp129.900
                    <span>Rp159.900</span>
                </div>

            </div>

        </div>

        <!-- PRODUCT 2 -->
        <div class="box">

            <span class="discount">-15%</span>

            <div class="image">

                <img src="assets/images/jualan2.jpeg" alt="Flower 2">

                <div class="icons">

                    <a href="javascript:void(0)" class="fas fa-heart"></a>

                    <a href="cart.php?action=add&id=2&name=FlowerBouquet2&price=149900" class="cart-btn">
                        Add To Cart
                    </a>

                    <a href="javascript:void(0)" class="fas fa-share"></a>

                </div>

            </div>

            <div class="content">

                <h3>Flower Bouquet</h3>

                <div class="price">
                    Rp149.900
                    <span>Rp179.900</span>
                </div>

            </div>

        </div>

        <!-- PRODUCT 3 -->
        <div class="box">

            <span class="discount">-20%</span>

            <div class="image">

                <img src="assets/images/jualan3.jpeg" alt="Flower 3">

                <div class="icons">

                    <a href="javascript:void(0)" class="fas fa-heart"></a>

                    <a href="cart.php?action=add&id=3&name=FlowerBouquet3&price=199900" class="cart-btn">
                        Add To Cart
                    </a>

                    <a href="javascript:void(0)" class="fas fa-share"></a>

                </div>

            </div>

            <div class="content">

                <h3>Flower Bouquet</h3>

                <div class="price">
                    Rp199.900
                    <span>Rp249.900</span>
                </div>

            </div>

        </div>

    </div>

</section>

<!-- ================= REVIEW ================= -->
<section class="review" id="review">

    <h1 class="heading">
        Customer <span>Reviews</span>
    </h1>

    <div class="box-container">

        <!-- REVIEW 1 -->
        <div class="box">

            <img src="customer1.jpg" alt="Customer 1">

            <h3>Asep Bengkel</h3>

            <p>
                "Bunganya sangat fresh dan pengirimannya cepat!"
            </p>

            <div class="stars">

                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>

            </div>

        </div>

        <!-- REVIEW 2 -->
        <div class="box">

            <img src="customer2.jpg" alt="Customer 2">

            <h3>Bagas Maulana</h3>

            <p>
                "Packaging rapi dan kualitas bunga premium."
            </p>

            <div class="stars">

                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>

            </div>

        </div>

        <!-- REVIEW 3 -->
        <div class="box">

            <img src="customer3.jpg" alt="Customer 3">

            <h3>Rara Utit</h3>

            <p>
                "Buketnya cantik banget dan sesuai foto."
            </p>

            <div class="stars">

                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>

            </div>

        </div>

    </div>

</section>

<!-- ================= CONTACT ================= -->
<section class="contact" id="contact">

    <h1 class="heading">
        <span>Contact</span> Us
    </h1>

    <div class="row">

        <!-- FORM -->
        <form action="submit_contact.php" method="POST">

            <h3>Get In Touch</h3>

            <div class="inputBox">

                <input
                    type="text"
                    name="name"
                    placeholder="Your Name"
                    required
                >

                <input
                    type="email"
                    name="email"
                    placeholder="Your Email"
                    required
                >

            </div>

            <div class="inputBox">

                <input
                    type="number"
                    name="phone"
                    placeholder="Your Phone Number"
                    required
                >

                <input
                    type="text"
                    name="subject"
                    placeholder="Subject"
                    required
                >

            </div>

            <textarea
                name="message"
                placeholder="Your Message"
                rows="10"
                required
            ></textarea>

            <input
                type="submit"
                value="Send Message"
                class="btn"
            >

        </form>

        <!-- CONTACT INFO -->
        <div class="contact-info">

            <h3>Contact Info</h3>

            <div class="info">

                <i class="fas fa-map-marker-alt"></i>

                <p>
                    Jakarta, Indonesia
                </p>

            </div>

            <div class="info">

                <i class="fas fa-envelope"></i>

                <p>
                    floristpremium@gmail.com
                </p>

            </div>

            <div class="info">

                <i class="fas fa-phone"></i>

                <p>
                    +62 812-3456-7890
                </p>

            </div>

            <div class="info">

                <i class="fas fa-clock"></i>

                <p>
                    Senin - Minggu : 09.00 - 21.00
                </p>

            </div>

        </div>

    </div>

</section>

</body>
</html>