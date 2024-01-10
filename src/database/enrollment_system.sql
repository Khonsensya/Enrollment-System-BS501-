-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 05:42 PM
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
('ART-CC-002', 'Bachelor of Arts in Communication', 'Arts & Sciences'),
('ART-MA-001', 'Bachelor of Arts in Multimedia Arts', 'Arts & Sciences'),
('BUS-AA-002', 'Bachelor of Science in Accountancy', 'Business & Management'),
('BUS-AS-003', 'Bachelor of Science in Accounting Information System', 'Business & Management'),
('BUS-BA-001', 'Bachelor of Science in Business Administration', 'Business & Management'),
('BUS-MA-004', 'Bachelor of Science in Management Accounting', 'Business & Management'),
('BUS-RS-005', 'Bachelor of Science in Retail Technology and Consumer Science', 'Business & Management'),
('HOS-CM-002', 'Bachelor of Science in Culinary Management', 'Hospitality Management'),
('HOS-HM-001', 'Bachelor of Science in Hospitality Management', 'Hospitality Management'),
('INF-CS-002', 'Bachelor of Science in Computer Science', 'Information & Communications Technology'),
('INF-IS-003', 'Bachelor of Science in Information Systems', 'Information & Communications Technology'),
('INF-IT-001', 'Bachelor of Science in Information Technology', 'Information & Communications Technology'),
('MAR-ME-002', 'Bachelor of Science in Marine Engineering', 'Maritime'),
('MAR-MT-001', 'Bachelor of Science in Marine Transportation', 'Maritime'),
('MAR-NE-003', 'Bachelor of Science in Naval Architecture and Marine Engineering\r\n', 'Maritime'),
('TOU-TM-001', 'Bachelor of Science in Tourism Management\r\n', 'Tourism Management');

--
-- Triggers `school_courses`
--
DELIMITER $$
CREATE TRIGGER `Before_Insert_Courses_GUID` BEFORE INSERT ON `school_courses` FOR EACH ROW BEGIN
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
        LPAD(COALESCE((SELECT COUNT(*) + 1
                       FROM school_courses
                       WHERE Course_Category = NEW.Course_Category), 1), 3, '0')  -- Increment based on total courses in category
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `school_sections`
--

