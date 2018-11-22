-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2018 at 08:09 PM
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
-- Database: `r`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `uname` varchar(15) NOT NULL,
  `pname` varchar(15) NOT NULL,
  `pid` varchar(15) NOT NULL,
  `pquant` int(15) NOT NULL,
  `ptotprice` float NOT NULL,
  `orderid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` varchar(15) NOT NULL,
  `prodName` text NOT NULL,
  `amount` float NOT NULL,
  `prodSeller` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `amount`, `prodSeller`) VALUES
('1123', 'Maggi', 10, 'SMS Retailers'),
('12111', 'Coffee biscuit', 10, 'A'),
('13211', 'Frooti', 20, 'Q Distributors');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `uname` varchar(15) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `cpwd` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`uname`, `name`, `email`, `pwd`, `cpwd`) VALUES
('111', 'a', 'kumarvsk630@gmail.com', '1', '1'),
('33', '33', 'kumarvsk630@gmail.com', '33', '33'),
('44', 'vinay', 'b@gmail.om', '22', '22'),
('55', 'hhh', 'kumarvsk630@gmail.com', '3', '3'),
('99', 'gg', 'kumarvsk630@gmail.com', '1', '1'),
('ada1', 'adarsh', 'ada@GMAIL.COM', '123', '123'),
('bds123', 'badhusha', 'kumarvsk630@mail.com', '123', '123'),
('kumar', 'Kumaraswamy', 'kumarvsk630@gmail.com', '1', '1'),
('kumar1111', 'Kumaraswamy', 'kumarvsk630@gmail.com', '1', '1'),
('kumar23234', '123123', 'kumarvsk630@gmail.com', '1', '1'),
('kumarwe', 'Kumaraswamy', 'kumarvsk630@gmail.com', '1', '1'),
('kumar_sreenivas', 'Kumaraswamy V S', 'kumarvsk630@gmail.com', '9481152888', '9481152888'),
('q12', 'Abhi', 'kumar@com', '123', '123'),
('qwe', 'mukesh', 'a@a.com', '123', '123'),
('qwerty22', 'Mahesh', 'qw@mmmn.com', '12', '12'),
('Revanth', 'revanth', 'reva@gmail.com', 'reva', 'reva'),
('sia1', 'Siva', 'siva@yahoo.com', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` varchar(15) NOT NULL,
  `staffName` text NOT NULL,
  `staffcontactno` int(13) NOT NULL,
  `staffAddress` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffcontactno`, `staffAddress`) VALUES
('123', 'AQWS', 756776756, 'qweqwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `orderid` (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
