-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 06-08-2015 a las 23:19:00
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdwinrest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
`num_bebidas` int(11) NOT NULL,
  `nombre_bebidas` varchar(45) NOT NULL,
  `descripcion_bebidas` varchar(140) DEFAULT NULL,
  `precio_bebidas` int(11) NOT NULL,
  `estatus_ bebidas` varchar(5) NOT NULL,
  `id_tipoBebida` int(11) NOT NULL,
  `img_bebida` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`num_bebidas`, `nombre_bebidas`, `descripcion_bebidas`, `precio_bebidas`, `estatus_ bebidas`, `id_tipoBebida`, `img_bebida`) VALUES
(1, 'Santa Carolina Premio', 'SEMI-DULCE (ENSEMBLE) CHILE', 180, 'DISP', 3, 'imagenes/bebidas1.jpg'),
(2, 'VIÑA ALBALI VALDEPEÑAS', '(SEMI-DULCE) ESPAÑA', 180, 'DISP', 0, ''),
(3, 'XA DOMECQ BLANCO', '(ENSAMBLE) MÉXICO', 190, 'DISP', 0, ''),
(4, 'L.A. CETTO ROSADO', '(ZINFANDEL) MÉXICO', 190, 'DISP', 0, ''),
(5, 'BLUE NUN (RIVANER) ALEMANIA', NULL, 240, 'DISP', 0, ''),
(6, 'BLUE RHIN (LIEBFRAUMILCH - AFRUTADO) ALEMANIA', NULL, 245, 'DISP', 0, ''),
(7, 'BLUE RHIN (OPPENHEIMER - AFRUtAdO) ALEMANIA', NULL, 245, 'DISP', 0, ''),
(8, 'SANTA CAROLINA PREMIO SEMI-DULCE (ENSEMBLE)', 'CHILE, VINO TINTO', 190, 'DISP', 0, ''),
(9, 'GAETANO D ́AQUINO (MERLOT) VENETO ITALIA', 'VINO TINTO', 190, 'DISP', 0, ''),
(10, 'EL CIRCULO (RIOJA) ESPAÑA', 'VINO TINTO', 190, 'DISP', 0, ''),
(11, 'LOS MOLINOS (TEMPRANILLO) ESPAÑA', 'VINO TINTO', 190, 'DISP', 0, ''),
(12, 'SELECCIÓN (CABERNET - MERLOT) CHILE', 'VINO TINTO', 190, 'DISP', 0, ''),
(13, 'ALTOS DE TAMARON (RIBERA DEL DUERO) ESPAÑA', 'VINO TINTO', 190, 'DISP', 0, ''),
(14, 'SANTA CAROLINA VARIETAL (MERLOT / CARMENERE)', 'VINO TINTO', 195, 'DISP', 0, ''),
(15, 'DEHESAS VIEJAS (RIBERA DEL DUERO) ESPAÑA', 'VINO TINTO', 225, 'DISP', 0, ''),
(16, 'VIU MANENT RESERVA (CARMENERE) CHILE', 'VINO TINTO', 225, 'DISP', 0, ''),
(17, 'LAS MORAS RESERVA (MALBEC) ARGENTINA', 'VINO TINTO', 255, 'DISP', 0, ''),
(18, 'YELLOW TAIL (SHIRAZ) AUSTRALIA', 'VINO TINTO', 245, 'DISP', 0, ''),
(19, 'VISTA CALMA (MALBEC) ARGENTINA', 'VINO TINTO', 305, 'DISP', 0, ''),
(20, 'EL SECRETO VIU MANENT (ENSAMBLE MALBEC) CHILE', 'VINO TINTO', 335, 'DISP', 0, ''),
(21, 'LAS MORAS BLACK LABEL (MALBEC) ARGENTINA', 'VINO TINTO', 395, 'DISP', 0, ''),
(22, 'CASA MADERO (CABERNET SAUVIGNON) MÉXICO', 'VINO TINTO', 395, 'DISP', 0, ''),
(23, 'NORTON RESERVA (MALBEC) ARGENTINA', 'VINO TINTO', 445, 'DISP', 0, ''),
(24, 'TERRAZAS (MALBEC) ARGENTINA', 'VINO TINTO', 495, 'DISP', 0, ''),
(25, 'CATENA (CABERNET SAUVIGNON) ARGENTINA', 'VINO TINTO', 520, 'DISP', 0, ''),
(26, 'MOSCATO (SEMIDULCE) ITALIA', 'BLANCO, ESPUMOSO', 225, 'DISP', 0, ''),
(27, 'CELEBRATION (SEMIDULCE) ESPERONE, ITALIA', 'BLANCO, ESPUMOSO', 225, 'DISP', 0, ''),
(28, 'CELEBRATION ROSE (SEMIDULCE) ESPERONE, ITALIA', 'ROSADO, ESPUMOSO', 225, 'DISP', 0, ''),
(29, 'MOET & CHANDON (NECTAR IMPERIAL)', 'CHAMPAGNE', 1200, 'DISP', 0, ''),
(30, 'AZTECA DE ORO', 'BRANDY', 55, 'DISP', 0, ''),
(31, 'FUNDADOR', 'BRANDY', 55, 'DISP', 0, ''),
(32, 'TERRY', 'BRANDY', 55, 'DISP', 0, ''),
(33, 'TORRES 10', 'BRANDY', 55, 'DISP', 0, ''),
(34, 'BACARDI BLANCO', 'RON', 45, 'DISP', 0, ''),
(35, 'HAVANA BLANCO', 'RON', 45, 'DISP', 0, ''),
(36, 'MALIBÚ', 'RON', 45, 'DISP', 0, ''),
(37, 'SOLERA', 'RON', 50, 'DISP', 0, ''),
(38, 'FLOR DE CAÑA 7 AÑOS', 'RON', 50, 'DISP', 0, ''),
(39, 'HAVANA 7 AÑOS', 'RON', 50, 'DISP', 0, ''),
(40, 'HAVANA AÑEJO ESP.', 'RON', 55, 'DISP', 0, ''),
(41, 'ZACAPA 23 AÑOS', 'RON', 110, 'DISP', 0, ''),
(42, 'CORONA', 'CERVEZA', 32, 'DISP', 0, ''),
(43, 'INDIO', 'CERVEZA', 32, 'DISP', 0, ''),
(44, 'MODELO LIGHT', 'CERVEZA', 32, 'DISP', 0, ''),
(45, 'XX ÁMBAR', 'CERVEZA', 32, 'DISP', 0, ''),
(46, 'TECATE LIGHT', 'CERVEZA', 32, 'DISP', 0, ''),
(47, 'XX LAGER', 'CERVEZA', 32, 'DISP', 0, ''),
(48, 'PACÍFICO', 'CERVEZA', 32, 'DISP', 0, ''),
(49, 'SOL', 'CERVEZA', 32, 'DISP', 0, ''),
(50, 'MODELO ESP.', 'CERVEZA', 35, 'DISP', 0, ''),
(51, 'NEGRA MODELO', 'CERVEZA', 35, 'DISP', 0, ''),
(52, 'HEINEKEN', 'CERVEZA', 43, 'DISP', 0, ''),
(54, 'VASO DE MAREA ROJA', '', 22, 'DISP', 0, ''),
(55, 'VASO CHELADA', '', 10, 'DISP', 0, ''),
(56, 'VASO MICHELADA', NULL, 10, 'DISP', 0, ''),
(57, 'JIMADOR REPOSADO', 'TEQUILA', 45, 'DISP', 0, ''),
(58, 'CORRALEJO', 'TEQUILA', 50, 'DISP', 0, ''),
(59, 'CUERVO TRADICIONAL', 'TEQUILA', 55, 'DISP', 0, ''),
(60, 'HORNITOS', 'TEQUILA', 55, 'DISP', 0, ''),
(61, 'HERRADURA BLANCO', 'TEQUILA', 60, 'DISP', 0, ''),
(62, 'DON JULIO BLANCO', 'TEQUILA', 65, 'DISP', 0, ''),
(63, 'HERRADURA REPOSADO', 'TEQUILA', 65, 'DISP', 0, ''),
(64, 'DON JULIO REPOSADO', 'TEQUILA', 70, 'DISP', 0, ''),
(65, 'HERRADURA ANTIGUO', 'TEQUILA', 70, 'DISP', 0, ''),
(66, 'REVOLUCIÓN REPOSADO', 'TEQUILA', 75, 'DISP', 0, ''),
(67, 'DON JULIO AÑEJO', 'TEQUILA', 76, 'DISP', 0, ''),
(68, 'MARTELL V.S.O.P', 'COGNAC', 120, 'DISP', 0, ''),
(69, 'HENESSY V.S.O.P', 'COGNAC', 140, 'DISP', 0, ''),
(70, 'OSO NEGRO', 'VODKA', 40, 'DISP', 0, ''),
(71, 'SMIRNOFF', 'VODKA', 45, 'DISP', 0, ''),
(72, 'GOTLAND', 'VODKA', 45, 'DISP', 0, ''),
(73, 'SIX TIMES DISTILLED', 'VODKA', 45, 'DISP', 0, ''),
(74, 'ABSOLUT AZUL', 'VODKA', 50, 'DISP', 0, ''),
(75, 'ABSOLUT CITRON', 'VODKA', 50, 'DISP', 0, ''),
(76, 'ABSOLUT MANDRIN', 'VODKA', 50, 'DISP', 0, ''),
(77, 'STOLICHNAYA', 'VODKA', 55, 'DISP', 0, ''),
(78, 'GREY GOOSE', 'VODKA', 75, 'DISP', 0, ''),
(79, 'APPLETON BLANCO', 'RON', 45, 'DISP', 0, ''),
(80, 'APPLETON ESPECIAL', 'RON', 45, 'DISP', 0, ''),
(81, 'APPLETON STATE', 'RON', 45, 'DISP', 0, ''),
(82, 'BACARDI AÑEJO', 'RON', 45, 'DISP', 0, ''),
(83, 'LABEL 5', 'WHISKY', 45, 'DISP', 0, ''),
(84, 'ETIQUETA ROJA', 'WHISKY', 55, 'DISP', 0, ''),
(85, 'JACK DANIELS', 'WHISKY', 60, 'DISP', 0, ''),
(86, 'CHIVAS 12', 'WHISKY', 70, 'DISP', 0, ''),
(87, 'ETIQUETA NEGRA', 'WHISKY', 70, 'DISP', 0, ''),
(88, 'OLD PARR', 'WHISKY', 70, 'DISP', 0, ''),
(89, 'BUCHANAN’S 12', 'WHISKY', 70, 'DISP', 0, ''),
(90, 'BUCHANAN’S MASTER', 'WHISKY', 105, 'DISP', 0, ''),
(91, 'BUCHANAN’S 18', 'WHISKY', 135, 'DISP', 0, ''),
(92, 'ALFONSO XIII', 'Rica combinación de licor de café y leche.', 50, 'DISP', 0, ''),
(93, 'DAIQUIRI LIMÓN', 'Jugo de limón frapeado, ron, jarabe natural y escarchado de sal.', 50, 'DISP', 0, ''),
(94, 'DAIQUIRI FRESA', 'Jugo de limón frapeado con un toque de sabor fresa, ron, jarabe natural y escarchado de sal.', 50, 'DISP', 0, ''),
(95, 'FRESA COLADA', 'Frapeado de fresa con leche, granadina y ron.', 50, 'DISP', 0, ''),
(96, 'FRESADA', 'Frapeado de fresa con leche y granadina.', 50, 'DISP', 0, ''),
(97, 'LIMONADA ELÉCTRICA', 'Jugo de limón, soda y licor de melón.', 50, 'DISP', 0, ''),
(98, 'MARGARITA LIMÓN', 'Jugo de limón frapeado, tequila de la casa con un toque de licor de naranja y escarchado de sal.', 50, 'DISP', 0, ''),
(99, 'MARGARITA FRESAS', 'Jugo de limón frapeado con un toque de sabor fresa, tequila de la casa, licor de naranja y escarchado de sal.', 50, 'DISP', 0, ''),
(100, 'MARTINI', 'Jugo de limón frapeado, tequila de la casa con un toque de licor de naranja y escarchado de sal.', 50, 'DISP', 0, ''),
(101, 'MEDIAS DE SEDA', 'Frapeado de ginebra, granadina y leche.', 50, 'DISP', 0, ''),
(102, 'MIAMI VICE', 'Jugo de limón con un toque de sabor piña y ron.', 50, 'DISP', 0, ''),
(103, 'Sangría San Miguel ', 'Copa grande, Jugo de frutas, vino tinto y frutas.', 65, 'DISP', 3, 'imagenes/sangria.jpg'),
(104, 'Agua Purificada', 'Bonafont', 22, 'DISP', 3, 'imagenes/bebidas3.jpg'),
(105, 'Curvato', 'CERVEZA', 50, 'DISP', 3, 'imagenes/bebida2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
`num_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(20) NOT NULL,
  `apellidoP_cliente` varchar(20) NOT NULL,
  `apellidoM_cliente` varchar(20) DEFAULT NULL,
  `direccion_cliente` varchar(50) NOT NULL,
  `rfc_cliente` varchar(20) DEFAULT NULL,
  `correo_cliente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`num_cliente`, `nombre_cliente`, `apellidoP_cliente`, `apellidoM_cliente`, `direccion_cliente`, `rfc_cliente`, `correo_cliente`) VALUES
