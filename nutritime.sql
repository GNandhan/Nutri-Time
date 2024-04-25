-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 10:32 AM
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
  `cust_id` int(11) NOT NULL,
  `cust_code` varchar(50) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_phno` varchar(20) NOT NULL,
  `cust_invited` varchar(50) NOT NULL,
  `cust_age` varchar(10) NOT NULL,
  `cust_bodyage` varchar(10) NOT NULL,
  `cust_gender` varchar(25) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_password` varchar(50) NOT NULL,
  `cust_doj` varchar(50) NOT NULL,
  `cust_city` varchar(50) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_height` varchar(10) NOT NULL,
  `cust_weight` varchar(10) NOT NULL,
  `cust_fat` varchar(10) NOT NULL,
  `cust_vcf` varchar(50) NOT NULL,
  `cust_bmr` varchar(10) NOT NULL,
  `cust_bmi` varchar(10) NOT NULL,
  `cust_mm` varchar(10) NOT NULL,
  `cust_tsf` varchar(10) NOT NULL,
  `cust_waketime` varchar(10) NOT NULL,
  `cust_tea` varchar(50) NOT NULL,
  `cust_breakfast` varchar(100) NOT NULL,
  `cust_lunch` varchar(100) NOT NULL,
  `cust_snack` varchar(100) NOT NULL,
  `cust_dinner` varchar(100) NOT NULL,
  `cust_veg_nonveg` varchar(50) NOT NULL,
  `cust_waterintake` varchar(10) NOT NULL,
  `cust_cond1` varchar(100) NOT NULL,
  `cust_cond2` varchar(100) NOT NULL,
  `cust_cond3` varchar(100) NOT NULL,
  `cust_prg` varchar(50) NOT NULL,
  `cust_prgtype` varchar(20) NOT NULL,
  `cust_noday` varchar(10) NOT NULL,
  `cust_total` varchar(20) NOT NULL,
  `cust_paid` varchar(20) NOT NULL,
  `cust_remain` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_code`, `cust_name`, `cust_phno`, `cust_invited`, `cust_age`, `cust_bodyage`, `cust_gender`, `cust_email`, `cust_password`, `cust_doj`, `cust_city`, `cust_address`, `cust_height`, `cust_weight`, `cust_fat`, `cust_vcf`, `cust_bmr`, `cust_bmi`, `cust_mm`, `cust_tsf`, `cust_waketime`, `cust_tea`, `cust_breakfast`, `cust_lunch`, `cust_snack`, `cust_dinner`, `cust_veg_nonveg`, `cust_waterintake`, `cust_cond1`, `cust_cond2`, `cust_cond3`, `cust_prg`, `cust_prgtype`, `cust_noday`, `cust_total`, `cust_paid`, `cust_remain`) VALUES
