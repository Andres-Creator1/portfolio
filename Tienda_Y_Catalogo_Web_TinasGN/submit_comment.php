<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    $image = $_FILES['image'];

    // Manejar la subida de la imagen
    $imagePath = "";
    if ($image['name']) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    // Insertar el comentario en la base de datos
    $stmt = $conn->prepare("INSERT INTO comments (username, comment, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $comment, $imagePath);
    $stmt->execute();
    $stmt->close();

    header("Location: comentarios.php"); // Redirigir a la página de comentarios
}

$conn->close();
?>
