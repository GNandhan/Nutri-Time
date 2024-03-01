-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 11:46 AM
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
('nutriadmin@gmail.com', 1, '2024-02-28 23:32:59'),
('nutriadmin@gmail.com', 2, '2024-02-28 23:35:09'),
('nutriadmin@gmail.com', 3, '2024-02-29 00:08:20'),
('nutriadmin@gmail.com', 4, '2024-02-29 00:08:28'),
('nutriadmin@gmail.com', 5, '2024-02-29 00:09:25'),
('nutriadmin@gmail.com', 6, '2024-02-29 07:30:04'),
('nutriadmin@gmail.com', 7, '2024-03-01 10:46:27'),
('nutriadmin@gmail.com', 8, '2024-03-01 10:46:44'),
('nutriadmin@gmail.com', 9, '2024-03-01 10:47:20');

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
  `pro_price` int(20) NOT NULL,
  `pro_quantity` int(20) NOT NULL,
  `pro_image` varchar(50) NOT NULL,
  `pro_distribution` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`pro_id`, `pro_code`, `pro_name`, `pro_category`, `pro_subcategory`, `pro_brand`, `pro_price`, `pro_quantity`, `pro_image`, `pro_distribution`) VALUES
(5, 'eeeeeeeeeeeeee', 'Metabolic52525', 'Category1', 'Subcategory22', '52252', 580, 20, '', '56'),
(6, 'yhey', 'xhhh', 'Category2', 'Subcategory22', 'yedh', 546, 782, '', 'htghtgxh'),
(8, 'lnendwlfwef', 'weffefef', 'Category2', 'Subcategory22', 'wefweafewfewf', 520, 65, '', '651'),
(9, '', '', 'Category1', 'Subcategory11', '', 0, 0, 'Capture-removebg-preview.png', ''),
(10, '', '', 'Category1', 'Subcategory11', '', 0, 0, '1000066113-01.jpeg.jpg', ''),
(11, '', '', 'Category1', 'Subcategory11', '', 0, 0, '', ''),
(12, '', '', 'Category1', 'Subcategory11', '', 0, 0, '', ''),
(13, '', '', 'Category1', 'Subcategory11', '', 0, 0, '', ''),
(14, '', '', 'Category1', 'Subcategory11', '', 0, 0, 'Capture-removebg-preview.png', ''),
(15, '', '', 'Category1', 'Subcategory11', '', 0, 0, 'Capture-removebg-preview.png', ''),
(16, '', '', 'Category1', 'Subcategory11', '', 0, 0, 'Capture-removebg-preview.png', ''),
(17, '', '', 'Category1', 'Subcategory11', '', 0, 0, '', ''),
(18, '', '', 'Category1', 'Subcategory11', '', 0, 0, 'Capture-removebg-preview.png', ''),
(19, '', '', 'Category1', 'Subcategory11', '', 0, 0, 'Capture-removebg-preview.png', ''),
(20, '', '', 'Category1', 'Subcategory11', '', 0, 0, 'Capture-removebg-preview.png', ''),
(21, 'sugunan#11111', 'Metabolic', 'Category2', 'Subcategory22', 'shoba', 150, 200, 'IMG12.jpg', '15'),
(22, 'aaaaaaaaaaaaaaaaaaaa', 'bbbbbbbbbbbb', 'Category2', 'Subcategory22', 'branddd', 350, 20, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa.png', 'ssssssssssssssssssss'),
(23, 'rhdthteherhrehhhrh', '', 'Category1', 'Subcategory11', '', 0, 0, 'rhdthteherhrehhhrh.jpg', ''),
(25, 'xthtehterhdehdh', '', 'Category1', 'Subcategory11', '', 0, 0, '.jpg', ''),
(26, 'ddawdadadd', '', 'Category1', 'Subcategory11', '', 0, 0, 'ddawdadadd.jpg', ''),
(27, 'efrererererererer', '', 'Category1', 'Subcategory11', '', 0, 0, 'efrererererererer.jpg', ''),
(28, 'sefererererrerererer', '', 'Category1', 'Subcategory11', '', 0, 0, 'sefererererrererererr.dng', ''),
(29, 'etteteteet', '', 'Category1', 'Subcategory11', '', 0, 0, '.png', ''),
(30, '#a016666', 'probiotin', 'Category2', 'Subcategory22', 'herbalife', 600, 30, 'probiotin.jpg', '56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
