-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2017 at 12:10 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `344Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `proposalid` int(5) NOT NULL,
  `questionid` int(5) NOT NULL,
  `question` varchar(50) NOT NULL,
  `score` int(2) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`proposalid`, `questionid`, `question`, `score`, `comment`) VALUES
(1, 50, 'Overall score?', 2, 'hello'),
(1, 51, 'Impact?', 5, 'how are you'),
(2, 50, 'Overall score?', 4, 'hello'),
(2, 51, 'Impact?', 3, 'how are you'),
(3, 50, 'Overall score?', 5, 'hello'),
(3, 51, 'Impact?', 3, 'how are you'),
(4, 50, 'Overall score?', 1, 'hello'),
(4, 51, 'Impact?', 4, 'how are you');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
