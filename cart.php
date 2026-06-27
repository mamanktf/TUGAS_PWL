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
   BUAT SESSION CART
========================= */

if (!isset($_SESSION['cart'])) {

    $_SESSION['cart'] = [];
}

/* =========================
   TAMBAH PRODUK KE CART
========================= */

if (isset($_GET['action']) && $_GET['action'] == 'add') {

    if (
        isset($_GET['id']) &&
        isset($_GET['name']) &&
        isset($_GET['price'])
    ) {

        $productId    = $_GET['id'];
        $productName  = $_GET['name'];
        $productPrice = (int)$_GET['price'];

        if (isset($_SESSION['cart'][$productId])) {

            $_SESSION['cart'][$productId]['quantity']++;

        } else {

            $_SESSION['cart'][$productId] = [
                'name' => $productName,
                'price' => $productPrice,
                'quantity' => 1
            ];

        }

        header('Content-Type: application/json');

        echo json_encode([
            'success' => true,
            'count' => count($_SESSION['cart'])
        ]);

        exit();

    }

}


/* =========================
   TAMBAH QUANTITY
========================= */

if (isset($_GET['action']) && $_GET['action'] == 'increase') {

    $productId = $_GET['id'];

    if (isset($_SESSION['cart'][$productId])) {

        $_SESSION['cart'][$productId]['quantity']++;
    }

    header("Location: cart.php");
    exit();
}

/* =========================
   KURANGI QUANTITY
========================= */

if (isset($_GET['action']) && $_GET['action'] == 'decrease') {

    $productId = $_GET['id'];

    if (isset($_SESSION['cart'][$productId])) {

        $_SESSION['cart'][$productId]['quantity']--;

        // hapus jika quantity 0
        if ($_SESSION['cart'][$productId]['quantity'] <= 0) {

            unset($_SESSION['cart'][$productId]);
        }
    }

    header("Location: cart.php");
    exit();
}

/* =========================
   HAPUS PRODUK
========================= */

if (isset($_GET['action']) && $_GET['action'] == 'remove') {

    $productId = $_GET['id'];

    unset($_SESSION['cart'][$productId]);

    header("Location: cart.php");
    exit();
}

/* =========================
   KOSONGKAN CART
========================= */

if (isset($_GET['action']) && $_GET['action'] == 'clear') {

    $_SESSION['cart'] = [];

    header("Location: cart.php");
    exit();
}

/* =========================
   HITUNG TOTAL
========================= */

$totalPrice = 0;
$totalItems = 0;

foreach ($_SESSION['cart'] as $item) {

    $totalPrice += $item['price'] * $item['quantity'];
    $totalItems += $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITLE -->
    <title>Shopping Cart</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/cart.css">

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

</head>

<body>

<!-- =========================
     HEADER
========================= -->

<header>

   <h1>
🛒 Shopping Cart
(<?php echo $totalItems; ?> Item)
</h1>

    <a href="index.php" class="back-btn">

        <i class="fa-solid fa-arrow-left"></i>
        Kembali Belanja

    </a>

</header>

<!-- =========================
     CART SECTION
========================= -->

<section class="cart-container">

<?php if (empty($_SESSION['cart'])): ?>

    <!-- EMPTY CART -->

    <div class="empty-cart">

        <i class="fa-solid fa-cart-shopping"></i>

        <h2>Keranjang masih kosong</h2>

        <p>
            Yuk pilih bunga favorit kamu 🌸
        </p>

        <a href="index.php" class="shop-btn">
            Belanja Sekarang
        </a>

    </div>

<?php else: ?>


    <!-- TABLE -->

    <table class="cart-table">

        <thead>
        <tr>

            <th>Produk</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Subtotal</th>
            <th>Aksi</th>

        </tr>
        </thead>
        <tbody>

        <?php foreach ($_SESSION['cart'] as $id => $item): ?>

        <tr>

            <!-- NAMA -->
            <td class="product-name">
            <?php echo htmlspecialchars($item['name']); ?>
            </td>

            <!-- QUANTITY -->
            <td>

                <div class="qty-box">

                    <a href="cart.php?action=decrease&id=<?php echo $id; ?>">
                        -
                    </a>

                    <span>
                        <?php echo $item['quantity']; ?>
                    </span>

                    <a href="cart.php?action=increase&id=<?php echo $id; ?>">
                        +
                    </a>

                </div>

            </td>

            <!-- HARGA -->
            <td>

                Rp
                <?php echo number_format($item['price'], 0, ',', '.'); ?>

            </td>

            <!-- SUBTOTAL -->
            <td>

                Rp
                <?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?>

            </td>

            <!-- REMOVE -->
            <td>

                <a
                    href="cart.php?action=remove&id=<?php echo $id; ?>"
                    class="remove-btn"
                    onclick="return confirm('Hapus produk ini?')"
                >

                    <i class="fa-solid fa-trash"></i>

                </a>

            </td>

        </tr>

        <?php endforeach; ?>

        <!-- TOTAL -->

        <tr class="total-row">

    <td colspan="3">

        <strong>Total Belanja</strong>

    </td>

    <td colspan="2" class="total-price">

        <strong>
            Rp <?php echo number_format($totalPrice, 0, ',', '.'); ?>
        </strong>

    </td>

</tr>

        </tbody>
    </table>

    <!-- BUTTON -->

    <div class="cart-actions">

        <a
            href="checkout.php"
            class="checkout-btn"
            onclick="return confirm('Lanjut checkout?')"
        >

            <i class="fa-solid fa-credit-card"></i>
            Checkout

        </a>

        <a
            href="cart.php?action=clear"
            class="clear-btn"
            onclick="return confirm('Kosongkan cart?')"
        >

            <i class="fa-solid fa-trash"></i>
            Kosongkan Cart

        </a>

    </div>

<?php endif; ?>

</section>

</body>
</html>