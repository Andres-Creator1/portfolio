<?php
include 'conexion.php';

$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<p><strong>" . htmlspecialchars($row['username']) . "</strong> dijo:</p>";
        echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
        if ($row['image']) {
            echo "<p><img src='" . htmlspecialchars($row['image']) . "' alt='Imagen' style='max-width:200px;'></p>";
        }
        echo "<p><small>Publicado el " . $row['created_at'] . "</small></p>";
        echo "</div><hr>";
    }
} else {
    echo "No hay comentarios aún.";
}

$conn->close();
?>
