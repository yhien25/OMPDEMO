-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2015 at 07:26 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_omp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` text NOT NULL,
  `prod_category` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `picture`, `prod_category`) VALUES
(1, 'mobile.png', 'Mobile'),
(2, 'computer.png', 'Computers'),
(3, 'clotes.png', 'Clothes'),
(4, 'pets.png', 'Pets'),
(5, 'motorcyle.png', 'Motorcycles'),
(6, 'appliances.png', 'Appliances'),
(7, 'furmiture.png', 'Furnitures'),
(8, 'babystuff.png', 'Baby Stuff'),
(9, 'cars.png', 'Cars'),
(10, 'realestate.png', 'Real Estate'),
(11, 'services.png', 'Services'),
(13, 'hobbies.PNG', 'Hobbies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_name` text NOT NULL,
  `prod_category` text NOT NULL,
  `price` float NOT NULL,
  `decription` text NOT NULL,
  `contact_number` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_posted` date NOT NULL,
  `condition` text NOT NULL,
  `muni_city` text NOT NULL,
  `province` text NOT NULL,
  `seller` text NOT NULL,
  `picture1` text NOT NULL,
  `picture2` text NOT NULL,
  `picture3` text NOT NULL,
  `picture4` text NOT NULL,
  `picture5` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `prod_name`, `prod_category`, `price`, `decription`, `contact_number`, `email`, `date_posted`, `condition`, `muni_city`, `province`, `seller`, `picture1`, `picture2`, `picture3`, `picture4`, `picture5`, `status`) VALUES
(2, 'Wft906stg 9kls l.g fully automatic washing machine', 'Appliances', 16890, 'For Sale:\r\n\r\nBrand New Spiral Dough Mixers 12kg capacity (with Warranty)\r\n2-speed, single direction, 2hp motor. Patented design. Gear, belt and chain design. Uses toothed belt for non-slip operation.\r\n\r\nOther bakery and food equipment also available. Dough Kneaders, Cake / Planetary mixers, Ovens, Proofers, juice dispensers, soft and hard ice cream machine, slush machine, grillers, fryers, steam showcases, griddles, juicers\r\n\r\nPlease email us at bizinaboxph(at)yahoo,com. You may visit us at 835 Alvarado Street, Binondo, Manila. You may text or call us at 524=0029, 569=18*39, 917*896=5999. Please look for Gilbert. Please call for updated prices.\r\n\r\n**Prices Subject to Change without Prior Notice** ', '09994511418 ', '', '2015-09-16', 'Brand New', 'Las Pinas', 'Metro Manila', 'Aha Ahe', 'ap1.jpg', '', '', '', '', 'Approved'),
(3, 'White Westing House brand washing machine and spin dryer ', 'Appliances', 6000, 'Text me if interested :09175598552', '09175598552', '', '2015-09-20', '2nd Hand (Used)', 'Las Piñas', 'Metro Manila', 'Jhonskie', 'ap_3_1.jpg', 'ap_3_2.jpg', 'ap_3_3.jpg', 'ap_3_4.jpg', 'ap_3_5.jpg', 'Approved'),
(49, 'Wallpaper', 'Services', 10000, 'Wallpaper \r\nyow', '0921212121', 'a@yahoo.com', '2015-09-22', 'Brand New', 'Mabalacat', 'Pampanga', 'Joms', '7.jpg', 'demo-image0.jpg', 'image-slider-2.jpg', 'index.jpg', 'indexaaa.jpg', 'Disapproved'),
(54, 'IPhone 5 64GB Black Openline Complete', 'Mobile', 11900, 'Actual Picture Posted.\r\nCheck ratings. Buy with with confidence. \r\n\r\nIPHONE 5 64Gb Black Openline to all networks(Globe/TM, Smart/TNT, Sun)\r\n\r\n16gb 10k\r\n32gb 11k is also available\r\n\r\n100% Original Apple IPhone\r\n\r\nSlightly used, used for less than a month, almost as good as brand new. Very presentable\r\n\r\nNo Apple ID and iCloud account. Signed out already\r\n\r\nComplete package. Unit, box and complete accessories\r\nEarPods\r\nUSB\r\nWall Charger\r\nManual\r\nHeicard\r\nSim card eject pin\r\n\r\n100% scratch less screen\r\n98-99% sides very presentable\r\n\r\nNever been opened, never been repaired. Guaranteed\r\n\r\nRFS: Into selling since iPHONE 3G\r\n\r\nMeet ups: Trinoma or SM Fairview', '09196543882', 'brando@gmail.com', '2015-09-23', '2nd Hand (Used)', 'balibago', 'Angeles City', 'Brando', 'm1_1.jpg', 'm1_2.jpg', 'm1_3.jpg', 'm1_4.jpg', 'm1_5.jpg', 'Approved'),
(55, 'Koppel 3Tr Floor Mounted Split Type Aircon Latest Model', 'Appliances', 32000, 'KOPPEL 3Tr FLOOR MOUNTED UNIT. LATEST MODEL\r\n\r\nUnit is in excellent condition. Selling for only 32K\r\n\r\nThis is Koppels latest model and is currently being sold in appliance centers nationwide.\r\n\r\nInterested buyers may call me via the numbers posted below.\r\n\r\nThank you as usual for your continued patronage.', '09876543211', 'Go@yahoo.com', '2015-09-24', '2nd Hand (Used)', 'Paranaque', 'Metro Manila', 'Lawrence Go', 'a_3_11.jpg', '', '', '', '', 'Approved'),
(56, 'Orocan DIsh Organizer', 'Appliances', 1000, 'Orocan DIsh Organizer with 2 layers drawer. sta.mesa pick up only.', '09327875338', 'Aladin@gmail.com', '2015-09-24', '2nd Hand (Used)', 'Manila', 'Metro Manila', 'Aladin', '85720633_1_1000x700_orocan-dish-organizer-metro-manila.jpg', '', '', '', '', 'Approved'),
(57, 'Bakery Oven', 'Appliances', 12000, 'Stationary Gas Oven\r\n12 Tray 18,000\r\n8 Tray 17,000\r\n6 Tray 16,000\r\n4 Tray 15,000\r\n2 Tray 12,000\r\n\r\nWE ALSO HAVE:\r\n1  ROTARY OVEN (Diesel or Gas Type)\r\n2 GAS OVEN (Round Type)\r\n3 ELECTRIC OVEN (2 to 6 Tray Capacity)\r\n4 SPIRAL MIXER (8 Kg to 25 Kg)\r\n5 CAKE MIXER ( 5 Qt z to 60 Qt z)', '09263660955', 'Apple@yahoo.com', '2015-09-24', '2nd Hand (Used)', 'Tarlac City', 'Tarlac', 'Apple Sison', 'zxc.jpg', '', '', '', '', 'Approved'),
(77, 'asdsa', 'Computers', 2, 'asdsadsa', '2', 'jaycelcunanan@gmail.com', '2015-09-26', '2nd Hand (Used)', 'asd', 'asdsa', 'asdsad', '', '', '', '', '', 'Pending'),
(78, 'sadsa', 'Clothes', 123, 'asdsad', '123', 'jaycelcunanan@gmail.com', '2015-09-26', 'Brand New', 'asdas', 'asdsa', 'asdsa', '', '', '', '', '', 'Pending'),
(79, 'wewewew', 'Computers', 1, 'a', '2', 'jaycelcunanan@gmail.com', '2015-09-26', '2nd Hand (Used)', 'a', 'a', 's', 'article.png', '123.jpg', 'Nike-2.jpg', 'Nike-SB-Lunar-Stefan-Janoski-Camo-00.jpg', 'download.jpg', 'Pending'),
(80, 'pak', 'Computers', 2, 'asda', '123123123', 'Aladin@gmail.com', '2015-09-26', '2nd Hand (Used)', 'asd', 'asd', 'asd', '', '', '', '', '', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `username`, `password`, `name`, `type`) VALUES
(1, 'omp', '21232f297a57a5a743894a0e4a801fc3', 'Joms_Jaycel', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visitor`
--

CREATE TABLE IF NOT EXISTS `tbl_visitor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `last_active` datetime NOT NULL,
  `active` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_visitor`
--

INSERT INTO `tbl_visitor` (`ID`, `fname`, `lname`, `email`, `number`, `password`, `gender`, `status`, `code`, `last_active`, `active`) VALUES
(10, 'qwewqewq', 'qwewqewq', 'j@yahoo.com', '23232', 'we', 'male', 'Pending', '1784973', '2015-10-29 04:28:57', ''),
(11, 'brenda', 'Mage', 'Mage@gmail.com', '908554928', 'invalid', 'female', 'Pending', '2444458', '2015-10-29 04:28:57', ''),
(14, 'Aha', 'Ahe', 'aga@gmail.com', '9622111322', '12345678', 'male', 'Active', '1337586', '2015-10-29 12:32:46', 'No');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
