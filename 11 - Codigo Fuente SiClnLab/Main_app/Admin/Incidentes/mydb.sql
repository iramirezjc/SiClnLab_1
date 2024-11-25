-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2019 a las 19:09:11
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incid`
--

CREATE TABLE `incid` (
  `idinciden` int(11) NOT NULL,
  `Fecha_incidencia` date NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Matricula` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `incid`
--

INSERT INTO `incid` (`idinciden`, `Fecha_incidencia`, `Descripcion`, `Matricula`) VALUES
(34, '2019-05-08', 'ggsgdigsig', 5515),
(35, '2019-05-14', 'No hay materiales', 5555);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incid`
--
ALTER TABLE `incid`
  ADD PRIMARY KEY (`idinciden`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incid`
--
ALTER TABLE `incid`
  MODIFY `idinciden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
