-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2016 a las 00:15:22
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portalweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDusuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` int(100) NOT NULL,
  `dni` int(10) UNSIGNED NOT NULL,
  `telefono` int(11) UNSIGNED NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `edad` tinyint(3) UNSIGNED NOT NULL,
  `ciudad` varchar(11) NOT NULL,
  `departamento` varchar(13) NOT NULL,
  `imagen` varchar(40) NOT NULL,
  `fecha` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDusuario`, `nombre`, `apellido`, `email`, `contrasena`, `dni`, `telefono`, `direccion`, `edad`, `ciudad`, `departamento`, `imagen`, `fecha`) VALUES
(0, 'José', 'Rodriguez', 'testinh@test.pe', 123456, 49494949, 5333521, 'Av.Industrial 7118', 23, 'San Martin ', 'Lima', 'fotos/jose/profile.jpg', 1481402025),
(2, 'Marciano', 'Zubilete', 'marciano.zubilete5@gmail.com', 123456789, 929292, 5555, 'Av. Los ceresos', 66, 'Ancash', 'Ancash', 'fotos/Marciano/profile.jpg', 1481402080),
(5, 'carolina', 'Chavista', 'chavista@celerix.com', 0, 98289282, 66666, 'Av.nosequexD', 23, 'Lima', 'Lima', 'fotos/carolina/profile.jpg', 1481402093),
(6, 'jose', 'Rodriguez', 'jose@gmail.com', 123456789, 66666666, 987526657, 'Av.Industrial 7645', 23, 'Lima', 'Lima', 'fotos/jose/profile.jpg', 1481402110);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDusuario`),
  ADD UNIQUE KEY `dni_unico` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
