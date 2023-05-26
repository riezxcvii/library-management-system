-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 01:27 PM
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
  `author_number` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `copies` int(5) NOT NULL,
  `edition` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pages` int(5) NOT NULL,
  `source_fund` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `publisher` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_place` varchar(50) NOT NULL,
  `copyright_year` varchar(4) NOT NULL,
  `year_published` varchar(4) NOT NULL,
  `category` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `physical_description` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `tracing` varchar(50) NOT NULL,
  `archive` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_ID`, `isbn`, `accession_number`, `date_receive`, `author_number`, `author_lastname`, `author_firstname`, `title`, `copies`, `edition`, `volume`, `pages`, `source_fund`, `cost`, `publisher`, `publication_place`, `copyright_year`, `year_published`, `category`, `physical_description`, `subject`, `status`, `tracing`, `archive`) VALUES
(17, '134', '3432', '2023-05-25', '34534', 'dfsfsd', 'gdfxfds', 'jdfg', 3432, 'fdfedsg', 'dgfgd', 0, 'dfsdf', '23432.00', 'gfd', 'fddxf', '232', '323', '', '', '', '0', 'esrdwe', 1),
(18, '2342347823', '3243', '2023-05-25', '334', 'sgdfd', 'dffs', 'ALice', 3, 'djfxgjkfdf', 'fgdfdxf', 0, 'hjsefd', '3.00', 'erd', 'ddfhsfd', '1234', '1234', '', '', '', '0', 'sdszfds', 0);

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
(4, '115218060054', 'Miguel', 'Edvenson Jay', 'M', '', 'Male', 'Student', 1, 0);

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
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_admin`
--

INSERT INTO `library_admin` (`admin_ID`, `last_name`, `first_name`, `middle_initial`, `name_extension`, `sex`, `role`, `status`, `username`, `password`) VALUES
(1, 'Banquillo', 'Rieza Marie', 'J', NULL, 'Female', 'Librarian', '1', 'librarian', 'library123'),
(2, 'Vagilidad', 'Rigel', NULL, NULL, 'Female', 'Librarian', '1', 'rigel.vagilidad', 'rigel12345'),
(3, 'Gallano', 'Leonil', NULL, NULL, 'Male', 'Admin', '1', 'leonil.gallano', 'leonil12345'),
(4, 'Miguel', 'Edvenson Jay', 'M', NULL, 'Male', 'Admin', '1', 'admin', 'admin12345');

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
(1, 0, '2023-05-25', '09:49:35', NULL);

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
  MODIFY `book_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `borrow_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `borrower_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
