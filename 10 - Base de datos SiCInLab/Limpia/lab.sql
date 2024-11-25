-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2019 a las 01:45:19
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
-- Base de datos: `lab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categ`
--

CREATE TABLE `categ` (
  `id_categ` int(11) NOT NULL,
  `nombr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categ`
--

INSERT INTO `categ` (`id_categ`, `nombr`) VALUES
(1, 'Equipos'),
(2, 'Materiales'),
(3, 'Mobiliario'),
(4, 'Reactivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compr`
--

CREATE TABLE `compr` (
  `id_compr` int(11) NOT NULL,
  `fk_usuar_matri` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `vendr` varchar(45) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desgl_inven`
--

CREATE TABLE `desgl_inven` (
  `id_desgl_inven` int(11) NOT NULL,
  `canti_siste` int(11) NOT NULL,
  `canti_exist` int(11) NOT NULL,
  `fk_categ` int(11) NOT NULL,
  `fk_objeto_id` int(11) NOT NULL,
  `fk_inven` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detall_compr`
--

CREATE TABLE `detall_compr` (
  `id_detall_compr` int(11) NOT NULL,
  `cant` int(11) NOT NULL,
  `fk_compr` int(11) NOT NULL,
  `fk_categ` int(11) NOT NULL,
  `fk_objeto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detall_devol`
--

CREATE TABLE `detall_devol` (
  `id_detall_devol` int(11) NOT NULL,
  `fk_devol` int(11) NOT NULL,
  `fk_categ` int(11) NOT NULL,
  `fk_objeto_id` int(11) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detall_prest`
--

CREATE TABLE `detall_prest` (
  `id_detall_prest` int(11) NOT NULL,
  `fk_prest` int(11) NOT NULL,
  `fk_categ` int(11) NOT NULL,
  `fk_objeto_id` int(11) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detall_prest_consu`
--

CREATE TABLE `detall_prest_consu` (
  `id_detall_prest_consu` int(11) NOT NULL,
  `fk_prest_consu` int(11) NOT NULL,
  `fk_react` int(11) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devol`
--

CREATE TABLE `devol` (
  `id_devol` int(11) NOT NULL,
  `fecha_devol` datetime NOT NULL,
  `obser_devol` varchar(250) NOT NULL,
  `fk_prest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equip`
--

CREATE TABLE `equip` (
  `id_equip` int(11) NOT NULL,
  `nombr_equip` varchar(50) NOT NULL,
  `canti_equip` int(11) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `asunt` varchar(300) NOT NULL,
  `h8` tinyint(1) NOT NULL,
  `h9` tinyint(1) NOT NULL,
  `h10` tinyint(1) NOT NULL,
  `h11` tinyint(1) NOT NULL,
  `h12` tinyint(1) NOT NULL,
  `h13` tinyint(1) NOT NULL,
  `h14` tinyint(1) NOT NULL,
  `h15` tinyint(1) NOT NULL,
  `h16` tinyint(1) NOT NULL,
  `h17` tinyint(1) NOT NULL,
  `h18` tinyint(1) NOT NULL,
  `h19` tinyint(1) NOT NULL,
  `fk_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incid`
--

CREATE TABLE `incid` (
  `id_incid` int(11) NOT NULL,
  `fecha_incid` datetime NOT NULL,
  `descr` varchar(100) NOT NULL,
  `fk_matri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inven`
--

CREATE TABLE `inven` (
  `id_inven` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fk_usuar_matri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mater`
--

CREATE TABLE `mater` (
  `id_mater` int(11) NOT NULL,
  `nombr` varchar(45) NOT NULL,
  `capac` int(11) NOT NULL,
  `canti` int(11) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `fk_unids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `mater` varchar(20) NOT NULL,
  `nombr` varchar(45) NOT NULL,
  `canti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_usuar`
--

CREATE TABLE `nivel_usuar` (
  `id_nivel_usuar` int(11) NOT NULL,
  `nombr_nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel_usuar`
--

INSERT INTO `nivel_usuar` (`id_nivel_usuar`, `nombr_nivel`) VALUES
(1, 'Encargado'),
(2, 'Servicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prest`
--

CREATE TABLE `prest` (
  `id_prest` int(11) NOT NULL,
  `fk_usuar_matri` int(11) NOT NULL,
  `matri_solic` int(11) NOT NULL,
  `fecha_entre` datetime NOT NULL,
  `fecha_devol` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prest_consu`
--

CREATE TABLE `prest_consu` (
  `id_prest_consu` int(11) NOT NULL,
  `fecha_entre` datetime NOT NULL,
  `fk_matri` int(11) NOT NULL,
  `matri_solic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `react`
--

CREATE TABLE `react` (
  `id_react` int(11) NOT NULL,
  `nombr` varchar(100) NOT NULL,
  `formu` varchar(100) DEFAULT NULL,
  `pelig_salud` varchar(1) DEFAULT NULL,
  `pelig_infla` varchar(1) DEFAULT NULL,
  `pelig_ines` varchar(1) DEFAULT NULL,
  `pelig_esp` varchar(10) DEFAULT NULL,
  `fk_unids` int(11) NOT NULL,
  `cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servi_acces_labor`
--

CREATE TABLE `servi_acces_labor` (
  `id_acces_lab` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `fecha_apart` datetime NOT NULL,
  `fk_usuar_matri` int(11) NOT NULL,
  `matric_solic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `solicitante` int(11) NOT NULL,
  `fk_matri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unids`
--

CREATE TABLE `unids` (
  `id_unids` int(11) NOT NULL,
  `nombr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unids`
--

INSERT INTO `unids` (`id_unids`, `nombr`) VALUES
(1, 'Kg'),
(2, 'gr'),
(3, 'L'),
(4, 'ml'),
(5, 'pza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuar`
--

CREATE TABLE `usuar` (
  `id_matri` int(11) NOT NULL,
  `nombr` varchar(100) NOT NULL,
  `apell` varchar(100) NOT NULL,
  `contr` varchar(45) NOT NULL,
  `fecha_nacim` date NOT NULL,
  `num_tel` varchar(18) NOT NULL,
  `fk_nivel_usuar` int(11) NOT NULL,
  `user_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuar`
--

INSERT INTO `usuar` (`id_matri`, `nombr`, `apell`, `contr`, `fecha_nacim`, `num_tel`, `fk_nivel_usuar`, `user_name`) VALUES
(5601, 'Servicio', 'Servicio', 'servicio', '2019-06-05', '9960000000', 2, 'Servicio'),
(5681, 'Carlos Renato', 'Dzul Ramirez', 'solotulosabes', '1998-08-08', '9961106338', 1, 'Renato');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`id_categ`);

--
-- Indices de la tabla `compr`
--
ALTER TABLE `compr`
  ADD PRIMARY KEY (`id_compr`),
  ADD KEY `fk_compr_usuar1_idx` (`fk_usuar_matri`);

--
-- Indices de la tabla `desgl_inven`
--
ALTER TABLE `desgl_inven`
  ADD PRIMARY KEY (`id_desgl_inven`),
  ADD KEY `fk_desgl_inven_categ1_idx` (`fk_categ`),
  ADD KEY `fk_desgl_inven_inven1_idx` (`fk_inven`);

--
-- Indices de la tabla `detall_compr`
--
ALTER TABLE `detall_compr`
  ADD PRIMARY KEY (`id_detall_compr`),
  ADD KEY `fk_detall_compr_compr1_idx` (`fk_compr`),
  ADD KEY `fk_detall_compr_categ1_idx` (`fk_categ`);

--
-- Indices de la tabla `detall_devol`
--
ALTER TABLE `detall_devol`
  ADD PRIMARY KEY (`id_detall_devol`),
  ADD KEY `fk_detall_devol_devol1_idx` (`fk_devol`),
  ADD KEY `fk_detall_devol_categ1_idx` (`fk_categ`);

--
-- Indices de la tabla `detall_prest`
--
ALTER TABLE `detall_prest`
  ADD PRIMARY KEY (`id_detall_prest`),
  ADD KEY `fk_detall_prest_prest1_idx` (`fk_prest`),
  ADD KEY `fk_detall_prest_categ1_idx` (`fk_categ`);

--
-- Indices de la tabla `detall_prest_consu`
--
ALTER TABLE `detall_prest_consu`
  ADD PRIMARY KEY (`id_detall_prest_consu`),
  ADD KEY `fk_detall_prest_consu_prest_consu1_idx` (`fk_prest_consu`),
  ADD KEY `fk_detall_prest_consu_react1_idx` (`fk_react`);

--
-- Indices de la tabla `devol`
--
ALTER TABLE `devol`
  ADD PRIMARY KEY (`id_devol`),
  ADD KEY `fk_devol_prest1_idx` (`fk_prest`);

--
-- Indices de la tabla `equip`
--
ALTER TABLE `equip`
  ADD PRIMARY KEY (`id_equip`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`),
  ADD KEY `fk_horario_solicitud1_idx` (`fk_solicitud`);

--
-- Indices de la tabla `incid`
--
ALTER TABLE `incid`
  ADD PRIMARY KEY (`id_incid`),
  ADD KEY `fk_incid_usuar1_idx` (`fk_matri`);

--
-- Indices de la tabla `inven`
--
ALTER TABLE `inven`
  ADD PRIMARY KEY (`id_inven`),
  ADD KEY `fk_inven_usuar1_idx` (`fk_usuar_matri`);

--
-- Indices de la tabla `mater`
--
ALTER TABLE `mater`
  ADD PRIMARY KEY (`id_mater`),
  ADD KEY `fk_mater_unids1_idx` (`fk_unids`);

--
-- Indices de la tabla `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indices de la tabla `nivel_usuar`
--
ALTER TABLE `nivel_usuar`
  ADD PRIMARY KEY (`id_nivel_usuar`);

--
-- Indices de la tabla `prest`
--
ALTER TABLE `prest`
  ADD PRIMARY KEY (`id_prest`),
  ADD KEY `fk_prest_usuar1_idx` (`fk_usuar_matri`);

--
-- Indices de la tabla `prest_consu`
--
ALTER TABLE `prest_consu`
  ADD PRIMARY KEY (`id_prest_consu`),
  ADD KEY `fk_prest_consu_usuar1_idx` (`fk_matri`);

--
-- Indices de la tabla `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`id_react`),
  ADD KEY `fk_react_unids1_idx` (`fk_unids`);

--
-- Indices de la tabla `servi_acces_labor`
--
ALTER TABLE `servi_acces_labor`
  ADD PRIMARY KEY (`id_acces_lab`),
  ADD KEY `fk_servi_acces_labor_usuar1_idx` (`fk_usuar_matri`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `fk_solicitud_usuar1_idx` (`fk_matri`);

--
-- Indices de la tabla `unids`
--
ALTER TABLE `unids`
  ADD PRIMARY KEY (`id_unids`);

--
-- Indices de la tabla `usuar`
--
ALTER TABLE `usuar`
  ADD PRIMARY KEY (`id_matri`),
  ADD KEY `fk_usuar_nivel_usuar_idx` (`fk_nivel_usuar`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categ`
--
ALTER TABLE `categ`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compr`
--
ALTER TABLE `compr`
  MODIFY `id_compr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `desgl_inven`
--
ALTER TABLE `desgl_inven`
  MODIFY `id_desgl_inven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detall_compr`
--
ALTER TABLE `detall_compr`
  MODIFY `id_detall_compr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detall_devol`
--
ALTER TABLE `detall_devol`
  MODIFY `id_detall_devol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detall_prest`
--
ALTER TABLE `detall_prest`
  MODIFY `id_detall_prest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detall_prest_consu`
--
ALTER TABLE `detall_prest_consu`
  MODIFY `id_detall_prest_consu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `devol`
--
ALTER TABLE `devol`
  MODIFY `id_devol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `equip`
--
ALTER TABLE `equip`
  MODIFY `id_equip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `incid`
--
ALTER TABLE `incid`
  MODIFY `id_incid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inven`
--
ALTER TABLE `inven`
  MODIFY `id_inven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mater`
--
ALTER TABLE `mater`
  MODIFY `id_mater` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `nivel_usuar`
--
ALTER TABLE `nivel_usuar`
  MODIFY `id_nivel_usuar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prest`
--
ALTER TABLE `prest`
  MODIFY `id_prest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `prest_consu`
--
ALTER TABLE `prest_consu`
  MODIFY `id_prest_consu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `react`
--
ALTER TABLE `react`
  MODIFY `id_react` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `servi_acces_labor`
--
ALTER TABLE `servi_acces_labor`
  MODIFY `id_acces_lab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `unids`
--
ALTER TABLE `unids`
  MODIFY `id_unids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compr`
--
ALTER TABLE `compr`
  ADD CONSTRAINT `fk_compr_usuar1` FOREIGN KEY (`fk_usuar_matri`) REFERENCES `usuar` (`id_matri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desgl_inven`
--
ALTER TABLE `desgl_inven`
  ADD CONSTRAINT `fk_desgl_inven_categ1` FOREIGN KEY (`fk_categ`) REFERENCES `categ` (`id_categ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_desgl_inven_inven1` FOREIGN KEY (`fk_inven`) REFERENCES `inven` (`id_inven`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detall_compr`
--
ALTER TABLE `detall_compr`
  ADD CONSTRAINT `fk_detall_compr_categ1` FOREIGN KEY (`fk_categ`) REFERENCES `categ` (`id_categ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detall_compr_compr1` FOREIGN KEY (`fk_compr`) REFERENCES `compr` (`id_compr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detall_devol`
--
ALTER TABLE `detall_devol`
  ADD CONSTRAINT `fk_detall_devol_categ1` FOREIGN KEY (`fk_categ`) REFERENCES `categ` (`id_categ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detall_devol_devol1` FOREIGN KEY (`fk_devol`) REFERENCES `devol` (`id_devol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detall_prest`
--
ALTER TABLE `detall_prest`
  ADD CONSTRAINT `fk_detall_prest_categ1` FOREIGN KEY (`fk_categ`) REFERENCES `categ` (`id_categ`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detall_prest_prest1` FOREIGN KEY (`fk_prest`) REFERENCES `prest` (`id_prest`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detall_prest_consu`
--
ALTER TABLE `detall_prest_consu`
  ADD CONSTRAINT `fk_detall_prest_consu_prest_consu1` FOREIGN KEY (`fk_prest_consu`) REFERENCES `prest_consu` (`id_prest_consu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detall_prest_consu_react1` FOREIGN KEY (`fk_react`) REFERENCES `react` (`id_react`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `devol`
--
ALTER TABLE `devol`
  ADD CONSTRAINT `fk_devol_prest1` FOREIGN KEY (`fk_prest`) REFERENCES `prest` (`id_prest`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `fk_horario_solicitud1` FOREIGN KEY (`fk_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `incid`
--
ALTER TABLE `incid`
  ADD CONSTRAINT `fk_incid_usuar1` FOREIGN KEY (`fk_matri`) REFERENCES `usuar` (`id_matri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inven`
--
ALTER TABLE `inven`
  ADD CONSTRAINT `fk_inven_usuar1` FOREIGN KEY (`fk_usuar_matri`) REFERENCES `usuar` (`id_matri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mater`
--
ALTER TABLE `mater`
  ADD CONSTRAINT `fk_mater_unids1` FOREIGN KEY (`fk_unids`) REFERENCES `unids` (`id_unids`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prest`
--
ALTER TABLE `prest`
  ADD CONSTRAINT `fk_prest_usuar1` FOREIGN KEY (`fk_usuar_matri`) REFERENCES `usuar` (`id_matri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prest_consu`
--
ALTER TABLE `prest_consu`
  ADD CONSTRAINT `fk_prest_consu_usuar1` FOREIGN KEY (`fk_matri`) REFERENCES `usuar` (`id_matri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `react`
--
ALTER TABLE `react`
  ADD CONSTRAINT `fk_react_unids1` FOREIGN KEY (`fk_unids`) REFERENCES `unids` (`id_unids`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servi_acces_labor`
--
ALTER TABLE `servi_acces_labor`
  ADD CONSTRAINT `fk_servi_acces_labor_usuar1` FOREIGN KEY (`fk_usuar_matri`) REFERENCES `usuar` (`id_matri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `fk_solicitud_usuar1` FOREIGN KEY (`fk_matri`) REFERENCES `usuar` (`id_matri`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuar`
--
ALTER TABLE `usuar`
  ADD CONSTRAINT `fk_usuar_nivel_usuar` FOREIGN KEY (`fk_nivel_usuar`) REFERENCES `nivel_usuar` (`id_nivel_usuar`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
