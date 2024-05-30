-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 10:20 PM
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
(1001, 'Ashraf', 'nutriadmin@gmail.com', 'nutriadmin@');

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
  `cust_idleweight` varchar(10) NOT NULL,
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
  `cust_cond4` varchar(100) NOT NULL,
  `cust_cond5` varchar(100) NOT NULL,
  `cust_cond6` varchar(100) NOT NULL,
  `cust_cond7` varchar(100) NOT NULL,
  `cust_cond8` varchar(100) NOT NULL,
  `cust_prg` varchar(50) NOT NULL,
  `cust_prgtype` varchar(20) NOT NULL,
  `cust_noday` varchar(10) NOT NULL,
  `cust_total` varchar(20) NOT NULL,
  `cust_paid` varchar(20) NOT NULL,
  `cust_paiddate` varchar(100) NOT NULL,
  `cust_paid1` varchar(10) NOT NULL,
  `cust_paiddate1` varchar(100) NOT NULL,
  `cust_paid2` varchar(10) NOT NULL,
  `cust_paiddate2` varchar(100) NOT NULL,
  `cust_paid3` varchar(10) NOT NULL,
  `cust_paiddate3` varchar(100) NOT NULL,
  `cust_paid4` varchar(10) NOT NULL,
  `cust_paiddate4` varchar(100) NOT NULL,
  `cust_paid5` varchar(10) NOT NULL,
  `cust_paiddate5` varchar(100) NOT NULL,
  `cust_remain` varchar(10) NOT NULL,
  `cust_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_code`, `cust_name`, `cust_phno`, `cust_invited`, `cust_age`, `cust_bodyage`, `cust_gender`, `cust_email`, `cust_password`, `cust_doj`, `cust_city`, `cust_address`, `cust_height`, `cust_weight`, `cust_idleweight`, `cust_fat`, `cust_vcf`, `cust_bmr`, `cust_bmi`, `cust_mm`, `cust_tsf`, `cust_waketime`, `cust_tea`, `cust_breakfast`, `cust_lunch`, `cust_snack`, `cust_dinner`, `cust_veg_nonveg`, `cust_waterintake`, `cust_cond1`, `cust_cond2`, `cust_cond3`, `cust_cond4`, `cust_cond5`, `cust_cond6`, `cust_cond7`, `cust_cond8`, `cust_prg`, `cust_prgtype`, `cust_noday`, `cust_total`, `cust_paid`, `cust_paiddate`, `cust_paid1`, `cust_paiddate1`, `cust_paid2`, `cust_paiddate2`, `cust_paid3`, `cust_paiddate3`, `cust_paid4`, `cust_paiddate4`, `cust_paid5`, `cust_paiddate5`, `cust_remain`, `cust_date`) VALUES
