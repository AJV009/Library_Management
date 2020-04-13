-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 02:55 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms3`
--

-- --------------------------------------------------------

--
-- Table structure for table `booklnd`
--

CREATE TABLE `booklnd` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `bookid` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booklnd`
--

INSERT INTO `booklnd` (`id`, `uname`, `bookid`, `checkin`, `checkout`, `status`) VALUES
(31, 'qwertyuui', '1', '18/06/19', '18/06/19', 'received'),
(32, 'ajv009', '1', '18/06/19', '18/06/19', 'received'),
(33, 'ajv009', '1', '18/06/19', '18/06/19', 'received'),
(34, 'qwert', '1', '18/06/19', '18/06/19', 'received'),
(35, 'qwert', '3', '18/06/19', '18/06/19', 'received'),
(36, 'ajv009', '1', '18/06/19', '18/06/19', 'received'),
(37, 'ajv009', '1', '18/06/19', '18/06/19', 'received'),
(38, 'ajv009', '1', '18/06/19', '18/06/19', 'received'),
(39, 'ajv009', '1', '18/06/19', '18/06/19', 'received'),
(40, 'ajv009', '1', '18/06/19', '', 'lended'),
(41, 'ajv009', '1', '18/06/19', '', 'lended'),
(42, 'ajv009', '1', '18/06/19', '', 'lended');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `bookid` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`name`, `author`, `isbn`, `price`, `quantity`, `bookid`, `id`) VALUES
('jaimon', 'alphons', '123', '123', '250', '123', 1),
('Letusseee', 'ALphons', '9182736455', '999999999', '123', '987', 2),
('jeva', 'Gaurav', '111', '12', '9999994', '123', 3),
('adventures', 'alphonsjaimon', '111', '222', '333', '444', 8);

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bookid` varchar(100) NOT NULL,
  `checkin` varchar(100) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Guest List';

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`name`, `phone`, `email`, `bookid`, `checkin`, `checkout`, `status`, `id`) VALUES
('qwert', 'qwert', 'qwert', '1', '14/06/19', '', 'received', 15),
('Alphons Jaimon', '9182736455', 'jaimonalphons@gmail.com', '1', '17/06/19', '', 'received', 16),
('Alphons Jaimon', '98342938', 'sjefnsfj', '1', '17/06/19', '', 'received', 17),
('yash', '34u123489', 'kjef', '1', '17/06/19', '', 'received', 18),
('Gaurav', '987654321', 'qwerty', '6', '17/06/19', '17/06/19', 'received', 19),
('pratik', '12345787654321', 'iuyhgfds2wertyjk', '8', '17/06/19', '17/06/19', 'received', 20),
('qwert', '123456', 'qwertyui', '2', '17/06/19', '17/06/19', 'received', 22),
('sefkjn', '29387', 'kjadn', '1', '17/06/19', '17/06/19', 'received', 23),
('ajv', '12345', 'ajv', '1', '18/06/19', '18/06/19', 'received', 24),
('ajv', '12345', 'ajv', '1', '18/06/19', '18/06/19', 'received', 25);

-- --------------------------------------------------------

--
-- Table structure for table `msgarray`
--

CREATE TABLE `msgarray` (
  `fromuc` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `touc` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provadn`
--

CREATE TABLE `provadn` (
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `bookid` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provmsg`
--

CREATE TABLE `provmsg` (
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rnbook`
--

CREATE TABLE `rnbook` (
  `name` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rnbook`
--

INSERT INTO `rnbook` (`name`, `author`, `id`) VALUES
('Story of Alphons', 'Alphons Jaimon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `acctype` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User Details';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `username`, `password`, `phone`, `email`, `address`, `acctype`, `id`) VALUES
('XeonAJ', 'ADMIN', 'ADMIN', '8237842347', 'jaimonalphons@gmail.com', 'Wonderland', 'ADMIN', 1),
('Johns Providers', 'PUB', 'PUBG', '918273645555', 'johnspublications@gmail.comm', 'Savedi, Ahmednagar', 'PROVIDER', 3),
('Alphons Jaimon', 'ajv009', 'ajv009', '0987654321', 'qwertyuiop@gmail.com', 'Savedi', 'STUDENT', 4),
('qwerty', 'qwerty', 'qwerty', '1234567890', 'qwe@gmail.com', 'qscfthm', 'STUDENT', 8),
('asdfgh', 'asdfgh', 'asdfgh', '1234567890', 'asdfgh@gmail.com', 'asdfgh', 'STUDENT', 9),
('', 'ALLUC', '', '', '', '', '', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booklnd`
--
ALTER TABLE `booklnd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgarray`
--
ALTER TABLE `msgarray`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provadn`
--
ALTER TABLE `provadn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provmsg`
--
ALTER TABLE `provmsg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rnbook`
--
ALTER TABLE `rnbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booklnd`
--
ALTER TABLE `booklnd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `msgarray`
--
ALTER TABLE `msgarray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provadn`
--
ALTER TABLE `provadn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provmsg`
--
ALTER TABLE `provmsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rnbook`
--
ALTER TABLE `rnbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
