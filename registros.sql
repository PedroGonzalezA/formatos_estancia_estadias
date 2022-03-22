-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2022 a las 01:30:31
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.26

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
  `nombres` varchar(100) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `matricula` varchar(40) DEFAULT NULL,
  `email_per` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `no_ss` varchar(11) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `id_procesos` int(10) NOT NULL,
  `id_carrera` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `ape_paterno`, `ape_materno`, `nombres`, `tel`, `matricula`, `email_per`, `email`, `no_ss`, `direccion`, `id_procesos`, `id_carrera`) VALUES
(1, 'Barrera', 'Salinas', 'Brenda Karen', '9984921345', '201800239', 'brendaesaucb@gmail.com', '201800239@estudiantes.upqroo.edu.mx', '11169623789', 'CALLE GUAYABA EDIF M5', 3, 7),
(2, 'Landa', 'Vivas', 'Joshua', '9983041741', '201800361', 'joshualv46@gmail.com', '201800361@estudiantes.upqroo.edu.mx', '53160040555', 'Calle Río Grijalva, Mzn. 11 Lt. 1 No. 19 Fracc. Andalucía', 1, 1),
(3, 'Perez', 'Villarreal', 'Julio Eduardo', '9988603300', '201800082', 'julio9988952669@gmail.com', '201800082@estudiantes.upqroo.edu.mx', '27160035104', 'Hdas real del caribe Hdas de uman casa 1690 A', 3, 4),
(4, 'Camarena', 'Cervantes', 'Jonathan Israel', '9981400563', '201800044', 'jonathan.israel.2000@hotmail.com', '201800044@estudiantes.upqroo.edu.mx', '13160096932', 'CLL Quinta los Arcos SM 202', 3, 4),
(6, 'Arias', 'Magaña', 'Laura Karina', '9982441599', '201700251', 'arias.150310@gmail.com', '201700251@estudiantes.upqroo.edu.mx', '26169909921', 'REG.216 M50 L 1 CASA 1289 FRACC. GALAXIAS LA GUADALUPANA', 3, 7),
(7, 'Cuevas', 'Moreno', 'Doroty Oliva', '9983402971', '201800259', 'totiss1999@gmail.com', '201800259@estudiantes.upqroo.edu.mx', '71169960953', 'Carretera Federal Cancún-Mérida, Km 300, Fraccionamiento las Palmas, calle Palma Real, s/n.', 3, 7),
(8, 'Pérez', 'Medina', 'Alejandra del Carmen', '9982416533', '201800016', 'aleperezmedina05@gmail.com', '201800026@estudiantes.upqroo.edu.mx', '17170032431', 'Calle 52 Región 510 Manzana 57 Lote 06', 1, 2),
(9, 'Canul', 'Canul', 'Daniela Denise', '9983194399', '201700374', 'denise.1202099@gmail.com', '201700374@estudiantes.upqroo.edu.mx', '21169976574', 'Col. Milagro av. México con Paraguay', 2, 1),
(17, 'Hernández', 'López', 'Eduardo Daniel', '9988651216', '201800356', 'Lalo_daniel09@hotmail.com', '201800356@estudiantes.upqroo.edu.mx', '71169972669', 'Reg. 520, Mz 38, lt1.', 3, 1),
(18, 'Soler', 'Zetina', 'Moisés', '9983989646', '201900365', 'moises0991@gmail.com', '201900365@estudiantes.upqroo.edu.mx', '05189908873', 'Colonia pedregal calle cantera M 783', 2, 4),
(19, 'Arias', 'Magaña', 'Laura Karina', '9982441599', '201700251', 'arias.150310@gmail.com', '201700251@estudiantes.edu.mx', '26169909921', 'reg.216 m50 lt1 casa 1289', 3, 7),
(20, 'CHABLE', 'CIAU', 'ARIANA NOEMI', '9984852333', '201700268', 'arianachableciau@gmail.com', '201700268@estudiantes.upqroo.edu.mx', '24169928371', 'Región 236 Mz. 20 Lt. 30 Calle 124 A', 3, 1),
(21, 'CHABLE', 'CIAU', 'ARIANA NOEMI', '9984852333', '201700268', 'arianachableciau@gmail.com', '201700268@estudiantes.upqroo.edu.mx', '24169928371', 'Región 236 Mz. 20 Lt. 30 Calle 124 A', 3, 7),
(22, 'Hernández', 'Hernández', 'Daniel', '9983150735', '201800061', 'danielhdezhdez001@gmail.com', '201800061@estudiantes.upqroo.edu.mx', '16130081314', 'SM259 M62 L1 No59, calle Palma Mexicana', 3, 4),
(23, 'Nava', 'Castro', 'Nycte-Ha', '9982311783', '201700038', 'nycte.ha13@gmail.com', '201700038@estudiantes.upqroo.edu.mx', '44169927934', '#10 Porto carrara, Villa marino', 3, 2),
(24, 'Peraza', 'Sulub', 'Brenda Lisette', '9985028452', '201800024', 'brendixd.2000@gmail.com', '201800024@estudiantes.upqroo.edu.mx', '53160075114', 'Cerrada siricote, Prado Norte', 3, 2),
(25, 'Leon', 'Cuapio', 'Raquel', '9982597476', '201800293', 'daraluna322@gmail.com', '201800293@estudiantes.upqroo.edu.mx', '31169889701', 'Reg. 232 Mz 38 Lt 16, Calle 68', 3, 7),
(26, 'Calvo', 'Jimenez', 'Mariana Guadalupe', '9984192082', '201800250', 'mariguadalupe476@gmail.com', '201800250@estudiantes.upqroo.edu.mx', '53160053418', 'Reg. 238 Mz.10 Lt. 16 Calle. 53', 3, 7),
(27, 'Calvo', 'Jimenez', 'Mariana Guadalupe', '9984192082', '201800250', 'mariguadalupe476@gmail.com', '201800250@estudiantes.upqroo.edu.mx', '53160053418', 'Reg. 238 Mz.10 Lt. 16 Calle. 53', 3, 7),
(28, 'Alcocer', 'May', 'Cinthia Michelle', '9983204109', '201800226', 'Cynthiaalcocer9@gmail.com', '201800226@estudiantes.upqroo.edu.mx', '53160049838', 'S.M 521 LT70B', 3, 7),
(29, 'PALOMO', 'ECHAVARRIA', 'MIGUEL ALEXANDER', '9981797450', '201700095', 'alexander.palomo0310@gmail.com', '201700095@estudiantes.upqroo.edu.mx', '84108904586', 'CALLE 100 MANZANA 93 LOTE13 REGION 227', 3, 4),
(30, 'Balam', 'Martinez', 'Jose Rodrigo', '9842050305', '201800236', 'rbalam759@gmail.com', '201800236@estudiantes.upqroo.edu.mx', '55169840406', 'Calle 14 entre 85 y 90 colonia ejido', 3, 7),
(35, 'Perez', 'Maza', 'Arumy Crystal', '9981559515', '201900030', 'perezmaza05@gmail.com', '201900030@estudiantes.upqroo.edu.mx', '71169990331', 'Calle Lamania M81 L1 No.24  supmza 247 Fraccionamiento Azul Bonampak', 2, 2),
(36, 'Lizbeth Alejandra', 'Mas', 'De León', '9981265907', '201800299', 'lizmas2870@gmail.com', '201800299@estudiantes.upqroo.edu.mx', '06139961640', 'Av. Rancho Viejo mz03 Lt13', 3, 7),
(37, 'Quijada', 'Canto', 'Paola Alejandra', '9983992105', '201800317', 'palejandraquicanto@hotmail.com', '201800317@estudiantes.upqroo.edu.mx', '53160076211', 'Sm 107 Mz 18 Lt 4 fraccionamiento paraiso Maya', 3, 7),
(38, 'Morales', 'Damian', 'Erick', '9983030392', '201700092', 'guppy.elk69@gmail.com', '201700092@estudiantes.upqroo.edu.mx', '23169760354', 'FRACC REAL LAS QUINTAS,PUMZA 202, QUINTAS LAS BARRANCAS, MZA 6, LT 4, N1', 3, 4),
(41, 'Martinez', 'Mendez', 'Alam Axel', '9983962404', '201800073', 'mendxel@gmail.com', '201800073@estudiantes.upqroo.edu.mx', '17139961555', 'Fraccionamiento Paseos Kabah Mz 1 Lt4 Sm223 #25', 3, 4),
(42, 'Martinez', 'Mendez', 'Alam Axel', '9983962404', '201800073', 'mendxel@gmail.com', '201800073@estudiantes.upqroo.edu.mx', '17139961555', 'Fraccionamiento Paseos Kabah Mz 1 Lt4 Sm223 #25', 3, 4),
(43, 'Martinez', 'Mendez', 'Alam Axel', '9983962404', '201800073', 'mendxel@gmail.com', '201800073@estudiantes.upqroo.edu.mx', '17139961555', 'Fraccionamiento Paseos Kabah Mz 1 Lt4 Sm223 #25', 3, 4),
(44, 'Martinez', 'Mendez', 'Alam Axel', '9983962404', '201800073', 'mendxel@gmail.com', '201800073@estudiantes.upqroo.edu.mx', '17139961555', 'Fraccionamiento Paseos Kabah Mz 1 Lt4 Sm223 #25', 3, 4),
(48, 'Palma', 'Pérez', 'Manuel Enrique', '9981984143', '201800118', 'palmaperezmepp@gmail.com', '201800118@estudiantes.upqroo.edu.mx', '82119344651', 'sm 260 mz 10 lt 6-1 Frcc. Prado Norte', 3, 3),
(49, 'GUTIERREZ', 'GUTIERREZ', 'LIZBETH MAYREN', '9984957503', '201800176', 'lizbethgutierrez5253@gmail.com', 'lizbethgutierrez5253@gmail.com', '31169929655', '5A DEL MANGO M1 L2 54, SPMZA 247 VILLAS OTOCH 77516.', 1, 6),
(50, 'Perez', 'Sarabia', 'Victor', '9981971788', '201800120', 'victorperezsarabia22@gmail.com', '201800120@estudiantes.upqroo.edu.mx', '17130066008', 'Paraiso maya region 107 manzana 3 lote 6', 1, 3),
(52, 'López', 'Vidal', 'Luis Gerardo', '9984995563', '201800186', 'jerrys3rl2469@gmail.com', '201800186@estudiantes.upqroo.edu.mx', '71169978914', 'SM 247 M2 L3 CALLE 4TA PRIV EL MANGO VILLAS OTOCH', 3, 6),
(53, 'Perez', 'Medina', 'Alejandra del Carmen', '9982416533', '201800026', 'perezmedinale@gmail.com', '201800026@estudiantes.upqroo.edu.mx', '17170032431', 'Región 510 Manzana 57 Lote 06 Calle 52 Cecilio Chi', 1, 2),
(54, 'YAH', 'CUEVAS', 'LEYDI NAYARINA', '9981528565', '202000472', 'yah.leydi@gmail.com', '202000472@upqroo.edu.mx', '82129415475', 'CALLE 34 REG 103 MZA 28 LT 15', 2, 3),
(55, 'Caamal', 'Cauich', 'Francisco de Jesús', '9984241105', '201700120', 'caamalfrancisco18@gmail.com', '201700120@estudiantes.upqroo.edu.mx', '71169951127', 'Reg 217 Mza 48 Lt 1 #1306', 3, 3),
(57, 'Caamal', 'Cauich', 'Francisco de Jesús', '9984241105', '201700120', 'caamalfrancisco18@gmail.com', '201700120@estudiantes.upqroo.edu.mx', '71169951127', 'Reg 217 Mza 48 Lt 1 #1306', 3, 3),
(58, 'Caamal', 'Cauich', 'Francisco de Jesús', '9984241105', '201700120', 'caamalfrancisco18@gmail.com', '201700120@estudiantes.upqroo.edu.mx', '71169951127', 'Reg 217 Mza 48 Lt 1 #1306', 3, 3),
(59, 'Martinez', 'Mendez', 'Alam Axel', '9983962404', '201800073', 'mendxel@gmail.com', '201800073@estudiantes.upqroo.edu.mx', '17139961555', 'Jose Antiono Torres mz1 Lt4 sm223 #25', 3, 4),
(60, 'piña', 'montalvo', 'andre alberto', '9981817213', '201700332', 'andyalberto99@gmail.com', '201700332@estudiantes.upqroo.edu.mx', '03169998808', 'calle 36 MZA 72 LT 12 SUPMZA 101', 3, 7),
(62, 'Pérez', 'Medina', 'Alejandra del Carmen', '9982416533', '201800026', 'perezmedinale@gmail.com', '201800026@ESTUDIANTES.UPQROO.EDU.MX', '17170032431', 'Reg. 510 Mza. 57 Lt. 06 Calle 52', 1, 2),
(63, 'SOBERANIS', 'CAAMAL', 'NATALIA GUADALUPE', '9982313530', '201700154', 'natalia.gsc15@gmail.com', '201700154@estudiantes.upqroo.edu.mx', '55169895434', 'SM 104 MZA 49 LT 1 CALLE RUBÍ NO. 103', 3, 3),
(64, 'Sosa', 'Tejero', 'Brando Angel', '9982434397', '201700044', 'sosabrandol9@gmail.com', '201700044@estudiantes.upqroo.edu.mx', '72169900965', 'Reg. 102 Mzn.22 Lt.28 Calle. 18', 3, 2),
(65, 'PEREZ', 'CEBALLOS', 'LIZETH ALEJANDRA', '9983673660', '202000430', 'lizethceballos5@gmail.com', '202000430@estudiantes.upqroo.edu.mx', '46170247525', 'galaxia la guadalupana region 211 manzana 58 lote 1 casa 1337', 1, 6),
(66, 'Martinez', 'Perez', 'Montserrat', '9983705015', '202000421', 'monmartinez230@gmail.com', '202000421@estudiantes.upqroo.edu.mx', '55169874595', 'SM 254 Mz 40 LT 03 CASA 208 CD Arenisca y Resid. La joya', 1, 6),
(67, 'Cuevas', 'Moreno', 'Dorory Oliva', '9983402971', '201800259', 'totiss1999@gmail.com', '201800259@estudiantes.upqroo.edu.mx', '71169960953', 'Carretera federal Cancun-Mérida Km301, fraccionamiento las palmas, calle palma real, s/n', 3, 7),
(70, 'Martínez', 'Canche', 'Neysi Rubi', '9911097694', '202000053', 'rubimartinezc2702@gmail.com', '202000053@estudiantes.upqroo.edu.mx', '44200260014', 'AV 50. M 49. L8. SUPMZA 510. Cecilio Chi, Benito Juarez, Quintana Roo', 1, 2),
(71, 'Ramirez', 'Larrea', 'Uriel', '9983765558', '202000032', 'urielblik@gmail.com', '202000032@estudiantes.upqroo.edu.mx', '44170234502', 'Av. Pedregal, Calle Granate, Supermanzana 6E, 77503', 1, 2),
(74, 'Perez', 'Maza', 'Arumy Crystal', '9981559515', '201900030', 'perezmaza05@gmail.com', '201900030@estudiantes.upqroo.edu.mx', '71169990331', 'Calle Lamania M81 L1 No.24  supmza 247 Fraccionamiento Azul Bonampak', 2, 2),
(75, 'Villegas', 'Hernández', 'Zayri', '9981068567', '201700361', 'villegas-hernandez@live.com.mx', '201700361@estudiantes.upqroo.edu.mx', '49169675508', 'C 80 Mz 12 L1 EDIF 1 No. Int 203 SUPMZA 77 Corales 77', 3, 7),
(76, 'Magaña', 'González', 'Darwin Joel', '9983367794', '202000023', 'darwinmx32@gmail.com', 'darwinmx32@gmail.com', '46170258530', 'SM 217, M 48, L1, Priv. Río Santana, NoExt 1273, Col. La Guadalupana, CP 77518', 1, 2),
(77, 'Magaña', 'González', 'Darwin Joel', '9983367794', '202000023', 'darwinmx32@gmail.com', 'darwinmx32@gmail.com', '46170258530', 'SM 217, M 48, L1, Priv. Río Santana, NoExt 1273, Col. La Guadalupana, CP 77518', 1, 2),
(78, 'Ramirez', 'Larrea', 'Uriel', '9983765558', '202000032', 'urielblik@gmail.com', '202000032@estudiantes.upqroo.edu.mx', '44170234502', 'Av. Pedregal, Calle Granate, Supermanzana 6E, 77503', 1, 2),
(79, 'Hernández', 'López', 'Eduardo Daniel', '9988651216', '201800356', 'Eduardo_Hernandez1519@hotmail.com', '201800356@estudiantes.upqroo.edu.mx', '71169972669', 'Reg. 520, mz 38, lt 1, Villas del Jordán', 3, 1),
(81, 'Frias', 'Canul', 'victor', '9981350115', '201800171', 'friasv191@gmail.com', '201800171@estudiantes.upqroo.edu.mx', '25159578571', 'sm215 mz6 lt3 casa 6 calle francisco villa colonia los héroes', 2, 5),
(83, 'Chuc', 'Cohuo', 'Alex Joel', '9985251203', '201800156', 'achuc8468@gmail.com', '201800156@estudiantes.upqroo.edu.mx', '08180078878', 'SM249,M533,L1 AV.LAK. C.P77500', 2, 6),
(84, 'López', 'Chan', 'Leydi Griseldi', '9984046964', '201800363', 'leydi.lopez.g@hotmail.com', '201800363@estudiantes.upqroo.edu.mx', '34169951109', 'Reg:103, Mza:42, Lt:4', 3, 1),
(85, 'Ortiz', 'Martinez', 'Francisco Daniel', '9987041645', '201800081', 'fco.daniel@live.com.mx', '201800081@estudiantes.upqroo.edu.mx', '05169933784', 'Sm 249 Mz 11 Lt 1 No 17', 3, 4),
(86, 'Palma', 'Pérez', 'Manuel enrique', '9981984143', '201800118', 'palmaperezmepp@gmail.com', '201800118@estudiantes.upqroo.edu.mx', '82119344651', 'Sm 260 mz 10 lt 6-1, fracc. Prado norte.', 3, 3),
(88, 'Alonso', 'Borges', 'Mauricio Rafael', '9841329438', '202000001', 'mauricioal2405@gmail.com', '202000001@estudiantes.upqroo.edu.mx', '71169945707', 'SM514 M9 L1 Paseo Loltum 41A Fracc Paseos del Caribe CP 77535', 1, 2),
(89, 'Nah', 'Dzul', 'Alexis Argenis', '9983957294', '201800021', 'alexisargenis555@gmail.com', '201800021@estudiantes.upqroo.edu.mx', '2160068710', 'Haciendas Del Caribe, Av: Ixtepec, Circuito De Ixtlán, Mz: 82. Lt: 3 N°:1619-B Sm: 200', 3, 2),
(91, 'Mendoza', 'Dzul', 'Abigail Guadalupe', '9983366610', '201700316', 'abigailgpe9904@gmail.com', '201700316@estudiantes.upqroo.edu.mx', '71169982528', 'Alejandría, calle fuentes de nicea casa 26.', 3, 7),
(93, 'SOBERANIS', 'CAAMAL', 'NATALIA GUADALUPE', '9982313530', '201700154', 'natalia.gsc15@gmail.com', '201700154@upqroo.edu.mx', '55169895434', 'SM104 MZA49 LT1 CALLE RUBÍ No.103 LINDA VISTA', 3, 3),
(95, 'Rivero', 'Canché', 'María Deniss Michel', '9911066138', '201800031', 'maria510-rc@hotmail.com', '201800031@estudiantes.upqroo.edu.mx', '71169994747', 'Región 510, Mza. 49, Lt. 8. Colonia Cecilio Chi, Cancún, Q. Roo.', 3, 2),
(96, 'Kinil', 'Kumul', 'Esteban', '9984175338', '202000017', 'estebankinilkumul7@gmail.com', '202000017@estudiantes.upqroo.edu.mx', '35139975300', 'Sm 104 Mz 34 L 1-08 Fraccionamiento Paraíso Maya', 1, 2),
(97, 'Puc', 'Osorio', 'Henri Gerardo', '9985251097', '202000031', 'gpucosorio@gmail.com', '202000031@estudiantes.edu.upqroo.mx', '50159763858', 'Fracc. Vista Real Av. Monte Gibraltar Smz 252 Mz 26 Lt3 #44 C.P 77518', 1, 2),
(98, 'Tome', 'Molina', 'Erick Yahir', '9983924233', '201900037', 'erickyahir2609010310@gmail.com', '201900037@estudiantes.upqroo.edu.mx', '10160144399', 'Jacarandas 02, Villas del Mar Plus', 2, 2),
(100, 'Gonzalez', 'Araujo', 'Pedro Jesus', '9981316578', '201800057', 'pedro-pister@hotmail.com', '201800057@estudiantes.upqrooo.edu.mx', '71169968774', 'reg 103 calle 30 mz 50 lt 27', 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno_def`
--

CREATE TABLE `alumno_def` (
  `id` int(11) NOT NULL,
  `grupo` varchar(55) DEFAULT NULL,
  `cuatrimestre` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_terminacion` time DEFAULT NULL,
  `fecha_terminacion` date DEFAULT NULL,
  `id_periodo` int(11) DEFAULT NULL,
  `id_proceso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_academico`
--

CREATE TABLE `asesor_academico` (
  `id` int(11) NOT NULL,
  `ape_paterno_aa` varchar(40) DEFAULT NULL,
  `ape_materno_aa` varchar(40) DEFAULT NULL,
  `nombres_aa` varchar(100) DEFAULT NULL,
  `tel_lada_aa` varchar(3) DEFAULT NULL,
  `tel_num_aa` varchar(10) DEFAULT NULL,
  `email_aa` varchar(40) DEFAULT NULL,
  `id_cargo_aa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asesor_academico`
--

INSERT INTO `asesor_academico` (`id`, `ape_paterno_aa`, `ape_materno_aa`, `nombres_aa`, `tel_lada_aa`, `tel_num_aa`, `email_aa`, `id_cargo_aa`) VALUES
(1, 'López', 'Cortés', 'Adriana', NULL, '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(2, 'Cuevas', 'Torres', 'Argely', NULL, '9982601722', 'argely.cuevas@upqroo.edu.mx', 2),
(3, 'Flores', 'Barrera', 'Manuel Alejandro', NULL, '9981399555', 'manuel.flores@upqroo.edu.mx', 2),
(4, 'Flores', 'Barrera', 'Manuel Alejandro', NULL, '9981399555', 'manuel.flores@upqroo.edu.mx', 2),
(6, 'Lopez', 'Cortes', 'Adriana', NULL, '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(7, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', NULL, '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(8, 'Cuevas', 'Torres', 'Argely Guadalupe', NULL, '9982601722', 'ing.biomedica@upqroo.edu.mx', 2),
(16, 'López', 'Ancona', 'Gerardo Ismael', NULL, '9999976892', 'g.lopez@docentes.upqroo.edu.mx', 8),
(17, 'Esquivel', 'Briceño', 'Carlos Roberto', NULL, '9983167164', 'ing.software@upqroo.edu.mx', 1),
(18, 'López', 'Cortés', 'Adriana', NULL, '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(19, 'LÓPEZ', 'CORTEZ', 'ADRIANA', NULL, '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(20, 'LÓPEZ', 'CORTEZ', 'ADRIANA', NULL, '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(21, 'Flores', 'Barrera', 'Manuel Alejandro', NULL, '9981399555', 'mfloresupqroo@gmail.com', 2),
(22, 'Castañeda', 'Gutíerrez', 'Gerardo Emmanuel', NULL, '9982218000', 'gcastaneda@upqroo.edu.mx', 2),
(23, 'Castañeda', 'Gutíerrez', 'Gerardo Emmanuel', NULL, '9982218000', 'gcastaneda@upqroo.edu.mx', 2),
(24, 'López', 'Cortes', 'Adriana', NULL, '2411248324', 'adriana.lopez@upqroo.edu.mx', 1),
(25, 'Lopez', 'Cortez', 'Adriana', NULL, '2411248327', 'lic.terapiafisica@upqroo.edu.mx', 1),
(26, 'Lopez', 'Cortez', 'Adriana', NULL, '2411248327', 'lic.terapiafisica@upqroo.edu.mx', 1),
(27, 'FLORES', 'BARRERA', 'MANUEL ALEJANDRO', NULL, '9981399555', 'manuel.flores@upqroo.edu.mx', 1),
(28, 'López', 'Córtes', 'Adriana', NULL, '2411248327', 'lic.terapiafisica@upqroo.edu.mx', 1),
(33, 'Castañeda', 'Gutierrez', 'Gerardo Emmanuel', NULL, '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(34, 'López', 'Cortés', 'Adriana', NULL, '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(35, 'López', 'Cortés', 'Adriana', NULL, '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(36, 'Flores', 'Barrera', 'Manuel Alejandro', NULL, '9981399555', 'mfloresupqroo@gmail.com', 2),
(42, 'Audelo', 'García', 'Juan Manuel', NULL, '9982402735', 'jaudelo@upqroo.edu.mx', 3),
(43, 'ORTEGA', 'ESPINOSA', 'VIRIDIANA ALHELI', NULL, '9981003112', 'v.ortega@docentes.upqroo.edu.mx', 1),
(44, 'Audelo', 'Garcia', 'Juan Manuel', '052', '9982831859', 'jaudelo@upqroo.edu.mx', 3),
(46, 'Ortega', 'Espinosa', 'Viridiana Alhelí', NULL, '9981003112', 'v.ortega@docentes.upqroo.edu.mx', 1),
(47, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', NULL, '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(48, 'Audelo', 'García', 'Juan Manuel', '052', '9982831859', 'jaudelo@upqroo.edu.mx', 3),
(50, 'Audelo', 'Garcia', 'Juan Manuel', '052', '9982831859', 'jaudelo@upqroo.edu.mx', 3),
(51, 'Flores', 'Barrera', 'Manuel Alejandro', '052', '9981399555', 'mfloresupqroo@gmail.com', 2),
(52, 'lopez', 'cortez', 'adriana', '052', '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(54, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', NULL, '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(55, 'AUDELO', 'GARCIA', 'JUAN MANUEL', '052', '9982831859', 'jaudelo@upqroo.edu.mx', 8),
(56, 'Díaz', 'Hernández', 'Job Alí', '052', '9988429553', 'job.diaz@upqroo.edu.mx', 5),
(57, 'CARBALLO', 'PUC', 'OSCAR ARTURO', '052', '4731215230', 'o.carballo@upqroo.edu.mx', 8),
(58, 'Carballo', 'Puc', 'Oscar Arturo', '052', '4731215230', 'o.carballo@upqroo.edu.mx', 3),
(59, 'Lopez', 'Cortes', 'Adriana', '241', '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(62, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', NULL, '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(63, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', '998', '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(66, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', NULL, '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(67, 'López', 'Cortes', 'Adriana', '052', '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(68, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', NULL, '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(69, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', NULL, '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(70, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', '998', '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(71, 'López', 'Ancona', 'Gerardo Ismael', NULL, '9999976892', 'g.lopez@docentes.upqroo.edu.mx', 8),
(73, 'Gallegos', 'Basto', 'Luis Alberto', '052', '9982144143', 'lic.gestion@upqroo.edu.mx', 1),
(75, 'Gallegos', 'Basto', 'Luis Alberto', '052', '9982144143', 'lic.gestion@upqroo.edu.mx', 1),
(76, 'López', 'Ancona', 'Gerardo Ismael', '052', '9999976892', 'G.LOPEZ@docentes.upqroo.edu.mx', 3),
(77, 'Flores', 'Barrera', 'Manuel Alejandro', '052', '9981399555', 'manuel.flores@uproo.edu.mx', 2),
(78, 'Audelo', 'García', 'Juan Manuel', NULL, '9982402735', 'jaudelo@upqroo.edu.mx', 3),
(80, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', '052', '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(81, 'Díaz', 'Hernández', 'Job Alí', '998', '9988429553', 'job.diaz@upqroo.edu.mx', 5),
(83, 'López', 'Cortés', 'Adriana', NULL, '2411248327', 'adriana.lopez@upqroo.edu.mx', 1),
(85, 'AUDELO', 'GARCÍA', 'JUAN MANUEL', '052', '9982831859', 'jaudelo@upqroo.edu.mx', 8),
(87, 'Díaz', 'Hernández', 'Job Alí', NULL, '9988429553', 'job.diaz@upqroo.edu.mx', 5),
(88, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', '998', '9982218000', 'gcastaneda@upqroo.edu.mx', 2),
(89, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', '998', '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(90, 'Castañeda', 'Gutiérrez', 'Gerardo Emmanuel', '998', '9982831859', 'gcastaneda@upqroo.edu.mx', 2),
(92, 'Flores', 'Barrera', 'Manuel Alejandro', '052', '9981399555', 'manuel.flores@upqroo.edu.mx', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_empresarial`
--

CREATE TABLE `asesor_empresarial` (
  `id` int(11) NOT NULL,
  `ape_paterno_ae` varchar(40) DEFAULT NULL,
  `ape_materno_ae` varchar(40) DEFAULT NULL,
  `nombres_ae` varchar(100) DEFAULT NULL,
  `tel_lada_ae` varchar(3) DEFAULT NULL,
  `tel_num_ae` varchar(10) DEFAULT NULL,
  `email_ae` varchar(40) DEFAULT NULL,
  `id_cargo_ae` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asesor_empresarial`
--

INSERT INTO `asesor_empresarial` (`id`, `ape_paterno_ae`, `ape_materno_ae`, `nombres_ae`, `tel_lada_ae`, `tel_num_ae`, `email_ae`, `id_cargo_ae`) VALUES
(1, 'Díaz de Cossio', 'Priego', 'José Manuel', NULL, '7751084166', 'jmdiazdecossio28@gmail.com', 1),
(2, 'Carrillo', 'Diaz', 'Juan Arturo', NULL, '9982148673', 'sip58@hotmail.com', 2),
(3, 'Chan', 'Arjona', 'Roger Alberto', NULL, '9982900929', 'roger@wisphub.net', 2),
(4, 'Olmos', 'Lobato', 'Sara Alejandrina', NULL, '5519482317', 'solmos@xcaret.com', 2),
(6, 'Cueller', 'Valverde', 'Monserrat', NULL, '9988849285', 'rehabilitacion_terapias@hotmail.com', 1),
(7, 'Cahum', 'Chan', 'Emily Guadalupe', NULL, '9842920983', 'biologia.molecular@centroquimico.com.mx', 2),
(8, 'Carrillo', 'Diaz', 'Juan Arturo', NULL, '9982148673', 'sip58@hotmail.com', 2),
(16, 'Carrillo', 'Diaz', 'Juan Arturo', NULL, '9982148673', 'Sip58@hotmail.com', 8),
(17, 'Ramírez', 'Pérez', 'David', NULL, '9381191266', 'david@tecnodalpha.com', 1),
(18, 'Díaz de Cossio', 'Priego', 'José Manuel', NULL, '7751084166', 'jmdiazdecossio28@gmail.com', 1),
(19, 'CERVERA', 'TUR', 'JOSÉ ALEJANDRO', NULL, '9981670782', 'acervera-fisiatria@hotmail.com', 1),
(20, 'CERVERA', 'TUR', 'JOSÉ ALEJANDRO', NULL, '9981670782', 'acervera-fisiatria@hotmail.com', 1),
(21, 'Dajlala', 'Perez', 'Gisel', NULL, '9988970724', 'quiorti@gmail.com', 2),
(22, 'Olivares', 'Galeana', 'Bry\'an Adán', NULL, '7442217446', 'bryanolivares@irega.com.mx', 2),
(23, 'Oliveros', 'Galeana', 'Bry\'an Adan', NULL, '7442217446', 'bryanoliveros@irega.com.mx', 2),
(24, 'Martínez', 'Espinosa', 'Cristina', NULL, '9988876744', 'kynesiumucl@gmail.com', 1),
(25, 'Cervera', 'Tur', 'Jose Alejandro', NULL, '9981670782', 'acervera-fisiatria@hotmail.com', 1),
(26, 'Cervera', 'Tur', 'Jose Alejandro', NULL, '9981670782', 'acervera-fisiatria@hotmail.com', 1),
(27, 'Cervera', 'Tur', 'Jose Alejandro', NULL, '9981670782', 'acervera-fisiatria@hotmail.com', 1),
(28, 'ACOSTA', 'GONZALEZ', 'GILBERTO', NULL, '9982113008', 'gilberto.acosta@cicy.mx', 1),
(29, 'Betanzos', 'Méndez', 'Claudia Karina', NULL, '9842466007', 'heilenmedplaya@gmail.com', 1),
(34, 'Berriozabal', 'Islas', 'Christian Said', NULL, '7711985590', 'christian.berriozabal@upqroo.edu.mx', 2),
(35, 'Díaz de Cossio', 'Priego', 'José Manuel', NULL, '7751084166', 'jmdiazdecossio28@gmail.com', 1),
(36, 'Martínez', 'Espinosa', 'Cristina', NULL, '9988876744', 'cristinahealth@hotmail.com', 1),
(37, 'Trujano', 'Soya', 'Miguel Angel', NULL, '9981361711', 'mtrujano@savas.com.mx', 2),
(43, 'Herrera', 'Duarte', 'Daniel Alberto', NULL, '9983188633', 'daniel.herrera@humble.mx', 3),
(44, 'MEDINA', 'ARGAEZ', 'CECILIA', NULL, '9988685460', 'c.medina@sensiraresorts.com', 1),
(45, 'Davila', 'Madrid', 'Danielle Camargo', '052', '9983053586', 'danicamargo.imjuve@gmail.com', 3),
(47, 'García', 'Gómez', 'Lorée', NULL, '9999914490', 'loree.garcia@grupodg.net', 1),
(48, 'Cahum', 'Chan', 'Emily Guadalupe', NULL, '9842920983', 'biologia.molecular@centroquimico.com.mx', 2),
(49, 'Trevisan', 'Gonzalez', 'María del Pilar', '052', '9988899230', 'mtrevisa@vector.com.mx', 3),
(51, 'Chable', 'Ciau', 'Jazmin', '052', '9989801291', 'xk.jazminchable@gmail.com', 3),
(52, 'Chuc', 'Garcia', 'Edgar Alfredo', '052', '9988810100', 'echud@royalresorts.com', 2),
(53, 'lopez', 'martin', 'ruben', '052', '9982149435', 'rubenlopezfisio@hotmail.com', 1),
(55, 'Cahum', 'Chan', 'Emily Guadalupe', NULL, '9842920983', 'biologia.molecular@centroquimico.com.mx', 2),
(56, 'ENCALADA', 'GONZÁLEZ', 'MACARIO JESÚS', '052', '9988454058', 'mencalada@jetway.mx', 8),
(57, 'Caballero', 'Vázquez', 'José Adán', '052', '9982113008', 'docencia@cicy.mx', 5),
(58, 'TZUC', 'BALAM', 'JOSE MARIO ALBERTO', '052', '9984873136', 'biblioteca@upqroo.edu.mx', 8),
(59, 'Cocom', 'Avila', 'Jose Andres', '052', '9982028439', 'contabilidad@vgpconstrucciones.com', 3),
(60, 'Cuellar', 'Valverde', 'Monserrat', '998', '9988849285', 'rehabilitacion_terapias@hotmail.com', 1),
(63, 'Sánchez', 'Tomas', 'Mario', NULL, '9842920982', 'Coordinador.huaya@centroquimico.com.mx', 2),
(64, 'Ávila', 'Muñoz', 'Susana Guadalupe', '998', '9984174461', 'susana@laboratoriolimed.com', 2),
(67, 'Nava', 'Jimenez', 'Iris Aurora', NULL, '9982831859', 'inava@upqroo.edu.mx', 2),
(68, 'López', 'Martín', 'Rubén', '052', '9982149435', 'rubenlopezfisio@hotmail.com', 1),
(69, 'Ávila', 'Muñoz', 'Susana Guadalupe', NULL, '9984174461', 'susana@laboratoriolimed.com', 2),
(70, 'Ávila', 'Muñoz', 'Susana Guadalupe', '052', '9984174461', 'susana@laboratoriolimed.com', 2),
(71, 'Ávila', 'Muñoz', 'Susana Guadalupe', '998', '9984174461', 'susana@laboratoriolimed.com', 2),
(72, 'Carrillo', 'Diaz', 'Juan Arturo', NULL, '9982148673', 'Sip58@hotmail.com', 8),
(74, 'kumul', 'Pool', 'Suemy Maily', '052', '9981264678', 'asistenterh@beachscape.com.mx', 1),
(76, 'Balam', 'Sabido', 'Leidy Beatriz', '998', '9985528046', 'caphum951@soriana.com', 1),
(77, 'García', 'Quinto', 'Virginia', '052', '9981362989', 'vgarcia@hospitalgalenia.com', 3),
(78, 'Esquivel', 'Briceño', 'Carlos Roberto', '052', '9985543503', 'ing.software@upqroo.edu.mx', 2),
(79, 'Herrera', 'Duarte', 'Daniel Alberto', NULL, '9983188633', 'daniel.herrera@humble.mx', 3),
(81, 'Trejo', 'Polanco', 'Xiomara Veronica', '052', '9988452984', 'quimicaurinaria@centroquimico.com.mx', 1),
(82, 'Caballero', 'Vázquez', 'José Adán', '998', '9982113008', 'adan.caballero@cicy.mx', 5),
(84, 'López', 'Martín', 'Rubén', NULL, '9982149435', 'rubenlopezfisio@hotmail.com', 1),
(86, 'ENCALADA', 'GONZÁLEZ', 'MACARIO JESÚS', '052', '9988454058', 'mencalada@jetway.mx', 1),
(88, 'Flores', 'Trejo', 'Anahí de Jesús', NULL, '9842920983', 'alimentos2@centroquimico.com.mx', 2),
(89, 'Xool', 'Gonzalez', 'Pedro Abraham', '998', '9981653983', 'operaciones@grupolesaa.com.mx', 2),
(90, 'Xool', 'Gonzalez', 'Pedro Abraham', '998', '9981653983', 'operaciones@grupolesaa.com.mx', 2),
(91, 'Ross', 'Pérez', 'Jorge Antonio', '998', '9981527866', 'laboratoriocancun@conquimex.com.mx', 2),
(93, 'Esquivel', 'Briseño', 'Carlos Roberto', '052', '9985543503', 'ing.software@upqroo.edu.mx', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor_empresarial_def`
--

CREATE TABLE `asesor_empresarial_def` (
  `id` int(11) NOT NULL,
  `puesto` varchar(255) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `carta_aceptacion`
--

CREATE TABLE `carta_aceptacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  `observaciones` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta_liberacion`
--

CREATE TABLE `carta_liberacion` (
  `id` int(11) NOT NULL,
  `nombre_c_l` varchar(50) DEFAULT NULL,
  `estado_c_l` int(1) DEFAULT NULL,
  `observaciones_c_l` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cedula_registro`
--

CREATE TABLE `cedula_registro` (
  `id` int(11) NOT NULL,
  `nombre_c_r` varchar(50) DEFAULT NULL,
  `estado_c_r` int(1) DEFAULT NULL,
  `observaciones_c_r` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cedula_registro`
--

INSERT INTO `cedula_registro` (`id`, `nombre_c_r`, `estado_c_r`, `observaciones_c_r`, `updated_at`) VALUES
(11, '201800361F-03_Cedula_Registro_Estancia.pdf', 1, 'f', '2022-03-17 00:53:02'),
(14, '201800057F-03_Cedula_Registro_Estadia.pdf', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `definicion_proyecto`
--

CREATE TABLE `definicion_proyecto` (
  `id` int(11) NOT NULL,
  `nombre_d_p` varchar(50) DEFAULT NULL,
  `estado_d_p` int(1) DEFAULT NULL,
  `observaciones_d_p` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_def`
--

CREATE TABLE `detalle_def` (
  `id` int(11) NOT NULL,
  `actividades` varchar(255) DEFAULT NULL,
  `resultados` varchar(255) DEFAULT NULL,
  `evidencia` varchar(255) DEFAULT NULL,
  `instrumentos` varchar(255) DEFAULT NULL,
  `asignaturas` varchar(255) DEFAULT NULL,
  `topicos` varchar(255) DEFAULT NULL,
  `estrategias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `id_c_aceptacion` int(11) DEFAULT NULL,
  `id_c_registro` int(11) DEFAULT NULL,
  `id_d_proyecto` int(11) DEFAULT NULL,
  `id_c_liberacion` int(11) DEFAULT NULL,
  `id_proceso` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `id_c_aceptacion`, `id_c_registro`, `id_d_proyecto`, `id_c_liberacion`, `id_proceso`, `updated_at`) VALUES
(1, NULL, 14, NULL, NULL, 3, '2022-03-20 18:00:44'),
(4, NULL, 11, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre_emp` varchar(255) DEFAULT NULL,
  `giro` varchar(40) DEFAULT NULL,
  `direccion_emp` varchar(255) DEFAULT NULL,
  `ape_paterno_rh` varchar(40) DEFAULT NULL,
  `ape_materno_rh` varchar(40) DEFAULT NULL,
  `nombres_rh` varchar(100) DEFAULT NULL,
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
(1, 'Ossis Ortho Sport Clinic', 'servicios', 'sm311 lt 1-01 Calle Ciricote', 'Díaz de Cossio', 'Priego', 'José Manuel', NULL, '9983107772', NULL, 'ossisclinic@gmail.com', 3),
(2, 'Biomedica SA de CV', 'Servicios Biomedicos', 'Calle Murillo #26, Villas del Arte', 'Rivera', 'Ortaz', 'Marthe Rivera', NULL, '9982149191', '001', 'marthabeatrir@hotmail.com', 1),
(3, 'Wisphub', 'Servicios', 'Calle Manantial, mz 1 Col el Pedregal', 'Garcia', 'Dzib', 'Lizeth de los angeles', NULL, '9831761868', NULL, 'lizeth@wisphub.net', 2),
(4, 'Xcaret', 'Turismo', 'Kukulcan Km 9 Punta Zona Hotelera', 'RAMIREZ', 'MIRANDA', 'LAURA IXCHEL', NULL, '5540260031', NULL, 'lramirezm@xcaret.com', 4),
(6, 'Centro de Rehabilitación Física Cancún', 'servicios de salud', 'AV.LA LUNA SM.506 MZ.5 LT.4 DEP.A CANCÚN', 'Uch', 'Batm', 'María Geny', NULL, '9988849285', NULL, 'rehabilitacion_terapias@hotmail.com', 2),
(7, 'Centro Químico', 'Servicios', 'SM 25 Manzana 15 Lote 7-8 Avenida Cobá', 'Primo', 'Barragán', 'Rocío del Carmen', NULL, '9842920983', NULL, 'a.capitalhumano@centroquimico.com.mx', 4),
(8, 'Amerimed Hospital Cancún', 'Servicios', 'MURRILLO MZ 75 N°16 LOTE 28 SMZ 321', 'Rivera', 'Ordaz', 'Martha Beatriz', '52', '9983707025', NULL, 'sip58@hotmail.com', 4),
(16, 'Ingenieria biomédica de Quintana Roo', 'Servicios', 'Av. Tulum sur no.260 Manzanas 4, 5.', 'Rivera', 'Ordaz', 'Martha Beatriz', NULL, '9983707025', NULL, 'marthabeatrir@hotmail.com', 1),
(17, 'Tecnología Digital Alpha', 'Desarrolladora de plataformas digitales', 'MZA 29, LT2, SELVAMAR, PLAYA DEL CARMEN', 'Alcazar', 'Castañeda', 'Senyaze Gabriela', NULL, '9842052850', NULL, 'salcazar@tecnodalpha.com', 2),
(18, 'Ossis Ortho Sport Clinic', 'servicios', 'sm311 lt 1-01 Calle Ciricote', 'Díaz de Cossio', 'Priego', 'José Manuel', NULL, '9983107772', NULL, 'ossisclinic@gmail.com', 3),
(19, 'FISIO SPORTS CANCÚN', 'Servicios', 'AV. CANCUN CASA #45 MZA. 1 SPMZ 524.', 'CERVERA', 'TUR', 'JOSÉ ALEJANDRO', '52', '2678677', '001', 'acervera-fisiatria@hotmail.com', 1),
(20, 'FISIO SPORTS CANCÚN', 'Servicios', 'AV. CANCUN CASA #45 MZA. 1 SPMZ 524.', 'CERVERA', 'TUR', 'JOSÉ ALEJANDRO', '52', '2678677', '001', 'acervera-fisiatria@hotmail.com', 1),
(21, 'Quiorti S.A de C.V', 'Comercial', 'Reg. 100 M19 L19', 'Moreno', 'Quijano', 'Sandra', NULL, '9988970724', NULL, 'quiorti@gmail.com', 3),
(22, 'IREGA Cancún', 'Salud', 'Av.Tulum, Av.Nizuc, Santa Maria Sike', 'Cortés', 'Bracho', 'Manuel', NULL, '9988021515', '102', 'recursoshumanos@iregacancun.com.mx', 2),
(23, 'IREGA Cancún', 'Salud', 'Av.Tulum, Av. Nizuc, Santa Maria Sike', 'Cortés', 'Bracho', 'Manuel', NULL, '9988021515', '102', 'recursoshumanos@iregacancun.com.mx', 2),
(24, 'Kynesium Terapia Física y Rehabilitación', 'Terapia Fisica', 'Av. Coba Lt 25-01 Mz 13 Sm 22', 'Martínez', 'Espinosa', 'Cristina', NULL, '9988876744', NULL, 'kynesiumucl@gmail.com', 1),
(25, 'Fisio Sports Cancun', 'servicios terapeuticos', 'Av. cancun casa#54 Mza.1 Sm.524', 'N/A', 'N/A', 'N/A', NULL, '9981670782', NULL, 'acervera-fisiatria@hotmail.com', 2),
(26, 'Fisio Sports Cancun', 'servicios terapeuticos', 'Av. cancun casa#54 Mza.1 Sm.524', 'N/A', 'N/A', 'N/A', NULL, '9981670782', NULL, 'acervera-fisiatria@hotmail.com', 2),
(27, 'Fisio Sports Cancun', 'servicios terapeuticos', 'Av. cancun casa#54 Mza.1 Sm.524', 'N/A', 'N/A', 'N/A', NULL, '9981670782', NULL, 'acervera-fisiatria@hotmail.com', 2),
(28, 'CICY', 'SERVICIOS', 'Calle 8, No. 39, Mz. 29, S.M. 64', 'ACOSTA', 'GONZALEZ', 'GILBERTO', '998', '2113008', '120', 'gilberto.acosta@cicy.mx', 1),
(29, 'Heilen med fisio sport', 'Terapeutico', 'carretera federal Cancun-Tulum 3 sur', 'Avila', 'Sansores', 'Neidy', NULL, '9841481453', NULL, 'heilenmedplaya@gmail.com', 3),
(34, 'Universidad Politécnica de Quintana Roo', 'Educación', 'Av Arco Bincentenario M11 L1119-33 Sm255', 'Chi', 'Keb', 'Georgina', '+52', '9982831859', '141', 'georgina.chi@upqroo.edu.mx', 3),
(35, 'Ossis Ortho Sport Clinic', 'servicios', 'sm311 lt 1-01 Calle Ciricote', 'Díaz de Cossio', 'Priego', 'José Manuel', NULL, '9983107772', NULL, 'ossisclinic@gmail.com', 3),
(36, 'Kinesium Terapia Física y Rehabilitación', 'Terapia Física', 'Av. Coba Lt 25- 01 Mz  13 sm 22', 'Martínez', 'Espinosa', 'Cristina', '52', '9988876744', NULL, 'cristinahealth@hotmail.com', 1),
(37, 'SAVAS', 'Programacion web y moviles', 'Calle Robalo, 77500 Cancún, Q.R', 'Trujano', 'Soya', 'Miguel Angel', NULL, '9981361711', NULL, 'mtrujano@savas.com.mx', 1),
(43, 'INMO TR S.A. de C.V.', 'Construcción', 'SM 044 M 5 L 12 C. Aurora, Resid. Alborada, C.P. 77506', 'Velarde', 'Espindola', 'Mónica Isabel', NULL, '9988844232', NULL, 'monica.velarde@humble.mx', 3),
(44, 'SENSIRA RESORT & SPA RIVIERA MAYA', 'HOTELERIA', 'CARRETERA CANCUN - TULUM KM 27.5, BAHIA DE PETEMPICH', 'MEDINA', 'ARGAEZ', 'CECILIA', NULL, '9988685460', '311', 'c.medina@sensiraresorts.com', 4),
(45, 'IMJUVE', 'GUBERNAMENTAL', 'Plaza Centro, Av. Nader, smz 5, mza 5 lote 8', 'Caporali', 'Santos', 'Geser Manuel', '052', '9981894213', NULL, 'gesercaporali.imjuve@gmail.com', 3),
(47, 'Promotora DG S. de R.L. de C.V.', 'Automotriz', 'Av. Tulum Esq. Sayil Lt. 1 Mz. 7 SM. 7', 'Rodríguez', 'Villarreal', 'Rubén Israel', NULL, '9982607043', NULL, 'ruben.rodriguez@grupodg.net', 4),
(48, 'Centro Químico', 'Servicios', 'SM 25 Manzana 15 Lote 7-8 Avenida Cobá con Guanábana, Local 4', 'Primo', 'Barragán', 'Rocío del Carmen', NULL, '9842920983', NULL, 'a.capitalhumano@centroquimico.com.mx', 4),
(49, 'Vector Casa de Bolsa SA de CV', 'CASAS DE BOLSA', 'AV. SAYIL SM 6 MZ 5 LT 2 INT.1008 EDIFICIO SPECTRUM', 'Trevisan', 'Gonzalez', 'María del Pilar', '052', '9988899230', '450', 'mtrevisa@vector.com.mx', 4),
(51, 'Xk net SA de CV', 'Servicios', 'Smza 258 lote 3, Arcos del Isla Paraíso', 'Huchin', 'Soberanis', 'Guadalupe Patricia', '052', '5586503692', '108', 'patricia.huchin@xknet.mx', 3),
(52, 'Royal Resort', 'Turistico, Hotelero', 'Boulevard Kukulcan Km.17 Hotel The Royal Islander, Zona Hotelera', 'Montalvo', 'Gonzales', 'Manuel Alfonso', '998', '8810100', '647', 'matrejo@royalresorts.com', 4),
(53, 'rehabilitacion cancun', 'atencion terapeutica', 'calle punta nicchehabin y punta conoco #8 PB sm 24 m 23 l 53', 'no aplica', 'no aplica', 'no aplica', '052', '1234567890', NULL, 'noaplica@gmail.com.mx', 2),
(55, 'Centro Químico', 'Servicios', 'SM 25 Manzana 15 Lote 7-8 Avenida Cobá con Guanábana, Local 4', 'Primo', 'Barragán', 'Rocío del Carmen', NULL, '9842920983', NULL, 'a.capitalhumano@centroquimico.com.mx', 4),
(56, 'SERVICIOS PORTUARIOS SERPAC S.A DE C.V.', 'SERVICIOS TRANSPORTE MARÍTIMO', 'SM 84 MZA 7 LT 1 CALLE 45', 'JIMENEZ', 'PEDRAZA', 'MALITZIN', '052', '9981361781', '000', 'mjimenez@jetway.com.mx', 3),
(57, 'Centro de Investigación Científica de Yucatán, A. C', 'Centro Publico', 'Calle 43 No.130 por 32 y 34 Col. Chuburná de Hidalgo C.P. 97205 Mérida, Yucatán, México.', 'Zepeda', 'Hernández', 'Cecilia', '999', '9428330', '294', 'docencia@cicy.mx', 4),
(58, 'UNIVERSIDAD POLITÉCNICA DE QUINTANA ROO', 'EDUCACION', 'Av. Arco Bicentenario, Mza. 11, Lote 1119-33, SM. 255. Cancún, Quintana Roo, México. C.P. 77500', 'CHI', 'KEB', 'GEORGINA', '998', '2831859', '141', 'rec.humanos@upqroo.edu.mx', 3),
(59, 'VGP CONSTRUCCIONES S DE RL CV', 'Constructora', 'SM248 MZ126 L1 CASA 01. CP MAR DEL NORTE SM 248 PONIENTE F C.P. 77500 CANCUN Q.R.', 'Marinez', 'Garcia', 'Nallely', '998', '2724634', '105', 'nmartinez@vgpconstrucciones.com', 4),
(60, 'Centro de Rehabilitación Física Cancún', 'Servicios de salud', 'AV. LA LUNA SM. 506 MZ. 5 LT. 4 DEP. A', 'Uch', 'Batun', 'María Geny', '998', '9988849285', NULL, 'rehabilitacion_terapias@hotmail.com', 2),
(63, 'Centro Químico', 'Laboratorio', 'Av Huyacán, Smz 310. Mzn 141, Lt 59', 'Barragan', 'Primo', 'Rocio del Carmen', '984', '2920', '982', 'rh@centroquimico.com.mx', 4),
(64, 'Laboratorio de Análisis Clínicos Limed', 'Servicios', 'Laboratorio Limed, Avenida Nader 21 Supermanzana 2A, Cancún Quintana Roo77500, México', 'Trujeque', 'Canché', 'Aracelly', '998', '9988842399', NULL, 'aracelly@laboratoriolimed.com', 3),
(67, 'Universidad Politécnica de Quintana Roo', 'Educación', 'Av Arco Bincentenario M11 L1119-33 Sm255', 'Chi', 'Keb', 'Georgina', NULL, '9982831859', '141', 'georgina.chi@upqroo.edu.mx', 3),
(68, 'Rehabilitación Cancún Clínica', 'Terapia Física / Rehabilitación', 'Calle Nichehabin y Punta Conoco', 'López', 'Martín', 'Rubén', '052', '9982149435', NULL, 'rubenlopezfisio@hotmail.com', 2),
(69, 'Laboratorio de Análisis Clínicos Limed', 'Servicios', 'Laboratorio Limed, Avenida Nader 21, Supermanzana 2A, Cancún, Quintana Roo 77500, México', 'Trujeque', 'Canché', 'Aracelly', NULL, '9988842399', NULL, 'aracelly@laboratoriolimed.com', 3),
(70, 'Laboratorio de Análisis Clínicos Limed', 'Servicios', 'Laboratorio Limed, Avenida Nader 21, Supermanzana 2A, Cancún, Quintana Roo 77500, México', 'Trujeque', 'Canché', 'Aracelly', '052', '9988842399', NULL, 'aracelly@laboratoriolimed.com', 3),
(71, 'Laboratorio de Análisis Clínicos Limed', 'Servicios', 'Laboratorio Limed, Avenida Nader 21 Supermanzana 2A, Cancún Quintana Roo77500, México', 'Trujeque', 'Canché', 'Aracelly', '998', '9988842399', NULL, 'aracelly@laboratoriolimed.com', 3),
(72, 'Ingenieria biomédica de Quintana Roo', 'Servicios', 'Av. Tulum sur no.260 Manzanas 4, 5 y 9, 7, 77500 Cancún, Q.R.', 'Rivera', 'Ordaz', 'Martha Beatriz', NULL, '9983707025', NULL, 'marthabeatrir@hotmail.com', 1),
(74, 'Beachscape Kin-Ha Villas & Suites', 'Hospedaje', 'Km. 8.5, Blvd. Kukulcan, Punta Cancun, Zona Hotelera, 77500 Cancún, Q.R.', 'Villaseñor', 'Ramirez', 'Ivonne M.', '052', '9981264678', NULL, 'rh@beachscape.com.mx', 3),
(76, 'Tiendas Soriana S.A DE C.V', 'Comercial', 'Av. Costa Maya 228, 228, 77516, Cancún Q..R', 'Balam', 'Sabido', 'Leidy Beatriz', '998', '9985528046', '998', 'caphum951@soriana.com', 3),
(77, 'Hospital Galenia', 'Salud', 'Av. Tulum, Lote 1, Mza. 1, SM. 12 Esq. Nizuc Fracc. Sta. María Siké', 'Jaimes', 'Recinos', 'Mónica', '052', '9988915200', '605', 'jrhumanos@hospitalgalenia.com', 4),
(78, 'Universidad Politécnica de Quintana Roo', 'Educativo', 'Av. Arco Bicentenario, Cancún, Quintana Roo. Manzana. 11, Lote 1119-33 Sm 255, C.P 77500', 'Chi', 'Keb', 'Georgina', '052', '9982831859', '141', 'georgina.chi@upqroo.edu.mx', 4),
(79, 'INMO TR S.A. de C.V', 'Construcción', 'Sm 044 M5 L12 C. Aurora Resid. Alborada.', 'Velarde', 'Espindola', 'Mónica Isabel', NULL, '9988844232', NULL, 'monica.velarde@humble.mx', 3),
(81, 'Centro Quimico', 'Servicios', 'Av. Huayacan, Smz. 310, Mz. 141, Lt. 59, Fraccionamiento Residencial Palmaris, 77560 Cancun; Q.R', 'Barragan', 'Primo', 'Rocio Del Carmen', '052', '9983130544', '240', 'rh@centroquimico.com.mx', 3),
(82, 'Centro De Investigación Científica De Yucatán, A. C.', 'Educativo', 'Calle 8 No. 39 L1, Mz 2, Sm 64 C.P. 77857, Cancún, Quintana Roo, México', 'De Gante', 'Ayora', 'Fanny Margarita', '998', '9982113008', '117', 'fanny.degante@cicy.mx', 3),
(84, 'Rehabilitación Cancún clínica', 'Terapia física', 'Calle nicchehabin y punta conoco', 'López', 'Martín', 'Rubén', NULL, '9982149435', NULL, 'rubenlopezfisio@hotmail.com', 2),
(86, 'SERVICIOS PORTUARIOS SERPAC S.A DE C.V', 'SERVICIOS', 'SM84 MZA7 LT1 CALLE 45', 'JIMENEZ', 'PEDRAZA', 'MALITZIN', '052', '9981361781', '000', 'mjimenez@jetway.com.mx', 3),
(88, 'Centro Químico', 'Servicios', 'Av Huayacán, Sm 310, Mz 141, Lt 59, Fracc Residencial Palmaris, Cancún Q. Roo', 'Barragán', 'Prieto', 'Rocío del Carmen', '998', '3130544', '240', 'rh@centroquimico.com.mx', 3),
(89, 'Grupo LESAA', 'Laboratorio de microbiología', 'A. Francisco I. Madero mz 107 l 12 Local 4', 'Xool', 'Gonzalez', 'Pedro Abraham', '998', '9981653983', NULL, 'operaciones@grupolesaa.com.mx', 1),
(90, 'Grupo LESAA', 'Laboratorio de Aguas y Alimentos', 'A. Francisco I. Madero Mz 107 Lt12 Int. Local 4', 'Xool', 'González', 'Pedro Abraham', '998', '9981653983', NULL, 'operaciones@grupolesaa.com.mx', 1),
(91, 'Conquimex S.C.', 'Servicos', 'Av. 149 Mz. 10 Lt. 2 Reg. 103', 'Gallegos', 'Cabra', 'Adán Francisco', '998', '9983660516', '000', 'adan.gallegos@conquimex.com.mx', 2),
(93, 'Universidad Politécnica de Quintana Roo', 'Educación', 'Av Arco Bincentenario M11 L1119-33 Sm255', 'Chi', 'Keb', 'Georgina', '052', '9982831859', '141', 'georgina.chi@upqroo.edu.mx', 3);

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
(1, 1, 1, 1, 1, 1, 1),
(2, 2, 2, 2, 2, 2, 1),
(3, 3, 3, 3, 3, 3, 1),
(4, 4, 4, 4, 4, 4, 1),
(6, 7, 6, 6, 6, 7, 1),
(7, 8, 7, 7, 7, 8, 1),
(8, 9, 8, 8, 8, 9, 1),
(16, 17, 16, 16, 16, 17, 1),
(17, 18, 17, 17, 17, 18, 1),
(18, 19, 18, 18, 18, 19, 1),
(19, 20, 19, 19, 19, 20, 1),
(20, 21, 20, 20, 20, 21, 1),
(21, 22, 21, 21, 21, 22, 1),
(22, 23, 22, 22, 22, 23, 1),
(23, 24, 23, 23, 23, 24, 1),
(24, 25, 24, 24, 24, 25, 1),
(25, 27, 26, 26, 25, 27, 1),
(26, 28, 27, 27, 26, 28, 1),
(27, 29, 28, 28, 27, 29, 1),
(28, 30, 29, 29, 28, 30, 1),
(33, 35, 34, 34, 33, 35, 1),
(34, 36, 35, 35, 34, 36, 1),
(35, 37, 36, 36, 35, 37, 1),
(36, 38, 37, 37, 36, 38, 1),
(42, 48, 43, 43, 42, 48, 1),
(43, 49, 44, 44, 43, 49, 1),
(44, 50, 45, 45, 44, 50, 1),
(46, 52, 47, 47, 46, 52, 1),
(47, 53, 48, 48, 47, 53, 1),
(48, 54, 49, 49, 48, 54, 1),
(50, 58, 51, 51, 50, 58, 1),
(51, 59, 52, 52, 51, 59, 1),
(52, 60, 53, 53, 52, 60, 1),
(54, 62, 55, 55, 54, 62, 1),
(55, 63, 56, 56, 55, 63, 1),
(56, 64, 57, 57, 56, 64, 1),
(57, 65, 58, 58, 57, 65, 1),
(58, 66, 59, 59, 58, 66, 1),
(59, 67, 60, 60, 59, 67, 1),
(62, 70, 63, 63, 62, 70, 1),
(63, 71, 64, 64, 63, 71, 1),
(66, 74, 67, 67, 66, 74, 1),
(67, 75, 68, 68, 67, 75, 1),
(68, 76, 69, 69, 68, 76, 1),
(69, 77, 70, 70, 69, 77, 1),
(70, 78, 71, 71, 70, 78, 1),
(71, 79, 72, 72, 71, 79, 1),
(73, 81, 74, 74, 73, 81, 1),
(75, 83, 76, 76, 75, 83, 1),
(76, 84, 77, 77, 76, 84, 1),
(77, 85, 78, 78, 77, 85, 1),
(78, 86, 79, 79, 78, 86, 1),
(80, 88, 81, 81, 80, 88, 1),
(81, 89, 82, 82, 81, 89, 1),
(83, 91, 84, 84, 83, 91, 1),
(85, 93, 86, 86, 85, 93, 1),
(87, 95, 88, 88, 87, 95, 1),
(88, 96, 89, 89, 88, 96, 1),
(89, 97, 90, 90, 89, 97, 1),
(90, 98, 91, 91, 90, 98, 1),
(92, 100, 93, 93, 92, 100, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_def`
--

CREATE TABLE `formulario_def` (
  `id` int(11) NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_asesor_emp` int(11) DEFAULT NULL,
  `id_proyecto` int(11) DEFAULT NULL,
  `id_detalle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nombre_proyecto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `nombre_proyecto`) VALUES
(1, 'NO APLICA'),
(2, 'Monitoreo Remoto de Unidad Imagenología'),
(3, 'Integracion Facturacion Electronica SAT'),
(4, 'Plataforma control y manejodeinformación'),
(6, 'no aplica'),
(7, 'No aplica'),
(8, 'Origen y características del SARS-CoV-2'),
(9, 'Bitácora de mantenimientos'),
(17, 'Programa de mantenimiento y capacitación'),
(18, 'Control Escolar Inteligente'),
(19, 'NO APLICA'),
(20, 'NO APLICA'),
(21, 'NO APLICA'),
(22, 'SOFTWARE PARA COTIZACIONES'),
(23, 'Diseño e implementación de un sistema'),
(24, 'Recomendaciones de buena practica para'),
(25, 'No aplica'),
(26, 'N/A'),
(27, 'N/A'),
(28, 'N/A'),
(29, 'REGISTRO DE CENOTES'),
(30, 'No'),
(35, 'Diversidad de reptiles'),
(36, 'NO APLICA'),
(37, 'No aplica'),
(38, 'SNOKI-APP'),
(41, 'Mantenimiento Genesis'),
(42, 'Mantenimiento Genesis'),
(43, 'Mantenimiento Genesis'),
(44, 'Mantenimiento Genesis'),
(48, 'Elaborar y establecer el proceso para la elaboración de las nóminas de la empresa INMO TR S.A. de C.V.'),
(49, 'DESARROLLO DE PROCESOS DE LOS DOCUMENTOS DIGITALES EN EL DEPARTAMENTO DE COCINA.'),
(50, 'Estrategias de Difusión Digital'),
(52, 'Generación de un proceso administrativo que maximice el control en Grupo DG'),
(53, 'Análisis del origen, características y zoonosis del SARS - CoV- 2'),
(54, 'Plan Financiero de Ingresos y gastos Vector Casa de Bolsa SA de CV'),
(55, 'CONSTRUCCIÓN DE ESCENARIO FINANCIERO PARA PAGO DE IMPUESTO (IVA)'),
(57, 'CONSTRUCCIÓN DE ESCENARIO FINANCIERO PARA PAGO DE IMPUESTO (IVA)'),
(58, 'CONSTRUCCIÓN DE ESCENARIO FINANCIERO PARA PAGO DE IMPUESTO (IVA)'),
(59, 'Royal Uno'),
(60, 'no aplica'),
(62, 'Análisis del origen, características y zoonosis del SARS - CoV- 2'),
(63, 'ELABORACIÓN Y CONTROL DE PRESUPUESTOS SEMANALES DE SERVICIOS PORTUARIOS SERPAC S.A DE C.V.'),
(64, 'Catálogo de otolitos de la colección de peces del laboratorio de Ecología y Biodiversidad de Organismos Acuáticos (LEBOA)'),
(65, 'MANUAL DE DESCRIPCIÓN Y PERFIL DE PUESTOS DEL ENCARGADO DE BIBLIOTECA'),
(66, 'Proceso y control de documentación para los expedientes laborales.'),
(67, 'No aplica'),
(70, 'Empleo de las diferentes técnicas'),
(71, 'Identificación del efecto de inhibición de los antibióticos sobre las bacterias.'),
(74, 'Efecto de la transformación del hábitat sobre la diversidad de especies de reptiles en la Península de Yucatán, México.'),
(75, 'Reporte clinico'),
(76, 'Aplicación de antibiogramas contra bacterias patógenas de pacientes infectados.'),
(77, 'Aplicación de antibiogramas contra bacterias patógenas de pacientes infectados.'),
(78, 'Identificación del efecto de inhibición de los antibióticos sobre las bacterias.'),
(79, 'Programa de capacitación para el uso de ventiladores mecánicos'),
(81, 'Diseño de un manual de reclutamiento, selección, contratación e inducción del talento humano en el hotel Beachscape.'),
(83, 'Implementación de un sistema de seguridad en el trabajo en la empresa Tiendas Soriana S.A DE C.V , Sucursal 951, Niños Héroes'),
(84, 'Diseño de una Herramienta Digital para Optimizar el Tiempo de Respuesta de las Solicitudes de Mantenimiento de Equipo Médico'),
(85, 'Mantenimiento de la Feria Virtual de Quintana Roo'),
(86, 'Elaborar y establecer el proceso para la elaboración de las nóminas de la empresa INMO TR S.A. de C.V.'),
(88, 'Determinación de parámetros fisicoquimicos y microbiológicos en muestras líquidas y sólidas en seres humanos'),
(89, 'Relación longitud-peso y análisis de contenido estomacal del pez Sábalo (Megalops atlanticus) en el Área Natural Protegida “Laguna Manatí”, Quintana Roo.'),
(91, 'Reporte clínico'),
(93, 'ELABORACIÓN Y CONTROL DE PRESUPUESTOS SEMANALES DE SERVICIOS PORTUARIOS SERPAC S.A DE C.V'),
(95, 'Implementación del procedimiento para la evaluación del desempeño de medios de cultivo'),
(96, 'Metodología por medio de la técnica de filtración por membrana para determinar coliformes totales y coliformes fecales.'),
(97, 'Metodología por medio de la técnica de filtración por membrana para determinar coliformes totales y coliformes fecales.'),
(98, 'Detección de Salmonella spp. en muestras de alimentos conforme a lo establecido en la NOM 210-SSA1- 2014 Apéndice Normativo A, realizando pruebas bioquímicas para la diferenciación de las especies'),
(100, 'Desarrollo de plataforma para el proceso de estancias y estadías');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_def`
--

CREATE TABLE `proyecto_def` (
  `id` int(11) NOT NULL,
  `objetivos_proyecto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 8, 1),
(3, 79, 3),
(4, 73, 4),
(7, 97, 7),
(17, 93, 17),
(18, 6, 18),
(20, 10, 20),
(21, 76, 21),
(22, 48, 22),
(23, 49, 23),
(24, 12, 24),
(25, 9, 25),
(26, 5, 26),
(27, 81, 27),
(28, 7, 28),
(34, 13, 34),
(35, 86, 35),
(36, 80, 36),
(42, 30, 42),
(43, 111, 43),
(44, 21, 44),
(46, 105, 46),
(47, 112, 47),
(48, 85, 48),
(50, 95, 50),
(51, 77, 51),
(52, 16, 52),
(54, 116, 54),
(55, 114, 55),
(56, 46, 56),
(57, 118, 57),
(58, 119, 58),
(59, 11, 59),
(62, 38, 62),
(66, 43, 66),
(67, 18, 67),
(69, 37, 69),
(70, 41, 70),
(71, 59, 71),
(73, 123, 73),
(75, 113, 75),
(76, 63, 76),
(77, 78, 77),
(78, 30, 78),
(80, 31, 80),
(81, 47, 81),
(83, 14, 83),
(85, 126, 85),
(87, 104, 87),
(88, 35, 88),
(89, 40, 89),
(90, 44, 90),
(92, 75, 92);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_def`
--

CREATE TABLE `respuesta_def` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `id_formulario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_doc`
--

CREATE TABLE `respuesta_doc` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) UNSIGNED DEFAULT NULL,
  `id_documentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuesta_doc`
--

INSERT INTO `respuesta_doc` (`id`, `id_usuario`, `id_documentos`) VALUES
(1, 75, 1);

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
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE `universidad` (
  `id` int(11) NOT NULL,
  `nombre_u` varchar(100) NOT NULL,
  `cargo_u` varchar(100) NOT NULL,
  `firma` varchar(100) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`id`, `nombre_u`, `cargo_u`, `firma`, `updated_at`) VALUES
(5, 'LIC. JOSÉ ANTONIO MORALES BAILÓN', 'Encargado Interino de la Dirección de Vinculación, Difusión y Extensión Universitaria.', 'firma.png', NULL);

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
(54, '201900285', '201900285@estudiantes.upqroo.edu.mx', NULL, '$2y$10$M.SiZO4pXvHvMFvshp/2duXAe3DKD3fcj7ZRv6xSOt17W1e8XF5K2', '', NULL, '2022-01-15 21:19:34', '2022-01-15 21:19:34'),
(55, '201800346', '201800346@estudiantes.upqroo.edu.mx', NULL, '$2y$10$15qZuUWtBGFppYg84ndrieVnW2ZGDlKCka3Z87NDzsfiHUAkbR48e', '', NULL, '2022-01-15 21:21:12', '2022-01-15 21:21:12'),
(56, '201800352', '201800352@estudiantes.upqroo.edu.mx', NULL, '$2y$10$u0NEXclz9DGutla49N78LetWWX65/1uaQoF8wJ6ix7z2fiiHzmIQq', '', NULL, '2022-01-15 21:25:55', '2022-01-15 21:25:55'),
(57, '201800353', '201800353@estudiantes.upqroo.edu.mx', NULL, '$2y$10$xW1CNq6zFNApaX3FTi7da.EY5oJDixbVkx2zVhyCBE/ALLrSx8FGu', '', NULL, '2022-01-15 21:27:04', '2022-01-15 21:27:04'),
(58, '201700382', '201700382@estudiantes.upqroo.edu.mx', NULL, '$2y$10$eX7cVSGy.VDyA/ZKgW1fVOP5Q.Ld7ELe0SLI116iLENmZrOK2MTj2', '', NULL, '2022-01-15 21:28:33', '2022-01-15 21:28:33'),
(59, '201800356', '201800356@estudiantes.upqroo.edu.mx', NULL, '$2y$10$aJ7fvliTC9R2aGxPqS2AheTdw5CHHwnRr76dIruDLLU/OyLueKISq', '', NULL, '2022-01-15 21:30:12', '2022-01-15 21:30:12'),
(60, '201800360', '201800360@estudiantes.upqroo.edu.mx', NULL, '$2y$10$H7HupjrguiSRQB7wBBCSDecQSxjzJi.AP49sfFWjqt069CV7yzn6a', '', NULL, '2022-01-15 21:31:58', '2022-01-15 21:31:58'),
(61, '201700386', '201700386@estudiantes.upqroo.edu.mx', NULL, '$2y$10$QQaei6mlZSLk6o3/SZsSle14vAP4V0H.D4iqRNQ6Lu2Y1vWXRiAWe', '', NULL, '2022-01-15 21:33:14', '2022-01-15 21:33:14'),
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
(87, 'admin', 'admin@test.com', NULL, '$2y$10$W2QuyE7ZAGtVAHVvSgysneoRgSu6Iy2crnq.F0N/WLVlt8TFi4Jqq', 'admin', NULL, '2022-01-21 03:55:51', '2022-03-21 05:10:53'),
(89, 'abraham', 'abraham@test.com', NULL, '$2y$10$W2QuyE7ZAGtVAHVvSgysneoRgSu6Iy2crnq.F0N/WLVlt8TFi4Jqq', 'admin', NULL, '2022-01-24 08:56:32', '2022-01-24 08:56:32'),
(90, 'hugo', 'hugo@test.com', NULL, '$2y$10$usL8Q1Mj0EPX/bIkLQNJx.HRsrRwnFE1sauv.5TcoTYwyu4cPHO7K', 'admin', NULL, '2022-01-24 09:11:07', '2022-01-24 09:11:07'),
(91, 'Luis', 'luis@test.com', NULL, '$2y$10$EPn8Bms7S2chPGwoxfkLb.RlQEOy7EANMyXeJPUyh8dfDEfD54eXq', 'admin', NULL, '2022-01-31 01:42:02', '2022-01-31 01:42:02'),
(92, 'Luis', 'luis@test.com', NULL, '$2y$10$ng194vo4KEtUNDyj24naruz9uZjf1YQtUDECXqXAfYo34vP2G/GnW', 'admin', NULL, '2022-01-31 01:44:18', '2022-01-31 01:44:18'),
(93, 'Moisés Soler Zetina', '201900365@estudiantes.upqroo.edu.mx', NULL, '$2y$10$nCHkwmuPurGy0IOdW977t.S/yZcSJFhThIVRIlgTaioIdFr2oMOHG', 'Estudiante', NULL, '2022-02-09 18:55:09', '2022-02-09 18:55:09'),
(94, 'FRANCISCO CAAMAL', '201700120@estudiantes.upqroo.edu.mx', NULL, '$2y$10$lKRZCFxbPaCUvCNpiYMje.g2W6OSJApJLrJho2qZYsq39//oXMLMK', 'ESTUDIANTES', NULL, '2022-02-10 01:57:20', '2022-02-10 01:57:20'),
(95, '201700120', '201700120@estudiantes.upqroo.edu.mx', NULL, '$2y$10$e5k1Zy4gGHEJ1seAVeARfOw.GFhU9fqmzLj87IOH.1PubtUukFTvu', 'ESTUDIANTES', NULL, '2022-02-10 02:08:22', '2022-02-10 02:08:22'),
(96, 'Alejandra del Carmen Perez Medina', '201800026@estudiantes.upqroo.edu.mx', NULL, '$2y$10$kA0VE5/zjtE8hM4eR2fvIuWgiz33PHzwfpH1bu58W4BfmGRMBPpvK', 'Estudiante', NULL, '2022-02-10 06:04:19', '2022-02-10 06:04:19'),
(97, 'ALEJANDRA DEL CARMEN PEREZ MEDINA', 'aleperezmedina05@gmail.com', NULL, '$2y$10$Wjl.Ep0Cdagv52NBb5zzR.iOEGED9rbBq04JHIzQs0g0pMxMBxMIa', 'ESTUDIANTE', NULL, '2022-02-10 06:14:32', '2022-02-10 06:14:32'),
(98, 'ALEJANDRA DEL CARMEN PEREZ MEDINA', '201800026@estudiantes.upqroo.edu.mx', NULL, '$2y$10$MPxbZLIjG5qnJDYqZdGLVubVXkcquWH7fZUbLtfLs4Mz0bwZyPOd6', 'ESTUDIANTE', NULL, '2022-02-10 07:01:34', '2022-02-10 07:01:34'),
(99, 'Henri Gerardo Puc Osorio', '202000031@estudiantes.edu.upqroo.mx', NULL, '$2y$10$Fq13.b0Hr4DkvNBtaJS2E.Idpq3l8T7B9qCmqpyUu5nuF.cNtuSGC', 'Estudiante', NULL, '2022-02-10 08:32:25', '2022-02-10 08:32:25'),
(100, 'SERGIO ENRIQUE DZIB DELGADO', 'sergioenriquedd@gmail.com', NULL, '$2y$10$XuFAVXLuYOrHeM80vmmCJOKO9LWquZsoYVPURmjDVewbDK1a3AJ5y', 'ALUMNO', NULL, '2022-02-10 10:23:28', '2022-02-10 10:23:28'),
(101, 'Henri Gerardo Puc Osorio', '202000031@estudiantes.edu.upqroo.mx', NULL, '$2y$10$kNPPwxtMXc9ODHZfjBipPuzmKw8i4scEDyHGzWsFn5G8nbZVp2KAu', 'Estudiante', NULL, '2022-02-10 22:14:25', '2022-02-10 22:14:25'),
(102, 'NATALIA GUADALUPE SOBERANIS CAAMAL', '201700154@estudiantes.upqroo.edu.mx', NULL, '$2y$10$9GtCnlVVlTxP.ktZKz2MMuNWvgCpPicdCQMAYQWq.GM2d2TpeQTIG', 'ESTUDIANTE', NULL, '2022-02-10 22:16:42', '2022-02-10 22:16:42'),
(103, 'Henri Gerardo Puc Osorio', '202000031@estudiantes.edu.upqroo.mx', NULL, '$2y$10$HcWdzQAGAEta.8kPWLfppOdYQyap04H5l2XiC7hGZujL2iGkK9DUu', 'Estudiante', NULL, '2022-02-11 00:57:53', '2022-02-11 00:57:53'),
(104, 'María Deniss Michel Rivero Canché', 'maria510-rc@hotmail.com', NULL, '$2y$10$v1prMgHsKdl21g3.qsqzXe7cELhCkP.uLyV17VNUxgGnOnXV8R4ra', 'Deniss Rivero', NULL, '2022-02-11 05:17:22', '2022-02-11 05:17:22'),
(105, 'Luis Gerardo López Vidal', '201800186@estudiantes.upqroo.edu.mx', NULL, '$2y$10$Qa3rxyEgt42VKBxWiS8uvuhUoP2uX0IeBcHst20amP9lnW/xPUdQq', 'Estudiante', NULL, '2022-02-11 06:05:18', '2022-02-11 06:05:18'),
(107, 'Abner Cetzal', '201800048@estudiantes.upqroo.edu.mx', NULL, '$2y$10$.2yLJf8TWfZ5dsK3v0vgSOCnEgR5VIOYuWJFCSBkwWDCwLr1uDpOe', 'Estudiante', NULL, '2022-02-15 02:18:09', '2022-02-15 02:18:09'),
(108, 'SERGIO ENRIQUE DZIB DELGADO', '201700414@estudiantes.upqroo.edu.mx', NULL, '$2y$10$6ZGflkzFpNM1uKPblOSvIeGFORB0UDSAfRNqco/0rtqoy/OXEObfm', 'Alumno', NULL, '2022-02-15 04:18:14', '2022-02-15 04:18:14'),
(109, 'Yerli Yasuri', '201800360@estudiantes.upqro.edu.mx', NULL, '$2y$10$w.FdSIVcH5IpJ7CKu5E/sOJpjNxsY8UW8dk55/KqHMYh2IF3I4ZbK', 'Estudiante', NULL, '2022-02-16 03:10:46', '2022-02-16 03:10:46'),
(110, 'Jannya', '201800172@estudiantes.upqroo.edu.mx', NULL, '$2y$10$kMNd6Uywsxm68NHPowY9kOgrhiv093e2xIbZ3U/d6PMEy9UMcH3Rq', 'Estudiante', NULL, '2022-02-17 20:28:39', '2022-02-17 20:28:39'),
(111, 'MAYREN', '201800176@estudiantes.upqroo.edu.mx', NULL, '$2y$10$4tstFkPGqF6uRzuo4SmLou6KFhrhXgcp3eRiqsUiB5253aGgrvbLS', 'GUTIERREZ', NULL, '2022-02-21 03:29:38', '2022-02-21 03:29:38'),
(112, 'ALEJANDRA DEL CARMEN PEREZ MEDINA', '201800026@estudiantes.upqroo.edu.mx', NULL, '$2y$10$jKGY.OeCZgXXADYREW7Fb.ZF3ygpXsDoEsnM1dgvgR9lMuFCYjdEm', 'ESTUDIANTE', NULL, '2022-02-21 22:08:27', '2022-02-21 22:08:27'),
(113, '201800156', '201800156@estudiantes.upqroo.edu.mx', NULL, '$2y$10$zyMliVcaaz/I5ACVgAQ6fuqoRmCZKQmwU99keIIvItDOljUSmcInO', 'Estudiante', NULL, '2022-02-23 05:47:51', '2022-02-23 05:47:51'),
(114, 'NATALIA SOBERANIS CAAMAL', '201700154@estudiantes.upqroo.edu.mx', NULL, '$2y$10$M99G9RJc0lzUO1uSqF8zg.bqOpbI3QZpT9Q1wtXLUY27wvjvLDLIS', 'ESTUDIANTE', NULL, '2022-03-01 23:38:30', '2022-03-01 23:38:30'),
(115, 'Alejandra del Carmen', '201800026@estudiantes.upqroo.edu.mx', NULL, '$2y$10$aPdJtaqD6nJO1o5jxVNhi.w.cygJyXyUl1.T1BHDJBXUbxvbY.spu', 'Pérez Medina', NULL, '2022-03-01 23:44:05', '2022-03-01 23:44:05'),
(116, 'ALEJANDRA DEL CARMEN PEREZ MEDINA', '201800026@ESTUDIANTES.UPQROO.EDU.MX', NULL, '$2y$10$ZFE92EEb8maBd4QPEO8NL.PiGhirF3D6gQ0EPRyVTvu2O1oDEw9oa', 'ESTUDIANTE', NULL, '2022-03-01 23:49:45', '2022-03-01 23:49:45'),
(117, 'Julio', '201400084@estudiantes.upqroo.edu.mx', NULL, '$2y$10$4SwaxTeUNecnvpL/dL/TbeB.DFRqGY6Xs.TpPxyknKWkxIxrUd.Ba', 'Estudiante', NULL, '2022-03-02 11:44:26', '2022-03-02 11:44:26'),
(118, 'LIZETH01', '202000430@estudiantes.upqroo.edu.mx', NULL, '$2y$10$QlC.VetDDfwCtXLbPfjZoOvJJPay3bgRpbGWUFMUO6blCF7xy0y/a', 'ESTUDIANTE', NULL, '2022-03-02 20:39:03', '2022-03-02 20:39:03'),
(119, 'Montse15', '202000421@estudiantes.upqroo.edu.mx', NULL, '$2y$10$ylHerZCI92UNJ8DmkMIg8e6dqYKCaf/ISSkWRUy6CfoPiNtULBKfO', 'ESTUDIANTE', NULL, '2022-03-02 20:59:15', '2022-03-02 20:59:15'),
(120, 'KATHIACOSGALLA', '202000395@estudiantes.upqroo.edu.mx', NULL, '$2y$10$G0BcfUn8vPkJYoLrynwp4Ork9hdA9qCSYX8jancof3Frt1pWXDiBW', 'ESTUDIANTE', NULL, '2022-03-02 21:59:18', '2022-03-02 21:59:18'),
(121, 'Johann reyes', 'johannreyespierce@gmail.com', NULL, '$2y$10$p8.8ppQPud6dsUAUKC0hruLv9.Qx4jRN3bl1jucA4984pOmHawMsy', 'Estudiante', NULL, '2022-03-03 01:14:24', '2022-03-03 01:14:24'),
(122, 'RODOLFO SALINAS', '202000038@estudiantes.upqroo.edu.mx', NULL, '$2y$10$uv3MJlYVI1VdxVY4tbHQceLzzzM3ZsqIMHGxnWxBQKEIzCgl5eZ.e', 'Estudiante', NULL, '2022-03-04 02:39:58', '2022-03-04 02:39:58'),
(123, 'victor', '201800171@estudiantes.upqroo.edu.mx', NULL, '$2y$10$P5EGihZOzTZi83gnx3xtReCMlBuaCMOELr/RbhZcRTkfqgcBkOKCS', 'alumno', NULL, '2022-03-04 23:32:29', '2022-03-04 23:32:29'),
(124, '202000430', '202000430@estudiantes.upqroo.edu.mx', NULL, '$2y$10$uqoX/TQjAOrDwAFdmqU/auVw31qiC.bDyo4CzkrK1uIS9vSpaKDae', 'alumno', NULL, '2022-03-09 03:49:38', '2022-03-09 03:49:38'),
(125, 'ALEJANDRA DEL CARMEN PEREZ MEDINA', '201800026@estudiantes.upqroo.edu.mx', NULL, '$2y$10$SecD8u1XtQFxnta0.z5r8uxLfx7/qcHeRBubf4kRZgnbp/Np6vmT6', 'alumno', NULL, '2022-03-09 06:47:37', '2022-03-09 06:47:37'),
(126, 'NATALIA GUADALUPE SOBERANIS CAAMAL', 'natalia.gsc15@gmail.com', NULL, '$2y$10$RraL3zqp5bKxmpHLSvgRvOcymyYglq82VsptvEg6RX2tS8mx6XaaW', 'alumno', NULL, '2022-03-11 02:14:16', '2022-03-11 02:14:16');

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
-- Indices de la tabla `alumno_def`
--
ALTER TABLE `alumno_def`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asesor_academico`
--
ALTER TABLE `asesor_academico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Cargo` (`id_cargo_aa`);

--
-- Indices de la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Cargo` (`id_cargo_ae`);

--
-- Indices de la tabla `asesor_empresarial_def`
--
ALTER TABLE `asesor_empresarial_def`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `carta_aceptacion`
--
ALTER TABLE `carta_aceptacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carta_liberacion`
--
ALTER TABLE `carta_liberacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cedula_registro`
--
ALTER TABLE `cedula_registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `definicion_proyecto`
--
ALTER TABLE `definicion_proyecto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_def`
--
ALTER TABLE `detalle_def`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_c_aceptacion` (`id_c_aceptacion`),
  ADD KEY `id_c_registro` (`id_c_registro`),
  ADD KEY `id_d_proyecto` (`id_d_proyecto`),
  ADD KEY `id_c_liberacion` (`id_c_liberacion`),
  ADD KEY `id_proceso` (`id_proceso`);

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
-- Indices de la tabla `formulario_def`
--
ALTER TABLE `formulario_def`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_asesor_emp` (`id_asesor_emp`),
  ADD KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_detalle` (`id_detalle`);

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
-- Indices de la tabla `proyecto_def`
--
ALTER TABLE `proyecto_def`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_Usuario` (`id_usuario`),
  ADD KEY `ID_Formulario` (`id_formulario`);

--
-- Indices de la tabla `respuesta_def`
--
ALTER TABLE `respuesta_def`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_formulario` (`id_formulario`);

--
-- Indices de la tabla `respuesta_doc`
--
ALTER TABLE `respuesta_doc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_documentos` (`id_documentos`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `alumno_def`
--
ALTER TABLE `alumno_def`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asesor_academico`
--
ALTER TABLE `asesor_academico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `asesor_empresarial_def`
--
ALTER TABLE `asesor_empresarial_def`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `carta_aceptacion`
--
ALTER TABLE `carta_aceptacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carta_liberacion`
--
ALTER TABLE `carta_liberacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cedula_registro`
--
ALTER TABLE `cedula_registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `definicion_proyecto`
--
ALTER TABLE `definicion_proyecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_def`
--
ALTER TABLE `detalle_def`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `formulario_def`
--
ALTER TABLE `formulario_def`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `proyecto_def`
--
ALTER TABLE `proyecto_def`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `respuesta_def`
--
ALTER TABLE `respuesta_def`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuesta_doc`
--
ALTER TABLE `respuesta_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_procesos`) REFERENCES `procesos` (`id_procesos`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`);

--
-- Filtros para la tabla `asesor_academico`
--
ALTER TABLE `asesor_academico`
  ADD CONSTRAINT `asesor_academico_ibfk_1` FOREIGN KEY (`id_cargo_aa`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asesor_empresarial`
--
ALTER TABLE `asesor_empresarial`
  ADD CONSTRAINT `asesor_empresarial_ibfk_2` FOREIGN KEY (`id_cargo_ae`) REFERENCES `cargo` (`id_cargo`);

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_ibfk_1` FOREIGN KEY (`id_c_aceptacion`) REFERENCES `carta_aceptacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_ibfk_2` FOREIGN KEY (`id_c_registro`) REFERENCES `cedula_registro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_ibfk_3` FOREIGN KEY (`id_d_proyecto`) REFERENCES `definicion_proyecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_ibfk_4` FOREIGN KEY (`id_c_liberacion`) REFERENCES `carta_liberacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`);

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_ibfk_2` FOREIGN KEY (`id_asesor_aca`) REFERENCES `asesor_academico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_ibfk_3` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_ibfk_4` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_ibfk_5` FOREIGN KEY (`id_asesor_emp`) REFERENCES `asesor_empresarial` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulario_def`
--
ALTER TABLE `formulario_def`
  ADD CONSTRAINT `formulario_def_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno_def` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_def_ibfk_2` FOREIGN KEY (`id_asesor_emp`) REFERENCES `asesor_empresarial_def` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_def_ibfk_3` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto_def` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_def_ibfk_4` FOREIGN KEY (`id_detalle`) REFERENCES `detalle_def` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`id_formulario`) REFERENCES `formulario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta_def`
--
ALTER TABLE `respuesta_def`
  ADD CONSTRAINT `respuesta_def_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_def_ibfk_2` FOREIGN KEY (`id_formulario`) REFERENCES `formulario_def` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta_doc`
--
ALTER TABLE `respuesta_doc`
  ADD CONSTRAINT `respuesta_doc_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_doc_ibfk_2` FOREIGN KEY (`id_documentos`) REFERENCES `documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
