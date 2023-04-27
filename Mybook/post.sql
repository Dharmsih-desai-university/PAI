-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 08:36 AM
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
-- Database: `mybook`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(19) NOT NULL,
  `postid` bigint(19) NOT NULL,
  `userid` bigint(19) NOT NULL,
  `post` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `comments` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `has_image` tinyint(1) NOT NULL,
  `is_profile_image` tinyint(1) NOT NULL,
  `is_cover_image` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `postid`, `userid`, `post`, `image`, `comments`, `likes`, `date`, `has_image`, `is_profile_image`, `is_cover_image`) VALUES
(1, 48960686381207646, 38513759, 'hii', '', 0, 0, '2023-04-26 08:41:48', 0, 0, 0),
(2, 77340, 38513759, 'hello', '', 0, 0, '2023-04-26 08:42:45', 0, 0, 0),
(3, 443210247308291, 128841108722044, 'hii', '', 0, 0, '2023-04-26 08:49:23', 0, 0, 0),
(4, 5135306993660841, 128841108722044, 'hii', '', 0, 0, '2023-04-26 08:54:20', 0, 0, 0),
(5, 401342, 128841108722044, 'kem che?', '', 0, 0, '2023-04-26 08:54:28', 0, 0, 0),
(6, 727367494639, 128841108722044, 'hii', '', 0, 0, '2023-04-26 09:37:36', 0, 0, 0),
(7, 21303904251, 128841108722044, 'hello', '', 0, 0, '2023-04-26 09:37:48', 0, 0, 0),
(10, 4613766293, 128841108722044, 'this is my first image post', 'uploads/128841108722044/KgqIsCwogR5l21K.jpg', 0, 0, '2023-04-27 03:28:20', 1, 0, 0),
(11, 568049060165443543, 128841108722044, '', 'uploads/128841108722044/iKgKCQRm8jMDewh.jpg', 0, 0, '2023-04-27 04:06:27', 1, 1, 0),
(12, 4171034044076697, 128841108722044, '', 'uploads/128841108722044/hWHom0AHFdCdnoJ.jpg', 0, 0, '2023-04-27 04:07:16', 1, 0, 1),
(18, 1403974128744, 128841108722044, 'helo', '', 0, 0, '2023-04-27 06:29:34', 0, 0, 0),
(19, 9149, 128841108722044, '<script>alert(\"hello\")</script>', '', 0, 0, '2023-04-27 06:30:05', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postid` (`postid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `likes` (`likes`),
  ADD KEY `date` (`date`),
  ADD KEY `comments` (`comments`),
  ADD KEY `has_image` (`has_image`),
  ADD KEY `is_profile_image` (`is_profile_image`),
  ADD KEY `is_cover_image` (`is_cover_image`);
ALTER TABLE `post` ADD FULLTEXT KEY `post` (`post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(19) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
