-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2015 a las 16:52:50
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdcibersearch`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos_gastos`
--

CREATE TABLE IF NOT EXISTS `ingresos_gastos` (
  `Id` int(11) unsigned NOT NULL,
  `Fecha` varchar(20) NOT NULL,
  `HoraInicio` varchar(20) NOT NULL,
  `HoraFin` varchar(20) NOT NULL,
  `CantidadIngresos` int(10) NOT NULL,
  `GastosDiarios` int(5) NOT NULL,
  `DescripcionGastos` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingresos_gastos`
--

INSERT INTO `ingresos_gastos` (`Id`, `Fecha`, `HoraInicio`, `HoraFin`, `CantidadIngresos`, `GastosDiarios`, `DescripcionGastos`) VALUES
(1, '2015-08-03', '9:00 am', '10:00 pm', 600, 200, ''),
(2, '2015-08-06', '9:00 am', '10:00 pm', 400, 100, ''),
(3, '2015-08-09', '9:00 am', '10:00 pm', 700, 200, ''),
(4, '2015-08-10', '9:00 am', '10:00 pm', 600, 200, ''),
(5, '2015-08-10', '9:00 am', '10:00 pm', 600, 200, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagocliente`
--

CREATE TABLE IF NOT EXISTS `pagocliente` (
  `Id` int(11) NOT NULL,
  `Fecha` varchar(15) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Domicilio` varchar(20) NOT NULL,
  `cantidadPagar` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagocliente`
--

INSERT INTO `pagocliente` (`Id`, `Fecha`, `Nombre`, `Domicilio`, `cantidadPagar`) VALUES
(1, '2015-08-13', 'Eliel castillo', '22 con 19 y 21 ', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocliente`
--

CREATE TABLE IF NOT EXISTS `registrocliente` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `FechaContrato` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrocliente`
--

INSERT INTO `registrocliente` (`Id`, `Nombre`, `Direccion`, `Telefono`, `FechaContrato`) VALUES
(3, 'Eliel Castillo', '32 con 19 y 21', '9831176206', '2015-08-05'),
(4, 'obed castillo', '12 con 11 y 13', '9831570167', '2015-08-06'),
(5, 'Isai Castillo', '32A con 19 y 21', '9831177090', '2015-08-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasenia` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasenia`, `email`) VALUES
(5, 'jeroan', 'e7a58438fa3c342c6fcd5a635c8afd8b', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingresos_gastos`
--
ALTER TABLE `ingresos_gastos`
  ADD PRIMARY KEY (`Id`), ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `pagocliente`
--
ALTER TABLE `pagocliente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `registrocliente`
--
ALTER TABLE `registrocliente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingresos_gastos`
--
ALTER TABLE `ingresos_gastos`
  MODIFY `Id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pagocliente`
--
ALTER TABLE `pagocliente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `registrocliente`
--
ALTER TABLE `registrocliente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
