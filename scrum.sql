-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-12-2018 a las 20:10:19
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scrum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL,
  `cod_project` int(11) NOT NULL,
  `name_project` varchar(30) NOT NULL,
  `description` varchar(40) NOT NULL,
  `product_owner` varchar(20) NOT NULL,
  `scrum_master` varchar(20) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `comments` varchar(40) NOT NULL,
  `budget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id_project`, `cod_project`, `name_project`, `description`, `product_owner`, `scrum_master`, `date_start`, `date_finish`, `comments`, `budget`) VALUES
(1, 10, '¿Quién es Quién?', '¿Quien será? Adivina la carta.', 'emieza', 'lzabala', '2018-12-03', '2018-12-03', '', 20000),
(2, 20, 'Gestor de Proyectos SCRUM', '¿SCRUM? ¿Eso se come?', 'emieza', 'lzabala', '2018-12-03', '2018-12-03', '', 30000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proj_users`
--

CREATE TABLE `proj_users` (
  `id_proj_user` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `cod_project` int(11) NOT NULL,
  `name_proj` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proj_users`
--

INSERT INTO `proj_users` (`id_proj_user`, `user`, `cod_project`, `name_proj`) VALUES
(1, 'lzabala', 10, '¿Quién es Quién?'),
(2, 'emieza', 10, '¿Quién es Quién?'),
(3, 'ksedano', 10, '¿Quién es Quién?'),
(4, 'xusbcn', 20, 'Gestor de Proyectos SCRUM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specifications`
--

CREATE TABLE `specifications` (
  `id_specification` int(11) NOT NULL,
  `cod_specification` int(11) NOT NULL,
  `cod_project` int(11) NOT NULL,
  `name_specification` varchar(60) NOT NULL,
  `description` varchar(200) NOT NULL,
  `comments` varchar(40) NOT NULL,
  `hours` int(11) NOT NULL,
  `date` date NOT NULL,
  `completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `specifications`
--

INSERT INTO `specifications` (`id_specification`, `cod_specification`, `cod_project`, `name_specification`, `description`, `comments`, `hours`, `date`, `completed`) VALUES
(1, 1, 10, 'Caracteristicas personaje', 'Configuraremos las caracteristicas de los personajes en el archivo config.txt', '', 1, '2018-12-03', 0),
(2, 2, 10, 'Una caracteristica por linea', 'Las caracteristicas tienen que estar divididas en lineas, una caracteristica por linea.', '', 2, '2018-12-03', 0),
(3, 3, 10, 'Archivo configuración images.txt', 'Dispondremos de un segundo archivo de configuración, contendrá las imagenes con sus caracteristicas.', '', 3, '2018-12-03', 0),
(4, 1, 20, 'Diseño y Analisis', 'Diseño y Analisis de la Base de Datos.', '', 6, '2018-12-03', 0),
(5, 2, 20, 'Usuarios y Permisos', 'Habrán distintos permisos de usuarios: ScrumMaster, ProductOwner y Developer.', '', 4, '2018-12-03', 0),
(6, 3, 20, 'Pagina de Login', 'Habrá una pagina de login única para todos los usuarios.', '', 1, '2018-12-03', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sprints`
--

CREATE TABLE `sprints` (
  `id_sprint` int(11) NOT NULL,
  `cod_project` int(11) NOT NULL,
  `number_sprint` int(11) NOT NULL,
  `name_sprint` varchar(20) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `total_hours` int(11) NOT NULL,
  `hours_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(512) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user`, `password`, `rol`, `name`, `last_name`, `mail`, `phone_number`) VALUES
(1, 'lzabala', '287e4df0f29a26fdbe6c7d176495518cf91f197bda36ad3bd4972937b760521f749ab367a2d40b34451bae65039962a5978dab3d8d04fec421ed94e3010bfb73', 'ScrumMaster', 'Leandro', 'Zabala', 'lzabala@xtec.cat', 656788453),
(2, 'emieza', '0bc60f808678ee95f2e83074b85cdfbf953795d906a761d60082b48300fe88edfde5f86533ae72b08e68017d7503dbfe5f6326afa93a47a08cae825b1546db61', 'ProductOwner', 'Enric', 'Mieza', 'emieza@xtec.cat', 563221789),
(4, 'ksedano', '73cba74c46bfb8e5bfb6b4b53e1ebbadcccba18e3ece04af8f80bfccb94e42666bd1217a3ec4955d3c78c24dfb7dbea3d2933f3dacaccfd2cb892c1f10bad3d6', 'Developer', 'Kevin', 'Sedano', 'kevinsedanosmx@gmail.com', 617183420),
(5, 'xusbcn', 'e29726c8a614c006295123da8ae6f3adfe73950b6166230d63e7a536c6734e07231484a022011689b72ae130bb6c96ee783c161c83ca64521903f710dfb971f8', 'Developer', 'Xus', 'Diamante', 'xusbcndo@gmail.com', 625334321);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `idx_specifications_cod_project_specifications` (`cod_project`),
  ADD KEY `idx_sprints_cod_project_sprints_project` (`cod_project`);

--
-- Indices de la tabla `proj_users`
--
ALTER TABLE `proj_users`
  ADD PRIMARY KEY (`id_proj_user`),
  ADD KEY `idx_project_cod_project_project` (`cod_project`),
  ADD KEY `fk_user_proj_users` (`user`);

--
-- Indices de la tabla `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id_specification`),
  ADD KEY `idx_specifications_cod_project` (`cod_project`);

--
-- Indices de la tabla `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`id_sprint`),
  ADD KEY `fk_cod_project_sprints_project` (`cod_project`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `idx_proj_users_user_proj_users` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proj_users`
--
ALTER TABLE `proj_users`
  MODIFY `id_proj_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id_specification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sprints`
--
ALTER TABLE `sprints`
  MODIFY `id_sprint` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_cod_project_project` FOREIGN KEY (`cod_project`) REFERENCES `proj_users` (`cod_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proj_users`
--
ALTER TABLE `proj_users`
  ADD CONSTRAINT `fk_user_proj_users` FOREIGN KEY (`user`) REFERENCES `users` (`user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `fk_cod_project_specifications` FOREIGN KEY (`cod_project`) REFERENCES `project` (`cod_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sprints`
--
ALTER TABLE `sprints`
  ADD CONSTRAINT `fk_cod_project_sprints` FOREIGN KEY (`cod_project`) REFERENCES `specifications` (`cod_project`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cod_project_sprints_project` FOREIGN KEY (`cod_project`) REFERENCES `project` (`cod_project`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
