-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 03:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `Account_ID` int(11) NOT NULL,
  `Account_Username` varchar(50) NOT NULL,
  `Account_Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`Account_ID`, `Account_Username`, `Account_Password`) VALUES
(1, 'manager', '12345'),
(2, 'clerk1', 'asdfg'),
(3, 'clerk2', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_Id` int(11) NOT NULL,
  `customer_Lastname` varchar(24) NOT NULL,
  `customer_Firstname` varchar(24) NOT NULL,
  `customer_Mi` varchar(24) NOT NULL,
  `customer_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_Id`, `customer_Lastname`, `customer_Firstname`, `customer_Mi`, `customer_Number`) VALUES
(1, 'Custo', 'Robert', 'Jr.', 2147483647),
(2, 'Lorry', 'Wendy', 'K.', 2147483647),
(3, 'Angelie', 'Lucy', 'D.', 2147483647),
(4, 'Jodie', 'Thomas', 'W.', 2147483647),
(5, 'Kori', 'Rommel', 'J.', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_Id` int(11) NOT NULL,
  `employee_Username` varchar(24) NOT NULL,
  `employee_Firstname` varchar(50) NOT NULL,
  `employee_MI` varchar(24) NOT NULL,
  `employee_Lastname` varchar(50) NOT NULL,
  `employee_Type` enum('Manager','Clerk','Cashier') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_Id`, `employee_Username`, `employee_Firstname`, `employee_MI`, `employee_Lastname`, `employee_Type`) VALUES
(1, 'Manager', 'Jon', 'M.', 'Melidrome', 'Manager'),
(2, 'Clerk1', 'Eli', 'K.', 'Methodos', 'Clerk'),
(3, 'Clerk2', 'Bertha', 'A.', 'Endu', 'Clerk'),
(4, 'Cashier', 'Relo', 'H.', 'Gan', 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_Id` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `manager_Id` int(11) NOT NULL,
  `shelf_Id` int(11) NOT NULL,
  `warehouse_Id` int(11) NOT NULL,
  `supplier_Id` int(11) NOT NULL,
  `product_Price` double NOT NULL,
  `date_Delivered` date NOT NULL,
  `quantity_Delivered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_Id`, `product_Id`, `manager_Id`, `shelf_Id`, `warehouse_Id`, `supplier_Id`, `product_Price`, `date_Delivered`, `quantity_Delivered`) VALUES
(1, 1, 1, 1, 1, 1, 350, '2014-01-14', 1000),
(2, 2, 1, 1, 1, 2, 20, '2014-08-13', 1000),
(3, 8, 1, 3, 2, 3, 10, '2014-09-01', 1000),
(4, 3, 1, 2, 3, 3, 30, '2014-11-12', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `lineitem`
--

CREATE TABLE `lineitem` (
  `transaction_Id` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lineitem`
--

INSERT INTO `lineitem` (`transaction_Id`, `product_Id`, `quantity`) VALUES
(1, 2, 13),
(2, 8, 20),
(3, 1, 2),
(4, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_Id` int(11) NOT NULL,
  `product_warranty` varchar(50) NOT NULL,
  `retail_Price` double NOT NULL,
  `product_Name` varchar(100) NOT NULL,
  `product_Brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_Id`, `product_warranty`, `retail_Price`, `product_Name`, `product_Brand`) VALUES
(1, '1 year', 499, 'Extension Outlet', 'Firefly'),
(2, '7 days', 185, 'Claw Hammer', 'Masaki'),
(3, '7 days', 35, 'Baby Roller 4\'', ''),
(4, '', 18, 'Hacksaw Blade', 'Lenox'),
(5, '', 11, 'Paint Brush 2\'', 'Mayon'),
(6, '', 100, 'Muriatic Acid', 'Apollo'),
(7, '', 40, 'Screwdriver', ''),
(8, '', 123, 'Screwdriver', 'Creston');

-- --------------------------------------------------------

--
-- Table structure for table `quantity`
--

CREATE TABLE `quantity` (
  `warehouse_Id` int(11) NOT NULL,
  `inventory_Id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quantity`
--

INSERT INTO `quantity` (`warehouse_Id`, `inventory_Id`, `quantity`) VALUES
(1, 1, 1000),
(1, 2, 1000),
(2, 3, 1000),
(2, 4, 1000),
(3, 5, 1000),
(3, 6, 1000),
(1, 6, 1000),
(1, 7, 1000),
(2, 8, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

CREATE TABLE `shelf` (
  `shelf_Id` int(11) NOT NULL,
  `warehouse_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelf_Id`, `warehouse_Id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 4),
(14, 4),
(15, 4),
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_Id` int(11) NOT NULL,
  `supplier_Name` varchar(50) NOT NULL,
  `supplier_Goods` int(11) NOT NULL,
  `supplier_Number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_Id`, `supplier_Name`, `supplier_Goods`, `supplier_Number`) VALUES
(1, 'Carl', 4000, 2331234),
(2, 'Monte', 1000, 1213332),
(3, 'Loden', 250, 4421135);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_Id` int(11) NOT NULL,
  `DOP` date NOT NULL,
  `total_Price` double NOT NULL,
  `cashier_Id` int(11) NOT NULL,
  `clerk_Id` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_Id`, `DOP`, `total_Price`, `cashier_Id`, `clerk_Id`, `customer_Id`) VALUES
(1, '2014-09-11', 699, 4, 2, 1),
(2, '2014-10-22', 1000, 4, 3, 2),
(3, '2015-01-30', 18, 4, 2, 3),
(4, '2016-02-20', 35, 4, 3, 4),
(5, '2017-02-11', 3000, 4, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `warehouse_Id` int(11) NOT NULL,
  `location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`warehouse_Id`, `location`) VALUES
(1, 'Store'),
(2, 'WH1'),
(3, 'WH2'),
(4, 'WH1 outside floor'),
(5, 'WH2 outside floor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`Account_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_Id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_Id`),
  ADD KEY `manager_Id` (`manager_Id`),
  ADD KEY `product_Id` (`product_Id`),
  ADD KEY `shelf_Id` (`shelf_Id`),
  ADD KEY `warehouse_Id` (`warehouse_Id`),
  ADD KEY `supplier_Id` (`supplier_Id`);

--
-- Indexes for table `lineitem`
--
ALTER TABLE `lineitem`
  ADD KEY `transaction_Id` (`transaction_Id`),
  ADD KEY `product_Id` (`product_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_Id`);

--
-- Indexes for table `quantity`
--
ALTER TABLE `quantity`
  ADD KEY `warehouse_Id` (`warehouse_Id`),
  ADD KEY `inventory_Id` (`inventory_Id`);

--
-- Indexes for table `shelf`
--
ALTER TABLE `shelf`
  ADD PRIMARY KEY (`shelf_Id`),
  ADD KEY `warehouse_Id` (`warehouse_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_Id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_Id`),
  ADD KEY `cashier_Id` (`cashier_Id`),
  ADD KEY `clerk_Id` (`clerk_Id`),
  ADD KEY `customer_Id` (`customer_Id`),
  ADD KEY `cashier_Id_2` (`cashier_Id`,`clerk_Id`,`customer_Id`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`warehouse_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `Account_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `shelf`
--
ALTER TABLE `shelf`
  MODIFY `shelf_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `warehouse_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`customer_Id`) REFERENCES `customer` (`customer_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
