<?php
session_start();

if(!isset($_SESSION['favorite'])){
    $_SESSION['favorite'] = [];
}

/* =========================
   TAMBAH FAVORIT
========================= */
if(isset($_GET['action']) && $_GET['action'] == 'add'){

    $id = $_GET['id'];

    $exists = false;

    foreach($_SESSION['favorite'] as $fav){

        if($fav['id'] == $id){

            $exists = true;
            break;
        }
    }

    if(!$exists){

        $_SESSION['favorite'][] = [
            'id' => $_GET['id'],
            'name' => $_GET['name'],
            'price' => $_GET['price']
        ];
    }

    header('Content-Type: application/json');

    echo json_encode([
    'success' => true,
    'count' => count($_SESSION['favorite'])
]);

exit();
}

/* =========================
   HAPUS FAVORIT
========================= */
if(isset($_GET['action']) && $_GET['action'] == 'remove'){

    $id = $_GET['id'];

    foreach($_SESSION['favorite'] as $key => $item){

        if($item['id'] == $id){

            unset($_SESSION['favorite'][$key]);
        }
    }

    $_SESSION['favorite'] = array_values($_SESSION['favorite']);

    header("Location: favorite.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daftar Favorit</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#fef7f8;
    padding:40px 20px;
}

.title{
    text-align:center;
    color:#e84393;
    font-size:42px;
    margin-bottom:30px;
}

.favorite-container{
    max-width:900px;
    margin:auto;
}

.back-btn{
    display:inline-block;
    margin-bottom:25px;
    padding:10px 18px;
    background:#e84393;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
    transition:.3s;
}

.back-btn:hover{
    opacity:.8;
}

.favorite-box{
    background:#fff;
    padding:20px;
    margin-bottom:15px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,.1);

    display:flex;
    justify-content:space-between;
    align-items:center;
}

.favorite-name{
    font-size:20px;
    font-weight:600;
}

.favorite-price{
    color:#e84393;
    font-size:18px;
    margin-top:5px;
}

.delete-btn{
    background:#ff4757;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
    transition:.3s;
}

.delete-btn:hover{
    opacity:.8;
}

.empty{
    text-align:center;
    font-size:22px;
    margin-top:40px;
    color:#555;
}

@media(max-width:768px){

    .favorite-box{

        flex-direction:column;
        gap:15px;
        text-align:center;
    }

}

</style>

</head>
<body>

<h1 class="title">
❤ Daftar Favorit
</h1>

<div class="favorite-container">

    <a href="index.php" class="back-btn">
        ← Kembali ke Beranda
    </a>

    <?php

    if(empty($_SESSION['favorite'])){

        echo "<p class='empty'>Belum ada produk favorit.</p>";

    }else{

        foreach($_SESSION['favorite'] as $item){

            echo "

            <div class='favorite-box'>

                <div>

                    <div class='favorite-name'>
                        {$item['name']}
                    </div>

                    <div class='favorite-price'>
                        Rp ".number_format($item['price'],0,',','.')."
                    </div>

                </div>

                <a class='delete-btn'
                   href='favorite.php?action=remove&id={$item['id']}'
                   onclick=\"return confirm('Hapus dari favorit?')\">
                   Hapus
                </a>

            </div>

            ";
        }
    }
    ?>

</div>

</body>
</html>