-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 11, 2019 at 09:20 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `art_gallery`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `display`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `display` ()  SELECT * from CUSTOMER$$

DROP PROCEDURE IF EXISTS `GetAge`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAge` ()  BEGIN 
SELECT *, year(CURRENT_DATE())-year(DOB) as age from CUSTOMER;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `artistid` varchar(20) NOT NULL,
  `gid` varchar(20) DEFAULT NULL,
  `custid` varchar(20) DEFAULT NULL,
  `eid` varchar(20) DEFAULT NULL,
  `fname1` char(25) DEFAULT NULL,
  `lname1` char(25) DEFAULT NULL,
  `birthplace` char(25) DEFAULT NULL,
  `style` char(25) DEFAULT NULL,
  PRIMARY KEY (`artistid`),
  KEY `gid` (`gid`),
  KEY `eid` (`eid`),
  KEY `custid` (`custid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artistid`, `gid`, `custid`, `eid`, `fname1`, `lname1`, `birthplace`, `style`) VALUES
('ART1', 'MM123', 'AT2000', 'AD22', 'Georgia', 'O Keeffe', 'USA', 'Oil on Canvas'),
('ART2', 'TLM123', 'AR1998', 'AD55', 'Pablo', 'Picasso', 'Spain', 'Analytic Cubism'),
('ART3', 'BM123', 'AD1998', 'AD88', 'Rembrandt', 'van Rijn', 'Netherlands', 'Oil Painting'),
('ART4', 'JG123', 'AM1994', 'AD00', 'Theodore', 'Chasseriau', 'France', 'Oil Painting'),
('ART5', 'NG123', 'PM1996', 'AD11', 'Leonardo', 'da Vinci', 'Italy', 'High Renaissance');

-- --------------------------------------------------------

--
-- Table structure for table `artwork`
--

DROP TABLE IF EXISTS `artwork`;
CREATE TABLE IF NOT EXISTS `artwork` (
  `artid` varchar(20) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `type_of_art` varchar(20) DEFAULT NULL,
  `price` varchar(15) DEFAULT NULL,
  `eid` varchar(20) DEFAULT NULL,
  `gid` varchar(20) DEFAULT NULL,
  `artistid` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`artid`),
  KEY `eid` (`eid`),
  KEY `gid` (`gid`),
  KEY `artistid` (`artistid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artwork`
--

INSERT INTO `artwork` (`artid`, `title`, `year`, `type_of_art`, `price`, `eid`, `gid`, `artistid`) VALUES
('AW12', 'Mona Lisa', '1503', 'Painting', '10,00,00,000', 'G123', 'NG123', 'AD11'),
('AW34', 'Poppies', '1873', 'Painting', '1,50,00,000', 'H123', 'MM123', 'AD22'),
('AW56', 'Guernica', '1937', 'Painting', '2,50,00,000', 'I123', 'TLM123', 'AD55'),
('AW78', 'The Night Watch', '1642', 'Painting', '90,00,000', 'J123', 'BM123', 'AD88'),
('AW90', 'Two Sisters', '2010', 'Sculpture', '2,00,000', 'K123', 'JG123', 'AD00'),
('a111', 'ttt', '2018', 'tyse', '2000000000', 'E11', 'G11', 'ar1');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `CUSTID` varchar(20) DEFAULT NULL,
  `PHONE` varchar(12) DEFAULT NULL,
  KEY `CUSTID` (`CUSTID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`CUSTID`, `PHONE`) VALUES
('AT2000', '9456805776'),
('AR1998', '8073271337'),
('AD1998', '9980904736'),
('AM1994', '7737564076'),
('PM1996', '8002391707');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `custid` varchar(20) NOT NULL,
  `gid` varchar(20) DEFAULT NULL,
  `artid` varchar(20) DEFAULT NULL,
  `fname` char(25) DEFAULT NULL,
  `lname` char(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` char(25) DEFAULT NULL,
  PRIMARY KEY (`custid`),
  KEY `gid` (`gid`),
  KEY `artid` (`artid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custid`, `gid`, `artid`, `fname`, `lname`, `dob`, `address`) VALUES
('AT2000', 'MM123', 'AD22', 'Akshay', 'Thakur', '2000-04-16', 'New York'),
('AR1998', 'TLM123', 'AD55', 'Ashutosh', 'Ranjan', '1998-02-04', 'Paris'),
('AD1998', 'BM123', 'AD88', 'Ayush', 'Dhar', '1998-09-28', 'London'),
('AM1994', 'JG123', 'AD00', 'Avanish', 'Mehta', '1994-10-05', 'Mumbai'),
('PM1996', 'NG123', 'AD11', 'Ashish', 'Mehta', '1996-06-18', 'Washington');

-- --------------------------------------------------------

--
-- Table structure for table `exhibition`
--

DROP TABLE IF EXISTS `exhibition`;
CREATE TABLE IF NOT EXISTS `exhibition` (
  `eid` varchar(20) NOT NULL,
  `gid` varchar(20) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  PRIMARY KEY (`eid`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exhibition`
--

INSERT INTO `exhibition` (`eid`, `gid`, `startdate`, `enddate`) VALUES
('H123', 'BM123', '2018-12-21', '2019-01-05'),
('I123', 'MM123', '2019-01-25', '2019-02-05'),
('G123', 'NG123', '2018-12-01', '2018-12-15'),
('J123', 'TLM123', '2018-12-15', '2019-01-15'),
('K123', 'JG123', '2019-03-09', '2019-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `gid` varchar(26) NOT NULL DEFAULT 'not null',
  `gname` varchar(24) DEFAULT NULL,
  `location` varchar(26) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gid`, `gname`, `location`) VALUES
('NG123', 'NATIONAL GALLERY', 'Washington'),
('BM123', 'BRITISH MUSEUM', 'London'),
('JG123', 'JAHANGIR GALLERY', 'Mumbai'),
('TLM123', 'THE LOUVRE MUSEUM', 'Paris'),
('MM123', 'METROPOLITAN MUSEUM', 'New York');

--
-- Triggers `gallery`
--
DROP TRIGGER IF EXISTS `UPPERCASE`;
DELIMITER $$
CREATE TRIGGER `UPPERCASE` BEFORE INSERT ON `gallery` FOR EACH ROW BEGIN
              SET NEW.gname=UPPER(NEW.gname);
              END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
