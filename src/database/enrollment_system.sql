-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 12:24 AM
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
-- Table structure for table `enrollment_transaction`
--

CREATE TABLE `enrollment_transaction` (
  `Transaction_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Course_ID` varchar(30) NOT NULL,
  `Payment_Type` enum('monthly','semestral','fullpayment') NOT NULL,
  `Amount_Due` int(11) NOT NULL,
  `Payment` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'enrolled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment_transaction`
--

INSERT INTO `enrollment_transaction` (`Transaction_ID`, `Student_ID`, `Course_ID`, `Payment_Type`, `Amount_Due`, `Payment`, `Status`) VALUES
(2147483647, 10014, 'INF-CS-002', 'fullpayment', 30000, 30000, 'enrolled'),
(2147483647, 10015, 'INF-IS-003', 'monthly', 5000, 5000, 'enrolled');

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
-- Table structure for table `student_apply`
--

CREATE TABLE `student_apply` (
  `Apply_ID` varchar(20) NOT NULL,
  `Program` varchar(20) NOT NULL,
  `Status` enum('pending','accepted','rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_apply`
--

INSERT INTO `student_apply` (`Apply_ID`, `Program`, `Status`) VALUES
('10011', 'INF-CS-002', 'accepted'),
('10012', 'INF-CS-002', 'accepted'),
('10013', 'INF-CS-002', 'accepted'),
('10014', 'INF-CS-002', 'accepted'),
('10015', 'INF-IS-003', 'accepted'),
('10016', 'INF-IT-001', 'accepted'),
('10017', 'TOU-TM-001', 'accepted');

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
  `Gender` enum('Male','Female','NoSex','') NOT NULL DEFAULT 'NoSex',
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
(1, 'dceru', 'admin', '', 'NoSex', '0000-00-00', '', '', 'Single', '', 'dceruadmin@dceru.edu.ph', '', 0, 10010, 0),
(2, 'Mark Limuel', 'Lape', 'L', 'Male', '0000-00-00', 'Manila, Philippines', 'Filipino', 'Single', '09562038413', 'marklape@dceru.edu.ph', 'Bocaue, Bulacan', 1, 10011, 1),
(3, 'Kobe', 'Malonzo', '', 'Male', '2024-01-03', 'Manila, Philippines', 'Filipino', 'Single', '0', 'kobemalonzo@dceru.edu.ph', 'Quezon City, NCR', 0, 10012, 1),
(4, 'Yranimez', 'Repil', 'R', 'Male', '2024-01-02', 'Manila, Philippines', 'Filipino', 'Single', '0', 'yranimezrepil@dceru.edu.ph', 'Quezon City, NCR', 0, 10013, 1),
(5, 'Luis', 'Abungin', '', 'Male', '2024-01-05', 'Manila, Philippines', 'Filipino', 'Single', '0', 'luisabungin@dceru.edu.ph', 'Quezon City, NCR', 1, 10014, 1),
(6, 'James', 'Gerena', 'O', 'Male', '2024-01-16', 'Manila, Philippines', 'Japanese', 'Single', '0', 'jamesgerena@dceru.edu.ph', 'Quezon City, NCR', 1, 10015, 1),
(7, 'Kian', 'Dela', 'C', 'Male', '2024-01-06', 'Manila, Philippines', 'Filipino', 'Single', '0', 'kiandelacruz@dceru.edu.ph', 'Quezon City, NCR', 1, 10016, 1),
(8, 'John', 'Austria', '', 'Male', '2024-01-07', 'Manila, Philippines', 'Chinese', 'Single', '0', 'johnaustria@dceru.edu.ph', 'Quezon City, NCR', 0, 10017, 1);

--
-- Triggers `student_info`
--
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

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `Student_Number` varchar(20) NOT NULL,
  `Student_ID` int(20) NOT NULL,
  `Section_ID` varchar(20) DEFAULT NULL,
  `Course_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`Student_Number`, `Student_ID`, `Section_ID`, `Course_ID`) VALUES
('', 7, NULL, ''),
('0500010002', 10002, NULL, 'INF-CS-002'),
('0500010012', 10012, NULL, 'INF-CS-002'),
('0500010013', 10013, NULL, 'INF-CS-002'),
('0500010014', 10014, NULL, 'INF-CS-002'),
('0500010015', 10015, NULL, 'INF-IS-003'),
('0500010016', 10016, NULL, 'INF-IT-001'),
('0500010017', 10017, NULL, 'TOU-TM-001');

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
  `Date_Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `Applied` enum('notapplied','applied') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `First_Name`, `Last_Name`, `Email`, `Password`, `User_Type`, `Date_Created`, `Applied`) VALUES
(10010, 'dceru', 'admin', 'dceruadmin@dceru.edu.ph', '$2y$10$1KPu4i1wJBGUK1UX8lrvauQ3PfE9vaamtpvm/bYbDoMrQ5R/cfUee', 'Administrator', '2024-01-16 20:34:58', 'notapplied'),
(10011, 'Mark Limuel', 'Lape', 'marklape@dceru.edu.ph', '$2y$10$PsNeM2Flle2D/SIm7gG4n.mDPDAny/l9GLkUvKRpcaXvbgsns/Z5e', 'Student', '2024-01-16 20:38:17', 'applied'),
(10012, 'Kobe', 'Malonzo', 'kobemalonzo@dceru.edu.ph', '$2y$10$Cdd7LSC0fg/uFGaEUv7DEOr3ErL9nAA0DkMUBz8e9K4FeVTLQPKnq', 'Student', '2024-01-16 20:38:34', 'applied'),
(10013, 'Yranimez', 'Repil', 'yranimezrepil@dceru.edu.ph', '$2y$10$.hYlkemkFWgM5Xo89LLsvueizeb/7URbZ4kVl7lb8sOXBkKW6VlLe', 'Student', '2024-01-16 20:38:58', 'applied'),
(10014, 'Luis', 'Abungin', 'luisabungin@dceru.edu.ph', '$2y$10$n2wl.Y.VBXb96CuqFDtHPuOF4abevcnCcmli.Ylu7lyER0oosYgtm', 'Student', '2024-01-16 20:39:18', 'applied'),
(10015, 'James', 'Gerena', 'jamesgerena@dceru.edu.ph', '$2y$10$kN.uk8bUOZ9ph0Y7YnqbRO6V76co1EiiIkUY/MqkCgaZOlC4zo3du', 'Student', '2024-01-16 20:39:31', 'applied'),
(10016, 'Kian', 'Dela', 'kiandelacruz@dceru.edu.ph', '$2y$10$NEeXoCH.95IdNnzqID/n2OPLn5u2cJjb.XdpaYsqCx5K5meysUuSe', 'Student', '2024-01-16 20:39:53', 'applied'),
(10017, 'John', 'Austria', 'johnaustria@dceru.edu.ph', '$2y$10$49dGGLdhHXJ9nIkeLI05ouwCYLH5c7yKk/RHZZ.ZdZVBQxcp9XeVi', 'Student', '2024-01-16 20:57:34', 'applied');

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
-- Indexes for table `enrollment_transaction`
--
ALTER TABLE `enrollment_transaction`
  ADD KEY `Transaction_ID` (`Transaction_ID`) USING BTREE;

--
-- Indexes for table `school_courses`
--
ALTER TABLE `school_courses`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `student_apply`
--
ALTER TABLE `student_apply`
  ADD PRIMARY KEY (`Apply_ID`) USING BTREE;

--
-- Indexes for table `student_batches`
--
ALTER TABLE `student_batches`
  ADD PRIMARY KEY (`Semester_ID`) USING BTREE;

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
  ADD PRIMARY KEY (`Student_Number`) USING BTREE;

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
  MODIFY `Student_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10018;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
