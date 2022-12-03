-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-12-2022 a las 06:18:17
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventoscalendar`
--

DROP TABLE IF EXISTS `eventoscalendar`;
CREATE TABLE IF NOT EXISTS `eventoscalendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(30) NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `hora` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventoscalendar`
--

INSERT INTO `eventoscalendar` (`id`, `usr`, `evento`, `color_evento`, `fecha_inicio`, `fecha_fin`, `hora`) VALUES
(26, 'Admin', 'Promocion Gatoclaus', '#FFC107', '2022-12-26', '2022-12-27', ''),
(20, '', 'Cumple Arcoal', '#FF5722', '2022-12-05', '2022-12-06', ''),
(21, '', 'Cumple Michelle', '#009688', '2022-12-12', '2022-12-13', ''),
(25, 'Admin', 'Evento Navidad', '#9c27b0', '2022-12-21', '2022-12-29', ''),
(24, '', 'Cumple Jacque', '#2196F3', '2022-12-26', '2022-12-27', ''),
(28, 'Michelle', 'Visita Turistica Michelle', '#009688', '2022-12-16', '2022-12-17', '01/12/22 01:14:37'),
(29, 'Alex', 'Cumple Alex', '#2196F3', '2022-12-28', '2022-12-29', ''),
(30, 'Alex', 'Cumple Alex', '#2196F3', '2022-12-30', '2022-12-31', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision`
--

DROP TABLE IF EXISTS `revision`;
CREATE TABLE IF NOT EXISTS `revision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` char(1) NOT NULL,
  `usr` varchar(30) NOT NULL,
  `evento` varchar(250) DEFAULT NULL,
  `color_evento` varchar(20) DEFAULT NULL,
  `fecha_inicio` varchar(20) DEFAULT NULL,
  `fecha_fin` varchar(20) DEFAULT NULL,
  `hora` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(45) NOT NULL,
  `pass_key` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre_usuario`, `pass_key`, `correo`) VALUES
(14, 'Alex', '1234', 'agalvan22@hotmail.com'),
(15, 'Admin', 'admin123', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
