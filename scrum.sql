-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-11-2018 a las 16:24:09
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
  `name_project` varchar(30) COLLATE utf8_bin NOT NULL,
  `description` varchar(40) COLLATE utf8_bin NOT NULL,
  `product_owner` varchar(20) COLLATE utf8_bin NOT NULL,
  `scrum_master` varchar(20) COLLATE utf8_bin NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `comments` varchar(40) COLLATE utf8_bin NOT NULL,
  `budget` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proj_users`
--

CREATE TABLE `proj_users` (
  `id_proj_user` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_bin NOT NULL,
  `cod_project` int(11) NOT NULL,
  `name_proj` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `specifications`
--

CREATE TABLE `specifications` (
  `id_specification` int(11) NOT NULL,
  `cod_specification` int(11) NOT NULL,
  `cod_project` int(11) NOT NULL,
  `name_specification` varchar(20) COLLATE utf8_bin NOT NULL,
  `description` varchar(40) COLLATE utf8_bin NOT NULL,
  `comments` varchar(40) COLLATE utf8_bin NOT NULL,
  `hours` int(11) NOT NULL,
  `date` date NOT NULL,
  `completed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sprints`
--

CREATE TABLE `sprints` (
  `id_sprint` int(11) NOT NULL,
  `cod_project` int(11) NOT NULL,
  `number_sprint` int(11) NOT NULL,
  `name_sprint` varchar(20) COLLATE utf8_bin NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `total_hours` int(11) NOT NULL,
  `hours_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(512) COLLATE utf8_bin NOT NULL,
  `rol` varchar(20) COLLATE utf8_bin NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(20) COLLATE utf8_bin NOT NULL,
  `phone_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD UNIQUE KEY `cod_project` (`cod_project`);

--
-- Indices de la tabla `proj_users`
--
ALTER TABLE `proj_users`
  ADD PRIMARY KEY (`id_proj_user`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `cod_proj` (`cod_project`);

--
-- Indices de la tabla `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id_specification`),
  ADD UNIQUE KEY `cod_specification` (`cod_specification`),
  ADD UNIQUE KEY `cod_project` (`cod_project`);

--
-- Indices de la tabla `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`id_sprint`),
  ADD UNIQUE KEY `cod_project` (`cod_project`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proj_users`
--
ALTER TABLE `proj_users`
  MODIFY `id_proj_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id_specification` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sprints`
--
ALTER TABLE `sprints`
  MODIFY `id_sprint` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_cod_project_project` FOREIGN KEY (`cod_project`) REFERENCES `proj_users` (`cod_project`);

--
-- Filtros para la tabla `proj_users`
--
ALTER TABLE `proj_users`
  ADD CONSTRAINT `fk_user_proj_users` FOREIGN KEY (`user`) REFERENCES `users` (`user`);

--
-- Filtros para la tabla `specifications`
--
ALTER TABLE `specifications`
  ADD CONSTRAINT `fk_cod_project_specifications` FOREIGN KEY (`cod_project`) REFERENCES `project` (`cod_project`);

--
-- Filtros para la tabla `sprints`
--
ALTER TABLE `sprints`
  ADD CONSTRAINT `fk_cod_project_sprints` FOREIGN KEY (`cod_project`) REFERENCES `specifications` (`cod_project`),
  ADD CONSTRAINT `fk_cod_project_sprints_project` FOREIGN KEY (`cod_project`) REFERENCES `project` (`cod_project`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
