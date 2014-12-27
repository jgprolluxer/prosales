-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-12-2014 a las 04:03:36
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prosales-app`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `get_next_value`(`p_name` VARCHAR(30) CHARSET utf8) RETURNS int(11)
    DETERMINISTIC
    SQL SECURITY INVOKER
begin  

  declare current_val integer;

  

  update sequences 

  	set value = value + 1

  	where name = p_name 

  	  and true_function((@current_val := sequences.value) is not null);

  	  

  return @current_val;

end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `true_function`(`p_param` INT) RETURNS int(11)
    NO SQL
    DETERMINISTIC
    SQL SECURITY INVOKER
RETURN TRUE$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `alias` varchar(80) DEFAULT NULL,
  `sex` varchar(80) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `team_id` int(11) NOT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `integration_id` varchar(200) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `accounts`
--

INSERT INTO `accounts` (`id`, `created`, `updated`, `created_by`, `updated_by`, `firstname`, `lastname`, `alias`, `sex`, `birthdate`, `team_id`, `mode`, `type`, `integration_id`, `status`) VALUES
(1, '2014-10-25 20:44:00', '2014-10-25 20:44:00', 1, 1, 'Hugo', 'Ruíz', 'Hugo Ruíz', 'Male', '2000-12-01', 1, '1', '1', '', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
`id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1708 ;

