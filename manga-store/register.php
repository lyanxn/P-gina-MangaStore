<?php
include "includes/db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_BCRYPT); // Encriptar contraseña

    // Verificar que el correo no exista
    $check_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($check_email);

    if ($result->num_rows == 0) {
        $query = "INSERT INTO usuarios (nombre_usuario, email, contrasena) 
                  VALUES ('$nombre_usuario', '$email', '$contrasena')";
        if ($conn->query($query)) {
            header("Location: login.php");
        } else {
            $error = "Error al crear la cuenta: " . $conn->error;
        }
    } else {
        $error = "El correo ya está registrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="register-container">
        <h2>Crear Cuenta</h2>
        <form method="POST">
            <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit">Registrarse</button>
        </form>
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>
</body>
</html>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const error = document.querySelector(".error");

        if (error) {
            // Si existe un error, aplicar efecto de temblor
            form.classList.add("shake");

            setTimeout(() => {
                form.classList.remove("shake");
            }, 500);
        }
    });
</script>