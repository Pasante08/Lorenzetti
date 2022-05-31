-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2022 a las 22:21:55
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
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(12) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` mediumtext DEFAULT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `imgxcien` varchar(100) NOT NULL,
  `categoria_id` int(12) DEFAULT NULL,
  `estado` varchar(45) NOT NULL,
  `voltaje` varchar(10) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nombre`, `descripcion`, `precio`, `imagen`, `ubicacion`, `imgxcien`, `categoria_id`, `estado`, `voltaje`, `color`) VALUES
(1, 'ACQUA STAR ULTRA BLK/CHROME', '', 422989.07, '870532.jpg', 'assets/images/products/870532.jpg', 'assets/images/products/zoom/870532.jpg', 1, 'NO', 'true', 'true'),
(2, 'BRAZO PARA DUCHA', '', 20989.22, '869995.jpg', 'assets/images/products/869995.jpg', 'assets/images/products/zoom/869995.jpg', 3, 'NO', '', 'true'),
(3, 'BRAZO PARA DUCHA CROMADA', '', 64989.47, '869996.jpg', 'assets/images/products/869996.jpg', 'assets/images/products/zoom/869996.jpg', 3, 'NO', '', 'true'),
(4, 'COMBO DUCHA MAXI', '', 85989.4, '869970.jpg', 'assets/images/products/869970.jpg', 'assets/images/products/zoom/869970.jpg', 1, 'NO', 'true', 'true'),
(5, 'COMBO LORENBELLO+BRAZO ', '', 53242.98, '869842.jpg', 'assets/images/products/869842.jpg', 'assets/images/products/zoom/869842.jpg', 1, 'NO', 'true', ''),
(6, 'COMBO MAXI DUCHA', '', 91989.38, '869912.jpg', 'assets/images/products/869912.jpg', 'assets/images/products/zoom/869912.jpg', 1, 'NO', 'true', 'true'),
(7, 'COMBO MAXI DUCHA 4T', '', 91989.38, '869916.jpg', 'assets/images/products/869916.jpg', 'assets/images/products/zoom/869916.jpg', 1, 'NO', 'true', 'true'),
(8, 'CUERPO ADVANCE', '', 89202.4, '869837.jpg', 'assets/images/products/869837.jpg', 'assets/images/products/zoom/869837.jpg', 3, 'NO', '', ''),
(9, 'CUERPO P/DUCHA TOP JET', '', 47442.92, '869840.jpg', 'assets/images/products/869840.jpg', 'assets/images/products/zoom/869840.jpg', 3, 'NO', '', ''),
(10, 'DUCHA ACQUA DUO CROMADA ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra presenta acabados modernos e innovadores con líneas cuadradas, diseño compacto, ultrafino, “ similar al diseño de duchas frías”. <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Storm Ultra ofrece un baño diferenciado e inolvidable. ', 579989.34, '870634.jpg', 'assets/images/products/870634.jpg', 'assets/images/products/zoom/870634.jpg', 1, 'NO', 'true', 'true'),
(11, 'DUCHA ACQUA JET ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra se caracteriza por sus acabados modernos e innovadores, compactos y de diseño ultra fino . <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Wave Ultra ofrece un baño diferenciado e inolvidable. ', 339988.95, '870544.jpg', 'assets/images/products/870544.jpg', 'assets/images/products/zoom/870544.jpg', 1, 'NO', 'true', 'true'),
(12, 'DUCHA ACQUA JET CROMADA ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra se caracteriza por sus acabados modernos e innovadores, compactos y de diseño ultra fino . <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Wave Ultra ofrece un baño diferenciado e inolvidable. ', 422989.07, '870546.jpg', 'assets/images/products/870546.jpg', 'assets/images/products/zoom/870546.jpg', 1, 'NO', 'true', 'true'),
(13, 'DUCHA ACQUA STAR ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra se caracteriza por sus acabados modernos e innovadores, compactos y de diseño ultra fino . <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Wave Ultra ofrece un baño diferenciado e inolvidable. ', 339988.95, '870529.jpg', 'assets/images/products/870529.jpg', 'assets/images/products/zoom/870529.jpg', 1, 'NO', 'true', 'true'),
(14, 'DUCHA ACQUA STAR CROMADA ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra se caracteriza por sus acabados modernos e innovadores, compactos y de diseño ultra fino . <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Wave Ultra ofrece un baño diferenciado e inolvidable. ', 422989.07, '870609.jpg', 'assets/images/products/870609.jpg', 'assets/images/products/zoom/870609.jpg', 1, 'NO', 'true', 'true'),
(15, 'DUCHA ACQUA STORM ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra presenta acabados modernos e innovadores con líneas cuadradas, diseño compacto, ultrafino, “ similar al diseño de duchas frías”. <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Storm Ultra ofrece un baño diferenciado e inolvidable. ', 394989.56, '870531.jpg', 'assets/images/products/870531.jpg', 'assets/images/products/zoom/870531.jpg', 1, 'NO', 'true', 'true'),
(16, 'DUCHA ACQUA STORM CROMADA ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra presenta acabados modernos e innovadores con líneas cuadradas, diseño compacto, ultrafino, “ similar al diseño de duchas frías”. <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Storm Ultra ofrece un baño diferenciado e inolvidable. ', 489989.64, '870614.jpg', 'assets/images/products/870614.jpg', 'assets/images/products/zoom/870614.jpg', 1, 'NO', 'true', 'true'),
(17, 'DUCHA ACQUA WAVE ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra se caracteriza por sus acabados modernos e innovadores, compactos y de diseño ultra fino . <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Wave Ultra ofrece un baño diferenciado e inolvidable. ', 394989.56, '870618.jpg', 'assets/images/products/870618.jpg', 'assets/images/products/zoom/870618.jpg', 1, 'NO', 'true', 'true'),
(18, 'DUCHA ACQUA WAVE CROMADA ULTRA', 'Siguiendo las tendencias mundiales en arquitectura y diseño, la línea Acqua Ultra se caracteriza por sus acabados modernos e innovadores, compactos y de diseño ultra fino . <br> La línea Acqua Ultra tiene la exclusiva resistencia Loren Ultra, la primera resistencia plana del mercado. Es un desarrollo con más de cinco años de estudios, lo que garantiza un alto rendimiento y una larga vida útil. <br> La ducha Acqua Wave Ultra ofrece un baño diferenciado e inolvidable. ', 489989.64, '870620.jpg', 'assets/images/products/870620.jpg', 'assets/images/products/zoom/870620.jpg', 1, 'NO', 'true', 'true'),
(19, 'DUCHA ADVANCE TURBO', 'La tecnología de punta de la Ducha Advanced esta en todos los detalles, desde el diseño sin cableado aparente, con brazo incorporado, resistencia tipo refil, que facilita el cambio. Todo para garantizar una fácil instalación.<br> Ideal para residencias con poca presión de agua, tiene una verdadera tecnología de presurización de agua que aumenta el volumen y la presión para que usted tenga un baño más relajante.<br> La ducha es compatible con calentadores solares, ampliando de esta forma su utilización.', 240002.77, '869966.jpg', 'assets/images/products/869966.jpg', 'assets/images/products/zoom/869966.jpg', 1, 'NO', 'true', ''),
(20, 'DUCHA ADVANCE TURBO ELECTRÓNICA', 'La ducha Advanced Turbo Electrónica es ideal para todos los días de año, a través de su control electrónico de temperaturas permite la selección gradual y exacta, Simple como ajustar el volumen de su radio.<br> El control electrónico proporciona mas economía de energía en días mas calientes, para que no se utilice una temperatura o cantidad de agua mayor para bañarse mas confortablemente, pues no hay necesidad de aumentar el volumen de agua para ajustar la temperatura.<br> Ideal para residencias con poca presión de agua, tiene una verdadera tecnología de presurización de agua que aumenta el volumen y la presión para que usted tenga un baño más relajante.', 299989.48, '869920.jpg', 'assets/images/products/869920.jpg', 'assets/images/products/zoom/869920.jpg', 1, 'NO', 'true', ''),
(21, 'DUCHA ADVANCE TURBO MULTITEMPERATURAS', 'La ducha Advanced Turbo Electrónica es ideal para todos los días de año, a través de su control electrónico de temperaturas permite la selección gradual y exacta, Simple como ajustar el volumen de su radio.<br> El control electrónico proporciona mas economía de energía en días mas calientes, para que no se utilice una temperatura o cantidad de agua mayor para bañarse mas confortablemente, pues no hay necesidad de aumentar el volumen de agua para ajustar la temperatura.<br> Ideal para residencias con poca presión de agua, tiene una verdadera tecnología de presurización de agua que aumenta el volumen y la presión para que usted tenga un baño más relajante.', 258989.22, '869999.jpg', 'assets/images/products/869999.jpg', 'assets/images/products/zoom/869999.jpg', 1, 'NO', 'true', ''),
(22, 'DUCHA ADVANCED MULTITEMPERATURAS', 'La tecnología de punta de la Ducha Advanced esta en todos los detalles, desde el diseño sin cableado aparente, con brazo incorporado, resistencia tipo refil, que facilita el cambio. Todo para garantizar una fácil instalación.<br> Ideal para residencias con poca presión de agua, tiene una verdadera tecnología de presurización de agua que aumenta el volumen y la presión para que usted tenga un baño más relajante.<br> La ducha es compatible con calentadores solares, ampliando de esta forma su utilización.', 139899.97, '869950.jpg', 'assets/images/products/869950.jpg', 'assets/images/products/zoom/869950.jpg', 1, 'SI', 'true', ''),
(23, 'DUCHA BLINDADA ELECTRONICA', '', 545989.85, '869918.jpg', 'assets/images/products/869918.jpg', 'assets/images/products/zoom/869918.jpg', 1, 'NO', 'true', ''),
(24, 'DUCHA DUO SHOWER', 'Ducha con dos diferentes chorros de agua en un solo producto.Una opción exclusiva, inteligente y eficaz. <br> Un baño de diseño y tecnología. Mezcla de líneas fluidas con esparcidor ultra-fino y de alta tecnología hacen del Duo Shower un baño único e inolvidable. <br> Ducha con “Gran esparcidor”, que significa agua para todo el cuerpo, o ducha dirigible con chorro concentrado, dirigido y más fuerte, para aquel baño relajante.', 232988.91, '869922.jpg', 'assets/images/products/869922.jpg', 'assets/images/products/zoom/869922.jpg', 1, 'NO', 'true', ''),
(25, 'DUCHA DUO SHOWER QUADRA', 'Ducha con dos diferentes chorros de agua en un solo producto.Una opción exclusiva, inteligente y eficaz. <br> Un baño de diseño y tecnología. Mezcla de líneas fluidas con esparcidor ultra-fino y de alta tecnología hacen del Duo Shower un baño único e inolvidable. <br> Ducha con “Gran esparcidor”, que significa agua para todo el cuerpo, o ducha dirigible con chorro concentrado, dirigido y más fuerte, para aquel baño relajante.', 246989.26, '869936.jpg', 'assets/images/products/869936.jpg', 'assets/images/products/zoom/869936.jpg', 1, 'SI', 'true', ''),
(26, 'DUCHA ELECTRICA FUTURA MASTER MULTITEMPERATURA', '', 303784.39, '869974.jpg', 'assets/images/products/869974.jpg', 'assets/images/products/zoom/869974.jpg', 1, 'NO', 'true', ''),
(27, 'DUCHA FASHION', 'Compacta y elegante, la Ducha Fashion ha sido diseñado con líneas suaves y atractivas, destacando a la perfección el diseño sofisticado de su cuerpo y la tapa.<br> Diseñado para ofrecer comodidad y economía en el momento del baño, moda baño tiene cuatro opciones de temperatura, ideal para todas las estaciones, una gran dispersión, lo que proporciona un mayor flujo de agua caliente y un selector de temperaturas prácticas y deslizamiento .<br> La ducha es compatible con los calentadores de agua solares, ampliando así su uso.', 88042.15, '869986.jpg', 'assets/images/products/869986.jpg', 'assets/images/products/zoom/869986.jpg', 1, 'NO', 'true', 'true'),
(28, 'DUCHA HIGIENICA 3T', '', 217962.78, '869967.jpg', 'assets/images/products/869967.jpg', 'assets/images/products/zoom/869967.jpg', 1, 'NO', 'true', ''),
(29, 'DUCHA JET MULTITEMPERATURAS', '', 181726.09, '869907.jpg', 'assets/images/products/869907.jpg', 'assets/images/products/zoom/869907.jpg', 1, 'NO', 'true', 'true'),
(30, 'DUCHA LORENBELLO BANHO', 'La ducha Loren Bello ahora viene con la nueva resistencia Loren Ultra. La tecnología Loren Ultra revoluciona el concepto de durabilidad y rendimiento en comparación con las resistencias comunes.', 74989.04, '869924.jpg', 'assets/images/products/869924.jpg', 'assets/images/products/zoom/869924.jpg', 1, 'NO', 'true', ''),
(31, 'DUCHA MAXI 4T ULTRA CON TELEDUCHA', 'Con un diseño moderno, la ducha 4T es perfecta para la decoración de su baño, diseñado para proporcionar comodidad y economía en la hora del baño, la ducha 4T tiene un esparcidor de grandes dimensiones y tiene 4 opciones de temperatura, siendo ideal para todas las estaciones. <br> La ducha es compatible con los calentadores de agua solares, ampliando así su uso.', 76989.43, '869988.jpg', 'assets/images/products/869988.jpg', 'assets/images/products/zoom/869988.jpg', 1, 'NO', 'true', ''),
(32, 'DUCHA MAXI 3T ULTRA CON TELEDUCHA', 'Economía en el precio y modernidad del diseño acompañan a la Maxi Ducha. Con esparcidor de grandes dimensiones, la Maxi Ducha proporciona un baño relajante, pues ofrece un flujo de agua uniforme.', 74989.04, '869951.jpg', 'assets/images/products/869951.jpg', 'assets/images/products/zoom/869951.jpg', 1, 'NO', 'true', ''),
(33, 'DUCHA MAXI 3T ULTRA SIN TELEDUCHA', 'Economía en el precio y modernidad del diseño acompañan a la Maxi Ducha. Con esparcidor de grandes dimensiones, la Maxi Ducha proporciona un baño relajante, pues ofrece un flujo de agua uniforme.', 69989.85, '869955.jpg', 'assets/images/products/869955.jpg', 'assets/images/products/zoom/869955.jpg', 1, 'NO', 'true', ''),
(34, 'DUCHA MAXI DUCHA 4T', 'Con un diseño moderno, la ducha 4T es perfecta para la decoración de su baño, diseñado para proporcionar comodidad y economía en la hora del baño, la ducha 4T tiene un esparcidor de grandes dimensiones y tiene 4 opciones de temperatura, siendo ideal para todas las estaciones. <br> La ducha es compatible con los calentadores de agua solares, ampliando así su uso.', 37001.86, '869903.jpg', 'assets/images/products/869903.jpg', 'assets/images/products/zoom/869903.jpg', 1, 'NO', 'true', 'true'),
(35, 'DUCHA MAXI ULTRA SIN MANGUERA', '', 62523.79, '870000.jpg', 'assets/images/products/870000.jpg', 'assets/images/products/zoom/870000.jpg', 1, 'NO', 'true', ''),
(36, 'DUCHA RELAX', 'El diseño destacado de la ducha Relax le da un baño de estilo a su cuarto de baño. La funcionalidad de su chorro multidireccional permite más comodidad.<br> Tres opciones de temperaturas: más relajamiento en su baño durante todo el año.', 100803.71, '870642.jpg', 'assets/images/products/870642.jpg', 'assets/images/products/zoom/870642.jpg', 1, 'NO', 'true', 'true'),
(37, 'DUCHA RELAX CROMADA', 'El diseño destacado de la ducha Relax le da un baño de estilo a su cuarto de baño. La funcionalidad de su chorro multidireccional permite más comodidad.<br> Tres opciones de temperaturas: más relajamiento en su baño durante todo el año.', 135989.63, '869962.jpg', 'assets/images/products/869962.jpg', 'assets/images/products/zoom/869962.jpg', 1, 'NO', 'true', 'true'),
(38, 'DUCHA TOP JET', 'Máximo confort y placer de bañarse con duchas de pared, posee un gran esparcidor y mayor area de baño con un chorro increible. Ideal para todos los dias del año, a traves de su control electrónico de temperaturas permite la selección gradual y preciso, simple como ajustar el volumen de su radio. Accionamiento super practico a traves de botón o exclusiva asta prolongadora de 30 centimetros que facilia el acceso. <br> <br>Comando Electrónico de Temperaturas<br>Selecciona la temperatura de su baño de forma gradual y preciso, simple como ajustar el volumen de su radio. Accionamiento a traves de botón o exclusiva asta prolongadora que facilia el accesso.La <br> Ducha Top Jet es compatible con calentadores solares, aumentando sus funciones de uso.', 121989.28, '870517.jpg', 'assets/images/products/870517.jpg', 'assets/images/products/zoom/870517.jpg', 1, 'NO', 'true', ''),
(39, 'DUCHA TOP JET ELECTRONICA', 'Máximo confort y placer de bañarse con duchas de pared, posee un gran esparcidor y mayor area de baño con un chorro increible. Ideal para todos los dias del año, a traves de su control electrónico de temperaturas permite la selección gradual y preciso, simple como ajustar el volumen de su radio. Accionamiento super practico a traves de botón o exclusiva asta prolongadora de 30 centimetros que facilia el acceso. <br> <br>Comando Electrónico de Temperaturas<br>Selecciona la temperatura de su baño de forma gradual y preciso, simple como ajustar el volumen de su radio. Accionamiento a traves de botón o exclusiva asta prolongadora que facilia el accesso.La <br> Ducha Top Jet es compatible con calentadores solares, aumentando sus funciones de uso.', 162989.54, '870518.jpg', 'assets/images/products/870518.jpg', 'assets/images/products/zoom/870518.jpg', 1, 'NO', 'true', ''),
(40, 'DUCHITA DIVERTIDA DELFIN', 'Lorenzetti desarrolló una línea de animalitos acoplados a la ducha manual con exclusividad que vuelven el momento del baño más alegre y placentero. <br>Fabricados con material no tóxico, su caucho suave permite que el niño no se lastime al jugar.<br>Las Duchitas Divertidas son aprobadas por el INMETRO [Instituto Nacional de Metrología, Normalización y Calidad Industrial], y el Instituto Falcão Bauer (Norma NBR 11786 - seguridad del juguete).', 25047.12, '869975.jpg', 'assets/images/products/869975.jpg', 'assets/images/products/zoom/869975.jpg', 1, 'NO', '', ''),
(41, 'DUCHITA DIVERTIDA HIPOPOTAMO', 'Lorenzetti desarrolló una línea de animalitos acoplados a la ducha manual con exclusividad que vuelven el momento del baño más alegre y placentero. <br>Fabricados con material no tóxico, su caucho suave permite que el niño no se lastime al jugar.<br>Las Duchitas Divertidas son aprobadas por el INMETRO [Instituto Nacional de Metrología, Normalización y Calidad Industrial], y el Instituto Falcão Bauer (Norma NBR 11786 - seguridad del juguete).', 16909.9, '', '', '', 1, 'NO', '', ''),
(42, 'DUCHITA DIVERTIDA PATITO', 'Lorenzetti desarrolló una línea de animalitos acoplados a la ducha manual con exclusividad que vuelven el momento del baño más alegre y placentero. <br>Fabricados con material no tóxico, su caucho suave permite que el niño no se lastime al jugar.<br>Las Duchitas Divertidas son aprobadas por el INMETRO [Instituto Nacional de Metrología, Normalización y Calidad Industrial], y el Instituto Falcão Bauer (Norma NBR 11786 - seguridad del juguete).', 16310.14, '869976.jpg', 'assets/images/products/869976.jpg', 'assets/images/products/zoom/869976.jpg', 1, 'NO', '', ''),
(43, 'DUCHITA DIVERTIDA TORTUGA', 'Lorenzetti desarrolló una línea de animalitos acoplados a la ducha manual con exclusividad que vuelven el momento del baño más alegre y placentero. <br>Fabricados con material no tóxico, su caucho suave permite que el niño no se lastime al jugar.<br>Las Duchitas Divertidas son aprobadas por el INMETRO [Instituto Nacional de Metrología, Normalización y Calidad Industrial], y el Instituto Falcão Bauer (Norma NBR 11786 - seguridad del juguete).', 16548.14, '869972.jpg', 'assets/images/products/869972.jpg', 'assets/images/products/zoom/869972.jpg', 1, 'NO', '', ''),
(44, 'MANGUERA PARA DUCHA ELECTRICA', '', 3361.75, '869956.jpg', 'assets/images/products/869956.jpg', 'assets/images/products/zoom/869956.jpg', 3, 'NO', '', ''),
(45, 'MONOBRAZO LORENZETTI', '', 11989.25, '870515.jpg', 'assets/images/products/870515.jpg', 'assets/images/products/zoom/870515.jpg', 3, 'NO', '', ''),
(46, 'RESISTENCIA TRADICION O JET', '', 19198.27, '870526.jpg', 'assets/images/products/870526.jpg', 'assets/images/products/zoom/870526.jpg', 3, 'NO', 'true', ''),
(47, 'RESISTENCIA 3T ULTRA', '', 18990.02, '870536.jpg', 'assets/images/products/870536.jpg', 'assets/images/products/zoom/870536.jpg', 3, 'NO', 'true', ''),
(48, 'RESISTENCIA ACQUA', '', 54989.9, '870538.jpg', 'assets/images/products/870538.jpg', 'assets/images/products/zoom/870538.jpg', 3, 'NO', 'true', ''),
(49, 'RESISTENCIA BELLO BANHO', '', 16972.97, '869928.jpg', 'assets/images/products/869928.jpg', 'assets/images/products/zoom/869928.jpg', 3, 'NO', 'true', ''),
(50, 'RESISTENCIA CALENTADOR VERSATIL', '', 26358.5, '869968.jpg', 'assets/images/products/869968.jpg', 'assets/images/products/zoom/869968.jpg', 3, 'NO', 'true', ''),
(51, 'RESISTENCIA CONVENCIONAL / BELLO BANHO / MAXI DUCHA / RELAX', '', 18988.83, '869930.jpg', 'assets/images/products/869930.jpg', 'assets/images/products/zoom/869930.jpg', 3, 'NO', 'true', ''),
(52, 'RESISTENCIA DUCHA ADVANCED MULTITEMPERATURA', '', 31989.58, '869952.jpg', 'assets/images/products/869952.jpg', 'assets/images/products/zoom/869952.jpg', 3, 'SI', 'true', ''),
(53, 'RESISTENCIA DUCHA INTIMA/HIGIENICA', '', 23082.43, '869969.jpg', 'assets/images/products/869969.jpg', 'assets/images/products/zoom/869969.jpg', 3, 'NO', 'true', ''),
(54, 'RESISTENCIA DUO SHOWER', '', 29989.19, '869926.jpg', 'assets/images/products/869926.jpg', 'assets/images/products/zoom/869926.jpg', 3, 'NO', 'true', ''),
(55, 'RESISTENCIA FUTURA', '', 23617.93, '869932.jpg', 'assets/images/products/869932.jpg', 'assets/images/products/zoom/869932.jpg', 3, 'NO', 'true', ''),
(56, 'RESISTENCIA MAXI DUCHA 4T/FASHION', '', 25989.6, '869990.jpg', 'assets/images/products/869990.jpg', 'assets/images/products/zoom/869990.jpg', 3, 'NO', 'true', ''),
(57, 'RESISTENCIA TOP JET ELECTRONICA', '', 31986.01, '870519.jpg', 'assets/images/products/870519.jpg', 'assets/images/products/zoom/870519.jpg', 3, 'NO', 'true', ''),
(58, 'RESISTENCIA ULTRA / BELLO BANHO/ MAXI DUCHA / RELAX', '', 18988.83, '869899.jpg', 'assets/images/products/869899.jpg', 'assets/images/products/zoom/869899.jpg', 3, 'NO', 'true', ''),
(59, 'RESISTENCIA ULTRA DUCHA DUO SHOWER (PROTOTIPO)', '', 23082.43, '870650.jpg', 'assets/images/products/870650.jpg', 'assets/images/products/zoom/870650.jpg', 3, 'NO', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fk_categoriaProducto` (`categoria_id`);
ALTER TABLE `producto` ADD FULLTEXT KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_categoriaProducto` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
