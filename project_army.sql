-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 08:41 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_army`
--

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL,
  `permission_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permission_id`, `permission_title`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Super user');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `projectName` varchar(200) NOT NULL,
  `bookNo` varchar(200) DEFAULT NULL,
  `projectAt` date DEFAULT NULL,
  `projecttype_id` int(11) DEFAULT NULL,
  `projectBudget` float DEFAULT NULL,
  `budgetCheck` date DEFAULT NULL,
  `principleApprove` date DEFAULT NULL,
  `processApprove` date DEFAULT NULL,
  `tntCheck` date DEFAULT NULL,
  `orderNo` varchar(200) DEFAULT NULL,
  `orderAt` date DEFAULT NULL,
  `orderDelivery` int(11) DEFAULT NULL,
  `orderDeadline` date DEFAULT NULL,
  `promiseNo` varchar(200) DEFAULT NULL,
  `promiseAt` date DEFAULT NULL,
  `promiseDelivery` int(11) DEFAULT NULL,
  `promiseDeadline` date DEFAULT NULL,
  `budgetBinding` date DEFAULT NULL,
  `checked` date DEFAULT NULL,
  `withdraw` date DEFAULT NULL,
  `projectStatus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `projectName`, `bookNo`, `projectAt`, `projecttype_id`, `projectBudget`, `budgetCheck`, `principleApprove`, `processApprove`, `tntCheck`, `orderNo`, `orderAt`, `orderDelivery`, `orderDeadline`, `promiseNo`, `promiseAt`, `promiseDelivery`, `promiseDeadline`, `budgetBinding`, `checked`, `withdraw`, `projectStatus`) VALUES
(2, 'หน่วยเสนอความต้องการ', 'เลขที่หนังสือ', '2018-02-01', 1, 200000, '2018-02-02', '2018-02-03', '2018-02-04', '2018-02-05', 'ใบสั่งซื้อ - สั่งจ้าง ที่', '2018-02-06', 5, '2018-02-11', 'สัญญาซื้อ - สั่งจ้าง ที่', '2018-02-07', 7, '2018-02-14', '2018-02-08', '2018-02-09', '2018-02-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE `project_status` (
  `status_id` int(11) NOT NULL,
  `status_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`status_id`, `status_title`) VALUES
(1, 'อยู่ระหว่างดำเนินการ'),
(2, 'ดำเนินการเสร็จสิ้น');

-- --------------------------------------------------------

--
-- Table structure for table `project_type`
--

CREATE TABLE `project_type` (
  `projecttype_id` int(11) NOT NULL,
  `projecttype_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_type`
--

INSERT INTO `project_type` (`projecttype_id`, `projecttype_title`) VALUES
(1, 'งานซื้อ'),
(2, 'งานจ้าง');

-- --------------------------------------------------------

--
-- Table structure for table `titlename`
--

CREATE TABLE `titlename` (
  `titlename_id` int(11) NOT NULL,
  `titlename_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `titlename`
--

INSERT INTO `titlename` (`titlename_id`, `titlename_title`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว'),
(4, 'สิบตรี'),
(5, 'สิบโท'),
(6, 'สิบเอก'),
(7, 'จ่าสิบตรี'),
(8, 'จ่าสิบโท'),
(9, 'จ่าสิบเอก'),
(10, 'จ่าสิบเอกพิเศษ'),
(11, 'ร้อยตรี'),
(12, 'ร้อยโท'),
(13, 'ร้อยเอก'),
(14, 'พันตรี'),
(15, 'พันโท'),
(16, 'พันเอก'),
(17, 'พันเอกพิเศษ'),
(18, 'พลตรี'),
(19, 'พลโท'),
(20, 'พลเอก');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(20) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `titlename_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_password`, `titlename_id`, `user_name`, `user_surname`, `permission_id`) VALUES
('admin', '1234', 1, 'ADMIN', 'SurAdmin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `projecttype_id` (`projecttype_id`),
  ADD KEY `projectStatus` (`projectStatus`);

--
-- Indexes for table `project_status`
--
ALTER TABLE `project_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `project_type`
--
ALTER TABLE `project_type`
  ADD PRIMARY KEY (`projecttype_id`);

--
-- Indexes for table `titlename`
--
ALTER TABLE `titlename`
  ADD PRIMARY KEY (`titlename_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `titlename_id` (`titlename_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_status`
--
ALTER TABLE `project_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`projecttype_id`) REFERENCES `project_type` (`projecttype_id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`projectStatus`) REFERENCES `project_status` (`status_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`titlename_id`) REFERENCES `titlename` (`titlename_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`permission_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
