-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2021 at 07:23 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `assoc_post_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` varchar(750) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `assoc_post_id`, `rating`, `comment`) VALUES
(1, 3, 4, 'This is a test comment for the Post shown above.'),
(3, 3, 5, 'I wonder how lazy the dog actually was.'),
(20, 5, 2, 'Boring post.'),
(21, 5, 3, 'Post is just a test.'),
(22, 6, 3, 'Not very good food.'),
(23, 3, 4, 'The fox was really quick.'),
(24, 3, 1, 'This is a bad comment.'),
(25, 9, 4, 'This is a good first post.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post_name` varchar(50) NOT NULL,
  `post_content` varchar(3000) NOT NULL,
  `rating` decimal(3,0) NOT NULL DEFAULT '5',
  `total_ratings` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_name`, `post_content`, `rating`, `total_ratings`) VALUES
(3, 'The quick fox', 'The quick brown fox jumped over the lazy dog.', '4', 5),
(5, 'Another Test Post', 'Test Post Content Updated.', '4', 3),
(6, 'Cooking show', 'We have an upcoming cooking show that we will showcase here.', '3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `country` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `address`, `city`, `state`, `zipcode`, `country`, `role`) VALUES
(1, 'user', 'password12345', 'John', 'Smith', 'johnsmith@gmail.com', '1234 West 3rd Street', 'New York', 'New York', '12345', 'United States', 'Blogger'),
(3, 'JDoe', 'password12345', 'John', 'Doe', 'jdoe@gmail.com', '123 East 7th Street', 'Chicago', 'Illinois', '12345', 'United States', 'Editor'),
(4, 'Admin', 'Password12345', 'Admin', 'Admin', 'Admin@gmail.com', '12345 West 1st Street', 'Los Angeles', 'California', '12345', 'United States', 'Contributor'),
(5, 'JohnDoe1', 'Password12345', 'John', 'Doe', 'johndoe44@gmail.com', '1234 West 3rd Street', 'San Diego', 'California', '12345', 'United States', 'Author'),
(8, 'chuz', 'password12345', 'Casey', 'Huz', 'chuz@my.gcu.edu', '1234 West third ave', 'New York', 'New York', '12345', 'United States', 'Author');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
