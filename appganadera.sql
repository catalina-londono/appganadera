-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-10-2024 a las 22:40:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `appganadera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fincas`
--

CREATE TABLE `fincas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fincas`
--

INSERT INTO `fincas` (`id`, `nombre`, `ubicacion`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Jaeden Hodkiewicz', 'Ad voluptatum reiciendis aspernatur repellat.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(2, 'Mazie Schaefer DDS', 'Aut quo sint ex quas sit dolores.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(3, 'Mr. Orion Grimes', 'Eaque est iure optio quos accusamus quibusdam.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(4, 'Prof. Isaiah Prosacco DDS', 'In nesciunt unde et excepturi molestiae quia.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(5, 'Demarco Kerluke', 'Tempore unde sunt qui dolores velit.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(6, 'Margret Dare', 'Aut unde veritatis ea ut.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(7, 'Hayden Considine V', 'Nesciunt eligendi adipisci perferendis autem incidunt delectus.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(8, 'Javonte Torphy', 'Enim sit tempora fugiat quo.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(9, 'Prof. Hank Grant Jr.', 'Accusamus sint ad alias cum.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(10, 'Elijah Cruickshank', 'Est omnis aliquid est.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(11, 'Ashtyn McDermott', 'Quasi aspernatur provident placeat consequatur.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(12, 'Uriah Johnson Jr.', 'Eos amet omnis at commodi assumenda assumenda.', '2024-10-06 05:28:21', '2024-10-06 05:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `finca_usuario`
--

CREATE TABLE `finca_usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `finca_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `finca_usuario`
--

INSERT INTO `finca_usuario` (`id`, `finca_id`, `usuario_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL),
(2, 7, 1, NULL, NULL),
(3, 7, 2, NULL, NULL),
(4, 12, 2, NULL, NULL),
(5, 3, 3, NULL, NULL),
(6, 4, 3, NULL, NULL),
(7, 3, 4, NULL, NULL),
(8, 8, 4, NULL, NULL),
(9, 5, 5, NULL, NULL),
(10, 10, 5, NULL, NULL),
(11, 8, 6, NULL, NULL),
(12, 12, 6, NULL, NULL),
(13, 4, 7, NULL, NULL),
(14, 5, 7, NULL, NULL),
(15, 5, 8, NULL, NULL),
(16, 9, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganados`
--

CREATE TABLE `ganados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `raza` varchar(255) NOT NULL,
  `proposito` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `foto` longtext NOT NULL,
  `finca_id` bigint(20) UNSIGNED NOT NULL,
  `hierro_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ganados`
--

INSERT INTO `ganados` (`id`, `sexo`, `raza`, `proposito`, `tipo`, `foto`, `finca_id`, `hierro_id`, `created_at`, `updated_at`) VALUES
(1, 0, 'Sint.', 8, 5, 'Hic quasi necessitatibus doloremque quod.', 6, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(3, 1, 'Consequuntur ducimus.', 3, 5, 'Amet animi corporis quo voluptatem.', 7, 1, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(4, 0, 'Consequatur modi.', 4, 1, 'In blanditiis et amet totam velit nemo.', 5, 2, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(5, 1, 'Laboriosam.', 8, 5, 'Nihil magnam rerum tenetur deleniti labore fugiat.', 8, 1, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(6, 0, 'Et pariatur.', 2, 8, 'Mollitia deserunt minima quae in saepe voluptatum quasi.', 9, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(7, 0, 'Perferendis quod.', 6, 5, 'In illo qui a incidunt omnis facere sunt.', 4, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(8, 1, 'Et aliquam.', 6, 5, 'Nihil accusantium cum voluptas nulla corrupti.', 3, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(9, 0, 'Quam.', 4, 8, 'Minus et voluptas velit quos.', 4, 1, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(10, 0, 'Quasi itaque.', 6, 6, 'Dicta cum quod et quod.', 9, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(11, 1, 'Eligendi.', 7, 9, 'Officia quia dolores cupiditate velit ut et nam.', 2, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(12, 1, 'Ut aperiam.', 2, 7, 'Perferendis eos aut dolore modi sunt inventore.', 6, 1, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(13, 1, 'Accusamus.', 8, 9, 'Provident dolorem quasi hic dolorem ipsa.', 1, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(14, 1, 'Fugiat.', 8, 4, 'Consequatur nisi cupiditate et vel illo magni corporis.', 6, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(15, 1, 'Nesciunt natus.', 3, 4, 'Doloremque ut blanditiis maiores voluptas ut explicabo eum.', 9, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(16, 1, 'Quasi.', 2, 4, 'Quis dolorem aperiam aut est sed.', 6, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(17, 1, 'Exercitationem.', 6, 4, 'Quia rerum iure nemo dicta eos.', 12, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(18, 0, 'Esse quia.', 4, 6, 'Et occaecati illum eum quasi esse sed nihil.', 11, 3, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(19, 1, 'Molestiae.', 9, 8, 'Nesciunt labore molestias et nisi nobis veritatis.', 2, 2, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(20, 1, 'Aut.', 4, 6, 'Illo eos sit quae corrupti natus voluptatum minus quae.', 12, 1, '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(21, 1, 'Arshay', 1, 1, 'sfjdfodifdjfdfdfjdk', 2, 2, '2024-10-06 05:32:55', '2024-10-06 05:35:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganado_incidente`
--

CREATE TABLE `ganado_incidente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ganado_id` bigint(20) UNSIGNED NOT NULL,
  `incidente_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ganado_incidente`
--

INSERT INTO `ganado_incidente` (`id`, `ganado_id`, `incidente_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, NULL),
(2, 12, 1, NULL, NULL),
(3, 7, 2, NULL, NULL),
(4, 16, 2, NULL, NULL),
(5, 17, 3, NULL, NULL),
(6, 18, 3, NULL, NULL),
(7, 14, 4, NULL, NULL),
(8, 18, 4, NULL, NULL),
(9, 1, 5, NULL, NULL),
(10, 10, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hierros`
--

CREATE TABLE `hierros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material` varchar(255) NOT NULL,
  `marcado` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hierros`
--

INSERT INTO `hierros` (`id`, `material`, `marcado`, `created_at`, `updated_at`) VALUES
(1, 'Id.', 'Voluptas illo.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(2, 'Quam fugiat.', 'Vel aut.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(3, 'Mollitia.', 'Vel voluptatem.', '2024-10-06 05:28:21', '2024-10-06 05:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes`
--

CREATE TABLE `incidentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `incidentes`
--

INSERT INTO `incidentes` (`id`, `tipo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Est amet a error.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(2, 8, 'Aut id dolorum ea quibusdam.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(3, 7, 'Quis fuga voluptatem eaque voluptatum quis.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(4, 4, 'Aut adipisci voluptates.', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(5, 2, 'Quasi enim sunt iure.', '2024-10-06 05:28:21', '2024-10-06 05:28:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_10_05_204238_create_usuarios_table', 1),
(3, '2024_10_05_204259_create_hierros_table', 1),
(4, '2024_10_05_204346_create_fincas_table', 1),
(5, '2024_10_05_204357_create_ganados_table', 1),
(6, '2024_10_05_204411_create_incidentes_table', 1),
(7, '2024_10_05_204503_create_ganado_incidente_table', 1),
(8, '2024_10_05_212352_create_finca_usuario_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` tinyint(1) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `password`, `rol`, `nombre`, `apellido`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Dayne Nolan', 'Voluptas.', 0, 'Stevie Stehr', 'Rebeca Borer', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(2, 'Jerome Heaney', 'Corrupti velit.', 1, 'Mayra Hudson III', 'Mathew Davis', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(3, 'Linnie McGlynn', 'Qui natus.', 0, 'Rusty Grant', 'Hipolito Wintheiser', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(4, 'Deondre Moore', 'Asperiores est.', 0, 'Sharon Hettinger II', 'Freda Runte', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(5, 'Miss Adelia Upton V', 'Qui.', 1, 'Prof. Charlie Kassulke', 'Lance Parker', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(6, 'Prof. Zechariah Corkery', 'Amet temporibus.', 1, 'Izabella Bailey II', 'Astrid Koelpin', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(7, 'Miss Mona Prohaska', 'Saepe expedita.', 0, 'America Kuhic', 'Kacey Reichel MD', '2024-10-06 05:28:21', '2024-10-06 05:28:21'),
(8, 'Unique Stamm', 'Soluta explicabo.', 1, 'Jada Block', 'Dr. Kiley DuBuque', '2024-10-06 05:28:21', '2024-10-06 05:28:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `finca_usuario`
--
ALTER TABLE `finca_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `finca_usuario_finca_id_foreign` (`finca_id`),
  ADD KEY `finca_usuario_usuario_id_foreign` (`usuario_id`);

--
-- Indices de la tabla `ganados`
--
ALTER TABLE `ganados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ganados_finca_id_foreign` (`finca_id`),
  ADD KEY `ganados_hierro_id_foreign` (`hierro_id`);

--
-- Indices de la tabla `ganado_incidente`
--
ALTER TABLE `ganado_incidente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ganado_incidente_ganado_id_foreign` (`ganado_id`),
  ADD KEY `ganado_incidente_incidente_id_foreign` (`incidente_id`);

--
-- Indices de la tabla `hierros`
--
ALTER TABLE `hierros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fincas`
--
ALTER TABLE `fincas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `finca_usuario`
--
ALTER TABLE `finca_usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ganados`
--
ALTER TABLE `ganados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ganado_incidente`
--
ALTER TABLE `ganado_incidente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `hierros`
--
ALTER TABLE `hierros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `finca_usuario`
--
ALTER TABLE `finca_usuario`
  ADD CONSTRAINT `finca_usuario_finca_id_foreign` FOREIGN KEY (`finca_id`) REFERENCES `fincas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `finca_usuario_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ganados`
--
ALTER TABLE `ganados`
  ADD CONSTRAINT `ganados_finca_id_foreign` FOREIGN KEY (`finca_id`) REFERENCES `fincas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ganados_hierro_id_foreign` FOREIGN KEY (`hierro_id`) REFERENCES `hierros` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ganado_incidente`
--
ALTER TABLE `ganado_incidente`
  ADD CONSTRAINT `ganado_incidente_ganado_id_foreign` FOREIGN KEY (`ganado_id`) REFERENCES `ganados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ganado_incidente_incidente_id_foreign` FOREIGN KEY (`incidente_id`) REFERENCES `incidentes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
