-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2015 a las 02:41:10
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdrim`
--
CREATE DATABASE IF NOT EXISTS `bdrim` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bdrim`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `idAsistencia` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `fechaFalta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`idAsistencia`, `idAlumno`, `fechaFalta`) VALUES
(5, 1, '2015-08-12 09:41:42'),
(6, 2, '2015-08-12 09:41:42'),
(7, 3, '2015-08-12 09:41:42'),
(8, 2, '2015-08-12 09:41:53'),
(9, 3, '2015-08-12 09:41:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegiatura`
--

CREATE TABLE IF NOT EXISTS `colegiatura` (
  `idcolegiatura` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `fechaPago` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegiatura`
--

INSERT INTO `colegiatura` (`idcolegiatura`, `idAlumno`, `fechaPago`) VALUES
(1, 1, '2015-08-12 18:19:07'),
(2, 2, '2015-08-12 18:19:07'),
(3, 3, '2015-08-12 18:21:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE IF NOT EXISTS `examen` (
  `idExamen` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `edad` varchar(50) DEFAULT NULL,
  `profesor` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `grado` varchar(50) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`idExamen`, `nombre`, `apellido`, `edad`, `profesor`, `telefono`, `grado`, `division`) VALUES
(1, ' Eliel', 'Castillo', '12', 'Giovani Puc', '989275623', 'Verde', 'Infantil'),
(2, 'Esmeralda', 'Puc', '19', 'Giovani Puc', '9831648888', 'Amarilla', 'Juvenil'),
(3, 'Geovanny de jesus', 'Alvarado Dzul', '19', 'Giovani Puc', '9831054193', 'Negra', 'Adultos'),
(4, 'sofia', 'vazquez', '15', 'Giovani Puc', '9831415167', 'Negra', 'juvenil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_alumnos`
--

CREATE TABLE IF NOT EXISTS `registro_alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `edad` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `domicilio` varchar(50) DEFAULT NULL,
  `practica` varchar(50) DEFAULT NULL,
  `grado` varchar(50) DEFAULT NULL,
  `lesion` varchar(50) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_alumnos`
--

INSERT INTO `registro_alumnos` (`id`, `nombre`, `apellido`, `edad`, `fecha_nacimiento`, `email`, `telefono`, `domicilio`, `practica`, `grado`, `lesion`, `imagen`) VALUES
(1, 'Geovanny de Jesus', 'Alvarado Dzul', '19', '22 Julio, 1996', 'geovanny51213@gmail.com', '9831054193', 'Calle Graciano Sanchez Mza 399 Lote 12', 'si', 'Negra', 'Rodillas', 'fotos/4.jpg'),
(2, 'Esmeralda Guadalupe', 'Puc Pool', '18', '13 Octubre, 1996', 'esmeralda51213@gmail.com', '9831648888', 'Calle Cedro entre Centenario y Calzada', 'si', 'Naranja', 'Ninguna', 'fotos/6.jpg'),
(3, 'Gabriel', 'Rosales Aparicio', '19', '14 Agosto, 1996', 'gabo@hotmail.com', '9831264546', 'Calle Uva entre Pera y Manzana', 'no', 'Blanca', 'Ninguna', 'fotos/3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`) VALUES
(23, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idAsistencia`);

--
-- Indices de la tabla `colegiatura`
--
ALTER TABLE `colegiatura`
  ADD PRIMARY KEY (`idcolegiatura`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`idExamen`);

--
-- Indices de la tabla `registro_alumnos`
--
ALTER TABLE `registro_alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idAsistencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `colegiatura`
--
ALTER TABLE `colegiatura`
  MODIFY `idcolegiatura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `idExamen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `registro_alumnos`
--
ALTER TABLE `registro_alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
