-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 08:01 PM
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
-- Database: `hp`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `company_description` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `alternate_phone` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `zipcode` varchar(250) NOT NULL,
  `coordinator_phone` varchar(250) NOT NULL,
  `coordinator_name` varchar(250) NOT NULL,
  `coordinator_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_description`, `email`, `phone`, `alternate_phone`, `user_name`, `password`, `address1`, `address2`, `state`, `city`, `zipcode`, `coordinator_phone`, `coordinator_name`, `coordinator_email`) VALUES
(1, 'jdwbf.sdkb', 'sdnbafwkergbls', 'ajsbgdjf@gamil.com', '9016409449', '', 'pp', '123', '', 'rrewq', 'eknf', 'evfdnabsvd', 'df', '964365436', '46346.4546', 'vj@gamil.com'),
(10, 'ds', 'nvdjk', 'priyamaisuriya30@gmail.com', '5846', '454456', 'oo', 'jk', 'ijni', 'uiniu', '', '', '', '78', 'n', 'priya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `date_of_joining` date NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `alternate_phone` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `profile_image_url` varchar(250) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `first_name`, `last_name`, `middle_name`, `gender`, `date_of_joining`, `email`, `phone`, `alternate_phone`, `user_name`, `password`, `profile_image_url`, `is_admin`, `role`) VALUES
(1, 'priya ', 'maisuriya', 'dharmendrakumar', 'Female', '2025-09-17', 'priya29@gamil.com', '9016409449', '901640563', 'pp', '123', '', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `job_elligible_students`
--

CREATE TABLE `job_elligible_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `job_request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_title` varchar(250) NOT NULL,
  `job_description` text NOT NULL,
  `minimum_percentage` decimal(10,0) NOT NULL,
  `backlog` tinyint(1) NOT NULL,
  `subject_name` varchar(250) NOT NULL,
  `branch_city` varchar(250) NOT NULL,
  `is_local_candidate_only` tinyint(1) NOT NULL,
  `job_post_date` datetime NOT NULL,
  `last_date_for_apply` datetime NOT NULL,
  `percentage_of_10th` decimal(10,0) NOT NULL,
  `percentage_of_12th` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id`, `company_id`, `job_title`, `job_description`, `minimum_percentage`, `backlog`, `subject_name`, `branch_city`, `is_local_candidate_only`, `job_post_date`, `last_date_for_apply`, `percentage_of_10th`, `percentage_of_12th`) VALUES
(1, 1, 'Php developer', 'Php developer job_description', 50, 0, 'Php', 'surat', 1, '2025-09-05 00:00:00', '2025-09-18 00:00:00', 60, 70),
(2, 0, 'ff', 'ytdu7tfju', 1532, 0, 'cjytkj', 'surat', 0, '6851-07-07 00:00:00', '3132-05-05 00:00:00', 25, 25),
(3, 0, 'ff', 'sdfds', 1532, 1, 'cjytkj', 'surat', 0, '2025-09-24 17:53:00', '2025-09-05 17:57:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_request`
--

CREATE TABLE `job_request` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `apply_date_time` datetime NOT NULL,
  `percentage_of_10th` decimal(10,0) NOT NULL,
  `number_of_trial_10th` int(11) NOT NULL,
  `percentage_of_12th` decimal(10,0) NOT NULL,
  `number_of_trial_12th` int(11) NOT NULL,
  `is_hire` tinyint(4) DEFAULT NULL,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_request`
--

INSERT INTO `job_request` (`id`, `student_id`, `company_id`, `job_post_id`, `apply_date_time`, `percentage_of_10th`, `number_of_trial_10th`, `percentage_of_12th`, `number_of_trial_12th`, `is_hire`, `reason`) VALUES
(1, 1, 1, 1, '2025-09-10 07:09:18', 12, 124, 56, 25, NULL, NULL),
(2, 1, 0, 2, '2025-09-10 07:25:30', 85, 1, 52, 0, NULL, NULL),
(3, 1, 0, 3, '2025-09-10 07:25:46', 58, 0, 95, 0, NULL, NULL),
(4, 3, 1, 1, '2025-09-12 06:50:14', 12, 1, 85, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `middle_name` varchar(250) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `enrollement_number` varchar(250) NOT NULL,
  `backlog` tinyint(1) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `alternate_phone` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `sgpa` float NOT NULL,
  `profile_imafe_url` varchar(250) NOT NULL,
  `address1` varchar(250) NOT NULL,
  `address2` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `zipcode` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `middle_name`, `gender`, `dob`, `enrollement_number`, `backlog`, `email`, `phone`, `alternate_phone`, `user_name`, `password`, `sgpa`, `profile_imafe_url`, `address1`, `address2`, `state`, `city`, `zipcode`) VALUES
(1, 'drashti', 'alpeshbhai', 'patel', '', '2025-09-23', '123456789', 0, 'drashti@gmail.com', '9258774578', '91045447148', 'dr_dz', '123', 75.45, '', '', '', 'hffds', 'rthbb', '456'),
(3, 'priya', 'maisuriya', 'dharmendrakumar', 'Female', '2005-05-25', '453', 0, 'priyamaisuriya30@gamil.com', '09016409449', '09016409447', 'pp', '456', 36, '', '', '', 'sdbfaiuf', 'ehfouwe', 'jdngierun'),
(4, 'project_hp', 'JHG', 'JJ', 'Female', '2025-09-10', '453', 0, 'priyamaisuriya30@gamil.com', '36', '09016409447', 'pp', '123', 36, '', 'XZX', 'SJDH', 'sdbfaiuf', 'ehfouwe', 'jdngierun'),
(5, 'Doremon', ' n', 'j', 'Female', '0007-07-08', '453', 0, 'priyamaisuriya30@gamil.com', '9016409449', '09016409447', 'pp', '123', 9016410000, '', 'df', 'as', 'sdbfaiuf', 'ehfouwe', 'jdngierun'),
(6, 'sesu', 'maisuriya', 'p', 'Female', '2025-09-26', '5', 0, 'mamta550@gmail.com', '9016409447', '91045447148', 'priya', '123', 58, '', '', '', 'lm', 'Daman', 'ew'),
(7, 'deep', 'maisuriya', 'dn', 'Male', '2025-09-26', '5', 0, 'mamta550@gmail.com', '9016409447', '91045447148', 'deep', '123', 58, '', '', '', 'lm', 'Daman', 'ew'),
(8, 'nnn', 'maisuriya', 'dharmendrakumar', 'Female', '2025-09-09', '453', 0, 'priyamaisuriya30@gamil.com', '36', '09016409447', 'nnn', '123', 36, '', '', '', 'sdbfaiuf', 'ehfouwe', 'jdngierun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_elligible_students`
--
ALTER TABLE `job_elligible_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_request`
--
ALTER TABLE `job_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_elligible_students`
--
ALTER TABLE `job_elligible_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_request`
--
ALTER TABLE `job_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
