-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 11:56 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cableoperator`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `phoneNumber`, `city`, `Address`, `img`, `isAdmin`) VALUES
(1, 'Admin', 'cabeladmin', 'admin', '1234567890', '', '', NULL, 1),
(2, 'Nishant Shukla', 'nishantshukla01', 'password', '1234567890', 'jabalpur', 'Hous Number 02, near kali mandir, ward no 9', NULL, 0),
(3, 'Anand Rajak', 'rajakanand', '123', '2136548790', 'Jbp', 'jbp', NULL, 0),
(4, 'Calvin Harris', 'calvinharris', '123', '123654852', 'New York', 'NY', NULL, 0),
(5, 'Punku Kesharvani', 'pinkukesh', '123', '1478523694', 'Jbp', 'jbp gohalpur', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `CID` int(11) NOT NULL,
  `State` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`CID`, `State`, `City`) VALUES
(1, 'Andaman and Nicobar', NULL),
(2, 'Andaman and Nicobar', 'North and Middle Andaman'),
(3, 'Andaman and Nicobar', 'South Andaman'),
(4, 'Andaman and Nicobar', 'Nicobar'),
(5, 'Andhra Pradesh', NULL),
(6, 'Andhra Pradesh', 'Adilabad'),
(7, 'Andhra Pradesh', 'Anantapur'),
(8, 'Andhra Pradesh', 'Chittoor'),
(9, 'Andhra Pradesh', 'East Godavari'),
(10, 'Andhra Pradesh', 'Guntur'),
(11, 'Andhra Pradesh', 'Hyderabad'),
(12, 'Andhra Pradesh', 'Kadapa'),
(13, 'Andhra Pradesh', 'Karimnagar'),
(14, 'Andhra Pradesh', 'Khammam'),
(15, 'Andhra Pradesh', 'Krishna'),
(16, 'Andhra Pradesh', 'Kurnool'),
(17, 'Andhra Pradesh', 'Mahbubnagar'),
(18, 'Andhra Pradesh', 'Medak'),
(19, 'Andhra Pradesh', 'Nalgonda'),
(20, 'Andhra Pradesh', 'Nellore'),
(21, 'Andhra Pradesh', 'Nizamabad'),
(22, 'Andhra Pradesh', 'Prakasam'),
(23, 'Andhra Pradesh', 'Rangareddi'),
(24, 'Andhra Pradesh', 'Srikakulam'),
(25, 'Andhra Pradesh', 'Vishakhapatnam'),
(26, 'Andhra Pradesh', 'Vizianagaram'),
(27, 'Andhra Pradesh', 'Warangal'),
(28, 'Andhra Pradesh', 'West Godavari'),
(29, 'Arunachal Pradesh', NULL),
(30, 'Arunachal Pradesh', 'Anjaw'),
(31, 'Arunachal Pradesh', 'Changlang'),
(32, 'Arunachal Pradesh', 'East Kameng'),
(33, 'Arunachal Pradesh', 'Lohit'),
(34, 'Arunachal Pradesh', 'Lower Subansiri'),
(35, 'Arunachal Pradesh', 'Papum Pare'),
(36, 'Arunachal Pradesh', 'Tirap'),
(37, 'Arunachal Pradesh', 'Dibang Valley'),
(38, 'Arunachal Pradesh', 'Upper Subansiri'),
(39, 'Arunachal Pradesh', 'West Kameng'),
(40, 'Assam', NULL),
(41, 'Assam', 'Barpeta'),
(42, 'Assam', 'Bongaigaon'),
(43, 'Assam', 'Cachar'),
(44, 'Assam', 'Darrang'),
(45, 'Assam', 'Dhemaji'),
(46, 'Assam', 'Dhubri'),
(47, 'Assam', 'Dibrugarh'),
(48, 'Assam', 'Goalpara'),
(49, 'Assam', 'Golaghat'),
(50, 'Assam', 'Hailakandi'),
(51, 'Assam', 'Jorhat'),
(52, 'Assam', 'Karbi Anglong'),
(53, 'Assam', 'Karimganj'),
(54, 'Assam', 'Kokrajhar'),
(55, 'Assam', 'Lakhimpur'),
(56, 'Assam', 'Marigaon'),
(57, 'Assam', 'Nagaon'),
(58, 'Assam', 'Nalbari'),
(59, 'Assam', 'North Cachar Hills'),
(60, 'Assam', 'Sibsagar'),
(61, 'Assam', 'Sonitpur'),
(62, 'Assam', 'Tinsukia'),
(63, 'Bihar', NULL),
(64, 'Bihar', 'Araria'),
(65, 'Bihar', 'Aurangabad'),
(66, 'Bihar', 'Banka'),
(67, 'Bihar', 'Begusarai'),
(68, 'Bihar', 'Bhagalpur'),
(69, 'Bihar', 'Bhojpur'),
(70, 'Bihar', 'Buxar'),
(71, 'Bihar', 'Darbhanga'),
(72, 'Bihar', 'Purba Champaran'),
(73, 'Bihar', 'Gaya'),
(74, 'Bihar', 'Gopalganj'),
(75, 'Bihar', 'Jamui'),
(76, 'Bihar', 'Jehanabad'),
(77, 'Bihar', 'Khagaria'),
(78, 'Bihar', 'Kishanganj'),
(79, 'Bihar', 'Kaimur'),
(80, 'Bihar', 'Katihar'),
(81, 'Bihar', 'Lakhisarai'),
(82, 'Bihar', 'Madhubani'),
(83, 'Bihar', 'Munger'),
(84, 'Bihar', 'Madhepura'),
(85, 'Bihar', 'Muzaffarpur'),
(86, 'Bihar', 'Nalanda'),
(87, 'Bihar', 'Nawada'),
(88, 'Bihar', 'Patna'),
(89, 'Bihar', 'Purnia'),
(90, 'Bihar', 'Rohtas'),
(91, 'Bihar', 'Saharsa'),
(92, 'Bihar', 'Samastipur'),
(93, 'Bihar', 'Sheohar'),
(94, 'Bihar', 'Sheikhpura'),
(95, 'Bihar', 'Saran'),
(96, 'Bihar', 'Sitamarhi'),
(97, 'Bihar', 'Supaul'),
(98, 'Bihar', 'Siwan'),
(99, 'Bihar', 'Vaishali'),
(100, 'Bihar', 'Pashchim Champaran'),
(101, 'Chandigarh', NULL),
(102, 'Chhattisgarh', NULL),
(103, 'Chhattisgarh', 'Bastar'),
(104, 'Chhattisgarh', 'Bilaspur'),
(105, 'Chhattisgarh', 'Dantewada'),
(106, 'Chhattisgarh', 'Dhamtari'),
(107, 'Chhattisgarh', 'Durg'),
(108, 'Chhattisgarh', 'Jashpur'),
(109, 'Chhattisgarh', 'Janjgir-Champa'),
(110, 'Chhattisgarh', 'Korba'),
(111, 'Chhattisgarh', 'Koriya'),
(112, 'Chhattisgarh', 'Kanker'),
(113, 'Chhattisgarh', 'Kawardha'),
(114, 'Chhattisgarh', 'Mahasamund'),
(115, 'Chhattisgarh', 'Raigarh'),
(116, 'Chhattisgarh', 'Rajnandgaon'),
(117, 'Chhattisgarh', 'Raipur'),
(118, 'Chhattisgarh', 'Surguja'),
(119, 'Dadra and Nagar Haveli', NULL),
(120, 'Daman and Diu', NULL),
(121, 'Daman and Diu', 'Diu'),
(122, 'Daman and Diu', 'Daman'),
(123, 'Delhi', NULL),
(124, 'Delhi', 'Central Delhi'),
(125, 'Delhi', 'East Delhi'),
(126, 'Delhi', 'New Delhi'),
(127, 'Delhi', 'North Delhi'),
(128, 'Delhi', 'North East Delhi'),
(129, 'Delhi', 'North West Delhi'),
(130, 'Delhi', 'South Delhi'),
(131, 'Delhi', 'South West Delhi'),
(132, 'Delhi', 'West Delhi'),
(133, 'Goa', NULL),
(134, 'Goa', 'North Goa'),
(135, 'Goa', 'South Goa'),
(136, 'Gujarat', NULL),
(137, 'Gujarat', 'Ahmedabad'),
(138, 'Gujarat', 'Amreli District'),
(139, 'Gujarat', 'Anand'),
(140, 'Gujarat', 'Banaskantha'),
(141, 'Gujarat', 'Bharuch'),
(142, 'Gujarat', 'Bhavnagar'),
(143, 'Gujarat', 'Dahod'),
(144, 'Gujarat', 'The Dangs'),
(145, 'Gujarat', 'Gandhinagar'),
(146, 'Gujarat', 'Jamnagar'),
(147, 'Gujarat', 'Junagadh'),
(148, 'Gujarat', 'Kutch'),
(149, 'Gujarat', 'Kheda'),
(150, 'Gujarat', 'Mehsana'),
(151, 'Gujarat', 'Narmada'),
(152, 'Gujarat', 'Navsari'),
(153, 'Gujarat', 'Patan'),
(154, 'Gujarat', 'Panchmahal'),
(155, 'Gujarat', 'Porbandar'),
(156, 'Gujarat', 'Rajkot'),
(157, 'Gujarat', 'Sabarkantha'),
(158, 'Gujarat', 'Surendranagar'),
(159, 'Gujarat', 'Surat'),
(160, 'Gujarat', 'Vadodara'),
(161, 'Gujarat', 'Valsad'),
(162, 'Haryana', NULL),
(163, 'Haryana', 'Ambala'),
(164, 'Haryana', 'Bhiwani'),
(165, 'Haryana', 'Faridabad'),
(166, 'Haryana', 'Fatehabad'),
(167, 'Haryana', 'Gurgaon'),
(168, 'Haryana', 'Hissar'),
(169, 'Haryana', 'Jhajjar'),
(170, 'Haryana', 'Jind'),
(171, 'Haryana', 'Karnal'),
(172, 'Haryana', 'Kaithal'),
(173, 'Haryana', 'Kurukshetra'),
(174, 'Haryana', 'Mahendragarh'),
(175, 'Haryana', 'Mewat'),
(176, 'Haryana', 'Panchkula'),
(177, 'Haryana', 'Panipat'),
(178, 'Haryana', 'Rewari'),
(179, 'Haryana', 'Rohtak'),
(180, 'Haryana', 'Sirsa'),
(181, 'Haryana', 'Sonepat'),
(182, 'Haryana', 'Yamuna Nagar'),
(183, 'Haryana', 'Palwal'),
(184, 'Himachal Pradesh', NULL),
(185, 'Himachal Pradesh', 'Bilaspur'),
(186, 'Himachal Pradesh', 'Chamba'),
(187, 'Himachal Pradesh', 'Hamirpur'),
(188, 'Himachal Pradesh', 'Kangra'),
(189, 'Himachal Pradesh', 'Kinnaur'),
(190, 'Himachal Pradesh', 'Kulu'),
(191, 'Himachal Pradesh', 'Lahaul and Spiti'),
(192, 'Himachal Pradesh', 'Mandi'),
(193, 'Himachal Pradesh', 'Shimla'),
(194, 'Himachal Pradesh', 'Sirmaur'),
(195, 'Himachal Pradesh', 'Solan'),
(196, 'Himachal Pradesh', 'Una'),
(197, 'Jammu and Kashmir', NULL),
(198, 'Jammu and Kashmir', 'Anantnag'),
(199, 'Jammu and Kashmir', 'Badgam'),
(200, 'Jammu and Kashmir', 'Bandipore'),
(201, 'Jammu and Kashmir', 'Baramula'),
(202, 'Jammu and Kashmir', 'Doda'),
(203, 'Jammu and Kashmir', 'Jammu'),
(204, 'Jammu and Kashmir', 'Kargil'),
(205, 'Jammu and Kashmir', 'Kathua'),
(206, 'Jammu and Kashmir', 'Kupwara'),
(207, 'Jammu and Kashmir', 'Leh'),
(208, 'Jammu and Kashmir', 'Poonch'),
(209, 'Jammu and Kashmir', 'Pulwama'),
(210, 'Jammu and Kashmir', 'Rajauri'),
(211, 'Jammu and Kashmir', 'Srinagar'),
(212, 'Jammu and Kashmir', 'Samba'),
(213, 'Jammu and Kashmir', 'Udhampur'),
(214, 'Jharkhand', NULL),
(215, 'Jharkhand', 'Bokaro'),
(216, 'Jharkhand', 'Chatra'),
(217, 'Jharkhand', 'Deoghar'),
(218, 'Jharkhand', 'Dhanbad'),
(219, 'Jharkhand', 'Dumka'),
(220, 'Jharkhand', 'Purba Singhbhum'),
(221, 'Jharkhand', 'Garhwa'),
(222, 'Jharkhand', 'Giridih'),
(223, 'Jharkhand', 'Godda'),
(224, 'Jharkhand', 'Gumla'),
(225, 'Jharkhand', 'Hazaribagh'),
(226, 'Jharkhand', 'Koderma'),
(227, 'Jharkhand', 'Lohardaga'),
(228, 'Jharkhand', 'Pakur'),
(229, 'Jharkhand', 'Palamu'),
(230, 'Jharkhand', 'Ranchi'),
(231, 'Jharkhand', 'Sahibganj'),
(232, 'Jharkhand', 'Seraikela and Kharsawan'),
(233, 'Jharkhand', 'Pashchim Singhbhum'),
(234, 'Jharkhand', 'Ramgarh'),
(235, 'Karnataka', NULL),
(236, 'Karnataka', 'Bidar'),
(237, 'Karnataka', 'Belgaum'),
(238, 'Karnataka', 'Bijapur'),
(239, 'Karnataka', 'Bagalkot'),
(240, 'Karnataka', 'Bellary'),
(241, 'Karnataka', 'Bangalore Rural District'),
(242, 'Karnataka', 'Bangalore Urban District'),
(243, 'Karnataka', 'Chamarajnagar'),
(244, 'Karnataka', 'Chikmagalur'),
(245, 'Karnataka', 'Chitradurga'),
(246, 'Karnataka', 'Davanagere'),
(247, 'Karnataka', 'Dharwad'),
(248, 'Karnataka', 'Dakshina Kannada'),
(249, 'Karnataka', 'Gadag'),
(250, 'Karnataka', 'Gulbarga'),
(251, 'Karnataka', 'Hassan'),
(252, 'Karnataka', 'Haveri District'),
(253, 'Karnataka', 'Kodagu'),
(254, 'Karnataka', 'Kolar'),
(255, 'Karnataka', 'Koppal'),
(256, 'Karnataka', 'Mandya'),
(257, 'Karnataka', 'Mysore'),
(258, 'Karnataka', 'Raichur'),
(259, 'Karnataka', 'Shimoga'),
(260, 'Karnataka', 'Tumkur'),
(261, 'Karnataka', 'Udupi'),
(262, 'Karnataka', 'Uttara Kannada'),
(263, 'Karnataka', 'Ramanagara'),
(264, 'Karnataka', 'Chikballapur'),
(265, 'Karnataka', 'Yadagiri'),
(266, 'Kerala', NULL),
(267, 'Kerala', 'Alappuzha'),
(268, 'Kerala', 'Ernakulam'),
(269, 'Kerala', 'Idukki'),
(270, 'Kerala', 'Kollam'),
(271, 'Kerala', 'Kannur'),
(272, 'Kerala', 'Kasaragod'),
(273, 'Kerala', 'Kottayam'),
(274, 'Kerala', 'Kozhikode'),
(275, 'Kerala', 'Malappuram'),
(276, 'Kerala', 'Palakkad'),
(277, 'Kerala', 'Pathanamthitta'),
(278, 'Kerala', 'Thrissur'),
(279, 'Kerala', 'Thiruvananthapuram'),
(280, 'Kerala', 'Wayanad'),
(281, 'Lakshadweep', NULL),
(282, 'Madhya Pradesh', NULL),
(283, 'Madhya Pradesh', 'Alirajpur'),
(284, 'Madhya Pradesh', 'Anuppur'),
(285, 'Madhya Pradesh', 'Ashok Nagar'),
(286, 'Madhya Pradesh', 'Balaghat'),
(287, 'Madhya Pradesh', 'Barwani'),
(288, 'Madhya Pradesh', 'Betul'),
(289, 'Madhya Pradesh', 'Bhind'),
(290, 'Madhya Pradesh', 'Bhopal'),
(291, 'Madhya Pradesh', 'Burhanpur'),
(292, 'Madhya Pradesh', 'Chhatarpur'),
(293, 'Madhya Pradesh', 'Chhindwara'),
(294, 'Madhya Pradesh', 'Damoh'),
(295, 'Madhya Pradesh', 'Datia'),
(296, 'Madhya Pradesh', 'Dewas'),
(297, 'Madhya Pradesh', 'Dhar'),
(298, 'Madhya Pradesh', 'Dindori'),
(299, 'Madhya Pradesh', 'Guna'),
(300, 'Madhya Pradesh', 'Gwalior'),
(301, 'Madhya Pradesh', 'Harda'),
(302, 'Madhya Pradesh', 'Hoshangabad'),
(303, 'Madhya Pradesh', 'Indore'),
(304, 'Madhya Pradesh', 'Jabalpur'),
(305, 'Madhya Pradesh', 'Jhabua'),
(306, 'Madhya Pradesh', 'Katni'),
(307, 'Madhya Pradesh', 'Khandwa'),
(308, 'Madhya Pradesh', 'Khargone'),
(309, 'Madhya Pradesh', 'Mandla'),
(310, 'Madhya Pradesh', 'Mandsaur'),
(311, 'Madhya Pradesh', 'Morena'),
(312, 'Madhya Pradesh', 'Narsinghpur'),
(313, 'Madhya Pradesh', 'Neemuch'),
(314, 'Madhya Pradesh', 'Panna'),
(315, 'Madhya Pradesh', 'Rewa'),
(316, 'Madhya Pradesh', 'Rajgarh'),
(317, 'Madhya Pradesh', 'Ratlam'),
(318, 'Madhya Pradesh', 'Raisen'),
(319, 'Madhya Pradesh', 'Sagar'),
(320, 'Madhya Pradesh', 'Satna'),
(321, 'Madhya Pradesh', 'Sehore'),
(322, 'Madhya Pradesh', 'Seoni'),
(323, 'Madhya Pradesh', 'Shahdol'),
(324, 'Madhya Pradesh', 'Shajapur'),
(325, 'Madhya Pradesh', 'Sheopur'),
(326, 'Madhya Pradesh', 'Shivpuri'),
(327, 'Madhya Pradesh', 'Sidhi'),
(328, 'Madhya Pradesh', 'Singrauli'),
(329, 'Madhya Pradesh', 'Tikamgarh'),
(330, 'Madhya Pradesh', 'Ujjain'),
(331, 'Madhya Pradesh', 'Umaria'),
(332, 'Madhya Pradesh', 'Vidisha'),
(333, 'Maharashtra', NULL),
(334, 'Maharashtra', 'Ahmednagar'),
(335, 'Maharashtra', 'Akola'),
(336, 'Maharashtra', 'Amrawati'),
(337, 'Maharashtra', 'Aurangabad'),
(338, 'Maharashtra', 'Bhandara'),
(339, 'Maharashtra', 'Beed'),
(340, 'Maharashtra', 'Buldhana'),
(341, 'Maharashtra', 'Chandrapur'),
(342, 'Maharashtra', 'Dhule'),
(343, 'Maharashtra', 'Gadchiroli'),
(344, 'Maharashtra', 'Gondiya'),
(345, 'Maharashtra', 'Hingoli'),
(346, 'Maharashtra', 'Jalgaon'),
(347, 'Maharashtra', 'Jalna'),
(348, 'Maharashtra', 'Kolhapur'),
(349, 'Maharashtra', 'Latur'),
(350, 'Maharashtra', 'Mumbai City'),
(351, 'Maharashtra', 'Mumbai suburban'),
(352, 'Maharashtra', 'Nandurbar'),
(353, 'Maharashtra', 'Nanded'),
(354, 'Maharashtra', 'Nagpur'),
(355, 'Maharashtra', 'Nashik'),
(356, 'Maharashtra', 'Osmanabad'),
(357, 'Maharashtra', 'Parbhani'),
(358, 'Maharashtra', 'Pune'),
(359, 'Maharashtra', 'Raigad'),
(360, 'Maharashtra', 'Ratnagiri'),
(361, 'Maharashtra', 'Sindhudurg'),
(362, 'Maharashtra', 'Sangli'),
(363, 'Maharashtra', 'Solapur'),
(364, 'Maharashtra', 'Satara'),
(365, 'Maharashtra', 'Thane'),
(366, 'Maharashtra', 'Wardha'),
(367, 'Maharashtra', 'Washim'),
(368, 'Maharashtra', 'Yavatmal'),
(369, 'Manipur', NULL),
(370, 'Manipur', 'Bishnupur'),
(371, 'Manipur', 'Churachandpur'),
(372, 'Manipur', 'Chandel'),
(373, 'Manipur', 'Imphal East'),
(374, 'Manipur', 'Senapati'),
(375, 'Manipur', 'Tamenglong'),
(376, 'Manipur', 'Thoubal'),
(377, 'Manipur', 'Ukhrul'),
(378, 'Manipur', 'Imphal West'),
(379, 'Meghalaya', NULL),
(380, 'Meghalaya', 'East Garo Hills'),
(381, 'Meghalaya', 'East Khasi Hills'),
(382, 'Meghalaya', 'Jaintia Hills'),
(383, 'Meghalaya', 'Ri-Bhoi'),
(384, 'Meghalaya', 'South Garo Hills'),
(385, 'Meghalaya', 'West Garo Hills'),
(386, 'Meghalaya', 'West Khasi Hills'),
(387, 'Mizoram', NULL),
(388, 'Mizoram', 'Aizawl'),
(389, 'Mizoram', 'Champhai'),
(390, 'Mizoram', 'Kolasib'),
(391, 'Mizoram', 'Lawngtlai'),
(392, 'Mizoram', 'Lunglei'),
(393, 'Mizoram', 'Mamit'),
(394, 'Mizoram', 'Saiha'),
(395, 'Mizoram', 'Serchhip'),
(396, 'Nagaland', NULL),
(397, 'Nagaland', 'Dimapur'),
(398, 'Nagaland', 'Kohima'),
(399, 'Nagaland', 'Mokokchung'),
(400, 'Nagaland', 'Mon'),
(401, 'Nagaland', 'Phek'),
(402, 'Nagaland', 'Tuensang'),
(403, 'Nagaland', 'Wokha'),
(404, 'Nagaland', 'Zunheboto'),
(405, 'Orissa', NULL),
(406, 'Orissa', 'Angul'),
(407, 'Orissa', 'Boudh'),
(408, 'Orissa', 'Bhadrak'),
(409, 'Orissa', 'Bolangir'),
(410, 'Orissa', 'Bargarh'),
(411, 'Orissa', 'Baleswar'),
(412, 'Orissa', 'Cuttack'),
(413, 'Orissa', 'Debagarh'),
(414, 'Orissa', 'Dhenkanal'),
(415, 'Orissa', 'Ganjam'),
(416, 'Orissa', 'Gajapati'),
(417, 'Orissa', 'Jharsuguda'),
(418, 'Orissa', 'Jajapur'),
(419, 'Orissa', 'Jagatsinghpur'),
(420, 'Orissa', 'Khordha'),
(421, 'Orissa', 'Kendujhar'),
(422, 'Orissa', 'Kalahandi'),
(423, 'Orissa', 'Kandhamal'),
(424, 'Orissa', 'Koraput'),
(425, 'Orissa', 'Kendrapara'),
(426, 'Orissa', 'Malkangiri'),
(427, 'Orissa', 'Mayurbhanj'),
(428, 'Orissa', 'Nabarangpur'),
(429, 'Orissa', 'Nuapada'),
(430, 'Orissa', 'Nayagarh'),
(431, 'Orissa', 'Puri'),
(432, 'Orissa', 'Rayagada'),
(433, 'Orissa', 'Sambalpur'),
(434, 'Orissa', 'Subarnapur'),
(435, 'Orissa', 'Sundargarh'),
(436, 'Puducherry', NULL),
(437, 'Puducherry', 'Karaikal'),
(438, 'Puducherry', 'Mahe'),
(439, 'Puducherry', 'Puducherry'),
(440, 'Puducherry', 'Yanam'),
(441, 'Punjab', NULL),
(442, 'Punjab', 'Amritsar'),
(443, 'Punjab', 'Bathinda'),
(444, 'Punjab', 'Firozpur'),
(445, 'Punjab', 'Faridkot'),
(446, 'Punjab', 'Fatehgarh Sahib'),
(447, 'Punjab', 'Gurdaspur'),
(448, 'Punjab', 'Hoshiarpur'),
(449, 'Punjab', 'Jalandhar'),
(450, 'Punjab', 'Kapurthala'),
(451, 'Punjab', 'Ludhiana'),
(452, 'Punjab', 'Mansa'),
(453, 'Punjab', 'Moga'),
(454, 'Punjab', 'Mukatsar'),
(455, 'Punjab', 'Nawan Shehar'),
(456, 'Punjab', 'Patiala'),
(457, 'Punjab', 'Rupnagar'),
(458, 'Punjab', 'Sangrur'),
(459, 'Rajasthan', NULL),
(460, 'Rajasthan', 'Ajmer'),
(461, 'Rajasthan', 'Alwar'),
(462, 'Rajasthan', 'Bikaner'),
(463, 'Rajasthan', 'Barmer'),
(464, 'Rajasthan', 'Banswara'),
(465, 'Rajasthan', 'Bharatpur'),
(466, 'Rajasthan', 'Baran'),
(467, 'Rajasthan', 'Bundi'),
(468, 'Rajasthan', 'Bhilwara'),
(469, 'Rajasthan', 'Churu'),
(470, 'Rajasthan', 'Chittorgarh'),
(471, 'Rajasthan', 'Dausa'),
(472, 'Rajasthan', 'Dholpur'),
(473, 'Rajasthan', 'Dungapur'),
(474, 'Rajasthan', 'Ganganagar'),
(475, 'Rajasthan', 'Hanumangarh'),
(476, 'Rajasthan', 'Juhnjhunun'),
(477, 'Rajasthan', 'Jalore'),
(478, 'Rajasthan', 'Jodhpur'),
(479, 'Rajasthan', 'Jaipur'),
(480, 'Rajasthan', 'Jaisalmer'),
(481, 'Rajasthan', 'Jhalawar'),
(482, 'Rajasthan', 'Karauli'),
(483, 'Rajasthan', 'Kota'),
(484, 'Rajasthan', 'Nagaur'),
(485, 'Rajasthan', 'Pali'),
(486, 'Rajasthan', 'Pratapgarh'),
(487, 'Rajasthan', 'Rajsamand'),
(488, 'Rajasthan', 'Sikar'),
(489, 'Rajasthan', 'Sawai Madhopur'),
(490, 'Rajasthan', 'Sirohi'),
(491, 'Rajasthan', 'Tonk'),
(492, 'Rajasthan', 'Udaipur'),
(493, 'Sikkim', NULL),
(494, 'Sikkim', 'East Sikkim'),
(495, 'Sikkim', 'North Sikkim'),
(496, 'Sikkim', 'South Sikkim'),
(497, 'Sikkim', 'West Sikkim'),
(498, 'Tamil Nadu', NULL),
(499, 'Tamil Nadu', 'Ariyalur'),
(500, 'Tamil Nadu', 'Chennai'),
(501, 'Tamil Nadu', 'Coimbatore'),
(502, 'Tamil Nadu', 'Cuddalore'),
(503, 'Tamil Nadu', 'Dharmapuri'),
(504, 'Tamil Nadu', 'Dindigul'),
(505, 'Tamil Nadu', 'Erode'),
(506, 'Tamil Nadu', 'Kanchipuram'),
(507, 'Tamil Nadu', 'Kanyakumari'),
(508, 'Tamil Nadu', 'Karur'),
(509, 'Tamil Nadu', 'Madurai'),
(510, 'Tamil Nadu', 'Nagapattinam'),
(511, 'Tamil Nadu', 'The Nilgiris'),
(512, 'Tamil Nadu', 'Namakkal'),
(513, 'Tamil Nadu', 'Perambalur'),
(514, 'Tamil Nadu', 'Pudukkottai'),
(515, 'Tamil Nadu', 'Ramanathapuram'),
(516, 'Tamil Nadu', 'Salem'),
(517, 'Tamil Nadu', 'Sivagangai'),
(518, 'Tamil Nadu', 'Tiruppur'),
(519, 'Tamil Nadu', 'Tiruchirappalli'),
(520, 'Tamil Nadu', 'Theni'),
(521, 'Tamil Nadu', 'Tirunelveli'),
(522, 'Tamil Nadu', 'Thanjavur'),
(523, 'Tamil Nadu', 'Thoothukudi'),
(524, 'Tamil Nadu', 'Thiruvallur'),
(525, 'Tamil Nadu', 'Thiruvarur'),
(526, 'Tamil Nadu', 'Tiruvannamalai'),
(527, 'Tamil Nadu', 'Vellore'),
(528, 'Tamil Nadu', 'Villupuram'),
(529, 'Tripura', NULL),
(530, 'Tripura', 'Dhalai'),
(531, 'Tripura', 'North Tripura'),
(532, 'Tripura', 'South Tripura'),
(533, 'Tripura', 'West Tripura'),
(534, 'Uttarakhand', NULL),
(535, 'Uttarakhand', 'Almora'),
(536, 'Uttarakhand', 'Bageshwar'),
(537, 'Uttarakhand', 'Chamoli'),
(538, 'Uttarakhand', 'Champawat'),
(539, 'Uttarakhand', 'Dehradun'),
(540, 'Uttarakhand', 'Haridwar'),
(541, 'Uttarakhand', 'Nainital'),
(542, 'Uttarakhand', 'Pauri Garhwal'),
(543, 'Uttarakhand', 'Pithoragharh'),
(544, 'Uttarakhand', 'Rudraprayag'),
(545, 'Uttarakhand', 'Tehri Garhwal'),
(546, 'Uttarakhand', 'Udham Singh Nagar'),
(547, 'Uttarakhand', 'Uttarkashi'),
(548, 'Uttar Pradesh', NULL),
(549, 'Uttar Pradesh', 'Agra'),
(550, 'Uttar Pradesh', 'Allahabad'),
(551, 'Uttar Pradesh', 'Aligarh'),
(552, 'Uttar Pradesh', 'Ambedkar Nagar'),
(553, 'Uttar Pradesh', 'Auraiya'),
(554, 'Uttar Pradesh', 'Azamgarh'),
(555, 'Uttar Pradesh', 'Barabanki'),
(556, 'Uttar Pradesh', 'Badaun'),
(557, 'Uttar Pradesh', 'Bagpat'),
(558, 'Uttar Pradesh', 'Bahraich'),
(559, 'Uttar Pradesh', 'Bijnor'),
(560, 'Uttar Pradesh', 'Ballia'),
(561, 'Uttar Pradesh', 'Banda'),
(562, 'Uttar Pradesh', 'Balrampur'),
(563, 'Uttar Pradesh', 'Bareilly'),
(564, 'Uttar Pradesh', 'Basti'),
(565, 'Uttar Pradesh', 'Bulandshahr'),
(566, 'Uttar Pradesh', 'Chandauli'),
(567, 'Uttar Pradesh', 'Chitrakoot'),
(568, 'Uttar Pradesh', 'Deoria'),
(569, 'Uttar Pradesh', 'Etah'),
(570, 'Uttar Pradesh', 'Kanshiram Nagar'),
(571, 'Uttar Pradesh', 'Etawah'),
(572, 'Uttar Pradesh', 'Firozabad'),
(573, 'Uttar Pradesh', 'Farrukhabad'),
(574, 'Uttar Pradesh', 'Fatehpur'),
(575, 'Uttar Pradesh', 'Faizabad'),
(576, 'Uttar Pradesh', 'Gautam Buddha Nagar'),
(577, 'Uttar Pradesh', 'Gonda'),
(578, 'Uttar Pradesh', 'Ghazipur'),
(579, 'Uttar Pradesh', 'Gorkakhpur'),
(580, 'Uttar Pradesh', 'Ghaziabad'),
(581, 'Uttar Pradesh', 'Hamirpur'),
(582, 'Uttar Pradesh', 'Hardoi'),
(583, 'Uttar Pradesh', 'Mahamaya Nagar'),
(584, 'Uttar Pradesh', 'Jhansi'),
(585, 'Uttar Pradesh', 'Jalaun'),
(586, 'Uttar Pradesh', 'Jyotiba Phule Nagar'),
(587, 'Uttar Pradesh', 'Jaunpur District'),
(588, 'Uttar Pradesh', 'Kanpur Dehat'),
(589, 'Uttar Pradesh', 'Kannauj'),
(590, 'Uttar Pradesh', 'Kanpur Nagar'),
(591, 'Uttar Pradesh', 'Kaushambi'),
(592, 'Uttar Pradesh', 'Kushinagar'),
(593, 'Uttar Pradesh', 'Lalitpur'),
(594, 'Uttar Pradesh', 'Lakhimpur Kheri'),
(595, 'Uttar Pradesh', 'Lucknow'),
(596, 'Uttar Pradesh', 'Mau'),
(597, 'Uttar Pradesh', 'Meerut'),
(598, 'Uttar Pradesh', 'Maharajganj'),
(599, 'Uttar Pradesh', 'Mahoba'),
(600, 'Uttar Pradesh', 'Mirzapur'),
(601, 'Uttar Pradesh', 'Moradabad'),
(602, 'Uttar Pradesh', 'Mainpuri'),
(603, 'Uttar Pradesh', 'Mathura'),
(604, 'Uttar Pradesh', 'Muzaffarnagar'),
(605, 'Uttar Pradesh', 'Pilibhit'),
(606, 'Uttar Pradesh', 'Pratapgarh'),
(607, 'Uttar Pradesh', 'Rampur'),
(608, 'Uttar Pradesh', 'Rae Bareli'),
(609, 'Uttar Pradesh', 'Saharanpur'),
(610, 'Uttar Pradesh', 'Sitapur'),
(611, 'Uttar Pradesh', 'Shahjahanpur'),
(612, 'Uttar Pradesh', 'Sant Kabir Nagar'),
(613, 'Uttar Pradesh', 'Siddharthnagar'),
(614, 'Uttar Pradesh', 'Sonbhadra'),
(615, 'Uttar Pradesh', 'Sant Ravidas Nagar'),
(616, 'Uttar Pradesh', 'Sultanpur'),
(617, 'Uttar Pradesh', 'Shravasti'),
(618, 'Uttar Pradesh', 'Unnao'),
(619, 'Uttar Pradesh', 'Varanasi'),
(620, 'West Bengal', NULL),
(621, 'West Bengal', 'Birbhum'),
(622, 'West Bengal', 'Bankura'),
(623, 'West Bengal', 'Bardhaman'),
(624, 'West Bengal', 'Darjeeling'),
(625, 'West Bengal', 'Dakshin Dinajpur'),
(626, 'West Bengal', 'Hooghly'),
(627, 'West Bengal', 'Howrah'),
(628, 'West Bengal', 'Jalpaiguri'),
(629, 'West Bengal', 'Cooch Behar'),
(630, 'West Bengal', 'Kolkata'),
(631, 'West Bengal', 'Malda'),
(632, 'West Bengal', 'Midnapore'),
(633, 'West Bengal', 'Murshidabad'),
(634, 'West Bengal', 'Nadia'),
(635, 'West Bengal', 'North 24 Parganas'),
(636, 'West Bengal', 'South 24 Parganas'),
(637, 'West Bengal', 'Purulia'),
(638, 'West Bengal', 'Uttar Dinajpur');

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE `customerinfo` (
  `id` int(11) NOT NULL,
  `CustomerFirstname` varchar(255) DEFAULT NULL,
  `CustomerEmail` varchar(255) DEFAULT 'No Email Address',
  `CustomerMobile` varchar(255) NOT NULL,
  `CustomerAddress` varchar(255) NOT NULL,
  `CusotmerIsActive` int(11) DEFAULT '1',
  `CustomerIsdeleted` int(11) DEFAULT '0',
  `lastdueamt` varchar(255) NOT NULL DEFAULT '0',
  `CustomerLastname` varchar(255) NOT NULL,
  `CustomerLandmark` varchar(255) NOT NULL,
  `CustomerCity` varchar(255) NOT NULL,
  `nextPaymentDate` date DEFAULT NULL,
  `paymentDueMonthcount` varchar(255) NOT NULL DEFAULT '0',
  `lastpaymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerinfo`
--

INSERT INTO `customerinfo` (`id`, `CustomerFirstname`, `CustomerEmail`, `CustomerMobile`, `CustomerAddress`, `CusotmerIsActive`, `CustomerIsdeleted`, `lastdueamt`, `CustomerLastname`, `CustomerLandmark`, `CustomerCity`, `nextPaymentDate`, `paymentDueMonthcount`, `lastpaymentDate`) VALUES
(2, 'Nishant', 'nishant@gmail.com', '123456789', 'house 3', 1, 0, '0', 'Shukla', 'dayanagar park', 'jabalur', '2019-01-27', '0', '2018-10-27'),
(10, 'amitab', 'bacchan@gmail', '1425369788774', 'mumbai', 1, 0, '0', 'bacchan', 'mubai', 'jbp', '2018-12-15', '0', '2018-11-15'),
(14, 'pinku', '', '2581479632', 'jabalpur', 1, 0, '0', 'kesarwani', 'jbp', 'jbp', '2018-11-27', '0', '2018-10-27'),
(15, 'ranbeer', 'ranveer@gamil.com`', '1235469821', 'near', 1, 0, '0', 'kapoor', 'jbp', 'jbp', '2019-02-01', '0', '2018-11-01'),
(16, 'honey', '', '1236554785', 'mumbai', 1, 0, '0', 'singh', 'mumb', 'bhopal', '2018-12-16', '0', '2018-11-16'),
(22, 'Ashish', NULL, '7879560019', 'hNO 123 rANJHI', 1, 0, '0', 'Pawar', 'XYZ', 'jabalpur', '2018-12-16', '0', '2018-11-16'),
(23, 'Nitin', 'nitin@gmail.com', '1778855222', 'Ward No10', 1, 0, '0', 'Tiwari', 'near bihar', 'mandla', '2018-12-16', '0', '2018-11-16'),
(24, 'Andha', 'andha@gmail.com', '1728396455', 'Near kasturba college jabalpur', 1, 0, '0', 'Dhun', 'It Park', 'Jabalpur', '2018-12-16', '0', '2018-11-16'),
(25, 'Kshitij', 'jai@sawal.com', '4265987514', 'nadia k par', 1, 0, '0', 'Jaiswal', 'Bada Nala', 'Jabalpur', '2018-12-16', '0', '2018-11-16'),
(26, 'Rohit', NULL, '9669008174', 'nainpur', 1, 0, '0', 'Patle', 'Naipur', 'Nainpur', '2018-12-16', '0', '2018-11-16'),
(27, 'Vishal', NULL, '5165210685', 'mumbai', 1, 0, '0', 'Shekhar', 'Mumbai', 'Mumbai', '2018-12-16', '0', '2018-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `PackageName` varchar(255) DEFAULT NULL,
  `PackageAmmount` varchar(255) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0 for not 1 for deleted',
  `packageDuration` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `PackageName`, `PackageAmmount`, `is_deleted`, `packageDuration`) VALUES
