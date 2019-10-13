-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2019 at 08:19 PM
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
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `crm_contactfavorites`
--

CREATE TABLE `crm_contactfavorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ContactID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `createdTime` datetime(3) DEFAULT NULL,
  `modifiedTime` datetime(3) DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `modifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `crm_contactfavorites`
--

INSERT INTO `crm_contactfavorites` (`id`, `user_id`, `ContactID`, `ProductID`, `active`, `deleted`, `createdTime`, `modifiedTime`, `createdBy`, `modifiedBy`) VALUES
(13, 1039, NULL, 158, 1, 0, '2017-06-18 12:12:21.000', NULL, 1039, NULL),
(14, 33, NULL, 156, 1, 0, '2017-06-18 12:13:53.000', NULL, 1039, NULL),
(18, 1039, NULL, 155, 1, 0, '2017-06-18 12:43:02.000', NULL, 1039, NULL),
(19, 1039, NULL, 152, 0, 0, '2017-06-18 12:43:08.000', NULL, 1039, NULL),
(21, 1, NULL, 152, 1, 0, '2017-09-03 12:37:26.000', NULL, NULL, NULL),
(15, 1039, NULL, 167, 1, 0, '2017-06-18 12:18:40.000', NULL, 1039, NULL),
(16, 1039, NULL, 156, 0, 0, '2017-06-18 12:20:50.000', NULL, 1039, NULL),
(17, 1039, NULL, 164, 1, 0, '2017-06-18 12:21:13.000', NULL, 1039, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crm_contactfavorites`
--
ALTER TABLE `crm_contactfavorites`
  ADD KEY `ContactID` (`ContactID`) USING BTREE,
  ADD KEY `ProductID` (`ProductID`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `crm_contactfavorites`
--
ALTER TABLE `crm_contactfavorites`
  ADD CONSTRAINT `crm_contactfavorites_ibfk_1` FOREIGN KEY (`ContactID`) REFERENCES `crm_contacts` (`id`),
  ADD CONSTRAINT `crm_contactfavorites_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `inv_products` (`id`),
  ADD CONSTRAINT `crm_contactfavorites_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
