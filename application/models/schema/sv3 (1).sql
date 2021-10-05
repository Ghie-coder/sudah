-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2021 at 01:09 AM
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
-- Database: `sv3`
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
  `schedule_id` bigint(20) NOT NULL,
  `service_id` int(11) NOT NULL,
  `reason` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `diagnosis` text NOT NULL,
  `temp` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `treatment` text NOT NULL,
  `remarks` text NOT NULL,
  `date_created` date NOT NULL,
  `status` enum('pending','confirmed','rescheduled','done','canceled') NOT NULL DEFAULT 'pending',
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appt_id`, `title`, `schedule`, `schedule_id`, `service_id`, `reason`, `user_id`, `b_id`, `vet_id`, `pet_id`, `time`, `diagnosis`, `temp`, `weight`, `treatment`, `remarks`, `date_created`, `status`, `color`) VALUES
(1, '', '0000-00-00', 1, 0, 'adasdasd', 32, 1, 2, 9, '', '', 0, 0, '', '', '2021-05-24', 'confirmed', ''),
(2, '', '0000-00-00', 3, 0, 'asdasd', 32, 1, 2, 1, 'pm', 'test diagnosis', 33, 12, 'test treatment', 'test remarks', '2021-05-24', 'done', ''),
(4, '', '0000-00-00', 4, 0, 'pppppppppppppp', 2, 1, 2, 10, 'am', '', 0, 0, '', '', '2021-05-26', 'done', ''),
(5, '', '0000-00-00', 5, 0, 'iiiiiiiiiiiiiiiiiiiii', 2, 7, 7, 10, 'am', 'test diagnosis', 34, 12, 'test treatment', 'test remarks', '2021-05-26', 'done', ''),
(6, '', '0000-00-00', 6, 0, 'test', 32, 1, 2, 13, 'pm', '', 0, 0, '', '', '2021-05-30', 'pending', ''),
(7, '', '0000-00-00', 6, 0, 'test asdasdads', 32, 1, 2, 13, 'pm', 'asdasdasdasdadadasdasdasd', 0, 0, '', '', '2021-06-01', 'canceled', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_services`
--

