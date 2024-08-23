-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 03:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commid` int(11) NOT NULL,
  `commdata` text NOT NULL,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `commtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `commid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `reply` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table`
--

CREATE TABLE `table` (
  `postid` int(11) NOT NULL,
  `title` text NOT NULL,
  `blog` text NOT NULL,
  `userid` int(11) NOT NULL,
  `postedtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table`
--

INSERT INTO `table` (`postid`, `title`, `blog`, `userid`, `postedtime`) VALUES
(1, 'FALLEN STAR', 'The greatest glory in living lies not in never falling, but in rising every time we fall. -Nelson Mandela', 1, '2024-08-20 11:30:31'),
(2, 'tterw3rw', 'rfewfffffffffffffffefedfvedfgvesssssftgesfrt', 1, '2024-08-20 11:34:02'),
(3, 'tterw3rw', 'rfewfffffffffffffffefedfvedfgvesssssftgesfrt', 1, '2024-08-20 11:35:34'),
(4, 'tterw3rw', 'rfewfffffffffffffffefedfvedfgvesssssftgesfrt', 1, '2024-08-20 11:37:02'),
(5, '', '', 1, '2024-08-20 11:37:07'),
(6, 'from vivek', 'gfbeeghnjhbsfvvghn', 2, '2024-08-20 11:37:59'),
(7, 'FALLEN Star', 'me', 1, '2024-08-21 10:13:26'),
(8, 'fvrfvwewe', 'fwefdwefweqfwe', 1, '2024-08-21 10:14:49'),
(9, 'fvrfvwewe', 'fwefdwefweqfwe', 1, '2024-08-21 10:16:58'),
(10, 'i am john smith', 'i am gunslinger from usa lol', 3, '2024-08-21 11:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`, `address`, `password`) VALUES
(1, 'Lucifer', 'Code0', 'Lucifer111@gmail.com', '77777777777', 'USA GOLDEN park', 'LUCIFER111'),
(2, 'Vivek', 'Rai', 'vivekrai3333@gmail.com', '77777777777', 'USA GOLDEN park', '1'),
(3, 'john', 'smith', 'john333@gmail.com', '8968966866', 'usa new york ', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commid`),
  ADD KEY `postkey` (`postid`),
  ADD KEY `userkey` (`userid`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commid` (`commid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `table`
--
ALTER TABLE `table`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `foreignkey` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table`
--
ALTER TABLE `table`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `postkey` FOREIGN KEY (`postid`) REFERENCES `table` (`postid`),
  ADD CONSTRAINT `userkey` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `commid` FOREIGN KEY (`commid`) REFERENCES `comment` (`commid`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `table`
--
ALTER TABLE `table`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
