<?php
$host = "localhost";
$user = "root";
$password = "200430";
$database = "registro_login";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
