-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2021 a las 23:36:19
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
CREATE DATABASE IF NOT EXISTS `ofertas_trabajo_daw1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ofertas_trabajo_daw1`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(5, 'Ciencia e Ingeniería'),
(4, 'Construcción'),
(7, 'Contabilidad y Finanzas'),
(1, 'Hostelería'),
(2, 'Informática y TI'),
(8, 'Oficiales Administrativos'),
(3, 'Sanidad'),
(6, 'Ventas y Marketing');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demandante`
--

CREATE TABLE `demandante` (
  `id_demandante` varchar(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(19) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `fecha_nac` varchar(12) NOT NULL,
  `formacion_academica` varchar(500) NOT NULL,
  `formacion_profesional` varchar(500) NOT NULL,
  `datos_de_interes` varchar(500) NOT NULL,
  `avatar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `demandante`
--

INSERT INTO `demandante` (`id_demandante`, `id_usuario`, `nombre`, `dni`, `email`, `fecha_nac`, `formacion_academica`, `formacion_profesional`, `datos_de_interes`, `avatar`) VALUES
('dem_1', 2, 'demandante1', '010121A', 'cliente1@daw.es', '1998-12-12', 'Diploma Equivalente de Preparatoria GED <br/>\r\nRichland One Adult Education Center, 2012<br/>\r\nPreparatoria Spring Valley, Columbia, SC<br/>\r\nAsistí de 2008 - 2013', 'Trabajé en xxxxxx <br/>\r\nEstuve de prácticas en la universidad de Murcia, 2015<br/>\r\nProfesor de inglés, Columbia, SC<br/>', 'Amable, dinámico y trabajador', 'dem_1_avatar.jpeg'),
('dem_8', 8, 'demandante2', '101010F', 'cliente2@daw.es', '1995-01-20', '', '', '', 'dem_8_avatar.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` varchar(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cif` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `id_usuario`, `email`, `cif`) VALUES
('emp_1', 3, 'mar@daw.es', 'B-36266'),
('emp_5', 5, 'empresa3@daw.es', 'B-3265'),
('emp_6', 6, 'cotec@daw.es', '0D4113');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos`
--

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
(6, 'Conductor', 'dem_1', 'emp_1'),
(2, 'Comercial de telefonía', 'dem_8', 'emp_1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_oferta` int(10) NOT NULL,
  `id_empresa` varchar(10) NOT NULL,
  `titulo_oferta` varchar(50) NOT NULL,
  `oferta` varchar(1000) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `salario` int(10) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_oferta`, `id_empresa`, `titulo_oferta`, `oferta`, `ciudad`, `categoria`, `salario`, `fecha`) VALUES
(2, 'emp_1', 'Comercial de telefonía', 'Se busca un empleado para trabajar como un comercial de telefonia.SL, se Requiere disponobilidad inmediata y con ganas de trabajar.', 'Zamora', 'Ventas y Marketing', 1100, '2021-01-31'),
(4, 'emp_1', 'Cocinero', 'Se busca un cocinero o chef de cocina con diploma y experienca de más 5 años', 'Salamanca', 'Hostelería', 1200, '2021-01-28'),
(5, 'emp_1', 'Funcionario', 'Se ofrece un puesto de Funcionario', 'Madrid ', 'Oficiales Administra', 1200, '2021-01-28'),
(6, 'emp_1', 'Conductor', 'Se busca un conductor, experiencia de más 5 años', 'Salamanca', 'Oficiales de primera', 1100, '2021-01-28'),
(7, 'emp_6', 'Enfermera Auxiliar', 'Se busca una enfermera para un centro de salud en Galicia', 'Vigo', 'Sanidad', 1100, '2021-01-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

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
(3, 'empresa', 'mar.sl', 'mar@daw.es', 'marsl'),
(5, 'empresa', 'empresa3', 'empresa3@daw.es', 'empresa3'),
(6, 'empresa', 'cotec', 'cotec@daw.es', 'cotec1'),
(8, 'cliente', 'demandante2', 'cliente2@daw.es', 'cliente2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id_valoracion` int(10) NOT NULL,
  `id_demandante` varchar(10) NOT NULL,
  `id_empresa` varchar(10) NOT NULL,
  `titulo_valoracion` varchar(30) NOT NULL,
  `texto_valoracion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id_valoracion`, `id_demandante`, `id_empresa`, `titulo_valoracion`, `texto_valoracion`) VALUES
(1, 'dem_1', 'emp_1', 'No recomendada', 'No recomiendo esta oferta'),
(2, 'dem_1', 'emp_6', 'Me gusta el trato al personal', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombre_categoria` (`nombre_categoria`);

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id_valoracion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;