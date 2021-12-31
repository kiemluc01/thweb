-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2021 at 11:39 AM
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
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `idFinance` int(11) NOT NULL,
  `idND` int(11) DEFAULT NULL,
  `Thang` int(11) DEFAULT NULL CHECK (`Thang` >= 1 and `Thang` <= 12),
  `Nam` int(11) DEFAULT NULL,
  `salary` decimal(10,0) DEFAULT 0 CHECK (`salary` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`idFinance`, `idND`, `Thang`, `Nam`, `salary`) VALUES
(1, 1, 11, 2021, '3000000'),
(2, 1, 10, 2021, '2500000'),
(3, 1, 9, 2021, '2000000'),
(4, 1, 12, 2021, '3500000'),
(8, 1, 8, 2021, '4000000'),
(9, 1, 7, 2021, '5000000'),
(10, 2, 8, 2021, '2500000'),
(11, 2, 9, 2021, '3000000'),
(12, 2, 10, 2021, '3200000'),
(13, 2, 11, 2021, '3500000'),
(14, 2, 12, 2021, '5000000');

--
-- Triggers `finance`
--
DELIMITER $$
CREATE TRIGGER `add_salary` AFTER INSERT ON `finance` FOR EACH ROW update tblmoney set save = save+0.1*(NEW.salary), balance = balance + 0.9*(NEW.salary) where idND = NEW.idND
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_salary` BEFORE DELETE ON `finance` FOR EACH ROW update tblmoney set save = save-0.1*(OLD.salary), balance = balance - 0.9*(OLD.salary) where idND = OLD.idND
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_balance` AFTER UPDATE ON `finance` FOR EACH ROW update tblmoney set balance = (0.9*(select sum(salary) from finance where idND = NEW.idND)) - (select sum(tongtien) from tblspend where idND = NEW.idND) where idND = NEW.idND
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_save` AFTER UPDATE ON `finance` FOR EACH ROW update tblmoney set save = 0.1*(select sum(salary) from finance where idND = NEW.idND) where  idND = NEW.idND
$$
DELIMITER ;

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
  `IMG` varchar(500) NOT NULL DEFAULT 'Public/images/AVT_person.jpg',
  `BGR` varchar(500) DEFAULT 'Public/images/BGR_person.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccount`
--

INSERT INTO `tblaccount` (`id`, `TenND`, `email`, `NS`, `GT`, `username`, `pass`, `IMG`, `BGR`) VALUES
(1, 'Nguyễn Kiêm Lực', 'kiemluc01it.java@gmail.com', '2001-11-16', 'Nam', 'kiemluc01', '123456', 'Public/images/QuanSu_k19.jpg', 'Public/images/IMG_1605501676685_1605523827538.jpg'),
(2, 'Nguyễn Văn Thuấn', 'vanthun1201@gmail.com', '2000-01-12', 'Nam', 'vanthun1201', 'vanthuan1201', 'https://scontent.fdad3-1.fna.fbcdn.net/v/t1.18169-9/c0.23.206.206a/p206x206/27752281_188290905101039_114483193824289620_n.jpg?_nc_cat=103&ccb=1-5&_nc_sid=da31f3&_nc_ohc=usHASBH-tuAAX9HQq4h&tn=MvuuUd0jIYmVOa9B&_nc_ht=scontent.fdad3-1.fna&oh=00_AT9u4mF-yLOEQkZKVfovEEnsEATl3t0LNWv4UWo8e1zOVg&oe=61EE9568', 'https://scontent.fdad3-4.fna.fbcdn.net/v/t1.6435-9/81985488_2501830093436033_7172984392392900608_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=ad2b24&_nc_ohc=-d9vXWFnWKEAX_Hff08&_nc_ht=scontent.fdad3-4.fna&oh=00_AT9Zjm-cohfFRCUrSPu-lSNzO2JgfuoP24Caak2nHIXfjw&oe=61EEC738'),
(4, 'Lươn Nguyễn Thị Thanh Vân', 'thanhvan1910@gmail.com', '2001-10-19', 'Nữ', 'thanhvan1910', '19102001', 'https://scontent.fdad3-1.fna.fbcdn.net/v/t39.30808-6/269729765_1231783200642537_4837521625015188169_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=P0s2i-tdJu0AX9T6I43&_nc_oc=AQlfHRIWgWcGVEkwlvCxU5tes-4F0g8FkvKVuTmq7YT3LUys2aFFtboSgaIwJIDuWa0&_nc_ht=scontent.fdad3-1.fna&oh=00_AT9Dz2zR82XtR6h3zYYOYTTZh4tIBSKD_IYG3O0AZe2Wfw&oe=61CEB166', 'https://scontent.fdad3-2.fna.fbcdn.net/v/t39.30808-6/p180x540/237758298_1151082812045910_3526652066999300285_n.jpg?_nc_cat=108&ccb=1-5&_nc_sid=e3f864&_nc_ohc=psHiKZNBcc8AX_2Fukh&_nc_ht=scontent.fdad3-2.fna&oh=00_AT_jatBiXYm0OsIBwkcSun2z57InWJefxm0avSAclDOuUg&oe=61CE6088');

