-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 01:32 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `Name` varchar(30) NOT NULL,
  `Project_ID` varchar(30) NOT NULL,
  `Region` varchar(15) NOT NULL,
  `Category` varchar(15) NOT NULL,
  `Lend_Account_No` varchar(30) NOT NULL,
  `Borrow_Account_No` varchar(30) NOT NULL,
  `Amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`Name`, `Project_ID`, `Region`, `Category`, `Lend_Account_No`, `Borrow_Account_No`, `Amount`) VALUES
('Sudhanshu Jena', 'DBMS-1', 'Mumbai', 'Agriculture', '12345654321', '123456789', 5500);

--
-- Triggers `pay`
--
DELIMITER $$
CREATE TRIGGER `panding` AFTER INSERT ON `pay` FOR EACH ROW BEGIN
UPDATE project
SET Amount_Pending = Amount_Pending - NEW.Amount
WHERE Project_ID = NEW.Project_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_amount` AFTER INSERT ON `pay` FOR EACH ROW BEGIN
UPDATE project
SET Amount_Gathered = Amount_Gathered + NEW.Amount
WHERE Project_ID = NEW.Project_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `Name` varchar(30) NOT NULL,
  `Project_ID` varchar(30) NOT NULL,
  `User_ID` varchar(30) NOT NULL,
  `Category` varchar(15) NOT NULL,
  `Region` varchar(30) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL,
  `Account_No` varchar(30) NOT NULL,
  `Amount_Required` int(11) NOT NULL,
  `Amount_Gathered` int(11) NOT NULL,
  `Amount_Pending` int(11) NOT NULL,
  `Loan_Pending` text NOT NULL,
  `Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`Name`, `Project_ID`, `User_ID`, `Category`, `Region`, `Start_Date`, `End_Date`, `Account_No`, `Amount_Required`, `Amount_Gathered`, `Amount_Pending`, `Loan_Pending`, `Description`) VALUES
('DBMS Project', 'DBMS-1', 'TUS3F171852', 'Agriculture', 'Mumbai', '2021-03-23', '2021-03-31', '123456789', 20000, 5000, 14500, 'No', 'Put life in perspective with some short yet sage pieces of advice. These wise and beautiful words from your favorite positive thinkers will get you in the right mindset to tackle whatever obstacles li');

-- --------------------------------------------------------

--
-- Table structure for table `repay`
--

CREATE TABLE `repay` (
  `User_ID` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Project_ID` varchar(30) NOT NULL,
  `Lend_Account_No` varchar(30) NOT NULL,
  `Borrow_Account_No` varchar(30) NOT NULL,
  `EMI` varchar(20) NOT NULL,
  `EMI_Instalment_No` varchar(20) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repay`
--

INSERT INTO `repay` (`User_ID`, `Name`, `Project_ID`, `Lend_Account_No`, `Borrow_Account_No`, `EMI`, `EMI_Instalment_No`, `Amount`) VALUES
('TUS3F171852', 'Sudhanshu Jena', 'DBMS-1', '12345654321', '123456789', '3 Month', '1st', 500);

--
-- Triggers `repay`
--
DELIMITER $$
CREATE TRIGGER `EMILone` AFTER INSERT ON `repay` FOR EACH ROW BEGIN
UPDATE project
SET Amount_Gathered = Amount_Gathered - NEW.Amount
WHERE Project_ID = NEW.Project_ID;
END
$$
DELIMITER ;

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
  ADD PRIMARY KEY (`Account_No`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `pay`
--
ALTER TABLE `pay`
  ADD KEY `Project_ID` (`Project_ID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_ID`),
  ADD KEY `Account_No` (`Account_No`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`User_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `signup` (`User_ID`);

--
-- Constraints for table `pay`
--
ALTER TABLE `pay`
  ADD CONSTRAINT `pay_ibfk_1` FOREIGN KEY (`Project_ID`) REFERENCES `project` (`Project_ID`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`Account_No`) REFERENCES `account` (`Account_No`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `signup` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
