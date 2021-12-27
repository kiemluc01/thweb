-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2021 at 02:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccount`
--

CREATE TABLE `tblaccount` (
  `id` int(11) NOT NULL,
  `TenND` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL CHECK (`email` like '%_@gmail.com'),
  `NS` date DEFAULT NULL,
  `GT` varchar(5) DEFAULT NULL CHECK (`GT` in ('Nam','Nữ')),
  `username` varchar(50) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `IMG` varchar(500) NOT NULL DEFAULT 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/User-info.svg/1024px-User-info.svg.png',
  `BGR` varchar(500) NOT NULL DEFAULT 'Public/images/BGR_person.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`id`, `TenND`, `email`, `NS`, `GT`, `username`, `pass`, `IMG`, `BGR`) VALUES
(1, 'Nguyễn Kiêm Lực', 'kiemluc01@gmail.com', '2001-11-16', 'Nam', 'kiemluc01', '123', 'https://scontent-hkg4-1.xx.fbcdn.net/v/t1.6435-9/c0.23.206.206a/p206x206/82972501_550740222183194_110579585212481536_n.jpg?_nc_cat=100&ccb=1-5&_nc_sid=da31f3&_nc_ohc=QxroasRCSjsAX_DiNvt&_nc_ht=scontent-hkg4-1.xx&oh=00_AT8Ird5EbqNt2bDz7gBbrhbHJROqcq7dmc47_digFLS98A&oe=61ED2BCD', 'https://scontent.fdad3-5.fna.fbcdn.net/v/t1.6435-9/61365449_405046123419272_5258059694324318208_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=e3f864&_nc_ohc=a9rBiU7rBaUAX8kETw5&tn=MvuuUd0jIYmVOa9B&_nc_ht=scontent.fdad3-5.fna&oh=00_AT8bWEdkCXkkFBjWB09Bmc_uSNSzpVk-eGqnzRwXy-tS8Q&oe=61EE9CD5'),
(2, 'Nguyễn Văn Thuấn', 'vanthun1201@gmail.com', '2000-01-12', 'Nam', 'vanthun1201', '123', 'https://scontent.fdad3-5.fna.fbcdn.net/v/t1.18169-9/c0.23.206.206a/p206x206/27752281_188290905101039_114483193824289620_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=da31f3&_nc_ohc=kZg0OC86rJUAX8p5BbK&tn=MvuuUd0jIYmVOa9B&_nc_ht=scontent.fdad3-5.fna&oh=00_AT-F8GONnBKAg3oZjmRLhsDDhHocV2q1z6opLZ60eE6hPw&oe=61EAA0E8', 'Public/images/BGR_person.jpg'),
(3, NULL, 'lethuthao1107@gmail.com', NULL, NULL, 'thuthao1107', '11072001', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/User-info.svg/1024px-User-info.svg.png', 'Public/images/BGR_person.jpg');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
