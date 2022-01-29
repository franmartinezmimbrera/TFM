-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-01-2022 a las 10:18:34
-- Versión del servidor: 10.3.32-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `herramienta_protoformas`
--
CREATE DATABASE IF NOT EXISTS `herramienta_protoformas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `herramienta_protoformas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ConjuntosDatos`
--

CREATE TABLE `ConjuntosDatos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ruta` varchar(200) NOT NULL,
  `Login` varchar(15) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0,
  `Tipo` varchar(20) NOT NULL DEFAULT 'HISTÓRICO',
  `DatosBBDD` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ConjuntosDatos`
--

INSERT INTO `ConjuntosDatos` (`ID`, `Nombre`, `Ruta`, `Login`, `borrado`, `Tipo`, `DatosBBDD`) VALUES
(2, 'salsa', '/var/www/html/web/uploads/', 'admin', 1, 'HISTÓRICO', ''),
(3, 'patxi', '/var/www/html/web/uploads/', 'admin', 1, 'HISTÓRICO', ''),
(4, 'ssss', '/var/www/html/web/uploads/KEY-IPTV-FUTBOL', 'admin', 1, 'HISTÓRICO', ''),
(5, 'MOJON', '/var/www/html/web/uploads/DATOS MDM UJA', 'admin', 1, 'HISTÓRICO', ''),
(6, 'agua', '/var/www/html/web/uploads/DATOS MDM UJA', 'admin', 1, 'HISTÓRICO', ''),
(7, 'fffff', '/var/www/html/web/uploads/DATOS MDM UJA', 'admin', 1, 'HISTÓRICO', ''),
(8, 'TEMPERATURA PACIENTE 5 DÍAS', '/var/www/html/uploads/sensoretemperatura.csv', 'admin', 0, 'HISTÓRICO', ''),
(9, 'DROGA', '', 'admin', 1, 'TIEMPO REAL', '4059\r\nLOCALHOST'),
(10, '', '/var/www/html/web/uploads/sensorito.csv', 'admin', 1, 'HISTÓRICO', 'SENSOR TEMPERATURA PACIENTE UN DÍA'),
(11, 'TEMPERATURA PACIENTE UN DÍA', '/var/www/html/uploads/sensorito.csv', 'admin', 0, 'HISTÓRICO', ''),
(12, 'PRA BORRAR', '/var/www/html/uploads/REDES.rtf', 'admin', 1, 'HISTÓRICO', ''),
(13, 'GLUCOSA PACIENTE 15 DÍAS', '/var/www/html/uploads/sensorazucar.csv', 'admin', 0, 'HISTÓRICO', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CuantificadoresLingüísticos`
--

CREATE TABLE `CuantificadoresLingüísticos` (
  `Nombre` varchar(20) NOT NULL,
  `Login` varchar(15) NOT NULL,
  `A` float NOT NULL,
  `B` float NOT NULL,
  `C` float NOT NULL,
  `D` float NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `MarcoDeTrabajo`
--

CREATE TABLE `MarcoDeTrabajo` (
  `ID_CD` int(11) NOT NULL,
  `ID_Problema` int(11) NOT NULL,
  `NombreP` varchar(20) NOT NULL,
  `Login` varchar(15) NOT NULL,
  `ID_SENSOR` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `MarcoDeTrabajo`
--

INSERT INTO `MarcoDeTrabajo` (`ID_CD`, `ID_Problema`, `NombreP`, `Login`, `ID_SENSOR`) VALUES
(8, 5, 'P-TMADLM', 'admin', 'S1'),
(11, 6, 'P-TMADLM', 'admin', 'S1'),
(13, 7, 'P-GMBDLN', 'admin', 'S2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Problemas`
--

CREATE TABLE `Problemas` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(200) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0,
  `Login` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Problemas`
--

INSERT INTO `Problemas` (`ID`, `DESCRIPCION`, `borrado`, `Login`) VALUES
(1, 'ss', 1, 'admin'),
(2, 'CANUTOS Y DROGaaaaA PARA LOS CANARIOS', 1, 'admin'),
(3, 'mierda', 1, 'admin'),
(4, 'quiero \r\nmuchas pastillas verdes', 1, 'admin'),
(5, 'CONTROLAR TEMPERATURA MUY ALTA DE PACIENTE DURANTE 5 MAÑANAS', 0, 'admin'),
(6, 'CONTROLAR LA TEMPERATURA MUY ALTA DE PACIENTE DURANTE UNA MAÑANA', 0, 'admin'),
(7, 'CONTROL DE HIPOGLUCEMIA DURANTE LAS NOCHES DE 15 DÍAS', 0, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Protoformas`
--

CREATE TABLE `Protoformas` (
  `Nombre` varchar(20) NOT NULL,
  `Login` varchar(15) NOT NULL,
  `VLingüistica` varchar(20) NOT NULL,
  `VTemporal` varchar(20) NOT NULL,
  `QLingüístico` varchar(20) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0,
  `TLinguistico` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Protoformas`
--

INSERT INTO `Protoformas` (`Nombre`, `Login`, `VLingüistica`, `VTemporal`, `QLingüístico`, `borrado`, `TLinguistico`) VALUES
('', 'admin', 'TEMPERATURA CORPORAL', 'DURANTE LA MAÑANA', '', 1, 'ALTA'),
('45 ER', 'admin', 'HUMEDAD', 'DURANTE LA MAÑANA', '', 1, 'ALTA'),
('MOJON', 'admin', 'TEMPERATURA CORPORAL', 'DURANTE LA MAÑANA', '', 1, 'MUY'),
('OTRA MIERDA', 'admin', 'TEMPERATURA CORPORAL', 'DURANTE LA MAÑANA', '', 1, 'MUY'),
('P-GMBDLN', 'admin', 'NIVEL GLUCOSA', 'DURANTE LA NOCHE', '', 0, 'MUY BAJA'),
('P-TMADLM', 'admin', 'TEMPERATURA CORPORAL', 'DURANTE LA MAÑANA', '', 0, 'MUY ALTA'),
('PARA BORRAR', 'admin', 'TEMPERATURA CORPORAL', 'DURANTE LA MAÑANA', '', 1, 'MUY'),
('salmon fresco', 'admin', 'TEMPERATURA CORPORAL', 'DURANTE LA MAÑANA', '', 1, 'MUY ALTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sensores`
--

CREATE TABLE `Sensores` (
  `ID_Sensor` varchar(15) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Login` varchar(15) NOT NULL,
  `Borrado` int(11) NOT NULL DEFAULT 0,
  `max` double NOT NULL,
  `min` double NOT NULL,
  `intervalos` double NOT NULL,
  `tmuestra` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Sensores`
--

INSERT INTO `Sensores` (`ID_Sensor`, `Descripcion`, `Login`, `Borrado`, `max`, `min`, `intervalos`, `tmuestra`) VALUES
('F4 DR', 'SENSOR CACHONDO', 'admin', 1, 2, 2, 2, 0),
('ffff', 'a', 'admin', 1, 3, 3, 3, 0),
('gg', 'as', 'admin', 1, 2, 2, 3, 3),
('S1', 'Sensor Temperatura Paciente', 'admin', 0, 43, 34, 0.1, 900),
('S2', 'Sensor Glucosa', 'admin', 0, 400, 15, 10, 3600),
('S3', 'Sensor de humedad', 'admin', 0, 0, 0, 0, 0),
('S4', 'Sensor CO2', 'admin', 0, 0, 0, 0, 0),
('S44', 'AGUA SALIDA', 'admin', 1, 0, 0, 0, 0),
('S5', 'DDDD', 'admin', 1, 89.2, 35, 0.3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TérminosLingüísticos`
--

CREATE TABLE `TérminosLingüísticos` (
  `NombreT` varchar(20) NOT NULL,
  `NombreVL` varchar(20) NOT NULL,
  `Login` varchar(15) NOT NULL,
  `A` float NOT NULL,
  `B` float NOT NULL,
  `C` float NOT NULL,
  `D` float NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `TérminosLingüísticos`
--

INSERT INTO `TérminosLingüísticos` (`NombreT`, `NombreVL`, `Login`, `A`, `B`, `C`, `D`, `borrado`) VALUES
('AGUA FRIA', 'ALTURA', 'admin', 3.2, 4.5, 6.7, 3.8, 0),
('AGUA SALADA', 'ALTURA', 'admin', 4, 5, 67, 7, 0),
('ALTA', 'HUMEDAD', 'admin', 3, 4, 5, 6, 0),
('ALTA', 'NIVEL GLUCOSA', 'admin', 105, 150, 150, 200, 0),
('ALTA', 'TEMPERATURA CORPORAL', 'admin', 37.2, 37.8, 37.8, 38.5, 0),
('BAJA', 'NIVEL GLUCOSA', 'admin', 60, 75, 75, 90, 0),
('BAJA', 'TEMPERATURA CORPORAL', 'admin', 34, 34, 36, 36.8, 0),
('JAU', 'HUMEDAD', 'admin', 3, 4, 5, 6, 0),
('MUY ALTA', 'NIVEL GLUCOSA', 'admin', 190, 250, 400, 400, 0),
('MUY ALTA', 'TEMPERATURA CORPORAL', 'admin', 38.1, 41.2, 43, 43, 0),
('MUY BAJA', 'NIVEL GLUCOSA', 'admin', 15, 15, 60, 65, 0),
('NORMAL', 'NIVEL GLUCOSA', 'admin', 85, 105, 105, 110, 0),
('NORMAL', 'TEMPERATURA CORPORAL', 'admin', 36, 36.8, 36.8, 37.4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `Login` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0,
  `Tipo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`Login`, `Password`, `Nombre`, `Apellidos`, `Email`, `borrado`, `Tipo`) VALUES
('achili', '---', 'dd', 'd', 'd', 1, 0),
('admin', '---', 'Francisco', 'Martínez Mimbrera', 'fjmimbre@ujaen.es', 0, 1),
('dzafra', '---', 'Daniel', 'Zafra Romero', 'dzafra@ujaen.es', 0, 0),
('fjmimbre', '---', 'Francisco Jesús', 'Martínez Mimbrera', 'fjmimbre@ujaen.es', 0, 0),
('mdamas', '---', 'Miguel', 'Damas Hermoso', 'mdamas@ugr.es', 0, 0),
('mestevez', '---', 'Macarena', 'Espinilla Estévez', 'mestevez@ujaen.es', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VariablesLingüísticas`
--

CREATE TABLE `VariablesLingüísticas` (
  `Nombre` varchar(20) NOT NULL,
  `Login` varchar(15) NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `VariablesLingüísticas`
--

INSERT INTO `VariablesLingüísticas` (`Nombre`, `Login`, `borrado`) VALUES
('ALTURA', 'Admin', 0),
('HUMEDAD', 'Admin', 0),
('NIVEL GLUCOSA', 'admin', 0),
('POLLA', 'admin', 1),
('PRESIÓN', 'admin', 0),
('TEMPERATURA', 'Admin', 1),
('TEMPERATURA CORPORAL', 'admin', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VentanasTemporales`
--

CREATE TABLE `VentanasTemporales` (
  `NVentana` varchar(20) NOT NULL,
  `Login` varchar(15) NOT NULL,
  `Tiempo` float NOT NULL DEFAULT 0,
  `A` double NOT NULL,
  `B` double NOT NULL,
  `C` double NOT NULL,
  `D` double NOT NULL,
  `borrado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `VentanasTemporales`
--

INSERT INTO `VentanasTemporales` (`NVentana`, `Login`, `Tiempo`, `A`, `B`, `C`, `D`, `borrado`) VALUES
('AYER POR LA TARDE', 'admin', 0, 2, 2, 22, 2, 1),
('DURANTE LA MAÑANA', 'admin', 86400, 28800, 39600, 46800, 57600, 0),
('DURANTE LA NOCHE', 'admin', 86400, 0, 14400, 21600, 28800, 0),
('SALSA LA PERRA', 'admin', 6, 2, 3, 4, 5, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ConjuntosDatos`
--
ALTER TABLE `ConjuntosDatos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `CuantificadoresLingüísticos`
--
ALTER TABLE `CuantificadoresLingüísticos`
  ADD PRIMARY KEY (`Nombre`,`Login`);

--
-- Indices de la tabla `MarcoDeTrabajo`
--
ALTER TABLE `MarcoDeTrabajo`
  ADD PRIMARY KEY (`ID_CD`,`ID_Problema`,`NombreP`,`Login`,`ID_SENSOR`);

--
-- Indices de la tabla `Problemas`
--
ALTER TABLE `Problemas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Protoformas`
--
ALTER TABLE `Protoformas`
  ADD PRIMARY KEY (`Nombre`,`Login`,`VLingüistica`,`VTemporal`,`QLingüístico`) USING BTREE;

--
-- Indices de la tabla `Sensores`
--
ALTER TABLE `Sensores`
  ADD PRIMARY KEY (`ID_Sensor`);

--
-- Indices de la tabla `TérminosLingüísticos`
--
ALTER TABLE `TérminosLingüísticos`
  ADD PRIMARY KEY (`NombreT`,`NombreVL`,`Login`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`Login`);

--
-- Indices de la tabla `VariablesLingüísticas`
--
ALTER TABLE `VariablesLingüísticas`
  ADD PRIMARY KEY (`Nombre`,`Login`);

--
-- Indices de la tabla `VentanasTemporales`
--
ALTER TABLE `VentanasTemporales`
  ADD PRIMARY KEY (`NVentana`,`Login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ConjuntosDatos`
--
ALTER TABLE `ConjuntosDatos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `Problemas`
--
ALTER TABLE `Problemas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
