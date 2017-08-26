-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2017 at 06:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id495007_data`
--
CREATE DATABASE IF NOT EXISTS `id495007_data` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `id495007_data`;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(100) NOT NULL,
  `eid` int(100) NOT NULL,
  `file_name` varchar(1000) NOT NULL,
  `size` int(255) NOT NULL,
  `course` varchar(100) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `name`) VALUES
('BTN-201', 'Intro to Biotech'),
('BTN-102', 'Computer Science'),
('BTN-207', 'Immunotechnology');

-- --------------------------------------------------------

--
-- Table structure for table `coursebatchwise`
--

CREATE TABLE `coursebatchwise` (
  `uid` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `courseid` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `profid` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `slot` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `updated` varchar(100) NOT NULL,
  `time` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs`
--

INSERT INTO `cs` (`slot`, `batch`, `course`, `venue`, `type`, `updated`, `time`) VALUES
('f9', 's1', '', '', 0, '', 45),
('f8', 's1', '', '', 0, '', 44),
('f7', 's1', '', '', 0, '', 43),
('f6', 's1', '', '', 0, '', 42),
('f5', 's1', '', '', 0, '', 41),
('f4', 's1', '', '', 0, '', 40),
('f3', 's1', '', '', 0, '', 39),
('f2', 's1', '', '', 0, '', 38),
('f1', 's1', '', '', 0, '', 37),
('th9', 's1', '', '', 0, '', 36),
('th8', 's1', '', '', 0, '', 35),
('th7', 's1', '', '', 0, '', 34),
('th6', 's1', '', '', 0, '', 33),
('th5', 's1', '', '', 0, '', 32),
('th4', 's1', '', '', 0, '', 31),
('th3', 's1', '', '', 0, '', 30),
('th2', 's1', '', '', 0, '', 29),
('th1', 's1', '', '', 0, '', 28),
('w9', 's1', '', '', 0, '', 27),
('w8', 's1', '', '', 0, '', 26),
('w7', 's1', '', '', 0, '', 25),
('w6', 's1', '', '', 0, '', 24),
('w5', 's1', '', '', 0, '', 23),
('w4', 's1', '', '', 0, '', 22),
('w3', 's1', '', '', 0, '', 21),
('w2', 's1', '', '', 0, '', 20),
('w1', 's1', '', '', 0, '', 19),
('t9', 's1', '', '', 0, '', 18),
('t8', 's1', '', '', 0, '', 17),
('t7', 's1', '', '', 0, '', 16),
('t6', 's1', '', '', 0, '', 15),
('t5', 's1', '', '', 0, '', 14),
('t4', 's1', '', '', 0, '', 13),
('t3', 's1', '', '', 0, '', 12),
('t2', 's1', '', '', 0, '', 11),
('t1', 's1', '', '', 0, '', 10),
('m9', 's1', '', '', 0, '', 9),
('m8', 's1', '', '', 0, '', 8),
('m7', 's1', '', '', 0, '', 7),
('m6', 's1', '', '', 0, '', 6),
('m5', 's1', '', '', 0, '', 5),
('m4', 's1', '', '', 0, '', 4),
('m1', 's1', '', '', 0, '', 1),
('m2', 's1', '', '', 0, '', 2),
('m3', 's1', '', '', 0, '', 3),
('m1', 's2', '', '', 0, '', 1111),
('m2', 's2', '', '', 0, '', 2111),
('m3', 's2', '', '', 0, '', 3111),
('m4', 's2', '', '', 0, '', 4111),
('m5', 's2', '', '', 0, '', 5111),
('m6', 's2', '', '', 0, '', 6111),
('m7', 's2', '', '', 0, '', 7111),
('m8', 's2', '', '', 0, '', 8111),
('m9', 's2', '', '', 0, '', 9111),
('t1', 's2', '', '', 0, '', 10111),
('t2', 's2', '', '', 0, '', 11111),
('t3', 's2', '', '', 0, '', 12111),
('t4', 's2', '', '', 0, '', 13111),
('t5', 's2', '', '', 0, '', 14111),
('t6', 's2', '', '', 0, '', 15111),
('t7', 's2', '', '', 0, '', 16111),
('t8', 's2', '', '', 0, '', 17111),
('t9', 's2', '', '', 0, '', 18111),
('w1', 's2', '', '', 0, '', 19111),
('w2', 's2', '', '', 0, '', 20111),
('w3', 's2', '', '', 0, '', 21111),
('w4', 's2', '', '', 0, '', 22111),
('w5', 's2', '', '', 0, '', 23111),
('w6', 's2', '', '', 0, '', 24111),
('w7', 's2', '', '', 0, '', 25111),
('w8', 's2', '', '', 0, '', 26111),
('w9', 's2', '', '', 0, '', 27111),
('th1', 's2', '', '', 0, '', 28111),
('th2', 's2', '', '', 0, '', 29111),
('th3', 's2', '', '', 0, '', 30111),
('th4', 's2', '', '', 0, '', 31111),
('th5', 's2', '', '', 0, '', 32111),
('th6', 's2', '', '', 0, '', 33111),
('th7', 's2', '', '', 0, '', 34111),
('th8', 's2', '', '', 0, '', 35111),
('th9', 's2', '', '', 0, '', 36111),
('f1', 's2', '', '', 0, '', 37111),
('f2', 's2', '', '', 0, '', 38111),
('f3', 's2', '', '', 0, '', 39111),
('f4', 's2', '', '', 0, '', 40111),
('f5', 's2', '', '', 0, '', 41111),
('f6', 's2', '', '', 0, '', 42111),
('f7', 's2', '', '', 0, '', 43111),
('f8', 's2', '', '', 0, '', 44111),
('f9', 's2', '', '', 0, '', 45111);

