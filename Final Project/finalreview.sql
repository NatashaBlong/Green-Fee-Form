-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 01:22 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalreview`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` varchar(45) NOT NULL,
  `rank` int(11) DEFAULT NULL COMMENT '1:Admin\n2:Reviewer\n3:Both',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `rank`, `date`) VALUES
('00000', 3, '2017-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `a_name` varchar(100) NOT NULL,
  `email` varchar(320) DEFAULT NULL,
  `dept` varchar(45) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`a_name`, `email`, `dept`, `phone`) VALUES
('charles', 'charles@winona.edu', 'science', '5073157675');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `user_id` varchar(45) NOT NULL,
  `question_id` varchar(45) NOT NULL,
  `project_id` varchar(45) NOT NULL,
  `answer` varchar(999) DEFAULT NULL,
  `comment` varchar(999) DEFAULT NULL,
  `type` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`user_id`, `question_id`, `project_id`, `answer`, `comment`, `type`) VALUES
('00000', '001', '1', '1', 'good', 1),
('00000', '002', '1', '5', 'nice', 1),
('00000', '003', '1', '3', 'good', 1),
('00000', '004', '1', '2', 'good', 1),
('00000', '005', '1', '2', 'good', 1),
('00000', '006', '1', '5', 'nice', 1),
('00000', '007', '1', '3', 'good', 1),
('00000', '008', '1', '4', 'good', 1),
('00000', '009', '1', '3', 'good', 1),
('00000', '010', '1', '5', 'nice', 1),
('00000', '011', '1', '3', 'good', 1),
('00000', '012', '1', '3', 'nice', 1),
('00000', '001', '1', 'Allows students to help', NULL, 2),
('00000', '002', '1', 'Helps WSU save money', NULL, 2),
('00000', '003', '1', 'Nice Support', NULL, 2),
('00000', '004', '1', 'About $100,000', NULL, 2),
('00000', '005', '1', 'Response 5', NULL, 2),
('00000', '006', '1', 'Response 6', NULL, 2),
('00000', '007', '1', 'Response 7', NULL, 2),
('00000', '008', '1', 'Response 8', NULL, 2),
('00000', '009', '1', 'Response 9', NULL, 2),
('00000', '010', '1', 'Response 10', NULL, 2),
('00000', '011', '1', 'Response 11', NULL, 2),
('00000', '012', '1', 'Response 12', NULL, 2),
('00000', '001', '1', '1', '', 1),
('00000', '002', '1', '5', '', 1),
('00000', '003', '1', '3', '', 1),
('00000', '004', '1', '3', '', 1),
('00000', '005', '1', '3', '', 1),
('00000', '006', '1', '3', '', 1),
('00000', '007', '1', '3', '', 1),
('00000', '008', '1', '3', '', 1),
('00000', '009', '1', '3', '', 1),
('00000', '010', '1', '3', '', 1),
('00000', '011', '1', '3', '', 1),
('00000', '012', '1', '3', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` varchar(45) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `advisor_name` varchar(100) DEFAULT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `title` varchar(350) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `contact_name` varchar(100) DEFAULT NULL,
  `group` varchar(100) DEFAULT NULL,
  `completed` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `user_id`, `advisor_name`, `group_name`, `title`, `amount`, `contact_name`, `group`, `completed`) VALUES
('1', '00000', 'charles', 'Save The Environment', 'Save The Environment', 120000, 'Shane', 'yes', 2),
('2', '00000', 'charles', 'Save Energy', 'Solar Power', 35000, 'Bill', 'yes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` varchar(45) NOT NULL,
  `title` varchar(999) DEFAULT NULL,
  `text` varchar(999) DEFAULT NULL,
  `type` varchar(7) DEFAULT NULL COMMENT 'This is important, the types are project, budget, and review and they correlate to the different phases of our proposal lifecycle'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `title`, `text`, `type`) VALUES
('001', 'Student Experience', 'Project includes opportunities for student involvement and/or will positively impact the student experience.', 'review'),
('002', 'Connection to Campus', 'Project directly addresses environmental sustainability on the WSU campus or in the capacity that on-campus activities directly influence environmental sustainability in the surrounding community.', 'review'),
('003', 'Feasibility and Institutional Support', 'Project is feasible and has support from appropriate campus individuals and entities. Individual students or student organizations must have the signature of a faculty or staff advisor who is committed to advising throughout project implementation.', 'review'),
('004', 'Appropriateness of Schedule and Budget Request', 'Project schedule and budget are reasonable and conform to established timelines, constraints and parameters.', 'review'),
('005', 'Accountability', 'Project includes mechanism for evaluation and follow-up. At a minimum, a project plan includes appropriate progress reports to the Sustainability Committee based on the duration of the project and a final report within 60 days following completion of the project.', 'review'),
('006', 'Innovation', 'Project is innovative in nature and does not include routine maintenance or code-compliant activities. Funding may support narrowing the gap between code-compliant and more sustainable alternatives.', 'review'),
('007', 'Environmental Benefits', 'Project demonstrates a reduction in WSU\'s carbon footprint or provides other environmental benefits such as water conservation, storm water management, biodiversity conservation, and waste minimization.', 'review'),
('008', 'Regional Connection', 'Project provides intellectual and emotional linkage with the unique landscape of the Driftless Area/ Mississippi River, as well as the cultural lifeways of this special place.', 'review'),
('009', 'Outreach and Education', 'Project considers interdisciplinary and experiential education and outreach opportunities and has included them as part of its implementation plan.', 'review'),
('010', 'Self Sufficiency', 'Project includes matching funds from sources beyond SGF or includes a plan for sustained funding.', 'review'),
('011', 'Potential for Broad Application', 'Project has potential to be scalable across the campus.', 'review'),
('012', ' Cost/Benefit Analysis (as appropriate)', 'Project proposal outlines project payback, lifecycle costs and savings, etc.', 'review');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `project_id` varchar(45) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `r_name` varchar(100) DEFAULT NULL,
  `affiliation` tinyint(4) DEFAULT NULL,
  `comments` varchar(999) DEFAULT NULL,
  `completed` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`project_id`, `user_id`, `r_name`, `affiliation`, `comments`, `completed`) VALUES
('1', '00000', 'Tim', 2, 'Saves Good NRG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(45) NOT NULL,
  `u_name` varchar(100) DEFAULT NULL,
  `campus_affiliation` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_primary` varchar(45) DEFAULT NULL,
  `status` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `u_name`, `campus_affiliation`, `email`, `phone_primary`, `status`) VALUES
('00000', 'test', 'test', 'test@winona.edu', '0000000000', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`a_name`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD KEY `fk_answer_user1_idx` (`user_id`),
  ADD KEY `fk_answer_project1_idx` (`project_id`),
  ADD KEY `fk_answer_question1` (`question_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`,`user_id`),
  ADD UNIQUE KEY `group_name_UNIQUE` (`group_name`),
  ADD KEY `fk_project_advisor1_idx` (`advisor_name`),
  ADD KEY `fk_project_user1_idx` (`user_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `fk_review_project1_idx` (`project_id`),
  ADD KEY `fk_review_user1_idx` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_answer_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answer_question1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answer_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_advisor1` FOREIGN KEY (`advisor_name`) REFERENCES `advisor` (`a_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_project_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `fk_review_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_review_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
