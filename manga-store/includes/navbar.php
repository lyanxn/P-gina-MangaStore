<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Obtener el número de productos en el carrito
$cartCount = count($_SESSION['cart']);
?>

<nav class="navbar">
    <div class="logo"><a href="index.php">MangaStore</a></div>
    <ul class="nav-links">
        <?php if (isset($_SESSION['username'])): ?>
            <li>
                <div class="dropdown">
                    <button class="dropbtn"><?= $_SESSION['username'] ?></button>
                    <div class="dropdown-content">
                        <a href="account.php">Gestionar cuenta</a>
                        <a href="logout.php">Cerrar sesión</a>
                    </div>
                </div>
            </li>
        <?php else: ?>
            <li><a href="login.php">Iniciar sesión</a></li>
        <?php endif; ?>
        <!-- Carrito -->
        <li>
            <a href="cart.php" class="cart-link">
                <i class="bi bi-cart"></i>
                <?php if ($cartCount > 0): ?>
                    <span class="cart-count"><?= $cartCount ?></span>
                <?php endif; ?>
            </a>
        </li>
    </ul>
</nav>
