-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2023 at 10:43 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ARticity`
--

-- --------------------------------------------------------

--
-- Table structure for table `Login`
--

CREATE TABLE `Login` (
  `u_id` int(20) NOT NULL,
  `u_uname` varchar(30) NOT NULL,
  `u_pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Login`
--

INSERT INTO `Login` (`u_id`, `u_uname`, `u_pass`) VALUES
(1, 'asda', 'Ars316290*'),
(2, 'Singh14@', 'Jotisingh@123'),
(3, 'asdsafd', 'Ars3152628@#$');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `category` varchar(30) NOT NULL,
  `service` varchar(30) NOT NULL,
  `desp` varchar(150) NOT NULL,
  `normal_days` int(20) NOT NULL,
  `normal_cost` int(20) NOT NULL,
  `deluxe_days` int(20) NOT NULL,
  `deluxe_cost` int(20) NOT NULL,
  `premium_days` int(20) NOT NULL,
  `premium_cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `u_id`, `u_name`, `category`, `service`, `desp`, `normal_days`, `normal_cost`, `deluxe_days`, `deluxe_cost`, `premium_days`, `premium_cost`) VALUES
(1, 2, 'Singh14@', 'Data Entry', 'Typing', 'Typing Speed is 120 words per min.', 6, 20, 4, 25, 2, 30),
(2, 2, 'Singh14@', 'Music', 'Composer', 'I can compose music for you', 2, 2, 3, 4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `u_email` varchar(20) NOT NULL,
  `u_uname` varchar(20) NOT NULL,
  `u_pass` varchar(20) NOT NULL,
  `u_bio` varchar(50) NOT NULL,
  `photo_doc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `uname`, `u_email`, `u_uname`, `u_pass`, `u_bio`, `photo_doc`) VALUES
(1, 'salads Asda', 'asd@gmail.com', 'asda', 'Ars316290*', 'asdasd', '/Applications/XAMPP/xamppfiles/temp/phpB1or3Y'),
(2, 'Jyoti Singh', 'singh014@gmail.com', 'Singh14@', 'Jotisingh@123', 'Modelling content', '/Applications/XAMPP/xamppfiles/temp/phpQWZl20'),
(3, 'Aadas', 'asd@gmail.com', 'asdsafd', 'Ars3152628@#$', 'facade', '/Applications/XAMPP/xamppfiles/temp/phpodcrWw');

-- --------------------------------------------------------

--
-- Table structure for table `u_music`
--

CREATE TABLE `u_music` (
  `id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `u_name` varchar(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `deep` varchar(100) NOT NULL,
  `song` varchar(100) NOT NULL,
  `cover_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `u_music`
--

INSERT INTO `u_music` (`id`, `u_id`, `u_name`, `title`, `deep`, `song`, `cover_photo`) VALUES
(2, 2, 'Singh14@', 'Arjun', 'Arjun', '/Applications/XAMPP/xamppfiles/temp/phpBdUBnW', '/Applications/XAMPP/xamppfiles/temp/phpEzruhV'),
(3, 2, 'Singh14@', 'Arjun', 'Arjun', '/Applications/XAMPP/xamppfiles/temp/phplTbrja', '/Applications/XAMPP/xamppfiles/temp/phpTpyJ1N');

-- --------------------------------------------------------

--
-- Table structure for table `u_m_photo`
--

CREATE TABLE `u_m_photo` (
  `id` int(20) NOT NULL,
  `u_id` int(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `title` varchar(30) NOT NULL,
  `desp` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `u_m_photo`
--

INSERT INTO `u_m_photo` (`id`, `u_id`, `u_name`, `title`, `desp`, `photo`) VALUES
(3, 2, 'Singh14@', 'Jyoti ', 'Jyoti', '/Applications/XAMPP/xamppfiles/temp/phpLAPrb5'),
(4, 2, 'Singh14@', 'Jyoti Singh', 'Jyoti Singh', '/Applications/XAMPP/xamppfiles/temp/phpny9ZIu');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(20) NOT NULL,
  `u_id` varchar(20) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `service` varchar(20) NOT NULL,
  `p_cost` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Login`
--
ALTER TABLE `Login`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `u_music`
--
ALTER TABLE `u_music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_m_photo`
--
ALTER TABLE `u_m_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Login`
--
ALTER TABLE `Login`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `u_music`
--
ALTER TABLE `u_music`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `u_m_photo`
--
ALTER TABLE `u_m_photo`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Login`
--
ALTER TABLE `Login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
