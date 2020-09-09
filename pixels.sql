-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2020 at 12:57 PM
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
-- Database: `pixels`
--

-- --------------------------------------------------------

--
-- Table structure for table `additions`
--

CREATE TABLE `additions` (
  `id` int(4) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ItemId` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `FName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `AdminKey` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FName`, `LName`, `AdminKey`, `Email`, `Phone`, `Photo`) VALUES
(1, 'abc', 'abc', 'dasx', 'asd@asd.com', '5196818', 'sdafdgfdsbfdgbgdfgfadsad'),
(27, 'abc', 'abc', 'dasax', 'asd@asad.com', '5196818', 'sdafdgfdsbfdgbgdfgfadsad');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(4) NOT NULL,
  `Brand` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SubBrand` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PlateNumber` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `LicencePhoto1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `LicencePhoto2` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(4) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `shop` int(5) NOT NULL,
  `Photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(15) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ItemId` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `FName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CustomerCar` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CustomerCarColor` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `FName`, `LName`, `PhoneNumber`, `Address`, `DOB`, `Gender`, `Email`, `Photo`, `CustomerCar`, `CustomerCarColor`) VALUES
(72, 'asdsad', 'fsadsad', '2085298', 'asdgds', '2002-02-01', 'M', 'adfasdas@sfd.com', 'asddasdsadsadsadasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(4) NOT NULL,
  `FName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhoneNumber` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(35) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LicencePhoto1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LicencePhoto2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IdPhoto1` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `IdPhoto2` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NonCriminalRecord` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CarAssigned` int(4) DEFAULT NULL,
  `AvgDeliveryTime` int(4) DEFAULT NULL
) ;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `FName`, `LName`, `PhoneNumber`, `Email`, `Address`, `DOB`, `Gender`, `LicencePhoto1`, `LicencePhoto2`, `IdPhoto1`, `IdPhoto2`, `NonCriminalRecord`, `CarAssigned`, `AvgDeliveryTime`) VALUES
(52, 'asfda', 'asfdghfth', '65198498+', 'sadfd@dfdsg.com', 'asdfgsdfsadssad', '2008-10-01', 'M', 'adsafsafsaffsafasfsa', 'fsafsafasdsadsadsad', 'asfsafasdfad', 'fasdfsadsadsa', 'sadsadsadasdsa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `CustomerId` int(10) NOT NULL,
  `ItemId` int(8) NOT NULL,
  `category` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `ItemId` int(8) DEFAULT NULL,
  `Comments` text COLLATE utf8_unicode_ci NOT NULL,
  `Rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(8) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Category` int(4) DEFAULT NULL,
  `ItemPhoto` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Price` float NOT NULL,
  `Rating` float DEFAULT NULL,
  `TimesSold` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginandregister`
--

CREATE TABLE `loginandregister` (
  `id` int(15) NOT NULL,
  `AdminId` int(2) DEFAULT NULL,
  `DriverId` int(4) DEFAULT NULL,
  `CustomerId` int(10) DEFAULT NULL,
  `UserName` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `UserType` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ;

--
-- Dumping data for table `loginandregister`
--

INSERT INTO `loginandregister` (`id`, `AdminId`, `DriverId`, `CustomerId`, `UserName`, `PassWord`, `UserType`) VALUES
(1, 27, NULL, NULL, '1', '1', 'ADMIN'),
(2, NULL, 52, NULL, 'mahranisop', 'dsadsa', 'DRIVER'),
(3, NULL, NULL, 72, 'asd', 'assssx', 'CUSTOMER');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `Driver` int(4) DEFAULT NULL,
  `Customer` int(10) DEFAULT NULL,
  `shop` int(5) DEFAULT NULL,
  `Items` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `WhereOrder` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `OrderTime` datetime NOT NULL,
  `OrderReceiveTime` datetime NOT NULL,
  `OrderTotalTime` float NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(5) NOT NULL,
  `ShopName` varchar(30) NOT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `MonthlyPayment` float NOT NULL,
  `Size` int(1) NOT NULL
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additions`
--
ALTER TABLE `additions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `AdminKey` (`AdminKey`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PlateNumber` (`PlateNumber`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop` (`shop`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `CarAssigned` (`CarAssigned`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`CustomerId`,`ItemId`),
  ADD KEY `category` (`category`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_ibfk_1` (`Category`);

--
-- Indexes for table `loginandregister`
--
ALTER TABLE `loginandregister`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `UserName_2` (`UserName`),
  ADD KEY `loginandregister_ibfk_1` (`CustomerId`),
  ADD KEY `loginandregister_ibfk_2` (`AdminId`),
  ADD KEY `loginandregister_ibfk_3` (`DriverId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Customer` (`Customer`),
  ADD KEY `Driver` (`Driver`),
  ADD KEY `orders_ibfk_3` (`shop`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additions`
--
ALTER TABLE `additions`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loginandregister`
--
ALTER TABLE `loginandregister`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additions`
--
ALTER TABLE `additions`
  ADD CONSTRAINT `additions_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`shop`) REFERENCES `shop` (`id`);

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_ibfk_1` FOREIGN KEY (`CarAssigned`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`category`) REFERENCES `items` (`Category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`CustomerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_3` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `items` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loginandregister`
--
ALTER TABLE `loginandregister`
  ADD CONSTRAINT `loginandregister_ibfk_1` FOREIGN KEY (`CustomerId`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loginandregister_ibfk_2` FOREIGN KEY (`AdminId`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loginandregister_ibfk_3` FOREIGN KEY (`DriverId`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Driver`) REFERENCES `drivers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`shop`) REFERENCES `shop` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
