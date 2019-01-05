-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 05, 2019 at 03:09 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tepcomp`
--

-- --------------------------------------------------------

--
-- Table structure for table `eq`
--

DROP TABLE IF EXISTS `eq`;
CREATE TABLE IF NOT EXISTS `eq` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `def` varchar(20) NOT NULL,
  `company` varchar(200) NOT NULL,
  `serial` varchar(200) DEFAULT '0',
  `location` varchar(200) NOT NULL DEFAULT '0',
  `category_id` bigint(20) NOT NULL,
  `status_id` bigint(20) NOT NULL DEFAULT '0',
  `about` text,
  `who_use` varchar(200) DEFAULT NULL,
  `picture` varchar(500) DEFAULT 'assets/img/default.jpeg',
  `tech_info` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq`
--

INSERT INTO `eq` (`id`, `name`, `def`, `company`, `serial`, `location`, `category_id`, `status_id`, `about`, `who_use`, `picture`, `tech_info`) VALUES
(1, 'Makaroni press122', '723', 'Makaron Oü', '7777-3421-2312-4932', 'T5-H4', 1, 2, 'dksdkskds<br />\r\n<br />\r\nSee masin on täitsa masin<br />\r\naaa<br />\r\n<br />\r\naa', 'mina', 'http://localhost/tep/uploads/eq/5c1121d6e35eb.JPG', ''),
(2, 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 1, 1, 'aaa', '1', 'http://localhost/tep/uploads/eq/5c112f20478a9.png', ''),
(3, 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 1, 1, 'aaa', '1', 'http://localhost/tep/uploads/eq/5c112fbad560d.png', ''),
(5, 'dsdss', '111dd', '111', 'fsfd', '0', 1, 1, 'csds\r\n\r\ndsdsds\r\n\r\ndsds', 'dsds', 'http://localhost/tep/uploads/eq/5c2680349f8a8.jpg', 'lalalalala111');

-- --------------------------------------------------------

--
-- Table structure for table `eq_category`
--

DROP TABLE IF EXISTS `eq_category`;
CREATE TABLE IF NOT EXISTS `eq_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_category`
--

