<?php
session_start();

/* =========================
   CEK LOGIN
========================= */

if (!isset($_SESSION['user'])) {

    header("Location: login.php");
    exit();
}

/* =========================
   CEK CART
========================= */

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {

    header("Location: cart.php");
    exit();
}

/* =========================
   HITUNG TOTAL
========================= */

$totalPrice = 0;

foreach ($_SESSION['cart'] as $item) {

    $totalPrice += $item['price'] * $item['quantity'];
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <!-- META -->
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Checkout - Florist Premium</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        body{
            background: #f8f8f8;
            font-family: 'Poppins', sans-serif;
        }

        .checkout-container{

            max-width: 900px;
            margin: 12rem auto 5rem;
            background: #fff;
            padding: 3rem;
            border-radius: 1rem;
            box-shadow: 0 5px 20px rgba(0,0,0,.1);

        }

        .checkout-container h1{

            font-size: 3rem;
            margin-bottom: 2rem;
            color: #333;
            text-align: center;

        }

        .checkout-form{

            display: grid;
            gap: 2rem;

        }

        .input-box{

            display: flex;
            flex-direction: column;

        }

        .input-box label{

            font-size: 1.5rem;
            margin-bottom: .8rem;
            color: #555;

        }

        .input-box input,
        .input-box textarea,
        .input-box select{

            padding: 1.2rem;
            border: 1px solid #ddd;
            border-radius: .5rem;
            font-size: 1.5rem;

        }

        .input-box textarea{

            resize: none;
            height: 120px;

        }

        .order-summary{

            margin-top: 3rem;
            background: #fafafa;
            padding: 2rem;
            border-radius: 1rem;

        }

        .order-summary h2{

            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #333;

        }

        .order-item{

            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #555;

        }

        .total{

            margin-top: 2rem;
            font-size: 2rem;
            font-weight: bold;
            color: #e84393;
            text-align: right;

        }

        .checkout-btn{

            margin-top: 3rem;
            width: 100%;
            padding: 1.5rem;
            border: none;
            border-radius: 5rem;
            background: #e84393;
            color: #fff;
            font-size: 1.7rem;
            cursor: pointer;
            transition: .3s;

        }

        .checkout-btn:hover{

            background: #333;

        }

        .back-btn{

            display: inline-block;
            margin-bottom: 2rem;
            color: #e84393;
            font-size: 1.5rem;
            text-decoration: none;

        }

        @media(max-width:768px){

            .checkout-container{

                margin: 10rem 2rem 3rem;

            }

        }

    </style>

</head>

<body>

<!-- =========================
     CHECKOUT
========================= -->

<div class="checkout-container">

    <!-- BACK -->
    <a href="cart.php" class="back-btn">

        <i class="fa-solid fa-arrow-left"></i>
        Kembali ke Cart

    </a>

    <h1>

        Checkout Pesanan

    </h1>

    <!-- FORM -->
    <form class="checkout-form"
          action="checkout_process.php"
          method="POST">

        <!-- NAMA -->
        <div class="input-box">

            <label>Nama Lengkap</label>

            <input type="text"
                   name="fullname"
                   required>

        </div>

        <!-- NOMOR -->
        <div class="input-box">

            <label>Nomor HP</label>

            <input type="text"
                   name="phone"
                   required>

        </div>

        <!-- ALAMAT -->
        <div class="input-box">

            <label>Alamat Lengkap</label>

            <textarea name="address"
                      required></textarea>

        </div>

        <!-- PEMBAYARAN -->
        <div class="input-box">

            <label>Metode Pembayaran</label>

            <select name="payment" required>

                <option value="">
                    -- Pilih Pembayaran --
                </option>

                <option value="Transfer Bank">
                    Transfer Bank
                </option>

                <option value="COD">
                    Cash On Delivery
                </option>

                <option value="E-Wallet">
                    E-Wallet
                </option>

            </select>

        </div>

        <!-- RINGKASAN -->
        <div class="order-summary">

            <h2>
                Ringkasan Pesanan
            </h2>

            <?php foreach($_SESSION['cart'] as $item): ?>

                <div class="order-item">

                    <span>

                        <?php echo htmlspecialchars($item['name']); ?>

                        x

                        <?php echo $item['quantity']; ?>

                    </span>

                    <span>

                        Rp
                        <?php echo number_format(
                            $item['price'] * $item['quantity'],
                            0,
                            ',',
                            '.'
                        ); ?>

                    </span>

                </div>

            <?php endforeach; ?>

            <div class="total">

                Total:
                Rp <?php echo number_format(
                    $totalPrice,
                    0,
                    ',',
                    '.'
                ); ?>

            </div>

        </div>

        <!-- BUTTON -->
        <button type="submit"
                class="checkout-btn">

            <i class="fa-solid fa-credit-card"></i>

            Bayar Sekarang

        </button>

    </form>

</div>

</body>
</html>