-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2025 at 01:41 PM
-- Server version: 8.2.0
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_examination_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_sheet`
--

DROP TABLE IF EXISTS `tbl_exam_sheet`;
CREATE TABLE IF NOT EXISTS `tbl_exam_sheet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `answer_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_exam_sheet`
--

INSERT INTO `tbl_exam_sheet` (`id`, `student_id`, `question_id`, `answer_id`, `date`, `time`, `remarks`) VALUES
(1, '4', '1', 'Confidentiality, integrity, and authentication', '2025-02-17', '18:26:10', 'remarks'),
(2, '4', '2', 'Presence of any action or event that can lead to compromise of system', '2025-02-17', '18:26:12', 'remarks'),
(3, '4', '3', 'Encryption', '2025-02-17', '18:26:15', 'remarks'),
(4, '4', '4', 'Mimicking an authorized user to steal sensitive information', '2025-02-17', '18:26:17', 'remarks'),
(5, '4', '5', 'WannaCRy', '2025-02-17', '18:26:19', 'remarks'),
(6, '4', '1', 'Confidentiality, integrity, and authentication', '2025-02-17', '18:33:09', 'remarks'),
(7, '4', '2', 'Hardware components that are susceptible to cyber-attacks', '2025-02-17', '18:33:16', 'remarks'),
(8, '4', '3', 'Encryption', '2025-02-17', '18:33:21', 'remarks'),
(9, '4', '4', 'Mimicking an authorized user to steal sensitive information', '2025-02-17', '18:33:25', 'remarks'),
(10, '4', '5', 'Somersault', '2025-02-17', '18:33:27', 'remarks'),
(11, '4', '1', 'Confidentiality, integrity, and authentication', '2025-02-17', '18:36:39', 'remarks'),
(12, '4', '2', 'Presence of any action or event that can lead to compromise of system', '2025-02-17', '18:36:42', 'remarks'),
(13, '4', '3', 'Encryption', '2025-02-17', '18:36:47', 'remarks'),
(14, '4', '1', 'Confidentiality, integrity, and authentication', '2025-02-17', '18:46:54', 'remarks'),
(15, '4', '2', 'Presence of any action or event that can lead to compromise of system', '2025-02-17', '18:46:56', 'remarks'),
(16, '4', '3', 'Encryption', '2025-02-17', '18:46:59', 'remarks'),
(17, '4', '4', 'Mimicking an authorized user to steal sensitive information', '2025-02-17', '18:47:02', 'remarks'),
(18, '4', '5', 'WannaCRy', '2025-02-17', '18:47:04', 'remarks'),
(19, '4', '1', 'Confidentiality, integrity, and authentication', '2025-02-17', '18:48:06', 'remarks'),
(20, '4', '2', 'Presence of any action or event that can lead to compromise of system', '2025-02-17', '18:48:08', 'remarks'),
(21, '4', '3', 'Encryption', '2025-02-17', '18:48:11', 'remarks'),
(22, '4', '4', 'Gaining unauthorized access to a system', '2025-02-17', '18:48:13', 'remarks'),
(23, '4', '5', 'WannaCRy', '2025-02-17', '18:48:15', 'remarks'),
(24, '4', '1', 'Confidentiality, integrity, and authentication', '2025-02-17', '18:56:02', 'remarks'),
(25, '4', '2', 'Presence of any action or event that can lead to compromise of system', '2025-02-17', '18:56:04', 'remarks'),
(26, '4', '3', 'Encryption', '2025-02-17', '18:56:07', 'remarks'),
(27, '4', '4', 'Local storage destruction', '2025-02-17', '18:56:09', 'remarks'),
(28, '4', '5', 'Somersault', '2025-02-17', '18:56:11', 'remarks'),
(29, '4', '1', 'Confidentiality, integrity, and authentication', '2025-02-17', '18:58:14', 'remarks'),
(30, '4', '2', 'Presence of any action or event that can lead to compromise of system', '2025-02-17', '18:58:16', 'remarks'),
(31, '4', '3', 'Encryption', '2025-02-17', '18:58:18', 'remarks'),
(32, '4', '4', 'Mimicking an authorized user to steal sensitive information', '2025-02-17', '18:58:21', 'remarks'),
(33, '4', '5', 'WannaCRy', '2025-02-17', '18:58:23', 'remarks');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
