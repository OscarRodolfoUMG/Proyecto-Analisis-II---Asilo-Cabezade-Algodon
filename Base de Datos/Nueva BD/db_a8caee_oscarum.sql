-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql8001.site4now.net
-- Tiempo de generación: 27-10-2022 a las 17:02:57
-- Versión del servidor: 8.0.28
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_a8caee_oscarum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int NOT NULL,
  `idFicha` int DEFAULT NULL,
  `diagnostico` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordenExamenes` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordenMedicamentos` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costoConsulta` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `idCuenta` int NOT NULL,
  `userName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fechaPago` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`idCuenta`, `userName`, `fechaPago`) VALUES
(1, 'Asilo', NULL),
(2, 'Fundacion', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int NOT NULL,
  `userName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idEspecialidad` int DEFAULT NULL,
  `idPuesto` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidad` int NOT NULL,
  `descripcionEsp` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidad`, `descripcionEsp`) VALUES
(5, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmacia`
--

CREATE TABLE `farmacia` (
  `idFarmacia` int NOT NULL,
  `idFicha` int DEFAULT NULL,
  `fechaEntrega` date NOT NULL,
  `idMedicamento` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `cantidadMedicamento` int NOT NULL,
  `precioMedicamento` float NOT NULL,
  `costoFarmacia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_visita`
--

CREATE TABLE `ficha_visita` (
  `idFicha` int NOT NULL,
  `idSolicitud` int NOT NULL,
  `userName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idEmpleado` int NOT NULL,
  `fechaVisita` datetime NOT NULL,
  `monto` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `idLaboratorio` int NOT NULL,
  `idFicha` int DEFAULT NULL,
  `fechaExamen` date NOT NULL,
  `descripcionEx` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resultadoEx` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `costoLaboratorio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_cuenta`
--

CREATE TABLE `movimiento_cuenta` (
  `idMovimiento` int NOT NULL,
  `idCuenta` int NOT NULL,
  `idFicha` int DEFAULT NULL,
  `idTipoMovimiento` int NOT NULL,
  `motivoMovimiento` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `montoMovimiento` float NOT NULL,
  `fechaMovimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prototipo`
--

CREATE TABLE `prototipo` (
  `id_interno` int NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `motivo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `medico` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `especialidad` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `examenes` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `resultado_ex` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `medicamentos` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `prototipo`
--

INSERT INTO `prototipo` (`id_interno`, `nombre`, `apellido`, `fecha`, `motivo`, `medico`, `especialidad`, `examenes`, `resultado_ex`, `diagnostico`, `medicamentos`, `observaciones`) VALUES
(15, 'Ricardo', 'Ascun', '2022-09-30', 'Cafeina', 'Jorge Gonzales', 'Psiquiatra', 'Actitudinal', 'Negativo', 'Solo solin Solito', 'PARAAACCEEEETAAAMOOOOOLLLL!!!!!', 'Inquieto y delirando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `idPuesto` int NOT NULL,
  `descripcionP` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`idPuesto`, `descripcionP`) VALUES
(1, 'Consulta'),
(2, 'Farmacia'),
(3, 'Laboratorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `idSolicitud` int NOT NULL,
  `userName` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eMail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idEmpleado` int NOT NULL,
  `fechaSolicitud` date DEFAULT NULL,
  `aceptada` tinyint(1) DEFAULT NULL,
  `motivo` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `enfermeroAux` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento`
--

CREATE TABLE `tipo_movimiento` (
  `idTipoMovimiento` int NOT NULL,
  `descripcion_tipomov` char(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_movimiento`
--

INSERT INTO `tipo_movimiento` (`idTipoMovimiento`, `descripcion_tipomov`) VALUES
(1, 'Deposito'),
(2, 'Retiro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usertype`
--

CREATE TABLE `usertype` (
  `idType` int NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usertype`
--

INSERT INTO `usertype` (`idType`, `nombre`) VALUES
(1, 'Interno'),
(2, 'Medico General'),
(3, 'Asilo'),
(4, 'Fundación'),
(5, 'EmpleadoFun'),
(6, 'No Asignado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `userName` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userType` int DEFAULT NULL,
  `eMail` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`userName`, `pass`, `nombres`, `apellidos`, `userType`, `eMail`, `fecha_nac`) VALUES
('Asilo', 'Asilo@77', 'Cabeza', 'de Algodon', 3, 'asilocabezadealgodon_1699@hotmail.com', NULL),
('Fundacion', 'Fundacion@77', 'Fundacion', '', 4, 'fundacion_1699@hotmail.com', NULL),
('MedicoGeneral', 'Medico@77', 'Medico', 'General', 2, 'medicogeneral_1699@hotmail.com', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`),
  ADD KEY `idFicha` (`idFicha`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`idCuenta`),
  ADD KEY `userName` (`userName`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `userName` (`userName`),
  ADD KEY `idEspecialidad` (`idEspecialidad`),
  ADD KEY `idPuesto` (`idPuesto`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidad`);

--
-- Indices de la tabla `farmacia`
--
ALTER TABLE `farmacia`
  ADD PRIMARY KEY (`idFarmacia`),
  ADD KEY `idFicha` (`idFicha`);

--
-- Indices de la tabla `ficha_visita`
--
ALTER TABLE `ficha_visita`
  ADD PRIMARY KEY (`idFicha`),
  ADD KEY `idSolicitud` (`idSolicitud`),
  ADD KEY `userName` (`userName`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD PRIMARY KEY (`idLaboratorio`),
  ADD KEY `idFicha` (`idFicha`);

--
-- Indices de la tabla `movimiento_cuenta`
--
ALTER TABLE `movimiento_cuenta`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `idCuenta` (`idCuenta`),
  ADD KEY `idTipoMovimiento` (`idTipoMovimiento`),
  ADD KEY `idFicha` (`idFicha`);

--
-- Indices de la tabla `prototipo`
--
ALTER TABLE `prototipo`
  ADD PRIMARY KEY (`id_interno`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`idPuesto`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`idSolicitud`),
  ADD KEY `userName` (`userName`),
  ADD KEY `idEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  ADD PRIMARY KEY (`idTipoMovimiento`);

--
-- Indices de la tabla `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`idType`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `userType` (`userType`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idConsulta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `idCuenta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `farmacia`
--
ALTER TABLE `farmacia`
  MODIFY `idFarmacia` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ficha_visita`
--
ALTER TABLE `ficha_visita`
  MODIFY `idFicha` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  MODIFY `idLaboratorio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `movimiento_cuenta`
--
ALTER TABLE `movimiento_cuenta`
  MODIFY `idMovimiento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `idPuesto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `idSolicitud` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_movimiento`
--
ALTER TABLE `tipo_movimiento`
  MODIFY `idTipoMovimiento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usertype`
--
ALTER TABLE `usertype`
  MODIFY `idType` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`idFicha`) REFERENCES `ficha_visita` (`idFicha`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `usuario` (`userName`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `usuario` (`userName`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`idEspecialidad`) REFERENCES `especialidad` (`idEspecialidad`),
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`);

--
-- Filtros para la tabla `farmacia`
--
ALTER TABLE `farmacia`
  ADD CONSTRAINT `farmacia_ibfk_1` FOREIGN KEY (`idFicha`) REFERENCES `ficha_visita` (`idFicha`);

--
-- Filtros para la tabla `ficha_visita`
--
ALTER TABLE `ficha_visita`
  ADD CONSTRAINT `ficha_visita_ibfk_1` FOREIGN KEY (`idSolicitud`) REFERENCES `solicitud` (`idSolicitud`),
  ADD CONSTRAINT `ficha_visita_ibfk_2` FOREIGN KEY (`userName`) REFERENCES `usuario` (`userName`),
  ADD CONSTRAINT `ficha_visita_ibfk_3` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD CONSTRAINT `laboratorio_ibfk_1` FOREIGN KEY (`idFicha`) REFERENCES `ficha_visita` (`idFicha`);

--
-- Filtros para la tabla `movimiento_cuenta`
--
ALTER TABLE `movimiento_cuenta`
  ADD CONSTRAINT `movimiento_cuenta_ibfk_1` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`idCuenta`),
  ADD CONSTRAINT `movimiento_cuenta_ibfk_2` FOREIGN KEY (`idTipoMovimiento`) REFERENCES `tipo_movimiento` (`idTipoMovimiento`),
  ADD CONSTRAINT `movimiento_cuenta_ibfk_3` FOREIGN KEY (`idFicha`) REFERENCES `ficha_visita` (`idFicha`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`userName`) REFERENCES `usuario` (`userName`),
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`idEmpleado`) REFERENCES `empleado` (`idEmpleado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`userType`) REFERENCES `usertype` (`idType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
