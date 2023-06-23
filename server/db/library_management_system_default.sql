-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 09:37 AM
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
  `book_ID` int(11) NOT NULL,
  `isbn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `accession_number` varchar(10) NOT NULL,
  `date_receive` date NOT NULL,
  `classification_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `copies` int(5) NOT NULL,
  `edition` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `borrow_ID` int(11) NOT NULL,
  `book_ID` int(11) NOT NULL,
  `borrower_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `copies` int(5) NOT NULL,
  `date_issued` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `returned_date` date DEFAULT NULL,
  `status` varchar(10) NOT NULL COMMENT 'Borrowed or Returned',
  `penalty` int(10) NOT NULL,
  `paid` smallint(1) NOT NULL COMMENT '0 no, 1 yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `borrowers`
--

CREATE TABLE `borrowers` (
  `borrower_ID` int(11) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `library_admin`
--

CREATE TABLE `library_admin` (
  `admin_ID` int(10) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `name_extension` varchar(4) DEFAULT NULL,
  `sex` varchar(6) NOT NULL COMMENT 'Male or Female',
  `role` varchar(10) NOT NULL COMMENT 'Admin or Librarian',
  `status` smallint(1) NOT NULL COMMENT '0 not active, 1 active',
  `deactivate` smallint(1) NOT NULL DEFAULT 0 COMMENT '0 no, 1 yes',
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `registered_date` date NOT NULL DEFAULT current_timestamp(),
  `deactivation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `library_admin`
--

INSERT INTO `library_admin` (`admin_ID`, `last_name`, `first_name`, `middle_initial`, `name_extension`, `sex`, `role`, `status`, `deactivate`, `username`, `password`, `registered_date`, `deactivation_date`) VALUES
(1, 'Admin', 'Default', NULL, NULL, 'Female', 'Admin', 1, 0, 'library.admin', 'anslibrary.admin', '2023-06-23', NULL),
(2, 'Librarian', 'Default', NULL, NULL, 'Female', 'Librarian', 1, 0, 'library.librarian', 'anslibrary.librarian', '2023-06-23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE `log_history` (
  `admin_ID` int(11) NOT NULL,
  `borrower_ID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_ID` int(11) NOT NULL,
  `book_ID` int(11) NOT NULL,
  `borrower_ID` int(11) NOT NULL,
  `borrow_ID` int(11) NOT NULL,
  `notification_text` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `notif_status` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `book_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `borrow_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrowers`
--
ALTER TABLE `borrowers`
  MODIFY `borrower_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_admin`
--
ALTER TABLE `library_admin`
  MODIFY `admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