--
-- Volcado de datos para la tabla `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(145, NULL, NULL, NULL, 'controllers', 1, 948),
(146, 145, NULL, NULL, 'AdjAudits', 2, 13),
(147, 146, NULL, NULL, 'index', 3, 4),
(148, 146, NULL, NULL, 'view', 5, 6),
(149, 146, NULL, NULL, 'add', 7, 8),
(150, 146, NULL, NULL, 'edit', 9, 10),
(151, 146, NULL, NULL, 'delete', 11, 12),
(199, 145, NULL, NULL, 'Groups', 14, 35),
(200, 199, NULL, NULL, 'index', 15, 16),
(201, 199, NULL, NULL, 'view', 17, 18),
(202, 199, NULL, NULL, 'add', 19, 20),
(203, 199, NULL, NULL, 'edit', 21, 22),
(204, 199, NULL, NULL, 'delete', 23, 24),
(217, 145, NULL, NULL, 'Pages', 36, 39),
(218, 217, NULL, NULL, 'display', 37, 38),
(219, 145, NULL, NULL, 'Users', 40, 65),
(220, 219, NULL, NULL, 'index', 41, 42),
(221, 219, NULL, NULL, 'view', 43, 44),
(222, 219, NULL, NULL, 'add', 45, 46),
(223, 219, NULL, NULL, 'edit', 47, 48),
(224, 219, NULL, NULL, 'delete', 49, 50),
(225, 219, NULL, NULL, 'login', 51, 52),
(226, 219, NULL, NULL, 'logout', 53, 54),
(228, 145, NULL, NULL, 'Acl', 66, 125),
(229, 228, NULL, NULL, 'Acl', 67, 72),
(230, 229, NULL, NULL, 'index', 68, 69),
(231, 229, NULL, NULL, 'admin_index', 70, 71),
(232, 228, NULL, NULL, 'Acos', 73, 84),
(233, 232, NULL, NULL, 'admin_index', 74, 75),
(234, 232, NULL, NULL, 'admin_empty_acos', 76, 77),
(235, 232, NULL, NULL, 'admin_build_acl', 78, 79),
(236, 232, NULL, NULL, 'admin_prune_acos', 80, 81),
(237, 232, NULL, NULL, 'admin_synchronize', 82, 83),
(238, 228, NULL, NULL, 'Aros', 85, 124),
(239, 238, NULL, NULL, 'admin_index', 86, 87),
(240, 238, NULL, NULL, 'admin_check', 88, 89),
(241, 238, NULL, NULL, 'admin_users', 90, 91),
(242, 238, NULL, NULL, 'admin_update_user_role', 92, 93),
(243, 238, NULL, NULL, 'admin_ajax_role_permissions', 94, 95),
(244, 238, NULL, NULL, 'admin_role_permissions', 96, 97),
(245, 238, NULL, NULL, 'admin_user_permissions', 98, 99),
(246, 238, NULL, NULL, 'admin_empty_permissions', 100, 101),
(247, 238, NULL, NULL, 'admin_clear_user_specific_permissions', 102, 103),
(248, 238, NULL, NULL, 'admin_grant_all_controllers', 104, 105),
(249, 238, NULL, NULL, 'admin_deny_all_controllers', 106, 107),
(250, 238, NULL, NULL, 'admin_get_role_controller_permission', 108, 109),
(251, 238, NULL, NULL, 'admin_grant_role_permission', 110, 111),
(252, 238, NULL, NULL, 'admin_deny_role_permission', 112, 113),
(253, 238, NULL, NULL, 'admin_get_user_controller_permission', 114, 115),
(254, 238, NULL, NULL, 'admin_grant_user_permission', 116, 117),
(255, 238, NULL, NULL, 'admin_deny_user_permission', 118, 119),
(256, 145, NULL, NULL, 'FullCalendar', 126, 159),
(257, 256, NULL, NULL, 'EventTypes', 127, 138),
(258, 257, NULL, NULL, 'index', 128, 129),
(259, 257, NULL, NULL, 'view', 130, 131),
(260, 257, NULL, NULL, 'add', 132, 133),
(261, 257, NULL, NULL, 'edit', 134, 135),
(262, 257, NULL, NULL, 'delete', 136, 137),
(263, 256, NULL, NULL, 'Events', 139, 154),
(264, 263, NULL, NULL, 'index', 140, 141),
(265, 263, NULL, NULL, 'view', 142, 143),
(266, 263, NULL, NULL, 'add', 144, 145),
(267, 263, NULL, NULL, 'edit', 146, 147),
(268, 263, NULL, NULL, 'delete', 148, 149),
(269, 263, NULL, NULL, 'feed', 150, 151),
(270, 263, NULL, NULL, 'update', 152, 153),
(271, 256, NULL, NULL, 'FullCalendar', 155, 158),
(272, 271, NULL, NULL, 'index', 156, 157),
(299, 145, NULL, NULL, 'P28n', 160, 165),
(300, 299, NULL, NULL, 'change', 161, 162),
(301, 299, NULL, NULL, 'shuntRequest', 163, 164),
(304, 145, NULL, NULL, 'Lovs', 166, 191),
(305, 304, NULL, NULL, 'index', 167, 168),
(306, 304, NULL, NULL, 'view', 169, 170),
(307, 304, NULL, NULL, 'add', 171, 172),
(308, 304, NULL, NULL, 'edit', 173, 174),
(309, 304, NULL, NULL, 'delete', 175, 176),
(312, 145, NULL, NULL, 'Products', 192, 215),
(313, 312, NULL, NULL, 'index', 193, 194),
(315, 312, NULL, NULL, 'view', 195, 196),
(316, 312, NULL, NULL, 'add', 197, 198),
(317, 312, NULL, NULL, 'edit', 199, 200),
(318, 312, NULL, NULL, 'delete', 201, 202),
(363, 145, NULL, NULL, 'Activities', 216, 237),
(364, 363, NULL, NULL, 'index', 217, 218),
(365, 363, NULL, NULL, 'view', 219, 220),
(366, 363, NULL, NULL, 'add', 221, 222),
(367, 363, NULL, NULL, 'edit', 223, 224),
(368, 363, NULL, NULL, 'delete', 225, 226),
(400, 145, NULL, NULL, 'Configs', 238, 259),
(401, 400, NULL, NULL, 'index', 239, 240),
(402, 400, NULL, NULL, 'view', 241, 242),
(403, 400, NULL, NULL, 'add', 243, 244),
(404, 400, NULL, NULL, 'edit', 245, 246),
(405, 400, NULL, NULL, 'delete', 247, 248),
(409, 145, NULL, NULL, 'Teams', 260, 281),
(410, 409, NULL, NULL, 'index', 261, 262),
(411, 409, NULL, NULL, 'view', 263, 264),
(412, 409, NULL, NULL, 'add', 265, 266),
(413, 409, NULL, NULL, 'edit', 267, 268),
(414, 409, NULL, NULL, 'delete', 269, 270),
(426, 145, NULL, NULL, 'ActPlanDetails', 282, 299),
(427, 426, NULL, NULL, 'index', 283, 284),
(428, 426, NULL, NULL, 'view', 285, 286),
(429, 426, NULL, NULL, 'add', 287, 288),
(430, 426, NULL, NULL, 'edit', 289, 290),
(431, 426, NULL, NULL, 'delete', 291, 292),
(432, 145, NULL, NULL, 'ActPlans', 300, 317),
(433, 432, NULL, NULL, 'index', 301, 302),
(434, 432, NULL, NULL, 'view', 303, 304),
(435, 432, NULL, NULL, 'add', 305, 306),
(436, 432, NULL, NULL, 'edit', 307, 308),
(437, 432, NULL, NULL, 'delete', 309, 310),
(444, 432, NULL, NULL, 'jsindex', 311, 312),
(445, 426, NULL, NULL, 'jsindex', 293, 294),
(462, 145, NULL, NULL, 'Resources', 318, 339),
(463, 462, NULL, NULL, 'index', 319, 320),
(466, 462, NULL, NULL, 'view', 321, 322),
(467, 462, NULL, NULL, 'add', 323, 324),
(468, 462, NULL, NULL, 'edit', 325, 326),
(469, 462, NULL, NULL, 'delete', 327, 328),
(504, 145, NULL, NULL, 'Sequences', 340, 367),
(505, 504, NULL, NULL, 'index', 341, 342),
(506, 504, NULL, NULL, 'view', 343, 344),
(507, 504, NULL, NULL, 'add', 345, 346),
(508, 504, NULL, NULL, 'edit', 347, 348),
(509, 504, NULL, NULL, 'delete', 349, 350),
(510, 504, NULL, NULL, 'jsindex', 351, 352),
(512, 145, NULL, NULL, 'TaskActions', 368, 395),
(513, 512, NULL, NULL, 'index', 369, 370),
(514, 512, NULL, NULL, 'view', 371, 372),
(515, 512, NULL, NULL, 'add', 373, 374),
(516, 512, NULL, NULL, 'edit', 375, 376),
(517, 512, NULL, NULL, 'delete', 377, 378),
(518, 145, NULL, NULL, 'TaskflowInstances', 396, 423),
(519, 518, NULL, NULL, 'index', 397, 398),
(520, 518, NULL, NULL, 'view', 399, 400),
(521, 518, NULL, NULL, 'add', 401, 402),
(522, 518, NULL, NULL, 'edit', 403, 404),
(523, 518, NULL, NULL, 'delete', 405, 406),
(524, 145, NULL, NULL, 'Taskflows', 424, 451),
(525, 524, NULL, NULL, 'index', 425, 426),
(526, 524, NULL, NULL, 'view', 427, 428),
(527, 524, NULL, NULL, 'add', 429, 430),
(528, 524, NULL, NULL, 'edit', 431, 432),
(529, 524, NULL, NULL, 'delete', 433, 434),
(542, 524, NULL, NULL, 'jsindex', 435, 436),
(544, 145, NULL, NULL, 'TaskflowTasks', 452, 479),
(545, 544, NULL, NULL, 'index', 453, 454),
(546, 544, NULL, NULL, 'jsindex', 455, 456),
(547, 544, NULL, NULL, 'view', 457, 458),
(548, 544, NULL, NULL, 'add', 459, 460),
(549, 544, NULL, NULL, 'edit', 461, 462),
(550, 544, NULL, NULL, 'delete', 463, 464),
(551, 512, NULL, NULL, 'jsindex', 379, 380),
(552, 518, NULL, NULL, 'jsindex', 407, 408),
(553, 145, NULL, NULL, 'Notes', 480, 501),
(554, 553, NULL, NULL, 'index', 481, 482),
(556, 553, NULL, NULL, 'view', 483, 484),
(557, 553, NULL, NULL, 'add', 485, 486),
(558, 553, NULL, NULL, 'edit', 487, 488),
(559, 553, NULL, NULL, 'delete', 489, 490),
(585, 145, NULL, NULL, 'Families', 502, 525),
(586, 585, NULL, NULL, 'index', 503, 504),
(588, 585, NULL, NULL, 'view', 505, 506),
(589, 585, NULL, NULL, 'add', 507, 508),
(590, 585, NULL, NULL, 'edit', 509, 510),
(591, 585, NULL, NULL, 'delete', 511, 512),
(658, 145, NULL, NULL, 'Addresses', 526, 547),
(659, 658, NULL, NULL, 'index', 527, 528),
(662, 658, NULL, NULL, 'view', 529, 530),
(663, 658, NULL, NULL, 'add', 531, 532),
(664, 658, NULL, NULL, 'edit', 533, 534),
(665, 658, NULL, NULL, 'delete', 535, 536),
(667, 145, NULL, NULL, 'Maps', 548, 553),
(668, 667, NULL, NULL, 'index', 549, 550),
(669, 667, NULL, NULL, 'simpleMap', 551, 552),
(684, 426, NULL, NULL, 'excel', 295, 296),
(685, 426, NULL, NULL, 'pdf', 297, 298),
(686, 432, NULL, NULL, 'excel', 313, 314),
(687, 432, NULL, NULL, 'pdf', 315, 316),
(942, 145, NULL, NULL, 'ProductsComponents', 554, 575),
(943, 942, NULL, NULL, 'index', 555, 556),
(948, 942, NULL, NULL, 'view', 557, 558),
(950, 942, NULL, NULL, 'add', 559, 560),
(952, 942, NULL, NULL, 'edit', 561, 562),
(954, 942, NULL, NULL, 'delete', 563, 564),
(1033, 504, NULL, NULL, 'api_index', 353, 354),
(1034, 504, NULL, NULL, 'excel', 355, 356),
(1035, 504, NULL, NULL, 'pdf', 357, 358),
(1036, 504, NULL, NULL, 'api_view', 359, 360),
(1037, 504, NULL, NULL, 'api_add', 361, 362),
(1038, 504, NULL, NULL, 'api_edit', 363, 364),
(1039, 504, NULL, NULL, 'api_delete', 365, 366),
(1085, 512, NULL, NULL, 'api_index', 381, 382),
(1086, 512, NULL, NULL, 'excel', 383, 384),
(1087, 512, NULL, NULL, 'pdf', 385, 386),
(1088, 512, NULL, NULL, 'api_view', 387, 388),
(1089, 512, NULL, NULL, 'api_add', 389, 390),
(1090, 512, NULL, NULL, 'api_edit', 391, 392),
(1091, 512, NULL, NULL, 'api_delete', 393, 394),
(1092, 518, NULL, NULL, 'api_index', 409, 410),
(1093, 518, NULL, NULL, 'excel', 411, 412),
(1094, 518, NULL, NULL, 'pdf', 413, 414),
(1095, 518, NULL, NULL, 'api_view', 415, 416),
(1096, 518, NULL, NULL, 'api_add', 417, 418),
(1097, 518, NULL, NULL, 'api_edit', 419, 420),
(1098, 518, NULL, NULL, 'api_delete', 421, 422),
(1099, 544, NULL, NULL, 'api_index', 465, 466),
(1100, 544, NULL, NULL, 'excel', 467, 468),
(1101, 544, NULL, NULL, 'pdf', 469, 470),
(1102, 544, NULL, NULL, 'api_view', 471, 472),
(1103, 544, NULL, NULL, 'api_add', 473, 474),
(1104, 544, NULL, NULL, 'api_edit', 475, 476),
(1105, 544, NULL, NULL, 'api_delete', 477, 478),
(1106, 524, NULL, NULL, 'api_index', 437, 438),
(1107, 524, NULL, NULL, 'excel', 439, 440),
(1108, 524, NULL, NULL, 'pdf', 441, 442),
(1109, 524, NULL, NULL, 'api_view', 443, 444),
(1110, 524, NULL, NULL, 'api_add', 445, 446),
(1111, 524, NULL, NULL, 'api_edit', 447, 448),
(1112, 524, NULL, NULL, 'api_delete', 449, 450),
(1198, 145, NULL, NULL, 'WebServices', 576, 585),
(1199, 1198, NULL, NULL, 'index', 577, 578),
(1224, 1198, NULL, NULL, 'getAllAcounts', 579, 580),
(1225, 1198, NULL, NULL, 'getAllProducts', 581, 582),
(1226, 1198, NULL, NULL, 'getAllPriceLists', 583, 584),
(1283, 145, NULL, NULL, 'Dashboards', 586, 589),
(1284, 1283, NULL, NULL, 'index', 587, 588),
(1367, 145, NULL, NULL, 'TeamWorkstations', 590, 611),
(1368, 1367, NULL, NULL, 'index', 591, 592),
(1369, 1367, NULL, NULL, 'view', 593, 594),
(1370, 1367, NULL, NULL, 'add', 595, 596),
(1371, 1367, NULL, NULL, 'edit', 597, 598),
(1372, 1367, NULL, NULL, 'delete', 599, 600),
(1379, 145, NULL, NULL, 'Workstations', 612, 637),
(1380, 1379, NULL, NULL, 'index', 613, 614),
(1381, 1379, NULL, NULL, 'view', 615, 616),
(1382, 1379, NULL, NULL, 'add', 617, 618),
(1383, 1379, NULL, NULL, 'edit', 619, 620),
(1384, 1379, NULL, NULL, 'delete', 621, 622),
(1442, 145, NULL, NULL, 'Attachments', 638, 659),
(1443, 1442, NULL, NULL, 'index', 639, 640),
(1446, 1442, NULL, NULL, 'view', 641, 642),
(1447, 1442, NULL, NULL, 'add', 643, 644),
(1448, 1442, NULL, NULL, 'edit', 645, 646),
(1449, 1442, NULL, NULL, 'delete', 647, 648),
(1474, 145, NULL, NULL, 'Accounts', 660, 681),
(1475, 1474, NULL, NULL, 'index', 661, 662),
(1476, 1474, NULL, NULL, 'view', 663, 664),
(1477, 1474, NULL, NULL, 'add', 665, 666),
(1478, 1474, NULL, NULL, 'edit', 667, 668),
(1479, 1474, NULL, NULL, 'delete', 669, 670),
(1480, 1474, NULL, NULL, 'admin_index', 671, 672),
(1481, 1474, NULL, NULL, 'admin_view', 673, 674),
(1482, 1474, NULL, NULL, 'admin_add', 675, 676),
(1483, 1474, NULL, NULL, 'admin_edit', 677, 678),
(1484, 1474, NULL, NULL, 'admin_delete', 679, 680),
(1485, 363, NULL, NULL, 'admin_index', 227, 228),
(1486, 363, NULL, NULL, 'admin_view', 229, 230),
(1487, 363, NULL, NULL, 'admin_add', 231, 232),
(1488, 363, NULL, NULL, 'admin_edit', 233, 234),
(1489, 363, NULL, NULL, 'admin_delete', 235, 236),
(1490, 658, NULL, NULL, 'admin_index', 537, 538),
(1491, 658, NULL, NULL, 'admin_view', 539, 540),
(1492, 658, NULL, NULL, 'admin_add', 541, 542),
(1493, 658, NULL, NULL, 'admin_edit', 543, 544),
(1494, 658, NULL, NULL, 'admin_delete', 545, 546),
(1495, 145, NULL, NULL, 'Appmenus', 682, 709),
(1496, 1495, NULL, NULL, 'index', 683, 684),
(1497, 1495, NULL, NULL, 'view', 685, 686),
(1498, 1495, NULL, NULL, 'add', 687, 688),
(1499, 1495, NULL, NULL, 'edit', 689, 690),
(1500, 1495, NULL, NULL, 'delete', 691, 692),
(1501, 1495, NULL, NULL, 'admin_index', 693, 694),
(1502, 1495, NULL, NULL, 'admin_view', 695, 696),
(1503, 1495, NULL, NULL, 'admin_add', 697, 698),
(1504, 1495, NULL, NULL, 'admin_edit', 699, 700),
(1505, 1495, NULL, NULL, 'admin_delete', 701, 702),
(1506, 1495, NULL, NULL, 'movedown', 703, 704),
(1507, 1495, NULL, NULL, 'moveup', 705, 706),
(1508, 1442, NULL, NULL, 'admin_index', 649, 650),
(1509, 1442, NULL, NULL, 'admin_view', 651, 652),
(1510, 1442, NULL, NULL, 'admin_add', 653, 654),
(1511, 1442, NULL, NULL, 'admin_edit', 655, 656),
(1512, 1442, NULL, NULL, 'admin_delete', 657, 658),
(1513, 400, NULL, NULL, 'admin_index', 249, 250),
(1514, 400, NULL, NULL, 'admin_view', 251, 252),
(1515, 400, NULL, NULL, 'admin_add', 253, 254),
(1516, 400, NULL, NULL, 'admin_edit', 255, 256),
(1517, 400, NULL, NULL, 'admin_delete', 257, 258),
(1518, 585, NULL, NULL, 'admin_index', 513, 514),
(1519, 585, NULL, NULL, 'admin_view', 515, 516),
(1520, 585, NULL, NULL, 'admin_add', 517, 518),
(1521, 585, NULL, NULL, 'admin_edit', 519, 520),
(1522, 585, NULL, NULL, 'admin_delete', 521, 522),
(1523, 585, NULL, NULL, 'jsfindFamily', 523, 524),
(1524, 199, NULL, NULL, 'admin_index', 25, 26),
(1525, 199, NULL, NULL, 'admin_view', 27, 28),
(1526, 199, NULL, NULL, 'admin_add', 29, 30),
(1527, 199, NULL, NULL, 'admin_edit', 31, 32),
(1528, 199, NULL, NULL, 'admin_delete', 33, 34),
(1529, 304, NULL, NULL, 'admin_index', 177, 178),
(1530, 304, NULL, NULL, 'admin_view', 179, 180),
(1531, 304, NULL, NULL, 'admin_add', 181, 182),
(1532, 304, NULL, NULL, 'admin_edit', 183, 184),
(1533, 304, NULL, NULL, 'admin_delete', 185, 186),
(1534, 553, NULL, NULL, 'admin_index', 491, 492),
(1535, 553, NULL, NULL, 'admin_view', 493, 494),
(1536, 553, NULL, NULL, 'admin_add', 495, 496),
(1537, 553, NULL, NULL, 'admin_edit', 497, 498),
(1538, 553, NULL, NULL, 'admin_delete', 499, 500),
(1539, 145, NULL, NULL, 'OrderPayments', 710, 731),
(1540, 1539, NULL, NULL, 'index', 711, 712),
(1541, 1539, NULL, NULL, 'view', 713, 714),
(1542, 1539, NULL, NULL, 'add', 715, 716),
(1543, 1539, NULL, NULL, 'edit', 717, 718),
(1544, 1539, NULL, NULL, 'delete', 719, 720),
(1545, 1539, NULL, NULL, 'admin_index', 721, 722),
(1546, 1539, NULL, NULL, 'admin_view', 723, 724),
(1547, 1539, NULL, NULL, 'admin_add', 725, 726),
(1548, 1539, NULL, NULL, 'admin_edit', 727, 728),
(1549, 1539, NULL, NULL, 'admin_delete', 729, 730),
(1550, 145, NULL, NULL, 'OrderProducts', 732, 759),
(1551, 1550, NULL, NULL, 'index', 733, 734),
(1552, 1550, NULL, NULL, 'view', 735, 736),
(1553, 1550, NULL, NULL, 'add', 737, 738),
(1554, 1550, NULL, NULL, 'edit', 739, 740),
(1555, 1550, NULL, NULL, 'delete', 741, 742),
(1556, 1550, NULL, NULL, 'admin_index', 743, 744),
(1557, 1550, NULL, NULL, 'admin_view', 745, 746),
(1558, 1550, NULL, NULL, 'admin_add', 747, 748),
(1559, 1550, NULL, NULL, 'admin_edit', 749, 750),
(1560, 1550, NULL, NULL, 'admin_delete', 751, 752),
(1561, 1550, NULL, NULL, 'jsCancelOrderProduct', 753, 754),
(1562, 1550, NULL, NULL, 'jsfindOrderProduct', 755, 756),
(1563, 1550, NULL, NULL, 'addFromPOSByJs', 757, 758),
(1564, 145, NULL, NULL, 'Orders', 760, 787),
(1565, 1564, NULL, NULL, 'index', 761, 762),
(1566, 1564, NULL, NULL, 'view', 763, 764),
(1567, 1564, NULL, NULL, 'add', 765, 766),
(1568, 1564, NULL, NULL, 'edit', 767, 768),
(1569, 1564, NULL, NULL, 'delete', 769, 770),
(1570, 1564, NULL, NULL, 'admin_index', 771, 772),
(1571, 1564, NULL, NULL, 'admin_view', 773, 774),
(1572, 1564, NULL, NULL, 'admin_add', 775, 776),
(1573, 1564, NULL, NULL, 'admin_edit', 777, 778),
(1574, 1564, NULL, NULL, 'admin_delete', 779, 780),
(1575, 1564, NULL, NULL, 'pos', 781, 782),
(1576, 1564, NULL, NULL, 'addByPOSJS', 783, 784),
(1577, 1564, NULL, NULL, 'jsfindOrder', 785, 786),
(1578, 145, NULL, NULL, 'Payments', 788, 809),
(1579, 1578, NULL, NULL, 'index', 789, 790),
(1580, 1578, NULL, NULL, 'view', 791, 792),
(1581, 1578, NULL, NULL, 'add', 793, 794),
(1582, 1578, NULL, NULL, 'edit', 795, 796),
(1583, 1578, NULL, NULL, 'delete', 797, 798),
(1584, 1578, NULL, NULL, 'admin_index', 799, 800),
(1585, 1578, NULL, NULL, 'admin_view', 801, 802),
(1586, 1578, NULL, NULL, 'admin_add', 803, 804),
(1587, 1578, NULL, NULL, 'admin_edit', 805, 806),
(1588, 1578, NULL, NULL, 'admin_delete', 807, 808),
(1589, 145, NULL, NULL, 'PricelistProducts', 810, 831),
(1590, 1589, NULL, NULL, 'index', 811, 812),
(1591, 1589, NULL, NULL, 'view', 813, 814),
(1592, 1589, NULL, NULL, 'add', 815, 816),
(1593, 1589, NULL, NULL, 'edit', 817, 818),
(1594, 1589, NULL, NULL, 'delete', 819, 820),
(1595, 1589, NULL, NULL, 'admin_index', 821, 822),
(1596, 1589, NULL, NULL, 'admin_view', 823, 824),
(1597, 1589, NULL, NULL, 'admin_add', 825, 826),
(1598, 1589, NULL, NULL, 'admin_edit', 827, 828),
(1599, 1589, NULL, NULL, 'admin_delete', 829, 830),
(1600, 145, NULL, NULL, 'Pricelists', 832, 853),
(1601, 1600, NULL, NULL, 'index', 833, 834),
(1602, 1600, NULL, NULL, 'view', 835, 836),
(1603, 1600, NULL, NULL, 'add', 837, 838),
(1604, 1600, NULL, NULL, 'edit', 839, 840),
(1605, 1600, NULL, NULL, 'delete', 841, 842),
(1606, 1600, NULL, NULL, 'admin_index', 843, 844),
(1607, 1600, NULL, NULL, 'admin_view', 845, 846),
(1608, 1600, NULL, NULL, 'admin_add', 847, 848),
(1609, 1600, NULL, NULL, 'admin_edit', 849, 850),
(1610, 1600, NULL, NULL, 'admin_delete', 851, 852),
(1611, 145, NULL, NULL, 'ProductSupplies', 854, 875),
(1612, 1611, NULL, NULL, 'index', 855, 856),
(1613, 1611, NULL, NULL, 'view', 857, 858),
(1614, 1611, NULL, NULL, 'add', 859, 860),
(1615, 1611, NULL, NULL, 'edit', 861, 862),
(1616, 1611, NULL, NULL, 'delete', 863, 864),
(1617, 1611, NULL, NULL, 'admin_index', 865, 866),
(1618, 1611, NULL, NULL, 'admin_view', 867, 868),
(1619, 1611, NULL, NULL, 'admin_add', 869, 870),
(1620, 1611, NULL, NULL, 'admin_edit', 871, 872),
(1621, 1611, NULL, NULL, 'admin_delete', 873, 874),
(1622, 942, NULL, NULL, 'admin_index', 565, 566),
(1623, 942, NULL, NULL, 'admin_view', 567, 568),
(1624, 942, NULL, NULL, 'admin_add', 569, 570),
(1625, 942, NULL, NULL, 'admin_edit', 571, 572),
(1626, 942, NULL, NULL, 'admin_delete', 573, 574),
(1627, 312, NULL, NULL, 'admin_index', 203, 204),
(1628, 312, NULL, NULL, 'admin_view', 205, 206),
(1629, 312, NULL, NULL, 'admin_add', 207, 208),
(1630, 312, NULL, NULL, 'admin_edit', 209, 210),
(1631, 312, NULL, NULL, 'admin_delete', 211, 212),
(1632, 312, NULL, NULL, 'jsfindProduct', 213, 214),
(1633, 145, NULL, NULL, 'Reports', 876, 899),
(1634, 1633, NULL, NULL, 'index', 877, 878),
(1635, 1633, NULL, NULL, 'view', 879, 880),
(1636, 1633, NULL, NULL, 'add', 881, 882),
(1637, 1633, NULL, NULL, 'edit', 883, 884),
(1638, 1633, NULL, NULL, 'delete', 885, 886),
(1639, 1633, NULL, NULL, 'admin_index', 887, 888),
(1641, 1633, NULL, NULL, 'admin_view', 889, 890),
(1642, 1633, NULL, NULL, 'admin_add', 891, 892),
(1643, 1633, NULL, NULL, 'admin_edit', 893, 894),
(1644, 1633, NULL, NULL, 'admin_delete', 895, 896),
(1645, 462, NULL, NULL, 'admin_index', 329, 330),
(1646, 462, NULL, NULL, 'admin_view', 331, 332),
(1647, 462, NULL, NULL, 'admin_add', 333, 334),
(1648, 462, NULL, NULL, 'admin_edit', 335, 336),
(1649, 462, NULL, NULL, 'admin_delete', 337, 338),
(1650, 145, NULL, NULL, 'StoreTeams', 900, 921),
(1651, 1650, NULL, NULL, 'index', 901, 902),
(1652, 1650, NULL, NULL, 'view', 903, 904),
(1653, 1650, NULL, NULL, 'add', 905, 906),
(1654, 1650, NULL, NULL, 'edit', 907, 908),
(1655, 1650, NULL, NULL, 'delete', 909, 910),
(1656, 1650, NULL, NULL, 'admin_index', 911, 912),
(1657, 1650, NULL, NULL, 'admin_view', 913, 914),
(1658, 1650, NULL, NULL, 'admin_add', 915, 916),
(1659, 1650, NULL, NULL, 'admin_edit', 917, 918),
(1660, 1650, NULL, NULL, 'admin_delete', 919, 920),
(1661, 145, NULL, NULL, 'Stores', 922, 947),
(1662, 1661, NULL, NULL, 'index', 923, 924),
(1663, 1661, NULL, NULL, 'view', 925, 926),
(1664, 1661, NULL, NULL, 'add', 927, 928),
(1665, 1661, NULL, NULL, 'edit', 929, 930),
(1666, 1661, NULL, NULL, 'delete', 931, 932),
(1667, 1661, NULL, NULL, 'admin_index', 933, 934),
(1668, 1661, NULL, NULL, 'admin_view', 935, 936),
(1669, 1661, NULL, NULL, 'admin_add', 937, 938),
(1670, 1661, NULL, NULL, 'admin_edit', 939, 940),
(1671, 1661, NULL, NULL, 'admin_delete', 941, 942),
(1672, 1367, NULL, NULL, 'admin_index', 601, 602),
(1673, 1367, NULL, NULL, 'admin_view', 603, 604),
(1674, 1367, NULL, NULL, 'admin_add', 605, 606),
(1675, 1367, NULL, NULL, 'admin_edit', 607, 608),
(1676, 1367, NULL, NULL, 'admin_delete', 609, 610),
(1677, 409, NULL, NULL, 'admin_index', 271, 272),
(1678, 409, NULL, NULL, 'admin_view', 273, 274),
(1679, 409, NULL, NULL, 'admin_add', 275, 276),
(1680, 409, NULL, NULL, 'admin_edit', 277, 278),
(1681, 409, NULL, NULL, 'admin_delete', 279, 280),
(1682, 219, NULL, NULL, 'admin_index', 55, 56),
(1683, 219, NULL, NULL, 'admin_view', 57, 58),
(1684, 219, NULL, NULL, 'admin_add', 59, 60),
(1685, 219, NULL, NULL, 'admin_edit', 61, 62),
(1686, 219, NULL, NULL, 'admin_delete', 63, 64),
(1692, 1379, NULL, NULL, 'admin_index', 623, 624),
(1693, 1379, NULL, NULL, 'admin_view', 625, 626),
(1694, 1379, NULL, NULL, 'admin_add', 627, 628),
(1695, 1379, NULL, NULL, 'admin_edit', 629, 630),
(1696, 1379, NULL, NULL, 'admin_delete', 631, 632),
(1697, 238, NULL, NULL, 'admin_permissions_by_role', 120, 121),
(1698, 238, NULL, NULL, 'admin_copy_role_permissions', 122, 123),
(1699, 1633, NULL, NULL, 'admnJsIndex', 897, 898),
(1701, 1661, NULL, NULL, 'jsIndex', 943, 944),
(1702, 1661, NULL, NULL, 'adminjsIndex', 945, 946),
(1703, 1379, NULL, NULL, 'jsIndex', 633, 634),
(1704, 1379, NULL, NULL, 'adminjsIndex', 635, 636),
(1705, 304, NULL, NULL, 'jsIndex', 187, 188),
(1706, 304, NULL, NULL, 'adminjsIndex', 189, 190),
(1707, 1495, NULL, NULL, 'getControllerActions', 707, 708);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
`id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active',
  `recurring` tinyint(1) NOT NULL DEFAULT '0',
  `recurring_freq` int(11) DEFAULT NULL,
  `planned_startdate` datetime DEFAULT NULL,
  `planned_enddate` datetime DEFAULT NULL,
  `actual_startdate` datetime DEFAULT NULL,
  `actual_enddate` datetime DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `description` text,
  `objectType` varchar(255) DEFAULT NULL,
  `objectId` int(11) DEFAULT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '0',
  `auto_flg` tinyint(1) NOT NULL DEFAULT '0',
  `act_plan_detail_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  `assigned_user` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `country` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `street` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `suburb` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `state` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zip` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `latitude` varchar(100) NOT NULL DEFAULT '0',
  `longitude` varchar(100) NOT NULL DEFAULT '0',
  `street_no` int(11) NOT NULL DEFAULT '0',
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appmenus`
--

CREATE TABLE IF NOT EXISTS `appmenus` (
`id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `ordershow` int(11) DEFAULT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active',
  `mkey` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `mname` varchar(80) NOT NULL DEFAULT 'newAdded',
  `escapeTitle` tinyint(1) DEFAULT '0',
  `title` varchar(200) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `url` varchar(40) DEFAULT NULL,
  `controller` varchar(40) DEFAULT NULL,
  `action` varchar(40) DEFAULT NULL,
  `linkClass` varchar(40) DEFAULT NULL,
  `linkID` varchar(40) DEFAULT NULL,
  `linkDataToggle` varchar(40) DEFAULT NULL,
  `liClass` varchar(40) DEFAULT NULL,
  `parentUlClass` varchar(40) DEFAULT NULL,
  `menuSeparator` varchar(80) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `appmenus`
