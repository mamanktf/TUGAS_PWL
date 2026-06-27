<?php
session_start();

/* =========================
   CEK LOGIN
========================= */

if (!isset($_SESSION['user'])) {

    header("Location: login.php");
    exit();
}

$username = htmlspecialchars($_SESSION['user']);
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <!-- META -->
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Florist Premium</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/review.css">
    <link rel="stylesheet" href="assets/css/kontak.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

</head>

<body>

<!-- =========================
     HEADER
========================= -->

<header>

    <!-- MENU MOBILE -->
    <input type="checkbox" id="toggler">

    <label for="toggler" class="fas fa-bars"></label>

    <!-- LOGO -->
    <a href="#home" class="logo">

        florist premium<span>.</span>

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

        <!-- FAVORITE -->
        <?php
$favoriteCount = isset($_SESSION['favorite'])
    ? count($_SESSION['favorite'])
    : 0;
?>

<a href="favorite.php" class="icon-box">

    <i class="fas fa-heart"></i>

    <span id="favorite-count" class="badge">

        <?= $favoriteCount ?>

    </span>

</a>

        <!-- CART -->
       <a href="cart.php" class="icon-box">

    <i class="fas fa-shopping-cart"></i>

    <span id="cart-count" class="badge">

        <?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>

    </span>

</a>
        <!-- USER -->
        <span class="user-login">

            <i class="fa-solid fa-user"></i>

            <?php echo $username; ?>

        </span>

        <!-- LOGOUT -->
        <a href="logout.php"
           class="logout-btn"
           onclick="return confirm('Yakin ingin logout?')">

            Logout

        </a>

    </div>

</header>

<!-- =========================
     HOME SECTION
========================= -->

<section class="home" id="home">

    <div class="content">

        <h3>
            Hiasi Kenangan
        </h3>

        <span>
            Dengan Buket Bunga Cantik
        </span>

        <p>
            Buket bunga premium dan fresh untuk berbagai
            momen spesial seperti ulang tahun, wisuda,
            anniversary, dan hadiah romantis.
        </p>

        <a href="#products" class="btn">

            Belanja Sekarang

        </a>

    </div>

</section>

<!-- =========================
     ABOUT SECTION
========================= -->

<section class="about" id="about">

    <h1 class="heading">

        <span>Tentang</span> Kami

    </h1>

    <div class="row">

        <!-- VIDEO -->
        <div class="video-container">

            <video src="assets/video/videoo.mp4"
                   loop
                   autoplay
                   muted
                   playsinline>

            </video>

            <h3>
                Best Flower Seller
            </h3>

        </div>

        <!-- CONTENT -->
        <div class="content">

            <h3>
                Kenapa Memilih Kami?
            </h3>

            <p>
                Kami menyediakan bunga premium berkualitas tinggi
                dengan desain modern dan elegan.
            </p>

            <p>
                Pengiriman cepat, bunga selalu fresh,
                dan pelayanan terbaik untuk membuat
                momen spesial menjadi lebih berkesan.
            </p>

            <a href="#products" class="btn">

                Lihat Produk

            </a>

        </div>

    </div>

</section>

<!-- =========================
     ICON SECTION
========================= -->

<section class="icons-container">

    <!-- ICON 1 -->
    <div class="icons">

        <img src="assets/images/icons1.png" alt="Delivery">

        <div class="info">

            <h3>Free Delivery</h3>

            <span>
                Untuk Semua Pesanan
            </span>

        </div>

    </div>

    <!-- ICON 2 -->
    <div class="icons">

        <img src="assets/images/icons2.png" alt="Return">

        <div class="info">

            <h3>10 Hari Return</h3>

            <span>
                Money Back Guarantee
            </span>

        </div>

    </div>

    <!-- ICON 3 -->
    <div class="icons">

        <img src="assets/images/icons3.png" alt="Promo">

        <div class="info">

            <h3>Promo & Gift</h3>

            <span>
                Untuk Semua Pembelian
            </span>

        </div>

    </div>

    <!-- ICON 4 -->
    <div class="icons">

        <img src="assets/images/icons4.png" alt="Payment">

        <div class="info">

            <h3>Pembayaran Aman</h3>

            <span>
                100% Secure Payment
            </span>

        </div>

    </div>

</section>



