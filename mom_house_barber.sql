-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 19, 2021 at 07:33 PM
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
('B00001', 'thanatorn', 'ธนาธร', 'จึงรุ่งเรืองกิจ', 'เอก', 'ชาย', '0992645230', '85 ถ. มาลัยแมน ตำบล วังตะกู อำเภอเมืองนครปฐม นครปฐม 73000', 'ตัดซอย', 'ตัดมือ', 'แต่งลาย', '80', '85', '50', 25, 5000, 0, 'thanatorn.jpg'),
('B00002', 'prayuk', 'ประยุกต์', 'จันทร์โอลา', 'ตู่', 'ชาย', '0992645284', '85 ถ. มาลัยแมน ตำบล วังตะกู อำเภอเมืองนครปฐม นครปฐม 73000', 'ตัดซอย', 'ตัดมือ', 'แต่งลาย', '65', '75', '50', 30, 3500, 0, 'prayut.png'),
('B00003', 'mongkonkit', 'มงคลกิจ', 'สุขสินทรารัตน์', 'เต้', 'ชาย', '0992645382', '85 ถ. มาลัยแมน ตำบล วังตะกู อำเภอเมืองนครปฐม นครปฐม 73000', 'ตัดซอย', 'ตัดมือ', 'แต่งลาย', '95', '90', '55', 35, 3000, 0, 'tae.jpg'),
('B00004', 'Taksin', 'ทักษิณ', 'ชินวัตร', 'โทนี่', 'ชาย', '0895567894', 'อำเภอสันกำแพง จังหวัดเชียงใหม่', 'ตัดซอย', 'ตัดมือ', 'แต่งลาย', '95', '92', '75', 0, 0, 0, 'Tony.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BK_ID` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `C_ID` varchar(6) NOT NULL,
  `B_ID` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `H_ID` varchar(6) NOT NULL,
  `BK_Year` int(11) NOT NULL,
  `BK_Month` int(11) NOT NULL,
  `BK_Day` int(11) NOT NULL,
  `ST_ID` int(11) NOT NULL,
  `BK_Date` varchar(10) NOT NULL,
  `Q_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BK_ID`, `C_ID`, `B_ID`, `H_ID`, `BK_Year`, `BK_Month`, `BK_Day`, `ST_ID`, `BK_Date`, `Q_ID`) VALUES
