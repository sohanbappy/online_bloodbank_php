-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2019 at 06:14 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinebloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `aid` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`aid`, `name`, `username`, `password`, `email`, `occupation`, `address`) VALUES
(1, 'joy', 'joy123', '12345', 'bappy@gmail.com', 'CSEEngineeryy', 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_tb`
--

CREATE TABLE `blood_bank_tb` (
  `bank_id` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `division` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` int(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_bank_tb`
--

INSERT INTO `blood_bank_tb` (`bank_id`, `bank_name`, `username`, `password`, `division`, `location`, `email`, `contact`, `status`, `logo`, `created_at`) VALUES
('org-042820191005', 'Sumanbank', 'sumanbank', '12345', 'Dhaka', 'Dhanmondi', 'sumanbank@gmail.com', 1835647890, 'Accepted', 'bloodbank/BloodBank_logo/logo1png.png', '2019-04-10 03:17:28'),
('org-044220191005', 'QuantamBank', 'quantam', '12345', 'Dhaka', 'Uttara', 'quantam@gmail.com', 1835467850, 'Accepted', 'bloodbank/BloodBank_logo/logo3.jpg', '2019-04-10 03:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `donation_tb`
--

CREATE TABLE `donation_tb` (
  `serial` int(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `bl_group` varchar(200) DEFAULT NULL,
  `unit` int(20) NOT NULL DEFAULT '1',
  `donation_date` date NOT NULL,
  `donated_to` varchar(200) DEFAULT 'Direct to patient',
  `recipient_address` varchar(200) NOT NULL,
  `confirmed_by` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donor_tb`
--

CREATE TABLE `donor_tb` (
  `donor_id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `bl_group` varchar(200) NOT NULL,
  `donation_last_date` date DEFAULT '0000-00-00',
  `division` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `age` int(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `activity` varchar(200) DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `img` varchar(350) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor_tb`
--

INSERT INTO `donor_tb` (`donor_id`, `name`, `username`, `password`, `bl_group`, `donation_last_date`, `division`, `email`, `location`, `age`, `phone`, `activity`, `status`, `gender`, `img`, `created_at`) VALUES
(11, 'Joyanta Debnath', 'Joyanta', '12345', 'A+', '0000-00-00', 'Dhaka', 'joyanta@gmail.com', 'Uttara', 24, '01836534608', 'active', 'Accepted', 'male', 'donor/donor_img/formal.JPG', '2019-04-10 03:13:16'),
(12, 'Sheikh Rakib', 'Rakib', '12345', 'A+', '0000-00-00', 'Dhaka', 'rakib@gmail.com', 'Uttara', 23, '01836534608', 'active', 'Accepted', 'male', 'donor/donor_img/agile-development-process (1).png', '2019-04-10 03:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `notice_tb`
--

CREATE TABLE `notice_tb` (
  `notice_id` int(200) NOT NULL,
  `bl_group` varchar(200) NOT NULL,
  `bl_unit` int(200) NOT NULL,
  `needed_date` date NOT NULL,
  `rqst_name` varchar(200) NOT NULL,
  `division` varchar(200) NOT NULL,
  `contact` int(200) NOT NULL,
  `p_location` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice_tb`
--

INSERT INTO `notice_tb` (`notice_id`, `bl_group`, `bl_unit`, `needed_date`, `rqst_name`, `division`, `contact`, `p_location`, `status`) VALUES
(1, 'A+', 1, '2019-04-12', 'Joyanta Debnath', 'Chittagong', 1836547809, 'Square Hospital', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `request_tb`
--

CREATE TABLE `request_tb` (
  `req_id` varchar(200) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `receiver` varchar(200) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `storage_tb`
--

CREATE TABLE `storage_tb` (
  `storage_id` int(200) NOT NULL,
  `bank_id` varchar(200) NOT NULL,
  `a_positive` int(200) NOT NULL,
  `a_negative` int(200) NOT NULL,
  `b_positive` int(200) NOT NULL,
  `b_negative` int(200) NOT NULL,
  `ab_positive` int(200) NOT NULL,
  `ab_negative` int(200) NOT NULL,
  `o_positive` int(200) NOT NULL,
  `o_negative` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage_tb`
--

INSERT INTO `storage_tb` (`storage_id`, `bank_id`, `a_positive`, `a_negative`, `b_positive`, `b_negative`, `ab_positive`, `ab_negative`, `o_positive`, `o_negative`) VALUES
(28, 'org-042820191005', 0, 0, 0, 0, 0, 0, 0, 0),
(29, 'org-044220191005', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `name` varchar(200) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `extra` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`name`, `quantity`, `extra`) VALUES
('sb', '240', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `blood_bank_tb`
--
ALTER TABLE `blood_bank_tb`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `donation_tb`
--
ALTER TABLE `donation_tb`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `donor_tb`
--
ALTER TABLE `donor_tb`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `notice_tb`
--
ALTER TABLE `notice_tb`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `request_tb`
--
ALTER TABLE `request_tb`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `storage_tb`
--
ALTER TABLE `storage_tb`
  ADD PRIMARY KEY (`storage_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `aid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `donation_tb`
--
ALTER TABLE `donation_tb`
  MODIFY `serial` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `donor_tb`
--
ALTER TABLE `donor_tb`
  MODIFY `donor_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `notice_tb`
--
ALTER TABLE `notice_tb`
  MODIFY `notice_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `storage_tb`
--
ALTER TABLE `storage_tb`
  MODIFY `storage_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
