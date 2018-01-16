-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2018 at 06:25 PM
-- Server version: 5.5.45
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `books-bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id_b` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `author` varchar(32) NOT NULL,
  `year` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  PRIMARY KEY (`id_b`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=597 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id_b`, `title`, `author`, `year`, `pages`) VALUES
(588, '198411', 'George Orwell ', 1963, 1963),
(589, '1984', 'George Orwell ', 1963, 1963),
(590, 'Animal Farm', 'George Orwell', 1966, 1966),
(591, 'Catch-22 (Catch-22, #1)', ' Joseph Heller', 1976, 1976),
(592, 'Lord of the Flies', 'William Golding', 1977, 1977),
(593, 'The Grapes of Wrath', ' John Steinbeck ', 1977, 1977),
(594, 'The Catcher in the Rye', 'J.D. Salinger', 1983, 1983),
(595, 'The Great Gatsby', 'F. Scott Fitzgerald', 1993, 1993),
(596, 'The Lord of the Rings (The Lord ', 'J.R.R. Tolkien', 1963, 1963);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
