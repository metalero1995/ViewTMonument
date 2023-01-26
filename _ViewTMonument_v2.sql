-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2022 a las 03:25:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vtm1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `id_estado`, `id_pais`, `nombre`, `descripcion`) VALUES
(1, 1, 1, 'Chetumal', 'Es una ciudad que pertenece al estado de Quintana Roo'),
(2, 1, 1, 'Cancún', 'Es una ciudad que pertenece al estado de Quintana Roo'),
(3, 1, 1, 'Tulum', 'Es una ciudad que pertenece al estado de Quintana Roo'),
(4, 2, 1, 'Mérida', 'Es una ciudad que pertenece al estado de Yucatán'),
(5, 3, 1, 'Tapachula', 'Es una ciudad que pertenece al estado de Chiapas'),
(6, 4, 1, 'Guadalajara', 'Es una ciudad que pertenece al estado de Jalisco'),
(7, 5, 2, 'Florencia', 'Es una ciudad que pertenece a la provincia de Roma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_monumento` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `valoracion` varchar(5) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_monumento`, `titulo`, `valoracion`, `descripcion`) VALUES
(1, 2, 3, 'Lo he visitado', '5', 'Un muy bonito lugar para visitar'),
(2, 3, 1, 'Disgustado', '2', 'Hay demasiada basura tirada'),
(3, 4, 4, 'Felicidad absoluta', '5', 'De los mejores lugares que he visitado'),
(4, 5, 2, 'Podria ser mejor', '3', 'Mucho trafico, no se puede cruzar la calle para llegar a la fuente'),
(5, 5, 3, 'Encantado', '5', 'Volveria a venir mil veces'),
(6, 3, 5, 'No me gusto', '1', 'Le falta un arreglo, ya que esta muy despintado'),
(7, 5, 4, 'Muy bonito', '5', 'Un buen lugar para pasar con la familia'),
(8, 4, 5, 'Impresionante', '5', 'Me gusto demasiado visitar este monumento, muy bonito'),
(9, 5, 4, 'Muy bonito', '5', 'Un buen lugar para pasar con la familia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delimitacion`
--

CREATE TABLE `delimitacion` (
  `id_delimitacion` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `latitud` varchar(50) NOT NULL,
  `longitud` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `delimitacion`
--

INSERT INTO `delimitacion` (`id_delimitacion`, `id_ciudad`, `latitud`, `longitud`) VALUES
(1, 1, '18.51759912059347', '-88.30134607498888'),
(2, 2, '21.166157868901806', '-86.85232588208274'),
(3, 3, '20.20929694621416', '-87.46921536252009'),
(4, 4, '20.973914640062382', '-89.63053769575826'),
(5, 5, '14.895761888755178', '-92.26972253194326'),
(6, 6, '20.661249818475127', '-103.34914869610502'),
(7, 7, '43.78588558637496', '11.232039491236556');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `id_pais`, `nombre`, `descripcion`) VALUES
(1, 1, 'Quintana Roo', 'Es un estado que pertenece al país de México'),
(2, 1, 'Yucatán', 'Es un estado que pertenece al país de México'),
(3, 1, 'Chiapas', 'Es un estado que pertenece al país de México'),
(4, 1, 'Jalisco', 'Es un estado que pertenece al país de México'),
(5, 2, 'Roma', 'Es una provincia que pertenece al país de Italia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagenes` int(11) NOT NULL,
  `id_monumento` int(11) NOT NULL,
  `url` text NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagenes`, `id_monumento`, `url`, `descripcion`, `tipo`) VALUES
(1, 1, 'https://previews.dropbox.com/p/thumb/ABkbEhbkSQAB6oYw3M3UChZ_Yzuk5v1AXDqfZxrRJtlvijSQ4nMTZv05HcvkdaHqcmH-dQWXXzwGXP_tQwrJ06n6iMYXeT-4vkihq2KiO0fvNaCtBeVrLO5ByJXNqSTh-dDKqQYiXVlMRUub0RyXblBeiGcYIdJQoovnopqpNwX56fGxnC1YOuix_dXd-_ZdENGMXNCxjVKMRnBljqfHyondkBZh2E7AHzABkxxjZPgHuL7zE-Yi7x0H_RuaI4J8axKJjkmixYuPOEtYJ5ZPL0Z2UdmHJwDbe6Ghom8fwUnX6AfaKCQZKajGrGNNNtiMzLD8gdbY_Vvr7VM_3nz8co-UtydmPkxwS0joCpAuQf6mpva3TTpX9QSwqp4q5cxX2sk/p.jpeg', 'Renacimiento', 0),
(2, 1, 'url', 'Renacimiento', 1),
(3, 2, 'https://drive.google.com/file/d/1mlrTR_y0qABIXHm_KGUIXUdqM1T2X7BI/view?usp=sharing', 'Fuente Maya', 0),
(4, 3, 'https://drive.google.com/file/d/1dAa1P3xZoDRoDdANVAArwW70oyQfFwHH/view?usp=sharing', 'Fusión de las Razas', 0),
(5, 4, 'https://drive.google.com/file/d/1lZbDgZ0cL79a1f7YE0SgLRhQnPqGDvbO/view?usp=sharing', 'Fuente del Pescador', 0),
(6, 4, 'URL', 'Fuente del Pescador', 1),
(7, 4, 'URL', 'Fuente del Pescador', 2),
(8, 5, 'https://previews.dropbox.com/p/thumb/ABkr4KRyLZZpr4-JN-h-jzviAX28oVFYiPLUt-A7khl-3grl6hvwuw5NLAWU8AKtV1bjGglLmvMYkGrWwE2A1m-DRcwOb6ylYcNnmSuWtZHFaSAzs7UcwG5J2vfHAJmQ9y3aupkedM787BEzOGIpaMWazgXBd7_uU9ux-v-kkm5s5HW0XyFx5uMIMjJ5Z7gfEHK9uVzo7IX8KKm4DhYZk9iHpUgmUmPCGbTcfQYohuMRER0JDLk6zoBDn_McX33rh3nMz3omIT97RNFxyaXa-fuC4pcB-Q7_joN53nAgPA0NJK0qZMaJeIGYZEUmnNyFpckuhwJdWxmLt1HrXm_fQ1n-QR8FTaISVp3Vf8ChYIQNjCRK6G1fSCOBsNauWfIq9Z1xBKkQ0jnJvmnVSnCLU4Po/p.jpeg', 'Obelisco a la Bandera', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interaccion`
--

CREATE TABLE `interaccion` (
  `id_usuario` int(11) NOT NULL,
  `id_monumento` int(11) NOT NULL,
  `visto` varchar(100) NOT NULL,
  `consultado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `interaccion`
--

INSERT INTO `interaccion` (`id_usuario`, `id_monumento`, `visto`, `consultado`) VALUES
(2, 3, '1', '1'),
(3, 1, '1', '1'),
(4, 4, '1', '0'),
(5, 2, '1', '1'),
(5, 3, '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monumento`
--

CREATE TABLE `monumento` (
  `id_monumento` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `anio` varchar(4) NOT NULL,
  `tipo` varchar(16) NOT NULL,
  `modelado_3d_hp` text NOT NULL,
  `modelado_3d_lp` text NOT NULL,
  `latitud` varchar(50) NOT NULL,
  `longitud` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `monumento`
--

INSERT INTO `monumento` (`id_monumento`, `id_ciudad`, `nombre`, `descripcion`, `anio`, `tipo`, `modelado_3d_hp`, `modelado_3d_lp`, `latitud`, `longitud`) VALUES
(1, 1, 'Remacimiento', 'Representa al huracán Janet, que lleva en sus brazos un recién nacido', '1998', 'Monumento', 'URL', 'URL', '18.493995808078544', '-88.30253594476476'),
(2, 1, 'Fuente Maya', 'Simboliza al Kuchkabal (es el nombre que daban los mayas a las comarcas', '1964', 'Fuente', 'URL', 'URL', '18.50461437023193', '-88.31601421778429'),
(3, 1, 'Fusión de las Razas', 'Los chetumaleños lo conocen como el monumento Cuna del Mestizaje, pero el nombre que le asignó la artista Rosa María Ponzanelli es Fusión de las Razas', '1996', 'Monumento', 'URL', 'URL', '18.51878580045102', '-88.38136196193014'),
(4, 1, 'Fuente del Pescador', 'Representa a un pescador al momento de recoger sus redes', '1996', 'Estatua', 'URL', 'URL', '18.493005335698815', '-88.29494553127458'),
(5, 1, 'Obelisco a la Bandera', 'Considerado como la expresión de la identidad mexicana en la lejana frontera sur', '1943', 'Monumento', 'URL', 'URL', '18.493346837817892', '-88.29752786221555');

--
-- Disparadores `monumento`
--
DELIMITER $$
CREATE TRIGGER `borrar_comentario_monumento` AFTER DELETE ON `monumento` FOR EACH ROW DELETE FROM comentarios WHERE id_monumento = OLD.id_monumento
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre`, `descripcion`) VALUES
(1, 'México', 'Es un país que pertenece al continente americano'),
(2, 'Italia', 'Es un país que pertenece al continente europeo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `Id` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Asunto` varchar(50) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido_p` varchar(30) NOT NULL,
  `apellido_m` varchar(30) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasenia` varchar(224) NOT NULL,
  `telefono` varchar(16) NOT NULL,
  `tipo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido_p`, `apellido_m`, `correo`, `contrasenia`, `telefono`, `tipo`) VALUES
(1, 'administrador', 'administrador', 'administrador', 'admin@admin.com.mx', 'ed8858b6461e64bd6d1a561e08343db7f9a50a560eb2cfa02a3b5c2c', '9831580662', '1'),
(2, 'Jeroan', 'Rosas', 'Loeza', '8121110027@utchetumal.edu.mx', 'd14a028c2a3a2bc9476102bb288234c415a2b01f828ea62ac5b3e42f', '9831026564', '2'),
(3, 'Leonardo', 'Pasos', 'Carrillo', '8121110028@utchetumal.edu.mx', 'd14a028c2a3a2bc9476102bb288234c415a2b01f828ea62ac5b3e42f', '9831234567', '2'),
(4, 'Jose', 'Olvera', 'Pech', '8121110029@utchetumal.edu.mx', 'd14a028c2a3a2bc9476102bb288234c415a2b01f828ea62ac5b3e42f', '9832536748', '2'),
(5, 'Raul', 'De la Rosa', 'Gamboa', '8121110030@utchetumal.edu.mx', 'd14a028c2a3a2bc9476102bb288234c415a2b01f828ea62ac5b3e42f', '9837278234', '2'),
(6, 'prueba', 'prueba', 'prueba', '1@1.com', '1', '1', '1');

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `borrar_comentario_usuario` AFTER DELETE ON `usuarios` FOR EACH ROW DELETE FROM comentarios WHERE id_usuario = OLD.id_usuario
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_monumento` (`id_monumento`);

--
-- Indices de la tabla `delimitacion`
--
ALTER TABLE `delimitacion`
  ADD PRIMARY KEY (`id_delimitacion`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagenes`),
  ADD KEY `id_monumento` (`id_monumento`);

--
-- Indices de la tabla `interaccion`
--
ALTER TABLE `interaccion`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_monumento` (`id_monumento`);

--
-- Indices de la tabla `monumento`
--
ALTER TABLE `monumento`
  ADD PRIMARY KEY (`id_monumento`),
  ADD KEY `id_ciudad` (`id_ciudad`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `delimitacion`
--
ALTER TABLE `delimitacion`
  MODIFY `id_delimitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagenes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `monumento`
--
ALTER TABLE `monumento`
  MODIFY `id_monumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `id_ciudad_fk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_ciudad_fk_3` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `id_monumento_fk` FOREIGN KEY (`id_monumento`) REFERENCES `monumento` (`id_monumento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `delimitacion`
--
ALTER TABLE `delimitacion`
  ADD CONSTRAINT `id_ciudad_fk_4` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estado`
--
ALTER TABLE `estado`
  ADD CONSTRAINT `id_pais_fk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `id_monumento_fk_3` FOREIGN KEY (`id_monumento`) REFERENCES `monumento` (`id_monumento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `interaccion`
--
ALTER TABLE `interaccion`
  ADD CONSTRAINT `id_monumento_fk_2` FOREIGN KEY (`id_monumento`) REFERENCES `monumento` (`id_monumento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario_fk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `monumento`
--
ALTER TABLE `monumento`
  ADD CONSTRAINT `id_ciudad_fk` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
