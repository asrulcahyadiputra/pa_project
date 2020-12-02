-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 02, 2020 at 04:11 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pa_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart_of_account`
--

CREATE TABLE `chart_of_account` (
  `account_no` varchar(20) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `normal_balance` varchar(2) NOT NULL,
  `sub_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chart_of_account`
--

INSERT INTO `chart_of_account` (`account_no`, `account_name`, `normal_balance`, `sub_code`) VALUES
('1-10001', 'Kas', 'd', '1-1'),
('1-10002', 'Piutang Usaha', 'd', '1-1'),
('1-10003', 'Bank Mandiri', 'd', '1-1'),
('1-20001', 'Excavator', 'd', '1-2'),
('1-20002', 'Akumulasi Penyusutan Excavator', 'k', '1-2'),
('1-30001', 'Akta Notaris', 'd', '1-3'),
('2-10001', 'Pendapatan diterima dimuka', 'k', '2-1'),
('2-10002', 'Utang Usaha', 'k', '2-1'),
('3-10001', 'Modal Usaha', 'k', '3-1'),
('3-10002', 'Ekuitas Awal', 'k', '3-1'),
('4-10001', 'Pendapatan Usaha', 'k', '4-1');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` varchar(20) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_company` varchar(100) DEFAULT NULL,
  `client_address` text NOT NULL,
  `client_phone` varchar(13) NOT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `client_company`, `client_address`, `client_phone`, `client_email`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('PL-0001', 'Ir Josephua D.Hutahuruk, M.Sc', '-', 'Jalan Abdullah dg. Sirua BTN CV DEWI blok B2 No 15 Makassar', '081250750057', 'josephua@gmail.com', 1, '2020-11-17 09:51:48', 1, '2020-11-17 09:59:14', NULL, NULL, NULL),
('PL-0002', 'Firdaus Husain', '-', 'Jl Takabonerate No 12 Bukit Baruga Makassar', '085556665587', 'firdaus@gmail.com', 1, '2020-11-24 19:10:36', 1, '2020-11-24 19:10:44', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coa_head`
--

CREATE TABLE `coa_head` (
  `head_code` varchar(20) NOT NULL,
  `head_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coa_head`
--

INSERT INTO `coa_head` (`head_code`, `head_name`) VALUES
('1', 'Aktiva'),
('2', 'Pasiva'),
('3', 'Modal'),
('4', 'Pendapatan'),
('5', 'Beban');

-- --------------------------------------------------------

--
-- Table structure for table `coa_subhead`
--

CREATE TABLE `coa_subhead` (
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(150) NOT NULL,
  `head_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coa_subhead`
--

INSERT INTO `coa_subhead` (`sub_code`, `sub_name`, `head_code`) VALUES
('1-1', 'Aktiva Lancar', '1'),
('1-2', 'Aktiva Tetap', '1'),
('1-3', 'Aktiva Tidak Berwujud', '1'),
('2-1', 'Kewajiban Jangka Pendek', '2'),
('2-2', 'Kewajiban Jangka Panjang', '2'),
('3-1', 'Modal', '3'),
('4-1', 'Pendapatan Usaha', '4'),
('4-2', 'Pendapatan diluar Usaha', '4'),
('5-1', 'Beban Operasional', '5'),
('5-2', 'Beban Lain-lain', '5'),
('5-3', 'Beban diluar Usaha', '5');

-- --------------------------------------------------------

--
-- Table structure for table `general_ledger`
--

CREATE TABLE `general_ledger` (
  `gl_id` bigint(20) NOT NULL,
  `gl_date` date DEFAULT NULL,
  `account_no` varchar(20) NOT NULL,
  `gl_ref` varchar(50) NOT NULL,
  `gl_balance` varchar(1) NOT NULL,
  `gl_nominal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_ledger`
--

INSERT INTO `general_ledger` (`gl_id`, `gl_date`, `account_no`, `gl_ref`, `gl_balance`, `gl_nominal`) VALUES
(1, '2020-11-30', '1-10001', 'TRX-KNT-000000001', 'd', 240000000),
(2, '2020-11-30', '2-10001', 'TRX-KNT-000000001', 'k', 240000000),
(3, '2020-11-30', '1-10001', 'TRX-KNT-000000002', 'd', 195000000),
(4, '2020-11-30', '2-10001', 'TRX-KNT-000000002', 'k', 195000000);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `trans_id`, `nominal`, `description`) VALUES
(3, 'TRX-KNT-000000001', 240000000, 'Down Payment (Dp)'),
(4, 'TRX-KNT-000000002', 195000000, 'Down Payment (Dp)');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `p_method_id` varchar(20) NOT NULL,
  `p_method_name` varchar(100) NOT NULL,
  `p_method_step` int(11) NOT NULL,
  `p_method_total` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`p_method_id`, `p_method_name`, `p_method_step`, `p_method_total`) VALUES
('CB-0001', 'Angsuran 4 Kali', 4, 100),
('CB-0002', 'Angsuran 5 Kali', 5, 100),
('CB-0003', 'Angsuran 6 Kali', 6, 100);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_start` date NOT NULL,
  `project_due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `trans_id`, `project_name`, `project_start`, `project_due_date`) VALUES
