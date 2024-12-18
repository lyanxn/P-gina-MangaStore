<?php include "includes/db.php"; ?>
<?php include "includes/navbar.php"; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MangaStore</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="main-content">
        <header>
            <h1>Bienvenido a MangaStore</h1>
        </header>

        <section class="products">
    <div class="product-card">
        <div class="card">
            <img src="img/boruto.jpg" alt="Boruto">
            <h2>Boruto</h2>
            <p>Precio: $10</p>
            <button class="buy-button">Comprar</button>
        </div>
        <div class="card">
            <img src="img/chainsaw.jpg" alt="Chainsaw Man">
            <h2>Chainsaw Man</h2>
            <p>Precio: $15</p>
            <button class="buy-button">Comprar</button>
        </div>
        <div class="card">
            <img src="img/onepiece.jpg" alt="One Piece">
            <h2>One Piece</h2>
            <p>Precio: $12</p>
            <button class="buy-button">Comprar</button>
        </div>
    </div>
</section>
    <script src="js/script.js"></script>
</body>
</html>