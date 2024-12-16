<!-- formulario_registro.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
   
</head>
<body>
    <h2>Registro de Usuario</h2>

    <form action="registro.php" method="post">
        Usuario: <input type="text" name="usuario" required><br>
        Contraseña: <input type="password" name="contrasena" required><br>
        <input type="submit" value="Registrar">
        <link rel="stylesheet" href="registro.css">
    </form>

    
</body>
</html>
