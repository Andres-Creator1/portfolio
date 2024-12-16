
<?php
    date_default_timezone_set('America/Panama');
    require_once('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Sentencia preparada para evitar inyecciones SQL
        $stmt = $conn->prepare("SELECT * FROM usuariosd WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($contrasena, $row['contrasena'])) {
                // Inicio de sesión exitoso, establece la variable de sesión
                session_start();
                $_SESSION['usuario'] = $usuario;

                            // Crea la cookie 'ultimo_acceso' con la fecha y hora actual
                            setcookie('ultimo_acceso', date('Y-m-d H:i:s'), time() + 30, '/'); // Caduca en 30 segundos

                // Verifica si el usuario es "Admin" y la contraseña es "t!n@sGN210928"
                if ($usuario === "Admin" && $contrasena === "t!n@sGN210928") {
                    // Redirige a la página de administrador
                    header("Location: admin.php");
                    exit();
                } else {
                    // Redirige a otra página después del inicio de sesión exitoso
                    header("Location: MenuTienda.php");
                    exit();
                }
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "Usuario no encontrado.";
        }
        $stmt->close();
        $conn->close();
    }
    ?>

    <!-- Formulario de Inicio de Sesión -->
    <form action="login.php" method="post">
        <h1>Iniciar Seción</h1>
        Usuario: <input type="text" name="usuario" required><br>
        Contraseña: <input type="password" name="contrasena" required><br>
        <input type="submit" value="Iniciar Sesión">
        <pD>si no a iniciado secion antes tienes que registrate</pD>
        <li class="login-buttons">
                        <a href="registro.php">Registrarse</a>
                    </li>
        <link rel="stylesheet" href="./css/loginn.css">
    </form>



    <?php if(isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>