<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Página Web para TinasGN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/PROD.css">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.querySelector('.menu-toggle');
            const nav = document.querySelector('nav ul');

            toggle.addEventListener('click', function () {
                nav.classList.toggle('active');
            });

            // Detectar cambios en el ancho de la ventana para ocultar el menú
            window.addEventListener('resize', function () {
                if (window.innerWidth > 768) { // Cambia 768 según el punto de quiebre deseado
                    nav.classList.remove('active');
                }
            });
        });
    </script>
</head>

<body id="productos">

    <?php
    echo '<header>
    <div class="logo-container">
        <div class="logo">
            <img src="./img/logoicon.ico" alt="Logo de TinasGN">
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="MenuTienda.php">INICIO</a></li>
                <li><a href="#productos">PRODUCTOS</a></li>
                <li><a href="MenuTienda.php#productos-instalados">PRODUCTOS INSTALADOS</a></li>
                <li><a href="comentarios.html">COMENTARIOS</a></li>
                <li><a href="consejos.html">CONSEJOS</a></li>
                <li><a href="MenuTienda.php#contacto">CONTACTENOS</a></li>
                <li><a href="MenuTienda.php#miembros">MIEMBROS</a></li>
        </ul>
        <button class="menu-toggle">&#9776;</button>
    </nav>
</header>';

    // Título de la página
    echo '<h1 id="productos">PRODUCTOS</h1>';

    echo '<section id="tinasM" class="tinas">
    <h2 class="section-title">Tinas y Letrinas</h2>        
    <div class="tinasp">';

    // Primera tina
    echo '<div class="tina-item">
            <img src="./img/TinaSencilla.jpg" alt="Tina Sencilla">
            <p>Tina Sencilla</p>';

    $tinaSencillaNombre = "Tina Sencilla";
    $idTinaSencilla = 0;
    $tinaSencillaPrecio = 10.00; // Cambiado a número sin comillas
    
    echo '<p class="precio">$10.00</p>
          <div class="cantidad-container">
              <button class="add-button" onclick="agregarAlCarrito(' . $idTinaSencilla . ', \'' . $tinaSencillaNombre . '\', ' . $tinaSencillaPrecio . ')">+</button>
          </div>
        </div>';

    // Segunda tina
    echo '<div class="tina-item">
            <img src="./img/TINA-DOBLE.jpg" alt="Tina Doble">
            <p>Tina Doble</p>';

    $tinaDobleNombre = "Tina Doble";
    $idTinaDoble = 2;
    $tinaDoblePrecio = 23.00; // Cambiado a número sin comillas
    
    echo '<p class="precio">$23.00</p>
           <div class="cantidad-container">
              <button class="add-button" onclick="agregarAlCarrito(' . $idTinaDoble . ', \'' . $tinaDobleNombre . '\', ' . $tinaDoblePrecio . ')">+</button>
          </div>
        </div>
    </div>