<!-- =========================
     PRODUCT SECTION
========================= -->

<section class="products" id="products">

    <h1 class="heading">
        Produk <span>Kami</span>
    </h1>

    <div class="box-container">

        <?php foreach($products as $product): ?>

        <div class="box">

            <span class="discount">Best Seller</span>

            <div class="image">

                <img src="assets/images/<?= htmlspecialchars($product['image']); ?>"
                     alt="<?= htmlspecialchars($product['name']); ?>">

                <div class="icons">

                    <a href="#"
                                class="fas fa-heart add-favorite"
                                data-id="<?= $product['id']; ?>"
                                data-name="<?= htmlspecialchars($product['name']); ?>"
                                data-price="<?= $product['price']; ?>">
                                </a>

                    <a href="#"
                            class="cart-btn add-cart"
                            data-id="<?= $product['id']; ?>"
                            data-name="<?= htmlspecialchars($product['name']); ?>"
                            data-price="<?= $product['price']; ?>">
                                Add To Cart
</a>

<script>

document.querySelectorAll(".add-favorite").forEach(button=>{

    button.addEventListener("click",function(e){

        e.preventDefault();

        const id=this.dataset.id;
        const name=this.dataset.name;
        const price=this.dataset.price;

        fetch(
            `favorite.php?action=add&id=${id}&name=${encodeURIComponent(name)}&price=${price}`
        )

        .then(res=>{

            if(!res.ok){
                throw new Error("Response gagal");
            }

            return res.json();

        })

        .then(data=>{

            if(data.success){

                document.getElementById("favorite-count").innerText=data.count;

                button.style.color="#e11d48";

                const toast=document.getElementById("toast");

                toast.innerHTML="❤️ Produk ditambahkan ke Wishlist";

                toast.style.display="block";

                setTimeout(()=>{

                    toast.style.display="none";

                },2000);

                setTimeout(()=>{

                    button.style.color="";

                },1000);

            }

        })

        .catch(error=>{

            console.error(error);

            alert("Terjadi kesalahan.");

        });

    });

});

</script>

                </div>

            </div>

       <div class="content">

                <h3>
                    <?= htmlspecialchars($product['name']); ?>
                </h3>

                <p class="description">
                    <?= htmlspecialchars($product['description']); ?>
                </p>

                <div class="price">
                    Rp <?= number_format($product['price'],0,',','.'); ?>
                </div>

</div>  

        </div>

        <?php endforeach; ?>

    </div>

</section>
<!-- =========================
     REVIEW SECTION
========================= -->

<section class="review" id="review">

    <h1 class="heading">
        Customer <span>Review</span>
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
                Packing rapi dan pengiriman cepat.
            </p>

            <div class="user">

                <img src="assets/images/asep.jpg" alt="Asep Bengkel">

                <div class="user-info">
                    <h3>Asep Bengkel</h3>
                    <span>Pelanggan Setia</span>
                </div>

            </div>

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
                Bouquet sangat bagus dan aesthetic.
                Recommended banget buat hadiah.
            </p>

            <div class="user">

                <img src="assets/images/maul.jpg" alt="Bagas Maulana">

                <div class="user-info">
                    <h3>Bagas Maulana</h3>
                    <span>Happy Customer</span>
                </div>

            </div>

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
                Bunganya tahan lama dan wangi.
                Cocok buat surprise pasangan.
            </p>

            <div class="user">

                <img src="assets/images/Feby.jpg" alt="Feby Yuni">

                <div class="user-info">
                    <h3>Feby Yuni</h3>
                    <span>Verified Buyer</span>
                </div>

            </div>

        </div>

        <!-- REVIEW 4 -->
        <div class="box">

            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>

            <p>
                Bouquet sangat cantik dan fresh.
                Pelayanan ramah dan pengiriman tepat waktu.
            </p>

            <div class="user">

                <img src="assets/images/Fahmi.png" alt="Fahmi Firdauss">

                <div class="user-info">
                    <h3>Fahmi Firdauss</h3>
                    <span>Florist Lover</span>
                </div>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     CONTACT SECTION
========================= -->

<section class="contact" id="contact">

    <h1 class="heading">

        <span>Kontak</span> Kami

    </h1>

    <div class="row">

       <!-- FORM -->