(1, 'Antonio', 'Camarena', 'Correa', 'Lote 1', 'ASDFGHJL', 'antonio@correo.com'),
(2, 'Josue', 'Lopez', 'Vargas', 'Bacalar 32', 'ESDFGERA', 'josue@correo.com'),
(3, 'Ana', 'Hernandez', 'Contreras', 'Lote 23', 'ERTEWADFKG', 'ana@corrreo.com'),
(4, 'Felipe', 'Carrillo', 'Chacon', 'Lote 12', 'FERLADORQW', 'felipe@correo.com'),
(5, 'Luisa', 'Albornoz', 'Camara', 'Lote 134', 'ADAFJEKERA', 'luisa@correo.com'),
(6, 'Nidelvia', 'Schultz', 'Villanueva', 'ethel 17', 'EGJEGSOWP', 'nidelvia@correo.com'),
(7, 'Ramon', 'Aguayo', 'Cabañas', 'Fovissste 6ta', 'AFJROWREJQ', 'ramon@correo.com'),
(8, 'Luis', 'Jimenez', 'Alvarez', 'Lote 594', 'AFJAFEWOFQ', 'luis@correo.com'),
(9, 'Adrian', 'Riu', 'Chiu', 'Lote 24', 'AKFROWQMWEFW', 'adrian@correo.com'),
(10, 'Felipa', 'Che', 'Presuel', 'Quinta de San Felipe', 'AFWEJOFREWP', 'felipa@correo.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
`num_emp` int(11) NOT NULL,
  `nombre_emp` varchar(20) NOT NULL,
  `apellidoP_emp` varchar(20) NOT NULL,
  `apellidoM_emp` varchar(20) DEFAULT NULL,
  `tel_emp` int(11) NOT NULL,
  `direccion_emp` varchar(45) NOT NULL,
  `cargo_emp` varchar(45) NOT NULL,
  `estatus_emp` varchar(45) DEFAULT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`num_emp`, `nombre_emp`, `apellidoP_emp`, `apellidoM_emp`, `tel_emp`, `direccion_emp`, `cargo_emp`, `estatus_emp`, `user`, `pass`) VALUES
