-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2021 at 05:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CedHosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(44) NOT NULL,
  `blog_desc` text NOT NULL,
  `blog_date` datetime NOT NULL,
  `author_name` varchar(44) NOT NULL DEFAULT 'Anonymous',
  `caption_img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company_info`
--

CREATE TABLE `tbl_company_info` (
  `id` int(11) NOT NULL,
  `comp_name` varchar(55) NOT NULL,
  `comp_logo` varchar(1000) NOT NULL,
  `comp_contact` varchar(33) NOT NULL,
  `comp_email` varchar(33) NOT NULL,
  `comp_address` varchar(500) NOT NULL,
  `comp_city` varchar(44) NOT NULL,
  `comp_state` varchar(100) NOT NULL,
  `comp_pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company_info`
--

INSERT INTO `tbl_company_info` (`id`, `comp_name`, `comp_logo`, `comp_contact`, `comp_email`, `comp_address`, `comp_city`, `comp_state`, `comp_pincode`) VALUES
(1, 'Cedcoss', 'logo', '9999999999', 'info@cedcoss.com', '3/460, First Floor, Vishwas Khand, Gomti Nagar', 'Lucknow', 'Uttar Pradesh', 226010);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_billing_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `promocode_applied_id` int(11) NOT NULL,
  `discount_amt` float NOT NULL,
  `total_amt_after_dis` float NOT NULL,
  `tax_amt` float NOT NULL,
  `final_invoice_amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `user_id`, `user_billing_id`, `order_date`, `status`, `promocode_applied_id`, `discount_amt`, `total_amt_after_dis`, `tax_amt`, `final_invoice_amt`) VALUES
(17, 6, 21, '2021-01-22 16:48:37', 0, 0, 0, 118, 18, 118),
(18, 5, 22, '2021-01-22 17:00:58', 0, 0, 0, 3065.64, 467.64, 3065.64),
(20, 5, 24, '2021-01-22 17:06:28', 0, 0, 0, 1180, 180, 1180),
(21, 5, 25, '2021-01-22 17:10:02', 0, 0, 0, 1650.82, 251.82, 1650.82),
(23, 5, 27, '2021-01-22 17:22:25', 0, 0, 0, 118, 18, 118),
(24, 5, 28, '2021-01-22 17:25:46', 0, 0, 0, 1650.82, 251.82, 1650.82),
(25, 5, 30, '2021-02-05 15:48:19', 0, 0, 0, 118, 18, 118),
(26, 5, 43, '2021-02-05 17:37:57', 0, 0, 0, 118, 18, 118);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `prod_parent_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `link` longtext DEFAULT NULL,
  `prod_available` tinyint(1) NOT NULL,
  `prod_launch_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `prod_parent_id`, `prod_name`, `link`, `prod_available`, `prod_launch_date`) VALUES
(1, 0, 'Hosting', NULL, 1, '2020-12-09 14:34:49'),
(2, 1, 'Linux hosting', '<li><span>Unlimited </span> Domains, Disk Space, Bandwidth and Email Addresses</li>\r\n									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>\r\n									<li><span>Powered by </span> CloudLinux, cPanel (demo), Apache, MySQL, PHP, Ruby & more</li>\r\n									<li><span>Launch  </span> your business with Rs. 2000* Google AdWords Credit *</li>\r\n									<li><span>30 day </span> Money Back Guarantee</li>', 1, '2021-01-12 20:07:47'),
(3, 1, 'WordPress Hosting', '<li><span>Unlimited </span> Domains, Disk Space, Bandwidth and Email Addresses</li>\r\n									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>\r\n									<li><span>Powered by </span> CloudLinux, cPanel (demo), Apache, MySQL, PHP, Ruby & more</li>\r\n									<li><span>Launch  </span> your business with Rs. 2000* Google AdWords Credit *</li>\r\n									<li><span>30 day </span> Money Back Guarantee</li>', 1, '2021-01-12 20:07:47'),
(4, 1, 'Windows Hosting', '<li><span>Unlimited </span> Domains, Disk Space, Bandwidth and Email Addresses</li>\r\n									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>\r\n									<li><span>Powered by </span> CloudLinux, cPanel (demo), Apache, MySQL, PHP, Ruby & more</li>\r\n									<li><span>Launch  </span> your business with Rs. 2000* Google AdWords Credit *</li>\r\n									<li><span>30 day </span> Money Back Guarantee</li>', 1, '2021-01-12 20:07:47'),
(5, 1, 'CMS Hosting', '<li><span>Unlimited </span> Domains, Disk Space, Bandwidth and Email Addresses</li>\r\n									<li><span>99.9% uptime </span> with dedicated 24/7 technical support</li>\r\n									<li><span>Powered by </span> CloudLinux, cPanel (demo), Apache, MySQL, PHP, Ruby & more</li>\r\n									<li><span>Launch  </span> your business with Rs. 2000* Google AdWords Credit *</li>\r\n									<li><span>30 day </span> Money Back Guarantee</li>', 1, '2021-01-13 11:24:14'),
(6, 2, 'Standard', '#', 1, '2021-01-13 14:17:49'),
(11, 3, 'Standard', '#', 1, '2021-01-14 14:11:56'),
(13, 4, 'Standard', '#', 1, '2021-01-15 11:53:09'),
(15, 5, 'Standard', '#', 1, '2021-01-15 11:54:32'),
(16, 2, 'Advances', '#', 1, '2021-01-15 11:59:04'),
(25, 1, 'Advances', '<p>regs</p>', 1, '2021-02-05 17:39:25'),
(26, 25, 'GHGG', '', 1, '2021-02-05 17:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_description`
--

CREATE TABLE `tbl_product_description` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `mon_price` float NOT NULL,
  `annual_price` float NOT NULL,
  `sku` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_description`
--

INSERT INTO `tbl_product_description` (`id`, `prod_id`, `description`, `mon_price`, `annual_price`, `sku`) VALUES
(1, 6, '{\"webspace\":\"2\",\"bandwidth\":\"10\",\"freedomain\":\"0\",\"technology\":\"php\",\"mailbox\":\"0\"}', 100, 1000, 'LH001'),
(2, 11, '{\"webspace\":\"1\",\"bandwidth\":\"5\",\"freedomain\":\"0\",\"technology\":\"php\",\"mailbox\":\"1\"}', 150, 1199, 'WP001'),
(4, 13, '{\"webspace\":\"2\",\"bandwidth\":\"5\",\"freedomain\":\"1\",\"technology\":\"PHP, MYSQL\",\"mailbox\":\"1\"}', 99, 999, 'W001'),
(6, 15, '{\"webspace\":\"3\",\"bandwidth\":\"7\",\"freedomain\":\"1\",\"technology\":\"PHP, MYSQL\",\"mailbox\":\"1\"}', 99, 1999, 'CM001'),
(7, 16, '{\"webspace\":\"5\",\"bandwidth\":\"11\",\"freedomain\":\"1\",\"technology\":\"PHP, MYSQL\",\"mailbox\":\"2\"}', 199, 1399, 'L002'),
(8, 26, '{\"webspace\":\"58\",\"bandwidth\":\"5\",\"freedomain\":\"5\",\"technology\":\"PHP, MYSQL\",\"mailbox\":\"5\"}', 55, 555, '555');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(22) NOT NULL,
  `max_discount` int(11) NOT NULL,
  `code` varchar(55) NOT NULL,
  `expiry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `activation_time` datetime NOT NULL,
  `tenure` char(1) NOT NULL,
  `expiry_time` datetime NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `name`) VALUES
