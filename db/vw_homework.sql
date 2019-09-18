-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2019 at 02:14 AM
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
-- Structure for view `vw_homework`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_homework`  AS  select `uni_homework`.`id` AS `id`,`uni_homework`.`id` AS `homeworkid`,`profiles`.`fname` AS `fname`,`profiles`.`lname` AS `lname`,`profiles`.`gender` AS `gender`,`profiles`.`city` AS `city`,`profiles`.`mobile` AS `mobile`,`profiles`.`phone` AS `phone`,`profiles`.`numcollegian` AS `numcollegian`,`profiles`.`jobstatus` AS `jobstatus`,`profiles`.`jobdetail` AS `jobdetail`,`profiles`.`jobdescription` AS `jobdescriotion`,`profiles`.`id` AS `profilesid`,`uni_homework`.`date_sent` AS `date_sent`,`uni_homework`.`hm_file` AS `hm_file`,`uni_homework`.`description` AS `description`,(select `uni_lesson`.`name` from `uni_lesson` where `uni_lesson`.`id` = `uni_homework`.`lesson_id`) AS `lessonname`,`uni_major`.`name` AS `majorname`,`uni_grade`.`name` AS `gradename`,`uni_uni_name`.`name` AS `uniname`,(select `user`.`username` from `user` where `user`.`id` = `uni_homework`.`user_id`) AS `username`,(select `enteringyear`.`name` from `enteringyear` where `enteringyear`.`id` = `uni_homework`.`enteringyear_id`) AS `term` from (((((`uni_homework` left join `profiles` on(`uni_homework`.`profiles_id` = `profiles`.`id`)) left join `uni_major` on(`profiles`.`major_id` = `uni_major`.`id`)) left join `uni_grade` on(`profiles`.`grade_id` = `uni_grade`.`id`)) left join `uni_uni_name` on(`profiles`.`uni_id` = `uni_uni_name`.`id`)) left join `enteringyear` on(`profiles`.`enteringyear_id` = `enteringyear`.`id`)) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
