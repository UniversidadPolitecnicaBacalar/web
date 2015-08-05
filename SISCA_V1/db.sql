-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-08-2015 a las 21:05:43
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_sisca`
--
CREATE DATABASE IF NOT EXISTS `db_sisca` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_sisca`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_actividad`
--

CREATE TABLE IF NOT EXISTS `tb_actividad` (
  `idact` int(11) NOT NULL,
  `nom_actividad` varchar(50) NOT NULL,
  `tb_competencias_id_competencia` int(11) NOT NULL,
  `tb_temaUnidad_id_temaU` int(11) NOT NULL,
  `tb_temaUnidad_tb_materias_id_materia` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_actividad`
--

INSERT INTO `tb_actividad` (`idact`, `nom_actividad`, `tb_competencias_id_competencia`, `tb_temaUnidad_id_temaU`, `tb_temaUnidad_tb_materias_id_materia`) VALUES
(1, 'portada color azul', 1, 10, 6),
(2, 'investigación de campo', 3, 11, 6),
(3, 'Investigacion', 1, 10, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alum_alulas`
--

CREATE TABLE IF NOT EXISTS `tb_alum_alulas` (
  `id` int(120) NOT NULL,
  `id_alum` int(11) NOT NULL,
  `id_aula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_alum_alulas`
--

INSERT INTO `tb_alum_alulas` (`id`, `id_alum`, `id_aula`) VALUES
(1, 2, 1),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alumnos`
--

CREATE TABLE IF NOT EXISTS `tb_alumnos` (
  `id_alumno` int(11) NOT NULL,
  `matricula_alum` varchar(45) DEFAULT NULL,
  `nombres_alum` char(25) DEFAULT NULL,
  `ape_pate_alum` char(25) DEFAULT NULL,
  `ape_mate_alum` char(25) DEFAULT NULL,
  `tb_turno_id_turno` int(11) NOT NULL,
  `tb_carreras_id_carrera` int(11) NOT NULL,
  `tb_cuatrimestres_id_cuatrimestre` int(11) NOT NULL,
  `tb_grupos_id_grupo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_alumnos`
--

INSERT INTO `tb_alumnos` (`id_alumno`, `matricula_alum`, `nombres_alum`, `ape_pate_alum`, `ape_mate_alum`, `tb_turno_id_turno`, `tb_carreras_id_carrera`, `tb_cuatrimestres_id_cuatrimestre`, `tb_grupos_id_grupo`) VALUES
(1, '12321423223', 'Bernice', 'E.', 'Koster', 1, 2, 1, 1),
(2, '12323214444', 'David', 'J.', 'Stroud', 2, 2, 2, 2),
(3, '12312312333', 'Laura', 'P.', 'Peek', 1, 3, 3, 3),
(4, '12665738883', 'Paul', 'L.', 'Carpenter', 2, 4, 4, 4),
(5, '123123123343', 'Fransisca', 'D.', 'Gonzalez', 1, 5, 5, 5),
(6, '31256724213', 'karlos', 'Alberto', 'Sosa', 2, 4, 7, 1),
(7, '132132134', 'karla', 'novelo', 'chi', 1, 2, 4, 4),
(8, '12313255422', 'Aarón', 'Canche', 'Bera', 2, 2, 4, 3),
(9, '12323435234', 'Carlos', 'Chable', 'Uh', 2, 4, 2, 4),
(10, '12314532323', 'Brayan', 'Antonio', 'ch', 1, 2, 4, 3),
(11, '124335784758', 'Elena', 'Guadalupe', 'kin', 2, 4, 2, 4),
(12, '12435678934', 'Neidy', 'Zul', 'Pol', 2, 4, 2, 4),
(13, '12543986542', 'Karol', 'Choc', 'Ak', 1, 2, 4, 3),
(14, '1298764353', 'Flor', 'Alvarez', 'Aguilar', 2, 4, 2, 4),
(15, '12034038840', 'Rafael', 'Baron', 'Bibiloni', 2, 4, 2, 3),
(16, '12003466500', 'Martín	', 'Baez', 'Cast', 1, 2, 4, 4),
(17, '12345320098', 'Teresa', 'Chi', 'Camp', 1, 4, 2, 3),
(18, '12500832210', 'Eduardo', 'Blanch', 'Bayo', 2, 2, 4, 3),
(19, '123213126389', 'Rosa', 'María', 'Ma', 2, 2, 4, 3),
(20, '11223098320', 'Francisco', 'Alfonzo', 'Javier', 1, 4, 2, 4),
(21, '12334006538', 'Jorge', 'Arbelo', 'Ac', 2, 4, 2, 3),
(22, '12343234420 ', 'Daniel', 'gutierrez', 'Antolin', 1, 2, 4, 4),
(23, '12435675865', 'Alegria', 'Maria', 'Ángeles', 2, 4, 2, 3),
(24, '89812693691 ', 'Manuel', 'Alcazar', 'Martinez', 1, 2, 4, 4),
(25, '123664578006  ', 'Francisco', ' Aguero', 'Afonso', 1, 4, 2, 3),
(26, '41232156757', 'José', 'Ayllon', 'Sa', 2, 4, 2, 4),
(27, '12344349986', 'María', 'Amaro', 'Alm', 1, 2, 4, 4),
(28, '12987368554 ', 'Karen', 'Lucia', ' Rodríguez', 2, 4, 2, 3),
(29, '12312321454 ', 'Estrella', 'Pot', 'Pol', 1, 2, 4, 4),
(30, ' 1298764353 ', 'Flor', ' Alvarez', ' Aguilar', 2, 4, 2, 3),
(31, ' 12543986542', ' Karol', 'Choc', 'Ak', 1, 4, 2, 4),
(32, '12344349986', 'María', 'Amaro', 'Alm', 1, 2, 4, 4),
(33, '12987368554 ', 'Karen', 'Lucia', ' Rodríguez', 2, 4, 2, 3),
(34, '12312321454 ', 'Estrella', 'Pot', 'Pol', 1, 2, 4, 4),
(35, ' 1298764353 ', 'Flor', ' Alvarez', ' Aguilar', 2, 4, 2, 3),
(36, ' 12543986542', ' Karol', 'Choc', 'Ak', 1, 4, 2, 4),
(37, ' 12435678934', 'Paola', ' Neidy', ' Zul', 2, 4, 2, 4),
(38, '24377362623', ' Guadalupe', 'kin', 'Elena', 1, 2, 4, 3),
(39, '12003943212', 'Chable', ' Carlos', 'Uh', 2, 4, 2, 4),
(40, '12314532323  ', 'Antonio', 'Alfonzo', 'Gh', 2, 2, 4, 3),
(41, ' 12435678934', 'Paola', ' Neidy', ' Zul', 2, 4, 2, 4),
(42, '24377362623', ' Guadalupe', 'kin', 'Elena', 1, 2, 4, 3),
(43, '12003943212', 'Chable', ' Carlos', 'Uh', 2, 4, 2, 4),
(44, '12314532323  ', 'Antonio', 'Brayan', 'col', 2, 2, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alumnos_calificacionesxactividad`
--

CREATE TABLE IF NOT EXISTS `tb_alumnos_calificacionesxactividad` (
  `idAlCa` int(11) NOT NULL,
  `tb_alumno_id_alumno` int(11) NOT NULL,
  `tb_actividad_idact` int(11) NOT NULL,
  `calificacion_act` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_alumnos_calificacionesxactividad`
--

INSERT INTO `tb_alumnos_calificacionesxactividad` (`idAlCa`, `tb_alumno_id_alumno`, `tb_actividad_idact`, `calificacion_act`) VALUES
(1, 2, 1, 7),
(2, 3, 1, 9),
(3, 10, 1, 0),
(4, 4, 1, 0),
(5, 5, 1, 0),
(6, 6, 1, 0),
(7, 7, 1, 0),
(8, 9, 1, 0),
(9, 10, 1, 0),
(10, 11, 1, 0),
(12, 13, 1, 0),
(13, 14, 1, 7),
(14, 1, 3, 0),
(15, 2, 3, 0),
(16, 3, 3, 0),
(17, 4, 3, 0),
(18, 5, 3, 0),
(19, 6, 3, 0),
(20, 7, 3, 0),
(21, 8, 3, 0),
(22, 9, 3, 0),
(23, 10, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alumnos_calificacionesxmateria`
--

CREATE TABLE IF NOT EXISTS `tb_alumnos_calificacionesxmateria` (
  `id_calif_materia` int(11) NOT NULL,
  `tb_alumnos_id_alumno` int(11) NOT NULL,
  `tb_materias_id_materia` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_alumnos_calificacionesxmateria`
--

INSERT INTO `tb_alumnos_calificacionesxmateria` (`id_calif_materia`, `tb_alumnos_id_alumno`, `tb_materias_id_materia`, `calificacion`) VALUES
(1, 1, 1, 10),
(2, 2, 2, 8),
(3, 3, 3, 7),
(4, 4, 4, 9),
(5, 5, 5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_alumnos_calificacionesxunidad`
--

CREATE TABLE IF NOT EXISTS `tb_alumnos_calificacionesxunidad` (
  `id_alumnos_calificaciones` int(11) NOT NULL,
  `tb_alumnos_id_alumno` int(11) NOT NULL,
  `tb_temaUnidad_id_temaU` int(11) NOT NULL,
  `calificacion` float DEFAULT NULL,
  `tb_materia_id_materia` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_alumnos_calificacionesxunidad`
--

INSERT INTO `tb_alumnos_calificacionesxunidad` (`id_alumnos_calificaciones`, `tb_alumnos_id_alumno`, `tb_temaUnidad_id_temaU`, `calificacion`, `tb_materia_id_materia`) VALUES
(1, 1, 10, 10, 7),
(2, 2, 10, 9, 6),
(3, 3, 10, 7, 6),
(4, 4, 10, 8, 6),
(5, 5, 10, 9, 7),
(6, 6, 10, 10, 6),
(7, 7, 10, 8, 6),
(8, 8, 10, 0, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_aula`
--

CREATE TABLE IF NOT EXISTS `tb_aula` (
  `id_aula` int(11) NOT NULL,
  `num_aula` varchar(45) DEFAULT NULL,
  `tb_alumnos_id_alumno` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_aula`
--

INSERT INTO `tb_aula` (`id_aula`, `num_aula`, `tb_alumnos_id_alumno`) VALUES
(1, '1', 1),
(2, '2', 2),
(3, '3', 3),
(4, '4', 4),
(5, '5', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carreras`
--

CREATE TABLE IF NOT EXISTS `tb_carreras` (
  `id_carrera` int(11) NOT NULL,
  `nom_carrera` char(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_carreras`
--

INSERT INTO `tb_carreras` (`id_carrera`, `nom_carrera`) VALUES
(1, 'Pimes'),
(2, 'Ingeniería Software'),
(3, 'Animación'),
(4, 'Nutrición'),
(5, 'Terapia Fisica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_competencias`
--

CREATE TABLE IF NOT EXISTS `tb_competencias` (
  `id_competencia` int(11) NOT NULL,
  `nom_competencia` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_competencias`
--

INSERT INTO `tb_competencias` (`id_competencia`, `nom_competencia`) VALUES
(1, 'Evidencia de producto'),
(2, 'Evidencia de desempeño'),
(3, 'Evidencia de conocimiento'),
(4, 'Evidencia de actitud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cuatrimestres`
--

CREATE TABLE IF NOT EXISTS `tb_cuatrimestres` (
  `id_cuatrimestre` int(11) NOT NULL,
  `cuatrimestre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_cuatrimestres`
--

INSERT INTO `tb_cuatrimestres` (`id_cuatrimestre`, `cuatrimestre`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_grupos`
--

CREATE TABLE IF NOT EXISTS `tb_grupos` (
  `id_grupo` int(11) NOT NULL,
  `nom_grupo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_grupos`
--

INSERT INTO `tb_grupos` (`id_grupo`, `nom_grupo`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_maestros`
--

CREATE TABLE IF NOT EXISTS `tb_maestros` (
  `id_maestro` int(11) NOT NULL,
  `nom_maestro` char(25) DEFAULT NULL,
  `usuario_maestro` varchar(25) DEFAULT NULL,
  `pwd_maestro` varchar(30) DEFAULT NULL,
  `estado` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_maestros`
--

INSERT INTO `tb_maestros` (`id_maestro`, `nom_maestro`, `usuario_maestro`, `pwd_maestro`, `estado`) VALUES
(1, 'MARIA CRISTINA', 'ZODIPH', '-DiariKZ', ''),
(2, 'GONZALO MASCARO', 'CALIS', 'eMicrow9', ''),
(3, 'JUAN FRANCISCO', 'ZETZIN', 'astracQO', ''),
(4, 'ELENA VICTORIA', 'BITURE', 'tatioRVr', ''),
(5, 'MARIA VICTORIA', 'EGOVION', 'SuppK', ''),
(6, 'FELIX GAVILAN', 'senlafiX', 'gegege', ''),
(7, 'ALEJANDRO VALLE', 'VISIDUCT', 'senlafiX1', ''),
(8, NULL, '', '', ''),
(9, NULL, 'prueba@hotmail.com', 'pass', ''),
(10, 'Lord zarlo', 'marco', '123', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_maestros_has_tb_materias`
--

CREATE TABLE IF NOT EXISTS `tb_maestros_has_tb_materias` (
  `id` int(11) NOT NULL,
  `tb_maestros_id_maestro` int(11) NOT NULL,
  `tb_materias_id_materia` int(11) NOT NULL,
  `tb_aula_id_aula` int(11) NOT NULL,
  `tb_aula_tb_alumnos_id_alumno` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `turno` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `carrera` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_maestros_has_tb_materias`
--

INSERT INTO `tb_maestros_has_tb_materias` (`id`, `tb_maestros_id_maestro`, `tb_materias_id_materia`, `tb_aula_id_aula`, `tb_aula_tb_alumnos_id_alumno`, `aula`, `turno`, `grupo`, `cuatrimestre`, `carrera`) VALUES
(1, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(2, 2, 2, 2, 2, 0, 0, 0, 0, 0),
(3, 3, 3, 3, 3, 0, 0, 0, 0, 0),
(4, 4, 4, 4, 4, 0, 0, 0, 0, 0),
(5, 5, 5, 5, 5, 0, 0, 0, 0, 0),
(6, 10, 6, 1, 1, 1, 1, 3, 4, 2),
(9, 10, 7, 3, 3, 2, 2, 4, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_materias`
--

CREATE TABLE IF NOT EXISTS `tb_materias` (
  `id_materia` int(11) NOT NULL,
  `nom_materia` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_materias`
--

INSERT INTO `tb_materias` (`id_materia`, `nom_materia`) VALUES
(1, 'Base de Datos'),
(2, 'Biologia'),
(3, 'Habilidades del pensamiento'),
(4, 'Ingles'),
(5, 'Valores del Ser'),
(6, 'Fundamentos de Redes'),
(7, 'Animación'),
(8, 'Estadística y probabilidad'),
(15, 'Estructura interplanetaria'),
(16, 'Estructura planetaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_temaunidad`
--

CREATE TABLE IF NOT EXISTS `tb_temaunidad` (
  `id_temaU` int(11) NOT NULL,
  `nom_temaU` char(45) DEFAULT NULL,
  `tb_unidades_id_unidad` int(11) NOT NULL,
  `tb_materias_id_materia` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_temaunidad`
--

INSERT INTO `tb_temaunidad` (`id_temaU`, `nom_temaU`, `tb_unidades_id_unidad`, `tb_materias_id_materia`) VALUES
(1, 'Economia', 1, 1),
(2, 'Bio estadistica', 2, 2),
(3, 'Algebra lineal', 3, 3),
(4, 'Estructura', 4, 4),
(5, 'Probabilidad y Estadísticas', 5, 5),
(6, 'Muestreo probabilístico', 8, 8),
(7, 'Intervalos característicos', 8, 8),
(8, 'Teorema central del límite', 8, 8),
(9, 'Estimación de la media', 8, 8),
(10, 'Diseño artistico', 0, 6),
(12, 'Cableado estructurado', 0, 6),
(14, 'Animacion intro mod', 0, 7),
(15, 'Diseño', 0, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_turno`
--

CREATE TABLE IF NOT EXISTS `tb_turno` (
  `id_turno` int(11) NOT NULL,
  `nom_turno` char(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_turno`
--

INSERT INTO `tb_turno` (`id_turno`, `nom_turno`) VALUES
(1, 'Matutino'),
(2, 'Despertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_unidades`
--

CREATE TABLE IF NOT EXISTS `tb_unidades` (
  `id_unidad` int(11) NOT NULL,
  `nom_unidad` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_unidades`
--

INSERT INTO `tb_unidades` (`id_unidad`, `nom_unidad`) VALUES
(0, 'indefinido'),
(1, 'Estadísticas'),
(2, 'Probabilidad'),
(3, 'Economia'),
(4, 'Algebra linea'),
(5, 'Estructura'),
(6, 'Inferencia descriptiva'),
(7, 'Inteligencia artificial'),
(8, 'Inferencia estadística'),
(9, 'Combinatoria'),
(10, 'Distribución normal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_actividad`
--
ALTER TABLE `tb_actividad`
  ADD PRIMARY KEY (`idact`);

--
-- Indices de la tabla `tb_alumnos`
--
ALTER TABLE `tb_alumnos`
  ADD PRIMARY KEY (`id_alumno`,`tb_grupos_id_grupo`,`tb_cuatrimestres_id_cuatrimestre`,`tb_carreras_id_carrera`,`tb_turno_id_turno`), ADD KEY `fk_tb_alumnos_tb_turno1_idx` (`tb_turno_id_turno`), ADD KEY `fk_tb_alumnos_tb_carreras1_idx` (`tb_carreras_id_carrera`), ADD KEY `fk_tb_alumnos_tb_cuatrimestres1_idx` (`tb_cuatrimestres_id_cuatrimestre`), ADD KEY `fk_tb_alumnos_tb_grupos1_idx` (`tb_grupos_id_grupo`);

--
-- Indices de la tabla `tb_alumnos_calificacionesxactividad`
--
ALTER TABLE `tb_alumnos_calificacionesxactividad`
  ADD PRIMARY KEY (`idAlCa`);

--
-- Indices de la tabla `tb_alumnos_calificacionesxmateria`
--
ALTER TABLE `tb_alumnos_calificacionesxmateria`
  ADD PRIMARY KEY (`id_calif_materia`,`tb_alumnos_id_alumno`,`tb_materias_id_materia`), ADD KEY `fk_tb_alumnos_has_tb_materias_tb_materias1_idx` (`tb_materias_id_materia`), ADD KEY `fk_tb_alumnos_has_tb_materias_tb_alumnos1_idx` (`tb_alumnos_id_alumno`);

--
-- Indices de la tabla `tb_alumnos_calificacionesxunidad`
--
ALTER TABLE `tb_alumnos_calificacionesxunidad`
  ADD PRIMARY KEY (`id_alumnos_calificaciones`,`tb_alumnos_id_alumno`,`tb_temaUnidad_id_temaU`), ADD KEY `fk_tb_alumnos_calificaciones_tb_temaUnidad1_idx` (`tb_temaUnidad_id_temaU`);

--
-- Indices de la tabla `tb_aula`
--
ALTER TABLE `tb_aula`
  ADD PRIMARY KEY (`id_aula`,`tb_alumnos_id_alumno`), ADD KEY `fk_tb_aula_tb_alumnos_idx` (`tb_alumnos_id_alumno`);

--
-- Indices de la tabla `tb_carreras`
--
ALTER TABLE `tb_carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `tb_competencias`
--
ALTER TABLE `tb_competencias`
  ADD PRIMARY KEY (`id_competencia`);

--
-- Indices de la tabla `tb_cuatrimestres`
--
ALTER TABLE `tb_cuatrimestres`
  ADD PRIMARY KEY (`id_cuatrimestre`);

--
-- Indices de la tabla `tb_grupos`
--
ALTER TABLE `tb_grupos`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `tb_maestros`
--
ALTER TABLE `tb_maestros`
  ADD PRIMARY KEY (`id_maestro`);

--
-- Indices de la tabla `tb_maestros_has_tb_materias`
--
ALTER TABLE `tb_maestros_has_tb_materias`
  ADD PRIMARY KEY (`id`,`tb_maestros_id_maestro`,`tb_materias_id_materia`,`tb_aula_id_aula`,`tb_aula_tb_alumnos_id_alumno`), ADD KEY `fk_tb_maestros_has_tb_materias_tb_materias1_idx` (`tb_materias_id_materia`), ADD KEY `fk_tb_maestros_has_tb_materias_tb_maestros1_idx` (`tb_maestros_id_maestro`), ADD KEY `fk_tb_maestros_has_tb_materias_tb_aula1_idx` (`tb_aula_id_aula`,`tb_aula_tb_alumnos_id_alumno`);

--
-- Indices de la tabla `tb_materias`
--
ALTER TABLE `tb_materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `tb_temaunidad`
--
ALTER TABLE `tb_temaunidad`
  ADD PRIMARY KEY (`id_temaU`,`tb_materias_id_materia`), ADD KEY `fk_tb_temaUnidad_tb_unidades1_idx` (`tb_unidades_id_unidad`), ADD KEY `fk_tb_temaUnidad_tb_materias1_idx` (`tb_materias_id_materia`);

--
-- Indices de la tabla `tb_turno`
--
ALTER TABLE `tb_turno`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indices de la tabla `tb_unidades`
--
ALTER TABLE `tb_unidades`
  ADD PRIMARY KEY (`id_unidad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_actividad`
--
ALTER TABLE `tb_actividad`
  MODIFY `idact` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tb_alumnos`
--
ALTER TABLE `tb_alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `tb_alumnos_calificacionesxactividad`
--
ALTER TABLE `tb_alumnos_calificacionesxactividad`
  MODIFY `idAlCa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `tb_alumnos_calificacionesxmateria`
--
ALTER TABLE `tb_alumnos_calificacionesxmateria`
  MODIFY `id_calif_materia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_alumnos_calificacionesxunidad`
--
ALTER TABLE `tb_alumnos_calificacionesxunidad`
  MODIFY `id_alumnos_calificaciones` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tb_aula`
--
ALTER TABLE `tb_aula`
  MODIFY `id_aula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_carreras`
--
ALTER TABLE `tb_carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_competencias`
--
ALTER TABLE `tb_competencias`
  MODIFY `id_competencia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_cuatrimestres`
--
ALTER TABLE `tb_cuatrimestres`
  MODIFY `id_cuatrimestre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `tb_grupos`
--
ALTER TABLE `tb_grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_maestros`
--
ALTER TABLE `tb_maestros`
  MODIFY `id_maestro` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tb_maestros_has_tb_materias`
--
ALTER TABLE `tb_maestros_has_tb_materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tb_materias`
--
ALTER TABLE `tb_materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `tb_temaunidad`
--
ALTER TABLE `tb_temaunidad`
  MODIFY `id_temaU` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `tb_turno`
--
ALTER TABLE `tb_turno`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tb_unidades`
--
ALTER TABLE `tb_unidades`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_alumnos`
--
ALTER TABLE `tb_alumnos`
ADD CONSTRAINT `fk_tb_alumnos_tb_carreras1` FOREIGN KEY (`tb_carreras_id_carrera`) REFERENCES `tb_carreras` (`id_carrera`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_alumnos_tb_cuatrimestres1` FOREIGN KEY (`tb_cuatrimestres_id_cuatrimestre`) REFERENCES `tb_cuatrimestres` (`id_cuatrimestre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_alumnos_tb_grupos1` FOREIGN KEY (`tb_grupos_id_grupo`) REFERENCES `tb_grupos` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_alumnos_tb_turno1` FOREIGN KEY (`tb_turno_id_turno`) REFERENCES `tb_turno` (`id_turno`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_alumnos_calificacionesxmateria`
--
ALTER TABLE `tb_alumnos_calificacionesxmateria`
ADD CONSTRAINT `fk_tb_alumnos_has_tb_materias_tb_alumnos1` FOREIGN KEY (`tb_alumnos_id_alumno`) REFERENCES `tb_alumnos` (`id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_alumnos_has_tb_materias_tb_materias1` FOREIGN KEY (`tb_materias_id_materia`) REFERENCES `tb_materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_alumnos_calificacionesxunidad`
--
ALTER TABLE `tb_alumnos_calificacionesxunidad`
ADD CONSTRAINT `fk_tb_alumnos_calificaciones_tb_temaUnidad1` FOREIGN KEY (`tb_temaUnidad_id_temaU`) REFERENCES `tb_temaunidad` (`id_temaU`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_maestros_has_tb_materias`
--
ALTER TABLE `tb_maestros_has_tb_materias`
ADD CONSTRAINT `fk_tb_maestros_has_tb_materias_tb_aula1` FOREIGN KEY (`tb_aula_id_aula`, `tb_aula_tb_alumnos_id_alumno`) REFERENCES `tb_aula` (`id_aula`, `tb_alumnos_id_alumno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_maestros_has_tb_materias_tb_maestros1` FOREIGN KEY (`tb_maestros_id_maestro`) REFERENCES `tb_maestros` (`id_maestro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_maestros_has_tb_materias_tb_materias1` FOREIGN KEY (`tb_materias_id_materia`) REFERENCES `tb_materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_temaunidad`
--
ALTER TABLE `tb_temaunidad`
ADD CONSTRAINT `fk_tb_temaUnidad_tb_materias1` FOREIGN KEY (`tb_materias_id_materia`) REFERENCES `tb_materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_temaUnidad_tb_unidades1` FOREIGN KEY (`tb_unidades_id_unidad`) REFERENCES `tb_unidades` (`id_unidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
