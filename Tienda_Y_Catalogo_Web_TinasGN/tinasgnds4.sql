SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `tinasgnds4`;
USE `tinasgnds4`;

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `pedidosd` (
  `codigo_pedido` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `estado` varchar(255) DEFAULT 'En espera'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `pedido_productod` (
  `id_pedido` int(11) DEFAULT NULL,
  `codigo_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `productosd` (
  `codigo_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `usuariosd` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `usuariosd` (`id`, `usuario`, `contrasena`) VALUES
(2, 'admin', '$2y$10$6PfTepp1QtuQBIdIlhxgsefY0lfyhacJV/tmuYLj/IisfU5djedUa');

ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `pedidosd`
  ADD PRIMARY KEY (`codigo_pedido`),
  ADD KEY `id_usuario` (`id_usuario`);


ALTER TABLE `pedido_productod`
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `codigo_producto` (`codigo_producto`);


ALTER TABLE `productosd`
  ADD PRIMARY KEY (`codigo_producto`);


ALTER TABLE `usuariosd`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `pedidosd`
  MODIFY `codigo_pedido` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `productosd`
  MODIFY `codigo_producto` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuariosd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `pedidosd`
  ADD CONSTRAINT `pedidosd_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuariosd` (`id`);


ALTER TABLE `pedido_productod`
  ADD CONSTRAINT `pedido_productod_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidosd` (`codigo_pedido`),
  ADD CONSTRAINT `pedido_productod_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `productosd` (`codigo_producto`);
COMMIT;