(1, 'ANDHRA PRADESH'),
(2, 'ASSAM'),
(3, 'ARUNACHAL PRADESH'),
(4, 'GUJRAT'),
(5, 'BIHAR'),
(6, 'HARYANA'),
(7, 'HIMACHAL PRADESH'),
(8, 'JAMMU & KASHMIR'),
(9, 'KARNATAKA'),
(10, 'KERALA'),
(11, 'MADHYA PRADESH'),
(12, 'MAHARASHTRA'),
(13, 'MANIPUR'),
(14, 'MEGHALAYA'),
(15, 'MIZORAM'),
(16, 'NAGALAND'),
(17, 'ORISSA'),
(18, 'PUNJAB'),
(19, 'RAJASTHAN'),
(20, 'SIKKIM'),
(21, 'TAMIL NADU'),
(22, 'TRIPURA'),
(23, 'UTTAR PRADESH'),
(24, 'WEST BENGAL'),
(25, 'DELHI'),
(26, 'GOA'),
(27, 'PONDICHERY'),
(28, 'LAKSHDWEEP'),
(29, 'DAMAN & DIU'),
(30, 'DADRA & NAGAR'),
(31, 'CHANDIGARH'),
(32, 'ANDAMAN & NICOBAR'),
(33, 'UTTARANCHAL'),
(34, 'JHARKHAND'),
(35, 'CHATTISGARH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email_approved` tinyint(1) DEFAULT 0,
  `phone_approved` tinyint(1) DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `is_admin` tinyint(1) NOT NULL,
  `sign_up_date` datetime DEFAULT current_timestamp(),
  `password` varchar(100) NOT NULL,
  `security_question` varchar(100) DEFAULT NULL,
  `security_answer` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `name`, `mobile`, `email_approved`, `phone_approved`, `active`, `is_admin`, `sign_up_date`, `password`, `security_question`, `security_answer`) VALUES
