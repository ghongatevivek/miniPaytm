-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 04:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paytm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transfer`
--

CREATE TABLE `tbl_transfer` (
  `t_id` int(11) NOT NULL,
  `t_orderid` varchar(30) DEFAULT '---',
  `t_amount` varchar(7) NOT NULL,
  `t_description` varchar(100) DEFAULT NULL,
  `t_date` varchar(10) NOT NULL,
  `u_from` int(11) DEFAULT NULL,
  `u_to` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transfer`
--

INSERT INTO `tbl_transfer` (`t_id`, `t_orderid`, `t_amount`, `t_description`, `t_date`, `u_from`, `u_to`) VALUES
(60, 'ORDS41148952', '10.00', NULL, '20-05-24', NULL, 3),
(61, 'ORDS86828296', '10.00', NULL, '20-05-24', NULL, 2),
(62, 'ORDS20729750', '1200.00', NULL, '20-05-24', NULL, 2),
(63, 'ORDS22280985', '10.00', NULL, '20-05-24', NULL, 2),
(64, 'ORDS49366984', '200.00', NULL, '20-05-24', NULL, 3),
(65, '---', '10', '54', '20-05-26', 3, 1),
(66, '---', '10', 'vivek', '20-05-26', 3, 1),
(67, '---', '10', 'df', '20-05-26', 3, 1),
(68, '---', '60', 'ff', '20-05-26', 3, 1),
(69, '---', '10', 'vivek', '20-05-26', 3, 2),
(70, '---', '60', 'For Recharger', '20-05-26', 2, 3),
(71, '---', '10', 'for vivek', '20-05-26', 2, 1),
(72, '---', '10', 'for vivek Ghogate', '20-05-26', 2, 1),
(73, '---', '10', 'for VIVEK PATIL', '20-05-26', 2, 3),
(74, '---', '15', 'For First Balance', '20-06-08', 2, 4),
(76, 'ORDS54996314', '25.00', NULL, '20-08-13', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(25) NOT NULL,
  `u_phone` varchar(13) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_balance` varchar(5) NOT NULL,
  `u_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`u_id`, `u_name`, `u_phone`, `u_email`, `u_balance`, `u_password`) VALUES
(1, 'vivek', '7405417021', 'vivek@gmail.com', '80', '123'),
(2, 'Prashant', '9714353108', 'prashant@gmail.com', '180', '202cb962ac59075b964b07152d234b70'),
(3, 'VIVEK PATIL', '1234567892', 'v@v.v', '260', '250cf8b51c773f3f8dc8b4be867a9a02'),
(4, 'Raju Ghongate', '9824892894', 'r@gmail.com', '15', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_transfer`
--
ALTER TABLE `tbl_transfer`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `u_from` (`u_from`),
  ADD KEY `u_to` (`u_to`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_transfer`
--
ALTER TABLE `tbl_transfer`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_transfer`
--
ALTER TABLE `tbl_transfer`
  ADD CONSTRAINT `tbl_transfer_ibfk_1` FOREIGN KEY (`u_from`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_transfer_ibfk_2` FOREIGN KEY (`u_to`) REFERENCES `tbl_user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
