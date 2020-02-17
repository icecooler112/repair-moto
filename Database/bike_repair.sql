-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 08:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_lg`
--

CREATE TABLE `admin_lg` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_lg`
--

INSERT INTO `admin_lg` (`id`, `username`, `password`, `First_Name`, `Last_Name`, `status`) VALUES
(1, 'icecooler112', '0953103854', 'Bunditpong', 'Tapinta', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `dl_id` int(11) NOT NULL,
  `dl_nameshop` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dl_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dl_id`, `dl_nameshop`, `dl_phone`) VALUES
(1, 'Honda Bigwing', '1234567890'),
(2, 'Kawasaki Motoholic', '1234567889');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `pname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `p_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price_income` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numproduct` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dl_id` int(11) NOT NULL,
  `dl_insurance` text COLLATE utf8_unicode_ci NOT NULL,
  `dl_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `pname`, `p_id`, `price_income`, `price`, `numproduct`, `detail`, `image`, `dl_id`, `dl_insurance`, `dl_date`) VALUES
(22, 'ลูกสูบฟอร์จ (forged) สลัก 13 มิล ขนาด 53.00 - 59.00 มิล', '0001', '', '1,500', '20', 'รุ่นรถ : WAVE110i , WAVE125i , DREAM SUPER CUB , MSX , MSX SF , SONIC หรือรถที่ใช้ก้านสูบสลัก 13 มิล ทุกรุ่น', '1580447708.jpg', 1, '1 ปี', '2020-02-03'),
(23, 'ก้านสูบไฮสปีด WAVE125', '0002', '', '500', '10', 'รุ่นรถ : WAVE125\r\nใช้ทดแทนก้านสูบเดิมติดรถ', '1580447865.jpg', 2, '', '0000-00-00'),
(24, 'วาล์วแต่งไฮสปีด WAVE125 , WAVE125i เก่า', '0003', '', '500', '10', 'รุ่นรถ : WAVE125 , WAVE125i เก่า1.วาล์วแต่งไฮสปีดแข็งแรงทนทาน2.รองรับรอบเครื่องสูงได้3.ผลิตจากวัตถดิบอย่างดีไม่ขาดง่ายเหมือนวาล์วทั่วไป4.ผ่านการทดสอบในสนามแข่งขันแล้ว5.ใช้เพื่อทดแทนชิ้นส่วนเดิมที่สึกหรอ', '1580448035.jpg', 2, '', '0000-00-00'),
(25, 'เสื้อสูบแต่งไฮสปีด WAVE125i เก่า , WAVE125 (54 mm)', '0004', '', '1,299', '10', 'รุ่นรถ : WAVE12554 mm. Liner outside 58.50 mm.56 mm. Liner outside 59.00 mm.1. เสื้อสูบแต่งไฮสปีด สามารถใส่กับลูกสูบแต่งหรือลูกสูบขนาดใหญ่กว่าของเดิมได้2. ใช้สำหรับการแข่งขันในสนามแข่งได้3. เหมาะสำหรับรถที่ต้องการเพิ่มซีซี', '1580449194.jpg', 1, '', '0000-00-00'),
(26, 'แคมวาล์วแต่ง WAVE125i เก่า , WAVE125 (5.2 mm + Valve spring + Retainer)', '0005', '', '899', '6', '1.แคมวาล์วไฮสปีด มีความคงทน การหล่อขึ้นรูปแบบพิเศษ\r\n2.มีมาตราฐานการทำแคมวาล์วทุกตัวมีขนาดเท่ากัน\r\n3.มาตราฐานการชุบแข็งส่วนลูกเบี้ยวของแคมป้องกันการสึกหลอ\r\n4.แคมไฮสปีดที่ระยะยกสูงจะมีการแถมสปริงไปด้วย เพื่อป้องกันอาการกระแทกเวลาสปริงขดตัว(สปริงนั่ง)', '1580450185.jpg', 2, '', '0000-00-00'),
(27, 'สปริงวาล์วแต่งไฮสปีด WAVE125i , MSX125 , WAVE125 (5 coil , length 32 mm. , 2 way)', '0006', '', '600', '7', '1. ป้องกันปัญหาสปริงวาล์วกดตัวทับกัน(ขดลวดสปริงนั่งชนกัน) เมื่อใช้แคมวาล์วแต่งที่มีระยะการยกสูง\r\n2.วัตถุดิบจากประเทศญี่ปุ่น ไม่หดตัวง่าย', '1580450441.jpg', 1, '', '0000-00-00'),
(28, 'คาร์บูเอ็นโปร (PE)', '0007', '', '800', '6', '1.จูนง่าย และนิ่ง\r\n2.ปรับแต่งชุดทำงานภายในใหม่ทั้งหมด\r\n3.ปรับแต่งให้ใช้ได้กับรถทั้ง 2 และ 4 จังหวะ\r\n4.อัตราการตอบสนองที่ไวกว่าคาร์บูทั่วไป', '1580450585.jpg', 1, '', '0000-00-00'),
(29, 'คาร์บูเรเตอร์เคเหลี่ยม (PWK)', '0008', '', '400', '8', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์ทุกรุ่น\r\n1.จูนง่าย และนิ่ง\r\n2.ปรับแต่งชุดทำงานภายในใหม่ทั้งหมด\r\n3.ปรับแต่งให้ใช้ได้กับรถทั้ง 2 และ 4 จังหวะ\r\n4.อัตราการตอบสนองที่ไวกว่าคาร์บูทั่วไป', '1580455309.jpg', 1, '', '0000-00-00'),
(30, 'คาร์บูเรเตอร์เหลี่ยมตัวใหญ่ (BIG PWK)', '0009', '', '4,500', '6', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์ทุกรุ่น\r\n1.จูนง่าย และนิ่ง\r\n2.ปรับแต่งชุดทำงานภายในใหม่ทั้งหมด\r\n3.ปรับแต่งให้ใช้ได้กับรถทั้ง 2 และ 4 จังหวะ\r\n4.อัตราการตอบสนองที่ไวกว่าคาร์บูทั่วไป', '1580455414.jpg', 1, '', '0000-00-00'),
(31, 'นมหนูน้ำมันเอ็นโปร (PE)', '0010', '', '70', '30', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์เอ็นโปร\r\n1.ผลิตจากวัตถุดิบอย่างดี\r\n2.มีขนาดมาตราฐาน', '1580455562.jpg', 1, '', '0000-00-00'),
(32, 'นมหนูน้ำมันเคเหลี่ยม (PWK)', '0011', '', '70', '20', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์เคเหลี่ยม\r\n1.ผลิตจากวัตถุดิบอย่างดี\r\n2.มีขนาดมาตราฐาน', '1580455977.jpg', 1, '', '0000-00-00'),
(33, 'นมหนูอากาศ คุณภาพดี', '0012', '', '70', '20', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์เอ็นโปรและเคเหลี่ยมเท่านั้น\r\n1.ผลิตจากวัตถุดิบอย่างดี\r\n2.มีขนาดมาตราฐาน', '1580456056.jpg', 1, '', '0000-00-00'),
(34, 'ชุดแผ่นคลัชแต่ง WAVE125', '0013', '', '450', '25', 'รุ่นรถ : WAVE125\r\n1. ชุดคลัชเนื้อพิเศษ จับตัวได้ดีกว่าแผ่นคลัชแบบทั่วไป ไม่จำเป็นต้องใช้สปริงคลัชแต่ง และแนะนำให้ใส่กับสปริงเดิมติดรถ', '1580456147.jpg', 1, '', '0000-00-00'),
(35, 'กล่องไฟแต่ง 2 กราฟ WAVE125S', '0014', '', '1,500', '25', 'รุ่นรถ : WAVE125S1.ตัวกล่องไฟแต่งมี 2 กราฟให้เลือก2.ต่อแทนกล่องเดิมได้ทันที ไม่ต้องแปลงสายใดๆ', '1580457156.jpg', 1, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idcard` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `idcard`, `phone`, `email`) VALUES
(27, 'Bunditpong Tapinta', '1580300087300', '0953103854', 'icecooler_112@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_lg`
--
ALTER TABLE `admin_lg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`dl_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_lg`
--
ALTER TABLE `admin_lg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