INSERT INTO `eq_category` (`id`, `name`, `count`) VALUES
(2, 'Toiteplokid', 0),
(3, 'tere1', 0),
(5, 'tere', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eq_files`
--

DROP TABLE IF EXISTS `eq_files`;
CREATE TABLE IF NOT EXISTS `eq_files` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eq_id` bigint(20) NOT NULL,
  `file_location` varchar(500) NOT NULL,
  `file_url` varchar(500) NOT NULL,
  `name` varchar(200) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_files`
--

INSERT INTO `eq_files` (`id`, `eq_id`, `file_location`, `file_url`, `name`, `file_type`) VALUES
(35, 5, 'C:/wamp64/www/tep/uploads/eq/1/files/', 'http://localhost/tep/uploads/eq/1/files/5c1637a3eae34.pdf', 'test', 'pdf'),
(33, 5, 'C:/wamp64/www/tep/uploads/eq/1/files/', 'http://localhost/tep/uploads/eq/1/files/5c15ff2f1368b.jpg', '123', 'jpg'),
(36, 5, 'C:/wamp64/www/tep/uploads/eq/5/files/', 'http://localhost/tep/uploads/eq/5/files/5c27c7040d1db.jpg', 'aaa', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `eq_history`
--

DROP TABLE IF EXISTS `eq_history`;
CREATE TABLE IF NOT EXISTS `eq_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `eq_id` bigint(20) NOT NULL,
  `status_id` bigint(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_history`
--

INSERT INTO `eq_history` (`id`, `user_id`, `eq_id`, `status_id`, `comment`, `datetime`) VALUES
(1, 1, 1, 2, 'ups', '2018-12-11 22:19:47'),
(2, 1, 1, 1, '', '2018-12-11 22:37:03'),
(3, 1, 1, 2, '', '2018-12-11 22:38:19'),
(4, 1, 1, 1, '', '2018-12-11 22:39:01'),
(5, 1, 1, 2, '', '2018-12-12 16:51:47'),
(6, 1, 1, 1, '', '2018-12-12 16:59:15'),
(7, 1, 1, 2, '', '2018-12-12 17:04:39'),
(8, 1, 1, 2, 'aaa', '2018-12-16 13:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `eq_parts`
--

DROP TABLE IF EXISTS `eq_parts`;
CREATE TABLE IF NOT EXISTS `eq_parts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eq_id` bigint(20) NOT NULL,
  `code` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `company` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_parts`
--

INSERT INTO `eq_parts` (`id`, `eq_id`, `code`, `description`, `company`) VALUES
(6, 5, '111', '111', '11'),
(21, 5, '111', '111', '11');

-- --------------------------------------------------------

--
-- Table structure for table `eq_service`
--

DROP TABLE IF EXISTS `eq_service`;
CREATE TABLE IF NOT EXISTS `eq_service` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eq_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `service_date` date NOT NULL,
  `service_done` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `status_note` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_service`
--

INSERT INTO `eq_service` (`id`, `eq_id`, `name`, `user`, `description`, `service_date`, `service_done`, `status`, `status_note`) VALUES
(1, 5, 'Puhastus', 'Toomas Koomas', 'Kogu süsteem tuleb puhastada korralikult', '2018-12-25', '2018-12-31', 1, ''),
(2, 5, 'kaka', 'kaka', 'kala', '2019-01-16', NULL, 3, ''),
(3, 5, 'a', 'a', 'aak', '2019-01-17', NULL, 3, ''),
(4, 5, 'aa', 'aaa', 'aaa', '2019-01-11', NULL, 3, ''),
(5, 5, 'aaa', 'aaa', 'aaa', '2019-01-19', NULL, 3, ''),
(6, 5, 'aaa', 'aaa', 'aa', '2019-01-25', NULL, 3, ''),
(7, 5, 'aaa', 'aaa', 'aa', '2019-01-25', NULL, 3, ''),
(8, 5, 'aaa', 'aaa', 'aa', '2019-01-25', NULL, 3, ''),
(9, 5, 'aaa', 'aaa', 'aa', '2019-01-27', NULL, 1, 'aaa'),
(10, 5, 'aaa', 'aaa', 'aa', '2019-01-27', NULL, 3, ''),
(11, 5, 'aaa', 'aaa', 'aa', '2019-01-27', NULL, 3, ''),
(12, 5, 'aaa', 'aaa', 'aa', '2019-01-27', NULL, 3, ''),
(13, 5, 'aaa', 'aaa', 'aa', '2019-01-27', NULL, 3, ''),
(14, 5, 'aa', 'aaa', 'aa', '2019-01-06', NULL, 3, ''),
(15, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(16, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(17, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(18, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(19, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(20, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(21, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(22, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(23, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(24, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(25, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(26, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(27, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(28, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(29, 5, 'aaa', 'aaa', 'aa', '2019-01-12', NULL, 3, ''),
(30, 5, 'aaa', 'aaa', 'aa', '2019-01-08', NULL, 3, ''),
(31, 5, 'aaa', 'aaa', 'aa', '2019-01-08', NULL, 3, ''),
(32, 5, 'aaa', 'aaa', 'aa', '2019-01-08', NULL, 3, ''),
(33, 5, 'aaa', 'aaa', 'aa', '2019-01-08', NULL, 3, ''),
(34, 5, 'aaa', 'aaa', 'aaa', '2019-01-20', NULL, 3, ''),
(35, 5, 'aaa', 'aaa', 'aaa', '2019-01-20', NULL, 3, ''),
(36, 5, 'aaa', 'aaa', 'aaa', '2019-01-20', NULL, 3, ''),
(37, 5, 'aaa', 'aaa', 'aaa', '2019-01-20', NULL, 3, ''),
(38, 5, 'aaa', 'aaa', 'aaa', '2019-01-20', NULL, 3, ''),
(39, 5, 'aaa', 'aaa', 'aaa', '2019-01-20', NULL, 3, ''),
(40, 5, 'aaa', 'aaa', 'aaa', '2019-01-13', NULL, 3, ''),
(41, 5, 'aaa', 'tab', 'aaa', '2019-01-05', NULL, 3, ''),
(42, 5, 'Korraline', 'Peeter', 'Kõik korras ilusti.', '2019-01-24', NULL, 3, ''),
(43, 5, 'Korraline Hooldus', 'Peter', 'Täitsa korras', '2019-01-26', NULL, 2, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `eq_serviceparts`
--

DROP TABLE IF EXISTS `eq_serviceparts`;
CREATE TABLE IF NOT EXISTS `eq_serviceparts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eq_id` bigint(20) NOT NULL,
  `service_id` bigint(20) NOT NULL,
  `parts_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_serviceparts`
--

INSERT INTO `eq_serviceparts` (`id`, `eq_id`, `service_id`, `parts_id`) VALUES
(1, 5, 2, 21),
(2, 5, 3, 21),
(3, 5, 4, 21),
(4, 5, 5, 21),
(5, 5, 6, 21),
(6, 5, 7, 21),
(7, 5, 8, 21),
(8, 5, 9, 21),
(9, 5, 10, 21),
(10, 5, 11, 21),
(11, 5, 12, 21),
(12, 5, 13, 21),
(13, 5, 14, 21),
(14, 5, 15, 21),
(15, 5, 16, 21),
(16, 5, 17, 21),
(17, 5, 18, 21),
(18, 5, 19, 21),
(19, 5, 20, 21),
(20, 5, 21, 21),
(21, 5, 22, 21),
(22, 5, 23, 21),
(23, 5, 24, 21),
(24, 5, 25, 21),
(25, 5, 26, 21),
(26, 5, 27, 21),
(27, 5, 28, 21),
(28, 5, 29, 21),
(29, 5, 30, 6),
(30, 5, 31, 6),
(31, 5, 32, 6),
(32, 5, 33, 6),
(33, 5, 34, 21),
(34, 5, 35, 21),
(35, 5, 36, 21),
(36, 5, 37, 21),
(37, 5, 38, 21),
(38, 5, 39, 21),
(39, 5, 40, 21),
(40, 5, 41, 6),
(41, 5, 42, 21),
(42, 5, 43, 21);

-- --------------------------------------------------------

--
-- Table structure for table `eq_servicestatus`
--

DROP TABLE IF EXISTS `eq_servicestatus`;
CREATE TABLE IF NOT EXISTS `eq_servicestatus` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `label` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_servicestatus`
--

INSERT INTO `eq_servicestatus` (`id`, `name`, `label`) VALUES
(3, 'yes', 'primary');

-- --------------------------------------------------------

--
-- Table structure for table `eq_status`
--

DROP TABLE IF EXISTS `eq_status`;
CREATE TABLE IF NOT EXISTS `eq_status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `label` varchar(200) NOT NULL,
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_status`
--

INSERT INTO `eq_status` (`id`, `name`, `label`, `count`) VALUES
(1, 'Töös', 'success', -1),
(2, 'Katki', 'danger', 2),
(5, '123', 'primary', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eq_tech`
--

DROP TABLE IF EXISTS `eq_tech`;
CREATE TABLE IF NOT EXISTS `eq_tech` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `label` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `eq_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_tech`
--

INSERT INTO `eq_tech` (`id`, `label`, `name`, `eq_id`) VALUES
(95, '123', '', 5),
(96, 'dddd1', '', 5),
(94, '12', '', 5),
(93, 'a', '', 5),
(92, 'sss', '1', 5),
(91, 'Valmistamise aasta111', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `eq_used`
--

DROP TABLE IF EXISTS `eq_used`;
CREATE TABLE IF NOT EXISTS `eq_used` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `eq_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_used`
--

INSERT INTO `eq_used` (`id`, `eq_id`, `user_id`, `datetime`) VALUES
(1, 1, 1, '2018-12-09 02:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `file_types`
--

DROP TABLE IF EXISTS `file_types`;
CREATE TABLE IF NOT EXISTS `file_types` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `picture` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `site_url` varchar(200) NOT NULL,
  `site_dir` varchar(200) NOT NULL,
  `site_name` varchar(200) NOT NULL,
  `site_logo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_url`, `site_dir`, `site_name`, `site_logo`) VALUES
(1, 'http://localhost/tep/', 'C:/wamp64/www/tep/', 'Machine Park', 'assets/img/logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `lastlogin` varchar(200) DEFAULT NULL,
  `lastip` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fname`, `lname`, `level`, `lastlogin`, `lastip`) VALUES
(1, 'olavi', '', 'olavi1', 'allik1', 1, '2018-12-24 21:41:50', '::1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
