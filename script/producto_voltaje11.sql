-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2022 a las 04:51:30
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
-- Estructura de tabla para la tabla `producto_voltaje`
--

CREATE TABLE `producto_voltaje` (
  `idProductoVoltaje` int(12) NOT NULL,
  `producto_id` int(12) NOT NULL,
  `voltaje_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_voltaje`
--

INSERT INTO `producto_voltaje` (`idProductoVoltaje`, `producto_id`, `voltaje_id`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(7, 5, 2),
(8, 6, 1),
(9, 6, 2),
(13, 7, 1),
(14, 8, 2),
(15, 9, 2),
(16, 10, 2),
(17, 11, 1),
(18, 10, 1),
(19, 12, 2),
(20, 12, 1),
(21, 13, 1),
(22, 13, 2),
(23, 14, 1),
(24, 14, 2),
(25, 15, 1),
(26, 15, 2),
(27, 16, 2),
(28, 17, 2),
(29, 18, 2),
(30, 19, 0),
(31, 20, 1),
(32, 21, 1),
(33, 22, 1),
(34, 23, 1),
(35, 16, 1),
(36, 24, 0),
(37, 25, 1),
(38, 26, 0),
(39, 27, 1),
(41, 22, 2),
(42, 28, 1),
(43, 23, 2),
(44, 21, 2),
(45, 29, 1),
(46, 30, 1),
(47, 8, 1),
(48, 31, 1),
(50, 32, 0),
(51, 33, 0),
(52, 34, 2),
(53, 35, 0),
(54, 36, 0),
(55, 25, 2),
(56, 27, 2),
(60, 28, 2),
(62, 37, 1),
(63, 37, 2),
(64, 38, 1),
(65, 38, 2),
(66, 17, 1),
(70, 39, 0),
(72, 20, 2),
(73, 40, 2),
(74, 41, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto_voltaje`
--
ALTER TABLE `producto_voltaje`
  ADD PRIMARY KEY (`idProductoVoltaje`),
  ADD KEY `fk_productoVoltaje` (`producto_id`),
  ADD KEY `fk_voltajeProducto` (`voltaje_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto_voltaje`
--
ALTER TABLE `producto_voltaje`
  MODIFY `idProductoVoltaje` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto_voltaje`
--
ALTER TABLE `producto_voltaje`
  ADD CONSTRAINT `fk_productoVoltaje` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_voltajeProducto` FOREIGN KEY (`voltaje_id`) REFERENCES `voltaje` (`idVoltaje`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
