-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 07:15 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h2order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `photo`) VALUES
(63, 'Dave Bryan Sevilla', 'admin', 'admin', 'admin.jfif'),
(64, 'Dave Bryan Sevilla', 'admin2', 'admin2', 'admin.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcement_id`, `admin_id`, `message`, `date`) VALUES
(1, 0, 'sadasdhua dahsdhasdas dashudhasuda bdhasdhas dbshadbhsa dsahduhas dhsahdsad sbdhasbdha dhabdhas bdhsabhdsabhdsa bsahdbhabdhsabd bdhasbdhasbhda bdhasbdhabdhabdhas bdhsabdhasbhdasbdsa bdhasbdhasbdhasbdhsa dbhsabdhasbdhasb bdhsabdhsabdhsabhda bdhsabdhabdhas ', '2022-03-01 14:19:04'),
(2, 0, '  dasYes, I am not sure how to build the link string that would pass the prop_id=[current_id_value] variable. I typed the prop_id=5 as an example, technically it could be any number. I am guessing there is a way to get the variable from the MySQL database, but once I get it, how do it build the link. Thanks again :)vsadsabdhsabhdashdvasvdgavda dgashsdghag dgashgdha d ghasgdhaj d', '2022-03-02 10:37:10'),
(3, 0, '  hi', '2022-03-01 12:26:57'),
(7, 0, '      dasdas                      ', '2022-03-18 12:52:51'),
(8, 0, '                            ', '2022-06-07 05:22:01'),
(9, 63, 'hello', '2022-06-13 04:59:39'),
(10, 63, '                            dada', '2022-06-13 05:02:57'),
(11, 63, '     dsandasdjanjd                       ', '2022-06-13 05:03:30'),
(12, 64, 'sandnasjdsa                            ', '2022-06-13 05:04:01'),
(13, 64, 'announcement                ', '2022-06-13 05:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `number_of_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `c_latitude` varchar(255) NOT NULL,
  `c_longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `username`, `password`, `firstname`, `lastname`, `address`, `barangay`, `email`, `contact_number`, `c_latitude`, `c_longitude`) VALUES
(1, 'qwerty', 'qwerty', 'Dave Bryan', 'Sevilla', '', 'Brgy.4', 'davebryan.sevilla@gmail.com', '095573505515', '14.073360911642', '120.63532887761305'),
(2, 'dave', '111', 'Dave', 'Sevilla ', '', 'Brgy.4', 'davebryansevilla@gmail.com', '09051934015', '14.077771243464303', '120.62597990254564'),
(3, 'dave', '111', 'Dave', 'Sevilla ', '', 'Brgy.4', 'davebryansevilla@gmail.com', '09051934015', '', ''),
(5, 'devs', '1', 'Dave Bryan', 'Sevilla', '120 C. Alvarez St.', 'Brgy.4', 'davebryan.sevilla@g.batstate-u.edu.ph', '09051934015', '14.3842', '120.884'),
(6, 'dave2312', 'Dave1212', 'Dave Bryan', 'Sevilla', '', 'Brgy.8', 'davebryan.sevilla@yahoo.com', '09051934015', '14.2990183', '120.9589699'),
(7, 'dssda', 'Dave1212', 'Dave', 'Sevilla', 'Brgy.4 Nasugbu, Batangas', 'Brgy.11', 'davebryan.sevilla@g.batstate-u.edu.ph', '9051934013', '14.3114', '121.0554');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `deliveryman_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `plate_number` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `vaccination_status` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `d_latitude` varchar(255) NOT NULL,
  `d_longitude` varchar(255) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`deliveryman_id`, `merchant_id`, `name`, `username`, `password`, `plate_number`, `contact_number`, `status`, `vaccination_status`, `photo`, `d_latitude`, `d_longitude`, `last_update`) VALUES
(1, 23, 'Alvin Hila', 'del1', 'del1', 'ALV213', '09554395551', 'available', 'Unvaccinated', 'vcard.jpeg', '14.07107871891088', '120.63181929983404', '2022-08-24 02:52:36'),
(2, 23, 'Rod Sevilla', 'rod', '123', 'KMR442', '09051934015', 'available', 'Unvaccinated', 'vcard.jpeg', '14.3842', '120.884', '2022-08-22 01:04:18'),
(3, 1, 'Ivane Kielle Rangel', 'dave', 'Dave1212', 'KSDS23', '09051934015', 'available', 'Unvaccinated', 'vcard.jpeg', '14.2990183', '120.9589699', '2022-08-22 01:04:18'),
(4, 23, 'da', 'ds', '1', 'sda', '34342343534', 'available', 'Unvaccinated', 'vcard.jpeg', '14.3114', '121.0554', '2022-08-22 01:04:18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `criteria1` int(11) NOT NULL,
  `criteria2` int(11) NOT NULL,
  `criteria3` int(11) NOT NULL,
  `criteria4` int(11) NOT NULL,
  `criteria5` int(11) NOT NULL,
  `criteria6` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `admin_id`, `merchant_id`, `criteria1`, `criteria2`, `criteria3`, `criteria4`, `criteria5`, `criteria6`, `date`) VALUES
(1, 63, 1, 5, 0, 5, 5, 0, 0, '2022-07-07'),
(2, 63, 1, 5, 0, 5, 0, 5, 0, '2022-07-07'),
(3, 63, 23, 5, 5, 5, 5, 5, 5, '2022-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE `inspection` (
  `inspection_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inspection`
--

INSERT INTO `inspection` (`inspection_id`, `admin_id`, `merchant_id`, `date`, `file`, `status`) VALUES
(1, 63, 5, '2022-06-13 04:20:47', 'merchants_and_admin.docx', 'Passed'),
(2, 63, 2, '2022-06-13 04:21:19', 'merchants_and_admin.docx', 'Passed'),
(3, 63, 2, '2022-06-13 04:23:56', 'merchants_and_admin.docx', 'Passed'),
(4, 63, 23, '2022-06-13 04:24:16', 'merchants_and_admin.docx', 'Passed'),
(5, 63, 1, '2022-06-13 04:24:38', 'merchants_and_admin.docx', 'Passed'),
(6, 63, 5, '2022-06-13 04:52:32', 'merchants_and_admin.docx', 'Passed'),
(7, 63, 5, '2022-06-13 04:53:30', 'merchants_and_admin.docx', 'Passed'),
(8, 63, 1, '2022-06-13 04:53:46', 'merchants_and_admin.docx', 'Passed'),
(9, 64, 16, '2022-06-13 05:01:26', 'merchants_and_admin.docx', 'Passed'),
(10, 0, 1, '2022-06-13 05:02:25', 'merchants_and_admin.docx', 'Passed'),
(11, 64, 8, '2022-06-13 05:09:24', 'merchants_and_admin.docx', 'Passed'),
(12, 64, 1, '2022-06-13 05:12:29', 'merchants_and_admin.docx', 'Passed');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchant_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `opening` time NOT NULL,
  `closing` time NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchant_id`, `username`, `password`, `business_name`, `owner`, `address`, `barangay`, `email`, `contact_number`, `image`, `latitude`, `longitude`, `opening`, `closing`, `status`) VALUES
(1, 'merchant', 'merchant', '4J and L Water Refilling Station', 'Dave Bryan Sevilla', 'Sitio Pandan', 'Brgy.Cogunan', '4jandl@gmail.com', '09557350551', '1.png', '14.073130', '120.656290', '08:00:00', '17:00:00', 'approved'),
(2, 'merchant2', 'merchant2', 'A JAI\'S Water Refilling Station', 'Ivane Kielle Rangel', 'San Roque St.', 'Brgy.7', 'ivanekielle_rangel@g.batstate-u.edu.ph', '09557350551', '2.png', '14.071156770766416', '120.63509166240694', '08:00:00', '17:00:00', 'approved'),
(3, 'merchant3', 'merchant3', 'AA Water Mart Water Refilling Station', 'Kurt Michael Relano', '', 'Brgy.Malapad Na Bato', 'aawater@gmail.com', '09557350551', '3.png', '14.103644840341484', '120.68108081817628', '08:00:00', '17:00:00', 'approved'),
(4, 'merchant4', 'merchant4', 'AC And P Water Refilling Station', 'Dave Bryan Sevilla', 'Sitio Palico', 'Brgy.Bilaran', 'acandp@gmail.com', '09557350551', '4.png', '14.049470', '120.683260', '08:00:00', '17:00:00', 'approved'),
(5, 'merchant5', 'merchant5', 'Agua De Bucana', 'Ivane Kielle Rangel', 'Apacible bldv.', 'Brgy.Bucana', 'agua@gmail.com', '09557350551', '5.png', '14.069356367849482', '120.62581121921541', '08:00:00', '17:00:00', 'approved'),
(6, 'merchant6', 'merchant6', 'Agua Nonay Water Refilling Station', 'Kurt Michael Relano', '', 'Brgy.Wawa', 'aguanonay@gmail.com', '09557350551', '6.png', '14.082614493969142', '120.6243145465851', '08:00:00', '17:00:00', 'approved'),
(7, 'merchant7', 'merchant7', 'Alcoreza Water Refilling Station', 'Dave Bryan Sevilla', 'Role subd.', 'Brgy.Lumbangan', 'alcoreza@gmail.com', '09557350551', '7.png', '14.05253804679096', '120.66859245300294', '08:00:00', '17:00:00', 'approved'),
(8, 'merchant8', 'merchant8', 'Alfred and Wesly Water Refilling Station', 'Ivane Kielle Rangel', '151 R. Vasquez St.', 'Brgy.5', 'alfredandwesly@gmail.com', '09557350551', '8.png', '14.07353994125857', '120.63633084297182', '08:00:00', '17:00:00', 'approved'),
(9, 'merchant9', 'merchant9', 'Alkamax and Water Refilling Station', 'Kurt Michael Relano', '#14 IP Roxas St.', 'Brgy.8', 'alkamax@gmail.com', '09557350551', '9.png', '14.069252297883242', '120.6342923641205', '08:00:00', '17:00:00', 'approved'),
(10, 'merchant10', 'merchant10', 'Aqua Balbuena Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Lumbangan', 'aquabalbuena@gmail.com', '09557350551', '10.png', '14.05153889970913', '120.66751956939699', '08:00:00', '17:00:00', 'approved'),
(11, 'merchant11', 'merchant11', 'Aqua Bro Water Refilling Station', 'Ivane Kielle Rangel', 'F. Alix St.', 'Brgy.4', 'aquabro@gmail.com', '09557350551', '11.png', '14.071854032826815', '120.63593387603761', '08:00:00', '17:00:00', 'approved'),
(12, 'merchant13', 'merchant13', 'Aqua Kabayan Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Lumbangan', 'aquakabayan@gmail.com', '09557350551', '13.png', '14.051747055710802', '120.67249774932863', '08:00:00', '17:00:00', 'approved'),
(13, 'merchant12', 'merchant12', 'AQUA J\'S Water Refilling Station', 'Kurt Michael Relano', 'P.Hugo St.', 'Brgy.6', 'aquaj@gmail.com', '09557350551', '12.png', '14.069689391423148', '120.63765048980714', '08:00:00', '17:00:00', 'approved'),
(14, 'merchant14', 'merchant14', 'Aqua Regina Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.Kaylaway', 'aquaregina@gmail.com', '09557350551', '14.png', '14.098660', '120.820260', '08:00:00', '17:00:00', 'approved'),
(15, 'merchant15', 'merchant15', 'Aqua Richea Purified Drinking Water', 'Kurt Michael Relano', 'J.P. Laurel St.', 'Brgy.11', 'aquarichea@gmail.com', '09557350551', '15.png', '14.061217953517005', '120.6347966194153', '08:00:00', '17:00:00', 'approved'),
(16, 'merchant16', 'merchant16', 'AQUA Waves Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Wawa', 'aquawaves@gmail.com', '09557350551', '16.png', '14.080928652493204', '120.6251084804535', '08:00:00', '17:00:00', 'approved'),
(17, 'merchant17', 'merchant17', 'Aqualette Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.Bulihan', 'aqualette@gmail.com', '09557350551', '17.png', '14.154719376688389', '120.65580368041994', '08:00:00', '17:00:00', 'approved'),
(18, 'merchant18', 'merchant18', 'Aquapego Water Refilling Station', 'Kurt Michael Relano', 'Tanigue St.', 'Brgy.Wawa', 'aquapego@gmail.com', '09557350551', '18.png', '14.079024261045346', '120.62503337860109', '08:00:00', '17:00:00', 'approved'),
(19, 'merchant19', 'merchant19', 'Arnold Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Bunducan', 'arnold@gmail.com', '09557350551', '19.png', '14.094623152765438', '120.64756393432619', '08:00:00', '17:00:00', 'approved'),
(20, 'merchant20', 'merchant20', 'AVS Water Refilling Station', 'Ivane Kielle Rangel', 'R. Martinez St.', 'Brgy.11', 'avs@gmail.com', '09557350551', '20.png', '14.06290394037176', '120.63666343688966', '08:00:00', '17:00:00', 'approved'),
(21, 'merchant21', 'merchant21', 'Blue Sprinkle Water Refilling Station', 'Kurt Michael Relano', 'F. Alix St.', 'Brgy.4', 'blue@gmail.com', '09557350551', '21.png', '14.071791591534977', '120.63460350036623', '08:00:00', '17:00:00', 'approved'),
(22, 'merchant22', 'merchant22', 'BTC Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Latag', 'btc@gmail.com', '09557350551', '22.png', '14.12275881667497', '120.7196617126465', '08:00:00', '17:00:00', 'approved'),
(23, 'merchant23', 'merchant23', 'CHALISSE ENTERPRICE', 'Rose Marie Olguera', 'J.P. Laurel St.', 'Brgy.9', 'chalisse@gmail.com', '09557350551', '23.png', '14.06849047176576', '120.63301221201581', '08:00:00', '17:00:00', 'approved'),
(24, 'merchant24', 'merchant24', 'CLANVENTURES CO.', 'Dave Bryan Sevilla', 'J.P. Laurel St.', 'Brgy.2', 'clanventures@gmail.com', '09557350551', '24.png', '14.077837910806906', '120.63066601753236', '08:00:00', '17:00:00', 'approved'),
(25, 'merchant25', 'merchant25', 'Cloud Water Refilling Station', 'Ivane Kielle Rangel', 'F. Castro St.', 'Brgy.1', 'cloud@gmail.com', '09557350551', '25.png', '14.07471590706138', '120.63041925430299', '08:00:00', '17:00:00', 'approved'),
(26, 'merchant26', 'merchant26', 'Crisp And Clear Water Refilling Station', 'Ivane Kielle Rangel', '143 Margarita St.', 'Brgy.7', 'crisp@gmail.com', '09557350551', '26.png', '14.070043228438614', '120.63466787338258', '08:00:00', '17:00:00', 'approved'),
(27, 'merchant27', 'merchant27', 'CRYSTAL-VESI Water Refilling Station', 'Dave Bryan Sevilla', '119 C. Alvarez St.', 'Brgy.4', 'crystal@gmail.com', '09557350551', '27.png', '14.073040414130764', '120.63506484031679', '08:00:00', '17:00:00', 'approved'),
(28, 'merchant28', 'merchant28', 'Daniel Ycel Purely Water', 'Kurt Michael Relano', '', 'Brgy.Reparo', 'daniel@gmail.com', '09557350551', '28.png', '14.070050', '120.690450', '08:00:00', '17:00:00', 'approved'),
(29, 'merchant29', 'merchant29', 'Dayap Water Station', 'Ivane Kielle Rangel', '', 'Brgy.Dayap', 'Dayap@gmail.com', '09557350551', '29.png', '14.081802794070986', '120.659236907959', '08:00:00', '17:00:00', 'approved'),
(30, 'merchant30', 'merchant30', 'Double A Refilling Station', 'Dave Bryan Sevilla', 'J.P. Laurel St.', 'Brgy.2', 'double@gmail.com', '09557350551', '30.png', '14.077130260363147', '120.63120245933534', '08:00:00', '17:00:00', 'approved'),
(31, 'merchant31', 'merchant31', 'EBB Alkaviva Water Refilling Station', 'Ivane Kielle Rangel', '144 P. Roxas St.', 'Brgy.6', 'ebb@gmail.com', '09557350551', '31.png', '14.069481251746462', '120.63556909561159', '08:00:00', '17:00:00', 'approved'),
(32, 'merchant32', 'merchant32', 'ELARO Water Refilling Station', 'Ivane Kielle Rangel', 'Miralles Subd.', 'Brgy.Wawa', 'elora@gmail.com', '09557350551', '32.png', '14.078743283914026', '120.62610626220705', '08:00:00', '17:00:00', 'approved'),
(33, 'merchant33', 'merchant33', 'Enryline Water Refilling Station', 'Dave Bryan Sevilla', 'Sitio Asis', 'Brgy.Kalaway', 'enryline@gmail.com', '09557350551', '33.png', '14.098119489254504', '120.82077026367188', '08:00:00', '17:00:00', 'approved'),
(34, 'merchant34', 'merchant34', 'Four M. Purified Water Refilling Station', 'Kurt Michael Relano', '', 'Brgy.Lumbangan', 'fourm@gmail.com', '09557350551', '34.png', '14.048166746114305', '120.66884994506837', '08:00:00', '17:00:00', 'approved'),
(35, 'merchant35', 'merchant35', 'Golden Drops Purified Drinking Water', 'Kurt Michael Relano', '', 'Brgy.Balaytigue', 'golden@gmail.com', '09557350551', '35.png', '14.132247576582762', '120.59881210327148', '08:00:00', '17:00:00', 'approved'),
(36, 'merchant36', 'merchant36', 'Golden Drops Purified Drinking Water', 'Dave Bryan Sevilla', '124 Margarita St.', 'Brgy.7', 'golden@gmail.com', '09557350551', '36.png', '14.0712504329579', '120.63436746597291', '08:00:00', '17:00:00', 'approved'),
(37, 'merchant37', 'merchant37', 'Golden Drops Purified Water', 'Kurt Michael Relano', '', 'Brgy.Balaytigue', 'goldendrops@gmail.com', '09557350551', '37.png', '14.127003837104212', '120.59640884399415', '08:00:00', '17:00:00', 'approved'),
(38, 'merchant38', 'merchant38', 'Golden Drops Refilling', 'Kurt Michael Relano', 'C. Alvarez St.', 'Brgy.Bucana', 'goldendropss@gmail.com', '09557350551', '38.png', '14.071354502014527', '120.62664270401002', '08:00:00', '17:00:00', 'approved'),
(39, 'merchant39', 'merchant39', 'Gracious Haven-Water Station', 'Dave Bryan Sevilla', '', 'Brgy.Lumbangan', 'gracious@gmail.com', '09557350551', '39.png', '14.054911003631195', '120.6731414794922', '08:00:00', '17:00:00', 'approved'),
(40, 'merchant40', 'merchant40', 'H and A Water Refilling Station', 'Kurt Michael Relano', 'J.P. Laurel St.', 'Brgy.Wawa', 'handa@gmail.com', '09557350551', '40.png', '14.08387366374372', '120.62349915504457', '08:00:00', '17:00:00', 'approved'),
(41, 'merchant41', 'merchant41', 'H2O4U Water Refilling Station', 'Kurt Michael Relano', 'Villafranca Subd.', 'Brgy.Talangan', 'h2o4u@gmail.com', '09557350551', '41.png', '14.079419709755834', '120.63545107841493', '08:00:00', '17:00:00', 'approved'),
(42, 'merchant44', 'merchant44', 'Herra Water Refilling Station', 'Dave Bryan Sevilla', 'Sitio Pooc', 'Brgy.Talangan', 'herra@gmail.com', '09557350551', '44.png', '14.079596620799448', '120.68262577056886', '08:00:00', '17:00:00', 'approved'),
(43, 'merchant42', 'merchant42', 'Heaven\'s Flow Water Refilling Station', 'Ivane Kielle Rangel', 'J.P. Laurel St.', 'Brgy.Wawa', 'heavens@gmail.com', '09557350551', '42.png', '14.081261659202998', '120.62514066696168', '08:00:00', '17:00:00', 'approved'),
(44, 'merchant43', 'merchant43', 'Heaven\'s Flow Water Refilling Station', 'Ivane Kielle Rangel', 'J.P. Laurel St.', 'Brgy.2', 'heavens@gmail.com', '09557350551', '43.png', '14.075725359605286', '120.63162088394165', '08:00:00', '17:00:00', 'approved'),
(45, 'merchant45', 'merchant45', 'Hydrozest Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Kaylaway', 'hydrozest@gmail.com', '09557350551', '45.png', '14.101615772160638', '120.81785202026369', '08:00:00', '17:00:00', 'approved'),
(46, 'merchant46', 'merchant46', 'Inuman sa Pulo Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.Kaylaway', 'inuman@gmail.com', '09557350551', '46.png', '14.090127784279323', '120.82334518432619', '08:00:00', '17:00:00', 'approved'),
(47, 'merchant47', 'merchant47', 'IRA SELENA WATER STATION', 'Kurt Michael Relano', '', 'Brgy.Latag', 'ira@gmail.com', '09557350551', '47.png', '14.11393557990032', '120.72017669677736', '08:00:00', '17:00:00', 'approved'),
(48, 'merchant48', 'merchant48', 'JADEN\'S Purified Water Refilling Station', 'Ivane Kielle Rangel', 'Lapu-Lapu St.', 'Brgy.Wawa', 'jaden@gmail.com', '09557350551', '48.png', '14.081969296849364', '120.62310218811037', '08:00:00', '17:00:00', 'approved'),
(49, 'merchant49', 'merchant49', 'JAY AR Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.Putat', 'jadens@gmail.com', '09557350551', '49.png', '14.083384565564947', '120.66747665405275', '08:00:00', '17:00:00', 'approved'),
(50, 'merchant50', 'merchant50', 'Jazz and Javy Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.Natipuan', 'jazz@gmail.com', '09557350551', '50.png', '14.098036243770276', '120.62293052673341', '08:00:00', '17:00:00', 'approved'),
(51, 'merchant51', 'merchant51', 'Joemarie Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Bulihan', 'joemarie@gmail.com', '09557350551', '51.png', '14.156799986546536', '120.64739227294923', '08:00:00', '17:00:00', 'approved'),
(52, 'merchant52', 'merchant52', 'Joshua N Angel\'s Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Cogunan', 'joshua@gmail.com', '09557350551', '52.png', '14.068565434917879', '120.66421508789064', '08:00:00', '17:00:00', 'approved'),
(53, 'merchant53', 'merchant53', 'JSKY Water Refilling Station', 'Dave Bryan Sevilla', 'Miralles Subd.', 'Brgy.Talangan', 'joshua@gmail.com', '09557350551', '53.png', '14.076786840975556', '120.63612699508668', '08:00:00', '17:00:00', 'approved'),
(54, 'merchant54', 'merchant54', 'Kely and Luis Water Refilling Station', 'Ivane Kielle Rangel', 'Manggahan', 'Brgy.Putat', 'kely@gmail.com', '095', '54.png', '14.084466823959307', '120.67408561706544', '08:00:00', '17:00:00', 'approved'),
(55, 'merchant55', 'merchant55', 'La Nostra Acqua Station', 'Ivane Kielle Rangel', '', 'Brgy.Banilad', 'nostra@gmail.com', '09557350551', '55.png', '14.06781612751137', '120.73425292968751', '08:00:00', '17:00:00', 'approved'),
(56, 'merchant56', 'merchant56', 'M and Tony\'s Water Refilling Station', 'Kurt Michael Relano', 'Sitio Katorse', 'Brgy.Bilaran', 'tony@gmail.com', '09557350551', '56.png', '14.054994264827949', '120.68472862243654', '08:00:00', '17:00:00', 'approved'),
(57, 'merchant57', 'merchant57', 'Madel and Audrian\'s Water Refilling Station', 'Kurt Michael Relano', 'J.P.Laurel St.', 'Brgy.9', 'madel@gmail.com', '09557350551', '57.png', '14.067899384011142', '120.63310146331789', '08:00:00', '17:00:00', 'approved'),
(58, 'merchant58', 'merchant58', 'Magsi Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Pantalan', 'magsi@gmail.com', '09557350551', '58.png', '14.08646482598144', '120.63183546066286', '08:00:00', '17:00:00', 'approved'),
(59, 'merchant59', 'merchant59', 'Mayari\'s Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.Tumalim', 'mayari@gmail.com', '09557350551', '59.png', '14.084799825510343', '120.73365211486818', '08:00:00', '17:00:00', 'approved'),
(60, 'merchant60', 'merchant60', 'Mizu Water Refilling Station', 'Ivane Kielle Rangel', 'C.Alvarez St.', 'Brgy.Tumalim ', 'mizui@gmail.com', '09557350551', '60.png', '14.071999729108096', '120.62993645668031', '08:00:00', '17:00:00', 'approved'),
(61, 'merchant61', 'merchant61', 'MJGuevarra Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Looc', 'mjguevarra@gmail.com', '09557350551', '61.png', '14.161876594615267', '120.63134193420412', '08:00:00', '17:00:00', 'approved'),
(62, 'merchant62', 'merchant62', 'MMW Water Refilling Station', 'Ivane Kielle Rangel', 'F. Alix St.', 'Brgy.7', 'mmw@gmail.com', '09557350551', '62.png', '14.071739557112085', '120.63545107841493', '08:00:00', '17:00:00', 'approved'),
(63, 'merchant63', 'merchant63', 'MSBautista Purified Waterstation', 'Ivane Kielle Rangel', '', 'Brgy.Calayo', 'msbautista@gmail.com', '09557350551', '63.png', '14.153304551100584', '120.61331748962404', '08:00:00', '17:00:00', 'approved'),
(64, 'merchant64', 'merchant64', 'Pantalan Water Refilling Station', 'Kurt Michael Relano', '', 'Brgy.Pantalan', 'pantalan@gmail.com', '09557350551', '64.png', '14.085132826575784', '120.63297271728517', '08:00:00', '17:00:00', 'approved'),
(65, 'merchant65', 'merchant65', 'PB APAC 8 Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.Munting Indang', 'pbapac@gmail.com', '09557350551', '65.png', '14.088795806243636', '120.69150924682619', '08:00:00', '17:00:00', 'approved'),
(66, 'merchant66', 'merchant66', 'PerfectBliss Water Refilling Station', 'Dave Bryan Sevilla', 'Victoriaville Subd.', 'Brgy.Bilaran', 'perfect@gmail.com', '09557350551', '66.png', '14.05033159116703', '120.68893432617189', '08:00:00', '17:00:00', 'approved'),
(67, 'merchant67', 'merchant67', 'Philzen Water Refilling Station', 'Kurt Michael Relano', 'C. Alvarez St.', 'Brgy.3', 'philzen@gmail.com', '09557350551', '67.png', '14.071843625946023', '120.62915325164796', '08:00:00', '17:00:00', 'approved'),
(68, 'merchant68', 'merchant68', 'Pocono Water Refilling Station', 'Kurt Michael Relano', 'J.P. Laurel St.', 'Brgy.11', 'pocono@gmail.com', '09557350551', '68.png', '14.06194646788018', '120.63451766967775', '08:00:00', '17:00:00', 'approved'),
(69, 'merchant69', 'merchant69', 'Poseidone CL Water Refilling Station', 'Kurt Michael Relano', 'Sitio Pasong Kawayan', 'Brgy.Banilad', 'poseidon@gmail.com', '09557350551', '69.png', '14.075392344825943', '120.73948860168458', '08:00:00', '17:00:00', 'approved'),
(70, 'merchant70', 'merchant70', 'Rainzen Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.3', 'rain@gmail.com', '09557350551', '70.png', '14.071552233091587', '120.62942147254945', '08:00:00', '17:00:00', 'approved'),
(71, 'merchant71', 'merchant71', 'Remle Purified Water Refilling Station', 'Dave Bryan Sevilla', '', 'Brgy.Looc', 'remle@gmail.com', '09557350551', '71.png', '14.165746391745595', '120.6300973892212', '08:00:00', '17:00:00', 'approved'),
(72, 'merchant72', 'merchant72', 'Renvic Purified Drinking Water Station', 'Kurt Michael Relano', 'ACM Woodstuck Homes', 'Brgy.12', 'renvic@gmail.com', '09557350551', '72.png', '14.066796232928983', '120.63608407974245', '08:00:00', '17:00:00', 'approved'),
(73, 'merchant73', 'merchant73', 'Rocky-Valley Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.12', 'rocky@gmail.com', '09557350551', '73.png', '14.066728586698872', '120.63401877880098', '08:00:00', '17:00:00', 'approved'),
(74, 'merchant74', 'merchant74', 'Ronsan Water Refilling Station', 'Kurt Michael Relano', 'Bayabasan', 'Brgy.Aga', 'ronsan@gmail.com', '09557350551', '74.png', '14.088462810520381', '120.77622413635255', '08:00:00', '17:00:00', 'approved'),
(75, 'merchant75', 'merchant75', 'Second Element Water Station', 'Dave Bryan Sevilla', 'Escalera St.', 'Brgy.1', 'second@gmail.com', '09557350551', '75.png', '14.073477500427302', '120.63100934028627', '08:00:00', '17:00:00', 'approved'),
(76, 'merchant76', 'merchant76', 'Senior Alberto Water Refilling Station', 'Kurt Michael Relano', '', 'Brgy.Balaytigue', 'alberto@gmail.com', '09557350551', '76.png', '14.130166742041618', '120.60396194458009', '08:00:00', '17:00:00', 'approved'),
(77, 'merchant77', 'merchant77', 'Sofiah Water Refilling Station', 'Kurt Michael Relano', '', 'Brgy.Bunducan', 'sofiah@gmail.com', '09557350551', '77.png', '14.093832307320639', '120.64518213272096', '08:00:00', '17:00:00', 'approved'),
(78, 'merchant78', 'merchant78', 'St. Jerome Mineral and Alkaline Water Station', 'Dave Bryan Sevilla', 'Victoria Ville', 'Brgy.Bilaran', 'jerome@gmail.com', '09557350551', '78.png', '14.046813707562654', '120.68584442138673', '08:00:00', '17:00:00', 'approved'),
(79, 'merchant79', 'merchant79', 'Stream Purified Drinking Water', 'Ivane Kielle Rangel', '', 'Brgy.Cogunan', 'stream@gmail.com', '09557350551', '79.png', '14.05949032446717', '120.66091060638429', '08:00:00', '17:00:00', 'approved'),
(80, 'merchant80', 'merchant80', 'Thirteen Coves Purified Drinking Water Station', 'Dave Bryan Sevilla', '', 'Brgy.Papaya', 'thirteen@gmail.com', '09557350551', '80.png', '14.175940702739993', '120.61305999755861', '08:00:00', '17:00:00', 'approved'),
(81, 'merchant81', 'merchant81', 'Vane and Kyla Water Refilling Station', 'Ivane Kielle Rangel', '', 'Brgy.Looc', 'vane@gmail.com', '09557350551', '81.png', '14.162916869143384', '120.63224315643312', '08:00:00', '17:00:00', 'approved'),
(82, 'merchant82', 'merchant82', 'Water Eh Purified Drinking Water Station', 'Dave Bryan Sevilla', '', 'Brgy.Aga', 'watereh@gmail.com', '09557350551', '82.png', '14.09845247088766', '120.80257415771486', '08:00:00', '17:00:00', 'approved'),
(83, 'merchant83', 'merchant83', 'WATERLEAH Water Refilling Station', 'Kurt Michael Relano', 'F. Alix St. Cor Zalbadea', 'Brgy.6', 'waterleah@gmail.com', '09557350551', '83.png', '14.071625081340018', '120.63803672790529', '08:00:00', '17:00:00', 'approved'),
(84, 'merchant84', 'merchant84', 'WINTERFELL Purified Drinking Water', 'Ivane Kielle Rangel', '', 'Brgy.Looc', 'winterfell@gmail.com', '09557350551', '84.png', '14.165059819648738', '120.63207149505617', '08:00:00', '17:00:00', 'approved'),
(85, 'merchant85', 'merchant85', 'Yanny\'s Purified Drinking Water', 'Kurt Michael Relano', 'KM 82 Sitio Kaybibisaya', 'Brgy.Aga', 'yanny@gmail.com', '09557350551', '85.png', '14.097495147382407', '120.80332517623901', '08:00:00', '17:00:00', 'approved'),
(86, 'merchant123', '1', 'Tubig Tubig G', 'Dave Bryan Sevilla', '', 'Brgy.4', 'davebryan.sevilla@g.batstate-u.edu.ph', '09051934015', '5.png', '14.3842', '120.884', '08:00:00', '17:00:00', 'approved'),
(87, 'dave1', '1', 'wawater G', 'dave', '', 'Brgy.4', 'davebryan.sevilla@g.batstate-u.edu.ph', '905193401', '1.png', '14.073098', '120.635284', '08:00:00', '17:00:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `deliveryman_id` int(11) DEFAULT NULL,
  `status` text NOT NULL,
  `quantity` text NOT NULL,
  `total` int(11) NOT NULL,
  `type` text,
  `photo` text,
  `receipt` varchar(255) NOT NULL,
  `receipt_status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`order_id`, `product_id`, `customer_id`, `merchant_id`, `deliveryman_id`, `status`, `quantity`, `total`, `type`, `photo`, `receipt`, `receipt_status`, `date`) VALUES
(1, 1, 1, 1, 1, 'dispatched', '3', 75, 'cod', NULL, '', '', '2022-07-18 16:00:00'),
(2, 1, 1, 23, 1, 'dispatched', '1', 30, 'cod', NULL, '', '', '2022-07-19 13:35:35'),
(3, 1, 7, 23, 1, 'delivered', '1', 30, 'cod', NULL, '', '', '2022-07-19 13:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `merchant_id`, `product_name`, `product_type`, `volume`, `price`, `image`, `description`) VALUES
(1, 1, 'Aquabest', 'Purified Water', '25 Liters', 25, 'watbg.png', '25 liters'),
(2, 2, 'Round Container', 'Alkaline Water', '25 Liters', 25, 'roundgal.jpg', '5 gallons'),
(3, 2, 'Slim Container', 'Purified Water', '25 Liters', 30, 'images (4).jpeg', '25 liters'),
(4, 1, 'Round Container', 'Mineral Water', '25 Liters', 30, 'roundgal.jpg', '5 gallons'),
(5, 3, 'Slim Container', 'Purified Water', '25 Liters', 25, 'images (4).jpeg', '25 Liters'),
(6, 4, 'Slim Container', 'Purified Water', '25 Liters', 25, 'images (4).jpeg', '25 liters'),
(7, 23, 'Slim Container', 'Purified Water', '25 Liters', 30, 'images (4).jpeg', '25 liters of purified water                    '),
(8, 23, 'Round Container', 'Mineral Water', '25 Liters', 25, 'roundgal.jpg', '20 liters of mineral water                 ');

-- --------------------------------------------------------

--
-- Table structure for table `product_rating`
--

CREATE TABLE `product_rating` (
  `rate_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` varchar(11) NOT NULL,
  `comment` text NOT NULL,
  `w_facemask` varchar(255) NOT NULL,
  `c_uniform` varchar(255) NOT NULL,
  `on_time` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_rating`
--

INSERT INTO `product_rating` (`rate_id`, `customer_id`, `merchant_id`, `product_id`, `rating`, `comment`, `w_facemask`, `c_uniform`, `on_time`, `date`) VALUES
(1, 1, 23, 7, '4', '', '', '', '', '2022-04-07 07:21:55'),
(2, 1, 23, 8, '2', '', '', '', '', '2022-04-07 07:21:17'),
(3, 1, 1, 1, '4', '', '', '', '', '2022-04-07 06:42:37'),
(4, 1, 1, 1, '5', '', '', '', '', '2022-04-07 06:42:28'),
(5, 1, 23, 8, '5', 'Nice', 'Yes', 'Yes', 'Yes', '2022-04-08 01:32:52'),
(6, 1, 23, 8, '3', 'nice', 'Yes', 'Yes', '', '2022-04-08 00:10:18'),
(7, 1, 23, 8, '3', 'nice', 'Yes', 'Yes', 'Yes', '2022-04-08 00:11:32'),
(8, 1, 23, 8, '3', 'nice', 'Yes', 'Yes', 'Yes', '2022-04-08 00:12:30'),
(9, 1, 23, 7, '2', 'dasdas', 'Yes', 'No', 'Yes', '2022-06-06 23:54:59'),
(10, 1, 23, 7, '4', '', 'Yes', 'Yes', 'Yes', '2022-06-07 00:40:20'),
(11, 1, 23, 7, '4', '', 'Yes', 'Yes', 'Yes', '2022-06-07 04:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `deliveryman_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `product_id`, `customer_id`, `merchant_id`, `deliveryman_id`, `quantity`, `total`, `date`) VALUES
(1, 1, 7, 23, 1, 1, 25, '2022-08-20 07:49:33'),
(2, 1, 7, 23, 1, 1, 25, '2022-08-20 07:49:41'),
(3, 1, 1, 1, 1, 3, 75, '2022-08-20 07:49:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`deliveryman_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `inspection`
--
ALTER TABLE `inspection`
  ADD PRIMARY KEY (`inspection_id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_rating`
--
ALTER TABLE `product_rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `deliveryman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inspection`
--
ALTER TABLE `inspection`
  MODIFY `inspection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `merchant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_rating`
--
ALTER TABLE `product_rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
