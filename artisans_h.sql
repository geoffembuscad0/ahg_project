-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2014 at 11:27 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `artisans_h`
--
CREATE DATABASE IF NOT EXISTS `artisans_h` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `artisans_h`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(22) NOT NULL DEFAULT '',
  `user_pass` char(40) NOT NULL,
  `firstname` varchar(55) DEFAULT NULL,
  `lastname` varchar(55) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `usr_lvl` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `user_pass`, `firstname`, `lastname`, `email`, `usr_lvl`) VALUES
('11-234103', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Geoffrey', 'Embuscado', 'geoff.embuscado@yahoo.com.ph', 2),
('artistic_admin', 'c70e218e1b7c49294f0cdf6b3edf473c8b0a30de', 'Christine Faith', 'Jupia', 'christine.jupia@my.jru.edu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_no` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`category_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_no`, `name`) VALUES
(1, 'Main Product'),
(2, 'Sub Product');

-- --------------------------------------------------------

--
-- Table structure for table `customer_information`
--

CREATE TABLE IF NOT EXISTS `customer_information` (
  `customer_id` varchar(25) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `order_id` bigint(20) unsigned zerofill DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_information`
--

INSERT INTO `customer_information` (`customer_id`, `firstname`, `lastname`, `contact_no`, `email`, `ip_address`, `order_id`) VALUES
('11-234103', 'Geoffrey', 'Embuscado', '09203231244', 'geoffrey.embuscado@y', '127.0.0.1', 00000000000000000001);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` bigint(20) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(25) DEFAULT NULL,
  `total_price` float DEFAULT NULL,
  `date_taken` datetime DEFAULT NULL,
  `pay_status` tinyint(4) DEFAULT NULL,
  `product_image` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `total_price`, `date_taken`, `pay_status`, `product_image`) VALUES
(00000000000000000001, '11-234103', 105, '2014-02-05 05:58:15', 0, 'imageproduct.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_features`
--

CREATE TABLE IF NOT EXISTS `order_features` (
  `order_id` bigint(20) unsigned zerofill DEFAULT NULL,
  `feature_no` smallint(5) unsigned zerofill DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_features`
--

INSERT INTO `order_features` (`order_id`, `feature_no`) VALUES
(00000000000000000001, 00003),
(00000000000000000001, 00001),
(00000000000000000001, 00004);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` bigint(20) unsigned zerofill DEFAULT NULL,
  `product_no` smallint(5) unsigned zerofill DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_no`) VALUES
(00000000000000000001, 00001);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_no` smallint(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `description` varchar(175) DEFAULT NULL,
  `category_no` int(11) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `file_img` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`product_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_no`, `name`, `description`, `category_no`, `price`, `file_img`) VALUES
(00001, 'Head Igniter', 'So hairband, very customizable, wow.', 1, '55.00', 'hairband.jpg'),
(00003, 'Pick of Destiny', 'Guitar pick necklace.', 2, '20.00', 'guitarpick.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE IF NOT EXISTS `product_colors` (
  `color_p_id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(75) DEFAULT NULL,
  `product_no` smallint(5) unsigned zerofill DEFAULT NULL,
  `hexcode` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`color_p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`color_p_id`, `color`, `product_no`, `hexcode`) VALUES
(3, 'transparent', 00003, '#fff'),
(4, 'Peach', 00001, '#ffe5b4'),
(5, 'Pink Lemonade', 00001, '#e4287c'),
(6, 'Purple', 00001, '#8e35ef'),
(7, 'Ocean Blue', 00001, '#2b65ec'),
(8, 'Caramel', 00001, '#c68e17'),
(9, 'Pumpkin Orange', 00001, '#f87217'),
(10, 'Chocolate', 00001, '#c85a17'),
(11, 'Ruby Red', 00001, '#f62217'),
(12, 'Pearl', 00001, '#fdeef4'),
(13, 'Jade Green', 00001, '#5efb63');

-- --------------------------------------------------------

--
-- Table structure for table `product_custom_feature`
--

CREATE TABLE IF NOT EXISTS `product_custom_feature` (
  `feature_no` smallint(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `feature` varchar(75) DEFAULT NULL,
  `product_no` smallint(5) unsigned zerofill DEFAULT NULL,
  `img_file` varchar(75) DEFAULT NULL,
  `feature_price` decimal(8,2) DEFAULT NULL,
  `part` int(11) DEFAULT NULL,
  PRIMARY KEY (`feature_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product_custom_feature`
--

INSERT INTO `product_custom_feature` (`feature_no`, `feature`, `product_no`, `img_file`, `feature_price`, `part`) VALUES
(00001, 'Cat Ears', 00001, 'cat_ears.png', '0.00', 1),
(00002, 'Rabbit Ears', 00001, 'rabbit_ears.png', '0.00', 1),
(00003, 'w/ LED', 00001, 'LED_lights.png', '50.00', 2),
(00004, 'Cap', 00001, 'cap.png', '0.00', 2),
(00005, 'Dog Ears', 00001, 'dog_ears.png', '0.00', 1),
(00006, 'w/ Ribbon', 00001, 'ribbon.png', '0.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_design`
--

CREATE TABLE IF NOT EXISTS `product_design` (
  `model_code` tinyint(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(75) DEFAULT NULL,
  `description` varchar(175) DEFAULT NULL,
  `img_file` varchar(75) DEFAULT NULL,
  `product_no` smallint(5) unsigned zerofill DEFAULT NULL,
  `design_price` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`model_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product_design`
--

INSERT INTO `product_design` (`model_code`, `name`, `description`, `img_file`, `product_no`, `design_price`) VALUES
(001, 'Plain', NULL, 'plain', 00001, '55.00'),
(002, 'Night Bunny', 'w/ LED on the ears.', 'bunnyLED', 00001, '120.00'),
(003, 'Big Ribbon', NULL, 'bigribbon', 00001, '75.00'),
(004, 'Meow', NULL, 'meow', 00001, '55.00'),
(009, 'Bunny', NULL, 'rabbit', 00001, '75.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_feature`
--

CREATE TABLE IF NOT EXISTS `product_feature` (
  `product_no` smallint(5) unsigned zerofill DEFAULT NULL,
  `spec` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_part`
--

CREATE TABLE IF NOT EXISTS `product_part` (
  `part` int(11) NOT NULL AUTO_INCREMENT,
  `part_name` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`part`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_part`
--

INSERT INTO `product_part` (`part`, `part_name`) VALUES
(1, 'ears'),
(2, 'accessories[]'),
(3, 'cap');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE IF NOT EXISTS `product_sizes` (
  `size_code` tinyint(4) NOT NULL AUTO_INCREMENT,
  `size` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`size_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`size_code`, `size`) VALUES
(1, 'small'),
(2, 'medium'),
(3, 'large');

-- --------------------------------------------------------

--
-- Table structure for table `product_to_category`
--

CREATE TABLE IF NOT EXISTS `product_to_category` (
  `product_no` smallint(5) unsigned zerofill DEFAULT NULL,
  `category_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `usr_lvl` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`usr_lvl`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`usr_lvl`, `label`) VALUES
(1, 'Admin'),
(2, 'Customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
