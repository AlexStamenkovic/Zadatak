-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 08:17 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prodavnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `cipele`
--

CREATE TABLE `cipele` (
  `sifra` int(5) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `cena` int(5) NOT NULL,
  `velicina` int(2) NOT NULL,
  `kategorija` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `slika` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cipele`
--

INSERT INTO `cipele` (`sifra`, `naziv`, `opis`, `cena`, `velicina`, `kategorija`, `slika`) VALUES
(1, 'CipelaBr1', 'Ovo je cipela broj 1', 4500, 43, 'Muske cipele', 'slika1.jpg'),
(2, 'CipelaBr2', 'Ovo je cipela broj dva', 3300, 36, 'Decije cipele', 'slika2.jpg'),
(3, 'CipelaBr3', 'Ovo je cipela broj tri', 5900, 41, 'Zenska cipela', 'slika3.jpg'),
(4, 'CipelaBr4', 'Ovo je cipela broj cetiri', 4000, 35, 'Decije cipele', 'slika4.jpg'),
(5, 'CipelaBr5', 'Ovo je cipela broj pet', 2900, 38, 'Zenska cipela', 'slika5.jpg'),
(6, 'CipelaBr6', 'Ovo je cipela broj sest', 5900, 39, 'Decije cipele', 'slika6.jpg'),
(7, 'CipelaBr7', 'Ovo je cipela broj sedam', 7200, 40, 'Zenska cipela', 'slika7.jpg'),
(8, 'CipelaBr8', 'Ovo je cipela broj osam', 6100, 40, 'Zenska cipela', 'slika8.jpg'),
(9, 'CipelaBr9', 'Ovo je cipela broj devet', 8000, 38, 'Zenska cipela', 'slika9.jpg'),
(10, 'CipelaBr10', 'Ovo je cipela broj 10', 3800, 38, 'Zenske cipele', 'slika10.jpg'),
(11, 'CipelaBr11', 'Ovo je cipela broj jedanaest', 5900, 44, 'Muske cipele', 'slika11.jpg'),
(12, 'CipelaBr12', 'Ovo je cipela broj dvanaest', 8100, 43, 'Muske cipele', 'slika12.jpg'),
(13, 'CipelaBr13', 'Ovo je cipela broj trinaest', 2700, 31, 'Decije cipele', 'slika13.jpg'),
(14, 'CipelaBr14', 'Ovo je cipela broj cetrnaest', 3400, 36, 'Decije cipele', 'slika14.jpg'),
(15, 'CipelaBr15', 'Ovo je cipela broj petnaest', 3900, 34, 'Decije cipele', 'slika15.jpg'),
(16, 'Cipela16', 'Ovo je cipela broj 16', 6600, 44, 'Decije cipele', 'slika5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `broj` int(10) NOT NULL,
  `naziv` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`broj`, `naziv`) VALUES
(1, 'Zenske cipele'),
(2, 'Muske cipele'),
(3, 'Decije cipele');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(5) NOT NULL,
  `ime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `email`) VALUES
(1, 'admin', 'alexsd991@yahoo.com'),
(2, 'Alex3', 'anici23c1@yahoo.com'),
(3, 'Alex2', 'anici23c@yahoo.com'),
(5, 'Joca', 'snezastev@yahoo.com'),
(6, 'Alex', 'anicicica91@gmail.com'),
(8, 'Joca1', 'anici2333jkc1@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cipele`
--
ALTER TABLE `cipele`
  ADD PRIMARY KEY (`sifra`);

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`broj`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `broj` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