(33, 'Big tv', '500', 0, '3'),
(37, 'Diwali Dhamaka', '5000', 0, '6'),
(38, 'New Dhamaka', '4000', 0, '8'),
(39, 'One Month', '150', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `id` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `AdminId` int(11) DEFAULT NULL,
  `paymentDate` date NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Packagetype` int(11) DEFAULT NULL,
  `Ammount` varchar(255) NOT NULL,
  `nextPaymentDate` date NOT NULL,
  `paymentDue` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`id`, `CustomerId`, `AdminId`, `paymentDate`, `Time`, `Packagetype`, `Ammount`, `nextPaymentDate`, `paymentDue`) VALUES
(31, 10, 1, '2018-11-15', NULL, 39, '150', '2018-12-15', NULL),
(32, 24, 4, '2018-11-16', NULL, 39, '150', '2018-12-16', NULL),
(33, 22, 4, '2018-11-16', NULL, 39, '150', '2018-12-16', NULL),
(34, 27, 4, '2018-11-16', NULL, 39, '150', '2018-12-16', NULL),
(35, 26, 3, '2018-11-16', NULL, 39, '150', '2018-12-16', NULL),
(36, 16, 3, '2018-11-16', NULL, 39, '150', '2018-12-16', NULL),
(37, 25, 5, '2018-11-16', NULL, 39, '150', '2018-12-16', NULL),
(38, 23, 5, '2018-11-16', NULL, 39, '150', '2018-12-16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `paymentdue`
--

CREATE TABLE `paymentdue` (
  `id` int(11) NOT NULL,
  `cutomerid` int(11) NOT NULL,
  `lastpaymentdate` date NOT NULL,
  `nextpaymentdate` date NOT NULL,
  `paymentdueMoney` varchar(255) NOT NULL,
  `packageid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `customerinfo`
--
ALTER TABLE `customerinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentdue`
--
ALTER TABLE `paymentdue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=639;

--
-- AUTO_INCREMENT for table `customerinfo`
--
ALTER TABLE `customerinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `paymentdue`
--
ALTER TABLE `paymentdue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
