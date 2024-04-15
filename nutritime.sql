-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 11:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutritime`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_mail` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_mail`, `admin_pass`) VALUES
(1001, 'Kiran', 'nutriadmin@gmail.com', 'nutriadmin@');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Weight Management'),
(2, 'Sport Nutrition'),
(3, 'Energy'),
(4, 'Ayurvedic Nutrition'),
(5, 'Targeted Nutrition');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phno` varchar(20) NOT NULL,
  `customer_whatsapp` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_blood` varchar(10) NOT NULL,
  `customer_gender` enum('Male','Female','Other') NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_program` varchar(100) NOT NULL,
  `customer_payment` varchar(100) NOT NULL,
  `customer_type` enum('Online','Offilne') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phno`, `customer_whatsapp`, `customer_email`, `customer_password`, `customer_blood`, `customer_gender`, `customer_address`, `customer_city`, `customer_program`, `customer_payment`, `customer_type`) VALUES
(1003, 'Manu', '7854985687', '2147483647', 'manu123@gmail.com', 'manu123@', '', 'Male', 'thalaserry kannur', 'kannur', '', '', 'Online'),
(1005, 'Amal', '9865329865', '9865329865', 'amal123@gmail.com', 'amal123@', 'AB+', 'Male', 'kaloor po south road', 'Ernakulam', '', '', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_dis` varchar(100) NOT NULL,
  `gallery_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `admin_username` varchar(50) NOT NULL,
  `login_details_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`admin_username`, `login_details_id`, `login_time`) VALUES
