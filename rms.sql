-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 03:23 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `buys`
--

CREATE TABLE `buys` (
  `id` int(11) NOT NULL,
  `CusId` varchar(100) NOT NULL,
  `BillAmount` int(100) DEFAULT NULL,
  `ProdId` varchar(50) NOT NULL,
  `EmpId` varchar(100) NOT NULL,
  `OrderDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buys`
--

INSERT INTO `buys` (`id`, `CusId`, `BillAmount`, `ProdId`, `EmpId`, `OrderDate`, `UpdationDate`) VALUES
(2, 'C002', 570, 'PID23', 'EID002', '2018-10-02 09:57:55', NULL),
(3, 'C004', 5000, 'PID10 , ', 'EID002', '2018-10-15 17:31:22', NULL),
(6, 'C002', 5750, 'PID01 , PID10 , ', 'EID002', '2018-10-15 17:41:22', NULL),
(12, 'C004', 7500, 'PID01 , ', 'EID001', '2018-10-15 17:54:19', NULL),
(13, 'C002', 7500, 'PID01 , ', 'EID001', '2018-10-15 18:01:34', NULL),
(14, 'C003', 750, 'PID03 , ', 'EID001', '2018-10-15 18:36:02', NULL),
(16, 'C003', 5075, 'PID03 , PID10 , ', 'EID001', '2018-10-15 19:00:37', NULL),
(17, 'C003', 2575, 'PID10 , PID03 , ', 'EID001', '2018-10-15 19:01:32', NULL),
(18, 'C004', 4500, 'PID01 , ', 'EID001', '2018-10-15 19:17:27', NULL),
(19, 'C004', 375, 'PID03 , ', 'EID001', '2018-10-15 19:18:27', NULL),
(20, 'C002', 2700, 'PID04 , ', 'EID001', '2018-10-15 19:19:20', NULL),
(21, 'C004', 5050, 'PID10 , PID04 , PID01 , ', 'EID001', '2018-10-15 19:20:05', NULL),
(23, 'C004', 25000, 'PID10 , ', 'EID001', '2018-10-15 19:22:07', NULL),
(24, 'C003', 180, 'PID12 , ', 'EID002', '2018-10-15 19:28:51', NULL),
(25, 'C004', 7500, 'PID01 , ', 'EID002', '2018-10-15 19:29:11', NULL),
(29, 'C003', 2700, 'PID04 , ', 'EID002', '2018-10-15 20:04:03', NULL),
(30, 'C003', 420, 'PID03 , PID04 , PID12 , ', 'EID002', '2018-10-15 20:04:54', NULL),
(31, 'C004', 7500, 'PID01 , ', 'EID002', '2018-10-18 14:45:20', NULL),
(32, 'C003', 4375, 'PID03 , PID10 , PID01 , ', 'EID002', '2018-10-18 18:38:51', NULL),
(33, 'C004', 750, 'PID03 , ', 'EID002', '2018-10-18 18:40:31', NULL),
(34, 'C002', 3550, 'PID01 , PID10 , PID03 , ', 'EID002', '2018-10-18 18:41:49', NULL),
(35, 'C003', 4450, 'PID10 , PID01 , PID03 , ', 'EID002', '2018-10-18 18:42:59', NULL),
(36, 'C003', 8375, 'PID03 , PID01 , PID04 , PID10 , ', 'EID002', '2018-10-18 18:45:06', NULL),
(37, 'C003', 7500, 'PID01 , ', 'EID001', '2018-10-18 19:24:58', NULL),
(38, 'C003', 5000, 'PID10 , ', 'EID001', '2018-10-18 19:28:05', NULL),
(39, 'C004', 5000, 'PID10 , ', 'EID001', '2018-10-18 19:33:06', NULL),
(40, 'C002', 1805, 'PID03 , PID12 , PID01 , ', 'EID001', '2018-10-18 19:35:48', NULL),
(41, 'C002', 2330, 'PID03 , PID01 , PID12 , ', 'EID001', '2018-10-18 19:41:34', NULL),
(42, 'C004', 750, 'PID03 , ', 'EID001', '2018-10-18 19:43:15', NULL),
(43, 'C002', 120, 'PID12 , ', 'EID001', '2018-10-18 19:43:47', NULL),
(44, 'C003', 230, 'PID12 , PID03 , ', 'EID001', '2018-10-18 19:44:35', NULL),
(45, 'C004', 4080, 'PID10 , PID03 , PID12 , PID01 , ', 'EID001', '2018-10-18 19:47:08', NULL),
(46, 'C003', 900, 'PID04 , PID03 , ', 'EID001', '2018-10-18 19:49:27', NULL),
(47, 'C003', 120, 'PID10 , PID12 , ', 'EID001', '2018-10-18 19:50:15', NULL),
(48, 'C002', 75, 'PID04 , PID03 , ', 'EID001', '2018-10-18 19:52:43', NULL),
(49, 'C004', 1500, 'PID10 , PID01 , ', 'EID001', '2018-10-18 19:54:52', NULL),
(50, 'C004', 3000, 'PID03 , PID01 , PID10 , ', 'EID001', '2018-10-18 19:58:37', NULL),
(51, 'C003', 3890, 'PID10 , PID12 , PID01 , ', 'EID001', '2018-10-18 20:01:15', NULL),
(52, 'C003', 7500, 'PID12 , PID01 , ', 'EID001', '2018-10-19 15:25:30', NULL),
(53, 'C004', 7560, 'PID12 , PID01 , ', 'EID001', '2018-10-20 16:38:54', NULL),
(54, 'C004', 7620, 'PID12 , PID01 , ', 'EID001', '2018-10-20 16:39:48', NULL),
(55, 'C004', 7620, 'PID12 , PID01 , ', 'EID001', '2018-10-20 16:40:45', NULL),
(56, 'C004', 3400, 'PID10 , PID01 , PID03 , ', 'EID001', '2018-10-21 12:12:40', NULL),
(57, 'C003', 90075, 'PID03 , PID01 , PID05 , ', 'EID001', '2018-10-21 12:46:57', NULL),
(58, 'C003', 90225, 'PID03 , PID05 , PID01 , ', 'EID001', '2018-10-21 12:53:37', NULL),
(59, 'C003', 360000, 'PID05 , ', 'EID001', '2018-10-21 12:55:43', NULL),
(60, 'C003', 90000, 'PID05 , ', 'EID001', '2018-10-21 12:59:42', NULL),
(61, 'C004', 270000, 'PID05 , ', 'EID001', '2018-10-21 13:00:15', NULL),
(62, 'C004', 1400, 'PID06 , ', 'EID001', '2018-10-21 13:09:20', NULL),
(63, 'C003', 1100, 'PID07 , PID06 , ', 'EID001', '2018-10-21 13:10:12', NULL),
(64, 'C002', 90875, 'PID03 , PID06 , PID12 , PID05 , ', 'EID001', '2018-10-21 13:11:32', NULL),
(65, 'C004', 93325, 'PID07 , PID11 , PID03 , PID10 , PID05 , ', 'EID001', '2018-10-21 13:21:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `CusId` varchar(100) NOT NULL,
  `CusName` varchar(120) DEFAULT NULL,
  `CusAddress` varchar(120) DEFAULT NULL,
  `CusPhoneNo` char(12) DEFAULT NULL,
  `EmpId` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `CusId`, `CusName`, `CusAddress`, `CusPhoneNo`, `EmpId`, `RegDate`, `UpdationDate`) VALUES
(14, 'C002', 'Ravi', 'Dadar', '9957589359', 'EID001', '2018-10-07 16:30:25', '2018-10-13 12:27:44'),
(15, 'C003', 'Hrushkiesh Konde', 'Pune', '8949459385', 'EID001', '2018-10-13 12:28:44', '2018-10-21 12:07:58'),
(16, 'C004', 'Karan', 'Thane', '8959494939', 'EID002', '2018-10-15 15:26:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `EmpId` varchar(100) DEFAULT NULL,
  `EmpName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `OwnerId` varchar(100) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `StartDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `EmpId`, `EmpName`, `EmailId`, `MobileNumber`, `OwnerId`, `Password`, `StartDate`, `UpdationDate`) VALUES
(1, 'EID001', 'Rishi K', 'konde@gmail.com', '9892120211', 'OWN002', 'rishi@123', '2018-10-01 16:49:32', '2018-10-21 13:19:12'),
(2, 'EID002', 'Mukesh P', 'mp@gmail.com', '9594593216', 'OWN001', 'mp123', '2018-10-02 07:29:22', NULL),
(14, 'EID004', 'pqr', 'pqr@gmail.com', '5678904312', 'OWN001', 'pqr123', '2018-10-02 13:06:00', '2018-10-02 18:20:26'),
(17, 'EID006', 'Rakesh N', 'rn@mail.com', '8374739043', 'OWN001', 'rn123', '2018-10-02 13:38:55', NULL),
(18, 'EID007', 'Shashank P', 'sp@gmail.com', '9878343594', 'OWN002', 'bc123', '2018-10-02 15:48:58', '2018-10-07 09:34:24'),
(19, 'EID008', 'Vysakh N', 'vn@emp.com', '4284829482', 'OWN002', 'vn123', '2018-10-02 17:27:16', NULL),
(23, 'EID12', 'byn', 'byn@mail.com', '0590849583', 'OWN002', 'byn123', '2018-10-02 18:17:47', '2018-10-21 12:20:12'),
(24, 'EID0013', 'mn', 'labemn@gmail.com', '0679049399', 'OWN002', 'mn@123', '2018-10-21 12:21:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int(11) NOT NULL,
  `OwnerId` varchar(100) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Address` varchar(120) DEFAULT NULL,
  `PhoneNo` char(12) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `OwnerId`, `FullName`, `Address`, `PhoneNo`, `UserName`, `Password`) VALUES
(1, 'OWN001', 'Rehan K', 'Navi Mumbai', '1234567890', 'rk123', 'rk@123'),
(2, 'OWN002', 'Bhushan C', 'Panvel', '0987654321', 'boofy123', 'boofy@123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `ProdId` varchar(100) NOT NULL,
  `ProdName` varchar(255) DEFAULT NULL,
  `ProdCat` varchar(100) DEFAULT NULL,
  `ProdPrice` int(100) DEFAULT NULL,
  `StkId` varchar(100) NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `ProdId`, `ProdName`, `ProdCat`, `ProdPrice`, `StkId`, `RegDate`, `UpdationDate`) VALUES
(6, 'PID03', 'Red Bull', 'Energy Drink', 75, 'STK01', '2018-10-13 12:53:09', NULL),
(9, 'PID05', 'Pixel 3 XL', 'Mobiles', 90000, 'STK04', '2018-10-21 12:45:56', NULL),
(10, 'PID06', 'Jeans', 'Clothes', 700, 'STK06', '2018-10-21 13:07:34', NULL),
(11, 'PID07', 'T Shirt', 'Casual Wear (Clothes)', 400, 'STK06', '2018-10-21 13:08:48', NULL),
(7, 'PID10', 'Blood Pressure Monitor System', 'Health Care', 2500, 'STK05', '2018-10-13 14:32:53', NULL),
(8, 'PID11', 'Cake', 'Bakery', 350, 'STK02', '2018-10-21 12:05:32', NULL),
(3, 'PID12', 'Biscuit', 'Grocessory', 20, 'STK02', '2018-09-29 02:31:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `StkId` varchar(100) NOT NULL,
  `StkType` varchar(150) DEFAULT NULL,
  `StkQty` varchar(50) NOT NULL,
  `SId` varchar(100) NOT NULL,
  `AddDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `StkId`, `StkType`, `StkQty`, `SId`, `AddDate`, `UpdationDate`) VALUES
(1, 'STK01', 'Grocessory', '39', 'S002', '2018-10-02 07:51:22', '2018-10-21 13:21:50'),
(4, 'STK02', 'Eatery', '50', 'S003', '2018-10-07 05:26:25', '2018-10-21 13:21:50'),
(6, 'STK04', 'Electronics', '4988', 'S002', '2018-10-21 12:29:14', '2018-10-21 13:21:50'),
(5, 'STK05', 'Pharmacy', '226', 'S004', '2018-10-07 12:47:41', '2018-10-21 13:21:50'),
(7, 'STK06', 'Clothes', '1994', 'S001', '2018-10-21 13:06:11', '2018-10-21 13:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `SId` varchar(100) NOT NULL,
  `SName` varchar(159) DEFAULT NULL,
  `SAddress` varchar(250) NOT NULL,
  `SPhoneNO` char(12) NOT NULL,
  `OwnerId` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `SId`, `SName`, `SAddress`, `SPhoneNO`, `OwnerId`, `RegDate`, `UpdationDate`) VALUES
(1, 'S001', 'Ekart Logistics', 'Banglore', '3456789012', 'OWN001', '2018-10-02 06:34:12', NULL),
(2, 'S002', 'ATS', 'Mumbai', '0221345678', 'OWN002', '2018-10-02 06:34:48', NULL),
(3, 'S003', 'BlueDart', 'Delhi', '9876543210', 'OWN001', '2018-10-02 06:36:34', NULL),
(13, 'S004', 'AirShipment', 'Worldwide', '1000000000', 'OWN002', '2018-10-02 19:57:27', NULL),
(15, 'S005', 'Quick Packers and Movers', 'Kalyan', '9405904920', 'OWN002', '2018-10-21 12:23:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buys`
--
ALTER TABLE `buys`
  ADD KEY `id` (`id`),
  ADD KEY `CusId` (`CusId`,`EmpId`),
  ADD KEY `foreign_empid` (`EmpId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CusId`),
  ADD KEY `EmpId` (`EmpId`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StudentId` (`EmpId`),
  ADD KEY `OwnerId` (`OwnerId`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`OwnerId`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProdId`),
  ADD KEY `StkId` (`StkId`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`StkId`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `StkId` (`StkId`),
  ADD KEY `SId` (`SId`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SId` (`SId`),
  ADD KEY `OwnerId` (`OwnerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buys`
--
ALTER TABLE `buys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buys`
--
ALTER TABLE `buys`
  ADD CONSTRAINT `CusId_Foreign` FOREIGN KEY (`CusId`) REFERENCES `customers` (`CusId`),
  ADD CONSTRAINT `foreign_empid` FOREIGN KEY (`EmpId`) REFERENCES `employees` (`EmpId`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `EmpID_Foreign` FOREIGN KEY (`EmpId`) REFERENCES `employees` (`EmpId`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`OwnerId`) REFERENCES `owners` (`OwnerId`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Stkid_foreign` FOREIGN KEY (`StkId`) REFERENCES `stocks` (`StkId`);

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_ibfk_1` FOREIGN KEY (`SId`) REFERENCES `suppliers` (`SId`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `Foreign` FOREIGN KEY (`OwnerId`) REFERENCES `owners` (`OwnerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
