-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2015 a las 09:31:49
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vanguardia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactanos`
--

CREATE TABLE IF NOT EXISTS `contactanos` (
`idContacto` int(4) NOT NULL,
  `nombre` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `organizacion_name` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `ciudad` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `asunto` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactanos`
--

INSERT INTO `contactanos` (`idContacto`, `nombre`, `apellido`, `organizacion_name`, `ciudad`, `email`, `asunto`, `mensaje`) VALUES
(1, 'Jimena', 'Rodriguez Salas', 'vanguardia Juvenil Nayarit', 'Nayarit', 'jimena_03@gmail.com', 'Saludos', 'Mandando un cordial Saludo a todos los integrantes de la organizacion.\r\nMe alegra saber que las organzaciones siguen en pie triunfando y sobresaliendo dia a dia\r\n Me despido! Lindo dia :)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio`
--

CREATE TABLE IF NOT EXISTS `directorio` (
`idDirectorio` int(4) NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `puesto` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `directorio`
--

INSERT INTO `directorio` (`idDirectorio`, `nombre`, `apellido`, `puesto`, `email`) VALUES
(1, 'Moises', 'Gonzalez Carrillo', 'Presidente', ''),
(2, 'Yasury', 'Alas Vazquez', 'Secretaria General', ''),
(3, 'Carlos', 'Gonzalez Carrillo', 'Secretaria de Organizacion', ''),
(4, 'Delvina', 'Calcanio Vidal', 'Secreataria de Participacion Femenil', ''),
(5, 'Gabriel', 'Juarez Gomez', 'Secretaria de Fomento a la Salud y el Deporte', ''),
(6, 'William ', 'Figueroa Perez', 'Secretaria de Comunicacion Social', 'shadow-vl@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
`idPublicacion` int(4) NOT NULL,
  `fecha` varchar(15) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `noticia` varchar(300) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE IF NOT EXISTS `suscripcion` (
`suscripcion_id` int(4) NOT NULL,
  `nombre` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `edad` varchar(4) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `municipio` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(32) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `genero` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_nac` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suscripcion`
--

INSERT INTO `suscripcion` (`suscripcion_id`, `nombre`, `apellido`, `edad`, `municipio`, `email`, `telefono`, `genero`, `fecha_nac`) VALUES
(1, 'Madai', 'Frias', '18', 'Cozumel', 'aleewmkf@gmail.com', '9871003935', 'femenino', '1995-03-20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactanos`
--
ALTER TABLE `contactanos`
 ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `directorio`
--
ALTER TABLE `directorio`
 ADD PRIMARY KEY (`idDirectorio`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`idPublicacion`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
 ADD PRIMARY KEY (`suscripcion_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactanos`
--
ALTER TABLE `contactanos`
MODIFY `idContacto` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `directorio`
--
ALTER TABLE `directorio`
MODIFY `idDirectorio` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
MODIFY `idPublicacion` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
MODIFY `suscripcion_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
