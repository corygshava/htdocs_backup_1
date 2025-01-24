-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 01:44 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medlabs`
--

CREATE DATABASE IF NOT EXISTS 'medlabs';
USE 'medlabs';

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `DoctorId` int(11) NOT NULL,
  `DoctorName` text NOT NULL,
  `DoctorSerial` varchar(16) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='this table represents records imported from the Hospital DB';

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`DoctorId`, `DoctorName`, `DoctorSerial`, `password`) VALUES
(1, 'Davis Kamau', 'DRQ2524', '123'),
(2, 'Mariam Kilaka', 'MRC2345', 'password'),
(3, 'Dorris Tenere', 'DRS-23476', '123'),
(4, 'Triviani Kamau', 'TRZ-2345', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `itemname` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  `updatedby` text NOT NULL,
  `updatedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `itemname`, `quantity`, `description`, `cost`, `updatedby`, `updatedate`) VALUES
(7, 'new item', 13, 'this is a new item made for testing inventory system', 555, 'cory', '2023-10-03'),
(8, 'Paracetamol white', 7, 'it is a pill for headaches', 345, 'cory', '2023-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `itemslog`
--

CREATE TABLE `itemslog` (
  `id` int(11) NOT NULL,
  `logdate` date NOT NULL,
  `updater` text NOT NULL,
  `operationtype` text NOT NULL,
  `itemaffected` text NOT NULL,
  `summary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itemslog`
--

INSERT INTO `itemslog` (`id`, `logdate`, `updater`, `operationtype`, `itemaffected`, `summary`) VALUES
(4, '2023-10-03', 'cory', 'update', 'old item', 'the item [old item] was updated on 2023-10-03 at 13:28:10 by cory'),
(5, '2023-10-03', 'cory', 'update', 'new item', 'the item [new item] was updated on 2023-10-03 at 13:30:24 by cory'),
(6, '2023-10-03', 'cory', 'give', 'new item', 'the item [new item] was updated on 2023-10-03 at 13:34:19 by cory'),
(7, '2023-10-03', 'cory', 'update', 'old item', 'the item [old item] was updated on 2023-10-03 at 13:40:19 by cory'),
(8, '2023-10-03', 'cory', 'new', 'Paracetamol white', 'the item [Paracetamol white] was added on 2023-10-03 at 13:41:22 by cory'),
(9, '2023-10-03', 'cory', 'give', 'Paracetamol white', 'the item [Paracetamol white] was updated on 2023-10-03 at 13:42:24 by cory'),
(10, '2023-10-03', 'cory', 'give', 'Paracetamol white', 'the item [Paracetamol white] was administered on 2023-10-03 at 13:45:24 by cory'),
(11, '2023-10-03', 'cory', 'update', 'Paracetamol white', 'the item [Paracetamol white] was updated on 2023-10-03 at 13:57:25 by cory'),
(12, '2023-10-03', 'cory', 'remove', 'Paracetamol white', 'the item [Paracetamol white] was removed on 2023-10-03 at 13:58:49 by cory'),
(13, '2023-10-03', 'cory', 'remove', 'Paracetamol white', 'the item [Paracetamol white] was removed on 2023-10-03 at 14:00:41 by cory');

-- --------------------------------------------------------

--
-- Table structure for table `patientrecords`
--

CREATE TABLE `patientrecords` (
  `ID` int(11) NOT NULL,
  `ServiceSerial` varchar(25) NOT NULL,
  `PatientName` text NOT NULL,
  `service` text NOT NULL,
  `description` text NOT NULL,
  `servicer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientrecords`
--

INSERT INTO `patientrecords` (`ID`, `ServiceSerial`, `PatientName`, `service`, `description`, `servicer`) VALUES
(1, 'SVC-8905', 'somebody sick', 'CT scan', 'He has a sever case of psychosiphermeleterbelia syndrome and requires an immediate cerebral stabilization via radiosurgery. This is to be administered within 6-7 days after issuing this form, failure to which will result in instant, precise and inescapable death.', 'cory'),
(6, 'ZHYR-84716', 'Kulio Musani', 'HIV test', 'The patient was found to be HIV positive. He is currently in his asymptomatic stage thus will not immediately require ARVs', 'cory'),
(7, 'MHWE-68592', 'Nobody', 'Other', 'Just required certain medicine fro our storage unit', 'cory');

-- --------------------------------------------------------

--
-- Table structure for table `referals`
--

CREATE TABLE `referals` (
  `ID` int(11) NOT NULL,
  `referalID` varchar(25) NOT NULL,
  `DoctorSerial` varchar(25) NOT NULL,
  `DoctorName` text NOT NULL,
  `PatientName` text NOT NULL,
  `service` text NOT NULL,
  `description` text NOT NULL,
  `state` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referals`
--

INSERT INTO `referals` (`ID`, `referalID`, `DoctorSerial`, `DoctorName`, `PatientName`, `service`, `description`, `state`) VALUES
(1, 'sdsdsad', '223w2eqwwqe', 'nobody', 'somebody sick', 'CT scan', 'THis patient has a broken brain and an abnormality in his medulla oblangata\'s cerebral inferior cortex and a disjunction at his feculiar stomachic matter syndrome', 'attended to'),
(5, 'HBQQ-36021', 'MRC2345', 'Mariam Kilaka', 'Dunia Iraka', 'CT scan', 'no extra details available', 'pending'),
(6, 'VZFT-41616', 'MRC2345', 'Mariam Kilaka', 'Suverix maranta', 'Amoeba test', 'check Her stool for signs of pus or blood, might be serious', 'pending'),
(7, 'EQDM-65111', 'MRC2345', 'Mariam Kilaka', 'Kulio Musani', 'HIV test', 'Check and report back on His case', 'attended to'),
(8, 'AKSU-19234', 'TRZ-2345', 'triviani kamau', 'Andrew Hassle', 'CT scan', 'Check his stomach for any sings of hernia. There may be something lodged in there that was not supposed to be ingested', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Userid` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Userid`, `Username`, `Password`, `Usertype`) VALUES
(1, 'new user', '12345', 'normal'),
(2, 'admin', '123', 'admin'),
(3, 'Cory', 'nothing', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`DoctorId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `itemslog`
--
ALTER TABLE `itemslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientrecords`
--
ALTER TABLE `patientrecords`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `referals`
--
ALTER TABLE `referals`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `DoctorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `itemslog`
--
ALTER TABLE `itemslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patientrecords`
--
ALTER TABLE `patientrecords`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `referals`
--
ALTER TABLE `referals`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
