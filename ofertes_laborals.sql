-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2020 a las 15:31:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `borsadetreball`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertes_laborals`
--

CREATE TABLE `ofertes_laborals` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `titol` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `descripcio` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `requisits` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `sou` int(20) NOT NULL,
  `brut` int(20) NOT NULL,
  `data_publi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ofertes_laborals`
--

INSERT INTO `ofertes_laborals` (`id`, `id_empresa`, `titol`, `descripcio`, `requisits`, `sou`, `brut`, `data_publi`) VALUES
(5, 0, 'xd', 'puta', 'cap', 50, 20, '0000-00-00 00:00:00'),
(6, 0, '$titol', '$descripcio', '$requisits', 22, 2, '2020-01-24 16:21:48'),
(7, 0, 's', 's', 's', 2, 2, '2020-01-24 16:22:36'),
(8, 0, 's', 's', 's', 2, 2, '2020-01-24 16:22:36'),
(9, 0, 's', 's', 's', 2, 2, '2020-01-24 16:22:37'),
(10, 0, 's', 's', 's', 2, 2, '2020-01-24 16:22:37'),
(11, 0, 's', 's', 's', 2, 2, '2020-01-24 16:22:37'),
(12, 0, 's', 's', 's', 2, 2, '2020-01-24 16:23:07'),
(13, 0, 's', 's', 's', 2, 2, '2020-01-24 16:23:08'),
(14, 0, 's', 's', 's', 2, 2, '2020-01-24 16:23:08'),
(15, 0, 's', 's', 's', 2, 2, '2020-01-24 16:23:08'),
(16, 0, 's', 's', 's', 2, 2, '2020-01-24 16:23:14'),
(17, 0, '77uyrtrr', 'uuuuuuu', 'ettreter', 556, 899, '2020-01-24 16:38:24'),
(18, 0, 's', 's', 's', 2, 2, '2020-01-24 16:41:00'),
(19, 0, 's', 's', 's', 2, 2, '2020-01-24 16:41:00'),
(20, 0, 's', 's', 's', 2, 2, '2020-01-24 16:41:01'),
(21, 0, 's', 's', 's', 2, 2, '2020-01-24 16:41:01'),
(22, 0, 's', 's', '2', 2, 2, '2020-01-24 16:41:09'),
(23, 0, 's', 's', 's', 3, 3, '2020-01-28 15:01:33'),
(24, 0, 'xX', 'S', 'S', 3, 3, '2020-01-28 15:02:47'),
(25, 0, 's', 's', 's', 3, 23, '2020-01-30 20:02:24'),
(26, 0, 's', '', 's', 3, 3, '2020-01-30 20:02:40'),
(27, 0, '3', '3', '', 3, 3, '2020-01-30 20:03:22'),
(28, 0, '3', '3', '', 3, 3, '2020-01-30 20:05:37'),
(29, 0, '2', '', '2', 2, 2, '2020-01-30 20:05:51'),
(30, 0, '2', '', '2', 2, 2, '2020-01-30 20:06:51'),
(31, 0, '2', '2', '3', 3, 3, '2020-01-31 14:12:43'),
(32, 0, '2', '2', '32', 3, 3, '2020-01-31 14:12:54'),
(33, 0, '2', '2', '32', 3, 3, '2020-01-31 14:13:44'),
(34, 0, 's', 's', 's', 3, 3, '2020-01-31 14:13:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ofertes_laborals`
--
ALTER TABLE `ofertes_laborals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ofertes_laborals`
--
ALTER TABLE `ofertes_laborals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
