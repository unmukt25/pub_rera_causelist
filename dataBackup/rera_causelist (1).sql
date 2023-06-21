-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 02:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rera_causelist2`
-- Database User: ci4 
-- Database User Password : ""  no password
--

-- --------------------------------------------------------

--
-- Table structure for table `causelist_data`
--

CREATE TABLE `causelist_data` (
  `id` int(10) UNSIGNED NOT NULL,
  `entry_date` datetime NOT NULL DEFAULT current_timestamp(),
  `next_date` date NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `case_type` varchar(1) NOT NULL,
  `bench_name` varchar(50) NOT NULL,
  `day_sr` tinyint(4) DEFAULT NULL,
  `court_num` varchar(10) NOT NULL,
  `case_number` varchar(20) NOT NULL,
  `applicant_name` varchar(50) NOT NULL,
  `respondent_name` varchar(50) DEFAULT NULL COMMENT 'only in the case of complaint',
  `project_name` varchar(30) DEFAULT NULL COMMENT 'in case of complaint or project',
  `case_brief` varchar(30) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `publish_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `causelist_data`
--

INSERT INTO `causelist_data` (`id`, `entry_date`, `next_date`, `user_id`, `case_type`, `bench_name`, `day_sr`, `court_num`, `case_number`, `applicant_name`, `respondent_name`, `project_name`, `case_brief`, `is_published`, `publish_time`) 
VALUES
(2, '2023-02-08 17:29:07', '2023-02-09', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-bpl-20-0446', 'sarita hirwani', 'sant jude colonizers', 'bethalam nagar', 'Reply', 0, '2023-02-13 19:15:31'),
(3, '2023-02-09 11:06:47', '2023-02-09', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-bpl-20-0445', 'sarita hirwani', 'sant jude colonizers', 'bethalam nagar', 'Reply', 0, '2023-02-13 19:15:31'),
(46, '2023-02-10 15:07:59', '2023-02-13', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-BPL-22-0192', 'AMITESH RATHI', 'SONIKA ENGINEERING', 'SEAC City', 'Argument', 0, '2023-02-10 15:07:59'),
(47, '2023-02-10 15:08:41', '2023-02-13', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-BPL-22-0193', 'ANIMESH RATHI', 'SONIKA ENGINEERING', 'SEAC City', 'Argument', 0, '2023-02-10 15:08:41'),
(48, '2023-02-10 15:09:43', '2023-02-13', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-BPL-22-0024', 'RAJESH KUMAR THAKUR', 'IBD UNIVERSAL & 1 OTH.', 'IBD Queens Court 1', 'Reply', 0, '2023-02-10 15:09:43'),
(49, '2023-02-10 15:23:08', '2023-02-14', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-MDD-22-0442', 'NARAYAN KUMAR JHA', 'AMRISH RAI & 1 OTH.', 'BHAVYA CITY PHASE II', 'Reply', 0, '2023-02-13 19:05:19'),
(50, '2023-02-10 15:24:13', '2023-02-14', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-MHW-22-0528', 'SMT JYOTI UPADHYAY ', 'ARVIND WANJAARI & 1 OTH.', 'Green life City - 1', 'Reply', 0, '2023-02-13 19:05:19'),
(51, '2023-02-10 15:25:16', '2023-02-14', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-MHW-22-0253', 'YOGESH SAHU', 'M/S GREENLAND SHELTERS & 1 OTH.', 'Green life City - 1', 'Argument', 0, '2023-02-13 19:05:19'),
(52, '2023-02-10 15:26:26', '2023-02-14', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-MHW-22-0092', 'ANIRUDHHA PRASAD VERMA', 'ARVIND WANJAARI', 'Greenlife City - I (IV-Phase)', 'Reply', 0, '2023-02-13 19:05:19'),
(53, '2023-02-10 15:28:01', '2023-02-14', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-IND-22-0355', 'SUNIL KUMAR RAMNARAYAN', 'SAHARA INDIA COMMERCIAL & 1 OTH.', 'Sahara City Homes (Phase 1)', 'Reply', 0, '2023-02-13 19:05:19'),
(54, '2023-02-10 15:29:03', '2023-02-14', 'saurabh', 'c', 'Shri H.P. Verma', NULL, 'Court-4', 'M-BPL-22-0449', 'MANOJ KUMAR MALVIYA', 'M/S INOXE CONSTRUCTION & 2 OTH.', 'INOXE GREEN', 'Reply', 0, '2023-02-13 19:05:19'),
(173, '2023-02-17 13:14:31', '2023-02-20', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-MHW-22-0352', 'Ajay Kumar Ghosre', 'Greenland Shelters Pvt ltd', '--------', 'Document Submission', 0, '2023-02-20 15:58:46'),
(174, '2023-02-17 13:15:23', '2023-02-20', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-MHW-22-0361', 'Sunita Devi', 'Greenland Shelters Pvt ltd', '--------', 'Document Submission', 0, '2023-02-20 15:58:46'),
(175, '2023-02-17 13:16:06', '2023-02-20', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-MHW-22-0357', 'Rajendra Kushwah', 'Greenland Shelters Pvt ltd', '--------', 'Document Submission', 0, '2023-02-20 15:58:46'),
(204, '2023-02-20 15:40:54', '2023-02-22', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-22-0121', 'Bagban Colony', 'Ms Reliable Builders and Developers', '--------', 'Reply', 0, '2023-02-24 10:44:23'),
(205, '2023-02-20 15:41:42', '2023-02-22', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-IND-22-0377', 'Nirmala Kumari Singh', 'Arvind Vanjari', '--------', 'Document Submission', 0, '2023-02-24 10:44:23'),
(206, '2023-02-20 16:05:18', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-mhw-21-0563', 'prakash kondiya', 'arvind wanjari', 'green life city 1', 'Reply', 0, '2023-02-21 16:59:27'),
(207, '2023-02-20 16:06:42', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-mhw-21-0389', 'chitra iyer', 'arvind wanjari', 'green life city 1', 'Reply', 0, '2023-02-21 16:59:27'),
(208, '2023-02-20 16:07:18', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-mhw-21-0388', 'savita ajit chouhan', 'arvind wanjari', 'green life city 1', 'Reply', 0, '2023-02-21 16:59:27'),
(209, '2023-02-20 16:08:48', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-bpl-20-0905', 'soonrata taneja', 'kakda dwarka buildcon', '-----------', 'Reply', 0, '2023-02-21 16:59:27'),
(219, '2023-02-20 16:15:43', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-bpl-21-0103', 'v s ray', 'r s r housing', '--------------', 'Reply', 0, '2023-02-21 16:59:27'),
(220, '2023-02-20 16:16:38', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-mhw-21-0417', 'pinky wadiya', 'bhagya shree developers', '----------------', 'Reply', 0, '2023-02-21 16:59:27'),
(221, '2023-02-20 16:17:11', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-gwl-21-0515', 'shashi rajput ', 'healthy business', '-----------', 'Reply', 0, '2023-02-21 16:59:27'),
(222, '2023-02-20 16:17:56', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-bpl-19-0530', 'sanjay prakash shrivastava', 'i b d universal', '------------', 'Reply', 0, '2023-02-21 16:59:27'),
(223, '2023-02-20 16:19:11', '2023-02-21', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-bpl-19-1414', 'deepesh sinha', 'ibd universal', '------------', 'Reply', 0, '2023-02-21 16:59:27'),
(225, '2023-02-21 12:50:28', '2023-02-24', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-63-0125', 'Suo Moto Rera', 'Mr. Anil Goyal IRP & others (A.G.8 Ventures)', 'Aakriti aqua city & others', 'Reply & Argument', 0, '2023-02-24 12:19:05'),
(226, '2023-02-21 16:16:31', '2023-02-22', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-brs-20-0323', 'pankaj manocha', 'bhumi infra developers', '-----------', 'Reply & Argument', 0, '2023-02-22 16:15:47'),
(227, '2023-02-21 16:17:22', '2023-02-22', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-ind-21-0618', 'gourav nagar', 'rajkumar jain', '-----------', 'Reply & Argument', 0, '2023-02-22 16:15:47'),
(228, '2023-02-21 16:31:41', '2023-02-22', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-bpl-21-0177', 'awadhesh kumar pandey', 'a g 8 ventures', 'aakriti aquacity', 'Reply & Argument', 0, '2023-02-22 16:15:47'),
(241, '2023-02-21 16:56:04', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-HBD-22-0142', 'KAPIL RICHARIYA', 'LIFESTYLE RRA HERITAGE', '-----', 'Document Submission', 0, '2023-02-21 16:56:04'),
(242, '2023-02-21 16:56:04', '2023-02-22', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-bpl-20-0544', 'sanjay giri', 'a g 8 ventures', 'aakriti aquacity', 'Reply & Argument', 0, '2023-02-22 16:15:47'),
(243, '2023-02-21 16:56:46', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-HBD-22-0136', 'VIJAY KAMBOJ', 'LIFESTYLE RRA HERITAGE', '-----', 'Document Submission', 0, '2023-02-21 16:56:46'),
(244, '2023-02-21 16:56:48', '2023-02-22', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-bpl-21-0616', 'abhishek singh chouhan', 'a g 8 ventures', 'aakriti aquacity', 'Reply & Argument', 0, '2023-02-22 16:15:47'),
(245, '2023-02-21 16:57:31', '2023-02-22', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-bpl-21-0184', 'kumar sourabh', 'a g 8 ventures', 'aakriti aquacity', 'Reply & Argument', 0, '2023-02-22 16:15:47'),
(247, '2023-02-21 16:58:17', '2023-02-22', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-bpl-21-0371', 'umesh prashad soni', 'a g 8 ventures', 'aakriti aquacity', 'Reply & Argument', 0, '2023-02-22 16:15:47'),
(248, '2023-02-21 16:58:54', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-DPL-22-0393', 'MANISH SONI', 'SANTOSH SINGH', '-----', 'Document Submission', 0, '2023-02-21 16:58:54'),
(249, '2023-02-21 16:59:00', '2023-02-22', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-bpl-21-0373', 'umesh shukla', 'a g 8 ventures', 'aakriti aquacity', 'Reply & Argument', 0, '2023-02-22 16:15:47'),
(250, '2023-02-21 16:59:48', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-JBP-22-0381', 'Himanshu Varshney', 'MUKESH TAIDEY, VASUNDHARA INFRASTRUCTURE', '-----', 'Document Submission', 0, '2023-02-21 16:59:48'),
(251, '2023-02-21 17:00:37', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-MHW-22-0240', 'RAJESH SINGH CHAUHAN', 'RAKESH AGRAWAL', '-----', 'Document Submission', 0, '2023-02-21 17:00:37'),
(252, '2023-02-21 17:02:07', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-JBP-22-0389', 'AMIT PATEL ', 'KRISHNA BUILDERS AND DEVELOPERS', '-----', 'Document Submission', 0, '2023-02-21 17:02:07'),
(253, '2023-02-21 17:03:30', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-21-0579', 'DK Cottage People Welfare Society', 'D.K. Construction', '-----', 'Argument', 0, '2023-02-21 17:03:30'),
(254, '2023-02-21 17:04:45', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-22-0317', 'Shri Avnish Saxena', 'AGMOHAN PATIDAR', '-----', 'Document Submission', 0, '2023-02-21 17:04:45'),
(255, '2023-02-21 17:06:08', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-GWL-19-0064', 'Vijendra kushwaha', 'Neera Singh Rajawat ', '-----', 'Document Submission', 0, '2023-02-21 17:06:08'),
(256, '2023-02-21 17:07:53', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-MHW-22-0400', 'MANISH SONI', 'SANTOSH SINGH', '-----', 'Document Submission', 0, '2023-02-21 17:07:53'),
(257, '2023-02-22 14:53:23', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0643', 'Shri Sitaram Namdev ', 'Shivam Namdev', '-----', 'Document Submission', 0, '2023-02-22 14:53:23');
INSERT INTO `causelist_data` (`id`, `entry_date`, `next_date`, `user_id`, `case_type`, `bench_name`, `day_sr`, `court_num`, `case_number`, `applicant_name`, `respondent_name`, `project_name`, `case_brief`, `is_published`, `publish_time`) VALUES
(258, '2023-02-22 14:54:39', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-21-0461', 'GENDALAL LAXMINARAYAN MANDANIYA', 'RAGATI DEVELOPERS', '-----', 'Document Submission', 0, '2023-02-22 14:54:39'),
(259, '2023-02-22 14:56:26', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-OTH-20-0749', 'Mukta Gupta', 'Vallabh infrastate pvt limited', '-----', 'Document Submission', 0, '2023-02-22 14:56:26'),
(260, '2023-02-22 14:57:47', '2023-02-23', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-21-0100', 'PUSHPA GUPTA', 'Shri Siddhi vinayak buildcon', '-----', 'Reply & Argument', 0, '2023-02-22 14:57:47'),
(261, '2023-02-22 16:01:13', '2023-02-23', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-mhw-20-0705', 'suresh chandra ', 'arvind wanjari', '-------', 'Reply & Argument', 0, '2023-02-24 11:14:17'),
(262, '2023-02-22 16:01:59', '2023-02-23', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-mhw-20-0617', 'ramkalee jatav', 'arvind wanjari', '-------', 'Reply & Argument', 0, '2023-02-24 11:14:17'),
(263, '2023-02-22 16:02:23', '2023-02-23', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-mhw-21-0121', 'suneel sharma', 'arvind wanjari', '------------', 'Reply & Argument', 0, '2023-02-24 11:14:17'),
(274, '2023-02-22 16:10:53', '2023-02-23', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-dpl-20-0777', 'suresh chandra agarawal', 'a m devcon', '----------', 'Reply & Argument', 0, '2023-02-24 11:14:17'),
(275, '2023-02-22 16:11:20', '2023-02-23', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-bpl-20-0898', 'kunjan johri', 'vivek mishra', '-----------', 'Reply & Argument', 0, '2023-02-24 11:14:17'),
(276, '2023-02-23 12:03:07', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-BPL-20-0368', 'Shri Prabhat Mudgal', 'Global Mega Ventures Pvt Ltd', '--------', 'Argument', 0, '2023-02-27 10:49:18'),
(277, '2023-02-23 12:04:21', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0359', 'Akhilesh Khare', 'Global mega ventures', '--------', 'Argument', 0, '2023-02-27 10:49:18'),
(278, '2023-02-23 12:05:45', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0372', 'Bhanu Pratap Suryawanshi', 'Global mega ventures', '--------', 'Argument', 0, '2023-02-27 10:49:18'),
(279, '2023-02-23 12:06:42', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0614', 'SANJAY HANDA', 'Global mega ventures', '--------', 'Argument', 0, '2023-02-27 10:49:18'),
(280, '2023-02-23 12:07:46', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0569', 'Vikram Garg', 'Global mega ventures', '--------', 'Argument', 0, '2023-02-27 10:49:18'),
(281, '2023-02-23 12:09:01', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0405', 'Ankur Khare', 'Global mega ventures', '--------', 'Argument', 0, '2023-02-27 10:49:18'),
(282, '2023-02-23 12:10:02', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0333', 'Abhishek Nigam', 'Global mega ventures', '--------', 'Argument', 0, '2023-02-27 10:49:18'),
(283, '2023-02-23 12:11:22', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-SJL-22-0454', 'Shri Rishabah Jain ', 'Moon Walk Infrastructures Private Limited', '--------', 'Document Submission', 0, '2023-02-27 10:49:18'),
(284, '2023-02-23 12:12:21', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-SJL-22-0453', 'Shri Kamal Singh', 'Moon Walk Infrastructures Private Limited', '--------', 'Document Submission', 0, '2023-02-27 10:49:18'),
(285, '2023-02-23 12:14:05', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-22-0380', 'Ms SARTHAK BUILDERS DEVELOPERS', 'Suman Joshi', '--------', 'Document Submission', 0, '2023-02-27 10:49:18'),
(286, '2023-02-23 12:15:48', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-RTM-22-0448', 'Ankur Saxena', 'MP housing and Infrastructure', '--------', 'Appearance of the Parties', 0, '2023-02-27 10:49:18'),
(287, '2023-02-23 12:17:26', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-BPL-18-0414', 'Gopal Krishna Garg', 'M/S JK INFRACON BUILDERS DEVELOPERS', '--------', 'Document Submission', 0, '2023-02-27 10:49:18'),
(288, '2023-02-23 15:29:22', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-oth-20-0387', 'anuja malviya', 'lakshya realty pvt ltd', '---------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(289, '2023-02-23 15:30:03', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-rsn-19-1466', 'bhupendra singh', 'lakshya realty pvt ltd', '-------------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(303, '2023-02-23 15:44:54', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-ind-20-0770', 'prakash chandra pandit', 'vatsalya builders', '---------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(304, '2023-02-23 15:45:40', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-mhw-20-0467', 'vishal jaiswal', 'rakesh agarawal', '-----------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(305, '2023-02-23 15:46:52', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-bpl-18-1632', 'anil gidwani', 'sant kripa infra.', '-----------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(306, '2023-02-23 15:47:49', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'n-mhw-20-0280', 'prarna parihar', 'mastar infra.', '----------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(307, '2023-02-23 15:48:36', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-gwl-20-0938', 'ankur mittal', 'healthy business', '---------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(308, '2023-02-23 15:50:27', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-ind-19-0705', 'Mesars savitri ', 'indore developers ', '------------', 'Reply', 0, '2023-02-27 10:49:46'),
(309, '2023-02-23 15:52:08', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-bpl-19-1446', 'subhash chandra ambastha', 'shree jayant bhandari ', '------------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(310, '2023-02-23 15:52:44', '2023-02-24', 'rakesh', 'c', 'Shri Neeraj Dubey', NULL, 'Court-4', 'm-bpl-21-0164', 'rahul varma', 'anil bhargava', '----------------', 'Reply & Argument', 0, '2023-02-27 10:49:46'),
(311, '2023-02-23 16:57:12', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-19-1424', 'Smt Swati Khare ', 'lobal Mega Ventures Pvt Ltd', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(312, '2023-02-23 16:58:32', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0375', 'Anil Kumar Sharma', 'Global Mega Ventures Pvt Ltd', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(313, '2023-02-23 17:00:27', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-21-0354', 'Chanchal Jain ', 'Tejkaran InfrastructurePvt Ltd', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(314, '2023-02-23 17:02:17', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-21-0343', 'Shailesh Saklecha', 'Tejkaran InfrastructurePvt Ltd', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(315, '2023-02-23 17:04:09', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-IND-21-0438', 'Rajkumar Rai', 'Arvind Wanjari', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(316, '2023-02-23 17:05:14', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0377', 'Rajkumar Rahangdale', 'Global Mega Ventures Pvt Ltd', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(317, '2023-02-23 17:06:13', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BPL-20-0345', 'SAURABH SOHGOURA', 'Global Mega Ventures Pvt Ltd', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(318, '2023-02-23 17:07:12', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-BPL-20-0563', 'Shailendra saxena', 'Tirupati Realty And Infrastructure', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(319, '2023-02-23 17:08:29', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-BDN-21-0106', 'Lata Pal ', 'Swastik Constructions ', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(320, '2023-02-23 17:10:21', '2023-02-24', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-21-0342', 'Palash Jain ', 'Tejkaran InfrastructurePvt Ltd', '-----', 'Document Submission', 0, '2023-02-27 10:49:18'),
(322, '2023-02-24 11:06:26', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-61-0123', 'Suo Moto Rera', 'ASNANI BUILDERS AND DEVELOPERS LTD', 'Pebble Bay Phase-II', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(323, '2023-02-24 11:09:03', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-61-0128', 'Suo Moto Rera', 'VINOD KUSHWAHA', 'BHAVISHYA METRO CITY ROYAL PAR', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(324, '2023-02-24 11:12:36', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-61-0120', 'Suo Moto Rera', 'Agrawal Constructions', 'SAGAR PEARL PHASE-II', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(326, '2023-02-24 11:16:32', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-63-0126', 'Suo Moto Rera', 'PGH INTERNATIONAL PVT LTD.', 'PEOPLES HIGH RISE PHASE 1', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(327, '2023-02-24 11:18:01', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-61-0125', 'Suo Moto Rera', 'PRAGATI DEVELOPER', 'PREMIUM PRIDE', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(328, '2023-02-24 11:19:34', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-61-0127', 'Suo Moto Rera', 'Sunil Udaypure', 'Uday Parisar Phase 3', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(329, '2023-02-24 11:22:09', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-61-0124', 'Suo MOTO RERA', 'LANDMARK VENTURES', 'PROSPERA', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(330, '2023-02-24 11:29:28', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-59-0011', 'Suo Moto Rera', 'Palm Leaf Pvt. Ltd.', 'Rajya Shree Phase-1', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(331, '2023-02-24 11:31:22', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-59-0010', 'Suo Moto Rera', 'Palm Leaf Pvt. Ltd.', 'Rajya Shree Phase-2', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(332, '2023-02-24 11:34:36', '2023-02-27', 'karan', 'c', 'Enforcement Committee', NULL, 'Court-1', '22-61-0129', 'Suo Moto Rera', 'Chinar Green Spaces Developers', 'Chinar Nivaasa', 'Reply & Argument', 0, '2023-02-28 12:00:47'),
(333, '2023-02-24 11:38:50', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-20-0747', 'Harsh Nangalia', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:38:50'),
(334, '2023-02-24 11:40:02', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-17-0439', 'Shailendra Bohra ', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:40:02'),
(335, '2023-02-24 11:40:48', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-17-0736', 'KCL Infra Projects Ltd', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:40:48'),
(336, '2023-02-24 11:41:34', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-17-0751', 'HARI RANJAN RAO', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:41:34'),
(337, '2023-02-24 11:42:22', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-17-0740', 'KCL Infra Projects Ltd', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:42:22'),
(338, '2023-02-24 11:43:26', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-17-0544', 'Dr Pramod Jhawar ', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:43:26'),
(339, '2023-02-24 11:44:15', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-17-0319', 'Renu Porwal', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:44:15'),
(342, '2023-02-24 11:47:00', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-20-0812', 'Dr Rajesh Bharani', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:47:00'),
(343, '2023-02-24 11:47:46', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-20-0811', 'Dr Atul Taparia', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:47:46'),
(344, '2023-02-24 11:51:55', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-18-0163', 'Fazal Husain', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:51:55'),
(345, '2023-02-24 11:53:24', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'M-IND-17-0462', 'Sajal Mohine', 'JSM Devcons India Private Limited', '--------', 'Document Submission', 0, '2023-02-24 11:53:24'),
(346, '2023-02-24 11:55:44', '2023-02-27', 'anamika', 'c', 'Shrimati Rashmi Agrawal', NULL, 'Court-1', 'N-BPL-22-0475', 'Mehak manwani', 'SHOK KUMAR JAIN', '--------', 'Appearance of the Parties', 0, '2023-02-24 11:55:44'),

-- --------------------------------------------------------

--
-- Table structure for table `causelist_user`
--

CREATE TABLE `causelist_user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `causelist_user`
--

INSERT INTO `causelist_user` (`user_id`, `password`, `user_name`, `user_type`) VALUES
('admin', '$2y$10$AcMQWoY1A1c0cPq5UOQw6Oo/jeJBI5Ntvxkm0Bzsiau5Hk5hqSTWC', 'Admin', '1'),
-- user name = admin and password = admin123

--
-- Indexes for dumped tables
--

--
-- Indexes for table `causelist_data`
--
ALTER TABLE `causelist_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `causelist_user`
--
ALTER TABLE `causelist_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `causelist_data`
--
ALTER TABLE `causelist_data`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1474;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
