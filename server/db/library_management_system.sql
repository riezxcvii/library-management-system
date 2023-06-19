-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 10:47 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_ID` int(10) NOT NULL,
  `isbn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `accession_number` varchar(10) NOT NULL,
  `date_receive` date NOT NULL,
  `classification_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `copies` int(5) NOT NULL,
  `edition` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` int(5) NOT NULL,
  `source_fund` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `publisher` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_place` varchar(50) NOT NULL,
  `copyright_year` varchar(4) NOT NULL,
  `category` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `physical_description` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Available',
  `tracing` varchar(50) DEFAULT NULL,
  `archive` smallint(1) NOT NULL DEFAULT 0 COMMENT '0 no, 1 yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_ID`, `isbn`, `accession_number`, `date_receive`, `classification_number`, `author_lastname`, `author_firstname`, `title`, `copies`, `edition`, `volume`, `pages`, `source_fund`, `cost`, `publisher`, `publication_place`, `copyright_year`, `category`, `physical_description`, `subject`, `status`, `tracing`, `archive`) VALUES
(1, '978-1420968095', '546,2019', '2019-02-21', 'R546', 'Rizal', 'Jose', 'Noli Me Tangere', 8, 'I Edition', '', 66, 'Donation', '0.00', 'Berliner Buchdruckerei-Aktieng', 'Berlin, Germany', '1887', 'Filipiniana', '', NULL, 'Available', '', 0),
(2, '978-1451552058', '851,2016', '2016-09-07', 'S851', 'Shakespeare', 'William', 'Romeo and Juliet', 4, 'IV Edition', '', 64, 'Donation', '0.00', 'Simon & Schuster', 'CreateSpace Independent Publishing Platform', '1596', 'Fiction', '', NULL, 'Available', '', 0),
(3, '978-1510761384', '758,2021', '2021-04-13', 'J758', 'Janssen', 'Sarrah', 'The World Almanac and Book of Facts 2021', 1, 'IX Edition', '', 113, 'Donation', '0.00', 'World Almanac', 'United States', '2020', 'Reference', '', NULL, 'Available', '', 0),
(4, '978-0824831325', '364,2014', '2014-10-24', 'R364', 'Rizal', 'Jose', 'El Filibusterismo', 7, 'VI Edition', '', 0, 'Donation', '0.00', 'University of Hawaii Press', 'Ghent, Belgium', '1891', 'Filipiniana', '', NULL, 'Available', '', 0),
(5, '0446611093', '', '2010-01-10', '', 'Kiyosaki', 'Robert', 'Rich dad, poor dad', 1, '', '', 266, 'Donation', '0.00', 'Warner books', 'New York', '1998', 'Fiction', '', NULL, 'Available', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `borrow_ID` int(10) NOT NULL,
  `book_ID` int(10) NOT NULL,
  `borrower_ID` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `copies` int(5) NOT NULL,
  `date_issued` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `returned_date` date DEFAULT NULL,
  `status` varchar(10) NOT NULL COMMENT 'Borrowed or Returned',
  `penalty` int(10) NOT NULL,
  `paid` smallint(1) NOT NULL COMMENT '0 no, 1 yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`borrow_ID`, `book_ID`, `borrower_ID`, `title`, `copies`, `date_issued`, `due_date`, `returned_date`, `status`, `penalty`, `paid`) VALUES
(1, 2, 6, '', 0, '2023-06-08', '2023-06-15', '2023-06-18', 'Returned', 15, 0),
(2, 2, 14, '', 1, '2023-06-05', '2023-06-17', NULL, 'Borrowed', 10, 0),
(3, 5, 3, '', 1, '2023-06-19', '2023-06-21', NULL, 'Borrowed', 0, 0),
(4, 1, 30, '', 1, '2023-06-19', '2023-06-21', NULL, 'Borrowed', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `borrower_ID` int(10) NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `name_extension` varchar(4) DEFAULT NULL,
  `sex` varchar(6) NOT NULL COMMENT 'Male or Female',
  `grade_level` varchar(10) NOT NULL,
  `section` varchar(30) NOT NULL,
  `role` varchar(7) NOT NULL COMMENT 'Student or Teacher',
  `status` smallint(1) NOT NULL DEFAULT 0 COMMENT '0 not active, 1 active',
  `deactivate` smallint(1) NOT NULL DEFAULT 0 COMMENT '0 no, 1 yes',
  `registered_date` date DEFAULT current_timestamp(),
  `deactivation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`borrower_ID`, `id_number`, `last_name`, `first_name`, `middle_initial`, `name_extension`, `sex`, `grade_level`, `section`, `role`, `status`, `deactivate`, `registered_date`, `deactivation_date`) VALUES
(1, '115218060036', 'Banquillo', 'Rieza Marie', 'J', '', 'Female', 'Grade 12', 'A', 'Student', 1, 1, '2023-05-29', '2023-06-19'),
(2, '546139921556', 'Barbaza', 'John Vincent', 'N', '', 'Male', '', '', 'Teacher', 1, 0, '0000-00-00', '0000-00-00'),
(3, '361224985723', 'Hiponia', 'Roneilita', 'H', '', 'Female', '', '', 'Teacher', 1, 0, '0000-00-00', '0000-00-00'),
(4, '115218060054', 'Miguel', 'Edvenson Jay', 'M', '', 'Male', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(5, '201926584', 'Garfin', 'April Jane', 'A', '', 'Female', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(6, '1568468896', 'Secugal', 'Kenrick Agustin', 'S', '', 'Male', '', '', 'Teacher', 1, 1, '0000-00-00', '2023-06-18'),
(7, '548921321', 'Alison', 'Ramon', '', 'Jr', 'Male', '', '', 'Teacher', 1, 1, '0000-00-00', '2023-06-18'),
(8, '54684071', 'Sabino', 'Rustia', 'B', '', 'Female', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(9, '115218095648', 'Banquillo', 'Vivien', 'J', '', 'Female', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(10, '115218095648', 'Banquillo', 'Vivien', 'J', '', 'Female', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(11, '115296080040', 'Reymaro', 'Kent Ralli', '', '', 'Male', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(13, '158664823654', 'Marin', 'Edward Louie', '', '', 'Male', '', '', 'Teacher', 1, 0, '0000-00-00', '0000-00-00'),
(14, '115218060084', 'Guillermo', 'Fritzel Joy', 'C', '', 'Female', '', '', 'Student', 1, 1, '0000-00-00', '2023-06-18'),
(15, '135226489527', 'Elequin', 'Jonas Eric', '', '', 'Male', '', '', 'Teacher', 1, 1, '0000-00-00', '2023-06-18'),
(16, '264895113564', 'Zamora', 'Cherry Mae', 'P', '', 'Male', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(17, '548964546', 'Nain', 'Cherry', '', '', 'Female', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(18, '432546346345', 'Narzo', 'Joseph', '', '', 'Male', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(19, '115218024869', 'Acero', 'John Paul', 'H', '', 'Male', 'Grade 11', 'C', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(20, '152348685940', 'Pagunsan', 'Jobelle', '', '', 'Female', '', '', 'Student', 1, 0, '0000-00-00', '0000-00-00'),
(21, '115218052348', 'Saballa', 'Mary Jezza', '', '', 'Female', '', '', 'Teacher', 1, 0, '0000-00-00', '0000-00-00'),
(22, '115218562496', 'Swayer', 'Marivic', '', '', 'Female', '', '', 'Student', 1, 0, '2023-06-18', '0000-00-00'),
(23, '115218658954', 'Dela Cruz', 'Juan', 'P', 'Jr', 'Male', '', '', 'Teacher', 2, 0, '2023-06-18', NULL),
(24, '15236848526', 'Magallanes', 'Faith Hope', '', '', 'Female', '', '', 'Teacher', 1, 0, '2023-06-18', NULL),
(25, '541468400433', 'Vegafria', 'King', '', '', 'Male', '', '', 'Teacher', 0, 0, '2023-06-18', NULL),
(27, '115218352479', 'Aurelio', 'Manilyn', '', '', 'Female', 'Grade 8', 'Oriole', 'Student', 0, 0, '2023-06-18', NULL),
(28, '115218648221', 'Lacurom', 'John Michael', '', '', 'Male', '', '', 'Student', 1, 0, '2023-06-18', NULL),
(29, '564866147268', 'Alejo', 'Benjamin', '', 'III', 'Male', '', '', 'Teacher', 0, 0, '2023-06-18', NULL),
(30, '2200137', 'Bel-ida', 'Axl John', 'T', '', 'Male', 'Grade 9', 'Hermes', 'Student', 1, 0, '2023-06-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `library_admin`
--

CREATE TABLE `library_admin` (
  `admin_ID` int(3) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `name_extension` varchar(4) DEFAULT NULL,
  `sex` varchar(6) NOT NULL COMMENT 'Male or Female',
  `role` varchar(10) NOT NULL COMMENT 'Admin or Librarian',
  `status` smallint(1) NOT NULL COMMENT '0 not active, 1 active',
  `deactivate` smallint(1) NOT NULL DEFAULT 0 COMMENT '0 no, 1 yes',
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `deactivation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_admin`
--

INSERT INTO `library_admin` (`admin_ID`, `last_name`, `first_name`, `middle_initial`, `name_extension`, `sex`, `role`, `status`, `deactivate`, `username`, `password`, `registered_date`, `deactivation_date`) VALUES
(1, 'Calubiran', 'Kurly Jhon', 'F', '', 'Male', 'Admin', 1, 0, 'admin', 'admin12345', '2023-05-18', NULL),
(2, 'Vagilidad', 'Rigel', '', '', 'Female', 'Librarian', 1, 1, 'librarian', 'library2023', '2023-05-19', '2023-06-18'),
(3, 'Fernando', 'Loren', 'S', '', 'Female', 'Librarian', 1, 0, 'lorenfernando', 'librarian12345', '2023-06-05', NULL),
(4, 'Jomolo', 'Roger', '', '', 'Male', 'Admin', 1, 0, 'roger', 'roger12345', '2023-06-12', NULL),
(5, 'Laude', 'Sufena Joy', 'L', '', 'Male', 'Admin', 1, 0, 'sufenajoy', '123456789', '2023-06-18', NULL),
(6, 'Banquillo', 'Rieza Marie', 'J', '', 'Female', 'Librarian', 1, 0, 'rieza.banquillo', 'rieza2609', '2023-06-18', NULL),
(7, 'Narzo', 'John Joseph', '', '', 'Male', 'Admin', 1, 0, 'napaynarz', 'napay12345', '2023-06-18', NULL),
(8, 'Vagilidad', 'Rigel', '', '', 'Female', 'Librarian', 1, 0, 'ANSlibrary', 'ans12345', '2023-06-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `admin_ID` int(10) NOT NULL,
  `borrower_ID` int(10) NOT NULL,
  `date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`admin_ID`, `borrower_ID`, `date`, `time_in`, `time_out`) VALUES
(4, 0, '2023-05-16', '17:06:45', '17:07:02'),
(1, 0, '2023-05-16', '17:08:00', '17:08:15'),
(4, 0, '2023-05-16', '17:11:30', NULL),
(4, 0, '2023-05-17', '10:26:40', NULL),
(4, 0, '2023-05-18', '08:57:54', NULL),
(1, 0, '2023-05-18', '09:02:34', NULL),
(1, 0, '2023-05-18', '10:06:45', NULL),
(4, 0, '2023-05-20', '10:12:47', '11:30:00'),
(1, 0, '2023-05-20', '11:30:29', NULL),
(4, 0, '2023-05-20', '16:22:18', NULL),
(4, 0, '2023-05-22', '20:50:06', '20:50:55'),
(4, 0, '2023-05-23', '11:15:39', NULL),
(4, 0, '2023-05-23', '16:18:00', NULL),
(4, 0, '2023-05-23', '17:57:50', '18:29:03'),
(1, 0, '2023-05-23', '18:29:15', '20:06:02'),
(4, 0, '2023-05-23', '20:06:07', '22:15:55'),
(1, 0, '2023-05-23', '22:16:08', '22:22:35'),
(4, 0, '2023-05-23', '22:22:41', '22:30:53'),
(4, 0, '2023-05-23', '22:31:48', '22:31:57'),
(1, 0, '2023-05-23', '22:32:27', NULL),
(4, 0, '2023-05-23', '22:52:38', '23:00:15'),
(1, 0, '2023-05-24', '10:26:21', NULL),
(4, 0, '2023-05-24', '10:46:19', '10:56:14'),
(1, 0, '2023-05-24', '10:56:51', '13:35:05'),
(4, 0, '2023-05-24', '13:35:10', '14:32:44'),
(1, 0, '2023-05-24', '14:32:51', NULL),
(1, 0, '2023-05-25', '09:36:03', NULL),
(1, 0, '2023-05-25', '09:49:35', NULL),
(4, 0, '2023-05-28', '08:07:46', '08:09:54'),
(1, 0, '2023-05-28', '08:10:28', '13:20:23'),
(4, 0, '2023-05-28', '13:20:36', '13:31:49'),
(1, 0, '2023-05-28', '13:39:13', '13:54:30'),
(4, 0, '2023-05-28', '13:54:34', '13:55:39'),
(1, 0, '2023-05-28', '13:55:45', '15:56:20'),
(0, 8, '2023-05-28', '16:29:23', NULL),
(0, 8, '2023-05-28', '16:30:39', NULL),
(4, 0, '2023-05-28', '16:31:17', '16:34:59'),
(0, 5, '2023-05-28', '16:38:00', '16:38:20'),
(4, 0, '2023-05-28', '16:39:22', '16:53:26'),
(1, 0, '2023-05-28', '16:53:32', NULL),
(4, 0, '2023-05-29', '07:18:42', '07:38:40'),
(1, 0, '2023-05-29', '07:38:51', NULL),
(4, 0, '2023-05-29', '07:42:56', '07:43:16'),
(1, 0, '2023-05-29', '07:43:24', '08:08:49'),
(1, 0, '2023-05-29', '08:44:36', NULL),
(4, 0, '2023-05-29', '10:35:58', '11:01:33'),
(1, 0, '2023-05-29', '11:01:41', '19:08:54'),
(4, 0, '2023-05-29', '19:27:24', '19:29:27'),
(1, 0, '2023-05-29', '19:29:44', '19:35:12'),
(4, 0, '2023-05-29', '20:21:56', '20:31:11'),
(1, 0, '2023-05-29', '20:31:37', '21:10:31'),
(4, 0, '2023-05-29', '21:10:37', '21:37:25'),
(0, 1, '2023-05-29', '21:39:41', NULL),
(1, 0, '2023-05-29', '22:21:30', '22:31:49'),
(0, 8, '2023-05-29', '22:35:47', '22:45:19'),
(0, 5, '2023-05-29', '22:45:49', '23:09:57'),
(0, 8, '2023-05-29', '23:10:33', '23:10:54'),
(0, 1, '2023-05-29', '23:11:18', NULL),
(4, 0, '2023-05-29', '23:14:49', '23:29:03'),
(0, 5, '2023-05-29', '23:29:59', '23:31:21'),
(1, 0, '2023-05-30', '07:52:03', '08:37:08'),
(4, 0, '2023-05-30', '08:37:14', '08:38:23'),
(1, 0, '2023-05-30', '08:39:05', '08:39:45'),
(0, 8, '2023-05-30', '08:42:51', '08:45:43'),
(1, 0, '2023-05-30', '08:45:52', '10:42:53'),
(1, 0, '2023-05-30', '11:29:16', NULL),
(0, 1, '2023-05-30', '11:40:11', '12:09:25'),
(0, 5, '2023-05-30', '12:10:46', '12:16:41'),
(4, 0, '2023-05-30', '12:20:27', NULL),
(0, 5, '2023-05-30', '12:20:48', '12:34:04'),
(0, 1, '2023-05-30', '12:35:46', '12:36:38'),
(4, 0, '2023-05-30', '12:52:16', NULL),
(1, 0, '2023-05-30', '12:56:26', NULL),
(0, 1, '2023-05-30', '12:57:10', '14:20:24'),
(4, 0, '2023-05-30', '15:27:47', '15:37:09'),
(1, 0, '2023-05-30', '15:37:16', NULL),
(4, 0, '2023-05-31', '06:56:46', '06:57:11'),
(1, 0, '2023-05-31', '06:57:24', '06:58:34'),
(0, 5, '2023-05-31', '07:08:31', '07:08:43'),
(4, 0, '2023-06-01', '17:36:15', '17:42:43'),
(1, 0, '2023-06-01', '17:42:49', '17:57:04'),
(0, 4, '2023-06-01', '17:58:15', NULL),
(4, 0, '2023-06-01', '18:25:30', NULL),
(0, 5, '2023-06-01', '18:46:25', '18:46:28'),
(0, 5, '2023-06-01', '18:46:50', '18:48:57'),
(4, 0, '2023-06-01', '22:23:19', '22:49:18'),
(1, 0, '2023-06-01', '22:49:30', '23:01:09'),
(1, 0, '2023-06-01', '23:01:20', NULL),
(1, 0, '2023-06-01', '23:09:35', '23:10:06'),
(4, 0, '2023-06-02', '10:36:49', NULL),
(4, 0, '2023-06-02', '15:08:46', '16:29:25'),
(3, 0, '2023-06-02', '16:34:17', '16:35:06'),
(2, 0, '2023-06-02', '17:08:43', '18:06:42'),
(1, 0, '2023-06-02', '19:34:01', NULL),
(1, 0, '2023-06-04', '11:48:47', '11:52:26'),
(2, 0, '2023-06-04', '11:52:44', '14:46:41'),
(1, 0, '2023-06-04', '14:46:49', '15:38:41'),
(2, 0, '2023-06-04', '15:40:34', '15:44:33'),
(0, 5, '2023-06-04', '15:44:39', '15:45:36'),
(0, 5, '2023-06-04', '15:49:12', '15:49:21'),
(2, 0, '2023-06-04', '15:49:30', '15:50:05'),
(1, 0, '2023-06-04', '15:50:20', '16:05:53'),
(2, 0, '2023-06-04', '16:06:00', '16:12:37'),
(1, 0, '2023-06-04', '16:12:50', '19:53:58'),
(1, 0, '2023-06-05', '08:56:07', '09:00:53'),
(0, 5, '2023-06-05', '09:03:49', '09:04:02'),
(1, 0, '2023-06-05', '17:14:00', '17:38:44'),
(1, 0, '2023-06-05', '17:40:08', '17:46:53'),
(2, 0, '2023-06-05', '20:43:57', '20:46:52'),
(2, 0, '2023-06-05', '20:46:59', NULL),
(0, 1, '2023-06-05', '20:47:34', '21:19:08'),
(1, 0, '2023-06-06', '08:56:43', NULL),
(1, 0, '2023-06-06', '08:58:06', NULL),
(1, 0, '2023-06-06', '08:58:40', NULL),
(1, 0, '2023-06-06', '09:20:01', '09:20:06'),
(2, 0, '2023-06-06', '09:20:21', '09:20:31'),
(1, 0, '2023-06-06', '09:24:35', NULL),
(1, 0, '2023-06-06', '10:01:31', NULL),
(1, 0, '2023-06-06', '13:03:58', '13:05:17'),
(1, 0, '2023-06-06', '13:45:54', NULL),
(1, 0, '2023-06-06', '13:48:02', NULL),
(1, 0, '2023-06-06', '13:50:32', NULL),
(1, 0, '2023-06-06', '13:51:39', NULL),
(2, 0, '2023-06-06', '13:56:03', NULL),
(1, 0, '2023-06-06', '13:59:23', NULL),
(1, 0, '2023-06-06', '14:34:07', NULL),
(1, 0, '2023-06-06', '14:40:58', NULL),
(1, 0, '2023-06-06', '14:41:29', '14:42:19'),
(0, 1, '2023-06-06', '14:43:00', '14:43:28'),
(2, 0, '2023-06-06', '14:43:35', '14:44:34'),
(1, 0, '2023-06-06', '14:47:06', '14:47:59'),
(1, 0, '2023-06-06', '14:56:10', '14:57:11'),
(1, 0, '2023-06-06', '17:10:39', '17:52:59'),
(3, 0, '2023-06-06', '17:55:47', '19:34:14'),
(0, 8, '2023-06-06', '19:37:52', '19:42:55'),
(0, 5, '2023-06-06', '19:43:13', '19:46:35'),
(3, 0, '2023-06-06', '19:46:43', '19:47:01'),
(0, 1, '2023-06-06', '19:47:24', '19:48:24'),
(3, 0, '2023-06-06', '19:48:42', '19:50:49'),
(0, 1, '2023-06-06', '19:50:53', '19:58:18'),
(0, 1, '2023-06-06', '20:07:41', '20:07:48'),
(3, 0, '2023-06-06', '20:33:46', '20:51:32'),
(3, 0, '2023-06-06', '21:35:12', '21:37:20'),
(0, 1, '2023-06-06', '21:37:27', '21:39:54'),
(1, 0, '2023-06-07', '09:12:30', '09:13:15'),
(3, 0, '2023-06-07', '09:13:25', '09:14:10'),
(1, 0, '2023-06-08', '19:49:17', NULL),
(1, 0, '2023-06-09', '09:44:34', NULL),
(3, 0, '2023-06-09', '09:45:30', '10:27:37'),
(0, 1, '2023-06-09', '10:27:58', '10:36:39'),
(1, 0, '2023-06-09', '10:36:47', '10:52:09'),
(3, 0, '2023-06-09', '10:52:21', '10:55:00'),
(1, 0, '2023-06-09', '10:55:04', '10:55:27'),
(0, 1, '2023-06-09', '10:55:34', '10:57:21'),
(1, 0, '2023-06-09', '13:24:04', '13:36:52'),
(3, 0, '2023-06-09', '13:37:01', '13:42:59'),
(1, 0, '2023-06-09', '13:43:05', '17:53:40'),
(3, 0, '2023-06-09', '17:53:47', NULL),
(1, 0, '2023-06-09', '17:54:37', '17:55:46'),
(3, 0, '2023-06-09', '17:56:04', '17:59:23'),
(1, 0, '2023-06-09', '17:59:27', '18:02:16'),
(0, 1, '2023-06-09', '18:02:42', '20:13:19'),
(1, 0, '2023-06-12', '10:33:33', '12:55:08'),
(3, 0, '2023-06-12', '12:55:14', '14:48:11'),
(1, 0, '2023-06-12', '14:48:15', '14:49:21'),
(0, 1, '2023-06-12', '14:49:53', '14:52:11'),
(1, 0, '2023-06-12', '14:52:27', '14:54:58'),
(3, 0, '2023-06-12', '14:55:05', '15:04:16'),
(1, 0, '2023-06-12', '15:04:21', '20:49:23'),
(3, 0, '2023-06-12', '20:49:30', '21:19:53'),
(3, 0, '2023-06-13', '16:25:35', '18:07:29'),
(1, 0, '2023-06-13', '18:07:36', '18:07:50'),
(3, 0, '2023-06-13', '18:08:29', '18:19:11'),
(1, 0, '2023-06-13', '19:22:51', '20:02:13'),
(3, 0, '2023-06-13', '20:03:11', '21:15:21'),
(0, 1, '2023-06-13', '21:15:50', '21:19:17'),
(1, 0, '2023-06-13', '21:20:34', '21:26:43'),
(3, 0, '2023-06-13', '21:26:50', '22:43:33'),
(0, 1, '2023-06-14', '07:43:37', '07:43:46'),
(1, 0, '2023-06-14', '07:44:00', '07:44:42'),
(3, 0, '2023-06-14', '07:44:50', '07:45:25'),
(1, 0, '2023-06-14', '08:30:48', NULL),
(1, 0, '2023-06-14', '08:34:28', '08:37:32'),
(3, 0, '2023-06-14', '08:37:39', '08:39:48'),
(1, 0, '2023-06-14', '08:41:12', '08:44:11'),
(3, 0, '2023-06-14', '08:44:16', '08:46:20'),
(0, 1, '2023-06-14', '08:46:32', '08:46:38'),
(0, 1, '2023-06-14', '08:46:43', '08:47:02'),
(3, 0, '2023-06-14', '08:47:13', NULL),
(0, 1, '2023-06-14', '10:16:06', '10:16:46'),
(3, 0, '2023-06-14', '10:16:53', '10:20:33'),
(1, 0, '2023-06-14', '10:20:37', '10:24:09'),
(0, 3, '2023-06-14', '10:24:55', '10:25:57'),
(1, 0, '2023-06-14', '10:26:26', '10:27:36'),
(3, 0, '2023-06-14', '10:27:51', '13:21:33'),
(1, 0, '2023-06-14', '13:22:07', '13:23:30'),
(3, 0, '2023-06-14', '14:22:16', '14:28:53'),
(1, 0, '2023-06-14', '14:28:58', '14:30:02'),
(1, 0, '2023-06-14', '14:30:37', '14:31:20'),
(0, 1, '2023-06-14', '14:31:31', '14:34:23'),
(1, 0, '2023-06-14', '15:18:09', NULL),
(0, 1, '2023-06-14', '15:18:44', '15:21:00'),
(0, 1, '2023-06-14', '15:22:22', '15:22:51'),
(3, 0, '2023-06-14', '15:22:59', NULL),
(3, 0, '2023-06-15', '16:09:00', '16:25:26'),
(1, 0, '2023-06-15', '16:25:31', '16:25:48'),
(3, 0, '2023-06-15', '22:12:24', NULL),
(1, 0, '2023-06-16', '17:38:29', '17:38:47'),
(3, 0, '2023-06-16', '17:38:54', '17:55:12'),
(1, 0, '2023-06-16', '17:55:17', '17:57:33'),
(3, 0, '2023-06-16', '17:58:31', NULL),
(3, 0, '2023-06-17', '12:48:29', '13:13:02'),
(1, 0, '2023-06-17', '13:13:06', '13:45:18'),
(1, 0, '2023-06-17', '13:45:34', NULL),
(0, 1, '2023-06-17', '13:47:02', '13:48:39'),
(2, 0, '2023-06-17', '14:01:06', '15:06:30'),
(1, 0, '2023-06-17', '15:06:36', '15:45:16'),
(1, 0, '2023-06-17', '19:48:21', '20:18:22'),
(2, 0, '2023-06-17', '20:18:28', '20:26:01'),
(0, 1, '2023-06-17', '20:26:07', '20:27:21'),
(0, 1, '2023-06-17', '20:30:49', '21:03:11'),
(1, 0, '2023-06-17', '21:03:17', '21:05:01'),
(2, 0, '2023-06-17', '21:05:14', '21:24:49'),
(1, 0, '2023-06-17', '22:39:27', '22:44:42'),
(2, 0, '2023-06-17', '22:45:35', '22:53:17'),
(0, 1, '2023-06-17', '22:55:35', NULL),
(1, 0, '2023-06-18', '10:46:10', '10:46:14'),
(1, 0, '2023-06-18', '10:46:41', NULL),
(0, 1, '2023-06-18', '13:07:28', '13:56:28'),
(6, 0, '2023-06-18', '13:57:10', '13:57:23'),
(3, 0, '2023-06-18', '13:58:09', NULL),
(1, 0, '2023-06-18', '14:00:42', '15:50:33'),
(0, 1, '2023-06-18', '15:50:55', '16:21:01'),
(6, 0, '2023-06-18', '16:23:42', '17:29:21'),
(1, 0, '2023-06-18', '17:29:25', '17:31:37'),
(6, 0, '2023-06-18', '17:31:54', '17:46:18'),
(0, 1, '2023-06-18', '17:46:26', '17:46:45'),
(6, 0, '2023-06-18', '17:46:55', NULL),
(0, 1, '2023-06-18', '17:47:07', '18:02:18'),
(0, 1, '2023-06-19', '06:43:22', '06:46:29'),
(6, 0, '2023-06-19', '06:46:57', NULL),
(0, 1, '2023-06-19', '06:48:47', '06:50:54'),
(1, 0, '2023-06-19', '06:51:01', '06:52:09'),
(1, 0, '2023-06-19', '08:41:49', NULL),
(8, 0, '2023-06-19', '08:44:36', NULL),
(0, 30, '2023-06-19', '09:08:29', '09:08:39'),
(0, 30, '2023-06-19', '09:08:45', '13:42:09'),
(6, 0, '2023-06-19', '14:26:29', '14:56:01'),
(1, 0, '2023-06-19', '15:01:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_ID` int(11) NOT NULL,
  `book_ID` int(11) NOT NULL,
  `borrower_ID` int(11) NOT NULL,
  `borrow_ID` int(10) NOT NULL,
  `notification_text` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `notif_status` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_ID`, `book_ID`, `borrower_ID`, `borrow_ID`, `notification_text`, `type`, `date`, `notif_status`) VALUES
(0, 2, 0, 0, 'Low stock for \"Romeo and Juliet\" book.', 'librarian', '2023-06-17', 1),
(0, 3, 0, 0, 'Low stock for \"The World Almanac and Book of Facts 2021\" book.', 'librarian', '2023-06-17', 1),
(0, 0, 20, 0, 'Jobelle Pagunsan wants to be registered in the system.', 'admin', '2023-06-17', 1),
(0, 0, 0, 0, 'Rieza Marie Banquillo who just logged in has a pending fine of 40.00 for not returning book on time.', 'admin', '2023-06-17', 1),
(0, 0, 0, 0, 'Rieza Marie Banquillo who just logged in has a pending fine of 40.00 for not returning book on time.', 'admin', '2023-06-17', 1),
(0, 0, 0, 0, 'Rieza Marie Banquillo who just logged in has a pending fine of 40.00 for not returning book on time.', 'admin', '2023-06-17', 1),
(0, 0, 23, 0, 'Juan Dela Cruz wants to be registered in the system.', 'admin', '2023-06-18', 0),
(0, 0, 24, 0, 'Faith Hope Magallanes wants to be registered in the system.', 'admin', '2023-06-18', 0),
(0, 0, 0, 0, 'Rieza Marie Banquillo who just logged in has a pending fine of 40.00 for not returning book on time.', 'admin', '2023-06-18', 0),
(0, 2, 0, 0, 'Low stock for \"Romeo and Juliet\" book.', 'librarian', '2023-06-18', 0),
(0, 3, 0, 0, 'Low stock for \"The World Almanac and Book of Facts 2021\" book.', 'librarian', '2023-06-18', 0),
(0, 0, 25, 0, 'King Vegafria wants to be registered in the system.', 'admin', '2023-06-18', 0),
(0, 0, 26, 0, 'King Vegafria wants to be registered in the system.', 'admin', '2023-06-18', 0),
(0, 0, 27, 0, 'Manilyn Aurelio wants to be registered in the system.', 'admin', '2023-06-18', 0),
(0, 0, 28, 0, 'John Michael Lacurom wants to be registered in the system.', 'admin', '2023-06-18', 0),
(0, 0, 29, 0, 'Benjamin Alejo wants to be registered in the system.', 'admin', '2023-06-18', 0),
(0, 0, 0, 2, 'The book \"Romeo and Juliet\" borrowed by Fritzel Joy  Guillermo is overdue by 1 day(s).', 'librarian', '2023-06-18', 0),
(0, 0, 0, 2, 'The book \"Romeo and Juliet\" borrowed by Fritzel Joy  Guillermo is overdue by 2 day(s).', 'librarian', '2023-06-19', 0),
(0, 2, 0, 0, 'Low stock for \"Romeo and Juliet\" book.', 'librarian', '2023-06-19', 0),
(0, 3, 0, 0, 'Low stock for \"The World Almanac and Book of Facts 2021\" book.', 'librarian', '2023-06-19', 0),
(0, 5, 0, 0, 'Low stock for \"Rich dad, poor dad\" book.', 'librarian', '2023-06-19', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_ID`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`borrow_ID`),
  ADD KEY `FK book_ID` (`book_ID`);

--
-- Indexes for table `borrowers`
--
ALTER TABLE `borrowers`
  ADD PRIMARY KEY (`borrower_ID`);

--
-- Indexes for table `library_admin`
--
ALTER TABLE `library_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `borrow_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `borrower_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `library_admin`
--
ALTER TABLE `library_admin`
  MODIFY `admin_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `FK book_ID` FOREIGN KEY (`book_ID`) REFERENCES `books` (`book_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
