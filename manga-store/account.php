<?php
session_start();
include "includes/db.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['desactivar'])) {
    $query = "UPDATE usuarios SET activo = 0 WHERE nombre_usuario = '{$_SESSION['username']}'";
    if ($conn->query($query)) {
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bienvenido, <?= $_SESSION['username'] ?></h1>
    <form method="POST">
        <button type="submit" name="desactivar">Desactivar mi cuenta</button>
    </form>
    <a href="index.php">Volver a la tienda</a>
</body>
</html>