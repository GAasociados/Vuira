-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2017 a las 21:22:15
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `citasbien`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `citas_id` varchar(255) DEFAULT NULL,
  `ciudadano_id` varchar(255) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `horarios_id` int(11) DEFAULT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `asunto` text,
  `creado_por` int(11) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL,
  `correo_electronico` varchar(255) DEFAULT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `citas_id`, `ciudadano_id`, `departamento_id`, `user_id`, `horarios_id`, `serial_no`, `dia`, `asunto`, `creado_por`, `fecha_captura`, `correo_electronico`, `nombre_completo`, `telefono`, `status`) VALUES
(6, 'A4T3RTDU', '1', 1, 1, 1, 1, '2017-05-22', 'deo', NULL, '2017-05-20', 'tantracerberus@gmail.com', 'Jose Juan Granados Fuerte', '4521199026', 1),
(7, 'AJ05YOBN', '1', 1, 1, 1, 2, '2017-05-22', 'Pregunta', NULL, '2017-05-21', 'correo', 'Juan Manuel', '462', 1),
(8, 'AI2G7CZ3', '1', 2, 2, 2, 5, '2017-05-22', 'dadasd', NULL, '2017-05-21', 'correo', 'Nombre', 'telefono', 1),
(9, 'AWBLFGVX', '1', 2, 2, 2, 1, '2017-05-22', 'qweqwe', NULL, '2017-05-21', 'aewe', '3213', '321', 1),
(10, 'ARJ82CIY', '1', 1, 1, 13, 1, '2017-05-24', 'eqeq', NULL, '2017-05-21', 'eqwe', 'ertg', 'edfgh', 1),
(11, 'AFA0C8CM', '1', 1, 1, 12, 2, '2017-05-23', 'Observación', NULL, '2017-05-22', 'correo@sample.com', 'Daniel', '462 115 000 00', 1),
(12, 'ABUYVAO8', '1', 1, 1, 13, 1, '2017-06-07', 'Cita', NULL, '2017-06-07', 'manuel@gmail.com', 'Juan Manuel Banda ', '462 1151054', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadano`
--

CREATE TABLE `ciudadano` (
  `id` int(11) NOT NULL,
  `ciudadano_id` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `fecha_cumple` date DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT '/assets/images/encargado/logo_general.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudadano`
--

INSERT INTO `ciudadano` (`id`, `ciudadano_id`, `nombres`, `apellidos`, `telefono`, `celular`, `fecha_captura`, `status`, `fecha_cumple`, `sexo`, `foto`) VALUES
(1, '1', '-', '-', 'granados', '4521199026', NULL, 1, NULL, NULL, '/assets/images/encargado/logo_general.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `dprt_id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`dprt_id`, `nombre`, `descripcion`, `status`) VALUES
(1, 'JAPAMI', NULL, 1),
(2, 'Catastro', NULL, 1),
(3, 'Administración Urbana', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tiempo_inicio` time DEFAULT NULL,
  `tiempo_final` time DEFAULT NULL,
  `dias_disponibles` varchar(250) DEFAULT NULL,
  `tiempo_por_turno` time DEFAULT NULL,
  `serie_visible` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `user_id`, `tiempo_inicio`, `tiempo_final`, `dias_disponibles`, `tiempo_por_turno`, `serie_visible`, `status`) VALUES
(1, 1, '09:00:00', '15:00:00', 'Monday', '01:00:00', 2, 1),
(2, 2, '09:00:00', '15:00:00', 'Monday', '01:00:00', 2, 1),
(3, 3, '09:00:00', '15:00:00', 'Monday', '01:00:00', 2, 1),
(4, 3, '09:00:00', '15:00:00', 'Tuesday', '01:00:00', 2, 1),
(5, 3, '09:00:00', '15:00:00', 'Wednesday', '01:00:00', 2, 1),
(6, 3, '09:00:00', '15:00:00', 'Thursday', '01:00:00', 2, 1),
(7, 3, '09:00:00', '15:00:00', 'Friday', '01:00:00', 2, 1),
(8, 2, '09:00:00', '15:00:00', 'Tuesday', '01:00:00', 2, 1),
(9, 2, '09:00:00', '15:00:00', 'Wednesday', '01:00:00', 2, 1),
(10, 2, '09:00:00', '15:00:00', 'Thursday', '01:00:00', 2, 1),
(11, 2, '09:00:00', '15:00:00', 'Friday', '01:00:00', 2, 1),
(12, 1, '09:00:00', '15:00:00', 'Tuesday', '01:00:00', 2, 1),
(13, 1, '09:00:00', '15:00:00', 'Wednesday', '01:00:00', 2, 1),
(14, 1, '09:00:00', '15:00:00', 'Thursday', '01:00:00', 2, 1),
(15, 1, '09:00:00', '15:00:00', 'Friday', '01:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_role` tinyint(4) DEFAULT NULL,
  `designacion` varchar(255) DEFAULT NULL,
  `rango` varchar(255) DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `biografia_corta` text,
  `foto` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `creado_por` varchar(255) DEFAULT NULL,
  `fecha_captura` date DEFAULT NULL,
  `fecha_update` date DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombres`, `apellido`, `email`, `user_role`, `designacion`, `rango`, `departamento_id`, `direccion`, `telefono`, `celular`, `biografia_corta`, `foto`, `fecha_nacimiento`, `sexo`, `creado_por`, `fecha_captura`, `fecha_update`, `status`) VALUES
(1, 'Ing. Patricia Hisaraith', 'Hernández', 'phernandez@japami.gob.mx', 2, 'Ing', 'Administrador', 1, 'Av. Juan José Torres Landa 1720, Independencia, 36559', '462 606 9100', '462 606 9100', '<p>Biografia</p>', NULL, '0000-00-00', 'Femenino', NULL, '2017-03-01', NULL, 1),
(2, 'Arq.Carlos Alberto', 'Juarez', 'carlos.juarez@irapuato.gob.mx', 2, 'Arq', 'Administrador', 2, 'Álvaro Obregón #100 Zona Centro, 1er Piso, Irapuato, Gto.', '01 462 6069999 ext. 1565 y 1566', NULL, NULL, NULL, '0000-00-00', 'Masculino', NULL, '2017-03-01', NULL, 1),
(3, 'Arq. Mariela Elizabeth', 'Lugo', 'mariela.lugo@irapuato.gob.mx', 2, 'Arq', 'Administrador', 3, 'Alvaro Obregon 100 Zona Centro, 1 er piso, Irapuato, Gto.', '01(462) 6069999 ext. 1565 y 1566', NULL, NULL, NULL, '0000-00-00', 'Femenino', NULL, '2017-04-05', NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_citas_Departamento1_idx` (`departamento_id`),
  ADD KEY `fk_citas_user1_idx` (`user_id`),
  ADD KEY `fk_citas_horarios1_idx` (`horarios_id`);

--
-- Indices de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`dprt_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horarios_user1_idx` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_Departamento_idx` (`departamento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `dprt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_citas_Departamento1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`dprt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_citas_horarios1` FOREIGN KEY (`horarios_id`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_citas_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `fk_horarios_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_Departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`dprt_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