CREATE TABLE `school_sections` (
  `Section_ID` varchar(20) NOT NULL,
  `Course_ID` varchar(12) NOT NULL,
  `Term` enum('1st Term','2nd Term','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_sections`
--

INSERT INTO `school_sections` (`Section_ID`, `Course_ID`, `Term`) VALUES
('AA101', 'BUS-AA-002', '1st Term'),
('AA201', 'BUS-AA-002', '2nd Term'),
('AA301', 'BUS-AA-002', '1st Term'),
('AA401', 'BUS-AA-002', '2nd Term'),
('AA501', 'BUS-AA-002', '1st Term'),
('AA601', 'BUS-AA-002', '2nd Term'),
('AA701', 'BUS-AA-002', '1st Term'),
('AA801', 'BUS-AA-002', '2nd Term'),
('AS101', 'BUS-AS-003', '1st Term'),
('AS201', 'BUS-AS-003', '2nd Term'),
('AS301', 'BUS-AS-003', '1st Term'),
('AS401', 'BUS-AS-003', '2nd Term'),
('AS501', 'BUS-AS-003', '1st Term'),
('AS601', 'BUS-AS-003', '2nd Term'),
('AS701', 'BUS-AS-003', '1st Term'),
('AS801', 'BUS-AS-003', '2nd Term'),
('BA101', 'BUS-BA-001', '1st Term'),
('BA201', 'BUS-BA-001', '2nd Term'),
('BA301', 'BUS-BA-001', '1st Term'),
('BA401', 'BUS-BA-001', '2nd Term'),
('BA501', 'BUS-BA-001', '1st Term'),
('BA601', 'BUS-BA-001', '2nd Term'),
('BA701', 'BUS-BA-001', '1st Term'),
('BA801', 'BUS-BA-001', '2nd Term'),
('CC101', 'ART-CC-002', '1st Term'),
('CC201', 'ART-CC-002', '2nd Term'),
('CC301', 'ART-CC-002', '1st Term'),
('CC401', 'ART-CC-002', '2nd Term'),
('CC501', 'ART-CC-002', '1st Term'),
('CC601', 'ART-CC-002', '2nd Term'),
('CC701', 'ART-CC-002', '1st Term'),
('CC801', 'ART-CC-002', '2nd Term'),
('CS101', 'INF-CS-002', '1st Term'),
('CS201', 'INF-CS-002', '2nd Term'),
('CS301', 'INF-CS-002', '1st Term'),
('CS401', 'INF-CS-002', '2nd Term'),
('CS501', 'INF-CS-002', '1st Term'),
('CS601', 'INF-CS-002', '2nd Term'),
('CS701', 'INF-CS-002', '1st Term'),
('CS801', 'INF-CS-002', '2nd Term'),
('HM101', 'HOS-HM-001', '1st Term'),
('HM201', 'HOS-HM-001', '2nd Term'),
('HM301', 'HOS-HM-001', '1st Term'),
('HM401', 'HOS-HM-001', '2nd Term'),
('HM501', 'HOS-HM-001', '1st Term'),
('HM601', 'HOS-HM-001', '2nd Term'),
('HM701', 'HOS-HM-001', '1st Term'),
('HM801', 'HOS-HM-001', '2nd Term'),
('IS101', 'INF-IS-003', '1st Term'),
('IS201', 'INF-IS-003', '2nd Term'),
('IS301', 'INF-IS-003', '1st Term'),
('IS401', 'INF-IS-003', '2nd Term'),
('IS501', 'INF-IS-003', '1st Term'),
('IS601', 'INF-IS-003', '2nd Term'),
('IS701', 'INF-IS-003', '1st Term'),
('IS801', 'INF-IS-003', '2nd Term'),
('IT101', 'INF-IT-001', '1st Term'),
('IT201', 'INF-IT-001', '2nd Term'),
('IT301', 'INF-IT-001', '1st Term'),
('IT401', 'INF-IT-001', '2nd Term'),
('IT501', 'INF-IT-001', '1st Term'),
('IT601', 'INF-IT-001', '2nd Term'),
('IT701', 'INF-IT-001', '1st Term'),
('IT801', 'INF-IT-001', '2nd Term'),
('MA101', 'ART-MA-001', '1st Term'),
('MA201', 'ART-MA-001', '2nd Term'),
('MA301', 'ART-MA-001', '1st Term'),
('MA401', 'ART-MA-001', '2nd Term'),
('MA501', 'ART-MA-001', '1st Term'),
('MA601', 'ART-MA-001', '2nd Term'),
('MA701', 'ART-MA-001', '1st Term'),
('MA801', 'ART-MA-001', '2nd Term'),
('ME101', 'MAR-ME-002', '1st Term'),
('ME201', 'MAR-ME-002', '2nd Term'),
('ME301', 'MAR-ME-002', '1st Term'),
('ME401', 'MAR-ME-002', '2nd Term'),
('ME501', 'MAR-ME-002', '1st Term'),
('ME601', 'MAR-ME-002', '2nd Term'),
('ME701', 'MAR-ME-002', '1st Term'),
('ME801', 'MAR-ME-002', '2nd Term'),
('MT101', 'MAR-MT-001', '1st Term'),
('MT201', 'MAR-MT-001', '2nd Term'),
('MT301', 'MAR-MT-001', '1st Term'),
('MT401', 'MAR-MT-001', '2nd Term'),
('MT501', 'MAR-MT-001', '1st Term'),
('MT601', 'MAR-MT-001', '2nd Term'),
('MT701', 'MAR-MT-001', '1st Term'),
('MT801', 'MAR-MT-001', '2nd Term'),
('NE101', 'MAR-NE-003', '1st Term'),
('NE201', 'MAR-NE-003', '2nd Term'),
('NE301', 'MAR-NE-003', '1st Term'),
('NE401', 'MAR-NE-003', '2nd Term'),
('NE501', 'MAR-NE-003', '1st Term'),
('NE601', 'MAR-NE-003', '2nd Term'),
('NE701', 'MAR-NE-003', '1st Term'),
('NE801', 'MAR-NE-003', '2nd Term'),
('RS101', 'BUS-RS-005', '1st Term'),
('RS201', 'BUS-RS-005', '2nd Term'),
('RS301', 'BUS-RS-005', '1st Term'),
('RS401', 'BUS-RS-005', '2nd Term'),
('RS501', 'BUS-RS-005', '1st Term'),
('RS601', 'BUS-RS-005', '2nd Term'),
('RS701', 'BUS-RS-005', '1st Term'),
('RS801', 'BUS-RS-005', '2nd Term'),
('TM101', 'TOU-TM-001', '1st Term'),
('TM201', 'TOU-TM-001', '2nd Term'),
('TM301', 'TOU-TM-001', '1st Term'),
('TM401', 'TOU-TM-001', '2nd Term'),
('TM501', 'TOU-TM-001', '1st Term'),
('TM601', 'TOU-TM-001', '2nd Term'),
('TM701', 'TOU-TM-001', '1st Term'),
('TM801', 'TOU-TM-001', '2nd Term');

-- --------------------------------------------------------

--
-- Table structure for table `student_batches`
--

CREATE TABLE `student_batches` (
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
  `Mobile_Number` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Enrolled` tinyint(1) NOT NULL DEFAULT 0,
  `User_ID` bigint(20) DEFAULT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Student_ID`, `First_Name`, `Last_Name`, `Middle_Initial`, `Gender`, `Birthdate`, `Place_of_Birth`, `Citizenship`, `Civil_Status`, `Mobile_Number`, `Email`, `Address`, `Enrolled`, `User_ID`, `Status`) VALUES
(1, 'Christian Kobe', 'Malonzo', '', 'Male', '2002-08-07', '', '', 'Single', '0', 'kobemalonzo@gmail.com', '', 0, 10001, 1),
(2, 'Mark Limuel', 'Lape', 'Z', 'Male', '2000-01-01', 'Philippines', 'Filipino', 'Single', '09234567890', 'lapemark@gmail.com', 'Bulacan', 1, 10002, 1),
(3, 'Yranimez', 'Repil', 'R', 'Male', '0000-00-00', 'Philippines', 'Filipino', 'Single', '09123456789', 'yranimezrepil@gmail.com', 'Quezon City', 1, 10003, 1),
(7, 'Walkman', 'Powd', '', '', '0000-00-00', '', '', 'Single', '', 'WalkmanPowd@gmail.com', '', 0, 10005, 2),
(8, '@', 'admin', '', '', '0000-00-00', '', '', 'Single', '', 'admin@dceru.edu', '', 0, 10006, 1),
(9, 'Mark Limueldasda', 'dasdas', 'd', 'male', '0000-00-00', '', 'ph', '', '', 'student@dceru.edu', '', 1, 10007, 1);

--
-- Triggers `student_info`
--
DELIMITER $$
CREATE TRIGGER `Enrolled_to_Student_Profile` AFTER UPDATE ON `student_info` FOR EACH ROW BEGIN
    -- Check if the Enrolled column is updated to true
    IF NEW.Enrolled = 1 THEN
	-- Check if student_profile already exists
 		IF NOT EXISTS (SELECT 1 FROM student_profile WHERE Student_ID = NEW.Student_ID) THEN
        -- Insert the Student_ID into the student_profile table
        	INSERT INTO student_profile (Student_ID) VALUES (NEW.Student_ID);
		END IF;
	ELSE
        -- Delete the corresponding row from the student_profile table
        DELETE FROM student_profile WHERE Student_ID = NEW.Student_ID;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Insert_Birthday_Check` BEFORE INSERT ON `student_info` FOR EACH ROW BEGIN
    IF NEW.Birthdate > CURDATE() THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Birthdate is invalid';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Birthday_Check` BEFORE UPDATE ON `student_info` FOR EACH ROW BEGIN
    IF NEW.Birthdate > CURDATE() THEN
        SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Birthdate is invalid';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_student_info_update` AFTER UPDATE ON `student_info` FOR EACH ROW BEGIN
  IF (
    NEW.First_Name <> (SELECT First_Name FROM users WHERE User_ID = NEW.User_ID) OR
    NEW.Last_Name <> (SELECT Last_Name FROM users WHERE User_ID = NEW.User_ID) OR
    NEW.Email <> (SELECT Email FROM users WHERE User_ID = NEW.User_ID)
  ) THEN
    UPDATE users
    SET First_Name = NEW.First_Name,
        Last_Name = NEW.Last_Name,
        Email = NEW.Email
    WHERE User_ID = NEW.User_ID;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `Student_Number` varchar(8) NOT NULL,
  `Student_ID` int(20) NOT NULL,
  `Section_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`Student_Number`, `Student_ID`, `Section_ID`) VALUES
('STDNT002', 2, NULL),
('STDNT003', 3, NULL),
('STDNT009', 9, NULL);

--
-- Triggers `student_profile`
--
DELIMITER $$
CREATE TRIGGER `Generate_Student_Number` BEFORE INSERT ON `student_profile` FOR EACH ROW BEGIN
    SET NEW.Student_Number = CONCAT('STDNT', LPAD(NEW.Student_ID, 3, '0'));
END
$$
DELIMITER ;

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
(10001, 'Christian Kobe', 'Malonzo', 'kobemalonzo@gmail.com', '1234567890', 'Student', '2023-12-26 13:19:22'),
(10002, 'Mark Limuel', 'Lape', 'lapemark@gmail.com', '0912345', 'Student', '2023-12-26 14:03:47'),
(10003, 'Yranimez', 'Repil', 'yranimezrepil@gmail.com', '093218423', 'Student', '2023-12-26 14:06:41'),
(10005, 'Walkman', 'Powd', 'WalkmanPowd@gmail.com', '$2y$10$iNBNs4CZ6bixKCIN.eTpHOKOam0JSQynqL4NJcZ8.HojWiQ1W29Ta', 'Administrator', '2024-01-10 15:26:51'),
(10006, '@', 'admin', 'admin@dceru.edu', '$2y$10$AL5a8zOaUzaeH/qMRmrnAuzzrEjuH0aCRZZk.2J1g3n5yTsOopefi', 'Administrator', '2024-01-10 15:32:43'),
(10007, 'Mark Limueldasda', 'dasdas', 'student@dceru.edu', '$2y$10$zf02zjGWXoeMs5eS9eBAFOo4v/c1jKPPfCdsPwszTBRasQYt0Z/du', 'Student', '2024-01-10 15:33:40');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `Users_to_Student_Info` AFTER INSERT ON `users` FOR EACH ROW BEGIN
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
DELIMITER $$
CREATE TRIGGER `after_users_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
  IF NEW.User_Type = 'Student' THEN
    IF (
      NEW.First_Name <> (SELECT First_Name FROM student_info WHERE User_ID = NEW.User_ID) OR
      NEW.Last_Name <> (SELECT Last_Name FROM student_info WHERE User_ID = NEW.User_ID) OR
      NEW.Email <> (SELECT Email FROM student_info WHERE User_ID = NEW.User_ID)
    ) THEN
      UPDATE student_info
      SET First_Name = NEW.First_Name,
          Last_Name = NEW.Last_Name,
          Email = NEW.Email
      WHERE User_ID = NEW.User_ID;
    END IF;
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
  ADD KEY `Foreign_Section_2_Courses` (`Course_ID`);

--
-- Indexes for table `student_batches`
--
ALTER TABLE `student_batches`
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
  ADD PRIMARY KEY (`Student_Number`),
  ADD UNIQUE KEY `Student_Number` (`Student_Number`),
  ADD KEY `Foreign_Profile_2_Student` (`Student_ID`),
  ADD KEY `Foreign_Profile_2_Section` (`Section_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `Student_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10008;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `school_sections`
--
ALTER TABLE `school_sections`
  ADD CONSTRAINT `Foreign_Section_2_Courses` FOREIGN KEY (`Course_ID`) REFERENCES `school_courses` (`Course_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `student_info`
--
ALTER TABLE `student_info`
  ADD CONSTRAINT `Foreign_Student_2_User` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD CONSTRAINT `Foreign_Profile_2_Section` FOREIGN KEY (`Section_ID`) REFERENCES `school_sections` (`Section_ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `Foreign_Profile_2_Student` FOREIGN KEY (`Student_ID`) REFERENCES `student_info` (`Student_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