-- --------------------------------------------------------

--
-- Table structure for table `ds`
--

CREATE TABLE `ds` (
  `slot` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `updated` varchar(100) NOT NULL,
  `time` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds`
--

INSERT INTO `ds` (`slot`, `batch`, `course`, `venue`, `type`, `updated`, `time`) VALUES
('f9', 's1', '', '', 0, '', 45),
('f8', 's1', '', '', 0, '', 44),
('f7', 's1', '', '', 0, '', 43),
('f6', 's1', '', '', 0, '', 42),
('f5', 's1', '', '', 0, '', 41),
('f4', 's1', '', '', 0, '', 40),
('f3', 's1', '', '', 0, '', 39),
('f2', 's1', '', '', 0, '', 38),
('f1', 's1', '', '', 0, '', 37),
('th9', 's1', '', '', 0, '', 36),
('th8', 's1', '', '', 0, '', 35),
('th7', 's1', '', '', 0, '', 34),
('th6', 's1', '', '', 0, '', 33),
('th5', 's1', '', '', 0, '', 32),
('th4', 's1', '', '', 0, '', 31),
('th3', 's1', '', '', 0, '', 30),
('th2', 's1', '', '', 0, '', 29),
('th1', 's1', '', '', 0, '', 28),
('w9', 's1', '', '', 0, '', 27),
('w8', 's1', '', '', 0, '', 26),
('w7', 's1', '', '', 0, '', 25),
('w6', 's1', '', '', 0, '', 24),
('w5', 's1', '', '', 0, '', 23),
('w4', 's1', '', '', 0, '', 22),
('w3', 's1', '', '', 0, '', 21),
('w2', 's1', '', '', 0, '', 20),
('w1', 's1', '', '', 0, '', 19),
('t9', 's1', '', '', 0, '', 18),
('t8', 's1', '', '', 0, '', 17),
('t7', 's1', '', '', 0, '', 16),
('t6', 's1', '', '', 0, '', 15),
('t5', 's1', '', '', 0, '', 14),
('t4', 's1', '', '', 0, '', 13),
('t3', 's1', '', '', 0, '', 12),
('t2', 's1', '', '', 0, '', 11),
('t1', 's1', '', '', 0, '', 10),
('m9', 's1', '', '', 0, '', 9),
('m8', 's1', '', '', 0, '', 8),
('m7', 's1', '', '', 0, '', 7),
('m6', 's1', '', '', 0, '', 6),
('m5', 's1', '', '', 0, '', 5),
('m4', 's1', '', '', 0, '', 4),
('m1', 's1', '', '', 0, '', 1),
('m2', 's1', '', '', 0, '', 2),
('m3', 's1', '', '', 0, '', 3),
('m1', 's2', '', '', 0, '', 1111),
('m2', 's2', '', '', 0, '', 2111),
('m3', 's2', '', '', 0, '', 3111),
('m4', 's2', '', '', 0, '', 4111),
('m5', 's2', '', '', 0, '', 5111),
('m6', 's2', '', '', 0, '', 6111),
('m7', 's2', '', '', 0, '', 7111),
('m8', 's2', '', '', 0, '', 8111),
('m9', 's2', '', '', 0, '', 9111),
('t1', 's2', '', '', 0, '', 10111),
('t2', 's2', '', '', 0, '', 11111),
('t3', 's2', '', '', 0, '', 12111),
('t4', 's2', '', '', 0, '', 13111),
('t5', 's2', '', '', 0, '', 14111),
('t6', 's2', '', '', 0, '', 15111),
('t7', 's2', '', '', 0, '', 16111),
('t8', 's2', '', '', 0, '', 17111),
('t9', 's2', '', '', 0, '', 18111),
('w1', 's2', '', '', 0, '', 19111),
('w2', 's2', '', '', 0, '', 20111),
('w3', 's2', '', '', 0, '', 21111),
('w4', 's2', '', '', 0, '', 22111),
('w5', 's2', '', '', 0, '', 23111),
('w6', 's2', '', '', 0, '', 24111),
('w7', 's2', '', '', 0, '', 25111),
('w8', 's2', '', '', 0, '', 26111),
('w9', 's2', '', '', 0, '', 27111),
('th1', 's2', '', '', 0, '', 28111),
('th2', 's2', '', '', 0, '', 29111),
('th3', 's2', '', '', 0, '', 30111),
('th4', 's2', '', '', 0, '', 31111),
('th5', 's2', '', '', 0, '', 32111),
('th6', 's2', '', '', 0, '', 33111),
('th7', 's2', '', '', 0, '', 34111),
('th8', 's2', '', '', 0, '', 35111),
('th9', 's2', '', '', 0, '', 36111),
('f1', 's2', '', '', 0, '', 37111),
('f2', 's2', '', '', 0, '', 38111),
('f3', 's2', '', '', 0, '', 39111),
('f4', 's2', '', '', 0, '', 40111),
('f5', 's2', '', '', 0, '', 41111),
('f6', 's2', '', '', 0, '', 42111),
('f7', 's2', '', '', 0, '', 43111),
('f8', 's2', '', '', 0, '', 44111),
('f9', 's2', '', '', 0, '', 45111);

-- --------------------------------------------------------

--
-- Table structure for table `enrolledfor`
--

CREATE TABLE `enrolledfor` (
  `enrlid` varchar(100) NOT NULL,
  `crsid` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrolledfor`
--

INSERT INTO `enrolledfor` (`enrlid`, `crsid`) VALUES
('16111022', 'BTN-102,BTN-201'),
('15114364', 'BTN-201,BTN-207'),
('515486547', 'BTN-102,BTN-201,BTN-207'),
('16111017', 'BTN-102,BTN-201'),
('16111111', 'BTN-102,BTN-201');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `phone` varchar(10) NOT NULL,
  `otp` int(6) NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

CREATE TABLE `prof` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ph` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`id`, `name`, `ph`, `email`) VALUES
(1, 'Prof. Shankar Pradad', '1231231234', 'qwertyuio@lp.cpm'),
(2, 'Dr. Rajendra radase', '9960427513', 'kljsda@ijv.dfc'),
(3, 'HR.dcnh hnikc', '7897897894', 'tfrybujni@dxr.com'),
(4, 'gy. bhuicnbwu ueguyuu', '5195195194', 'fb85951.rgrg@rv.net'),
(5, 'Prof. dacbuyd swnver eeef', '3575649518', '4fggrg5d@mkifas.com');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `tid` int(10) NOT NULL,
  `token` varchar(100) NOT NULL,
  `eid` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `us`
--

CREATE TABLE `us` (
  `slot` varchar(100) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `updated` varchar(100) NOT NULL,
  `time` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `us`
--

INSERT INTO `us` (`slot`, `batch`, `course`, `venue`, `type`, `updated`, `time`) VALUES
('f9', 's1', '', '', 0, '', 45),
('f8', 's1', '', '', 0, '', 44),
('f7', 's1', '', '', 0, '', 43),
('f6', 's1', '', '', 0, '', 42),
('f5', 's1', '', '', 0, '', 41),
('f4', 's1', '', '', 0, '', 40),
('f3', 's1', '', '', 0, '', 39),
('f2', 's1', '', '', 0, '', 38),
('f1', 's1', '', '', 0, '', 37),
('th9', 's1', '', '', 0, '', 36),
('th8', 's1', '', '', 0, '', 35),
('th7', 's1', '', '', 0, '', 34),
('th6', 's1', '', '', 0, '', 33),
('th5', 's1', '', '', 0, '', 32),
('th4', 's1', '', '', 0, '', 31),
('th3', 's1', '', '', 0, '', 30),
('th2', 's1', '', '', 0, '', 29),
('th1', 's1', '', '', 0, '', 28),
('w9', 's1', '', '', 0, '', 27),
('w8', 's1', '', '', 0, '', 26),
('w7', 's1', '', '', 0, '', 25),
('w6', 's1', '', '', 0, '', 24),
('w5', 's1', '', '', 0, '', 23),
('w4', 's1', '', '', 0, '', 22),
('w3', 's1', '', '', 0, '', 21),
('w2', 's1', '', '', 0, '', 20),
('w1', 's1', '', '', 0, '', 19),
('t9', 's1', '', '', 0, '', 18),
('t8', 's1', '', '', 0, '', 17),
('t7', 's1', '', '', 0, '', 16),
('t6', 's1', '', '', 0, '', 15),
('t5', 's1', '', '', 0, '', 14),
('t4', 's1', '', '', 0, '', 13),
('t3', 's1', '', '', 0, '', 12),
('t2', 's1', '', '', 0, '', 11),
('t1', 's1', '', '', 0, '', 10),
('m9', 's1', '', '', 0, '', 9),
('m8', 's1', '', '', 0, '', 8),
('m7', 's1', '', '', 0, '', 7),
('m6', 's1', '', '', 0, '', 6),
('m5', 's1', '', '', 0, '', 5),
('m4', 's1', '', '', 0, '', 4),
('m1', 's1', '', '', 0, '', 1),
('m2', 's1', '', '', 0, '', 2),
('m3', 's1', '', '', 0, '', 3),
('m1', 's2', '', '', 0, '', 1111),
('m2', 's2', '', '', 0, '', 2111),
('m3', 's2', '', '', 0, '', 3111),
('m4', 's2', '', '', 0, '', 4111),
('m5', 's2', '', '', 0, '', 5111),
('m6', 's2', '', '', 0, '', 6111),
('m7', 's2', '', '', 0, '', 7111),
('m8', 's2', '', '', 0, '', 8111),
('m9', 's2', '', '', 0, '', 9111),
('t1', 's2', '', '', 0, '', 10111),
('t2', 's2', '', '', 0, '', 11111),
('t3', 's2', '', '', 0, '', 12111),
('t4', 's2', '', '', 0, '', 13111),
('t5', 's2', '', '', 0, '', 14111),
('t6', 's2', '', '', 0, '', 15111),
('t7', 's2', '', '', 0, '', 16111),
('t8', 's2', '', '', 0, '', 17111),
('t9', 's2', '', '', 0, '', 18111),
('w1', 's2', '', '', 0, '', 19111),
('w2', 's2', '', '', 0, '', 20111),
('w3', 's2', '', '', 0, '', 21111),
('w4', 's2', '', '', 0, '', 22111),
('w5', 's2', '', '', 0, '', 23111),
('w6', 's2', '', '', 0, '', 24111),
('w7', 's2', '', '', 0, '', 25111),
('w8', 's2', '', '', 0, '', 26111),
('w9', 's2', '', '', 0, '', 27111),
('th1', 's2', '', '', 0, '', 28111),
('th2', 's2', '', '', 0, '', 29111),
('th3', 's2', '', '', 0, '', 30111),
('th4', 's2', '', '', 0, '', 31111),
('th5', 's2', '', '', 0, '', 32111),
('th6', 's2', '', '', 0, '', 33111),
('th7', 's2', '', '', 0, '', 34111),
('th8', 's2', '', '', 0, '', 35111),
('th9', 's2', '', '', 0, '', 36111),
('f1', 's2', '', '', 0, '', 37111),
('f2', 's2', '', '', 0, '', 38111),
('f3', 's2', '', '', 0, '', 39111),
('f4', 's2', '', '', 0, '', 40111),
('f5', 's2', '', '', 0, '', 41111),
('f6', 's2', '', '', 0, '', 42111),
('f7', 's2', '', '', 0, '', 43111),
('f8', 's2', '', '', 0, '', 44111),
('f9', 's2', '', '', 0, '', 45111);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `enrlid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `batch` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `fn` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `ln` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `ph` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `q` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `a` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`enrlid`, `batch`, `id`, `pwd`, `fn`, `ln`, `dob`, `ph`, `email`, `q`, `a`) VALUES
('15114364', 's2', 'NIKHILS2', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'amazon', 'prime', '1999-08-09', '4862486222', 'rfvcewcw@ede.com', '3', 'hint'),
('16111017', 's1', 'SAHU', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Kaishu', 'Sahu', '2017-01-01', '9999999999', 'gfdgfhsdg@hfbghg.com', '1', '1'),
('16111022', 's1', 'NIKHIL', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Nikhil', 'Kumar', '2017-01-01', '8002572171', 'nikhil.ubt2016@iitr.ac.in', '1', 'password'),
('515486547', 's2', 'SAHUS2', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'amaze', 'nonprr', '1995-12-31', '9829698296', 'qwoo.sdjj@uyv.com', '3', 'hinnt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`),
  ADD UNIQUE KEY `courseid` (`courseid`);

--
-- Indexes for table `coursebatchwise`
--
ALTER TABLE `coursebatchwise`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD KEY `uid_2` (`uid`);

--
-- Indexes for table `cs`
--
ALTER TABLE `cs`
  ADD PRIMARY KEY (`time`),
  ADD UNIQUE KEY `time` (`time`);

--
-- Indexes for table `ds`
--
ALTER TABLE `ds`
  ADD PRIMARY KEY (`time`),
  ADD UNIQUE KEY `time` (`time`);

--
-- Indexes for table `enrolledfor`
--
ALTER TABLE `enrolledfor`
  ADD PRIMARY KEY (`enrlid`),
  ADD UNIQUE KEY `enrlid` (`enrlid`),
  ADD KEY `enrlid_2` (`enrlid`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`phone`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `prof`
--
ALTER TABLE `prof`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `tid` (`tid`),
  ADD KEY `tid_2` (`tid`);

--
-- Indexes for table `us`
--
ALTER TABLE `us`
  ADD PRIMARY KEY (`time`),
  ADD UNIQUE KEY `time` (`time`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`enrlid`),
  ADD UNIQUE KEY `enrlid_2` (`enrlid`),
  ADD KEY `enrlid` (`enrlid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
