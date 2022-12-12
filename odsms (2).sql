-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 08:51 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odsms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_amt` (IN `ID` INT, OUT `AMT` DECIMAL(10,2))  NO SQL
BEGIN
UPDATE SALES SET S_DATE=SYSDATE(),S_TIME=CURRENT_TIMESTAMP(),TOTAL_AMT=(SELECT SUM(TOT_PRICE) FROM SALES_ITEMS WHERE SALES_ITEMS.SALE_ID=ID) WHERE SALES.SALE_ID=ID;
SELECT TOTAL_AMT INTO AMT FROM SALES WHERE SALE_ID=ID;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `return_amount` (`start` DATE, `end` DATE) RETURNS DECIMAL(10,2) BEGIN
DECLARE returnamount DECIMAL(8,2) DEFAULT 0.0;
SELECT SUM(tr_amount) INTO returnamount FROM returns WHERE R_DATE >= start AND R_DATE<= end;
RETURN returnamount;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `s_amt` (`start` DATE, `end` DATE) RETURNS DECIMAL(10,2) BEGIN
DECLARE SAMT DECIMAL(8,2) DEFAULT 0.0;
SELECT SUM(TOTAL_AMT) INTO SAMT FROM SALES WHERE S_DATE >= start AND S_DATE<= end;
RETURN SAMT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'shabib_aftab', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `med_id` int(50) NOT NULL,
  `med_name` varchar(50) NOT NULL,
  `med_price` varchar(50) NOT NULL,
  `med_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`med_id`, `med_name`, `med_price`, `med_quantity`) VALUES
(3, 'abacol 1000mg', '1', 0),
(12, 'kufcol', '150', 800),
(101, 'Pandaol Extra 100MG', '2', 700),
(1010, 'please add hoja', '10.10', 60),
(1111, 'paracetamol', '10', 690),
(11011, 'payodine100ml', '120', 49),
(101010, 'dosprine', '3', 9800);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `r_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `med_id` int(11) NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `tr_amount` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`r_id`, `sale_id`, `med_id`, `r_date`, `r_time`, `tr_amount`) VALUES
(1, 0, 0, '0000-00-00', '00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SALE_ID` int(11) NOT NULL,
  `S_DATE` date DEFAULT NULL,
  `S_TIME` time DEFAULT NULL,
  `TOTAL_AMT` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SALE_ID`, `S_DATE`, `S_TIME`, `TOTAL_AMT`) VALUES
(1, '2021-08-07', '22:18:46', '365.90'),
(2, '2021-08-07', '22:26:27', '900.00'),
(3, '2021-08-07', '22:27:23', '150.00'),
(4, '2021-08-08', '21:10:35', '120.00'),
(5, '2021-08-08', '21:10:54', '180.00'),
(6, '2021-08-08', '21:11:37', '13686.00'),
(7, '2021-08-09', '11:42:18', '1001.00'),
(8, '0000-00-00', '00:00:00', '0.00');

--
-- Triggers `sales`
--
DELIMITER $$
CREATE TRIGGER `SALE_ID_DELETE` BEFORE DELETE ON `sales` FOR EACH ROW BEGIN
DELETE from sales_items WHERE sales_items.SALE_ID=old.SALE_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_username` varchar(25) NOT NULL,
  `s_password` varchar(25) NOT NULL,
  `s_dob` date DEFAULT NULL,
  `s_sex` varchar(50) NOT NULL,
  `s_cnic` text NOT NULL,
  `s_doj` date DEFAULT NULL,
  `s_num` int(50) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`s_id`, `s_name`, `s_username`, `s_password`, `s_dob`, `s_sex`, `s_cnic`, `s_doj`, `s_num`, `s_email`, `s_address`) VALUES
(1, '', 'awais', '12345', NULL, '', '', NULL, 0, '', ''),
(2, '', 'obaid', '12345', NULL, '', '', NULL, 0, '', ''),
(3, 'Obaid Saeed Malik', 'obaidsm', 'osm', '1997-09-10', 'Male', '12345-1234567-1', '2021-08-08', 2147483647, 'bc180200729@vu.edu.pk', 'lahore');

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `SALE_ID` int(11) NOT NULL,
  `MED_ID` decimal(6,0) NOT NULL,
  `SALE_QTY` int(11) NOT NULL,
  `TOT_PRICE` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`SALE_ID`, `MED_ID`, `SALE_QTY`, `TOT_PRICE`) VALUES
(1, '12', 1, '150.00'),
(1, '101', 5, '10.00'),
(1, '1010', 9, '90.90'),
(1, '1111', 10, '100.00'),
(1, '101010', 5, '15.00'),
(2, '1111', 90, '900.00'),
(3, '12', 1, '150.00'),
(4, '11011', 1, '120.00'),
(5, '101', 90, '180.00'),
(6, '12', 88, '13200.00'),
(6, '1010', 10, '101.00'),
(6, '1111', 10, '100.00'),
(6, '101010', 95, '285.00'),
(7, '1010', 10, '101.00'),
(7, '1111', 90, '900.00'),
(8, '1111', 10, '100.00');

--
-- Triggers `sales_items`
--
DELIMITER $$
CREATE TRIGGER `SALEDELETE` AFTER DELETE ON `sales_items` FOR EACH ROW BEGIN
UPDATE medicine SET MED_Quantity=MED_Quantity+old.SALE_QTY WHERE medicine.MED_ID=old.MED_ID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `SALEINSERT` AFTER INSERT ON `sales_items` FOR EACH ROW BEGIN
UPDATE medicine SET MED_Quantity=MED_Quantity-new.SALE_QTY WHERE medicine.MED_ID=new.MED_ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `store_manager`
--

CREATE TABLE `store_manager` (
  `sm_id` int(10) NOT NULL,
  `sm_username` varchar(25) NOT NULL,
  `sm_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_manager`
--

INSERT INTO `store_manager` (`sm_id`, `sm_username`, `sm_password`) VALUES
(1, 'store_manager', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`r_id`),
  ADD UNIQUE KEY `sale_id` (`sale_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALE_ID`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`s_username`),
  ADD UNIQUE KEY `s_id` (`s_id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`SALE_ID`,`MED_ID`),
  ADD KEY `MED_ID` (`MED_ID`);

--
-- Indexes for table `store_manager`
--
ALTER TABLE `store_manager`
  ADD PRIMARY KEY (`sm_username`),
  ADD UNIQUE KEY `sm_id` (`sm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SALE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
