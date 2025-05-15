-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 01:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excel`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `email`, `phone`, `course`) VALUES
(1, 'shahar yar', 'shaharyar.khan4511@gmail.com', '03088154511', 'Web Development'),
(2, 'ali', 'ali@gmail.com', '00000', 'Front End Web Development'),
(3, 'shazeb', 'shazeb@gmail.com', '111100000', 'SEO');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `fullname`, `email`, `phone`, `course`) VALUES
(1, 'shahar yar', 'shaharyar.khan4511@gmail.com', '03088154511', 'Web Development'),
(2, ' \nali', 'ali@gmail.com', '00000', 'Front End Web Development'),
(3, 'shazeb', 'shazeb@gmail.com', '111100000', 'SEO'),
(4, 'shahar yar', 'shaharyar.khan4511@gmail.com', '03088154511', 'Web Development'),
(5, ' \nali', 'ali@gmail.com', '00000', 'Front End Web Development'),
(6, 'shazeb', 'shazeb@gmail.com', '111100000', 'SEO');

-- --------------------------------------------------------

--
-- Table structure for table `union_overall`
--

CREATE TABLE `union_overall` (
  `id` int(11) NOT NULL,
  `weekly_record_id` int(11) DEFAULT NULL,
  `Club_Name` varchar(255) DEFAULT NULL,
  `Club_ID` varchar(255) DEFAULT NULL,
  `Hands_Missions` varchar(255) DEFAULT NULL,
  `Player_Overall` varchar(255) DEFAULT NULL,
  `Ring_Game` varchar(255) DEFAULT NULL,
  `MTT_SNG` varchar(255) DEFAULT NULL,
  `SPINUP` varchar(255) DEFAULT NULL,
  `COLOR_GAME` varchar(255) DEFAULT NULL,
  `LUCKY_DRAW` varchar(255) DEFAULT NULL,
  `Jackpot` varchar(255) DEFAULT NULL,
  `Player_EV_Chop` varchar(255) DEFAULT NULL,
  `Ticket Value Won` varchar(255) DEFAULT NULL,
  `Player_Ticket_Buy_in` varchar(255) DEFAULT NULL,
  `Customized_Prize_Value` varchar(255) DEFAULT NULL,
  `Club_earning_Overall` varchar(255) DEFAULT NULL,
  `Fee` varchar(255) DEFAULT NULL,
  `Fee_PPST_Games` varchar(255) DEFAULT NULL,
  `Fee_Non_PPST_Games` varchar(255) DEFAULT NULL,
  `Fee_PPSR_Games` varchar(255) DEFAULT NULL,
  `Fee_Non_PPSR_Games` varchar(255) DEFAULT NULL,
  `SPINUP_Buy_in` varchar(255) DEFAULT NULL,
  `SPINUP_Prize` varchar(255) DEFAULT NULL,
  `COLOR_GAME_Bets` varchar(255) DEFAULT NULL,
  `COLOR_GAME_Payouts` varchar(255) DEFAULT NULL,
  `LUCKY_DRAW_Bets` varchar(255) DEFAULT NULL,
  `LUCKY_DRAW_Payouts` varchar(255) DEFAULT NULL,
  `JackpotFee` varchar(255) DEFAULT NULL,
  `Jackpot_Prize` varchar(255) DEFAULT NULL,
  `Club_EV_Chop` varchar(255) DEFAULT NULL,
  `Ticket_Value_Given_Out` varchar(255) DEFAULT NULL,
  `Club_Ticket_Buy_in` varchar(255) DEFAULT NULL,
  `Gtd_Gap` varchar(255) DEFAULT NULL,
  `Ticket_Value_Won` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `union_overall`
--

INSERT INTO `union_overall` (`id`, `weekly_record_id`, `Club_Name`, `Club_ID`, `Hands_Missions`, `Player_Overall`, `Ring_Game`, `MTT_SNG`, `SPINUP`, `COLOR_GAME`, `LUCKY_DRAW`, `Jackpot`, `Player_EV_Chop`, `Ticket Value Won`, `Player_Ticket_Buy_in`, `Customized_Prize_Value`, `Club_earning_Overall`, `Fee`, `Fee_PPST_Games`, `Fee_Non_PPST_Games`, `Fee_PPSR_Games`, `Fee_Non_PPSR_Games`, `SPINUP_Buy_in`, `SPINUP_Prize`, `COLOR_GAME_Bets`, `COLOR_GAME_Payouts`, `LUCKY_DRAW_Bets`, `LUCKY_DRAW_Payouts`, `JackpotFee`, `Jackpot_Prize`, `Club_EV_Chop`, `Ticket_Value_Given_Out`, `Club_Ticket_Buy_in`, `Gtd_Gap`, `Ticket_Value_Won`) VALUES
(1, 16, 'SexyFish?Inter', '19889', '0', '-3347.07', '-3270.46', '-391.31', '0', '0', '0', '314.7', '0', NULL, '0', '0', '1821.59', '2136.29', '60.02', '1.2', '0', '2075.07', '0', '0', '0', '0', '0', '0', '177.66', '-492.36', '0', '0', '0', '0', '0.00'),
(2, 16, '4SEASONS AUD', '413052', '0', '-2512.14', '-3502.26', '662.52', '0', '0', '0', '327.6', '0', NULL, '76', '0', '5643.18', '6008.78', '211.19', '4.2', '0', '5793.39', '0', '0', '0', '0', '0', '0', '609.29', '-936.89', '0', '38', '-76', '0', '38.00'),
(3, 16, 'Twelve Apostles', '1267813', '900', '-22654.44', '-22681.35', '-680.34', '0', '0', '0', '707.25', '0', NULL, '0', '0', '6916.95', '7624.2', '174.24', '149.4', '0', '7300.56', '0', '0', '0', '0', '0', '0', '867.41', '-1574.66', '0', '0', '0', '0', '0.00'),
(4, 16, '♦️SHARK TANK♦', '1568636', '200', '-37994.16', '-34601.62', '-3486.19', '0', '0', '0', '93.65', '0', NULL, '601.92', '0', '15642.08', '15568.53', '2131.42', '183.2', '0', '13253.91', '0', '0', '0', '0', '0', '0', '720.4', '-814.05', '0', '769.12', '-601.92', '0', '769.12'),
(5, 16, 'KАNGAROO', '1654996', '500', '-1510.36', '-3284.17', '2864.62', '0', '0', '0', '-1090.81', '0', NULL, '91.2', '0', '19012.39', '17967.18', '679.59', '227.3', '0', '17060.29', '0', '0', '0', '0', '0', '0', '1773.12', '-682.31', '0', '45.6', '-91.2', '0', '45.60'),
(6, 16, 'Z-Capital', '2315005', '500', '-6817.56', '-5046.87', '-1292.87', '0', '0', '0', '-477.82', '0', NULL, '45.6', '0', '42220.79', '41742.97', '492.38', '0.3', '0', '41250.29', '0', '0', '0', '0', '0', '0', '3098.4', '-2620.58', '0', '45.6', '-45.6', '0', '45.60'),
(7, 16, 'Supernova', '3000679', '1400', '-207757.12', '-172716.4', '-36067.79', '0', '0', '0', '1027.07', '0', NULL, '1264.64', '0', '112020.59', '112318.06', '12257.19', '629.25', '0', '99431.62', '0', '0', '0', '0', '0', '0', '5375.41', '-6402.48', '0', '1994.24', '-1264.64', '0', '1994.24'),
(8, 16, 'POCKET5s ELITE', '3000680', '0', '-5555.84', '-7206.28', '1712.55', '0', '0', '0', '-62.11', '0', NULL, '349.6', '0', '4783.39', '4607.28', '2458.43', '165.7', '0', '1983.15', '0', '0', '0', '0', '0', '0', '248.95', '-186.84', '0', '463.6', '-349.6', '0', '463.60'),
(9, 16, 'Irish Stew', '3000687', '0', '-355.11', '-737.51', '401.31', '0', '0', '0', '-18.91', '0', NULL, '121.6', '0', '1090.84', '1071.93', '237.45', '8', '0', '826.48', '0', '0', '0', '0', '0', '0', '19.85', '-0.94', '0', '121.6', '-121.6', '0', '121.60'),
(10, 16, 'KINGS POKER', '3000689', '300', '78672.38', '76752.44', '2260.68', '0', '0', '0', '-340.74', '0', NULL, '174.8', '0', '25885.05', '25582.31', '913.67', '194.55', '0', '24474.09', '0', '0', '0', '0', '0', '0', '749.32', '-408.58', '0', '136.8', '-174.8', '0', '136.80'),
(11, 16, 'Diamond Poker', '3000690', '0', '-10305.6', '-10200.83', '-396.61', '0', '0', '0', '291.84', '0', NULL, '136.8', '0', '3395.58', '3733.02', '795.36', '58.15', '0', '2879.51', '0', '0', '0', '0', '0', '0', '290.72', '-582.56', '0', '91.2', '-136.8', '0', '91.20'),
(12, 16, 'The Poker Society', '3000696', '0', '-60221.09', '-45900.25', '-13999.96', '0', '0', '0', '-320.88', '0', NULL, '88.16', '0', '23415.18', '22951.42', '4116.24', '186.2', '0', '18648.98', '0', '0', '0', '0', '0', '0', '1093.65', '-772.77', '0', '231.04', '-88.16', '0', '231.04'),
(13, 16, 'Tankfold', '3717471', '0', '-28793.47', '-25061.66', '-3589.88', '0', '0', '0', '-141.93', '0', NULL, '252.32', '0', '15258.41', '15125.6', '2446.55', '225.2', '0', '12453.85', '0', '0', '0', '0', '0', '0', '888.37', '-746.44', '0', '243.2', '-252.32', '0', '243.20'),
(14, 16, 'Mighty Boosche', '4307319', '0', '-22024.55', '-20376.88', '-2018.5', '0', '0', '0', '370.83', '0', NULL, '0', '0', '15887.68', '16258.51', '649.97', '17.1', '0', '15591.44', '0', '0', '0', '0', '0', '0', '1147.44', '-1518.27', '0', '0', '0', '0', '0.00'),
(15, 16, 'Carbon network', '2874417', '0', '-12128.3', '-10584.67', '-1160.65', '0', '0', '0', '-382.98', '0', NULL, '76', '0', '11448.77', '11111.39', '581.96', '10.5', '0', '10518.93', '0', '0', '0', '0', '0', '0', '510.93', '-127.95', '0', '30.4', '-76', '0', '30.40'),
(16, 16, 'DOMINO CLUB', '2802448', '100', '18567.42', '21138.46', '-1405.15', '0', '0', '0', '-1165.89', '0', NULL, '0', '0', '25790.72', '24624.83', '360.97', '6.6', '0', '24257.26', '0', '0', '0', '0', '0', '0', '2338.3', '-1172.41', '0', '0', '0', '0', '0.00'),
(17, 16, 'PuntoFresh AUS', '715226', '0', '-3003.45', '-2831.53', '-425.82', '0', '0', '0', '253.9', '0', NULL, '0', '0', '13579.44', '13833.34', '108.46', '0', '0', '13724.88', '0', '0', '0', '0', '0', '0', '2452.55', '-2706.45', '0', '0', '0', '0', '0.00'),
(18, 16, 'ECPokerPit', '3741146', '0', '-11164.32', '-2639.86', '-8553.68', '0', '0', '0', '29.22', '0', NULL, '494', '0', '6139.66', '6199.28', '1576.56', '190.2', '0', '4432.52', '0', '0', '0', '0', '0', '0', '303.2', '-332.42', '0', '463.6', '-494', '0', '463.60'),
(19, 16, 'ShowCase', '2896955', '100', '-12004.02', '-14600.58', '2109.31', '0', '0', '0', '487.25', '0', NULL, '448.4', '0', '8002.46', '8352.91', '2200.95', '210.25', '0', '5941.71', '0', '0', '0', '0', '0', '0', '276.44', '-763.69', '0', '585.2', '-448.4', '0', '585.20'),
(20, 16, 'Oh Boy!', '310889', '0', '-17541.16', '-17185.65', '-197.62', '0', '0', '0', '-157.89', '0', NULL, '0', '0', '6028.35', '5870.46', '67.64', '0', '0', '5802.82', '0', '0', '0', '0', '0', '0', '504.12', '-346.23', '0', '0', '0', '0', '0.00'),
(21, 16, 'Chocolatie', '1783393', '0', '-13210.32', '-10612.43', '-3782.12', '0', '0', '0', '1184.23', '0', NULL, '0', '0', '2665.25', '3849.48', '528.38', '15.5', '0', '3305.6', '0', '0', '0', '0', '0', '0', '218.14', '-1402.37', '0', '0', '0', '0', '0.00'),
(22, 16, '13 STARS✨✨', '1313', '0', '-4039.74', '-8713.11', '4258.56', '0', '0', '0', '414.81', '0', NULL, '50.16', '0', '5221.95', '5636.76', '359.04', '0', '0', '5277.72', '0', '0', '0', '0', '0', '0', '420.56', '-835.37', '0', '50.16', '-50.16', '0', '50.16'),
(23, 16, 'Stealth', '3000681', '0', '-3684.02', '-1676.1', '-1970.26', '0', '0', '0', '-37.66', '0', NULL, '91.2', '0', '5391.83', '5354.17', '411.38', '69.1', '0', '4873.69', '0', '0', '0', '0', '0', '0', '78.87', '-41.21', '0', '91.2', '-91.2', '0', '91.20'),
(24, 16, 'MONTE`CARLO', '1122334', '0', '3391.19', '3472.85', '-3.04', '0', '0', '0', '-78.62', '0', NULL, '0', '0', '14216.67', '14138.05', '0.3', '0', '0', '14137.75', '0', '0', '0', '0', '0', '0', '641.22', '-562.6', '0', '0', '0', '0', '0.00'),
(25, 16, 'Indian Sweet', '3975383', '0', '9058.13', '9097.92', '0', '0', '0', '0', '-39.79', '0', NULL, '0', '0', '4131.59', '4091.8', '0', '0', '0', '4091.8', '0', '0', '0', '0', '0', '0', '164.06', '-124.27', '0', '0', '0', '0', '0.00'),
(26, 16, 'Curiosity', '3916674', '0', '-1330.83', '-1337.01', '0', '0', '0', '0', '6.18', '0', NULL, '0', '0', '196.79', '202.97', '0', '0', '0', '202.97', '0', '0', '0', '0', '0', '0', '25.38', '-31.56', '0', '0', '0', '0', '0.00'),
(27, 16, 'QueenslandQuads', '4085880', '0', '-8854.06', '-8700.43', '23.61', '0', '0', '0', '-177.24', '0', NULL, '0', '0', '16930.87', '16753.63', '18.24', '0', '0', '16735.39', '0', '0', '0', '0', '0', '0', '425.91', '-248.67', '0', '0', '0', '0', '0.00'),
(28, 16, 'EIGHTS FULL', '4132997', '100', '-4246.94', '-3016.01', '-1394.42', '0', '0', '0', '163.49', '0', NULL, '0', '0', '1952.84', '2116.33', '150.7', '3.2', '0', '1962.43', '0', '0', '0', '0', '0', '0', '109.65', '-273.14', '0', '0', '0', '0', '0.00'),
(29, 16, '⚡️Power Poker⚡', '4171788', '100', '-22697.79', '-22726.07', '85.04', '0', '0', '0', '-56.76', '0', NULL, '121.6', '0', '9956.5', '10021.34', '231.38', '4.6', '0', '9785.36', '0', '0', '0', '0', '0', '0', '236.29', '-179.53', '0', '0', '-121.6', '0', '0.00'),
(30, 16, 'Tas Poker Champs', '2366269', '0', '-3193.09', '-1598.51', '-1564.11', '0', '0', '0', '-30.47', '0', NULL, '174.8', '0', '3318.1', '3363.63', '1011.99', '41.25', '0', '2310.39', '0', '0', '0', '0', '0', '0', '230.55', '-200.08', '0', '98.8', '-174.8', '0', '98.80'),
(31, 16, 'No Nitz 2', '3000698', '100', '-2915.08', '-2798.09', '-68.4', '0', '0', '0', '-48.59', '0', NULL, '0', '0', '1628.07', '1579.48', '6.84', '0', '0', '1572.64', '0', '0', '0', '0', '0', '0', '75.7', '-27.11', '0', '0', '0', '0', '0.00'),
(32, 16, 'TWO FISHES CLUB', '3569395', '0', '-3680.34', '-1512.96', '-2132.05', '0', '0', '0', '-35.33', '0', NULL, '0', '0', '735.5', '700.17', '288.8', '0', '0', '411.37', '0', '0', '0', '0', '0', '0', '49.16', '-13.83', '0', '0', '0', '0', '0.00'),
(33, 16, 'evowars poker', '4202916', '200', '-3896.56', '-9140.88', '5261.9', '0', '0', '0', '-17.58', '0', NULL, '0', '0', '8088.68', '8071.1', '155.04', '0', '0', '7916.06', '0', '0', '0', '0', '0', '0', '18.04', '-0.46', '0', '0', '0', '0', '0.00'),
(34, 16, 'Moon Base Poker', '2017975', '0', '-185.88', '-143.39', '-39.5', '0', '0', '0', '-2.99', '0', NULL, '0', '0', '40.24', '37.25', '8.66', '0', '0', '28.59', '0', '0', '0', '0', '0', '0', '2.99', '0', '0', '0', '0', '0', '0.00'),
(35, 16, 'FN BROKA AUS', '2080211', '0', '-443.57', '-375.6', '0', '0', '0', '0', '-67.97', '0', NULL, '0', '0', '832.03', '764.06', '0', '0', '0', '764.06', '0', '0', '0', '0', '0', '0', '138.21', '-70.24', '0', '0', '0', '0', '0.00'),
(36, 16, 'Homerun', '3034777', '0', '-43628.33', '-43456.04', '-121.6', '0', '0', '0', '-50.69', '0', NULL, '0', '0', '1781.27', '1730.58', '12.16', '0', '0', '1718.42', '0', '0', '0', '0', '0', '0', '50.69', '0', '0', '0', '0', '0', '0.00'),
(37, 16, 'THE POKER ASYLUM', '1217549', '0', '-3028.59', '-2570.97', '-431.06', '0', '0', '0', '-26.56', '0', NULL, '45.6', '0', '1327.48', '1300.92', '343.87', '63.85', '0', '893.2', '0', '0', '0', '0', '0', '0', '49.34', '-22.78', '0', '45.6', '-45.6', '0', '45.60'),
(38, 16, 'MAYBАСH', '4041799', '0', '4444.3', '4565.74', '0', '0', '0', '0', '-121.44', '0', NULL, '0', '0', '2744.21', '2622.77', '0', '0', '0', '2622.77', '0', '0', '0', '0', '0', '0', '149.68', '-28.24', '0', '0', '0', '0', '0.00'),
(39, 16, 'SASHIMI', '3000686', '0', '-1553.84', '-496.1', '-1055.29', '0', '0', '0', '-2.45', '0', NULL, '0', '0', '233.11', '230.66', '179.36', '0.2', '0', '51.1', '0', '0', '0', '0', '0', '0', '9.31', '-6.86', '0', '0', '0', '0', '0.00'),
(40, 16, 'Vancouver Canucks', '3010722', '0', '-138.86', '-92.5', '-46.36', '0', '0', '0', '0', '0', NULL, '0', '0', '10.88', '10.88', '5.32', '0', '0', '5.56', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_record`
--

CREATE TABLE `weekly_record` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `create_at` date NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weekly_record`
--

INSERT INTO `weekly_record` (`id`, `title`, `create_at`, `created_at`) VALUES
(1, '2025/05/05 \n - \n 2025/05/11\nUTC +1000', '2025-05-14', '2025-05-14 16:26:55'),
(2, '2025/05/05 \n - \n 2025/05/11\nUTC +1000', '2025-05-14', '2025-05-14 16:26:55'),
(3, '2025/05/05 \n - \n 2025/05/11\nUTC +1000', '2025-05-14', '2025-05-14 16:26:55'),
(4, 'Import from 2025-05-14 13:41:27', '0000-00-00', '2025-05-14 16:41:27'),
(5, 'Import from 2025-05-14 13:42:27', '0000-00-00', '2025-05-14 16:42:27'),
(6, 'Import from 2025-05-14 13:43:38', '0000-00-00', '2025-05-14 16:43:38'),
(7, 'Import from 2025-05-14 14:02:54', '0000-00-00', '2025-05-14 17:02:54'),
(8, 'Unknown Date Range', '0000-00-00', '2025-05-14 17:57:09'),
(9, 'Unknown Date Range', '0000-00-00', '2025-05-14 18:14:45'),
(10, 'Unknown Date Range', '0000-00-00', '2025-05-14 18:35:20'),
(11, 'Unknown Date Range', '0000-00-00', '2025-05-14 19:52:28'),
(12, 'Unknown Date Range', '0000-00-00', '2025-05-14 23:25:54'),
(13, 'Unknown Date Range', '0000-00-00', '2025-05-15 15:57:43'),
(14, 'Unknown Date Range', '0000-00-00', '2025-05-15 15:58:55'),
(15, 'Unknown Date Range', '0000-00-00', '2025-05-15 16:12:09'),
(16, 'Unknown Date Range', '0000-00-00', '2025-05-15 16:13:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `union_overall`
--
ALTER TABLE `union_overall`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_weekly_record` (`weekly_record_id`);

--
-- Indexes for table `weekly_record`
--
ALTER TABLE `weekly_record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_in`
--
ALTER TABLE `log_in`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `union_overall`
--
ALTER TABLE `union_overall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `weekly_record`
--
ALTER TABLE `weekly_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
