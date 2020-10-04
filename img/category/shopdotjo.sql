-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 02:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdotjo`
--

-- --------------------------------------------------------

--
-- Table structure for table `additions`
--

CREATE TABLE `additions` (
  `id` int(4) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ItemId` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `additions`
--

INSERT INTO `additions` (`id`, `Name`, `ItemId`) VALUES
(1, 'gpor', 3),
(2, 'usvu', 4),
(3, 'nywc', 5),
(4, 'uyvg', 6),
(5, 'zyxn', 7),
(6, 'dyhm', 8),
(7, 'laxk', 9),
(8, 'nzdu', 10),
(9, 'tors', 11),
(10, 'dsyt', 12),
(11, 'jxic', 13),
(12, 'bwyt', 14),
(13, 'xcux', 15),
(14, 'kvhr', 16),
(15, 'gdmj', 17),
(16, 'oaec', 18),
(17, 'tpqe', 19),
(18, 'qahg', 20),
(19, 'ckls', 21),
(20, 'zsmv', 22),
(21, 'yvxe', 23),
(22, 'jvnl', 24),
(23, 'dpfn', 25),
(24, 'nzni', 26),
(25, 'smxb', 27),
(26, 'tvau', 28),
(27, 'snuu', 29),
(28, 'qgan', 30),
(29, 'wdio', 31),
(30, 'qogj', 32),
(31, 'razv', 33),
(32, 'nhmw', 34),
(33, 'tbnc', 35),
(34, 'asao', 36),
(35, 'rsrq', 37),
(36, 'hweu', 38),
(37, 'nwyp', 39),
(38, 'ehpw', 40),
(39, 'lbbl', 41),
(40, 'xuhv', 42),
(41, 'jxdb', 43),
(42, 'weww', 44),
(43, 'vhna', 45),
(44, 'loon', 46),
(45, 'ogeh', 47),
(46, 'eelv', 48),
(47, 'chbb', 49),
(48, 'fups', 50),
(49, 'sylf', 51),
(50, 'bwdi', 52),
(51, 'fnvd', 53),
(52, 'jbos', 54),
(53, 'zqsx', 55),
(54, 'guax', 56),
(55, 'uucs', 57),
(56, 'pdux', 58),
(57, 'jokn', 59),
(58, 'jyye', 60),
(59, 'fdix', 61),
(60, 'oiuv', 62),
(61, 'piak', 63),
(62, 'miis', 64),
(63, 'drdy', 65),
(64, 'orvs', 66),
(65, 'xqfc', 67),
(66, 'eefl', 68),
(67, 'mfts', 69),
(68, 'dykj', 70),
(69, 'szuj', 71),
(70, 'kpfv', 72),
(71, 'cbnv', 73),
(72, 'umeh', 74),
(73, 'ddmw', 75),
(74, 'ifxp', 76),
(75, 'yexu', 77),
(76, 'atqe', 78),
(77, 'svzo', 79),
(78, 'calp', 80),
(79, 'arbz', 81),
(80, 'wcro', 82),
(81, 'fpcs', 83),
(82, 'fuqe', 84),
(83, 'kwsb', 85),
(84, 'ymsb', 86),
(85, 'piyo', 87),
(86, 'uuoe', 88),
(87, 'fhcm', 89),
(88, 'nymd', 90),
(89, 'kyfp', 91),
(90, 'jdkd', 92),
(91, 'xvbu', 93),
(92, 'auip', 94),
(93, 'isyc', 95),
(94, 'gaet', 96),
(95, 'ksdu', 97),
(96, 'pttn', 98),
(97, 'bazs', 99),
(98, 'txtf', 100),
(99, 'kesb', 101),
(100, 'lqmg', 102);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `FName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AdminKey` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FName`, `LName`, `AdminKey`, `Email`, `Phone`, `Photo`) VALUES
(160, 'rblb', 'lysj', 'ksdo', 'mqvp', '830', ''),
(161, 'urdx', 'eiwi', 'avzq', 'pnba', '973165543', ''),
(162, 'brnb', 'soud', 'dynk', 'muyt', '', ''),
(163, 'cfqj', 'dhtx', 'awuf', 'acog', '21620', ''),
(164, 'tgwq', 'sofj', 'tvba', 'cynm', '863', ''),
(165, 'pkus', 'krlo', 'vrjw', 'dcek', '', ''),
(166, 'xhmh', 'uian', 'nquu', 'cvde', '804270023', ''),
(167, 'wtml', 'sqar', 'xenc', 'mhxq', '37', ''),
(168, 'qnxi', 'cwks', 'gawt', 'vsij', '', ''),
(169, 'ixlo', 'qvmh', 'usod', 'hxox', '', ''),
(170, 'gtak', 'buqs', 'wkqw', 'vuxw', '67589312', ''),
(171, 'bwts', 'hllb', 'uuna', 'dkaf', '24', 'img/profile/admin/171.gif'),
(172, 'kknr', 'xhda', 'qywj', 'esde', '735460826', ''),
(173, 'ddbb', 'hzfx', 'kmta', 'tcti', '35894036', ''),
(174, 'sbxh', 'njcr', 'oowc', 'znru', '315208860', 'img/profile/admin/174.jpg'),
(175, 'vphr', 'psfl', 'zaxq', 'hitt', '825', ''),
(176, 'nywh', 'omfh', 'noan', 'znwh', '159953', ''),
(177, 'zgeh', 'mfuh', 'ttrc', 'tqll', '8', ''),
(178, 'nlmm', 'wrzd', 'dnav', 'lobo', '', ''),
(179, 'lchb', 'vqlt', 'znec', 'spct', '1109', 'img/profile/admin/179.jpg'),
(180, 'yqrf', 'pykb', 'qwau', 'vwbc', '67', ''),
(181, 'djul', 'lqos', 'mxiu', 'yynd', '7', ''),
(182, 'guhz', 'xsra', 'sheo', 'dcfu', '955', ''),
(183, 'qmje', 'sxia', 'thlp', 'vvjy', '9362', ''),
(184, 'sibr', 'xkek', 'eutp', 'tyql', '85289853', ''),
(185, 'luch', 'nphd', 'iqum', 'aswj', '4072878', ''),
(186, 'spzj', 'mlni', 'owah', 'fput', '225', ''),
(187, 'jwkk', 'atqt', 'lfkl', 'mcvi', '69', ''),
(188, 'kprm', 'ocyo', 'xqnz', 'xnlz', '254305', ''),
(189, 'mwkv', 'kzua', 'tfrp', 'czvg', '3531', ''),
(190, 'ymjq', 'joui', 'jrza', 'knak', '161', ''),
(191, 'fbkk', 'ndkz', 'krmo', 'pzrk', '95710299', ''),
(192, 'ubji', 'ylgo', 'mgdm', 'gnug', '740319', ''),
(193, 'vdwr', 'wjmr', 'masc', 'mgtx', '49328616', ''),
(194, 'rshm', 'lcpw', 'zuvb', 'lzhj', '', ''),
(195, 'solc', 'oiqw', 'ckbl', 'fgwf', '43404', ''),
(196, 'yvas', 'ntiu', 'zfku', 'tktc', '78199', ''),
(197, 'bthv', 'vkev', 'udti', 'bmsb', '54', ''),
(198, 'rans', 'lpah', 'oyve', 'ybep', '53852276', ''),
(199, 'vdat', 'sdqs', 'mtuf', 'tdza', '54289200', ''),
(200, 'cqot', 'rmtg', 'lrlg', 'xjhg', '85939', ''),
(201, 'bynr', 'vvso', 'veks', 'hcgq', '394851060', ''),
(202, 'jpiw', 'itha', 'bzws', 'vrml', '5', ''),
(203, 'pifn', 'ujbw', 'wpqq', 'hjhu', '', ''),
(204, 'eoro', 'gwkw', 'usnt', 'ezyw', '306', ''),
(205, 'idka', 'sypv', 'ftac', 'gvji', '8556530', ''),
(206, 'ywzj', 'vgnz', 'ajhl', 'ghbs', '532', ''),
(207, 'ybvc', 'zukm', 'wswe', 'unpp', '4596157', ''),
(208, 'hzwb', 'eqjx', 'kthx', 'mzyi', '2604', ''),
(209, 'wvsi', 'jcci', 'dfnm', 'jyqw', '95916', ''),
(210, 'sipi', 'boob', 'bqam', 'cila', '969063552', ''),
(211, 'vsuh', 'isyr', 'fcxq', 'qhsd', '27488064', ''),
(212, 'wpug', 'sakc', 'avif', 'tpum', '', ''),
(213, 'jgyk', 'nrat', 'iaxu', 'kywn', '661622', ''),
(214, 'pyhr', 'fsyn', 'csbo', 'etlb', '76618534', ''),
(215, 'gbud', 'vwwm', 'igci', 'rwko', '80964', ''),
(216, 'jvyi', 'xoau', 'kvmt', 'fiyn', '', ''),
(217, 'zabv', 'eoci', 'jbmg', 'lzhz', '388932', ''),
(218, 'tqka', 'qzjo', 'lnmx', 'cpke', '751148066', ''),
(219, 'tckm', 'xllf', 'jqhr', 'gpxp', '', ''),
(220, 'owbp', 'bjby', 'mxrx', 'ygfe', '24', ''),
(221, 'gsfo', 'nzsp', 'pwlf', 'popw', '952687559', ''),
(222, 'kusp', 'qhhb', 'pibw', 'fyeh', '', ''),
(223, 'zhoi', 'rhsm', 'lywu', 'npph', '95729', ''),
(224, 'xwcc', 'qkvo', 'xulx', 'zrdi', '384', ''),
(225, 'lwee', 'ecvq', 'kxkc', 'mxhu', '77467212', ''),
(226, 'drve', 'urlw', 'dioe', 'lrfh', '470205214', ''),
(227, 'ooqy', 'gzcg', 'nauv', 'zjch', '165272', ''),
(228, 'leos', 'fnvm', 'ycap', 'fbnx', '', ''),
(229, 'xxex', 'rzte', 'kzar', 'olrs', '196', ''),
(230, 'bvet', 'pyny', 'pnlt', 'xvlq', '4261571', ''),
(231, 'cwsl', 'mzok', 'uilb', 'coht', '243279', ''),
(232, 'gggs', 'bfom', 'jmtt', 'qahl', '971351', ''),
(233, 'artm', 'hoqn', 'spne', 'scna', '705144739', ''),
(234, 'vsrr', 'bbqn', 'fhod', 'jvsr', '9', ''),
(235, 'tyrj', 'nllg', 'vkza', 'vwip', '531737', ''),
(236, 'sawv', 'urbk', 'otgp', 'xlfi', '8552922', ''),
(237, 'kadp', 'ebcp', 'lhrw', 'yucq', '', ''),
(238, 'puni', 'irea', 'ivqm', 'blol', '58985211', ''),
(239, 'qxqb', 'glen', 'becv', 'kjov', '697080', ''),
(240, 'rccp', 'xipc', 'khyp', 'cnco', '710361', ''),
(241, 'wgef', 'fhst', 'nppy', 'plnu', '312189958', ''),
(242, 'dlre', 'flxi', 'hndm', 'opjd', '', ''),
(243, 'ulks', 'uypv', 'bdkr', 'ozqr', '2988037', ''),
(244, 'glyn', 'qwbo', 'xlci', 'bsqu', '', ''),
(245, 'frrf', 'dkrs', 'qqqi', 'nmbe', '7403', ''),
(246, 'ncki', 'uuit', 'fssf', 'httc', '', ''),
(247, 'wdef', 'rgwv', 'jsxg', 'vwaj', '2', ''),
(248, 'dhpx', 'nhzy', 'jbxe', 'jeag', '2129', ''),
(249, 'dhjj', 'tqck', 'xumf', 'rebk', '7972', ''),
(250, 'dflk', 'kewr', 'kguk', 'miau', '', ''),
(251, 'kxbc', 'esmo', 'yzlk', 'trxf', '9060', ''),
(252, 'vmwz', 'iyju', 'ljnx', 'dqoz', '485', ''),
(253, 'lvkl', 'jqdi', 'wpvy', 'wffy', '43598', ''),
(254, 'ueeh', 'tqnr', 'mexh', 'glrd', '2', ''),
(255, 'chva', 'xjhj', 'hchm', 'fuyo', '803292354', ''),
(256, 'zyrx', 'dhbn', 'answ', 'nfgo', '1200908', ''),
(257, 'anew', 'kpwk', 'zixg', 'wtrm', '75604', ''),
(258, 'yvwo', 'zzuh', 'xltj', 'mhrm', '9', ''),
(259, 'vbku', 'mbtv', 'npkj', 'aqxc', '33', '');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(4) NOT NULL,
  `Brand` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SubBrand` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `model` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `Brand`, `SubBrand`, `model`) VALUES
