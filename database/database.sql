-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 07:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books_details`
--

CREATE TABLE `books_details` (
  `id` int(10) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `bookImg` varchar(100) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `language` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `authorname` varchar(50) NOT NULL,
  `numOfPages` varchar(50) NOT NULL,
  `purchaseDate` varchar(50) NOT NULL,
  `publicationDate` varchar(50) NOT NULL,
  `bookQty` varchar(50) NOT NULL,
  `availableQty` varchar(50) NOT NULL,
  `librarianUsername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_details`
--

INSERT INTO `books_details` (`id`, `ISBN`, `title`, `subject`, `bookImg`, `publisher`, `language`, `price`, `authorname`, `numOfPages`, `purchaseDate`, `publicationDate`, `bookQty`, `availableQty`, `librarianUsername`) VALUES
(11, '170033', 'computer kiramaam', 'story', 'book_images/53d345282593dc27d03a8222d41fa144s-l1600.jpg', 'Kizhakku pathipakam', 'Tamil', '350', 'Sujatha', '177', '26/04/2020', '04/07/2007', '50', '40', 'ps');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `nic`, `date`) VALUES
(1, 'Piraveen ', 'Sivakumar ', 'ps', 'Veensiva10@gmail.com', '1234', '45555554', '0000-00-00'),
(4, 'Piraveen ', 'Sivakumar ', 'sd', 'piraveensivakumar998@gmail.com', '1234', '23232', '0000-00-00'),
(5, 'Shanmu', 'asd', '180596E', 'shanmugabavan25621@gmail.com', '123456', 'dasd', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `firstname`, `lastname`, `username`, `email`, `nic`, `password`, `status`) VALUES
(1, 'Piraveen ', 'Sivakumar ', '180476L', 'Veensiva10@gmail.com', '45555554', '1234', 'No'),
(2, 'Shanmugabavan', 'Shanmugakumar', 'Shanmu', 'shanmugabavan25621@gmail.com', '180596E', 'Shanmu@25621', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_details`
--
ALTER TABLE `books_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_details`
--
ALTER TABLE `books_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
