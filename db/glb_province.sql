-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 17, 2019 at 06:26 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sefroweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `glb_province`
--

CREATE TABLE `glb_province` (
  `id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `countryID` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `createdTime` datetime(3) DEFAULT NULL,
  `modifiedTime` datetime(3) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `modifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `glb_province`
--

INSERT INTO `glb_province` (`id`, `code`, `name`, `countryID`, `active`, `deleted`, `createdTime`, `modifiedTime`, `createdBy`, `modifiedBy`) VALUES
(61, '1', 'تهران', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(92, '6', 'آذربايجان شرقي', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(93, '7', 'آذربايجان غربي', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(94, '2', 'اردبيل', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '4', 'اصفهان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(97, '12', 'خراسان جنوبي', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '17', 'فارس', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '10', 'خراسان شمالي', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(100, '5', 'ايلام', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(101, '8', 'بوشهر', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(103, '9', 'چهارمحال وبختياري', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(104, '11', 'خراسان رضوي', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(105, '13', 'خوزستان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(106, '14', 'زنجان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(107, '15', 'سمنان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(108, '16', 'سيستان و بلوچستان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '18', 'قزوين', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(110, '19', 'قم', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(111, '20', 'كردستان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(112, '21', 'كرمان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(113, '22', 'كرمانشاه', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(114, '23', 'كهگيلويه وبويراحمد', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(115, '24', 'گلستان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(116, '25', 'گيلان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(117, '26', 'لرستان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(118, '27', 'مازندران', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(119, '28', 'مركزي', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(120, '29', 'هرمزگان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(121, '30', 'همدان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(122, '31', 'يزد', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(124, '73', 'سيستان وبلوچستان', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(125, '3', 'البرز', 1, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `glb_province`
--
ALTER TABLE `glb_province`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `countryID` (`countryID`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `glb_province`
--
ALTER TABLE `glb_province`
  ADD CONSTRAINT `glb_province_ibfk_1` FOREIGN KEY (`countryID`) REFERENCES `glb_country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
