-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 03:28 PM
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
-- Table structure for table `bmr_history`
--

CREATE TABLE `bmr_history` (
  `bmr_id` int(11) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `cust_code` varchar(50) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_bmr` varchar(20) NOT NULL,
  `cust_bmi` varchar(20) NOT NULL,
  `cust_bmidate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmr_history`
--

INSERT INTO `bmr_history` (`bmr_id`, `cust_id`, `cust_code`, `cust_name`, `cust_bmr`, `cust_bmi`, `cust_bmidate`) VALUES
(1, 1010, 'CUS10028', 'Edwin', '11', '12', '2024-06-01'),
(2, 1003, 'CUS10028', 'Edwin', '2002', '1001', '2024-06-01'),
(3, 1003, 'CUS10028', 'Edwin', '0110', '0220', '2024-06-02'),
(4, 1003, 'CUS10028', 'Edwin', '2222', '1111', '2024-06-03'),
(5, 1003, 'CUS10028', 'Edwin', '0002', '0001', '2024-06-04'),
(6, 1005, 'CUS10028', 'Edwin', '333', '222', '2024-06-06'),
(7, 1005, 'CUS10028', 'Edwin', '201', '301', '2024-06-05'),
(8, 1006, '', 'Aswin', '30', '15', '2024-06-26');

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
  `cust_bmidate` varchar(100) NOT NULL,
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
  `cust_paid` varchar(20) DEFAULT NULL,
  `cust_paiddate` varchar(100) NOT NULL,
  `cust_remain` varchar(10) DEFAULT NULL,
  `cust_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_code`, `cust_name`, `cust_phno`, `cust_invited`, `cust_age`, `cust_bodyage`, `cust_gender`, `cust_email`, `cust_password`, `cust_doj`, `cust_city`, `cust_address`, `cust_height`, `cust_weight`, `cust_idleweight`, `cust_fat`, `cust_vcf`, `cust_bmr`, `cust_bmi`, `cust_bmidate`, `cust_mm`, `cust_tsf`, `cust_waketime`, `cust_tea`, `cust_breakfast`, `cust_lunch`, `cust_snack`, `cust_dinner`, `cust_veg_nonveg`, `cust_waterintake`, `cust_cond1`, `cust_cond2`, `cust_cond3`, `cust_cond4`, `cust_cond5`, `cust_cond6`, `cust_cond7`, `cust_cond8`, `cust_prg`, `cust_prgtype`, `cust_noday`, `cust_total`, `cust_paid`, `cust_paiddate`, `cust_remain`, `cust_date`) VALUES
(1003, 'CUS10012', 'Kareem', '7854985687', 'Ashraf', '25', '26', 'Male', 'manu123@gmail.com', 'manu123@', '2024-04-09', 'Kozhikode', 'veluvil po mavoor, kozhikode', '175', '62', '75', '15', '10', '02', '01', '2024-06-30', '13', '14', '09:29', 'Green Tea', 'Idly, Sambar', 'Chicken Biriyani', 'ladoo', 'Mandi', 'Non-veg', '2 litre', 'Diabeted', 'Cancer', 'High BP', 'Diabetieswe3ee23e', 'Fever', 'Blood pressure', 'Diabeties 2', 'Diabeties 3', 'Weight lose', 'Online', '20', '10000', '3500', '2024-04-01', '2850', '2024-04-27'),
(1005, 'CUS10013', 'Amal', '9865329865', 'Ashraf', '26', '27', 'Male', 'amal123@gmail.com', 'amal123@', '2024-06-01', 'Thalayolaparambu', '3rd floor, Thalayolaparambu, po', '165', '63', '65', '32', '001', '11', '100', '', '152', '145', '12:45', 'Black Coffee', 'Idly, Sambar', 'Mandi', 'ladoo', 'Mandi', 'Non-veg', '2 litre', 'belly fat', 'blood cancer', 'nutrition effectency', 'Diabeties', 'Fever', 'Blood pressure', 'Diabeties 2', 'Diabeties 3', 'Weight lose', 'Offline', '40', '26000', '3030', '2024-04-02', '22970', '2024-04-27'),
(1006, 'CUS10029', 'Albin', '9865875498', 'Ashraf', '25', '26', 'Male', 'albin12@gmail.com', 'albin12@', '', 'Vallaserry', '3rd floor, vallaserry, po', '152', '72', '52', '26', '001', '002', '003', '', '004', '005', '16:51', 'Black Coffee', 'Noodles', 'Mandi', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', 'Diabeties', 'Fever', 'Blood pressure', 'Diabeties 2', 'Diabeties 3', 'Fat Reducer', 'Offline', '25', '15000', '0', '2024-06-05', '1', '2024-04-27'),
(1007, 'CUS10016', 'Ajith', '986585498', 'Ashraf', '45', '46', 'Male', 'amal123@gmail.com', 'amal123@', '', 'Kochi', '3rd floor, kochi, po', '182', '90', '82', '72', '10', '105.4', '100.5', '', '142.2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '25', '15000', '3510', '2024-05-29', '5000', '2024-04-27'),
(1008, 'CUS10026', 'Melow', '9887659854', 'Amal', '25', '26', 'Female', 'melow12@gmail.com', '', '15-04-2023', 'Kochi', '3rd floor, kochi, po', '154', '78', '', '24', '001', '002', '003', '', '004', '14', '00:57', 'okkokook', 'Noodles', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', '', '', '', '', '', 'Weight lose', 'Offline', '20', '12000', '0', '2024-04-01', '1000', '2024-04-27'),
(1009, 'CUS10026', 'Mathew', '9887659854', 'Amal', '25', '26', 'Female', 'melow12@gmail.com', '', '15-04-2023', 'Kochi', '3rd floor, kochi, po', '154', '78', '', '24', '001', '002', '003', '', '004', '14', '00:57', 'okkokook', 'Noodles', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '1 litre', 'belly fat', 'blood cancer', 'nutrition effectency', '', '', '', '', '', 'Weight lose', 'Offline', '20', '11000', '0', '2024-06-01', '0', '2024-04-27'),
(1010, 'CUS10027', 'Abdul', '9887659854', 'Amal', '38', '39', 'Male', 'abdul12@gmail.com', '', '20-06-2024', 'Kochi', '3rd floor, kochi, po', '163', '96', '60', '24', '001', '002', '003', '', '004', '005', '11:09', 'Black Coffee', 'Idly, Sambar', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '2 litre', 'Diabeted', 'Cancer', 'High BP', '', '', '', '', '', 'Weight lose', 'Offline', '20', '10000', '0', '2024-04-01', '4000', '2024-04-27'),
(1011, 'CUS10026', 'Arjun', '', '', '', '', '', '', '', '2024-06-30', '', '', '150', '90', '50', '', '', '103.5', '306.4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '15000', '5500', '2024-04-01', '0', '2024-04-01'),
(1012, 'CUS10028', 'Edwin', '9865875498', 'Amal', '24', '25', 'Male', 'edwin12@gmail.com', '', '2024-04-01', 'Kochi', '3rd floor, kochi, po', '154', '96', '60', '18', '001', '11', '12', '', '13', '14', '03:25', 'Black Coffee', 'Noodles', 'Chicken Biriyani', 'fries', 'Mandi', 'Non-veg', '2 litre', 'belly fat', 'blood cancer', 'nutrition effectency', 'Diabeties', 'Fever', 'Blood pressure', 'Diabeties 2', 'Diabeties 3', 'Weight lose', 'Offline', '30', '30000', '0', '2024-04-01', '0', '2024-05-04'),
(1017, 'CUS10030', 'Wolf', '9876543210', 'Amal', '25', '32', 'Male', 'wolf12@gmail.com', '', '2024-06-13', 'North Marad', '3rd floor, Marad, po', '163', '85', '63', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '', '0', ''),
(1018, '', 'Aswin', '7034410471', '', '', '', 'Male', 'mma125037@gmail.com', 'kannan@123', '', 'Kottayam', 'Mukalel House', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', NULL, '');

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
('nutriadmin@gmail.com', 1, '2024-07-02 08:20:04'),
('nutriadmin@gmail.com', 2, '2024-07-04 00:11:53'),
('nutriadmin@gmail.com', 3, '2024-07-04 16:33:34'),
('nutriadmin@gmail.com', 4, '2024-07-05 10:24:33'),
('nutriadmin@gmail.com', 5, '2024-07-05 11:19:27'),
('nutriadmin@gmail.com', 6, '2024-07-06 20:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `pay_history`
--

CREATE TABLE `pay_history` (
  `pay_id` int(11) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `cust_code` varchar(50) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_paid` varchar(20) NOT NULL,
  `cust_paiddate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pay_history`
--

INSERT INTO `pay_history` (`pay_id`, `cust_id`, `cust_code`, `cust_name`, `cust_paid`, `cust_paiddate`) VALUES
(1, 1003, 'CUS10012', 'Kareem', '1000', '2024-05-01'),
(2, 1003, 'CUS10012', 'Kareem', '2500', '2024-05-04'),
(3, 1007, 'CUS10016', 'Ajith', '3510', '2024-05-08'),
(4, 1005, 'CUS10013', 'Amal', '1010', '2024-05-15'),
(5, 1005, 'CUS10013', 'Amal', '2020', '2024-05-04'),
(6, 1011, 'CUS10026', 'Arjun', '5400', '2024-05-14'),
(7, 1011, 'CUS10026', 'Arjun', '100', '2024-05-25'),
(8, 1003, 'CUS10012', 'Kareem', '3000', '2024-06-06'),
(9, 1003, 'CUS10012', 'Kareem', '500', '2024-06-07'),
(10, 1005, 'CUS10013', 'Amal', '1970', '2024-06-14'),
(11, 1006, 'CUS10029', 'Albin', '3000', '2024-06-10'),
(12, 1007, 'CUS10016', 'Ajith', '1490', '2024-06-09'),
(13, 1006, 'CUS10029', 'Albin', '2121', '2024-06-11'),
(14, 1008, 'CUS10026', 'Melow', '11000', '2024-06-04'),
(15, 1010, 'CUS10027', 'Abdul', '5000', '2024-06-05'),
(16, 1011, 'CUS10026', 'Arjun', '9500', '2024-06-30'),
(17, 1012, 'CUS10028', 'Edwin', '25000', '2024-06-20'),
(18, 1012, 'CUS10028', 'Edwin', '5000', '2024-06-27'),
(19, 1010, 'CUS10027', 'Abdul', '1000', '2024-06-06'),
(20, 1009, 'CUS10026', 'Mathew', '5000', '2024-06-05'),
(21, 1009, 'CUS10026', 'Mathew', '5000', '2024-06-06'),
(22, 1009, 'CUS10026', 'Mathew', '500', '2024-06-07'),
(23, 1009, 'CUS10026', 'Mathew', '450', '2024-06-08'),
(24, 1009, 'CUS10026', 'Mathew', '50', '2024-06-09'),
(25, 1003, 'CUS10012', 'Kareem', '150', '2024-06-13'),
(26, 1007, 'CUS10016', 'Ajith', '5000', '2024-06-10'),
(27, 1006, 'CUS10029', 'Albin', '879', '2024-06-12'),
(28, 1018, '', 'Aswin', '1000', '2024-06-26'),
(29, 1006, 'CUS10029', 'Albin', '8000', '2024-06-26'),
(30, 1006, 'CUS10029', 'Albin', '999', '2024-06-28');

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
  `pro_scooptotal` varchar(10) NOT NULL,
  `pro_scoopqua` varchar(10) NOT NULL,
  `pro_scoop0` varchar(10) NOT NULL,
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

INSERT INTO `price` (`pri_id`, `pro_name`, `pro_code`, `pro_category`, `pro_subcat`, `pro_mrp`, `pro_price`, `pro_dis0`, `pro_dis15`, `pro_dis25`, `pro_dis35`, `pro_dis42`, `pro_dis50`, `pro_vp`, `pro_vptotal`, `pro_scoop`, `pro_scooptotal`, `pro_scoopqua`, `pro_scoop0`, `pro_scoop15`, `pro_scoop25`, `pro_scoop35`, `pro_scoop42`, `pro_scoop50`, `pro_quantity`, `pro_curquantity`, `pro_hsn`, `pro_img`, `pro_date`) VALUES
(1, 'FORMULA 1 SHAKE MIX VANILLA', 'F1V', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '1340', '2370', '2060', '1860', '1650', '1500', '1340', '21.75', '217.5', '60', '7920', '0', '118.90', '103.5', '93', '83.5', '73', '63.5', '132', '0', '785487', '', '2024-07-04'),
(2, 'FORMULA 1 SHAKE MIX CHOCOLATE', 'F1C', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2371', '1341', '2371', '2061', '1861', '1651', '1501', '1341', '12.75', '153', '50', '6150', '0', '121.65', '111.55', '10.45', '9.35', '8.25', '7.15', '123', '0', '986598', '', '2024-07-04'),
(3, 'FORMULA 1 SHAKE MIX PISTAH', 'F1P', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2372', '1342', '2372', '2062', '1862', '1652', '1502', '1342', '21.75', '435', '40', '4960', '400', '145.52', '135.52', '125.52', '115.52', '105.25', '95.25', '124', '10', '785487', '', '2024-07-05'),
(4, 'FORMULA 1 SHAKE MIX OREO', 'F!O', 'Ayurdevic Nutrition', 'Energy', '2683', '2503', '2683', '2103', '2003', '1803', '1703', '1603', '12.75', '127.5', '30', '3000', '-13', '123.45', '113.45', '103.45', '93.45', '83.45', '73.45', '100', '-0.4333333', '986598', '', '2024-07-01');

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

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_proid`, `sales_procode`, `sales_proname`, `sales_procat`, `sales_prosubcat`, `sales_mrp`, `sales_quan`, `sales_curquan`, `sales_vp`, `sales_vptotal`, `sales_gst`, `sales_dis`, `sales_dispri`, `sales_cus`, `sales_address`, `sales_total`, `sales_date`) VALUES
(1, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '7', '', '21.75', '152.25', '18', '0', '2065', 'Arun', 'none', '14455', '2024-07-01'),
(2, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2378', '15', '', '21.75', '326.25', '18', '15', '2065', 'Jeslin Biju', 'yyyyyyyyyyyyyyyyyy', '36550.5', '2024-07-02'),
(3, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2378', '5', '', '21.75', '108.75', '18', '15', '2065', 'amla', 'yyyyyyyyyyyyyyyyyy', '12183.5', '2024-07-03'),
(4, 3, 'F1P', 'FORMULA 1 SHAKE MIX PISTAH', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2372', '20', '', '21.75', '435', '18', '25', '1862', 'Arun', 'zzzzzzzzzzzzzzzzzzzzzzzz', '43943.2', '2024-07-04'),
(5, 2, 'F1C', 'FORMULA 1 SHAKE MIX CHOCOLATE', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2371', '10', '', '12.75', '127.5', '18', '15', '2061', 'Alvin', 'mmmmmmmmmmmmmm', '24319.8', '2024-07-05'),
(6, 4, 'F!O', 'FORMULA 1 SHAKE MIX OREO', 'Ayurdevic Nutrition', 'Energy', '2683', '8', '', '12.75', '102', '18', '25', '2003', 'Melow', 'none', '18908.32', '2024-07-06'),
(7, 3, 'F1P', 'FORMULA 1 SHAKE MIX PISTAH', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2372', '5', '', '21.75', '108.75', '18', '15', '2062', 'Raj', 'none', '12165.8', '2024-07-07'),
(8, 2, 'F1C', 'FORMULA 1 SHAKE MIX CHOCOLATE', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2371', '5', '', '12.75', '63.75', '18', '15', '2061', 'Adarsh', 'none', '12159.9', '2024-07-07'),
(9, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '5', '', '21.75', '108.75', '18', '25', '1860', 'Arun', 'none', '10974', '2024-07-08'),
(10, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '52', '', '21.75', '1131', '18', '25', '1860', 'Jeslin Biju', 'none', '114129.6', '2024-07-08'),
(11, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '10', '', '21.75', '217.5', '18', '15', '2060', 'Jeslin Biju', 'none', '24308', '2024-07-09'),
(12, 4, 'F!O', 'FORMULA 1 SHAKE MIX OREO', 'Ayurdevic Nutrition', 'Energy', '2683', '15', '', '12.75', '191.25', '18', '25', '2003', 'Jeslin Biju', 'none', '35453.1', '2024-07-10'),
(13, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '5', '', '21.75', '108.75', '18', '15', '2060', 'Jeslin Biju', 'none', '12154', '2024-07-11'),
(14, 2, 'F1C', 'FORMULA 1 SHAKE MIX CHOCOLATE', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2371', '4', '', '12.75', '51', '18', '15', '2061', 'Arun', 'none', '9727.92', '2024-07-12'),
(15, 4, 'F!O', 'FORMULA 1 SHAKE MIX OREO', 'Ayurdevic Nutrition', 'Energy', '2683', '20', '', '12.75', '255', '18', '35', '1803', 'Jeslin Biju', 'none', '42550.8', '2024-07-13'),
(16, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '5', '', '21.75', '108.75', '18', '15', '2060', 'Arun', 'none', '12154', '2024-07-14'),
(17, 2, 'F1C', 'FORMULA 1 SHAKE MIX CHOCOLATE', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2371', '6', '', '12.75', '76.5', '18', '25', '1861', 'Jeslin Biju', 'none', '13175.88', '2024-07-15'),
(18, 3, 'F1P', 'FORMULA 1 SHAKE MIX PISTAH', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2372', '1', '', '21.75', '21.75', '18', '25', '1862', 'Arun', 'none', '2197.16', '2024-07-16'),
(19, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '10', '', '21.75', '217.5', '18', '15', '2060', 'Jeslin Biju', 'none', '24308', '2024-07-17'),
(20, 4, '1001', 'FORMULA 1 SHAKE MIX OREO', 'Ayurdevic Nutrition', 'Energy', '2683', '2', '', '12.75', '25.5', '18', '15', '2103', 'kiran', 'sv', '4963.08', '2024-07-18'),
(21, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '3000', '15', '', '21.75', '326.25', '50', '15', '2060', 'Aswin M M', 'kozhikode', '46350', '2024-07-19'),
(22, 3, 'F1P', 'FORMULA 1 SHAKE MIX PISTAH', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2372', '32', '', '21.75', '696', '36', '42', '1502', 'Aswin M M', 'kozhikode', '65367.04', '2024-07-20'),
(23, 4, 'F!O', 'FORMULA 1 SHAKE MIX OREO', 'Ayurdevic Nutrition', 'Energy', '2683', '30', '', '12.75', '382.5', '15', '42', '1703', 'Aswin M M', 'kozhikode', '58753.5', '2024-07-21'),
(24, 3, 'F1P', 'FORMULA 1 SHAKE MIX PISTAH', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2372', '10', '', '21.75', '217.5', '15', '15', '2062', 'Aswin M M', 'kozhikode', '23713', '2024-07-22'),
(25, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '2', '', '21.75', '43.5', '18', '15', '2060', 'Arun', 'none', '4120', '2024-07-22'),
(26, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '2', '', '21.75', '43.5', '18', '15', '2060', 'Arun', 'none', '4120', '2024-07-01'),
(27, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '1', '', '21.75', '21.75', '14', '15', '2060', 'Jeslin Biju', 'none', '2060', '2024-07-01'),
(28, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '2', '', '21.75', '43.5', '18', '15', '2060', 'zzzzzzzzzzzz', 'yyyyyyyyyyyyyyyyyy', '4120', '2024-07-02'),
(29, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '1', '', '21.75', '21.75', '18', '0', '2370', 'zzzzzzzzzzzz', 'yyyyyyyyyyyyyyyyyy', '2370', '2024-07-02'),
(30, 2, 'F1C', 'FORMULA 1 SHAKE MIX CHOCOLATE', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2371', '3', '', '12.75', '38.25', '18', '15', '2061', 'Arun', 'none', '6183', '2024-07-02'),
(31, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '2', '', '21.75', '43.5', '18', '15', '2060', 'Jeslin Biju', 'none', '4120', '2024-07-04'),
(32, 1, 'F1V', 'FORMULA 1 SHAKE MIX VANILLA', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2370', '1', '', '21.75', '21.75', '18', '15', '2060', 'zzzzzzzzzzzz', 'iojdijewdeiwjdijewiodjewjifewriofoiref', '2060', '2024-07-05'),
(33, 2, 'F1C', 'FORMULA 1 SHAKE MIX CHOCOLATE', 'WEIGHT MANAGEMENT', 'WEIGHT LOSS / GAIN / MAINTAIN', '2371', '5', '', '12.75', '63.75', '18', '15', '2061', 'none', 'none', '10305', '2024-07-04');

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
  `shake_scoops` varchar(500) NOT NULL,
  `shake_extra` varchar(25) NOT NULL,
  `shake_extraprice` varchar(10) NOT NULL,
  `shake_discount` varchar(50) NOT NULL,
  `shake_expence` varchar(25) NOT NULL,
  `shake_total` varchar(50) NOT NULL,
  `shake_image` varchar(100) NOT NULL,
  `shake_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shake`
--

INSERT INTO `shake` (`shake_id`, `shake_name`, `shake_assoc`, `customer_id`, `customer_name`, `shake_goal`, `shake_recipes`, `shake_mrp`, `shake_scoops`, `shake_extra`, `shake_extraprice`, `shake_discount`, `shake_expence`, `shake_total`, `shake_image`, `shake_date`) VALUES
(1, 'Club Shake0', 'Ashraf', 1005, 'Amal', 'weight losser0', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE', '103.45', 'FORMULA 1 SHAKE MIX VANILLA : 10, FORMULA 1 SHAKE MIX CHOCOLATE : 20', 'milk', '20', '25', '40', '266.5', 'main page.jpg', ''),
(2, 'Club Shake1', 'Ashraf', 1003, 'Kareem', 'Weight gainer', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '321.96999999999997', 'FORMULA 1 SHAKE MIX VANILLA : 15, FORMULA 1 SHAKE MIX PISTAH : 30, FORMULA 1 SHAKE MIX OREO : 20', 'Milk, Butter', '50', '25', '10', '339', 'main page.jpg', ''),
(3, 'Club Shake2', 'Ashraf', 1006, 'Albin', 'weight losser2', 'FORMULA 1 SHAKE MIX VANILLA', '73', 'FORMULA 1 SHAKE MIX VANILLA : 15', 'Milk, Butter', '50', '42', '50', '452.47', 'main page.jpg', ''),
(4, 'Club Shake3', 'Ashraf', 1012, 'Edwin', 'weight losser3', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX OREO', '196.45', 'FORMULA 1 SHAKE MIX VANILLA : 2, FORMULA 1 SHAKE MIX OREO : 3', 'milk boost, butter', '20', '25', '60', '408.5', 'main page.jpg', ''),
(5, 'Club Shake4', 'Ashraf', 1010, 'Abdul', 'weight losser4', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '232.2', 'FORMULA 1 SHAKE MIX VANILLA : 5, FORMULA 1 SHAKE MIX PISTAH : 10, FORMULA 1 SHAKE MIX OREO : 15', 'water', '20', '50', '10', '194.7', 'main page.jpg', ''),
(6, 'Club Shake5', 'Ashraf', 1009, 'Mathew', 'weight losser5', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX PISTAH', '218.51999999999998', 'FORMULA 1 SHAKE MIX VANILLA : 2, FORMULA 1 SHAKE MIX PISTAH : 4', 'Milk, Butter', '50', '25', '15', '283.52', 'main page.jpg', ''),
(7, 'Club Shake6', 'Ashraf', 1006, 'Albin', 'weight losser6', 'FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '208.97', 'FORMULA 1 SHAKE MIX PISTAH : 3, FORMULA 1 SHAKE MIX OREO : 6', 'Milk', '10', '35', '20', '238.97', 'main page.jpg', ''),
(8, 'Club Shake7', 'Ashraf', 1011, 'Arjun', 'weight losser7', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX OREO', '176.95', 'FORMULA 1 SHAKE MIX VANILLA : 6, FORMULA 1 SHAKE MIX OREO : 2', 'Milk, Butter', '50', '35', '40', '266.95', 'main page.jpg', ''),
(9, 'Club Shake8', 'Ashraf', 0, 'Amal', 'weight losser8', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX OREO', '156.45', 'FORMULA 1 SHAKE MIX VANILLA : 10, FORMULA 1 SHAKE MIX OREO : 20', 'Milk, Butter', '20', '42', '60', '236.45', 'main page.jpg', ''),
(10, 'Club Shake9', 'Ashraf', 0, 'Ajith', 'weight losser9', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX PISTAH', '218.51999999999998', 'FORMULA 1 SHAKE MIX VANILLA : 10, FORMULA 1 SHAKE MIX PISTAH : 10', 'Milk, Butter', '20', '25', '40', '278.52', 'main page.jpg', ''),
(11, 'Club Shake10', 'Ashraf', 0, 'Melow', 'weight losser10', 'FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH', '135.97', 'FORMULA 1 SHAKE MIX CHOCOLATE : 10, FORMULA 1 SHAKE MIX PISTAH : 10', 'Milk, Butter', '50', '25', '40', '225.97', 'main page.jpg', ''),
(12, 'Club Shake11', 'Ashraf', 0, 'Amal', 'weight losser11', 'FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH', '247.07', 'FORMULA 1 SHAKE MIX CHOCOLATE : 10, FORMULA 1 SHAKE MIX PISTAH : 10', 'Milk, Butter', '20', '15', '40', '307.07', 'main page.jpg', ''),
(13, 'Club Shake13', 'Ashraf', 0, 'Kareem', 'weight losser13', 'FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '248.97000000000003', 'FORMULA 1 SHAKE MIX PISTAH : 10, FORMULA 1 SHAKE MIX OREO : 10', 'Milk', '10', '15', '10', '268.97', 'main page.jpg', ''),
(14, 'Club Shake14', 'Ashraf', 0, 'Amal', 'weight losser14', 'FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '218.32', 'FORMULA 1 SHAKE MIX CHOCOLATE : 10, FORMULA 1 SHAKE MIX PISTAH : 10, FORMULA 1 SHAKE MIX OREO : 10', 'Milk', '20', '35', '10', '248.32', 'main page.jpg', ''),
(15, 'Club Shake15', 'Ashraf', 0, 'Wolf', 'weight losser15', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '332.42', 'FORMULA 1 SHAKE MIX VANILLA : 10, FORMULA 1 SHAKE MIX CHOCOLATE : 10, FORMULA 1 SHAKE MIX PISTAH : 10, FORMULA 1 SHAKE MIX OREO : 10', 'Milk, Butter', '10', '25', '10', '352.42', 'main page.jpg', ''),
(16, 'Club Shake16', 'Ashraf', 0, 'Kareem', 'weight losser16', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '332.42', 'FORMULA 1 SHAKE MIX VANILLA : 5, FORMULA 1 SHAKE MIX CHOCOLATE : 10, FORMULA 1 SHAKE MIX PISTAH : 15, FORMULA 1 SHAKE MIX OREO : 20', 'Milk', '50', '25', '40', '422.42', 'main page.jpg', ''),
(17, 'Club Shake17', 'Ashraf', 0, 'Albin', 'weight losser17', 'FORMULA 1 SHAKE MIX VANILLA', '103.5', 'FORMULA 1 SHAKE MIX VANILLA : 60', 'Milk, Butter', '20', '15', '10', '133.5', 'main page.jpg', ''),
(18, 'Club Shake18', 'Ashraf', 0, 'Amal', 'weight losser18', 'FORMULA 1 SHAKE MIX VANILLA', '83.5', 'FORMULA 1 SHAKE MIX VANILLA : 30', 'Milk, Butter', '20', '35', '10', '113.5', 'main page.jpg', ''),
(19, 'Club Shake19', 'Ashraf', 0, 'Ajith', 'weight losser19', 'FORMULA 1 SHAKE MIX VANILLA', '73', 'FORMULA 1 SHAKE MIX VANILLA : 30', 'Milk, Butter', '10', '42', '10', '93', 'main page.jpg', ''),
(20, 'Club Shake20', 'Ashraf', 0, 'Melow', 'weight losser20', 'FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH', '247.07', 'FORMULA 1 SHAKE MIX CHOCOLATE : 30, FORMULA 1 SHAKE MIX PISTAH : 30', 'Milk, Butter', '10', '15', '10', '267.07', 'main page.jpg', ''),
(21, 'Club Shake22', 'Ashraf', 0, 'Albin', 'weight losser22', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX PISTAH', '239.02', 'FORMULA 1 SHAKE MIX VANILLA : 30, FORMULA 1 SHAKE MIX PISTAH : 30', 'Milk, Butter', '20', '15', '10', '269.02', 'main page.jpg', ''),
(22, 'Club Shake', 'Ashraf', 0, 'Ajith', 'Weight gainer222', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE', '103.45', 'FORMULA 1 SHAKE MIX VANILLA : 10, FORMULA 1 SHAKE MIX CHOCOLATE : 5', 'Milk, Butter', '20', '25', '60', '183.45', 'main page.jpg', ''),
(23, 'Club Shake23', 'Ashraf', 0, 'Mathew', 'weight losser23', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '332.42', 'FORMULA 1 SHAKE MIX VANILLA : 60, FORMULA 1 SHAKE MIX CHOCOLATE : 50, FORMULA 1 SHAKE MIX PISTAH : 40, FORMULA 1 SHAKE MIX OREO : 30', 'Milk', '10', '25', '50', '392.42', 'main page.jpg', ''),
(24, 'Club Shake24', 'Ashraf', 0, 'Wolf', 'weight losser24', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '464.02000000000004', 'FORMULA 1 SHAKE MIX VANILLA : 60, FORMULA 1 SHAKE MIX CHOCOLATE : 50, FORMULA 1 SHAKE MIX PISTAH : 40, FORMULA 1 SHAKE MIX OREO : 30', 'Milk', '10', '15', '60', '534.02', 'main page.jpg', ''),
(25, 'Club Shake25', 'Ashraf', 0, 'Abdul', 'weight losser25', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '301.82', 'FORMULA 1 SHAKE MIX VANILLA : 60, FORMULA 1 SHAKE MIX CHOCOLATE : 50, FORMULA 1 SHAKE MIX PISTAH : 40, FORMULA 1 SHAKE MIX OREO : 30', 'Milk, Butter', '50', '35', '10', '361.82', 'main page.jpg', ''),
(26, 'Club Shake26', 'Ashraf', 0, 'Wolf', 'weight losser26', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '464.02000000000004', 'FORMULA 1 SHAKE MIX VANILLA : 60, FORMULA 1 SHAKE MIX CHOCOLATE : 50, FORMULA 1 SHAKE MIX PISTAH : 40, FORMULA 1 SHAKE MIX OREO : 30', 'Milk, Butter', '20', '15', '60', '544.02', 'main page.jpg', ''),
(27, 'Club Shake27', 'Ashraf', 0, 'Mathew', 'weight losser27', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '464.02000000000004', 'FORMULA 1 SHAKE MIX VANILLA : 60, FORMULA 1 SHAKE MIX CHOCOLATE : 50, FORMULA 1 SHAKE MIX PISTAH : 40, FORMULA 1 SHAKE MIX OREO : 30', 'Milk, Butter', '50', '15', '10', '524.02', 'main page.jpg', ''),
(28, 'Club Shake26', 'Ashraf', 0, 'Kareem', 'weight losser26', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '464.02000000000004', 'FORMULA 1 SHAKE MIX VANILLA : 60, FORMULA 1 SHAKE MIX CHOCOLATE : 50, FORMULA 1 SHAKE MIX PISTAH : 40, FORMULA 1 SHAKE MIX OREO : 30', 'Milk', '10', '15', '10', '484.02', 'main page.jpg', ''),
(29, 'Club Shake28', 'Ashraf', 0, 'Arjun', 'weight losser28', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '301.82', 'FORMULA 1 SHAKE MIX VANILLA : 60, FORMULA 1 SHAKE MIX CHOCOLATE : 50, FORMULA 1 SHAKE MIX PISTAH : 40, FORMULA 1 SHAKE MIX OREO : 30', 'Milk, Butter', '10', '35', '40', '351.82', 'main page.jpg', ''),
(30, 'Club Shake29', 'Ashraf', 0, 'Wolf', 'weight losser29', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '464.02000000000004', 'FORMULA 1 SHAKE MIX VANILLA : 60, FORMULA 1 SHAKE MIX CHOCOLATE : 50, FORMULA 1 SHAKE MIX PISTAH : 40, FORMULA 1 SHAKE MIX OREO : 30', 'milk, sugar, protein', '10', '15', '10', '484.02', 'main page.jpg', ''),
(31, 'Club Shake30', 'Ashraf', 0, 'Kareem', 'weight losser30', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '332.42', 'FORMULA 1 SHAKE MIX VANILLA : 30, FORMULA 1 SHAKE MIX CHOCOLATE : 25, FORMULA 1 SHAKE MIX PISTAH : 20, FORMULA 1 SHAKE MIX OREO : 15', 'milk, sugar, protein', '50', '25', '40', '422.42', 'main page.jpg', ''),
(32, 'Club Shake31', 'Ashraf', 0, 'Mathew', 'weight losser31', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '332.42', 'FORMULA 1 SHAKE MIX VANILLA : 30, FORMULA 1 SHAKE MIX CHOCOLATE : 25, FORMULA 1 SHAKE MIX PISTAH : 20, FORMULA 1 SHAKE MIX OREO : 15', 'milk, sugar, protein', '10', '25', '10', '352.42', 'main page.jpg', ''),
(33, 'sdf', 'er', 0, 'Amal', 'dd', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX OREO', '328.5', 'FORMULA 1 SHAKE MIX VANILLA : 3, FORMULA 1 SHAKE MIX OREO : 3, FORMULA 1 SHAKE MIX CHOCOLATE : 3', 'milk', '0', '15', '10', '338.5', 'protein.jpg', ''),
(34, 'srf', 'erkjhh', 0, 'Kareem', 'sdg', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE', '215.05', 'FORMULA 1 SHAKE MIX VANILLA : 3, FORMULA 1 SHAKE MIX CHOCOLATE : 3', 'milk', '0', '15', '10', '225.05', 'Formula1.webp', ''),
(35, 'FORMULA 1 SHAKE MIX VANILLA', ' MIX VANILLA', 0, 'Aswin', '50', 'FORMULA 1 SHAKE MIX VANILLA', '83.5', 'FORMULA 1 SHAKE MIX VANILLA : 2', '10', '50', '35', '100', '233.5', 'img 1 nutri.html', ''),
(36, 'FORMULA 1 SHAKE MIX VANILLA', ' MIX VANILLA', 0, 'Aswin', '50', 'FORMULA 1 SHAKE MIX VANILLA', '83.5', 'FORMULA 1 SHAKE MIX VANILLA : 2', '10', '50', '35', '100', '233.5', 'img 1 nutri.html', ''),
(37, 'SHAKE!@', 'Ashraf', 0, 'Kareem', 'WEIGHT GAIN', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '464.02000000000004', 'FORMULA 1 SHAKE MIX VANILLA : 5, FORMULA 1 SHAKE MIX CHOCOLATE : 5, FORMULA 1 SHAKE MIX PISTAH : 5, FORMULA 1 SHAKE MIX OREO : 5', 'milk', '20', '15', '10', '494.02', '', ''),
(38, 'SHAKE!@', 'Ashraf', 0, 'Kareem', 'WEIGHT GAIN', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '', '', 'milk', '20', '15', '10', '30', '', ''),
(39, 'Club Shake', 'Ashraf', 0, 'Ajith', 'Weight gainer', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX PISTAH,FORMULA 1 SHAKE MIX OREO', '464.02000000000004', 'FORMULA 1 SHAKE MIX VANILLA : 10, FORMULA 1 SHAKE MIX CHOCOLATE : 10, FORMULA 1 SHAKE MIX PISTAH : , FORMULA 1 SHAKE MIX OREO : ', '10', '10', '15', '10', '484.02', 'bg (7).jpg', ''),
(40, '101010', 'Ashraf', 0, 'Wolf', '202020', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE', '215.05', 'FORMULA 1 SHAKE MIX VANILLA : 10, FORMULA 1 SHAKE MIX CHOCOLATE : 10', '10', '10', '15', '10', '235.05', 'bg (7).jpg', ''),
(41, '11111', 'Ashraf', 0, 'Wolf', '22222', 'FORMULA 1 SHAKE MIX CHOCOLATE,FORMULA 1 SHAKE MIX OREO', '113.9', 'FORMULA 1 SHAKE MIX CHOCOLATE : 5, FORMULA 1 SHAKE MIX OREO : 5', 'Milk', '20', '25', '10', '143.9', '', ''),
(42, '2222', 'Ashraf', 0, 'Wolf', '3333', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE', '215.05', 'FORMULA 1 SHAKE MIX VANILLA : 2, FORMULA 1 SHAKE MIX CHOCOLATE : 3', 'Milk', '20', '15', '50', '285.05', '', ''),
(43, 'sh1', 'Ashraf', 0, 'Arjun', 'sh2', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE', '215.05', 'FORMULA 1 SHAKE MIX VANILLA : 5, FORMULA 1 SHAKE MIX CHOCOLATE : 6', 'milk', '20', '15', '10', '245.05', '', ''),
(44, 'sh2', 'Ashraf', 0, 'Arjun', 'sh3', 'FORMULA 1 SHAKE MIX VANILLA,FORMULA 1 SHAKE MIX CHOCOLATE', '103.45', 'FORMULA 1 SHAKE MIX VANILLA : 2, FORMULA 1 SHAKE MIX CHOCOLATE : 2', 'Milk, Butter', '50', '25', '10', '163.45', '', '');

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
(1, 'ALex', 'alex123@', 'alex123@gmail.com', 'alex123@', 'Male', 'Kozhikode', '8798659897'),
(2, 'aswin', 'aswin123', 'mmaswin524@gmail.com', 'aswin@123', 'Male', 'kozhikode', '07034410471');

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

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_proid`, `stock_proname`, `stock_quantity`, `stock_associate`, `stock_price`, `stock_total`, `stock_date`) VALUES
(1, 1, 'FORMULA 1 SHAKE MIX VANILLA', '5', 'kollam', '1340', 6700, '2024-07-03'),
(2, 1, 'FORMULA 1 SHAKE MIX VANILLA', '2', 'palarivattom', '1340', 2680, '2024-07-04'),
(3, 2, 'FORMULA 1 SHAKE MIX CHOCOLATE', '5', 'palarivattom', '1341', 6705, '2024-07-05'),
(4, 4, 'FORMULA 1 SHAKE MIX OREO', '5', 'kollam', '2503', 12515, '2024-07-06'),
(5, 2, 'FORMULA 1 SHAKE MIX CHOCOLATE', '24', 'kollam', '1341', 32184, '2024-07-07'),
(6, 3, 'FORMULA 1 SHAKE MIX PISTAH', '10', 'kottayam', '1342', 13420, '2024-07-15'),
(7, 4, 'FORMULA 1 SHAKE MIX OREO', '10', 'kochi', '2503', 25030, '2024-07-16'),
(8, 2, 'FORMULA 1 SHAKE MIX CHOCOLATE', '65.78', 'kozhikode', '1347', 87555, '2024-07-25'),
(9, 2, 'FORMULA 1 SHAKE MIX CHOCOLATE', '15', 'kottayam', '1350', 20250, '2024-07-26'),
(10, 1, 'FORMULA 1 SHAKE MIX VANILLA', '1', 'kollam', '1340', 1340, '2024-07-03'),
(11, 2, 'FORMULA 1 SHAKE MIX CHOCOLATE', '2', 'kollam', '1341', 2682, '2024-07-04'),
(12, 2, 'FORMULA 1 SHAKE MIX CHOCOLATE', '1', 'kollam', '1341', 1341, '2024-07-04'),
(13, 1, 'FORMULA 1 SHAKE MIX VANILLA', '1', 'palarivattom', '1340', 1340, '2024-07-05'),
(14, 2, 'FORMULA 1 SHAKE MIX CHOCOLATE', '1', 'kollam', '1341', 1341, '2024-07-04');

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
-- Indexes for table `bmr_history`
--
ALTER TABLE `bmr_history`
  ADD PRIMARY KEY (`bmr_id`);

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
-- Indexes for table `pay_history`
--
ALTER TABLE `pay_history`
  ADD PRIMARY KEY (`pay_id`);

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
-- AUTO_INCREMENT for table `bmr_history`
--
ALTER TABLE `bmr_history`
  MODIFY `bmr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pay_history`
--
ALTER TABLE `pay_history`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `shake`
--
ALTER TABLE `shake`
  MODIFY `shake_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
