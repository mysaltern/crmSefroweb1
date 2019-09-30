-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2019 at 02:50 AM
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
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `orders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `note`, `category_id`, `orders`) VALUES
(2, 'برای ارسال تکالیف درسی خود ابتدا باید در سایت ثبت نام کرده و سپس از طریق پنل ویژه دانشجویان اقدام کنید . ', 1, 4),
(3, 'دکتر علیرضا پورابراهیمی متولد 1347 عضو هیأت علمی و استادیار دانشگاه آزاد اسلامی و دارای دکترای تخصصی مدیریت صنعتی می باشند که از سال 1374 تا کنون به امر تدریس در دانشگاههای کشور اشتغال داشته اند. ایشان در کنار تدریس به امر تحقیق نیز همت گماشته و دارای تألیفات و پژوهش های متعدد علمی بوده و راهنمایی پایان نامه های متعددی را در مقاطع کارشناسی ارشد و دکتری بر عهده داشته اند. ', 2, NULL),
(4, 'وی مسئولیت های اجرایی مختلفی را نیز در سازمانهای دولتی و غیر دولتی بر عهده داشته و در کارنامه اجرایی خود به ثبت رسانده است. ', 2, NULL),
(5, 'برای ارسال اطلاعات و فایل پایان نامه خود، پس از ثبت نام در سایت، فرمی را که در پنل ویژه دانشجویان قرار دارد به دقت پر کرده و ارسال نمایید. ', 1, 3),
(6, 'مطالب درسی مورد نیاز شما در قسمت پنل ویژه دانشجویان و در لینک \"مطالب درسی\" قابل دسترس است. ', 1, 2),
(7, 'کلیه سوالات و مشکلات خود را در کاربری وبسایت، از طریق آدرس ایمیلی که در قسمت پشتیبانی فنی قرار داده شده است، پی گیری نمایید. ', 1, 1),
(10, 'لطفاً در صورت وجود هرگونه مشکل فنی در کاربری این سایت، با ایمیل زیر مکاتبه و یا با شماره اعلام شده تماس حاصل نمایید ', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `notification_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