(102, 'apyv', 'rjqr', 0),
(103, 'npxz', 'rmjx', 42),
(104, 'sdod', 'hmbf', 9182),
(105, 'bcxz', 'xnmj', 0),
(106, 'zxud', 'dkfm', 5),
(107, 'omlq', 'hnda', 98),
(108, 'rozc', 'hajq', 0),
(109, 'ycay', 'jvvx', 1048663),
(110, 'kpbq', 'sccp', 26),
(111, 'thtn', 'lnol', 33406563),
(112, 'odnh', 'alln', 1770458),
(113, 'inbs', 'kxrh', 387086),
(114, 'dzgq', 'lqkm', 30),
(115, 'yxev', 'aoaz', 8993867),
(116, 'kcjg', 'kdmr', 328695),
(117, 'wkfb', 'dafa', 64789),
(118, 'pupz', 'bjrx', 4196370),
(119, 'kokl', 'ckdr', 90324631),
(120, 'gfgu', 'lpsl', 945259),
(121, 'fuas', 'vzmp', 65),
(122, 'vmsh', 'glnj', 1940),
(123, 'jhuf', 'mofv', 9702734),
(124, 'lzra', 'zhbi', 71764272),
(125, 'nloa', 'ptsv', 62513),
(126, 'yels', 'iscr', 83406039),
(127, 'yjnp', 'liwo', 198889171),
(128, 'cnhd', 'wpvf', 387072),
(129, 'xzly', 'bdza', 4864),
(130, 'mqve', 'qgyu', 68520928),
(131, 'kgot', 'ufog', 216),
(132, 'dlpz', 'orat', 0),
(133, 'nsin', 'wqqz', 3621),
(134, 'ithe', 'hyph', 3340),
(135, 'ykrc', 'fpin', 7),
(136, 'hszn', 'dmjd', 4624137),
(137, 'anuj', 'hppz', 8861592),
(138, 'deep', 'gamx', 5291),
(139, 'uafv', 'xxca', 40),
(140, 'ejmz', 'qkpe', 60),
(141, 'kgoc', 'tclb', 97874),
(142, 'zyvb', 'ngol', 832325156),
(143, 'pjcm', 'cyvl', 6015),
(144, 'nanx', 'oejq', 23365),
(145, 'kcxm', 'myvw', 3),
(146, 'gygk', 'auqs', 0),
(147, 'edeu', 'pnbd', 51),
(148, 'lqmz', 'syly', 5),
(149, 'fddb', 'gvpn', 14183937),
(150, 'xqfk', 'vkul', 82995),
(151, 'jcmk', 'rric', 0),
(152, 'xbgl', 'ndfs', 87104834),
(153, 'czbh', 'jwuy', 6532907),
(154, 'wowp', 'alwt', 0),
(155, 'pzzt', 'tpvc', 14),
(156, 'dgeu', 'azvx', 95),
(157, 'polt', 'rfko', 12),
(158, 'oujo', 'mphw', 569),
(159, 'ohwc', 'ihzp', 320),
(160, 'qzcv', 'vout', 74),
(161, 'ggbc', 'jloq', 5819963),
(162, 'nlwp', 'oduo', 947696450),
(163, 'tmlq', 'yuyb', 953666),
(164, 'gjyl', 'mqtd', 90),
(165, 'obex', 'kxwj', 713132112),
(166, 'ndkw', 'fsrb', 7520619),
(167, 'gltf', 'zzzw', 951),
(168, 'bvwb', 'osgt', 0),
(169, 'kafr', 'iali', 37),
(170, 'vovh', 'zgmt', 690),
(171, 'xdbj', 'ltob', 3681),
(172, 'wrpc', 'ktap', 3966),
(173, 'ewea', 'drbs', 3276351),
(174, 'unpd', 'wpgs', 0),
(175, 'zrpe', 'tnbr', 15482481),
(176, 'gedm', 'rwtm', 0),
(177, 'emcg', 'yljo', 37),
(178, 'dljh', 'iabx', 641725),
(179, 'dqvv', 'ljwy', 7),
(180, 'diph', 'ufdx', 47112470),
(181, 'evrl', 'rhjg', 949),
(182, 'wpbn', 'wmqg', 3550),
(183, 'skqz', 'cvnl', 84582568),
(184, 'fpjn', 'rpgo', 5607),
(185, 'lzoh', 'azff', 90176),
(186, 'lmxf', 'cwel', 406220944),
(187, 'weln', 'ifbx', 0),
(188, 'vafj', 'adwd', 84533395),
(189, 'thnh', 'ziyj', 5370),
(190, 'clpw', 'jnkx', 14181504),
(191, 'dede', 'lazz', 449528820),
(192, 'enqq', 'isye', 8306190),
(193, 'wvcc', 'ijpi', 4867585),
(194, 'nzip', 'ojcf', 7),
(195, 'jwwx', 'knzg', 44),
(196, 'bnrl', 'okln', 0),
(197, 'jdpd', 'berp', 905408),
(198, 'rysw', 'wohx', 75936),
(199, 'zivu', 'iuzi', 743461),
(200, 'yynl', 'jyjm', 722),
(201, 'tcof', 'emoj', 668161112);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `Name`, `Photo`) VALUES
(52, 'rycs', 'img/category/image3.png'),
(53, 'kvyz', 'img/category/image3.png'),
(54, 'zcen', 'img/category/image3.png'),
(55, 'bqlo', 'img/category/image3.png'),
(56, 'adkp', 'img/category/image3.png'),
(57, 'novw', 'img/category/image3.png'),
(58, 'pjck', 'img/category/image3.png'),
(59, 'orda', 'img/category/image3.png'),
(60, 'rtrd', 'img/category/image3.png'),
(61, 'cobs', 'img/category/image3.png'),
(62, 'eqvw', 'img/category/image3.png'),
(63, 'qmfj', 'img/category/image3.png'),
(64, 'hiyx', 'img/category/image3.png'),
(65, 'bdrl', 'img/category/image3.png'),
(66, 'cwea', 'img/category/image3.png'),
(67, 'gfiy', 'img/category/image3.png'),
(68, 'koyn', 'img/category/image3.png'),
(69, 'zjoz', 'img/category/image3.png'),
(70, 'prmm', 'img/category/image3.png'),
(71, 'oqag', 'img/category/image3.png'),
(72, 'ffur', 'img/category/image3.png'),
(73, 'btxi', 'img/category/image3.png'),
(74, 'ytkd', 'img/category/image3.png'),
(75, 'cerb', 'img/category/image3.png'),
(76, 'hcgh', 'img/category/image4.jpg'),
(77, 'sqyk', 'img/category/image4.jpg'),
(78, 'lego', 'img/category/image4.jpg'),
(79, 'azaj', 'img/category/image4.jpg'),
(80, 'ipel', 'img/category/80.jpg'),
(81, 'rsnv', 'img/category/8.jpg'),
(82, 'sdfw', 'img/category/image4.jpg'),
(83, 'bmtk', 'img/category/image4.jpg'),
(84, 'sgsj', 'img/category/image4.jpg'),
(85, 'gpvb', 'img/category/image4.jpg'),
(86, 'dvav', 'img/category/image4.jpg'),
(87, 'whjz', 'img/category/image4.jpg'),
(88, 'ijuf', 'img/category/image4.jpg'),
(89, 'vchv', 'img/category/image4.jpg'),
(90, 'pixz', 'img/category/image4.jpg'),
(91, 'phvf', 'img/category/image4.jpg'),
(92, 'bstp', 'img/category/image4.jpg'),
(93, 'nbfl', 'img/category/image4.jpg'),
(94, 'hisz', 'img/category/image4.jpg'),
(95, 'onxy', 'img/category/image4.jpg'),
(96, 'aifq', 'img/category/image4.jpg'),
(97, 'qebd', 'img/category/image4.jpg'),
(98, 'jgip', 'img/category/image4.jpg'),
(99, 'gezg', 'img/category/image4.jpg'),
(100, 'btlk', 'img/category/100.jpg'),
(101, 'rpeq', 'img/category/image4.jpg'),
(102, 'lbal', 'img/category/image4.jpg'),
(103, 'nxyw', 'img/category/image4.jpg'),
(104, 'kifm', 'img/category/image4.jpg'),
(105, 'oztf', 'img/category/105.jpg'),
(106, 'mflt', 'img/category/image4.jpg'),
(107, 'zubr', 'img/category/image4.jpg'),
(108, 'eijw', 'img/category/image4.jpg'),
(109, 'nbfp', 'img/category/image4.jpg'),
(110, 'jqpe', 'img/category/image4.jpg'),
(111, 'soes', 'img/category/image4.jpg'),
(112, 'hlid', 'img/category/image4.jpg'),
(113, 'eqeq', 'img/category/image4.jpg'),
(114, 'vycd', 'img/category/image4.jpg'),
(115, 'ojee', 'img/category/image4.jpg'),
(116, 'oioy', 'img/category/image4.jpg'),
(117, 'axct', 'img/category/image4.jpg'),
(118, 'sjzj', 'img/category/image4.jpg'),
(119, 'wqht', 'img/category/image4.jpg'),
(120, 'zmiv', 'img/category/image4.jpg'),
(121, 'lmbm', 'img/category/image4.jpg'),
(122, 'tbak', 'img/category/image4.jpg'),
(123, 'qrob', 'img/category/image4.jpg'),
(124, 'sjdh', 'img/category/image4.jpg'),
(125, 'qkmn', 'img/category/image4.jpg'),
(126, 'qrzc', 'img/category/image4.jpg'),
(127, 'awcu', 'img/category/image4.jpg'),
(128, 'flvk', 'img/category/image4.jpg'),
(129, 'itsw', 'img/category/image4.jpg'),
(130, 'hmjy', 'img/category/image4.jpg'),
(131, 'kgnq', 'img/category/image4.jpg'),
(132, 'eqcp', 'img/category/image4.jpg'),
(133, 'deqg', 'img/category/image4.jpg'),
(134, 'rylq', 'img/category/image4.jpg'),
(135, 'qqgb', 'img/category/image4.jpg'),
(136, 'pelg', 'img/category/image4.jpg'),
(137, 'vuim', 'img/category/image4.jpg'),
(138, 'bunz', 'img/category/image4.jpg'),
(139, 'xevx', 'img/category/image4.jpg'),
(140, 'wfri', 'img/category/image4.jpg'),
(141, 'biqm', 'img/category/image4.jpg'),
(142, 'lctx', 'img/category/image4.jpg'),
(143, 'idlo', 'img/category/image4.jpg'),
(144, 'eqpl', 'img/category/image4.jpg'),
(145, 'rhof', 'img/category/image4.jpg'),
(146, 'fqbg', 'img/category/image4.jpg'),
(147, 'rkxe', 'img/category/image4.jpg'),
(148, 'blvx', 'img/category/image4.jpg'),
(149, 'vhsz', 'img/category/image4.jpg'),
(150, 'ozwn', 'img/category/image4.jpg'),
(151, 'urhb', 'img/category/image4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(15) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Value` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ItemId` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `Name`, `Value`, `ItemId`) VALUES
(1, 'qtxd', '282', 3),
(2, 'roah', '288', 4),
(3, 'qhkq', '958', 5),
(4, 'xjgl', '695', 6),
(5, 'nijq', '917', 7),
(6, 'uoum', '012', 8),
(7, 'ndds', '820', 9),
(8, 'gesy', '674', 10),
(9, 'iocu', '084', 11),
(10, 'pqhk', '226', 12),
(11, 'oypz', '514', 13),
(12, 'aykt', '727', 14),
(13, 'fvbf', '430', 15),
(14, 'fmfa', '843', 16),
(15, 'qvok', '403', 17),
(16, 'iogb', '876', 18),
(17, 'bmxt', '052', 19),
(18, 'yslg', '775', 20),
(19, 'pnoh', '341', 21),
(20, 'hejz', '536', 22),
(21, 'mlsa', '291', 23),
(22, 'fghf', '250', 24),
(23, 'izih', '524', 25),
(24, 'mgof', '211', 26),
(25, 'fmda', '333', 27),
(26, 'upvg', '243', 28),
(27, 'esnf', '428', 29),
(28, 'qnsu', '091', 30),
(29, 'hlbr', '978', 31),
(30, 'yrwg', '647', 32),
(31, 'tiuk', '970', 33),
(32, 'nwgb', '023', 34),
(33, 'lcgo', '590', 35),
(34, 'ycfv', '111', 36),
(35, 'rrls', '604', 37),
(36, 'dsdu', '917', 38),
(37, 'ndbl', '025', 39),
(38, 'nqrv', '263', 40),
(39, 'gvhh', '844', 41),
(40, 'fxea', '600', 42),
(41, 'tzvg', '700', 43),
(42, 'ppqz', '161', 44),
(43, 'ospk', '640', 45),
(44, 'mgmm', '276', 46),
(45, 'avfg', '208', 47),
(46, 'ixja', '180', 48),
(47, 'gtlg', '191', 49),
(48, 'eozb', '021', 50),
(49, 'uquu', '754', 51),
(50, 'cjam', '189', 52),
(51, 'vbpp', '555', 53),
(52, 'inbr', '587', 54),
(53, 'uioo', '794', 55),
(54, 'rdhy', '888', 56),
(55, 'gelw', '698', 57),
(56, 'ayjc', '135', 58),
(57, 'fije', '830', 59),
(58, 'vvkv', '168', 60),
(59, 'hauq', '037', 61),
(60, 'ruyi', '690', 62),
(61, 'xqwh', '835', 63),
(62, 'qgzl', '233', 64),
(63, 'ufvh', '155', 65),
(64, 'typu', '666', 66),
(65, 'wulx', '563', 67),
(66, 'wdzk', '113', 68),
(67, 'tobt', '953', 69),
(68, 'msty', '939', 70),
(69, 'mujd', '006', 71),
(70, 'nkua', '167', 72),
(71, 'ijlg', '553', 73),
(72, 'afcd', '426', 74),
(73, 'ufpb', '977', 75),
(74, 'yysb', '541', 76),
(75, 'inau', '170', 77),
(76, 'inoj', '013', 78),
(77, 'lrfd', '716', 79),
(78, 'eqvn', '621', 80),
(79, 'ttyf', '835', 81),
(80, 'sccs', '044', 82),
(81, 'ghih', '619', 83),
(82, 'mleo', '777', 84),
(83, 'djbj', '778', 85),
(84, 'qfbp', '342', 86),
(85, 'wzxd', '278', 87),
(86, 'ggga', '174', 88),
(87, 'obpk', '622', 89),
(88, 'dnjj', '909', 90),
(89, 'hibs', '690', 91),
(90, 'zbvi', '630', 92),
(91, 'wdne', '214', 93),
(92, 'hmha', '129', 94),
(93, 'mgqn', '205', 95),
(94, 'ihkw', '213', 96),
(95, 'vekv', '438', 97),
(96, 'yswa', '780', 98),
(97, 'nhbm', '581', 99),
(98, 'xkdx', '865', 100),
(99, 'gfmo', '846', 101),
(100, 'cuif', '107', 102);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `FName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `FName`, `LName`, `PhoneNumber`, `Address`, `DOB`, `Gender`, `Email`, `Photo`) VALUES
(1, 'qdyh', 'zrlx', '58253554', 'efkp', '1996-06-01', '', 'lvvt', NULL),
(2, 'imek', 'nhtg', '', 'fnou', '1997-12-26', '', 'kbus', NULL),
(3, 'zxpd', 'ooxs', '93579', 'kmky', '2005-04-10', '', 'ehtf', NULL),
(4, 'xcho', 'mlop', '4677663', 'gaby', '1999-07-10', '', 'fovn', NULL),
(5, 'nlfx', 'idjx', '8', 'wqiy', '2017-12-04', '', 'mwjp', NULL),
(6, 'muun', 'iodk', '16191', 'jhfk', '1985-03-17', '', 'raed', NULL),
(7, 'jdvb', 'jzbg', '5', 'ojne', '1979-09-14', '', 'qygp', NULL),
(8, 'wsbo', 'dxpr', '1077046', 'txwe', '1995-06-29', '', 'qnzw', NULL),
(9, 'vxsz', 'yfky', '54', 'drck', '1984-12-14', '', 'edbt', NULL),
(10, 'oeqw', 'jcsy', '20202', 'bqhm', '2020-01-24', '', 'zebe', NULL),
(11, 'fuhs', 'ajys', '594124178', 'icjs', '1991-01-06', '', 'ufcm', NULL),
(12, 'svxs', 'gxvb', '333785139', 'nzdj', '2011-07-09', '', 'cwtc', NULL),
(13, 'nbyi', 'cikf', '35703163', 'wniv', '1980-09-24', '', 'rbok', NULL),
(14, 'wenz', 'czgf', '9', 'ecia', '2019-07-26', '', 'jihb', NULL),
(15, 'rmvi', 'vwxa', '596', 'izhh', '1985-10-12', '', 'ghhu', NULL),
(16, 'fcrd', 'rofc', '365881', 'vdmf', '1980-04-04', '', 'qwcy', NULL),
(17, 'kunv', 'ltmh', '348', 'cafr', '2003-05-05', '', 'mcss', NULL),
(18, 'hlfn', 'opch', '838', 'xiui', '1976-02-02', '', 'geby', NULL),
(19, 'cyjr', 'xmux', '7076', 'wkzb', '1994-03-02', '', 'bzih', NULL),
(20, 'vmbr', 'tjxr', '88310', 'fyfb', '1984-06-03', '', 'spfr', NULL),
(21, 'qtwr', 'ksfn', '996730', 'tfpv', '2016-12-13', '', 'frkj', NULL),
(22, 'btdj', 'efvz', '42733', 'afxn', '1993-12-08', '', 'zmdu', NULL),
(23, 'xsmz', 'culu', '94', 'ejxx', '2006-10-08', '', 'ilbs', NULL),
(24, 'mgcy', 'fqis', '65', 'dwyy', '2001-05-09', '', 'moib', NULL),
(25, 'bavf', 'rnbe', '18922741', 'vleu', '1978-09-27', '', 'etmr', NULL),
(26, 'zkap', 'zncg', '73', 'dpfr', '1977-10-06', '', 'fxpm', NULL),
(27, 'qxta', 'txqz', '851', 'hsww', '2012-03-08', '', 'rwae', NULL),
(28, 'lrqw', 'eddy', '4986671', 'lnlu', '1985-03-19', '', 'dpia', NULL),
(29, 'gblf', 'obem', '32', 'hqab', '2003-12-23', '', 'gtyw', NULL),
(30, 'ptso', 'zawr', '63727', 'bopn', '1998-09-14', '', 'tgel', NULL),
(31, 'ilrt', 'huvz', '64021002', 'anee', '2015-08-03', '', 'pejm', NULL),
(32, 'ovqc', 'qwkj', '52479', 'tvdl', '1998-12-22', '', 'pvio', NULL),
(33, 'swqm', 'mjtw', '15337458', 'zvlw', '2015-08-31', '', 'zzug', NULL),
(34, 'viam', 'ztkr', '92552', 'ltdn', '2006-03-29', '', 'wbsj', NULL),
(35, 'jsrt', 'xwkd', '7', 'lujq', '2005-07-03', '', 'abcc', NULL),
(36, 'jxeh', 'kbtb', '191470', 'zkjf', '1997-04-26', '', 'jsbe', NULL),
(37, 'hike', 'aiwg', '234', 'hnjs', '2013-04-02', '', 'bfrr', NULL),
(38, 'dbas', 'nuah', '6', 'jcxl', '2007-01-23', '', 'sodi', NULL),
(39, 'cgpk', 'lwhb', '58933', 'nbzb', '2010-09-03', '', 'fkno', NULL),
(40, 'xdty', 'psnw', '16121801', 'spdd', '2015-11-19', '', 'raxc', NULL),
(41, 'vvzo', 'gtjo', '198', 'svan', '1973-08-04', '', 'ktae', NULL),
(42, 'awcz', 'zoek', '3', 'ptms', '1999-08-14', '', 'hvwv', NULL),
(43, 'iddk', 'vtxu', '2142', 'vqua', '1985-12-08', '', 'winn', NULL),
(44, 'tuwg', 'ezaz', '4342957', 'xcxx', '1983-06-20', '', 'ocwd', NULL),
(45, 'oevn', 'mrod', '92856244', 'zrsx', '2002-12-27', '', 'cpbq', NULL),
(46, 'eyxj', 'xcld', '31', 'rvnl', '1998-12-14', '', 'lcqs', NULL),
(47, 'swxq', 'qwvb', '3899962', 'yxeo', '2017-01-26', '', 'pxeg', NULL),
(48, 'ehgq', 'fnok', '391346', 'umsm', '1997-12-28', '', 'vqrp', NULL),
(49, 'suzo', 'pdwe', '23692914', 'lomb', '2014-01-13', '', 'dyec', NULL),
(50, 'jtcp', 'ardb', '665', 'jjoi', '2018-09-14', '', 'tdal', NULL),
(51, 'kqup', 'nczo', '4526', 'vxxn', '1974-05-23', '', 'svfe', NULL),
(52, 'pvsv', 'clii', '48', 'rabx', '1973-05-11', '', 'xpaf', NULL),
(53, 'vsii', 'gpsz', '753740304', 'tyrf', '1974-09-28', '', 'jixx', NULL),
(54, 'jevl', 'milm', '1702', 'sxde', '1972-01-01', '', 'fnll', NULL),
(55, 'issk', 'fhqy', '287', 'rpbp', '2015-11-12', '', 'nvdj', NULL),
(56, 'pmyz', 'asct', '9362657', 'cmwu', '1988-07-14', '', 'cwbd', NULL),
(57, 'vywt', 'foqj', '5369831', 'jahz', '2008-12-16', '', 'arau', NULL),
(58, 'hlfk', 'jglg', '2375505', 'bwip', '2008-12-02', '', 'lhff', NULL),
(59, 'lmmn', 'rbiq', '6235', 'yozx', '1985-07-17', '', 'lbng', NULL),
(60, 'iyfe', 'cjba', '318488', 'vlzf', '1986-01-03', '', 'xvxw', NULL),
(61, 'icxp', 'tfcr', '2', 'tvnw', '1991-01-18', '', 'qbpx', NULL),
(62, 'cxyw', 'zidg', '1', 'mxgs', '1990-12-05', '', 'vwjs', NULL),
(63, 'cxag', 'ptgw', '39', 'udqy', '2017-03-02', '', 'fgyb', NULL),
(64, 'onwn', 'vjnu', '948446393', 'vvpp', '2017-01-27', '', 'fuzz', NULL),
(65, 'jfth', 'gvsv', '934692370', 'ekun', '2005-09-27', '', 'minc', NULL),
(66, 'hilv', 'khbf', '27128753', 'pbgd', '1984-10-08', '', 'fuhk', NULL),
(67, 'unnk', 'bdih', '17820029', 'yfea', '2015-11-02', '', 'kctb', NULL),
(68, 'rgrk', 'marz', '87745619', 'otru', '1981-03-14', '', 'jqds', NULL),
(69, 'uemo', 'vjha', '4', 'mgtk', '2020-05-12', '', 'vqyu', NULL),
(70, 'fufy', 'odqm', '617', 'rilq', '2006-08-15', '', 'iucb', NULL),
(71, 'nlgj', 'rsvc', '4018', 'olpe', '2007-09-13', '', 'ijev', NULL),
(72, 'mjbt', 'fpwq', '75445', 'ekic', '1973-03-05', '', 'tjvq', NULL),
(73, 'zzia', 'aukf', '45804', 'qpmr', '1986-03-18', '', 'lrys', NULL),
(74, 'kabc', 'eqjb', '440145', 'htex', '2012-04-23', '', 'ujqu', NULL),
(75, 'glab', 'clas', '8739', 'coim', '1999-06-16', '', 'apxs', NULL),
(76, 'qbun', 'gpbv', '7673', 'ckra', '2019-10-25', '', 'ubbc', NULL),
(77, 'lfhv', 'sjvc', '560794025', 'xree', '1978-06-05', '', 'wopl', NULL),
(78, 'mncq', 'hxml', '12246', 'svpj', '2001-04-05', '', 'rbgz', NULL),
(79, 'qkyy', 'aikx', '44932755', 'jief', '1972-01-10', '', 'tspq', NULL),
(80, 'kawq', 'gvux', '355324', 'hygt', '1992-05-19', '', 'urlh', NULL),
(81, 'ddks', 'ughr', '46529', 'spcp', '2002-12-09', '', 'twjd', NULL),
(82, 'rkcn', 'xaoa', '4095405', 'auck', '1976-09-01', '', 'xvwg', NULL),
(83, 'tmie', 'djts', '3891068', 'wnev', '2001-06-10', '', 'nabi', NULL),
(84, 'tiyh', 'amta', '3797025', 'ojku', '1997-07-27', '', 'jjum', NULL),
(85, 'pfnn', 'szjy', '898289321', 'whtz', '1977-12-23', '', 'tvok', NULL),
(86, 'fgod', 'yrhl', '904226', 'gzxs', '2004-07-05', '', 'hhxs', NULL),
(87, 'kmbr', 'vqnl', '775241395', 'wxoo', '1971-02-26', '', 'ezgr', NULL),
(88, 'cxuy', 'aehe', '6170336', 'tvbr', '1980-01-11', '', 'uccp', NULL),
(89, 'yekf', 'vhsq', '27690', 'fpkd', '2016-08-08', '', 'mzek', NULL),
(90, 'sgja', 'xeqw', '225863', 'obgw', '1994-04-29', '', 'utml', NULL),
(91, 'asnx', 'mjdr', '45440007', 'ovsa', '1992-07-29', '', 'yaer', NULL),
(92, 'xdyu', 'xwxj', '79226', 'hjzx', '1978-02-10', '', 'qpsx', NULL),
(93, 'yvhc', 'uqyd', '7294', 'rrsk', '2017-11-03', '', 'grgj', NULL),
(94, 'yucr', 'gtlm', '630', 'zlyj', '2006-10-21', '', 'pcem', NULL),
(95, 'elcr', 'ytsf', '100045030', 'xzdw', '1995-04-07', '', 'wrvd', NULL),
(96, 'coks', 'yoyf', '62', 'rsre', '1979-10-28', '', 'cnbx', NULL),
(97, 'hbmu', 'tbpv', '36', 'badi', '2002-08-26', '', 'mcto', NULL),
(98, 'cbbd', 'vwog', '11969', 'uwzd', '2006-05-11', '', 'shcv', NULL),
(99, 'gwcg', 'uxnx', '720513', 'xqry', '1993-03-10', '', 'qsjf', NULL),
(100, 'xnnd', 'jpvi', '18654659', 'rbvf', '2007-03-28', '', 'ilaj', NULL),
(101, 'hussein', 'ayyad', '0795011274', '', '2020-09-28', 'f', 'husseinayyad70@gmail.com ', 'img/profile/customer/101.jpg'),
(102, 'soso', 'ads', '0785011274', '', '2016-09-28', 'f', 'User@gmail.com ', 'img/profile/customer_102.jpg'),
(121, 'hussein ', 'Ayyad ', '0795011271', '', '2020-09-29', 'F', 'husseinayyad30@gmail.com', 'img/profile/customer_121.jpg'),
(124, 'hussein ', 'Ayyad ', '0795011272', '', '2020-09-29', 'F', 'husseinayyad@gmail.com', 'img/profile/customer_124.jpg'),
(125, 'hussein ', 'Ayyad ', '0795011279', '', '2020-09-29', 'F', 'husseinayyad1@gmail.com', 'img/profile/customer_125.jpg'),
(128, 'hussein ', 'Ayyad ', '0795011221', '', '2020-09-29', 'F', 'husseinayya11@gmail.com', 'img/profile/customer_128.jpg'),
(129, 'heba ', 'heba', '0795411298', '', '2020-09-29', 'F', 'User10@gmail.com', 'img/profile/customer_129.jpg'),
(131, 'heba ', 'heba', '0795411291', '', '2020-09-29', 'F', 'User210@gmail.com', 'img/profile/customer_131.jpg'),
(133, 'heba ', 'heba', '0795411297', '', '2020-09-29', 'F', 'User20@gmail.com', 'img/profile/customer_133.jpg'),
(134, 'hussein', 'bassam', '0775011274', '', '2020-09-29', 'F', 'husseinayyadbassam70@gmail.com', ''),
(135, 'hussein', 'ayyad', '0772311456', '', '2020-09-29', 'F', 'ayyad2@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(4) NOT NULL,
  `FName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(100) DEFAULT NULL,
  `Address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HireDate` datetime NOT NULL DEFAULT current_timestamp(),
  `LicencePhoto1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LicencePhoto2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IdPhoto1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IdPhoto2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NonCriminalRecord` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CarAssigned` int(4) DEFAULT NULL,
  `AvgDeliveryTime` int(4) DEFAULT NULL,
  `CarColor` varchar(10) NOT NULL,
  `CarPlate` varchar(30) NOT NULL,
  `CarLicence1` varchar(100) NOT NULL,
  `CarLicence2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `FName`, `LName`, `PhoneNumber`, `Email`, `Photo`, `Address`, `DOB`, `Gender`, `HireDate`, `LicencePhoto1`, `LicencePhoto2`, `IdPhoto1`, `IdPhoto2`, `NonCriminalRecord`, `CarAssigned`, `AvgDeliveryTime`, `CarColor`, `CarPlate`, `CarLicence1`, `CarLicence2`) VALUES
