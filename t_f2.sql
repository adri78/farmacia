-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-12-2018 a las 23:21:25
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alvarez_Farma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_f`
--

CREATE TABLE IF NOT EXISTS `t_f` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Farmacia` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Domicilio` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Telefonos` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(120) CHARACTER SET latin1 NOT NULL,
  `Contacto` varchar(200) CHARACTER SET latin1 NOT NULL,
  `zona` varchar(60) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

--
-- Volcado de datos para la tabla `t_f`
--

INSERT INTO `t_f` (`ID`, `Farmacia`, `Domicilio`, `Telefonos`, `Email`, `Contacto`, `zona`) VALUES
(69, 'GERARDI', 'LA ROSA 705', '', '', '', 'Adrogue'),
(2, 'MARESCA', 'ALSINA 2998', '', '', '', 'Claypole'),
(3, 'RAVA', 'ALSINA ESQ. MARCONI', '4236-9075', '', '', 'Claypole'),
(4, 'PIÑOL ', 'MONJITAS 1253', '', '', '', 'Claypole'),
(5, 'STAMPONE', 'FIGUEROA 462', '', '', '', 'Claypole'),
(6, 'TENCHA', 'ALCORTA 1245', '4291-0307', '', '', 'Claypole'),
(7, 'HERRERA ACOSTA', 'SAN MARTIN 611', '4291-2979/4236-6566', '', '', 'Claypole'),
(8, 'SALABERRY', 'SALABERRY 33', '4277-3838', '', '', 'Claypole'),
(9, 'FARMACEUTICA DEL SUR', 'SALABERRY 760', '', '', '', 'Claypole'),
(10, 'SASSONE', 'LACAZE Y HUMAHUACA', '4268-1337', '', '', 'Claypole'),
(11, 'DELL´ARCIPRETE', 'ARAUJO 2486', '', '', '', 'Claypole'),
(12, 'CIPOLATTI', 'AV. MONTEVERDE 8552', '', '', '', 'Claypole'),
(13, 'ALVAREZ(Claypole)', 'CALLE 7 Mza. F CASA 20', '', '', '', 'Claypole'),
(14, 'PASTEUR', 'ALSINA 998', '4299-0104', '', '', 'Burzaco'),
(15, 'OCA', 'J. V. GONZALEZ 1578', '4299-1564', '', '', 'Burzaco'),
(16, 'COIRO', 'AV. MONTEVERDE 1380', '0800-666-6643', '', '', 'Burzaco'),
(17, 'PARSONS', 'AV. ESPORA 2183', '4294-5617', '', '', 'Burzaco'),
(18, 'KAPLAN', 'AV. ESPORA Y R. ROJAS', '4299- 0802', '', '', 'Burzaco'),
(19, 'HERNANDEZ', 'SOLER 1003', '4294-8705', '', '', 'Burzaco'),
(20, 'CAPALLO', 'AV. ESPORA Y ARISTOBULO DEL VALLE', '15-5318-9772', '', '', 'Burzaco'),
(21, 'BURZACO SUR S.C.S', 'REP. ARGENTINA Y URUGUAY', '4299-9029', '', '', 'Burzaco'),
(22, 'GUGGIARI', 'MONTEVERDE Y GOYENA', '4116-5481', '', '', 'Burzaco'),
(23, 'MINETTI', 'PRIETO 1390 BARRIO ARZENO', '4293-5914', '', '', 'Burzaco'),
(24, 'NAVARRO', 'GOYENA 925', '4299-6486', '', '', 'Burzaco'),
(25, 'VARGAS', 'J.V. Gonzalez 2517', '39796348', '', '', 'Burzaco'),
(26, 'PERICON', 'ALEM 1820 Y GOYENA', '4238-5082', '', '', 'Burzaco'),
(27, 'LA ROTONDA DEL VAPOR', 'ESPORA 4185', '4299-6493', '', '', 'Burzaco'),
(28, 'MONCLUS', 'ALSINA 649', '4299-2317', '', '', 'Burzaco'),
(29, 'WINNIK', 'AV. H. YRIGOYEN 14282', '4299-7339', '', '', 'Burzaco'),
(30, 'SBATELLA', 'E. DE BURZACO 369 Y AV. H. YRIGOYEN', '4299-0874', '', '', 'Burzaco'),
(31, 'ROCA', 'ROCA 849', '4299-0837', '', '', 'Burzaco'),
(32, 'RAMIREZ', 'AV. SAN MARTIN 3575', '', '', '', 'R.Calzada'),
(33, 'CASTELLI', 'COLON 3351', '', '', '', 'R.Calzada'),
(34, 'NUEVA CASTELLI', 'ARIAS 2031', '', '', '', 'R.Calzada'),
(35, 'COLON', '20 DE SEPTIEMBRE 1746', '', '', '', 'R.Calzada'),
(36, 'EL ARCO DE CALZADA', 'AV. SAN MARTIN 2942', '', '', '', 'R.Calzada'),
(37, 'FARMA SYC', 'AV. San Martin 3241', '', '', '', 'R.Calzada'),
(38, 'SAFFIRIO', 'AV. SAN MARTIN 3856', '', '', '', 'R.Calzada'),
(39, 'LA BOTICA DEL HOSPITAL', 'JORGE 3995', '', '', '', 'R.Calzada'),
(40, 'REGINA', 'AV. SAN MARTIN 2185', '', '', '', 'R.Calzada'),
(41, 'CIVITILLO', 'REP. ARGENTINA 2143', '', '', '', 'R.Calzada'),
(42, 'VARGAS', 'LERROUX 2030', '', '', '', 'R.Calzada'),
(43, 'LEUNDA', 'PTE. PERON Y ALTAMIRA', '', '', '', 'R.Calzada'),
(44, 'CEBALLOS', 'SARMIENTO Y RUTA 210', '422-129', '', '', 'Glew'),
(45, 'GONZALEZ', 'PATRIA 33', '433-232', '', '', 'Glew'),
(46, 'REID', 'MENDEZ Y 33 ORIENTALES', '434-170', '', '', 'Glew'),
(47, 'MONTES VIVAS', 'H. YRIGOYEN 19599', '4297-3996', '', '', 'Glew'),
(48, 'ACOSTA', 'AV. ALMAFUERTE 130', '420-257', '', '', 'Glew'),
(49, 'KELLERTAS', 'SARMIENTO 74', '431-688', '', '', 'Glew'),
(50, 'GLEW', 'RUTA 210 Y PCIA. DE SANTA FE ', '433-909', '', '', 'Glew'),
(51, 'SUR GLEW', 'MIGUEL CANE 1267', '433-337', '', '', 'Glew'),
(52, 'SLAPAK', 'SOMELLERA 565', '4294-1000', '', '', 'Adrogue'),
(53, 'LOPEZ', 'SEGUI 834', '4294-4132', '', '', 'Adrogue'),
(54, 'CALVO', 'ESPORA 600 ESQ. MITRE', '', '', '', 'Adrogue'),
(55, 'FARMA 24', 'H. YRIGOYEN 13305', '', '', '', 'Adrogue'),
(56, 'ADROGUE', 'PZA. ESPORA 32', '', '', '', 'Adrogue'),
(57, 'PUNTO SALUD', 'BYNNON 3180', '4291-1291', '', '', 'J.Marmol'),
(58, 'NUEVA SEGUI', 'SEGUI 602 Y AVELLANEDA', '4214-1932', '', '', 'Adrogue'),
(59, 'ORELLANO', 'AV. SAN MARTIN 1200', '4293-3575', '', '', 'Adrogue'),
(60, 'CENTRAL', 'E. ADROGUE 1066', '4293-0215', '', '', 'Adrogue'),
(61, 'MURO', 'B. Mitre 1901', '4294-0077', '', '', 'J.Marmol'),
(62, 'BELLARDI', 'AMENEDO 403', '4294-1822', '', '', 'Adrogue'),
(63, 'BANCIELLA', 'AV. SAN MARTIN 306', '4293-0050', '', '', 'Adrogue'),
(64, 'GROSSI', 'AV. ESPORA 97', '4214-2858', '', '', 'Adrogue'),
(65, 'ALVAREZ (ADROGUE)', 'Capitan F. Moyano 1315', '4293-4208', '', '', 'Adrogue'),
(66, 'ESPORA', 'AV. ESPORA 1119', '4294-1399', '', '', 'Adrogue'),
(67, 'DI MARCO', 'GORRITI 565', '4293-1457', '', '', 'Adrogue'),
(68, 'CEIJA', 'J. Calvo 973', '4214-0619', '', '', 'J.Marmol'),
(70, 'VACCARO', 'AMENEDO 2198', '4294-2203', '', '', 'J.Marmol'),
(71, 'DIAZ', 'BYNNON', '', '', '', 'J.Marmol'),
(72, 'LURAGHI', 'BOUCHARD 2241', '', '', '', 'J.Marmol'),
(73, 'FASER', 'BYNNON 3648', '4236-9313', '', '', 'J.Marmol'),
(74, 'BOZZOLA', '20 DE SEPTIEMBRE 140', '4291-1293', '', '', 'J.Marmol'),
(75, 'CASACCHIA SASSONE', 'BYNNON 2250', '', '', '', 'J.Marmol'),
(76, 'ANTIGUA CASTAGNINO', 'BUENOS AIRES 611', '', '', '', 'Longchamps'),
(77, 'D´ERRICO', 'BERLIN Y SARMIENTO', '', '', '', 'Longchamps'),
(78, 'FULCHI', 'BERLIN 188', '', '', '', 'Longchamps'),
(79, 'LUJILDE', 'ALSINA 838', '', '', '', 'Longchamps'),
(80, 'PAZZAGLINI', 'AV. H. YRIGOYEN 17558', '', '', '', 'Longchamps'),
(81, 'NUEVA FULCHI', 'BOULOGNE SUR MER 1311', '', '', '', 'Longchamps'),
(82, 'NUEVA LONGCHAMPS', 'LA AVIACION 991', '', '', '', 'Longchamps'),
(83, 'RUTA', 'AV. 25 DE MAYO 895 (Mtro. Rivadavia)', '', '', '', 'Longchamps'),
(84, 'YOKO', 'CARLOS DIEHL 2883 (Rayo de Sol)', '', '', '', 'Longchamps'),
(85, 'GURTUBAY', 'DOCTOR KELLERTAS 727', '', '', '', 'Longchamps'),
(86, 'ALVAREZ*(San Jose)', 'JUJUY ESQ. VERTIZ ', '', '', '', 'San_Jose'),
(87, 'BRUNETTI', 'SALTA 2072', '', '', '', 'San_Jose'),
(89, 'PIÑOL ( San Jose )', 'SALTA', '', '', '', 'San_Jose'),
(90, 'BAZYLUK', 'Divisoria 2678 e/ San Juan y De Heredia', '4264-9128', '', '', 'San_Jose'),
(91, 'AYALA', 'Santa Ana 572 esq. Garay', '4269-7366', '', '', 'San_Jose'),
(92, 'MUÑIZ', 'Salta 501 ( Ex Busquet )', '4264-3220', '', '', 'San_Jose'),
(93, 'COLOMBINI', 'Salta 1300', '4291-4586', '', '', 'San_Jose'),
(94, 'ARASAKY', 'San Martín 5241', '', '', '', 'San_Jose'),
(95, 'MACCO', '30 de Septiembre esq. Rio Negro', '', '', '', 'San_Jose'),
(96, 'MUÑOZ', 'Catamarca y San Martín', '4291-0160', '', '', 'San_Jose'),
(97, 'DRANOVSEK', 'salta 1667', '', '', '', 'San_Jose'),
(98, 'LLANO', 'Los Eucaliptus 259 ( Ex Catamarca )', '', '', '', 'San_Jose'),
(99, 'AIMAR', 'E. Perón 3502 ( Ex Pasco)', '4260-0021', '', '', 'San_Jose'),
(100, 'MANTEIGA', 'Salta 1000', '4264-2234', '', '', 'San_Jose'),
(105, 'ALVAREZ (San Jose)', 'Pio Collivadino 420', '', '', '', 'San_Jose'),
(103, 'JAIME', 'Churrinche 3799 esq. Benteveo', '4269-9291', '', '', 'San_Jose'),
(106, 'SAVY', 'EREZCANO Y RAMIREZ 1900', '', '', '', 'J.Marmol'),
(112, 'MENDEZ', 'FALUCHO 5497', '', '', '', 'R.Calzada'),
(111, 'MIRALTA', 'Gorriti Nº3000 y Altamira', '', '', '', 'R.Calzada'),
(113, 'MIRANDA', 'MIGUEL CANE 240', '', '', '', 'Glew'),
(114, 'MODERNA', 'Av. Chiesa 770', '', '', '', 'Longchamps'),
(115, 'DEMETER', 'S. ANA 1913', '20107610', '', '', 'San_Jose'),
(116, 'DASIV', 'AMENEDO Nº2198', '', '', '', 'J.Marmol');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
