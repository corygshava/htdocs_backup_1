-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 01:11 PM
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
-- Database: `fflmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminactivities`
--

CREATE TABLE `adminactivities` (
  `id` int(11) NOT NULL,
  `timestamp` text NOT NULL DEFAULT '[INVALID TIMESTAMP]',
  `username` text NOT NULL DEFAULT 'none',
  `activitydetail` text NOT NULL DEFAULT 'error adding log'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminactivities`
--

INSERT INTO `adminactivities` (`id`, `timestamp`, `username`, `activitydetail`) VALUES
(2, '11-10-23 11:44:37', 'cory', 'printed deliverylogs'),
(3, '11-10-23 11:47:34', 'cory', 'viewed deliverylogs table'),
(4, '11-10-23 11:48:38', 'cory', 'viewed deliverylogs table'),
(5, '11-10-23 11:49:06', 'cory', 'viewed deliverylogs table'),
(6, '11-10-23 11:49:15', 'cory', 'printed deliverylogs'),
(7, '11-10-23 11:50:21', 'cory', 'viewed deliverylogs table'),
(8, '11-10-23 11:50:47', 'cory', 'printed deliverylogs table records'),
(9, '11-10-23 11:51:59', 'cory', 'viewed deliverylogs table'),
(10, '11-10-23 11:52:14', 'cory', 'viewed deliverylogs table'),
(11, '11-10-23 11:52:34', 'cory', 'viewed deliverylogs table'),
(12, '11-10-23 11:52:50', 'cory', 'viewed deliverylogs table'),
(13, '11-10-23 11:53:08', 'cory', 'viewed deliverylogs table'),
(14, '11-10-23 11:54:00', 'cory', 'viewed deliverylogs table'),
(15, '11-10-23 11:56:44', 'cory', 'viewed deliverylogs table');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `deliveryserial` text NOT NULL,
  `loadtype` text NOT NULL,
  `loaddescription` text NOT NULL,
  `startcoords` text NOT NULL,
  `endcoords` text NOT NULL,
  `deliverydistance` float NOT NULL,
  `deliverycost` int(11) NOT NULL,
  `client` text NOT NULL,
  `driver` text NOT NULL,
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `deliveryserial`, `loadtype`, `loaddescription`, `startcoords`, `endcoords`, `deliverydistance`, `deliverycost`, `client`, `driver`, `state`) VALUES
(21, 'ICSSPJPUIFYHSSVU', 'fruits', 'they go bad easily', '0.39550467153201946,35.02441406250001', '-2.0210651187669897,37.79296875000001', 408.587, 61288, 'normal', 'benson', 'failed'),
(23, 'QFEXTSATBDUQAOCA', 'new items', 'items that need delivery', '8.798225459016358,16.611328125000004', '-1.2962761196418089,36.87011718750001', 2509.83, 376474, 'cory', 'benson', 'complete'),
(24, 'HERUGRQZLMQMSJAU', 'Something', 'its just something I added', '0.7470491450051796,34.62890625000001', '-1.9771465537125645,37.88085937500001', 471.671, 70750, 'normal', 'new driver', 'verified'),
(25, 'CIBEKHEWLJPHGJZG', 'electric gear', '554 KG of electric gear to be sent from startpoint to end point', '0.5273363048115169,11.074218750000002', '-2.1308562777325184,14.018554687500002', 441.037, 66155, 'normal', 'new driver', 'verified'),
(26, 'BORJZAGNMBIMWQSR', 'something heavy', 'nothing much just something rally heavy (around 3 tonnes, DONT ASK)', '6.402648405963896,1.7138671875000002', '3.162455530237848,11.5576171875', 1148.58, 172286, 'normal', 'new driver', 'verified'),
(27, 'VYOWXNACKOSXWUYG', 'electric gear', 'more electric gear, weight: 2000kg, ETA: 23:43 12/02/2023', '2.4162756547063857,2.1533203125000004', '-1.845383988573187,15.117187500000002', 1517.07, 227561, 'normal', 'new driver', 'verified'),
(28, 'RWVIAQGZVQZXNMXF', 'foodstuff', '2KG mangoes, All in perfect condition, Fragile and should be handled with care.', '16.13026201203477,183.33984375000003', '13.111580118251661,187.64648437500003', 572.113, 85817, 'Jason Maranda', 'new driver', 'failed');

-- --------------------------------------------------------

--
-- Table structure for table `deliverylogs`
--

CREATE TABLE `deliverylogs` (
  `id` int(11) NOT NULL,
  `deliveryserial` varchar(50) NOT NULL,
  `logs` text NOT NULL,
  `lastupdatedate` text NOT NULL,
  `isdone` text NOT NULL,
  `lastlocation` text NOT NULL,
  `datecreated` text NOT NULL,
  `state` text NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliverylogs`
--

INSERT INTO `deliverylogs` (`id`, `deliveryserial`, `logs`, `lastupdatedate`, `isdone`, `lastlocation`, `datecreated`, `state`) VALUES
(8, 'VYOWXNACKOSXWUYG', '0,0|[10-10-23 09:18:37] I have encountered a problem with the camshaft, i am attempting to fix it|[10-10-23 09:20:40] there has been little progress since the last message|[10-10-23 11:50:19] I was able to fix the problem|[11-10-23 12:08:02] delivery is going on smoothly|[11-10-23 12:27:50] I am still in nairobi|[11-10-23 12:41:04] im almost at the destination|', '23-10-11 12:42:55', 'yes', '-1.2877824, 36.8345088', '2023-10-09', 'successful'),
(9, 'RWVIAQGZVQZXNMXF', '0,0|[11-10-23 01:08:37] the delivery is going on smoothly|[11-10-23 01:09:18] the delivery is complete|', '23-10-11 01:18:57', 'yes', '-1.2877824, 36.8345088', '2023-10-10', 'failed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(25) NOT NULL,
  `contact` varchar(55) NOT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`, `contact`, `usertype`) VALUES
(4, 'Norris baraka', '123', '+254774453345', 'client'),
(5, 'normal', '123', '+254000000000', 'client'),
(6, 'newguy', '123', '+254774453345', 'Driver'),
(8, 'new driver', '123', '+254754334554', 'Driver'),
(9, 'cory', '1234', '+254754079047', 'admin'),
(10, 'benson', '12345', '123456789', 'Driver'),
(11, 'Jason Maranda', '12345', '+254789899435', 'client'),
(12, 'Milan Kabogo', '123', '+254777888999', 'Driver');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminactivities`
--
ALTER TABLE `adminactivities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliverylogs`
--
ALTER TABLE `deliverylogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminactivities`
--
ALTER TABLE `adminactivities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `deliverylogs`
--
ALTER TABLE `deliverylogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
