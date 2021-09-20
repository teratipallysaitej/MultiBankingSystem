-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 01:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `gender`, `dob`, `relationship`, `department`, `address`, `mobile`, `login_id`, `pwd`, `lastlogin`) VALUES
(1, 'admin', 'M', '1994-01-01', 'unmarried', 'developer', 'globsyn kolkata', '18003004000', 'admin', 'admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `atmab`
--

CREATE TABLE `atmab` (
  `id` int(10) DEFAULT NULL,
  `cust_name` varchar(20) DEFAULT NULL,
  `account_no` int(10) DEFAULT NULL,
  `atm_status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atmab`
--

INSERT INTO `atmab` (`id`, `cust_name`, `account_no`, `atm_status`) VALUES
(0, 'Nikhat', 261, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `atmcd`
--

CREATE TABLE `atmcd` (
  `id` int(10) DEFAULT NULL,
  `cust_name` varchar(20) DEFAULT NULL,
  `account_no` int(10) DEFAULT NULL,
  `atm_status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaryab`
--

CREATE TABLE `beneficiaryab` (
  `id` int(10) DEFAULT NULL,
  `sender_id` int(10) DEFAULT NULL,
  `sender_name` varchar(20) DEFAULT NULL,
  `reciever_id` int(10) DEFAULT NULL,
  `reciever_name` varchar(20) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiaryab`
--

INSERT INTO `beneficiaryab` (`id`, `sender_id`, `sender_name`, `reciever_id`, `reciever_name`, `status`) VALUES
(0, 261, 'Nikhat', 272, 'Ray', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiarycd`
--

CREATE TABLE `beneficiarycd` (
  `id` int(10) DEFAULT NULL,
  `sender_id` int(10) DEFAULT NULL,
  `sender_name` varchar(20) DEFAULT NULL,
  `reciever_id` int(10) DEFAULT NULL,
  `reciever_name` varchar(20) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiarycd`
--

INSERT INTO `beneficiarycd` (`id`, `sender_id`, `sender_name`, `reciever_id`, `reciever_name`, `status`) VALUES
(0, 272, 'Ray', 262, 'Ray', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_bookab`
--

CREATE TABLE `cheque_bookab` (
  `id` int(10) DEFAULT NULL,
  `cust_name` varchar(20) DEFAULT NULL,
  `account_no` int(10) DEFAULT NULL,
  `cheque_book_status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheque_bookab`
--

INSERT INTO `cheque_bookab` (`id`, `cust_name`, `account_no`, `cheque_book_status`) VALUES
(0, 'Nikhat', 261, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_bookcd`
--

CREATE TABLE `cheque_bookcd` (
  `id` int(10) DEFAULT NULL,
  `cust_name` varchar(20) DEFAULT NULL,
  `account_no` int(10) DEFAULT NULL,
  `cheque_book_status` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `accstatus` varchar(255) NOT NULL,
  `AB` int(10) DEFAULT '0',
  `CD` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `dob`, `address`, `mobile`, `email`, `password`, `lastlogin`, `accstatus`, `AB`, `CD`) VALUES
(1, 'Nikhat', 'F', '1997-11-10', 'hyderabad', '8008622192', 'nikhat@gmail.com', '25f8771f1c77d642180e9038d48ed48a9a9af94a', '0000-00-00 00:00:00', 'ACTIVE', 261, 0),
(2, 'Ray', 'F', '1997-10-17', 'Hyderabad', '9505740976', 'ray@gmail.com', 'f7f8f5cb33c7b8509cfa1e6406d35dfd55dde780', '0000-00-00 00:00:00', 'ACTIVE', 262, 272),
(3, 'asdf', 'M', '0100-11-12', 'hgfhgjk', '456233', 'asdf@gmail.com', '4321d410b207cb0f0f58ea772b95811befe692d5', '0000-00-00 00:00:00', 'ACTIVE', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `passbook261`
--

CREATE TABLE `passbook261` (
  `transactionid` int(5) NOT NULL,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bank_id` int(10) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook261`
--

INSERT INTO `passbook261` (`transactionid`, `transactiondate`, `name`, `bank_id`, `credit`, `debit`, `amount`, `narration`) VALUES
(1, '2019-03-23', 'Nikhat', 26, 2000, 0, 2000.00, 'Account Open'),
(2, '2019-03-23', 'Nikhat', 26, 0, 500, 1500.00, 'TO Ray');

-- --------------------------------------------------------

--
-- Table structure for table `passbook262`
--

CREATE TABLE `passbook262` (
  `transactionid` int(5) NOT NULL,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bank_id` int(10) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook262`
--

INSERT INTO `passbook262` (`transactionid`, `transactiondate`, `name`, `bank_id`, `credit`, `debit`, `amount`, `narration`) VALUES
(1, '2019-03-23', 'Ray', 26, 1000, 0, 1000.00, 'Account Open'),
(2, '2019-03-23', 'Ray', 26, 500, 0, 1500.00, 'BY Ray');

-- --------------------------------------------------------

--
-- Table structure for table `passbook272`
--

CREATE TABLE `passbook272` (
  `transactionid` int(5) NOT NULL,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bank_id` int(10) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook272`
--

INSERT INTO `passbook272` (`transactionid`, `transactiondate`, `name`, `bank_id`, `credit`, `debit`, `amount`, `narration`) VALUES
(1, '2019-03-23', 'Ray', 27, 2000, 0, 2000.00, 'Account Open'),
(2, '2019-03-23', 'Ray', 27, 500, 0, 2500.00, 'BY Nikhat'),
(3, '2019-03-23', 'Ray', 27, 0, 500, 2000.00, 'TO Ray');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `ifsc` varchar(30) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `address`, `mobile`, `email`, `pwd`, `ifsc`, `lastlogin`) VALUES
(26, 'AB', 'hyd', '456123789', 'admin@ab.com', 'ab', 'ab123', '2019-03-23 13:29:17'),
(27, 'CD', 'hhhaa', '456123789', 'admin@cd.com', 'cd', 'cd123', '2019-03-23 13:34:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`login_id`);

--
-- Indexes for table `passbook261`
--
ALTER TABLE `passbook261`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `passbook262`
--
ALTER TABLE `passbook262`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `passbook272`
--
ALTER TABLE `passbook272`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `passbook261`
--
ALTER TABLE `passbook261`
  MODIFY `transactionid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passbook262`
--
ALTER TABLE `passbook262`
  MODIFY `transactionid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `passbook272`
--
ALTER TABLE `passbook272`
  MODIFY `transactionid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
