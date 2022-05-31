-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2022 a las 22:24:22
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
-- Estructura de tabla para la tabla `productosistema`
--

CREATE TABLE `productosistema` (
  `idProducto` int(12) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `voltaje_id` int(12) DEFAULT NULL,
  `color_id` int(12) DEFAULT NULL,
  `producto_id` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productosistema`
--

INSERT INTO `productosistema` (`idProducto`, `codigo`, `nombre`, `voltaje_id`, `color_id`, `producto_id`) VALUES
(1, '870532', 'ACQUA STAR ULTRA BLK/CHROME 127V/5500W', 1, 5, 1),
(2, '869995', 'BRAZO P/DUCHA LORENZETTI AZUL/BL', 0, 7, 2),
(3, '869954', 'BRAZO P/DUCHA LORENZETTI BLANCO', 0, 1, 2),
(4, '869996', 'BRAZO P/DUCHA LORENZETTI CROMADO', 0, 4, 3),
(5, '869993', 'BRAZO P/DUCHA LORENZETTI GRIS', 0, 9, 2),
(6, '869994', 'BRAZO P/DUCHA LORENZETTI SALMON', 0, 8, 2),
(7, 'f869903', 'BRAZO P/DUCHA LORENZETTI SALMON', 0, 8, 2),
(8, '869997', 'BRAZO P/DUCHA LORENZETTI VERDE', 0, 6, 2),
(9, '869970', 'COMBO DUCHA MAXI 127V BLANCO', 1, 1, 4),
(10, '869958', 'COMBO DUCHA MAXI 127V SALMÓN', 1, 8, 4),
(11, '869959', 'COMBO DUCHA MAXI 127V VERDE', 1, 6, 4),
(12, '869979', 'COMBO DUCHA MAXI 220V AZUL', 2, 7, 4),
(13, '869984', 'COMBO DUCHA MAXI 220V BLANCO', 2, 1, 4),
(14, '869982', 'COMBO DUCHA MAXI 220V GRIS', 2, 9, 4),
(15, '869980', 'COMBO DUCHA MAXI 220V SALMÓN', 2, 8, 4),
(16, '869981', 'COMBO DUCHA MAXI 220V VERDE', 2, 6, 4),
(17, '869842', 'COMBO LORENBELLO+BRAZO 127V', 1, 0, 5),
(18, '869912', 'COMBO MAXI DUCHA 4T 127V BLANCO', 1, 1, 6),
(19, '869916', 'COMBO MAXI DUCHA 4T 220V BLANCO', 2, 1, 7),
(20, '869837', 'CUERPO ADVANCE', 0, 0, 8),
(21, '869840', 'CUERPO P/DUCHA TOP JET', 0, 0, 9),
(22, '870634', 'DUCHA ACQUA DUO NEGRO/CR ULTRA 127V', 1, 5, 10),
(23, '870635', 'DUCHA ACQUA DUO NEGRO/CR ULTRA 220V', 2, 5, 10),
(24, '870544', 'DUCHA ACQUA JET BLANCA ULTRA 127V', 1, 1, 11),
(25, '870545', 'DUCHA ACQUA JET BLANCA ULTRA 220V', 2, 1, 11),
(26, '870546', 'DUCHA ACQUA JET BLANCA/CR ULTRA 127V', 1, 4, 12),
(27, '870547', 'DUCHA ACQUA JET BLANCA/CR ULTRA 220V', 2, 4, 12),
(28, '870606', 'DUCHA ACQUA JET NEGRO/CR ULTRA 127V', 1, 5, 12),
(29, '870607', 'DUCHA ACQUA JET NEGRO/CR ULTRA 220V', 2, 5, 12),
(30, '870529', 'DUCHA ACQUA STAR BLANCA ULTRA 127V', 1, 1, 13),
(31, '870608', 'DUCHA ACQUA STAR BLANCA ULTRA 220V', 2, 1, 13),
(32, '870609', 'DUCHA ACQUA STAR BLANCO/CR ULTRA 127V', 1, 4, 14),
(33, '870610', 'DUCHA ACQUA STAR BLANCO/CR ULTRA 220V', 2, 4, 14),
(34, '870611', 'DUCHA ACQUA STAR NEGRA ULTRA 127V', 1, 2, 13),
(35, '870528', 'DUCHA ACQUA STAR NEGRA ULTRA 220V', 2, 2, 13),
(36, '870612', 'DUCHA ACQUA STAR NEGRO/CR ULTRA 220V', 2, 5, 14),
(37, '870531', 'DUCHA ACQUA STORM BLANCA ULTRA 127V', 1, 1, 15),
(38, '870613', 'DUCHA ACQUA STORM BLANCA ULTRA 220V', 2, 1, 15),
(39, '870614', 'DUCHA ACQUA STORM BLANCO CROMO ULTRA 127V', 1, 4, 16),
(40, '870615', 'DUCHA ACQUA STORM BLANCO CROMO ULTRA 220V', 2, 4, 16),
(41, '870616', 'DUCHA ACQUA STORM NEGRA ULTRA 127V', 1, 2, 15),
(42, '870530', 'DUCHA ACQUA STORM NEGRA ULTRA 220V', 2, 2, 15),
(43, '870533', 'DUCHA ACQUA STORM NEGRO/CR ULTRA 127V', 1, 5, 16),
(44, '870617', 'DUCHA ACQUA STORM NEGRO/CR ULTRA 220V', 2, 5, 16),
(45, '870618', 'DUCHA ACQUA WAVE BLANCA ULTRA 127V', 1, 1, 17),
(46, '870619', 'DUCHA ACQUA WAVE BLANCA ULTRA 220V', 2, 1, 17),
(47, '870620', 'DUCHA ACQUA WAVE BLANCA/CR ULTRA 127V', 1, 4, 18),
(48, '870621', 'DUCHA ACQUA WAVE BLANCA/CR ULTRA 220V', 2, 4, 18),
(49, '870624', 'DUCHA ACQUA WAVE NEGRO/CR ULTRA 127V', 1, 5, 18),
(50, '870625', 'DUCHA ACQUA WAVE NEGRO/CR ULTRA 220V', 2, 5, 18),
(51, '869966', 'DUCHA ADVANCE TURBO 127V', 1, 0, 19),
(52, '869920', 'DUCHA ADVANCE TURBO ELECTRÓNICA 127V', 1, 0, 20),
(53, '869917', 'DUCHA ADVANCE TURBO ELECTRONICA 220V', 2, 0, 20),
(54, '869999', 'DUCHA ADVANCE TURBO MULTI 220V', 2, 0, 21),
(55, '869950', 'DUCHA ADVANCED MULTI 127V', 1, 0, 22),
(56, '869964', 'DUCHA ADVANCED MULTI 220V', 2, 0, 22),
(57, '869918', 'DUCHA BLINDADA ELECT 127V', 1, 0, 23),
(58, '869922', 'DUCHA DUO SHOWER 127V', 1, 0, 24),
(59, '869921', 'DUCHA DUO SHOWER 220V', 2, 0, 24),
(60, '869936', 'DUCHA DUO SHOWER QUADRA 127V', 1, 0, 25),
(61, '869998', 'DUCHA DUO SHOWER QUADRA 220V', 2, 0, 25),
(62, '869974', 'DUCHA ELECT. FUTURA MASTER MULTI 220V', 2, 0, 26),
(63, '869986', 'DUCHA FASHION 127V BLANCO', 1, 1, 27),
(64, '869987', 'DUCHA FASHION 220V BLANCO', 2, 1, 27),
(65, '869967', 'DUCHA HIGIENICA 3T 127V', 1, 0, 28),
(66, '869907', 'DUCHA JEL MULTI 220V CROMO', 2, 4, 29),
(67, '869906', 'DUCHA JET MULTI 127V CROMO', 1, 4, 29),
(68, '869924', 'DUCHA LORENBELLO BANHO 127V', 1, 0, 30),
(69, '869925', 'DUCHA LORENBELLO BANHO 220V', 2, 0, 30),
(70, '869988', 'DUCHA MAXI  4T ULTRA CON TELEDUCHA 127 V', 1, 0, 31),
(71, '869989', 'DUCHA MAXI  4T ULTRA CON TELEDUCHA 220 V', 2, 0, 31),
(72, '869951', 'DUCHA MAXI 3T ULTRA CON TELEDUCHA 127 V', 1, 0, 32),
(73, '869961', 'DUCHA MAXI 3T ULTRA CON TELEDUCHA 220 V', 2, 0, 32),
(74, '869955', 'DUCHA MAXI 3T ULTRA SIN TELEDUCHA 127 V', 1, 0, 33),
(75, '869978', 'DUCHA MAXI 3T ULTRA SIN TELEDUCHA 220 V', 2, 0, 33),
(76, '869903', 'DUCHA MAXI DUCHA 4T 127V AZUL', 1, 7, 34),
(77, '869904', 'DUCHA MAXI DUCHA 4T 127V GRIS', 1, 9, 34),
(78, '869911', 'DUCHA MAXI DUCHA 4T 220V AZUL', 2, 7, 34),
(79, '869909', 'DUCHA MAXI DUCHA 4T 220V GRIS', 2, 9, 34),
(80, '869905', 'DUCHA MAXI DUCHA 4T 220V SALMON', 2, 8, 34),
(81, '869910', 'DUCHA MAXI DUCHA 4T 220V VERDE', 2, 6, 34),
(82, '870000', 'DUCHA MAXI ULTRA BLANCA SIN MAGUERA 220V', 2, 0, 35),
(83, '870642', 'DUCHA RELAX BLANCO 127V', 1, 1, 36),
(84, '870643', 'DUCHA RELAX BLANCO 220V', 2, 1, 36),
(85, '869962', 'DUCHA RELAX BLANCO/CR 127V', 1, 4, 37),
(86, '869983', 'DUCHA RELAX BLANCO/CR 220V', 2, 4, 37),
(87, '870517', 'DUCHA TOP JET 127V', 1, 0, 38),
(88, '870520', 'DUCHA TOP JET 220V', 2, 0, 38),
(89, '870518', 'DUCHA TOP JET ELECTRONICA 127V', 1, 0, 39),
(90, '869975', 'DUCHITA DIVERTIDA DELFIN', 0, 0, 40),
(91, '869973', 'DUCHITA DIVERTIDA HIPOPOTAMO', 0, 0, 41),
(92, '869976', 'DUCHITA DIVERTIDA PATITO', 0, 0, 42),
(93, '869972', 'DUCHITA DIVERTIDA TORTUGA', 0, 0, 43),
(94, '869956', 'MANGUERA PARA DUCHA ELECTRICA', 0, 0, 44),
(95, '870515', 'MONOBRAZO LORENZETTI BLANCO', 0, 0, 45),
(96, '870526', 'RESISTENCIA 127V TRADICION O JET', 1, 0, 46),
(97, '870525', 'RESISTENCIA 220V TRADICION O JET', 2, 0, 46),
(98, '870536', 'RESISTENCIA 3T ULTRA 220V', 2, 0, 47),
(99, '870538', 'RESISTENCIA ACQUA 127V', 1, 0, 48),
(100, '870543', 'RESISTENCIA ACQUA 220V', 2, 0, 48),
(101, '869928', 'RESISTENCIA BELLO BANHO 127V', 1, 0, 49),
(102, '869929', 'RESISTENCIA BELLO BANHO 220V', 2, 0, 49),
(103, '869968', 'RESISTENCIA CALENTADOR VERSATIL 127V', 1, 0, 50),
(104, '869915', 'RESISTENCIA CALENTADOR VERSATIL 220V', 2, 0, 50),
(105, '869930', 'RESISTENCIA CONVENCIONAL / BELLO BANHO / MAXI DUCHA / RELAX 220V', 2, 0, 51),
(106, '869953', 'RESISTENCIA CONVENCIONAL / BELLO BANHO /MAXI DUCHA / RELAX 127 V', 1, 0, 51),
(107, '869952', 'RESISTENCIA DUCHA ADVANCED MULTI 127V', 1, 0, 52),
(108, '869963', 'RESISTENCIA DUCHA ADVANCED MULTI O TOP JET  220V', 2, 0, 52),
(109, '869969', 'RESISTENCIA DUCHA INTIMA/HIGIENICA 127V', 1, 0, 53),
(110, '869926', 'RESISTENCIA DUO SHOWER 127V', 1, 0, 54),
(111, '869927', 'RESISTENCIA DUO SHOWER 220V', 2, 0, 54),
(112, '869932', 'RESISTENCIA FUTURA 220V', 2, 0, 55),
(113, '869990', 'RESISTENCIA MAXI DUCHA 4T/FASHION 127V', 1, 0, 56),
(114, '869931', 'RESISTENCIA MAXI DUCHA 4T/FASHION 220V', 2, 0, 56),
(115, '870519', 'RESISTENCIA TOP JET ELECTRONICA 127V', 1, 0, 57),
(116, '869899', 'RESISTENCIA ULTRA / BELLO BANHO/ MAXI DUCHA / RELAX 127 V', 1, 0, 58),
(117, '870650', 'RESISTENCIA ULTRA DUCHA DUO SHOWER (PROTOTIPO)', 0, 0, 59);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productosistema`
--
ALTER TABLE `productosistema`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_productosistemaColor` (`color_id`),
  ADD KEY `fk_productosistemaProducto` (`producto_id`),
  ADD KEY `fk_productosistemaVoltaje` (`voltaje_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productosistema`
--
ALTER TABLE `productosistema`
  MODIFY `idProducto` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productosistema`
--
ALTER TABLE `productosistema`
  ADD CONSTRAINT `fk_productosistemaColor` FOREIGN KEY (`color_id`) REFERENCES `color` (`idColor`),
  ADD CONSTRAINT `fk_productosistemaProducto` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `fk_productosistemaVoltaje` FOREIGN KEY (`voltaje_id`) REFERENCES `voltaje` (`idVoltaje`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
