-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2022 a las 04:51:03
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lorenzetti`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_color`
--

CREATE TABLE `producto_color` (
  `idProductoColor` int(12) NOT NULL,
  `producto_id` int(12) NOT NULL,
  `color_id` int(12) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `imgxcien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_color`
--

INSERT INTO `producto_color` (`idProductoColor`, `producto_id`, `color_id`, `imagen`, `ubicacion`, `imgxcien`) VALUES
(1, 49, 0, '870532.jpg', 'assets/images/products/870532.jpg', 'assets/images/products/zoom/870532.jpg'),
(2, 24, 7, '869995.jpg', 'assets/images/products/869995.jpg', 'assets/images/products/zoom/869995.jpg'),
(3, 24, 1, '869954.jpg', 'assets/images/products/869954.jpg', 'assets/images/products/zoom/869954.jpg'),
(4, 39, 0, '869996.jpg', 'assets/images/products/869996.jpg', 'assets/images/products/zoom/869996.jpg'),
(5, 24, 9, '869993.jpg', 'assets/images/products/869993.jpg', 'assets/images/products/zoom/869993.jpg'),
(6, 24, 8, '869994.jpg', 'assets/images/products/869994.jpg', 'assets/images/products/zoom/869994.jpg'),
(8, 24, 6, '869997.jpg', 'assets/images/products/869997.jpg', 'assets/images/products/zoom/869997.jpg'),
(9, 19, 0, '869933.jpg', 'assets/images/products/869933.jpg', 'assets/images/products/zoom/869933.jpg'),
(10, 27, 1, '869970.jpg', 'assets/images/products/869970.jpg', 'assets/images/products/zoom/869970.jpg'),
(12, 27, 6, '869959.jpg', 'assets/images/products/869959.jpg', 'assets/images/products/zoom/869959.jpg'),
(13, 27, 7, '869979.jpg', 'assets/images/products/869979.jpg', 'assets/images/products/zoom/869979.jpg'),
(15, 27, 9, '869982.jpg', 'assets/images/products/869982.jpg', 'assets/images/products/zoom/869982.jpg'),
(18, 3, 0, '869842.jpg', 'assets/images/products/869842.jpg', 'assets/images/products/zoom/869842.jpg'),
(19, 7, 1, '869912.jpg', 'assets/images/products/869912.jpg', 'assets/images/products/zoom/869912.jpg'),
(20, 9, 1, '869916.jpg', 'assets/images/products/869916.jpg', 'assets/images/products/zoom/869916.jpg'),
(21, 1, 0, '869837.jpg', 'assets/images/products/869837.jpg', 'assets/images/products/zoom/869837.jpg'),
(22, 2, 0, '869840.jpg', 'assets/images/products/869840.jpg', 'assets/images/products/zoom/869840.jpg'),
(23, 59, 5, '870634.jpg', 'assets/images/products/870634.jpg', 'assets/images/products/zoom/870634.jpg'),
(25, 54, 1, '870544.jpg', 'assets/images/products/870544.jpg', 'assets/images/products/zoom/870544.jpg'),
(27, 55, 4, '870546.jpg', 'assets/images/products/870546.jpg', 'assets/images/products/zoom/870546.jpg'),
(29, 55, 5, '870606.jpg', 'assets/images/products/870606.jpg', 'assets/images/products/zoom/870606.jpg'),
(31, 47, 1, '870529.jpg', 'assets/images/products/870529.jpg', 'assets/images/products/zoom/870529.jpg'),
(33, 56, 4, '870609.jpg', 'assets/images/products/870609.jpg', 'assets/images/products/zoom/870609.jpg'),
(35, 47, 2, 'star.p.jpg', 'assets/images/products/star.p.jpg', 'assets/images/products/zoom/star.p.jpg'),
(37, 56, 5, '870612.jpg', 'assets/images/products/870612.jpg', 'assets/images/products/zoom/870612.jpg'),
(38, 48, 1, '870531.jpg', 'assets/images/products/870531.jpg', 'assets/images/products/zoom/870531.jpg'),
(40, 50, 4, '870614.jpg', 'assets/images/products/870614.jpg', 'assets/images/products/zoom/870614.jpg'),
(42, 48, 2, '870616.jpg', 'assets/images/products/870616.jpg', 'assets/images/products/zoom/870616.jpg'),
(44, 50, 5, '870533.jpg', 'assets/images/products/870533.jpg', 'assets/images/products/zoom/870533.jpg'),
(46, 57, 1, '870618.jpg', 'assets/images/products/870618.jpg', 'assets/images/products/zoom/870618.jpg'),
(48, 58, 4, '870620.jpg', 'assets/images/products/870620.jpg', 'assets/images/products/zoom/870620.jpg'),
(50, 58, 5, '870624.jpg', 'assets/images/products/870624.jpg', 'assets/images/products/zoom/870624.jpg'),
(52, 29, 1, '869966.jpg', 'assets/images/products/869966.jpg', 'assets/images/products/zoom/869966.jpg'),
(53, 10, 1, '869920.jpg', 'assets/images/products/869920.jpg', 'assets/images/products/zoom/869920.jpg'),
(55, 40, 1, '869999.jpg', 'assets/images/products/869999.jpg', 'assets/images/products/zoom/869999.jpg'),
(56, 21, 1, '869950.jpg', 'assets/images/products/869950.jpg', 'assets/images/products/zoom/869950.jpg'),
(58, 11, 1, '869918.jpg', 'assets/images/products/869918.jpg', 'assets/images/products/zoom/869918.jpg'),
(59, 12, 1, '869922.jpg', 'assets/images/products/869922.jpg', 'assets/images/products/zoom/869922.jpg'),
(61, 20, 1, '869936.jpg', 'assets/images/products/869936.jpg', 'assets/images/products/zoom/869936.jpg'),
(63, 34, 1, '869974.jpg', 'assets/images/products/869974.jpg', 'assets/images/products/zoom/869974.jpg'),
(64, 37, 1, '869986.jpg', 'assets/images/products/869986.jpg', 'assets/images/products/zoom/869986.jpg'),
(66, 30, 1, '869967.jpg', 'assets/images/products/869967.jpg', 'assets/images/products/zoom/869967.jpg'),
(67, 6, 4, '869907.jpg', 'assets/images/products/869907.jpg', 'assets/images/products/zoom/869907.jpg'),
(69, 13, 1, '869924.jpg', 'assets/images/products/869924.jpg', 'assets/images/products/zoom/869924.jpg'),
(71, 38, 1, '869988.jpg', 'assets/images/products/869988.jpg', 'assets/images/products/zoom/869988.jpg'),
(73, 22, 1, '869951.jpg', 'assets/images/products/869951.jpg', 'assets/images/products/zoom/869951.jpg'),
(75, 25, 1, '869955.jpg', 'assets/images/products/869955.jpg', 'assets/images/products/zoom/869955.jpg'),
(77, 5, 7, '869903.jpg', 'assets/images/products/869903.jpg', 'assets/images/products/zoom/869903.jpg'),
(78, 5, 9, '869904.jpg', 'assets/images/products/869904.jpg', 'assets/images/products/zoom/869904.jpg'),
(79, 5, 8, '869905.jpg', 'assets/images/products/869905.jpg', 'assets/images/products/zoom/869905.jpg'),
(80, 5, 6, '869910.jpg', 'assets/images/products/869910.jpg', 'assets/images/products/zoom/869910.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto_color`
--
ALTER TABLE `producto_color`
  ADD PRIMARY KEY (`idProductoColor`),
  ADD KEY `fk_productoColor` (`producto_id`),
  ADD KEY `fk_colorProducto` (`color_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto_color`
--
ALTER TABLE `producto_color`
  MODIFY `idProductoColor` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto_color`
--
ALTER TABLE `producto_color`
  ADD CONSTRAINT `fk_colorProducto` FOREIGN KEY (`color_id`) REFERENCES `color` (`idColor`),
  ADD CONSTRAINT `fk_productoColor` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`idProducto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
