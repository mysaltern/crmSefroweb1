-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2019 at 02:10 AM
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
-- Database: `cmssaba`
--

-- --------------------------------------------------------

--
-- Table structure for table `uni_homework`
--

CREATE TABLE `uni_homework` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `lesson_id` int(11) DEFAULT NULL,
  `hm_file` varchar(255) DEFAULT NULL,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enteringyear_id` int(11) NOT NULL,
  `profiles_id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uni_homework`
--

INSERT INTO `uni_homework` (`id`, `user_id`, `lesson_id`, `hm_file`, `date_sent`, `enteringyear_id`, `profiles_id`, `description`) VALUES
(107, 130, 2, 'تست1568760678.docx', '2019-09-17 22:51:18', 1, 38, NULL),
(108, 130, 3, 'زمانیان1568760691.pdf', '2019-09-17 22:51:31', 2, 38, NULL),
(112, 131, 3, 'زمانیان1568760881.pdf', '2019-09-17 22:54:41', 2, 39, NULL),
(113, 131, 4, 'تاریخ1568760896.docx', '2019-09-17 22:54:56', 3, 39, NULL),
(115, 130, 4, 'زمانیان1568761875.pdf', '2019-09-17 23:11:15', 2, 38, NULL),
(116, 130, 2, 'تست1568761888.docx', '2019-09-17 23:11:28', 1, 38, NULL),
(117, 129, 2, 'زمانیان1568761927.pdf', '2019-09-17 23:12:07', 1, 37, NULL),
(118, 129, 3, 'تست1568761938.docx', '2019-09-17 23:12:18', 2, 37, NULL),
(119, 129, 3, 'تست1568762565.docx', '2019-09-17 23:22:45', 2, 37, 'توضیحات توضیحات'),
(120, 129, 3, 'تاریخ1568765032.docx', '2019-09-18 00:03:52', 1, 37, 'تکلیف درس فیزیک');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uni_homework`
--
ALTER TABLE `uni_homework`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lesson_id` (`lesson_id`),
  ADD KEY `Enteringyear_id` (`enteringyear_id`),
  ADD KEY `profiles_id` (`profiles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uni_homework`
--
ALTER TABLE `uni_homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `uni_homework`
--
ALTER TABLE `uni_homework`
  ADD CONSTRAINT `uni_homework_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uni_homework_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `uni_lesson` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `uni_homework_ibfk_3` FOREIGN KEY (`enteringyear_id`) REFERENCES `enteringyear` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `uni_homework_ibfk_4` FOREIGN KEY (`profiles_id`) REFERENCES `profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
