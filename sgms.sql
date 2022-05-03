-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 05:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getPriority` (IN `atype` VARCHAR(60))  BEGIN

IF(atype='sexual abuse') THEN
UPDATE investigation, complaint SET investigation.priority='HIGH' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='sexual abuse');

ELSEIF (atype='drug abuse') THEN
UPDATE investigation, complaint SET investigation.priority='HIGH' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='drug abuse');

ELSEIF (atype='harassment') THEN
UPDATE investigation, complaint SET investigation.priority='HIGH' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='harassment');

ELSEIF (atype='ragging') THEN
UPDATE investigation, complaint SET investigation.priority='HIGH' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='ragging');

ELSEIF (atype='mental abuse') THEN
UPDATE investigation, complaint SET investigation.priority='MID' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='mental abuse');

ELSEIF (atype='physical abuse') THEN
UPDATE investigation, complaint SET investigation.priority='MID' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='physical abuse');

ELSEIF (atype='emotional abuse') THEN
UPDATE investigation, complaint SET investigation.priority='MID' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='emotional abuse');

ELSEIF (atype='financial abuse') THEN
UPDATE investigation, complaint SET investigation.priority='MID' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='financial abuse');

ELSEIF (atype='discrimination') THEN
UPDATE investigation, complaint SET investigation.priority='MID' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='discrimination');

ELSEIF (atype='other') THEN
UPDATE investigation, complaint SET investigation.priority='LOW' WHERE investigation.investigation_id IN(SELECT investigation.investigation_id FROM investigation, complaint WHERE investigation.complaint_id=complaint.complaint_id AND complaint.abuse_type='other');

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStatus` (IN `ppg` VARCHAR(60))  BEGIN
UPDATE investigation, punishment SET investigation.status='closed' WHERE investigation.investigation_id=punishment.investigation_id AND ppg IS NOT NULL;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `rm_red` (IN `ppg` VARCHAR(60))  BEGIN
DELETE FROM punishment WHERE punishment_id not in(SELECT MAX(punishment_id) FROM punishment GROUP BY investigation_id, punishment_given);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sno` int(5) NOT NULL,
  `usn` varchar(45) DEFAULT NULL,
  `counsellor_id` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(255) NOT NULL,
  `usn` varchar(45) NOT NULL,
  `abuser_id` varchar(45) NOT NULL,
  `abuse_type` varchar(60) NOT NULL,
  `complaint_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `usn`, `abuser_id`, `abuse_type`, `complaint_date`) VALUES
(33, '1vtu19is170', '1vtu19me070', 'discrimination', '2022-03-28'),
(35, '1vtu19is170', '1vtu19is071', 'financial abuse', '2022-03-28'),
(39, '1vtu19me071', '1vtu19is001', 'discrimination', '2022-03-28');

--
-- Triggers `complaint`
--
DELIMITER $$
CREATE TRIGGER `self_complaint` BEFORE INSERT ON `complaint` FOR EACH ROW if new.usn = new.abuser_id then
signal sqlstate '45000';
end if
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `self_complaint_update` BEFORE INSERT ON `complaint` FOR EACH ROW if new.usn = new.abuser_id then
signal sqlstate '45000';
end if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `counsellor`
--

