-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 08:24 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'a@b.c', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `equip`
--

CREATE TABLE `equip` (
  `eid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equip`
--

INSERT INTO `equip` (`eid`, `name`) VALUES
(1, 'Abdominal Bench'),
(2, 'Barbells'),
(3, 'Bench Press'),
(4, 'Cables and Pulleys'),
(5, 'Calf Machine'),
(6, ' Dipping Bars'),
(7, 'Dumb Bells'),
(8, 'Foam Roller'),
(9, 'Hack Squat Machine'),
(10, 'Hammer Strength Machine'),
(11, ' Hyper Extension Bench'),
(12, 'Incline Bench Press'),
(13, 'Kettle Bells'),
(14, 'Lat Pulldown Machine'),
(15, 'Leg Abduction Machine'),
(16, ' Leg Extension Machine'),
(17, 'Leg Curl Machine'),
(18, 'Leg Press Machine'),
(19, 'Pec Deck Machine'),
(20, 'Preacher Bench'),
(21, 'Pull Up Bar'),
(22, 'Smith Machine'),
(23, 'Squat Rack'),
(24, 'Stability Ball'),
(25, 'Wall Ball');

-- --------------------------------------------------------

--
-- Table structure for table `eq_detail`
--

CREATE TABLE `eq_detail` (
  `did` int(11) NOT NULL,
  `eid` int(3) NOT NULL,
  `count` int(3) NOT NULL,
  `price` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_detail`
--

INSERT INTO `eq_detail` (`did`, `eid`, `count`, `price`, `date`) VALUES
(1, 11, 3, 1000, '2019-02-13'),
(2, 5, 7, 7000, '2019-02-16'),
(3, 3, 3, 3000, '2019-02-16'),
(4, 5, 5, 5000, '2019-02-16'),
(5, 5, 10, 100000, '2019-02-14'),
(6, 6, 2, 2000, '2019-02-16'),
(7, 4, 30, 23000, '2019-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `eq_repair`
--

CREATE TABLE `eq_repair` (
  `rid` int(11) NOT NULL,
  `eid` int(10) NOT NULL,
  `count` int(4) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `detail` text NOT NULL,
  `damage_date` date NOT NULL,
  `start_repair_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `invoice_image_location` varchar(150) NOT NULL,
  `repairment_status` varchar(15) NOT NULL,
  `prev_d` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eq_repair`
--

INSERT INTO `eq_repair` (`rid`, `eid`, `count`, `cost`, `detail`, `damage_date`, `start_repair_date`, `finish_date`, `invoice_image_location`, `repairment_status`, `prev_d`) VALUES
(1, 3, 2, '1000', 'spring loose', '2019-02-04', '2019-02-14', '2019-02-06', 'uploads/81TzzvWR7DL._SY355_.jpg', 'Repaired', 0),
(2, 11, 2, '', 'spring loose', '2019-02-16', '2019-02-01', '0000-00-00', '', 'Under Repair', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expens`
--

CREATE TABLE `expens` (
  `exid` int(11) NOT NULL,
  `type` varchar(12) NOT NULL,
  `detail` text NOT NULL,
  `image_location` text NOT NULL,
  `cost` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expens`
--

INSERT INTO `expens` (`exid`, `type`, `detail`, `image_location`, `cost`, `date`) VALUES
(1, '1', 'Rent', '', 2000, '2019-02-01'),
(2, '0', 'test cost', '', 45, '2019-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gid` int(11) NOT NULL,
  `u_type` int(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `item` int(2) NOT NULL,
  `date` date NOT NULL,
  `hour` int(2) NOT NULL,
  `amount` int(5) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gid`, `u_type`, `name`, `nid`, `item`, `date`, `hour`, `amount`, `time`) VALUES
(1, 1, 'Tester 3', '1234567', 1, '2019-03-01', 1, 0, '2019-03-07 06:29:47'),
(2, 1, 'a', '1', 1, '2019-03-01', 1, 0, '2019-03-07 06:32:13'),
(3, 2, 'Amimul Ehshan', '11', 2, '2019-03-01', 1, 500, '2019-03-07 06:45:53'),
(5, 1, 'Test User', '123453', 2, '2019-03-01', 1, 0, '2019-03-07 06:59:15'),
(6, 1, 'a', '1', 2, '2019-03-01', 1, 0, '2019-03-07 10:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `uid` int(5) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `payment_date` date NOT NULL,
  `pay_for` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `uid`, `payment`, `payment_date`, `pay_for`) VALUES
(1, 1, '1313', '2019-02-16', 'Feb-2019'),
(2, 1, '1313', '2019-02-16', 'Mar-2019'),
(3, 2, '12', '2019-03-02', 'Mar-2019'),
(4, 3, '300', '2019-03-02', 'Mar-2019'),
(5, 4, '500', '2019-03-04', 'Mar-2019'),
(6, 1, '1313', '2019-03-07', 'Mar-2019');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(7) NOT NULL,
  `remarks` text NOT NULL,
  `height` varchar(5) NOT NULL,
  `weight` varchar(3) NOT NULL,
  `blood` varchar(4) NOT NULL,
  `reg_fee` varchar(8) NOT NULL,
  `monthly_fee` varchar(8) NOT NULL,
  `image_location` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `nid`, `email`, `name`, `phone`, `address`, `dob`, `sex`, `remarks`, `height`, `weight`, `blood`, `reg_fee`, `monthly_fee`, `image_location`, `date`) VALUES
(1, '1234567', 'imam2889@diu.edu.bd', 'Tester 3', '234567', 'dnomaindi', '1995-02-12', 'female', 'remarks 3', '5.5', '79', 'B+', '3424', '1313', 'uploads/sig.PNG', '2019-02-24'),
(2, '1', 'a@a.c', 'a', '1', '', '2019-03-02', 'male', 'remarks a', '1.2', '32', 'A-', '12', '12', 'uploads/WhatsApp Image 2019-01-01 at 11.25.30 AM.jpeg', '2019-03-02'),
(3, '123456', 'ab@c.d', 'Test1', '1243', 'test address', '2019-03-02', 'male', 'remarks 11', '6.4', '70', 'B+', '100', '300', 'uploads/WhatsApp ImagM.jpeg', '2019-03-02'),
(4, '123453', 'a@a.a', 'Test User', '123', 'test address', '2019-03-04', 'male', 'test remarks', '4.5', '70', 'B+', '1000', '500', 'uploads/khan 2.jpeg', '2019-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equip`
--
ALTER TABLE `equip`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `eq_detail`
--
ALTER TABLE `eq_detail`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `eq_repair`
--
ALTER TABLE `eq_repair`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `expens`
--
ALTER TABLE `expens`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `equip`
--
ALTER TABLE `equip`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `eq_detail`
--
ALTER TABLE `eq_detail`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `eq_repair`
--
ALTER TABLE `eq_repair`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expens`
--
ALTER TABLE `expens`
  MODIFY `exid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