</section>';


    // Decoraciones
    echo '<section id="deco" class="deco">
    <h2 class="section-title">Decoraciones</h2> 
    <div class="decoP">';

    // Capitel redondo
    echo '<div class="deco-item">
        <img src="./img/CapitelRedondo.jpg" alt="Capitel redondo">
        <p>Capitel redondo</p>';

    $capitelRedondoNombre = "Capitel redondo";
    $idCapitelRedondo = 3;
    $capitelRedondoPrecio = 15.00; // Cambiado a número sin comillas
    
    echo '<p class="precio">$15.00</p>
      <div class="cantidad-container">
          <button class="add-button" onclick="agregarAlCarrito(' . $idCapitelRedondo . ', \'' . $capitelRedondoNombre . '\', ' . $capitelRedondoPrecio . ')">+</button>
      </div>
      <div class="mensaje-overlay" id="mensaje-capitel-redondo"></div>
    </div>';

    // Capitel cuadrado
    echo '<div class="deco-item">
        <img src="./img/Capitelcuadrado.jpg" alt="Capitel cuadrado">
        <p>Capitel cuadrado</p>';

    $capitelCuadradoNombre = "Capitel cuadrado";
    $idCapitelCuadrado = 4;
    $capitelCuadradoPrecio = 15.00; // Cambiado a número sin comillas
    
    echo '<p class="precio">$15.00</p>
      <div class="cantidad-container">
          <button class="add-button" onclick="agregarAlCarrito(' . $idCapitelCuadrado . ', \'' . $capitelCuadradoNombre . '\', ' . $capitelCuadradoPrecio . ')">+</button>
      </div>
      <div class="mensaje-overlay" id="mensaje-capitel-cuadrado"></div>
    </div>';

    // Pisotes
    echo '<div class="deco-item">
        <img src="./img/pisotes.jpg" alt="Pisotes">
        <p>Pisotes</p>';

    $pisotesNombre = "Pisotes";
    $idPisotes = 5;
    $pisotesPrecio = 10.00; 
    
    echo '<p class="precio">$0.00</p>
      <div class="cantidad-container">
          <button class="add-button" onclick="agregarAlCarrito(' . $idPisotes . ', \'' . $pisotesNombre . '\', ' . $pisotesPrecio . ')">+</button>
      </div>
      <div class="mensaje-overlay" id="mensaje-pisotes"></div>
    </div>';

    // Caja de medidor
    echo '<div class="deco-item">
        <img src="./img/CajaDeMedidor.jpg" alt="Caja de medidor">
        <p>Caja de medidor</p>';

    $cajaMedidorNombre = "Caja de medidor";
    $idCajaMedidor = 6;
    $cajaMedidorPrecio = 13.00; 
    
    echo '<p class="precio">$13.00</p>
      <div class="cantidad-container">
          <button class="add-button" onclick="agregarAlCarrito(' . $idCajaMedidor . ', \'' . $cajaMedidorNombre . '\', ' . $cajaMedidorPrecio . ')">+</button>
      </div>
      <div class="mensaje-overlay" id="mensaje-caja-medidor"></div>
    </div>';

    echo '</div></section>';

    //nueva seccion
