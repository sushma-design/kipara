-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2018 at 11:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kipara`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`cid` int(200) NOT NULL,
  `cname` varchar(200) NOT NULL,
  `deletestatus` varchar(100) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `deletestatus`) VALUES
(1, 'Polish', 'YES'),
(2, 'Shampoo', 'YES'),
(3, 'Powder', 'YES'),
(4, 'Cleaner', 'YES'),
(5, 'Remover', 'YES'),
(6, 'Degreaser', 'YES'),
(7, 'Cloths', 'YES'),
(8, 'Scrubber', 'YES'),
(9, 'Freshener', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE IF NOT EXISTS `description` (
`id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `product`, `category`, `description`, `deletestatus`) VALUES
(1, '1', '1', 'Kipara TM Rubbing Polish is the first step of polishing. It is off white colored cream that removes light to moderate scratches and oxidation from all cars painted surface s, while leaving good gloss and no swirl mark s retains. It can be use by microfiber cloth or pad after sanding by polish paper like 1500 or 2000 No.\r\n\r\n \r\n\r\nFeature and Benefits:\r\n\r\n \r\n\r\n1.Thick Off white cream.\r\n2.Clears mild oxidation and scratches.\r\n3.Give a Swirl free shining.\r\n4.Buffs easily and bring out a deep and good glossy effect.\r\n5.Dries slowly.\r\n6.Small amount of rubbing compound needed which prevents pad from becoming saturated.', 'YES'),
(2, '2', '1', 'Kipara TM Dash Board Polish is a Dashboard fiber and Vinyl renovator. It gives mat finish shine to fiber and did not absorb dust, dirt easily. This polish is economical and easy to use which give shine as new and also protect against drying and cracking.\r\n\r\nKipara TM Dash Board Polish is particularly successful in treating the less accessible areas associated with vehicle dashboard.\r\n\r\n \r\n\r\nFeature and Benefits:\r\n\r\n1.Pleasantly perfumed.\r\n2.Quick and easy to use.\r\n3.Protects against drying and cracking.\r\n4.Interior looks and smells clean save time.\r\n5.Keep vehicle looking better for longer.', 'YES'),
(3, '3', '1', 'Kipara TM Tyre Polish is a water based formula specially developed for Tyre. It gives glossy shine to tyre and did not absorb dust, dirt easily. This polish is economical and easy to use which give shine as new and also protect against drying and cracking.\r\n\r\nKipara TM Tyre Polish is particularly successful in treating the less accessible areas associated with vehicle tires.\r\n\r\n \r\n\r\nFeature and Benefits:\r\n\r\n1.Non Grassy formula.\r\n2.Pleasantly mild perfumed.\r\n3.Quick and easy to use only spray it.\r\n4.Protects against drying and cracking.\r\n5.Tyre looks new and also save time.\r\n6.Keep vehicle looking better for longer.', 'YES'),
(4, '4', '1', 'Kipara TM Car Body Polish is the final step of polish to your valuable car for beautiful shine.\r\n\r\nThis product is made with the finest yellow Brazil wax for superior and protection to car surface. It is non abrasives so use it as often as you like. You can apply for better shine, depth and protection of your car surface color.\r\n\r\nKipara TM Car Body Polish will display very high gloss combined with exceptional resistance from UV radiation, acid rain, hard water and industrial resistant fallout.', 'YES'),
(5, '5', '2', 'It is innovative product develop for professionals for car care service provider. It is concentrated shampoo which easily removes dust, dirt and grease. It is very economical products for professionalâ€™s .This products have no side effects for car and user.\r\nFeature and Benefits:\r\n\r\n1.Pleasantly perfumed dark orange liquid.\r\n2.Quick and easy to use.\r\n3.Thick and durable foam.\r\n4.Keep vehicle looking better for longer.\r\n5.Low uses cost.\r\n6.pH balanced formulation so safe for car paint .', 'YES'),
(6, '6', '2', 'This is highly innovative product develop for professionals for car care service provider. It is very concentrated shampoo which quickly removes dust, dirt and grease. It is very economical products for professionalâ€™s .This products have no side effects for car and user. This shampoo gives extra shine to your valuable car.\r\n\r\nFeature and Benefits:\r\n\r\n1.Pleasantly perfumed dark Red liquid.\r\n2.Quick and easy to use.\r\n3.Highly Concentrated.\r\n4.Thick and durable foam.\r\n5.Keep vehicle looking better for longer.\r\n6.Low uses cost.\r\n7.pH balanced formulation so safe for car paint .\r\n8.Save time and efforts because of it high foam and strong cleaning action.', 'YES'),
(7, '7', '3', 'Kipara TM Glass Treatment Powder utilizes a special nanotechnology formula to form an invisible protective coating on windshields, greatly enhancing driver visibility and safety in bad weather driving conditions. Its sophisticated chemical composition ensures surfaces have only minimum contact with foreign particle matter (dirt, bugs, ice, etc.), meaning such pollutants disappear easily without scouring or using chemical agents.\r\n\r\nIcy, frozen glass are easily cleared with less amount of water pasts which removes all dirt, bugs and give original shine to glass.\r\nKeeping your vehicleâ€™s windshield clean is an easy, yet extremely important, way to make your vehicle safer for you, your loved ones and other drivers on the road. Itâ€™s not hard to let dirt, bugs and other visual hindrances build up on your windshield. Fortunately, So this product will leave your windshield clean and streak-free.\r\n\r\nFeature and Benefits:\r\n\r\n1.Repels rain, dirt, bugs, etc.\r\n2.Utilizes special nanotechnology ', 'YES'),
(8, '8', '4', 'Kipara TM Interior Cleaner largest selling product because of interior cleaning is more important for our personal hygiene.   Kipara TM Interior Cleaner is concentrate, Soft and it also mild polishing to your car interior, which also helps to resist bad odor, removes stains, oil and dirt quickly and gives extra shine as like as new.\r\n\r\nKipara TM Interior Cleaner gives mild sweet and fresh fragrance to your car. It is extremely effective on car interior like Dashboard, Steering, Seat cover, Roof, Vinyl, etc. It could be also use for cleaning Sofa, Bags, and leather accessories of car and home.\r\n\r\nFeature and Benefits:\r\n\r\nPleasantly perfumed dark Green or Pink liquid.\r\nQuick and easy to use.\r\nHighly Concentrated.\r\nLow alkalinity pH 12 to 13.\r\nKeep vehicle looking better for longer.\r\nLow uses cost due to off water dilution.\r\nVersatile product for car seat cover, Vinyl, leather, roof, etc.\r\nSave time and efforts because of it high foam and strong cleaning action.', 'YES'),
(9, '9', '4', 'Kipara TM Windshield Glass Cleaner is good product for cleaning of car windshield and other glasses also. Keeping your vehicleâ€™s windshield clean is an easy, yet extremely important, way to make your vehicle safer for you, your loved ones and other drivers on the road. Itâ€™s not hard to let dirt, bugs and other visual hindrances build up on your windshield. Fortunately, So this product will leave your windshield clean and streak-free.', 'YES'),
(10, '10', '5', 'Kipara TM Hard Water Spot Remover is good product for cleaning of car windshield and other glasses also. Keeping your vehicleâ€™s windshield clean is an easy, yet extremely important, way to make your vehicle safer for you, your loved ones and other drivers on the road. Itâ€™s not hard to let dirt, bugs and other visual hindrances build up on your windshield. Fortunately, So this product will leave your windshield clean and streak-free.', 'YES'),
(11, '11', '5', 'It is mild concentrated blend of petroleum hydrocarbons which loosen tar and grease very effectively which also removes gum marks, paint marks from the car body and glass.\r\n\r\nFeature and Benefits:\r\n\r\n \r\n\r\n1.It is very powerful stain-fighting formula, easily removes Tar and dried-on residue.\r\n2.Easily and effectively removes: bugs, tar, bird droppings, tree sap.\r\n3.Non-drip formula provides total control for precision spot cleaning.\r\nIt is safe for use on metal, paint, plastic, and glass and no side effect to car surface.', 'YES'),
(12, '12', '6', 'Kipara TM Engine Degreaser is highly concentrated violet color water based liquid. It has natural aroma and high alkaline pH. It could be use for car engine, oily floor.\r\n\r\nFeature and Benefits:\r\n\r\n1.Pleasantly perfumed dark Violet liquid.\r\n2.Quick and easy to use.\r\n3.Highly Concentrated.\r\n4.High alkalinity pH 12 to 13.\r\n5.Keep vehicle engine looking better for longer.\r\n6.Low uses cost due to off water dilution.\r\n7.Versatile product for car engine, exterior grillwork and rocker panels.\r\n8.Save time and efforts because of it high foam and strong cleaning action', 'YES'),
(13, '13', '7', 'KiparaTM Microfiber Cloth is More than 300 GSM means one gram of microfiber equals near about 40,000 meters of threads. It is very soft having made of 80 % Polyester and 20 % Polyamide ratio. The combination of above ratio, when the cloth is damping in water. So it acts like a as magnet when cleaning.Feature and Benefits:1.Easily and effectively removes dust, dirt quickly.2.Absorbs water quickly.3.Due to have soft microfiber no scratches occur on surface on car.4.Extensively washable and easy to use.', 'YES'),
(15, '14', '7', 'KiparaTM Microfiber Cloth is More than 300 GSM means one gram of microfiber equals near about 40,000 meters of threads. It is very soft having made of 80 % Polyester and 20 % Polyamide ratio. The combination of above ratio, when the cloth is damping in water. So it acts like a as magnet when cleaning.\r\n\r\nFeature and Benefits:\r\n\r\n1.Easily and effectively removes dust, dirt quickly.\r\n2.Absorbs water quickly.\r\n3.Due to have soft microfiber no scratches occur on surface on car.\r\n4.Extensively washable and easy to use.', 'YES'),
(16, '15', '8', 'KiparaTM Scrubber is use for interior cleaning of car. In this soft sponge inside the scrubber with protective net outer side which clean your seat cover, Vinylâ€™s so scratches occurs during cleaning. It is very handy to use and give 5 to 6 time you could use.\r\n\r\nFeature and Benefits:\r\n\r\nEasily and effectively removes dust, dirt quickly.\r\nAbsorbs water quickly due to of inner sponge.\r\nDoesnâ€™t kept scratches on surface on car.\r\nExtensively washable and easy to use.', 'YES'),
(17, '16', '9', 'KiparaTM Car Freshener cube is natural, nice smelling product for your car. It is all natural essences had made from essential oil and water base so no side effects. There is no harmful chemical like Phosphates, chlorine and ammonia. Nature fill is an all natural products designed to absorbs oil and hold scent much longer than most any other product in the market.\r\n\r\nFinally, our car freshener that is safe for your family and the environment.\r\n\r\nAvailable in 8 different flavors like code K1, K2, K3, K4, K5, K6, K7 and K8\r\n\r\nFeature and Benefits:\r\n\r\n1.Easy to use.\r\n2.Economical\r\n3.Long lasting formula.', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `howuse`
--

CREATE TABLE IF NOT EXISTS `howuse` (
`id` int(11) NOT NULL,
  `product` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `howuse` varchar(1000) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `howuse`
--

INSERT INTO `howuse` (`id`, `product`, `category`, `howuse`, `deletestatus`) VALUES
(1, '1', '1', 'Kipara TM Rubbing Polish apply after car wash for better results. Apply first on roof and proceed to the hood, trunks and sides. Apply directly to the car surface by sponge and while the product is wet buff small area with polishing pad. Keep the pad flat on car painted surface buff until product dries with applying light pressure. Removes residues with microfiber cloth.', 'YES'),
(2, '2', '1', 'Apply directly with use of sponge. It rapidly clean and shine Dashboards, Vinyl, bumpers, door panels, Engine fiber packing, radiator grilles etc. Avoid contact with driving controls, foot pedals, steering wheel and floor covering.', 'YES'),
(3, '3', '1', 'Simply mist spray Kipara TM Tyre Polish evenly on the tyre wall in a sweeping motion leaves to air dry. Wipe area using a second clean, dry Kipara TM soft microfiber cloth to remove any products residues from the surface. Donâ€™t spray directly onto a heavily soiled tyre wall, pre-clean first using universal.\r\n\r\nAvoid contact with driving controls, foot pedals, steering wheel and floor covering.', 'YES'),
(4, '4', '1', 'Kipara TM Car Body Polish apply after Rubbing compound or after wash for better result.\r\n\r\nApply it whole car body and keep as such for 30 min to 1 hr after that remove residue with microfiber cloth for dazzling shine results.', 'YES'),
(5, '5', '2', '1.Add one part Kipara TM Eco Car wash Shampoo to 100 parts of Water in a clean bucket.\r\n2.Rinse the vehicle thoroughly to remove mud that could scratch the paint surface.\r\n3.Using the Kipara TM soft microfiber cloth wash car thoroughly.\r\n4.Rinse the vehicle with clean water and dry with Kipara TM soft microfiber cloth.', 'YES'),
(6, '6', '2', '1.Add one part Kipara TM Wash and Wax Shampoo to 300 parts of Water in a clean bucket.\r\n2.Rinse the vehicle thoroughly to remove mud that could scratch the paint surface.\r\n3.Using the Kipara TM soft microfiber cloth wash car thoroughly.\r\n4.Rinse the vehicle with clean water and dry with Kipara TM soft microfiber cloth.\r\n5Water based Biodegradable products.', 'YES'),
(7, '8', '4', 'Dilute one part Kipara TM Interior Cleaner and 09 part of water in a bucket.\r\nSpray this solution on Dashboard, Vinyl carefully and smoothly rub with microfiber cloth or sponge.\r\nWash with clean water.', 'YES'),
(8, '11', '5', 'Kipara TM Tar Remover applies after wash for better result.\r\n\r\nApply it car body and keep as such for 30 Sec or 1 min after that remove residue with microfiber cloth for dazzling shine results.', 'YES'),
(9, '12', '6', '1.Dilute one part Kipara TM Engine Degreaser and 05 part of water in a bucket.\r\n2.Spray this solution on engine and keep it 10 to 15 min.\r\n3.Wash with clean water.', 'YES'),
(11, '14', '7', 'The combination of above ratio, when the cloth is damping in water. So it acts like a as magnet when cleaning.', 'YES'),
(12, '15', '8', 'It is very handy to use and give 5 to 6 time you could use.', 'YES'),
(13, '16', '9', 'KiparaTM Car Freshener applies after car wash for better results. Keep it as such on car dashboard.', 'YES');

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
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `product`, `category`, `infohead`, `info`, `deletestatus`) VALUES
(1, '1', '1', ' Appearance', 'Viscous Cream', 'YES'),
(2, '1', '1', 'Color', 'Off white', 'YES'),
(3, '1', '1', 'Odor', 'NO', 'YES'),
(4, '1', '1', 'Specific Gravity', '1.10 Â± .05', 'YES'),
(5, '1', '1', 'Shelf Life', 'One year in ambient temperature.', 'YES'),
(6, '1', '1', 'Packaging', '100g, 1 kg, 5 Kg', 'YES'),
(7, '1', '1', 'Product code', 'KP010', 'YES'),
(8, '2', '1', ' Appearance', 'Thick viscous Cream', 'YES'),
(9, '2', '1', 'Color', 'Pink', 'YES'),
(10, '2', '1', 'Odor', 'Pleasantly K1 perfumed', 'YES'),
(11, '2', '1', 'Specific Gravity', '1.10 Â± .05', 'YES'),
(12, '2', '1', 'Shelf Life', 'One year in ambient temperature', 'YES'),
(13, '2', '1', 'Packaging', '200 mL, 1 Lit, 5 Lit, 25 Lit, 50 Lit.', 'YES'),
(14, '2', '1', 'Product code', 'KP003', 'YES'),
(15, '3', '1', ' Appearance', 'Thick viscous Cream', 'YES'),
(16, '3', '1', 'Color', 'Sky Blue', 'YES'),
(17, '3', '1', 'Odor', 'Pleasantly K2 perfumed', 'YES'),
(18, '3', '1', 'Specific Gravity', '1.10 Â± .05', 'YES'),
(19, '3', '1', 'Shelf Life', 'One year in ambient temperature.', 'YES'),
(20, '3', '1', 'Packaging', '200 mL, 1 Lit, 5 Lit, 25 Lit, 50 Lit.', 'YES'),
(21, '3', '1', 'Product code', 'KP004', 'YES'),
(22, '4', '1', ' Appearance', 'Viscous Cream', 'YES'),
(23, '4', '1', 'Color', 'Light Green', 'YES'),
(24, '4', '1', 'Odor', 'NO', 'YES'),
(25, '4', '1', 'Specific Gravity', '1.10 Â± .05', 'YES'),
(26, '4', '1', 'Shelf Life', 'One year in ambient temperature.', 'YES'),
(27, '4', '1', 'Packaging', '100 g, 1 kg, 5 Kg, 30 Kg', 'YES'),
(28, '4', '1', 'Product code', 'KP006', 'YES'),
(29, '5', '2', ' Appearance', 'Thick viscous liquid.', 'YES'),
(30, '5', '2', 'Color', 'Orange.', 'YES'),
(31, '5', '2', 'Odor', 'Lavender or Lime.', 'YES'),
(32, '5', '2', 'Specific Gravity', '1.00 Â± .05', 'YES'),
(33, '5', '2', 'Shelf Life', 'One year in ambient temperature', 'YES'),
(34, '5', '2', 'Packaging', '1 Lit, 5 Lit, 25 Lit, 50 Lit, 100 Lit', 'YES'),
(35, '5', '2', 'pH', '7 to 7.5', 'YES'),
(36, '5', '2', 'Product code', 'KP001', 'YES'),
(37, '6', '2', ' Appearance', 'Thick viscous liquid.', 'YES'),
(38, '6', '2', 'Color', 'Red', 'YES'),
(39, '6', '2', 'Odor', 'Lavender or Lime', 'YES'),
(40, '6', '2', 'Specific Gravity', '1.00 Â± .05', 'YES'),
(41, '6', '2', 'Shelf Life', 'One year in ambient temperature.', 'YES'),
(42, '6', '2', 'Packaging', '500 mL, 1 Lit, 5 Lit, 25 Lit.', 'YES'),
(43, '6', '2', 'pH', '7 to 7.5', 'YES'),
(44, '6', '2', 'Product code', 'KP002', 'YES'),
(45, '7', '3', ' Appearance', 'Powder', 'YES'),
(46, '7', '3', 'Color', 'Brown', 'YES'),
(47, '7', '3', 'Shelf Life', 'One year in ambient temperature', 'YES'),
(48, '7', '3', 'Packaging', '100 g, 500 g.', 'YES'),
(49, '7', '3', 'Product code', 'KP014', 'YES'),
(50, '8', '4', ' Appearance', 'Clear Liquid', 'YES'),
(51, '8', '4', 'Color', 'Green/Pinklemon', 'YES'),
(52, '8', '4', 'Odor', 'lemon', 'YES'),
(53, '8', '4', 'Specific Gravity', '1.00 Â± .05', 'YES'),
(54, '8', '4', 'Shelf Life', 'One year in ambient temperature.', 'YES'),
(55, '8', '4', 'Packaging', '200 mL, 1 Lit, 5 Lit, 25 Lit, 50 Lit', 'YES'),
(56, '8', '4', 'Product code', 'KP005', 'YES'),
(57, '9', '4', ' Appearance', 'Liquid', 'YES'),
(58, '9', '4', 'Color', 'Pink/Green', 'YES'),
(59, '9', '4', 'Odor', 'Pleasantly perfumed', 'YES'),
(60, '9', '4', 'Specific Gravity', '1.0 Â± .05', 'YES'),
(61, '9', '4', 'Shelf Life', 'One year in ambient temperature.', 'YES'),
(62, '9', '4', 'Packaging', '200 mL, 1 Lit, 5 Lit', 'YES'),
(63, '9', '4', 'Product code', 'KP007', 'YES'),
(64, '10', '5', ' Appearance', 'Liquid', 'YES'),
(65, '10', '5', 'Color', 'Pink/Green', 'YES'),
(66, '10', '5', 'Odor', 'Pleasantly perfumed', 'YES'),
(67, '10', '5', 'Specific Gravity', '1.0 Â± .05', 'YES'),
(68, '10', '5', 'Shelf Life', 'One year in ambient temperature.', 'YES'),
(69, '10', '5', 'Packaging', '200mL, 1 Lit, 5 Lit', 'YES'),
(70, '10', '5', 'Product code', 'KP007', 'YES'),
(71, '11', '5', ' Appearance', 'Liquid.', 'YES'),
(72, '11', '5', 'Color', 'Light Yellow', 'YES'),
(73, '11', '5', 'Odor', 'Perfumed', 'YES'),
(74, '11', '5', 'Specific Gravity', '0.95 Â± .05', 'YES'),
(75, '11', '5', 'Shelf Life', 'One year in ambient temperature.', 'YES'),
(76, '11', '5', 'Packaging', '200mL, 1 Lit, 5 Lit', 'YES'),
(77, '11', '5', 'Product code', 'KP008', 'YES'),
(78, '12', '6', ' Appearance', 'Clear Liquid.', 'YES'),
(79, '12', '6', 'Color', 'Violet', 'YES'),
(80, '12', '6', 'Odor', 'Natural Scented.', 'YES'),
(81, '12', '6', 'Packaging', '200 mL, 1 Lit, 5 Lit, 50 Lit.', 'YES'),
(82, '12', '6', 'Specific Gravity', '1.00 Â± .05', 'YES'),
(83, '12', '6', 'Product code', 'KP015', 'YES'),
(84, '12', '6', 'Size', '200 ml', 'YES'),
(85, '12', '6', 'package', '200, 500', 'YES'),
(86, '13', '7', 'Color', 'Blue, Green and Red.', 'YES'),
(87, '13', '7', 'Size', '40 X 40 CM', 'YES'),
(88, '13', '7', 'Packaging', '1 Nos and 50 Nos Box', 'YES'),
(89, '13', '7', 'Product code', 'KP009', 'YES'),
(90, '14', '7', 'Color', 'Blue, Green and Red.', 'YES'),
(91, '14', '7', 'Size', '40 X 40 CM', 'YES'),
(92, '14', '7', 'Packaging', '1 Nos and 50 Nos Box', 'YES'),
(93, '14', '7', 'Product code', 'KP009', 'YES'),
(94, '14', '7', 'Color', 'Blue, Green and Red.', 'YES'),
(95, '14', '7', 'Size', '40 X 40 CM', 'YES'),
(96, '14', '7', 'Packaging', '1 Nos and 50 Nos Box', 'YES'),
(97, '14', '7', 'Product code', 'KP009', 'YES'),
(98, '15', '8', ' Appearance', 'Blue, Green, Yellow and Pink.', 'YES'),
(99, '15', '8', 'Size', '9 X 12 CM', 'YES'),
(100, '15', '8', 'Packaging', '1 Nos, 4 Nos, 12 Nos', 'YES'),
(101, '15', '8', 'Product code', 'KP011', 'YES'),
(102, '16', '9', ' Appearance', 'Colored liquid', 'YES'),
(103, '16', '9', 'Color', 'White color cube', 'YES'),
(104, '16', '9', 'Odor', 'K1, K2, K3, K4, K5, K6, K7, K8', 'YES'),
(105, '16', '9', 'Specific Gravity', 'NA', 'YES'),
(106, '16', '9', 'Shelf Life', '60 days in ambient temperature.', 'YES'),
(107, '16', '9', 'Packaging', '1 Nos, 50 Nos, 100 Nos', 'YES'),
(108, '16', '9', 'Product code', 'KP013', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `infohead`
--

CREATE TABLE IF NOT EXISTS `infohead` (
`id` int(11) NOT NULL,
  `infohead` varchar(200) NOT NULL,
  `deletestatus` varchar(200) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `infohead`
--

INSERT INTO `infohead` (`id`, `infohead`, `deletestatus`) VALUES
(1, ' Appearance', 'YES'),
(2, 'Color', 'YES'),
(3, 'Odor', 'YES'),
(4, 'Specific Gravity', 'YES'),
(5, 'Shelf Life', 'YES'),
(6, 'Packaging', 'YES'),
(7, 'Product code', 'YES'),
(8, 'pH', 'YES'),
(9, 'Size', 'YES'),
(10, 'package', 'YES');

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
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(255) NOT NULL,
  `category` varchar(200) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `mainprise` float NOT NULL,
  `scratchprise` float NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(200) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `path1` varchar(200) NOT NULL,
  `deletestatus` varchar(100) NOT NULL DEFAULT 'YES'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category`, `productname`, `mainprise`, `scratchprise`, `img1`, `img2`, `img3`, `img4`, `path1`, `deletestatus`) VALUES
(1, '1', 'Rubbing Polish', 50, 100, 'images/Rubbing PolishRubbing-Polish-300x300.gif', 'images/Rubbing PolishRubbing-Polish-300x300.gif', 'images/Rubbing PolishRubbing-Polish-300x300.gif', 'images/Rubbing PolishRubbing-Polish-300x300.gif', 'images/', 'YES'),
(2, '1', 'Dash Board Polish', 50, 100, 'images/Dash Board PolishDash-Board-Polish-300x300.gif', 'images/Dash Board PolishDash-Board-Polish-300x300.gif', 'images/Dash Board PolishDash-Board-Polish-300x300.gif', 'images/Dash Board PolishDash-Board-Polish-300x300.gif', 'images/', 'YES'),
(3, '1', 'Tyre Polish', 50, 100, 'images/Tyre PolishMicrofiber-Cloths-300x300.gif', 'images/Tyre PolishMicrofiber-Cloths-300x300.gif', 'images/Tyre PolishMicrofiber-Cloths-300x300.gif', 'images/Tyre PolishMicrofiber-Cloths-300x300.gif', 'images/', 'YES'),
(4, '1', 'Car Body Polish', 50, 100, 'images/Car Body PolishRubbing PolishCar-Body-Polish-300x300.gif', 'images/Car Body PolishRubbing PolishCar-Body-Polish-300x300.gif', 'images/Car Body PolishRubbing PolishCar-Body-Polish-300x300.gif', 'images/Car Body PolishRubbing PolishCar-Body-Polish-300x300.gif', 'images/', 'YES'),
(5, '2', 'Eco Car wash Shampoo', 50, 100, 'images/Eco Car wash ShampooEco-Car-Wash-300x300.jpg', 'images/Eco Car wash ShampooEco-Car-Wash-300x300.jpg', 'images/Eco Car wash ShampooEco-Car-Wash-300x300.jpg', 'images/Eco Car wash ShampooEco-Car-Wash-300x300.jpg', 'images/', 'YES'),
(6, '2', 'Wash and Wax Shampoo', 50, 100, 'images/Wash and Wax ShampooCar-wash-and-wax-shampoo-300x300.gif', 'images/Wash and Wax ShampooCar-wash-and-wax-shampoo-300x300.gif', 'images/Wash and Wax ShampooCar-wash-and-wax-shampoo-300x300.gif', 'images/Wash and Wax ShampooCar-wash-and-wax-shampoo-300x300.gif', 'images/', 'YES'),
(7, '3', 'Glass Treatment Powder', 50, 100, 'images/Glass Treatment PowderMicrofiber-Cloths-300x300.gif', 'images/Glass Treatment PowderMicrofiber-Cloths-300x300.gif', 'images/Glass Treatment PowderMicrofiber-Cloths-300x300.gif', 'images/Glass Treatment PowderMicrofiber-Cloths-300x300.gif', 'images/', 'YES'),
(8, '4', 'Interior Cleaner', 50, 100, 'images/Interior CleanerInterior-Cleaner-300x300.gif', 'images/Interior CleanerInterior-Cleaner-300x300.gif', 'images/Interior CleanerInterior-Cleaner-300x300.gif', 'images/Interior CleanerInterior-Cleaner-300x300.gif', 'images/', 'YES'),
(9, '4', 'Windshield Glass Cleaner', 50, 100, 'images/Windshield Glass CleanerWind-Shield-Glass-Cleaner-300x300.gif', 'images/Windshield Glass CleanerWind-Shield-Glass-Cleaner-300x300.gif', 'images/Windshield Glass CleanerWind-Shield-Glass-Cleaner-300x300.gif', 'images/Windshield Glass CleanerWind-Shield-Glass-Cleaner-300x300.gif', 'images/', 'YES'),
(10, '5', 'Hard Water Spot Remover', 50, 100, 'images/Hard Water Spot RemoverHard-Rubbing-Polish-300x300.gif', 'images/Hard Water Spot RemoverHard-Rubbing-Polish-300x300.gif', 'images/Hard Water Spot RemoverHard-Rubbing-Polish-300x300.gif', 'images/Hard Water Spot RemoverHard-Rubbing-Polish-300x300.gif', 'images/', 'YES'),
(11, '5', 'Tar Remover', 50, 100, 'images/Tar RemoverMicrofiber-Cloths-300x300.gif', 'images/Tar RemoverMicrofiber-Cloths-300x300.gif', 'images/Tar RemoverMicrofiber-Cloths-300x300.gif', 'images/Tar RemoverMicrofiber-Cloths-300x300.gif', 'images/', 'YES'),
(12, '6', 'Engine Degreaser', 50, 100, 'images/Engine DegreaserMicrofiber-Cloths-300x300.gif', 'images/Engine DegreaserMicrofiber-Cloths-300x300.gif', 'images/Engine DegreaserMicrofiber-Cloths-300x300.gif', 'images/Engine DegreaserMicrofiber-Cloths-300x300.gif', 'images/', 'YES'),
(13, '7', 'Microfiber cloths', 50, 60, 'images/Microfiber clothsMicrofiber-Cloths-300x300.gif', 'images/Microfiber clothsMicrofiber-Cloths-300x300.gif', 'images/Microfiber clothsMicrofiber-Cloths-300x300.gif', 'images/Microfiber clothsMicrofiber-Cloths-300x300.gif', 'images/', 'YES'),
(14, '7', 'Microfiber cloths', 50, 100, 'images/Microfiber clothsMicrofiber clothsEngine DegreaserTar RemoverGlass Treatment PowderTyre PolishMicrofiber-Cloths-300x300.gif', 'images/Microfiber clothsMicrofiber clothsEngine DegreaserTar RemoverGlass Treatment PowderTyre PolishMicrofiber-Cloths-300x300.gif', 'images/Microfiber clothsMicrofiber clothsEngine DegreaserTar RemoverGlass Treatment PowderTyre Polis', 'images/Microfiber clothsMicrofiber clothsEngine DegreaserTar RemoverGlass Treatment PowderTyre Polis', 'images/', 'NO'),
(15, '8', 'Scrubber', 50, 100, 'images/ScrubberMicrofiber-Cloths-300x300.gif', 'images/ScrubberMicrofiber-Cloths-300x300.gif', 'images/ScrubberMicrofiber-Cloths-300x300.gif', 'images/ScrubberMicrofiber-Cloths-300x300.gif', 'images/', 'YES'),
(16, '9', 'Car Freshener Cube', 50, 100, 'images/Car Freshener CubeScrubberMicrofiber clothsMicrofiber clothsEngine DegreaserTar RemoverGlass Treatment PowderTyre PolishMicrofiber-Cloths-300x300.gif', 'images/Car Freshener CubeScrubberMicrofiber clothsMicrofiber clothsEngine DegreaserTar RemoverGlass Treatment PowderTyre PolishMicrofiber-Cloths-300x300.gif', 'images/Car Freshener CubeScrubberMicrofiber clothsMicrofiber clothsEngine DegreaserTar RemoverGlass ', 'images/Car Freshener CubeScrubberMicrofiber clothsMicrofiber clothsEngine DegreaserTar RemoverGlass ', 'images/', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE IF NOT EXISTS `resume` (
`id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `filepath` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`id`, `name`, `email`, `city`, `contact`, `message`, `filepath`) VALUES
(3, 'vasudha', 'vasudhasutar67@gmail.com', 'satara', '98766256622', 'demo', 'resume/bhagyoday.txt'),
(4, 'vasudha', 'vasudhasutar67@gmail.com', 'satara', '69956569', 'dfgaeg', 'resume/Hinjewadi.rtf'),
(5, 'Sushma', 'sumit@gmail.com', 'satara', '43553523', 'sfsafasf', 'resume/bhagyoday.txt'),
(6, 'sdsfsdf', 'sumit@gmail.com', 'dfsf', '3243253', 'dsaf', 'resume/bhagyoday.txt'),
(7, 'dhanashri', 'dahnu@123.com', 'satara', '554565', 'ewfwf', 'resume/bhagyoday.txt');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
`id` int(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `subcategory` varchar(200) NOT NULL,
  `stock` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
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
MODIFY `cid` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `howuse`
--
ALTER TABLE `howuse`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `infohead`
--
ALTER TABLE `infohead`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id` int(250) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
