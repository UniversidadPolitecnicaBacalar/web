-- phpMyAdmin SQL Dump
-- version 4.3.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-08-2015 a las 02:18:28
-- Versión del servidor: 5.5.42
-- Versión de PHP: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventario`
--
CREATE DATABASE IF NOT EXISTS `inventario` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `inventario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Id_cliente` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `noExt` int(11) DEFAULT NULL,
  `ccp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cortes`
--

CREATE TABLE IF NOT EXISTS `cortes` (
  `Id_corte` int(11) NOT NULL,
  `ruta` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `datos` blob,
  `fechaCorte` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `costoElaboracion` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `totalVendido` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ganancia` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `nameUsername` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `datosHtml` blob
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cortes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresoProducto`
--

CREATE TABLE IF NOT EXISTS `ingresoProducto` (
  `Id_ingresoProducto` int(11) NOT NULL,
  `productoAnterior` int(11) DEFAULT NULL,
  `productoIngresado` int(11) DEFAULT NULL,
  `productoNuevo` int(11) DEFAULT NULL,
  `fechaIngreso` varchar(20) DEFAULT NULL,
  `Id_producto` int(11) DEFAULT NULL,
  `nameUsername` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresoProducto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `Id_producto` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `tipo` enum('Alimento','Bebida','Golosina') DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `elaboracion` enum('Interno','Externo') DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `Id_provedor` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE IF NOT EXISTS `provedores` (
  `Id_provedor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `rfc` varchar(13) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `noExt` int(11) DEFAULT NULL,
  `ccp` int(11) DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provedores`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendidos`
--

CREATE TABLE IF NOT EXISTS `vendidos` (
  `Id_vendidos` int(11) NOT NULL,
  `totalVendidos` float DEFAULT NULL,
  `cantidadVendidos` int(11) DEFAULT NULL,
  `Id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vendidos`
--

INSERT INTO `vendidos` (`Id_vendidos`, `totalVendidos`, `cantidadVendidos`, `Id_producto`) VALUES

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_cliente`);

--
-- Indices de la tabla `cortes`
--
ALTER TABLE `cortes`
  ADD PRIMARY KEY (`Id_corte`);

--
-- Indices de la tabla `ingresoProducto`
--
ALTER TABLE `ingresoProducto`
  ADD PRIMARY KEY (`Id_ingresoProducto`), ADD KEY `fk_ingresoProducto_productos1_idx` (`Id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_producto`), ADD KEY `fk_productos_provedores_idx` (`Id_provedor`);

--
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`Id_provedor`);

--
-- Indices de la tabla `vendidos`
--
ALTER TABLE `vendidos`
  ADD PRIMARY KEY (`Id_vendidos`), ADD KEY `fk_vendidos_productos1_idx` (`Id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cortes`
--
ALTER TABLE `cortes`
  MODIFY `Id_corte` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `ingresoProducto`
--
ALTER TABLE `ingresoProducto`
  MODIFY `Id_ingresoProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `provedores`
--
ALTER TABLE `provedores`
  MODIFY `Id_provedor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vendidos`
--
ALTER TABLE `vendidos`
  MODIFY `Id_vendidos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ingresoProducto`
--
ALTER TABLE `ingresoProducto`
ADD CONSTRAINT `fk_ingresoProducto_productos1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`Id_producto`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `fk_productos_provedores` FOREIGN KEY (`Id_provedor`) REFERENCES `provedores` (`Id_provedor`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `vendidos`
--
ALTER TABLE `vendidos`
ADD CONSTRAINT `fk_vendidos_productos1` FOREIGN KEY (`Id_producto`) REFERENCES `productos` (`Id_producto`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
