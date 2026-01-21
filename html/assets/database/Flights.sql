-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 21, 2026 at 07:47 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Flights`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account_Data`
--

CREATE TABLE `Account_Data` (
  `UserId` int NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CreationDate` date NOT NULL,
  `Language` varchar(2) NOT NULL DEFAULT 'EN',
  `Person_Id` int NOT NULL DEFAULT '-1',
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Account_Data`
--

INSERT INTO `Account_Data` (`UserId`, `Username`, `Password`, `CreationDate`, `Language`, `Person_Id`, `IsAdmin`) VALUES
(16, 'Max', '$2y$12$IoQrIWYcG.FsXrOvSsMUUu1cqQE473jQdXDRXJAGhOowNmsgQTYs2', '2026-01-15', 'EN', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Available_Flights`
--

CREATE TABLE `Available_Flights` (
  `Flight_Id` int NOT NULL,
  `Flight_Cost` int NOT NULL,
  `Flight_Duration` int NOT NULL COMMENT 'In hours',
  `From_Country_Id` int NOT NULL,
  `To_Country_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Available_Flights`
--

INSERT INTO `Available_Flights` (`Flight_Id`, `Flight_Cost`, `Flight_Duration`, `From_Country_Id`, `To_Country_Id`) VALUES
(0, 70, 10, 0, 0),
(1, 55, 2, 7, 7),
(2, 140, 3, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `Bank_Information`
--

CREATE TABLE `Bank_Information` (
  `Bank Account Number` int NOT NULL,
  `Bank Card Number` int NOT NULL,
  `Validation Date` date NOT NULL,
  `CVV` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Booked_Flights`
--

CREATE TABLE `Booked_Flights` (
  `id` int NOT NULL,
  `Flight_Id` int NOT NULL,
  `Flight_Duration` int NOT NULL COMMENT 'In hours',
  `From_Country_Id` int NOT NULL,
  `To_Country_Id` int NOT NULL,
  `UserId` int NOT NULL,
  `Takeoff_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE `Country` (
  `Country_Id` int NOT NULL,
  `Country_Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`Country_Id`, `Country_Name`) VALUES
(0, 'Netherlands'),
(1, 'United States'),
(2, 'Vietnam'),
(3, 'Greece'),
(4, 'Japan'),
(5, 'Switzerland'),
(6, 'Australia'),
(7, 'France'),
(8, 'Germany'),
(9, 'Italy'),
(10, 'Afghanistan'),
(11, 'Albania'),
(12, 'Algeria'),
(13, 'Andorra'),
(14, 'Angola'),
(15, 'Antigua and Barbuda'),
(16, 'Argentina'),
(17, 'Armenia'),
(18, 'Austria'),
(19, 'Azerbaijan'),
(20, 'Bahamas, The'),
(21, 'Bahrain'),
(22, 'Bangladesh'),
(23, 'Barbados'),
(24, 'Belarus'),
(25, 'Belgium'),
(26, 'Belize'),
(27, 'Benin'),
(28, 'Bhutan'),
(29, 'Bolivia'),
(30, 'Bosnia and Herzegovina'),
(31, 'Botswana'),
(32, 'Brazil'),
(33, 'Brunei'),
(34, 'Canada'),
(35, 'China'),
(36, 'Denmark'),
(37, 'Egypt'),
(38, 'Samoa'),
(39, 'Morocco');

-- --------------------------------------------------------

--
-- Table structure for table `Personal_Data`
--

CREATE TABLE `Personal_Data` (
  `Person_Id` int NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Surname` varchar(45) NOT NULL,
  `Email_Adress` varchar(45) NOT NULL,
  `Home_Adress` varchar(45) NOT NULL,
  `Country_Id` int DEFAULT NULL,
  `User_Id` int NOT NULL,
  `Bank_Account_Number` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `Review_Id` int NOT NULL,
  `Rating` tinyint NOT NULL,
  `User Id` int NOT NULL,
  `Message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account_Data`
--
ALTER TABLE `Account_Data`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `Person_Id` (`Person_Id`) USING BTREE;

--
-- Indexes for table `Available_Flights`
--
ALTER TABLE `Available_Flights`
  ADD PRIMARY KEY (`Flight_Id`),
  ADD KEY `From_Country_Id` (`From_Country_Id`) USING BTREE,
  ADD KEY `From_Country_Id_2` (`From_Country_Id`) USING BTREE,
  ADD KEY `To_Country_Id` (`To_Country_Id`) USING BTREE;

--
-- Indexes for table `Bank_Information`
--
ALTER TABLE `Bank_Information`
  ADD PRIMARY KEY (`Bank Account Number`);

--
-- Indexes for table `Booked_Flights`
--
ALTER TABLE `Booked_Flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Country_Id` (`From_Country_Id`,`To_Country_Id`),
  ADD KEY `To_Country_Id` (`To_Country_Id`),
  ADD KEY `User_Id` (`UserId`),
  ADD KEY `Flight_Id` (`Flight_Id`);

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`Country_Id`),
  ADD KEY `Country_Id` (`Country_Id`) USING BTREE,
  ADD KEY `Country_Id_2` (`Country_Id`) USING BTREE;

--
-- Indexes for table `Personal_Data`
--
ALTER TABLE `Personal_Data`
  ADD PRIMARY KEY (`Person_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Bank_Account_Number` (`Bank_Account_Number`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`Review_Id`),
  ADD KEY `User_Id` (`User Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account_Data`
--
ALTER TABLE `Account_Data`
  MODIFY `UserId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Booked_Flights`
--
ALTER TABLE `Booked_Flights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Country`
--
ALTER TABLE `Country`
  MODIFY `Country_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `Personal_Data`
--
ALTER TABLE `Personal_Data`
  MODIFY `Person_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `Review_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Available_Flights`
--
ALTER TABLE `Available_Flights`
  ADD CONSTRAINT `Available_Flights_ibfk_1` FOREIGN KEY (`From_Country_Id`) REFERENCES `Country` (`Country_Id`),
  ADD CONSTRAINT `Available_Flights_ibfk_2` FOREIGN KEY (`To_Country_Id`) REFERENCES `Country` (`Country_Id`);

--
-- Constraints for table `Booked_Flights`
--
ALTER TABLE `Booked_Flights`
  ADD CONSTRAINT `Booked_Flights_ibfk_1` FOREIGN KEY (`To_Country_Id`) REFERENCES `Country` (`Country_Id`),
  ADD CONSTRAINT `Booked_Flights_ibfk_2` FOREIGN KEY (`From_Country_Id`) REFERENCES `Country` (`Country_Id`),
  ADD CONSTRAINT `Booked_Flights_ibfk_3` FOREIGN KEY (`UserId`) REFERENCES `Account_Data` (`UserId`),
  ADD CONSTRAINT `Booked_Flights_ibfk_4` FOREIGN KEY (`Flight_Id`) REFERENCES `Available_Flights` (`Flight_Id`);

--
-- Constraints for table `Personal_Data`
--
ALTER TABLE `Personal_Data`
  ADD CONSTRAINT `Personal_Data_ibfk_2` FOREIGN KEY (`Bank_Account_Number`) REFERENCES `Bank_Information` (`Bank Account Number`),
  ADD CONSTRAINT `Personal_Data_ibfk_3` FOREIGN KEY (`Person_Id`) REFERENCES `Account_Data` (`UserId`);

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`User Id`) REFERENCES `Account_Data` (`UserId`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`%` EVENT `RESET_FLIGHTS` ON SCHEDULE EVERY 1 DAY STARTS '2026-01-21 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO TRUNCATE TABLE Available_Flights$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
