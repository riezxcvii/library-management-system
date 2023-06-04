-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 02:59 PM
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
  `author_number` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `copies` int(5) NOT NULL,
  `edition` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` int(5) NOT NULL,
  `source_fund` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `publisher` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_place` varchar(50) NOT NULL,
  `copyright_year` varchar(4) NOT NULL,
  `year_published` varchar(4) NOT NULL,
  `category` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `physical_description` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Available',
  `tracing` varchar(50) DEFAULT NULL,
  `archive` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_ID`, `isbn`, `accession_number`, `date_receive`, `author_number`, `author_lastname`, `author_firstname`, `title`, `copies`, `edition`, `volume`, `pages`, `source_fund`, `cost`, `publisher`, `publication_place`, `copyright_year`, `year_published`, `category`, `physical_description`, `subject`, `status`, `tracing`, `archive`) VALUES
(1, '978-1420968095', '546,2019', '2019-02-21', 'R546', 'Rizal', 'Jose', 'Noli Me Tangere', 6, 'I Edition', '', 0, 'Donation', '0.00', 'Berliner Buchdruckerei-Aktieng', 'Berlin, Germany', '1887', '1887', 'Filipiniana', '', NULL, 'Available', '', 0),
(2, '978-1451552058', '851,2016', '2016-09-07', 'S851', 'Shakespeare', 'William', 'Romeo and Juliet', 4, 'IV Edition', '', 0, 'Donation', '0.00', 'Simon & Schuster', 'CreateSpace Independent Publishing Platform', '1596', '1596', 'Fiction', '', NULL, 'Available', '', 0),
(3, '978-1510761384', '758,2021', '2021-04-13', 'J758', 'Janssen', 'Sarrah', 'The World Almanac and Book of Facts 2021', 1, 'IX Edition', '', 0, 'Donation', '0.00', 'World Almanac', 'United States', '2020', '2020', 'Reference', NULL, NULL, 'Available', '', 0),
(4, '978-0824831325', '364,2014', '2014-10-24', 'R364', 'Rizal', 'Jose', 'El Filibusterismo', 7, 'VI Edition', '', 0, 'Donation', '0.00', 'University of Hawaii Press', 'Ghent, Belgium', '1891', '1891', 'Filipiniana', '', NULL, 'Available', '', 0);

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
  `status` varchar(10) NOT NULL COMMENT 'Borrowed or Returned'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`borrow_ID`, `book_ID`, `borrower_ID`, `title`, `copies`, `date_issued`, `due_date`, `returned_date`, `status`) VALUES
(1, 3, 1, '', 0, '2023-05-30', '2023-05-22', '2023-05-30', 'Returned'),
(2, 2, 1, '', 0, '2023-05-30', '2023-05-31', '2023-05-30', 'Returned'),
(3, 3, 5, '', 0, '2023-05-30', '2023-06-08', '2023-06-02', 'Returned'),
(4, 4, 4, '', 0, '2023-05-30', '2023-05-31', '2023-06-02', 'Returned'),
(5, 2, 8, '', 1, '2023-06-02', '2023-06-08', NULL, 'Borrowed');

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
  `role` varchar(7) NOT NULL COMMENT 'Student or Teacher',
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0 not active, 1 active',
  `deactivate` int(1) NOT NULL DEFAULT 0 COMMENT '0 no, 1 yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowers`
--

INSERT INTO `borrowers` (`borrower_ID`, `id_number`, `last_name`, `first_name`, `middle_initial`, `name_extension`, `sex`, `role`, `status`, `deactivate`) VALUES
(1, '115218060036', 'Banquillo', 'Rieza Marie', 'J', '', 'Female', 'Student', 1, 0),
(2, '546139921556', 'Barbaza', 'John Vincent', 'N', '', 'Male', 'Teacher', 1, 0),
(3, '361224985723', 'Hiponia', 'Roneilita', 'H', '', 'Female', 'Teacher', 1, 0),
(4, '115218060054', 'Miguel', 'Edvenson Jay', 'M', '', 'Male', 'Student', 1, 0),
(5, '201926584', 'Garfin', 'April Jane', 'A', '', 'Female', 'Student', 1, 0),
(6, '1568468896', 'Secugal', 'Kenrick Agustin', 'S', '', 'Male', 'Teacher', 1, 0),
(7, '548921321', 'Alison', 'Ramon', '', 'Jr', 'Male', 'Teacher', 1, 0),
(8, '54684071', 'Sabino', 'Rustia', 'B', '', 'Female', 'Student', 1, 0),
(9, '115218095648', 'Banquillo', 'Vivien', 'J', '', 'Female', 'Student', 1, 1),
(10, '115218095648', 'Banquillo', 'Vivien', 'J', '', 'Female', 'Student', 0, 0),
(11, '115296080040', 'Reymaro', 'Kent Ralli', '', '', 'Male', 'Student', 0, 0),
(13, '158664823654', 'Marin', 'Edward Louie', '', '', 'Male', 'Teacher', 0, 0),
(14, '115218060084', 'Guillermo', 'Fritzel Joy', 'C', '', 'Female', 'Student', 1, 0),
(15, '135226489527', 'Elequin', 'Jonas Eric', '', '', 'Male', 'Teacher', 1, 0),
(16, '264895113564', 'Zamora', 'Cherry Mae', '', '', 'Male', 'Student', 1, 0);

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
  `status` varchar(10) NOT NULL COMMENT '0 not active, 1 active',
  `deactivate` int(1) NOT NULL DEFAULT 0,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_admin`
--

INSERT INTO `library_admin` (`admin_ID`, `last_name`, `first_name`, `middle_initial`, `name_extension`, `sex`, `role`, `status`, `deactivate`, `username`, `password`) VALUES
(1, 'Gallano', 'Leonil', '', '', 'Male', 'Admin', '1', 0, 'leonil.gallano', 'admin12345'),
(2, 'Vagilidad', 'Rigel', '', '', 'Female', 'Librarian', '1', 0, 'rigel', 'librarian123'),
(3, 'Banquillo', 'Rieza', 'J', '', 'Male', 'Librarian', '1', 1, 'riezabanquillo', 'rieza2609'),
(4, 'Jomolo', 'Roger', '', '', 'Male', 'Admin', '1', 0, 'roger', 'roger12345');

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
(1, 0, '2023-06-04', '16:12:50', '19:53:58');

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
  MODIFY `book_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `borrow_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `borrower_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `library_admin`
--
ALTER TABLE `library_admin`
  MODIFY `admin_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
