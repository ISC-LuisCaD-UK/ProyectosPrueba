-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2026 a las 20:41:19
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sicoes2026`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parcial1`
--

CREATE TABLE `CONCENTRADO` (
  `id_estudiante` int(11) NOT NULL,
  `P1_ACTS_PRES` int(11) DEFAULT NULL,
  `P1_ACTS_DE_TOTALES` int(11) DEFAULT NULL,
  `P1_ACTS_PROM` decimal(5,2) DEFAULT NULL,
  `P1_ACTS_PUNTOS` decimal(5,2) DEFAULT NULL,
  `P1_ACTS_NOTAS` varchar(30) DEFAULT NULL,
  `P1_DISC_INICALES` int(11) DEFAULT 2,
  `P1_DISC_XTRA` decimal(5,2) DEFAULT NULL,
  `P1_DISC_MENOS` decimal(5,2) DEFAULT NULL,
  `P1_DISC_XCMB` int(11) DEFAULT NULL,
  `P1_DISC_RETRASOS` int(11) DEFAULT NULL,
  `P1_DISC_PUNTOS` decimal(5,2) DEFAULT NULL,
  `P1_DISC_NOTAS` varchar(30) DEFAULT NULL,
  `P1_PROYEXA_CAL` decimal(5,2) DEFAULT NULL,
  `P1_PROYEXA_PUNTOS` decimal(5,2) DEFAULT NULL,
  `P1_PROYEXA_NOTAS` varchar(30) DEFAULT NULL,
  `P1_CALREAL` decimal(5,2) DEFAULT NULL,
  `P1_CALSAEVA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `parcial1`
--
ALTER TABLE `parcial1`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `parcial1`
--
ALTER TABLE `parcial1`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
