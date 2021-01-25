-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2018 at 08:55 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `mnsp`
--

CREATE TABLE `mnsp` (
  `Num_ID` int(11) NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Due_Date` date NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `PM_Name` varchar(50) NOT NULL,
  `Sale_Name` varchar(50) NOT NULL,
  `Pre_Sale` varchar(50) NOT NULL,
  `Diagram` varchar(100) NOT NULL,
  `Monitor` varchar(100) NOT NULL,
  `Service` varchar(100) NOT NULL,
  `SO_Num` varchar(100) NOT NULL,
  `SO_File` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pm_mnsp`
--
--
-- Indexes for dumped tables
--

--
-- Indexes for table `pm_mnsp`
--
ALTER TABLE `mnsp`
  ADD PRIMARY KEY (`Num_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pm_mnsp`
--
ALTER TABLE `mnsp`
  MODIFY `Num_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
