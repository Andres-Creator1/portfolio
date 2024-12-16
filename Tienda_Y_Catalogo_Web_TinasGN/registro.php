<?php
require_once('conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Verifica si el usuario ya existe en la base de datos
    $check_query = "SELECT * FROM usuariosd WHERE usuario = '$usuario'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        echo '<p class="registration-message">Este usuario ya está registrado.</p>';
    } else {
        // Si el usuario no existe, procede a registrarlo
        $contrasena_hashed = password_hash($contrasena, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO usuariosd (usuario, contrasena) VALUES ('$usuario', '$contrasena_hashed')";

        if ($conn->query($insert_query) === TRUE) {
            echo '<p class="registration-message">Usuario registrado exitosamente.</p>';
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
}

$conn->close();

?>

<!-- Formulario de Registro -->
<form action="registro.php" method="post" enctype="multipart/form-data">
    Usuario: <input type="text" name="usuario" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <input type="submit" value="Registrar">
    <link rel="stylesheet" href="./css/sesionn.css">
</form>

