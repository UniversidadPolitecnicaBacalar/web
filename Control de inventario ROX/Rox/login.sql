-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-08-2015 a las 23:16:16
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `login`
--
CREATE DATABASE IF NOT EXISTS `login` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `login`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `Id_area` int(11) NOT NULL,
  `nombre_area` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`Id_area`, `nombre_area`) VALUES
(1, 'Administrativo'),
(2, 'Operacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `Id_empleado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `noExt` int(11) DEFAULT NULL,
  `ccp` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Id_empleado`, `nombre`, `numero`, `correo`, `estado`, `direccion`, `colonia`, `noExt`, `ccp`) VALUES
(2, 'Joel Nahim', '124', 'sadboigbas@gmail.com', 'Chihuahua', 'bdviabsi', 'oiengion', 903239, 3092390);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salt`
--

CREATE TABLE IF NOT EXISTS `salt` (
  `Id_salt` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `saltAltaUsuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salt`
--

INSERT INTO `salt` (`Id_salt`, `Id_usuario`, `saltAltaUsuario`) VALUES
(1, 2, '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_usuario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rutaImagen` varchar(50) NOT NULL,
  `Id_area` int(11) NOT NULL,
  `Id_empleado` int(11) NOT NULL,
  `fechaAlta` varchar(45) NOT NULL,
  `estatus` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_usuario`, `username`, `password`, `rutaImagen`, `Id_area`, `Id_empleado`, `fechaAlta`, `estatus`) VALUES
(2, 'Uvipower', '21232f297a57a5a743894a0e4a801fc3', '../images/users/Uvipower', 1, 2, '20150806 18:08:07', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`Id_area`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id_empleado`), ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `salt`
--
ALTER TABLE `salt`
  ADD PRIMARY KEY (`Id_salt`), ADD KEY `fk_salt_usuarios1_idx` (`Id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `Id_area` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `Id_empleado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `salt`
--
ALTER TABLE `salt`
  MODIFY `Id_salt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
