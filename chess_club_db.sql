-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 03:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chess_club_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(225) NOT NULL,
  `date` date NOT NULL,
  `sessionID` int(225) NOT NULL,
  `coachID` int(225) NOT NULL,
  `userID` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `date`, `sessionID`, `coachID`, `userID`) VALUES
(2, '2023-07-08', 4, 4, 11),
(3, '2023-07-07', 4, 4, 12),
(4, '2023-07-08', 1, 1, 2),
(5, '2023-07-08', 1, 1, 13),
(6, '2023-11-28', 9, 5, 7),
(7, '2023-07-17', 4, 1, 6),
(8, '2023-07-07', 6, 3, 6),
(9, '2023-07-08', 6, 3, 3),
(10, '2023-06-30', 6, 3, 15),
(11, '2023-07-07', 4, 1, 4),
(12, '2023-07-22', 5, 4, 7),
(13, '2023-10-07', 1, 5, 6),
(14, '2023-07-07', 1, 1, 3),
(15, '2023-07-08', 1, 2, 12),
(16, '2023-07-10', 9, 4, 12),
(17, '2023-07-14', 4, 4, 11),
(18, '2023-07-28', 8, 5, 12),
(19, '2023-07-27', 7, 2, 11),
(20, '2023-07-08', 6, 1, 12),
(21, '2023-07-09', 1, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `coachID` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `specialization` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contactNumber` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`coachID`, `name`, `specialization`, `email`, `contactNumber`) VALUES
(1, 'John Smith', 'Strategy', 'johnsmith@example.com', '013546895'),
(2, 'Emma Johnson', 'Tactics', 'emmajohnson@example.com', '01140420880'),
(3, 'Michael Davis', 'Endgame', 'michaeldavis@example.com', '018956321'),
(4, 'Sarah Thompson', 'Opening', 'sarahthompson@example.com', '0156984236'),
(5, 'David Wilson', 'Midgame', 'davidwilson@example.com', '012952299');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resourcesID` int(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `fileName` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourcesID`, `title`, `type`, `description`, `fileName`) VALUES
(1, 'Chess Tactics 101', 'Book', 'A beginner-friendly guide to chess tactics.', '8664806_chess_knight_icon.png'),
(2, 'ChessMaster Software', 'Software', 'Advanced chess software for training and analysis.', 'cc-logo.png'),
(3, 'Chess Puzzles', 'Puzzles', 'Collection of challenging chess puzzles for all skill levels.', 'chess-club-logo_logo-icon.png'),
(4, 'Mastering the Endgame', 'Book', 'In-depth guide to mastering chess endgames.', '6843040_chess_formulating strategy_formulation_horse_knight_icon.png'),
(5, 'Chess Opening Repertoire', 'Book', 'Comprehensive guide to building a strong chess opening repertoire.', 'chess-club-logo_logo.png'),
(6, 'Chess for Beginner', 'Book', 'book details', 'cc-profile.png'),
(11, 'Chess Book', 'Book', 'This is chess book', 'Untitled-1.png'),
(12, 'Road To Master Chess', 'Book', 'this is fasters way to chess glory', '6843040_chess_formulating strategy_formulation_horse_knight_icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(100) NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `role`) VALUES
(1, 'admin'),
(2, 'admin'),
(3, 'basic'),
(4, 'premium'),
(5, 'vip');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `sessionID` int(225) NOT NULL,
  `time` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`sessionID`, `time`) VALUES
(1, '8 A.M - 9 A.M'),
(2, '9 A.M - 10 A.M'),
(3, '10 A.M - 11 A.M'),
(4, '1 P.M - 2 P.M'),
(5, '2 P.M - 3 P.M'),
(6, '3 P.M - 4 P.M'),
(7, '7 P.M - 8 P.M'),
(8, '8 P.M - 9 P.M'),
(9, '9 P.M - 10 P.M');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(225) NOT NULL,
  `firstName` varchar(225) NOT NULL,
  `lastName` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `roleID` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `firstName`, `lastName`, `email`, `password`, `roleID`) VALUES
(2, 'Emma', 'Stich', 'emmasmith@example.com', 'password2', 2),
(3, 'Michael', 'Johnson', 'michaeljohnson@example.com', 'password3', 3),
(4, 'Sarah', 'Davis', 'sarahdavis@example.com', 'password4', 4),
(6, 'Muhammad', 'Fikri', 'mfikri@mail.com', 'pass123', 3),
(7, 'Aarif', 'Hanazi', 'arif11@mail.com', 'arid123', 5),
(11, 'Intan', 'Nora ', 'intan@mail.com', 'intan123', 4),
(12, 'Nurshahiran', 'Sufyan', 'yan@mail.com', 'yan123', 5),
(13, 'Syuhada', 'Ghazali', 'syu@mail.com', 'syu123', 4),
(15, 'Khairil Hazim', 'Jalil', 'khai123@gmail.com', 'khai123', 3),
(17, 'Muhd Fikri', 'Hasnizam', 'fikri@gmail.com', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userresources`
--

CREATE TABLE `userresources` (
  `userResourcesID` int(11) NOT NULL,
  `resourcesID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `downloadInfo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userresources`
--

INSERT INTO `userresources` (`userResourcesID`, `resourcesID`, `userID`, `downloadInfo`) VALUES
(1, 1, 2, '2023-07-26'),
(3, 1, 12, '2023-07-27'),
(4, 2, 12, '2023-06-07'),
(5, 4, 12, '2023-07-14'),
(6, 1, 12, '2023-07-12'),
(7, 11, 12, '2023-07-26'),
(8, 11, 12, '2023-07-25'),
(9, 12, 12, '2023-07-06'),
(10, 11, 12, '2023-07-06'),
(11, 12, 12, '2023-07-06'),
(12, 12, 12, '2023-07-06'),
(13, 12, 12, '2023-07-06'),
(14, 12, 12, '2023-07-06'),
(15, 1, 15, '2023-07-07'),
(16, 2, 15, '2023-07-07'),
(17, 3, 15, '2023-07-07'),
(18, 4, 15, '2023-07-07'),
(19, 12, 15, '2023-07-07'),
(20, 11, 15, '2023-07-07'),
(21, 6, 15, '2023-07-07'),
(22, 5, 15, '2023-07-07'),
(23, 11, 11, '2023-07-08'),
(24, 2, 12, '2023-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `userworkshop`
--

CREATE TABLE `userworkshop` (
  `userWorkshopID` int(225) NOT NULL,
  `workshopID` int(225) NOT NULL,
  `userID` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userworkshop`
--

INSERT INTO `userworkshop` (`userWorkshopID`, `workshopID`, `userID`) VALUES
(2, 1, 4),
(3, 1, 12),
(6, 4, 12),
(12, 5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `workshopID` int(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `location` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`workshopID`, `title`, `date`, `location`, `description`) VALUES
(1, 'Chess Strategy Workshop', '2023-06-20', 'Online', 'Learn advanced chess strategies from top experts.'),
(2, 'Tactics Masterclass', '2023-06-25', 'Chess Club House', 'Improve your tactical skills with challenging exercises.'),
(3, 'Endgame Techniques Seminar', '2023-07-02', 'Community Center', 'Master the art of endgame play with expert guidance.'),
(4, 'Opening Theory Workshop', '2023-07-08', 'Chess Club House', 'Explore different opening variations and strategies.'),
(5, 'Chess Psychology Seminar', '2023-07-15', 'Online', 'Learn how to manage your mindset during chess games.'),
(9, 'Chess Bootcamp', '2023-07-28', 'Virtual ', 'For Intermediate Chess Player');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`),
  ADD KEY `coachID` (`coachID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `sessionID` (`sessionID`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`coachID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resourcesID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userRoleID` (`roleID`);

--
-- Indexes for table `userresources`
--
ALTER TABLE `userresources`
  ADD PRIMARY KEY (`userResourcesID`),
  ADD KEY `resourcesID` (`resourcesID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `userworkshop`
--
ALTER TABLE `userworkshop`
  ADD PRIMARY KEY (`userWorkshopID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `workshopID` (`workshopID`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`workshopID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `classID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `coach`
--
ALTER TABLE `coach`
  MODIFY `coachID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resourcesID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `sessionID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `userresources`
--
ALTER TABLE `userresources`
  MODIFY `userResourcesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userworkshop`
--
ALTER TABLE `userworkshop`
  MODIFY `userWorkshopID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `workshopID` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`coachID`) REFERENCES `coach` (`coachID`),
  ADD CONSTRAINT `class_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `class_ibfk_3` FOREIGN KEY (`sessionID`) REFERENCES `sessions` (`sessionID`);

--
-- Constraints for table `userresources`
--
ALTER TABLE `userresources`
  ADD CONSTRAINT `userresources_ibfk_1` FOREIGN KEY (`resourcesID`) REFERENCES `resources` (`resourcesID`),
  ADD CONSTRAINT `userresources_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

--
-- Constraints for table `userworkshop`
--
ALTER TABLE `userworkshop`
  ADD CONSTRAINT `userworkshop_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `userworkshop_ibfk_2` FOREIGN KEY (`workshopID`) REFERENCES `workshop` (`workshopID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