(1003, 'CUS10012', 'Kareem', '7854985687', 'Ashraf', '25', '26', 'Male', 'manu123@gmail.com', 'manu123@', '20-10-2023', 'Kozhikode', 'veluvil po mavoor, kozhikode', '175', '62', '15', '10', '11', '12', '13', '14', '09:29', 'Green Tea', 'Idly, Sambar', 'Chicken Biriyani', 'ladoo', 'Mandi', 'Non-veg', '2 litre', 'Diabeted', 'Cancer', 'High BP', 'Weight lose', 'Online', '20', '10000', '8000', '4000'),
(1005, 'CUS10013', 'Amal', '9865329865', 'Ashraf', '26', '27', 'Male', 'amal123@gmail.com', 'amal123@', '01-05-2023', 'Thalayolaparambu', '3rd floor, Thalayolaparambu, po', '165', '63', '32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1006, '1001', 'Albin', '9865875498', 'Ashraf', '25', '26', 'Male', 'albin12@gmail.com', 'albin12@', '11-03-2023', 'Vallaserry', '3rd floor, vallaserry, po', '152', '72', '26', '001', '002', '003', '004', '005', '16:51', 'Black Coffee', 'Noodles', 'Mandi', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', 'Fat Reducer', 'Offline', '25', '16000', '7000', '9000'),
(1007, 'CUS10016', 'Amal', '986585498', 'Ashraf', '45', '46', 'Male', 'amal123@gmail.com', 'amal123@', '07-04-2023', 'Kochi', '3rd floor, kochi, po', '182', '90', '72', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(1008, 'CUS10026', 'Melow', '9887659854', 'Amal', '25', '26', 'Female', 'melow12@gmail.com', '', '15-04-2023', 'Kochi', '3rd floor, kochi, po', '154', '78', '24', '001', '002', '003', '004', '14', '00:57', 'okkokook', 'Noodles', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', 'Weight lose', 'Offline', '20', '12000', '8000', '11000'),
(1009, 'CUS10026', 'Mathew', '9887659854', 'Amal', '25', '26', 'Female', 'melow12@gmail.com', '', '15-04-2023', 'Kochi', '3rd floor, kochi, po', '154', '78', '24', '001', '002', '003', '004', '14', '00:57', 'okkokook', 'Noodles', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', 'Weight lose', 'Offline', '20', '12000', '8000', '11000'),
(1010, 'CUS10027', 'Abdul', '9887659854', 'Amal', '38', '39', 'Male', 'abdul12@gmail.com', '', '20-06-2024', 'Kochi', '3rd floor, kochi, po', '163', '96', '24', '001', '002', '003', '004', '005', '11:09', 'Black Coffee', 'Idly, Sambar', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '2 litre', 'Diabeted', 'Cancer', 'High BP', 'Weight lose', 'Offline', '20', '12000', '8000', '4000');

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
('nutriadmin@gmail.com', 1, '2024-04-25 06:00:05'),
('nutriadmin@gmail.com', 2, '2024-04-25 08:42:33');

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
  `pro_vp` varchar(100) NOT NULL,
  `pro_vptotal` varchar(10) NOT NULL,
  `pro_scoop` varchar(10) NOT NULL,
  `pro_scoop15` varchar(10) NOT NULL,
  `pro_scoop25` varchar(10) NOT NULL,
  `pro_scoop35` varchar(10) NOT NULL,
  `pro_scoop42` varchar(10) NOT NULL,
  `pro_scoop50` varchar(10) NOT NULL,
  `pro_quantity` varchar(10) NOT NULL,
  `pro_curquantity` varchar(10) NOT NULL,
  `pro_hsn` varchar(200) NOT NULL,
  `pro_img` varchar(100) NOT NULL,
  `pro_associate` varchar(100) NOT NULL,
  `pro_association` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`pri_id`, `pro_name`, `pro_code`, `pro_category`, `pro_subcat`, `pro_mrp`, `pro_price`, `pro_dis15`, `pro_dis25`, `pro_dis35`, `pro_dis42`, `pro_dis50`, `pro_vp`, `pro_vptotal`, `pro_scoop`, `pro_scoop15`, `pro_scoop25`, `pro_scoop35`, `pro_scoop42`, `pro_scoop50`, `pro_quantity`, `pro_curquantity`, `pro_hsn`, `pro_img`, `pro_associate`, `pro_association`) VALUES
(1, 'Formula 1', '1001', 'Targeted Nutrition', 'Brain Health', '2378', '2200', '2065', '1860', '1650', '1505', '1340', '12.75', '127.5', '20', '103.25', '93', '82.50', '75.25', '68', '120', '10', '986587548', '', 'Ashraf', ''),
(2, 'Fiber Complex', '1002', 'Targeted Nutrition', 'Energy', '2792', '2600', '2425', '2180', '1940', '1765', '1570', '22.45', '224.5', '30', '80', '72', '64', '58', '52', '20', '15', '98658754', '', 'Ashraf', ''),
(3, 'Protein', '1003', 'Targeted Nutrition', 'Energy', '1413', '1200', '1230', '1105', '980', '895', '795', '12.75', '144', '30', '41', '36.83', '32.67', '29.83', '26.50', '12', '-2', '221144', '', 'Ashraf', 'Nutritime'),
(4, 'Shakemate', '1004', 'Targeted Nutrition', 'Energy', '712', '700', '660', '625', '590', '565', '535', '15.95', '300', '18', '36.67', '34.72', '32.78', '31.39', '29.72', '20', '20', '562345', '', '', ''),
(5, 'Afresh', '1005', 'Targeted Nutrition', 'Energy', '885', '800', '770', '690', '615', '560', '500', '22.45', '763.3', '25', '30.80', '27.60', '24.60', '22.40', '20', '64', '48', '9865875498', '', '', ''),
(6, 'Dino ', '1006', 'Ayurdevic Nutrition', 'Energy', '150', '100', '90', '80', '70', '60', '50', '23.70', '474', '30', '10', '20', '30', '40', '50', '30', '30', '986598', '', 'Amal', ''),
(11, 'Weigh-protein', '1007', 'Targeted Nutrition', 'Protein', '1540', '1500', '225', '375', '525', '630', '750', '12.75', '178.5', '', '', '', '', '', '', '14', '14', '87458745', '', 'Ashraf', '');

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
  `sales_curquan` varchar(10) NOT NULL,
  `sales_vp` varchar(20) NOT NULL,
  `sales_vptotal` varchar(10) NOT NULL,
  `sales_gst` varchar(10) NOT NULL,
  `sales_dis` varchar(10) NOT NULL,
  `sales_dispri` varchar(11) NOT NULL,
  `sales_cus` varchar(100) NOT NULL,
  `sales_address` varchar(100) NOT NULL,
  `sales_total` varchar(20) NOT NULL,
  `sales_assoc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_proid`, `sales_procode`, `sales_proname`, `sales_procat`, `sales_prosubcat`, `sales_mrp`, `sales_quan`, `sales_curquan`, `sales_vp`, `sales_vptotal`, `sales_gst`, `sales_dis`, `sales_dispri`, `sales_cus`, `sales_address`, `sales_total`, `sales_assoc`) VALUES
(4, 0, '1006', 'Dino ', 'Ayurdevic Nutrition', 'Energy', '150', '10', '', '23.70', '237', '18', '15', '590', 'Jeslin Biju', 'thbheththntrhtyhyh', '6962', ''),
(5, 0, '1003', 'Protein', 'Targeted Nutrition', 'Energy', '1413', '8', '', '12.75', '102', '19', '15', '1860', 'Arun', 'iojdijewdeiwjdijewiodjewjifewriofoiref', '17707.2', ''),
(7, 0, '1003', 'Protein', 'Targeted Nutrition', 'Energy', '1413', '10', '', '12.75', '127.5', '10', '25', '1105', 'zzzzzzzzzzzz', 'nor,,,,,,,,,,lllll', '12155', ''),
(8, 0, '1003', 'Protein', 'Targeted Nutrition', 'Energy', '1413', '10', '', '12.75', '127.5', '18', '25', '1105', 'Jeslin Biju', 'yyyyyyyyyyyyyyyyyy', '13039', ''),
(9, 0, '1003', 'Protein', 'Targeted Nutrition', 'Energy', '1413', '5', '', '12.75', '63.75', '11', '25', '1105', 'Jeslin Biju', 'thbheththntrhtyhyh', '6132.75', ''),
(10, 0, '1003', 'Protein', 'Targeted Nutrition', 'Energy', '1413', '15', '', '12.75', '191.25', '10', '25', '1105', 'Arun', 'none', '18232.5', ''),
(11, 0, '1003', 'Protein', 'Targeted Nutrition', 'Energy', '1413', '8', '', '12.75', '102', '17', '25', '1105', 'Arun', 'none', '10342.8', ''),
(12, 0, '1001', 'Formula 1', 'Targeted Nutrition', 'Brain Health', '2378', '10', '', '12.75', '127.5', '5', '25', '1860', 'zzzzzzzzzzzz', 'yyyyyyyyyyyyyyyyyy', '19530', ''),
(13, 0, '1002', 'Fiber Complex', 'Targeted Nutrition', 'Energy', '2792', '5', '', '22.45', '112.25', '45', '25', '2180', 'Jeslin Biju', 'iojdijewdeiwjdijewiodjewjifewriofoiref', '15805', ''),
(14, 0, '1003', 'Protein', 'Targeted Nutrition', 'Energy', '1413', '12', '', '12.75', '153', '18', '35', '980', 'Ashok', 'yyyyyyyyyyyyyyyyyy', '13876.8', 'Ashraf');

-- --------------------------------------------------------

--
-- Table structure for table `shake`
--

CREATE TABLE `shake` (
  `shake_id` int(11) NOT NULL,
  `shake_name` varchar(100) NOT NULL,
  `shake_assoc` varchar(100) NOT NULL,
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

INSERT INTO `shake` (`shake_id`, `shake_name`, `shake_assoc`, `customer_id`, `customer_name`, `shake_goal`, `shake_recipes`, `shake_mrp`, `shake_scoops`, `shake_extra`, `shake_extraprice`, `shake_discount`, `shake_expence`, `shake_total`, `shake_image`) VALUES
(1, 'Club Shake', 'Ashraf', 0, 'Manu', 'Weight gainer', 'Formula 1,Fiber Complex,Shakemate', '219.92000000000002', '', 'Milk', '50', '15', '40', '90', 'bg2.jpg'),
(2, 'evening shake', '', 0, 'Amal', 'weight losser', 'Formula 1,Protein', '', '', 'milk, sugar, protein', '50', '15', '10', '60', 'main page.jpg'),
(3, 'evening shake', '', 0, 'Amal', 'weight losser', 'Formula 1,Protein', '', '', 'milk, sugar, protein', '50', '15', '10', '60', 'main page.jpg'),
(4, 'Club Shake222', '', 0, 'Manu', 'Weight gainer222', 'Formula 1,Protein', '0', '', 'water', '10', '50', '11', '21', 'main page.jpg'),
(5, 'Club Shake222', '', 0, 'Manu', 'weight losser', 'Formula 1,Protein', '0', '', 'Milk', '20', '25', '40', '60', 'main page.jpg'),
(6, 'Club Shake222', '', 0, 'Manu', 'Weight gainer222', 'Formula 1,Protein', '0', '', 'Milk', '50', '25', '10', '60', 'main page.jpg'),
(7, 'Club Shake', '', 0, 'Manu', 'weight losser', 'Formula 1,Protein', '129.82999999999998', '', 'Milk', '50', '25', '60', '110', 'main page.jpg'),
(8, 'Club Shake', '', 0, 'Amal', 'weight losser', 'Formula 1,Protein', '129.82999999999998', '', 'Milk, Butter', '20', '25', '40', '189.83', 'main page.jpg'),
(9, 'Club Shake', '', 0, 'Amal', 'Weight gainer222', 'Formula 1,Fiber Complex', '183.25', '', 'Milk, Butter', '20', '15', '50', '253.25', 'main page.jpg'),
(10, 'Dino Shake', '', 0, 'Melow', 'weight losser', 'Formula 1,Fiber Complex,Shakemate', '199.72', '', 'milk boost, butter', '60', '25', '50', '309.72', 'bg3.jpg');

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
  `stock_proid` int(11) NOT NULL,
  `stock_proname` varchar(100) NOT NULL,
  `stock_quantity` varchar(10) NOT NULL,
  `stock_location` varchar(100) NOT NULL,
  `stock_price` varchar(10) NOT NULL,
  `stock_total` int(50) NOT NULL,
  `stock_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_proid`, `stock_proname`, `stock_quantity`, `stock_location`, `stock_price`, `stock_total`, `stock_date`) VALUES
(7, 0, 'Formula 1', '5', 'kollam', '2200', 11000, '2024-04-18'),
(8, 0, 'Afresh', '8', 'Trivandrum', '800', 6400, '2024-04-22');

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
  ADD PRIMARY KEY (`cust_id`);

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
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shake`
--
ALTER TABLE `shake`
  MODIFY `shake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