('nutriadmin@gmail.com', 1, '2024-04-02 12:57:31'),
('nutriadmin@gmail.com', 2, '2024-04-02 13:19:46'),
('nutriadmin@gmail.com', 3, '2024-04-03 07:50:39'),
('nutriadmin@gmail.com', 4, '2024-04-03 08:17:20'),
('nutriadmin@gmail.com', 5, '2024-04-04 05:54:29'),
('nutriadmin@gmail.com', 6, '2024-04-04 05:59:11'),
('nutriadmin@gmail.com', 7, '2024-04-05 06:36:58'),
('nutriadmin@gmail.com', 8, '2024-04-06 08:45:45'),
('nutriadmin@gmail.com', 9, '2024-04-11 06:47:13'),
('nutriadmin@gmail.com', 10, '2024-04-12 06:55:39'),
('nutriadmin@gmail.com', 11, '2024-04-12 10:05:12'),
('nutriadmin@gmail.com', 12, '2024-04-14 22:33:16'),
('nutriadmin@gmail.com', 13, '2024-04-15 00:05:17'),
('nutriadmin@gmail.com', 14, '2024-04-15 00:06:05'),
('nutriadmin@gmail.com', 15, '2024-04-15 06:53:33'),
('nutriadmin@gmail.com', 16, '2024-04-15 06:55:03'),
('nutriadmin@gmail.com', 17, '2024-04-15 08:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `pri_id` int(11) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_code` varchar(20) NOT NULL,
  `pro_category` varchar(50) NOT NULL,
  `pro_subcat` varchar(50) NOT NULL,
  `pro_mrp` varchar(10) NOT NULL,
  `pro_price` varchar(20) NOT NULL,
  `pro_dis15` varchar(10) NOT NULL,
  `pro_dis25` varchar(10) NOT NULL,
  `pro_dis35` varchar(10) NOT NULL,
  `pro_dis42` varchar(10) NOT NULL,
  `pro_dis50` varchar(10) NOT NULL,
  `pro_scoop` varchar(10) NOT NULL,
  `pro_scoop15` varchar(10) NOT NULL,
  `pro_scoop25` varchar(10) NOT NULL,
  `pro_scoop35` varchar(10) NOT NULL,
  `pro_scoop42` varchar(10) NOT NULL,
  `pro_scoop50` varchar(10) NOT NULL,
  `pro_quantity` varchar(10) NOT NULL,
  `pro_curquantity` varchar(10) NOT NULL,
  `pro_desc` varchar(200) NOT NULL,
  `pro_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`pri_id`, `pro_name`, `pro_code`, `pro_category`, `pro_subcat`, `pro_mrp`, `pro_price`, `pro_dis15`, `pro_dis25`, `pro_dis35`, `pro_dis42`, `pro_dis50`, `pro_scoop`, `pro_scoop15`, `pro_scoop25`, `pro_scoop35`, `pro_scoop42`, `pro_scoop50`, `pro_quantity`, `pro_curquantity`, `pro_desc`, `pro_img`) VALUES
(1, 'Formula 1', '1001', 'Targeted Nutrition', 'Brain Health', '2378', '2200', '2065', '1860', '1650', '1505', '1340', '20', '103.25', '93', '82.50', '75.25', '68', '', '', '', ''),
(2, 'Fiber Complex', '1002', 'Targeted Nutrition', 'Energy', '2792', '2600', '2425', '2180', '1940', '1765', '1570', '30', '80', '72', '64', '58', '52', '15', '', 'kooooooooooooooooooooooooooooooooooooooooooooooooo', ''),
(3, 'Protein', '1003', 'Targeted Nutrition', 'Energy', '1413', '1200', '1230', '1105', '980', '895', '795', '30', '41', '36.83', '32.67', '29.83', '26.50', '10', '', 'pokpokpokopopopkkkokopkookok', ''),
(4, 'Shakemate', '1004', 'Targeted Nutrition', 'Energy', '712', '700', '660', '625', '590', '565', '535', '18', '36.67', '34.72', '32.78', '31.39', '29.72', '', '', '', ''),
(5, 'Afresh', '1005', 'Targeted Nutrition', 'Energy', '885', '800', '770', '690', '615', '560', '500', '25', '30.80', '27.60', '24.60', '22.40', '20', '', '', '', ''),
(6, 'Dino ', '1006', 'Ayurdevic Nutrition', 'Energy', '150', '100', '90', '80', '70', '60', '50', '30', '10', '20', '30', '40', '50', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `program_img` varchar(50) NOT NULL,
  `program_duration` varchar(50) NOT NULL,
  `program_fee` int(20) NOT NULL,
  `program_condition` varchar(50) NOT NULL,
  `program_mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `sales_proid` int(10) NOT NULL,
  `sales_procode` varchar(20) NOT NULL,
  `sales_proname` varchar(100) NOT NULL,
  `sales_procat` varchar(50) NOT NULL,
  `sales_prosubcat` varchar(50) NOT NULL,
  `sales_mrp` varchar(10) NOT NULL,
  `sales_quan` varchar(10) NOT NULL,
  `sales_vp` varchar(20) NOT NULL,
  `sales_gst` varchar(10) NOT NULL,
  `sales_dis` varchar(10) NOT NULL,
  `sales_dispri` varchar(11) NOT NULL,
  `sales_cus` varchar(100) NOT NULL,
  `sales_address` varchar(100) NOT NULL,
  `sales_total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shake`
--

CREATE TABLE `shake` (
  `shake_id` int(11) NOT NULL,
  `shake_name` varchar(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `shake_goal` varchar(100) NOT NULL,
  `shake_recipes` varchar(200) NOT NULL,
  `shake_mrp` varchar(100) NOT NULL,
  `shake_scoops` varchar(100) NOT NULL,
  `shake_extra` varchar(25) NOT NULL,
  `shake_extraprice` varchar(10) NOT NULL,
  `shake_discount` varchar(50) NOT NULL,
  `shake_expence` varchar(25) NOT NULL,
  `shake_total` varchar(50) NOT NULL,
  `shake_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shake`
--

INSERT INTO `shake` (`shake_id`, `shake_name`, `customer_id`, `customer_name`, `shake_goal`, `shake_recipes`, `shake_mrp`, `shake_scoops`, `shake_extra`, `shake_extraprice`, `shake_discount`, `shake_expence`, `shake_total`, `shake_image`) VALUES
(13, 'Club Shake', 0, 'Manu Alex', 'weight losser', 'Formula 1,Protein', '0', '', 'milk', '25', '25', '40', '100', 'Screenshot 2024-04-02 095348.png'),
(15, 'Club Shake222', 0, 'Manu', 'Weight gainer222', 'Formula 1,Protein,Afresh,Dino ', '', '', 'Milk', '50', '25', '40', '100', 'main page.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `staff_uname` varchar(100) NOT NULL,
  `staff_email` varchar(100) NOT NULL,
  `staff_pass` varchar(50) NOT NULL,
  `staff_gender` varchar(50) NOT NULL,
  `staff_city` varchar(50) NOT NULL,
  `staff_phno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_place` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_name` int(100) NOT NULL,
  `stock_quantity` int(10) NOT NULL,
  `stock_comname` varchar(100) NOT NULL,
  `stock_price` int(50) NOT NULL,
  `stock_gst` int(50) NOT NULL,
  `stock_total` int(50) NOT NULL,
  `stock_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcategory_id`, `category_id`, `subcategory_name`) VALUES
(1, 1, 'none'),
(2, 2, 'none'),
(3, 3, 'none'),
(4, 4, 'Brain Health'),
(5, 4, 'Immune Health'),
(6, 5, 'Digestive Health'),
(7, 5, 'Cardiovascular Health'),
(8, 5, 'Children Health'),
(9, 5, 'Skin Health'),
(10, 5, 'Bone & Joint Health'),
(11, 5, 'Women\'s Health'),
(12, 5, 'Men\'s Health');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`pri_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `shake`
--
ALTER TABLE `shake`
  ADD PRIMARY KEY (`shake_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shake`
--
ALTER TABLE `shake`
  MODIFY `shake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
