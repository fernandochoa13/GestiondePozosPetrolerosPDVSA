-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-03-2023 a las 03:19:30
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20463688_pdvsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pozo`
--

CREATE TABLE `pozo` (
  `idPozo` int(11) NOT NULL,
  `nombrePozo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pozo`
--

INSERT INTO `pozo` (`idPozo`, `nombrePozo`, `ciudad`) VALUES
(10, 'PozoNormal', 'Maracaibo'),
(13, 'SpencerPozo', 'Puerto Ayacucho'),
(14, 'ExitoPozo', 'Tucupita'),
(18, 'PozoFondo', 'Puerto Ordaz'),
(19, 'PozoProfundo', 'Barinas'),
(20, 'PozoProfundo', 'Maracaibo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `idregistro` int(11) NOT NULL,
  `fechayhora` datetime NOT NULL DEFAULT current_timestamp(),
  `valorPSI` double DEFAULT NULL,
  `Pozo_IdPozo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`idregistro`, `fechayhora`, `valorPSI`, `Pozo_IdPozo`) VALUES
(1, '2023-03-14 22:46:52', 2.5, 5),
(27, '2023-03-17 03:10:04', 4.5, 10),
(28, '2023-03-17 03:10:51', 2.3, 10),
(29, '2023-03-17 03:11:33', 3.4, 10),
(30, '2023-03-17 03:12:01', 3.4, 10),
(31, '2023-03-17 03:12:06', 4.5, 10),
(32, '2023-03-17 03:15:04', 10.2, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pozo`
--
ALTER TABLE `pozo`
  ADD PRIMARY KEY (`idPozo`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`idregistro`),
  ADD KEY `Pozo_idPozo` (`Pozo_IdPozo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pozo`
--
ALTER TABLE `pozo`
  MODIFY `idPozo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `idregistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