<form action="messages.inc.php" method="POST">

    <?php
    if(isset($_SESSION['contact_success'])){
        echo '<p style="color:green; font-size:16px; margin-bottom:10px;">'
             . $_SESSION['contact_success'] .
             '</p>';
        unset($_SESSION['contact_success']);
    }

    if(isset($_SESSION['contact_error'])){
        echo '<p style="color:red; font-size:16px; margin-bottom:10px;">'
             . $_SESSION['contact_error'] .
             '</p>';
        unset($_SESSION['contact_error']);
    }
    ?>

    <div class="contactus">

        <input type="text"
               name="name"
               placeholder="Nama"
               required>

        <input type="email"
               name="email"
               placeholder="Email"
               required>

    </div>

    <div class="contactus">

        <input type="text"
               name="phone"
               placeholder="Nomor HP"
               required>

        <input type="text"
               name="subject"
               placeholder="Subject"
               required>

    </div>

    <textarea name="message"
              cols="30"
              rows="10"
              placeholder="Pesan"
              required></textarea>

    <input type="submit"
           value="Kirim Pesan"
           class="btn">

</form>

        <!-- CONTACT INFO -->
        <div class="contact-info">

            <div class="info">

                <i class="fas fa-phone"></i>

                <p>
                    +62 812-3456-7890
                </p>

            </div>

            <div class="info">

                <i class="fas fa-envelope"></i>

                <p>
                    floristpremium@gmail.com
                </p>

            </div>

            <div class="info">

                <i class="fas fa-location-dot"></i>

                <p>
                    Jakarta, Indonesia
                </p>

            </div>

        </div>

    </div>

</section>

<!-- =========================
     FOOTER
========================= -->

<footer class="footer">

    <div class="social-icons">

        <a href="#">
            <i class="fab fa-instagram"></i>
        </a>

        <a href="#">
            <i class="fab fa-whatsapp"></i>
        </a>

        <a href="#">
            <i class="fab fa-facebook"></i>
        </a>

    </div>

    <p>

        © <?php echo date("Y"); ?>
        Florist Premium |
        All Rights Reserved

    </p>

</footer>
<script>

function shareProduct(title, text, url){

    if(navigator.share){

        navigator.share({
            title: title,
            text: text,
            url: url
        });

    }else{

        navigator.clipboard.writeText(
            title + "\n" +
            text + "\n" +
            url
        );

        alert("Link produk berhasil disalin!");
    }
}

</script>

<div id="toast"
     style="
        display:none;
        position:fixed;
        top:100px;
        right:20px;
        background:#16a34a;
        color:white;
        padding:15px 25px;
        border-radius:12px;
        font-weight:bold;
        box-shadow:0 10px 20px rgba(0,0,0,.2);
        z-index:99999;
    ">
    ✅ Produk berhasil ditambahkan ke keranjang
</div>

<script>

document.querySelectorAll(".add-cart").forEach(button => {

    button.addEventListener("click", function(e){

        e.preventDefault();

        const id = this.dataset.id;
        const name = this.dataset.name;
        const price = this.dataset.price;

        button.disabled = true;

        const oldText = button.innerHTML;

        button.innerHTML = "⏳ Menambahkan...";

        fetch(
            `cart.php?action=add&id=${id}&name=${encodeURIComponent(name)}&price=${price}`
        )

        .then(res => {

            if(!res.ok){
                throw new Error("Response gagal");
            }

            return res.json();

        })

        .then(data => {

            if(data.success){

                // Update badge cart
                document.getElementById("cart-count").innerText = data.count;

                // Ubah tombol
                button.innerHTML = "✔ Ditambahkan";
                button.style.background = "#16a34a";

                // Toast
                const toast = document.getElementById("toast");

                toast.innerHTML = "🛒 Produk berhasil ditambahkan ke keranjang";

                toast.style.display = "block";

                setTimeout(() => {

                    toast.style.display = "none";

                },2000);

                // Kembalikan tombol
                setTimeout(() => {

                    button.disabled = false;
                    button.innerHTML = oldText;
                    button.style.background = "";

                },1000);

            }

        })

        .catch(error => {

            console.error(error);

            button.disabled = false;
            button.innerHTML = oldText;
            button.style.background = "";

            alert("Terjadi kesalahan saat menambahkan produk.");

        });

    });

});

</script>

</body>
</html>
