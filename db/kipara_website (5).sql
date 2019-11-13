-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 11:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kipara_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`id` bigint(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'ACCESARIES', 'YES'),
(2, 'Electrical & Electronic Spares Parts', 'NO'),
(3, 'POLISHES', 'YES'),
(4, 'MACHINERY', 'YES'),
(5, 'MICRO FIBER CLOTHS', 'YES'),
(6, 'PRESSURE PIPE', 'YES'),
(7, 'GENERAL', 'YES'),
(8, 'CAR WASH', 'YES'),
(9, 'CLEANERS', 'YES'),
(10, 'FITTINGS', 'NO'),
(11, 'CHEMICALS', 'YES'),
(12, 'VACCUM ACCESSARIES', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE IF NOT EXISTS `description` (
`id` int(100) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `features` varchar(1000) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `product`, `category`, `description`, `features`, `deletestatus`) VALUES
(1, '1', '1', '', '', 'YES'),
(2, '2', '1', '', '', 'YES'),
(3, '3', '1', '', '', 'YES'),
(4, '4', '1', '', '', 'YES'),
(5, '5', '1', '', '', 'YES'),
(6, '6', '1', '', '', 'YES'),
(7, '7', '1', '', '', 'YES'),
(8, '8', '1', '', '', 'YES'),
(9, '9', '1', '', '', 'YES'),
(10, '10', '1', '', '', 'YES'),
(11, '11', '1', '', '', 'YES'),
(12, '12', '1', '', '', 'YES'),
(13, '13', '1', '', '', 'YES'),
(14, '14', '1', '', '', 'YES'),
(15, '15', '1', '', '', 'YES'),
(16, '16', '1', '', '', 'YES'),
(17, '17', '1', '', '', 'YES'),
(18, '18', '1', '', '', 'YES'),
(19, '19', '1', '', '', 'YES'),
(20, '20', '1', '', '', 'YES'),
(21, '21', '1', '', '', 'YES'),
(22, '22', '1', '', '', 'YES'),
(23, '23', '1', '', '', 'YES'),
(24, '24', '1', '', '', 'YES'),
(25, '25', '1', '', '', 'YES'),
(26, '26', '1', '', '', 'YES'),
(27, '27', '1', '', '', 'YES'),
(28, '28', '1', '', '', 'YES'),
(29, '29', '1', '', '', 'YES'),
(30, '30', '1', '', '', 'YES'),
(31, '31', '1', '', '', 'YES'),
(32, '32', '1', '', '', 'YES'),
(33, '33', '1', '', '', 'YES'),
(34, '34', '1', '', '', 'YES'),
(35, '35', '1', '', '', 'YES'),
(36, '36', '1', '', '', 'YES'),
(37, '37', '1', '', '', 'YES'),
(38, '38', '1', '', '', 'YES'),
(39, '39', '1', '', '', 'YES'),
(40, '40', '1', '', '', 'YES'),
(41, '41', '1', '', '', 'YES'),
(42, '42', '1', '', '', 'YES'),
(43, '43', '1', '', '', 'YES'),
(44, '44', '1', '', '', 'YES'),
(45, '45', '1', '', '', 'YES'),
(46, '46', '1', '', '', 'YES'),
(47, '47', '1', '', '', 'YES'),
(48, '48', '1', '', '', 'YES'),
(49, '49', '1', '', '', 'YES'),
(50, '50', '1', '', '', 'YES'),
(51, '51', '11', 'â€¢ KiparaÂ®Car Freshener is natural, nice smelling product for your car. It is all natural essences had made from essential oil and water base so no side effects. There is no harmful chemical like Phosphates, chlorine and ammonia.  Nature fill is an all natural products designed to absorbs oil and hold scent much longer than most any other product in the market. \r\n     Finally, our car freshener that is safe for your family and the environment. \r\nAvailable in 8 different flavors like code K1, K2, K3, K4, K5, K6, K7 and K8. \r\n', 'â€¢	Easy to use.\r\nâ€¢	Economical.\r\nâ€¢	Long lasting formula.\r\nâ€¢	Water based so no hazardous chemical and solvents.\r\nâ€¢	Free from alcohol. \r\n', 'YES'),
(52, '52', '11', '', '', 'YES'),
(53, '53', '12', '', '', 'YES'),
(54, '54', '12', '', '', 'YES'),
(55, '55', '12', '', '', 'YES'),
(56, '56', '12', '', '', 'YES'),
(57, '57', '12', '', '', 'YES'),
(58, '58', '12', '', '', 'YES'),
(59, '59', '12', '', '', 'YES'),
(60, '60', '12', '', '', 'YES'),
(61, '61', '12', '', '', 'YES'),
(62, '62', '12', '', '', 'YES'),
(63, '63', '12', '', '', 'YES'),
(64, '64', '12', '', '', 'YES'),
(65, '65', '12', '', '', 'YES'),
(66, '66', '12', '', '', 'YES'),
(67, '67', '12', '', '', 'YES'),
(68, '68', '12', '', '', 'YES'),
(69, '69', '12', '', '', 'YES'),
(70, '70', '12', '', '', 'YES'),
(71, '71', '8', '', '', 'YES'),
(72, '72', '8', '', '', 'YES'),
(73, '73', '8', '', '', 'YES'),
(74, '74', '8', 'o	It is innovative product develop for professionals for car care service provider. It is concentrated shampoo which easily removes dust, dirt and grease. It is very economical products for professionalâ€™s .This products have no side effects for car and user.', 'â€¢	Pleasantly perfumed dark orange liquid.\r\nâ€¢	Quick and easy to use.\r\nâ€¢	Concentrated.\r\nâ€¢	Thick and durable foam.\r\nâ€¢	Keep vehicle looking better for longer.\r\nâ€¢	Low uses cost.\r\nâ€¢	pH balanced formulation so safe for car paint .\r\n', 'YES'),
(75, '75', '8', 'This is highly innovative product develop for professionals for car care service provider. It is very concentrated shampoo which quickly removes dust, dirt and grease. It is very economical products for professionalâ€™s .This products have no side effects for car and user. This shampoo gives extra shine to your valuable car. ', 'â€¢	Pleasantly perfumed dark Red liquid.\r\nâ€¢	Quick and easy to use.\r\nâ€¢	Highly Concentrated.\r\nâ€¢	Thick and durable foam.\r\nâ€¢	Keep vehicle looking better for longer.\r\nâ€¢	Low uses cost.\r\nâ€¢	pH balanced formulation so safe for car paint .\r\nâ€¢	Save time and efforts because of it high foam and strong cleaning action.  \r\n', 'YES'),
(76, '76', '8', 'o	It is economical product develop for professionals for car care service provider. It is concentrated green color shampoo which easily removes dust, dirt and grease. It is very economical products for professionalâ€™s .This products have no side effects for car and user. ', 'â€¢	Pleasantly perfumed dark Green color viscous liquid.\r\nâ€¢	Quick and easy to use.\r\nâ€¢	Concentrated.\r\nâ€¢	Thick and durable foam.\r\nâ€¢	Keep vehicle looking better for longer.\r\nâ€¢	Low uses cost.\r\nâ€¢	pH balanced formulation so safe for car paint .\r\n', 'YES'),
(77, '77', '8', 'o	It is very economical product develop for service stations. It is yellow color liquid which removes dust, dirt and grease. It is very economical products for professionalâ€™s .This products also have no side effects for car and user. ', 'â€¢	Pleasantly perfumed Yellow  color liquid.\r\nâ€¢	Quick and easy to use.\r\nâ€¢	Mild Concentrated.\r\nâ€¢	 Slightly thick and durable foam.\r\nâ€¢	Keep vehicle looking better for longer.\r\nâ€¢	Low purchase cost.\r\nâ€¢	pH balanced formulation so safe for car paint .\r\n', 'YES'),
(78, '78', '9', '', '', 'YES'),
(79, '79', '9', 'KiparaÂ®Engine Cleaner is highly concentrated violet color water based liquid. It has natural aroma and high alkaline pH. It could be use for car engine, oily floor.    ', 'â€¢	Pleasantly perfumed dark Violet liquid.\r\nâ€¢	Quick and easy to use.\r\nâ€¢	Highly Concentrated.\r\nâ€¢	High alkalinity pH 12 to 13.\r\nâ€¢	Keep vehicle engine looking better for longer.\r\nâ€¢	Low uses cost due to off water dilution.\r\nâ€¢	Versatile product for car engine, exterior grillwork and rocker panels.\r\nâ€¢	Save time and efforts because of it high foam and strong cleaning action.  ', 'YES'),
(80, '80', '9', '', '', 'YES'),
(81, '81', '9', '', '', 'YES'),
(82, '82', '9', 'KiparaÂ®Interior Cleaner largest selling product because of interior cleaning is more important for our personal hygiene.   KiparaÂ®Interior Cleaner is concentrate, Soft and it also mild polishing to your car interior, which also helps to resist bad odor, removes stains, oil and dirt quickly and gives extra shine as like as new.   \r\n	KiparaÂ®Interior Cleaner gives mild sweet and fresh fragrance to your car. It is extremely effective on car interior like Dashboard, Steering, Seat cover, Roof, Vinyl, etc. It could be also use for cleaning Sofa, Bags, and leather accessories of car and home.\r\n', 'â€¢	Pleasantly perfumed dark Green or Pink liquid.\r\nâ€¢	Quick and easy to use.\r\nâ€¢	Highly Concentrated.\r\nâ€¢	Low alkalinity pH 12 to 13.\r\nâ€¢	Keep vehicle looking better for longer.\r\nâ€¢	Low uses cost due to off water dilution.\r\nâ€¢	Versatile product for car seat cover, Vinyl, leather, roof, etc.\r\nâ€¢	Save time and efforts because of it high foam and strong cleaning action.  \r\n', 'YES'),
(83, '83', '9', '', '', 'YES'),
(84, '84', '9', '', '', 'YES'),
(85, '85', '9', 'It is mild concentrated blend of petroleum hydrocarbons which loosen tar and grease very effectively which also removes gum marks, paint marks from the car body and glass. ', 'â€¢	It is very powerful stain-fighting formula, easily removes Tar and dried-on residue. \r\nâ€¢	Easily and effectively removes: bugs, tar, bird droppings, tree sap.\r\nâ€¢	Non-drip formula provides total control for precision spot cleaning.\r\n It is safe for use on metal, paint, plastic, and glass and no side effect to car surface and c\r\n', 'YES'),
(86, '86', '9', 'KiparaÂ®Windshield Glass Cleaner is good product for cleaning of car windshield and other glasses also. Keeping your vehicle''s windshield clean is an easy, yet extremely important, way to make your vehicle safer for you, your loved ones and other drivers on the road. It''s not hard to let dirt, bugs and other visual hindrances build up on your windshield. Fortunately, So this product will leave your windshield clean and streak-free.', '', 'YES'),
(87, '87', '6', '', '', 'YES'),
(88, '88', '6', '', '', 'YES'),
(89, '89', '6', '', '', 'YES'),
(90, '90', '6', '', '', 'YES'),
(91, '91', '6', '', '', 'YES'),
(92, '92', '6', '', '', 'YES'),
(93, '93', '6', '', '', 'YES'),
(94, '94', '6', '', '', 'YES'),
(95, '95', '6', '', '', 'YES'),
(96, '96', '6', '', '', 'YES'),
(97, '97', '6', '', '', 'YES'),
(98, '98', '6', '', '', 'YES'),
(99, '99', '6', '', '', 'YES'),
(100, '100', '6', '', '', 'YES'),
(101, '101', '6', '', '', 'YES'),
(102, '102', '3', '', '', 'YES'),
(103, '103', '3', 'regre', '', 'YES'),
(104, '104', '3', 'KiparaÂ®Car Body Polish is the second step of polish to your valuable car for beautiful shine.\r\nThis product is made with the finest yellow Brazil wax for superior and protection to car surface. It is non abrasives so use it as often as you like.  You can apply for better shine, depth and protection of your car surface color. \r\n	KiparaÂ®Car Body Polish will display very high gloss combined with exceptional resistance from UV radiation, acid rain, hard water and industrial resistant fallout. \r\n', '', 'YES'),
(105, '105', '3', 'KiparaÂ®Dash Board Polish is a Dashboard fiber and Vinyl renovator. It gives mat finish shine to fiber and did not absorb dust, dirt easily. This polish is economical and easy to use which give shine as new and also protect against drying and cracking.\r\nKiparaÂ®Dash Board Polish is particularly successful in treating the less accessible areas associated with vehicle dashboard.   \r\n', 'â€¢	Pleasantly perfumed.\r\nâ€¢	Quick and easy to use.\r\nâ€¢	Protects against drying and cracking.\r\nâ€¢	Interior looks and smells clean save time.\r\nâ€¢	Keep vehicle looking better for longer.\r\n', 'YES'),
(106, '106', '3', '', '', 'YES'),
(107, '107', '3', '', '', 'YES'),
(108, '108', '3', '', '', 'YES'),
(109, '109', '3', 'KiparaÂ®Rubbing Polish is the first step of polishing. It is off white colored cream that removes light to moderate scratches and oxidation from all cars painted surface s, while leaving good gloss and no swirl mark s retains. It can be use by microfiber cloth or pad after sanding by polish paper like 1500 or 2000 No. ', 'â€¢	Thick Off white cream.\r\nâ€¢	Clears mild oxidation and scratches.\r\nâ€¢	Give a Swirl free shining. \r\nâ€¢	Buffs easily and bring out a deep and good glossy effect.\r\nâ€¢	Dries slowly.\r\nâ€¢	Small amount of rubbing compound needed which prevents pad from becoming saturated. \r\n', 'YES'),
(110, '110', '3', 'KiparaÂ®Tyre Polish is a oil based formula specially developed for Tyre.  It gives glossy shine to tyre and did not absorb dust, dirt easily. This polish is economical and easy to use which give shine as new and also protect against drying and cracking.\r\nKiparaÂ®Tyre Polish is particularly successful in treating the less accessible areas associated with vehicle tires. \r\n', 'â€¢	Non Grassy formula.\r\nâ€¢	Pleasantly perfumed.\r\nâ€¢	Quick and easy to use only spray it.\r\nâ€¢	Protects against drying and cracking.\r\nâ€¢	Tyre looks new and also save time.\r\nâ€¢	Keep vehicle looking better for longer.\r\n', 'YES'),
(111, '111', '3', 'KiparaÂ®Tyre Shine Plus is a water based formula specially developed for Tyre.  It gives glossy shine to tyre and did not absorb dust, dirt easily. This polish is economical and easy to use which give shine as new and also protect against drying and cracking.\r\nKiparaÂ® Tyre Shine Plus particularly successful in treating the less accessible areas associated with vehicle tires. \r\n', 'â€¢	Non Grassy formula.\r\nâ€¢	Pleasantly perfumed.\r\nâ€¢	Quick and easy to use only spray it.\r\nâ€¢	Protects against drying and cracking.\r\nâ€¢	Tyre looks new and also save time.\r\nâ€¢	Keep vehicle looking better for longer.\r\nâ€¢	Non Grassy formula.\r\nâ€¢	Pleasantly perfumed.\r\nâ€¢	Quick and easy to use only spray it.\r\nâ€¢	Protects against drying and cracking.\r\nâ€¢	Tyre looks new and also save time.\r\nâ€¢	Keep vehicle looking better for longer.\r\n', 'YES'),
(112, '112', '3', '', '', 'YES'),
(113, '113', '3', '', '', 'YES'),
(114, '114', '4', '', '', 'YES'),
(115, '115', '4', '', '', 'YES'),
(116, '116', '4', '', '', 'YES'),
(117, '117', '4', '', '', 'YES'),
(118, '118', '4', '', '', 'YES'),
(119, '119', '4', '', '', 'YES'),
(120, '120', '4', '', '', 'YES'),
(121, '121', '4', '', '', 'YES'),
(122, '122', '4', '', '', 'YES'),
(123, '123', '4', '', '', 'YES'),
(124, '124', '4', '', '', 'YES'),
(125, '125', '4', '', '', 'YES'),
(126, '126', '4', '', '', 'YES'),
(127, '127', '4', '', '', 'YES'),
(128, '128', '4', '', '', 'YES'),
(129, '129', '4', '', '', 'YES'),
(130, '130', '4', '', '', 'YES'),
(131, '131', '4', '', '', 'YES'),
(132, '132', '4', '', '', 'YES'),
(133, '133', '4', '', '', 'YES'),
(134, '134', '4', '', '', 'YES'),
(135, '135', '4', '', '', 'YES'),
(136, '136', '4', '', '', 'YES'),
(137, '137', '4', '', '', 'YES'),
(138, '138', '4', '', '', 'YES'),
(139, '139', '4', '', '', 'YES'),
(140, '140', '4', '', '', 'YES'),
(141, '141', '4', '', '', 'YES'),
(142, '142', '4', '', '', 'YES'),
(143, '143', '4', '', '', 'YES'),
(144, '144', '4', '', '', 'YES'),
(145, '145', '4', '', '', 'YES'),
(146, '146', '4', '', '', 'YES'),
(147, '147', '4', '', '', 'YES'),
(148, '148', '4', '', '', 'YES'),
(149, '149', '4', '', '', 'YES'),
(150, '150', '4', '', '', 'YES'),
(151, '151', '4', '', '', 'YES'),
(152, '152', '4', '', '', 'YES'),
(153, '153', '4', '', '', 'YES'),
(154, '154', '5', '', '', 'YES'),
(155, '155', '5', 'KiparaÂ®  Microfiber Cloth is More than 325 GSM means one gram of microfiber equals near about 40,000 meters of threads. It is very soft having made of 80 % Polyester and 20 % Polyamide ratio. The combination of above ratio, when the cloth is damping in water.  So it acts like a as magnet when cleaning. ', 'â€¢ Easily and effectively removes dust, dirt quickly.\r\nâ€¢ Absorbs water quickly.\r\nâ€¢ Due to have soft microfiber no scratches occur on surface on car.\r\nâ€¢ Extensively washable and easy to use. \r\n', 'YES'),
(156, '156', '5', '.', '', 'YES'),
(157, '157', '5', '.', '', 'YES'),
(158, '158', '5', '.', '', 'YES'),
(159, '159', '5', '', '', 'YES'),
(160, '160', '5', '', '', 'YES'),
(161, '161', '5', '', '', 'YES'),
(162, '162', '5', '.', '', 'YES'),
(163, '', '1', '', '', 'YES'),
(164, '', '1', '', '', 'YES'),
(165, '164', '3', '', '', 'YES'),
(166, '165', '1', 'demo', 'demo', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `description2`
--

CREATE TABLE IF NOT EXISTS `description2` (
`id` int(100) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `features` varchar(1000) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description2`
--

INSERT INTO `description2` (`id`, `product`, `category`, `description`, `features`, `deletestatus`) VALUES
(1, '1', '1', '', '', 'YES'),
(2, '2', '1', '', '', 'YES'),
(3, '3', '1', '', '', 'YES'),
(4, '4', '1', '', '', 'YES'),
(5, '5', '1', '', '', 'YES'),
(6, '6', '1', '', '', 'YES'),
(7, '7', '1', '', '', 'YES'),
(8, '8', '1', '', '', 'YES'),
(9, '9', '1', '', '', 'YES'),
(10, '10', '1', '', '', 'YES'),
(11, '11', '1', '', '', 'YES'),
(12, '12', '1', '', '', 'YES'),
(13, '13', '1', '', '', 'YES'),
(14, '14', '1', '', '', 'YES'),
(15, '15', '1', '', '', 'YES'),
(16, '16', '1', '', '', 'YES'),
(17, '17', '1', '', '', 'YES'),
(18, '18', '1', '', '', 'YES'),
(19, '19', '1', '', '', 'YES'),
(20, '20', '1', '', '', 'YES'),
(21, '21', '1', '', '', 'YES'),
(22, '22', '1', '', '', 'YES'),
(23, '23', '1', '', '', 'YES'),
(24, '24', '1', '', '', 'YES'),
(25, '25', '1', '', '', 'YES'),
(26, '26', '1', '', '', 'YES'),
(27, '27', '1', '', '', 'YES'),
(28, '28', '1', '', '', 'YES'),
(29, '29', '1', '', '', 'YES'),
(30, '30', '1', '', '', 'YES'),
(31, '31', '1', '', '', 'YES'),
(32, '32', '1', '', '', 'YES'),
(33, '33', '1', '', '', 'YES'),
(34, '34', '1', '', '', 'YES'),
(35, '35', '1', '', '', 'YES'),
(36, '36', '1', '', '', 'YES'),
(37, '37', '1', '', '', 'YES'),
(38, '38', '1', '', '', 'YES'),
(39, '39', '1', '', '', 'YES'),
(40, '40', '1', '', '', 'YES'),
(41, '41', '1', '', '', 'YES'),
(42, '42', '1', '', '', 'YES'),
(43, '43', '1', '', '', 'YES'),
(44, '44', '1', '', '', 'YES'),
(45, '45', '1', '', '', 'YES'),
(46, '46', '1', '', '', 'YES'),
(47, '47', '1', '', '', 'YES'),
(48, '48', '1', '', '', 'YES'),
(49, '49', '1', '', '', 'YES'),
(50, '50', '1', '', '', 'YES'),
(51, '51', '11', '', '', 'YES'),
(52, '52', '11', '', '', 'YES'),
(53, '53', '12', '', '', 'YES'),
(54, '54', '12', '', '', 'YES'),
(55, '55', '12', '', '', 'YES'),
(56, '56', '12', '', '', 'YES'),
(57, '57', '12', '', '', 'YES'),
(58, '58', '12', '', '', 'YES'),
(59, '59', '12', '', '', 'YES'),
(60, '60', '12', '', '', 'YES'),
(61, '61', '12', '', '', 'YES'),
(62, '62', '12', '', '', 'YES'),
(63, '63', '12', '', '', 'YES'),
(64, '64', '12', '', '', 'YES'),
(65, '65', '12', '', '', 'YES'),
(66, '66', '12', '', '', 'YES'),
(67, '67', '12', '', '', 'YES'),
(68, '68', '12', '', '', 'YES'),
(69, '69', '12', '', '', 'YES'),
(70, '70', '12', '', '', 'YES'),
(71, '71', '8', '', '', 'YES'),
(72, '72', '8', '', '', 'YES'),
(73, '73', '8', '', '', 'YES'),
(74, '74', '8', '', '', 'YES'),
(75, '75', '8', '', '', 'YES'),
(76, '76', '8', '', '', 'YES'),
(77, '77', '8', '', '', 'YES'),
(78, '78', '9', '', '', 'YES'),
(79, '79', '9', '', '', 'YES'),
(80, '80', '9', '', '', 'YES'),
(81, '81', '9', '', '', 'YES'),
(82, '82', '9', '', '', 'YES'),
(83, '83', '9', '', '', 'YES'),
(84, '84', '9', '', '', 'YES'),
(85, '85', '9', '', '', 'YES'),
(86, '86', '9', '', '', 'YES'),
(87, '87', '6', '', '', 'YES'),
(88, '88', '6', '', '', 'YES'),
(89, '89', '6', '', '', 'YES'),
(90, '90', '6', '', '', 'YES'),
(91, '91', '6', '', '', 'YES'),
(92, '92', '6', '', '', 'YES'),
(93, '93', '6', '', '', 'YES'),
(94, '94', '6', '', '', 'YES'),
(95, '95', '6', '', '', 'YES'),
(96, '96', '6', '', '', 'YES'),
(97, '97', '6', '', '', 'YES'),
(98, '98', '6', '', '', 'YES'),
(99, '99', '6', '', '', 'YES'),
(100, '100', '6', '', '', 'YES'),
(101, '101', '6', '', '', 'YES'),
(102, '102', '3', '', '', 'YES'),
(103, '103', '3', '', '', 'YES'),
(104, '104', '3', '', '', 'YES'),
(105, '105', '3', '', '', 'YES'),
(106, '106', '3', '', '', 'YES'),
(107, '107', '3', '', '', 'YES'),
(108, '108', '3', '', '', 'YES'),
(109, '109', '3', '', '', 'YES'),
(110, '110', '3', '', '', 'YES'),
(111, '111', '3', '', '', 'YES'),
(112, '112', '3', '', '', 'YES'),
(113, '113', '3', '', '', 'YES'),
(114, '114', '4', '', '', 'YES'),
(115, '115', '4', '', '', 'YES'),
(116, '116', '4', '', '', 'YES'),
(117, '117', '4', '', '', 'YES'),
(118, '118', '4', '', '', 'YES'),
(119, '119', '4', '', '', 'YES'),
(120, '120', '4', '', '', 'YES'),
(121, '121', '4', '', '', 'YES'),
(122, '122', '4', '', '', 'YES'),
(123, '123', '4', '', '', 'YES'),
(124, '124', '4', '', '', 'YES'),
(125, '125', '4', '', '', 'YES'),
(126, '126', '4', '', '', 'YES'),
(127, '127', '4', '', '', 'YES'),
(128, '128', '4', '', '', 'YES'),
(129, '129', '4', '', '', 'YES'),
(130, '130', '4', '', '', 'YES'),
(131, '131', '4', '', '', 'YES'),
(132, '132', '4', '', '', 'YES'),
(133, '133', '4', '', '', 'YES'),
(134, '134', '4', '', '', 'YES'),
(135, '135', '4', '', '', 'YES'),
(136, '136', '4', '', '', 'YES'),
(137, '137', '4', '', '', 'YES'),
(138, '138', '4', '', '', 'YES'),
(139, '139', '4', '', '', 'YES'),
(140, '140', '4', '', '', 'YES'),
(141, '141', '4', '', '', 'YES'),
(142, '142', '4', '', '', 'YES'),
(143, '143', '4', '', '', 'YES'),
(144, '144', '4', '', '', 'YES'),
(145, '145', '4', '', '', 'YES'),
(146, '146', '4', '', '', 'YES'),
(147, '147', '4', '', '', 'YES'),
(148, '148', '4', '', '', 'YES'),
(149, '149', '4', '', '', 'YES'),
(150, '150', '4', '', '', 'YES'),
(151, '151', '4', '', '', 'YES'),
(152, '152', '4', '', '', 'YES'),
(153, '153', '4', '', '', 'YES'),
(154, '154', '5', '', '', 'YES'),
(155, '155', '5', '', '', 'YES'),
(156, '156', '5', '', '', 'YES'),
(157, '157', '5', '', '', 'YES'),
(158, '158', '5', '', '', 'YES'),
(159, '159', '5', '', '', 'YES'),
(160, '160', '5', '', '', 'YES'),
(161, '161', '5', '', '', 'YES'),
(162, '162', '5', '', '', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `howuse`
--

CREATE TABLE IF NOT EXISTS `howuse` (
`id` int(100) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `howuse` varchar(1000) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `howuse`
--

INSERT INTO `howuse` (`id`, `product`, `category`, `howuse`, `deletestatus`) VALUES
(1, '1', '1', '', 'YES'),
(2, '2', '1', '', 'YES'),
(3, '3', '1', '', 'YES'),
(4, '4', '1', '', 'YES'),
(5, '5', '1', '', 'YES'),
(6, '6', '1', '', 'YES'),
(7, '7', '1', '', 'YES'),
(8, '8', '1', '', 'YES'),
(9, '9', '1', '', 'YES'),
(10, '10', '1', '', 'YES'),
(11, '11', '1', '', 'YES'),
(12, '12', '1', '', 'YES'),
(13, '13', '1', '', 'YES'),
(14, '14', '1', '', 'YES'),
(15, '15', '1', '', 'YES'),
(16, '16', '1', '', 'YES'),
(17, '17', '1', '', 'YES'),
(18, '18', '1', '', 'YES'),
(19, '19', '1', '', 'YES'),
(20, '20', '1', '', 'YES'),
(21, '21', '1', '', 'YES'),
(22, '22', '1', '', 'YES'),
(23, '23', '1', '', 'YES'),
(24, '24', '1', '', 'YES'),
(25, '25', '1', '', 'YES'),
(26, '26', '1', '', 'YES'),
(27, '27', '1', '', 'YES'),
(28, '28', '1', '', 'YES'),
(29, '29', '1', '', 'YES'),
(30, '30', '1', '', 'YES'),
(31, '31', '1', '', 'YES'),
(32, '32', '1', '', 'YES'),
(33, '33', '1', '', 'YES'),
(34, '34', '1', '', 'YES'),
(35, '35', '1', '', 'YES'),
(36, '36', '1', '', 'YES'),
(37, '37', '1', '', 'YES'),
(38, '38', '1', '', 'YES'),
(39, '39', '1', '', 'YES'),
(40, '40', '1', '', 'YES'),
(41, '41', '1', '', 'YES'),
(42, '42', '1', '', 'YES'),
(43, '43', '1', '', 'YES'),
(44, '44', '1', '', 'YES'),
(45, '45', '1', '', 'YES'),
(46, '46', '1', '', 'YES'),
(47, '47', '1', '', 'YES'),
(48, '48', '1', '', 'YES'),
(49, '49', '1', '', 'YES'),
(50, '50', '1', '', 'YES'),
(51, '51', '11', 'KiparaÂ®Car Freshener applies after car wash for better results. Spray it as such in car on roof or seat cover or carpet. Maximum 3 to 4 spray required. \r\n\r\nCaution: Keep away from children, Avoids contacts with eyes and skin.', 'YES'),
(52, '52', '11', '', 'YES'),
(53, '53', '12', '', 'YES'),
(54, '54', '12', '', 'YES'),
(55, '55', '12', '', 'YES'),
(56, '56', '12', '', 'YES'),
(57, '57', '12', '', 'YES'),
(58, '58', '12', '', 'YES'),
(59, '59', '12', '', 'YES'),
(60, '60', '12', '', 'YES'),
(61, '61', '12', '', 'YES'),
(62, '62', '12', '', 'YES'),
(63, '63', '12', '', 'YES'),
(64, '64', '12', '', 'YES'),
(65, '65', '12', '', 'YES'),
(66, '66', '12', '', 'YES'),
(67, '67', '12', '', 'YES'),
(68, '68', '12', '', 'YES'),
(69, '69', '12', '', 'YES'),
(70, '70', '12', '', 'YES'),
(71, '71', '8', '', 'YES'),
(72, '72', '8', '', 'YES'),
(73, '73', '8', '', 'YES'),
(74, '74', '8', '1. Add 20-30 mL  KiparaÂ® Eco Car wash Shampoo to 1-2 liter of Water in a clean bucket.\r\n	2. Rinse the vehicle thoroughly to remove mud that could scratch the paint surface.\r\n3. Using the KiparaÂ®soft microfiber cloth wash car thoroughly.\r\n4. Rinse the vehicle with clean water and dry with KiparaÂ®soft microfiber cloth.\r\n', 'YES'),
(75, '75', '8', 'â€¢  Add one part KiparaÂ®Wash and Wax Shampoo to 300 parts of Water in a clean bucket.\r\nâ€¢  Rinse the vehicle thoroughly to remove mud that could scratch the paint surface.\r\nâ€¢  Using the KiparaÂ®soft microfiber cloth wash car thoroughly.\r\nâ€¢  Rinse the vehicle with clean water and dry with KiparaÂ®soft microfiber cloth.\r\n', 'YES'),
(76, '76', '8', '1. Add 30-40 mL  KiparaÂ® Green Car wash Shampoo to 1-2 Liter of Water in a clean bucket.\r\n	2. Rinse the vehicle thoroughly to remove mud that could scratch the paint surface.\r\n3. Using the KiparaÂ®soft microfiber cloth wash car thoroughly.\r\n4. Rinse the vehicle with clean water and dry with KiparaÂ®soft microfiber cloth.\r\n', 'YES'),
(77, '77', '8', '1. Add 40 to 50 mL  KiparaÂ® Yellow to 1-2 liter of Water in a clean bucket.\r\n	2. Rinse the vehicle thoroughly to remove mud that could scratch the paint surface.\r\n3. Using the KiparaÂ®soft microfiber cloth wash car thoroughly.\r\n4. Rinse the vehicle with clean water and dry with KiparaÂ®soft microfiber cloth.\r\n', 'YES'),
(78, '78', '9', '', 'YES'),
(79, '79', '9', 'â€¢	Dilute one part KiparaÂ®Engine Cleaner and 05 part of water in a bucket.\r\nâ€¢	Spray this solution on engine and keep it 10 to 15 min.\r\nâ€¢	Wash with clean water.\r\n', 'YES'),
(80, '80', '9', '', 'YES'),
(81, '81', '9', '', 'YES'),
(82, '82', '9', 'â€¢	Dilute one part KiparaÂ®Interior Cleaner and 09 part of water in a bucket.\r\nâ€¢	Spray this solution on Dashboard, Vinyl carefully and smoothly rub with microfiber cloth or sponge.\r\nâ€¢	Wash with clean water.\r\n', 'YES'),
(83, '83', '9', '', 'YES'),
(84, '84', '9', '', 'YES'),
(85, '85', '9', 'KiparaTM  Tar Remover applies after wash for better result. \r\nApply it car body and keep as such for 30 Sec or 1 min after that remove residue with microfiber cloth for dazzling shine results.\r\n', 'YES'),
(86, '86', '9', 'â€¢	Wash the windshield with water before adding the cleaning solution. Scrub water in straight lines with a soft brush. Only use horizontal or vertical motions; there''s no need to scrub too hard because you''re only doing an initial wash to loosen the grime up.\r\nâ€¢	Add  KiparaÂ®Windshield Glass Cleaner in wiper tank or Spray the cleaner to one side of a towel. A microfiber towel is best if you have one, and begin cleaning. Use long broad strokes and work from one side to the other for a cleaner, clearer result. It doesn''t take long, but giving that extra attention to detail can make a real difference in how well you can see out of your windshield. If residue remains after the first run, does it again until you get it right.\r\n', 'YES'),
(87, '87', '6', '', 'YES'),
(88, '88', '6', '', 'YES'),
(89, '89', '6', '', 'YES'),
(90, '90', '6', '', 'YES'),
(91, '91', '6', '', 'YES'),
(92, '92', '6', '', 'YES'),
(93, '93', '6', '', 'YES'),
(94, '94', '6', '', 'YES'),
(95, '95', '6', '', 'YES'),
(96, '96', '6', '', 'YES'),
(97, '97', '6', '', 'YES'),
(98, '98', '6', '', 'YES'),
(99, '99', '6', '', 'YES'),
(100, '100', '6', '', 'YES'),
(101, '101', '6', '', 'YES'),
(102, '102', '3', '', 'YES'),
(103, '103', '3', '', 'YES'),
(104, '104', '3', 'KiparaÂ®Car Body Polish apply after Rubbing compound or after wash for better result. \r\nApply it whole car body and keep as such for 30 min to 1 hr after that remove residue with microfiber cloth for dazzling shine results.\r\n', 'YES'),
(105, '105', '3', 'Apply directly with use of sponge. It rapidly clean and shine Dashboards, Vinyl, bumpers, door panels, Engine fiber packing, radiator grilles etc.  Avoid contact with driving controls, foot pedals, steering wheel and floor covering. ', 'YES'),
(106, '106', '3', '', 'YES'),
(107, '107', '3', '', 'YES'),
(108, '108', '3', '', 'YES'),
(109, '109', '3', 'KiparaÂ®Rubbing Polish apply after car wash for better results. Apply first on roof and proceed to the hood, trunks and sides. Apply directly to the car surface by sponge and while the product is wet buff small area with polishing pad. Keep the pad flat on car painted surface buff until product dries with applying light pressure.  Removes residues with microfiber cloth. ', 'YES'),
(110, '110', '3', 'â€¢  Simply mist spray KiparaÂ®Tyre Polish evenly on the tyre wall in a sweeping motion leaves to air dry.  Wipe area using a second clean, dry KiparaÂ®soft microfiber cloth to remove any products residues from the surface.\r\n â€¢  Donâ€™t spray directly onto a heavily soiled tyre wall, pre-clean first using universal.\r\nâ€¢  Avoid contact with driving controls, foot pedals, steering wheel and floor covering. \r\n', 'YES'),
(111, '111', '3', 'â€¢   Simply mist spray KiparaÂ® Tyre Shine Plus evenly on the tyre wall in a sweeping motion leaves to air dry.  Wipe area using a second clean, dry KiparaÂ®soft microfiber cloth to remove any products residues from the surface. â€¢   Donâ€™t spray directly onto a heavily soiled tyre wall, pre-clean first using universal.\r\nâ€¢   Avoid contact with driving controls, foot pedals, steering wheel and floor covering. \r\n', 'YES'),
(112, '112', '3', '', 'YES'),
(113, '113', '3', '', 'YES'),
(114, '114', '4', '', 'YES'),
(115, '115', '4', '', 'YES'),
(116, '116', '4', '', 'YES'),
(117, '117', '4', '', 'YES'),
(118, '118', '4', '', 'YES'),
(119, '119', '4', '', 'YES'),
(120, '120', '4', '', 'YES'),
(121, '121', '4', '', 'YES'),
(122, '122', '4', '', 'YES'),
(123, '123', '4', '', 'YES'),
(124, '124', '4', '', 'YES'),
(125, '125', '4', '', 'YES'),
(126, '126', '4', '', 'YES'),
(127, '127', '4', '', 'YES'),
(128, '128', '4', '', 'YES'),
(129, '129', '4', '', 'YES'),
(130, '130', '4', '', 'YES'),
(131, '131', '4', '', 'YES'),
(132, '132', '4', '', 'YES'),
(133, '133', '4', '', 'YES'),
(134, '134', '4', '', 'YES'),
(135, '135', '4', '', 'YES'),
(136, '136', '4', '', 'YES'),
(137, '137', '4', '', 'YES'),
(138, '138', '4', '', 'YES'),
(139, '139', '4', '', 'YES'),
(140, '140', '4', '', 'YES'),
(141, '141', '4', '', 'YES'),
(142, '142', '4', '', 'YES'),
(143, '143', '4', '', 'YES'),
(144, '144', '4', '', 'YES'),
(145, '145', '4', '', 'YES'),
(146, '146', '4', '', 'YES'),
(147, '147', '4', '', 'YES'),
(148, '148', '4', '', 'YES'),
(149, '149', '4', '', 'YES'),
(150, '150', '4', '', 'YES'),
(151, '151', '4', '', 'YES'),
(152, '152', '4', '', 'YES'),
(153, '153', '4', '', 'YES'),
(154, '154', '5', '', 'YES'),
(155, '155', '5', '', 'YES'),
(156, '156', '5', '', 'YES'),
(157, '157', '5', '', 'YES'),
(158, '158', '5', '', 'YES'),
(159, '159', '5', '', 'YES'),
(160, '160', '5', '', 'YES'),
(161, '161', '5', '', 'YES'),
(162, '162', '5', '', 'YES'),
(163, 'dksjdskgh', '1', '', 'YES'),
(164, 'fgfdgbfgbfht', '1', '', 'YES'),
(165, '164', '3', '', 'YES'),
(166, '165', '1', 'demo', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
`id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `infohead` varchar(255) NOT NULL,
  `info` varchar(200) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `infohead`
--

CREATE TABLE IF NOT EXISTS `infohead` (
`id` int(11) NOT NULL,
  `infohead` varchar(200) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infohead`
--

INSERT INTO `infohead` (`id`, `infohead`, `deletestatus`) VALUES
(1, 'Function', 'YES'),
(2, 'Motor', 'YES'),
(3, 'Capacity', 'YES'),
(4, 'Power', 'YES'),
(5, 'Voltage', 'YES'),
(6, 'Height', 'YES'),
(7, 'Tank Diameter', 'YES'),
(8, 'Mode Of Cooling', 'YES'),
(9, 'Air Flow Rate', 'YES'),
(10, 'Vacuum Suction', 'YES'),
(11, 'Heating', 'YES'),
(12, 'Weight', 'YES'),
(13, 'Length of Cable', 'YES'),
(14, 'Hose Diameter', 'YES'),
(15, 'Packing', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(250) NOT NULL,
  `username` varchar(400) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(900) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(100) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `deletestatus` varchar(100) NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `content`, `img1`, `deletestatus`) VALUES
(15, '2018-07-29', 'What is paint correction/restoration?', 'It is the process in which the imperfections in the carâ€™s paint are to be removed. This process removes swirls, etching, oxidation and other day-to-day external pollutants from the paintâ€™s finish. Unlike many of the â€œswirl removerâ€ products that exist.', 'newsphotos/Penguins.jpg', 'yes'),
(17, '2018-09-04', 'ghfhfyh', 'fbsb fdnfdndfgb mhjjjghjghjg hgfgdgjhtgh vhgvbnvhjgkjgky ghjbj  vb bg bkflkglewj fkbjkehber fbkkfelb', 'newsphotos/mortgage-agreement-in-principle-520x280.jpg', 'yes'),
(28, '2018-09-14', 'hgfv khgvbuygv  jugfcvytfc  jjgfcvbjuygfv ', 'gfdcvjkiuhv mjhgfcvkuygfcv mkiuygfv juygfv mjuygvbnkiuytgfv mkiuytgvb ', 'newsphotos/video2.jpg', 'yes'),
(30, '2018-09-29', 'erhtgnb vfrgthgnv cfrthn vfgthyjmn', 'bhgn vfghyjmn vfghjmn vfghn ', 'newsphotos/slide_3.jpg', 'yes'),
(32, '2018-08-31', 'ghfgnyjyrj', 'cv bv bvbb bvbgfngfngfn', 'newsphotos/car_wash_magenta-BANNER.jpg', 'yes'),
(35, '2018-09-06', 'cbfsdhtrh tnryrhjhrtgn  n', 'vfdsvgfdg gfbgnb ', 'newsphotos/4.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `onlineorder`
--

CREATE TABLE IF NOT EXISTS `onlineorder` (
  `orderno` int(100) NOT NULL,
  `slno` int(100) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `contactcode` varchar(100) NOT NULL,
  `ccode` varchar(100) NOT NULL,
  `ccodeno` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `category` int(50) NOT NULL,
  `itemid` int(100) NOT NULL,
  `item` varchar(200) NOT NULL,
  `size` varchar(100) NOT NULL,
  `hsn` varchar(100) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL,
  `finaltotal` int(100) NOT NULL,
  `mode` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'accepted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onlineorder`
--

INSERT INTO `onlineorder` (`orderno`, `slno`, `date`, `name`, `lname`, `contactcode`, `ccode`, `ccodeno`, `email`, `contact`, `address`, `landmark`, `city`, `state`, `pin`, `category`, `itemid`, `item`, `size`, `hsn`, `unit`, `qty`, `price`, `total`, `finaltotal`, `mode`, `status`) VALUES
(1, 1, '2017-11-24', 'a', 'a', '', '', 0, 'asd@gmail.com', '2345366', 'edfgrgthtr', 'aefrg', 'sdfgwergrt', 'maharastra', '400098', 4, 165, 'Microfiber Cloths', '60X40 cm', '3402', 'nos', 2, 100, 200, 1190, 'Cash on Delivery', 'completed'),
(1, 2, '2017-11-24', 'a', 'a', '', '', 0, 'asd@gmail.com', '2345366', 'edfgrgthtr', 'aefrg', 'sdfgwergr', 'maharastra', '400098', 2, 163, '1 Day Starter', '90ml', '3402', 'nos', 1, 990, 990, 1190, 'Cash on Delivery', 'completed'),
(2, 1, '2017-12-02', 'Shivi', 'Kalra', '', '', 0, 'shivikalra6@gmail.com', '8826608239', 'NH91, Tehsil Dadri, Gautam Buddha Nagar,  ', '', 'Greater Noida,', 'Uttar Pradesh', ' 20131', 0, 0, 'Green Detox', '', '6307', 'nos', 1, 160, 160, 160, 'Cash on Delivery', 'completed'),
(3, 1, '2017-12-20', 'dgfscb', 'zdbgbr', '', '', 0, 'ssdgd', '898564545', 'agdz', '', 'pune', '', '542315', 0, 0, '1 Day Starter', '', '3402', 'nos', 1, 990, 990, 990, 'Cash on Delivery', 'accepted'),
(4, 0, '2018-09-06', 'Vasudha', 'Sutar', 'VS01', 'VS', 1, 'vasudhasutar67@gmail.com', '', 'Alfa Residency', 'Maharashtra', 'Chinchwad', 'Maharashtra', '411021', 0, 0, '', '', '', '', 0, 0, 0, 0, 'Cash on Delivery', 'completed'),
(5, 0, '2018-09-06', 'Vasudha', 'Sutar', 'VS02', 'VS', 2, 'vasudhasutar67@gmail.com', '9415265961', 'Alfa Residency', 'Maharashtra', 'Chinchwad', 'Maharashtra', '411021', 0, 0, '', '', '', '', 0, 0, 0, 0, 'Online Payment', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `online_invoice`
--

CREATE TABLE IF NOT EXISTS `online_invoice` (
  `invoiceno` int(100) NOT NULL,
  `invoiceno1` varchar(100) NOT NULL,
  `contactcode` varchar(100) NOT NULL,
  `slno` int(100) NOT NULL,
  `orderno` int(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `orderdate` date NOT NULL,
  `payment_date` date NOT NULL,
  `dispatch` varchar(100) NOT NULL,
  `transportername` varchar(100) NOT NULL,
  `couriername` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `terms` varchar(100) NOT NULL,
  `category` int(50) NOT NULL,
  `item` int(50) NOT NULL,
  `itemname` varchar(100) NOT NULL,
  `qty` float NOT NULL,
  `rate` float NOT NULL,
  `total` float NOT NULL,
  `finaltotal` int(11) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `chequeno` varchar(50) NOT NULL,
  `chequedate` date NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `batchnumber` varchar(100) NOT NULL,
  `cardtype` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_invoice`
--

INSERT INTO `online_invoice` (`invoiceno`, `invoiceno1`, `contactcode`, `slno`, `orderno`, `date`, `time`, `orderdate`, `payment_date`, `dispatch`, `transportername`, `couriername`, `destination`, `note`, `terms`, `category`, `item`, `itemname`, `qty`, `rate`, `total`, `finaltotal`, `paymentmode`, `chequeno`, `chequedate`, `bankname`, `batchnumber`, `cardtype`, `status`) VALUES
(1, '1/09/18-19', 'AA01', 1, 1, '2018-09-04', '18:49:51', '2017-11-24', '2018-09-04', 'office', '', '', 'edfgrgthtraefrgsdfgwergrt', '1/09/18-19', '2 to 3 days', 0, 0, 'Microfiber Cloths', 2, 100, 200, 1190, 'cash', '', '0000-00-00', '', '', '', 'paid'),
(1, '1/09/18-19', 'AA01', 2, 1, '2018-09-04', '18:49:51', '2017-11-24', '2018-09-04', 'office', '', '', 'edfgrgthtraefrgsdfgwergrt', '1/09/18-19', '2 to 3 days', 0, 0, '1 Day Starter', 1, 990, 990, 1190, 'cash', '', '0000-00-00', '', '', '', 'paid'),
(2, '2/09/18-19', 'SK01', 1, 2, '2018-09-04', '20:18:51', '2017-12-02', '2018-09-05', 'office', '', '', 'NH91, Tehsil Dadri, Gautam Buddha Nagar,  Greater Noida,', '2/09/18-19', '2 to 3 days', 0, 0, 'Green Detox', 1, 160, 160, 160, 'card', '', '0000-00-00', '', '326565654556', 'mastercard', 'paid'),
(3, '3/09/18-19', 'DZ01', 1, 3, '2018-09-05', '12:04:18', '2017-12-20', '2018-09-05', 'transport', 'azad', '', 'agdzpune', '3/09/18-19', '2 to 3 days', 0, 0, '1 Day Starter', 1, 990, 990, 990, 'paytm', '', '0000-00-00', '', '', '', 'paid'),
(4, '4/09/18-19', 'VS03', 0, 4, '2018-09-06', '13:08:27', '2018-09-06', '2018-09-06', 'door delivery', '', '', 'Alfa ResidencyMaharashtraChinchwad', '4/09/18-19', '2 to 3 days', 0, 0, '', 0, 0, 0, 0, 'cash', '', '0000-00-00', '', '', '', 'paid'),
(5, '5/09/18-19', 'VS03', 0, 5, '2018-09-07', '11:44:12', '2018-09-06', '0000-00-00', 'transport', 'c bfsbfs', '', 'Alfa ResidencyMaharashtraChinchwad', '5/09/18-19', '2 to 3 days', 0, 0, '', 0, 0, 0, 0, '', '', '0000-00-00', '', '', '', 'pending'),
(6, '6/09/18-19', 'VS03', 0, 4, '2018-09-07', '16:16:45', '2018-09-06', '0000-00-00', 'door delivery', '', '', 'Alfa ResidencyMaharashtraChinchwad', '6/09/18-19', '2 to 3 days', 0, 0, '', 0, 0, 0, 0, '', '', '0000-00-00', '', '', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`id`, `date`, `name`, `email`, `contact`, `message`) VALUES
(1, '2018-09-07', 'Vasudha Sutar', 'vasudhasutar67@gmail.com', '9415265961', 'This is the demo message '),
(2, '2018-09-07', 'Madhavi Gharge', 'madhavigharge@gmail.com', '9145217517', 'demo content'),
(3, '2018-09-07', 'Vasudha Sutar', 'vasudhasutar67@gmail.com', '9415265961', 'xdvds'),
(4, '2018-09-07', 'name', 'email', 'phone', 'msg'),
(5, '2018-09-07', 'Vasudha Sutardsd', 'vasudhasutar673@gmail.com', '9415265961', 'dffgf fgfg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(255) NOT NULL,
  `category` varchar(200) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `mainprise` float NOT NULL,
  `scratchprise` float NOT NULL,
  `img1` varchar(255) NOT NULL,
  `path1` varchar(200) NOT NULL,
  `deletestatus` varchar(100) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `productname`, `mainprise`, `scratchprise`, `img1`, `path1`, `deletestatus`) VALUES
(1, '1', 'Aluminium Glass Wiper (Magic Shiner)', 0, 0, 'images/Aluminium Glass Wiper (Magic Shiner)DSC_3259.JPG', 'images/', 'YES'),
(2, '1', 'Backup Pad', 190, 200, 'images/Backup PadDSC_3324.JPG', 'images/', 'YES'),
(3, '1', 'Chain Cleaner Brush  ', 0, 0, 'images/', 'images/', 'YES'),
(4, '1', 'DP  Brush ', 0, 0, 'images/', 'images/', 'YES'),
(5, '1', 'Backup Foam Pad', 0, 0, 'images/', 'images/', 'YES'),
(6, '1', 'Foam Pad', 0, 0, 'images/', 'images/', 'YES'),
(7, '1', 'Footrest Paper ', 0, 0, 'images/', 'images/', 'YES'),
(8, '1', 'Glass Grooming Pad 3"', 0, 0, 'images/', 'images/', 'YES'),
(9, '1', 'Glass Wiper With Brush', 0, 0, 'images/', 'images/', 'YES'),
(10, '1', 'Glass Wiper With Tank', 0, 0, 'images/', 'images/', 'YES'),
(11, '1', 'Spray  Wiper', 0, 0, 'images/', 'images/', 'YES'),
(12, '1', 'Wiper (L)', 0, 0, 'images/', 'images/', 'YES'),
(13, '1', 'S.S. Glass Wiper', 0, 0, 'images/', 'images/', 'YES'),
(14, '1', 'Handle  Tyre Brush', 0, 0, 'images/', 'images/', 'YES'),
(15, '1', 'Hand Gloves', 0, 0, 'images/Hand GlovesDSC_3355.JPG', 'images/', 'YES'),
(16, '1', 'Headlight Polishing Kit', 0, 0, 'images/', 'images/', 'YES'),
(17, '1', 'IC Brush (P)   ', 0, 0, 'images/', 'images/', 'YES'),
(18, '1', 'IC Sponge (M)         ', 0, 0, 'images/IC Sponge (M)         scrubber.JPG', 'images/', 'YES'),
(19, '1', 'IC Pump(M) Agro Pump', 0, 0, 'images/', 'images/', 'YES'),
(20, '1', 'IC Pump(P) Agro Pump', 0, 0, 'images/', 'images/', 'YES'),
(21, '1', 'IC Pump', 0, 0, 'images/', 'images/', 'YES'),
(22, '1', 'IC Brush', 0, 0, 'images/', 'images/', 'YES'),
(23, '1', 'IC Brush', 0, 0, 'images/', 'images/', 'NO'),
(24, '1', 'IC Spunge', 0, 0, 'images/', 'images/', 'YES'),
(25, '1', 'IC Pump (P) Wiser Set', 0, 0, 'images/', 'images/', 'YES'),
(26, '1', 'Magic Duster', 0, 0, 'images/', 'images/', 'YES'),
(27, '1', 'Mobile Holder NJ', 0, 0, 'images/', 'images/', 'YES'),
(28, '1', 'Polishing Sponge White', 0, 0, 'images/', 'images/', 'YES'),
(29, '1', 'Rubbing Pad ', 0, 0, 'images/', 'images/', 'YES'),
(30, '1', 'Sander Backup Pad 3 "', 0, 0, 'images/', 'images/', 'YES'),
(31, '1', 'Sanding Paper ', 0, 0, 'images/', 'images/', 'YES'),
(32, '1', 'Tire Repair Kit', 0, 0, 'images/', 'images/', 'YES'),
(33, '1', 'Tissue Paper', 0, 0, 'images/Tissue PaperDSC_3385.JPG', 'images/', 'YES'),
(34, '1', 'Tyre Brush', 0, 0, 'images/', 'images/', 'YES'),
(35, '1', 'Tyre Polishing Spunge', 0, 0, 'images/', 'images/', 'YES'),
(36, '1', 'Polishing Spoung Black', 0, 0, 'images/', 'images/', 'YES'),
(37, '1', 'Multi Sponge Foam', 0, 0, 'images/', 'images/', 'YES'),
(38, '1', 'Sprey Bottle', 0, 0, 'images/', 'images/', 'YES'),
(39, '1', 'Sprey Trigger', 0, 0, 'images/', 'images/', 'YES'),
(40, '1', 'Thumb Trigger', 0, 0, 'images/', 'images/', 'YES'),
(41, '1', 'Teflon Pad 7 Inch', 0, 0, 'images/', 'images/', 'YES'),
(42, '1', 'Pressure Gun Extension ', 0, 0, 'images/', 'images/', 'YES'),
(43, '1', 'Pressure Gun Brass', 0, 0, 'images/', 'images/', 'YES'),
(44, '1', 'Hex Key ', 0, 0, 'images/', 'images/', 'YES'),
(45, '1', 'Hex Key  Hexagonal', 0, 0, 'images/', 'images/', 'YES'),
(46, '1', 'Cutter Knife (LINAI) 18mm', 0, 0, 'images/', 'images/', 'YES'),
(47, '1', 'Blade', 0, 0, 'images/', 'images/', 'YES'),
(48, '1', 'Scraper ', 0, 0, 'images/', 'images/', 'YES'),
(49, '1', '3PC Wire Brush Set', 0, 0, 'images/', 'images/', 'YES'),
(50, '1', 'Sponge', 0, 0, 'images/SpongeDSC_3389.JPG', 'images/', 'YES'),
(51, '11', 'Car Freshener ', 70, 90, 'images/Car Freshener Kipara Car Freshner.jpg', 'images/', 'YES'),
(52, '11', 'Fire Stop', 0, 0, 'images/', 'images/', 'YES'),
(53, '12', 'Cloth Filter assembly VC-30', 0, 0, 'images/', 'images/', 'YES'),
(54, '12', 'Short Connector VC-30', 0, 0, 'images/', 'images/', 'YES'),
(55, '12', 'Long Connector VC-30', 0, 0, 'images/', 'images/', 'YES'),
(56, '12', 'Dust Brush VC-30', 0, 0, 'images/', 'images/', 'YES'),
(57, '12', 'Crevice Tool VC-30', 0, 0, 'images/', 'images/', 'YES'),
(58, '12', 'Suction Hose VC-30', 0, 0, 'images/', 'images/', 'YES'),
(59, '12', 'On-Off switch VC-30 ', 0, 0, 'images/', 'images/', 'YES'),
(60, '12', 'Consister Clip Plastic VC-30', 0, 0, 'images/', 'images/', 'YES'),
(61, '12', 'Vaccum Hose Pipe 36 MM(VC15)', 0, 0, 'images/', 'images/', 'YES'),
(62, '12', 'Dust Brush (VC15)', 0, 0, 'images/', 'images/', 'YES'),
(63, '12', 'Crevice Tools (VC15)', 0, 0, 'images/', 'images/', 'YES'),
(64, '12', 'Sofa Nozzle (VC15)', 0, 0, 'images/', 'images/', 'YES'),
(65, '12', 'Short Connector (VC15)', 0, 0, 'images/', 'images/', 'YES'),
(66, '12', 'Long Connector (VC15)', 0, 0, 'images/', 'images/', 'YES'),
(67, '12', 'Dry Tools (VC15)', 0, 0, 'images/', 'images/', 'YES'),
(68, '12', 'Wet Tools (VC15)', 0, 0, 'images/', 'images/', 'YES'),
(69, '12', 'Wheel VC-30', 0, 0, 'images/', 'images/', 'YES'),
(70, '12', 'Front wheel 60Lit VC', 0, 0, 'images/', 'images/', 'YES'),
(71, '8', 'Dry Wash ', 0, 0, 'images/Dry Wash Kipara Dry Wash.jpg', 'images/', 'YES'),
(72, '8', 'Eco Car Wash(Bag)1 Lit', 0, 0, 'images/', 'images/', 'YES'),
(73, '8', 'Eco Car Wash Box ', 0, 0, 'images/', 'images/', 'YES'),
(74, '8', 'Eco Car Wash ', 300, 310, 'images/', 'images/', 'YES'),
(75, '8', 'Wash & Wax ', 200, 250, 'images/Wash & Wax wash and wax.JPG', 'images/', 'YES'),
(76, '8', 'Green Car Wash', 225, 250, 'images/', 'images/', 'YES'),
(77, '8', 'Yellow Liquid ', 150, 200, 'images/', 'images/', 'YES'),
(78, '9', 'Car Cement Cleaner 1 Lit', 0, 0, 'images/Car Cement Cleaner 1 LitKipara Cement Cleaner.jpg', 'images/', 'YES'),
(79, '9', 'Engine Cleaner ', 150, 150, 'images/Engine Cleaner Kipara Engine Cleaner.jpg', 'images/', 'YES'),
(80, '9', 'Glass Cleaner 100 Ml Buzil', 0, 0, 'images/', 'images/', 'YES'),
(81, '9', 'HWSR  ', 0, 0, 'images/', 'images/', 'YES'),
(82, '9', 'Interior Cleaner 500 Ml', 250, 300, 'images/Interior Cleaner 500 Mlinterior cleaner.JPG', 'images/', 'YES'),
(83, '9', 'Interior Cleaner(Green) ', 0, 0, 'images/Interior Cleaner(Green) Kipara Interior Cleaner 25 lit.jpg', 'images/', 'YES'),
(84, '9', 'Interior Cleaner (Pink)', 0, 0, 'images/Interior Cleaner (Pink)Kipara Interior Cleaner Pink.jpg', 'images/', 'YES'),
(85, '9', 'Tar Remover', 540, 590, 'images/Tar RemoverKipara Tar Remover.jpg', 'images/', 'YES'),
(86, '9', 'Windshield Glass Cleaner (GC)   ', 210, 250, 'images/Windshield Glass Cleaner (GC)   Kipara Windshild Glass Cleaner.jpg', 'images/', 'YES'),
(87, '6', 'PU Pipe (SPAC)', 0, 0, 'images/', 'images/', 'YES'),
(88, '6', 'Coil 12mm', 0, 0, 'images/', 'images/', 'YES'),
(89, '6', 'Coil 8mm', 0, 0, 'images/', 'images/', 'YES'),
(90, '6', 'Hose Pipe ', 0, 0, 'images/', 'images/', 'YES'),
(91, '6', 'Presure Pipe 10m (170)', 0, 0, 'images/', 'images/', 'YES'),
(92, '6', 'Presure Pipe 10 M (210)', 0, 0, 'images/', 'images/', 'YES'),
(93, '6', 'Presure Pipe 10m (250)', 0, 0, 'images/', 'images/', 'YES'),
(94, '6', 'Presure Pipe 12 M (170)', 0, 0, 'images/', 'images/', 'YES'),
(95, '6', 'PU Pipe 12 mm (Amatic)', 0, 0, 'images/', 'images/', 'YES'),
(96, '6', 'Braided Pipe (8mm)', 0, 0, 'images/', 'images/', 'YES'),
(97, '6', 'Grease Hose Pipe,1/4,R2', 0, 0, 'images/', 'images/', 'YES'),
(98, '6', 'Hose pipe (Hydrolic, R2, 3/8, 12 Meter (210)', 0, 0, 'images/', 'images/', 'YES'),
(99, '6', 'Hose pipe (Hydrolic, R2, 3/8, 15 Meter (210)', 0, 0, 'images/', 'images/', 'YES'),
(100, '6', '3/8" BSP[3/8"X1/2"](MXF)', 0, 0, 'images/', 'images/', 'YES'),
(101, '6', '3/8" BSP[3/8"X1/2"](MXF) Gates', 0, 0, 'images/', 'images/', 'YES'),
(102, '3', 'One Step Shine (Liquid)', 0, 0, 'images/One Step Shine (Liquid)Kipara One Step Shine.jpg', 'images/', 'YES'),
(103, '3', '3 In 1 Dresser', 0, 0, 'images/3 In 1 DresserKipara 3 in 1 Dresser.jpg', 'images/', 'YES'),
(104, '3', 'Car Body Polish ', 150, 170, 'images/', 'images/', 'YES'),
(105, '3', 'Dash Board Polish', 340, 355, 'images/Dash Board PolishKipara Dash Board Polish.jpg', 'images/', 'YES'),
(106, '3', 'Eco 3 In 1 Dresser', 0, 0, 'images/Eco 3 In 1 DresserKipara Eco In One Dresser (Pink).jpg', 'images/', 'YES'),
(107, '3', 'Hard Rubbing Polish', 0, 0, 'images/Hard Rubbing PolishKipara Hard Rubbing Polish.jpg', 'images/', 'YES'),
(108, '3', 'One Step Shine (Cream)', 0, 0, 'images/', 'images/', 'YES'),
(109, '3', 'Rubbing Polish', 150, 200, 'images/Rubbing PolishKipara Rubbing Polish.jpg', 'images/', 'YES'),
(110, '3', 'Tyre Polish', 170, 190, 'images/Tyre PolishKipara Tyre Polish.jpg', 'images/', 'YES'),
(111, '3', 'Tyre Shine Plus', 150, 175, 'images/Tyre Shine PlusKipara Tyre Shine Plus.jpg', 'images/', 'YES'),
(112, '3', 'PTFF Protective Coating Teflon 500 mL', 0, 0, 'images/', 'images/', 'YES'),
(113, '3', 'Polish Paper', 0, 0, 'images/', 'images/', 'YES'),
(114, '4', '5" sander Techno AT-980', 0, 0, 'images/', 'images/', 'YES'),
(115, '4', 'Air  Gun ', 0, 0, 'images/', 'images/', 'YES'),
(116, '4', 'Air Pressure COCK ', 0, 0, 'images/', 'images/', 'YES'),
(117, '4', 'Blower ', 0, 0, 'images/', 'images/', 'YES'),
(118, '4', 'Booster Cable (600A)', 0, 0, 'images/', 'images/', 'YES'),
(119, '4', ' Pressure Gun', 0, 0, 'images/', 'images/', 'YES'),
(120, '4', 'Diesel Gun', 0, 0, 'images/', 'images/', 'YES'),
(121, '4', 'Drill Machine', 0, 0, 'images/', 'images/', 'YES'),
(122, '4', 'Drill  (Hi-Maxic083)', 0, 0, 'images/', 'images/', 'YES'),
(123, '4', 'Foam Gun', 0, 0, 'images/', 'images/', 'YES'),
(124, '4', ' Ideal Grinder 801', 0, 0, 'images/', 'images/', 'YES'),
(125, '4', 'High Pressure Gun', 0, 0, 'images/', 'images/', 'YES'),
(126, '4', 'HPT (Kissan) With Stand', 0, 0, 'images/', 'images/', 'YES'),
(127, '4', 'Ideal Hand Polisher', 0, 0, 'images/', 'images/', 'YES'),
(128, '4', 'Interior Gun', 0, 0, 'images/', 'images/', 'YES'),
(129, '4', 'Long Nosel Of Foam Tank', 0, 0, 'images/', 'images/', 'YES'),
(130, '4', 'Power Switch', 0, 0, 'images/', 'images/', 'YES'),
(131, '4', ' Paint Gun', 0, 0, 'images/', 'images/', 'YES'),
(132, '4', 'Speed Switch', 0, 0, 'images/', 'images/', 'YES'),
(133, '4', 'Steam Machine', 0, 0, 'images/', 'images/', 'YES'),
(134, '4', 'T-Gun (Ohri)', 0, 0, 'images/', 'images/', 'YES'),
(135, '4', 'Tyre Inflator (Tirewell)', 0, 0, 'images/', 'images/', 'YES'),
(136, '4', 'USB Vacuum Cleaner', 0, 0, 'images/', 'images/', 'YES'),
(137, '4', 'Vacuum Motor', 0, 0, 'images/', 'images/', 'YES'),
(138, '4', 'Vacuum Cleaner', 0, 0, 'images/', 'images/', 'YES'),
(139, '4', 'Wash Gun', 0, 0, 'images/', 'images/', 'YES'),
(140, '4', 'Ideal Blower SB999', 0, 0, 'images/', 'images/', 'YES'),
(141, '4', 'Hydraulic Jack 3 Ton', 0, 0, 'images/', 'images/', 'YES'),
(142, '4', 'Grease Gun', 0, 0, 'images/', 'images/', 'YES'),
(143, '4', 'Engine Belt', 0, 0, 'images/', 'images/', 'YES'),
(144, '4', 'Foam Lance (1 Lit)', 0, 0, 'images/', 'images/', 'YES'),
(145, '4', 'Hand Polisher Machine (Pro-cut)', 0, 0, 'images/', 'images/', 'YES'),
(146, '4', 'Air Impact Wrench (Pro-cut)', 0, 0, 'images/', 'images/', 'YES'),
(147, '4', 'Sealing Machine (Pro-cut)', 0, 0, 'images/', 'images/', 'YES'),
(148, '4', 'Heat Gun (Pro-cut)', 0, 0, 'images/', 'images/', 'YES'),
(149, '4', 'Ideal Vaccum Cleaner', 0, 0, 'images/', 'images/', 'YES'),
(150, '4', 'Grease machine Dispenser', 0, 0, 'images/', 'images/', 'YES'),
(151, '4', 'Grease Nipple No.1', 0, 0, 'images/', 'images/', 'YES'),
(152, '4', 'Pully 8MM (Kissan Pump)', 0, 0, 'images/', 'images/', 'YES'),
(153, '4', 'Under Body  Coating Gun (AMY, UBG-10)', 0, 0, 'images/', 'images/', 'YES'),
(154, '5', 'Glass Cloth', 0, 0, 'images/', 'images/', 'YES'),
(155, '5', 'Microfiber cloth', 75, 90, 'images/Microfiber clothDSC_3374.JPG', 'images/', 'YES'),
(156, '5', 'Micro Fiber Towels', 0, 0, 'images/Micro Fiber TowelsDSC_3375.JPG', 'images/', 'YES'),
(157, '5', 'MfC Sponge (M)', 0, 0, 'images/MfC Sponge (M)Kipara MFC Sponge.jpg', 'images/', 'YES'),
(158, '5', 'Mitt Hand Glove(L) Double ', 0, 0, 'images/Mitt Hand Glove(L) Double DSC_3355.JPG', 'images/', 'YES'),
(159, '5', 'Car Detailing Kit', 0, 0, 'images/', 'images/', 'YES'),
(160, '5', 'MFC MITT  Crab (P)', 0, 0, 'images/', 'images/', 'YES'),
(161, '5', 'Micro Pad Duster', 0, 0, 'images/', 'images/', 'YES'),
(162, '5', 'T-Shirt With Coller', 0, 0, 'images/T-Shirt With CollerDSC_3395.JPG', 'images/', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `filepath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `date`, `name`, `email`, `city`, `contact`, `message`, `filepath`) VALUES
(1, '2018-09-07', 'Vasudha Sutar', 'vasudhasutar67@gmail.com', 'Chinchwad', '9415265961', 'This is the demo message ', 'resume/1à¤à¤ªà¥à¤°à¤¿à¤².rtf'),
(2, '2018-09-07', 'Madhavi Gharge', 'madhavigharge@gmail.com', 'Pune', '9145217517', 'demo content', 'resume/2madhavi menu css.txt'),
(3, '2018-09-07', 'Vasudha Sutar', 'vasudhasutar67@gmail.com', 'Chinchwad', '9415265961', 'xdvds', 'resume/3journals.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `specification_head`
--

CREATE TABLE IF NOT EXISTS `specification_head` (
`id` int(11) NOT NULL,
  `infohead` varchar(200) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification_head`
--

INSERT INTO `specification_head` (`id`, `infohead`, `deletestatus`) VALUES
(1, ' Appearance', 'YES'),
(2, 'Color', 'YES'),
(3, 'Odor', 'YES'),
(4, 'Specific Gravity', 'YES'),
(5, 'Shelf Life', 'YES'),
(6, 'Packaging', 'YES'),
(7, 'Product code', 'YES'),
(8, 'pH', 'YES'),
(9, 'Size', 'YES'),
(10, 'package', 'YES'),
(11, 'Tank volume / type', 'YES'),
(12, 'Working pressure', 'YES'),
(13, 'Pressure indicator', 'YES'),
(14, 'Recharging', 'YES'),
(15, 'Safety', 'YES'),
(16, 'Gauze', 'YES'),
(17, 'Accesaries', 'NO'),
(18, 'Tank volume / type', 'YES'),
(19, 'dvgsdg', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `specification_info`
--

CREATE TABLE IF NOT EXISTS `specification_info` (
`id` int(100) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `infohead` varchar(255) NOT NULL,
  `info` varchar(200) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specification_info`
--

INSERT INTO `specification_info` (`id`, `product`, `category`, `infohead`, `info`, `deletestatus`) VALUES
(1, '155', '5', '2', 'Blue, Green and Red.', 'YES'),
(2, '155', '5', '9', '40 X 40 CM, 60X40 CM', 'YES'),
(3, '155', '5', '6', '1 Nos and 50 Nos Box', 'YES'),
(4, '155', '5', '7', 'KP009', 'YES'),
(5, '105', '3', '1', 'Thick viscous Cream.', 'YES'),
(6, '105', '3', '2', 'Pink ', 'YES'),
(7, '105', '3', '3', 'Pleasantly K1 perfumed', 'YES'),
(8, '105', '3', '4', '1.10 Â± .05', 'YES'),
(9, '105', '3', '5', 'One year in ambient temperature.', 'YES'),
(10, '105', '3', '6', '200 mL, 1 Lit, 5 Lit, 25 Lit, 50 Lit. ', 'YES'),
(11, '105', '3', '7', 'KP003', 'YES'),
(33, '104', '3', '1', 'Viscous Cream ', 'YES'),
(34, '104', '3', '2', 'Light Green ', 'YES'),
(35, '104', '3', '3', 'NO', 'YES'),
(36, '104', '3', '4', '1.10 Â± .05', 'YES'),
(37, '104', '3', '5', 'One year in ambient temperature.', 'YES'),
(38, '104', '3', '6', '100 g, 1 kg, 5 Kg, 30 Kg', 'YES'),
(39, '104', '3', '7', 'KP006', 'YES'),
(55, '74', '8', '1', 'Thick viscous liquid.', 'YES'),
(56, '74', '8', '2', 'Orange', 'YES'),
(57, '74', '8', '3', 'Lavender or Lime', 'YES'),
(58, '74', '8', '4', '1.00 Â± .05', 'YES'),
(59, '74', '8', '5', 'One year in ambient temperature.', 'YES'),
(60, '74', '8', '6', '5 Lit, 35 Lit, 40 Lit,50 Lit', 'YES'),
(61, '74', '8', '8', '7 to 7.5', 'YES'),
(62, '74', '8', '7', 'KP001', 'YES'),
(77, '51', '11', '1', 'Colored liquid ', 'YES'),
(78, '51', '11', '2', 'Off white, Yellow, Green, Pink, Red', 'YES'),
(79, '51', '11', '3', 'K1, K2, K3, K4, K5, K6, K7, K8', 'YES'),
(80, '51', '11', '4', '0.95Â± .05', 'YES'),
(81, '51', '11', '5', '60 days in ambient temperature.', 'YES'),
(82, '51', '11', '6', '200 mL, 500mL, 1 Lit, 5 Lit.', 'YES'),
(83, '51', '11', '7', 'KP012', 'YES'),
(84, '79', '9', '1', 'Clear Liquid.', 'YES'),
(85, '79', '9', '2', 'Violet', 'YES'),
(86, '79', '9', '3', 'Natural Scented.', 'YES'),
(87, '79', '9', '4', '1.00 Â± .05', 'YES'),
(88, '79', '9', '5', 'One year in ambient temperature.', 'YES'),
(89, '79', '9', '6', '200 mL, 1 Lit, 5 Lit, 50 Lit.', 'YES'),
(90, '79', '9', '7', 'KP015', 'YES'),
(97, '76', '8', '1', 'Thick viscous liquid.', 'YES'),
(98, '76', '8', '2', 'Green', 'YES'),
(99, '76', '8', '3', 'Orange/Mogara', 'YES'),
(100, '76', '8', '4', '1.00 Â± .05', 'YES'),
(101, '76', '8', '5', 'One year in ambient temperature.', 'YES'),
(102, '76', '8', '6', '5 Lit, 35 Lit, 40 Lit,50 Lit', 'YES'),
(103, '77', '8', '1', 'Thick viscous liquid.', 'YES'),
(104, '77', '8', '2', 'Yellow ', 'YES'),
(105, '77', '8', '3', 'Jasmin/Kewada', 'YES'),
(106, '77', '8', '4', '1.00 Â± .05', 'YES'),
(107, '77', '8', '5', 'One year in ambient temperature.', 'YES'),
(108, '77', '8', '6', '5 Lit, 35 Lit, 40 Lit,50 Lit', 'YES'),
(117, '82', '9', '1', 'Clear Liquid.', 'YES'),
(118, '82', '9', '2', 'Green/Pink', 'YES'),
(119, '82', '9', '3', 'lemon ', 'YES'),
(120, '82', '9', '4', '1.00 Â± .05', 'YES'),
(121, '82', '9', '5', 'One year in ambient temperature.', 'YES'),
(122, '82', '9', '6', '200 mL, 1 Lit, 5 Lit, 25 Lit, 50 Lit', 'YES'),
(123, '82', '9', '7', 'KP005', 'YES'),
(138, '85', '9', '1', 'Liquid.', 'YES'),
(139, '85', '9', '2', 'Light Yellow', 'YES'),
(140, '85', '9', '3', 'Perfumed ', 'YES'),
(141, '85', '9', '4', '0.95 Â± .05', 'YES'),
(142, '85', '9', '5', 'One year in ambient temperature.', 'YES'),
(143, '85', '9', '6', '200mL, 1 Lit, 5 Lit', 'YES'),
(144, '85', '9', '7', 'KP008', 'YES'),
(145, '109', '3', '1', 'Viscous Cream ', 'YES'),
(146, '109', '3', '2', 'Off white', 'YES'),
(147, '109', '3', '3', 'NO', 'YES'),
(148, '109', '3', '4', '1.10 Â± .05', 'YES'),
(149, '109', '3', '5', 'One year in ambient temperature.', 'YES'),
(150, '109', '3', '6', '100g, 1 kg, 5 Kg', 'YES'),
(151, '109', '3', '7', 'KP010', 'YES'),
(152, '75', '8', '1', 'Thick viscous liquid.', 'YES'),
(153, '75', '8', '2', 'Red', 'YES'),
(154, '75', '8', '3', 'Lavender or Lime', 'YES'),
(155, '75', '8', '4', '1.00 Â± .05', 'YES'),
(156, '75', '8', '5', 'One year in ambient temperature.', 'YES'),
(157, '75', '8', '6', '500 mL, 1 Lit, 5 Lit, 25 Lit', 'YES'),
(158, '75', '8', '8', '7 to 7.5', 'YES'),
(159, '75', '8', '7', 'KP002', 'YES'),
(160, '86', '9', '1', 'Liquid ', 'YES'),
(161, '86', '9', '2', 'Pink/Green', 'YES'),
(162, '86', '9', '3', 'Pleasantly perfumed', 'YES'),
(163, '86', '9', '4', '1.0 Â± .05	', 'YES'),
(164, '86', '9', '5', 'One year in ambient temperature.', 'YES'),
(165, '86', '9', '6', '200 mL, 1 Lit, 5 Lit', 'YES'),
(166, '86', '9', '7', 'KP007', 'YES'),
(174, '111', '3', '1', 'Liquid', 'YES'),
(175, '111', '3', '2', 'Dark Blue Liquid', 'YES'),
(176, '111', '3', '3', 'Pleasantly K2 perfumed', 'YES'),
(177, '111', '3', '4', '1.10 Â± .05', 'YES'),
(178, '111', '3', '5', 'One year in ambient temperature.', 'YES'),
(179, '111', '3', '6', '200 mL, 1 Lit, 5 Lit, 25 Lit, 50 Lit. ', 'YES'),
(180, '111', '3', '7', 'KP004', 'YES'),
(181, '110', '3', '1', 'Semi Liquid Gel', 'YES'),
(182, '110', '3', '2', 'Sky Blue', 'YES'),
(183, '110', '3', '3', 'Pleasantly K2 perfumed', 'YES'),
(184, '110', '3', '4', '1.10 Â± .05', 'YES'),
(185, '110', '3', '5', 'One year in ambient temperature.', 'YES'),
(186, '110', '3', '6', '200 mL, 1 Lit, 5 Lit, 25 Lit, 50 Lit. ', 'YES'),
(187, '110', '3', '7', 'KP004', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
`id` int(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `subcategoryname` varchar(200) NOT NULL,
  `mainprise` float NOT NULL,
  `scratchprise` float NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category`, `productname`, `subcategoryname`, `mainprise`, `scratchprise`, `deletestatus`) VALUES
(1, '5', '155', '(40x40) CM', 75, 85, 'YES'),
(2, '5', '155', '(40x40 cm ) P', 80, 90, 'YES'),
(3, '5', '155', '(60x40 cm)K', 120, 130, 'YES'),
(4, '5', '155', '(60x40 cm)P', 120, 130, 'YES'),
(5, '5', '155', '(65x33 cm) ', 120, 130, 'YES'),
(6, '5', '155', '(40x40) L', 60, 70, 'YES'),
(7, '5', '155', '(40x40) K', 80, 90, 'YES'),
(8, '5', '155', '(60x40 cm)', 100, 110, 'YES'),
(9, '1', '2', '3 Inch (Nakata)', 190, 200, 'YES'),
(10, '1', '2', '5 Inch (Fuen)', 220, 230, 'YES'),
(11, '1', '2', '5 Inch (PD-100)', 230, 240, 'YES'),
(12, '1', '2', '6 Inch  (Dungcheng)', 250, 260, 'YES'),
(13, '1', '2', '7  Inch  (180mm)', 280, 290, 'YES'),
(31, '11', '51', ' 50 ml', 70, 85, 'YES'),
(32, '11', '51', '100 ml', 100, 150, 'YES'),
(33, '11', '51', '200 ml', 150, 170, 'YES'),
(34, '11', '51', '500 ml', 0, 0, 'YES'),
(35, '11', '51', '1 Lit', 0, 0, 'YES'),
(36, '9', '79', '200 ml', 150, 170, 'YES'),
(37, '9', '79', '1 Lit', 270, 290, 'YES'),
(38, '9', '79', '5 Lit', 1350, 1400, 'YES'),
(39, '9', '79', '25 Lit', 0, 0, 'YES'),
(40, '8', '74', '5 Lit', 300, 350, 'YES'),
(41, '8', '74', '30 Lit', 0, 0, 'YES'),
(42, '8', '74', '35 Lit', 1925, 1990, 'YES'),
(43, '8', '74', '40 Lit', 2200, 2500, 'YES'),
(44, '8', '74', ' 50 Lit', 2750, 2800, 'YES'),
(45, '8', '76', '5 lit', 225, 250, 'YES'),
(46, '8', '76', '10 Lit', 900, 950, 'YES'),
(47, '8', '76', '25 Lit', 1000, 1050, 'YES'),
(48, '8', '76', '30 Lit', 1200, 1250, 'YES'),
(49, '8', '76', '35 Lit', 1400, 1450, 'YES'),
(50, '8', '76', '40 Lit', 1600, 1650, 'YES'),
(51, '8', '76', ' 50 Lit', 2000, 2050, 'YES'),
(52, '8', '77', '5 Lit', 150, 200, 'YES'),
(53, '8', '77', '10 Lit', 300, 350, 'YES'),
(54, '8', '77', '30 Lit', 750, 800, 'YES'),
(55, '8', '77', '35 Lit', 875, 900, 'YES'),
(56, '8', '77', '40 Lit', 1000, 1050, 'YES'),
(57, '8', '75', '500 ml', 200, 250, 'YES'),
(58, '8', '75', '1 Lit', 310, 350, 'YES'),
(59, '8', '75', '5 Lit', 1350, 1400, 'YES'),
(60, '8', '75', '25 Lit', 0, 0, 'YES'),
(61, '9', '85', '1 Lit', 540, 590, 'YES'),
(62, '9', '85', ' 5 Lit', 2050, 3000, 'YES'),
(63, '9', '85', ' 25 Lit', 0, 0, 'YES'),
(64, '3', '109', '100 gm', 150, 170, 'YES'),
(65, '3', '109', '1 kg', 600, 650, 'YES'),
(66, '9', '82', '500 ml', 250, 300, 'YES'),
(67, '3', '105', 'Dash Board Polish', 340, 350, 'YES'),
(68, '9', '86', 'Windshield Glass Cleaner (GC)', 210, 250, 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `description2`
--
ALTER TABLE `description2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `howuse`
--
ALTER TABLE `howuse`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infohead`
--
ALTER TABLE `infohead`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onlineorder`
--
ALTER TABLE `onlineorder`
 ADD PRIMARY KEY (`orderno`,`slno`,`date`,`item`);

--
-- Indexes for table `online_invoice`
--
ALTER TABLE `online_invoice`
 ADD PRIMARY KEY (`invoiceno`,`slno`);

--
-- Indexes for table `partner`
--
ALTER TABLE `partner`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification_head`
--
ALTER TABLE `specification_head`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specification_info`
--
ALTER TABLE `specification_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `description2`
--
ALTER TABLE `description2`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `howuse`
--
ALTER TABLE `howuse`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `infohead`
--
ALTER TABLE `infohead`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `specification_head`
--
ALTER TABLE `specification_head`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `specification_info`
--
ALTER TABLE `specification_info`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=188;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