(1, 'clxw', 'byus', '60052011', 'bxwa', NULL, 'ejtu', '2018-05-30', '', '2004-03-03 03:07:18', '', '', '', '', '', 102, NULL, 'ugmk', '4709.845393891', '151.376', '8693'),
(2, 'uosn', 'vnrd', '9252940', 'ziel', NULL, 'erbn', '2002-07-03', '', '1987-03-25 21:25:55', '', '', '', '', '', 103, NULL, 'hsop', '7362.236', '87697541.78', '472'),
(3, 'orli', 'vscp', '98735', 'fnnd', NULL, 'gagm', '2011-10-22', '', '1973-05-16 15:54:24', '', '', '', '', '', 104, NULL, 'uipv', '4642.544', '', ''),
(4, 'kosk', 'khnt', '14143', 'nses', NULL, 'plbp', '2006-02-20', '', '2018-08-28 04:27:47', '', '', '', '', '', 105, NULL, 'swpb', '50259.70523246', '', '13'),
(5, 'vozw', 'erzk', '46544', 'bjcp', NULL, 'mjxm', '1996-07-17', '', '1989-08-04 09:47:15', '', '', '', '', '', 106, NULL, 'nlvs', '65819.10356999', '20', ''),
(6, 'lvcd', 'preo', '424', 'icmo', NULL, 'cyws', '1976-10-06', '', '1983-07-16 09:05:48', '', '', '', '', '', 107, NULL, 'eacr', '65957318.1', '1164337', '45044'),
(7, 'slpk', 'ffhn', '38032', 'eigg', NULL, 'ukcj', '2009-11-28', '', '2018-10-11 11:07:08', '', '', '', '', '', 108, NULL, 'bwym', '48473.078811', '662485', '16'),
(8, 'ilac', 'ilbv', '363', 'qtfz', NULL, 'bdow', '2004-09-17', '', '1997-11-10 16:16:41', '', '', '', '', '', 109, NULL, 'jdwa', '9793.4393134', '80501.8', '6336351'),
(9, 'zxyi', 'bceq', '69', 'mujb', NULL, 'vpzq', '2008-09-19', '', '1980-10-15 18:02:19', '', '', '', '', '', 110, NULL, 'qkdu', '15322592.5', '110.711195769', '42288'),
(10, 'wwmm', 'bawx', '62', 'fpst', NULL, 'eoct', '1976-02-24', '', '2017-01-22 09:48:53', '', '', '', '', '', 111, NULL, 'yyvv', '', '2388951.6139772', '168143506'),
(11, 'jrhy', 'mjlc', '', 'tfre', NULL, 'xgem', '2004-11-29', '', '1977-06-23 12:38:48', '', '', '', '', '', 112, NULL, 'seql', '66', '', '925'),
(12, 'prpb', 'zlzz', '5', 'uosl', NULL, 'nvfv', '2020-08-14', '', '1993-04-25 12:46:18', '', '', '', '', '', 113, NULL, 'dhua', '16697233.253287', '70260.86860265', '41950603'),
(13, 'vrck', 'vtgt', '89387786', 'oqpt', NULL, 'vygw', '2006-04-12', '', '2014-12-01 00:17:23', '', '', '', '', '', 114, NULL, 'ihjn', '9033.0849407', '5192456.79', '156'),
(14, 'xccx', 'vstt', '422930', 'zfmp', NULL, 'aeir', '1977-07-10', '', '2009-08-07 02:02:34', '', '', '', '', '', 115, NULL, 'xfow', '306056.90849229', '0.19536726', '36363304'),
(15, 'evwp', 'ozng', '2193867', 'sfpp', NULL, 'niss', '2003-02-15', '', '1984-09-29 18:55:20', '', '', '', '', '', 116, NULL, 'whyy', '2195325.93363', '11954960.92', '56'),
(16, 'cfod', 'nbax', '36056', 'btbf', NULL, 'shzm', '2003-09-15', '', '1992-02-18 22:32:09', '', '', '', '', '', 117, NULL, 'wwru', '105.051627', '44.071314', '3300325'),
(17, 'uidi', 'alxi', '37488058', 'bruh', NULL, 'kvid', '1971-11-20', '', '1998-11-14 22:24:18', '', '', '', '', '', 118, NULL, 'zomi', '563870.486', '1248038', '895495780'),
(18, 'vpmn', 'bkss', '8496574', 'ulgp', NULL, 'tpne', '2006-04-14', '', '1973-06-03 13:41:47', '', '', '', '', '', 119, NULL, 'adqw', '1917.20417', '628977016.48', '2'),
(19, 'hrfj', 'miji', '9', 'mylv', NULL, 'uwfy', '1985-04-13', '', '2008-11-07 18:04:16', '', '', '', '', '', 120, NULL, 'qrfb', '8.4156318', '40734.891', '372392701'),
(20, 'onzk', 'ndaw', '378729202', 'cowy', NULL, 'grcq', '1975-10-09', '', '2013-09-14 07:36:24', '', '', '', '', '', 121, NULL, 'lvwa', '208337.7137239', '46959.36', '86'),
(21, 'qruw', 'qgde', '77', 'lypm', NULL, 'afkq', '1997-10-27', '', '1987-07-22 14:08:09', '', '', '', '', '', 122, NULL, 'nnlp', '2753.15317', '30985.3636', ''),
(22, 'lujb', 'rzbr', '688691', 'dpme', NULL, 'nslu', '1974-02-16', '', '2007-07-07 09:37:30', '', '', '', '', '', 123, NULL, 'bqyz', '', '1808839.8438165', '9'),
(23, 'thfg', 'oltx', '420981', 'udfk', NULL, 'ymic', '1980-06-03', '', '1980-04-07 14:46:04', '', '', '', '', '', 124, NULL, 'fgnu', '3487844.6263007', '122510430.8062', '86816'),
(24, 'meyh', 'mijc', '8804485', 'qyjs', NULL, 'mfny', '1975-01-26', '', '2013-06-28 02:16:50', '', '', '', '', '', 125, NULL, 'fyaz', '3.7', '2.705', '70'),
(25, 'imrj', 'sjiq', '570990436', 'akpo', NULL, 'btmx', '2007-09-14', '', '2008-08-27 07:43:15', '', '', '', '', '', 126, NULL, 'nlzv', '', '732011.5', '5649'),
(26, 'vacw', 'vxfu', '99201135', 'uxir', NULL, 'xhry', '1999-05-02', '', '2004-08-10 08:58:57', '', '', '', '', '', 127, NULL, 'vewc', '48.329', '', '6555'),
(27, 'plro', 'fggm', '1014324', 'hnly', NULL, 'cypl', '2018-06-28', '', '1970-01-06 16:08:48', '', '', '', '', '', 128, NULL, 'vqkb', '1.37100672', '1927177.2906769', '391098'),
(28, 'qwac', 'smsc', '785284', 'tkrx', NULL, 'hsfz', '2001-12-31', '', '2016-05-04 09:37:35', '', '', '', '', '', 129, NULL, 'unew', '2271', '3294479.85983', '158'),
(29, 'tvln', 'qqpk', '3566', 'rxom', NULL, 'xaou', '2004-07-06', '', '2018-04-14 17:24:55', '', '', '', '', '', 130, NULL, 'eejh', '269913968.0125', '3348614.1576269', '727'),
(30, 'wvmn', 'wksp', '5998161', 'kfgs', NULL, 'usjd', '2015-05-29', '', '1979-07-20 09:46:12', '', '', '', '', '', 131, NULL, 'ptbx', '262.098511', '5396.493', '803698'),
(31, 'dtck', 'vadq', '420342', 'flem', NULL, 'cssu', '1975-08-05', '', '1999-03-14 17:45:52', '', '', '', '', '', 132, NULL, 'txid', '', '489.9852885', '4338527'),
(32, 'hkmg', 'rjcl', '683089', 'gkfr', NULL, 'mdim', '1971-09-15', '', '1973-07-27 05:49:39', '', '', '', '', '', 133, NULL, 'mjzx', '5034533.28', '390052.93', '966387'),
(33, 'ypea', 'mmyg', '657209563', 'mfug', NULL, 'tolx', '1970-10-01', '', '2013-03-10 00:09:22', '', '', '', '', '', 134, NULL, 'ohag', '161233653', '141.99743638', '86393'),
(34, 'ttjx', 'zjmq', '827191', 'lomg', NULL, 'chri', '2007-02-19', '', '2006-07-08 01:51:18', '', '', '', '', '', 135, NULL, 'cfyv', '3.823601102', '241103767.7939', '3'),
(35, 'ufgr', 'ycdv', '881172670', 'mzbl', NULL, 'jtze', '1983-07-29', '', '1979-09-14 19:21:53', '', '', '', '', '', 136, NULL, 'aklp', '152088.640872', '112757727.43', '6'),
(36, 'ceco', 'lvwi', '179286', 'cfda', NULL, 'qeyj', '2007-09-23', '', '1979-04-30 18:54:49', '', '', '', '', '', 137, NULL, 'phgg', '401765.1042', '', ''),
(37, 'danj', 'hepx', '26', 'bbxa', NULL, 'vbyl', '1975-07-05', '', '1996-11-25 17:31:13', '', '', '', '', '', 138, NULL, 'yheo', '10713854.848912', '268548603.13177', '72782'),
(38, 'ebyu', 'jwcd', '174283797', 'czqa', NULL, 'tlqu', '2018-03-25', '', '1983-11-26 12:38:07', '', '', '', '', '', 139, NULL, 'jjpl', '27', '', '623'),
(39, 'sixc', 'zavx', '30804', 'qacx', NULL, 'qygq', '2017-01-18', '', '2015-12-05 14:44:46', '', '', '', '', '', 140, NULL, 'mvel', '389869.285', '', '1'),
(40, 'heod', 'meby', '97101864', 'ttbd', NULL, 'bugl', '1978-11-13', '', '2012-12-08 02:54:27', '', '', '', '', '', 141, NULL, 'vifn', '39.34', '', '2669'),
(41, 'ttwq', 'mvql', '384', 'xhrv', NULL, 'gywh', '1980-05-05', '', '1974-12-28 00:56:07', '', '', '', '', '', 142, NULL, 'tark', '3900.0806', '19188.983609', '807913244'),
(42, 'feia', 'aibv', '57', 'zjke', NULL, 'afdz', '1994-06-10', '', '1992-06-29 13:06:00', '', '', '', '', '', 143, NULL, 'wlgq', '29105.2983145', '33411697.743', '31775115'),
(43, 'edde', 'qwno', '4442', 'vmdo', NULL, 'jlwe', '2009-10-06', '', '2010-05-06 05:51:32', '', '', '', '', '', 144, NULL, 'azer', '8015161.06', '31.302641', '994401'),
(44, 'stiu', 'vdgg', '2591722', 'pyyv', NULL, 'zsdw', '2009-05-11', '', '1991-11-19 04:26:21', '', '', '', '', '', 145, NULL, 'kkwh', '373.3842', '35.00731', ''),
(45, 'obwl', 'lrlo', '495494791', 'rzxa', NULL, 'ojlw', '1996-05-01', '', '1982-05-28 11:53:17', '', '', '', '', '', 146, NULL, 'txgj', '16610.559377', '', '852450502'),
(46, 'vqqx', 'eibw', '325153', 'teok', NULL, 'sbdp', '2016-07-05', '', '1980-09-17 14:09:52', '', '', '', '', '', 147, NULL, 'naaq', '4608533.2392', '', '4017466'),
(47, 'uzhu', 'mycj', '266797', 'ttyb', NULL, 'dpfm', '1977-01-06', '', '2019-09-12 05:13:24', '', '', '', '', '', 148, NULL, 'aqjf', '974298.7', '', '56455'),
(48, 'pvhf', 'dlpo', '2', 'sndm', NULL, 'hcqn', '2017-02-02', '', '1995-06-02 16:09:57', '', '', '', '', '', 149, NULL, 'tbne', '0.909', '25.877382', '92831602'),
(49, 'eill', 'nmuf', '2174', 'nvwr', NULL, 'slkj', '2007-04-27', '', '1987-02-21 00:07:00', '', '', '', '', '', 150, NULL, 'gdnw', '5.81563639', '', '155'),
(50, 'nxzy', 'hbpc', '620389', 'kzbs', NULL, 'qjdf', '1994-05-16', '', '1983-06-15 16:25:37', '', '', '', '', '', 151, NULL, 'blne', '69431.243559628', '1117388.073093', '7850764'),
(51, 'bsmw', 'mnvr', '7', 'qnnz', NULL, 'ghgi', '2012-03-23', '', '1976-07-29 04:47:42', '', '', '', '', '', 152, NULL, 'nlqc', '62.45285', '0.6', '62361066'),
(52, 'nswk', 'fvdd', '655974', 'gtfr', NULL, 'aajv', '1983-09-13', '', '1978-03-28 05:13:08', '', '', '', '', '', 153, NULL, 'duja', '92977.7', '49.229973173', '4563'),
(53, 'xajy', 'puey', '9839', 'mawu', NULL, 'nwem', '2006-01-17', '', '2015-09-01 21:08:07', '', '', '', '', '', 154, NULL, 'krgl', '2445.0145', '3260.1', '37'),
(54, 'jvat', 'nivp', '38', 'iuue', NULL, 'vbrv', '1975-08-18', '', '2015-07-03 23:07:46', '', '', '', '', '', 155, NULL, 'jrhd', '5181714', '', '9697'),
(55, 'yyqk', 'bwzb', '501258', 'wtom', NULL, 'mpkb', '1983-08-06', '', '1992-05-20 04:10:44', '', '', '', '', '', 156, NULL, 'uqmd', '300382.881598', '218.2', '73452112'),
(56, 'nebx', 'nmhx', '29645', 'dyda', NULL, 'hlbn', '1978-03-03', '', '2018-04-21 12:41:15', '', '', '', '', '', 157, NULL, 'hkus', '3.1', '1.151954', '88'),
(57, 'gdfn', 'xbdg', '29200', 'tbkm', NULL, 'nwgp', '1998-10-08', '', '1974-11-08 09:57:46', '', '', '', '', '', 158, NULL, 'qnip', '332161194.13906', '64158.1', '8246'),
(58, 'otst', 'whop', '6', 'ksqo', NULL, 'bcjf', '1979-01-01', '', '1976-05-28 08:33:04', '', '', '', '', '', 159, NULL, 'xxnm', '4816.68092', '1155165.342', '361778630'),
(59, 'drqr', 'lrqf', '98406', 'xpww', NULL, 'koxz', '1978-04-06', '', '1992-11-26 00:43:18', '', '', '', '', '', 160, NULL, 'qnhx', '444.300409224', '280492464.239', '65513438'),
(60, 'cuzu', 'avhv', '90621', 'blrn', NULL, 'znri', '1998-02-01', '', '2012-03-25 04:16:58', '', '', '', '', '', 161, NULL, 'jdad', '66886179.784909', '505.7297', '612301443'),
(61, 'iskm', 'jfim', '211', 'hced', NULL, 'dbyl', '2011-04-21', '', '1970-03-15 01:06:28', '', '', '', '', '', 162, NULL, 'qeqq', '28.13', '18963115.737', '9'),
(62, 'hysu', 'jbkh', '3', 'cqle', NULL, 'nqmg', '1973-07-17', '', '2016-05-27 20:55:40', '', '', '', '', '', 163, NULL, 'pfbs', '2175508.3', '113743.7941234', '55201035'),
(63, 'egxv', 'gkxw', '9126', 'rmzi', NULL, 'wrvd', '2013-11-18', '', '2001-02-05 04:35:07', '', '', '', '', '', 164, NULL, 'ewjm', '355.8064', '3.211', '912401'),
(64, 'jhnu', 'txkv', '719573811', 'vdgu', NULL, 'pufu', '1971-06-09', '', '2008-10-10 08:05:49', '', '', '', '', '', 165, NULL, 'bybm', '', '8966.1368', '64717807'),
(65, 'dkkp', 'wmus', '91', 'ifky', NULL, 'kljo', '1992-12-15', '', '2008-07-10 03:37:53', '', '', '', '', '', 166, NULL, 'exmx', '10207137.7', '437804.2536992', '47485'),
(66, 'nnsm', 'dzto', '73642', 'onrs', NULL, 'wrhy', '1976-04-05', '', '1989-12-14 07:53:45', '', '', '', '', '', 167, NULL, 'khqy', '4381.86803', '2.291804761', '5663695'),
(67, 'ljnf', 'rahi', '4182071', 'wyei', NULL, 'jbtu', '1987-09-16', '', '2008-08-12 07:47:31', '', '', '', '', '', 168, NULL, 'uqqt', '5537291.8', '41766759.69672', '5515'),
(68, 'invf', 'ymim', '7944226', 'yyky', NULL, 'miyv', '1979-01-03', '', '2015-04-25 13:26:31', '', '', '', '', '', 169, NULL, 'bymp', '4', '4896764.6113537', '9315771'),
(69, 'rsll', 'qhct', '222662462', 'dwvf', NULL, 'hogo', '1978-07-06', '', '2014-01-16 12:45:08', '', '', '', '', '', 170, NULL, 'exor', '1.6738597', '', '198171574'),
(70, 'wbyo', 'zjwi', '32', 'romn', NULL, 'grlx', '1999-03-26', '', '2020-08-27 08:03:35', '', '', '', '', '', 171, NULL, 'glij', '428.091534', '1832.72821', '492'),
(71, 'fijb', 'hfxy', '241152', 'fjiq', NULL, 'bcvy', '1973-07-26', '', '1988-03-02 21:00:37', '', '', '', '', '', 172, NULL, 'rady', '0.5', '21847742.011748', '9301'),
(72, 'ouhn', 'myuo', '58848', 'xwzq', NULL, 'hvcq', '1987-05-15', '', '1983-02-13 15:57:10', '', '', '', '', '', 173, NULL, 'eumy', '6520.6181997', '3', '7'),
(73, 'jjrz', 'hele', '1508750', 'novb', NULL, 'grpl', '1990-11-30', '', '2005-08-15 15:13:39', '', '', '', '', '', 174, NULL, 'brut', '2966366.84621', '845454304.66478', '2098'),
(74, 'yria', 'urfq', '12508', 'xzwc', NULL, 'migk', '1997-12-22', '', '1981-06-03 09:32:40', '', '', '', '', '', 175, NULL, 'tdqs', '11091324.121401', '926698.92', '92926'),
(75, 'udru', 'urwv', '996277432', 'lxjt', NULL, 'ozkx', '1972-11-01', '', '1983-05-03 19:10:32', '', '', '', '', '', 176, NULL, 'uruh', '', '76249316.04555', '4489800'),
(76, 'ehue', 'ieut', '12158', 'khng', NULL, 'tykd', '2007-07-22', '', '2008-11-02 06:14:42', '', '', '', '', '', 177, NULL, 'tinz', '28214.588', '131131.44727', '1440'),
(77, 'movf', 'lifw', '321', 'noki', NULL, 'xysz', '1990-10-13', '', '1987-09-27 00:16:02', '', '', '', '', '', 178, NULL, 'mokn', '', '', '83'),
(78, 'naec', 'trax', '35636810', 'ucwn', NULL, 'erde', '1971-03-08', '', '1982-09-09 02:28:58', '', '', '', '', '', 179, NULL, 'mhiz', '36.595077', '13361208', '84'),
(79, 'igpd', 'tdkt', '856911', 'iaum', NULL, 'thgh', '1970-03-16', '', '2003-05-04 01:38:32', '', '', '', '', '', 180, NULL, 'jawu', '153.59194041', '1277.01458726', '36'),
(80, 'tpax', 'jnht', '514', 'tkia', NULL, 'aues', '1996-03-23', '', '1983-04-26 23:28:44', '', '', '', '', '', 181, NULL, 'qmsn', '', '1727.876847', '42934'),
(81, 'gvzn', 'brlu', '5709228', 'hmjo', NULL, 'zhmv', '2002-09-06', '', '1978-05-24 22:48:43', '', '', '', '', '', 182, NULL, 'coda', '259169492.81551', '2255246.6659', '376'),
(82, 'fypb', 'xcsl', '9038226', 'xqdh', NULL, 'cfwb', '1973-09-18', '', '1974-10-06 20:09:52', '', '', '', '', '', 183, NULL, 'ejmf', '300708.635708', '7.84054', '444597'),
(83, 'kpzd', 'jdpj', '5364803', 'albm', NULL, 'yceh', '1982-04-28', '', '1972-06-01 17:33:10', '', '', '', '', '', 184, NULL, 'pumi', '63828.901962', '13.46890825', ''),
(84, 'uega', 'crmi', '870', 'rahz', NULL, 'xfpi', '1978-04-18', '', '1985-02-27 21:30:31', '', '', '', '', '', 185, NULL, 'okay', '288190759.72519', '11666530.3', '846810'),
(85, 'ngtc', 'vmsm', '987', 'crjo', NULL, 'ljpy', '1976-08-14', '', '2012-04-30 01:36:39', '', '', '', '', '', 186, NULL, 'qhoa', '1230524.36581', '1299188.4407507', '33'),
(86, 'jrle', 'ptha', '939517', 'lcns', NULL, 'sbxu', '2015-07-16', '', '1975-02-09 16:54:32', '', '', '', '', '', 187, NULL, 'miwc', '', '16828969.1', '13043'),
(87, 'wnbp', 'xawk', '472532216', 'ynzw', NULL, 'pqww', '1988-11-08', '', '1983-04-19 13:47:49', '', '', '', '', '', 188, NULL, 'mmpk', '838727.9', '73593648.9', '7517'),
(88, 'rmsr', 'yjgz', '46', 'ojzq', NULL, 'dniw', '1980-06-29', '', '1989-02-01 15:20:03', '', '', '', '', '', 189, NULL, 'fgek', '0.24592384', '36.390013637', '295787507'),
(89, 'ssbl', 'thuf', '997', 'slwu', NULL, 'mehc', '2002-04-12', '', '2009-05-07 21:39:15', '', '', '', '', '', 190, NULL, 'ycdj', '113746.475901', '', '52074'),
(90, 'yfgz', 'zfds', '44810894', 'ivuc', NULL, 'carn', '2015-09-05', '', '2002-09-14 16:43:14', '', '', '', '', '', 191, NULL, 'fvel', '234', '3465.11', '72'),
(91, 'ujct', 'impx', '6791', 'zrgr', NULL, 'rvuh', '2009-04-18', '', '1983-09-27 14:30:04', '', '', '', '', '', 192, NULL, 'kaad', '35345.5973', '37995873.302', '42'),
(92, 'wfmf', 'exaw', '61184', 'axsp', NULL, 'qpuu', '2006-01-02', '', '2017-01-27 14:33:58', '', '', '', '', '', 193, NULL, 'avkb', '115.09506037', '', ''),
(93, 'zvfp', 'wonb', '9689599', 'fgow', NULL, 'zsxp', '2016-07-03', '', '1996-01-23 02:14:07', '', '', '', '', '', 194, NULL, 'tomm', '468931.37', '217826.42835235', '71209'),
(94, 'hnhn', 'fwla', '65533', 'yvma', NULL, 'epui', '2018-05-08', '', '2004-12-24 21:37:13', '', '', '', '', '', 195, NULL, 'yxtv', '1431.3', '4494099.985', '2132'),
(95, 'zswm', 'sqwm', '514389013', 'qpyh', NULL, 'svhp', '2011-08-06', '', '1992-09-16 01:30:45', '', '', '', '', '', 196, NULL, 'awrl', '4048.431350993', '579.59038', '7188779'),
(96, 'svoe', 'tgxf', '13496807', 'kpiq', NULL, 'lvly', '1980-04-03', '', '1990-11-04 23:21:03', '', '', '', '', '', 197, NULL, 'jtai', '514.7929', '1.34819', ''),
(97, 'clvx', 'wqwk', '985135', 'frha', NULL, 'gehg', '2018-09-22', '', '2007-06-02 01:03:45', '', '', '', '', '', 198, NULL, 'barj', '3', '4941.65301', ''),
(98, 'uecm', 'mein', '84', 'lear', NULL, 'wynn', '2019-11-12', '', '2012-06-16 08:48:33', '', '', '', '', '', 199, NULL, 'qppp', '', '649.01508534', '936751'),
(99, 'ylxk', 'ible', '39318', 'oqdb', NULL, 'fqha', '2018-06-02', '', '2006-03-11 10:23:31', '', '', '', '', '', 200, NULL, 'mahl', '', '265722.57', '754156053'),
(100, 'ayxb', 'dxvr', '55242942', 'inkq', NULL, 'wjsi', '2012-11-25', '', '1993-05-11 16:58:02', '', '', '', '', '', 201, NULL, 'xvat', '13086.4656626', '0.604', '');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `CustomerId` int(10) NOT NULL,
  `ItemId` int(8) NOT NULL,
  `category` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`CustomerId`, `ItemId`, `category`) VALUES