(1, 'admin@gmail.com', 'admin', '9999999999', 1, 1, 1, 1, '2021-01-12 15:22:08', '$2y$10$a4Gt1EPy7GetKdL7ciL3OeKGQKpIqvNd1/BKNM4tqRS4nItGCNM0C', 'What is the name of the company of your first job?', 'cedcoss'),
(5, 'raunak@gmail.com', 'Raunak', '8888888888', 1, 1, 1, 0, '2021-01-12 16:06:23', '$2y$10$MwsdfZ3wvyIAhD7lpb2HWuB.GVaq6NfAr49yuqH0JA61WiVfHoBdq', 'What is your favorite team?', 'india'),
(6, 'raunakyadav@gmail.com', 'Raunak', '8888888888', 1, 1, 1, 0, '2021-01-18 11:27:14', '$2y$10$T5QWgYRh9PLA8laO2Fm3LuvHSd1eQVXIykN0daRgwvfBIXInVt6eC', 'What is your favorite sport?', 'cricket');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_billing_add`
--

CREATE TABLE `tbl_user_billing_add` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_name` varchar(55) NOT NULL,
  `house_no` varchar(55) NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(55) NOT NULL,
  `pincode` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_billing_add`
--

INSERT INTO `tbl_user_billing_add` (`id`, `user_id`, `billing_name`, `house_no`, `city`, `state`, `country`, `pincode`) VALUES
(21, 6, 'Raunak', '98', 'Lucknow', 'RAJASTHAN', 'India', '226010'),
(22, 5, 'Raunak', '65', 'Lucknow', 'UTTAR PRADESH', 'India', '226010'),
(24, 5, 'a', '2321', 'Lucknow', 'KERALA', 'India', '758675'),
(25, 5, 'CedKart', '23', 'Lucknow', 'UTTAR PRADESH', 'India', '897458'),
(27, 5, 'Raunak', '23', 'Lucknow', 'KARNATAKA', 'India', '443543'),
(28, 5, 'CedKart', '23', 'Lucknow', 'UTTAR PRADESH', 'India', '226010'),
(29, 5, '', '', '', '', 'India', ''),
(30, 5, 'Raunak', '23', 'Lucknow', 'KERALA', 'India', '265485'),
(31, 5, '', '', '', '', 'India', ''),
(32, 5, '', '', '', '', 'India', ''),
(33, 5, '', '', '', '', 'India', ''),
(34, 5, '', '', '', '', 'India', ''),
(35, 5, '', '', '', '', 'India', ''),
(36, 5, '', '', '', '', 'India', ''),
(37, 5, '', '', '', '', 'India', ''),
(38, 5, '', '', '', '', 'India', ''),
(39, 5, '', '', '', '', 'India', ''),
(40, 5, '', '', '', '', 'India', ''),
(41, 5, '', '', '', '', 'India', ''),
(42, 5, '', '', '', '', 'India', ''),
(43, 5, '', '23', 'Lucknow', 'ARUNACHAL PRADESH', 'India', '265485');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_billing_add`
--
ALTER TABLE `tbl_user_billing_add`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company_info`
--
ALTER TABLE `tbl_company_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_product_description`
--
ALTER TABLE `tbl_product_description`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_billing_add`
--
ALTER TABLE `tbl_user_billing_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
