-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2015 a las 03:50:12
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `adminbar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL,
  `produc_no` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `cantidad` int(23) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `produc_no`, `nombre`, `tipo`, `cantidad`) VALUES
(1, '4590', 'sol', 'cerveza', 13),
(2, '4591', 'superior', 'cerveza', 10),
(3, '4593', 'laguer', 'cerveza', 5),
(4, '4594', 'closted', 'cerveza', 11),
(5, '4595', 'solera', 'licor', 8),
(6, '4596', 'premium vodka', 'licor', 12),
(7, '4597', 'Anis mico', 'licor', 2),
(8, '4592', 'Buchanans', 'licor', 7),
(9, '4598', 'michelada', 'preparado', 40);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(30) NOT NULL,
  `tipos` varchar(30) NOT NULL,
  `tip_no` int(30) NOT NULL,
  `precio` int(30) NOT NULL,
  `precio_especial` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `tipos`, `tip_no`, `precio`, `precio_especial`) VALUES
(1002, 'maxi', 10102, 35, 28),
(1003, 'media', 10103, 20, 15),
(1004, 'bellitas', 10104, 12, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE IF NOT EXISTS `trabajadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_paterno` varchar(30) NOT NULL,
  `apellido_materno` varchar(40) NOT NULL,
  `fecha_naci` varchar(30) NOT NULL,
  `curp` varchar(40) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `sueldo` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `fecha_naci`, `curp`, `puesto`, `sueldo`) VALUES
(1, 'maria', 'mendez', 'gonzales', '1987-06-26', 'MMG870626MNSTYAP07', 'mesera', '100'),
(2, 'yara', 'castillo', 'perez', '1980-08-17', 'YCP800817HTMLKP09', 'mesera', '100');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `usuario_no` int(30) NOT NULL,
  `usuarios` varchar(30) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario_no`, `usuarios`, `contrasena`, `tipo`, `correo`) VALUES
(1, 2019, 'Administrador', 'robin', 'admin', 'rob_chivas@hotmail.com'),
(2, 2020, 'barrero', 'minsil123', 'trabajador', 'rob17chivas@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
