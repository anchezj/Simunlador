-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 23:18:34
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `roladmin`
--
CREATE DATABASE IF NOT EXISTS `roladmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `roladmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `tipo prestamo` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `cuota` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `tasa mes` int(11) NOT NULL,
  `vencimiento` int(11) NOT NULL,
  `intereses` int(11) NOT NULL,
  `detalle` int(11) NOT NULL,
  `editar` int(11) NOT NULL,
  `borrar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`tipo prestamo`, `cuota`, `valor`, `tasa mes`, `vencimiento`, `intereses`, `detalle`, `editar`, `borrar`) VALUES
('lol', 12, 1000000, 1, 121212, 20000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'administrador'),
(2, 'empleado'),
(3, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguros`
--

CREATE TABLE `seguros` (
  `tipo seguro` int(11) NOT NULL,
  `cuota` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `tasa mes` int(11) NOT NULL,
  `vencimiento` int(11) NOT NULL,
  `intereses` int(11) NOT NULL,
  `detalle` int(11) NOT NULL,
  `editar` int(11) NOT NULL,
  `borrar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nomusuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idrol` int(11) NOT NULL,
  `foto` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nomusuario`, `clave`, `idrol`, `foto`) VALUES
(1, 'sebastian', '1', 1, 0x6d6f746f2e6a7067),
(2, 'julian', '1', 1, 0x6a656c6c79666973682e6a7067),
(3, 'lemus', '1', 2, 0x74756c6970732e6a7067),
(4, 'jorge', '1', 3, 0x6b6f616c612e6a7067),
(67, 'aide', '123', 1, 0x6b6f616c612e6a7067);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
