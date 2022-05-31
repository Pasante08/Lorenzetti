-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2022 a las 22:26:49
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
  `producto_id` int(12) NOT NULL,
  `voltaje_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_voltaje`
--

INSERT INTO `producto_voltaje` (`producto_id`, `voltaje_id`) VALUES
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2),
(22, 2),
(22, 1),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(37, 1),
(37, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 2),
(44, 1),
(45, 1),
(45, 2),
(46, 2),
(46, 1),
(47, 1),
(47, 2),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(51, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto_voltaje`
--
ALTER TABLE `producto_voltaje`
  ADD KEY `fk_productoVoltaje` (`producto_id`),
  ADD KEY `fk_voltajeProducto` (`voltaje_id`);

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
