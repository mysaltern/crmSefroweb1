-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 22, 2019 at 01:42 AM
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
-- Database: `base`
--

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `videofile` text DEFAULT NULL,
  `videoaddress` text DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 1,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `videofile`, `videoaddress`, `date_created`, `active`, `cat_id`) VALUES
(16, 'test1', 'test1', 'test1566418472.mp4', '', '2019-08-21 20:14:32', 1, 4),
(17, 'test33', 'test33', NULL, '<div id=\"76238337319\"><script type=\"text/JavaScript\" src=\"https://www.aparat.com/embed/aCiVl?data[rnddiv]=76238337319&data[responsive]=yes\"></script></div>', '2019-08-21 20:56:45', 1, NULL),
(18, 'test7', '', NULL, '<style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class=\"h_iframe-aparat_embed_frame\"><span style=\"display: block;padding-top: 57%\"></span><iframe src=\"https://www.aparat.com/video/video/embed/videohash/aCiVl/vt/frame\" allowFullScreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe></div>', '2019-08-21 20:58:15', 1, NULL),
(19, 'test8', '', NULL, '<div id=\"2010790336\"><script type=\"text/JavaScript\" src=\"https://www.aparat.com/embed/aCiVl?data[rnddiv]=2010790336&data[responsive]=yes\"></script></div>', '2019-08-21 20:59:09', 1, NULL),
(20, 'test5', 'test5', 'test1566421531.mp4', '', '2019-08-21 21:05:31', 1, NULL),
(21, 'test91', 'test91', 'test1566425819.mp4', '<style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class=\"h_iframe-aparat_embed_frame\"><span style=\"display: block;padding-top: 57%\"></span><iframe src=\"https://www.aparat.com/video/video/embed/videohash/wPacg/vt/frame\" allowFullScreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe></div>', '2019-08-21 22:16:59', 1, 3),
(22, '', '', NULL, '', '2019-08-21 22:21:45', 1, NULL),
(23, 'test', '', NULL, '', '2019-08-21 22:23:46', 1, NULL),
(24, 'test', 'ttttteeeest', 'test1566426242.mp4', '', '2019-08-21 22:24:02', 1, 1),
(25, 'eeeeee', 'eeeeeeee', 'test1566426278.mp4', '<style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class=\"h_iframe-aparat_embed_frame\"><span style=\"display: block;padding-top: 57%\"></span><iframe src=\"https://www.aparat.com/video/video/embed/videohash/wPacg/vt/frame\" allowFullScreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe></div>', '2019-08-21 22:24:38', 1, NULL),
(26, '', '', '', '', '2019-08-21 22:24:47', 1, NULL),
(27, 'yyyy', 'asfdgasfdgasfdg', '', '<style>.h_iframe-aparat_embed_frame{position:relative;}.h_iframe-aparat_embed_frame .ratio{display:block;width:100%;height:auto;}.h_iframe-aparat_embed_frame iframe{position:absolute;top:0;left:0;width:100%;height:100%;}</style><div class=\"h_iframe-aparat_embed_frame\"><span style=\"display: block;padding-top: 57%\"></span><iframe src=\"https://www.aparat.com/video/video/embed/videohash/wPacg/vt/frame\" allowFullScreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe></div>', '2019-08-21 22:25:03', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
