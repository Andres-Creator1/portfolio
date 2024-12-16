<?php
    require_once('conexion.php');

    // Verificación si se ha enviado el formulario para eliminar el pedido
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['delete_pedido_id'])) {
            $delete_pedido_id = $_POST['delete_pedido_id'];

            // Eliminar los registros relacionados en 'pedido_productod' primero
            $delete_related_sql = "DELETE FROM pedido_productod WHERE id_pedido = $delete_pedido_id";
            if ($conn->query($delete_related_sql) === TRUE) {
                // Luego eliminar el pedido principal
                $delete_sql = "DELETE FROM pedidosd WHERE codigo_pedido = $delete_pedido_id";
                if ($conn->query($delete_sql) === TRUE) {
                    // Éxito al eliminar el pedido
                    header("Refresh:0");
                    exit();
                } else {
                    echo "Error al eliminar el pedido: " . $conn->error;
                }
            } else {
                echo "Error al eliminar los registros relacionados: " . $conn->error;
            }
        }
    }
    // Verificación si se ha enviado el formulario para actualizar el estado del pedido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pedido_id']) && isset($_POST['nuevo_estado'])) {
        $pedido_id = $_POST['pedido_id'];
        $nuevo_estado = $_POST['nuevo_estado'];

        // Actualizar el estado del pedido en la base de datos
        $update_estado_sql = "UPDATE pedidosd SET estado = '$nuevo_estado' WHERE codigo_pedido = $pedido_id";
        if ($conn->query($update_estado_sql) === TRUE) {
            // Éxito al actualizar el estado
            header("Refresh:0"); // Refrescar la página para mostrar los cambios
            exit();
        } else {
            echo "Error al actualizar el estado del pedido: " . $conn->error;
        }
    }
}


    // Consulta para obtener los pedidos
    $sql = "SELECT p.codigo_pedido, u.usuario AS cliente, 
            GROUP_CONCAT(pr.nombre_producto, ' (', pp.cantidad, ')') AS productos, 
            GROUP_CONCAT(pp.cantidad) AS cantidades, p.estado
            FROM pedidosd p
            INNER JOIN usuariosd u ON p.id_usuario = u.id
            INNER JOIN pedido_productod pp ON p.codigo_pedido = pp.id_pedido
            INNER JOIN productosd pr ON pp.codigo_producto = pr.codigo_producto
            GROUP BY p.codigo_pedido";

    $result = $conn->query($sql);
    ?>
    <!-- Resto de tu HTML -->

                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Panel de Administrador</title>
                    <link rel="stylesheet" href="./css/admin_estilo.css">
                </head>
                <body>
                    <header>
                        <h1>Panel de Administrador</h1>
                        <nav>
                            <ul>
                            <?php
    session_start();

    // Verifica si hay una sesión de usuario
    if (isset($_SESSION['usuario'])) {
        // Muestra el nombre de usuario al lado izquierdo del botón de inicio de sesión
        echo '<li class="username">' . $_SESSION['usuario'] . '</li>';
        echo '<li class="logout-button">';
        echo '<a href="logout.php">';
        echo '<img src="./img/logout.ico" alt="logout Icon" style="max-width: 26px; height: auto;">';
        echo '</a>';
        echo '</li>';
    } else {
        // Si no hay una sesión, muestra el botón de inicio de sesión con la imagen
        echo '<li class="login-buttons">';
        echo '<a href="login.php">';
        echo '<img src="./img/Login.ico" alt="Login Icon" style="max-width: 26px; height: auto;">';
        echo '</a>';
        echo '</li>';
    }

    ?>
                            </ul>
                        </nav>

                    </header>

                    <main>
                        <section class="pedidos">
                            <h2>Listado de Pedidos</h2>
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID Pedido</th>
                                        <th>Cliente</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>



                                <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['codigo_pedido'] . "</td>";
            echo "<td>" . $row['cliente'] . "</td>";
            echo "<td>" . $row['productos'] . "</td>";

            // Manejar las cantidades separadas
            $cantidades = explode(",", $row['cantidades']);
            $total_cantidad = 0;
            foreach ($cantidades as $cantidad) {
                $total_cantidad += (int)$cantidad;
            }

            echo "<td>" . $total_cantidad . "</td>"; // Mostrar la cantidad aquí



                        // Formulario para actualizar el estado del pedido
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='pedido_id' value='" . $row['codigo_pedido'] . "'>";
                        echo "<select name='nuevo_estado'>";
                        echo "<option value='En espera' " . ($row['estado'] === 'En espera' ? 'selected' : '') . ">En espera</option>";
                        echo "<option value='En proceso' " . ($row['estado'] === 'En proceso' ? 'selected' : '') . ">En proceso</option>";
                        echo "<option value='Finalizado' " . ($row['estado'] === 'Finalizado' ? 'selected' : '') . ">Finalizado</option>";
                        echo "</select>";
                        echo "<input type='submit' value='Actualizar'>";
                        echo "</form>";

            // Formulario para eliminar el pedido
            echo "<form method='post'>";
            echo "<input type='hidden' name='delete_pedido_id' value='" . $row['codigo_pedido'] . "'>";
            echo "<input type='submit' name='eliminar_pedido' value='Eliminar Pedido'>";
            echo "</form>";

            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No hay pedidos</td></tr>";
    }

    // Eliminar registros asociados y luego el pedido principal
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['eliminar_pedido'])) {
            $delete_pedido_id = $_POST['delete_pedido_id'];

            // Eliminar registros asociados en 'pedido_productod' primero
            $delete_related_sql = "DELETE FROM pedido_productod WHERE id_pedido = $delete_pedido_id";
            if ($conn->query($delete_related_sql) === TRUE) {
                // Luego eliminar el pedido principal
                $delete_sql = "DELETE FROM pedidosd WHERE codigo_pedido = $delete_pedido_id";
                if ($conn->query($delete_sql) === TRUE) {
                    // Éxito al eliminar el pedido
                    header("Refresh:0");
                    exit();
                } else {
                    echo "Error al eliminar el pedido: " . $conn->error;
                }
            } else {
                echo "Error al eliminar los registros relacionados: " . $conn->error;
            }
        }
    }
    ?>



                                </tbody>
                            </table>
                        </section>
                        

                        <section class="usuarios">
            <h2>Listado de Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Usuario</th>
                        <th>Nombre de Usuario</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para obtener los usuarios
                    $usuarios_sql = "SELECT id, usuario FROM usuariosd";
                    $usuarios_result = $conn->query($usuarios_sql);

                    if ($usuarios_result->num_rows > 0) {
                        while ($usuario = $usuarios_result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $usuario['id'] . "</td>";
                            echo "<td>" . $usuario['usuario'] . "</td>";
                            echo "<td>";
                            echo "<form method='post'>";
                            echo "<input type='hidden' name='eliminar_usuario_id' value='" . $usuario['id'] . "'>";
                            echo "<input type='submit' name='eliminar_usuario' value='Eliminar'>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No hay usuarios</td></tr>";
                    }

                    // Eliminar usuario
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['eliminar_usuario'])) {
                            $delete_usuario_id = $_POST['eliminar_usuario_id'];

                            // Eliminar usuario
                            $delete_usuario_sql = "DELETE FROM usuariosd WHERE id = $delete_usuario_id";
                            if ($conn->query($delete_usuario_sql) === TRUE) {
                                // Éxito al eliminar el usuario
                                header("Refresh:0");
                                exit();
                            } else {
                                echo "Error al eliminar el usuario: " . $conn->error;
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
                    </main>

                    <footer>
                        <p>&copy; 2023 - Panel de Administrador</p>
                    </footer>
                </body>
                </html>