-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2022 a las 22:26:14
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
  `producto_id` int(12) NOT NULL,
  `color_id` int(12) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `imgxcien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_color`
--

INSERT INTO `producto_color` (`producto_id`, `color_id`, `imagen`, `ubicacion`, `imgxcien`) VALUES
(1, 1, '8705152.jpg', 'assets/images/products/8705152.jpg', 'assets/images/products/zoom/8705152.jpg'),
(1, 3, '869996.jpg', 'assets/images/products/869996.jpg', 'assets/images/products/zoom/869996.jpg'),
(1, 4, '8699931.jpg', 'assets/images/products/8699931.jpg', 'assets/images/products/zoom/8699931.jpg'),
(1, 6, '8699972.jpg', 'assets/images/products/8699972.jpg', 'assets/images/products/zoom/8699972.jpg'),
(1, 7, '8699951.jpg', 'assets/images/products/8699951.jpg', 'assets/images/products/zoom/8699951.jpg'),
(1, 8, '8699941.jpg', 'assets/images/products/8699941.jpg', 'assets/images/products/zoom/8699941.jpg'),
(4, 1, '869850.jpg', 'assets/images/products/869850.jpg', 'assets/images/products/zoom/869850.jpg'),
(5, 1, '870638.jpg', 'assets/images/products/870638.jpg', 'assets/images/products/zoom/870638.jpg'),
(6, 4, '870636.jpg', 'assets/images/products/870636.jpg', 'assets/images/products/zoom/870636.jpg'),
(6, 5, '870635.jpg', 'assets/images/products/870635.jpg', 'assets/images/products/zoom/870635.jpg'),
(7, 1, '870545.jpg', 'assets/images/products/870545.jpg', 'assets/images/products/zoom/870545.jpg'),
(8, 4, '870547.jpg', 'assets/images/products/870547.jpg', 'assets/images/products/zoom/870547.jpg'),
(8, 5, '870607.jpg', 'assets/images/products/870607.jpg', 'assets/images/products/zoom/870607.jpg'),
(9, 1, '870608.jpg', 'assets/images/products/870608.jpg', 'assets/images/products/zoom/870608.jpg'),
(9, 2, '870528.jpg', 'assets/images/products/870528.jpg', 'assets/images/products/zoom/870528.jpg'),
(10, 4, '870610.jpg', 'assets/images/products/870610.jpg', 'assets/images/products/zoom/870610.jpg'),
(10, 5, '870612.jpg', 'assets/images/products/870612.jpg', 'assets/images/products/zoom/870612.jpg'),
(11, 1, '870613.jpg', 'assets/images/products/870613.jpg', 'assets/images/products/zoom/870613.jpg'),
(11, 2, '870530.jpg', 'assets/images/products/870530.jpg', 'assets/images/products/zoom/870530.jpg'),
(12, 4, '870615.jpg', 'assets/images/products/870615.jpg', 'assets/images/products/zoom/870615.jpg'),
(12, 5, '870617.jpg', 'assets/images/products/870617.jpg', 'assets/images/products/zoom/870617.jpg'),
(13, 1, '870619.jpg', 'assets/images/products/870619.jpg', 'assets/images/products/zoom/870619.jpg'),
(14, 4, '870621.jpg', 'assets/images/products/870621.jpg', 'assets/images/products/zoom/870621.jpg'),
(14, 5, '870625.jpg', 'assets/images/products/870625.jpg', 'assets/images/products/zoom/870625.jpg'),
(15, 1, '869964.jpg', 'assets/images/products/869964.jpg', 'assets/images/products/zoom/869964.jpg'),
(16, 1, '869964.jpg', 'assets/images/products/869964.jpg', 'assets/images/products/zoom/869964.jpg'),
(17, 1, '869999.jpg', 'assets/images/products/869999.jpg', 'assets/images/products/zoom/869999.jpg'),
(18, 1, '869917.jpg', 'assets/images/products/869917.jpg', 'assets/images/products/zoom/869917.jpg'),
(19, 1, '869918.jpg', 'assets/images/products/869918.jpg', 'assets/images/products/zoom/869918.jpg'),
(20, 1, '869921.jpg', 'assets/images/products/869921.jpg', 'assets/images/products/zoom/869921.jpg'),
(21, 1, '869998.jpg', 'assets/images/products/869998.jpg', 'assets/images/products/zoom/869998.jpg'),
(22, 1, '869998.jpg', 'assets/images/products/869998.jpg', 'assets/images/products/zoom/869998.jpg'),
(23, 1, '869987.jpg', 'assets/images/products/869987.jpg', 'assets/images/products/zoom/869987.jpg'),
(24, 1, '869967.jpg', 'assets/images/products/869967.jpg', 'assets/images/products/zoom/869967.jpg'),
(25, 1, '869925.jpg', 'assets/images/products/869925.jpg', 'assets/images/products/zoom/869925.jpg'),
(26, 1, '869842.jpg', 'assets/images/products/869842.jpg', 'assets/images/products/zoom/869842.jpg'),
(27, 1, '869970.jpg', 'assets/images/products/869970.jpg', 'assets/images/products/zoom/869970.jpg'),
(27, 6, '869959.jpg', 'assets/images/products/869959.jpg', 'assets/images/products/zoom/869959.jpg'),
(27, 8, '869958.jpg', 'assets/images/products/869958.jpg', 'assets/images/products/zoom/869958.jpg'),
(27, 9, '869960.jpg', 'assets/images/products/869960.jpg', 'assets/images/products/zoom/869960.jpg'),
(28, 1, '869916.jpg', 'assets/images/products/869916.jpg', 'assets/images/products/zoom/869916.jpg'),
(29, 1, '869989.jpg', 'assets/images/products/869989.jpg', 'assets/images/products/zoom/869989.jpg'),
(30, 1, '869961.jpg', 'assets/images/products/869961.jpg', 'assets/images/products/zoom/869961.jpg'),
(31, 1, '869978.jpg', 'assets/images/products/869978.jpg', 'assets/images/products/zoom/869978.jpg'),
(32, 7, '869903.jpg', 'assets/images/products/869903.jpg', 'assets/images/products/zoom/869903.jpg'),
(32, 8, '869902.jpg', 'assets/images/products/869902.jpg', 'assets/images/products/zoom/869902.jpg'),
(32, 9, '869904.jpg', 'assets/images/products/869904.jpg', 'assets/images/products/zoom/869904.jpg'),
(33, 1, '870643.jpg', 'assets/images/products/870643.jpg', 'assets/images/products/zoom/870643.jpg'),
(34, 1, '869983.jpg', 'assets/images/products/869983.jpg', 'assets/images/products/zoom/869983.jpg'),
(35, 1, '870520.jpg', 'assets/images/products/870520.jpg', 'assets/images/products/zoom/870520.jpg'),
(36, 1, '870518.jpg', 'assets/images/products/870518.jpg', 'assets/images/products/zoom/870518.jpg'),
(37, 1, '8699912.jpg', 'assets/images/products/8699912.jpg', 'assets/images/products/zoom/8699912.jpg'),
(55, 1, '870504.png', 'assets/images/products/870504.png', 'assets/images/products/zoom/870504.png'),
(56, 1, '870501.png', 'assets/images/products/870501.png', 'assets/images/products/zoom/870501.png'),
(57, 1, '870644.png', 'assets/images/products/870644.png', 'assets/images/products/zoom/870644.png'),
(58, 1, '870527.png', 'assets/images/products/870527.png', 'assets/images/products/zoom/870527.png'),
(59, 2, '8706411.png', 'assets/images/products/8706411.png', 'assets/images/products/zoom/8706411.png'),
(60, 1, '870593.png', 'assets/images/products/870593.png', 'assets/images/products/zoom/870593.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto_color`
--
ALTER TABLE `producto_color`
  ADD KEY `fk_productoColor` (`producto_id`),
  ADD KEY `fk_colorProducto` (`color_id`);

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
