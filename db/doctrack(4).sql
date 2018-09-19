-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2018 at 06:52 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doctrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `doc_tracking`
--

CREATE TABLE IF NOT EXISTS `doc_tracking` (
  `track_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(50) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `date_track` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`track_id`),
  KEY `FK_doc_tracking` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `doc_tracking`
--

INSERT INTO `doc_tracking` (`track_id`, `sender`, `doc_id`, `status_id`, `date_track`) VALUES
(1, 'MMUST/01/18', 19, 1, '2018-07-15 15:23:43'),
(2, 'MMUST/1414/12', 8, 1, '2018-07-15 18:05:04'),
(3, 'MMUST/1414/12', 14, 1, '2018-07-15 23:20:58'),
(4, 'MMUST/1414/12', 11, 1, '2018-07-15 23:21:40'),
(5, 'MMUST/01/18', 20, 1, '2018-07-16 11:20:07'),
(6, 'MMUST/01/18', 21, 1, '2018-07-16 11:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(1, 'SCHOOL DEAN'),
(2, 'COD COMPUTER SCIENCE'),
(3, 'COD INFORMATION TECHNOLOGY'),
(4, 'SCHOOL OF COMPUTING STAFF');

-- --------------------------------------------------------

--
-- Table structure for table `registered_documents`
--

CREATE TABLE IF NOT EXISTS `registered_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `document_by` varchar(50) NOT NULL,
  `document_name` varchar(100) NOT NULL,
  `date_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `registered_documents`
--

INSERT INTO `registered_documents` (`id`, `title`, `document_by`, `document_name`, `date_registered`) VALUES
(8, 'School new portal', 'MMUST/1414/12', 'election_analysis.txt', '2018-07-01 01:58:33'),
(11, 'Science Congress', 'MMUST/1414/12', 'votes_per_candidate.txt', '2018-07-01 02:09:54'),
(14, 'Science Congress', 'MMUST/1414/12', 'Untitled-1.pdf', '2018-07-01 02:11:17'),
(15, 'Ehealth Hackathon', 'mmust/14/12', 'graphics.txt', '2018-07-02 15:38:02'),
(16, 'Ehealth Hackathon venue request', 'mmust/14/12', 'Audience Analysis - PR-CC.ppt', '2018-07-04 11:51:35'),
(17, 'fwffff', 'mmust/14/12', 'DisasterRecoveryAssignment.docx', '2018-07-04 11:52:10'),
(19, 'Internal Memo', 'MMUST/01/18', 'user guide.pdf', '2018-07-13 21:03:39'),
(20, 'Clearance memo', 'MMUST/01/18', 'document(1).pdf', '2018-07-16 11:19:48'),
(21, 'Internship application', 'MMUST/01/18', 'application.pdf', '2018-07-16 11:23:41'),
(22, 'hjkjhjhh', 'MMUST/1414/12', 'EKP000000707.pdf', '2018-07-17 22:35:51'),
(24, 'internal Memo', '8470', 'user guide.pdf', '2018-08-07 22:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `sent_documents`
--

CREATE TABLE IF NOT EXISTS `sent_documents` (
  `send_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `date_received` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`send_id`),
  KEY `FK_sent` (`doc_id`),
  KEY `FK_status` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sent_documents`
--

INSERT INTO `sent_documents` (`send_id`, `doc_id`, `sender`, `receiver`, `message`, `date_received`, `status_id`) VALUES
(1, 15, 'mmust/14/12', 'MMUST/01/18', 'jhhjkhk', '2018-08-08 09:00:12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `status_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`status_id`, `status`) VALUES
(1, 'Sent'),
(2, 'Received'),
(3, 'Forwarded'),
(5, 'Read'),
(6, 'Inactive'),
(7, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `pfnumber` varchar(50) NOT NULL,
  `position_id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`pfnumber`),
  KEY `FK_pos` (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `mname`, `pfnumber`, `position_id`, `role`, `password`, `date`, `status_id`) VALUES
(2, 'Geoffrey', 'Irungu', '', 'mmust/14/12', 1, 1, '123445', '2018-07-02 15:18:37', 7),
(3, 'Daisy', 'Wawira', '', 'MMUST/01/18', 4, 1, '12345', '2018-07-05 11:10:02', 7),
(4, 'justus', 'kiptoo', 'kimutai', '8470', 1, 2, '123456', '2018-07-19 16:44:28', 7),
(8, 'RUTH', 'MMwika', '', 'MM123', 4, 2, '12345', '2018-08-08 07:21:43', 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sent_documents`
--
ALTER TABLE `sent_documents`
  ADD CONSTRAINT `FK_sent` FOREIGN KEY (`doc_id`) REFERENCES `registered_documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_status` FOREIGN KEY (`status_id`) REFERENCES `state` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_pos` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
