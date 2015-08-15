-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2015 a las 19:23:27
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdcta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `Username`, `Password`) VALUES
(3, 'admin', 'karlos123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `ano` varchar(30) NOT NULL,
  `matricula` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `fechaEntrada` varchar(30) NOT NULL,
  `hora` varchar(30) NOT NULL,
  `fechaSalida` varchar(30) NOT NULL,
  `horaSalida` varchar(30) NOT NULL,
  `datoExtra` varchar(80) NOT NULL,
  `mecanico` varchar(30) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `apellido`, `telefono`, `email`, `marca`, `modelo`, `ano`, `matricula`, `color`, `fechaEntrada`, `hora`, `fechaSalida`, `horaSalida`, `datoExtra`, `mecanico`, `status`) VALUES
(1, 'DIEGO', 'MARTINEZ', '9831077093', 'DIEGO@hotmail.com', 'CHEVROLET', 'SPARK-TURBO', '2011', '77-99-MY', 'VERDE', '2015-08-04', '01:00', '2015-08-14', '02:00', 'SERVICIO MAYOR', 'JUAN PEREZ GOMEZ', 'cambio de aceite'),
(2, 'omsr', 'Sndrade', '9862462', 'omardrif55@hotmail.com', 'CHEVROLET', 'SPARK', '2011', '77-99-MY', 'naraja', '2015-08-21', '02:58', '2015-08-31', '20:01', 'SERVICIO MAYOR', 'Jusn carlos', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
