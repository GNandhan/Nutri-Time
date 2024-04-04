-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 01:25 PM
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
  `customer_fname` varchar(50) NOT NULL,
  `customer_lname` varchar(50) NOT NULL,
  `customer_age` int(10) NOT NULL,
  `customer_phno` varchar(20) NOT NULL,
  `customer_whatsapp` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
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

INSERT INTO `customer` (`customer_id`, `customer_fname`, `customer_lname`, `customer_age`, `customer_phno`, `customer_whatsapp`, `customer_email`, `customer_password`, `customer_gender`, `customer_address`, `customer_city`, `customer_program`, `customer_payment`, `customer_type`) VALUES
(1003, 'Manu', 'Alex', 20, '7854985687', '2147483647', 'manu123@gmail.com', 'manu123@', 'Male', 'thalaserry kannur', 'kannur', '', '', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_dis` varchar(100) NOT NULL,
  `gallery_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_dis`, `gallery_img`) VALUES
(10, 'first image', 'main page.jpg');

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
('nutriadmin@gmail.com', 6, '2024-04-04 05:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `pro_id` int(11) NOT NULL,
  `pro_code` varchar(20) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_category` varchar(100) NOT NULL,
  `pro_subcategory` varchar(50) NOT NULL,
  `pro_brand` varchar(50) NOT NULL,
  `pro_mrp` int(10) NOT NULL,
  `pro_price` int(20) NOT NULL,
  `pro_quantity` int(20) NOT NULL,
  `pro_curquantity` int(10) NOT NULL,
  `pro_image` varchar(50) NOT NULL,
  `pro_status` enum('used','unused') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`pro_id`, `pro_code`, `pro_name`, `pro_category`, `pro_subcategory`, `pro_brand`, `pro_mrp`, `pro_price`, `pro_quantity`, `pro_curquantity`, `pro_image`, `pro_status`) VALUES
(1, '1002', 'Formula 1', 'Ayurvedic Nutrition', 'Immune Health', 'Herbalife', 20, 15, 10, 10, 'main page.jpg', 'used'),
(2, '210458', 'Muscle blazer', 'Energy', 'none', 'Herbalife', 200, 150, 10, 10, 'download.jpeg', 'used'),
(3, '210458', 'Protein Powder', 'Energy', 'none', '', 150, 100, 20, 20, 'download.jpeg', 'used');

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

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`, `program_img`, `program_duration`, `program_fee`, `program_condition`, `program_mode`) VALUES
(12, 'Fitness diet', 'main page.jpg', '20-Days', 500, 'Strict diet should be followed', 'Offline');

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
  `shake_discount` varchar(50) NOT NULL,
  `shake_expence` varchar(25) NOT NULL,
  `shake_total` varchar(50) NOT NULL,
  `shake_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shake`
--

INSERT INTO `shake` (`shake_id`, `shake_name`, `customer_id`, `customer_name`, `shake_goal`, `shake_recipes`, `shake_mrp`, `shake_scoops`, `shake_extra`, `shake_discount`, `shake_expence`, `shake_total`, `shake_image`) VALUES
(1, 'Club Shake222', 0, 'Manu Alex', 'Weight gainer222', '', '', '', 'Milk', '35', '520', '520', 'main page.jpg'),
(2, 'kids protein', 1, 'Manu Alex', 'Kids nutrition', 'Formula 1, Protein Powder', '115', '20, 25', 'milk', '25', '30', '58.75', 'main page.jpg');

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

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_place`, `product_id`, `stock_name`, `stock_quantity`, `stock_comname`, `stock_price`, `stock_gst`, `stock_total`, `stock_date`) VALUES
(1, 'Ernakulam', 0, 0, 2, 'damu limited', 20, 0, 40, '2024-04-02');

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
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shake`
--
ALTER TABLE `shake`
  MODIFY `shake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