('BK000001', 'C00001', 'B00001', 'H00001', 2021, 8, 11, 1, '', 2),
('BK000002', 'C00001', 'B00001', 'H00001', 2021, 8, 11, 2, '', 2),
('BK000003', 'C00002', 'B00001', 'H00001', 2021, 8, 11, 3, '', 2),
('BK000004', 'C00002', 'B00001', 'H00001', 2021, 8, 11, 4, '', 2),
('BK000005', 'C00002', 'B00001', 'H00001', 2021, 8, 11, 5, '', 2),
('BK000006', 'C00003', 'B00001', 'H00001', 2021, 8, 11, 6, '', 2),
('BK000007', 'C00003', 'B00001', 'H00001', 2021, 8, 11, 7, '', 2),
('BK000009', 'C00005', 'B00001', 'H00001', 2021, 8, 11, 9, '', 2),
('BK000010', 'C00006', 'B00001', 'H00001', 2021, 8, 11, 10, '', 2),
('BK000011', 'C00007', 'B00002', 'H00001', 2021, 8, 12, 1, '', 2),
('BK000012', 'C00007', 'B00002', 'H00001', 2021, 8, 12, 2, '', 2),
('BK000013', 'C00008', 'B00003', 'H00001', 2021, 8, 12, 1, '', 2),
('BK000014', 'C00008', 'B00003', 'H00001', 2021, 9, 1, 1, '', 2),
('BK000015', 'C00009', 'B00003', 'H00001', 2021, 7, 12, 1, '', 2),
('BK000016', 'C00009', 'B00003', 'H00001', 2021, 8, 12, 2, '', 2),
('BK000017', 'C00009', 'B00003', 'H00001', 2021, 8, 12, 3, '', 2),
('BK000018', 'C00000', 'B00003', 'H00001', 2021, 8, 10, 3, '', 2),
('BK000019', 'C00000', 'B00001', 'H00001', 2021, 7, 14, 1, '', 2),
('BK000020', 'C00001', 'B00001', 'H00001', 2021, 8, 12, 6, '', 2),
('BK000021', 'C00001', 'B00001', 'H00001', 2022, 1, 1, 1, '', 1),
('BK000022', 'C00001', 'B00001', 'H00001', 2021, 2, 14, 2, '', 2),
('BK000023', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 1, '', 1),
('BK000024', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 2, '', 1),
('BK000025', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 3, '', 1),
('BK000026', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 4, '', 1),
('BK000027', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 5, '', 1),
('BK000028', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 6, '', 1),
('BK000029', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 7, '', 1),
('BK000030', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 8, '', 1),
('BK000031', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 9, '', 1),
('BK000032', 'C00009', 'B00004', 'H00001', 2021, 8, 21, 10, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `close_branch`
--

CREATE TABLE `close_branch` (
  `OB_ID` varchar(8) NOT NULL,
  `OB_DATE` date NOT NULL,
  `SOB_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `close_branch`
--

INSERT INTO `close_branch` (`OB_ID`, `OB_DATE`, `SOB_ID`) VALUES
('OB000001', '2021-09-03', 2),
('OB000002', '2021-07-28', 2),
('OB000003', '2021-05-07', 2),
('OB000004', '2021-06-25', 2),
('OB000005', '2021-10-23', 2),
('OB000006', '2022-01-27', 2),
('OB000007', '2021-10-22', 2),
('OB000008', '2021-08-29', 2),
('OB000009', '2021-08-27', 2);

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
  `C_Phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `C_Facebook` varchar(50) NOT NULL,
  `C_Img` varchar(255) NOT NULL,
  `A_Phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `A_Nickname` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `Username`, `C_Name`, `C_Lname`, `C_Nickname`, `C_Sex`, `C_Phone`, `C_Facebook`, `C_Img`, `A_Phone`, `A_Nickname`) VALUES
('C00000', 'weekends053', 'วรวุฒิ', 'บุญศรี', 'แอดมิน', 'ชาย', 'คิวหน้าร้าน', 'ZBew', 'zbew.jpg', '0955896970', 'สะบิว'),
('C00001', 'TheNoch', 'ธนยุทธ', 'สามสังค์', 'โนช', 'ชาย', '0841267016', 'Thanayut Samsang', 'baberNoch.jpg', '0', ''),
('C00002', 'pichayut', 'พิชญุตย์', 'อินทารัตน์', 'ริว', 'ชาย', '0640848827', 'Pichayut Intarat', 'rew.jpg', '0', ''),
('C00003', 'Earth1', 'วรวัฒน์', 'รัตนโนสถ', 'เอิร์ท', 'ชาย', '0844819684', 'worawat rattananosod', 'earth.jpg', '0', ''),
('C00004', 'December35', 'ธันวา', 'ใจดี', 'วา', 'ชาย', '0892564501', 'Thanwa Jaidee', 'tunva.jpg', '0', ''),
('C00005', 'poramin', 'ปรมินทร์', 'จุมพรหม', 'แจม', 'หญิง', '0851543520', 'Poramin Jumphom', 'jam.jpg', '0', ''),
('C00006', 'Captain', 'Pratchanin', 'Srathong', 'กัปตัน', 'หญิง', '0851528520', 'Pratchanin Srathong', 'captain.jpg', '0', ''),
('C00007', 'Sahatsavat', 'Sahatsavat', 'Vanichnukro', 'เรย์', 'ชาย', '0842528520', 'Sahatsavat Vanichnukro', 'Ray.jpg', '0', ''),
('C00008', 'Earth25', 'ณัฐดนัย', 'กุไรรัตน์', 'เอิร์ธ', 'ชาย', '0861528520', 'Earth Nadanai', 'Earth25.jpg', '0', ''),
('C00009', 'Thitisak', 'Thitisak', 'MaSuk', 'เต้', 'ชาย', '0878528520', 'Tae Thitisak', 'Thatisak.jpg', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `hair_style`
--

CREATE TABLE `hair_style` (
  `H_ID` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `H_Name` varchar(50) NOT NULL,
  `H_Detail` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `H_Img1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `H_Img2` varchar(255) NOT NULL,
  `H_Img3` varchar(255) NOT NULL,
  `H_Img4` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hair_style`
--

INSERT INTO `hair_style` (`H_ID`, `H_Name`, `H_Detail`, `H_Img1`, `H_Img2`, `H_Img3`, `H_Img4`, `Price`) VALUES
('H00001', 'ผมทรงทวิสต์เอาท์ Twist-out', 'ทรงผมสุดคูล สำหรับชาวฮิปฮอป สาวกฮิปฮอปต้องคุ้นตากับผมทรงนี้แน่นอน สำหรับทรงผมชายทรงทวิสต์เอาท์ Twist-out ที่บอกเลยว่าสุดคูล!ทรงนี้จะไว้ผมที่ความยาวระดับปานกลาง\r\n', 'HairStyle1_1.jpg', 'HairStyle1_2.jpg', 'HairStyle1_3.jpg', 'HairStyle1_4.jpg', 150);

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
('Captain', 'Captain', '3'),
('December35', '101035', '3'),
('Earth1', '333333', '3'),
('Earth25', 'Earth25', '3'),
('mongkonkit', 'mongkonkit', '2'),
('pichayut', '222222', '3'),
('poramin', 'poramin', '3'),
('prayuk', 'prayuk', '2'),
('Sahatsavat', 'Sahatsavat', '3'),
('Taksin', 'TonyTony', '2'),
('thanatorn', 'thanatorn', '2'),
('TheNoch', '111111', '3'),
('Thitisak', 'Thitisak', '3'),
('weekends053', '123456', '1');

-- --------------------------------------------------------

--
-- Table structure for table `offwork`
--

CREATE TABLE `offwork` (
  `OW_ID` varchar(6) NOT NULL,
  `B_ID` varchar(6) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offwork`
--

INSERT INTO `offwork` (`OW_ID`, `B_ID`, `Date`) VALUES
('O00001', 'B00001', '2021-08-22'),
('O00002', 'B00001', '2021-07-02'),
('O00003', 'B00002', '2021-07-31'),
('O00004', 'B00003', '2021-06-04'),
('O00005', 'B00004', '2021-08-31'),
('O00006', 'B00001', '2021-10-01'),
('O00007', 'B00001', '2021-06-04');

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
-- Table structure for table `status_branch`
--

CREATE TABLE `status_branch` (
  `SOB_ID` int(11) NOT NULL,
  `SOB_Status` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `status_branch`
--

INSERT INTO `status_branch` (`SOB_ID`, `SOB_Status`) VALUES
(1, 'OPEN'),
(2, 'CLOSED');

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
  ADD KEY `Q_ID` (`Q_ID`),
  ADD KEY `H_ID` (`H_ID`);

--
-- Indexes for table `close_branch`
--
ALTER TABLE `close_branch`
  ADD PRIMARY KEY (`OB_ID`),
  ADD KEY `SOB_ID` (`SOB_ID`);

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `S_ID` (`S_ID`);

--
-- Indexes for table `offwork`
--
ALTER TABLE `offwork`
  ADD PRIMARY KEY (`OW_ID`),
  ADD KEY `B_ID` (`B_ID`);

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
-- Indexes for table `status_branch`
--
ALTER TABLE `status_branch`
  ADD PRIMARY KEY (`SOB_ID`);

--
-- Indexes for table `status_queue`
--
ALTER TABLE `status_queue`
  ADD PRIMARY KEY (`Q_ID`);

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
  ADD CONSTRAINT `booking_ibfk_4` FOREIGN KEY (`Q_ID`) REFERENCES `status_queue` (`Q_ID`),
  ADD CONSTRAINT `booking_ibfk_5` FOREIGN KEY (`H_ID`) REFERENCES `hair_style` (`H_ID`);

--
-- Constraints for table `close_branch`
--
ALTER TABLE `close_branch`
  ADD CONSTRAINT `close_branch_ibfk_1` FOREIGN KEY (`SOB_ID`) REFERENCES `status_branch` (`SOB_ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `login` (`Username`),
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `login` (`Username`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`S_ID`) REFERENCES `status` (`S_ID`);

--
-- Constraints for table `offwork`
--
ALTER TABLE `offwork`
  ADD CONSTRAINT `offwork_ibfk_1` FOREIGN KEY (`B_ID`) REFERENCES `barber` (`B_ID`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`B_ID`) REFERENCES `barber` (`B_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
