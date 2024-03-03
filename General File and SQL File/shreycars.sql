-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 01:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shreycars`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(2, 'shre@gmail.com', '0cf952ad4ebff357eeee343e3634db6b', '2024-03-02 22:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `VehicleNo` varchar(20) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleId`, `VehicleNo`, `FromDate`, `ToDate`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(8, 848466689, 'shre@gmail.com', 10, 'MH 01 AB 1234', '2024-03-08', '2024-03-09', 'Need car clean and clear for business work.', 1, '2024-03-03 10:13:08', '2024-03-03 10:13:40'),
(9, 584132608, 'shre@gmail.com', 15, 'KA 06 KL 1234', '2024-03-17', '2024-03-24', 'Send professional driver, coz we booked car for trip to Himachal Pradesh with family. Also check brakes and engine properly.', 1, '2024-03-03 10:16:12', '2024-03-03 10:16:39'),
(10, 735032391, 'saurav@gmail.com', 13, 'TN 04 GH 3456', '2024-03-14', '2024-03-15', 'AC is must.', 1, '2024-03-03 10:32:38', '2024-03-03 10:33:18'),
(11, 919046229, 'saurav@gmail.com', 11, 'DL 02 CD 5678', '2024-03-29', '2024-03-31', 'Check tires and breaks properly need to go Mumbai urgently and come back.', 1, '2024-03-03 10:34:41', '2024-03-03 10:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(2, 'Shreyansh', 'shre@gmail.com', 'bcf3582f747968690c5462ee9b4e518c', '7894561237', '', 'D.A. Brothers, Patna', 'Patna', 'India', '2024-03-02 21:17:43', '2024-03-02 21:19:47'),
(3, 'Saurav', 'saurav@gmail.com', '8387209ca0871673c979c9a0d0098795', '789654123', '', 'Gaya, Bihar - 800201', 'Gaya', 'India', '2024-03-03 07:46:14', '2024-03-03 07:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehicleNo` varchar(20) DEFAULT NULL,
  `VehiclesOverview` longtext DEFAULT NULL,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehicleNo`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `RegDate`, `UpdationDate`) VALUES
(10, 'BMW 5 Series', 'MH 01 AB 1234', 'The BMW 5 Series is a luxury sedan that offers a perfect blend of style, performance, and comfort. With its sleek design and advanced features, it\'s the ideal choice for those who demand the best.', 2999, 'Petrol', 2018, 5, 'BMW 1.jpg', 'BMW 4.jpg', 'BMW 3.jpg', 'BMW 2.jpg', '2024-03-03 09:42:27', NULL),
(11, 'Maruti Suzuki Swift', 'DL 02 CD 5678', 'The Maruti Suzuki Swift is a popular hatchback known for its agility, fuel efficiency, and practicality. It\'s perfect for navigating through the busy streets of India with ease.', 899, 'Petrol', 2020, 5, 'swift 2.jpg', 'swift 1.jpg', 'swift 3.jpg', 'swift 4.jpg', '2024-03-03 09:47:29', NULL),
(12, 'Honda City', 'KA 03 EF 9102', 'The Honda City is a stylish and reliable sedan that offers a smooth ride and spacious interior. With its fuel-efficient engine and comfortable seating, it\'s perfect for both city commutes and long drives.', 1999, 'Petrol', 2019, 5, 'city 2.webp', 'cuty 4.webp', 'city 3.webp', 'city 1.webp', '2024-03-03 09:54:06', NULL),
(13, 'Hyundai i20', 'TN 04 GH 3456', 'The Hyundai i20 is a premium hatchback that combines modern design with advanced features. It\'s perfect for urban driving, offering excellent fuel economy and agile handling.', 899, 'Petrol', 2021, 5, 'i20 1.jpg', 'i20 3.jpg', 'i20 4.jpg', 'i20 2.jpg', '2024-03-03 09:57:28', NULL),
(14, 'Tata Nexon', 'GJ 05 IJ 6789', '\'The Tata Nexon is a compact SUV that offers a rugged yet stylish design along with impressive performance and safety features. It\'s perfect for tackling rough Indian roads while providing a comfortable ride for passengers.', 1199, 'Petrol', 2019, 5, 'nexon 1.webp', 'nexon 2.webp', 'nexon 3.webp', 'nexon 4.webp', '2024-03-03 10:01:31', NULL),
(15, 'Toyota Innova Crysta', 'KA 06 KL 1234', 'The Toyota Innova Crysta is a versatile MPV known for its spacious cabin, powerful engine, and robust build quality. It\'s the perfect choice for family outings and long road trips.', 1499, 'Diesel', 2017, 7, 'crysta 1.webp', 'crysta 2.webp', 'crysta 4.webp', 'crysta 3.webp', '2024-03-03 10:06:31', NULL),
(16, 'Mahindra Scorpio', 'BR 08 OP 9102', 'The Mahindra Scorpio is a rugged SUV known for its off-road capabilities and muscular design. It\'s the perfect vehicle for adventure enthusiasts who love to explore the great outdoors.', 1399, 'Diesel', 2018, 7, 'scorpio 1.webp', 'scorpio 3.webp', 'scorpio 2.webp', 'scorpio 4.webp', '2024-03-03 10:09:43', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
