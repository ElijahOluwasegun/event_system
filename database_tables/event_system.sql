-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2024 at 11:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendee`
--

CREATE TABLE `Attendee` (
  `id` int(11) NOT NULL,
  `Attno` varchar(250) NOT NULL,
  `AttFname` varchar(250) NOT NULL,
  `AttLname` varchar(250) NOT NULL,
  `Attemail` varchar(250) NOT NULL,
  `Attphoneno` varchar(250) NOT NULL,
  `Eventno` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `Attendee`:
--

--
-- Dumping data for table `Attendee`
--

INSERT INTO `Attendee` (`id`, `Attno`, `AttFname`, `AttLname`, `Attemail`, `Attphoneno`, `Eventno`) VALUES
(1, 'AT32', 'Sylvia', 'Pauson', 'johnsmith@gmail.com', '+25676543', '2'),
(2, 'ATT325', 'Harden', 'John', 'johnharden@gmail.com', '+25674356236', '3');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `Eventno` varchar(250) NOT NULL,
  `EventName` varchar(250) NOT NULL,
  `Edescript` varchar(250) NOT NULL,
  `EventStartDate` date NOT NULL,
  `EventEndDate` date NOT NULL,
  `EventStartTime` time NOT NULL,
  `EventEndTime` time NOT NULL,
  `HostOrg` varchar(250) NOT NULL,
  `EventOrg` varchar(250) NOT NULL,
  `Organizeremail` varchar(250) NOT NULL,
  `Organizerphoneno` varchar(250) NOT NULL,
  `Attsize` varchar(250) NOT NULL,
  `AdditionalComments` varchar(1000) NOT NULL,
  `Created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `event`:
--   `Created_by`
--       `staff` -> `id`
--

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `Eventno`, `EventName`, `Edescript`, `EventStartDate`, `EventEndDate`, `EventStartTime`, `EventEndTime`, `HostOrg`, `EventOrg`, `Organizeremail`, `Organizerphoneno`, `Attsize`, `AdditionalComments`, `Created_by`) VALUES
(2, 'EV34', 'Motherhood for Change', 'Expecting women', '2024-11-27', '2024-11-28', '12:00:00', '15:00:00', 'Women Evolve', 'Simp events', 'simpevents@gmail.com', '+25675525433', 'large', '', 3),
(3, 'EV673', 'Mining Development in Uganda', 'Looking at the progress of mining in Uganda', '2024-11-17', '2024-11-19', '10:00:00', '15:00:00', 'MiningforUganda', 'Pisaw events', 'pisawevents@gmail.com', '+256758193284', 'large', '', 4),
(4, 'EV342', 'Power for Change', 'Empowering Youths', '2024-11-18', '2024-11-20', '00:34:00', '04:34:00', 'PolsUg', 'Dray events', 'drayevents@gmail.com', '+25674353532', 'large', '', 4),
(5, 'EV433', 'Power for Change', 'Empowering Youths', '2024-11-20', '2024-11-22', '12:00:00', '15:00:00', 'PolsUg', 'Simp events', 'simpevents@gmail.com', '+256363634634', 'large', '', 3),
(6, 'EV124', 'Improving Digital Litercay', 'Empowering Youths', '2024-12-25', '2024-12-26', '10:00:00', '15:00:00', 'Tech Ug', 'Quest events', 'questevents@gmail.com', '+256756392734', 'large', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `Roomno` varchar(250) NOT NULL,
  `Rname` varchar(250) NOT NULL,
  `Rlocation` varchar(250) NOT NULL,
  `Staffno` varchar(250) NOT NULL,
  `Eventno` varchar(250) NOT NULL,
  `Username` varchar(250) NOT NULL DEFAULT '"',
  `Password` varchar(250) NOT NULL DEFAULT '"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `room`:
--

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `Roomno`, `Rname`, `Rlocation`, `Staffno`, `Eventno`, `Username`, `Password`) VALUES
(1, 'R43', 'Conference Room 1', 'Ground Level', '3', '2', '\"', '\"'),
(2, 'R43', 'Conference Room 1', 'Ground Level', '4', '3', '\"', '\"');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `Stno` varchar(250) NOT NULL,
  `Fname` varchar(250) NOT NULL,
  `Lname` varchar(250) NOT NULL,
  `Phoneno` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `cadre` varchar(250) NOT NULL,
  `Username` varchar(250) NOT NULL DEFAULT '''''',
  `Password` varchar(250) NOT NULL DEFAULT ''''''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `staff`:
--

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `Stno`, `Fname`, `Lname`, `Phoneno`, `email`, `cadre`, `Username`, `Password`) VALUES
(1, 'ST3', 'John ', 'Doe', '+2568324328', 'johndoe@gmail.com', 'Manager', '\'\'', '\'\''),
(2, 'ST9', 'Mary', 'Sow', '+25653838242', 'marysow@gmail.com', 'Manager', '\'\'', '\'\''),
(3, 'ST98', 'Kip', 'Lop', '+256754839', 'kiplop@gmail.com', 'Waiter', '\'\'', '\'\''),
(4, 'ST847', 'Susan', 'Small', '+25675383492', 'susansmall@gmail.com', 'Waiter', '\'\'', '\'\''),
(5, 'ST433', 'Paul', 'John', '+25566434553', 'pauljohn@gmail.com', 'Manager', '\'\'', '\'\''),
(6, 'ST6454', 'Fred', 'Joe', '+25684849392', 'fredjoe@gmail.com', 'Waiter', '\'\'', '\'\''),
(7, 'ST935', 'Hope', 'Sue', '+25635734938', 'hopesue@gmail.com', 'Manager', '\'\'', '\'\''),
(8, 'ST4532', 'Jon', 'Stewart', '+25678593723', 'jonstewart@gmail.com', 'Manager', '\'\'', '\'\''),
(11, 'ST3124', 'Paul', 'James', '+25675482091', 'pauljames@gmail.com', 'Waiter', '\'\'', '\'\''),
(13, 'ST1003', 'Emily', 'Davis', '456-789-0123', 'emily.davis@example.com', 'Waiter', '\'\'', '\'\''),
(14, 'ST353', 'Pom', 'Sally', '+25675877212', 'pomsally@gmail.com', 'Manager', '\'\'', '\'\''),
(15, 'ST5938', 'Kerman', 'Matthew', '+25675929472', 'kermanmatthew@gmail.com', 'Admin', '\'\'', '\'\''),
(16, 'ST099', 'Weal', 'Lop', '+25675486549', 'weallop@gmail.com', 'Waiter', '\'\'', '\'\''),
(17, 'ST5839', 'Ian', 'Yo', '+25675838242', 'ianyo@gmail.com', 'Waiter', '\'\'', '\'\'');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendee`
--
ALTER TABLE `Attendee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Created_by` (`Created_by`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attendee`
--
ALTER TABLE `Attendee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`Created_by`) REFERENCES `staff` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
