-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2016 a las 22:30:26
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
  `fecha` int(10) UNSIGNED NOT NULL,
  `rol` enum('administrador','registrados') NOT NULL DEFAULT 'registrados'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDusuario`, `nombre`, `apellido`, `email`, `contrasena`, `dni`, `telefono`, `direccion`, `edad`, `ciudad`, `departamento`, `imagen`, `fecha`, `rol`) VALUES
(1, 'Jose', 'Rodriguez', 'jose@gmail.com', 123456789, 456482212, 5454521, 'Alvarado', 20, 'Lima', 'Lima', 'fotos/1/jose/profile.jpg', 54545421, 'administrador'),
(2, 'jose', 'Mercurio', '234234@gmail.com', 123456791, 456482213, 5454522, 'Mercurio', 55, 'Lima', 'Lima', 'none', 54545423, 'registrados'),
(3, 'marco', 'Huazon', '2122312', 123456793, 456482214, 5454523, 'Huazon', 55, 'Lima', 'Lima', 'none', 54545425, 'registrados'),
(4, 'abelardo', 'navarrete', '2122317', 123456795, 456482215, 5454524, 'navarrete', 31, 'Lima', 'Lima', 'none', 54545427, 'registrados'),
(5, 'marco', 'Lincon', '2122322', 123456797, 456482216, 5454525, 'Lincon', 49, 'Lima', 'Lima', 'none', 54545429, 'registrados'),
(6, 'marco', 'Venus', '2122327', 123456799, 456482217, 5454526, 'Venus', 52, 'Lima', 'Lima', 'none', 54545431, 'registrados'),
(7, 'Maria', 'Alvarado', '2122332', 123456801, 456482218, 5454527, 'Alvarado', 55, 'Lima', 'Lima', 'none', 54545433, 'registrados'),
(8, 'jose', 'Mercurio', '2122337', 123456803, 456482219, 5454528, 'Mercurio', 58, 'Lima', 'Lima', 'none', 54545435, 'registrados'),
(9, 'marco', 'Huazon', '2122342', 123456805, 456482220, 5454529, 'Huazon', 62, 'Lima', 'Lima', 'none', 54545437, 'registrados'),
(10, 'abelardo', 'navarrete', '2122347', 123456807, 456482221, 5454530, 'navarrete', 65, 'Lima', 'Lima', 'none', 54545439, 'registrados'),
(11, 'marco', 'Lincon', '2122352', 123456809, 456482222, 5454531, 'Lincon', 68, 'Lima', 'Lima', 'none', 54545441, 'registrados'),
(12, 'marco', 'Venus', '2122357', 123456811, 456482223, 5454532, 'Venus', 72, 'Lima', 'Lima', 'none', 54545443, 'registrados'),
(13, 'Maria', 'Alvarado', '2122362', 123456813, 456482224, 5454533, 'Alvarado', 75, 'Lima', 'Lima', 'none', 54545445, 'registrados'),
(14, 'jose', 'Mercurio', '2122367', 123456815, 456482225, 5454534, 'Mercurio', 78, 'Lima', 'Lima', 'none', 54545447, 'registrados'),
(15, 'marco', 'Huazon', '2122372', 123456817, 456482226, 5454535, 'Huazon', 82, 'Lima', 'Lima', 'none', 54545449, 'registrados'),
(16, 'abelardo', 'navarrete', '2122377', 123456819, 456482227, 5454536, 'navarrete', 85, 'Lima', 'Lima', 'none', 54545451, 'registrados'),
(17, 'marco', 'Lincon', '2122382', 123456821, 456482228, 5454537, 'Lincon', 88, 'Lima', 'Lima', 'none', 54545453, 'registrados'),
(18, 'Maria', 'Venus', '2122387', 123456823, 456482229, 5454538, 'Venus', 91, 'Lima', 'Lima', 'none', 54545455, 'registrados'),
(19, 'jose', 'Alvarado', '2122392', 123456825, 456482230, 5454539, 'Alvarado', 95, 'Lima', 'Lima', 'none', 54545457, 'registrados'),
(20, 'marco', 'Mercurio', '2122397', 123456827, 456482231, 5454540, 'Mercurio', 98, 'Lima', 'Lima', 'none', 54545459, 'registrados'),
(21, 'abelardo', 'Huazon', '2122402', 123456829, 456482232, 5454541, 'Huazon', 101, 'Lima', 'Lima', 'none', 54545461, 'registrados'),
(22, 'marco', 'navarrete', '2122407', 123456831, 456482233, 5454542, 'navarrete', 105, 'Lima', 'Lima', 'none', 54545463, 'registrados'),
(23, 'marco', 'Lincon', '2122412', 123456833, 456482234, 5454543, 'Lincon', 108, 'Lima', 'Lima', 'none', 54545465, 'registrados'),
(24, 'Maria', 'Venus', '2122417', 123456835, 456482235, 5454544, 'Venus', 111, 'Lima', 'Lima', 'none', 54545467, 'registrados');

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
  MODIFY `IDusuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
