-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2021 at 11:35 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mom_house_barber`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `A_Name` varchar(30) NOT NULL,
  `A_Lname` varchar(30) NOT NULL,
  `A_Nickname` varchar(20) NOT NULL,
  `A_Phone` varchar(10) NOT NULL,
  `A_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barber`
--

CREATE TABLE `barber` (
  `B_ID` varchar(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `B_Name` varchar(50) NOT NULL,
  `B_Lname` varchar(50) NOT NULL,
  `B_Nickname` varchar(20) NOT NULL,
  `B_Sex` varchar(4) NOT NULL,
  `B_Phone` varchar(10) NOT NULL,
  `B_Address` varchar(100) NOT NULL,
  `B_Skill1` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `B_Skill2` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `B_Skill3` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `B_Skill_Score1` varchar(3) NOT NULL,
  `B_Skill_Score2` varchar(3) NOT NULL,
  `B_Skill_Score3` varchar(3) NOT NULL,
  `B_Percent` int(11) NOT NULL,
  `B_Salary` int(11) NOT NULL,
  `B_Total` int(11) NOT NULL,
  `B_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barber`
--

INSERT INTO `barber` (`B_ID`, `Username`, `B_Name`, `B_Lname`, `B_Nickname`, `B_Sex`, `B_Phone`, `B_Address`, `B_Skill1`, `B_Skill2`, `B_Skill3`, `B_Skill_Score1`, `B_Skill_Score2`, `B_Skill_Score3`, `B_Percent`, `B_Salary`, `B_Total`, `B_Img`) VALUES
('B00001', 'BarberEarth', 'วรวัฒน์', 'รัตโนสถ', 'เอิร์ธ', 'ชาย', '0632253632', '12 ม.7 ต.บางตาเคียน อ.สองพี่น้อง จ.สุพรรณบุรี 72110', 'ตัดซอย', 'ตัดมือ', 'แต่งลาย', '80', '85', '50', 0, 0, 0, 'earth.jpg'),
('B00002', 'pichaiyut', 'พิชญุตย์', 'อินทารัตน์', 'ริว', 'ชาย', '0640848827', '91 ม.2 ต.ด่านช้าง อ.เมือง จ.ระนอง 72110', 'ตัดซอย', 'ตัดมือ', 'แต่งลาย', '65', '75', '50', 0, 0, 0, 'Rew.jpg'),
('B00003', 'Barber', 'ธนายุทธ', 'สามสังข์', 'โนช', 'ชาย', '0651111122', '88/1 ม.12 ต.บางตาเถร อ.สองพี่น้อง จ.สุพรรณบุรี 72110', 'ตัดซอย', 'ตัดมือ', 'แต่งลาย', '65', '70', '95', 100, 100, 100, 'me.jpg'),
('B00004', 'BarberCaramel', 'สุรภา', 'วรขัตร', 'คาราเมล', 'หญิง', '0623911657', '88/1 ม.12 ต.บางตาเถร อ.สองพี่น้อง จ.สุพรรณบุรี 72110', 'ตัดซอย', 'ตัดมือ', 'แต่งลาย', '95', '90', '55', 0, 0, 0, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BK_ID` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `C_ID` varchar(6) NOT NULL,
  `B_ID` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `BK_Day` int(11) NOT NULL,
  `ST_ID` int(11) NOT NULL,
  `BK_Month` int(11) NOT NULL,
  `BK_Year` int(11) NOT NULL,
  `BK_Date` varchar(10) NOT NULL,
  `Q_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BK_ID`, `C_ID`, `B_ID`, `BK_Day`, `ST_ID`, `BK_Month`, `BK_Year`, `BK_Date`, `Q_ID`) VALUES