(1, 3, 52),
(2, 4, 53),
(3, 5, 54),
(4, 6, 55),
(5, 7, 56),
(6, 8, 57),
(7, 9, 58),
(8, 10, 59),
(9, 11, 60),
(10, 12, 61),
(11, 13, 62),
(12, 14, 63),
(13, 15, 64),
(14, 16, 65),
(15, 17, 66),
(16, 18, 67),
(17, 19, 68),
(18, 20, 69),
(19, 21, 70),
(20, 22, 71),
(21, 23, 72),
(22, 24, 73),
(23, 25, 74),
(24, 26, 75),
(25, 27, 76),
(26, 28, 77),
(27, 29, 78),
(28, 30, 79),
(29, 31, 80),
(30, 32, 81),
(31, 33, 82),
(32, 34, 83),
(33, 35, 84),
(34, 36, 85),
(35, 37, 86),
(36, 38, 87),
(37, 39, 88),
(38, 40, 89),
(39, 41, 90),
(40, 42, 91),
(41, 43, 92),
(42, 44, 93),
(43, 45, 94),
(44, 46, 95),
(45, 47, 96),
(46, 48, 97),
(47, 49, 98),
(48, 50, 99),
(49, 51, 100),
(50, 52, 101);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `ItemId` int(8) DEFAULT NULL,
  `shop` int(5) DEFAULT NULL,
  `Customer` int(10) NOT NULL,
  `Type` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Comments` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Rating` float NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `ItemId`, `shop`, `Customer`, `Type`, `Comments`, `Rating`, `Date`) VALUES
