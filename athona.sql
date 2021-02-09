-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 06:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `athona`
--
DROP DATABASE IF EXISTS athona;
CREATE DATABASE IF NOT EXISTS athona;

USE athona;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `idcourse` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `building` varchar(45) NOT NULL,
  `classtime` varchar(10) NOT NULL,
  `idteacher` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `book` varchar(500) NOT NULL,
  `size` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`idcourse`, `name`, `building`, `classtime`, `idteacher`, `description`, `book`, `size`) VALUES
('ACCT2101', 'Principles of Accounting', 'Terry', '8:00 am', 711101, 'Basic accounting systems, concepts, and principles', ' Financial Accounting, Information for Decisions, 9thth edition, by John J. Wild', 50),
('ACCT5400', 'Taxation', 'Terry', '11:00 am', 711101, 'A basic federal income tax course covering concepts of taxation applicable to all taxable entities but primarily relating to individuals', 'Taxation of Individuals, 2021 Edition with Connect Plus, Spilker, Ayers, Barrick, Outslay, Robinson, Weaver, and Worsham', 20),
('ARTS2000', 'Art Appreciation', 'Lamar', '8:00 am', 711107, 'Understanding painting, sculpture, architecture, and design to enhance aesthetic appreciation', 'Artforms by Patrick Frank, 10th Edition', 25),
('ARTS2050', 'Cult Div Am Art', 'Lamar', '1:00 pm', 711107, 'Past and present art created by African Americans, Asian Americans, Hispanic Americans and Native Americans', 'Fresh talk daring gazes: Conversations on Asian American art, Kim Machida', 30),
('ARTS2100', 'Strategic Visual Thinking', 'Lamar', '11:00 am', 711107, 'Data collection, interpretation, and presentation techniques using visual design tools to facilitate and influence decision- making in diverse aspects of daily life', 'Tufte, E. R. (1990). Envisioning information. Cheshire, CT: Graphics Press', 50),
('CHEM1210', 'Basics of Chemistry', 'Aderhold', '8:00 am', 711108, 'A broad and general examination of chemical principles involving matter, chemical and physical properties, stoichiometry, structure, bonding, and reactivity', 'Introductory Chemistry, 6th Edition, by Nivaldo J. Tro', 15),
('CSCI4050', 'Soft Engineering', 'Boyd', '4:45 pm', 711102, 'Full cycle of a software system development effort, including requirements definition, system analysis, design, implementation, and testing. Special emphasis is placed on system analysis and design', 'W. Stallings, Cryptography and Network Security: Principles and Practice, 7th Edition, 2017', 25),
('CSCI4250', 'Cyber Security', 'Boyd', '11:00 am', 711103, 'Basic concepts of computer security and the theory and current practices of authentication, authorization, and privacy mechanisms in modern operating systems and networks', 'Hacking: The Art of Exploitation, 2nd Edition by Jon Erickson', 20),
('CSCI4300', 'Web Programming', 'Boyd', '1:00 pm', 711102, 'Client-side and server-side techniques for use on the World Wide Web', 'Murach’s Java Servlets and JSPs, 2nd edition', 45),
('CSCI4370', 'Database Management', 'Boyd', '2:45 pm', 711102, 'The theory and practice of database management', 'Database Systems: An Application-Oriented Approach, Complete Version, 2/E, Kifer, Bernstein and Lewis, 2006.', 40),
('CSCI4380', 'Data Mining', 'Boyd', '2:45 pm', 711103, 'Description:  A broad introduction to data mining methods and an exploration of research problems in data mining and its applications in complex real-world domains', 'Everybody Lies: Big Data, New Data, and What the Internet Can Tell Us About Who We Really Are', 15),
('ECON2100', 'Economics Environ Quality', 'Terry', '11:00 am', 711104, 'The economic analysis of environmental issues, with discussions of current environmental quality problems, their underlying causes, and command vs. market-based solutions', 'Callan and Thomas, Environmental Economics and Management: Theory, Policy, and Applications, 6th edition', 30),
('ECON2200', 'Economic Development of U.S.', 'Terry', '2:45 am', 711104, 'The United States growth and transformation into an industrialized nation, exploring the contributions of diverse cultural groups', 'Mindful Economics: How the U.S. Economy Works, Why it Matters, and How it Could Be Different', 35),
('ECON4100', 'Monetary Economics', 'Terry', '4:00 pm', 711104, 'Money and financial markets, emphasizing the evolution and economic rationale of money and financial institutions, determinants of the price level and interest rates, alternative monetary policies, and international monetary relations', 'Money, Banking and the Financial System by Hubbard and O’Brien', 40),
('PBIO1210', 'Principles of Plant Biology', 'Miller', '2:45 pm', 711106, 'Principles of biology, with an emphasis on plants and the importance of science in daily life', 'Plant Biology, Graham & Wilcox 2nd ed', 50),
('PBIO3010', 'Fungi Friends and Foes', 'Miller', '10:00 am', 711106, 'Impact of fungi on human affairs', 'The Book of Fungi: A Life-Size Guide to Six Hundred Species from around the World', 100),
('PBIO3270', 'Flowers', 'Miller', '8:00 am', 711106, 'Biological concepts that are pertinent to the ecology and evolution of plants, focusing on the most attractive reproductive structure of plants-flowers', 'Flowers: The Complete Book of Floral Design', 25),
('SPAN1001', 'Elementary Spanish I', 'Park', '2:45 pm', 711105, 'Introduction to Spanish-speaking cultures. Given in Spanish', 'Mosaicos, Fifth edition', 2),
('SPAN1002', 'Elementary Spanish II', 'Park', '4:00 pm', 711105, 'A continuation of Elementary Spanish. Emphasis on conversational Spanish', 'Mosaicos, Fifth edition', 15),
('SPAN2001', 'Itermediate Spanish I', 'Park', '1:00 pm', 711105, 'Content-based review of Spanish grammar and systematic vocabulary and skill development. Integration of language, culture, and literature', 'MÁS. 3rd edition. Perez-Girones, Adan-Linfante. New York: McGraw-Hill, 2019', 15);

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `idstudent` int(11) NOT NULL,
  `idcourse` varchar(20) NOT NULL,
  `idenroll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`idstudent`, `idcourse`, `idenroll`) VALUES
(811101, 'ACCT2101', 1),
(811101, 'ARTS2050', 2),
(811101, 'SPAN1002', 3),
(811102, 'ARTS2000', 4),
(811102, 'ACCT5400', 5),
(811102, 'PBIO1210', 6),
(811102, 'ECON4100', 7),
(811103, 'CHEM1210', 8),
(811103, 'PBIO3010', 9),
(811103, 'ECON2200', 10),
(811103, 'SPAN1002', 11),
(811104, 'CHEM1210', 12),
(811104, 'ARTS2100', 13),
(811104, 'SPAN2001', 14),
(811104, 'ECON4100', 15),
(811105, 'ACCT2101', 16),
(811105, 'ECON2100', 17),
(811106, 'PBIO3270', 18),
(811106, 'CSCI4250', 19),
(811106, 'CSCI4300', 20),
(811106, 'CSCI4370', 21),
(811106, 'CSCI4050', 22),
(811107, 'PBIO3010', 23),
(811107, 'SPAN2001', 24),
(811107, 'CSCI4050', 25),
(811109, 'CSCI4250', 26),
(811109, 'CSCI4050', 27),
(811110, 'CHEM1210', 28),
(811110, 'SPAN1001', 29),
(811110, 'CSCI4050', 30),
(811102, 'SPAN1001', 31),
(811111, 'CHEM1210', 32),
(811111, 'SPAN2001', 33),
(811111, 'ARTS2000', 34),
(811111, 'ACCT2101', 35),
(811112, 'ECON2200', 36),
(811112, 'ECON4100', 37),
(811112, 'ARTS2000', 38),
(811113, 'CHEM1210', 39),
(811113, 'PBIO1210', 40),
(811113, 'SPAN1002', 41),
(811113, 'PBIO3270', 42),
(811114, 'SPAN2001', 43),
(811114, 'ARTS2000', 44),
(811114, 'ACCT2101', 45),
(811114, 'ECON2100', 46),
(811115, 'SPAN2001', 47),
(811115, 'ARTS2000', 48),
(811115, 'ACCT2101', 49),
(811116, 'ECON2200', 50),
(811116, 'ARTS2000', 51),
(811116, 'ACCT2101', 52),
(811117, 'SPAN1002', 53),
(811117, 'ARTS2000', 54),
(811117, 'ACCT2101', 55),
(811117, 'ECON2100', 56),
(811118, 'PBIO1210', 57),
(811118, 'SPAN2001', 58),
(811118, 'ARTS2000', 59),
(811119, 'CHEM1210', 60),
(811119, 'PBIO1210', 61),
(811119, 'PBIO3270', 62),
(811120, 'SPAN1002', 63),
(811120, 'ECON2200', 64),
(811120, 'ECON4100', 65),
(811120, 'ARTS2000', 66);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `type`) VALUES
('admin', 'admin1', 'admin'),
('dryan', 'dianne7', 'teacher'),
('dthompson', 'don4', 'teacher'),
('efernandez', 'elena5', 'teacher'),
('equintana', 'emile2', 'student'),
('eshaw', 'eliana3', 'student'),
('fmcgrath', 'finlay81', 'student'),
('hherman', 'huw6', 'student'),
('lsuarez', 'luther9', 'student'),
('mchase', 'mark6', 'teacher'),
('mmercer', 'magdalena7', 'student'),
('nbarker', 'nathan10', 'student'),
('nkearns', 'nadir5', 'student'),
('prees', 'poppy4', 'student'),
('psmith', 'patrick2', 'teacher'),
('rtebbs', 'riley8', 'teacher'),
('sbrown', 'sarah3', 'teacher'),
('tcole', 'tyler1', 'teacher'),
('thayden', 'talia1', 'student'),
('kjoseph', 'katelyn11', 'student'),
('bjamison', 'billi12', 'student'),
('sthomas', 'satya13', 'student'),
('jjella', 'john14', 'student'),
('hjackson', 'harry15', 'student'),
('jjoeseph', 'joe16', 'student'),
('dhall', 'david17', 'student'),
('jkilgore', 'janice18', 'student'),
('rkoehl', 'rebecca19', 'student'),
('eevans', 'esco20', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `idstudent` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `major` varchar(30) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idstudent`, `name`, `major`, `username`, `password`) VALUES
(811101, 'Talia Hayden', 'Business', 'thayden', 'talia1'),
(811102, 'Emile Quintana', 'Business', 'equintana', 'emile2'),
(811103, 'Eliana Shaw', 'Business', 'eshaw', 'eliana3'),
(811104, 'Poppy Rees', 'Business', 'prees', 'poppy4'),
(811105, 'Nadir Kearns', 'Business', 'nkearns', 'nadir5'),
(811106, 'Huw Herman', 'Computer Science', 'hherman', 'huw6'),
(811107, 'Magdalena Mercer', 'Computer Science', 'mmercer', 'magdalena7'),
(811108, 'Finlay Mcgrath', 'Computer Science', 'fmcgrath', 'finlay81'),
(811109, 'Luther Suarez', 'Computer Science', 'lsuarez', 'luther9'),
(811110, 'Nathan Barker', 'Computer Science', 'nbarker', 'nathan10'),
(811111, 'Katelyn Joseph', 'Chemistry', 'kjoseph', 'katelyn11'),
(811112, 'Billi Jamison', 'Finance', 'bjamison', 'billi12'),
(811113, 'Satya Thomas', 'Biology', 'sthomas', 'satya13'),
(811114, 'John Jella', 'Spanish', 'jjella', 'john14'),
(811115, 'Harry Jackson', 'Psychology', 'hjackson', 'harry15'),
(811116, 'Joe Joeseph', 'Psychology', 'jjoeseph', 'joe16'),
(811117, 'David Hall', 'Psychology', 'dhall', 'david17'),
(811118, 'Janice Kilgore', 'Spanish', 'jkilgore', 'janice18'),
(811119, 'Rebecca Koehl', 'Biology', 'rkoehl', 'rebecca19'),
(811120, 'Esco Evans', 'Finance', 'eevans', 'esco20');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `idteacher` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`idteacher`, `name`, `username`, `password`) VALUES
(711101, 'Tyler Cole', 'tcole', 'tyler1'),
(711102, 'Patrick Smith', 'psmith', 'patrick2'),
(711103, 'Sarah Brown', 'sbrown', 'sarah3'),
(711104, 'Don Thompson', 'dthompson', 'don4'),
(711105, 'Elena Fernandez', 'efernandez', 'elena5'),
(711106, 'Mark Chase', 'mchase', 'mark6'),
(711107, 'Dianne Ryan', 'dryan', 'dianne7'),
(711108, 'Riley Tebbs', 'rtebbs', 'riley8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`idcourse`),
  ADD KEY `idteacher` (`idteacher`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD PRIMARY KEY (`idenroll`),
  ADD KEY `idstudent` (`idstudent`),
  ADD KEY `idcourse` (`idcourse`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`,`password`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`idstudent`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`),
  ADD KEY `username_2` (`username`,`password`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`idteacher`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`),
  ADD KEY `username_2` (`username`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enrolled`
--
ALTER TABLE `enrolled`
  MODIFY `idenroll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `idstudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=811111;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `idteacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=711109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`idcourse`) REFERENCES `course` (`idcourse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_ibfk_2` FOREIGN KEY (`idstudent`) REFERENCES `student` (`idstudent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`username`,`password`) REFERENCES `login` (`username`, `password`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`username`,`password`) REFERENCES `login` (`username`, `password`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;