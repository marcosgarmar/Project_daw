-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-01-2021 a las 01:48:59
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ofertas_trabajo_daw1`
--
CREATE DATABASE IF NOT EXISTS `ofertas_trabajo_daw1` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ofertas_trabajo_daw1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demandante`
--

DROP TABLE IF EXISTS `demandante`;
CREATE TABLE `demandante` (
  `id_demandante` varchar(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `demandante`
--

INSERT INTO `demandante` (`id_demandante`, `id_usuario`, `email`) VALUES
('dem_1', 2, 'cliente1@daw.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE `empresas` (
  `id_empresa` varchar(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `id_usuario`, `email`) VALUES
('emp_1', 3, 'mar@daw.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

DROP TABLE IF EXISTS `inscritos`;
CREATE TABLE `inscritos` (
  `id_oferta` int(11) NOT NULL,
  `titulo_oferta` varchar(30) NOT NULL,
  `id_dem` varchar(10) NOT NULL,
  `id_emp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscritos`
--

INSERT INTO `inscritos` (`id_oferta`, `titulo_oferta`, `id_dem`, `id_emp`) VALUES
(2, 'Comercial de telefonía', 'dem_1', 'emp_1'),
(5, 'Funcionario', 'dem_1', 'emp_1'),
(6, 'Conductor', 'dem_1', 'emp_1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

DROP TABLE IF EXISTS `ofertas`;
CREATE TABLE `ofertas` (
  `id_oferta` int(10) NOT NULL,
  `id_empresa` varchar(10) NOT NULL,
  `titulo_oferta` varchar(50) NOT NULL,
  `oferta` varchar(1000) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `salario` int(10) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_oferta`, `id_empresa`, `titulo_oferta`, `oferta`, `ciudad`, `categoria`, `salario`, `fecha`) VALUES
(2, 'emp_1', 'Comercial de telefonía', 'Se busca un empleado para trabajar como un comercial de telefonia.SL, se Requiere disponobilidad inmediata y con ganas de trabajar.', 'Zamora', 'fijo', 1100, '2021-01-28'),
(4, 'emp_1', 'Cocinero', 'Se busca un cocinero o chef de cocina con diploma y experienca de más 5 años', 'Salamanca', 'fijo', 1200, '2021-01-28'),
(5, 'emp_1', 'Funcionario', 'Se ofrece un puesto de Funcionario', 'Madrid ', 'fijo', 1200, '2021-01-28'),
(6, 'emp_1', 'Conductor', 'Se busca un conductor, experiencia de más 5 años', 'Salamanca', 'temporal', 1100, '2021-01-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `nombre_usuario`, `email`, `password`) VALUES
(1, 'admin', 'administrador', 'admin@daw.es', 'admin'),
(2, 'cliente', 'demandante1', 'cliente1@daw.es', 'cliente1'),
(3, 'empresa', 'mar.sl', 'mar@daw.es', 'marsl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

DROP TABLE IF EXISTS `valoraciones`;
CREATE TABLE `valoraciones` (
  `id_valoracion` int(10) NOT NULL,
  `id_demandante` int(10) NOT NULL,
  `id_empresa` int(10) NOT NULL,
  `titulo_valoracion` varchar(30) NOT NULL,
  `texto_valoracion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `demandante`
--
ALTER TABLE `demandante`
  ADD PRIMARY KEY (`id_demandante`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id_valoracion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id_valoracion` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
