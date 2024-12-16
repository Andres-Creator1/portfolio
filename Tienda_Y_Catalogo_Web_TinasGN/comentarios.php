<?php
include 'conexion.php';

// Procesar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $comment = $_POST['comment'];
    $image = $_FILES['image'];

    // subir imagen
    $imagePath = "";
    if ($image['name']) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $targetFile)) {
            $imagePath = $targetFile;
        }
    }

    // guardar el comentario en la base de datos
    $stmt = $conn->prepare("INSERT INTO comments (username, comment, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $comment, $imagePath);
    $stmt->execute();
    $stmt->close();

    // quedarse en la página de comentarios
    header("Location: comentarios.php");
    exit();
}

// regresar los comentarios de la base de datos
$sql = "SELECT * FROM comments ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <link rel="stylesheet" href="./css/comentario.css">
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Estilos para el header y el menú */
        header {
            background-color: #333333;
            color: #ffffff;
            padding: 10px;
            display: flex;
            justify-content: space-between; /* Alinear elementos al extremo */
            align-items: center; /* Alinear verticalmente al centro */
            transition: height 0.3s ease; /* Transición suave para la altura */
            height: auto; /* Altura automática inicial */
        }

        .logo-container {
            flex: 1; /* Toma todo el espacio restante */
        }

        .logo img {
            max-width: 100px; /* Tamaño máximo para el logo */
        }

        nav {
            position: relative; /* Asegura que el menú desplegable sea relativo a este contenedor */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end; /* Alinear elementos al extremo derecho */
        }

        nav ul li {
            margin-left: 15px;
        }

        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #F2BE22;
            color: #333333;
        }

        /* Estilos para el menú desplegable */
        .menu-toggle {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            color: #ffffff;
            font-size: 20px;
            cursor: pointer;
            z-index: 1000; /* Asegura que esté por encima del contenido */
            display: none; /* Ocultar por defecto en pantallas grandes */
        }

        @media only screen and (max-width: 768px) {
            .menu-toggle {
                display: block; /* Mostrar en pantallas pequeñas */
            }

            nav ul {
                position: absolute;
                top: calc(100% + 10px); /* Posiciona el menú justo debajo del botón de menú */
                right: 10px;
                background-color: #333333;
                padding: 10px;
                display: none; /* Ocultar el menú principal */
                flex-direction: column; /* Alinear elementos en columna */
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Sombra ligera */
                z-index: 999; /* Asegura que esté por encima de otros elementos */
            }

            nav ul.active {
                display: flex; /* Mostrar el menú principal cuando está activo */
            }

            nav ul li {
                margin-left: 0;
                margin-bottom: 10px;
            }

            /* Ajuste para que el header se expanda con el menú desplegable */
            header.active {
                height: calc(100% + 30px); /* Ajustar altura del header según contenido del menú */
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <div class="logo">
                <img src="./img/logoicon.ico" alt="Logo de TinasGN">
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="MenuTienda.php">INICIO</a></li>
                <li><a href="productos.php#productos">PRODUCTOS</a></li>
                <li><a href="MenuTienda.php#productos-instalados">PRODUCTOS INSTALADOS</a></li>
                <li><a href="comentarios.php">COMENTARIOS</a></li>
                <li><a href="MenuTienda.php#contacto">CONTACTENOS</a></li>
                <li><a href="consejos.html">CONSEJOS</a></li>
                <li><a href="MenuTienda.php#miembros">MIEMBROS</a></li>
            </ul>
            <button class="menu-toggle">&#9776;</button> <!-- Botón de menú para pantallas pequeñas -->
        </nav>
    </header>

    <h2>Deja un comentario</h2>
    <form action="comentarios.php" method="POST" enctype="multipart/form-data">
        <label for="username">Nombre:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="comment">Comentario:</label>
        <textarea id="comment" name="comment" required></textarea>
        <br>
        <label for="image" class="custom-file-upload">Subir imagen</label>
        <input type="file" id="image" name="image">
        <br>
        <input type="submit" value="Enviar">
    </form>

<!-- ver los comentarios xd -->
    <h2>Comentarios</h2>
    <div id="comments-section">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
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
    </div>
    <script>
        // JavaScript para manejar el menú desplegable
        const menuToggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('nav ul');
        const header = document.querySelector('header');

        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active');
            header.classList.toggle('active');
        });
    </script>
</body>

</html>
