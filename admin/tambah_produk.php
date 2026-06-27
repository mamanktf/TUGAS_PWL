<?php
require 'auth.php';
require '../config/database.php';

if(isset($_POST['simpan'])){

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file(
        $tmp,
        "../images/" . $image
    );

    $stmt = $pdo->prepare("
        INSERT INTO products
        (name,description,price,image,stock)
        VALUES
        (?,?,?,?,?)
    ");

    $stmt->execute([
        $name,
        $description,
        $price,
        $image,
        $stock
    ]);

    header("Location: produk.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="min-h-screen">

<!-- Background -->
<div class="fixed inset-0 -z-20 overflow-hidden">

    <img
        src="../images/loginbg.jpg"
        class="w-full h-full object-cover scale-110 blur-lg"
        alt="">

</div>

<div class="fixed inset-0 bg-pink-900/20 -z-10"></div>

<!-- Navbar -->
<nav class="bg-pink-600 shadow-lg">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <h1 class="text-3xl font-bold text-white">
            ➕ Tambah Produk
        </h1>

        <a href="produk.php"
           class="bg-white text-pink-600 px-5 py-2 rounded-xl font-semibold">

            Kembali

        </a>

    </div>

</nav>

<!-- Form -->
<div class="max-w-3xl mx-auto p-8">

    <div class="bg-white rounded-3xl shadow-2xl p-8">

        <h2 class="text-3xl font-bold text-pink-600 mb-6">
            Tambah Produk Baru
        </h2>

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Nama Produk
                </label>

                <input
                    type="text"
                    name="name"
                    required
                    class="w-full border rounded-xl p-3">

            </div>

            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="w-full border rounded-xl p-3"></textarea>

            </div>

            <div class="grid md:grid-cols-2 gap-4">

                <div>

                    <label class="block font-semibold mb-2">
                        Harga
                    </label>

                    <input
                        type="number"
                        name="price"
                        required
                        class="w-full border rounded-xl p-3">

                </div>

                <div>

                    <label class="block font-semibold mb-2">
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stock"
                        required
                        class="w-full border rounded-xl p-3">

                </div>

            </div>

            <div class="mt-5">

                <label class="block font-semibold mb-2">
                    Gambar Produk
                </label>

                <input
                    type="file"
                    name="image"
                    required
                    class="w-full border rounded-xl p-3">

            </div>

            <button
                type="submit"
                name="simpan"
                class="mt-6 bg-pink-500 hover:bg-pink-600 text-white px-8 py-3 rounded-xl font-semibold">

                Simpan Produk

            </button>

        </form>

    </div>

</div>
```

</body>
</html>
