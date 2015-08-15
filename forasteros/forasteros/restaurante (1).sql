-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2015 a las 23:04:00
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alta_login`
--

CREATE TABLE IF NOT EXISTS `alta_login` (
  `idalta_login` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alta_login`
--

INSERT INTO `alta_login` (`idalta_login`, `nombre`, `apellido`, `usuario`, `password`) VALUES
(1, 'Antony', 'Serralta', 'antojass', '123456'),
(4, 'Gorge', 'Pcj', 'gegege', '123'),
(5, 'yisus', 'crist', 'usuario', 'toño'),
(6, 'adrian', 'se la come', 'me la como', 'melacomi'),
(7, 'Antony', 'ajajssj', 'ajsj', '123456'),
(8, 'gabo', 'desaparicio', ' ana', 'ana1'),
(9, 'Antony', 'asjsjas', 'yisuscrist', '123456'),
(10, 'Maria', 'jose', 'majo', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_reservacion`
--

CREATE TABLE IF NOT EXISTS `datos_reservacion` (
  `iddatos_reservacion` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `no_personas` varchar(11) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `hora` varchar(45) NOT NULL,
  `minuto` int(45) NOT NULL,
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_reservacion`
--

INSERT INTO `datos_reservacion` (`iddatos_reservacion`, `nombre`, `telefono`, `email`, `no_personas`, `fecha`, `hora`, `minuto`, `comentario`) VALUES
(1, 'Antony Serralta', '2147483647', 'antonyserralta@gmail.com', '3', '3 Agosto, 2015', '8', 15, 'HOLA JESUS'),
(2, 'JESUS DE VERACRUZ', '984848848', 'antonyserralta@gmail.com', '4', '4 Agosto, 2015', '7', 0, 'HOLA SOY ANTONY'),
(3, 'gabo', '2147483647', 'antonyserralta@gmail.com', '4', '12 Agosto, 2015', '9', 30, 'Hola yisus'),
(4, 'Antony', '2147483647', 'antonyserralta@gmail.com', '45', '17 Agosto, 2015', '7', 30, 'gabo se la come'),
(5, 'ajaja', '786877766', 'asddasd@hash.com', '3', '18 Agosto, 2015', '0', 0, ''),
(6, 'Antony', '2147483647', 'antonyserralta@gmail.com', '4', '12 Agosto, 2015', '9', 0, 'Mañana es mi cumpleaños'),
(7, 'Antony Chacón', '2147483647', 'antonyserralta@gmail.com', '3', '28 Agosto, 2015', '8', 0, 'toño toño'),
(8, 'Antóny', '2147483647', 'antonyserralta@gmail.com', '3', '10 Agosto, 2015', '7', 0, 'mañana es mi cumpleaños'),
(9, 'diana', '987654', 'pontack@homaicl.com', '5', '12 Agosto, 2015', '7', 0, 'mááááá.'),
(10, 'toño', '9838356602', 'antonyserralta@gmail.com', '2', '28 Agosto, 2015', '8', 0, 'ÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑÑ'),
(11, 'toño', '983832823', 'antonyserralta@gmail.com', '3', '20 Agosto, 2015', '7', 0, 'ñññññññtoñotñoñtoñotñtotñtotñotñ'),
(12, 'jhahjsahj', '878686', 'antonyserralta@gmail.com', '5', '4 Agosto, 2015', '8', 0, 'kjajasjkasjkañññññá'),
(13, 'Antony', '888888888', 'antonyserralta@gmail.com', '4', '5 Agosto, 2015', '9', 0, 'te amo jassivi'),
(14, 'jassivi gongora', '9838324909', 'antonyselachupa@gmail.com', '3', '4 Agosto, 2015', '10', 0, 'teamodio'),
(15, 'Antony', '71727277272', 'asddasd@hash.com', '3', '6 Agosto, 2015', '9', 0, 'ajsja'),
(16, 'jasjksa', '932399339', 'asddasd@hash.com', '3', '4 Agosto, 2015', '7', 0, ''),
(17, 'ajajaja', '2983298329', 'asddasd@hash.com', '3', '12 Agosto, 2015', '7', 0, 'saljsksaksa'),
(18, 'Antony', '9838389389', 'antonyserralta@gmail.com', '3', '18 Agosto, 2015', '8', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alta_login`
--
ALTER TABLE `alta_login`
  ADD PRIMARY KEY (`idalta_login`);

--
-- Indices de la tabla `datos_reservacion`
--
ALTER TABLE `datos_reservacion`
  ADD PRIMARY KEY (`iddatos_reservacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alta_login`
--
ALTER TABLE `alta_login`
  MODIFY `idalta_login` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `datos_reservacion`
--
ALTER TABLE `datos_reservacion`
  MODIFY `iddatos_reservacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
