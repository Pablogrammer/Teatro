


--
-- Base de datos: `teatro`
--

CREATE DATABASE 'teatro';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butacas`
--

CREATE TABLE `butacas` (
  `id` int(255) NOT NULL,
  `usuario_id` int(255) NOT NULL DEFAULT 0,
  `fila` varchar(100) NOT NULL,
  `columna` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `butacas`
--

INSERT INTO `butacas` (`id`, `usuario_id`, `fila`, `columna`, `estado`) VALUES
(1, 1, '1', '1', 'ocupado'),
(2, 1, '1', '2', 'ocupado'),
(3, 0, '1', '3', 'libre'),
(4, 0, '1', '4', 'libre'),
(5, 0, '1', '5', 'libre'),
(6, 0, '2', '1', 'libre'),
(7, 0, '2', '2', 'libre'),
(8, 0, '2', '3', 'libre'),
(9, 2, '2', '4', 'ocupado'),
(10, 2, '2', '5', 'ocupado'),
(11, 0, '3', '1', 'libre'),
(12, 0, '3', '2', 'libre'),
(13, 3, '3', '3', 'ocupado'),
(14, 3, '3', '4', 'ocupado'),
(15, 3, '3', '5', 'ocupado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(5, 'pablo', 'pablo.cid.olmos@gmail.com', '$2y$04$H3mf383yCBcS2Ds.K0k6geaEC59.iJWvNNKHygfzR7bPSDz6.O93y'),  --password: Pablo_123


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `butacas`
--
ALTER TABLE `butacas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_butaca_usuario` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `butacas`
--
ALTER TABLE `butacas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `butacas`
--
ALTER TABLE `butacas`
  ADD CONSTRAINT `fk_butaca_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