(1, 3, NULL, 1, '', 'qcwe', 5, '1992-08-06 14:01:41'),
(2, 4, NULL, 2, '', 'meio', 5, '1983-11-20 07:25:50'),
(3, 5, NULL, 3, '', 'ahzz', 5, '1989-03-10 19:33:24'),
(4, 6, NULL, 4, '', 'rvlw', 3, '1974-12-09 16:20:30'),
(5, 7, NULL, 5, '', 'aamh', 3, '1976-12-09 07:51:11'),
(6, 8, NULL, 6, '', 'gwhh', 6, '1985-05-21 19:56:32'),
(7, 9, NULL, 7, '', 'krwo', 3, '2005-07-01 16:02:24'),
(8, 10, NULL, 8, '', 'vvnx', 6, '1976-04-18 05:32:01'),
(9, 11, NULL, 9, '', 'zjng', 7, '1997-04-26 02:03:05'),
(10, 12, NULL, 10, '', 'fprc', 9, '1972-08-06 04:45:17'),
(11, 13, NULL, 11, '', 'rion', 1, '1970-02-08 00:37:09'),
(12, 14, NULL, 12, '', 'uyqf', 1, '2018-04-14 12:12:36'),
(13, 15, NULL, 13, '', 'bjbn', 4, '2010-01-15 14:31:38'),
(14, 16, NULL, 14, '', 'mzib', 5, '2002-02-10 21:07:31'),
(15, 17, NULL, 15, '', 'mvdu', 2, '2020-03-10 07:27:00'),
(16, 18, NULL, 16, '', 'hdew', 4, '1977-07-14 04:53:56'),
(17, 19, NULL, 17, '', 'rhtg', 7, '1973-02-13 09:22:52'),
(18, 20, NULL, 18, '', 'obuh', 3, '1988-11-10 13:32:41'),
(19, 21, NULL, 19, '', 'mkau', 2, '1976-07-06 15:10:07'),
(20, 22, NULL, 20, '', 'regj', 4, '1998-07-21 17:15:19'),
(21, 23, NULL, 21, '', 'rnve', 8, '1988-02-26 22:31:55'),
(22, 24, NULL, 22, '', 'sjdj', 8, '1993-11-08 12:04:57'),
(23, 25, NULL, 23, '', 'hnow', 1, '1982-03-29 16:00:44'),
(24, 26, NULL, 24, '', 'wlkb', 3, '2003-06-04 18:46:54'),
(25, 27, NULL, 25, '', 'gqvy', 1, '2011-10-03 20:47:02'),
(26, 28, NULL, 26, '', 'yqcv', 2, '2006-11-11 20:18:39'),
(27, 29, NULL, 27, '', 'kttg', 4, '2005-01-10 15:44:43'),
(28, 30, NULL, 28, '', 'nwne', 5, '2019-07-31 11:52:08'),
(29, 31, NULL, 29, '', 'engh', 2, '1971-06-06 15:34:16'),
(30, 32, NULL, 30, '', 'fdjm', 1, '2009-11-25 06:54:18'),
(31, 33, NULL, 31, '', 'dkzh', 1, '1974-07-23 23:50:57'),
(32, 34, NULL, 32, '', 'lhwc', 4, '1987-05-21 05:47:32'),
(33, 35, NULL, 33, '', 'gjmx', 6, '2001-01-29 19:33:18'),
(34, 36, NULL, 34, '', 'xazy', 7, '2001-06-21 00:54:31'),
(35, 37, NULL, 35, '', 'cdjm', 9, '1986-09-02 23:16:11'),
(36, 38, NULL, 36, '', 'xmtk', 6, '1992-03-25 14:04:38'),
(37, 39, NULL, 37, '', 'bfwm', 9, '2000-02-01 19:24:42'),
(38, 40, NULL, 38, '', 'fjvm', 2, '1974-10-29 00:52:14'),
(39, 41, NULL, 39, '', 'svtv', 2, '1970-01-06 10:26:30'),
(40, 42, NULL, 40, '', 'fnxu', 6, '2018-07-01 01:13:22'),
(41, 43, NULL, 41, '', 'vfno', 9, '1971-12-23 11:18:47'),
(42, 44, NULL, 42, '', 'kaqj', 7, '2011-04-11 19:46:28'),
(43, 45, NULL, 43, '', 'qpnk', 5, '2013-08-22 16:21:40'),
(44, 46, NULL, 44, '', 'hdvt', 8, '1970-07-13 08:38:34'),
(45, 47, NULL, 45, '', 'qizm', 2, '1986-01-05 12:54:50'),
(46, 48, NULL, 46, '', 'egre', 3, '2016-10-16 17:18:43'),
(47, 49, NULL, 47, '', 'ivcg', 3, '1987-12-27 13:35:33'),
(48, 50, NULL, 48, '', 'tyel', 8, '1981-08-18 15:46:23'),
(49, 51, NULL, 49, '', 'nsjv', 6, '2011-07-04 06:22:58'),
(50, 52, NULL, 50, '', 'wkzs', 8, '1988-03-20 02:34:31'),
(51, 53, NULL, 51, '', 'xbyx', 9, '1970-05-20 01:20:48'),
(52, 54, NULL, 52, '', 'zxbo', 3, '2004-10-03 22:47:23'),
(53, 55, NULL, 53, '', 'noko', 7, '1977-10-22 06:50:22'),
(54, 56, NULL, 54, '', 'ewmt', 2, '1971-03-05 00:47:57'),
(55, 57, NULL, 55, '', 'tqor', 8, '2015-11-25 11:30:18'),
(56, 58, NULL, 56, '', 'tcgx', 4, '1971-10-09 05:09:24'),
(57, 59, NULL, 57, '', 'ainb', 3, '1991-03-03 09:26:01'),
(58, 60, NULL, 58, '', 'hpov', 4, '1987-11-26 20:15:19'),
(59, 61, NULL, 59, '', 'ngsq', 5, '1996-10-17 00:48:12'),
(60, 62, NULL, 60, '', 'rtuc', 5, '1977-12-12 08:55:51'),
(61, 63, NULL, 61, '', 'vokn', 8, '1983-05-19 01:39:25'),
(62, 64, NULL, 62, '', 'fgtu', 3, '1976-06-06 06:11:53'),
(63, 65, NULL, 63, '', 'wxii', 9, '2019-07-28 23:38:21'),
(64, 66, NULL, 64, '', 'wawv', 7, '1980-03-24 02:40:38'),
(65, 67, NULL, 65, '', 'cwlq', 5, '2018-01-02 00:19:31'),
(66, 68, NULL, 66, '', 'gvos', 7, '1978-02-08 23:04:51'),
(67, 69, NULL, 67, '', 'mxwf', 8, '2007-03-13 22:27:24'),
(68, 70, NULL, 68, '', 'jlwu', 2, '2012-08-21 01:19:20'),
(69, 71, NULL, 69, '', 'hmqs', 7, '1992-03-23 22:32:38'),
(70, 72, NULL, 70, '', 'xpsx', 4, '1989-02-08 03:47:22'),
(71, 73, NULL, 71, '', 'jkdf', 4, '1987-02-15 15:06:43'),
(72, 74, NULL, 72, '', 'ikmh', 8, '2002-10-01 13:46:21'),
(73, 75, NULL, 73, '', 'sfqj', 6, '2005-11-02 03:27:04'),
(74, 76, NULL, 74, '', 'ndch', 6, '1973-05-23 15:44:04'),
(75, 77, NULL, 75, '', 'xiob', 9, '1983-08-23 13:29:49'),
(76, 78, NULL, 76, '', 'itjh', 2, '2000-01-27 11:41:59'),
(77, 79, NULL, 77, '', 'inlg', 6, '2012-08-09 18:14:10'),
(78, 80, NULL, 78, '', 'bzju', 1, '1988-11-13 03:48:49'),
(79, 81, NULL, 79, '', 'zvnw', 5, '1986-07-13 14:43:23'),
(80, 82, NULL, 80, '', 'qdoe', 6, '2006-12-31 02:46:30'),
(81, 83, NULL, 81, '', 'ufke', 9, '2012-08-15 16:27:25'),
(82, 84, NULL, 82, '', 'dmyq', 1, '1988-06-10 14:59:50'),
(83, 85, NULL, 83, '', 'yqaa', 2, '2019-10-03 07:04:22'),
(84, 86, NULL, 84, '', 'cuxv', 6, '2002-07-17 21:41:05'),
(85, 87, NULL, 85, '', 'ryzf', 4, '1998-07-20 02:09:35'),
(86, 88, NULL, 86, '', 'xvvy', 6, '1993-10-21 23:20:44'),
(87, 89, NULL, 87, '', 'wsmo', 6, '1979-09-13 07:09:58'),
(88, 90, NULL, 88, '', 'elpj', 9, '2001-04-02 17:55:51'),
(89, 91, NULL, 89, '', 'codc', 3, '1984-12-20 20:00:20'),
(90, 92, NULL, 90, '', 'ecaf', 7, '2016-10-27 17:59:28'),
(91, 93, NULL, 91, '', 'sdyi', 6, '1974-01-16 10:59:24'),
(92, 94, NULL, 92, '', 'lgka', 8, '2008-10-11 01:25:38'),
(93, 95, NULL, 93, '', 'cyld', 6, '1980-01-26 14:28:35'),
(94, 96, NULL, 94, '', 'okpx', 3, '1996-02-23 16:19:37'),
(95, 97, NULL, 95, '', 'iijl', 5, '2013-12-13 15:45:12'),
(96, 98, NULL, 96, '', 'epxp', 4, '1988-07-04 14:10:47'),
(97, 99, NULL, 97, '', 'hfru', 2, '1979-10-09 10:00:28'),
(98, 100, NULL, 98, '', 'ztqe', 2, '1999-04-06 17:29:12'),
(99, 101, NULL, 99, '', 'owgd', 8, '1995-03-05 20:27:25'),
(100, 102, NULL, 100, '', 'fwpt', 7, '1981-03-30 08:38:58'),
(101, NULL, 1, 1, 'SHOP', 'ftpa', 9, '1971-10-03 06:57:53'),
(102, NULL, 2, 2, 'SHOP', 'lhge', 8, '1971-12-14 23:40:36'),
(103, NULL, 3, 3, 'SHOP', 'avym', 4, '1992-09-17 21:43:54'),
(104, NULL, 4, 4, 'SHOP', 'qicx', 7, '2007-08-01 12:44:54'),
(105, NULL, 5, 5, 'SHOP', 'bfsw', 5, '1988-08-25 02:03:52'),
(106, NULL, 6, 6, 'SHOP', 'pgku', 7, '1973-11-25 17:22:03'),
(107, NULL, 7, 7, 'SHOP', 'hcvp', 3, '1973-07-12 21:06:12'),
(108, NULL, 8, 8, 'SHOP', 'ispq', 8, '1998-08-20 05:59:18'),
(109, NULL, 9, 9, 'SHOP', 'feey', 1, '2009-10-12 20:29:43'),
(110, NULL, 10, 10, 'SHOP', 'glgl', 5, '1997-01-15 10:43:08'),
(111, NULL, 11, 11, 'SHOP', 'nokf', 8, '1987-01-20 09:31:29'),
(112, NULL, 12, 12, 'SHOP', 'lmry', 7, '2002-09-09 18:26:43'),
(113, NULL, 13, 13, 'SHOP', 'smbq', 3, '1988-01-29 18:54:54'),
(114, NULL, 14, 14, 'SHOP', 'tnnu', 6, '2018-01-12 22:05:12'),
(115, NULL, 15, 15, 'SHOP', 'cbas', 5, '1988-02-27 01:52:16'),
(116, NULL, 16, 16, 'SHOP', 'vwyp', 3, '2001-01-19 03:24:38'),
(117, NULL, 17, 17, 'SHOP', 'pqjb', 6, '1986-01-16 22:43:43'),
(118, NULL, 18, 18, 'SHOP', 'tkgl', 2, '1993-02-27 22:59:15'),
(119, NULL, 19, 19, 'SHOP', 'ysvr', 7, '1974-05-16 22:48:43'),
(120, NULL, 20, 20, 'SHOP', 'gbdp', 7, '2001-08-08 08:25:42'),
(121, NULL, 21, 21, 'SHOP', 'dgeg', 1, '1976-10-09 21:43:13'),
(122, NULL, 22, 22, 'SHOP', 'qbqp', 5, '1981-06-21 16:12:23'),
(123, NULL, 23, 23, 'SHOP', 'alpo', 7, '1987-03-16 17:24:12'),
(124, NULL, 24, 24, 'SHOP', 'vwch', 5, '2006-07-05 21:49:22'),
(125, NULL, 25, 25, 'SHOP', 'crum', 1, '1985-10-22 09:50:05'),
(126, NULL, 26, 26, 'SHOP', 'jdsc', 7, '1978-09-30 19:31:16'),
(127, NULL, 27, 27, 'SHOP', 'fgkx', 5, '2012-06-16 01:25:37'),
(128, NULL, 28, 28, 'SHOP', 'gffi', 9, '2018-07-19 21:26:24'),
(129, NULL, 29, 29, 'SHOP', 'mjjw', 8, '1986-07-26 06:14:08'),
(130, NULL, 30, 30, 'SHOP', 'pnzn', 7, '1972-03-20 03:46:00'),
(131, NULL, 31, 31, 'SHOP', 'plrz', 4, '1983-06-22 11:17:43'),
(132, NULL, 32, 32, 'SHOP', 'osvp', 9, '1981-09-06 11:26:11'),
(133, NULL, 33, 33, 'SHOP', 'xkaj', 4, '2015-03-01 06:49:04'),
(134, NULL, 34, 34, 'SHOP', 'drob', 1, '2018-06-10 12:09:20'),
(135, NULL, 35, 35, 'SHOP', 'uwnt', 9, '1985-12-04 21:55:16'),
(136, NULL, 36, 36, 'SHOP', 'caqp', 4, '1994-06-08 22:58:49'),
(137, NULL, 37, 37, 'SHOP', 'dzup', 4, '1976-07-24 07:49:08'),
(138, NULL, 38, 38, 'SHOP', 'qamq', 7, '1992-01-25 08:54:23'),
(139, NULL, 39, 39, 'SHOP', 'hqyq', 4, '2001-05-21 14:09:23'),
(140, NULL, 40, 40, 'SHOP', 'vzdj', 2, '1972-08-15 06:01:21'),
(141, NULL, 41, 41, 'SHOP', 'fwal', 7, '2010-03-05 10:59:22'),
(142, NULL, 42, 42, 'SHOP', 'hqxx', 3, '1980-07-25 12:47:09'),
(143, NULL, 43, 43, 'SHOP', 'kzqb', 9, '2013-09-10 22:26:30'),
(144, NULL, 44, 44, 'SHOP', 'umpc', 2, '1974-09-08 04:38:22'),
(145, NULL, 45, 45, 'SHOP', 'qggv', 5, '1979-12-12 20:32:35'),
(146, NULL, 46, 46, 'SHOP', 'uzsu', 5, '2018-03-05 11:53:30'),
(147, NULL, 47, 47, 'SHOP', 'cvir', 4, '1978-05-06 10:48:18'),
(148, NULL, 48, 48, 'SHOP', 'rlzl', 9, '1980-01-01 20:42:25'),
(149, NULL, 49, 49, 'SHOP', 'hgqb', 7, '1976-02-20 19:32:31'),
(150, NULL, 50, 50, 'SHOP', 'asrg', 3, '1997-04-22 10:34:25'),
(151, NULL, 51, 51, 'SHOP', 'oggn', 2, '2010-09-07 06:37:09'),
(152, NULL, 52, 52, 'SHOP', 'qzhn', 8, '1983-07-04 23:07:32'),
(153, NULL, 53, 53, 'SHOP', 'cydx', 3, '1986-03-17 08:35:20'),
(154, NULL, 54, 54, 'SHOP', 'sryz', 7, '1979-05-12 17:10:46'),
(155, NULL, 55, 55, 'SHOP', 'spfg', 6, '1970-07-21 21:58:53'),
(156, NULL, 56, 56, 'SHOP', 'cwkk', 6, '1975-11-18 05:43:56'),
(157, NULL, 57, 57, 'SHOP', 'iimp', 4, '2013-10-26 21:56:18'),
(158, NULL, 58, 58, 'SHOP', 'qzku', 5, '1990-09-01 08:19:16'),
(159, NULL, 59, 59, 'SHOP', 'jzsg', 3, '2002-09-03 19:22:53'),
(160, NULL, 60, 60, 'SHOP', 'elfh', 2, '2008-07-19 15:26:39'),
(161, NULL, 61, 61, 'SHOP', 'nzqq', 4, '2001-08-23 08:46:34'),
(162, NULL, 62, 62, 'SHOP', 'oizp', 3, '1985-06-13 22:35:15'),
(163, NULL, 63, 63, 'SHOP', 'kdzh', 7, '1997-06-02 19:27:28'),
(164, NULL, 64, 64, 'SHOP', 'xcyc', 1, '2018-01-12 15:14:45'),
(165, NULL, 65, 65, 'SHOP', 'fyhq', 5, '2010-05-26 14:31:21'),
(166, NULL, 66, 66, 'SHOP', 'vwdr', 4, '1974-03-24 07:53:54'),
(167, NULL, 67, 67, 'SHOP', 'kukh', 4, '1982-06-05 17:46:45'),
(168, NULL, 68, 68, 'SHOP', 'vgze', 7, '1994-07-22 13:38:53'),
(169, NULL, 69, 69, 'SHOP', 'oeru', 1, '2008-05-03 18:54:52'),
(170, NULL, 70, 70, 'SHOP', 'vzcs', 1, '1981-01-17 23:40:36'),
(171, NULL, 71, 71, 'SHOP', 'rxlq', 4, '2017-07-22 21:19:05'),
(172, NULL, 72, 72, 'SHOP', 'ngpv', 2, '2008-01-05 19:24:14'),
(173, NULL, 73, 73, 'SHOP', 'fria', 9, '2007-04-26 12:32:04'),
(174, NULL, 74, 74, 'SHOP', 'eoxo', 5, '1999-04-23 20:31:48'),
(175, NULL, 75, 75, 'SHOP', 'hhqb', 8, '1981-08-17 17:02:53'),
(176, NULL, 76, 76, 'SHOP', 'xjtt', 1, '1983-10-06 00:25:20'),
(177, NULL, 77, 77, 'SHOP', 'olkb', 8, '1998-12-15 06:34:41'),
(178, NULL, 78, 78, 'SHOP', 'mmgo', 7, '2014-08-19 08:15:22'),
(179, NULL, 79, 79, 'SHOP', 'aplo', 2, '1979-05-14 10:05:14'),
(180, NULL, 80, 80, 'SHOP', 'lylf', 4, '2009-07-02 19:03:11'),
(181, NULL, 81, 81, 'SHOP', 'jxgi', 9, '1998-10-22 20:14:02'),
(182, NULL, 82, 82, 'SHOP', 'hisu', 7, '2012-03-06 03:58:37'),
(183, NULL, 83, 83, 'SHOP', 'wodj', 1, '2017-07-02 05:22:42'),
(184, NULL, 84, 84, 'SHOP', 'wkvc', 7, '1979-05-19 05:46:02'),
(185, NULL, 85, 85, 'SHOP', 'wuwz', 9, '1999-01-12 23:18:01'),
(186, NULL, 86, 86, 'SHOP', 'tpak', 7, '1984-07-14 03:11:14'),
(187, NULL, 87, 87, 'SHOP', 'jsli', 8, '1978-04-12 05:54:43'),
(188, NULL, 88, 88, 'SHOP', 'yzen', 1, '1972-02-15 14:53:23'),
(189, NULL, 89, 89, 'SHOP', 'nerg', 1, '1996-11-04 05:42:37'),
(190, NULL, 90, 90, 'SHOP', 'kxhi', 1, '2015-10-27 09:06:27'),
(191, NULL, 91, 91, 'SHOP', 'gqfz', 1, '1970-10-14 22:48:45'),
(192, NULL, 92, 92, 'SHOP', 'hivs', 7, '1980-11-02 19:25:03'),
(193, NULL, 93, 93, 'SHOP', 'jdeg', 6, '1990-12-05 02:36:16'),
(194, NULL, 94, 94, 'SHOP', 'nehv', 1, '1994-01-14 00:39:51'),
(195, NULL, 95, 95, 'SHOP', 'gguu', 4, '1994-04-23 22:45:51'),
(196, NULL, 96, 96, 'SHOP', 'licg', 8, '2015-12-18 23:11:30'),
(197, NULL, 97, 97, 'SHOP', 'vzcl', 3, '1985-08-11 17:00:45'),
(198, NULL, 98, 98, 'SHOP', 'mvwa', 8, '1972-12-30 07:31:35'),
(199, NULL, 99, 99, 'SHOP', 'tzni', 2, '1980-07-12 22:42:18'),
(200, NULL, 100, 100, 'SHOP', 'hboz', 3, '1997-09-05 05:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(8) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SubCategory` int(4) DEFAULT NULL,
  `Shop` int(5) DEFAULT NULL,
  `Photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Photo1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Photo2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `TimesSold` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `Name`, `Description`, `SubCategory`, `Shop`, `Photo`, `Photo1`, `Photo2`, `Price`, `TimesSold`) VALUES
(3, 'jlfp', NULL, 2, 1, 'img/items/image14.jpg', '', '', 26984800, 0),
(4, 'vbob', NULL, 3, 2, 'img/items/image14.jpg', '', '', 75108.6, 0),
(5, 'geuy', NULL, 4, 3, 'img/items/image14.jpg', '', '', 25134.6, 0),
(6, 'ujrr', NULL, 5, 4, 'img/items/image14.jpg', '', '', 29482300, 0),
(7, 'kerx', NULL, 6, 5, 'img/items/image14.jpg', '', '', 2586.05, 0),
(8, 'gamy', NULL, 7, 6, 'img/items/image14.jpg', '', '', 4466860, 0),
(9, 'tlil', NULL, 8, 7, 'img/items/image14.jpg', '', '', 1627.27, 0),
(10, 'pycv', NULL, 9, 8, 'img/items/image14.jpg', '', '', 27517.7, 0),
(11, 'molg', NULL, 10, 9, 'img/items/image14.jpg', '', '', 3.4411, 0),
(12, 'ekjj', NULL, 11, 10, 'img/items/image14.jpg', '', '', 500199, 0),
(13, 'asaz', NULL, 12, 11, 'img/items/image14.jpg', '', '', 0, 0),
(14, 'iaxc', NULL, 13, 12, 'img/items/image15.jpg', '', '', 4741890, 0),
(15, 'wwhn', NULL, 14, 13, 'img/items/image15.jpg', '', '', 415.326, 0),
(16, 'akgs', NULL, 15, 14, 'img/items/image15.jpg', '', '', 2109.62, 0),
(17, 'cdce', NULL, 16, 15, 'img/items/image15.jpg', '', '', 350.443, 0),
(18, 'pnge', NULL, 17, 16, 'img/items/image15.jpg', '', '', 13425800, 0),
(19, 'mtzh', NULL, 18, 17, 'img/items/image15.jpg', '', '', 1426.7, 0),
(20, 'bqif', NULL, 19, 18, 'img/items/2_2.jpg_2', 'img/items/2_1.jpg', '', 503600, 0),
(21, 'ehie', NULL, 20, 19, 'img/items/image15.jpg', '', '', 59.1749, 0),
(22, 'ddud', NULL, 21, 20, 'img/items/image15.jpg', '', '', 219507, 0),
(23, 'yvdo', NULL, 22, 21, 'img/items/image15.jpg', '', '', 403932, 0),
(24, 'gasg', NULL, 23, 22, 'img/items/image15.jpg', '', '', 8213.12, 0),
(25, 'mpoo', NULL, 24, 23, 'img/items/image15.jpg', '', '', 7851.75, 0),
(26, 'amks', NULL, 25, 24, 'img/items/image16.jpg', '', '', 55.0808, 0),
(27, 'ycpk', NULL, 26, 25, 'img/items/image16.jpg', '', '', 308076, 0),
(28, 'jkjy', NULL, 27, 26, 'img/items/image16.jpg', '', '', 194295, 0),
(29, 'omzm', NULL, 28, 27, 'img/items/image16.jpg', '', '', 29753.3, 0),
(30, 'mxzh', NULL, 29, 28, 'img/items/image16.jpg', '', '', 6.5, 0),
(31, 'pzcl', NULL, 30, 29, 'img/items/image16.jpg', '', '', 2238200, 0),
(32, 'fwyd', NULL, 31, 30, 'img/items/image16.jpg', '', '', 39.6324, 0),
(33, 'sgvu', NULL, 32, 31, 'img/items/image16.jpg', '', '', 14462, 0),
(34, 'nggq', NULL, 33, 32, 'img/items/image16.jpg', '', '', 67607.5, 0),
(35, 'kodd', NULL, 34, 33, 'img/items/image16.jpg', '', '', 7.055, 0),
(36, 'bqxr', NULL, 35, 34, 'img/items/image16.jpg', '', '', 386389, 0),
(37, 'uwpl', NULL, 36, 35, 'img/items/image16.jpg', '', '', 12.29, 0),
(38, 'cmke', NULL, 37, 36, 'img/items/image17.jpg', '', '', 6.21004, 0),
(39, 'edov', NULL, 38, 37, 'img/items/image17.jpg', '', '', 3742230, 0),
(40, 'mqxf', NULL, 39, 38, 'img/items/image17.jpg', '', '', 139345000, 0),
(41, 'pkbs', NULL, 40, 39, 'img/items/image17.jpg', '', '', 715834000, 0),
(42, 'icqx', NULL, 41, 40, 'img/items/image17.jpg', '', '', 236.821, 0),
(43, 'bgic', NULL, 42, 41, 'img/items/image17.jpg', '', '', 1338160, 0),
(44, 'cvsc', NULL, 43, 42, 'img/items/image17.jpg', '', '', 3159200, 0),
(45, 'zorg', NULL, 44, 43, 'img/items/image17.jpg', '', '', 12665.9, 0),
(46, 'rrkt', NULL, 45, 44, 'img/items/image17.jpg', '', '', 670.6, 0),
(47, 'llyf', NULL, 46, 45, 'img/items/image17.jpg', '', '', 28.6986, 0),
(48, 'rumh', NULL, 47, 46, 'img/items/image17.jpg', '', '', 0, 0),
(49, 'vkpw', NULL, 48, 47, 'img/items/image17.jpg', '', '', 3468.31, 0),
(50, 'sktx', NULL, 49, 48, 'img/items/image18.jpg', '', '', 2007370, 0),
(51, 'pgkb', NULL, 50, 49, 'img/items/image18.jpg', '', '', 0, 0),
(52, 'jetp', NULL, 51, 50, 'img/items/image18.jpg', '', '', 149380000, 0),
(53, 'eqmk', NULL, 52, 51, 'img/items/image18.jpg', '', '', 1512700, 0),
(54, 'ojou', NULL, 53, 52, 'img/items/image18.jpg', '', '', 107.633, 0),
(55, 'zims', NULL, 54, 53, 'img/items/image18.jpg', '', '', 285681000, 0),
(56, 'zcnz', NULL, 55, 54, 'img/items/image18.jpg', '', '', 287.393, 0),
(57, 'zcnu', NULL, 56, 55, 'img/items/image18.jpg', '', '', 20212700, 0),
(58, 'zbgt', NULL, 57, 56, 'img/items/image18.jpg', '', '', 0, 0),
(59, 'znmv', NULL, 58, 57, 'img/items/image18.jpg', '', '', 170105000, 0),
(60, 'qmsb', NULL, 59, 58, 'img/items/image18.jpg', '', '', 0, 0),
(61, 'xblc', NULL, 60, 59, 'img/items/image19.jpg', '', '', 20.77, 0),
(62, 'pgyj', NULL, 61, 60, 'img/items/image19.jpg', '', '', 51.8726, 0),
(63, 'mjip', NULL, 62, 61, 'img/items/image19.jpg', '', '', 56526700, 0),
(64, 'cdou', NULL, 63, 62, 'img/items/image19.jpg', '', '', 275578, 0),
(65, 'xnna', NULL, 64, 63, 'img/items/image19.jpg', '', '', 5266870, 0),
(66, 'fayo', NULL, 65, 64, 'img/items/image19.jpg', '', '', 0, 0),
(67, 'uedu', NULL, 66, 65, 'img/items/image19.jpg', '', '', 2025.5, 0),
(68, 'buei', NULL, 67, 66, 'img/items/image19.jpg', '', '', 26848500, 0),
(69, 'hfso', NULL, 68, 67, 'img/items/image19.jpg', '', '', 23837.6, 0),
(70, 'jqls', NULL, 69, 68, 'img/items/image19.jpg', '', '', 22765600, 0),
(71, 'utgh', NULL, 70, 69, 'img/items/image19.jpg', '', '', 2279210, 0),
(72, 'zxsc', NULL, 71, 70, 'img/items/image19.jpg', '', '', 7.32024, 0),
(73, 'clgj', NULL, 72, 71, 'img/items/image20.jpg', '', '', 6194.7, 0),
(74, 'acel', NULL, 73, 72, 'img/items/image20.jpg', '', '', 5783.15, 0),
(75, 'kinb', NULL, 74, 73, 'img/items/image20.jpg', '', '', 9.07502, 0),
(76, 'blry', NULL, 75, 74, 'img/items/image20.jpg', '', '', 15.7792, 0),
(77, 'etpw', NULL, 76, 75, 'img/items/image20.jpg', '', '', 1677200, 0),
(78, 'yxto', NULL, 77, 76, 'img/items/image20.jpg', '', '', 1.00549, 0),
(79, 'yjiw', NULL, 78, 77, 'img/items/image20.jpg', '', '', 199723, 0),
(80, 'dnfn', NULL, 79, 78, 'img/items/image20.jpg', '', '', 0, 0),
(81, 'wrhh', NULL, 80, 79, 'img/items/image20.jpg', '', '', 54, 0),
(82, 'uggl', NULL, 81, 80, 'img/items/image20.jpg', '', '', 13, 0),
(83, 'mqpo', NULL, 82, 81, 'img/items/image20.jpg', '', '', 82.5551, 0),
(84, 'gnaq', NULL, 83, 82, 'img/items/image20.jpg', '', '', 1.27694, 0),
(85, 'ucri', NULL, 84, 83, 'img/items/image21.jpg', '', '', 31315400, 0),
(86, 'oayi', NULL, 85, 84, 'img/items/image21.jpg', '', '', 83613200, 0),
(87, 'rwzu', NULL, 86, 85, 'img/items/image21.jpg', '', '', 2.61399, 0),
(88, 'oish', NULL, 87, 86, 'img/items/image22.jpg', '', '', 4182.42, 0),
(89, 'dvhz', NULL, 88, 87, 'img/items/image22.jpg', '', '', 16529.6, 0),
(90, 'gwug', NULL, 89, 88, 'img/items/image22.jpg', '', '', 447543, 0),
(91, 'ncuz', NULL, 90, 89, 'img/items/image22.jpg', '', '', 1815420, 0),
(92, 'fkex', NULL, 91, 90, 'img/items/image22.jpg', '', '', 42.2595, 0),
(93, 'ibjr', NULL, 92, 91, 'img/items/image22.jpg', '', '', 48.0552, 0),
(94, 'kwjm', NULL, 93, 92, 'img/items/image22.jpg', '', '', 8300.16, 0),
(95, 'ohyw', NULL, 94, 93, 'img/items/image22.jpg', '', '', 0, 0),
(96, 'syie', NULL, 95, 94, 'img/items/image22.jpg', '', '', 2988980, 0),
(97, 'rljk', NULL, 96, 95, 'img/items/image22.jpg', '', '', 8014230, 0),
(98, 'ftee', NULL, 97, 96, 'img/items/image22.jpg', '', '', 16.2235, 0),
(99, 'yhws', NULL, 98, 97, 'img/items/image22.jpg', '', '', 39052000, 0),
(100, 'ntuy', NULL, 99, 98, 'img/items/image23.jpg', '', '', 307.343, 0),
(101, 'sxng', NULL, 100, 99, 'img/items/image23.jpg', '', '', 6892380, 0),
(102, 'kwvl', NULL, 101, 100, 'img/items/image23.jpg', '', '', 1050060, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loginandregister`
--

CREATE TABLE `loginandregister` (
  `id` int(15) NOT NULL,
  `AdminId` int(2) DEFAULT NULL,
  `ShopId` int(5) DEFAULT NULL,
  `DriverId` int(4) DEFAULT NULL,
  `CustomerId` int(10) DEFAULT NULL,
  `UserName` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UserType` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginandregister`
--

INSERT INTO `loginandregister` (`id`, `AdminId`, `ShopId`, `DriverId`, `CustomerId`, `UserName`, `PassWord`, `UserType`) VALUES
(1, 160, NULL, NULL, NULL, 'dzmu', 'grnv', ''),
(2, 161, NULL, NULL, NULL, 'ugki', 'befq', ''),
(3, 162, NULL, NULL, NULL, 'udoc', 'bkfk', ''),
(4, 163, NULL, NULL, NULL, 'qwls', 'czfz', ''),
(5, 164, NULL, NULL, NULL, 'dcvl', 'udhl', ''),
(6, 165, NULL, NULL, NULL, 'zlfc', 'fowt', ''),
(7, 166, NULL, NULL, NULL, 'yyem', 'czup', ''),
(8, 167, NULL, NULL, NULL, 'uldw', 'aryw', ''),
(9, 168, NULL, NULL, NULL, 'ufcc', 'uudj', ''),
(10, 169, NULL, NULL, NULL, 'znhm', 'xfug', ''),
(11, 170, NULL, NULL, NULL, 'cjwt', 'ujej', ''),
(12, 171, NULL, NULL, NULL, 'rbly', 'xfsf', ''),
(13, 172, NULL, NULL, NULL, 'nrxc', 'cfbt', ''),
(14, 173, NULL, NULL, NULL, 'hxon', 'aeru', ''),
(15, 174, NULL, NULL, NULL, 'feds', 'xvka', ''),
(16, 175, NULL, NULL, NULL, 'ihxm', 'nfyk', ''),
(17, 176, NULL, NULL, NULL, 'acbp', 'swzz', ''),
(18, 177, NULL, NULL, NULL, 'fgqk', 'qnlg', ''),
(19, 178, NULL, NULL, NULL, 'ebux', 'dcfk', ''),
(20, 179, NULL, NULL, NULL, 'mdqg', 'fzev', ''),
(21, 180, NULL, NULL, NULL, 'ngpu', 'pjpx', ''),
(22, 181, NULL, NULL, NULL, 'jlhq', 'nyks', ''),
(23, 182, NULL, NULL, NULL, 'jbxu', 'fhkh', ''),
(24, 183, NULL, NULL, NULL, 'mldg', 'pnyc', ''),
(25, 184, NULL, NULL, NULL, 'lkdd', 'jbvc', ''),
(26, 185, NULL, NULL, NULL, 'brbt', 'rkhi', ''),
(27, 186, NULL, NULL, NULL, 'csfd', 'hwjv', ''),
(28, 187, NULL, NULL, NULL, 'qlts', 'xfxa', ''),
(29, 188, NULL, NULL, NULL, 'doyq', 'qofi', ''),
(30, 189, NULL, NULL, NULL, 'dtqo', 'fmoi', ''),
(31, 190, NULL, NULL, NULL, 'wewf', 'bpkt', ''),
(32, 191, NULL, NULL, NULL, 'thpl', 'bjze', ''),
(33, 192, NULL, NULL, NULL, 'dmkf', 'vunj', ''),
(34, 193, NULL, NULL, NULL, 'icqb', 'hfdj', ''),
(35, 194, NULL, NULL, NULL, 'yicm', 'awzp', ''),
(36, 195, NULL, NULL, NULL, 'dthy', 'sjcy', ''),
(37, 196, NULL, NULL, NULL, 'kuzx', 'hfap', ''),
(38, 197, NULL, NULL, NULL, 'dyqm', 'yqni', ''),
(39, 198, NULL, NULL, NULL, 'kayb', 'ovjv', ''),
(40, 199, NULL, NULL, NULL, 'vkqp', 'iiyr', ''),
(41, 200, NULL, NULL, NULL, 'krxe', 'gcmj', ''),
(42, 201, NULL, NULL, NULL, 'dgua', 'dkjy', ''),
(43, 202, NULL, NULL, NULL, 'rtyq', 'elgg', ''),
(44, 203, NULL, NULL, NULL, 'cikq', 'rkwi', ''),
(45, 204, NULL, NULL, NULL, 'bbui', 'ymfs', ''),
(46, 205, NULL, NULL, NULL, 'dmav', 'evtb', ''),
(47, 206, NULL, NULL, NULL, 'byyc', 'sqpe', ''),
(48, 207, NULL, NULL, NULL, 'xfgz', 'daci', ''),
(49, 208, NULL, NULL, NULL, 'icvt', 'zwsx', ''),
(50, 209, NULL, NULL, NULL, 'ahvu', 'vafk', ''),
(51, 210, NULL, NULL, NULL, 'uugt', 'hisb', ''),
(52, 211, NULL, NULL, NULL, 'hkph', 'oscr', ''),
(53, 212, NULL, NULL, NULL, 'lmtw', 'dkbx', ''),
(54, 213, NULL, NULL, NULL, 'alcv', 'iakf', ''),
(55, 214, NULL, NULL, NULL, 'buhu', 'foan', ''),
(56, 215, NULL, NULL, NULL, 'aoyx', 'udsg', ''),
(57, 216, NULL, NULL, NULL, 'kuay', 'gdus', ''),
(58, 217, NULL, NULL, NULL, 'kbmu', 'rwbo', ''),
(59, 218, NULL, NULL, NULL, 'nrhb', 'ixyd', ''),
(60, 219, NULL, NULL, NULL, 'hmxd', 'fpgc', ''),
(61, 220, NULL, NULL, NULL, 'bcph', 'xnoi', ''),
(62, 221, NULL, NULL, NULL, 'lokn', 'ynbs', ''),
(63, 222, NULL, NULL, NULL, 'dceh', 'zgsh', ''),
(64, 223, NULL, NULL, NULL, 'vepi', 'fstz', ''),
(65, 224, NULL, NULL, NULL, 'yujt', 'ietg', ''),
(66, 225, NULL, NULL, NULL, 'yqve', 'rjvu', ''),
(67, 226, NULL, NULL, NULL, 'wuqv', 'xvzz', ''),
(68, 227, NULL, NULL, NULL, 'jtbt', 'jefq', ''),
(69, 228, NULL, NULL, NULL, 'fbgi', 'wkfg', ''),
(70, 229, NULL, NULL, NULL, 'gsfx', 'umlb', ''),
(71, 230, NULL, NULL, NULL, 'lbvn', 'bjhg', ''),
(72, 231, NULL, NULL, NULL, 'udmp', 'kymc', ''),
(73, 232, NULL, NULL, NULL, 'lqio', 'wkdc', ''),
(74, 233, NULL, NULL, NULL, 'msxj', 'fdxu', ''),
(75, 234, NULL, NULL, NULL, 'nyor', 'yxxg', ''),
(76, 235, NULL, NULL, NULL, 'sswb', 'yhoq', ''),
(77, 236, NULL, NULL, NULL, 'jcku', 'qwrk', ''),
(78, 237, NULL, NULL, NULL, 'pjct', 'tlst', ''),
(79, 238, NULL, NULL, NULL, 'bzlf', 'wkuj', ''),
(80, 239, NULL, NULL, NULL, 'ndkb', 'ifzc', ''),
(81, 240, NULL, NULL, NULL, 'yvks', 'qctb', ''),
(82, 241, NULL, NULL, NULL, 'rabp', 'hpxl', ''),
(83, 242, NULL, NULL, NULL, 'gsje', 'pmlk', ''),
(84, 243, NULL, NULL, NULL, 'zluw', 'trhe', ''),
(85, 244, NULL, NULL, NULL, 'rrui', 'wrnm', ''),
(86, 245, NULL, NULL, NULL, 'nvja', 'dnja', ''),
(87, 246, NULL, NULL, NULL, 'cvee', 'vzcx', ''),
(88, 247, NULL, NULL, NULL, 'czmn', 'ifkx', ''),
(89, 248, NULL, NULL, NULL, 'gmmm', 'xlph', ''),
(90, 249, NULL, NULL, NULL, 'dfbr', 'inzy', ''),
(91, 250, NULL, NULL, NULL, 'dzed', 'qjxb', ''),
(92, 251, NULL, NULL, NULL, 'cwjk', 'demm', ''),
(93, 252, NULL, NULL, NULL, 'ccex', 'zdpc', ''),
(94, 253, NULL, NULL, NULL, 'nqxi', 'qtgp', ''),
(95, 254, NULL, NULL, NULL, 'aoig', 'vwhr', ''),
(96, 255, NULL, NULL, NULL, 'bprc', 'sdub', ''),
(97, 256, NULL, NULL, NULL, 'bblh', 'bnaq', ''),
(98, 257, NULL, NULL, NULL, 'rvzv', 'jknn', ''),
(99, 258, NULL, NULL, NULL, 'nucw', 'obra', ''),
(100, 259, NULL, NULL, NULL, 'wswx', 'xisl', ''),
(101, NULL, NULL, NULL, 101, 'husseinayyad ', '123456', 'CUSTOMER'),
(102, NULL, NULL, NULL, 102, 'soso', '123456', 'CUSTOMER'),
(103, NULL, NULL, NULL, 101, 'husseinayyad20', '123456', 'CUSTOMER'),
(106, NULL, NULL, NULL, 101, 'husseinayyad30', '123456', 'CUSTOMER'),
(107, NULL, NULL, NULL, 101, 'ayyad20', '123456', 'CUSTOMER'),
(111, NULL, NULL, NULL, 101, 'ayyad', '123456', 'CUSTOMER'),
(116, NULL, NULL, NULL, 121, 'fuck', '123456', 'CUSTOMER'),
(120, NULL, NULL, NULL, 129, 'hebaAn', '123456', 'CUSTOMER'),
(123, NULL, NULL, NULL, 134, 'husseinayyad700', '123456', 'CUSTOMER'),
(124, NULL, NULL, NULL, 135, 'hus', '123456', 'CUSTOMER');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `Driver` int(4) DEFAULT NULL,
  `Customer` int(10) DEFAULT NULL,
  `shop` int(5) DEFAULT NULL,
  `Items` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `WhereOrder` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `OrderTime` datetime NOT NULL,
  `OrderReceiveTime` datetime NOT NULL,
  `OrderTotalTime` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `Driver`, `Customer`, `shop`, `Items`, `WhereOrder`, `OrderTime`, `OrderReceiveTime`, `OrderTotalTime`) VALUES
(1, 1, 1, 1, 'ltft', 'edks', '2017-12-23 04:29:57', '2018-01-24 13:47:35', 7815080),
(2, 2, 2, 2, 'lapm', 'amgm', '2001-01-12 14:33:19', '1992-12-14 15:09:31', 657123000),
(3, 3, 3, 3, 'myop', 'pzwa', '1987-10-03 01:40:07', '2001-01-25 13:39:25', 9),
(4, 4, 4, 4, 'qmio', 'lqdl', '1986-11-30 23:56:19', '1991-05-24 03:59:38', 7093),
(5, 5, 5, 5, 'esis', 'oyrq', '2000-07-13 00:13:10', '1984-06-26 10:28:23', 86960500),
(6, 6, 6, 6, 'arwy', 'mekd', '2005-03-09 15:49:30', '2007-02-17 01:10:03', 378897),
(7, 7, 7, 7, 'dcpi', 'dkfy', '1971-10-02 09:10:16', '1996-04-01 08:29:09', 0),
(8, 8, 8, 8, 'ctmf', 'anzc', '1977-01-18 22:42:26', '2018-07-04 20:05:01', 73),
(9, 9, 9, 9, 'bxwc', 'luwz', '1978-03-02 23:37:47', '2004-01-07 22:42:15', 98366600),
(10, 10, 10, 10, 'uyfs', 'cjvl', '2007-10-31 20:05:36', '2000-03-05 11:36:11', 2),
(11, 11, 11, 11, 'laiv', 'yxbd', '1985-10-16 00:20:39', '2006-04-19 19:21:41', 9052090),
(12, 12, 12, 12, 'wnpp', 'tvjh', '2004-11-24 05:35:55', '1991-10-23 04:56:37', 58041),
(13, 13, 13, 13, 'frst', 'gupr', '2016-08-19 17:35:24', '2020-03-17 02:13:05', 25007),
(14, 14, 14, 14, 'glbx', 'ppmj', '1990-10-17 23:13:34', '1991-11-18 07:54:05', 358942000),
(15, 15, 15, 15, 'ydgp', 'cnvz', '2002-09-28 06:18:22', '1974-07-19 05:36:55', 3943),
(16, 16, 16, 16, 'ohfj', 'msmq', '1981-07-20 22:47:02', '2012-12-17 23:32:25', 752),
(17, 17, 17, 17, 'iqtq', 'hjzm', '1976-07-12 08:30:13', '2003-05-14 01:27:26', 8207830),
(18, 18, 18, 18, 'gipi', 'yyvx', '1971-10-06 16:32:53', '1996-02-12 17:03:15', 61),
(19, 19, 19, 19, 'mvfe', 'uunl', '1997-02-13 13:26:57', '2017-09-22 03:49:15', 7),
(20, 20, 20, 20, 'ccju', 'wqrk', '1982-06-25 13:21:48', '1973-07-09 21:42:14', 0),
(21, 21, 21, 21, 'oary', 'mccb', '1975-07-16 00:07:24', '2008-06-13 13:57:49', 3843),
(22, 22, 22, 22, 'zxdn', 'alke', '1997-04-06 19:03:51', '2010-07-21 20:23:20', 21651),
(23, 23, 23, 23, 'azhz', 'dmqr', '1981-06-12 18:09:48', '2017-12-13 07:43:39', 760),
(24, 24, 24, 24, 'kpxa', 'dnqu', '2001-05-11 23:20:32', '1986-01-21 20:47:41', 3933320),
(25, 25, 25, 25, 'klyj', 'neqh', '2008-01-16 00:36:15', '2005-02-16 18:00:00', 7),
(26, 26, 26, 26, 'fmfp', 'lzsh', '1997-09-10 00:19:00', '2018-03-09 11:36:22', 34),
(27, 27, 27, 27, 'mydi', 'sjfa', '1989-07-27 11:06:03', '2009-06-22 17:33:33', 57),
(28, 28, 28, 28, 'afst', 'bbsg', '1970-01-10 12:00:54', '1998-11-11 10:58:57', 955494),
(29, 29, 29, 29, 'qivm', 'hdrg', '1973-03-19 12:52:45', '2001-04-22 09:35:24', 343),
(30, 30, 30, 30, 'dllg', 'dqsx', '2007-12-30 00:51:55', '1997-08-20 17:48:48', 544),
(31, 31, 31, 31, 'rkya', 'jrfr', '2016-08-03 01:14:22', '2003-03-01 19:08:15', 46),
(32, 32, 32, 32, 'tftj', 'ctwf', '2016-12-15 01:04:08', '2019-03-30 18:34:20', 1),
(33, 33, 33, 33, 'vvaa', 'lthi', '1993-02-03 01:15:36', '1985-11-17 04:39:34', 23348400),
(34, 34, 34, 34, 'nahw', 'ejba', '1988-04-20 07:27:49', '2013-05-15 00:57:51', 772625000),
(35, 35, 35, 35, 'fqjw', 'lqqx', '1977-12-02 10:31:15', '1998-09-15 14:09:02', 0),
(36, 36, 36, 36, 'hyvz', 'kvws', '1981-06-03 00:31:41', '1974-09-03 06:12:56', 607075),
(37, 37, 37, 37, 'wzya', 'tcnv', '1981-11-26 08:42:02', '1980-07-07 16:40:16', 94),
(38, 38, 38, 38, 'bcnk', 'faoc', '2004-04-23 18:46:34', '1976-06-15 00:58:39', 9),
(39, 39, 39, 39, 'gfoz', 'gkzw', '1977-02-14 19:51:11', '2007-09-19 15:24:21', 7),
(40, 40, 40, 40, 'bnwe', 'zquq', '2001-05-05 04:09:36', '1972-01-07 07:14:46', 42),
(41, 41, 41, 41, 'basl', 'cuku', '2007-03-14 09:37:57', '1974-09-19 16:28:16', 610982),
(42, 42, 42, 42, 'fiax', 'invo', '2012-06-02 08:29:54', '1989-11-21 21:03:02', 83031200),
(43, 43, 43, 43, 'fens', 'wlub', '2019-12-30 14:39:36', '1997-12-08 13:52:29', 3457260),
(44, 44, 44, 44, 'rwaf', 'zura', '1999-05-02 17:52:37', '1980-01-13 13:47:28', 319640000),
(45, 45, 45, 45, 'lupj', 'wjmc', '1972-08-02 22:36:18', '2020-02-10 14:37:08', 4333),
(46, 46, 46, 46, 'jaig', 'bblk', '1995-06-02 05:02:37', '1972-12-19 19:11:54', 167141000),
(47, 47, 47, 47, 'qsnk', 'bpmc', '2000-06-13 03:14:36', '1987-10-05 09:20:35', 683),
(48, 48, 48, 48, 'ylji', 'djly', '1990-12-15 12:24:51', '2013-10-01 19:33:15', 7508),
(49, 49, 49, 49, 'zjzb', 'clei', '2000-11-26 13:54:00', '2006-02-28 11:46:59', 70996800),
(50, 50, 50, 50, 'kurj', 'dxru', '2002-04-04 15:42:52', '2011-06-28 03:47:41', 741743000),
(51, 51, 51, 51, 'xtis', 'kcen', '2018-04-26 14:53:37', '2011-03-24 10:41:35', 88),
(52, 52, 52, 52, 'oieb', 'empk', '1999-02-02 21:08:32', '1972-03-31 20:26:32', 764933000),
(53, 53, 53, 53, 'ggex', 'auge', '1973-04-09 06:51:19', '1970-08-13 12:19:35', 89740500),
(54, 54, 54, 54, 'bnrg', 'cbuq', '1984-01-11 11:41:51', '2013-06-14 02:43:30', 6389040),
(55, 55, 55, 55, 'yojd', 'cjgv', '1970-12-31 04:09:20', '2015-12-28 00:47:29', 506598000),
(56, 56, 56, 56, 'lpfv', 'plsm', '2010-10-29 18:35:49', '2000-09-25 23:21:16', 0),
(57, 57, 57, 57, 'garw', 'uruy', '2019-06-28 10:35:54', '1999-03-28 17:28:29', 0),
(58, 58, 58, 58, 'zmjr', 'cube', '1996-11-09 09:08:11', '1983-01-25 14:58:13', 7),
(59, 59, 59, 59, 'qywr', 'qhna', '1975-06-13 03:22:02', '1997-10-23 08:11:51', 2062730),
(60, 60, 60, 60, 'xbop', 'eemu', '2009-03-25 21:19:13', '1972-01-17 09:14:37', 343330000),
(61, 61, 61, 61, 'hfwp', 'clrt', '2003-04-20 23:56:22', '1970-08-20 11:06:52', 6424910),
(62, 62, 62, 62, 'vycc', 'ulxm', '1970-07-02 07:06:56', '2008-05-06 19:56:47', 7959910),
(63, 63, 63, 63, 'gxnj', 'jeqg', '2016-12-30 16:31:00', '2012-02-14 11:33:03', 8),
(64, 64, 64, 64, 'dlwj', 'xrmv', '1992-10-05 08:47:49', '1998-07-16 12:10:42', 27704),
(65, 65, 65, 65, 'famo', 'jxji', '1977-10-09 10:34:34', '1984-06-03 15:37:57', 92511400),
(66, 66, 66, 66, 'lwvo', 'jgjv', '1971-10-24 23:33:13', '2007-08-11 23:31:07', 790),
(67, 67, 67, 67, 'flpm', 'vxsz', '1975-06-03 05:44:08', '2014-08-02 22:20:15', 26),
(68, 68, 68, 68, 'zhth', 'fkmm', '2005-07-18 13:55:00', '1992-02-01 20:00:54', 5289),
(69, 69, 69, 69, 'lnxn', 'hspa', '2019-02-05 23:34:39', '2014-07-09 01:23:04', 88),
(70, 70, 70, 70, 'teop', 'aibz', '1977-06-17 17:33:42', '1977-10-02 17:16:43', 108603),
(71, 71, 71, 71, 'qrtl', 'fses', '2016-02-13 17:55:57', '1998-02-25 08:37:30', 1134),
(72, 72, 72, 72, 'sdjp', 'qnpk', '2012-06-12 01:28:07', '2013-08-16 09:48:01', 450),
(73, 73, 73, 73, 'ldza', 'sczk', '1997-07-09 15:50:43', '1977-04-23 18:32:27', 7328880),
(74, 74, 74, 74, 'ckmt', 'czew', '2013-11-12 01:53:28', '2003-07-10 02:05:26', 876729),
(75, 75, 75, 75, 'ycrz', 'reue', '1977-02-23 03:17:37', '1992-01-10 15:05:37', 630),
(76, 76, 76, 76, 'atzt', 'awau', '1981-01-30 06:41:34', '2019-03-08 12:18:10', 22),
(77, 77, 77, 77, 'diaa', 'vhvv', '1986-10-26 01:36:19', '2014-09-15 12:20:26', 9230),
(78, 78, 78, 78, 'hxgk', 'omgq', '2016-04-02 02:41:45', '2009-05-23 03:45:28', 86),
(79, 79, 79, 79, 'dyna', 'iqpt', '1981-07-20 21:24:19', '2008-12-12 12:58:00', 4564900),
(80, 80, 80, 80, 'wqml', 'fxar', '1992-04-24 13:51:18', '2015-07-14 18:44:28', 435901),
(81, 81, 81, 81, 'yrqh', 'nsxf', '1992-01-24 03:26:09', '1983-07-24 05:26:12', 805403),
(82, 82, 82, 82, 'uotn', 'evgr', '1977-07-26 06:48:56', '1990-06-12 02:43:00', 8),
(83, 83, 83, 83, 'dvfg', 'tqjh', '1990-02-12 22:34:15', '1999-05-15 22:25:29', 6021480),
(84, 84, 84, 84, 'rvon', 'xrud', '2014-10-11 05:58:20', '1972-03-09 00:31:12', 6584020),
(85, 85, 85, 85, 'wmnn', 'xqpb', '1996-09-09 18:20:48', '1999-11-11 00:57:15', 6719240),
(86, 86, 86, 86, 'wwju', 'cmwi', '1997-11-15 09:56:12', '2011-05-16 16:10:17', 600),
(87, 87, 87, 87, 'iugy', 'tqdw', '1999-03-04 16:30:47', '2017-02-16 19:45:24', 0),
(88, 88, 88, 88, 'pvhz', 'sxow', '2004-11-02 23:12:39', '2008-04-01 22:34:40', 128),
(89, 89, 89, 89, 'jpnq', 'hlgr', '1989-08-09 21:16:23', '2005-06-12 21:35:28', 4),
(90, 90, 90, 90, 'logp', 'jmft', '1993-07-03 00:23:33', '2000-12-21 14:12:01', 3),
(91, 91, 91, 91, 'xkpp', 'dqll', '1983-02-07 12:54:35', '1999-06-19 00:54:09', 0),
(92, 92, 92, 92, 'acbf', 'okql', '1971-12-23 20:17:16', '2012-04-18 10:00:40', 3354190),
(93, 93, 93, 93, 'yfde', 'vdsp', '2014-07-20 19:17:17', '2001-11-03 23:30:38', 628),
(94, 94, 94, 94, 'ambd', 'dwyn', '1972-08-31 15:37:20', '2002-07-23 08:41:01', 300829000),
(95, 95, 95, 95, 'dnsl', 'sqzx', '1970-05-26 00:47:14', '1979-05-23 06:25:28', 0),
(96, 96, 96, 96, 'boqi', 'ztsk', '1987-07-13 07:54:53', '1992-08-19 02:54:45', 64),
(97, 97, 97, 97, 'oxya', 'pgic', '2006-07-17 12:52:11', '2007-03-21 03:05:18', 8980),
(98, 98, 98, 98, 'tzkz', 'rzpi', '1980-04-15 13:30:59', '1978-09-23 21:27:15', 1284),
(99, 99, 99, 99, 'intr', 'gtex', '1982-07-26 01:21:40', '2003-12-17 11:00:04', 10546000),
(100, 100, 100, 100, 'azbj', 'bvqb', '1976-08-03 00:31:54', '2004-11-23 07:45:44', 80);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(5) NOT NULL,
  `ShopName` varchar(30) NOT NULL,
  `FirstName` varchar(10) NOT NULL,
  `LastName` varchar(10) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Photo` varchar(100) NOT NULL,
  `IdPhoto1` varchar(100) NOT NULL,
  `IdPhoto2` varchar(100) NOT NULL,
  `JoinDate` datetime NOT NULL DEFAULT current_timestamp(),
  `Type` varchar(30) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `MonthlyPayment` float NOT NULL,
  `ExtraPay` float DEFAULT NULL,
  `Active` tinyint(1) NOT NULL,
  `Size` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `ShopName`, `FirstName`, `LastName`, `Phone`, `Email`, `Photo`, `IdPhoto1`, `IdPhoto2`, `JoinDate`, `Type`, `Location`, `MonthlyPayment`, `ExtraPay`, `Active`, `Size`) VALUES
(1, 'xnar', 'crxw', 'xvxk', '27855', 'ywxp', 'img/profile/shop/image5.jpg', '', '', '2016-08-12 07:48:40', NULL, 'qhlt', 7, 1, 0, 0),
(2, 'pjjt', 'mcjy', 'gzjw', '', 'wecu', 'img/profile/shop/image5.jpg', '', '', '2013-08-25 22:54:58', NULL, 'xuqg', 5, 8, 0, 0),
(3, 'uouf', 'pcoz', 'mugk', '75687000', 'wtws', 'img/profile/shop/image5.jpg', '', '', '1999-03-05 18:59:44', NULL, 'lvvb', 8, 3, 1, 6),
(4, 'svlc', 'hihb', 'wgoz', '5', 'cqfu', 'img/profile/shop/image5.jpg', '', '', '2014-09-16 15:40:14', NULL, 'ejcy', 5, 2, 0, 3),
(5, 'ghcr', 'gedc', 'rxzw', '', 'ghpg', 'img/profile/shop/image5.jpg', '', '', '2010-11-20 16:17:53', NULL, 'rlea', 7, 9, 1, 9),
(6, 'ryec', 'kcin', 'ekri', '896482227', 'vjll', 'img/profile/shop/image5.jpg', '', '', '2007-09-05 04:57:58', NULL, 'drud', 5, 7, 1, 9),
(7, 'qgqm', 'gtwx', 'nhbn', '4', 'pkth', 'img/profile/shop/image5.jpg', '', '', '2015-11-02 11:27:08', NULL, 'bezf', 1, 6, 0, 8),
(8, 'grzn', 'hker', 'lpqx', '84899', 'fhcn', 'img/profile/shop/image5.jpg', '', '', '1971-10-26 09:03:33', NULL, 'mfpx', 6, 6, 0, 5),
(9, 'tucn', 'uotc', 'jppa', '74436231', 'nbfh', 'img/profile/shop/image5.jpg', '', '', '1982-08-28 21:25:15', NULL, 'xeqk', 7, 9, 0, 6),
(10, 'pouu', 'abmy', 'jbdz', '423', 'pdac', 'img/profile/shop/image5.jpg', '', '', '1974-04-05 18:51:03', NULL, 'dlcn', 5, 5, 1, 5),
(11, 'pkzu', 'btcj', 'fblc', '44011', 'hgzh', 'img/profile/shop/image5.jpg', '', '', '1990-09-30 19:46:58', NULL, 'fdxj', 3, 5, 0, 9),
(12, 'srju', 'wfsx', 'qdcl', '5', 'etla', 'img/profile/shop/image5.jpg', '', '', '1992-05-02 22:16:18', NULL, 'hwzw', 8, 8, 1, 7),
(13, 'lfdm', 'rybf', 'pzvy', '409608', 'rkll', 'img/profile/shop/image5.jpg', '', '', '1978-01-28 11:05:43', NULL, 'opvm', 7, 0, 1, 4),
(14, 'ptpk', 'joqa', 'ypiy', '214413383', 'bexz', 'img/profile/shop/image5.jpg', '', '', '1990-03-07 11:01:54', NULL, 'deik', 9, 1, 1, 6),
(15, 'axle', 'effi', 'orrq', '', 'pqle', 'img/profile/shop/image5.jpg', '', '', '2019-06-11 18:45:02', NULL, 'vnin', 7, 1, 1, 6),
(16, 'kmvu', 'ntnh', 'izsa', '197343', 'tysc', 'img/profile/shop/image5.jpg', '', '', '2002-10-02 19:38:54', NULL, 'tlon', 1, 0, 1, 8),
(17, 'iwrd', 'spnv', 'cmnk', '713', 'bhhf', 'img/profile/shop/image5.jpg', '', '', '1981-05-06 23:08:36', NULL, 'fari', 9, 6, 1, 9),
(18, 'amqk', 'rbsy', 'ijor', '8604875', 'umbi', 'img/profile/shop/image5.jpg', '', '', '1987-02-02 23:27:03', NULL, 'jibl', 3, 1, 1, 3),
(19, 'mass', 'teyd', 'tfgi', '474', 'ewiw', 'img/profile/shop/image5.jpg', '', '', '1976-06-04 15:03:48', NULL, 'mbid', 3, 0, 0, 7),
(20, 'uknf', 'duil', 'qxrr', '89', 'lags', 'img/profile/shop/image5.jpg', '', '', '2003-05-24 12:08:52', NULL, 'lrtz', 4, 8, 1, 3),
(21, 'qbsp', 'akqn', 'mmmj', '428', 'ecwa', 'img/profile/shop/image5.jpg', '', '', '2018-12-15 00:12:39', NULL, 'xfjr', 6, 3, 1, 4),
(22, 'omaj', 'fxcw', 'jvnw', '6', 'ipta', 'img/profile/shop/image5.jpg', '', '', '1985-06-29 03:26:52', NULL, 'acbu', 6, 8, 1, 9),
(23, 'zmif', 'dtcv', 'naky', '', 'hcin', 'img/profile/shop/image5.jpg', '', '', '1979-11-23 07:45:14', NULL, 'bexr', 3, 1, 1, 8),
(24, 'ejnx', 'babs', 'ifuz', '8296', 'ntia', 'img/profile/shop/image5.jpg', '', '', '1988-03-17 00:22:03', NULL, 'gouo', 6, 2, 1, 4),
(25, 'scfr', 'gwnz', 'ymms', '', 'tkfb', 'img/profile/shop/image5.jpg', '', '', '1974-04-08 05:19:41', NULL, 'rldb', 4, 4, 1, 4),
(26, 'ybow', 'spoh', 'fizp', '479789556', 'ansv', 'img/profile/shop/image6.jpg', '', '', '1970-08-03 05:01:00', NULL, 'gecg', 5, 3, 0, 4),
(27, 'kgur', 'xlxz', 'pcxe', '81462', 'vjru', 'img/profile/shop/image6.jpg', '', '', '1989-11-18 22:07:41', NULL, 'xmoy', 9, 9, 1, 5),
(28, 'ymif', 'ulfk', 'aufl', '91709477', 'zzoh', 'img/profile/shop/image6.jpg', '', '', '1980-05-03 21:07:33', NULL, 'mgzt', 7, 8, 1, 3),
(29, 'tyum', 'aaga', 'wwcw', '26', 'ivfc', 'img/profile/shop/image6.jpg', '', '', '1989-10-30 15:00:15', NULL, 'inqu', 1, 7, 0, 9),
(30, 'mofl', 'kfyw', 'ngbt', '507328', 'ocwp', 'img/profile/shop/image6.jpg', '', '', '2009-12-24 21:37:05', NULL, 'weyp', 0, 3, 0, 4),
(31, 'qefq', 'fudk', 'iixa', '280', 'divu', 'img/profile/shop/image6.jpg', '', '', '1995-04-19 05:18:23', NULL, 'lcju', 2, 1, 0, 7),
(32, 'crud', 'nhlx', 'lxng', '530710411', 'qtth', 'img/profile/shop/image6.jpg', '', '', '1972-06-12 13:47:55', NULL, 'gyjn', 6, 4, 1, 1),
(33, 'zxed', 'wcrf', 'bzum', '', 'okem', 'img/profile/shop/image6.jpg', '', '', '1998-10-15 10:27:10', NULL, 'lmhc', 9, 8, 0, 5),
(34, 'ecja', 'lezb', 'lwvs', '38390280', 'yzqm', 'img/profile/shop/image6.jpg', '', '', '1991-02-11 17:19:38', NULL, 'auez', 7, 2, 0, 7),
(35, 'rkhn', 'vtys', 'srku', '4', 'cncn', 'img/profile/shop/image6.jpg', '', '', '1997-08-12 11:24:46', NULL, 'lzpt', 0, 5, 0, 1),
(36, 'rwyu', 'vpgz', 'unqe', '1346482', 'crvq', 'img/profile/shop/image6.jpg', '', '', '1994-11-22 11:43:22', NULL, 'xzxj', 4, 3, 0, 2),
(37, 'vuzs', 'dmbw', 'zaeh', '6', 'arqd', 'img/profile/shop/image6.jpg', '', '', '2013-02-20 05:59:23', NULL, 'ynvo', 8, 7, 1, 3),
(38, 'wemg', 'reby', 'hgwu', '907', 'nsks', 'img/profile/shop/image6.jpg', '', '', '1998-10-03 16:43:41', NULL, 'qqod', 6, 3, 1, 2),
(39, 'tmxs', 'vfqe', 'vhcw', '3080', 'jbqo', 'img/profile/shop/image6.jpg', '', '', '2005-09-21 19:24:01', NULL, 'oznv', 8, 7, 0, 6),
(40, 'ohmx', 'uqoy', 'dfck', '462476', 'xihg', 'img/profile/shop/image6.jpg', '', '', '2006-01-30 05:28:06', NULL, 'aykz', 9, 4, 0, 1),
(41, 'effl', 'oamf', 'sfnp', '8203551', 'jpqy', 'img/profile/shop/image6.jpg', '', '', '2015-06-16 15:45:31', NULL, 'ldqr', 9, 1, 1, 1),
(42, 'zpcw', 'qdwb', 'nbou', '61125', 'clca', 'img/profile/shop/image6.jpg', '', '', '2003-04-23 22:59:59', NULL, 'coez', 0, 1, 0, 8),
(43, 'eoqa', 'dpdv', 'krkt', '1875', 'sozf', 'img/profile/shop/image6.jpg', '', '', '1984-03-27 16:03:21', NULL, 'mzpb', 3, 8, 0, 1),
(44, 'xcyk', 'pdkp', 'rlvc', '999', 'dtbl', 'img/profile/shop/image6.jpg', '', '', '2007-02-04 06:05:09', NULL, 'nhrq', 7, 0, 0, 2),
(45, 'hprq', 'poui', 'bued', '403', 'sfrf', 'img/profile/shop/image6.jpg', '', '', '1970-02-26 21:08:04', NULL, 'awyl', 6, 1, 0, 8),
(46, 'xwfa', 'jpsj', 'fsip', '2', 'tvzn', 'img/profile/shop/image6.jpg', '', '', '1985-06-28 17:30:58', NULL, 'pulc', 0, 0, 1, 5),
(47, 'mttx', 'chqd', 'fwhe', '3573', 'kdol', 'img/profile/shop/image6.jpg', '', '', '2008-01-23 14:45:36', NULL, 'bnpg', 9, 1, 0, 2),
(48, 'wmrt', 'esbu', 'vbwh', '2479888', 'icka', 'img/profile/shop/image6.jpg', '', '', '2018-08-13 04:17:53', NULL, 'esnv', 7, 1, 1, 4),
(49, 'pvjv', 'ebfn', 'etwq', '2', 'flsc', 'img/profile/shop/image6.jpg', '', '', '1995-08-03 08:26:22', NULL, 'cbac', 2, 6, 0, 7),
(50, 'isaw', 'nqni', 'hksl', '6', 'cbcx', 'img/profile/shop/image6.jpg', '', '', '1979-07-09 22:34:11', NULL, 'xhiy', 6, 5, 0, 1),
(51, 'dmck', 'tipl', 'rgaq', '80264487', 'zlmz', 'img/profile/shop/image7.jpg', '', '', '1989-08-05 15:02:42', NULL, 'qiqk', 3, 3, 1, 0),
(52, 'zggm', 'utje', 'chir', '97755', 'nzxf', 'img/profile/shop/image7.jpg', '', '', '1980-07-13 06:33:48', NULL, 'toih', 5, 8, 0, 2),
(53, 'qfeg', 'fplh', 'bxvd', '7', 'dxey', 'img/profile/shop/image7.jpg', '', '', '2013-09-25 02:17:51', NULL, 'kehv', 0, 0, 1, 3),
(54, 'lngu', 'ujsu', 'cmbf', '622078409', 'rwja', 'img/profile/shop/image7.jpg', '', '', '1975-05-08 13:54:41', NULL, 'qvao', 8, 4, 1, 2),
(55, 'soaq', 'yrjy', 'qyit', '223168474', 'evwt', 'img/profile/shop/image7.jpg', '', '', '2001-12-10 23:25:03', NULL, 'jdgm', 6, 3, 1, 7),
(56, 'qgld', 'akzl', 'ozga', '90906', 'sjan', 'img/profile/shop/image7.jpg', '', '', '1982-10-31 16:51:40', NULL, 'vrlc', 9, 8, 0, 6),
(57, 'bwik', 'vxji', 'onoz', '9161798', 'ulkz', 'img/profile/shop/image7.jpg', '', '', '1986-12-21 15:09:48', NULL, 'lplr', 1, 9, 1, 2),
(58, 'midy', 'otxy', 'ntpc', '63', 'avkb', 'img/profile/shop/image7.jpg', '', '', '1971-10-09 08:14:39', NULL, 'ztvl', 8, 8, 0, 9),
(59, 'bpet', 'boxn', 'thlv', '59030527', 'fpwz', 'img/profile/shop/image7.jpg', '', '', '1982-09-18 09:58:03', NULL, 'uxne', 1, 1, 0, 9),
(60, 'kqli', 'otzo', 'tndy', '51', 'ltir', 'img/profile/shop/image7.jpg', '', '', '1985-03-03 04:03:28', NULL, 'zcch', 6, 8, 0, 6),
(61, 'udha', 'phkd', 'nman', '193938', 'djcc', 'img/profile/shop/image7.jpg', '', '', '1972-12-19 05:19:47', NULL, 'ater', 6, 9, 0, 7),
(62, 'xqrn', 'syie', 'olyi', '918087', 'cewr', 'img/profile/shop/image7.jpg', '', '', '2011-04-26 18:36:00', NULL, 'ccpt', 7, 6, 0, 2),
(63, 'dcnp', 'xwip', 'dzop', '25456404', 'mcun', 'img/profile/shop/image7.jpg', '', '', '2013-04-08 22:25:39', NULL, 'lkqi', 5, 9, 0, 1),
(64, 'rijl', 'kvnb', 'svdq', '710560', 'pmmw', 'img/profile/shop/image7.jpg', '', '', '2017-07-08 20:15:24', NULL, 'jvpp', 7, 1, 1, 4),
(65, 'syrh', 'gbpk', 'dmek', '71463', 'cbfx', 'img/profile/shop/image7.jpg', '', '', '2015-03-17 11:37:31', NULL, 'amby', 9, 9, 0, 0),
(66, 'gkqe', 'fgey', 'uyqh', '2', 'smpm', 'img/profile/shop/image7.jpg', '', '', '2006-05-13 07:55:21', NULL, 'lczj', 5, 3, 0, 9),
(67, 'woji', 'xvzg', 'eqxc', '59920720', 'dqjg', 'img/profile/shop/image7.jpg', '', '', '2020-08-08 09:50:51', NULL, 'eaho', 7, 2, 1, 7),
(68, 'ikkd', 'szhg', 'avfk', '89792138', 'qcpp', 'img/profile/shop/image7.jpg', '', '', '1972-05-12 03:00:31', NULL, 'nbnn', 1, 4, 1, 6),
(69, 'ssma', 'gnhw', 'kybf', '7831', 'vqsf', 'img/profile/shop/image7.jpg', '', '', '1999-01-31 09:59:17', NULL, 'yotc', 2, 3, 0, 2),
(70, 'uiip', 'grcq', 'aunf', '4104', 'zlzj', 'img/profile/shop/image7.jpg', '', '', '1997-01-14 18:16:59', NULL, 'wemo', 5, 9, 1, 7),
(71, 'yobo', 'yoer', 'gjvt', '1980', 'zzod', 'img/profile/shop/image7.jpg', '', '', '1995-12-27 15:44:15', NULL, 'wvew', 2, 0, 1, 8),
(72, 'wzza', 'nnsx', 'avzh', '62757', 'qbih', 'img/profile/shop/image7.jpg', '', '', '1980-09-23 02:54:08', NULL, 'ypxn', 2, 2, 1, 3),
(73, 'rbmf', 'lkmz', 'jcxv', '273807', 'cpqd', 'img/profile/shop/image7.jpg', '', '', '2015-12-26 20:04:24', NULL, 'gnta', 6, 9, 1, 6),
(74, 'awdn', 'hdxx', 'enmq', '', 'urkd', 'img/profile/shop/image7.jpg', '', '', '1997-12-20 14:34:03', NULL, 'pnyq', 2, 9, 0, 9),
(75, 'hcib', 'jnyg', 'mcvn', '1629', 'rzil', 'img/profile/shop/image7.jpg', '', '', '2006-07-08 13:36:43', NULL, 'nhcl', 7, 1, 0, 5),
(76, 'omul', 'nmzr', 'sgtx', '6', 'maae', 'img/profile/shop/image8.jpg', '', '', '1982-11-23 06:14:00', NULL, 'mczi', 2, 3, 1, 9),
(77, 'ngxx', 'pgio', 'eynb', '65557', 'aykp', 'img/profile/shop/image8.jpg', '', '', '2007-08-07 23:06:49', NULL, 'kkth', 7, 4, 1, 3),
(78, 'ovsq', 'esdo', 'ansx', '532', 'cwlv', 'img/profile/shop/image8.jpg', '', '', '1997-07-07 19:54:58', NULL, 'bphd', 6, 0, 1, 8),
(79, 'xoku', 'ggcu', 'moes', '332727085', 'egce', 'img/profile/shop/image8.jpg', '', '', '1986-12-20 15:04:13', NULL, 'qdtk', 8, 2, 1, 1),
(80, 'dctq', 'lbgv', 'jynu', '1221', 'pncs', 'img/profile/shop/image8.jpg', '', '', '1985-04-25 14:15:21', NULL, 'pcgq', 7, 0, 0, 0),
(81, 'qsgf', 'srxc', 'cwkm', '6620701', 'zqpl', 'img/profile/shop/image8.jpg', '', '', '2006-06-06 04:59:17', NULL, 'rvjz', 0, 4, 0, 2),
(82, 'vlmz', 'xbwn', 'bnok', '527110', 'sqsi', 'img/profile/shop/image8.jpg', '', '', '1994-10-31 11:02:34', NULL, 'ocgv', 1, 9, 1, 7),
(83, 'mmvl', 'hcnm', 'vaip', '196772', 'hqrg', 'img/profile/shop/image8.jpg', '', '', '2004-05-05 15:18:46', NULL, 'jdoo', 0, 2, 0, 1),
(84, 'pazj', 'fkzk', 'dqvg', '64', 'byls', 'img/profile/shop/image8.jpg', '', '', '2009-12-01 16:18:41', NULL, 'xxxi', 9, 6, 1, 9),
(85, 'eeqx', 'mzrc', 'cxcv', '1', 'imdn', 'img/profile/shop/image8.jpg', '', '', '2008-04-18 14:57:38', NULL, 'tavw', 2, 8, 1, 6),
(86, 'rule', 'xrex', 'nzdw', '271902', 'csgt', 'img/profile/shop/image8.jpg', '', '', '1979-04-19 00:20:43', NULL, 'etua', 8, 4, 1, 2),
(87, 'zskx', 'ecch', 'pzyr', '50', 'alxn', 'img/profile/shop/image8.jpg', '', '', '1982-06-08 22:58:10', NULL, 'cvyj', 7, 9, 1, 5),
(88, 'jjwv', 'uwbr', 'gwsz', '431568739', 'efas', 'img/profile/shop/image8.jpg', '', '', '1991-04-19 09:38:17', NULL, 'ldxg', 4, 3, 0, 4),
(89, 'izuw', 'wdhi', 'nwol', '78631311', 'ihnu', 'img/profile/shop/image8.jpg', '', '', '2004-08-14 00:16:49', NULL, 'tuvz', 9, 0, 1, 3),
(90, 'uawm', 'rfre', 'kvbh', '6310', 'ebat', 'img/profile/shop/image8.jpg', '', '', '1980-03-01 22:40:48', NULL, 'odam', 3, 3, 0, 0),
(91, 'hxlr', 'ywfj', 'tcki', '', 'twdw', 'img/profile/shop/image8.jpg', '', '', '2015-10-24 18:07:09', NULL, 'yhzc', 1, 0, 0, 2),
(92, 'ohbh', 'gjlk', 'hmhw', '', 'tlba', 'img/profile/shop/image8.jpg', '', '', '1991-11-05 13:06:22', NULL, 'cvlw', 8, 3, 1, 4),
(93, 'wzpu', 'urra', 'ocav', '21', 'sibv', 'img/profile/shop/image8.jpg', '', '', '2010-09-26 15:04:35', NULL, 'cgbx', 6, 9, 1, 4),
(94, 'pnfc', 'gxvc', 'htmh', '4023', 'rlkb', 'img/profile/shop/image8.jpg', '', '', '2012-07-25 13:10:42', NULL, 'gkgc', 2, 8, 0, 0),
(95, 'zhsb', 'ghau', 'kywj', '2023381', 'iyzr', 'img/profile/shop/image8.jpg', '', '', '2018-04-28 09:50:02', NULL, 'necy', 3, 4, 0, 6),
(96, 'nfqq', 'fqcv', 'ymqi', '', 'hdti', 'img/profile/shop/image8.jpg', '', '', '1982-10-08 08:29:23', NULL, 'dfpz', 8, 2, 1, 2),
(97, 'tavs', 'wvjb', 'cgps', '', 'zypv', 'img/profile/shop/image8.jpg', '', '', '1997-02-06 18:18:03', NULL, 'jvbl', 1, 7, 0, 8),
(98, 'ixhl', 'hlcq', 'axsa', '71', 'yqvd', 'img/profile/shop/image8.jpg', '', '', '1991-03-23 17:04:23', NULL, 'hhjr', 7, 2, 0, 7),
(99, 'juou', 'vhyn', 'tuve', '63965', 'igeh', 'img/profile/shop/image8.jpg', '', '', '1985-12-26 07:10:48', NULL, 'ehbl', 2, 9, 1, 2),
(100, 'nwgd', 'rubl', 'uxlb', '51386', 'mykb', 'img/profile/shop/image8.jpg', '', '', '1970-01-26 22:54:48', NULL, 'keta', 8, 6, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(4) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Category` int(10) DEFAULT NULL,
  `Photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `Name`, `Category`, `Photo`) VALUES
(2, 'gbmu', 52, 'img/subcategory/image9.jpg'),
(3, 'jmnv', 53, 'img/subcategory/image9.jpg'),
(4, 'bowc', 54, 'img/subcategory/image9.jpg'),
(5, 'mokm', 55, 'img/subcategory/image9.jpg'),
(6, 'lgwy', 56, 'img/subcategory/image9.jpg'),
(7, 'aoxz', 57, 'img/subcategory/image9.jpg'),
(8, 'ozhg', 58, 'img/subcategory/image9.jpg'),
(9, 'dvcm', 59, 'img/subcategory/image9.jpg'),
(10, 'xtjz', 60, 'img/subcategory/image9.jpg'),
(11, 'cnik', 61, 'img/subcategory/image9.jpg'),
(12, 'eyqp', 62, 'img/subcategory/image9.jpg'),
(13, 'qppy', 63, 'img/subcategory/image9.jpg'),
(14, 'wwed', 64, 'img/subcategory/image9.jpg'),
(15, 'lfyp', 65, 'img/subcategory/image9.jpg'),
(16, 'ohjz', 66, 'img/subcategory/image9.jpg'),
(17, 'gpgi', 67, 'img/subcategory/image9.jpg'),
(18, 'huvs', 68, 'img/subcategory/image9.jpg'),
(19, 'ufkk', 69, 'img/subcategory/image9.jpg'),
(20, 'tffk', 70, 'img/subcategory/image9.jpg'),
(21, 'vkdt', 71, 'img/subcategory/image9.jpg'),
(22, 'uxgp', 72, 'img/subcategory/image9.jpg'),
(23, 'wtvh', 73, 'img/subcategory/image9.jpg'),
(24, 'ljxt', 74, 'img/subcategory/image9.jpg'),
(25, 'jbmw', 75, 'img/subcategory/image9.jpg'),
(26, 'spbm', 76, 'img/subcategory/image10.jpg'),
(27, 'vyhw', 77, 'img/subcategory/image10.jpg'),
(28, 'jmzb', 78, 'img/subcategory/image10.jpg'),
(29, 'ajwm', 79, 'img/subcategory/image10.jpg'),
(30, 'zyzw', 80, 'img/subcategory/image10.jpg'),
(31, 'gmya', 81, 'img/subcategory/image10.jpg'),
(32, 'cvfb', 82, 'img/subcategory/image10.jpg'),
(33, 'sskr', 83, 'img/subcategory/image10.jpg'),
(34, 'juko', 84, 'img/subcategory/image10.jpg'),
(35, 'lxfx', 85, 'img/subcategory/image10.jpg'),
(36, 'btxw', 86, 'img/subcategory/image10.jpg'),
(37, 'ykfl', 87, 'img/subcategory/image10.jpg'),
(38, 'vwek', 88, 'img/subcategory/image10.jpg'),
(39, 'lhxl', 89, 'img/subcategory/image10.jpg'),
(40, 'sxqm', 90, 'img/subcategory/image10.jpg'),
(41, 'ggsl', 91, 'img/subcategory/image11.jpg'),
(42, 'gflq', 92, 'img/subcategory/image11.jpg'),
(43, 'ahaw', 93, 'img/subcategory/image11.jpg'),
(44, 'ydjb', 94, 'img/subcategory/image11.jpg'),
(45, 'xxtz', 95, 'img/subcategory/image11.jpg'),
(46, 'xncw', 96, 'img/subcategory/image11.jpg'),
(47, 'lxcs', 97, 'img/subcategory/image11.jpg'),
(48, 'unpm', 98, 'img/subcategory/image11.jpg'),
(49, 'sepu', 99, 'img/subcategory/image11.jpg'),
(50, 'sxzy', 100, 'img/subcategory/image11.jpg'),
(51, 'ixqg', 101, 'img/subcategory/image12.jpg'),
(52, 'dthb', 102, 'img/subcategory/image12.jpg'),
(53, 'bijm', 103, 'img/subcategory/image12.jpg'),
(54, 'ktob', 104, 'img/subcategory/image12.jpg'),
(55, 'xttr', 105, 'img/subcategory/image12.jpg'),
(56, 'mklf', 106, 'img/subcategory/image12.jpg'),
(57, 'ekue', 107, 'img/subcategory/image12.jpg'),
(58, 'iiak', 108, 'img/subcategory/image12.jpg'),
(59, 'vsrt', 109, 'img/subcategory/image12.jpg'),
(60, 'xmhj', 110, 'img/subcategory/image12.jpg'),
(61, 'zwbz', 111, 'img/subcategory/image12.jpg'),
(62, 'hamm', 112, 'img/subcategory/image12.jpg'),
(63, 'nksd', 113, 'img/subcategory/image12.jpg'),
(64, 'vevj', 114, 'img/subcategory/image12.jpg'),
(65, 'gzxl', 115, 'img/subcategory/image12.jpg'),
(66, 'gfkb', 116, 'img/subcategory/image12.jpg'),
(67, 'wpam', 117, 'img/subcategory/image12.jpg'),
(68, 'irru', 118, 'img/subcategory/image12.jpg'),
(69, 'hmxe', 119, 'img/subcategory/image12.jpg'),
(70, 'sjuc', 120, 'img/subcategory/image12.jpg'),
(71, 'xsyv', 121, 'img/subcategory/image12.jpg'),
(72, 'auaz', 122, 'img/subcategory/image12.jpg'),
(73, 'urpe', 123, 'img/subcategory/image12.jpg'),
(74, 'mijf', 124, 'img/subcategory/image12.jpg'),
(75, 'btxa', 125, 'img/subcategory/image12.jpg'),
(76, 'jqdm', 126, 'img/subcategory/image13.jpg'),
(77, 'zjts', 127, 'img/subcategory/image13.jpg'),
(78, 'lqpv', 128, 'img/subcategory/image13.jpg'),
(79, 'aacj', 129, 'img/subcategory/image13.jpg'),
(80, 'jhqa', 130, 'img/subcategory/image13.jpg'),
(81, 'legf', 131, 'img/subcategory/image13.jpg'),
(82, 'uwzp', 132, 'img/subcategory/image13.jpg'),
(83, 'avpc', 133, 'img/subcategory/image13.jpg'),
(84, 'csmg', 134, 'img/subcategory/image13.jpg'),
(85, 'qtui', 135, 'img/subcategory/image13.jpg'),
(86, 'jtlv', 136, 'img/subcategory/image13.jpg'),
(87, 'qnqm', 137, 'img/subcategory/image13.jpg'),
(88, 'flwo', 138, 'img/subcategory/image13.jpg'),
(89, 'amzf', 139, 'img/subcategory/image13.jpg'),
(90, 'ripg', 140, 'img/subcategory/image13.jpg'),
(91, 'nqir', 141, 'img/subcategory/image13.jpg'),
(92, 'gjxb', 142, 'img/subcategory/image13.jpg'),
(93, 'wnci', 143, 'img/subcategory/image13.jpg'),
(94, 'pfrd', 144, 'img/subcategory/image13.jpg'),
(95, 'ducs', 145, 'img/subcategory/image13.jpg'),
(96, 'ophb', 146, 'img/subcategory/image13.jpg'),
(97, 'ggkq', 147, 'img/subcategory/image13.jpg'),
(98, 'ufwf', 148, 'img/subcategory/image13.jpg'),
(99, 'awxk', 149, 'img/subcategory/image13.jpg'),
(100, 'fppt', 150, 'img/subcategory/image13.jpg'),
(101, 'hycs', 151, 'img/subcategory/image13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additions`
--
ALTER TABLE `additions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `AdminKey` (`AdminKey`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `CarAssigned` (`CarAssigned`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`CustomerId`,`ItemId`),
  ADD KEY `category` (`category`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemId` (`ItemId`),
  ADD KEY `shop` (`shop`),
  ADD KEY `Customer` (`Customer`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `SubCategory` (`SubCategory`),
  ADD KEY `Shop` (`Shop`);

--
-- Indexes for table `loginandregister`
--
ALTER TABLE `loginandregister`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `UserName_2` (`UserName`),
  ADD KEY `loginandregister_ibfk_1` (`CustomerId`),
  ADD KEY `loginandregister_ibfk_2` (`AdminId`),
  ADD KEY `loginandregister_ibfk_3` (`DriverId`),
  ADD KEY `ShopId` (`ShopId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Customer` (`Customer`),
  ADD KEY `Driver` (`Driver`),
  ADD KEY `orders_ibfk_3` (`shop`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategory_ibfk_2` (`Category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additions`
--
ALTER TABLE `additions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `loginandregister`
--
ALTER TABLE `loginandregister`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additions`
--
ALTER TABLE `additions`
  ADD CONSTRAINT `additions_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`CarAssigned`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`category`) REFERENCES `items` (`SubCategory`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`CustomerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_3` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`shop`) REFERENCES `shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`Customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`SubCategory`) REFERENCES `subcategory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`Shop`) REFERENCES `shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loginandregister`
--
ALTER TABLE `loginandregister`
  ADD CONSTRAINT `loginandregister_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loginandregister_ibfk_2` FOREIGN KEY (`AdminId`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loginandregister_ibfk_3` FOREIGN KEY (`DriverId`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loginandregister_ibfk_4` FOREIGN KEY (`ShopId`) REFERENCES `shop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Driver`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`shop`) REFERENCES `shop` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_ibfk_2` FOREIGN KEY (`Category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
