-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 04:32 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`id`, `address`, `phone`, `email`) VALUES
(2, '71/1 polashnagar', '01515283568', 'hossainalamin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Alamin hossain', 'admin', 'admin@gamil.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(3, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand_img`
--

CREATE TABLE `tbl_brand_img` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand_img`
--

INSERT INTO `tbl_brand_img` (`brandId`, `brandName`) VALUES
(20, 'uploads/c623a9e01c.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(2, '0taq089ka494dvtnvos49mrf55', 20, 'Mango', 120.000, 2, 'uploads/a48eab171d.png'),
(4, '0taq089ka494dvtnvos49mrf55', 21, 'Meat', 500.000, 1, 'uploads/fe3d3f4854.png'),
(5, '0taq089ka494dvtnvos49mrf55', 22, 'Banana', 40.000, 1, 'uploads/93910d9753.png'),
(6, '8k3qgriiqbgn4fsalnpk8cb5qd', 21, 'Meat', 500.000, 1, 'uploads/fe3d3f4854.png'),
(7, '8k3qgriiqbgn4fsalnpk8cb5qd', 20, 'Mango', 120.000, 1, 'uploads/a48eab171d.png'),
(8, '8k3qgriiqbgn4fsalnpk8cb5qd', 19, 'Dell inspiration', 100.000, 1, 'uploads/35d973dc3e.png'),
(9, '8k3qgriiqbgn4fsalnpk8cb5qd', 18, 'Water milon', 120.000, 1, 'uploads/cc70e30715.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_catagory`
--

CREATE TABLE `tbl_catagory` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_catagory`
--

INSERT INTO `tbl_catagory` (`catId`, `catName`) VALUES
(12, 'Fresh meat'),
(13, 'Vagitable'),
(14, 'Fruits'),
(15, 'Grocerries'),
(16, 'Cosmetics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(40) NOT NULL,
  `session` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `session`, `phone`, `email`, `password`) VALUES
(2, 'Yeasin Arafat', '71/1 polashnagar', 'Mirpur', 'Bangladesh', '1243', '01515283568', 'alamin@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 'alamin', '71/1 polashnagar', 'Mirpur-12', '', '8k3qgriiqbgn4fsalnpk8cb5qd', '01934987143', 'csejnualamin33@gmail.com', ''),
(7, 'Yeasin Arafat', '71/1 polashnagar', 'Mirpur', '', '23paa1t1fegu00b0hob78rlphk', '01515283568', 'alamin@gmail.com', ''),
(8, 'Yeasin Arafat', '71/1 polashnagar', 'Mirpur', '', 'h4gjp1dkdenb51s68j07olcpm9', '01515283568', 'alamin@gmail.com', ''),
(9, 'Yeasin Arafat', '71/1 polashnagar', 'Mirpur', '', 'vvr5vfkvce00b822h678os8url', '01515283568', 'alamin@gmail.com', ''),
(10, 'Yeasin Arafat', '71/1 polashnagar', 'Mirpur', '', 'vvr5vfkvce00b822h678os8url', '01515283568', 'alamin@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `bprice` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_offer`
--

INSERT INTO `tbl_offer` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `bprice`, `image`, `type`) VALUES
(23, 'Black Berry', 14, 3, 'This is nice berry', 120.000, 100, 'uploads/bcbcb5e630.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`orderId`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(49, 5, 21, 'Meat', 1, 500.00, 'uploads/fe3d3f4854.png', '2020-11-27 12:47:20', 0),
(51, 5, 19, 'Dell inspiration', 1, 100.00, 'uploads/35d973dc3e.png', '2020-11-27 12:47:20', 0),
(52, 7, 22, 'Banana', 1, 40.00, 'uploads/93910d9753.png', '2020-11-27 15:46:00', 0),
(53, 8, 22, 'Banana', 2, 80.00, 'uploads/93910d9753.png', '2020-11-27 22:48:12', 0),
(54, 9, 21, 'Meat', 2, 1000.00, 'uploads/fe3d3f4854.png', '2020-12-05 21:10:02', 0),
(55, 9, 23, 'Black Berry', 1, 120.00, 'uploads/bcbcb5e630.png', '2020-12-05 21:10:02', 0),
(56, 9, 19, 'Dell inspiration', 1, 100.00, 'uploads/35d973dc3e.png', '2020-12-05 21:10:02', 0),
(57, 9, 20, 'Mango', 1, 120.00, 'uploads/a48eab171d.png', '2020-12-05 21:10:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(17, 'Fresh meat', 10, 9, '&lt;p&gt;edas&lt;/p&gt;', 1200.000, 'uploads/5c5428746e.png', 0),
(18, 'Water milon', 11, 14, '&lt;p&gt;cdczxczx&lt;/p&gt;', 120.000, 'uploads/cc70e30715.png', 0),
(19, 'Dell inspiration', 11, 14, '&lt;p&gt;lporem&lt;/p&gt;', 100.000, 'uploads/35d973dc3e.png', 0),
(20, 'Mango', 11, 0, '&lt;p&gt;Something&lt;/p&gt;', 120.000, 'uploads/a48eab171d.png', 0),
(21, 'Meat', 12, 19, '&lt;p&gt;saas&lt;/p&gt;', 500.000, 'uploads/fe3d3f4854.png', 0),
(22, 'Banana', 14, 19, '&lt;p&gt;Saas&lt;/p&gt;', 40.000, 'uploads/93910d9753.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_brand_img`
--
ALTER TABLE `tbl_brand_img`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brand_img`
--
ALTER TABLE `tbl_brand_img`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_catagory`
--
ALTER TABLE `tbl_catagory`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
