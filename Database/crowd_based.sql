-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 06:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crowd_based`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Name` varchar(30) NOT NULL,
  `User_ID` varchar(30) NOT NULL,
  `Account_No` varchar(30) NOT NULL,
  `IFSC_Code` varchar(30) NOT NULL,
  `Bank_Name` varchar(30) NOT NULL,
  `Bank_Branch` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Contact_No` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Name`, `User_ID`, `Account_No`, `IFSC_Code`, `Bank_Name`, `Bank_Branch`, `Email`, `Contact_No`, `Address`) VALUES
('Sudhanshu Jena', 'TUS3F171852', '123456789', '123456', 'IDB', 'Badlapur', 'jackricherr007@gmail.com', '9730620909', 'Bhakti Park');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`Name`, `Email`, `Phone`, `Message`) VALUES
('Sudhanshu Jena', 'jackricherr007@gmail.com', '09730620905', ' Nothing...'),
('Sudhanshu Jena', 'jackricherr007@gmail.com', '09730620905', ' Nothing...');

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Region` varchar(15) NOT NULL,
  `Category` varchar(15) NOT NULL,
  `Lend_Account_No` varchar(30) NOT NULL,
  `Borrow_Account_No` varchar(30) NOT NULL,
  `Amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`Name`, `Email`, `Address`, `Region`, `Category`, `Lend_Account_No`, `Borrow_Account_No`, `Amount`) VALUES
('Sudhanshu Jena', 'jackricherr007@gmail.com', 'Bhakti Park', 'Maharashtra', 'DBMS_PROFESSOR', '12345654321', '1234', 4567);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Name` varchar(30) NOT NULL,
  `User_ID` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Category` varchar(15) NOT NULL,
  `Region` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Account_No` varchar(30) NOT NULL,
  `Loan_Pending` text NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Name`, `User_ID`, `Email`, `Category`, `Region`, `Address`, `Account_No`, `Loan_Pending`, `Description`) VALUES
('Sudhanshu Jena', 'TUS3F171852', 'jackricherr007@gmail.com', 'Agriculture', 'Maharashtra', 'Bhakti Park', '123456789', 'No', 'Nice Project And Nice Project '),
('Tejas Manjrekar', 'TUS3F171856', 'jackricherr007@gmail.com', 'Agriculture', 'Navi Mumbai', 'aaa', '123456789', 'No', 'Nice Project Nice Project ');

-- --------------------------------------------------------

--
-- Table structure for table `repay`
--

CREATE TABLE `repay` (
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Region` varchar(15) NOT NULL,
  `Category` varchar(15) NOT NULL,
  `Lend_Account_No` varchar(30) NOT NULL,
  `Borrow_Account_No` varchar(30) NOT NULL,
  `Amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `User_ID` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`User_ID`, `Email`, `Password`) VALUES
('TUS3F171852 ', 'jackricherr007@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_No`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Name`),
  ADD KEY `Account_No` (`Account_No`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`User_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`Account_No`) REFERENCES `account` (`Account_No`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
