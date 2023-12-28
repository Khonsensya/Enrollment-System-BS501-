-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Dec 28, 2023 at 09:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_system`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `CheckBirthdate` () RETURNS TINYINT(4)  BEGIN
    DECLARE result TINYINT;
    IF NEW.Birthdate <= CURDATE() THEN
        SET result = 1;
    ELSE
        SET result = 0;
    END IF;
    RETURN result;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `school_courses`
--

CREATE TABLE `school_courses` (
  `Course_ID` varchar(12) NOT NULL,
  `Course_Name` varchar(255) NOT NULL,
  `Course_Category` enum('Information & Communications Technology','Business & Management','Hospitality Management','Tourism Management','Engineering','Arts & Sciences','Maritime') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_courses`
--

INSERT INTO `school_courses` (`Course_ID`, `Course_Name`, `Course_Category`) VALUES
('INF-IT-001', 'Bachelor of Science in Information Technology', 'Information & Communications Technology');

--
-- Triggers `school_courses`
--
DELIMITER $$
CREATE TRIGGER `before_insert_courses_guid` BEFORE INSERT ON `school_courses` FOR EACH ROW BEGIN
    DECLARE in_position INT;
    DECLARE first_word_letter VARCHAR(1);
    DECLARE last_word_first_letter VARCHAR(1);

    SET in_position = LOCATE('in', NEW.Course_Name);
    IF in_position > 0 THEN
        SET first_word_letter = SUBSTRING(NEW.Course_Name, in_position + 3, 1);  -- Get first letter of word after 'in'
    ELSE
        SET first_word_letter = SUBSTRING(NEW.Course_Name, 1, 1);  -- If there is no 'in', gets the first letter of the first word
    END IF;

   
    SET last_word_first_letter = SUBSTRING_INDEX(NEW.Course_Name, ' ', -1);  -- Gets last word in Course_Name
    SET last_word_first_letter = LEFT(last_word_first_letter, 1);  -- Gets first letter of last word

    SET NEW.Course_ID = CONCAT(
        UPPER(LEFT(NEW.Course_Category, 3)), '-',
        first_word_letter, last_word_first_letter, '-',
        LPAD(COALESCE((SELECT MAX(RIGHT(Course_ID, 3)) + 1
                       FROM school_courses
                       WHERE Course_Category = NEW.Course_Category
                         AND LEFT(Course_ID, 7) = CONCAT(LEFT(NEW.Course_Category, 3), '-', first_word_letter, last_word_first_letter)), 1), 3, '0')
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `school_sections`
--

CREATE TABLE `school_sections` (
  `Section_ID` int(20) NOT NULL,
  `Course_ID` varchar(12) NOT NULL,
  `Semester_ID` int(20) NOT NULL,
  `Section_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_semesters`
--

CREATE TABLE `school_semesters` (
  `Semester_ID` int(20) NOT NULL,
  `School_Year` varchar(50) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Student_ID` int(20) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Middle_Initial` char(1) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `Birthdate` date NOT NULL,
  `Place_of_Birth` varchar(100) NOT NULL,
  `Citizenship` varchar(50) NOT NULL,
  `Civil_Status` enum('Single','Married','Divorced','Separated','Widowed') NOT NULL,
  `Mobile_Number` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Enrolled` tinyint(1) NOT NULL DEFAULT 0,
  `User_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Student_ID`, `First_Name`, `Last_Name`, `Middle_Initial`, `Gender`, `Birthdate`, `Place_of_Birth`, `Citizenship`, `Civil_Status`, `Mobile_Number`, `Email`, `Address`, `Enrolled`, `User_ID`) VALUES
(1, 'Kobe', 'Malonzo', '', '', '2002-08-07', '', '', 'Single', 0, '', '', 0, 10001),
(2, 'Mark Limuel', 'Lape', '', '', '0000-00-00', '', '', 'Single', 0, '', '', 0, 10002),
(3, 'Yranimez', 'Repil', '', '', '0000-00-00', '', '', 'Single', 0, 'yranimezrepil@gmail.com', '', 0, 10003);

--
-- Triggers `student_info`
--
DELIMITER $$
CREATE TRIGGER `Before_Insert_Student_Info` BEFORE INSERT ON `student_info` FOR EACH ROW BEGIN
    IF NEW.Birthdate > CURDATE() THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Birthdate is invalid';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Before_Update_Student_Info` BEFORE UPDATE ON `student_info` FOR EACH ROW BEGIN
    IF NEW.Birthdate > CURDATE() THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Birthdate is invalid';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `Student_Number` bigint(10) NOT NULL,
  `Student_ID` int(20) NOT NULL,
  `Section_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` bigint(20) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `User_Type` enum('Student','Administrator','','') NOT NULL DEFAULT 'Student',
  `Date_Created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `User_Type`, `Date_Created`) VALUES
(10001, 'Christian Kobe', 'Malonzo', 'sample@gmail.com', '1234567890', 'Student', '2023-12-26 13:19:22'),
(10002, 'Mark Limuel', 'Lape', 'lapemark@gmail.com', '0912345', 'Student', '2023-12-26 14:03:47'),
(10003, 'Yranimez', 'Repil', 'yranimezrepil@gmail.com', '093218423', 'Student', '2023-12-26 14:06:41');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `AfterInsertUser` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE v_UserID INT;

    -- Insert into Students table if UserType is 'Student'
    IF NEW.User_Type = 'Student' THEN
        SET v_UserID = NEW.User_ID;  -- Use NEW.User_ID directly
        INSERT INTO student_info (First_Name, Last_Name, Email, User_ID)
        VALUES (NEW.First_Name, NEW.Last_Name, NEW.Email, v_UserID);
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school_courses`
--
ALTER TABLE `school_courses`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `school_sections`
--
ALTER TABLE `school_sections`
  ADD PRIMARY KEY (`Section_ID`),
  ADD KEY `Foreign_Section_2_Semester` (`Semester_ID`),
  ADD KEY `Foreign_Section_2_Courses` (`Course_ID`);

--
-- Indexes for table `school_semesters`
--
ALTER TABLE `school_semesters`
  ADD PRIMARY KEY (`Semester_ID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `Foreign_Student_2_User` (`User_ID`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD KEY `Foreign_Profile_2_Section` (`Section_ID`),
  ADD KEY `Foreign_Profile_2_Student` (`Student_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `Student_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `school_sections`
--
ALTER TABLE `school_sections`
  ADD CONSTRAINT `Foreign_Section_2_Courses` FOREIGN KEY (`Course_ID`) REFERENCES `school_courses` (`Course_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Foreign_Section_2_Semester` FOREIGN KEY (`Semester_ID`) REFERENCES `school_semesters` (`Semester_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `Foreign_Student_2_User` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD CONSTRAINT `Foreign_Profile_2_Section` FOREIGN KEY (`Section_ID`) REFERENCES `school_sections` (`Section_ID`),
  ADD CONSTRAINT `Foreign_Profile_2_Student` FOREIGN KEY (`Student_ID`) REFERENCES `student_info` (`Student_ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