--

INSERT INTO `appmenus` (`id`, `created`, `updated`, `created_by`, `updated_by`, `parent_id`, `lft`, `rght`, `ordershow`, `status`, `mkey`, `type`, `mname`, `escapeTitle`, `title`, `admin`, `url`, `controller`, `action`, `linkClass`, `linkID`, `linkDataToggle`, `liClass`, `parentUlClass`, `menuSeparator`) VALUES
(1, '2014-12-03 03:59:08', '2014-12-03 20:18:28', 1, 1, NULL, 3, 12, 1, 'active', 'h-menu-header', '', 'menuSales', 0, '<label translate="HEADER_MENU_SALES"></label> <i class="fa fa-angle-down"></i>', 0, 'javascript:;', '', '', 'dropdown-toggle', 'sales-nav', 'dropdown', 'dropdown', 'nav navbar-nav', ''),
(2, '2014-12-03 20:01:04', '2014-12-18 06:41:22', 1, 1, 1, 4, 5, 1, 'active', 'h-menu-header', '', 'linkOrders', 0, '<label translate="HEADER_MENU_LINK_ORDERS"></label>', 1, '', 'Orders', 'admin_index', '', 'orders-nav', '', '', 'dropdown-menu', ''),
(3, '2014-12-09 22:36:47', '2014-12-10 04:23:28', 1, 1, 1, 6, 7, 3, 'active', 'h-menu-header', '', 'linkPayments', 0, '<label translate="HEADER_MENU_LINK_PAYMENTS"></label>', 0, '', 'Payments', 'index', '', 'link_payments', '', '', 'dropdown-menu', ''),
(4, '2014-12-10 02:33:54', '2014-12-10 04:23:07', 1, 1, 1, 8, 9, 2, 'active', 'h-menu-header', '', 'mSeparator', 0, '', 0, 'javascript:;', '', '', '', '', '', '', 'dropdown-menu', '<li class="divider"></li>'),
(5, '2014-12-18 06:39:35', '2014-12-19 04:09:15', NULL, NULL, 1, 10, 11, 4, 'active', 'h-menu-header', '', 'linkOrdersAdd', 0, 'AGREGAR ORDEN ', 1, 'javascript:;', 'Orders', 'admin_add', '', 'orders-nav', '', '', 'dropdown-menu', '0'),
(6, '2014-12-26 20:23:35', '2014-12-26 21:46:07', NULL, 3, NULL, 13, 16, 2, 'active', 'menu-sidebar-nav', '', 'menuAdministration', 0, '<i class="fa fa-angle-left sidebar-nav-indicator"></i><i class="gi gi-wallet sidebar-nav-icon"></i><span translate="MENU_ADMINISTRATION"></span>', 1, 'javascript:;', '0', '0', 'sidebar-nav-menu', 'orders-nav', '', '', 'sidebar-nav', ''),
(7, '2014-12-26 20:32:02', '2014-12-26 20:32:02', NULL, NULL, 6, 14, 15, 1, 'active', 'menu-sidebar-nav', '', 'menuAdminUsers', 0, '<i class="gi gi-user sidebar-nav-icon"></i><span translate="SUBMENU_USERS"></span>', 0, '', 'Users', 'index', '', 'orders-nav', '', '', '', ''),
(8, '2014-12-26 21:48:53', '2014-12-26 21:50:56', 3, 3, NULL, 17, 18, 1, 'active', 'menu-sidebar-nav', '', 'menuPOS', 0, '<i class="gi gi-shopping_cart sidebar-nav-icon"></i> <label translate="MENU_POS"></label>', 0, 'javascript:;', 'Orders', 'pos', '', '', '', '', 'sidebar-nav', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
`id` int(10) NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Volcado de datos para la tabla `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 14),
(2, NULL, 'Group', 2, NULL, 15, 22),
(3, 1, 'User', 1, NULL, 2, 3),
(8, NULL, 'User', 6, NULL, 23, 24),
(9, NULL, 'Group', 3, NULL, 25, 26),
(16, NULL, 'User', 13, NULL, 27, 28),
(17, NULL, 'User', 14, NULL, 29, 30),
(18, NULL, 'User', 15, NULL, 31, 32),
(19, NULL, 'User', 16, NULL, 33, 34),
(20, 2, 'User', 17, NULL, 16, 17),
(21, NULL, 'User', 18, NULL, 35, 36),
(38, 2, 'User', 30, NULL, 18, 19),
(39, 1, 'User', 28, NULL, 4, 5),
(41, 1, 'User', 29, NULL, 6, 7),
(43, NULL, 'Group', 11, NULL, 37, 38),
(44, NULL, 'Group', 12, NULL, 39, 40),
(46, NULL, 'Group', 13, NULL, 41, 42),
(48, 1, 'User', 32, NULL, 8, 9),
(49, 1, 'User', 3, NULL, 12, 13),
(50, 1, 'User', 4, NULL, 10, 11),
(51, 2, 'User', 2, NULL, 20, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
`id` int(10) NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_read` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_update` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `_delete` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=249 ;

--
-- Volcado de datos para la tabla `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(23, 9, 145, '1', '1', '1', '1'),
(25, 1, 145, '1', '1', '1', '1'),
(26, 9, 260, '1', '1', '1', '1'),
(28, 9, 262, '1', '1', '1', '1'),
(30, 9, 261, '1', '1', '1', '1'),
(31, 9, 258, '1', '1', '1', '1'),
(32, 9, 259, '1', '1', '1', '1'),
(33, 9, 266, '1', '1', '1', '1'),
(34, 9, 268, '1', '1', '1', '1'),
(35, 9, 267, '1', '1', '1', '1'),
(36, 9, 269, '1', '1', '1', '1'),
(37, 9, 264, '1', '1', '1', '1'),
(38, 9, 270, '1', '1', '1', '1'),
(39, 9, 265, '1', '1', '1', '1'),
(40, 9, 272, '1', '1', '1', '1'),
(52, 9, 225, '1', '1', '1', '1'),
(53, 9, 224, '1', '1', '1', '1'),
(54, 9, 223, '1', '1', '1', '1'),
(55, 9, 220, '1', '1', '1', '1'),
(56, 9, 226, '1', '1', '1', '1'),
(57, 9, 222, '1', '1', '1', '1'),
(59, 9, 221, '1', '1', '1', '1'),
(60, 9, 218, '1', '1', '1', '1'),
(81, 9, 151, '1', '1', '1', '1'),
(82, 9, 149, '1', '1', '1', '1'),
(83, 9, 150, '1', '1', '1', '1'),
(84, 9, 147, '1', '1', '1', '1'),
(85, 9, 148, '1', '1', '1', '1'),
(246, 44, 145, '1', '1', '1', '1'),
(248, 2, 145, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `filedoc` varchar(255) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cake_sessions`
--

CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `expires` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cake_sessions`
--

INSERT INTO `cake_sessions` (`id`, `user_id`, `data`, `expires`) VALUES
('lvgo2nineu8561a12n0pog6165', 0, 'Config|a:4:{s:9:"userAgent";s:32:"9b699c572aac58a7c8fb9be2b09c991e";s:4:"time";i:1419634495;s:9:"countdown";i:10;s:8:"language";s:5:"es_MX";}Message|a:1:{s:4:"auth";a:3:{s:7:"message";s:47:"You are not authorized to access that location.";s:7:"element";s:7:"default";s:6:"params";a:0:{}}}Auth|a:2:{s:4:"Acos";a:4:{s:8:"Appmenus";a:1:{s:4:"view";b:1;}s:6:"Orders";a:3:{s:3:"pos";b:1;s:11:"admin_index";b:1;s:9:"admin_add";b:1;}s:5:"Users";a:1:{s:5:"index";b:1;}s:8:"Payments";a:1:{s:5:"index";b:1;}}s:4:"User";a:22:{s:2:"id";s:1:"3";s:8:"username";s:5:"hruiz";s:8:"group_id";s:1:"2";s:7:"created";s:19:"2014-07-13 19:41:00";s:8:"modified";s:19:"2014-12-03 20:23:32";s:7:"blocked";b:0;s:6:"logged";b:0;s:10:"chatstatus";s:6:"online";s:9:"time_zone";s:17:"America/Monterrey";s:9:"firstname";s:4:"hugo";s:8:"lastname";s:4:"ruiz";s:5:"email";s:18:"hruiz.it@gmail.com";s:6:"gender";s:0:"";s:13:"maritalstatus";s:0:"";s:16:"shortdescription";s:10:"Technician";s:15:"fulldescription";s:2:"=)";s:8:"coverimg";s:59:"/files/uploads/avatars/fbd3249f5b1f782c4c47a7c5e07d14cf.jpg";s:6:"avatar";s:59:"/files/uploads/avatars/790fdabcbdf94009e86c763d76262dba.jpg";s:6:"status";s:6:"active";s:14:"workstation_id";s:1:"2";s:5:"Group";a:4:{s:2:"id";s:1:"2";s:4:"name";s:11:"Technicians";s:7:"created";s:19:"2014-12-03 20:22:40";s:8:"modified";s:19:"2014-12-03 20:22:40";}s:11:"Workstation";a:15:{s:2:"id";N;s:7:"created";N;s:7:"updated";N;s:10:"created_by";N;s:10:"updated_by";N;s:9:"parent_id";N;s:3:"lft";N;s:4:"rght";N;s:11:"description";N;s:4:"role";N;s:5:"title";N;s:8:"workarea";N;s:8:"store_id";N;s:12:"pricelist_id";N;s:6:"status";N;}}}Navigation|a:4:{i:0;a:4:{s:3:"url";s:21:"admin/Appmenus/view/8";s:6:"action";s:10:"admin_view";s:10:"controller";s:8:"Appmenus";s:10:"navDisplay";N;}i:1;a:4:{s:3:"url";s:21:"admin/Appmenus/edit/8";s:6:"action";s:10:"admin_edit";s:10:"controller";s:8:"Appmenus";s:10:"navDisplay";N;}i:2;a:4:{s:3:"url";s:14:"admin/Appmenus";s:6:"action";s:11:"admin_index";s:10:"controller";s:8:"Appmenus";s:10:"navDisplay";N;}i:3;a:4:{s:3:"url";s:10:"Orders/pos";s:6:"action";s:3:"pos";s:10:"controller";s:6:"Orders";s:10:"navDisplay";N;}}firstLoadLogin|N;Operation|N;', 1419634495);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `productname` varchar(80) NOT NULL DEFAULT 'Prollux - Prosales',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `active_flg` tinyint(1) NOT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `address` text,
  `phone` varchar(16) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `copyright` varchar(80) NOT NULL DEFAULT '2014 &copy; Prollux ',
  `prefLanguage` varchar(40) NOT NULL DEFAULT 'es_MX'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `configs`
--

INSERT INTO `configs` (`id`, `name`, `productname`, `created`, `updated`, `created_by`, `updated_by`, `active_flg`, `timezone`, `logo`, `address`, `phone`, `website`, `copyright`, `prefLanguage`) VALUES
(1, 'ProSales', 'Intranet', '2014-08-30 16:54:40', '2014-10-04 23:48:28', 1, 1, 1, '', '', '', '', 'http://www.prollux.com', '2014 &copy; Prollux ', 'es_MX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `families`
--

CREATE TABLE IF NOT EXISTS `families` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `color` varchar(20) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `families`
--

INSERT INTO `families` (`id`, `created`, `updated`, `created_by`, `updated_by`, `description`, `title`, `picture`, `color`, `status`) VALUES
(1, '2014-10-25 20:45:14', '2014-10-25 20:45:14', 1, 1, 'Alimentos y Bebidas', 'Alimentos y bebidas', '', '', 'active'),
(2, '2014-10-26 03:30:21', '2014-10-26 03:30:21', 1, 1, 'Bebidas', 'Bebidas', '', 'green', 'active'),
(3, '2014-10-26 03:31:04', '2014-10-26 03:31:04', 1, 1, 'Alimentos', 'Alimentos', '', 'blue', 'active'),
(4, '2014-10-26 03:31:38', '2014-10-26 03:31:38', 1, 1, 'Carne', 'Carne', '', 'red', 'active'),
(5, '2014-10-26 03:32:14', '2014-10-26 03:32:14', 1, 1, 'Carnes Frías', 'Carnes Frías', '', 'orange', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Administrators', '2013-01-02 23:30:38', '2014-06-30 20:57:22'),
(2, 'Technicians', '2014-12-03 20:22:40', '2014-12-03 20:22:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `i18n`
--

CREATE TABLE IF NOT EXISTS `i18n` (
`id` int(10) NOT NULL,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lovs`
--

CREATE TABLE IF NOT EXISTS `lovs` (
`id` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  `ordershow` int(11) DEFAULT '0',
  `status` varchar(80) NOT NULL DEFAULT 'active',
  `type` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `name_` varchar(255) DEFAULT NULL,
  `name_es_MX` varchar(300) DEFAULT NULL,
  `name_en_US` varchar(300) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `lovs`
--

INSERT INTO `lovs` (`id`, `updated_by`, `created_by`, `updated`, `created`, `ordershow`, `status`, `type`, `parent_id`, `value`, `name_`, `name_es_MX`, `name_en_US`) VALUES
(1, 1, 1, '2014-12-15 22:22:18', '2014-12-11 18:53:56', 0, 'active', 'REPORT_FIELD_STATUS', 0, 'active', 'Active', 'Activo', 'Active'),
(2, 1, 1, '2014-12-11 23:13:12', '2014-12-11 22:50:27', 0, 'active', 'REPORT_FIELD_FINDTYPE', NULL, 'first', 'first', 'first', 'first'),
(3, 1, 1, '2014-12-11 23:13:20', '2014-12-11 22:50:46', 0, 'active', 'REPORT_FIELD_FINDTYPE', NULL, 'count', 'count', 'count', 'count'),
(4, 1, 1, '2014-12-11 23:13:27', '2014-12-11 22:51:10', 0, 'active', 'REPORT_FIELD_FINDTYPE', NULL, 'all', 'all', 'all', 'all'),
(5, 1, 1, '2014-12-11 23:13:38', '2014-12-11 22:51:32', 0, 'active', 'REPORT_FIELD_FINDTYPE', NULL, 'list', 'list', 'list', 'list'),
(6, 1, 1, '2014-12-11 23:13:45', '2014-12-11 22:51:58', 0, 'active', 'REPORT_FIELD_FINDTYPE', NULL, 'threaded', 'threaded', 'threaded', 'threaded'),
(7, 1, 1, '2014-12-11 23:13:51', '2014-12-11 22:52:22', 0, 'active', 'REPORT_FIELD_FINDTYPE', NULL, 'neighbors', 'neighbors', 'neighbors', 'neighbors'),
(8, 1, 1, '2014-12-11 23:14:32', '2014-12-11 23:00:29', 0, 'active', 'REPORT_FIELD_ CATEGORY', NULL, 'products', 'Products', 'Productos', 'Products'),
(9, 1, 1, '2014-12-11 23:25:52', '2014-12-11 23:25:52', 1, 'active', 'REPORT_FIELD_RKEY', NULL, '0', 'None', 'Ninguno', 'None'),
(10, 1, 1, '2014-12-11 23:29:25', '2014-12-11 23:29:25', 1, 'active', 'REPORT_FIELD_TYPE', NULL, '0', 'None', 'Ninguno', 'None'),
(11, 1, 1, '2014-12-13 05:24:42', '2014-12-13 05:20:29', 1, 'active', 'STORE_FIELD_STATUS', NULL, 'active', 'Active', 'Activo', 'Active'),
(12, 1, 1, '2014-12-13 05:25:14', '2014-12-13 05:25:14', 2, 'active', 'STORE_FIELD_STATUS', NULL, 'inactive', 'Inactive', 'Inactivo', 'Inactive'),
(13, 1, 1, '2014-12-14 21:39:44', '2014-12-14 21:39:44', 1, 'active', 'WORKSTATION_FIELD_ROLE', NULL, '0', 'None', 'Ninguno', 'None'),
(14, 1, 1, '2014-12-14 21:41:13', '2014-12-14 21:41:13', 2, 'active', 'WORKSTATION_FIELD_ROLE', NULL, 'manager', 'Manager', 'Gerente', 'Manager'),
(15, 1, 1, '2014-12-14 21:44:28', '2014-12-14 21:44:28', 1, 'active', 'WORKSTATION_FIELD_STATUS', NULL, 'active', 'Active', 'Activo', 'Active'),
(16, 1, 1, '2014-12-14 21:47:30', '2014-12-14 21:47:30', 1, 'active', 'WORKSTATION_FIELD_ROLE', NULL, 'director', 'Director', 'Director', 'Director'),
(17, 1, 1, '2014-12-14 21:48:18', '2014-12-14 21:48:18', 3, 'active', 'WORKSTATION_FIELD_ROLE', NULL, 'salesman', 'Sales Man', 'Vendedor', 'Sales Man'),
(18, 1, 1, '2014-12-14 22:25:55', '2014-12-14 22:25:55', 1, 'active', 'WORKSTATION_FIELD_AREA', NULL, '0', 'None', 'Ninguno', 'None'),
(19, 1, 1, '2014-12-14 22:26:33', '2014-12-14 22:26:33', 2, 'active', 'WORKSTATION_FIELD_AREA', NULL, 'sales', 'Sales', 'Ventas', 'Sales'),
(20, 1, 1, '2014-12-14 22:27:21', '2014-12-14 22:27:21', 3, 'active', 'WORKSTATION_FIELD_AREA', NULL, 'rh', 'Human Resources', 'Recursos Humanos', 'Human Resources'),
(21, 0, 0, '2014-12-18 07:53:30', '2014-12-18 07:53:30', 1, 'active', 'APPMENU_FIELD_MKEY', 0, '0', 'None', 'Ninguno', 'None'),
(22, 0, 0, '2014-12-19 04:12:40', '2014-12-18 07:55:40', 2, 'active', 'APPMENU_FIELD_MKEY', 0, 'h-menu-header', 'h-menu-header', 'h-menu-header', 'h-menu-header');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `objectType` varchar(255) DEFAULT NULL,
  `objectid` int(11) DEFAULT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  `type` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active',
  `folio` varchar(80) NOT NULL,
  `price` double DEFAULT NULL,
  `total_amt` double DEFAULT NULL,
  `subtotal_amt` double DEFAULT NULL,
  `tax` int(11) NOT NULL,
  `disc` double DEFAULT NULL,
  `disc_desc` varchar(200) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `description` text,
  `saleschannel` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=347 ;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `updated_by`, `created_by`, `updated`, `created`, `type`, `status`, `folio`, `price`, `total_amt`, `subtotal_amt`, `tax`, `disc`, `disc_desc`, `account_id`, `description`, `saleschannel`) VALUES
(1, 3, 3, '2014-11-09 06:14:24', '2014-11-09 06:14:24', 'POS', 'cancelled', '1-545F06401DC21', 0, 0, 0, 0, 0, '0', 0, '0', 'POS'),
(2, 3, 3, '2014-11-09 06:17:20', '2014-11-09 06:17:20', 'POS', 'cancelled', '1-545F06F085272', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(3, 3, 3, '2014-11-09 06:17:53', '2014-11-09 06:17:53', 'POS', 'cancelled', '1-545F07114FEFC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(4, 3, 3, '2014-11-09 06:18:42', '2014-11-09 06:18:42', 'POS', 'cancelled', '1-545F0742B49C1', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(5, 3, 3, '2014-11-09 06:19:54', '2014-11-09 06:19:54', 'POS', 'cancelled', '1-545F078AA4996', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(6, 3, 3, '2014-11-09 06:20:13', '2014-11-09 06:20:13', 'POS', 'cancelled', '1-545F079D683C5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(7, 3, 3, '2014-11-09 06:22:50', '2014-11-09 06:22:50', 'POS', 'cancelled', '1-545F083A80AE0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(8, 3, 3, '2014-11-09 06:23:59', '2014-11-09 06:23:59', 'POS', 'cancelled', '1-545F087F23E6D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(9, 3, 3, '2014-11-09 06:26:38', '2014-11-09 06:26:38', 'POS', 'cancelled', '1-545F091E0D001', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(10, 3, 3, '2014-11-09 06:26:58', '2014-11-09 06:26:58', 'POS', 'cancelled', '1-545F09328E923', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(11, 3, 3, '2014-11-09 06:30:01', '2014-11-09 06:30:01', 'POS', 'cancelled', '1-545F09E95B504', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(12, 3, 3, '2014-11-09 06:32:07', '2014-11-09 06:32:07', 'POS', 'cancelled', '1-545F0A6774E24', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(13, 3, 3, '2014-11-09 06:37:52', '2014-11-09 06:37:52', 'POS', 'cancelled', '1-545F0BC0012F1', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(14, 3, 3, '2014-11-09 06:37:56', '2014-11-09 06:37:56', 'POS', 'cancelled', '1-545F0BC440CA1', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(15, 3, 3, '2014-11-09 06:38:13', '2014-11-09 06:38:13', 'POS', 'cancelled', '1-545F0BD518BB5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(16, 3, 3, '2014-11-09 06:38:17', '2014-11-09 06:38:17', 'POS', 'cancelled', '1-545F0BD92A635', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(17, 3, 3, '2014-11-09 06:38:43', '2014-11-09 06:38:43', 'POS', 'cancelled', '1-545F0BF3626C9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(18, 3, 3, '2014-11-09 06:39:03', '2014-11-09 06:39:03', 'POS', 'cancelled', '1-545F0C07A8FDB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(19, 3, 3, '2014-11-09 06:39:56', '2014-11-09 06:39:56', 'POS', 'cancelled', '1-545F0C3C001C5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(20, 3, 3, '2014-11-09 06:40:45', '2014-11-09 06:40:45', 'POS', 'cancelled', '1-545F0C6D149E0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(21, 3, 3, '2014-11-09 06:41:16', '2014-11-09 06:41:16', 'POS', 'cancelled', '1-545F0C8CBCB0B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(22, 3, 3, '2014-11-09 06:41:31', '2014-11-09 06:41:31', 'POS', 'cancelled', '1-545F0C9B6AE21', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(23, 3, 3, '2014-11-09 06:53:40', '2014-11-09 06:53:40', 'POS', 'cancelled', '1-545F0F7403361', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(24, 3, 3, '2014-11-09 06:54:18', '2014-11-09 06:54:18', 'POS', 'cancelled', '1-545F0F9A057B0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(25, 3, 3, '2014-11-09 06:54:43', '2014-11-09 06:54:43', 'POS', 'cancelled', '1-545F0FB37D3A2', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(26, 3, 3, '2014-11-09 06:56:23', '2014-11-09 06:56:23', 'POS', 'cancelled', '1-545F1017F407B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(27, 3, 3, '2014-11-09 06:59:01', '2014-11-09 06:59:01', 'POS', 'cancelled', '1-545F10B572F7F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(28, 3, 3, '2014-11-09 23:38:01', '2014-11-09 23:38:01', 'POS', 'cancelled', '1-545FFAD926C42', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(29, 3, 3, '2014-11-09 23:45:20', '2014-11-09 23:45:20', 'POS', 'cancelled', '1-545FFC9070A19', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(30, 3, 3, '2014-11-09 23:52:42', '2014-11-09 23:52:42', 'POS', 'cancelled', '1-545FFE4A70166', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(31, 3, 3, '2014-11-09 23:53:43', '2014-11-09 23:53:43', 'POS', 'cancelled', '1-545FFE87EAF8C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(32, 3, 3, '2014-11-09 23:54:45', '2014-11-09 23:54:45', 'POS', 'cancelled', '1-545FFEC58DBB6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(33, 3, 3, '2014-11-09 23:55:57', '2014-11-09 23:55:57', 'POS', 'cancelled', '1-545FFF0D260CC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(34, 3, 3, '2014-11-09 23:56:06', '2014-11-09 23:56:06', 'POS', 'cancelled', '1-545FFF1685326', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(35, 3, 3, '2014-11-09 23:56:49', '2014-11-09 23:56:49', 'POS', 'cancelled', '1-545FFF415808B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(36, 3, 3, '2014-11-09 23:56:59', '2014-11-09 23:56:59', 'POS', 'cancelled', '1-545FFF4B1181D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(37, 3, 3, '2014-11-09 23:58:06', '2014-11-09 23:58:06', 'POS', 'cancelled', '1-545FFF8E281A4', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(38, 3, 3, '2014-11-09 23:58:12', '2014-11-09 23:58:12', 'POS', 'cancelled', '1-545FFF94B2DF8', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(39, 3, 3, '2014-11-09 23:59:50', '2014-11-09 23:59:50', 'POS', 'cancelled', '1-545FFFF6ECC60', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(40, 3, 3, '2014-11-10 00:03:05', '2014-11-10 00:03:05', 'POS', 'cancelled', '1-546000B9CFA6D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(41, 3, 3, '2014-11-10 00:07:40', '2014-11-10 00:07:40', 'POS', 'cancelled', '1-546001CC1C8D8', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(42, 3, 3, '2014-11-10 00:33:44', '2014-11-10 00:33:44', 'POS', 'cancelled', '1-546007E833EB0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(43, 3, 3, '2014-11-10 00:35:18', '2014-11-10 00:35:18', 'POS', 'cancelled', '1-5460084668BC3', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(44, 3, 3, '2014-11-10 00:37:05', '2014-11-10 00:37:05', 'POS', 'cancelled', '1-546008B1A6475', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(45, 3, 3, '2014-11-10 00:37:45', '2014-11-10 00:37:45', 'POS', 'cancelled', '1-546008D9E78D8', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(46, 3, 3, '2014-11-10 00:37:47', '2014-11-10 00:37:47', 'POS', 'cancelled', '1-546008DB5BA53', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(47, 3, 3, '2014-11-10 00:38:43', '2014-11-10 00:38:43', 'POS', 'cancelled', '1-54600913E2FD8', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(48, 3, 3, '2014-11-10 00:42:45', '2014-11-10 00:42:45', 'POS', 'cancelled', '1-54600A0578CEE', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(49, 3, 3, '2014-11-10 00:44:05', '2014-11-10 00:44:05', 'POS', 'cancelled', '1-54600A559084D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(50, 3, 3, '2014-11-10 00:45:29', '2014-11-10 00:45:29', 'POS', 'cancelled', '1-54600AA91C770', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(51, 3, 3, '2014-11-10 00:47:26', '2014-11-10 00:47:26', 'POS', 'cancelled', '1-54600B1E64D0E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(52, 3, 3, '2014-11-10 00:49:22', '2014-11-10 00:49:22', 'POS', 'cancelled', '1-54600B92855B3', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(53, 3, 3, '2014-11-10 00:51:01', '2014-11-10 00:51:01', 'POS', 'cancelled', '1-54600BF51D23F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(54, 3, 3, '2014-11-10 00:51:42', '2014-11-10 00:51:42', 'POS', 'cancelled', '1-54600C1E12D5F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(55, 3, 3, '2014-11-10 00:55:13', '2014-11-10 00:55:13', 'POS', 'cancelled', '1-54600CF19D995', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(56, 3, 3, '2014-11-10 00:55:37', '2014-11-10 00:55:37', 'POS', 'cancelled', '1-54600D0921CD0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(57, 3, 3, '2014-11-10 01:10:12', '2014-11-10 01:10:12', 'POS', 'cancelled', '1-54601074ED698', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(58, 3, 3, '2014-11-10 01:10:59', '2014-11-10 01:10:59', 'POS', 'cancelled', '1-546010A3ACDA1', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(59, 3, 3, '2014-11-15 06:31:46', '2014-11-15 06:31:46', 'POS', 'cancelled', '1-5466F352ADF13', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(60, 3, 3, '2014-11-15 06:33:11', '2014-11-15 06:33:11', 'POS', 'cancelled', '1-5466F3A70385C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(61, 3, 3, '2014-11-15 06:39:03', '2014-11-15 06:39:03', 'POS', 'cancelled', '1-5466F5078871A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(62, 3, 3, '2014-11-15 06:45:44', '2014-11-15 06:45:44', 'POS', 'cancelled', '1-5466F698EE394', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(63, 3, 3, '2014-11-15 06:46:24', '2014-11-15 06:46:24', 'POS', 'cancelled', '1-5466F6C019080', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(64, 3, 3, '2014-11-15 06:46:44', '2014-11-15 06:46:44', 'POS', 'cancelled', '1-5466F6D42FC6D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(65, 3, 3, '2014-11-15 06:48:30', '2014-11-15 06:48:30', 'POS', 'cancelled', '1-5466F73E4C95C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(66, 3, 3, '2014-11-15 06:49:09', '2014-11-15 06:49:09', 'POS', 'cancelled', '1-5466F7650E2E9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(67, 3, 3, '2014-11-15 06:52:15', '2014-11-15 06:52:15', 'POS', 'cancelled', '1-5466F81F2F046', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(68, 3, 3, '2014-11-15 07:04:15', '2014-11-15 07:04:15', 'POS', 'cancelled', '1-5466FAEFB0F4C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(69, 3, 3, '2014-11-15 07:07:06', '2014-11-15 07:07:06', 'POS', 'cancelled', '1-5466FB9AA63E5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(70, 3, 3, '2014-11-22 18:30:27', '2014-11-22 18:30:27', 'POS', 'cancelled', '1-5470D64362C1D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(71, 3, 3, '2014-11-22 18:41:27', '2014-11-22 18:41:27', 'POS', 'cancelled', '1-5470D8D70283D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(72, 3, 3, '2014-11-22 18:46:58', '2014-11-22 18:46:58', 'POS', 'cancelled', '1-5470DA22660D3', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(73, 3, 3, '2014-11-22 18:49:10', '2014-11-22 18:49:10', 'POS', 'cancelled', '1-5470DAA6ADC76', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(74, 3, 3, '2014-11-22 18:52:02', '2014-11-22 18:52:02', 'POS', 'cancelled', '1-5470DB521F620', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(75, 3, 3, '2014-11-22 18:55:15', '2014-11-22 18:55:15', 'POS', 'cancelled', '1-5470DC137C50E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(76, 3, 3, '2014-11-22 18:56:14', '2014-11-22 18:56:14', 'POS', 'cancelled', '1-5470DC4E3D185', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(77, 3, 3, '2014-11-22 18:57:24', '2014-11-22 18:57:24', 'POS', 'cancelled', '1-5470DC940D005', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(78, 3, 3, '2014-11-22 18:57:51', '2014-11-22 18:57:51', 'POS', 'cancelled', '1-5470DCAF9FECD', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(79, 3, 3, '2014-11-22 18:58:03', '2014-11-22 18:58:03', 'POS', 'cancelled', '1-5470DCBB8AF0F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(80, 3, 3, '2014-11-22 18:58:46', '2014-11-22 18:58:46', 'POS', 'cancelled', '1-5470DCE60863C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(81, 3, 3, '2014-11-22 19:07:20', '2014-11-22 19:07:20', 'POS', 'cancelled', '1-5470DEE827672', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(82, 3, 3, '2014-11-22 19:08:38', '2014-11-22 19:08:38', 'POS', 'cancelled', '1-5470DF360FF6E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(83, 3, 3, '2014-11-22 19:10:06', '2014-11-22 19:10:06', 'POS', 'cancelled', '1-5470DF8E4750F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(84, 3, 3, '2014-11-22 19:10:25', '2014-11-22 19:10:25', 'POS', 'cancelled', '1-5470DFA18A8D8', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(85, 3, 3, '2014-11-22 19:14:46', '2014-11-22 19:14:46', 'POS', 'cancelled', '1-5470E0A6348E9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(86, 3, 3, '2014-11-22 19:15:39', '2014-11-22 19:15:39', 'POS', 'cancelled', '1-5470E0DBE3862', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(87, 3, 3, '2014-11-22 19:18:25', '2014-11-22 19:18:25', 'POS', 'cancelled', '1-5470E181AB0DB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(88, 3, 3, '2014-11-22 19:53:41', '2014-11-22 19:53:41', 'POS', 'cancelled', '1-5470E9C58C72E', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(89, 3, 3, '2014-11-22 19:54:34', '2014-11-22 19:54:34', 'POS', 'cancelled', '1-5470E9FA3A972', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(90, 3, 3, '2014-11-22 19:55:52', '2014-11-22 19:55:52', 'POS', 'cancelled', '1-5470EA48126B1', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(91, 3, 3, '2014-11-22 19:56:06', '2014-11-22 19:56:06', 'POS', 'cancelled', '1-5470EA5653F1B', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(92, 3, 3, '2014-11-22 19:56:31', '2014-11-22 19:56:31', 'POS', 'cancelled', '1-5470EA6F1CC11', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(93, 3, 3, '2014-11-22 19:58:40', '2014-11-22 19:58:40', 'POS', 'cancelled', '1-5470EAF0C8595', 10, 10, 10, 0, 0, '-', 0, '-', 'POS'),
(94, 3, 3, '2014-11-22 20:05:30', '2014-11-22 20:05:30', 'POS', 'cancelled', '1-5470EC8A43120', 120, 120, 120, 0, 0, '-', 0, '-', 'POS'),
(95, 3, 3, '2014-11-22 20:30:05', '2014-11-22 20:30:05', 'POS', 'cancelled', '1-5470F24D17BE7', 10, 10, 10, 0, 0, '-', 0, '-', 'POS'),
(96, 3, 3, '2014-11-22 20:35:42', '2014-11-22 20:35:42', 'POS', 'cancelled', '1-5470F39ECD605', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(97, 3, 3, '2014-11-22 20:37:00', '2014-11-22 20:37:00', 'POS', 'cancelled', '1-5470F3EC56EF8', 10, 10, 10, 0, 0, '-', 0, '-', 'POS'),
(98, 3, 3, '2014-11-22 20:39:34', '2014-11-22 20:39:34', 'POS', 'cancelled', '1-5470F4861F530', 80, 80, 80, 0, 0, '-', 0, '-', 'POS'),
(99, 0, 0, '2014-11-22 20:39:44', '2014-11-22 20:39:44', '', 'active', '', 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(100, 3, 3, '2014-11-22 20:46:41', '2014-11-22 20:46:41', 'POS', 'cancelled', '1-5470F63170FD9', 60, 60, 60, 0, 0, '-', 0, '-', 'POS'),
(101, 0, 0, '2014-11-22 20:46:53', '2014-11-22 20:46:53', '', 'active', '', 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(102, 3, 3, '2014-11-22 20:48:37', '2014-11-22 20:48:37', 'POS', 'cancelled', '1-5470F6A56F920', 100, 100, 100, 0, 0, '-', 0, '-', 'POS'),
(103, 0, 0, '2014-11-22 20:48:50', '2014-11-22 20:48:50', '', 'active', '', 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(104, 0, 0, '2014-11-22 20:49:06', '2014-11-22 20:49:06', '', 'active', '', 0, 0, 0, 0, 0, NULL, 0, NULL, NULL),
(105, 3, 3, '2014-11-22 20:55:34', '2014-11-22 20:55:34', 'POS', 'cancelled', '1-5470F84669AD1', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(106, 3, 3, '2014-11-22 20:57:10', '2014-11-22 20:57:10', 'POS', 'cancelled', '1-5470F8A6471DF', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(107, 3, 3, '2014-11-22 20:57:31', '2014-11-22 20:57:31', 'POS', 'cancelled', '1-5470F8BB2C22F', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(108, 3, 3, '2014-11-22 21:01:28', '2014-11-22 21:01:28', 'POS', 'cancelled', '1-5470F9A880BAD', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(109, 3, 3, '2014-11-22 21:03:46', '2014-11-22 21:03:46', 'POS', 'cancelled', '1-5470FA327ADE4', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(110, 3, 3, '2014-11-22 21:04:34', '2014-11-22 21:04:34', 'POS', 'cancelled', '1-5470FA62A5424', 10, 10, 10, 0, 0, '-', 0, '-', 'POS'),
(111, 3, 3, '2014-11-22 21:10:25', '2014-11-22 21:10:25', 'POS', 'cancelled', '1-5470FBC197910', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(112, 3, 3, '2014-11-22 21:11:20', '2014-11-22 21:11:20', 'POS', 'cancelled', '1-5470FBF864CB2', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(113, 3, 3, '2014-11-22 21:11:43', '2014-11-22 21:11:43', 'POS', 'cancelled', '1-5470FC0F9941A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(114, 3, 3, '2014-11-22 21:12:09', '2014-11-22 21:12:09', 'POS', 'cancelled', '1-5470FC29ECFA6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(115, 3, 3, '2014-11-22 21:12:40', '2014-11-22 21:12:40', 'POS', 'cancelled', '1-5470FC489BB4F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(116, 3, 3, '2014-11-22 21:12:56', '2014-11-22 21:12:56', 'POS', 'cancelled', '1-5470FC5896E19', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(117, 3, 3, '2014-11-22 21:38:01', '2014-11-22 21:38:01', 'POS', 'cancelled', '1-5471023951D52', 30, 30, 30, 0, 0, '-', 0, '-', 'POS'),
(118, 3, 3, '2014-11-23 19:26:16', '2014-11-23 19:26:16', 'POS', 'cancelled', '1-547234D810339', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(119, 3, 3, '2014-11-23 19:31:25', '2014-11-23 19:31:25', 'POS', 'cancelled', '1-5472360D7E6E5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(120, 3, 3, '2014-11-23 19:33:35', '2014-11-23 19:33:35', 'POS', 'cancelled', '1-5472368F78163', 10, 10, 10, 0, 0, '-', 0, '-', 'POS'),
(121, 3, 3, '2014-11-23 20:11:38', '2014-11-23 20:11:38', 'POS', 'cancelled', '1-54723F7A6661E', 40, 40, 40, 0, 0, '-', 0, '-', 'POS'),
(122, 3, 3, '2014-11-23 20:13:27', '2014-11-23 20:13:27', 'POS', 'cancelled', '1-54723FE737E47', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(123, 3, 3, '2014-11-23 20:19:26', '2014-11-23 20:19:26', 'POS', 'cancelled', '1-5472414E8E5C7', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(124, 3, 3, '2014-11-23 20:21:00', '2014-11-23 20:21:00', 'POS', 'cancelled', '1-547241ACB9D18', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(125, 3, 3, '2014-11-23 20:22:01', '2014-11-23 20:22:01', 'POS', 'cancelled', '1-547241E91E3EB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(126, 3, 3, '2014-11-23 20:22:20', '2014-11-23 20:22:20', 'POS', 'cancelled', '1-547241FC98D07', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(127, 3, 3, '2014-11-23 20:22:48', '2014-11-23 20:22:48', 'POS', 'cancelled', '1-54724218DD5BB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(128, 3, 3, '2014-11-23 20:23:21', '2014-11-23 20:23:21', 'POS', 'cancelled', '1-547242390A6F4', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(129, 3, 3, '2014-11-23 20:24:48', '2014-11-23 20:24:48', 'POS', 'cancelled', '1-547242900C101', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(130, 3, 3, '2014-11-23 20:26:57', '2014-11-23 20:26:57', 'POS', 'cancelled', '1-547243111FE7E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(131, 3, 3, '2014-11-23 20:27:46', '2014-11-23 20:27:46', 'POS', 'cancelled', '1-547243420EBF9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(132, 3, 3, '2014-11-23 20:27:56', '2014-11-23 20:27:56', 'POS', 'cancelled', '1-5472434CE0F7C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(133, 3, 3, '2014-11-23 20:28:09', '2014-11-23 20:28:09', 'POS', 'cancelled', '1-547243595FE89', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(134, 3, 3, '2014-11-23 20:35:06', '2014-11-23 20:35:06', 'POS', 'cancelled', '1-547244FAB8948', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(135, 3, 3, '2014-11-23 20:55:32', '2014-11-23 20:55:32', 'POS', 'cancelled', '1-547249C4BD52E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(136, 3, 3, '2014-11-23 20:56:15', '2014-11-23 20:56:15', 'POS', 'cancelled', '1-547249EF5D0FF', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(137, 3, 3, '2014-11-23 21:00:49', '2014-11-23 21:00:49', 'POS', 'cancelled', '1-54724B01E2DE6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(138, 3, 3, '2014-11-23 21:01:24', '2014-11-23 21:01:24', 'POS', 'cancelled', '1-54724B243E7AC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(139, 3, 3, '2014-11-23 21:02:32', '2014-11-23 21:02:32', 'POS', 'cancelled', '1-54724B68526B7', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(140, 3, 3, '2014-11-23 21:04:06', '2014-11-23 21:04:06', 'POS', 'cancelled', '1-54724BC6304C0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(141, 3, 3, '2014-11-23 21:04:23', '2014-11-23 21:04:23', 'POS', 'cancelled', '1-54724BD7AC5AA', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(142, 3, 3, '2014-11-23 21:06:51', '2014-11-23 21:06:51', 'POS', 'cancelled', '1-54724C6B0E008', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(143, 3, 3, '2014-11-23 21:07:55', '2014-11-23 21:07:55', 'POS', 'cancelled', '1-54724CAB9CD7D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(144, 3, 3, '2014-11-23 21:09:28', '2014-11-23 21:09:28', 'POS', 'cancelled', '1-54724D08C1AC3', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(145, 3, 3, '2014-11-23 21:09:46', '2014-11-23 21:09:46', 'POS', 'cancelled', '1-54724D1A6614E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(146, 3, 3, '2014-11-23 21:10:15', '2014-11-23 21:10:15', 'POS', 'cancelled', '1-54724D37A2199', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(147, 3, 3, '2014-11-23 21:10:26', '2014-11-23 21:10:26', 'POS', 'cancelled', '1-54724D42AB5DF', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(148, 3, 3, '2014-11-23 21:11:19', '2014-11-23 21:11:19', 'POS', 'cancelled', '1-54724D77E1D1C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(149, 3, 3, '2014-11-23 21:12:00', '2014-11-23 21:12:00', 'POS', 'cancelled', '1-54724DA04789D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(150, 3, 3, '2014-11-23 21:14:16', '2014-11-23 21:14:16', 'POS', 'cancelled', '1-54724E28D2192', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(151, 3, 3, '2014-11-23 21:18:55', '2014-11-23 21:18:55', 'POS', 'cancelled', '1-54724F3FEC43B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(152, 3, 3, '2014-11-23 21:19:02', '2014-11-23 21:19:02', 'POS', 'cancelled', '1-54724F4669E52', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(153, 3, 3, '2014-11-23 21:33:08', '2014-11-23 21:33:08', 'POS', 'cancelled', '1-547252946D8D2', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(154, 3, 3, '2014-11-23 21:35:46', '2014-11-23 21:35:46', 'POS', 'cancelled', '1-5472533274410', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(155, 3, 3, '2014-11-26 20:44:54', '2014-11-26 20:44:54', 'POS', 'cancelled', '1-54763BC6E65DD', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(156, 3, 3, '2014-11-26 20:46:31', '2014-11-26 20:46:31', 'POS', 'cancelled', '1-54763C27136B4', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(157, 3, 3, '2014-11-26 20:49:10', '2014-11-26 20:49:10', 'POS', 'cancelled', '1-54763CC642B00', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(158, 3, 3, '2014-11-26 20:49:50', '2014-11-26 20:49:50', 'POS', 'cancelled', '1-54763CEEEC62C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(159, 3, 3, '2014-11-26 20:51:10', '2014-11-26 20:51:10', 'POS', 'cancelled', '1-54763D3E27739', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(160, 3, 3, '2014-11-26 20:51:25', '2014-11-26 20:51:25', 'POS', 'cancelled', '1-54763D4D718EA', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(161, 3, 3, '2014-11-26 20:52:23', '2014-11-26 20:52:23', 'POS', 'cancelled', '1-54763D878CEE5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(162, 3, 3, '2014-11-26 20:54:16', '2014-11-26 20:54:16', 'POS', 'cancelled', '1-54763DF8770A5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(163, 3, 3, '2014-11-26 22:13:55', '2014-11-26 22:13:55', 'POS', 'cancelled', '1-547650A37B199', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(164, 3, 3, '2014-11-26 22:15:01', '2014-11-26 22:15:01', 'POS', 'cancelled', '1-547650E5B9945', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(165, 3, 3, '2014-11-26 22:15:48', '2014-11-26 22:15:48', 'POS', 'cancelled', '1-54765114199C9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(166, 3, 3, '2014-11-26 22:15:50', '2014-11-26 22:15:50', 'POS', 'cancelled', '1-547651163BE97', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(167, 3, 3, '2014-11-26 22:16:27', '2014-11-26 22:16:27', 'POS', 'cancelled', '1-5476513BDC731', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(168, 3, 3, '2014-11-26 23:17:23', '2014-11-26 23:17:23', 'POS', 'cancelled', '1-54765F83C8394', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(169, 3, 3, '2014-11-26 23:18:12', '2014-11-26 23:18:12', 'POS', 'cancelled', '1-54765FB4F122A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(170, 3, 3, '2014-11-29 18:03:20', '2014-11-29 18:03:20', 'POS', 'cancelled', '1-547A0A686367E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(171, 3, 3, '2014-11-29 18:03:45', '2014-11-29 18:03:45', 'POS', 'cancelled', '1-547A0A81B9B27', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(172, 3, 3, '2014-11-29 18:03:52', '2014-11-29 18:03:52', 'POS', 'cancelled', '1-547A0A8863410', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(173, 3, 3, '2014-11-29 18:04:19', '2014-11-29 18:04:19', 'POS', 'cancelled', '1-547A0AA32DF38', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(174, 3, 3, '2014-11-29 18:15:59', '2014-11-29 18:15:59', 'POS', 'cancelled', '1-547A0D5F9423C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(175, 3, 3, '2014-11-29 18:18:42', '2014-11-29 18:18:42', 'POS', 'cancelled', '1-547A0E0241897', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(176, 3, 3, '2014-11-29 18:19:15', '2014-11-29 18:19:15', 'POS', 'cancelled', '1-547A0E2309F55', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(177, 3, 3, '2014-11-29 18:21:27', '2014-11-29 18:21:27', 'POS', 'cancelled', '1-547A0EA791709', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(178, 3, 3, '2014-11-29 18:21:48', '2014-11-29 18:21:48', 'POS', 'cancelled', '1-547A0EBC777AB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(179, 3, 3, '2014-11-29 18:23:02', '2014-11-29 18:23:02', 'POS', 'cancelled', '1-547A0F066FFA2', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(180, 3, 3, '2014-11-29 18:31:08', '2014-11-29 18:31:08', 'POS', 'cancelled', '1-547A10EC61ADC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(181, 3, 3, '2014-11-29 18:34:52', '2014-11-29 18:34:52', 'POS', 'cancelled', '1-547A11CC09C13', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(182, 3, 3, '2014-11-29 18:44:33', '2014-11-29 18:44:33', 'POS', 'cancelled', '1-547A1411092E6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(183, 3, 3, '2014-11-29 18:45:24', '2014-11-29 18:45:24', 'POS', 'cancelled', '1-547A1444BEA24', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(184, 3, 3, '2014-11-29 18:47:13', '2014-11-29 18:47:13', 'POS', 'cancelled', '1-547A14B1D03F5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(185, 3, 3, '2014-11-29 19:00:27', '2014-11-29 19:00:27', 'POS', 'cancelled', '1-547A17CB90357', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(186, 3, 3, '2014-11-29 19:00:42', '2014-11-29 19:00:42', 'POS', 'cancelled', '1-547A17DACAFC2', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(187, 3, 3, '2014-11-29 19:04:33', '2014-11-29 19:04:33', 'POS', 'cancelled', '1-547A18C1ED0FC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(188, 3, 3, '2014-11-29 19:05:32', '2014-11-29 19:05:32', 'POS', 'cancelled', '1-547A18FC28516', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(189, 3, 3, '2014-11-29 19:08:35', '2014-11-29 19:08:35', 'POS', 'cancelled', '1-547A19B3EF25E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(190, 3, 3, '2014-12-03 19:28:38', '2014-12-03 19:28:38', 'POS', 'cancelled', '1-547F6466AF41C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(191, 3, 3, '2014-12-03 19:28:50', '2014-12-03 19:28:50', 'POS', 'cancelled', '1-547F6472544F6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(192, 3, 3, '2014-12-03 19:43:35', '2014-12-03 19:43:35', 'POS', 'cancelled', '1-547F67E7BCA06', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(193, 3, 3, '2014-12-03 19:44:09', '2014-12-03 19:44:09', 'POS', 'cancelled', '1-547F68097FB3F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(194, 3, 3, '2014-12-03 19:55:45', '2014-12-03 19:55:45', 'POS', 'cancelled', '1-547F6AC13F284', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(195, 3, 3, '2014-12-03 19:57:49', '2014-12-03 19:57:49', 'POS', 'cancelled', '1-547F6B3D23E90', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(196, 3, 3, '2014-12-03 19:58:19', '2014-12-03 19:58:19', 'POS', 'cancelled', '1-547F6B5BE6448', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(197, 3, 3, '2014-12-09 18:23:31', '2014-12-09 18:23:31', 'POS', 'cancelled', '1-54873E23694FC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(198, 3, 3, '2014-12-09 18:23:57', '2014-12-09 18:23:57', 'POS', 'cancelled', '1-54873E3D47A8A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(199, 3, 3, '2014-12-09 18:26:16', '2014-12-09 18:26:16', 'POS', 'cancelled', '1-54873EC82AE62', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(200, 3, 3, '2014-12-09 18:30:06', '2014-12-09 18:30:06', 'POS', 'cancelled', '1-54873FAE786C3', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(201, 3, 3, '2014-12-09 18:30:10', '2014-12-09 18:30:10', 'POS', 'cancelled', '1-54873FB26202B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(202, 3, 3, '2014-12-09 18:30:16', '2014-12-09 18:30:16', 'POS', 'cancelled', '1-54873FB83518B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(203, 3, 3, '2014-12-09 18:38:41', '2014-12-09 18:38:41', 'POS', 'cancelled', '1-548741B14CBF9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(204, 3, 3, '2014-12-09 18:38:55', '2014-12-09 18:38:55', 'POS', 'cancelled', '1-548741BFEBC38', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(205, 3, 3, '2014-12-09 18:39:16', '2014-12-09 18:39:16', 'POS', 'cancelled', '1-548741D49B010', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(206, 3, 3, '2014-12-09 18:39:36', '2014-12-09 18:39:36', 'POS', 'cancelled', '1-548741E816C05', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(207, 3, 3, '2014-12-09 18:41:00', '2014-12-09 18:41:00', 'POS', 'cancelled', '1-5487423C0EDD8', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(208, 3, 3, '2014-12-09 18:42:56', '2014-12-09 18:42:56', 'POS', 'cancelled', '1-548742B048BFE', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(209, 3, 3, '2014-12-09 18:43:12', '2014-12-09 18:43:12', 'POS', 'cancelled', '1-548742C040124', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(210, 3, 3, '2014-12-09 18:43:37', '2014-12-09 18:43:37', 'POS', 'cancelled', '1-548742D9238AC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(211, 3, 3, '2014-12-09 18:44:36', '2014-12-09 18:44:36', 'POS', 'cancelled', '1-54874314B016D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(212, 3, 3, '2014-12-09 18:44:55', '2014-12-09 18:44:55', 'POS', 'cancelled', '1-5487432778E24', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(213, 3, 3, '2014-12-09 18:46:46', '2014-12-09 18:46:46', 'POS', 'cancelled', '1-548743968C15A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(214, 1, 1, '2014-12-09 18:56:25', '2014-12-09 18:56:25', 'POS', 'cancelled', '1-548745D9D1905', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(215, 1, 1, '2014-12-09 18:56:34', '2014-12-09 18:56:34', 'POS', 'cancelled', '1-548745E2DF349', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(216, 1, 1, '2014-12-09 18:56:37', '2014-12-09 18:56:37', 'POS', 'cancelled', '1-548745E5A770D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(217, 1, 1, '2014-12-09 18:56:39', '2014-12-09 18:56:39', 'POS', 'cancelled', '1-548745E7E5F5C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(218, 3, 3, '2014-12-09 18:57:00', '2014-12-09 18:57:00', 'POS', 'cancelled', '1-548745FC55C90', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(219, 3, 3, '2014-12-09 18:58:58', '2014-12-09 18:58:58', 'POS', 'cancelled', '1-548746728E676', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(220, 3, 3, '2014-12-09 21:17:48', '2014-12-09 21:17:48', 'POS', 'cancelled', '1-548766FC47C75', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(221, 3, 3, '2014-12-09 21:18:37', '2014-12-09 21:18:37', 'POS', 'cancelled', '1-5487672DDB229', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(222, 3, 3, '2014-12-09 21:18:49', '2014-12-09 21:18:49', 'POS', 'cancelled', '1-54876739A5854', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(223, 3, 3, '2014-12-09 21:19:07', '2014-12-09 21:19:07', 'POS', 'cancelled', '1-5487674BE0371', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(224, 3, 3, '2014-12-09 21:20:32', '2014-12-09 21:20:32', 'POS', 'cancelled', '1-548767A063EA6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(225, 3, 3, '2014-12-09 21:22:38', '2014-12-09 21:22:38', 'POS', 'cancelled', '1-5487681E9711F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(226, 3, 3, '2014-12-09 21:24:22', '2014-12-09 21:24:22', 'POS', 'cancelled', '1-548768868D386', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(227, 3, 3, '2014-12-09 22:00:30', '2014-12-09 22:00:30', 'POS', 'cancelled', '1-548770FE89334', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(228, 3, 3, '2014-12-09 22:04:16', '2014-12-09 22:04:16', 'POS', 'cancelled', '1-548771E028CB0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(229, 3, 3, '2014-12-09 22:04:42', '2014-12-09 22:04:42', 'POS', 'cancelled', '1-548771FA05A05', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(230, 3, 3, '2014-12-09 22:07:23', '2014-12-09 22:07:23', 'POS', 'cancelled', '1-5487729B5443B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(231, 3, 3, '2014-12-09 22:13:04', '2014-12-09 22:13:04', 'POS', 'cancelled', '1-548773F073C13', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(232, 3, 3, '2014-12-09 22:15:08', '2014-12-09 22:15:08', 'POS', 'cancelled', '1-5487746C60DF9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(233, 3, 3, '2014-12-09 22:17:16', '2014-12-09 22:17:16', 'POS', 'cancelled', '1-548774EC2E0F9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(234, 3, 3, '2014-12-09 22:19:02', '2014-12-09 22:19:02', 'POS', 'cancelled', '1-5487755644253', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(235, 3, 3, '2014-12-09 22:33:07', '2014-12-09 22:33:07', 'POS', 'cancelled', '1-548778A346AB9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(236, 3, 3, '2014-12-09 22:33:20', '2014-12-09 22:33:20', 'POS', 'cancelled', '1-548778B06B8E4', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(237, 3, 3, '2014-12-09 22:33:59', '2014-12-09 22:33:59', 'POS', 'cancelled', '1-548778D78D952', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(238, 3, 3, '2014-12-09 22:37:00', '2014-12-09 22:37:00', 'POS', 'cancelled', '1-5487798C11121', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(239, 3, 3, '2014-12-09 22:37:30', '2014-12-09 22:37:30', 'POS', 'cancelled', '1-548779AAA52EC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(240, 3, 3, '2014-12-10 02:15:26', '2014-12-10 02:15:26', 'POS', 'cancelled', '1-5487ACBE84FF0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(241, 3, 3, '2014-12-10 02:15:58', '2014-12-10 02:15:58', 'POS', 'cancelled', '1-5487ACDE661CA', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(242, 3, 3, '2014-12-10 02:16:21', '2014-12-10 02:16:21', 'POS', 'cancelled', '1-5487ACF56366C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(243, 3, 3, '2014-12-10 02:17:06', '2014-12-10 02:17:06', 'POS', 'cancelled', '1-5487AD225CCF0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(244, 3, 3, '2014-12-10 02:17:12', '2014-12-10 02:17:12', 'POS', 'cancelled', '1-5487AD2813107', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(245, 3, 3, '2014-12-10 02:18:30', '2014-12-10 02:18:30', 'POS', 'cancelled', '1-5487AD769C080', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(246, 3, 3, '2014-12-10 02:19:52', '2014-12-10 02:19:52', 'POS', 'cancelled', '1-5487ADC826664', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(247, 3, 3, '2014-12-10 02:19:54', '2014-12-10 02:19:54', 'POS', 'cancelled', '1-5487ADCABC16A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(248, 3, 3, '2014-12-10 02:20:13', '2014-12-10 02:20:13', 'POS', 'cancelled', '1-5487ADDD6F528', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(249, 3, 3, '2014-12-10 02:21:19', '2014-12-10 02:21:19', 'POS', 'cancelled', '1-5487AE1F4243A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(250, 3, 3, '2014-12-10 02:21:37', '2014-12-10 02:21:37', 'POS', 'cancelled', '1-5487AE3159049', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(251, 3, 3, '2014-12-10 02:23:05', '2014-12-10 02:23:05', 'POS', 'cancelled', '1-5487AE896B33D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(252, 3, 3, '2014-12-10 02:23:24', '2014-12-10 02:23:24', 'POS', 'cancelled', '1-5487AE9C2ED35', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(253, 3, 3, '2014-12-10 02:24:48', '2014-12-10 02:24:48', 'POS', 'cancelled', '1-5487AEF0851E7', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(254, 3, 3, '2014-12-10 03:35:28', '2014-12-10 03:35:28', 'POS', 'cancelled', '1-5487BF809AD80', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(255, 3, 3, '2014-12-10 03:35:51', '2014-12-10 03:35:51', 'POS', 'cancelled', '1-5487BF976DB70', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(256, 3, 3, '2014-12-12 04:00:27', '2014-12-12 04:00:27', 'POS', 'cancelled', '1-548A685B7F031', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(257, 3, 3, '2014-12-12 04:02:20', '2014-12-12 04:02:20', 'POS', 'cancelled', '1-548A68CC4D576', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(258, 3, 3, '2014-12-12 19:23:20', '2014-12-12 19:23:20', 'POS', 'cancelled', '1-548B40A8D3CBA', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(259, 3, 3, '2014-12-12 19:25:46', '2014-12-12 19:25:46', 'POS', 'cancelled', '1-548B413AC20BF', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(260, 3, 3, '2014-12-12 19:26:16', '2014-12-12 19:26:16', 'POS', 'cancelled', '1-548B415818D87', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(261, 3, 3, '2014-12-12 19:26:42', '2014-12-12 19:26:42', 'POS', 'cancelled', '1-548B41722C6BB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(262, 3, 3, '2014-12-12 19:26:59', '2014-12-12 19:26:59', 'POS', 'cancelled', '1-548B4183B1327', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(263, 3, 3, '2014-12-12 19:27:02', '2014-12-12 19:27:02', 'POS', 'cancelled', '1-548B4186BCAA3', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(264, 3, 3, '2014-12-12 19:28:01', '2014-12-12 19:28:01', 'POS', 'cancelled', '1-548B41C1436F9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(265, 3, 3, '2014-12-12 19:28:03', '2014-12-12 19:28:03', 'POS', 'cancelled', '1-548B41C32C1C0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(266, 3, 3, '2014-12-12 19:28:15', '2014-12-12 19:28:15', 'POS', 'cancelled', '1-548B41CFCC151', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(267, 3, 3, '2014-12-12 19:28:31', '2014-12-12 19:28:31', 'POS', 'cancelled', '1-548B41DF3372D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(268, 3, 3, '2014-12-12 19:28:56', '2014-12-12 19:28:56', 'POS', 'cancelled', '1-548B41F8F3048', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(269, 3, 3, '2014-12-12 19:29:11', '2014-12-12 19:29:11', 'POS', 'cancelled', '1-548B4207856CC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(270, 3, 3, '2014-12-12 19:31:38', '2014-12-12 19:31:38', 'POS', 'cancelled', '1-548B429A96A5E', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(271, 3, 3, '2014-12-12 19:32:22', '2014-12-12 19:32:22', 'POS', 'cancelled', '1-548B42C677CA0', 30, 30, 30, 0, 0, '-', 0, '-', 'POS'),
(272, 3, 3, '2014-12-12 20:48:45', '2014-12-12 20:48:45', 'POS', 'cancelled', '1-548B54ADBA7EB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(273, 3, 3, '2014-12-12 20:49:35', '2014-12-12 20:49:35', 'POS', 'cancelled', '1-548B54DF79F0B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(274, 3, 3, '2014-12-12 20:49:48', '2014-12-12 20:49:48', 'POS', 'cancelled', '1-548B54ECE9746', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(275, 3, 3, '2014-12-12 20:56:56', '2014-12-12 20:56:56', 'POS', 'cancelled', '1-548B569836455', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(276, 3, 3, '2014-12-12 20:56:58', '2014-12-12 20:56:58', 'POS', 'cancelled', '1-548B569A2CA6A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(277, 3, 3, '2014-12-12 20:57:01', '2014-12-12 20:57:01', 'POS', 'cancelled', '1-548B569D8CEAA', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(278, 3, 3, '2014-12-12 20:57:13', '2014-12-12 20:57:13', 'POS', 'cancelled', '1-548B56A9033B9', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(279, 3, 3, '2014-12-12 21:15:00', '2014-12-12 21:15:00', 'POS', 'cancelled', '1-548B5AD45A288', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(280, 3, 3, '2014-12-12 21:16:49', '2014-12-12 21:16:49', 'POS', 'cancelled', '1-548B5B418674A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(281, 3, 3, '2014-12-12 21:17:38', '2014-12-12 21:17:38', 'POS', 'cancelled', '1-548B5B7249DA5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(282, 3, 3, '2014-12-12 21:22:46', '2014-12-12 21:22:46', 'POS', 'cancelled', '1-548B5CA6CCCBC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(283, 3, 3, '2014-12-12 21:23:25', '2014-12-12 21:23:25', 'POS', 'cancelled', '1-548B5CCDB7411', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(284, 3, 3, '2014-12-12 21:24:14', '2014-12-12 21:24:14', 'POS', 'cancelled', '1-548B5CFE5E476', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(285, 3, 3, '2014-12-12 21:25:26', '2014-12-12 21:25:26', 'POS', 'cancelled', '1-548B5D46E51FB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(286, 3, 3, '2014-12-12 21:32:41', '2014-12-12 21:32:41', 'POS', 'cancelled', '1-548B5EF931CC7', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(287, 3, 3, '2014-12-12 21:33:21', '2014-12-12 21:33:21', 'POS', 'cancelled', '1-548B5F211F283', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(288, 3, 3, '2014-12-12 21:33:45', '2014-12-12 21:33:45', 'POS', 'cancelled', '1-548B5F3912AFD', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(289, 3, 3, '2014-12-12 21:35:51', '2014-12-12 21:35:51', 'POS', 'cancelled', '1-548B5FB78AD29', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(290, 3, 3, '2014-12-12 21:36:15', '2014-12-12 21:36:15', 'POS', 'cancelled', '1-548B5FCF0E928', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(291, 3, 3, '2014-12-12 21:36:36', '2014-12-12 21:36:36', 'POS', 'cancelled', '1-548B5FE471FAA', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(292, 3, 3, '2014-12-12 21:37:37', '2014-12-12 21:37:37', 'POS', 'cancelled', '1-548B60214E48D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(293, 3, 3, '2014-12-12 21:37:46', '2014-12-12 21:37:46', 'POS', 'cancelled', '1-548B602A6D9C5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(294, 3, 3, '2014-12-12 21:37:54', '2014-12-12 21:37:54', 'POS', 'cancelled', '1-548B6032BFD57', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(295, 3, 3, '2014-12-12 21:38:53', '2014-12-12 21:38:53', 'POS', 'cancelled', '1-548B606D71FC7', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(296, 3, 3, '2014-12-12 21:39:09', '2014-12-12 21:39:09', 'POS', 'cancelled', '1-548B607D2D6E5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(297, 3, 3, '2014-12-12 21:39:13', '2014-12-12 21:39:13', 'POS', 'cancelled', '1-548B60815178A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(298, 3, 3, '2014-12-12 21:39:23', '2014-12-12 21:39:23', 'POS', 'cancelled', '1-548B608B940BC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(299, 3, 3, '2014-12-12 21:39:29', '2014-12-12 21:39:29', 'POS', 'cancelled', '1-548B6091DB52A', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(300, 3, 3, '2014-12-12 21:39:32', '2014-12-12 21:39:32', 'POS', 'cancelled', '1-548B6094B88BB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(301, 3, 3, '2014-12-12 21:40:46', '2014-12-12 21:40:46', 'POS', 'cancelled', '1-548B60DE24F0D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(302, 3, 3, '2014-12-12 21:41:00', '2014-12-12 21:41:00', 'POS', 'cancelled', '1-548B60ECD53A4', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(303, 3, 3, '2014-12-12 21:41:05', '2014-12-12 21:41:05', 'POS', 'cancelled', '1-548B60F13C54B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(304, 3, 3, '2014-12-12 21:41:07', '2014-12-12 21:41:07', 'POS', 'cancelled', '1-548B60F3ECB78', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(305, 3, 3, '2014-12-12 21:41:51', '2014-12-12 21:41:51', 'POS', 'cancelled', '1-548B611F24AA5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(306, 3, 3, '2014-12-12 21:41:55', '2014-12-12 21:41:55', 'POS', 'cancelled', '1-548B6123E51CC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(307, 3, 3, '2014-12-12 21:42:28', '2014-12-12 21:42:28', 'POS', 'cancelled', '1-548B61441698C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(308, 3, 3, '2014-12-12 22:29:39', '2014-12-12 22:29:39', 'POS', 'cancelled', '1-548B6C532CB03', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(309, 3, 3, '2014-12-12 22:33:01', '2014-12-12 22:33:01', 'POS', 'cancelled', '1-548B6D1D9CF97', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(310, 3, 3, '2014-12-12 22:39:42', '2014-12-12 22:39:42', 'POS', 'cancelled', '1-548B6EAEEFA4F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(311, 3, 3, '2014-12-12 22:42:24', '2014-12-12 22:42:24', 'POS', 'cancelled', '1-548B6F501A894', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(312, 3, 3, '2014-12-12 22:42:42', '2014-12-12 22:42:42', 'POS', 'cancelled', '1-548B6F62A6CC6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(313, 3, 3, '2014-12-12 22:42:45', '2014-12-12 22:42:45', 'POS', 'cancelled', '1-548B6F65D289D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(314, 3, 3, '2014-12-12 22:51:24', '2014-12-12 22:51:24', 'POS', 'cancelled', '1-548B716C9C491', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(315, 3, 3, '2014-12-12 22:51:32', '2014-12-12 22:51:32', 'POS', 'cancelled', '1-548B71743B12F', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(316, 3, 3, '2014-12-12 22:52:13', '2014-12-12 22:52:13', 'POS', 'cancelled', '1-548B719D2212B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(317, 3, 3, '2014-12-12 22:52:15', '2014-12-12 22:52:15', 'POS', 'cancelled', '1-548B719F8FFA6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(318, 3, 3, '2014-12-12 22:52:18', '2014-12-12 22:52:18', 'POS', 'cancelled', '1-548B71A291EA7', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(319, 3, 3, '2014-12-12 22:53:28', '2014-12-12 22:53:28', 'POS', 'cancelled', '1-548B71E8A8335', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(320, 3, 3, '2014-12-12 22:53:32', '2014-12-12 22:53:32', 'POS', 'cancelled', '1-548B71EC2E693', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(321, 3, 3, '2014-12-12 22:54:39', '2014-12-12 22:54:39', 'POS', 'cancelled', '1-548B722F31979', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(322, 3, 3, '2014-12-12 22:54:41', '2014-12-12 22:54:41', 'POS', 'cancelled', '1-548B7231C0A00', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(323, 3, 3, '2014-12-12 22:55:30', '2014-12-12 22:55:30', 'POS', 'cancelled', '1-548B7262A1EFC', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(324, 3, 3, '2014-12-12 22:55:55', '2014-12-12 22:55:55', 'POS', 'cancelled', '1-548B727BBFD77', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(325, 3, 3, '2014-12-12 22:56:19', '2014-12-12 22:56:19', 'POS', 'cancelled', '1-548B729381B25', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(326, 3, 3, '2014-12-12 22:56:45', '2014-12-12 22:56:45', 'POS', 'cancelled', '1-548B72ADDC3DD', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(327, 3, 3, '2014-12-12 23:05:49', '2014-12-12 23:05:49', 'POS', 'cancelled', '1-548B74CD8D3E5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(328, 3, 3, '2014-12-12 23:11:08', '2014-12-12 23:11:08', 'POS', 'cancelled', '1-548B760C7AF8B', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(329, 3, 3, '2014-12-12 23:11:51', '2014-12-12 23:11:51', 'POS', 'cancelled', '1-548B7637AAAA6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(330, 3, 3, '2014-12-12 23:13:52', '2014-12-12 23:13:52', 'POS', 'cancelled', '1-548B76B08BEFD', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(331, 3, 3, '2014-12-12 23:14:15', '2014-12-12 23:14:15', 'POS', 'cancelled', '1-548B76C7DC959', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(332, 3, 3, '2014-12-12 23:14:34', '2014-12-12 23:14:34', 'POS', 'cancelled', '1-548B76DA120B5', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(333, 3, 3, '2014-12-12 23:14:52', '2014-12-12 23:14:52', 'POS', 'cancelled', '1-548B76EC392D8', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(334, 3, 3, '2014-12-12 23:15:52', '2014-12-12 23:15:52', 'POS', 'cancelled', '1-548B77285D0AF', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(335, 3, 3, '2014-12-12 23:16:08', '2014-12-12 23:16:08', 'POS', 'cancelled', '1-548B773861B8D', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(336, 3, 3, '2014-12-12 23:18:23', '2014-12-12 23:18:23', 'POS', 'cancelled', '1-548B77BF710BB', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(337, 3, 3, '2014-12-12 23:21:17', '2014-12-12 23:21:17', 'POS', 'cancelled', '1-548B786D9BAB0', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(338, 3, 3, '2014-12-13 03:11:51', '2014-12-13 03:11:51', 'POS', 'cancelled', '1-548BAE77DB0C6', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(339, 3, 3, '2014-12-13 03:21:01', '2014-12-13 03:21:01', 'POS', 'cancelled', '1-548BB09D7A59C', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(340, 3, 3, '2014-12-13 03:22:32', '2014-12-13 03:22:32', 'POS', 'cancelled', '1-548BB0F811D65', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(341, 3, 3, '2014-12-13 03:22:37', '2014-12-13 03:22:37', 'POS', 'cancelled', '1-548BB0FD27875', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(342, 3, 3, '2014-12-18 05:29:04', '2014-12-18 05:29:04', 'POS', 'cancelled', '1-5492662095A60', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(343, 3, 3, '2014-12-24 03:21:29', '2014-12-24 03:21:29', 'POS', 'cancelled', '1-549A31399BDC8', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(344, 3, 3, '2014-12-26 21:49:39', '2014-12-26 21:49:39', 'POS', 'cancelled', '1-549DD7F3E67CF', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(345, 3, 3, '2014-12-26 21:52:18', '2014-12-26 21:52:18', 'POS', 'cancelled', '1-549DD89289379', 0, 0, 0, 0, 0, '-', 0, '-', 'POS'),
(346, 3, 3, '2014-12-26 21:54:55', '2014-12-26 21:54:55', 'POS', 'cancelled', '1-549DD92F47FD7', 0, 0, 0, 0, 0, '-', 0, '-', 'POS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_payments`
--

CREATE TABLE IF NOT EXISTS `order_payments` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'active',
  `docnum` varchar(200) NOT NULL,
  `docseq` varchar(50) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `total_amt` double DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `bank_ref` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_products`
--

CREATE TABLE IF NOT EXISTS `order_products` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active',
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_disc` int(11) NOT NULL,
  `product_price` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=87 ;

--
-- Volcado de datos para la tabla `order_products`
--

INSERT INTO `order_products` (`id`, `created`, `updated`, `created_by`, `updated_by`, `status`, `order_id`, `product_id`, `product_qty`, `product_disc`, `product_price`) VALUES
(1, '2014-11-10 00:42:48', '2014-11-10 00:42:48', 0, 0, 'active', 0, 0, 1, 0, 0),
(2, '2014-11-10 00:44:10', '2014-11-10 00:44:10', 0, 0, 'active', 0, 0, 1, 0, 0),
(3, '2014-11-10 00:45:34', '2014-11-10 00:45:34', 0, 0, 'active', 0, 0, 1, 0, 0),
(4, '2014-11-10 00:47:29', '2014-11-10 00:47:29', 3, 3, 'active', 51, 4, 1, 0, 10),
(5, '2014-11-10 00:49:25', '2014-11-10 00:49:25', 3, 3, 'active', 52, 4, 1, 0, 10),
(6, '2014-11-10 00:51:03', '2014-11-10 00:51:03', 3, 3, 'active', 53, 4, 1, 0, 10),
(7, '2014-11-10 00:51:45', '2014-11-10 00:51:45', 3, 3, 'active', 54, 4, 2, 0, 10),
(8, '2014-11-10 00:51:49', '2014-11-10 00:51:49', 3, 3, 'active', 54, 2, 4, 0, 20),
(9, '2014-11-10 00:51:54', '2014-11-10 00:51:54', 3, 3, 'active', 54, 1, 8, 0, 40),
(10, '2014-11-10 00:52:14', '2014-11-10 00:52:14', 3, 3, 'active', 54, 3, 2, 0, 10),
(11, '2014-11-10 00:55:17', '2014-11-10 00:55:17', 3, 3, 'active', 55, 1, 1, 0, 40),
(12, '2014-11-10 00:55:40', '2014-11-10 00:55:40', 3, 3, 'active', 56, 1, 2, 0, 40),
(13, '2014-11-10 00:55:43', '2014-11-10 00:55:43', 3, 3, 'active', 56, 3, 2, 0, 10),
(14, '2014-11-10 00:55:54', '2014-11-10 00:55:54', 3, 3, 'active', 56, 6, 1, 0, 10),
(15, '2014-11-10 01:06:53', '2014-11-10 01:06:53', 3, 3, 'active', 56, 2, 1, 0, 20),
(16, '2014-11-10 01:10:15', '2014-11-10 01:10:15', 3, 3, 'active', 57, 4, 2, 0, 10),
(17, '2014-11-10 01:10:21', '2014-11-10 01:10:21', 3, 3, 'active', 57, 1, 1, 0, 40),
(18, '2014-11-10 01:10:29', '2014-11-10 01:10:29', 3, 3, 'active', 57, 3, 3, 0, 10),
(19, '2014-11-10 01:11:02', '2014-11-10 01:11:02', 3, 3, 'active', 58, 4, 4, 0, 10),
(20, '2014-11-15 07:08:14', '2014-11-15 07:08:14', 3, 3, 'active', 69, 4, 4, 0, 10),
(21, '2014-11-15 07:08:24', '2014-11-15 07:08:24', 3, 3, 'active', 69, 2, 4, 0, 20),
(22, '2014-11-22 18:30:39', '2014-11-22 18:30:39', 3, 3, 'active', 70, 1, 1, 0, 40),
(23, '2014-11-22 18:30:44', '2014-11-22 18:30:44', 3, 3, 'active', 70, 3, 1, 0, 10),
(24, '2014-11-22 18:30:48', '2014-11-22 18:30:48', 3, 3, 'active', 70, 2, 2, 0, 20),
(25, '2014-11-22 18:47:09', '2014-11-22 18:47:09', 3, 3, 'active', 72, 1, 2, 0, 40),
(26, '2014-11-22 18:50:08', '2014-11-22 18:50:08', 3, 3, 'active', 73, 2, 2, 0, 20),
(27, '2014-11-22 18:50:18', '2014-11-22 18:50:18', 3, 3, 'active', 73, 1, 1, 0, 40),
(28, '2014-11-22 18:50:24', '2014-11-22 18:50:24', 3, 3, 'active', 73, 4, 2, 0, 10),
(29, '2014-11-22 18:52:06', '2014-11-22 18:52:06', 3, 3, 'active', 74, 1, 3, 0, 40),
(30, '2014-11-22 18:52:32', '2014-11-22 18:52:32', 3, 3, 'active', 74, 3, 1, 0, 10),
(31, '2014-11-22 18:55:26', '2014-11-22 18:55:26', 3, 3, 'active', 75, 1, 1, 0, 40),
(32, '2014-11-22 18:56:17', '2014-11-22 18:56:17', 3, 3, 'active', 76, 1, 1, 0, 40),
(33, '2014-11-22 18:58:21', '2014-11-22 18:58:21', 3, 3, 'active', 79, 1, 1, 0, 40),
(34, '2014-11-22 18:59:27', '2014-11-22 18:59:27', 3, 3, 'active', 80, 1, 2, 0, 40),
(35, '2014-11-22 19:07:23', '2014-11-22 19:07:23', 3, 3, 'active', 81, 1, 1, 0, 40),
(36, '2014-11-22 19:08:44', '2014-11-22 19:08:44', 3, 3, 'active', 82, 1, 1, 0, 40),
(37, '2014-11-22 19:10:10', '2014-11-22 19:10:10', 3, 3, 'active', 83, 1, 1, 0, 40),
(38, '2014-11-22 19:10:29', '2014-11-22 19:10:29', 3, 3, 'active', 84, 1, 1, 0, 40),
(39, '2014-11-22 19:15:43', '2014-11-22 19:15:43', 3, 3, 'active', 86, 1, 1, 0, 40),
(40, '2014-11-22 19:18:29', '2014-11-22 19:18:29', 3, 3, 'active', 87, 1, 1, 0, 40),
(41, '2014-11-22 19:53:45', '2014-11-22 19:53:45', 3, 3, 'active', 88, 1, 1, 0, 40),
(42, '2014-11-22 19:54:38', '2014-11-22 19:54:38', 3, 3, 'active', 89, 1, 1, 0, 40),
(43, '2014-11-22 19:55:55', '2014-11-22 19:55:55', 3, 3, 'active', 90, 1, 1, 0, 40),
(44, '2014-11-22 19:56:12', '2014-11-22 19:56:12', 3, 3, 'active', 91, 1, 1, 0, 40),
(45, '2014-11-22 19:56:34', '2014-11-22 19:56:34', 3, 3, 'active', 92, 1, 1, 0, 40),
(46, '2014-11-22 19:58:45', '2014-11-22 19:58:45', 3, 3, 'active', 93, 3, 1, 0, 10),
(47, '2014-11-22 20:05:35', '2014-11-22 20:05:35', 3, 3, 'active', 94, 1, 2, 0, 40),
(48, '2014-11-22 20:06:00', '2014-11-22 20:06:00', 3, 3, 'active', 94, 3, 1, 0, 10),
(49, '2014-11-22 20:06:03', '2014-11-22 20:06:03', 3, 3, 'active', 94, 2, 1, 0, 20),
(50, '2014-11-22 20:06:18', '2014-11-22 20:06:18', 3, 3, 'active', 94, 4, 1, 0, 10),
(51, '2014-11-22 20:33:06', '2014-11-22 20:33:06', 3, 3, 'active', 95, 4, 1, 0, 10),
(52, '2014-11-22 20:35:46', '2014-11-22 20:35:46', 3, 3, 'active', 96, 1, 1, 0, 40),
(53, '2014-11-22 20:37:03', '2014-11-22 20:37:03', 3, 3, 'active', 97, 4, 1, 0, 10),
(54, '2014-11-22 20:39:37', '2014-11-22 20:39:44', 3, 3, 'inactive', 98, 3, 3, 0, 10),
(55, '2014-11-22 20:39:40', '2014-11-22 20:39:40', 3, 3, 'active', 98, 1, 2, 0, 40),
(56, '2014-11-22 20:46:48', '2014-11-22 20:46:48', 3, 3, 'active', 100, 1, 1, 0, 40),
(57, '2014-11-22 20:46:51', '2014-11-22 20:46:53', 3, 3, 'inactive', 100, 3, 1, 0, 10),
(58, '2014-11-22 20:46:57', '2014-11-22 20:46:57', 3, 3, 'active', 100, 3, 2, 0, 10),
(59, '2014-11-22 20:48:40', '2014-11-22 20:48:50', 3, 3, 'inactive', 102, 4, 1, 0, 10),
(60, '2014-11-22 20:48:44', '2014-11-22 20:48:44', 3, 3, 'active', 102, 1, 2, 0, 40),
(61, '2014-11-22 20:48:46', '2014-11-22 20:49:06', 3, 3, 'inactive', 102, 3, 2, 0, 10),
(62, '2014-11-22 20:55:40', '2014-11-22 20:55:46', 3, 3, 'inactive', 105, 1, 1, 0, 40),
(63, '2014-11-22 20:57:37', '2014-11-22 20:57:46', 3, 3, 'inactive', 107, 1, 1, 0, 40),
(64, '2014-11-22 21:01:48', '2014-11-22 21:02:11', 3, 3, 'inactive', 108, 1, 1, 0, 40),
(65, '2014-11-22 21:03:52', '2014-11-22 21:04:06', 3, 3, 'inactive', 109, 1, 1, 0, 40),
(66, '2014-11-22 21:04:40', '2014-11-22 21:05:28', 3, 3, 'inactive', 110, 3, 1, 0, 10),
(67, '2014-11-22 21:10:33', '2014-11-22 21:10:40', 3, 3, 'inactive', 111, 1, 1, 0, 40),
(68, '2014-11-22 21:11:23', '2014-11-22 21:11:26', 3, 3, 'inactive', 112, 1, 1, 0, 40),
(69, '2014-11-22 21:11:46', '2014-11-22 21:11:49', 3, 3, 'inactive', 113, 1, 1, 0, 40),
(70, '2014-11-22 21:12:13', '2014-11-22 21:12:15', 3, 3, 'inactive', 114, 1, 1, 0, 40),
(71, '2014-11-22 21:12:44', '2014-11-22 21:12:46', 3, 3, 'inactive', 115, 1, 1, 0, 40),
(72, '2014-11-22 21:13:04', '2014-11-22 21:13:06', 3, 3, 'inactive', 116, 1, 1, 0, 40),
(73, '2014-11-22 21:38:12', '2014-11-22 21:38:12', 3, 3, 'active', 117, 3, 2, 0, 10),
(74, '2014-11-22 21:38:23', '2014-11-22 21:38:30', 3, 3, 'inactive', 117, 1, 1, 0, 40),
(75, '2014-11-22 21:38:27', '2014-11-22 21:38:27', 3, 3, 'active', 117, 4, 1, 0, 10),
(76, '2014-11-23 19:34:20', '2014-11-23 19:34:24', 3, 3, 'inactive', 120, 1, 1, 0, 40),
(77, '2014-11-23 20:05:21', '2014-11-23 20:05:21', 3, 3, 'active', 120, 3, 1, 0, 10),
(78, '2014-11-23 20:11:41', '2014-11-23 20:11:58', 3, 3, 'inactive', 121, 1, 1, 0, 40),
(79, '2014-11-23 20:12:02', '2014-11-23 20:12:02', 3, 3, 'active', 121, 1, 1, 0, 40),
(80, '2014-11-23 20:55:37', '2014-11-23 20:55:49', 3, 3, 'inactive', 135, 1, 3, 0, 40),
(81, '2014-11-23 20:56:18', '2014-11-23 20:56:35', 3, 3, 'inactive', 136, 1, 4, 0, 40),
(82, '2014-12-03 19:45:51', '2014-12-03 19:45:55', 3, 3, 'inactive', 193, 1, 1, 0, 40),
(83, '2014-12-03 19:46:46', '2014-12-03 19:47:03', 3, 3, 'inactive', 193, 1, 6, 0, 40),
(84, '2014-12-03 19:46:51', '2014-12-03 19:47:02', 3, 3, 'inactive', 193, 2, 6, 0, 20),
(85, '2014-12-10 02:24:18', '2014-12-10 02:24:33', 3, 3, 'inactive', 252, 1, 1, 0, 40),
(86, '2014-12-12 19:32:46', '2014-12-12 19:32:46', 3, 3, 'active', 271, 4, 3, 0, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
`id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `folio` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `amount` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pricelists`
--

CREATE TABLE IF NOT EXISTS `pricelists` (
`id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `status` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `currency_symbol` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `tax` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pricelist_products`
--

CREATE TABLE IF NOT EXISTS `pricelist_products` (
`id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `pricelist_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `tax` int(11) NOT NULL DEFAULT '0',
  `priceinpoints` int(11) NOT NULL DEFAULT '0',
  `startdt` date DEFAULT NULL,
  `enddt` date DEFAULT NULL,
  `disc_percent` int(11) DEFAULT NULL,
  `disc_startdt` date DEFAULT NULL,
  `disc_enddt` date DEFAULT NULL,
  `maxdisc_percent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `part_number` varchar(255) NOT NULL,
  `integration_num` varchar(100) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `family_id` int(11) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `unit_price` double NOT NULL,
  `type` varchar(80) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `created`, `updated`, `created_by`, `updated_by`, `status`, `part_number`, `integration_num`, `name`, `family_id`, `uom`, `unit_price`, `type`, `short_desc`, `description`) VALUES
(1, '2014-10-25 20:46:07', '2014-10-25 20:46:07', 1, 1, 'active', '001', '1', 'Hamburguesa', 1, 'Pieza', 40, 'Alimento', 'Hamburguesa', 'Hamburguesa'),
(2, '2014-10-25 20:48:26', '2014-10-25 20:48:26', 1, 1, 'active', '002', '2', 'Refresco', 1, 'Pieza', 20, 'Bebida', 'Bebida', 'Bebida'),
(3, '2014-10-27 00:09:33', '2014-10-27 00:09:33', 1, 1, 'active', '003', '', 'Coca Life', 2, 'Pieza', 10, 'Refresco', 'coca life', 'coca life'),
(4, '2014-10-27 00:10:38', '2014-10-27 00:10:38', 1, 1, 'active', '004', '', 'Arrachera', 4, 'Pieza', 10, 'Carne', 'Arrachera', 'Arrachera'),
(5, '2014-10-27 00:11:14', '2014-10-27 00:11:14', 1, 1, 'active', '005', '', 'Huevo', 3, 'Pieza', 10, 'Huevo', 'Huevo', 'Huevo'),
(6, '2014-10-27 00:11:49', '2014-10-27 00:11:49', 1, 1, 'active', '006', '', 'Jamon', 5, 'Pieza', 10, 'Jamon', 'Jamon', 'Jamon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_components`
--

CREATE TABLE IF NOT EXISTS `products_components` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `bundleid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_supplies`
--

CREATE TABLE IF NOT EXISTS `product_supplies` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `uomqty` int(11) NOT NULL,
  `supplyid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `rkey` varchar(80) NOT NULL,
  `type` varchar(80) NOT NULL,
  `category` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active',
  `modelName` varchar(80) NOT NULL,
  `findType` varchar(40) NOT NULL DEFAULT 'all',
  `recursive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `reports`
--

INSERT INTO `reports` (`id`, `created`, `updated`, `created_by`, `updated_by`, `title`, `rkey`, `type`, `category`, `status`, `modelName`, `findType`, `recursive`) VALUES
(1, '2014-12-11 23:37:13', '2014-12-11 23:37:13', 0, 0, 'Ventas por Productos', '0', '0', 'products', 'active', 'OrderProduct', 'all', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
`id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sequences`
--

CREATE TABLE IF NOT EXISTS `sequences` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `value` int(10) unsigned DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
`id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `billing_rfc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `billing_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `stores`
--

INSERT INTO `stores` (`id`, `created`, `updated`, `updated_by`, `created_by`, `owner_id`, `name`, `billing_rfc`, `billing_name`, `alias`, `status`) VALUES
(1, '2014-12-13 05:28:13', '2014-12-13 06:02:45', 0, 0, 0, 'Monterrey Centro', 'RFC', 'NAME', 'MTYCTR', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `store_teams`
--

CREATE TABLE IF NOT EXISTS `store_teams` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taskflows`
--

CREATE TABLE IF NOT EXISTS `taskflows` (
`id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `description` text,
  `trigger_object` varchar(255) NOT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `taskflows`
--

INSERT INTO `taskflows` (`id`, `type`, `name`, `created`, `updated`, `created_by`, `updated_by`, `description`, `trigger_object`, `active_flg`) VALUES
(1, 'Ventas', 'Venta nueva', '2013-06-17 20:01:46', '2013-08-14 15:18:25', 1, 1, 'Plan de ventas optimizado', 'Account', 1),
(2, 'Ventas', 'Venta con oportunidad', '2013-08-21 04:08:05', '2013-08-21 04:08:05', 1, 1, '', 'Account', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taskflow_instances`
--

CREATE TABLE IF NOT EXISTS `taskflow_instances` (
`id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `taskflow_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `rel_object` int(11) NOT NULL,
  `rel_object_type` varchar(100) NOT NULL,
  `progress` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `taskflow_instances`
--

INSERT INTO `taskflow_instances` (`id`, `parent_id`, `taskflow_id`, `task_id`, `created`, `updated`, `created_by`, `updated_by`, `rel_object`, `rel_object_type`, `progress`) VALUES
(1, 0, 2, 0, '2014-04-11 21:52:58', '2014-05-14 16:19:22', 1, 1, 1, 'Account', 27),
(2, 1, 2, 4, '2014-04-11 21:54:17', '2014-04-11 21:54:17', 1, 1, 1, 'Opportunity', 0),
(3, 0, 1, 0, '2014-04-11 21:59:20', '2014-04-12 19:44:43', 1, 1, 20, 'Account', 102),
(4, 0, 2, 0, '2014-04-12 16:29:10', '2014-04-12 19:41:46', 1, 1, 20, 'Account', 27),
(5, 4, 2, 4, '2014-04-12 16:30:17', '2014-04-12 16:30:17', 1, 1, 2, 'Opportunity', 0),
(6, 0, 2, 0, '2014-04-12 16:31:39', '2014-05-14 16:17:54', 1, 1, 28, 'Account', 27),
(7, 6, 2, 4, '2014-04-12 16:32:12', '2014-04-12 16:32:12', 1, 1, 3, 'Opportunity', 0),
(8, 0, 2, 0, '2014-04-12 18:08:31', '2014-04-12 19:39:49', 1, 1, 674, 'Account', 52),
(9, 8, 2, 4, '2014-04-12 18:09:13', '2014-04-12 18:09:13', 1, 1, 4, 'Opportunity', 0),
(10, 8, 2, 5, '2014-04-12 18:10:05', '2014-04-12 18:10:05', 1, 1, 3, 'Quote', 0),
(11, 3, 1, 1, '2014-04-12 19:44:07', '2014-04-12 19:44:07', 1, 1, 4, 'Quote', 0),
(12, 3, 1, 2, '2014-04-12 19:44:20', '2014-04-12 19:44:20', 1, 1, 7, 'Order', 0),
(13, 3, 1, 3, '2014-04-12 19:44:42', '2014-04-12 19:44:42', 1, 1, 7, 'OrderPayment', 0),
(14, 0, 2, 0, '2014-04-15 01:02:37', '2014-04-23 21:25:15', 1, 1, 20, 'Account', 52),
(15, 14, 2, 4, '2014-04-15 01:04:57', '2014-04-15 01:04:57', 1, 1, 5, 'Opportunity', 0),
(16, 14, 2, 5, '2014-04-15 01:05:44', '2014-04-15 01:05:44', 1, 1, 5, 'Quote', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taskflow_tasks`
--

CREATE TABLE IF NOT EXISTS `taskflow_tasks` (
`id` int(11) NOT NULL,
  `taskflow_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `duration` int(11) NOT NULL,
  `monitor_object` varchar(255) NOT NULL,
  `end_condition` varchar(1000) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `action` varchar(1000) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `taskflow_tasks`
--

INSERT INTO `taskflow_tasks` (`id`, `taskflow_id`, `created`, `updated`, `created_by`, `updated_by`, `name`, `description`, `duration`, `monitor_object`, `end_condition`, `controller`, `action`, `order`) VALUES
(1, 1, '2013-06-17 21:58:26', '2013-08-20 23:25:57', 1, 1, 'Crear Cotizacion', 'Tarea relacionada a la actividad de crear una cotización para la venta...', 0, 'Quote', 'Quote.status !==>Cancelled', 'AccountsController', 'edit/{account_id}', 1),
(2, 1, '2013-06-17 22:05:40', '2013-09-12 21:02:35', 1, 1, 'Crear Pedido', '', 0, 'Order', 'Order.status !==>Cancelled', 'QuotesController', 'edit', 2),
(3, 1, '2013-06-17 23:33:53', '2013-09-13 16:23:52', 1, 1, 'Cobrar', '', 0, 'OrderPayment', 'OrderPayment.status=>Pendiente', 'OrdersController', 'edit', 3),
(4, 2, '2013-08-21 04:12:19', '2013-08-21 04:15:09', 1, 1, 'Crear Oportunidad', '', 0, 'Opportunity', 'Opportunity.status !==>Cancelled', 'AccountsController', 'edit', 1),
(5, 2, '2013-08-21 04:14:52', '2013-08-21 04:14:52', 1, 1, 'Crear Cotizacion', '', 0, 'Quote', 'Quote.status !==>Cancelled', 'OpportunitiesController', 'Edit', 2),
(6, 2, '2013-08-21 04:16:48', '2013-08-21 04:16:48', 1, 1, 'Crear Pedido', '', 0, 'Order', 'Order.status !==>Cancelled', 'QuotesController', 'Edit', 3),
(7, 2, '2013-08-21 04:19:14', '2014-02-12 00:03:30', 1, 1, 'Pagar', '', 1, 'OrderPayment', 'Order.status ==>Completed', 'OrdersController', 'Edit', 4),
(8, 4, '2014-02-12 22:09:58', '2014-02-12 22:11:05', 1, 1, 'Crear Actividad de Llamada', '', 2, 'Activity', 'Activity.status ==>Completada', 'AccountsController', 'edit/{account_id}', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `task_actions`
--

CREATE TABLE IF NOT EXISTS `task_actions` (
`id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tip` text,
  `css` varchar(255) NOT NULL,
  `text` varchar(100) NOT NULL,
  `action` varchar(1000) NOT NULL,
  `controller` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `task_actions`
--

INSERT INTO `task_actions` (`id`, `task_id`, `created`, `updated`, `created_by`, `updated_by`, `name`, `tip`, `css`, `text`, `action`, `controller`) VALUES
(1, 1, '2013-08-13 22:02:41', '2013-08-19 22:56:30', 1, 1, 'add_quote', 'Genera una cotización para el cliente seleccionado...', 'glyphicons no-js white circle_plus btn green', 'Agregar Cotizacion', 'add', 'QuotesController'),
(2, 2, '2013-08-13 22:21:02', '2014-02-11 18:16:48', 1, 1, 'add_order', '', 'glyphicons no-js white circle_plus btn green', 'Crear Pedido', 'add', 'OrdersController'),
(4, 3, '2013-08-20 06:14:26', '2013-09-13 16:21:33', 1, 1, 'add_payment', '', 'glyphicons no-js white usd btn green', 'Agregar Pago', 'add', 'OrderPaymentsController'),
(6, 4, '2013-08-21 04:13:48', '2013-08-21 04:26:25', 1, 1, 'add_oppty', '', 'glyphicons no-js white circle_plus btn green', 'Agregar Oportunidad', 'add', 'OpportunitiesController'),
(7, 5, '2013-08-21 04:15:53', '2013-08-21 04:56:17', 1, 1, 'add_quote', '', 'glyphicons no-js white circle_plus btn green', 'Agregar Cotizacion', 'add', 'QuotesController'),
(8, 6, '2013-08-21 04:18:10', '2013-08-21 04:56:30', 1, 1, 'add_order', '', 'glyphicons no-js white circle_plus btn green', 'Agregar Pedido', 'add', 'OrdersController'),
(9, 7, '2013-08-21 04:20:14', '2013-08-21 04:20:14', 1, 1, 'add_payment', '', 'glyphicons no-js white usd btn green', 'Agregar Pago', 'add', 'OrderPaymentsController'),
(10, 7, '2013-08-21 04:20:48', '2013-08-21 04:20:48', 1, 1, 'add_appointment', '', 'glyphicons no-js white calendar btn green', 'Agendar Cita', 'add,Appointment', 'ActivitiesController'),
(11, 8, '2014-02-12 22:12:25', '2014-02-12 22:14:21', 1, 1, 'Crear Actividad', '', 'glyphicons no-js white circle_plus btn green', 'Crear Actividad', 'add', 'ActivitiesController');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
`id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `alias` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `created_by`, `updated_by`, `updated`, `created`, `name`, `owner_id`, `alias`, `status`) VALUES
(1, 1, 1, '2014-07-01 02:32:27', '2013-06-11 18:36:57', 'Equipo de desarrollo', 1, 'DT', 'active'),
(2, 3, 3, '2014-07-25 18:04:24', '2014-07-25 18:04:21', 'Equipo dos', 1, '', 'active');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_workstations`
--

CREATE TABLE IF NOT EXISTS `team_workstations` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `team_id` int(11) NOT NULL,
  `workstation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(80) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `logged` tinyint(1) NOT NULL,
  `chatstatus` varchar(80) NOT NULL DEFAULT '',
  `time_zone` varchar(100) NOT NULL DEFAULT '',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(80) NOT NULL DEFAULT '',
  `gender` varchar(40) NOT NULL DEFAULT '',
  `maritalstatus` varchar(40) NOT NULL DEFAULT '',
  `shortdescription` varchar(40) NOT NULL DEFAULT '',
  `fulldescription` varchar(200) NOT NULL DEFAULT '',
  `coverimg` varchar(200) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT '',
  `status` varchar(80) NOT NULL DEFAULT 'active',
  `workstation_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group_id`, `created`, `modified`, `blocked`, `logged`, `chatstatus`, `time_zone`, `firstname`, `lastname`, `email`, `gender`, `maritalstatus`, `shortdescription`, `fulldescription`, `coverimg`, `avatar`, `status`, `workstation_id`) VALUES
(1, 'admin', '37e237390dd12b15bdcda89e112b4ea22f994481', 1, '2013-01-02 23:31:16', '2014-07-16 17:28:11', 0, 0, 'online', 'America/Monterrey', 'Admin', 'Admin', 'admin@admin.com', '', '', '', '', '', '', 'active', 0),
(2, 'ruizh', 'ruizh', 2, '2014-07-01 20:16:28', '2014-12-12 18:59:41', 0, 0, 'online', 'America/Monterrey', 'Hugo', 'Ruíz', 'hruiz.it@gmail.com', '', '', 'Apasionado por la tecnología', 'Yes man! como ven  este puede ser de  varias lineas dsfvsdfvdsfvdsfvsdf sdfvsdfvsdfvdsf sdfvsdfvsdfv sdfvsdfvsdfv sdfvsdfvsdfv sdfvsdfvsdfv sdfvsdfvsdfv sdfvsdfvsdfv ', '', '/files/uploads/avatars/6e7eacd17b5fa1415bb6e1a1e9a3f285.jpg', 'active', 0),
(3, 'hruiz', '48915c428c0dac790d83ddea337a14e5d83b7024', 2, '2014-07-13 19:41:00', '2014-12-03 20:23:32', 0, 0, 'online', 'America/Monterrey', 'hugo', 'ruiz', 'hruiz.it@gmail.com', '', '', 'Technician', '=)', '/files/uploads/avatars/fbd3249f5b1f782c4c47a7c5e07d14cf.jpg', '/files/uploads/avatars/790fdabcbdf94009e86c763d76262dba.jpg', 'active', 2),
(4, 'yorch', '895b9b9f82cd07092d6d5ebdbad00d4b48564feb', 1, '2014-08-08 16:28:39', '2014-08-08 16:28:45', 0, 0, 'online', '', 'yorch', 'yorch', 'yorch@yorch.com', '', '', '', '', '', '', 'active', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workstations`
--

CREATE TABLE IF NOT EXISTS `workstations` (
`id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `role` varchar(255) NOT NULL DEFAULT '',
  `title` varchar(255) NOT NULL DEFAULT '',
  `workarea` varchar(80) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `pricelist_id` int(11) NOT NULL,
  `status` varchar(80) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `workstations`
--

INSERT INTO `workstations` (`id`, `created`, `updated`, `created_by`, `updated_by`, `parent_id`, `lft`, `rght`, `description`, `role`, `title`, `workarea`, `store_id`, `pricelist_id`, `status`) VALUES
(1, '2014-12-14 22:09:59', '2014-12-14 22:57:06', 0, 0, 0, 1, 2, 'Director de la companía', 'director', 'Director General', '0', 1, 0, 'active');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `acos`
--
ALTER TABLE `acos`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_acos_lft_rght` (`lft`,`rght`), ADD KEY `idx_acos_alias` (`alias`), ADD KEY `idx_acos_model_foreign_key` (`model`,`foreign_key`);

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `addresses`
--
ALTER TABLE `addresses`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `appmenus`
--
ALTER TABLE `appmenus`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `parent_id` (`parent_id`,`ordershow`,`mname`);

--
-- Indices de la tabla `aros`
--
ALTER TABLE `aros`
 ADD PRIMARY KEY (`id`), ADD KEY `idx_aros_lft_rght` (`lft`,`rght`), ADD KEY `idx_aros_alias` (`alias`), ADD KEY `idx_aros_model_foreign_key` (`model`,`foreign_key`);

--
-- Indices de la tabla `aros_acos`
--
ALTER TABLE `aros_acos`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`), ADD UNIQUE KEY `idx_aros_acos_aro_id_aco_id` (`aro_id`,`aco_id`), ADD KEY `aco_id` (`aco_id`);

--
-- Indices de la tabla `attachments`
--
ALTER TABLE `attachments`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cake_sessions`
--
ALTER TABLE `cake_sessions`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configs`
--
ALTER TABLE `configs`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `type` (`name`);

--
-- Indices de la tabla `families`
--
ALTER TABLE `families`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `i18n`
--
ALTER TABLE `i18n`
 ADD PRIMARY KEY (`id`), ADD KEY `locale` (`locale`), ADD KEY `model` (`model`), ADD KEY `row_id` (`foreign_key`), ADD KEY `field` (`field`);

--
-- Indices de la tabla `lovs`
--
ALTER TABLE `lovs`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `type` (`type`,`name_`,`value`);

--
-- Indices de la tabla `notes`
--
ALTER TABLE `notes`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_payments`
--
ALTER TABLE `order_payments`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_products`
--
ALTER TABLE `order_products`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pricelists`
--
ALTER TABLE `pricelists`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`,`currency`);

--
-- Indices de la tabla `pricelist_products`
--
ALTER TABLE `pricelist_products`
 ADD PRIMARY KEY (`id`), ADD KEY `pricelist_id` (`pricelist_id`,`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`,`uom`);

--
-- Indices de la tabla `products_components`
--
ALTER TABLE `products_components`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_supplies`
--
ALTER TABLE `product_supplies`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reports`
--
ALTER TABLE `reports`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resources`
--
ALTER TABLE `resources`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `sequences`
--
ALTER TABLE `sequences`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `stores`
--
ALTER TABLE `stores`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `store_teams`
--
ALTER TABLE `store_teams`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `team_id` (`team_id`,`store_id`);

--
-- Indices de la tabla `taskflows`
--
ALTER TABLE `taskflows`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taskflow_instances`
--
ALTER TABLE `taskflow_instances`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taskflow_tasks`
--
ALTER TABLE `taskflow_tasks`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `task_actions`
--
ALTER TABLE `task_actions`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `team_workstations`
--
ALTER TABLE `team_workstations`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `team_id` (`team_id`,`workstation_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `workstations`
--
ALTER TABLE `workstations`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accounts`
--
ALTER TABLE `accounts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `acos`
--
ALTER TABLE `acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1708;
--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `addresses`
--
ALTER TABLE `addresses`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `appmenus`
--
ALTER TABLE `appmenus`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `aros`
--
ALTER TABLE `aros`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `aros_acos`
--
ALTER TABLE `aros_acos`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT de la tabla `configs`
--
ALTER TABLE `configs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `families`
--
ALTER TABLE `families`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `i18n`
--
ALTER TABLE `i18n`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `lovs`
--
ALTER TABLE `lovs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `notes`
--
ALTER TABLE `notes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=347;
--
-- AUTO_INCREMENT de la tabla `order_payments`
--
ALTER TABLE `order_payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `order_products`
--
ALTER TABLE `order_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pricelists`
--
ALTER TABLE `pricelists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pricelist_products`
--
ALTER TABLE `pricelist_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `products_components`
--
ALTER TABLE `products_components`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `product_supplies`
--
ALTER TABLE `product_supplies`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reports`
--
ALTER TABLE `reports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `resources`
--
ALTER TABLE `resources`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sequences`
--
ALTER TABLE `sequences`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `stores`
--
ALTER TABLE `stores`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `store_teams`
--
ALTER TABLE `store_teams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `taskflows`
--
ALTER TABLE `taskflows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `taskflow_instances`
--
ALTER TABLE `taskflow_instances`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `taskflow_tasks`
--
ALTER TABLE `taskflow_tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `task_actions`
--
ALTER TABLE `task_actions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `team_workstations`
--
ALTER TABLE `team_workstations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `workstations`
--
ALTER TABLE `workstations`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
