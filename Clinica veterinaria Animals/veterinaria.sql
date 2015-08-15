-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2015 a las 14:09:53
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `car_cargos`
--

CREATE TABLE IF NOT EXISTS `car_cargos` (
  `car_id` int(11) NOT NULL,
  `car_nombre` varchar(45) NOT NULL COMMENT 'Nombre del cargo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cargos de los empleados';

--
-- Volcado de datos para la tabla `car_cargos`
--

INSERT INTO `car_cargos` (`car_id`, `car_nombre`) VALUES
(1, 'Admin'),
(2, 'Secretaria'),
(3, 'Doctor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cit_cita`
--

CREATE TABLE IF NOT EXISTS `cit_cita` (
  `cit_id` int(11) NOT NULL,
  `cit_fecha` date NOT NULL COMMENT 'Fecha de la cita de la mascota',
  `cit_hora` time DEFAULT NULL COMMENT 'Hora de la cita',
  `cit_programacion` varchar(75) NOT NULL COMMENT 'Proceso programado para la cita',
  `estado` varchar(75) DEFAULT NULL COMMENT 'Observaciones para la cita',
  `doc_cit_id` int(11) NOT NULL,
  `infm_cit_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Citas de recibimiento mascotas';

--
-- Volcado de datos para la tabla `cit_cita`
--

INSERT INTO `cit_cita` (`cit_id`, `cit_fecha`, `cit_hora`, `cit_programacion`, `estado`, `doc_cit_id`, `infm_cit_id`) VALUES
(1, '2013-11-28', NULL, 'Consulta general', 'Pendiente', 1, 1),
(2, '2013-01-28', NULL, 'Consulta general', 'Finalizada', 1, 1),
(3, '2013-12-28', NULL, 'Consulta general', 'Programada', 1, 1),
(4, '2012-12-28', NULL, 'Consulta general', 'Perdida', 1, 1),
(5, '2015-08-24', '05:00:00', 'Consulta general', 'Cancelado', 7, 8),
(6, '2015-08-24', '05:00:00', 'Consulta general', 'Pendiente', 7, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dep_departamento`
--

CREATE TABLE IF NOT EXISTS `dep_departamento` (
  `dep_id` int(11) NOT NULL COMMENT 'ID de departamento',
  `dep_nombre` varchar(15) NOT NULL COMMENT 'Nombre del departamento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Departamentos del pais';

--
-- Volcado de datos para la tabla `dep_departamento`
--

INSERT INTO `dep_departamento` (`dep_id`, `dep_nombre`) VALUES
(1, 'Bacalar, Q.Roo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_empleados`
--

CREATE TABLE IF NOT EXISTS `emp_empleados` (
  `emp_id` int(11) NOT NULL COMMENT 'ID de empleado',
  `emp_nombre` varchar(50) NOT NULL COMMENT 'Nombre del empleado',
  `emp_apellido` varchar(50) NOT NULL COMMENT 'Apellido del empleado',
  `emp_telcasa` char(11) NOT NULL COMMENT 'Telefono del empleado',
  `dep_emp_id` int(11) NOT NULL,
  `gen_genero_gen_id` int(11) NOT NULL,
  `esp_emp_id` int(11) NOT NULL,
  `car_emp_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Datos de los empleados de la veterinaria';

--
-- Volcado de datos para la tabla `emp_empleados`
--

INSERT INTO `emp_empleados` (`emp_id`, `emp_nombre`, `emp_apellido`, `emp_telcasa`, `dep_emp_id`, `gen_genero_gen_id`, `esp_emp_id`, `car_emp_id`) VALUES
(1, 'Hector', 'Mendez', '', 1, 1, 1, 1),
(7, 'Joel', 'Deferia Alvarez', '', 1, 1, 1, 3),
(9, 'Lidia', 'Canche Vera', '9831124402', 1, 2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esm_estado_mascotas`
--

CREATE TABLE IF NOT EXISTS `esm_estado_mascotas` (
  `esm_id` int(11) NOT NULL COMMENT 'ID del estado de mascota',
  `esm_estado` varchar(20) NOT NULL COMMENT 'Estado de la mascota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Estado de las mascotas';

--
-- Volcado de datos para la tabla `esm_estado_mascotas`
--

INSERT INTO `esm_estado_mascotas` (`esm_id`, `esm_estado`) VALUES
(1, 'Enfermo'),
(2, 'Sano'),
(3, 'Fallecido'),
(4, 'Extraviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esp_especializaciones`
--

CREATE TABLE IF NOT EXISTS `esp_especializaciones` (
  `esp_id` int(11) NOT NULL,
  `esp_nombre` varchar(50) NOT NULL,
  `esp_descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripcion de la especialización'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Especializaciones de un medico';

--
-- Volcado de datos para la tabla `esp_especializaciones`
--

INSERT INTO `esp_especializaciones` (`esp_id`, `esp_nombre`, `esp_descripcion`) VALUES
(1, 'Veterinaria general', 'Este se encarga de examinar la mayoria de especies.'),
(4, 'Veterinaria para especies silvestres', 'Este se encarga de examinar animales no domestico por lo general exoticos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fam_familia`
--

CREATE TABLE IF NOT EXISTS `fam_familia` (
  `fam_id` int(11) NOT NULL,
  `fam_nombre` varchar(25) NOT NULL COMMENT 'Nombre de la familia',
  `mas_fam_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tipo de familia de las mascotas';

--
-- Volcado de datos para la tabla `fam_familia`
--

INSERT INTO `fam_familia` (`fam_id`, `fam_nombre`, `mas_fam_id`) VALUES
(1, 'Lagartos', 3),
(2, 'Serpientes', 3),
(3, 'Tortugas', 3),
(4, 'Perros', 1),
(5, 'Gatos', 1),
(6, 'Ardillas', 1),
(7, 'Loros', 2),
(8, 'Pericos', 2),
(9, 'Patos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gen_genero`
--

CREATE TABLE IF NOT EXISTS `gen_genero` (
  `gen_id` int(11) NOT NULL COMMENT 'ID de genero',
  `gen_nombre` char(1) NOT NULL COMMENT 'Nombre de genero'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Definición de generos';

--
-- Volcado de datos para la tabla `gen_genero`
--

INSERT INTO `gen_genero` (`gen_id`, `gen_nombre`) VALUES
(1, 'M'),
(2, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infm_informacion_mascotas`
--

CREATE TABLE IF NOT EXISTS `infm_informacion_mascotas` (
  `infm_id` int(11) NOT NULL COMMENT 'ID de la mascota',
  `infm_nombre` varchar(15) NOT NULL COMMENT 'Nombre de la mascota',
  `infm_nacimiento` date DEFAULT NULL COMMENT 'Fecha de nacimiento de la mascota',
  `id_propietario` int(11) NOT NULL,
  `mas_infm_id` int(11) NOT NULL,
  `gen_infm_id` int(11) NOT NULL,
  `esm_infm_id` int(11) NOT NULL,
  `tps_infm_id` int(11) NOT NULL,
  `infm_fingreso` date NOT NULL COMMENT 'Fecha de ingreso de la mascota',
  `infm_fsalida` date DEFAULT NULL COMMENT 'Fecha de salida de la mascota',
  `fam_infm_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Datos de las mascotas';

--
-- Volcado de datos para la tabla `infm_informacion_mascotas`
--

INSERT INTO `infm_informacion_mascotas` (`infm_id`, `infm_nombre`, `infm_nacimiento`, `id_propietario`, `mas_infm_id`, `gen_infm_id`, `esm_infm_id`, `tps_infm_id`, `infm_fingreso`, `infm_fsalida`, `fam_infm_id`) VALUES
(1, 'perski', NULL, 1, 1, 1, 1, 1, '2013-11-25', NULL, 1),
(8, 'Laisha', '2014-09-17', 2, 1, 2, 2, 4, '2015-10-27', NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mas_mascotas`
--

CREATE TABLE IF NOT EXISTS `mas_mascotas` (
  `mas_id` int(11) NOT NULL COMMENT 'ID del tipo de mascotas',
  `mas_tipo` varchar(20) NOT NULL COMMENT 'Tipo de mascotas posibles'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Tipo de mascotas registradas';

--
-- Volcado de datos para la tabla `mas_mascotas`
--

INSERT INTO `mas_mascotas` (`mas_id`, `mas_tipo`) VALUES
(1, 'Mamiferos'),
(2, 'Aves'),
(3, 'Reptiles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prop_propietarios`
--

CREATE TABLE IF NOT EXISTS `prop_propietarios` (
  `prop_id` int(11) NOT NULL COMMENT 'ID del propietario',
  `prop_nombre` varchar(50) NOT NULL COMMENT 'Nombre del propietario',
  `prop_apellido` varchar(50) NOT NULL COMMENT 'Apellido del propietario',
  `prop_direccion` varchar(45) NOT NULL COMMENT 'Direccion del propietario',
  `prop_telcasa` char(11) NOT NULL COMMENT 'Telefono del propietario',
  `gen_genero_gen_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Propietarios de las mascotas';

--
-- Volcado de datos para la tabla `prop_propietarios`
--

INSERT INTO `prop_propietarios` (`prop_id`, `prop_nombre`, `prop_apellido`, `prop_direccion`, `prop_telcasa`, `gen_genero_gen_id`) VALUES
(1, 'Jose', 'Burgo', 'Santa Tecla, San Salvador', '2342-4532', 1),
(2, 'Lidia', 'Canche Vera', 'Av. 19 esquina 44. Bacalar, Q.Roo', '983112440', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tps_tipo_salida`
--

CREATE TABLE IF NOT EXISTS `tps_tipo_salida` (
  `tps_id` int(11) NOT NULL,
  `tps_descripcion` varchar(30) NOT NULL COMMENT 'Descripción del tipo de salida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tipo de salida';

--
-- Volcado de datos para la tabla `tps_tipo_salida`
--

INSERT INTO `tps_tipo_salida` (`tps_id`, `tps_descripcion`) VALUES
(1, 'Tratamiento'),
(2, 'Alta'),
(3, 'Cuidado Intensivo'),
(4, 'Control');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usr_usuarios`
--

CREATE TABLE IF NOT EXISTS `usr_usuarios` (
  `usr_id` int(11) NOT NULL COMMENT 'ID de usuario',
  `usr_username` varchar(20) NOT NULL COMMENT 'Nombre de usuario',
  `usr_passwd` varchar(20) NOT NULL COMMENT 'Contraseña de acceso',
  `usr_accesibilidad` int(11) NOT NULL COMMENT 'Accesibilidad del empleado',
  `emp_usr_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Usuarios de acceso al sitio';

--
-- Volcado de datos para la tabla `usr_usuarios`
--

INSERT INTO `usr_usuarios` (`usr_id`, `usr_username`, `usr_passwd`, `usr_accesibilidad`, `emp_usr_id`) VALUES
(1, 'admin', '123456', 1, 1),
(3, 'doctor', '1234', 3, 7),
(4, 'secretaria', '123', 2, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `car_cargos`
--
ALTER TABLE `car_cargos`
  ADD PRIMARY KEY (`car_id`);

--
-- Indices de la tabla `cit_cita`
--
ALTER TABLE `cit_cita`
  ADD PRIMARY KEY (`cit_id`,`doc_cit_id`,`infm_cit_id`), ADD KEY `fk_cit_cita_doc_doctores1_idx` (`doc_cit_id`), ADD KEY `fk_cit_cita_infm_informacion_mascotas1_idx` (`infm_cit_id`);

--
-- Indices de la tabla `dep_departamento`
--
ALTER TABLE `dep_departamento`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indices de la tabla `emp_empleados`
--
ALTER TABLE `emp_empleados`
  ADD PRIMARY KEY (`emp_id`,`dep_emp_id`,`gen_genero_gen_id`,`esp_emp_id`,`car_emp_id`), ADD KEY `fk_emp_empleados_dep_departamento1_idx` (`dep_emp_id`), ADD KEY `fk_emp_empleados_gen_genero1_idx` (`gen_genero_gen_id`), ADD KEY `fk_emp_empleados_esp_especializaciones1_idx` (`esp_emp_id`), ADD KEY `fk_emp_empleados_car_cargos1_idx` (`car_emp_id`);

--
-- Indices de la tabla `esm_estado_mascotas`
--
ALTER TABLE `esm_estado_mascotas`
  ADD PRIMARY KEY (`esm_id`);

--
-- Indices de la tabla `esp_especializaciones`
--
ALTER TABLE `esp_especializaciones`
  ADD PRIMARY KEY (`esp_id`);

--
-- Indices de la tabla `fam_familia`
--
ALTER TABLE `fam_familia`
  ADD PRIMARY KEY (`fam_id`,`mas_fam_id`), ADD KEY `fk_fam_familia_mas_mascotas1_idx` (`mas_fam_id`);

--
-- Indices de la tabla `gen_genero`
--
ALTER TABLE `gen_genero`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indices de la tabla `infm_informacion_mascotas`
--
ALTER TABLE `infm_informacion_mascotas`
  ADD PRIMARY KEY (`infm_id`,`mas_infm_id`,`gen_infm_id`,`esm_infm_id`,`tps_infm_id`,`fam_infm_id`,`id_propietario`), ADD KEY `fk_infm_informacion_mascotas_mas_mascotas1_idx` (`mas_infm_id`), ADD KEY `fk_infm_informacion_mascotas_gen_genero1_idx` (`gen_infm_id`), ADD KEY `fk_infm_informacion_mascotas_esm_estado_mascotas1_idx` (`esm_infm_id`), ADD KEY `fk_infm_informacion_mascotas_tps_tipo_salida1_idx` (`tps_infm_id`), ADD KEY `fk_infm_informacion_mascotas_fam_familia1_idx` (`fam_infm_id`), ADD KEY `fk_infm_informacion_mascotas_id_propietario_idx` (`id_propietario`);

--
-- Indices de la tabla `mas_mascotas`
--
ALTER TABLE `mas_mascotas`
  ADD PRIMARY KEY (`mas_id`);

--
-- Indices de la tabla `prop_propietarios`
--
ALTER TABLE `prop_propietarios`
  ADD PRIMARY KEY (`prop_id`,`gen_genero_gen_id`), ADD KEY `fk_prop_propietarios_gen_genero1_idx` (`gen_genero_gen_id`);

--
-- Indices de la tabla `tps_tipo_salida`
--
ALTER TABLE `tps_tipo_salida`
  ADD PRIMARY KEY (`tps_id`);

--
-- Indices de la tabla `usr_usuarios`
--
ALTER TABLE `usr_usuarios`
  ADD PRIMARY KEY (`usr_id`,`emp_usr_id`), ADD KEY `fk_usr_usuarios_emp_empleados1_idx` (`emp_usr_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cit_cita`
--
ALTER TABLE `cit_cita`
  MODIFY `cit_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `emp_empleados`
--
ALTER TABLE `emp_empleados`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de empleado',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `infm_informacion_mascotas`
--
ALTER TABLE `infm_informacion_mascotas`
  MODIFY `infm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de la mascota',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `mas_mascotas`
--
ALTER TABLE `mas_mascotas`
  MODIFY `mas_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del tipo de mascotas',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `prop_propietarios`
--
ALTER TABLE `prop_propietarios`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID del propietario',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usr_usuarios`
--
ALTER TABLE `usr_usuarios`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID de usuario',AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cit_cita`
--
ALTER TABLE `cit_cita`
ADD CONSTRAINT `fk_cit_cita_doc_doctores1` FOREIGN KEY (`doc_cit_id`) REFERENCES `emp_empleados` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cit_cita_infm_informacion_mascotas1` FOREIGN KEY (`infm_cit_id`) REFERENCES `infm_informacion_mascotas` (`infm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `emp_empleados`
--
ALTER TABLE `emp_empleados`
ADD CONSTRAINT `fk_emp_empleados_car_cargos1` FOREIGN KEY (`car_emp_id`) REFERENCES `car_cargos` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_emp_empleados_dep_departamento1` FOREIGN KEY (`dep_emp_id`) REFERENCES `dep_departamento` (`dep_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_emp_empleados_esp_especializaciones1` FOREIGN KEY (`esp_emp_id`) REFERENCES `esp_especializaciones` (`esp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_emp_empleados_gen_genero1` FOREIGN KEY (`gen_genero_gen_id`) REFERENCES `gen_genero` (`gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fam_familia`
--
ALTER TABLE `fam_familia`
ADD CONSTRAINT `fk_fam_familia_mas_mascotas1` FOREIGN KEY (`mas_fam_id`) REFERENCES `mas_mascotas` (`mas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `infm_informacion_mascotas`
--
ALTER TABLE `infm_informacion_mascotas`
ADD CONSTRAINT `fk_infm_informacion_mascotas_esm_estado_mascotas1` FOREIGN KEY (`esm_infm_id`) REFERENCES `esm_estado_mascotas` (`esm_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_infm_informacion_mascotas_fam_familia1` FOREIGN KEY (`fam_infm_id`) REFERENCES `fam_familia` (`fam_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_infm_informacion_mascotas_gen_genero1` FOREIGN KEY (`gen_infm_id`) REFERENCES `gen_genero` (`gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_infm_informacion_mascotas_id_propietario` FOREIGN KEY (`id_propietario`) REFERENCES `prop_propietarios` (`prop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_infm_informacion_mascotas_mas_mascotas1` FOREIGN KEY (`mas_infm_id`) REFERENCES `mas_mascotas` (`mas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_infm_informacion_mascotas_tps_tipo_salida1` FOREIGN KEY (`tps_infm_id`) REFERENCES `tps_tipo_salida` (`tps_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prop_propietarios`
--
ALTER TABLE `prop_propietarios`
ADD CONSTRAINT `fk_prop_propietarios_gen_genero1` FOREIGN KEY (`gen_genero_gen_id`) REFERENCES `gen_genero` (`gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usr_usuarios`
--
ALTER TABLE `usr_usuarios`
ADD CONSTRAINT `fk_usr_usuarios_emp_empleados1` FOREIGN KEY (`emp_usr_id`) REFERENCES `emp_empleados` (`emp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
