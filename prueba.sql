-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2017 a las 19:51:22
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `numero_empleado` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apellido2` varchar(30) DEFAULT NULL,
  `plaza` int(11) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `numero_empleado`, `nombre`, `apellido1`, `apellido2`, `plaza`, `activo`) VALUES
(1, 4567, 'Ivan', 'Ramirez', 'Martinez', 2, 0),
(2, 3428, 'Francisco', 'Andrade', 'Sanchez', 9, 1),
(4, 4563, 'Sergio', 'Bautista', 'Santiago', 6, 1),
(11, 234, 'ivan', 'rz', 'mz', 1, 0),
(12, 9876, 'Jorge', 'Cruz', '', 7, 1),
(17, 4132, 'Juan', 'Perez ', 'Avila ', 3, 1),
(19, 1324, 'juana', 'La ', 'Loca ', 6, 0),
(22, 4242, 'ewew', 'ewewe', '', 1, 1),
(23, 3121, 'Mar', 'Rmz', 'Perez', 1, 1),
(25, 1, '3', '3', '3', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plazas`
--

CREATE TABLE `plazas` (
  `id` int(11) NOT NULL,
  `nombre_plaza` varchar(100) NOT NULL,
  `unidad_administrativa` varchar(100) NOT NULL,
  `activo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plazas`
--

INSERT INTO `plazas` (`id`, `nombre_plaza`, `unidad_administrativa`, `activo`) VALUES
(1, 'Analista de Desarrollo', 'Gerencia de Informatica', 1),
(2, 'Jefe de Departamento', 'Gerencia de Informatica', 0),
(3, 'Analista de DBA', 'Gerencia de Informatica', 1),
(4, 'Analista de BI', 'Gerencia de Informatica', 1),
(5, 'Analista de Personal', 'Gerencia de Recursos Humanos', 1),
(6, 'Analista de Desarrollo', 'Gerencia de Informatica', 1),
(7, 'Analista de Departamento', 'Gerencia de Recursos Humanos', 1),
(8, 'Analista de Capacitacion', 'Gerencia de Produccion', 1),
(9, 'Analista de Materiales', 'Gerencia de Materiales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE `tbusuario` (
  `id` int(11) NOT NULL,
  `login` varchar(35) NOT NULL,
  `pass` varchar(35) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `perfil` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `login`, `pass`, `nombre`, `perfil`, `activo`) VALUES
(1, 'admin', 'admin', 'Gerardo', 'administrador', 1),
(2, 'user', 'user', 'CONAFOR', 'Empresa', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plazas`
--
ALTER TABLE `plazas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `plazas`
--
ALTER TABLE `plazas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
