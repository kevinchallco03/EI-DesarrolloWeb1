-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2025 a las 20:33:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panaderia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desserts`
--

CREATE TABLE `desserts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `desserts`
--

INSERT INTO `desserts` (`id`, `name`, `descripcion`, `price`, `discount`, `image`) VALUES
(1, 'Suspiro a la Limeña', 'Delicioso suspiro a la limeña con el manjar de casa, con merengue italiano', 10.00, 0.00, 'image-693720597bd5f.jpg'),
(2, 'Tres Leches', 'Disfruta de la especialidad de la casa', 13.00, 0.00, 'image-6937219ba2c70.jpg'),
(3, 'Cheesecake de Fresa', 'Disfruta de los mejores frutos rojos y de su textura.', 15.00, 0.00, 'image-693721f0a7966.jpg'),
(4, 'Crema volteada', 'Un postre con el equilibrio perfecto de dulzura y suavidad', 13.00, 0.00, 'image-6937223c1787e.jpg'),
(5, 'Carrot Cake', 'Una torta deliciosa de zanahoria y frutos secos', 14.00, 0.00, 'image-693722998bf59.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `perfil` int(11) NOT NULL CHECK (`perfil` in (1,9))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `email`, `password`, `image`, `perfil`) VALUES
(1, 'Daniel Mateo', 'Herrera Lopez', 'dh392161@gmail.com', '$2y$10$h.4Zf1usXJ1uCEHxSu/h9eL9zW8v6hFmZOs6kKJCWO8TKudQvkyJ.', 'image-6937257e731ed.jpg', 1),
(2, 'Fabricio', 'Caceres Reyna', 'cesarfabricio2810@gmail.com', '$2y$10$ReEPPI589nrCRpXiokJmgejGm5cxzxK8l7OKZDh2ySuWnoHFCE70a', 'image-693725932c4fa.jpg', 1),
(3, 'Juan', 'Alarcon', 'juanalarcongallegoss@gmail.com', '$2y$10$gwY4nAYiNbtHzHWA2EWLGeNxN27cVoMYxNxMjM4.fu.8U8w0Uapsy', 'image-693725cc5cf41.jpg', 1),
(4, 'Silvana Rosa', 'Estrada Carrion', 'SE025657@gmail.com', '$2y$10$Iuu.WYFmUJuyckXaaoT8N.fw2akIwXMU.ipM6ZBaJQeRnm6SwwLSy', 'image-6937267ab0434.jpg', 1),
(5, 'Angel Daniel', 'Fuentes Segura', 'angel.daniel.fuentes.segura@gmail.com', '$2y$10$tn3DbxFDXGm5gcvkh6T/7.JzE6yleetsU5jlT6NY8N8PPyGVduJ8S', 'image-693726fe607fc.jfif', 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `desserts`
--
ALTER TABLE `desserts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
