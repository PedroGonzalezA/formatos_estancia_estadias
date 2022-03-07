-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2022 a las 03:03:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `ape_paterno` varchar(40) DEFAULT NULL,
  `ape_materno` varchar(40) DEFAULT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `matricula` varchar(40) DEFAULT NULL,
  `email_per` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `no_ss` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `id_procesos` int(10) NOT NULL,
  `id_carrera` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `ape_paterno`, `ape_materno`, `nombres`, `tel`, `matricula`, `email_per`, `email`, `no_ss`, `direccion`, `id_procesos`, `id_carrera`) VALUES
(51, 'Hoil', 'Chan', 'Ruben Eliezer', '9983564512', '201800064', 'ruben@live.com', '201800064@eatudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 1, 4),
(111, 'Chan', 'Hoil', 'Ruben', '9988906245', '201800226', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '48152362482', 'Calle 46 Manzana 36 Lote 14 Región 102', 3, 4),
(112, 'Rodríguez', 'Marín', 'Jose', '8565251232', '201800064', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 1, 4),
(113, 'Rodríguez', 'Marín', 'Jose', '8565251232', '201800064', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 1, 4),
(114, 'Rodríguez', 'Marín', 'Jose', '8565251232', '201800064', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 1, 4),
(115, 'Rodríguez', 'Marín', 'Jose', '8565251232', '201800064', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 1, 4),
(116, 'Rodríguez', 'Marín', 'Jose', '8565251232', '201800064', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 1, 4),
(117, 'García', 'Ramírez', 'Kevin', '8565251232', '201800066', 'ruben@live.com', '201800020@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 2, 4),
(118, 'Hoil', 'Chan', 'Ruben Eliezer', '9988906245', '201800064', 'ruben@live.com', '201800065@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 3, 4),
(119, 'Hoil', 'Chan', 'Ruben Eliezer', '9983564512', '201800064', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 1, 4),
(120, 'Pérez', 'Villarreal', 'Julio Eduardo', '8565251232', '201800068', 'julio@live.com', '201800068@estudiantes.upqroo.edu.mx', '48152362445', 'Jardines del sur N. 52', 3, 4),
(121, 'Hoil', 'Chan', 'Ruben Eliezer', '9983564512', '201800064', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '48152362482', 'Jardines del sur N. 52', 2, 4),
(122, 'Hoil', 'Chan', 'Ruben', '9988906245', '201800064@hotmail.com', 'ruben@live.com', '201800064@estudiantes.upqroo.edu.mx', '4587156532', 'Calle 46', 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_academico`
--

CREATE TABLE `asesor_academico` (
  `id` int(11) NOT NULL,
  `ape_paterno_aa` varchar(40) DEFAULT NULL,
  `ape_materno_aa` varchar(40) DEFAULT NULL,
  `nombres_aa` varchar(40) DEFAULT NULL,
  `tel_lada_aa` varchar(3) DEFAULT NULL,
  `tel_num_aa` varchar(10) DEFAULT NULL,
  `email_aa` varchar(40) DEFAULT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asesor_academico`
--

INSERT INTO `asesor_academico` (`id`, `ape_paterno_aa`, `ape_materno_aa`, `nombres_aa`, `tel_lada_aa`, `tel_num_aa`, `email_aa`, `id_cargo`) VALUES
(1, 'Xiu', 'Chan', 'Mariano', NULL, '9885263215', 'ut_tareas@live.com', 3),
(2, 'Tamay', 'Gomez', 'Jose', NULL, '9885263215', 'ing.software@upqroo.edu.mx', 2),
(3, 'Tamay', 'Gomez', 'Jose', NULL, '9885263215', 'ing.software@upqroo.edu.mx', 2),
(4, 'Tamay', 'Gomez', 'Jose', NULL, '9885263215', 'ing.software@upqroo.edu.mx', 2),
(5, 'Tamay', 'Gomez', 'Jose', NULL, '9885263215', 'ing.software@upqroo.edu.mx', 2),
(6, 'Tamay', 'Gomez', 'Jose', NULL, '9885263215', 'tamay@live.com', 2),
(7, 'Xiu', 'Chan', 'Mariano', NULL, '9982156024', 'ut_tarea@live.com', 3),
(8, 'Tamay', 'Gomez', 'Jose', NULL, '9885263215', 'tamay@live.com', 2),
(9, 'Xiu', 'Chan', 'Mariano', NULL, '9982156024', 'ut_tareas@live.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_empresarial`
--

CREATE TABLE `asesor_empresarial` (
  `id` int(11) NOT NULL,
  `ape_paterno_ae` varchar(40) DEFAULT NULL,
  `ape_materno_ae` varchar(40) DEFAULT NULL,
  `nombres_ae` varchar(40) DEFAULT NULL,
  `tel_lada_ae` varchar(3) DEFAULT NULL,
  `tel_num_ae` varchar(10) DEFAULT NULL,
  `email_ae` varchar(40) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asesor_empresarial`
--

INSERT INTO `asesor_empresarial` (`id`, `ape_paterno_ae`, `ape_materno_ae`, `nombres_ae`, `tel_lada_ae`, `tel_num_ae`, `email_ae`, `id_cargo`) VALUES
(1, 'Garcia', 'Martinez', 'Natalia', NULL, '9856532523', 'nat.garcia@wayaweb.com', 3),
(2, 'Kuh', 'Miz', 'Enrique', NULL, '9856532523', 'natalia.garcia@wayaweb.com', 2),
(3, 'Kuh', 'Miz', 'Enrique', NULL, '9856532523', 'natalia.garcia@wayaweb.com', 2),
(4, 'Kuh', 'Miz', 'Enrique', NULL, '9856532523', 'natalia.garcia@wayaweb.com', 2),
(5, 'Kuh', 'Miz', 'Enrique', NULL, '9856532523', 'natalia.garcia@wayaweb.com', 2),
(6, 'Martínez', 'García', 'Natalia', NULL, '9856532523', 'natalia.garcia@wayaweb.com', 2),
(7, 'García', 'Ramírez', 'Natalia', NULL, '9856532523', 'natalia.garcia@wayaweb.com', 3),
(8, 'García', 'Ramírez', 'Natalia', NULL, '9856532523', 'natalia.garcia@wayaweb.com', 2),
(9, 'Martínez', 'García', 'Rosaura Natalia', NULL, '9982411054', 'natalia.garcia@wayaweb.com', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nombre_cargo`) VALUES
(1, 'Lic.'),
(2, 'Ing.'),
(3, 'Mtro.'),
(4, 'Arq.'),
(5, 'Dr.'),
(6, 'Dra.'),
(7, 'C.P.T.'),
(8, 'Profr'),
(9, 'Profra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`) VALUES
(1, 'Ing. Biomédica'),
(2, 'Ing. Biotecnología'),
(3, 'Ing. Financiera'),
(4, 'Ing. Software'),
(5, 'Lic. Admon Y Gestion De PyMes'),
(6, 'Lic. Gestion Empresaria'),
(7, 'Lic. Terapia Fisica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre_emp` varchar(40) DEFAULT NULL,
  `giro` varchar(40) DEFAULT NULL,
  `direccion_emp` varchar(40) DEFAULT NULL,
  `ape_paterno_rh` varchar(40) DEFAULT NULL,
  `ape_materno_rh` varchar(40) DEFAULT NULL,
  `nombres_rh` varchar(40) DEFAULT NULL,
  `tel_lada` varchar(3) DEFAULT NULL,
  `tel_num` varchar(10) DEFAULT NULL,
  `tel_ext` varchar(3) DEFAULT NULL,
  `email_emp` varchar(40) DEFAULT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre_emp`, `giro`, `direccion_emp`, `ape_paterno_rh`, `ape_materno_rh`, `nombres_rh`, `tel_lada`, `tel_num`, `tel_ext`, `email_emp`, `id_tipo`) VALUES
(1, 'WayaWeb', 'Servicios', 'Calle 46 Manzana 36 Lote 14 Región 102', 'Gomez', 'Gutierrez', 'Mireya', '998', '5643215', NULL, 'miyera.wayabe@live.com', 2),
(2, 'WayaWeb', 'Servicios', 'Tu casa 1565', 'Pech', 'Galera', 'Manuel', '998', '5643215', NULL, 'mireya@wayaweb.com', 2),
(3, 'WayaWeb', 'Servicios', 'Tu casa 1565', 'Pech', 'Galera', 'Manuel', '998', '5643215', NULL, 'mireya@wayaweb.com', 2),
(4, 'WayaWeb', 'Servicios', 'Tu casa 1565', 'Pech', 'Galera', 'Manuel', '998', '5643215', NULL, 'mireya@wayaweb.com', 2),
(5, 'WayaWeb', 'Servicios', 'Tu casa 1565', 'Pech', 'Galera', 'Manuel', '998', '5643215', '1', 'mireya@wayaweb.com', 2),
(6, 'WayaWeb', 'Servicios', 'Tu casa 1565', 'Pech', 'Galera', 'Manuel', '998', '5643215', NULL, 'mireya@wayaweb.com', 2),
(7, 'WayaWeb', 'Servicios', 'Arco Periférico', 'Rodríguez', 'Dominguez', 'Mireya', NULL, '8956125', NULL, 'mireya@wayaweb.com', 2),
(8, 'WayaWeb', 'Servicios', 'Tu casa 1565', 'Pech', 'Galera', 'Mireya', NULL, '5643215', NULL, 'mireya@wayaweb.com', 2),
(9, 'WayaWeb', 'Servicios', 'Tu calle 45', 'Rodríguez', 'Dominguez', 'Mireya', '998', '1577964', NULL, 'mireya@wayaweb.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_asesor_emp` int(11) DEFAULT NULL,
  `id_asesor_aca` int(11) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `id_alumno`, `id_empresa`, `id_asesor_emp`, `id_asesor_aca`, `id_proyecto`, `status`) VALUES
(1, 119, 6, 6, 6, 6, 1),
(2, 120, 7, 7, 7, 7, 1),
(3, 121, 8, 8, 8, 8, 1),
(4, 122, 9, 9, 9, 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id_procesos` int(11) NOT NULL,
  `nombre_proceso` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id_procesos`, `nombre_proceso`) VALUES
(1, 'Estancías 1'),
(2, 'Estancías 2'),
(3, 'Estadía');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL,
  `nombre_proyecto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `nombre_proyecto`) VALUES
(1, 'WDash'),
(2, 'WDash'),
(3, 'WDash'),
(4, 'WDash'),
(5, 'WDash'),
(6, 'WDash'),
(7, 'WDash'),
(8, 'WDash'),
(9, 'Wdash');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `id_formulario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `id_usuario`, `id_formulario`) VALUES
(1, 1, 1),
(2, 4, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'Micro'),
(2, 'Pequeña'),
(3, 'Mediana'),
(4, 'Grande');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ruben', '201800064@estudiantes.upqroo.edu.mx', NULL, '$2y$10$Y.1KLmKGGHmUHLsV7BJ2deaDaLZ65QOyTpg/hRPEoX6haZpZPZjXS', '', NULL, '2021-12-30 02:01:55', '2021-12-30 02:01:55'),
(2, 'Hector', 'nat.garcia@wayaweb.com', NULL, '$2y$10$UJNwnAD2X4D/uo94dbrYa.PNiAjgM63WlBle4fwvb/em.PrI.F6P6', '', NULL, '2021-12-30 02:05:06', '2021-12-30 02:05:06'),
(3, 'Patricio', '201800065@estudiantes.upqroo.edu.mx', NULL, '$2y$10$mpx8RKVbxp0sMQ0XO80eCusIS0b8nQ0MMAqpDT915nCTsXc9jimrC', '', NULL, '2022-01-14 03:08:39', '2022-01-14 03:08:39'),
(4, 'Julio', '201800068@estudiantes.upqroo.edu.mx', NULL, '$2y$10$pxQmNFu9fEtB4jiknNJBreB08gcR/.iDwd58zzDgHSjDdDNgRrHHK', '', NULL, '2022-01-14 03:39:48', '2022-01-14 03:39:48'),
(5, '201800226', '201800226@estudiantes.upqroo.edu.mx', NULL, '$2y$10$GH4/D8zz4HIQ3O73nfp63OWyMCKSdlQYKCHP6ICTuLKotPFHlftey', '', NULL, '2022-01-15 12:38:14', '2022-01-15 12:38:14'),
(6, '201700251', '201700251@estudiantes.upqroo.edu.mx', NULL, '$2y$10$3r8R7A9AtvRJLSvWaInvDefQFPWOd.jj8MT0wl5JVe8.aN9y.Q49W', '', NULL, '2022-01-15 12:42:00', '2022-01-15 12:42:00'),
(7, '201800236', '201800236@estudiantes.upqroo.edu.mx', NULL, '$2y$10$JMWyvolNowjCXF9XOD3F5OdLRCDvxVhInUXa1hu2GgLCaE3ACad2G', '', NULL, '2022-01-15 12:45:51', '2022-01-15 12:45:51'),
(8, '201800239', '201800239@estudiantes.upqroo.edu.mx', NULL, '$2y$10$jGzmwRDgimKeAobxkIC8C.I6TeVj.ErK39bMAHRBnCMTd52Ofdxd6', '', NULL, '2022-01-15 12:48:34', '2022-01-15 12:48:34'),
(9, '201800250', '201800250@estudiantes.upqroo.edu.mx', NULL, '$2y$10$5ql4BQOHLCLMqTSCzvXMlObjao6OKazMdcFKnUJYTLXK6Hw8H6Ki6', '', NULL, '2022-01-15 12:51:14', '2022-01-15 12:51:14'),
(10, '201700268', '201800268@estudiantes.upqroo.edu.mx', NULL, '$2y$10$PoWmOnJNhxc27UIst6x9z.Ekfrg6VQI68RI/kjJpzfWYYTnmrzRge', '', NULL, '2022-01-15 12:53:40', '2022-01-15 12:53:40'),
(11, '201800259', '201800259@estudiantes.upqroo.edu.mx', NULL, '$2y$10$Tt2MmCS.NdsZsrN8/BZkk.B8MowWOW/801mlaCXHl.GFZKd.iRaN.', '', NULL, '2022-01-15 12:55:36', '2022-01-15 12:55:36'),
(12, '201800293', '201800293@estudiantes.upqroo.edu.mx', NULL, '$2y$10$P6cVeqIIW4pqTf9XHlvASuzy1iA.LTl9Yp55dLmJdeSnCK4Lkcs.W', '', NULL, '2022-01-15 12:57:12', '2022-01-15 12:57:12'),
(13, '201800299', '201800299@estudiantes.upqroo.edu.mx', NULL, '$2y$10$8EK2IG140.fWPOeTmL7L6OAGBReFLUt.Oeuhi3O49jETyRs8verny', '', NULL, '2022-01-15 12:58:18', '2022-01-15 12:58:18'),
(14, '201700316', '201700316@estudiantes.upqroo.edu.mx', NULL, '$2y$10$EyrsUjRqG.r8Yy8xZUEYgeNtkMrKVEFw1O767xSmWQFIgJMPOENCW', '', NULL, '2022-01-15 13:02:21', '2022-01-15 13:02:21'),
(15, '201700319', '201700319@estudiantes.upqroo.edu.mx', NULL, '$2y$10$zCJYHUGofMUovRVKVABK6e/lB3.q4tLB/BkEUK5Ek.c./9KGtX6LO', '', NULL, '2022-01-15 13:04:34', '2022-01-15 13:04:34'),
(16, '201700332', '201700332@estudiantes.upqroo.edu.mx', NULL, '$2y$10$X4fcXrxzMGuUpwXMlT7sbuMdRUkbfvarYIZzv/TTVZAldTOmS8EaC', '', NULL, '2022-01-15 13:06:20', '2022-01-15 13:06:20'),
(18, '201700361', '201700361@estudiantes.upqroo.edu.mx', NULL, '$2y$10$q1kTWuFjUd8d8zn1X7X3ius.7JnSYbx8X22OgvnGuPXDCkzEsiNB.', '', NULL, '2022-01-15 13:09:30', '2022-01-15 13:09:30'),
(19, '202000346', '202000346@estudiantes.upqroo.edu.mx', NULL, '$2y$10$.HdH2uKxB38pygKVCbbTWeAFIv1B884lPYHO2SUjwc6MEKuA0lR.W', '', NULL, '2022-01-15 13:12:58', '2022-01-15 13:12:58'),
(20, '202000358', '202000358@estudiantes.upqroo.edu.mx', NULL, '$2y$10$NqRtv03i8gGFWGuHeEe/VODo40eZmBkAAXg6OlbOIUGLh8eXAD0Lm', '', NULL, '2022-01-15 13:14:32', '2022-01-15 13:14:32'),
(21, '201800120', '201800120@estudiantes.upqroo.edu.mx', NULL, '$2y$10$YcDblyNX8JK/cf0M7h4Gzu5yNFmkcbJ.0w8qRYfIf2X/F2jALSUHC', '', NULL, '2022-01-15 13:16:40', '2022-01-15 13:16:40'),
(22, '201900093', '201900093@estudiantes.upqroo.edu.mx', NULL, '$2y$10$.A9DnbminydgUlRSC9rfk.ymXF9gLbaT3Cj4KoFHXcMC90GJfIrq2', '', NULL, '2022-01-15 13:18:50', '2022-01-15 13:18:50'),
(24, '201900103', '201900103@estudiantes.upqroo.edu.mx', NULL, '$2y$10$ihjZejjAUAaOXQyouG3mceQBIp3UB1TwrcUjEXJYr0XlrCKXk2v86', '', NULL, '2022-01-15 13:22:36', '2022-01-15 13:22:36'),
(25, '201900115', '201900115@estudiantes.upqroo.edu.mx', NULL, '$2y$10$pPA5Wdb1qBkgqWw8P8CpEuzVJtiHpWv3sR3ClrhIFz43XcvlVhnXu', '', NULL, '2022-01-15 13:24:48', '2022-01-15 13:24:48'),
(26, '201900123', '201900123@estudiantes.upqroo.edu.mx', NULL, '$2y$10$i.2yVA/xTI4NrhikVWlxcuJh3KpDPAVQnwdQJBi02un0jiuRYcmCi', '', NULL, '2022-01-15 13:27:37', '2022-01-15 13:27:37'),
(27, '201900126', '201900126@estudiantes.upqroo.edu.mx', NULL, '$2y$10$WUiVMUqHb0caktXe6o6eTuLFjoYIzdmBveWZxvD9JeM043u8A/hAy', '', NULL, '2022-01-15 13:29:16', '2022-01-15 13:29:16'),
(29, '201700127', '201700127@estudiantes.upqroo.edu.mx', NULL, '$2y$10$PLHb8hKNyi14RijwodFOY.cJ38HOfEk/MLSPxsv8a5U9YQkqUdlwa', '', NULL, '2022-01-15 13:33:59', '2022-01-15 13:33:59'),
(30, '201800118', '201800118@estudiantes.upqroo.edu.mx', NULL, '$2y$10$coqxn.kGblZp3TGwTfK7X.ls2HKiHDsT7kYIQbjn5u2QlkpQRObfG', '', NULL, '2022-01-15 13:35:42', '2022-01-15 13:35:42'),
(31, '202000001', '202000001@estudiantes.upqroo.edu.mx', NULL, '$2y$10$yguL5oe1q2.hepVOkNBHX.fc/D4v9.PiakhMRjx64LTrfTazolThm', '', NULL, '2022-01-15 13:37:51', '2022-01-15 13:37:51'),
(32, '202000002', '202000002@estudiantes.upqroo.edu.mx', NULL, '$2y$10$C6Kl.aGDBYSFbGkkhYBNGOgfgojSLKdvNHDc6Q/0atZcHKIXkZZRK', '', NULL, '2022-01-15 13:40:39', '2022-01-15 13:40:39'),
(33, '202000007', '202000007@estudiantes.upqroo.edu.mx', NULL, '$2y$10$Konfd5xgfET3j/Cv6/BlKeYs.sEcTzPneiSP4VIHySzEPtpBUOh7i', '', NULL, '2022-01-15 13:42:53', '2022-01-15 13:42:53'),
(34, '202000047', '202000047@estudiantes.upqroo.edu.mx', NULL, '$2y$10$u8HRDZWKGxy65o0NZ7V7L.BAsT2/i8rNK/JUao1xcttW8Ejn2CeU6', '', NULL, '2022-01-15 13:44:02', '2022-01-15 13:44:02'),
(35, '202000017', '202000017@estudiantes.upqroo.edu.mx', NULL, '$2y$10$HBpTkJIH8YyUOdMVIRdlLOaXIVwlBGfwVyibMRzjZAeRoSCddJQNm', '', NULL, '2022-01-15 20:47:31', '2022-01-15 20:47:31'),
(36, '202000052', '202000052@estudiantes.upqroo.edu.mx', NULL, '$2y$10$7P0laIWBAv8betEg.VNdwuwhwbXQF4jsf68PPg5dH/VG.z6MB4CP.', '', NULL, '2022-01-15 20:49:08', '2022-01-15 20:49:08'),
(37, '202000023', '202000023@estudiantes.upqroo.edu.mx', NULL, '$2y$10$V4KkwDPoDab3viUaIBfYv.mB1l34VVC6OGk1kuM.yu2PE/NejXc4G', '', NULL, '2022-01-15 20:51:01', '2022-01-15 20:51:01'),
(38, '202000053', '202000053@estudiantes.upqroo.edu.mx', NULL, '$2y$10$1UeXSp1TU7kx2wOXZSsDyODMZqv/WGSHbcP/h4fuvF2cUULVjifF6', '', NULL, '2022-01-15 20:52:54', '2022-01-15 20:52:54'),
(39, '202000448', '202000448@estudiantes.upqroo.edu.mx', NULL, '$2y$10$7D/anfztPNhmXG8P/iguyeMrV3TF0.J7pqe5.7VD8ev/sk58ee6Vu', '', NULL, '2022-01-15 20:54:24', '2022-01-15 20:54:24'),
(40, '202000031', '202000031@estudiantes.upqroo.edu.mx', NULL, '$2y$10$UQ9Wb1MNLuJNm.kMsmOYMOopFSNyKJKI9IhxX.CzF02qqnlBsZzQe', '', NULL, '2022-01-15 20:56:04', '2022-01-15 20:56:04'),
(41, '202000032', '202000032@estudiantes.upqroo.edu.mx', NULL, '$2y$10$R5Xo9doqEUyNZPeeGB/5CufF4n1K6EHFjHPaT4LyBGuqqn4syh7Ju', '', NULL, '2022-01-15 20:57:24', '2022-01-15 20:57:24'),
(42, '201900015', '201900015@estudiantes.upqroo.edu.mx', NULL, '$2y$10$cMj1EZ84uGtjyXayt1zZUOs/FFVOvfdBV1t4lvSwhRVzkNgYbOALa', '', NULL, '2022-01-15 20:59:04', '2022-01-15 20:59:04'),
(43, '201900030', '201900030@estudiantes.upqroo.edu.mx', NULL, '$2y$10$DvyBZOnqi9Hzw8BUwuImfu4KI85uNKIfhAZdZ46WgYliS5C9BEiHi', '', NULL, '2022-01-15 21:01:02', '2022-01-15 21:01:02'),
(44, '201900037', '201900037@estudiantes.upqroo.edu.mx', NULL, '$2y$10$EXrtCgPgZpGleV2b4JL6s.siZgOpM8lfxVtrEY.1vPNPiWMqpfHFi', '', NULL, '2022-01-15 21:02:19', '2022-01-15 21:02:19'),
(45, '201700084', '201700084@estudiantes.upqroo.edu.mx', NULL, '$2y$10$vcYKa3PDWLk1oMqNHrJtz.Y05jYhwUzAz8O4IzEBi6AR6Fo9kDSYK', '', NULL, '2022-01-15 21:04:23', '2022-01-15 21:04:23'),
(46, '201700044', '201700044@estudiantes.upqroo.edu.mx', NULL, '$2y$10$bEngJ7CZ.gkHkob4lnnDAOb5qhX5rg.E8wU9.9UkdPAz/CemHN0RW', '', NULL, '2022-01-15 21:05:39', '2022-01-15 21:05:39'),
(47, '201800021', '201800021@estudiantes.upqroo.edu.mx', NULL, '$2y$10$DbO0ASZ0J/Aa/7oJqFP4/eEM7GUgVOobszFVlViRnZfq67DjRH8Za', '', NULL, '2022-01-15 21:08:47', '2022-01-15 21:08:47'),
(48, '201700038', '201700038@estudiantes.upqroo.edu.mx', NULL, '$2y$10$RWZxoF./iNRm6ypXPZh/o.fl0iI5dXtWZZlyiDRFmXP4wTlhMtyzK', '', NULL, '2022-01-15 21:10:13', '2022-01-15 21:10:13'),
(49, '201800024', '201800024@estudiantes.upqroo.edu.mx', NULL, '$2y$10$jh9pHiERDaFwZSzmJdk9r.d8LgFhbQQHbLdkOPhEzMa0Y29t8Gv7q', '', NULL, '2022-01-15 21:11:57', '2022-01-15 21:11:57'),
(51, '201800344', '201800344@estudiantes.upqroo.edu.mx', NULL, '$2y$10$vYvQjnMyXkNV64kCfz7Qeu2c.tDG.D5BAdMhIrx5jOGUg36T5tcHm', '', NULL, '2022-01-15 21:14:37', '2022-01-15 21:14:37'),
(52, '201700371', '201700371@estudiantes.upqroo.edu.mx', NULL, '$2y$10$HiCpHBNa.LudOz/r7pil4uYQkjofde3xb8RutDRWoa5UNnoRcFuBG', '', NULL, '2022-01-15 21:16:34', '2022-01-15 21:16:34'),
(53, '201700374', '201700374@estudiantes.upqroo.edu.mx', NULL, '$2y$10$WZz7g.YGSbPQTbbc.mnDT.7lzEPA2JZEwk2CfaQHgPShmyMRT10uu', '', NULL, '2022-01-15 21:17:56', '2022-01-15 21:17:56'),
(54, '201900285', '201900285@estudiantes.upqroo.edu.mx', NULL, '$2y$10$M.SiZO4pXvHvMFvshp/2duXAe3DKD3fcj7ZRv6xSOt17W1e8XF5K2', '', NULL, '2022-01-15 21:19:34', '2022-01-15 21:19:34'),
(55, '201800346', '201800346@estudiantes.upqroo.edu.mx', NULL, '$2y$10$15qZuUWtBGFppYg84ndrieVnW2ZGDlKCka3Z87NDzsfiHUAkbR48e', '', NULL, '2022-01-15 21:21:12', '2022-01-15 21:21:12'),
(56, '201800352', '201800352@estudiantes.upqroo.edu.mx', NULL, '$2y$10$u0NEXclz9DGutla49N78LetWWX65/1uaQoF8wJ6ix7z2fiiHzmIQq', '', NULL, '2022-01-15 21:25:55', '2022-01-15 21:25:55'),
(57, '201800353', '201800353@estudiantes.upqroo.edu.mx', NULL, '$2y$10$xW1CNq6zFNApaX3FTi7da.EY5oJDixbVkx2zVhyCBE/ALLrSx8FGu', '', NULL, '2022-01-15 21:27:04', '2022-01-15 21:27:04'),
(58, '201700382', '201700382@estudiantes.upqroo.edu.mx', NULL, '$2y$10$eX7cVSGy.VDyA/ZKgW1fVOP5Q.Ld7ELe0SLI116iLENmZrOK2MTj2', '', NULL, '2022-01-15 21:28:33', '2022-01-15 21:28:33'),
(59, '201800356', '201800356@estudiantes.upqroo.edu.mx', NULL, '$2y$10$aJ7fvliTC9R2aGxPqS2AheTdw5CHHwnRr76dIruDLLU/OyLueKISq', '', NULL, '2022-01-15 21:30:12', '2022-01-15 21:30:12'),
(60, '201800360', '201800360@estudiantes.upqroo.edu.mx', NULL, '$2y$10$H7HupjrguiSRQB7wBBCSDecQSxjzJi.AP49sfFWjqt069CV7yzn6a', '', NULL, '2022-01-15 21:31:58', '2022-01-15 21:31:58'),
(61, '201700386', '201700386@estudiantes.upqroo.edu.mx', NULL, '$2y$10$QQaei6mlZSLk6o3/SZsSle14vAP4V0H.D4iqRNQ6Lu2Y1vWXRiAWe', '', NULL, '2022-01-15 21:33:14', '2022-01-15 21:33:14'),
(62, '201800361', '201800361@estudiantes.upqroo.edu.mx', NULL, '$2y$10$YJzvbbR8m2tc5urTL/Vn6.ckUrEr2T3LYITOkkH4Tl0M6yM.9sE1G', '', NULL, '2022-01-15 21:34:35', '2022-01-15 21:34:35'),
(63, '201800363', '201800363@estudiantes.upqroo.edu.mx', NULL, '$2y$10$gEZYBY5L7krnLT5VpgOtguBjz9nWG6BC.t2pKn3D6FnGtegM8nKiW', '', NULL, '2022-01-15 21:35:33', '2022-01-15 21:35:33'),
(64, '201800364', '201800364@estudiantes.upqroo.edu.mx', NULL, '$2y$10$Bf9YOtdHXuvCqviE/3IPDePuj4QSfouiVUF9rCiM7XjKNzHZnzXmi', '', NULL, '2022-01-15 22:10:16', '2022-01-15 22:10:16'),
(65, '201800367', '201800367@estudiantes.upqroo.edu.mx', NULL, '$2y$10$RuYrmsGCxNrgQfjvE.ii1.fmSVuDwecS7jdem7tN58DO2GVFFqm96', '', NULL, '2022-01-15 22:11:00', '2022-01-15 22:11:00'),
(66, '201900367', '201900367@estudiantes.upqroo.edu.mx', NULL, '$2y$10$gkxOYRJSxIAyTGF5BYVStOSsNGCy7kaEDSrJ74LydklGTZsUD2S7a', '', NULL, '2022-01-15 22:11:32', '2022-01-15 22:11:32'),
(67, '201900050', '201900050@estudiantes.upqroo.edu.mx', NULL, '$2y$10$P1J4ohWpYk2Y6q7oKuP4UecIaBdWpdNG3kPaVCap8CNaaYFN.i4NK', '', NULL, '2022-01-15 22:12:37', '2022-01-15 22:12:37'),
(68, '201800087', '201800087@estudiantes.upqroo.edu.mx', NULL, '$2y$10$a8/RFT2uYpvdj.NP43zWnefkyo.QBtcdYPZv1iVqdSqy8p.DR9nk2', '', NULL, '2022-01-15 22:13:26', '2022-01-15 22:13:26'),
(69, 'Carlos Roberto Esquivel', 'ing.software@upqroo.edu.mx', NULL, '$2y$10$Gc3NRCS303QSauZgi7rbguwOyj4jyZs41vOYnY1Xg.k1kUr6cIwLW', '', NULL, '2022-01-15 23:42:55', '2022-01-15 23:42:55'),
(72, '201700067', '201700067@estudiantes.upqroo.edu.mx', NULL, '$2y$10$/38.sBpiJefZA2iKs..Jt.wfiQ/MeF7WabdnA1IW4P83Q24CCwToa', '', NULL, '2022-01-15 23:47:27', '2022-01-15 23:47:27'),
(73, '201800044', '201800044@estudiantes.upqroo.edu.mx', NULL, '$2y$10$PhV3LcVHgDiuf3sRvkfdjO4Ju/ItZY5S4zH8R47d.MdzT0CWMXuPO', '', NULL, '2022-01-15 23:49:28', '2022-01-15 23:49:28'),
(74, '201800050', '201800050@estudiantes.upqroo.edu.mx', NULL, '$2y$10$oR0bIsO205EYDZtFBDryKOjP3INukN1i58JY3hTyqU1ifCY68EGUO', '', NULL, '2022-01-15 23:49:59', '2022-01-15 23:49:59'),
(75, '201800057', '201800057@estudiantes.upqroo.edu.mx', NULL, '$2y$10$9CUXaxT.VroVxDrk6WFXXudWrlrQfeyqo5XZ7s6WEsU58shQEna9e', '', NULL, '2022-01-15 23:50:32', '2022-01-15 23:50:32'),
(76, '201800061', '201800061@estudiantes.upqroo.edu.mx', NULL, '$2y$10$OPmWZGJgScXjRMpKD.4BB.qZUcFs180riEwJj2ttQdyx./KpYW6J2', '', NULL, '2022-01-15 23:51:08', '2022-01-15 23:51:08'),
(77, '201800073', '201800073@estudiantes.upqroo.edu.mx', NULL, '$2y$10$VYVWP/YLcY7fAavJch3v2uMy6pS9if9zq5uN61wO/sW6U52lzQYx2', '', NULL, '2022-01-15 23:51:39', '2022-01-15 23:51:39'),
(78, '201800081', '201800081@estudiantes.upqroo.edu.mx', NULL, '$2y$10$5v8bpCJL8m3PiEDNhLgz0u2vCuhEEA49sID.gXzA1abx6gArgSPQK', '', NULL, '2022-01-15 23:52:13', '2022-01-15 23:52:13'),
(79, '201800082', '201800082@estudiantes.upqroo.edu.mx', NULL, '$2y$10$.rxa2wWGH0J3.FPP6/D7DeCPAP2fxC39nSF/p4F2if26RMffDiwYW', '', NULL, '2022-01-15 23:52:46', '2022-01-15 23:52:46'),
(80, '201700092', '201700092@estudiantes.upqroo.edu.mx', NULL, '$2y$10$0D5dFXBpTWRBOteOGf7x7e2mHTOwkmTk5Q8.hMRaM52d/oNAoNDwq', '', NULL, '2022-01-15 23:53:26', '2022-01-15 23:53:26'),
(81, '201700095', '201700095@estudiantes.upqroo.edu.mx', NULL, '$2y$10$k7t0gS4QtuwpXUVbhLeBzuAc5clXCgvYyHjJA6VPKRYuW9Etx/.NO', '', NULL, '2022-01-15 23:53:58', '2022-01-15 23:53:58'),
(82, 'Josmar', 'yosmarherrerax23@gmail.com', NULL, '$2y$10$UPkB1ofbe/nuYOvIVsbGw.6XILlDy3qKD6qHUwXLVzSeAEwkI0ozy', '', NULL, '2022-01-17 06:36:13', '2022-01-17 06:36:13'),
(83, '201900101', '201900101@estudiantes.upqroo.edu.mx', NULL, '$2y$10$4rCq.La4b.EE2KqrnOkZt.zbYrV1bY1b4959mwNcNRWTJHkJ5bZlO', '', NULL, '2022-01-17 06:59:29', '2022-01-17 06:59:29'),
(84, '201800031', '201800031@estudiantes.upqroo.edu.mx', NULL, '$2y$10$PpIpbqDyoZVHEbFMGkFYcuieFW.aekPzP8/mWg7xcs7227tJRj6pW', '', NULL, '2022-01-17 07:01:04', '2022-01-17 07:01:04'),
(85, '202000472', '202000472@estudiantes.upqroo.edu.mx', NULL, '$2y$10$cHqFCkiFSGToFtvvQ4OlWO5Xcsk2YWGC12Bz.9bXd2WhvrwwVfaiK', '', NULL, '2022-01-17 07:02:37', '2022-01-17 07:02:37'),
(86, '201800317', '201800317@estudiantes.upqroo.edu.mx', NULL, '$2y$10$lPz2FKzunCF5LeTxIT9BBe50jqFpMrxNJ23bU8rMCpKe9oLseup/6', '', NULL, '2022-01-17 07:11:19', '2022-01-17 07:11:19'),
(87, 'admin', 'admin@test.com', NULL, '$2y$10$aRLx9bf7oJCHUhhbiGhCvuwYXJZfAMby593QxjpEWsKWfBkOPVcda', 'admin', NULL, '2022-01-21 03:55:51', '2022-01-21 03:55:51'),
(89, 'abraham', 'abraham@test.com', NULL, '$2y$10$W2QuyE7ZAGtVAHVvSgysneoRgSu6Iy2crnq.F0N/WLVlt8TFi4Jqq', 'admin', NULL, '2022-01-24 08:56:32', '2022-01-24 08:56:32'),
(90, 'hugo', 'hugo@test.com', NULL, '$2y$10$usL8Q1Mj0EPX/bIkLQNJx.HRsrRwnFE1sauv.5TcoTYwyu4cPHO7K', 'admin', NULL, '2022-01-24 09:11:07', '2022-01-24 09:11:07'),
(91, 'Luis', 'luis@test.com', NULL, '$2y$10$EPn8Bms7S2chPGwoxfkLb.RlQEOy7EANMyXeJPUyh8dfDEfD54eXq', 'admin', NULL, '2022-01-31 01:42:02', '2022-01-31 01:42:02'),
(92, 'Luis', 'luis@test.com', NULL, '$2y$10$ng194vo4KEtUNDyj24naruz9uZjf1YQtUDECXqXAfYo34vP2G/GnW', 'admin', NULL, '2022-01-31 01:44:18', '2022-01-31 01:44:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Proceso` (`id_procesos`),
  ADD KEY `ID_Carrera` (`id_carrera`);

--
-- Indices de la tabla `asesor_academico`
--
ALTER TABLE `asesor_academico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Cargo` (`id_cargo`);

--
-- Indices de la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Cargo` (`id_cargo`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Tipo` (`id_tipo`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Alumno` (`id_alumno`),
  ADD KEY `ID_Empresa` (`id_empresa`),
  ADD KEY `ID_Asesor_Emp` (`id_asesor_emp`),
  ADD KEY `ID_Asesor_Aca` (`id_asesor_aca`),
  ADD KEY `ID_Proyecto` (`id_proyecto`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`id_procesos`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Usuario` (`id_usuario`),
  ADD KEY `ID_Formulario` (`id_formulario`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `asesor_academico`
--
ALTER TABLE `asesor_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id_procesos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`ID_Procesos`) REFERENCES `procesos` (`ID_Procesos`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`ID_Carrera`) REFERENCES `carreras` (`ID_Carrera`);

--
-- Filtros para la tabla `asesor_academico`
--
ALTER TABLE `asesor_academico`
  ADD CONSTRAINT `asesor_academico_ibfk_1` FOREIGN KEY (`ID_Cargo`) REFERENCES `cargo` (`ID_Cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  ADD CONSTRAINT `asesor_empresarial_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`ID_Cargo`);

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipo` (`ID_Tipo`);

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`ID_Alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_ibfk_2` FOREIGN KEY (`ID_Asesor_Aca`) REFERENCES `asesor_academico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_ibfk_3` FOREIGN KEY (`ID_Empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_ibfk_4` FOREIGN KEY (`ID_Proyecto`) REFERENCES `proyecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_ibfk_5` FOREIGN KEY (`ID_Asesor_Emp`) REFERENCES `asesor_empresarial` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`ID_Formulario`) REFERENCES `formulario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`ID_Usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
