-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2018 at 05:56 PM
-- Server version: 5.7.19
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_f`
--

CREATE TABLE `t_f` (
  `ID` int(11) NOT NULL,
  `Farmacia` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Domicilio` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Telefonos` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(120) CHARACTER SET latin1 NOT NULL,
  `zonaid` varchar(60) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_f`
--

INSERT INTO `t_f` (`ID`, `Farmacia`, `Domicilio`, `Telefonos`, `Email`, `zonaid`) VALUES
(69, 'GERARDI', 'LA ROSA 705', '', '', '2'),
(2, 'MARESCA', 'ALSINA 2998', '', '', '5'),
(3, 'RAVA', 'ALSINA ESQ. MARCONI', '4236-9075', '', '5'),
(4, 'PIÑOL ', 'MONJITAS 1253', '', '', '5'),
(5, 'STAMPONE', 'FIGUEROA 462', '', '', '5'),
(6, 'TENCHA', 'ALCORTA 1245', '4291-0307', '', '5'),
(7, 'HERRERA ACOSTA', 'SAN MARTIN 611', '4291-2979/4236-6566', '', '5'),
(8, 'SALABERRY', 'SALABERRY 33', '4277-3838', '', '5'),
(9, 'FARMACEUTICA DEL SUR', 'SALABERRY 760', '', '', '5'),
(10, 'SASSONE', 'LACAZE Y HUMAHUACA', '4268-1337', '', '5'),
(11, 'DELL´ARCIPRETE', 'ARAUJO 2486', '', '', '5'),
(12, 'CIPOLATTI', 'AV. MONTEVERDE 8552', '', '', '5'),
(13, 'ALVAREZ(Claypole)', 'CALLE 7 Mza. F CASA 20', '', '', '5'),
(14, 'PASTEUR', 'ALSINA 998', '4299-0104', '', '6'),
(15, 'OCA', 'J. V. GONZALEZ 1578', '4299-1564', '', '6'),
(16, 'COIRO', 'AV. MONTEVERDE 1380', '0800-666-6643', '', '6'),
(17, 'PARSONS', 'AV. ESPORA 2183', '4294-5617', '', '6'),
(18, 'KAPLAN', 'AV. ESPORA Y R. ROJAS', '4299- 0802', '', '6'),
(19, 'HERNANDEZ', 'SOLER 1003', '4294-8705', '', '6'),
(20, 'CAPALLO', 'AV. ESPORA Y ARISTOBULO DEL VALLE', '15-5318-9772', '', '6'),
(21, 'BURZACO SUR S.C.S', 'REP. ARGENTINA Y URUGUAY', '4299-9029', '', '6'),
(22, 'GUGGIARI', 'MONTEVERDE Y GOYENA', '4116-5481', '', '6'),
(23, 'MINETTI', 'PRIETO 1390 BARRIO ARZENO', '4293-5914', '', '6'),
(24, 'NAVARRO', 'GOYENA 925', '4299-6486', '', '6'),
(25, 'VARGAS', 'J.V. Gonzalez 2517', '39796348', '', '6'),
(26, 'PERICON', 'ALEM 1820 Y GOYENA', '4238-5082', '', '6'),
(27, 'LA ROTONDA DEL VAPOR', 'ESPORA 4185', '4299-6493', '', '6'),
(28, 'MONCLUS', 'ALSINA 649', '4299-2317', '', '6'),
(29, 'WINNIK', 'AV. H. YRIGOYEN 14282', '4299-7339', '', '6'),
(30, 'SBATELLA', 'E. DE BURZACO 369 Y AV. H. YRIGOYEN', '4299-0874', '', '6'),
(31, 'ROCA', 'ROCA 849', '4299-0837', '', '6'),
(32, 'RAMIREZ', 'AV. SAN MARTIN 3575', '', '', '7'),
(33, 'CASTELLI', 'COLON 3351', '', '', '7'),
(34, 'NUEVA CASTELLI', 'ARIAS 2031', '', '', '7'),
(35, 'COLON', '20 DE SEPTIEMBRE 1746', '', '', '7'),
(36, 'EL ARCO DE CALZADA', 'AV. SAN MARTIN 2942', '', '', '7'),
(37, 'FARMA SYC', 'AV. San Martin 3241', '', '', '7'),
(38, 'SAFFIRIO', 'AV. SAN MARTIN 3856', '', '', '7'),
(39, 'LA BOTICA DEL HOSPITAL', 'JORGE 3995', '', '', '7'),
(40, 'REGINA', 'AV. SAN MARTIN 2185', '', '', '7'),
(41, 'CIVITILLO', 'REP. ARGENTINA 2143', '', '', '7'),
(42, 'VARGAS', 'LERROUX 2030', '', '', '7'),
(43, 'LEUNDA', 'PTE. PERON Y ALTAMIRA', '', '', '7'),
(44, 'CEBALLOS', 'SARMIENTO Y RUTA 210', '422-129', '', '3'),
(45, 'GONZALEZ', 'PATRIA 33', '433-232', '', '3'),
(46, 'REID', 'MENDEZ Y 33 ORIENTALES', '434-170', '', '3'),
(47, 'MONTES VIVAS', 'H. YRIGOYEN 19599', '4297-3996', '', '3'),
(48, 'ACOSTA', 'AV. ALMAFUERTE 130', '420-257', '', '3'),
(49, 'KELLERTAS', 'SARMIENTO 74', '431-688', '', '3'),
(50, 'GLEW', 'RUTA 210 Y PCIA. DE SANTA FE ', '433-909', '', '3'),
(51, 'SUR GLEW', 'MIGUEL CANE 1267', '433-337', '', '3'),
(52, 'SLAPAK', 'SOMELLERA 565', '4294-1000', '', '2'),
(53, 'LOPEZ', 'SEGUI 834', '4294-4132', '', '2'),
(54, 'CALVO', 'ESPORA 600 ESQ. MITRE', '', '', '2'),
(55, 'FARMA 24', 'H. YRIGOYEN 13305', '', '', '2'),
(56, 'ADROGUE', 'PZA. ESPORA 32', '', '', '2'),
(57, 'PUNTO SALUD', 'BYNNON 3180', '4291-1291', '', '8'),
(58, 'NUEVA SEGUI', 'SEGUI 602 Y AVELLANEDA', '4214-1932', '', '2'),
(59, 'ORELLANO', 'AV. SAN MARTIN 1200', '4293-3575', '', '2'),
(60, 'CENTRAL', 'E. ADROGUE 1066', '4293-0215', '', '2'),
(61, 'MURO', 'B. Mitre 1901', '4294-0077', '', '8'),
(62, 'BELLARDI', 'AMENEDO 403', '4294-1822', '', '2'),
(63, 'BANCIELLA', 'AV. SAN MARTIN 306', '4293-0050', '', '2'),
(64, 'GROSSI', 'AV. ESPORA 97', '4214-2858', '', '2'),
(65, 'ALVAREZ (ADROGUE)', 'Capitan F. Moyano 1315', '4293-4208', '', '2'),
(66, 'ESPORA', 'AV. ESPORA 1119', '4294-1399', '', '2'),
(67, 'DI MARCO', 'GORRITI 565', '4293-1457', '', '2'),
(68, 'CEIJA', 'J. Calvo 973', '4214-0619', '', '8'),
(70, 'VACCARO', 'AMENEDO 2198', '4294-2203', '', '8'),
(71, 'DIAZ', 'BYNNON', '', '', '8'),
(72, 'LURAGHI', 'BOUCHARD 2241', '', '', '8'),
(73, 'FASER', 'BYNNON 3648', '4236-9313', '', '8'),
(74, 'BOZZOLA', '20 DE SEPTIEMBRE 140', '4291-1293', '', '8'),
(75, 'CASACCHIA SASSONE', 'BYNNON 2250', '', '', '8'),
(76, 'ANTIGUA CASTAGNINO', 'BUENOS AIRES 611', '', '', '9'),
(77, 'D´ERRICO', 'BERLIN Y SARMIENTO', '', '', '9'),
(78, 'FULCHI', 'BERLIN 188', '', '', '9'),
(79, 'LUJILDE', 'ALSINA 838', '', '', '9'),
(80, 'PAZZAGLINI', 'AV. H. YRIGOYEN 17558', '', '', '9'),
(81, 'NUEVA FULCHI', 'BOULOGNE SUR MER 1311', '', '', '9'),
(82, 'NUEVA LONGCHAMPS', 'LA AVIACION 991', '', '', '9'),
(83, 'RUTA', 'AV. 25 DE MAYO 895 (Mtro. Rivadavia)', '', '', '9'),
(84, 'YOKO', 'CARLOS DIEHL 2883 (Rayo de Sol)', '', '', '9'),
(85, 'GURTUBAY', 'DOCTOR KELLERTAS 727', '', '', '9'),
(86, 'ALVAREZ*(San Jose)', 'JUJUY ESQ. VERTIZ ', '', '', '1'),
(87, 'BRUNETTI', 'SALTA 2072', '', '', '1'),
(89, 'PIÑOL ( San Jose )', 'SALTA', '', '', '1'),
(90, 'BAZYLUK', 'Divisoria 2678 e/ San Juan y De Heredia', '4264-9128', '', '1'),
(91, 'AYALA', 'Santa Ana 572 esq. Garay', '4269-7366', '', '1'),
(92, 'MUÑIZ', 'Salta 501 ( Ex Busquet )', '4264-3220', '', '1'),
(93, 'COLOMBINI', 'Salta 1300', '4291-4586', '', '1'),
(94, 'ARASAKY', 'San Martín 5241', '', '', '1'),
(95, 'MACCO', '30 de Septiembre esq. Rio Negro', '', '', '1'),
(96, 'MUÑOZ', 'Catamarca y San Martín', '4291-0160', '', '1'),
(97, 'DRANOVSEK', 'salta 1667', '', '', '1'),
(98, 'LLANO', 'Los Eucaliptus 259 ( Ex Catamarca )', '', '', '1'),
(99, 'AIMAR', 'E. Perón 3502 ( Ex Pasco)', '4260-0021', '', '1'),
(100, 'MANTEIGA', 'Salta 1000', '4264-2234', '', '1'),
(105, 'ALVAREZ (San Jose)', 'Pio Collivadino 420', '', '', '1'),
(103, 'JAIME', 'Churrinche 3799 esq. Benteveo', '4269-9291', '', '1'),
(106, 'SAVY', 'EREZCANO Y RAMIREZ 1900', '', '', '8'),
(112, 'MENDEZ', 'FALUCHO 5497', '', '', '7'),
(111, 'MIRALTA', 'Gorriti Nº3000 y Altamira', '', '', '7'),
(113, 'MIRANDA', 'MIGUEL CANE 240', '', '', '3'),
(114, 'MODERNA', 'Av. Chiesa 770', '', '', '9'),
(115, 'DEMETER', 'S. ANA 1913', '20107610', '', '1'),
(116, 'DASIV', 'AMENEDO Nº2198', '', '', '8');

-- --------------------------------------------------------

--
-- Table structure for table `t_zona`
--

CREATE TABLE `t_zona` (
  `idZ` int(11) NOT NULL,
  `Zona` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `t_zona`
--

INSERT INTO `t_zona` (`idZ`, `Zona`) VALUES
(1, 'SAN JOSE'),
(2, 'ADROGUE'),
(3, 'GLEW'),
(5, 'CLAYPOLE'),
(6, 'BURZACO'),
(7, 'R.CALZADA'),
(8, 'J.MARMOL'),
(9, 'LONGCHAMPS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_f`
--
ALTER TABLE `t_f`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `t_zona`
--
ALTER TABLE `t_zona`
  ADD PRIMARY KEY (`idZ`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_f`
--
ALTER TABLE `t_f`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `t_zona`
--
ALTER TABLE `t_zona`
  MODIFY `idZ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
