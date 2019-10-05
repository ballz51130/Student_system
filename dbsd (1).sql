-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2019 at 12:17 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_login`
--

CREATE TABLE `check_login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Code_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('admin','teacher','student','') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `check_login`
--

INSERT INTO `check_login` (`id`, `first_name`, `last_name`, `Code_id`, `username`, `password`, `status`) VALUES
(1, 'Jownyce', 'Sohappy', '60122660102', 'leonice11', '1234', 'admin'),
(2, 'FF', 'FF', '50436', '50436', 'aabbb089797c29a13e87e017a37fc972', 'teacher'),
(3, 'So', 'Sad', '60122660111', '60122660134', '1111', 'student'),
(4, 'asdasd', 'asdasd', '60122660128', '60122660123', '1111', 'student'),
(24, '11', '11', '111111', '111111', 'd41d8cd98f00b204e9800998ecf8427e', 'teacher'),
(27, '', '', '', '', '', 'student'),
(28, '', '', '', '', '', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `coursename_tb`
--

CREATE TABLE `coursename_tb` (
  `Cos_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Cos_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coursename_tb`
--

INSERT INTO `coursename_tb` (`Cos_code`, `Cos_name`) VALUES
('12345', 'วิศวกรรมซอฟต์แวร์ 2560'),
('172839', 'อังกฤษเพื่อคนอื่น'),
('25124', 'The world'),
('12346', 'Area 51');

-- --------------------------------------------------------

--
-- Table structure for table `course_tb`
--

CREATE TABLE `course_tb` (
  `Cos_id` int(11) NOT NULL,
  `Cos_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cos_term` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_Code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Teach_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sect_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cos_Time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Cos_Room` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_tb`
--

INSERT INTO `course_tb` (`Cos_id`, `Cos_code`, `Cos_term`, `Sub_Code`, `Teach_code`, `Sect_code`, `Cos_Time`, `Cos_Room`) VALUES
(57, '12345', '2/2563', '5672202', '30141', '03', 'Mon(1-4)', '1'),
(74, '12345', '1/2561', '9011103', '50436', '03', 'Tue(5-7)', '5466'),
(77, '172839', '1/2560', '9011103', '50436', '03', 'Tue(1-4)', '1234'),
(79, '12346', '1/2561', '5674901', '50436', '03', 'Wed(1-4)', '39402'),
(80, '12346', '1/2561', '5673605', '50436', '03', 'Mon(6-9)', '39401'),
(81, '172839', '1/2561', '9011103', '50436', '03', 'Wed(8-9)', '39402'),
(84, '12346', '1/2561', '9011103', '30144', '03', 'Wed(1-4)', '39402'),
(89, '25124', '2/2561', '5673101', '50436', '03', 'Fri(1-2)', '39401'),
(90, '12345', '1/2561', '5673604', '30141', '03', 'Fri(1-4)', '39401'),
(91, '12345', '1/2561', '5673501', '50436', '01', 'Sun(3-9)', '39520');

-- --------------------------------------------------------

--
-- Table structure for table `day_tb`
--

CREATE TABLE `day_tb` (
  `day` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Day_Num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `day_tb`
--

INSERT INTO `day_tb` (`day`, `Day_Num`) VALUES
('Mon', 1),
('Tue', 2),
('Wed', 3),
('Thu', 4),
('Fri', 5),
('Sat', 6),
('Sun', 7);

-- --------------------------------------------------------

--
-- Table structure for table `edit_grade`
--

CREATE TABLE `edit_grade` (
  `ID` int(11) NOT NULL,
  `A` int(11) NOT NULL,
  `B+` int(11) NOT NULL,
  `B` int(11) NOT NULL,
  `C+` int(11) NOT NULL,
  `C` int(11) NOT NULL,
  `D+` int(11) NOT NULL,
  `D` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `edit_grade`
--

INSERT INTO `edit_grade` (`ID`, `A`, `B+`, `B`, `C+`, `C`, `D+`, `D`) VALUES
(1, 80, 75, 70, 65, 60, 55, 50);

-- --------------------------------------------------------

--
-- Table structure for table `grade_tb`
--

CREATE TABLE `grade_tb` (
  `Grad_id` int(16) NOT NULL,
  `Grad_Term` text COLLATE utf8_unicode_ci NOT NULL,
  `Std_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_code` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `GPA` text COLLATE utf8_unicode_ci NOT NULL,
  `P1` int(11) NOT NULL,
  `P2` int(11) NOT NULL,
  `Mid` int(11) NOT NULL,
  `Final` int(11) NOT NULL,
  `grade_font` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grade_tb`
--

INSERT INTO `grade_tb` (`Grad_id`, `Grad_Term`, `Std_code`, `Sub_code`, `GPA`, `P1`, `P2`, `Mid`, `Final`, `grade_font`) VALUES
(5, '2/2561', '60122660128', '5673101', '0', 0, 0, 0, 0, 'F'),
(7, '1/2561', '60122660134', '9011103', '40', 10, 10, 10, 10, 'F'),
(8, '1/2561', '60122660140', '9011103', '75', 0, 0, 0, 0, 'B+'),
(9, '2/2561', '60122660140', '5673101', '34', 0, 0, 0, 0, 'F'),
(12, '1/2561', '60122660118', '9011103', '40', 10, 10, 10, 10, 'F'),
(13, '1/2561', '60122660100', '9011103', '40', 10, 10, 10, 10, 'F'),
(14, '1/2561', '60122660118', '5674901', '100', 0, 0, 0, 0, 'A'),
(15, '1/2560', '60122660100', '9011103', '30', 10, 10, 10, 0, 'F'),
(21, '2/2563', '60122660122', '5672202', '50', 0, 0, 0, 0, 'D'),
(22, '2/2563', '60122660134', '5672202', '48', 0, 0, 0, 0, 'F'),
(23, '1/2561', '60122660134', '5673604', '79', 0, 0, 0, 0, 'B+'),
(24, '1/2561', '60122660134', '5673501', '68', 0, 0, 0, 0, 'C+'),
(25, '1/2561', '60122660122', '9011103', '40', 10, 10, 10, 10, 'F'),
(26, '1/2561', '', '9011103', '31', 0, 0, 0, 0, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `member_tb`
--

CREATE TABLE `member_tb` (
  `Mem_id` int(16) NOT NULL,
  `Mem_user` text COLLATE utf8_unicode_ci NOT NULL,
  `Mem_pass` text COLLATE utf8_unicode_ci NOT NULL,
  `Type_id` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '2',
  `Email` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member_tb`
--

INSERT INTO `member_tb` (`Mem_id`, `Mem_user`, `Mem_pass`, `Type_id`, `Email`) VALUES
(1, '50436', 'aabbb089797c29a13e87e017a37fc972', '3', 'namo@gmail.com'),
(2, 'admin', 'admin', '1', 'test@gmail.com'),
(3, '50436', 'aabbb089797c29a13e87e017a37fc972', '2', 'namo@gmail.com'),
(4, '60122660140', '25121990', '3', 'gg@gmail.com'),
(5, '30144', '170919', '2', 'chai@gmail.com'),
(6, '60122660128', '0620323036tae', '2', 'drnarathip@gmail.com'),
(7, '60122660122', '123456789', '2', 'kd@hotmail.com'),
(8, '30141', '170919', '2', 'JJ@gmail.com'),
(9, '60122660120', '251290', '2', 'joker@gmail.com'),
(11, '15648', '120300', '2', 'yada3@gmail.com'),
(14, '51423', '999999', '2', 'yada99@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `register_tb`
--

CREATE TABLE `register_tb` (
  `Reg_id` int(11) NOT NULL,
  `Std_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Cos_code` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `register_tb`
--

INSERT INTO `register_tb` (`Reg_id`, `Std_code`, `Cos_code`) VALUES
(1, '60122660134', '12345'),
(2, '60122660118', '12346'),
(3, '60122660100', '172839'),
(4, '', '12345'),
(5, '60122660140', '25124'),
(6, '60122660128', '25124'),
(7, '60122660122', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `sect_tb`
--

CREATE TABLE `sect_tb` (
  `Sect_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Sect_Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sect_tb`
--

INSERT INTO `sect_tb` (`Sect_code`, `Sect_Name`) VALUES
('01', 'เอกบังคับ'),
('02', 'วิชาเลือก'),
('03', 'เลือกเสรี');

-- --------------------------------------------------------

--
-- Table structure for table `student_tb`
--

CREATE TABLE `student_tb` (
  `Std_id` int(16) NOT NULL,
  `Std_Code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Std_Pname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Std_Fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Std_Lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Std_Tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Std_Add` text COLLATE utf8_unicode_ci NOT NULL,
  `Std_Birth` date NOT NULL,
  `Std_Card` text COLLATE utf8_unicode_ci NOT NULL,
  `Std_Major` text COLLATE utf8_unicode_ci NOT NULL,
  `Std_Faculty` text COLLATE utf8_unicode_ci NOT NULL,
  `Std_Image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_tb`
--

INSERT INTO `student_tb` (`Std_id`, `Std_Code`, `Std_Pname`, `Std_Fname`, `Std_Lname`, `Std_Tel`, `Std_Add`, `Std_Birth`, `Std_Card`, `Std_Major`, `Std_Faculty`, `Std_Image`) VALUES
(1, '60122660118', 'Mr.', 'Kuy', 'Puat', '0652556595', 'USA', '2019-09-19', '1529900975465', 'SE', 'SE', ''),
(2, '60122660114', 'Mrs.', 'Worawit', 'Luffy', '0659897895', 'LA, USA', '1998-12-25', '152990098755', 'Science', 'Physics', ''),
(3, '60122660100', 'Mr.', 'Van', 'Helsing', '0620323035', 'Netherland', '1997-09-01', '1529900975111', 'IE', 'SE', ''),
(4, '60122660140', 'Mr.', 'Naruto', 'Uzumaki', '0620323038', 'Japan', '1990-12-25', '1529900975889', 'SE', 'IE', ''),
(5, '60122660128', 'ดร.', 'นราทิพย์', 'สุขสมบูรณ์', '0625986589', 'ลำพูน', '1997-09-22', '1529900985236', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุสาหกรรม', ''),
(6, '60122660122', 'นาย', 'เค', 'ด่วย', '0620323039', 'LA', '1998-01-25', '1562233698756', 'SE', 'IE', ''),
(7, '60122660120', 'นาย', 'ดอก', 'ทอง', '0620323036', 'lp', '1990-12-25', '1529900975032', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุสาหกรรม', ''),
(9, '60122660128', 'นาย', 'ณัฐวัชต์', 'โชติธนนันทพงศ์', '0620323036', 'lp', '2099-09-09', '1529900985236', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุสาหกรรม', ''),
(130, '60122660134', 'mr', 'asd', 'asd', 'asd', 'asd', '0000-00-00', 'asd', 'asd', 'asd', ''),
(131, '', '', '', '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tb`
--

CREATE TABLE `subject_tb` (
  `Sub_id` int(16) NOT NULL,
  `Sub_code` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Sub_Credit` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject_tb`
--

INSERT INTO `subject_tb` (`Sub_id`, `Sub_code`, `Sub_Name`, `Sub_Credit`) VALUES
(1, '9011103', 'ภาษาอังกฤษเพื่อทักษะการเรียน', '3'),
(2, '9011202', 'สุนทรียภาพของชีวิต', '3'),
(3, '9011403', 'เทคโนโลยีสารสนเทศเพื่อการเรียนรู้', '3'),
(4, '9011204', 'ทักษะการรู้สารสนเทศ', '3'),
(5, '5672202', 'การเขียนโปรแกรมเชิงวัตถุ', '3'),
(6, '5672101', 'คณิตศาสตร์ดิสครีตสำหรับวิศวกรรมซอฟต์แวร์', '3'),
(7, '5671101', 'สถิติสำหรับวิศวกรรมซอฟต์แวร์', '3'),
(8, '5671201', 'การออกแบบและการวิเคราะห์ขั้นตอนวิธี', '3'),
(9, '5671202', 'ระบบฐานข้อมูลสำหรับการพัฒนาซอฟต์แวร์', '3'),
(10, '5671701', 'โครงสร้างคอมพิวเตอร์', '3'),
(11, '5672601', 'วิศวกรรมซอฟต์แวร์เบื้องต้น', '3'),
(12, '5672501', 'การพัฒนาเว็บเซอร์วิสสำหรับธุรกิจอิเล็กทรอนิกส์', '3'),
(13, '5672301', 'การโปรแกรมบนระบบข้อมูลเป็นศูนย์กลาง', '3'),
(14, '5672304', 'การพัฒนาเว็บด้วยเทคโนโลยีสมัยใหม่', '3'),
(15, '5673301', 'การพัฒนาโปรแกรมประยุกต์สำหรับอุปกรณ์เคลื่อนที่', '3'),
(16, '5673601', 'การกำหนดความต้องการและการจัดการซอฟต์แวร์', '3'),
(17, '5672602', 'สถาปัตยกรรมซอฟต์แวร์', '3'),
(18, '5673101', 'พีชคณิตเชิงเส้นสำหรับวิศวกรรมซอฟต์แวร์', '3'),
(19, '5673602', 'การประกันคุณภาพในกระบวนการพัฒนาซอฟต์แวร์', '3'),
(20, '5673603', 'การสร้างและการวิวัฒน์ซอฟต์แวร์', '3'),
(21, '5673501', 'การบริหารซอฟต์แวร์ขนาดใหญ่ในองค์กร', '3'),
(22, '5673604', 'การจัดการโครงแบบซอฟต์แวร์', '3'),
(23, '5673605', 'การทวนสอบและการทดสอบซอฟต์แวร์', '3'),
(24, '5673606', 'การจัดการโครงการซอฟต์แวร์', '3'),
(25, '5674501', 'การพัฒนาซอฟต์แวร์เป็นทีม', '3'),
(26, '5674801', 'การเตรียมฝึกประสบการณ์วิชาชีพด้านวิศวกรรมซอฟต์แวร์', '3'),
(27, '5674901', 'สัมนาวิศวกรรมซอฟต์แวร์', '3'),
(28, '5674902', 'โครงงานนวิศวกรรมซอฟต์แวร์', '3'),
(29, '5674501', 'การพัฒนาเซอฟต์แวร์เป็นทีม', '3'),
(30, '5674891', 'การเตรียมสหกิจศึกษาด้านวิศวกรรมซอฟต์แวร์', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tb`
--

CREATE TABLE `teacher_tb` (
  `Teach_id` int(16) NOT NULL,
  `Teach_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Teach_Pname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Teach_Fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Teach_Lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Teach_Birth` date NOT NULL,
  `Teach_Add` text COLLATE utf8_unicode_ci NOT NULL,
  `Teach_Tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Teach_Card` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `Teach _Major` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Teach _Faculty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Teach _Image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher_tb`
--

INSERT INTO `teacher_tb` (`Teach_id`, `Teach_code`, `Teach_Pname`, `Teach_Fname`, `Teach_Lname`, `Teach_Birth`, `Teach_Add`, `Teach_Tel`, `Teach_Card`, `Teach _Major`, `Teach _Faculty`, `Teach _Image`) VALUES
(1, '50436', 'นางสาว', 'กนกกัญญา5', 'รวมไมตรี', '2019-09-17', 'test', '1234567890', '1234567891234', 'คณะเทคโนโลยีอุตสาหกรรม', 'คณะเทคโนโลยีอุตสาหกรรม', ''),
(2, '30141', 'นางสาว', 'กรรณิกา', 'พิมสิงห์รี', '2019-09-17', 'test', '1234567890', '1234567891234', 'คณะเทคโนโลยีอุตสาหกรรม', 'คณะเทคโนโลยีอุตสาหกรรม', ''),
(3, '30144', 'นางสาว', 'กฤษดา', 'ชัยเรือง', '2019-09-17', 'test', '1234567890', '1234567891234', 'นักวิชาการโสตทัศนศึกษา', 'คณะเทคโนโลยีอุตสาหกรรม', ''),
(4, '50143', 'Dr', 'GG', 'GG', '0000-00-00', 'fr', '0896549874', '1234567890123', 'SE', 'IE', ''),
(5, '50142', 'we', 'ณัฐวัชต์', 'โชติธนนันทพงศ์', '2005-05-05', 'lp', '0625986589', '1529900975032', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุสาหกรรม', ''),
(6, '50142', 'de', 'ณัฐวัชต์', 'โชติธนนันทพงศ์', '2005-05-01', 'lp', '0625986589', '1529900985236', 'วิศวกรรมซอฟต์แวร์', 'เทคโนโลยีอุสาหกรรม', ''),
(15, '11111', '11', '11', '11', '0000-00-00', '', '', '', '', '', ''),
(16, '11111', '111', '111', '111', '0000-00-00', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_login`
--
ALTER TABLE `check_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tb`
--
ALTER TABLE `course_tb`
  ADD PRIMARY KEY (`Cos_id`);

--
-- Indexes for table `edit_grade`
--
ALTER TABLE `edit_grade`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `grade_tb`
--
ALTER TABLE `grade_tb`
  ADD PRIMARY KEY (`Grad_id`);

--
-- Indexes for table `member_tb`
--
ALTER TABLE `member_tb`
  ADD PRIMARY KEY (`Mem_id`);

--
-- Indexes for table `register_tb`
--
ALTER TABLE `register_tb`
  ADD PRIMARY KEY (`Reg_id`);

--
-- Indexes for table `sect_tb`
--
ALTER TABLE `sect_tb`
  ADD PRIMARY KEY (`Sect_code`);

--
-- Indexes for table `student_tb`
--
ALTER TABLE `student_tb`
  ADD PRIMARY KEY (`Std_id`);

--
-- Indexes for table `subject_tb`
--
ALTER TABLE `subject_tb`
  ADD PRIMARY KEY (`Sub_id`);

--
-- Indexes for table `teacher_tb`
--
ALTER TABLE `teacher_tb`
  ADD PRIMARY KEY (`Teach_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_login`
--
ALTER TABLE `check_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `course_tb`
--
ALTER TABLE `course_tb`
  MODIFY `Cos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `edit_grade`
--
ALTER TABLE `edit_grade`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grade_tb`
--
ALTER TABLE `grade_tb`
  MODIFY `Grad_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `member_tb`
--
ALTER TABLE `member_tb`
  MODIFY `Mem_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `register_tb`
--
ALTER TABLE `register_tb`
  MODIFY `Reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_tb`
--
ALTER TABLE `student_tb`
  MODIFY `Std_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `subject_tb`
--
ALTER TABLE `subject_tb`
  MODIFY `Sub_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `teacher_tb`
--
ALTER TABLE `teacher_tb`
  MODIFY `Teach_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