('BK000001', 'C00005', 'B00003', 1, 1, 8, 2021, '2021-08-01', 1),
('BK000002', 'C00005', 'B00003', 1, 2, 8, 2021, '2021-08-01', 1),
('BK000003', 'C00005', 'B00003', 1, 3, 8, 2021, '2021-08-01', 1),
('BK000004', 'C00005', 'B00003', 1, 4, 8, 2021, '2021-08-01', 1),
('BK000005', 'C00005', 'B00003', 1, 5, 8, 2021, '2021-08-01', 1),
('BK000006', 'C00005', 'B00003', 1, 6, 8, 2021, '2021-08-01', 1),
('BK000007', 'C00005', 'B00003', 1, 7, 8, 2021, '2021-08-01', 1),
('BK000008', 'C00005', 'B00003', 1, 8, 8, 2021, '2021-08-01', 1),
('BK000009', 'C00005', 'B00003', 1, 9, 8, 2021, '2021-08-01', 1),
('BK000010', 'C00005', 'B00003', 1, 10, 8, 2021, '2021-08-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` varchar(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `C_Name` varchar(50) NOT NULL,
  `C_Lname` varchar(50) NOT NULL,
  `C_Nickname` varchar(20) NOT NULL,
  `C_Sex` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `C_Phone` varchar(10) NOT NULL,
  `C_Facebook` varchar(50) NOT NULL,
  `C_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `Username`, `C_Name`, `C_Lname`, `C_Nickname`, `C_Sex`, `C_Phone`, `C_Facebook`, `C_Img`) VALUES
('', 'weekends053', 'วรวุฒน์', 'บุญศรี', 'บิว', 'ชาย', '0659987456', 'สะบิว', 'zbew.jpg'),
('C00002', 'thanayut', 'ธนายุทธ', 'สามสังข์', 'ยุทธ', 'ชาย', '0871630903', 'Thanayut Samsang', 'me.jpg'),
('C00003', 'earth1', 'วรวัฒน์', 'รัตนโนสถ', 'เอิร์ท', 'ชาย', '0871630903', 'Worrawat Rattanosod', 'earth.jpg'),
('C00004', 'youknowme', 'ยุทธนา', 'สามสังข์', 'ยุทธ', 'ชาย', '0651134910', 'Yutthana Samsang', 'baberNoch.jpg'),
('C00005', 'TheNoch', 'ธนทัช', 'สอนดี', 'บาส', 'ชาย', '0651134900', 'Bas Thanathat', 'baberNoch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hair_style`
--

CREATE TABLE `hair_style` (
  `H_ID` varchar(5) NOT NULL,
  `H_Name` varchar(50) NOT NULL,
  `H_Detail1` varchar(255) DEFAULT NULL,
  `H_Detail2` varchar(255) NOT NULL,
  `H_Detail3` varchar(255) NOT NULL,
  `H_Img1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `H_Img2` varchar(255) NOT NULL,
  `H_Img3` varchar(255) NOT NULL,
  `H_Img4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hair_style`
--

INSERT INTO `hair_style` (`H_ID`, `H_Name`, `H_Detail1`, `H_Detail2`, `H_Detail3`, `H_Img1`, `H_Img2`, `H_Img3`, `H_Img4`) VALUES
('', 'ผมทรงทวิสต์เอาท์ Twist-out', 'ทรงผมสุดคูล สำหรับชาวฮิปฮอป', 'สาวกฮิปฮอปต้องคุ้นตากับผมทรงนี้แน่นอน สำหรับทรงผมชายทรงทวิสต์เอาท์ Twist-out ที่บอกเลยว่าสุดคูล!ทรงนี้จะไว้ผมที่ความยาวระดับปานกลาง', 'โดยจะหยิบเอาผมช่อเล็กมาบิดหรือปั่นเป็นเกลียว คล้ายกับเดรดร็อกแต่จะไม่แน่นและมีขนาดสั้นกว่า นอกจากนี้แล้ว ยังเพิ่มลูกเล่นด้วยการไถไล่เฟดด้านข้าง', 'HairStyle1_1.jpg', 'HairStyle1_2.jpg', 'HairStyle1_3.jpg', 'HairStyle1_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `history_queue`
--

CREATE TABLE `history_queue` (
  `HTR_ID` int(11) NOT NULL,
  `BK_ID` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `C_ID` varchar(6) NOT NULL,
  `B_ID` varchar(6) NOT NULL,
  `BK_Date` varchar(10) NOT NULL,
  `ST_ID` int(11) NOT NULL,
  `Q_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `S_ID` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`, `S_ID`) VALUES
('Barber', '111111', '2'),
('BarberCaramel', '444444', '2'),
('BarberEarth', '123456', '2'),
('earth1', '111111', '3'),
('pichaiyut', '123456', '2'),
('thanayut', '111111', '3'),
('TheNoch', '111111', '3'),
('weekends053', '123456', '1'),
('youknowme', '123456', '3');

-- --------------------------------------------------------

--
-- Table structure for table `offwork`
--

CREATE TABLE `offwork` (
  `OW_ID` varchar(6) NOT NULL,
  `B_ID` varchar(6) NOT NULL,
  `starting_Date` date NOT NULL,
  `ending_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `B_ID` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Detail` varchar(50) NOT NULL,
  `PFLO_Img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slot_time`
--

CREATE TABLE `slot_time` (
  `ST_ID` int(11) NOT NULL,
  `ST_Time` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slot_time`
--

INSERT INTO `slot_time` (`ST_ID`, `ST_Time`) VALUES
(1, '10:00'),
(2, '11:00'),
(3, '12:00'),
(4, '13:00'),
(5, '14:00'),
(6, '15:30'),
(7, '16:30'),
(8, '17:30'),
(9, '18:30'),
(10, '19:30');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `S_ID` varchar(1) NOT NULL,
  `S_Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`S_ID`, `S_Name`) VALUES
('1', 'ADMIN'),
('2', 'BARBER'),
('3', 'CUSTOMER');

-- --------------------------------------------------------

--
-- Table structure for table `status_queue`
--

CREATE TABLE `status_queue` (
  `Q_ID` int(11) NOT NULL,
  `Q_Status` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `status_queue`
--

INSERT INTO `status_queue` (`Q_ID`, `Q_Status`) VALUES
(1, 'กำลังรอ...'),
(2, 'ชำระเงินแล้ว');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `barber`
--
ALTER TABLE `barber`
  ADD PRIMARY KEY (`B_ID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BK_ID`),
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `B_ID` (`B_ID`),
  ADD KEY `ST_ID` (`ST_ID`),
  ADD KEY `Q_ID` (`Q_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`),
  ADD KEY `Username` (`Username`);

--
-- Indexes for table `hair_style`
--
ALTER TABLE `hair_style`
  ADD PRIMARY KEY (`H_ID`);

--
-- Indexes for table `history_queue`
--
ALTER TABLE `history_queue`
  ADD PRIMARY KEY (`HTR_ID`),
  ADD KEY `BK_ID` (`BK_ID`),
  ADD KEY `C_ID` (`C_ID`),
  ADD KEY `B_ID` (`B_ID`),
  ADD KEY `ST_ID` (`ST_ID`),
  ADD KEY `Q_ID` (`Q_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `S_ID` (`S_ID`);

--
-- Indexes for table `offwork`
--
ALTER TABLE `offwork`
  ADD PRIMARY KEY (`OW_ID`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`B_ID`);

--
-- Indexes for table `slot_time`
--
ALTER TABLE `slot_time`
  ADD PRIMARY KEY (`ST_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`S_ID`);

--
-- Indexes for table `status_queue`
--
ALTER TABLE `status_queue`
  ADD PRIMARY KEY (`Q_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_queue`
--
ALTER TABLE `history_queue`
  MODIFY `HTR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barber`
--
ALTER TABLE `barber`
  ADD CONSTRAINT `barber_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `login` (`Username`);

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`B_ID`) REFERENCES `barber` (`B_ID`),
  ADD CONSTRAINT `booking_ibfk_3` FOREIGN KEY (`ST_ID`) REFERENCES `slot_time` (`ST_ID`),
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`Q_ID`) REFERENCES `status_queue` (`Q_ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `login` (`Username`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `login` (`Username`);

--
-- Constraints for table `history_queue`
--
ALTER TABLE `history_queue`
  ADD CONSTRAINT `history_queue_ibfk_1` FOREIGN KEY (`BK_ID`) REFERENCES `booking` (`BK_ID`),
  ADD CONSTRAINT `history_queue_ibfk_2` FOREIGN KEY (`C_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `history_queue_ibfk_3` FOREIGN KEY (`B_ID`) REFERENCES `barber` (`B_ID`),
  ADD CONSTRAINT `history_queue_ibfk_4` FOREIGN KEY (`ST_ID`) REFERENCES `slot_time` (`ST_ID`),
  ADD CONSTRAINT `history_queue_ibfk_5` FOREIGN KEY (`Q_ID`) REFERENCES `status_queue` (`Q_ID`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `status` (`S_ID`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`B_ID`) REFERENCES `barber` (`B_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