(1, 'Diana', 'Aguayo', 'Schultz', 9, 'Ethel num. 19', 'admin', 'ACTIVO', 'dianalaura', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'José', 'Lopéz', 'Carvajal', 2147483647, 'Magisterial 124', 'mesero', 'ACTIVO', 'joselopez', 'eb3ae7fb426cdc86ec02b3f63e3e7b09'),
(3, 'Fernanda', 'Gutierrez', 'Fernandez', 2147483647, 'Lote San Angel', 'mesero', 'ACTIVO', 'fernanda', 'eb3ae7fb426cdc86ec02b3f63e3e7b09'),
(4, 'Abelardo', 'Sanchez', 'Manzanero', 2147483647, 'Lote Mateo', 'gerente', 'ACTIVO', 'abelardo', '740d9c49b11f3ada7b9112614a54be41'),
(5, 'Francisco', 'Padilla', 'Villanueva', 2147483647, 'Lote 500', 'cajero', 'ACTIVO', 'francisco', 'f80bb5a954ee71b40f1c31b79734d82d'),
(6, 'Lourdes', 'Jimenez', 'Jimenez', 9887654, 'Lote 151', 'mesero', 'BAJA', '', 'mesero'),
(7, 'Lourdes', 'Jimenez', 'Jimenez', 9887654, 'Lote 151', 'mesero', 'BAJA', '', 'eb3ae7fb426cdc86ec02b3f63e3e7b09'),
(8, 'Angel', 'Carrillo', 'Barbudo', 982345678, 'La herradura 3', 'cajero', 'ACTIVO', '', 'f80bb5a954ee71b40f1c31b79734d82d'),
(9, 'Prueba', 'prueba', 'prueba', 0, 'lote 12', 'mesero', 'BAJA', '', 'eb3ae7fb426cdc86ec02b3f63e3e7b09'),
(10, 'Prueba', 'prueba', 'prueba', 0, 'lote 12', 'mesero', 'BAJA', '', 'eb3ae7fb426cdc86ec02b3f63e3e7b09'),
(11, 'Prueba2', 'prueba2', 'prueba2', 1234567890, 'san pedro', 'mesero', 'BAJA', 'prueba2', 'eb3ae7fb426cdc86ec02b3f63e3e7b09'),
(12, 'Maris', 'Gonzalez', 'Jimenez', 1234567890, 'belice', 'cajero', 'BAJA', 'maris', 'f80bb5a954ee71b40f1c31b79734d82d'),
(13, 'Fulano', 'Fulano', 'Fulano', 7372472, 'aqui', 'mesero', 'BAJA', 'fulano', 'eb3ae7fb426cdc86ec02b3f63e3e7b09'),
(14, 'prueba', 'pruebaApellido', 'pruebaMaterno', 987, 'bacalar', 'mesero', 'BAJA', 'bacalar', '368c4c60516165f6d266773eb10b9476'),
(15, 'Omar', 'pruebaOMARRR', 'pruebaMaterno', 332, 'bacalar', 'mesero', 'BAJA', 'omar', '04ea44663cfebbfd64f1a440791334e0'),
(16, 'Antony', 'Antony', 'Antony', 987742, 'chetumal', 'mesero', 'BAJA', 'anto', '2c946c0178ec72aaefa54f786540d301'),
(17, '', '', '', 0, '', '', 'ACTIVO', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(18, '', '', '', 0, '', '', 'ACTIVO', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(19, '', '', '', 0, '', '', 'ACTIVO', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(20, '', '', '', 0, '', '', 'ACTIVO', '', 'd41d8cd98f00b204e9800998ecf8427e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
`num_factura` int(11) NOT NULL,
  `estatus_factura` varchar(10) NOT NULL,
  `cliente_num_cliente` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`num_factura`, `estatus_factura`, `cliente_num_cliente`) VALUES
(1, 'ACTIVO', 1),
(2, 'ACTIVO', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
`id_mesa` int(11) NOT NULL,
  `num_mesa` int(45) DEFAULT NULL,
  `estado_mesa` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `num_mesa`, `estado_mesa`) VALUES
(1, 1, 0),
(2, 2, 1),
(3, 3, 0),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
`num_orden` int(11) NOT NULL,
  `fk_mesa` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `total_orden` int(5) NOT NULL,
  `orden_pedido_id_orden_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_pedido`
--

CREATE TABLE `orden_pedido` (
`id_orden_pedido` int(11) NOT NULL,
  `bebidas_num_bebidas` int(11) NOT NULL,
  `platillos_num_platillo` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `num_emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platillos`
--

CREATE TABLE `platillos` (
`num_platillo` int(11) NOT NULL,
  `nombre_platillo` varchar(45) NOT NULL,
  `descripcion_platillo` varchar(140) DEFAULT NULL,
  `precio_platillo` int(5) NOT NULL,
  `estatus_platillo` varchar(5) NOT NULL,
  `id_tipoPlatillo` int(11) NOT NULL,
  `img_platillo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `platillos`
--

INSERT INTO `platillos` (`num_platillo`, `nombre_platillo`, `descripcion_platillo`, `precio_platillo`, `estatus_platillo`, `id_tipoPlatillo`, `img_platillo`) VALUES
(1, 'PAPAS A LA FRANCESA', '(Papas rebanadas tipo juliana fritas en aceite con salsa cátsup o aderezo ranch).', 45, 'DISP', 0, ''),
(2, 'Guacamole', '(Servido con totopos y queso).', 49, 'DISP', 1, 'imagenes/guacamole_E.jpg'),
(3, 'Gajos de papas fritas', '(Rebanadas de papas fritas con salsa cátsup o aderezo ranch).', 55, 'DISP', 1, 'imagenes/papas.jpg'),
(4, 'Tapas de papa con tocino', '(Piel de papa horneada con queso cheddar y tocino servida con aderezo ranch). tiempo de preparación: 25 min.', 55, 'DISP', 1, 'imagenes/entrada.jpg'),
(5, 'Dip de espinacas', '(Espinacas con alcachofas, queso crema y totopos).', 65, 'DISP', 1, 'imagenes/dip.jpg'),
(6, 'ESFERAS DE QUESO', '(Bolitas de queso crema con salamí empanizadas y servidas con aderezo de chile chipotle).', 85, 'BAJA', 0, ''),
(7, 'CARPACCIO DE ATÚN', '(Atún aderezado con aliño de miel y mostaza, hojas verdes, chile xcatic, acompañado de un pan globo).', 169, 'DISP', 0, ''),
(8, 'Gorgonzola de noche', '(Queso mozzarella, queso gorgonzola, tocino, albahaca y nuez).', 149, 'DISP', 2, 'imagenes/gorgonzola.jpg'),
(9, 'Fetuccini Alfredo con pollo ', '(Con salsa parmesana y pollo a la parrilla).', 125, 'DISP', 2, 'imagenes/pasta.jpg'),
(10, 'Ensalada de pera', '(Rebanadas de pera con aderezo de mostaza sobre cama de espinacas y arúgula acompañadas de cacahuate caramelizado y queso de cabra).', 105, 'DISP', 2, 'imagenes/ensalada.jpg'),
(11, 'Pizza Jamón serrano y arúgula', '(Queso mozzarella, jamón serrano, arúgula y parmesano).', 105, 'DISP', 2, 'imagenes/pizza.jpg'),
(12, 'Brownie con helado de vainilla', 'Cremoso de chocolate con nuez y helado de vainilla.', 49, 'DISP', 3, 'imagenes/postre1.jpg'),
(13, 'Helado', '(Vainilla, Galleta Oreo)', 47, 'DISP', 3, 'imagenes/postre2.jpg'),
(14, 'Creme Brulée', '(Natilla de leche estilo francés con costra de azúcar ligeramente quemada).', 49, 'DISP', 3, 'imagenes/postre3.jpg'),
(15, 'Pannacotta', '(Flan italiano elaborada con queso mascarpone, vainilla, bañado con salsa de mango y frutos negros).', 45, 'DISP', 3, 'imagenes/postre4.jpg'),
(16, 'Prueba', 'Prueba', 12, 'BAJA', 1, NULL),
(17, 'Prueba', 'Prueba', 12, 'BAJA', 1, NULL),
(18, 'Prueba', 'Prueba', 24, 'BAJA', 1, NULL),
(19, 'platillo 1', 'rico', 120, 'BAJA', 1, NULL),
(20, 'Papa', 'frita', 23, 'BAJA', 1, NULL),
(21, 'huevo', 'dfghjk', 122, 'BAJA', 1, NULL),
(22, '', '', 0, 'BAJA', 1, NULL),
(23, '', '', 0, 'BAJA', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
`num_ticket` int(11) NOT NULL,
  `num_mesa` int(11) NOT NULL,
  `fecha_ticket` datetime NOT NULL,
  `empleados_num_emp` int(11) NOT NULL,
  `orden_num_orden` int(11) NOT NULL,
  `factura_num_factura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_bebida`
--

CREATE TABLE `tipo_bebida` (
`id_tipoBebida` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_bebida`
--

INSERT INTO `tipo_bebida` (`id_tipoBebida`, `tipo`, `activo`) VALUES
(1, 'COCKTAIL', 1),
(2, 'CERVEZA', 1),
(3, 'VINO', 1),
(4, 'AGUA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_platillo`
--

CREATE TABLE `tipo_platillo` (
`id_tipoPlatillo` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_platillo`
--

INSERT INTO `tipo_platillo` (`id_tipoPlatillo`, `tipo`, `activo`) VALUES
(1, 'ENTRADA', 1),
(2, 'FUERTE', 1),
(3, 'POSTRE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_orden_detalle`
--

CREATE TABLE `t_orden_detalle` (
  `id_orden` varchar(14) NOT NULL,
  `fk_num_platillo` int(11) NOT NULL,
  `platillo` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double(13,2) NOT NULL,
  `importe` double(13,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_orden_detalle`
--

INSERT INTO `t_orden_detalle` (`id_orden`, `fk_num_platillo`, `platillo`, `cantidad`, `precio`, `importe`) VALUES
('1-1508062220', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('1-1508062220', 2, 'Guacamole ', 1, 49.00, 49.00),
('3-1508062222', 13, 'Helado ', 1, 47.00, 47.00),
('3-1508062222', 12, 'Brownie con helado de vainilla ', 1, 49.00, 49.00),
('3-1508062222', 15, 'Pannacotta ', 1, 45.00, 45.00),
('3-1508062222', 14, 'Creme Brulée ', 1, 49.00, 49.00),
('1-1508062223', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('3-1508062224', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('3-1508062234', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('3-1508062234', 2, 'Guacamole ', 1, 49.00, 49.00),
('1-1508062235', 9, 'Fetuccini Alfredo con pollo  ', 1, 125.00, 125.00),
('1-1508062235', 8, 'Gorgonzola de noche ', 1, 149.00, 149.00),
('3-1508062240', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('3-1508062240', 2, 'Guacamole ', 1, 49.00, 49.00),
('1-1508062241', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('1-1508062241', 4, 'Tapas de papa con tocino ', 1, 55.00, 55.00),
('1-1508062241', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('1-1508062241', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('1-1508062242', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('3-1508062244', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('1-1508062244', 2, 'Guacamole ', 1, 49.00, 49.00),
('1-1508062246', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('3-1508062246', 2, 'Guacamole ', 1, 49.00, 49.00),
('1-1508062247', 3, 'Gajos de papas fritas ', 1, 55.00, 55.00),
('3-1508062247', 2, 'Guacamole ', 1, 49.00, 49.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_orden_total`
--

CREATE TABLE `t_orden_total` (
  `id_orden` varchar(14) NOT NULL,
  `fk_num_emp` int(11) DEFAULT NULL,
  `total_pedido` double DEFAULT NULL,
  `pago` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `t_orden_total`
--

INSERT INTO `t_orden_total` (`id_orden`, `fk_num_emp`, `total_pedido`, `pago`) VALUES
('1-1508061336', NULL, NULL, NULL),
('2-1508061336', NULL, NULL, NULL),
('1-1508061831', NULL, NULL, NULL),
('1-1508062220', NULL, NULL, NULL),
('', NULL, NULL, NULL),
('', NULL, NULL, NULL),
('', NULL, NULL, NULL),
('', NULL, NULL, NULL),
('', NULL, NULL, NULL),
('3-1508062222', NULL, NULL, NULL),
('3-1508062224', NULL, NULL, NULL),
('1-1508062223', NULL, NULL, NULL),
('3-1508062234', NULL, NULL, NULL),
('1-1508062235', NULL, NULL, NULL),
('1-1508062241', NULL, NULL, NULL),
('3-1508062240', NULL, NULL, NULL),
('1-1508062242', NULL, NULL, NULL),
('3-1508062244', NULL, NULL, NULL),
('1-1508062244', NULL, NULL, NULL),
('3-1508062246', NULL, NULL, NULL),
('1-1508062246', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
 ADD PRIMARY KEY (`num_bebidas`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`num_cliente`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
 ADD PRIMARY KEY (`num_emp`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`num_factura`), ADD KEY `fk_factura_cliente1_idx` (`cliente_num_cliente`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
 ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
 ADD PRIMARY KEY (`num_orden`), ADD KEY `fk_orden_orden_pedido1_idx` (`orden_pedido_id_orden_pedido`);

--
-- Indices de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
 ADD PRIMARY KEY (`id_orden_pedido`), ADD KEY `fk_orden_pedido_bebidas_idx` (`bebidas_num_bebidas`), ADD KEY `fk_orden_pedido_platillos1_idx` (`platillos_num_platillo`);

--
-- Indices de la tabla `platillos`
--
ALTER TABLE `platillos`
 ADD PRIMARY KEY (`num_platillo`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
 ADD PRIMARY KEY (`num_ticket`), ADD KEY `fk_ticket_empleados1_idx` (`empleados_num_emp`), ADD KEY `fk_ticket_orden1_idx` (`orden_num_orden`), ADD KEY `fk_ticket_factura1_idx` (`factura_num_factura`);

--
-- Indices de la tabla `tipo_bebida`
--
ALTER TABLE `tipo_bebida`
 ADD PRIMARY KEY (`id_tipoBebida`);

--
-- Indices de la tabla `tipo_platillo`
--
ALTER TABLE `tipo_platillo`
 ADD PRIMARY KEY (`id_tipoPlatillo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
MODIFY `num_bebidas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `num_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
MODIFY `num_emp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
MODIFY `num_factura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
MODIFY `num_orden` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
MODIFY `id_orden_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `platillos`
--
ALTER TABLE `platillos`
MODIFY `num_platillo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
MODIFY `num_ticket` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_bebida`
--
ALTER TABLE `tipo_bebida`
MODIFY `id_tipoBebida` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_platillo`
--
ALTER TABLE `tipo_platillo`
MODIFY `id_tipoPlatillo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
ADD CONSTRAINT `fk_factura_cliente1` FOREIGN KEY (`cliente_num_cliente`) REFERENCES `cliente` (`num_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
ADD CONSTRAINT `fk_orden_orden_pedido1` FOREIGN KEY (`orden_pedido_id_orden_pedido`) REFERENCES `orden_pedido` (`id_orden_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_pedido`
--
ALTER TABLE `orden_pedido`
ADD CONSTRAINT `fk_orden_pedido_bebidas` FOREIGN KEY (`bebidas_num_bebidas`) REFERENCES `bebidas` (`num_bebidas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_orden_pedido_platillos1` FOREIGN KEY (`platillos_num_platillo`) REFERENCES `platillos` (`num_platillo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
ADD CONSTRAINT `fk_ticket_empleados1` FOREIGN KEY (`empleados_num_emp`) REFERENCES `empleados` (`num_emp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ticket_factura1` FOREIGN KEY (`factura_num_factura`) REFERENCES `factura` (`num_factura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_ticket_orden1` FOREIGN KEY (`orden_num_orden`) REFERENCES `orden` (`num_orden`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