CREATE TABLE `appointment_services` (
  `id` bigint(20) NOT NULL,
  `appointment_id` bigint(20) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_services`
--

INSERT INTO `appointment_services` (`id`, `appointment_id`, `service_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 1),
(5, 3, 2),
(6, 4, 1),
(7, 4, 2),
(8, 5, 8),
(9, 6, 2),
(10, 6, 4),
(11, 6, 5),
(18, 7, 2),
(19, 7, 4),
(20, 7, 5);

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
(1, 'Dau, Mabalacat City, Pampanga', '717 Lakandula St., Dau, Mabalacat 2010'),
(2, 'Magalang, Pampanga', 'GR Bank Bldg., San Nicolas 1, Magalang, Pampanga'),
(3, 'San Fernando City, Pampanga', 'San Isidro, San Fernando City, Pampanga'),
(4, 'Sunset, Angeles City', 'Friendship Highway, Cutcut, 2009, Angeles City, Philippines'),
(5, 'Hensonville, Angeles City', '#6 Richtofen St., Hensonville Brgy. Malabanias, Angeles City'),
(6, 'Capas, Tarlac', 'Villa San Jose Subdivision, Cutcut 1, Capas, Tarlac'),
(7, 'Bamban, Tarlac', 'MacArthur Highway, Anupul Bamban, Tarlac');

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
(2, 'siamese2', 3, 0, '2021-05-12 05:59:36', '2021-05-12 06:16:54'),
(3, 'siamese', 2, 1, '2021-05-12 06:17:01', '2021-05-12 06:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(1, 'yellow'),
(2, 'yellow-red'),
(3, 'yellow-orange'),
(4, 'yellow-green'),
(5, 'yellow-blue'),
(6, 'yellow-violet'),
(7, 'yellow-brown'),
(8, 'yellow-black'),
(9, 'yellow-white'),
(10, 'red'),
(11, 'red-orange'),
(12, 'red-green'),
(13, 'red-blue'),
(14, 'red-violet'),
(15, 'red-brown'),
(16, 'red-black'),
(17, 'red-white'),
(18, 'orange'),
(19, 'orange-green'),
(20, 'orange-blue'),
(21, 'orange-violet'),
(22, 'orange-brown'),
(23, 'orange-black'),
(24, 'orange-white'),
(25, 'green'),
(26, 'green-blue'),
(27, 'green-violet'),
(28, 'green-brown'),
(29, 'green-black'),
(30, 'green-white'),
(31, 'blue'),
(32, 'blue-violet'),
(33, 'blue-brown\r\n'),
(34, 'blue-black'),
(35, 'blue-white'),
(36, 'violet'),
(37, 'violet-brown'),
(38, 'violet-black'),
(39, 'violet-white'),
(40, 'brown'),
(41, 'brown-black'),
(42, 'brown-white'),
(43, 'black'),
(44, 'black-white'),
(45, 'white'),
(46, 'yellow-red-orange'),
(47, 'yellow-red-orange'),
(48, 'yellow-red-green'),
(49, 'yellow-red-blue'),
(50, 'yellow-red-violet'),
(51, 'yellow-red-brown'),
(52, 'yellow-red-black'),
(53, 'yellow-orange-green'),
(54, 'yellow-orange-blue'),
(55, 'yellow-orange-violet'),
(56, 'yellow-orange-brown'),
(57, 'yellow-orange-black'),
(58, 'yellow-orange-white'),
(59, 'yellow-green-blue'),
(60, 'yellow-green-violet'),
(61, 'yellow-green-brown'),
(62, 'yellow-green-black'),
(63, 'yellow-green-white'),
(64, 'yellow-blue-violet'),
(65, 'yellow-blue-brown'),
(66, 'yellow-blue-black'),
(67, 'yellow-blue-white'),
(68, 'yellow-violet-brown'),
(69, 'yellow-violet-black'),
(70, 'yellow-violet-white'),
(71, 'yellow-brown-black'),
(72, 'yellow-brown-white'),
(73, 'yellow-black-white'),
(74, 'red-orange-green'),
(75, 'red-orange-blue'),
(76, 'red-orange-violet'),
(77, 'red-orange-brown'),
(78, 'red-orange-black'),
(79, 'red-orange-white'),
(80, 'red-green-blue'),
(81, 'red-green-violet'),
(82, 'red-green-brown'),
(83, 'red-green-black'),
(84, 'red-green-white'),
(85, 'red-blue-violet'),
(86, 'red-blue-brown'),
(87, 'red-blue-black'),
(88, 'red-blue-white'),
(89, 'red-violet-brown'),
(90, 'red-violet-black'),
(91, 'red-violet-white'),
(92, 'red-brown-black'),
(93, 'red-brown-white'),
(94, 'red-black-white'),
(95, 'orange-green-blue'),
(96, 'orange-green-violet'),
(97, 'orange-green-brown'),
(98, 'orange-green-black'),
(99, 'orange-green-white'),
(100, 'orange-blue-violet'),
(101, 'orange-blue-brown'),
(102, 'orange-blue-black'),
(103, 'orange-blue-white'),
(104, 'orange-violet-brown'),
(105, 'orange-violet-black'),
(106, 'orange-violet-white'),
(107, 'orange-brown-black'),
(108, 'orange-brown-white'),
(109, 'orange-black-white'),
(110, 'green-blue-violet'),
(111, 'green-blue-brown'),
(112, 'green-blue-black'),
(113, 'green-blue-white'),
(114, 'green-violet-brown'),
(115, 'green-violet-black'),
(116, 'green-violet-white'),
(117, 'green-brown-black'),
(118, 'green-brown-white'),
(119, 'green-black-white'),
(120, 'blue-violet-brown'),
(121, 'blue-violet-black'),
(122, 'blue-violet-white'),
(123, 'blue-brown-black'),
(124, 'blue-brown-white'),
(125, 'blue-black-white'),
(126, 'violet-brown-black'),
(127, 'violet-brown-white'),
(128, 'violet-black-white'),
(129, 'brown-black-white');

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
  `color_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `img` varchar(120) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `user_id`, `name`, `age`, `dob`, `gender`, `color_id`, `weight`, `breed_id`, `species_id`, `img`, `created`, `updated`) VALUES
(1, 32, 'asdasd', 127, '2021-05-07', 'adasd', 1, 123, 2, 1, 'MvC_Cover_Art.png', '2021-05-13 09:30:48', '2021-05-13 09:30:48'),
(2, 32, 'wwww', 2, '2021-05-12', 'male', 0, 11, 2, 1, 'phone.png', '2021-05-13 10:38:47', '2021-05-13 10:38:47'),
(3, 32, 'sdasdasd', 127, '2021-05-14', 'male', 0, 10, 2, 1, 'email.png', '2021-05-14 01:10:54', '2021-05-14 01:10:54'),
(4, 32, 'asd', 23, '2021-05-29', 'asd', 0, 0, 0, 0, 'phone.png', '2021-05-14 01:12:42', '2021-05-14 01:12:42'),
(5, 32, 'asdasdasd', 123, '2021-05-14', 'asdasd', 0, 0, 0, 0, 'email.png', '2021-05-14 01:14:31', '2021-05-14 01:14:31'),
(6, 32, 'asdasdasd', 123, '2021-05-14', 'asdasd', 0, 0, 0, 0, 'email.png', '2021-05-14 01:14:38', '2021-05-14 01:14:38'),
(7, 32, 'garfield', 3, '2019-06-14', 'male', 0, 15, 3, 2, 'email2.png', '2021-05-14 01:51:37', '2021-05-14 01:51:37'),
(8, 32, 'stuart', 127, '2021-05-29', '213213', 123, 123123, 2, 1, '', '2021-05-14 02:02:24', '2021-05-14 02:02:24'),
(9, 32, 'stuart 22', 3, '2021-05-29', 'male', 0, 10, 3, 2, '', '2021-05-14 02:02:45', '2021-05-14 02:02:45'),
(10, 2, 'a', 1, '2021-03-08', 'f', 0, 1, 3, 2, 'domestic.jpg', '2021-05-26 09:35:28', '2021-05-26 09:35:28'),
(11, 32, 'asdasd', 0, '0000-00-00', 'male', 1, 10, 3, 3, '', '2021-05-30 04:00:48', '2021-05-30 04:00:48'),
(12, 32, 'cuddly', 0, '0000-00-00', 'male', 45, 10, 3, 3, NULL, '2021-05-30 04:01:54', '2021-05-30 04:01:54'),
(13, 32, 'stuart 33', 0, '2021-04-07', 'male', 1, 15, 2, 3, '1622340217domestic.jpg', '2021-05-30 04:03:37', '2021-05-30 18:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `am_max` int(11) NOT NULL,
  `pm_max` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `date`, `branch_id`, `vet_id`, `am_max`, `pm_max`, `created`, `updated`) VALUES
(1, '2021-06-06', 1, 2, 10, 10, '2021-05-24 19:47:59', '2021-05-24 19:47:59'),
(2, '2021-06-07', 1, 2, 10, 10, '2021-05-24 19:47:59', '2021-05-24 19:47:59'),
(3, '2021-06-08', 1, 2, 10, 10, '2021-05-24 19:47:59', '2021-05-24 19:47:59'),
(4, '2021-06-09', 1, 2, 10, 10, '2021-05-24 19:47:59', '2021-05-24 19:47:59'),
(5, '2021-06-10', 1, 2, 10, 10, '2021-05-26 13:49:25', '2021-05-26 13:49:25'),
(6, '2021-06-11', 1, 2, 10, 10, '2021-05-26 13:49:25', '2021-05-26 13:49:25');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_info` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_name`, `s_info`, `price`) VALUES
(1, 'Consultation', 'Consultations give you the chance to talk about your pet\'s welfare, behavioral concerns, and preventative measures. During these periods, ill patients are seen, regular health tests are done, and vaccines are administered.', 100),
(2, 'Vaccination', 'Vaccinations are essential and help provide immunity against contagious and deadly diseases. Reduce the risk of diseases and ensure that your pet is protected with vaccines.', 350),
(3, 'Deworming', '', 100),
(4, 'Pet Grooming', 'Grooming your pet on a regular basis helps you to spot any underlying illnesses or disorders early, which means they can be handled more quickly and effectively, and are less likely to have a long-term impact on your pet.', 300),
(5, 'Vet Dental Care', 'Your pet\'s oral health is a good indicator of their overall health. Your pet\'s teeth should be checked at least once a year for early signs of problems. Our hospitals offer anesthetized dental cleanings and procedures.', 0),
(6, 'Laboratory Test', 'Samples for the tests can be obtained at the clinic or collected at home (feces, urine) and brought to the clinic by the pet owner.', 0),
(7, 'Surgery', 'Surgeries are performed under anesthesia for various conditions. Our full-service hospitals offer a variety of outpatient surgeries for pets.', 0),
(8, 'Confinement', 'Although temporary confinement of animals may be necessary in certain cases, there are healthy and humane ways to do so by implementing adequate monitoring and measures.', 1200),
(9, 'X-Ray', 'Radiographs, also known as x-ray tests, are images of the body produced by a brief burst of x-rays.', 900),
(10, 'Pet Lodging', '', 0),
(11, 'Pet Wellness', '', 0);

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
(1, 'dog', 0, '2021-05-11 19:54:04', '2021-05-26 09:37:38'),
(2, 'cat', 0, '0000-00-00 00:00:00', '2021-05-26 09:37:41'),
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
(32, 'mike', '167534dd329e39e41473c11d0a79b8ea', 'Pedro', 'C', 'Juan', 'eligaming28@gmail.com', '+61411111111', '09390084514', 'verified', 'client', '2021-05-11', '3w91Lexm7ud', 0);

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
(1, 'Kevin', '', 'Estacio', 'Dr.', '', 'Kevin', 'kevin', '01234567891', 'kevin@kevin.com', 'Dau, Mabalacat City, Pampanga', '2021-05-03', 1),
(2, 'Ryan', '', 'Castro', 'Dr.', '', 'DoctoRyan', 'ryan', '01234567891', 'ryan@ryan.com', 'cowcifhurgvynpmcawh98fna9cwpfysvg7yap9', '2021-05-03', 1),
(3, 'Arvin', '', 'Cuevas', 'Dr.', '', 'arvin', 'ar', '01234567890', 'arvin@arvin.com', 'San Fernando City, Pampanga', '0000-00-00', 0),
(4, 'Robin Alexis', '', 'Edquiban', 'Dr.', '', '', '', '', '', '', '0000-00-00', 0),
(5, 'Ata', '', 'Manalese', 'Dr.', '', '', '', '', '', '', '0000-00-00', 0),
(6, 'Lou', '', 'Punzalan', 'Dr.', '', '', '', '', '', '', '0000-00-00', 0),
(7, 'Jirah Lyn', '', 'Dollente', 'Dr.', '', '', '', '', '', '', '0000-00-00', 0);

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
-- Indexes for table `appointment_services`
--
ALTER TABLE `appointment_services`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `color`
--
ALTER TABLE `color`
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
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
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
-- AUTO_INCREMENT for table `appointment_services`
--
ALTER TABLE `appointment_services`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `vet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vet_schedule`
--
ALTER TABLE `vet_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
