-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2019 at 10:02 AM
-- Server version: 10.1.40-MariaDB
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
-- Database: `rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `joints`
--

CREATE TABLE `joints` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `area` varchar(25) NOT NULL,
  `contact` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joints`
--

INSERT INTO `joints` (`id`, `name`, `address`, `area`, `contact`) VALUES
(242300, 'Kanna Cool Bar', '330, Bashyam Road, Triplicane, Chennai', 'Triplicane', 43587229),
(8997, 'Fried Saurkrauts', '1969, Rick Avenue, Taramani', 'Taramani', 2784322),
(4747, 'Tongue', '2802, Kelambakkam Road, Kandigai', 'Kandigai', 90033667),
(2034, 'Bawaa', '202, Kelambs Lane, Vandalur', 'Vandalur', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