// Decoraciones
    echo '<section id="deco" class="deco">
    <h2 class="section-title">Tornos</h2> 
    <div class="decoP">';

    // Torno Pepermint
    echo '<div class="torno-item">
        <img src="./img/Tornopp.jpg" alt="Torno Pepermint">
        <p>Torno Pepermint</p>';

    $tornoPepermintNombre = "Torno Pepermint";
    $idTornoPepermint = 7;
    $tornoPepermintPrecio = 4.00; 
    
    echo '<p class="precio">$4.00</p>
        <button class="add-button" onclick="agregarAlCarrito(' . $idTornoPepermint . ', \'' . $tornoPepermintNombre . '\', ' . $tornoPepermintPrecio . ')">+</button>
        <div class="mensaje-overlay" id="mensaje-torno-pepermint"></div>
    </div>';

    // Torno Sencillo
    echo '<div class="torno-item">
        <img src="./img/TornoSencillo.jpg" alt="Torno Sencillo">
        <p>Torno Sencillo</p>';

    $tornoSencilloNombre = "Torno Sencillo";
    $idTornoSencillo = 8;
    $tornoSencilloPrecio = 3.00; 
    
    echo '<p class="precio">$3.00</p>
        <button class="add-button" onclick="agregarAlCarrito(' . $idTornoSencillo . ', \'' . $tornoSencilloNombre . '\', ' . $tornoSencilloPrecio . ')">+</button>
        <div class="mensaje-overlay" id="mensaje-torno-sencillo"></div>
    </div>';

    // Torno Bajo
    echo '<div class="torno-item">
        <img src="./img/TornoBajo.jpg" alt="Torno Bajo">
        <p>Torno Bajo</p>';

    $tornoBajoNombre = "Torno Bajo";
    $idTornoBajo = 9;
    $tornoBajoPrecio = 4.00; 
    
    echo '<p class="precio">$4.00</p>
        <button class="add-button" onclick="agregarAlCarrito(' . $idTornoBajo . ', \'' . $tornoBajoNombre . '\', ' . $tornoBajoPrecio . ')">+</button>
        <div class="mensaje-overlay" id="mensaje-torno-bajo"></div>
    </div>';

    // Torno Roma
    echo '<div class="torno-item">
        <img src="./img/TornoRoma.jpg" alt="Torno Roma">
        <p>Torno Roma</p>';

    $tornoRomaNombre = "Torno Roma";
    $idTornoRoma = 10;
    $tornoRomaPrecio = 4.50; 
    
    echo '<p class="precio">$4.50</p>
        <button class="add-button" onclick="agregarAlCarrito(' . $idTornoRoma . ', \'' . $tornoRomaNombre . '\', ' . $tornoRomaPrecio . ')">+</button>
        <div class="mensaje-overlay" id="mensaje-torno-roma"></div>
    </div>';
    // Torno Roma
    echo '<div class="torno-item">
        <img src="./img/TornoRoma.jpg" alt="Torno Roma">
        <p>Torno Roma</p>';

    $tornoRomaNombre = "Torno Roma";
    $idTornoRoma = 10;
    $tornoRomaPrecio = 4.50; 
    
    echo '<p class="precio">$4.50</p>
        <button class="add-button" onclick="agregarAlCarrito(' . $idTornoRoma . ', \'' . $tornoRomaNombre . '\', ' . $tornoRomaPrecio . ')">+</button>
        <div class="mensaje-overlay" id="mensaje-torno-roma"></div>
    </div>';


    echo '</div></section>';


    ?>

    <script>
        function menprod(producto, idMensaje) {
            var mensajeOverlay = document.getElementById(idMensaje);
            var mensaje = Detprod(producto);

            mensajeOverlay.innerHTML = mensaje;
            mensajeOverlay.style.display = "block";
            setTimeout(function () {
                mensajeOverlay.style.display = "none";
            }, 3000);
        }

        // Función para obtener detalles de producto
        function Detprod(producto) {
            switch (producto) {
                case "Tina Sencilla":
                    return "Tina de cemento de un espacio para lavar ";
                case "Tina Doble":
                    return "Tina de cemento de dos espacios, para lavar";

                case "Capitel redondo":
                    return "Perfectos para columnas de 10 pulg.";
                case "Capitel cuadrado":
                    return "Hechas para columnas de 8 pulg.";
                case "Pisotes":
                    return "Decoración para embellecer suelos de tierra ";
                case "Caja de medidor":
                    return "Caja de cemento para resguardar los medidores de agua";


                case "Torno Pepermint":
                    return "Torno decorativo de 60 cm de cemento";
                case "Torno Sencillo":
                    return "Torno de cemento liso 60 cm";
                case "Torno Bajo":
                    return "Torno decorativo de cemento 60 cm";
                case "Torno Roma":
                    return "Torno decorativo de cemento 70 cm";
                case "Torno pecho palomo":
                    return "Torno decorativo de cemento 70 cm";

            }
        }
    </script>
    <?php

    echo '<section id="carrito" class="carrito">
    <h2>Carrito de compras</h2>
    <div id="lista-carrito">
        <table id="carrito-table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se agregarán los productos del carrito dinámicamente -->
            </tbody>
        </table>
    </div>
    <div class="total-carrito">
        <p>Total: <span id="total-carrito">$0.00</span></p>
        <button id="vaciar-carrito">Vaciar carrito</button>
        <button id="realizar-compra">Realizar compra</button>
    </div>
</section>

<section id="seccion-compra" class="compra" style="display:none;">
    <h2>Detalle de Compra</h2>
    <!-- Aquí puedes agregar los detalles adicionales de la compra -->
</section>';
    ?>
