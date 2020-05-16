-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 16-05-2020 a las 21:01:56
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mtywebcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `editado` datetime NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `editado`, `nivel`) VALUES
(2, 'admin', 'Pablo', '$2y$12$iOLCxIb.lFLD.sO2.q.tXeUz/JhSup0bbZMEGyjr2XSPc4h52X6fW', '2020-05-03 15:53:18', 1),
(3, 'admin2', 'Pablo', '$2y$12$pV6THCUCaC.GTFFZ07WD4.fWVugE7K1wJvvti8670HDbXQmmmGN.2', '2020-05-03 16:13:09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

DROP TABLE IF EXISTS `categoria_evento`;
CREATE TABLE IF NOT EXISTS `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `editado` datetime NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminario', 'fa-university', '0000-00-00 00:00:00'),
(2, 'Conferencias', 'fa-comment', '0000-00-00 00:00:00'),
(3, 'Talleres', 'fa-code', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_evento` tinyint(10) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `editado` datetime NOT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `id_cat_evento` (`id_cat_evento`),
  KEY `id_inv` (`id_inv`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv`, `clave`, `editado`) VALUES
(1, 'Responsive Web Design', '2020-12-11', '10:00:00', 3, 1, 'taller_01', '0000-00-00 00:00:00'),
(2, 'Flexbox', '2020-12-11', '12:00:00', 3, 2, 'taller_02', '0000-00-00 00:00:00'),
(3, 'HTML5 y CSS3', '2020-12-11', '14:00:00', 3, 3, 'taller_03', '0000-00-00 00:00:00'),
(4, 'Drupal', '2020-12-11', '17:00:00', 3, 4, 'taller_04', '0000-00-00 00:00:00'),
(5, 'WordPress', '2020-12-11', '19:00:00', 3, 5, 'taller_05', '0000-00-00 00:00:00'),
(6, 'Como ser freelancer', '2020-12-11', '10:00:00', 2, 6, 'conf_01', '0000-00-00 00:00:00'),
(7, 'Tecnologías del Futuro', '2020-12-11', '17:00:00', 2, 1, 'conf_02', '0000-00-00 00:00:00'),
(8, 'Seguridad en la Web', '2020-12-11', '19:00:00', 2, 2, 'conf_03', '0000-00-00 00:00:00'),
(9, 'Diseño UI y UX para móviles', '2020-12-11', '10:00:00', 1, 6, 'sem_01', '0000-00-00 00:00:00'),
(10, 'AngularJS', '2020-12-12', '10:00:00', 3, 1, 'taller_06', '2020-05-03 15:53:52'),
(11, 'PHP y MySQL', '2020-12-12', '12:00:00', 3, 2, 'taller_07', '0000-00-00 00:00:00'),
(12, 'JavaScript Avanzado', '2020-12-12', '14:00:00', 3, 3, 'taller_08', '0000-00-00 00:00:00'),
(13, 'SEO en Google', '2020-12-12', '17:00:00', 3, 4, 'taller_09', '0000-00-00 00:00:00'),
(14, 'De Photoshop a HTML5 y CSS3', '2020-12-12', '19:00:00', 3, 5, 'taller_10', '0000-00-00 00:00:00'),
(15, 'PHP Intermedio y Avanzado', '2020-12-12', '21:00:00', 3, 6, 'taller_11', '0000-00-00 00:00:00'),
(16, 'Como crear una tienda online que venda millones en pocos día', '2020-12-12', '10:00:00', 2, 6, 'conf_04', '0000-00-00 00:00:00'),
(17, 'Los mejores lugares para encontrar trabajo', '2020-12-12', '17:00:00', 2, 1, 'conf_05', '0000-00-00 00:00:00'),
(18, 'Pasos para crear un negocio rentable ', '2020-12-12', '19:00:00', 2, 2, 'conf_06', '0000-00-00 00:00:00'),
(19, 'Aprende a Programar en una mañana', '2020-12-12', '10:00:00', 1, 3, 'sem_02', '0000-00-00 00:00:00'),
(20, 'Diseño UI y UX para móviles', '2020-12-12', '17:00:00', 1, 5, 'sem_03', '0000-00-00 00:00:00'),
(21, 'Laravel', '2020-12-13', '10:00:00', 3, 1, 'taller_12', '0000-00-00 00:00:00'),
(22, 'Crea tu propia API', '2020-12-13', '12:00:00', 3, 2, 'taller_13', '0000-00-00 00:00:00'),
(23, 'JavaScript y jQuery', '2020-12-13', '14:00:00', 3, 3, 'taller_14', '0000-00-00 00:00:00'),
(24, 'Creando Plantillas para WordPress', '2020-12-13', '17:00:00', 3, 4, 'taller_15', '0000-00-00 00:00:00'),
(25, 'Tiendas Virtuales en Magento', '2020-12-13', '19:00:00', 3, 5, 'taller_16', '0000-00-00 00:00:00'),
(26, 'Como hacer Marketing en línea', '2020-12-13', '10:00:00', 2, 6, 'conf_07', '0000-00-00 00:00:00'),
(27, '¿Con que lenguaje debo empezar?', '2020-12-13', '17:00:00', 2, 2, 'conf_08', '0000-00-00 00:00:00'),
(28, 'Frameworks y librerias Open Source', '2020-12-13', '19:00:00', 2, 3, 'conf_09', '0000-00-00 00:00:00'),
(29, 'Creando una App en Android en una mañana', '2020-12-13', '10:00:00', 1, 4, 'sem_04', '0000-00-00 00:00:00'),
(30, 'Creando una App en iOS en una tarde', '2020-12-13', '17:00:00', 1, 1, 'sem_05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

DROP TABLE IF EXISTS `invitados`;
CREATE TABLE IF NOT EXISTS `invitados` (
  `id_invitado` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL,
  `editado` datetime NOT NULL,
  PRIMARY KEY (`id_invitado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id_invitado`, `nombre_invitado`, `apellido_invitado`, `descripcion`, `url_imagen`, `editado`) VALUES
(1, 'Rafael ', 'Bautista', 'In rhoncus est a augue porta iaculis finibus ut dolor. In sit amet leo quis metus ullamcorper imperdiet a vel arcu. Sed cursus blandit varius. Suspendisse placerat sit amet magna sed fermentum.', 'invitado1.jpg', '0000-00-00 00:00:00'),
(2, 'Shari', 'Herrera', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut tincidunt viverra mi id congue. Praesent tempor ac neque id sodales.', 'invitado2.jpg', '0000-00-00 00:00:00'),
(3, 'Gregorio', 'Sanchez', 'Donec varius euismod auctor. Nam fringilla malesuada lectus, ut scelerisque risus laoreet at. Maecenas eu metus id tellus hendrerit efficitur.', 'invitado3.jpg', '0000-00-00 00:00:00'),
(4, 'Susana', 'Rivera', 'Suspendisse nec turpis risus. Fusce lacus odio, imperdiet vitae tellus et, vulputate tempor dolor. Pellentesque sed ante hendrerit, finibus nisi non, facilisis elit. Proin id laoreet dui, in venenatis leo.', 'invitado4.jpg', '0000-00-00 00:00:00'),
(5, 'Harold', 'Garcia', 'Donec et semper enim. Vestibulum augue augue, molestie a sodales ut, blandit eu risus. Duis tincidunt mauris eu nibh vehicula, nec venenatis augue interdum.', 'invitado5.jpg', '0000-00-00 00:00:00'),
(6, 'Susan', 'Sanchez', 'Praesent sit amet mollis quam, id ultrices nisl. Duis porta hendrerit tempor. Aenean in mi pellentesque, mattis turpis id, fringilla libero.', 'invitado6.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

DROP TABLE IF EXISTS `regalos`;
CREATE TABLE IF NOT EXISTS `regalos` (
  `id_regalo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_regalo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_regalo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id_regalo`, `nombre_regalo`) VALUES
(1, 'Pulsera'),
(2, 'Etiquetas'),
(3, 'Plumas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

DROP TABLE IF EXISTS `registrados`;
CREATE TABLE IF NOT EXISTS `registrados` (
  `ID_registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID_registrado`),
  KEY `regalo` (`regalo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`id_invitado`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`id_regalo`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