CREATE TABLE `counsellor` (
  `counsellor_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phno` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counsellor`
--

INSERT INTO `counsellor` (`counsellor_id`, `name`, `gender`, `age`, `email`, `phno`, `password`) VALUES
('vtuC01', 'ram', 'male', 28, 'ram@vtu.ac.in', '9449449440', 'coun1'),
('vtuC02', 'mytra', 'female', 32, 'mytra@vtu.ac.in', '2554553669', 'coun1');

-- --------------------------------------------------------

--
-- Table structure for table `investigation`
--

CREATE TABLE `investigation` (
  `investigation_id` int(255) NOT NULL,
  `complaint_id` int(255) NOT NULL,
  `counsellor_id` varchar(45) NOT NULL,
  `status` varchar(60) DEFAULT 'In Progress',
  `priority` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investigation`
--

INSERT INTO `investigation` (`investigation_id`, `complaint_id`, `counsellor_id`, `status`, `priority`) VALUES
(50, 39, 'vtuC01', 'closed', 'MID'),
(52, 33, 'vtuC02', 'closed', 'MID'),
(58, 39, 'vtuC02', 'closed', 'MID');

-- --------------------------------------------------------

--
-- Table structure for table `punishment`
--

CREATE TABLE `punishment` (
  `punishment_id` int(255) NOT NULL,
  `investigation_id` int(255) NOT NULL,
  `punishment_given` varchar(60) DEFAULT NULL,
  `date_solved` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punishment`
--

INSERT INTO `punishment` (`punishment_id`, `investigation_id`, `punishment_given`, `date_solved`) VALUES
(71, 50, 'suspend', '2022-03-28'),
(73, 52, 'suspend', '2022-03-28'),
(87, 58, 'suspend', '2022-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `age` int(3) NOT NULL,
  `year` int(3) NOT NULL,
  `department` varchar(45) NOT NULL,
  `phno` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `gender`, `age`, `year`, `department`, `phno`, `password`) VALUES
('1VTU21ME090', 'john', 'male', 18, 1, 'mech', '2584563971', 'std1'),
('1vtu19cs70', 'sanjay', 'male', 21, 3, 'cs', '2445226540', 'std1'),
('1vtu19ec100', 'raju n k', 'male', 21, 3, 'ece', '1247851463', 'std1'),
('1vtu19is180', 'Peter J', 'male', 21, 3, 'ise', '1234567854', 'std1'),
('1vtu19is170', 'sam s p', 'male', 21, 0, 'ise', '3692587410', 'std1'),
('1vtu19me070', 'suprasad', 'male', 20, 3, 'mech', '159753640', 'std1'),
('1vtu19me071', 'Peter', 'male', 21, 3, 'me', '3692587410', 'std1');

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `as_delete_logs` AFTER DELETE ON `student` FOR EACH ROW INSERT INTO student_logs VALUES(null, old.usn, 'DELETED', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `as_insert_logs` AFTER INSERT ON `student` FOR EACH ROW INSERT INTO student_logs VALUES(null, new.usn, 'INSERTED', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `as_update_logs` AFTER UPDATE ON `student` FOR EACH ROW INSERT INTO student_logs VALUES(null, old.usn, 'UPDATED', NOW() )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `student_before_insert` BEFORE INSERT ON `student` FOR EACH ROW if new.year > 4 then
signal sqlstate '45000';
end if
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `student_before_update` BEFORE UPDATE ON `student` FOR EACH ROW if new.year > 4 then
signal sqlstate '45000';
end if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_logs`
--

CREATE TABLE `student_logs` (
  `id` int(11) NOT NULL,
  `usn` varchar(45) NOT NULL,
  `action` varchar(45) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_logs`
--

INSERT INTO `student_logs` (`id`, `usn`, `action`, `cdate`) VALUES
(1, '1vtu19is180', 'INSERTED', '2022-01-12 21:52:34'),
(2, '', 'UPDATED', '2022-01-12 21:53:58'),
(3, '1vtu19is180', 'UPDATED', '2022-01-12 21:55:24'),
(4, '1vtu19is180', 'DELETED', '2022-01-12 21:55:47'),
(5, '1vtu19is180', 'INSERTED', '2022-01-12 22:16:45'),
(6, '1vtu19is180', 'DELETED', '2022-01-12 22:16:58'),
(7, '1vtu19is180', 'INSERTED', '2022-01-12 22:17:20'),
(8, '1vtu19is180', 'DELETED', '2022-01-12 22:49:06'),
(9, '', 'INSERTED', '2022-01-13 17:48:52'),
(10, '', 'DELETED', '2022-01-13 17:49:27'),
(11, '1vtu18ei005', 'INSERTED', '2022-01-20 19:44:55'),
(12, '1vtu18ei005', 'DELETED', '2022-01-21 12:27:59'),
(13, '1vtu19is071', 'DELETED', '2022-01-21 13:02:11'),
(14, '1vtu19is001', 'DELETED', '2022-01-21 13:18:44'),
(15, '1vtu19me070', 'INSERTED', '2022-01-23 14:13:47'),
(16, '1vtu19ec100', 'INSERTED', '2022-01-23 15:04:11'),
(17, '1vtu17ec004', 'INSERTED', '2022-01-23 15:06:43'),
(18, '1vtu19is170', 'INSERTED', '2022-02-08 09:37:59'),
(19, '1BI21ME090', 'INSERTED', '2022-03-26 12:22:11'),
(20, '1vtu001', 'INSERTED', '2022-03-28 16:51:51'),
(21, '1vtu001', 'DELETED', '2022-03-28 16:53:25'),
(22, '1vtu19AI001', 'INSERTED', '2022-03-28 16:59:07'),
(23, '1vtu19AI001', 'DELETED', '2022-03-28 16:59:23'),
(24, '1vtu19is180', 'INSERTED', '2022-03-28 18:04:51'),
(25, '1vtu19ec100', 'UPDATED', '2022-03-28 18:10:38'),
(26, '1vtu17ec004', 'DELETED', '2022-03-28 18:20:17'),
(27, '1vtu19me071', 'UPDATED', '2022-03-29 11:18:47'),
(28, '1vtu19cs70', 'UPDATED', '2022-03-29 11:18:53'),
(29, 'cp01', 'INSERTED', '2022-04-05 21:20:47'),
(30, 'cp01', 'DELETED', '2022-04-05 21:22:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `a` (`usn`),
  ADD KEY `b` (`counsellor_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `cmps_fk` (`usn`);

--
-- Indexes for table `counsellor`
--
ALTER TABLE `counsellor`
  ADD PRIMARY KEY (`counsellor_id`);

--
-- Indexes for table `investigation`
--
ALTER TABLE `investigation`
  ADD PRIMARY KEY (`investigation_id`,`complaint_id`,`counsellor_id`),
  ADD KEY `inv_fk` (`complaint_id`),
  ADD KEY `inv_fk1` (`counsellor_id`);

--
-- Indexes for table `punishment`
--
ALTER TABLE `punishment`
  ADD PRIMARY KEY (`punishment_id`),
  ADD KEY `pinv_fk` (`investigation_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `student_logs`
--
ALTER TABLE `student_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `investigation`
--
ALTER TABLE `investigation`
  MODIFY `investigation_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `punishment`
--
ALTER TABLE `punishment`
  MODIFY `punishment_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `student_logs`
--
ALTER TABLE `student_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `a` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE,
  ADD CONSTRAINT `b` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `cmps_fk` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investigation`
--
ALTER TABLE `investigation`
  ADD CONSTRAINT `inv_fk` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`complaint_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inv_fk1` FOREIGN KEY (`counsellor_id`) REFERENCES `counsellor` (`counsellor_id`) ON DELETE CASCADE;

--
-- Constraints for table `punishment`
--
ALTER TABLE `punishment`
  ADD CONSTRAINT `pinv_fk` FOREIGN KEY (`investigation_id`) REFERENCES `investigation` (`investigation_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