(1003, 'CUS10012', 'Kareem', '7854985687', 'Ashraf', '25', '26', 'Male', 'manu123@gmail.com', 'manu123@', '2024-04-09', 'Kozhikode', 'veluvil po mavoor, kozhikode', '175', '62', '75', '15', '10', '11', '12', '13', '14', '09:29', 'Green Tea', 'Idly, Sambar', 'Chicken Biriyani', 'ladoo', 'Mandi', 'Non-veg', '2 litre', 'Diabeted', 'Cancer', 'High BP', 'Diabetieswe3ee23e', 'Fever', 'Blood pressure', 'Diabeties 2', 'Diabeties 3', 'Weight lose', 'Online', '20', '10000', '2000', '2024-04-01', '3000', '2024-04-02', '1000', '2024-04-03', '1000', '2024-04-04', '2000', '2024-04-05', '0', '', '8000', '2024-04-27'),
(1005, 'CUS10013', 'Amal', '9865329865', 'Ashraf', '26', '27', 'Male', 'amal123@gmail.com', 'amal123@', '', 'Thalayolaparambu', '3rd floor, Thalayolaparambu, po', '165', '63', '65', '32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Offline', '40', '26000', '20000', '2024-04-02', '1000', '2024-04-09', '5000', '2024-04-16', '0', '', '0', '', '', '', '6000', '2024-04-27'),
(1006, 'CUS10029', 'Albin', '9865875498', 'Ashraf', '25', '26', 'Male', 'albin12@gmail.com', 'albin12@', '', 'Vallaserry', '3rd floor, vallaserry, po', '152', '72', '52', '26', '001', '002', '003', '004', '005', '16:51', 'Black Coffee', 'Noodles', 'Mandi', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', 'Diabeties', 'Fever', 'Blood pressure', 'Diabeties 2', 'Diabeties 3', 'Fat Reducer', 'Offline', '25', '15000', '8000', '', '7000', '', '0', '', '', '', '', '', '', '', '7000', '2024-04-27'),
(1007, 'CUS10016', 'Ajith', '986585498', 'Ashraf', '45', '46', 'Male', 'amal123@gmail.com', 'amal123@', '', 'Kochi', '3rd floor, kochi, po', '182', '90', '82', '72', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25', '15000', '8000', '', '900', '', '0', '', '0', '', '0', '', '', '', '7000', '2024-04-27'),
(1008, 'CUS10026', 'Melow', '9887659854', 'Amal', '25', '26', 'Female', 'melow12@gmail.com', '', '15-04-2023', 'Kochi', '3rd floor, kochi, po', '154', '78', '', '24', '001', '002', '003', '004', '14', '00:57', 'okkokook', 'Noodles', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', '', '', '', '', '', 'Weight lose', 'Offline', '20', '12000', '8000', '', '', '', '', '', '', '', '', '', '', '', '11000', '2024-04-27'),
(1009, 'CUS10026', 'Mathew', '9887659854', 'Amal', '25', '26', 'Female', 'melow12@gmail.com', '', '15-04-2023', 'Kochi', '3rd floor, kochi, po', '154', '78', '', '24', '001', '002', '003', '004', '14', '00:57', 'okkokook', 'Noodles', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', '', '', '', '', '', 'Weight lose', 'Offline', '20', '12000', '8000', '', '', '', '', '', '', '', '', '', '', '', '11000', '2024-04-27'),
(1010, 'CUS10027', 'Abdul', '9887659854', 'Amal', '38', '39', 'Male', 'abdul12@gmail.com', '', '20-06-2024', 'Kochi', '3rd floor, kochi, po', '163', '96', '60', '24', '001', '002', '003', '004', '005', '11:09', 'Black Coffee', 'Idly, Sambar', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '2 litre', 'Diabeted', 'Cancer', 'High BP', '', '', '', '', '', 'Weight lose', 'Offline', '20', '12000', '8000', '', '', '', '', '', '', '', '', '', '', '', '4000', '2024-04-27'),
(1011, 'CUS10026', 'Arjun', '', '', '', '', '', '', '', '', '', '', '150', '90', '60', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15000', '5000', '', '1000', '', '0', '', '0', '', '0', '', '', '', '9000', '2024-04-01'),
(1012, 'CUS10028', 'Edwin', '9865875498', 'Amal', '24', '25', 'Male', 'edwin12@gmail.com', '', '2024-04-01', 'Kochi', '3rd floor, kochi, po', '154', '96', '60', '18', '001', '11', '12', '13', '14', '03:25', 'Black Coffee', 'Noodles', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '2 litre', 'belly fat', 'blood cancer', 'nutrition effectency', 'Diabeties', 'Fever', 'Blood pressure', 'Diabeties 2', 'Diabeties 3', 'Weight lose', 'Offline', '30', '30000', '5000', '2024-04-01', '10000', '2024-04-08', '100', '2024-04-15', '0', '', '0', '', '', '', '25000', '2024-05-04');

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
('nutriadmin@gmail.com', 1, '2024-05-24 08:30:54'),
('nutriadmin@gmail.com', 2, '2024-05-27 11:36:44'),
('nutriadmin@gmail.com', 3, '2024-05-30 12:38:56'),
('nutriadmin@gmail.com', 4, '2024-05-30 21:22:27');

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
  `pro_dis0` varchar(10) NOT NULL DEFAULT '1',
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
  `pro_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`pri_id`, `pro_name`, `pro_code`, `pro_category`, `pro_subcat`, `pro_mrp`, `pro_price`, `pro_dis0`, `pro_dis15`, `pro_dis25`, `pro_dis35`, `pro_dis42`, `pro_dis50`, `pro_vp`, `pro_vptotal`, `pro_scoop`, `pro_scoop15`, `pro_scoop25`, `pro_scoop35`, `pro_scoop42`, `pro_scoop50`, `pro_quantity`, `pro_curquantity`, `pro_hsn`, `pro_img`, `pro_date`) VALUES
(1, 'FORMULA 1 SHAKE MIX VANILLA', 'F1V', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2378', '1340', '1', '2065', '1860', '1650', '1505', '1340', '21.75', '108.75', '60', '103.25', '93', '82.5', '75.25', '67', '35', '25', '785487', '', '2024-05-01'),
(2, 'FORMULA 1 SHAKE MIX CHOCOLATE', 'F1C', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2378', '1340', '1', '2065', '1860', '1650', '1505', '1340', '12.75', '191.25', '60', '103.25', '93', '82.5', '75.25', '67', '25', '20', '111111', '', '2024-05-01'),
(3, 'FORMULA 1 SHAKE MIX PISTAH', 'F1P', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2378', '1340', '1', '2065', '1860', '1650', '1505', '1340', '21.75', '652.5', '60', '103.25', '93', '82.5', '75.25', '67', '30', '15', '1010', '', '2024-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(50) NOT NULL,
  `program_img` varchar(50) NOT NULL,
  `program_date` varchar(50) NOT NULL,
  `program_time` varchar(20) NOT NULL,
  `program_venue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`, `program_img`, `program_date`, `program_time`, `program_venue`) VALUES
(1, 'Fitness diet', 'bg (6).jpg', '2024-05-01', '17:11', 'Kozhikode'),
(2, 'Weight Gainer', 'bg (5).jpg', '2024-05-02', '05:15', 'Thrissur');

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
  `sales_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `shake_image` varchar(100) NOT NULL,
  `shake_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_uname`, `staff_email`, `staff_pass`, `staff_gender`, `staff_city`, `staff_phno`) VALUES
(1, 'ALex', 'alex123@', 'alex123@gmail.com', 'alex123@', 'Male', 'Kozhikode', '8798659897');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_proid` int(11) NOT NULL,
  `stock_proname` varchar(100) NOT NULL,
  `stock_quantity` varchar(10) NOT NULL,
  `stock_associate` varchar(100) NOT NULL,
  `stock_price` varchar(10) NOT NULL,
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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

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
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shake`
--
ALTER TABLE `shake`
  MODIFY `shake_id` int(11) NOT NULL AUTO_INCREMENT;

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
