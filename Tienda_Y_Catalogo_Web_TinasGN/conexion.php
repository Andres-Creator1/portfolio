<?php
$server = "127.0.0.1";
$username = "miusuario";
$password = "test01";  // Coloca tu contraseña aquí
$database = "tinasgnds4";

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
