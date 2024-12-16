<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Página Web para TinasGN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/menu.css">
    <style>
        /* Estilos para el menú desplegable */
        .menu-toggle {
            display: none; /* Ocultar por defecto en pantallas grandes */
        }

        @media screen and (max-width: 768px) {
            .menu-toggle {
                display: block; /* Mostrar en pantallas pequeñas */
                cursor: pointer;
            }

            nav ul {
                display: none; /* Ocultar el menú en pantallas pequeñas por defecto */
                flex-direction: column;
                background-color: #333; /* Color de fondo del menú desplegable */
                position: absolute;
                top: 60px; /* Ajusta según tu necesidad */
                left: 0;
                width: 100%;
                padding: 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            }

            nav ul.active {
                display: flex; /* Mostrar el menú cuando está activo */
            }

            nav ul li {
                margin-bottom: 10px;
                text-align: center;
            }

            nav ul li a {
                color: #fff;
                text-decoration: none;
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <div class="logo">
                <img src="./img/logo2.png" alt="Logo de TinasGN" style="width: 500px; height: auto;">
            </div>
        </div>
        <nav>
            <div class="menu-toggle">&#9776;</div> <!-- Icono de hamburguesa -->
            <ul>
            <li><a href="#inicio">INICIO</a></li>
                <li><a href="productos.php">PRODUCTOS</a></li>
                <li><a href="#productos-instalados">PRODUCTOS INSTALADOS</a></li>
                <li><a href="consejos.html">CONSEJOS</a></li>
                <li><a href="comentarios.php">COMENTARIOS</a></li>
                <li><a href="#contacto">CONTACTENOS</a></li>
                <li class="members">
                    <a href="#miembros">MIEMBROS</a>
                </li>
                <?php
                session_start();

                // Verifica si hay una sesión de usuario
                if (isset($_SESSION['usuario'])) {
                    echo '<li class="username">' . $_SESSION['usuario'] . '</li>';
                    echo '<li class="logout-button">';
                    echo '<a href="logout.php">';
                    echo '<img src="./img/logout.ico" alt="logout Icon" style="max-width: 26px; height: auto;">';
                    echo '</a>';
                    echo '</li>';
                } else {
                    echo '<li class="login-buttons">';
                    echo '<a href="login.php">';
                    echo '<img src="./img/Login.ico" alt="Login Icon" style="max-width: 26px; height: auto;">';
                    echo '</a>';
                    echo '</li>';
                }

                // Comprueba si existe la cookie 'ultimo_acceso'
                if (isset($_COOKIE['ultimo_acceso'])) {
                    $ultimoAcceso = $_COOKIE['ultimo_acceso'];
                    echo '<p>Último acceso al sistema: ' . $ultimoAcceso . '</p>';
                } else {
                    echo '<p>Primera visita al sistema</p>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <section id="inicio" class="main-phrase">
        <?php
        echo '<p>CALIDAD EN NUESTROS PRODUCTOS</p>';
        echo '<p>Y</p>';
        echo '<p>COMPROMISO TOTAL EN NUESTRA LABOR</p>';
        ?>
    </section>

    <section class="product-section">
        <h2 class="section-title">Productos</h2>
        <!-- Código de productos -->
        <a href="productos.php#tinasM">
            <div class="product-card">
                <img src="./img/TINA-DOBLE.jpg" alt="Producto 1">
                <div class="product-info">
                    <h3>Tinas y Letrinas</h3>
                    <p>Tinas para lavar, Modelos: dobles, sencilla y tinas especiales.</p>
                </div>
            </div>
        </a>

        <a href="productos.php#deco">
            <div class="product-card">
                <img src="./img/Capitelcuadrado.jpg" alt="Producto 1">
                <div class="product-info">
                    <h3>Decoraciones</h3>
                    <p>Capiteles, Pisotes y banquitas para decorar su hogar</p>
                </div>
            </div>
        </a>

        <a href="productos.php#torn">
            <div class="product-card">
                <img src="./img/tornos.jpg" alt="Producto 1">
                <div class="product-info">
                    <h3>Tornos</h3>
                    <p>Utilizados para adornar terrazas o hacer cercas, 5 diseños para escoger</p>
                </div>
            </div>
        </a>
    </section>

    <section id="productos-instalados" class="installed-products-section">
        <h2 class="section-title">Productos Instalados</h2>
        <div class="products-container">
            <div class="product-card">
                <img src="./img/Capiteles1.jpeg" alt="Producto instalado 1">
            </div>
            <div class="product-card">
                <img src="./img/pisotes.jpg" alt="Producto instalado 2">
            </div>
            <div class="product-card">
                <img src="./img/Torno2.jpeg" alt="Producto instalado 3">
            </div>
        </div>
    </section>

    <!-- Sección: Contacto -->
    <section id="contacto" class="contact-section">
        <h2 class="section-title">Detalles de Contacto</h2>
        <!-- Mapa de Google Maps -->
        <div class="map">
            <!-- Código de Google Maps -->
            <iframe src="https://www.google.com/maps/place/Tinas+Guillen/@8.1031791,-120.0094065,4z/data=!4m10!1m2!2m1!1sTinas!3m6!1s0x8fae731144d24639:0x50e2687dd283dc68!8m2!3d8.1031791!4d-80.985969!15sCgVUaW5hc5IBDG1hbnVmYWN0dXJlcuABAA!16s%2Fg%2F11jgt1zs4l?entry=ttu"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <!-- Detalles de contacto -->
        <div class="contact-details">
            <div class="left-section">
                <h2>Preguntas</h2>
                <p>Para todo tipo de preguntas, comentarios e inquietudes;</p>
                <p>por favor llámanos: 6500-6866 </p>
            </div>
            <div class="right-section">
                <h2>Oficina Principal</h2>
                <p>Bajada de los Chorros, frente a la entrada de barriada el Carmen, Santiago, Veraguas</p>
                <p>Más información llamar al 6500-6866</p>
                <p>Visita nuestras redes sociales:</p>
                <p>Facebook: Tinas Gn</p>
                <p>Instagram: tinas_gn</p>
                <p>E-mail: tinasguillen09@gmail.com</p>
                <p>WhatsApp: 6500-6866</p>
            </div>
        </div>
        <!-- Horario de Apertura -->
        <div class="business-hours">
            <h2>Horario de Apertura</h2>
            <table>
                <tr>
                    <th>Día</th>
                    <th>Horario</th>
                </tr>
                <tr>
                    <td>Lunes - Miércoles</td>
                    <td>08:00-12:00 / 13:00-17:00</td>
                </tr>
                <tr>
                    <td>Jueves</td>
                    <td>08:00-12:00 / 13:00-17:00</td>
                </tr>
                <tr>
                    <td>Viernes</td>
                    <td>08:00-12:00 / 13:00-16:00</td>
                </tr>
                <tr>
                    <td>Sábado</td>
                    <td>08:00-12:00</td>
                </tr>
                <tr>
                    <td>Domingo</td>
                    <td>Cerrado</td>
                </tr>
            </table>
        </div>
    </section>

    <section id="miembros" class="members-section">
        <!-- Contenido de la sección de miembros -->
        <h2>Miembros</h2>
        <h2>Adrian Guillen</h2>
        <h2>Derek Hurtado</h2>
        <h2>Andres Vargas</h2>
        <h2>Jorge Lima</h2>
    </section>

    <script>
        // JavaScript para manejar el menú desplegable
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.querySelector('.menu-toggle');
            const nav = document.querySelector('nav ul');

            toggle.addEventListener('click', function () {
                nav.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