--
-- Triggers `tblaccount`
--
DELIMITER $$
CREATE TRIGGER `add_user` AFTER INSERT ON `tblaccount` FOR EACH ROW insert into tblmoney values(null,NEW.id,0,0)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_user` BEFORE DELETE ON `tblaccount` FOR EACH ROW delete from tblmoney where idND = OLD.id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblmoney`
--

CREATE TABLE `tblmoney` (
  `idMoney` int(11) NOT NULL,
  `idND` int(11) DEFAULT NULL,
  `save` decimal(10,0) DEFAULT 0,
  `balance` decimal(10,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmoney`
--

INSERT INTO `tblmoney` (`idMoney`, `idND`, `save`, `balance`) VALUES
(1, 1, '2000000', '17000000'),
(2, 2, '1720000', '15480000'),
(3, 4, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblspend`
--

CREATE TABLE `tblspend` (
  `id` int(11) NOT NULL,
  `idND` int(11) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `tongtien` decimal(10,0) DEFAULT NULL CHECK (`tongtien` >= 0),
  `ngaymua` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblspend`
--

INSERT INTO `tblspend` (`id`, `idND`, `noidung`, `tongtien`, `ngaymua`) VALUES
(1, 1, 'ăn trưa', '30000', '0000-00-00'),
(2, 1, 'sinh nhật bạn', '200000', '2021-12-31'),
(4, 1, 'du lịch', '770000', '2021-11-16'),
(5, 2, NULL, '0', '2021-12-31');

--
-- Triggers `tblspend`
--
DELIMITER $$
CREATE TRIGGER `add_spend` AFTER INSERT ON `tblspend` FOR EACH ROW update tblmoney set balance = balance - NEW.tongtien where idND = NEW.idND
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_spend` BEFORE DELETE ON `tblspend` FOR EACH ROW update tblmoney set balance = balance + OLD.tongtien where idND = OLD.idND
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `spend` AFTER UPDATE ON `tblspend` FOR EACH ROW update tblmoney set balance = (0.9*(select sum(salary) from finance where idND = NEW.idND)) - (select sum(tongtien) from tblspend where idND = NEW.idND) where idND = NEW.idND
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`idFinance`),
  ADD KEY `idND` (`idND`);

--
-- Indexes for table `tblaccount`
--
ALTER TABLE `tblaccount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tblmoney`
--
ALTER TABLE `tblmoney`
  ADD PRIMARY KEY (`idMoney`),
  ADD KEY `idND` (`idND`);

--
-- Indexes for table `tblspend`
--
ALTER TABLE `tblspend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idND` (`idND`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `idFinance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblaccount`
--
ALTER TABLE `tblaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblmoney`
--
ALTER TABLE `tblmoney`
  MODIFY `idMoney` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblspend`
--
ALTER TABLE `tblspend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `finance`
--
ALTER TABLE `finance`
  ADD CONSTRAINT `finance_ibfk_1` FOREIGN KEY (`idND`) REFERENCES `tblaccount` (`id`);

--
-- Constraints for table `tblmoney`
--
ALTER TABLE `tblmoney`
  ADD CONSTRAINT `tblmoney_ibfk_1` FOREIGN KEY (`idND`) REFERENCES `tblaccount` (`id`);

--
-- Constraints for table `tblspend`
--
ALTER TABLE `tblspend`
  ADD CONSTRAINT `tblspend_ibfk_1` FOREIGN KEY (`idND`) REFERENCES `tblaccount` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
