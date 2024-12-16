document.addEventListener('DOMContentLoaded', function () {
    const carritoContainer = document.querySelector('#lista-carrito tbody');
    const vaciarCarritoBtn = document.getElementById('vaciar-carrito');
    const realizarCompraBtn = document.getElementById('realizar-compra');

    // Evento para agregar producto al carrito
    window.agregarAlCarrito = function (nombre, precio, cantidadId) {
        const cantidad = parseInt(document.getElementById(cantidadId).value);
        const total = parseFloat(precio.replace('$', '')) * cantidad;

        const producto = {
            nombre: nombre,
            precio: parseFloat(precio.replace('$', '')),
            cantidad: cantidad,
            total: total.toFixed(2)
        };

        agregarProductoAlCarrito(producto);
        calcularTotalCarrito();
    };

    // Función para agregar producto al carrito
    function agregarProductoAlCarrito(producto) {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${producto.nombre}</td>
            <td>$${producto.precio.toFixed(2)}</td>
            <td>${producto.cantidad}</td>
            <td>$${producto.total}</td>
            <td><button class="eliminar-producto" onclick="eliminarProducto(this)">Eliminar</button></td>
        `;
        carritoContainer.appendChild(row);
    }

    // Función para calcular el total del carrito
    function calcularTotalCarrito() {
        let total = 0;
        const precios = document.querySelectorAll('#lista-carrito tbody tr td:nth-child(4)');
        precios.forEach(precio => {
            total += parseFloat(precio.textContent.replace('$', ''));
        });
        document.getElementById('total-carrito').textContent = '$' + total.toFixed(2);
    }

    // Evento para vaciar el carrito
    vaciarCarritoBtn.addEventListener('click', function () {
        while (carritoContainer.firstChild) {
            carritoContainer.removeChild(carritoContainer.firstChild);
        }
        calcularTotalCarrito();
    });

    // Función para eliminar un producto del carrito
    window.eliminarProducto = function (boton) {
        const fila = boton.closest('tr');
        fila.remove();
        calcularTotalCarrito();
    };

    // Evento para realizar la compra (ejemplo)
    realizarCompraBtn.addEventListener('click', function () {
        alert('Compra realizada. Implementa la lógica de compra según tus necesidades.');
        vaciarCarrito();
    });
});