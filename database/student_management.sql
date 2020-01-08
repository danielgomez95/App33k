-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 03:36 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `students_id` varchar(225) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(225) NOT NULL,
  `middle_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email_address` varchar(225) NOT NULL,
  `contact_number` varchar(225) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `address` text NOT NULL,
  `remove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`students_id`, `date_registered`, `first_name`, `middle_name`, `last_name`, `password`, `email_address`, `contact_number`, `age`, `birthday`, `address`, `remove`) VALUES
('20200108090117', '2020-01-08 08:14:17', 'Daniel', 'Sigalat', 'Gomez', '2082', 'sartealicia@gmail.com', '09065958644', 234, '0000-00-00', 'Daraga, Albay', 0),
('20200108150143', '2020-01-08 14:34:43', 'Sofia Isabelli Therese', 'Sarte', 'Gomez', '8359', 'ase@gmail.com', '09155297872', 4, '2020-01-08', 'Find Greymouse at Redlanch business park Bldg 1, 2nd Flr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `middle_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email_address` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_type` enum('SUPER_USER','ADMIN') NOT NULL,
  `remove` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `first_name`, `middle_name`, `last_name`, `username`, `email_address`, `password`, `user_type`, `remove`) VALUES
(4, 'Daniel', 'Sigalat', 'Gomez', 'admin', 'admin@gmail.com', '$2y$10$C/ww.7nYnNVZWD4Bm7D6XuIlfyPbqev1sKXaZMMnLZgk29N1q7aay', 'SUPER_USER', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`students_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
