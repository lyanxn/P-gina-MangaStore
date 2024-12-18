<?php
session_start(); // Asegúrate de que session_start esté al principio

include "includes/db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Verificar que el correo exista
    $check_user = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($check_user);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($contrasena, $user['contrasena'])) {
            // Iniciar sesión y redirigir
            $_SESSION['username'] = $user['nombre_usuario']; // Guardamos el nombre de usuario en la sesión
            header("Location: index.php");
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Correo no registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <p>¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
    </div>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const error = document.querySelector(".error");

        if (error) {
            form.classList.add("shake");

            setTimeout(() => {
                form.classList.remove("shake");
            }, 500);
        }
    });
</script>