(1, 'TRX-KNT-000000001', 'Proyek Pembangunan Rumah 3 Lantai Tn. Josephua', '2020-12-01', '2021-12-01'),
(2, 'TRX-KNT-000000002', 'Proyek Pembangunan Rumah 2 Lantai Tn. Firdaus', '2020-12-10', '2021-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `project_budget`
--

CREATE TABLE `project_budget` (
  `pb_id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `work_id` varchar(20) NOT NULL,
  `pb_unit` varchar(100) NOT NULL,
  `pb_qty_budget` int(11) NOT NULL,
  `pb_qty_realitation` int(11) DEFAULT NULL,
  `pb_unit_price_budget` double NOT NULL,
  `pb_unit_price_realitation` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_budget`
--

INSERT INTO `project_budget` (`pb_id`, `trans_id`, `work_id`, `pb_unit`, `pb_qty_budget`, `pb_qty_realitation`, `pb_unit_price_budget`, `pb_unit_price_realitation`) VALUES
(1, 'TRX-KNT-000000001', 'PK-0001', 'Ls', 1, NULL, 30000, NULL),
(2, 'TRX-KNT-000000001', 'PK-0002', 'M', 49, NULL, 22000, NULL),
(3, 'TRX-KNT-000000001', 'PK-0003', 'BH', 7, NULL, 40000, NULL),
(4, 'TRX-KNT-000000001', 'PK-0004', 'M', 135, NULL, 25000, NULL),
(5, 'TRX-KNT-000000001', 'PK-0005', 'M', 135, NULL, 15000, NULL),
(6, 'TRX-KNT-000000001', 'PK-0006', 'Ls', 1, NULL, 500000, NULL),
(7, 'TRX-KNT-000000001', 'PK-0007', 'Titik', 8, NULL, 800000, NULL),
(8, 'TRX-KNT-000000001', 'PK-0008', 'M', 9, NULL, 275000, NULL),
(9, 'TRX-KNT-000000001', 'PK-0009', 'M', 32, NULL, 290000, NULL),
(10, 'TRX-KNT-000000001', 'PK-0011', 'M', 36, NULL, 130000, NULL),
(11, 'TRX-KNT-000000001', 'PK-0013', 'M', 43, NULL, 165000, NULL),
(12, 'TRX-KNT-000000001', 'PK-0014', 'M', 96, NULL, 110000, NULL),
(13, 'TRX-KNT-000000001', 'PK-0015', 'M', 108, NULL, 60000, NULL),
(14, 'TRX-KNT-000000001', 'PK-0016', 'M', 45, NULL, 600000, NULL),
(15, 'TRX-KNT-000000001', 'PK-0017', 'M', 156, NULL, 160000, NULL),
(16, 'TRX-KNT-000000001', 'PK-0018', 'M', 105, NULL, 160000, NULL),
(17, 'TRX-KNT-000000001', 'PK-0019', 'M', 261, NULL, 50000, NULL),
(18, 'TRX-KNT-000000001', 'PK-0020', 'M', 175, NULL, 63000, NULL),
(19, 'TRX-KNT-000000001', 'PK-0021', 'M', 175, NULL, 45000, NULL),
(20, 'TRX-KNT-000000001', 'PK-0022', 'M', 18, NULL, 25000, NULL),
(21, 'TRX-KNT-000000001', 'PK-0024', 'M', 175, NULL, 45000, NULL),
(22, 'TRX-KNT-000000001', 'PK-0023', 'M', 175, NULL, 63000, NULL),
(23, 'TRX-KNT-000000001', 'PK-0025', 'M', 240, NULL, 25000, NULL),
(24, 'TRX-KNT-000000001', 'PK-0026', 'M', 175, NULL, 40000, NULL),
(25, 'TRX-KNT-000000001', 'PK-0027', 'M', 135, NULL, 60000, NULL),
(26, 'TRX-KNT-000000001', 'PK-0028', 'M', 175, NULL, 160000, NULL),
(27, 'TRX-KNT-000000001', 'PK-0029', 'M', 36, NULL, 165000, NULL),
(28, 'TRX-KNT-000000001', 'PK-0030', 'Set', 1, NULL, 3200000, NULL),
(29, 'TRX-KNT-000000001', 'PK-0031', 'Mata', 3, NULL, 1550000, NULL),
(30, 'TRX-KNT-000000001', 'PK-0032', 'Set', 4, NULL, 1650000, NULL),
(31, 'TRX-KNT-000000001', 'PK-0033', 'Mata', 4, NULL, 1200000, NULL),
(32, 'TRX-KNT-000000001', 'PK-0034', 'Set', 1, NULL, 1600000, NULL),
(33, 'TRX-KNT-000000001', 'PK-0035', 'Set', 1, NULL, 1700000, NULL),
(34, 'TRX-KNT-000000001', 'PK-0036', 'Set', 1, NULL, 2800000, NULL),
(35, 'TRX-KNT-000000001', 'PK-0037', 'Ls', 1, NULL, 2400000, NULL),
(36, 'TRX-KNT-000000001', 'PK-0038', 'Ls', 1, NULL, 2400000, NULL),
(37, 'TRX-KNT-000000001', 'PK-0039', 'Ls', 1, NULL, 400000, NULL),
(38, 'TRX-KNT-000000001', 'PK-0040', 'Ls', 1, NULL, 900000, NULL),
(39, 'TRX-KNT-000000001', 'PK-0041', 'M', 471, NULL, 40000, NULL),
(40, 'TRX-KNT-000000001', 'PK-0042', 'M', 42, NULL, 90000, NULL),
(41, 'TRX-KNT-000000001', 'PK-0043', 'M', 38, NULL, 90000, NULL),
(42, 'TRX-KNT-000000001', 'PK-0044', 'Buah', 2, NULL, 470000, NULL),
(43, 'TRX-KNT-000000001', 'PK-0045', 'Buah', 5, NULL, 35000, NULL),
(44, 'TRX-KNT-000000001', 'PK-0046', 'M', 27, NULL, 600000, NULL),
(45, 'TRX-KNT-000000001', 'PK-0047', 'M', 9, NULL, 600000, NULL),
(46, 'TRX-KNT-000000001', 'PK-0048', 'M', 8, NULL, 900000, NULL),
(47, 'TRX-KNT-000000001', 'PK-0049', 'Ls', 1, NULL, 800000, NULL),
(48, 'TRX-KNT-000000001', 'PK-0050', 'Ls', 1, NULL, 400000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_mapping`
--

CREATE TABLE `project_mapping` (
  `pm_id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `work_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_mapping`
--

INSERT INTO `project_mapping` (`pm_id`, `trans_id`, `work_id`) VALUES
(1, 'TRX-MPP-000000001', 'PK-0001'),
(2, 'TRX-MPP-000000001', 'PK-0002'),
(3, 'TRX-MPP-000000001', 'PK-0003'),
(4, 'TRX-MPP-000000001', 'PK-0004'),
(5, 'TRX-MPP-000000001', 'PK-0005'),
(7, 'TRX-MPP-000000002', 'PK-0001'),
(8, 'TRX-MPP-000000002', 'PK-0002'),
(9, 'TRX-MPP-000000002', 'PK-0003'),
(10, 'TRX-MPP-000000002', 'PK-0004'),
(11, 'TRX-MPP-000000002', 'PK-0005'),
(12, 'TRX-MPP-000000002', 'PK-0006'),
(13, 'TRX-MPP-000000002', 'PK-0007'),
(14, 'TRX-MPP-000000002', 'PK-0008'),
(15, 'TRX-MPP-000000002', 'PK-0009'),
(16, 'TRX-MPP-000000002', 'PK-0010'),
(17, 'TRX-MPP-000000002', 'PK-0011'),
(18, 'TRX-MPP-000000002', 'PK-0012'),
(19, 'TRX-MPP-000000002', 'PK-0013'),
(20, 'TRX-MPP-000000002', 'PK-0014'),
(21, 'TRX-MPP-000000002', 'PK-0015'),
(22, 'TRX-MPP-000000002', 'PK-0016'),
(23, 'TRX-MPP-000000002', 'PK-0017'),
(24, 'TRX-MPP-000000002', 'PK-0018'),
(25, 'TRX-MPP-000000002', 'PK-0019'),
(26, 'TRX-MPP-000000002', 'PK-0020'),
(27, 'TRX-MPP-000000002', 'PK-0021'),
(28, 'TRX-MPP-000000002', 'PK-0022'),
(29, 'TRX-MPP-000000002', 'PK-0024'),
(30, 'TRX-MPP-000000002', 'PK-0023'),
(31, 'TRX-MPP-000000002', 'PK-0025'),
(32, 'TRX-MPP-000000002', 'PK-0026'),
(33, 'TRX-MPP-000000002', 'PK-0027'),
(34, 'TRX-MPP-000000002', 'PK-0028'),
(35, 'TRX-MPP-000000002', 'PK-0029'),
(36, 'TRX-MPP-000000002', 'PK-0030'),
(37, 'TRX-MPP-000000002', 'PK-0031'),
(38, 'TRX-MPP-000000002', 'PK-0032'),
(39, 'TRX-MPP-000000002', 'PK-0033'),
(40, 'TRX-MPP-000000002', 'PK-0034'),
(41, 'TRX-MPP-000000002', 'PK-0035'),
(42, 'TRX-MPP-000000002', 'PK-0036'),
(43, 'TRX-MPP-000000002', 'PK-0037'),
(44, 'TRX-MPP-000000002', 'PK-0038'),
(45, 'TRX-MPP-000000002', 'PK-0039'),
(46, 'TRX-MPP-000000002', 'PK-0040'),
(47, 'TRX-MPP-000000002', 'PK-0041'),
(48, 'TRX-MPP-000000002', 'PK-0042'),
(49, 'TRX-MPP-000000002', 'PK-0043'),
(50, 'TRX-MPP-000000002', 'PK-0044'),
(51, 'TRX-MPP-000000002', 'PK-0045'),
(52, 'TRX-MPP-000000002', 'PK-0046'),
(53, 'TRX-MPP-000000002', 'PK-0047'),
(54, 'TRX-MPP-000000002', 'PK-0048'),
(55, 'TRX-MPP-000000002', 'PK-0049'),
(56, 'TRX-MPP-000000002', 'PK-0050'),
(58, 'TRX-MPP-000000001', 'PK-0007'),
(59, 'TRX-MPP-000000001', 'PK-0008'),
(60, 'TRX-MPP-000000003', 'PK-0001'),
(61, 'TRX-MPP-000000003', 'PK-0002'),
(62, 'TRX-MPP-000000003', 'PK-0003'),
(63, 'TRX-MPP-000000003', 'PK-0004'),
(64, 'TRX-MPP-000000003', 'PK-0005'),
(65, 'TRX-MPP-000000003', 'PK-0006'),
(66, 'TRX-MPP-000000003', 'PK-0007'),
(67, 'TRX-MPP-000000003', 'PK-0008'),
(68, 'TRX-MPP-000000003', 'PK-0009'),
(69, 'TRX-MPP-000000003', 'PK-0010'),
(70, 'TRX-MPP-000000003', 'PK-0011'),
(71, 'TRX-MPP-000000003', 'PK-0012'),
(72, 'TRX-MPP-000000003', 'PK-0013'),
(73, 'TRX-MPP-000000003', 'PK-0014'),
(74, 'TRX-MPP-000000003', 'PK-0015'),
(75, 'TRX-MPP-000000003', 'PK-0016'),
(76, 'TRX-MPP-000000003', 'PK-0017'),
(77, 'TRX-MPP-000000003', 'PK-0018'),
(78, 'TRX-MPP-000000003', 'PK-0019'),
(79, 'TRX-MPP-000000003', 'PK-0020'),
(80, 'TRX-MPP-000000003', 'PK-0021'),
(81, 'TRX-MPP-000000003', 'PK-0022'),
(82, 'TRX-MPP-000000003', 'PK-0024'),
(83, 'TRX-MPP-000000003', 'PK-0023'),
(84, 'TRX-MPP-000000003', 'PK-0025'),
(85, 'TRX-MPP-000000003', 'PK-0026'),
(86, 'TRX-MPP-000000003', 'PK-0027'),
(87, 'TRX-MPP-000000003', 'PK-0028'),
(88, 'TRX-MPP-000000003', 'PK-0029'),
(89, 'TRX-MPP-000000003', 'PK-0030'),
(90, 'TRX-MPP-000000003', 'PK-0031'),
(91, 'TRX-MPP-000000003', 'PK-0032'),
(92, 'TRX-MPP-000000003', 'PK-0033'),
(93, 'TRX-MPP-000000003', 'PK-0034'),
(94, 'TRX-MPP-000000003', 'PK-0035'),
(95, 'TRX-MPP-000000003', 'PK-0036'),
(96, 'TRX-MPP-000000003', 'PK-0037'),
(97, 'TRX-MPP-000000003', 'PK-0038'),
(98, 'TRX-MPP-000000003', 'PK-0039'),
(99, 'TRX-MPP-000000003', 'PK-0040'),
(100, 'TRX-MPP-000000003', 'PK-0041'),
(101, 'TRX-MPP-000000003', 'PK-0042'),
(102, 'TRX-MPP-000000003', 'PK-0043'),
(103, 'TRX-MPP-000000003', 'PK-0044'),
(104, 'TRX-MPP-000000003', 'PK-0045'),
(105, 'TRX-MPP-000000003', 'PK-0046'),
(106, 'TRX-MPP-000000003', 'PK-0047'),
(107, 'TRX-MPP-000000003', 'PK-0048'),
(108, 'TRX-MPP-000000003', 'PK-0049'),
(109, 'TRX-MPP-000000003', 'PK-0050'),
(110, 'TRX-MPP-000000004', 'PK-0001'),
(111, 'TRX-MPP-000000004', 'PK-0002'),
(112, 'TRX-MPP-000000004', 'PK-0003'),
(113, 'TRX-MPP-000000004', 'PK-0004'),
(114, 'TRX-MPP-000000004', 'PK-0005'),
(115, 'TRX-MPP-000000004', 'PK-0006'),
(116, 'TRX-MPP-000000004', 'PK-0007'),
(117, 'TRX-MPP-000000004', 'PK-0008'),
(118, 'TRX-MPP-000000004', 'PK-0009'),
(120, 'TRX-MPP-000000004', 'PK-0011'),
(122, 'TRX-MPP-000000004', 'PK-0013'),
(123, 'TRX-MPP-000000004', 'PK-0014'),
(124, 'TRX-MPP-000000004', 'PK-0015'),
(125, 'TRX-MPP-000000004', 'PK-0016'),
(126, 'TRX-MPP-000000004', 'PK-0017'),
(127, 'TRX-MPP-000000004', 'PK-0018'),
(128, 'TRX-MPP-000000004', 'PK-0019'),
(129, 'TRX-MPP-000000004', 'PK-0020'),
(130, 'TRX-MPP-000000004', 'PK-0021'),
(131, 'TRX-MPP-000000004', 'PK-0022'),
(132, 'TRX-MPP-000000004', 'PK-0024'),
(133, 'TRX-MPP-000000004', 'PK-0023'),
(134, 'TRX-MPP-000000004', 'PK-0025'),
(135, 'TRX-MPP-000000004', 'PK-0026'),
(136, 'TRX-MPP-000000004', 'PK-0027'),
(137, 'TRX-MPP-000000004', 'PK-0028'),
(138, 'TRX-MPP-000000004', 'PK-0029'),
(139, 'TRX-MPP-000000004', 'PK-0030'),
(140, 'TRX-MPP-000000004', 'PK-0031'),
(141, 'TRX-MPP-000000004', 'PK-0032'),
(142, 'TRX-MPP-000000004', 'PK-0033'),
(143, 'TRX-MPP-000000004', 'PK-0034'),
(144, 'TRX-MPP-000000004', 'PK-0035'),
(145, 'TRX-MPP-000000004', 'PK-0036'),
(146, 'TRX-MPP-000000004', 'PK-0037'),
(147, 'TRX-MPP-000000004', 'PK-0038'),
(148, 'TRX-MPP-000000004', 'PK-0039'),
(149, 'TRX-MPP-000000004', 'PK-0040'),
(150, 'TRX-MPP-000000004', 'PK-0041'),
(151, 'TRX-MPP-000000004', 'PK-0042'),
(152, 'TRX-MPP-000000004', 'PK-0043'),
(153, 'TRX-MPP-000000004', 'PK-0044'),
(154, 'TRX-MPP-000000004', 'PK-0045'),
(155, 'TRX-MPP-000000004', 'PK-0046'),
(156, 'TRX-MPP-000000004', 'PK-0047'),
(157, 'TRX-MPP-000000004', 'PK-0048'),
(158, 'TRX-MPP-000000004', 'PK-0049'),
(159, 'TRX-MPP-000000004', 'PK-0050'),
(160, 'TRX-MPP-000000005', 'PK-0001'),
(161, 'TRX-MPP-000000005', 'PK-0002'),
(162, 'TRX-MPP-000000005', 'PK-0003'),
(163, 'TRX-MPP-000000005', 'PK-0004'),
(164, 'TRX-MPP-000000005', 'PK-0005'),
(165, 'TRX-MPP-000000005', 'PK-0006'),
(166, 'TRX-MPP-000000005', 'PK-0007'),
(167, 'TRX-MPP-000000005', 'PK-0008'),
(168, 'TRX-MPP-000000005', 'PK-0010'),
(169, 'TRX-MPP-000000005', 'PK-0012'),
(170, 'TRX-MPP-000000005', 'PK-0014'),
(171, 'TRX-MPP-000000005', 'PK-0016'),
(172, 'TRX-MPP-000000005', 'PK-0017'),
(173, 'TRX-MPP-000000005', 'PK-0018'),
(174, 'TRX-MPP-000000005', 'PK-0019'),
(175, 'TRX-MPP-000000005', 'PK-0020'),
(176, 'TRX-MPP-000000005', 'PK-0021'),
(177, 'TRX-MPP-000000005', 'PK-0022'),
(178, 'TRX-MPP-000000005', 'PK-0024'),
(179, 'TRX-MPP-000000005', 'PK-0023'),
(180, 'TRX-MPP-000000005', 'PK-0025'),
(181, 'TRX-MPP-000000005', 'PK-0026'),
(182, 'TRX-MPP-000000005', 'PK-0027'),
(183, 'TRX-MPP-000000005', 'PK-0028'),
(184, 'TRX-MPP-000000005', 'PK-0029'),
(185, 'TRX-MPP-000000005', 'PK-0030'),
(186, 'TRX-MPP-000000005', 'PK-0031'),
(187, 'TRX-MPP-000000005', 'PK-0032'),
(188, 'TRX-MPP-000000005', 'PK-0033'),
(189, 'TRX-MPP-000000005', 'PK-0034'),
(190, 'TRX-MPP-000000005', 'PK-0035'),
(191, 'TRX-MPP-000000005', 'PK-0036'),
(192, 'TRX-MPP-000000005', 'PK-0037'),
(193, 'TRX-MPP-000000005', 'PK-0038'),
(194, 'TRX-MPP-000000005', 'PK-0039'),
(195, 'TRX-MPP-000000005', 'PK-0040'),
(196, 'TRX-MPP-000000005', 'PK-0041'),
(197, 'TRX-MPP-000000005', 'PK-0042'),
(198, 'TRX-MPP-000000005', 'PK-0043'),
(199, 'TRX-MPP-000000005', 'PK-0044'),
(200, 'TRX-MPP-000000005', 'PK-0045'),
(201, 'TRX-MPP-000000005', 'PK-0046'),
(202, 'TRX-MPP-000000005', 'PK-0047'),
(203, 'TRX-MPP-000000005', 'PK-0048'),
(204, 'TRX-MPP-000000005', 'PK-0049'),
(205, 'TRX-MPP-000000005', 'PK-0050');

-- --------------------------------------------------------

--
-- Table structure for table `project_timeline`
--

CREATE TABLE `project_timeline` (
  `pt_id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `pt_name` varchar(100) NOT NULL,
  `due` date DEFAULT NULL,
  `done` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_timeline`
--

INSERT INTO `project_timeline` (`pt_id`, `trans_id`, `pt_name`, `due`, `done`, `date_created`, `created_by`) VALUES
(2, 'TRX-KNT-000000001', 'Start', '2020-12-01', 0, '2020-11-30 10:07:29', 1),
(3, 'TRX-KNT-000000002', 'Start', '2020-12-10', 0, '2020-11-30 10:35:18', 1),
(4, 'TRX-KNT-000000001', 'Pengukuran', '2020-12-02', 0, '2020-11-30 17:24:10', 1),
(5, 'TRX-KNT-000000001', 'Bogkar Dinding Batu', '2020-12-03', 0, '2020-11-30 17:24:47', 1),
(6, 'TRX-KNT-000000001', 'Bongkar Kosen, Bongkar Atap, dan Bongkar Plafond.', '2020-12-04', 0, '2020-11-30 17:25:37', 1),
(7, 'TRX-KNT-000000001', 'Pembesihan Kotoran', '2020-12-05', 0, '2020-11-30 17:26:05', 1),
(8, 'TRX-KNT-000000001', 'Pondasi Cakar Ayam', '2021-01-06', 0, '2020-11-30 17:30:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` varchar(50) NOT NULL,
  `client_id` varchar(20) DEFAULT NULL,
  `t_project_id` varchar(20) DEFAULT NULL,
  `p_method_id` varchar(20) DEFAULT NULL,
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `project_progress` int(1) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `trans_type` varchar(100) NOT NULL,
  `description` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `client_id`, `t_project_id`, `p_method_id`, `trans_date`, `project_progress`, `total`, `trans_type`, `description`, `status`, `date_created`, `created_by`) VALUES
('TRX-KNT-000000001', 'PL-0001', 'JP-0006', 'CB-0002', '2020-11-30 10:07:29', 0, 800000000, 'contract', NULL, 1, '2020-11-30 10:07:29', 1),
('TRX-KNT-000000002', 'PL-0002', 'JP-0005', 'CB-0001', '2020-11-30 10:35:18', 0, 650000000, 'contract', NULL, 0, '2020-11-30 10:35:18', 1),
('TRX-MPP-000000001', NULL, 'JP-0001', NULL, '2020-11-22 19:49:47', NULL, NULL, 'mapping', 'Pemetaan pekerjaan dalam pengerjaan proyek renovasi rumah permane tipe satu lantai', 0, '2020-11-22 19:49:47', 0),
('TRX-MPP-000000002', NULL, 'JP-0002', NULL, '2020-11-22 20:12:59', NULL, NULL, 'mapping', 'Pemetaan pekerjaan proyek renovasi rumah permanen tipe dua laintai', 0, '2020-11-22 20:12:59', 0),
('TRX-MPP-000000003', NULL, 'JP-0003', NULL, '2020-11-24 10:17:49', NULL, NULL, 'mapping', '-', 0, '2020-11-24 10:17:49', 0),
('TRX-MPP-000000004', NULL, 'JP-0006', NULL, '2020-11-30 12:14:40', NULL, NULL, 'mapping', '-', 0, '2020-11-30 12:14:40', 0),
('TRX-MPP-000000005', NULL, 'JP-0005', NULL, '2020-11-30 19:59:14', NULL, NULL, 'mapping', '-', 0, '2020-11-30 19:59:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_project`
--

CREATE TABLE `type_of_project` (
  `t_project_id` varchar(20) NOT NULL,
  `t_project_name` varchar(100) NOT NULL,
  `t_project_estimation` varchar(100) NOT NULL,
  `t_project_price` double NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_of_project`
--

INSERT INTO `type_of_project` (`t_project_id`, `t_project_name`, `t_project_estimation`, `t_project_price`, `date_created`, `created_by`, `date_updated`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('JP-0001', 'Renovasi Rumah Permanen Satu Lantai', '60', 100000000, '2020-11-16 19:40:14', 1, '2020-11-24 19:04:23', 1, NULL, NULL),
('JP-0002', 'Renovasi Rumah Permanen Dua Lantai', '90', 180000000, '2020-11-16 19:57:38', 1, '2020-11-24 19:04:09', 1, NULL, NULL),
('JP-0003', 'Renovasi Rumah Permanen Tiga Lantai', '180', 240000000, '2020-11-16 19:57:59', 1, '2020-11-24 19:02:12', 1, NULL, NULL),
('JP-0004', 'Pembangunan Rumah Permanen Satu Lantai', '180', 400000000, '2020-11-17 04:30:18', 1, '2020-11-24 19:08:12', 1, NULL, NULL),
('JP-0005', 'Pembangunan Rumah Permanen Dua Lantai', '270', 650000000, '2020-11-24 19:07:19', 1, NULL, NULL, NULL, NULL),
('JP-0006', 'Pembangunan Rumah Permanen Tiga Lantai', '360', 800000000, '2020-11-24 19:07:52', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_work`
--

CREATE TABLE `type_of_work` (
  `work_id` varchar(20) NOT NULL,
  `work_name` varchar(100) NOT NULL,
  `work_group_id` varchar(20) NOT NULL,
  `work_unit` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_of_work`
--

INSERT INTO `type_of_work` (`work_id`, `work_name`, `work_group_id`, `work_unit`, `status`, `date_created`, `created_by`, `date_updated`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('PK-0001', 'Pengukuran', 'KP-0001', 'Ls', 1, '2020-11-17 08:47:21', 1, NULL, 1, NULL, NULL),
('PK-0002', 'Bongkar Dinding Batu', 'KP-0001', 'M', 1, '2020-11-17 08:57:24', 1, NULL, NULL, NULL, NULL),
('PK-0003', 'Bongkar Kosen', 'KP-0001', 'BH', 1, '2020-11-17 08:57:43', 1, NULL, NULL, NULL, NULL),
('PK-0004', 'Bongkar Atap', 'KP-0001', 'M', 1, '2020-11-17 08:57:57', 1, NULL, NULL, NULL, NULL),
('PK-0005', 'Bongklar Plafond', 'KP-0001', 'M', 1, '2020-11-17 08:58:30', 1, NULL, NULL, NULL, NULL),
('PK-0006', 'Pembersihan Kotoran', 'KP-0001', 'Ls', 1, '2020-11-17 08:58:48', 1, NULL, NULL, NULL, NULL),
('PK-0007', 'Pondasi Cakar Ayam', 'KP-0002', 'Titik', 1, '2020-11-17 08:59:14', 1, NULL, NULL, NULL, NULL),
('PK-0008', 'Pondasi Batu Gunung', 'KP-0002', 'M', 1, '2020-11-17 09:01:42', 1, NULL, NULL, NULL, NULL),
('PK-0009', 'Tiang Induk 25x25 cm', 'KP-0003', 'M', 1, '2020-11-17 09:11:35', 1, NULL, NULL, NULL, NULL),
('PK-0010', 'Tiang 4 Meter x 8 Tiang', 'KP-0003', 'M', 1, '2020-11-17 09:12:45', 1, NULL, NULL, NULL, NULL),
('PK-0011', 'Tiang Praktis 10X15 Com', 'KP-0003', 'M', 1, '2020-11-22 20:47:02', 1, NULL, NULL, NULL, NULL),
('PK-0012', 'Panjang 4 meter x 9 tiang', 'KP-0003', 'M', 1, '2020-11-22 20:48:07', 1, NULL, NULL, NULL, NULL),
('PK-0013', 'Ring Balok 20x30 Cm', 'KP-0003', 'M', 1, '2020-11-22 20:48:48', 1, NULL, NULL, NULL, NULL),
('PK-0014', 'Ring Balok 10x20 Cm', 'KP-0003', 'M', 1, '2020-11-22 20:49:21', 1, NULL, NULL, NULL, NULL),
('PK-0015', 'Ring Pengikat Batu', 'KP-0003', 'M', 1, '2020-11-22 20:49:53', 1, NULL, NULL, NULL, NULL),
('PK-0016', 'Plat Beton T 12 Cm', 'KP-0003', 'M', 1, '2020-11-22 20:50:14', 1, NULL, NULL, NULL, NULL),
('PK-0017', 'Penambahan TInggi 2 Meter', 'KP-0004', 'M', 1, '2020-11-22 20:50:50', 1, NULL, NULL, NULL, NULL),
('PK-0018', 'Pasang Batu ', 'KP-0004', 'M', 1, '2020-11-22 20:51:17', 1, NULL, NULL, NULL, NULL),
('PK-0019', 'Plesteran + Acian', 'KP-0004', 'M', 1, '2020-11-22 20:51:50', 1, NULL, NULL, NULL, NULL),
('PK-0020', 'Rangka Baja RIngan 0,60', 'KP-0005', 'M', 1, '2020-11-22 20:52:14', 1, NULL, NULL, NULL, NULL),
('PK-0021', 'Atap Spandex 0,30', 'KP-0005', 'M', 1, '2020-11-22 20:52:44', 1, NULL, NULL, NULL, NULL),
('PK-0022', 'Kalsi Plank 30 Cm', 'KP-0005', 'M', 1, '2020-11-22 20:53:03', 1, NULL, NULL, NULL, NULL),
('PK-0023', 'Rangka Plafond Holo', 'KP-0006', 'M', 1, '2020-11-22 20:53:36', 1, NULL, NULL, NULL, NULL),
('PK-0024', 'Plafond Gypsum Board', 'KP-0005', 'M', 1, '2020-11-22 20:53:56', 1, NULL, NULL, NULL, NULL),
('PK-0025', 'Les Plafond C.F', 'KP-0006', 'M', 1, '2020-11-22 20:54:15', 1, NULL, NULL, NULL, NULL),
('PK-0026', 'Pengecetan', 'KP-0006', 'M', 1, '2020-11-22 20:54:40', 1, NULL, NULL, NULL, NULL),
('PK-0027', 'Timbunan 40 cm', 'KP-0007', 'M', 1, '2020-11-22 20:55:07', 1, NULL, NULL, NULL, NULL),
('PK-0028', 'Pasang Tegel 40x40 cm', 'KP-0007', 'M', 1, '2020-11-22 20:55:33', 1, NULL, NULL, NULL, NULL),
('PK-0029', 'Dinding Kamar Mandi', 'KP-0007', 'M', 1, '2020-11-22 20:55:47', 1, NULL, NULL, NULL, NULL),
('PK-0030', 'Kosen Jendela + Daun Pintu Depan', 'KP-0008', 'Set', 1, '2020-11-22 20:56:32', 1, NULL, NULL, NULL, NULL),
('PK-0031', 'Jendel + Daun Depan', 'KP-0008', 'Mata', 1, '2020-11-22 20:57:18', 1, NULL, NULL, NULL, NULL),
('PK-0032', 'Pintu Kamar', 'KP-0008', 'Set', 1, '2020-11-22 20:57:38', 1, NULL, NULL, NULL, NULL),
('PK-0033', 'Jendela', 'KP-0008', 'Mata', 1, '2020-11-22 20:57:59', 1, NULL, NULL, NULL, NULL),
('PK-0034', 'Instalasi Air Kotor', 'KP-0009', 'Set', 1, '2020-11-22 20:58:24', 1, NULL, NULL, NULL, NULL),
('PK-0035', 'Instalasi Air Bersih', 'KP-0009', 'Set', 1, '2020-11-22 20:58:42', 1, NULL, NULL, NULL, NULL),
('PK-0036', 'Tangki Ait + Pompa', 'KP-0009', 'Set', 1, '2020-11-22 20:59:05', 1, NULL, NULL, NULL, NULL),
('PK-0037', 'Stop Kontak', 'KP-0010', 'Ls', 1, '2020-11-22 20:59:32', 1, NULL, 1, NULL, NULL),
('PK-0038', 'Saklar', 'KP-0010', 'Ls', 1, '2020-11-22 20:59:53', 1, NULL, NULL, NULL, NULL),
('PK-0039', 'Lampu Standar', 'KP-0010', 'Ls', 1, '2020-11-22 21:00:21', 1, NULL, NULL, NULL, NULL),
('PK-0040', 'MCB 1 set', 'KP-0010', 'Ls', 1, '2020-11-22 21:00:40', 1, NULL, NULL, NULL, NULL),
('PK-0041', 'Cat Tembok', 'KP-0011', 'M', 1, '2020-11-22 21:01:04', 1, NULL, NULL, NULL, NULL),
('PK-0042', 'Cat Kayu', 'KP-0011', 'M', 1, '2020-11-22 21:01:18', 1, NULL, NULL, NULL, NULL),
('PK-0043', 'Cat Besi', 'KP-0011', 'M', 1, '2020-11-22 21:01:27', 1, NULL, NULL, NULL, NULL),
('PK-0044', 'Kloset Jongkok', 'KP-0012', 'Buah', 1, '2020-11-22 21:01:46', 1, NULL, NULL, NULL, NULL),
('PK-0045', 'Kran Air', 'KP-0012', 'Buah', 1, '2020-11-22 21:02:03', 1, NULL, NULL, NULL, NULL),
('PK-0046', 'Pagar Trali Depan', 'KP-0012', 'M', 1, '2020-11-22 21:02:26', 1, NULL, NULL, NULL, NULL),
('PK-0047', 'Pintu Grasi', 'KP-0012', 'M', 1, '2020-11-22 21:02:45', 1, NULL, NULL, NULL, NULL),
('PK-0048', 'Tangga Kayu dan Besi', 'KP-0012', 'M', 1, '2020-11-22 21:03:02', 1, NULL, NULL, NULL, NULL),
('PK-0049', 'Pembersihan Bekas Pekerjaan', 'KP-0013', 'Ls', 1, '2020-11-22 21:03:43', 1, NULL, NULL, NULL, NULL),
('PK-0050', 'Pembersihan Bangunan', 'KP-0013', 'Ls', 1, '2020-11-22 21:04:05', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `role`, `status`, `date_created`) VALUES
(1, 'Super Admin', 'superadmin', '$2y$10$pfs8OfIQbLy3vgc2dYuzrOwZXA46cvPMfGsp/yOYPgRDgL3YYoaqu', 1, 1, '2020-11-16 18:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `work_group`
--

CREATE TABLE `work_group` (
  `work_group_id` varchar(20) NOT NULL,
  `work_group_name` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL,
  `date_updated` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_group`
--

INSERT INTO `work_group` (`work_group_id`, `work_group_name`, `status`, `date_created`, `created_by`, `date_updated`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('KP-0001', 'Pekerjaan Persiapan', 1, '2020-11-17 05:33:17', 1, NULL, NULL, NULL, NULL),
('KP-0002', 'Pekerjaan Pondasi', 1, '2020-11-17 05:36:47', 1, NULL, NULL, NULL, NULL),
('KP-0003', 'Pekerjaan Beton Cor', 1, '2020-11-17 05:37:06', 1, NULL, NULL, NULL, NULL),
('KP-0004', 'Pekerjaan Batu', 1, '2020-11-17 05:37:37', 1, NULL, NULL, NULL, NULL),
('KP-0005', 'Pekerjaan Atap', 1, '2020-11-17 05:38:01', 1, NULL, NULL, NULL, NULL),
('KP-0006', 'Pekerjaan Plafond', 1, '2020-11-17 05:38:14', 1, NULL, NULL, NULL, NULL),
('KP-0007', 'Pekerjaan Lantai', 1, '2020-11-17 05:38:30', 1, NULL, NULL, NULL, NULL),
('KP-0008', 'Pekerjaan Kosen Pintu Jendela', 1, '2020-11-17 05:38:48', 1, NULL, NULL, NULL, NULL),
('KP-0009', 'Pekerjaan Instalasi Air', 1, '2020-11-17 05:39:05', 1, NULL, NULL, NULL, NULL),
('KP-0010', 'Pekerjaan Instalasi Listrik', 1, '2020-11-17 05:39:22', 1, NULL, 1, NULL, NULL),
('KP-0011', 'Pengecetan', 1, '2020-11-17 05:43:13', 1, NULL, NULL, NULL, NULL),
('KP-0012', 'Aksesoris', 1, '2020-11-17 05:43:31', 1, NULL, NULL, NULL, NULL),
('KP-0013', 'Pembersihan', 1, '2020-11-17 05:43:44', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  ADD PRIMARY KEY (`account_no`),
  ADD KEY `sub_code` (`sub_code`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `coa_head`
--
ALTER TABLE `coa_head`
  ADD PRIMARY KEY (`head_code`);

--
-- Indexes for table `coa_subhead`
--
ALTER TABLE `coa_subhead`
  ADD PRIMARY KEY (`sub_code`),
  ADD KEY `head_code` (`head_code`);

--
-- Indexes for table `general_ledger`
--
ALTER TABLE `general_ledger`
  ADD PRIMARY KEY (`gl_id`),
  ADD KEY `gl_ref` (`gl_ref`),
  ADD KEY `acoount_no` (`account_no`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`p_method_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `project_budget`
--
ALTER TABLE `project_budget`
  ADD PRIMARY KEY (`pb_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `work_id` (`work_id`);

--
-- Indexes for table `project_mapping`
--
ALTER TABLE `project_mapping`
  ADD PRIMARY KEY (`pm_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `work_id` (`work_id`);

--
-- Indexes for table `project_timeline`
--
ALTER TABLE `project_timeline`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `t_project_id` (`t_project_id`),
  ADD KEY `p_method_id` (`p_method_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `type_of_project`
--
ALTER TABLE `type_of_project`
  ADD PRIMARY KEY (`t_project_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `type_of_work`
--
ALTER TABLE `type_of_work`
  ADD PRIMARY KEY (`work_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `deleted_by` (`deleted_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `work_group_id` (`work_group_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_group`
--
ALTER TABLE `work_group`
  ADD PRIMARY KEY (`work_group_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general_ledger`
--
ALTER TABLE `general_ledger`
  MODIFY `gl_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_budget`
--
ALTER TABLE `project_budget`
  MODIFY `pb_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `project_mapping`
--
ALTER TABLE `project_mapping`
  MODIFY `pm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `project_timeline`
--
ALTER TABLE `project_timeline`
  MODIFY `pt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chart_of_account`
--
ALTER TABLE `chart_of_account`
  ADD CONSTRAINT `chart_of_account_ibfk_1` FOREIGN KEY (`sub_code`) REFERENCES `coa_subhead` (`sub_code`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `clients_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `coa_subhead`
--
ALTER TABLE `coa_subhead`
  ADD CONSTRAINT `coa_subhead_ibfk_1` FOREIGN KEY (`head_code`) REFERENCES `coa_head` (`head_code`);

--
-- Constraints for table `general_ledger`
--
ALTER TABLE `general_ledger`
  ADD CONSTRAINT `general_ledger_ibfk_2` FOREIGN KEY (`gl_ref`) REFERENCES `transactions` (`trans_id`),
  ADD CONSTRAINT `general_ledger_ibfk_3` FOREIGN KEY (`account_no`) REFERENCES `chart_of_account` (`account_no`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`);

--
-- Constraints for table `project_budget`
--
ALTER TABLE `project_budget`
  ADD CONSTRAINT `project_budget_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`),
  ADD CONSTRAINT `project_budget_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `type_of_work` (`work_id`);

--
-- Constraints for table `project_mapping`
--
ALTER TABLE `project_mapping`
  ADD CONSTRAINT `project_mapping_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`),
  ADD CONSTRAINT `project_mapping_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `type_of_work` (`work_id`);

--
-- Constraints for table `project_timeline`
--
ALTER TABLE `project_timeline`
  ADD CONSTRAINT `project_timeline_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`t_project_id`) REFERENCES `type_of_project` (`t_project_id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`p_method_id`) REFERENCES `payment_method` (`p_method_id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `type_of_project`
--
ALTER TABLE `type_of_project`
  ADD CONSTRAINT `type_of_project_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `type_of_project_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `type_of_project_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `type_of_work`
--
ALTER TABLE `type_of_work`
  ADD CONSTRAINT `type_of_work_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `type_of_work_ibfk_2` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `type_of_work_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `type_of_work_ibfk_4` FOREIGN KEY (`work_group_id`) REFERENCES `work_group` (`work_group_id`);

--
-- Constraints for table `work_group`
--
ALTER TABLE `work_group`
  ADD CONSTRAINT `work_group_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `work_group_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `work_group_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`);