</body>
<script>
    var carrito = [];
    var total = 0;

    function agregarAlCarrito(id, nombre, precio) {
        carrito.push({ id: id, nombre: nombre, precio: precio });
        total += precio;
        actualizarCarrito();
    }

    function actualizarCarrito() {
        var listaCarrito = document.getElementById('lista-carrito').getElementsByTagName('tbody')[0];
        var totalCarrito = document.getElementById('total-carrito');

        listaCarrito.innerHTML = '';
        carrito.forEach(function (producto) {
            var fila = listaCarrito.insertRow();
            var nombreCell = fila.insertCell(0);
            var precioCell = fila.insertCell(1);
            var cantidadCell = fila.insertCell(2);
            var totalCell = fila.insertCell(3);
            var eliminarCell = fila.insertCell(4);

            nombreCell.textContent = producto.nombre;
            precioCell.textContent = '$' + producto.precio.toFixed(2);

            var inputCantidad = document.createElement('input');
            inputCantidad.type = 'number';
            inputCantidad.value = 1;
            inputCantidad.min = 1;
            inputCantidad.addEventListener('input', function () {
                actualizarTotalFila(fila, producto.precio);
            });
            cantidadCell.appendChild(inputCantidad);

            totalCell.textContent = '$' + producto.precio.toFixed(2);

            var botonEliminar = document.createElement('button');
            botonEliminar.textContent = 'Eliminar';
            botonEliminar.addEventListener('click', function () {
                eliminarProducto(fila, producto.precio);
            });
            eliminarCell.appendChild(botonEliminar);
        });

        // Llamar a calcularTotal al finalizar de actualizar el carrito
        calcularTotal();

        totalCarrito.textContent = 'Total: $' + total.toFixed(2);
    }
    function actualizarTotalFila(fila, precioUnitario) {
        var cantidad = 1; // Fijar la cantidad en 1, ya que no se permitirá cambiar manualmente
        var subtotal = cantidad * precioUnitario;

        // Obtener el índice de la fila en el carrito
        var indice = fila.rowIndex - 1; // Restar 1 porque las filas comienzan desde 1, y el encabezado de la tabla es la primera fila

        // Actualizar el total del producto en el array 'carrito'
        carrito[indice].cantidad = cantidad; // Actualizar la cantidad
        carrito[indice].totalFila = subtotal; // Actualizar el total de la fila

        // Recalcular el total del carrito después de actualizar la fila
        calcularTotal();

        // Mostrar el subtotal en un elemento <span> (o <label>)
        var subtotalElemento = document.createElement('span');
        subtotalElemento.textContent = '$' + subtotal.toFixed(2);

        // Limpiar el contenido previo de la celda de subtotal y agregar el nuevo elemento
        var totalFila = fila.cells[3];
        totalFila.innerHTML = '';
        totalFila.appendChild(subtotalElemento);
    }

    function calcularTotal() {
        var total = 0;
        carrito.forEach(function (producto) {
            total += producto.totalFila; // Sumar el total de cada producto en el carrito
        });

        // Actualizar el elemento de total del carrito
        var totalCarrito = document.getElementById('total-carrito');
        totalCarrito.textContent = 'Total: $' + total.toFixed(2);
    }




    function eliminarProducto(fila, precio) {
        var index = fila.rowIndex - 1;
        var cantidad = parseInt(fila.cells[2].getElementsByTagName('input')[0].value);
        carrito.splice(index, 1);
        total -= precio * cantidad;
        fila.remove();
        actualizarCarrito();
    }

    document.getElementById('vaciar-carrito').addEventListener('click', function () {
        carrito = [];
        total = 0;
        actualizarCarrito();
    });

    document.getElementById('realizar-compra').addEventListener('click', function () {
       
        calcularTotal(); // Calcula el total antes de mostrar el mensaje
        alert('Compra realizada por un total de: $' + total.toFixed(2));
        carrito = []; // Vacía el carrito después de la compra realizada
        total = 0; // Reinicia el total después de la compra realizada
        actualizarCarrito(); // Actualiza la visualización del carrito después de la compra
    });

    document.getElementById('realizar-compra').addEventListener('click', function () {
    // Requerir el archivo 'conexion.php'
    var script = document.createElement('script');
    script.src = 'conexion.php';
    document.head.appendChild(script);

    // Mostrar alerta con la información bancaria
    alert(`ADRIAN OMAR GUILLEN PINILLA\nBanco General\nCuenta de ahorros\n0498985604551`);

    
});
</script>


</html>