-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2021 at 11:36 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svc`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `action` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(1, 'admin', '2021-05-01 11:50:03', 'Add User lj'),
(2, 'admin', '2021-05-01 11:51:28', 'Add User lj'),
(3, 'admin', '2021-05-01 11:55:09', 'Add User lj'),
(4, 'admin', '2021-05-01 11:56:42', 'Add User ghie'),
(5, '', '2021-05-01 11:58:30', 'Add User admin'),
(6, 'admin', '2021-05-01 12:03:05', 'Add User vet_lj'),
(7, 'admin', '2021-05-03 02:39:21', 'Updated Patient Max'),
(8, 'admin', '2021-05-03 13:06:27', 'Updated Patient Jejemon'),
(9, 'admin', '2021-05-03 14:06:44', 'Updated Patient Max'),
(10, 'admin', '2021-05-03 14:06:53', 'Updated Patient Maxi'),
(11, 'admin', '2021-05-03 14:11:32', 'Updated Patient Maxi'),
(12, 'admin', '2021-05-03 14:12:55', 'Updated Patient Maxi'),
(13, 'admin', '2021-05-05 13:31:18', 'Add User ghie');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appt_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `schedule` date NOT NULL,
  `service_id` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `status` enum('pending','confirmed','rescheduled','done') NOT NULL DEFAULT 'pending',
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appt_id`, `title`, `schedule`, `service_id`, `reason`, `user_id`, `b_id`, `vet_id`, `pet_id`, `date_created`, `status`, `color`) VALUES
(1, 'Max\'s Vaccination', '2021-05-03', 2, 'distemper', 1, 1, 1, 1, '2021-04-30', 'confirmed', '#008000'),
(2, 'Jejemon\'s Consultation', '2021-05-14', 2, 'wandoabcosecnlsd', 1, 2, 1, 1, '2021-05-03', 'rescheduled', '#008000'),
(3, '', '2021-05-14', 1, 'asdasdasdasd', 32, 1, 1, 2, '2021-05-13', 'pending', ''),
(4, '', '2021-05-14', 1, 'test', 32, 1, 1, 1, '2021-05-13', 'pending', ''),
(5, '', '2021-05-14', 1, 'asdasdasd', 32, 1, 1, 1, '2021-05-13', 'pending', ''),
(6, 'asdasd\'s vaccination', '2021-05-14', 2, 'asdasd', 32, 1, 1, 1, '2021-05-13', 'pending', ''),
(7, 'wwww\'s consultation', '2021-05-15', 1, 'asdasdasd', 32, 1, 1, 2, '2021-05-13', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`b_id`, `b_name`, `b_address`) VALUES
(1, 'Dau, Mabalacat', 'csbciubxiqcnic'),
(2, 'Friendship ', 'cdsaciaehnwheaxaw');

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `species_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`id`, `name`, `species_id`, `status`, `created`, `updated`) VALUES
(2, 'siamese2', 2, 0, '2021-05-12 05:59:36', '2021-05-12 06:16:54'),
(3, 'siamese', 2, 1, '2021-05-12 06:17:01', '2021-05-12 06:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` tinyint(3) UNSIGNED NOT NULL,
  `gender` enum('male','female','unknown') NOT NULL,
  `species` text NOT NULL,
  `breed` text NOT NULL,
  `bdate` date NOT NULL,
  `color` text NOT NULL,
  `weight` float NOT NULL,
  `img_path` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `status` enum('Active','Not Active','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `age`, `gender`, `species`, `breed`, `bdate`, `color`, `weight`, `img_path`, `user_id`, `date_created`, `status`) VALUES
(1, 'Maxi', 2, 'unknown', 'Feline (Cat)', 'Affenpinscher', '2020-03-03', 'Brown and Black and White', 5.5, '', 3, '2021-04-29', 'Active'),
(2, 'Jejemona', 1, 'female', 'Feline (Cat)', 'Abyssinian', '2021-05-03', 'Brown and White', 5, '', 3, '2021-05-01', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `ph_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `branch_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`ph_id`, `patient_id`, `user_id`, `service_id`, `description`, `branch_id`, `vet_id`, `date`) VALUES
(1, 2, 2, 2, 'parvo', 2, 2, '2021-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(120) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `color` varchar(120) NOT NULL,
  `weight` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `img` varchar(120) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `user_id`, `name`, `age`, `dob`, `gender`, `color`, `weight`, `breed_id`, `species_id`, `img`, `created`, `updated`) VALUES
(1, 32, 'asdasd', 127, '2021-05-07', 'adasd', 'asda', 123, 2, 1, 'MvC_Cover_Art.png', '2021-05-13 09:30:48', '2021-05-13 09:30:48'),
(2, 32, 'wwww', 2, '2021-05-12', 'male', 'brown', 11, 2, 1, 'phone.png', '2021-05-13 10:38:47', '2021-05-13 10:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_name`, `s_info`) VALUES
(1, 'Consultation', 'consult'),
(2, 'Vaccination', 'distemper');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `name`, `status`, `created`, `updated`) VALUES
(1, 'dog', 1, '2021-05-11 19:54:04', '2021-05-11 19:54:04'),
(2, 'cat', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'chicken', 1, '2021-05-11 20:33:53', '2021-05-11 20:33:53'),
(4, 'test', 1, '2021-05-11 20:34:27', '2021-05-11 20:34:27'),
(5, 'test22', 0, '2021-05-11 20:35:24', '2021-05-11 21:39:55'),
(6, 'test3', 0, '2021-05-11 20:35:48', '2021-05-11 21:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `account_status` enum('verified','not verified','','') NOT NULL DEFAULT 'not verified',
  `user_role` enum('client','clerk','clerk_admin','admin') NOT NULL,
  `date_created` date NOT NULL,
  `activation_code` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fname`, `mname`, `lname`, `email`, `contact_no`, `address`, `account_status`, `user_role`, `date_created`, `activation_code`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '', '', '', '', '', 'verified', 'admin', '2021-05-01', '0', 0),
(2, 'lj', '202cb962ac59075b964b07152d234b70', 'Lailah Jane', 'Reli', 'Lucena', 'laijanelucena@gmail.com', '09675377453', '0452 Airmens Village', 'verified', 'client', '2021-05-01', '0', 0),
(3, 'ghie', 'ghie', 'ghie', 'lopez', 'valencia', 'ghievalencia@gmail.com', '00123456789', 'gtgbyjurccaxdxtavctxs', 'verified', 'client', '2021-05-03', '21354645', 0),
(4, 'ghie', 'ab222de8b98dc462a3dd5518ac30215b', 'ghie', 'lopez', 'valencia', 'juandelacruz@gmail.com', '09675377453', '0452 Airmens, Mabiga, Mabalacat, Pampanga, Philippines', 'verified', 'clerk', '2021-05-05', '0', 0),
(32, 'mike', '167534dd329e39e41473c11d0a79b8ea', 'Michael', 'C', 'Eligores', 'eligaming28@gmail.com', '13123123123', '', 'verified', 'client', '2021-05-11', '3w91Lexm7ud', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `login_date` varchar(255) NOT NULL,
  `logout_date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(1, 'admin', '2021-05-01 04:04:07', '', 1),
(2, 'admin', '2021-05-01 11:59:19', '', 1),
(3, 'admin', '2021-05-01 13:48:46', '', 1),
(4, 'admin', '2021-05-05 13:10:07', '', 1),
(5, 'admin', '2021-05-05 13:15:17', '', 1),
(6, 'admin', '2021-05-05 13:30:21', '', 1),
(7, 'admin', '2021-05-07 20:56:27', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vet`
--

CREATE TABLE `vet` (
  `vet_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `title` varchar(20) NOT NULL,
  `img_path` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vet`
--

INSERT INTO `vet` (`vet_id`, `fname`, `mname`, `lname`, `title`, `img_path`, `username`, `password`, `contact`, `email`, `address`, `date_created`, `status`) VALUES
(1, 'Ar', 'V', 'In', 'Dr.', '', 'arvin', 'arvin', '01234567891', 'arvin@arvin.com', 'Friendship, Pampanga', '2021-05-03', 1),
(2, 'Crystal', 'Reli', 'Lucena', 'Dr.', '', 'vet_crystal', 'crystal', '01234567891', 'crystal@crystal.com', 'cowcifhurgvynpmcawh98fna9cwpfysvg7yap9', '2021-05-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vet_schedule`
--

CREATE TABLE `vet_schedule` (
  `id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `branch` int(11) NOT NULL,
  `work_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vet_schedule`
--

INSERT INTO `vet_schedule` (`id`, `vet_id`, `branch`, `work_date`) VALUES
(1, 1, 1, '2021-05-14'),
(2, 1, 1, '2021-05-15'),
(3, 2, 2, '2021-05-14'),
(4, 2, 2, '2021-05-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appt_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`ph_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- Indexes for table `vet`
--
ALTER TABLE `vet`
  ADD PRIMARY KEY (`vet_id`);

--
-- Indexes for table `vet_schedule`
--
ALTER TABLE `vet_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_history`
--
ALTER TABLE `patient_history`
  MODIFY `ph_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vet`
--
ALTER TABLE `vet`
  MODIFY `vet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vet_schedule`
--
ALTER TABLE `vet_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
