-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 26, 2021 at 08:42 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

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
('PL-0002', 'Firdaus Husain', '-', 'Jl Takabonerate No 12 Bukit Baruga Makassar', '085556665587', 'firdaus@gmail.com', 1, '2020-11-24 19:10:36', 1, '2020-11-24 19:10:44', NULL, NULL, NULL),
('PL-0003', 'Anak Agung Gede Dharma Putra ', '-', 'Jl Sulan Hasanuddin Makassar', '081455658578', '', 1, '2021-06-26 07:26:50', 1, NULL, NULL, NULL, NULL);

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
(3, '2021-06-25', '1-10001', 'TRX-PYM-000000001', 'd', 594000000),
(4, '2021-06-25', '2-10001', 'TRX-PYM-000000001', 'k', 594000000),
(5, '2021-06-25', '2-10001', 'TRX-PYM-000000001', 'd', 594000000),
(6, '2021-06-25', '1-10002', 'TRX-PYM-000000001', 'd', 1386000000),
(7, '2021-06-25', '4-10001', 'TRX-PYM-000000001', 'k', 1980000000),
(13, '2021-06-26', '1-10001', 'TRX-PYM-000000002', 'd', 1069200000),
(14, '2021-06-26', '2-10001', 'TRX-PYM-000000002', 'k', 1069200000),
(15, '2021-06-26', '2-10001', 'TRX-KNT-000000002', 'd', 1069200000),
(16, '2021-06-26', '1-10002', 'TRX-KNT-000000002', 'd', 2494800000),
(17, '2021-06-26', '4-10001', 'TRX-KNT-000000002', 'k', 3564000000),
(18, '2021-06-26', '1-10001', 'TRX-PYM-000000003', 'd', 277200000),
(19, '2021-06-26', '1-10002', 'TRX-PYM-000000003', 'k', 277200000),
(24, '2021-06-26', '1-10001', 'TRX-PYM-000000004', 'd', 831600000),
(25, '2021-06-26', '1-10002', 'TRX-PYM-000000004', 'k', 831600000),
(26, '2021-06-26', '1-10001', 'TRX-PYM-000000005', 'd', 997920000),
(27, '2021-06-26', '1-10002', 'TRX-PYM-000000005', 'k', 997920000),
(28, '2021-06-26', '1-10001', 'TRX-PYM-000000006', 'd', 1069200000),
(29, '2021-06-26', '2-10001', 'TRX-PYM-000000006', 'k', 1069200000),
(30, '2021-06-26', '2-10001', 'TRX-KNT-000000003', 'd', 1069200000),
(31, '2021-06-26', '1-10002', 'TRX-KNT-000000003', 'd', 2494800000),
(32, '2021-06-26', '4-10001', 'TRX-KNT-000000003', 'k', 3564000000);

-- --------------------------------------------------------

--
-- Table structure for table `material_budget`
--

CREATE TABLE `material_budget` (
  `mb_id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `material_id` varchar(20) NOT NULL,
  `work_group_id` varchar(20) NOT NULL,
  `mb_unit` varchar(100) NOT NULL,
  `mb_qty_budget` int(11) NOT NULL,
  `mb_qty_realitation` int(11) DEFAULT NULL,
  `mb_unit_price_budget` double NOT NULL,
  `mb_unit_price_realitation` double DEFAULT NULL,
  `budget` double DEFAULT NULL,
  `realitation` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material_budget`
--

INSERT INTO `material_budget` (`mb_id`, `trans_id`, `material_id`, `work_group_id`, `mb_unit`, `mb_qty_budget`, `mb_qty_realitation`, `mb_unit_price_budget`, `mb_unit_price_realitation`, `budget`, `realitation`) VALUES
(1, 'TRX-KNT-000000001', 'MT-000000009', 'KP-0001', 'Meter', 500, NULL, 1500, NULL, 750000, NULL),
(2, 'TRX-KNT-000000002', 'MT-000000009', 'KP-0001', 'Meter', 900, NULL, 25000, NULL, 22500000, NULL),
(3, 'TRX-KNT-000000003', 'MT-000000009', 'KP-0001', 'Meter', 900, NULL, 25000, NULL, 22500000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `ref_contract` varchar(20) DEFAULT NULL,
  `nominal` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `trans_id`, `ref_contract`, `nominal`, `description`) VALUES
(2, 'TRX-PYM-000000001', 'TRX-KNT-000000001', 594000000, 'Down Payment (Dp)'),
(4, 'TRX-PYM-000000002', 'TRX-KNT-000000002', 1069200000, 'Down Payment (Dp)'),
(5, 'TRX-PYM-000000003', 'TRX-KNT-000000001', 277200000, 'Pembayaran Angsuran Ke-2'),
(10, 'TRX-PYM-000000004', 'TRX-KNT-000000001', 277200000, 'Pembayaran Angsuran Ke-3'),
(11, 'TRX-PYM-000000004', 'TRX-KNT-000000001', 277200000, 'Pembayaran Angsuran Ke-4'),
(12, 'TRX-PYM-000000004', 'TRX-KNT-000000001', 277200000, 'Pembayaran Angsuran Ke-5'),
(13, 'TRX-PYM-000000005', 'TRX-KNT-000000002', 498960000, 'Pembayaran Angsuran Ke-2'),
(14, 'TRX-PYM-000000005', 'TRX-KNT-000000002', 498960000, 'Pembayaran Angsuran Ke-3'),
(15, 'TRX-PYM-000000006', 'TRX-KNT-000000003', 1069200000, 'Down Payment (Dp)');

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
(2, 'TRX-KNT-000000001', 'Proyek 1 Rumah Permanen Dua Lantai Tipe 70', '2021-06-28', '2022-06-23'),
(4, 'TRX-KNT-000000002', 'Proyek 2 Rumah Permanen Dua Lantai Tipe 70', '2021-06-28', '2022-06-23'),
(5, 'TRX-KNT-000000003', 'Proyek 3 Rumah Permanen Dua Lantai Tipe 70', '2021-06-28', '2022-06-23');

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
  `pb_unit_price_budget` double NOT NULL,
  `budget` double DEFAULT NULL,
  `different` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_budget`
--

INSERT INTO `project_budget` (`pb_id`, `trans_id`, `work_id`, `pb_unit`, `pb_qty_budget`, `pb_unit_price_budget`, `budget`, `different`) VALUES
(1, 'TRX-KNT-000000001', 'PK-0001', 'Ls', 2, 500000, 1000000, NULL),
(2, 'TRX-KNT-000000001', 'PK-0002', 'M', 500, 150000, 75000000, NULL),
(3, 'TRX-KNT-000000001', 'PK-0004', 'M', 500, 200000, 100000000, NULL),
(4, 'TRX-KNT-000000001', 'PK-0006', 'Ls', 2, 400000, 800000, NULL),
(5, 'TRX-KNT-000000002', 'PK-0001', 'Ls', 900, 175000, 157500000, NULL),
(6, 'TRX-KNT-000000002', 'PK-0002', 'M', 900, 200000, 180000000, NULL),
(7, 'TRX-KNT-000000002', 'PK-0004', 'M', 900, 250000, 225000000, NULL),
(8, 'TRX-KNT-000000002', 'PK-0006', 'Ls', 3, 750000, 2250000, NULL),
(9, 'TRX-KNT-000000003', 'PK-0001', 'Ls', 3, 1500000, 4500000, NULL),
(10, 'TRX-KNT-000000003', 'PK-0002', 'M', 900, 150000, 135000000, NULL),
(11, 'TRX-KNT-000000003', 'PK-0004', 'M', 900, 200000, 180000000, NULL),
(12, 'TRX-KNT-000000003', 'PK-0006', 'Ls', 3, 750000, 2250000, NULL);

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
(3, 'TRX-MPP-000000001', 'PK-0001'),
(4, 'TRX-MPP-000000001', 'PK-0002'),
(5, 'TRX-MPP-000000001', 'PK-0004'),
(6, 'TRX-MPP-000000001', 'PK-0006');

-- --------------------------------------------------------

--
-- Table structure for table `project_material`
--

CREATE TABLE `project_material` (
  `pjm_id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `material_id` varchar(20) NOT NULL,
  `work_group_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_material`
--

INSERT INTO `project_material` (`pjm_id`, `trans_id`, `material_id`, `work_group_id`) VALUES
(4, 'TRX-MPP-000000001', 'MT-000000009', 'KP-0001');

-- --------------------------------------------------------

--
-- Table structure for table `project_realitations`
--

CREATE TABLE `project_realitations` (
  `id` bigint(20) NOT NULL,
  `trans_id` varchar(50) NOT NULL,
  `work_id` varchar(20) NOT NULL,
  `budget` double NOT NULL,
  `realitation` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_realitations`
--

INSERT INTO `project_realitations` (`id`, `trans_id`, `work_id`, `budget`, `realitation`) VALUES
(1, 'TRX-RLS-000000001', 'PK-0001', 1000000, 2000000),
(2, 'TRX-RLS-000000001', 'PK-0002', 75000000, 82000000),
(3, 'TRX-RLS-000000001', 'PK-0004', 100000000, 97000000),
(4, 'TRX-RLS-000000001', 'PK-0006', 800000, 800000),
(5, 'TRX-RLS-000000002', 'PK-0001', 157500000, 158000000),
(6, 'TRX-RLS-000000002', 'PK-0002', 180000000, 180000000),
(7, 'TRX-RLS-000000002', 'PK-0004', 225000000, 225000000),
(8, 'TRX-RLS-000000002', 'PK-0006', 2250000, 2250000),
(9, 'TRX-RLS-000000003', 'PK-0001', 4500000, 4500000),
(10, 'TRX-RLS-000000003', 'PK-0002', 135000000, 135000000),
(11, 'TRX-RLS-000000003', 'PK-0004', 180000000, 185000000),
(12, 'TRX-RLS-000000003', 'PK-0006', 2250000, 2250000);

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
(2, 'TRX-KNT-000000001', 'Start', '2021-06-28', 0, '2021-06-25 23:28:02', 1),
(4, 'TRX-KNT-000000002', 'Start', '2021-06-28', 0, '2021-06-26 00:08:07', 1),
(5, 'TRX-KNT-000000003', 'Start', '2021-06-28', 0, '2021-06-26 07:27:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `material_id` varchar(20) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `material_unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`material_id`, `material_name`, `material_unit`) VALUES
('MT-000000001', 'Semen Tonasa 50 Kg', 'Zak'),
('MT-000000002', 'Pasir', 'Kubik'),
('MT-000000003', 'Semen Bosowa 50 Kg', 'Zak'),
('MT-000000004', 'Bata Merah', 'Buah'),
('MT-000000005', 'Bata Ringan', 'Buah'),
('MT-000000006', 'Holo', 'Meter'),
('MT-000000007', 'Spandek', 'Meter'),
('MT-000000008', 'Gypsum', 'Meter'),
('MT-000000009', 'Tali Kecil ', 'Meter');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` varchar(50) NOT NULL,
  `periode` varchar(50) DEFAULT NULL,
  `client_id` varchar(20) DEFAULT NULL,
  `t_project_id` varchar(20) DEFAULT NULL,
  `p_method_id` varchar(20) DEFAULT NULL,
  `ref_realitation` varchar(50) DEFAULT NULL,
  `ref` varchar(20) DEFAULT NULL,
  `trans_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_date` date DEFAULT NULL,
  `project_progress` int(1) DEFAULT NULL,
  `surface_area` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `ppn` double DEFAULT NULL,
  `contract_value` double DEFAULT NULL,
  `dp` double DEFAULT NULL,
  `trans_type` varchar(100) NOT NULL,
  `ref_code` varchar(20) DEFAULT NULL,
  `description` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_by` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `periode`, `client_id`, `t_project_id`, `p_method_id`, `ref_realitation`, `ref`, `trans_date`, `payment_date`, `project_progress`, `surface_area`, `total`, `ppn`, `contract_value`, `dp`, `trans_type`, `ref_code`, `description`, `status`, `date_created`, `date_updated`, `created_by`) VALUES
('TRX-KNT-000000001', '202106', 'PL-0001', 'JP-0001', 'CB-0003', NULL, NULL, '2021-06-25 23:28:02', NULL, 2, 500, 1980000000, 180000000, 1800000000, 594000000, 'contract', NULL, NULL, 2, '2021-06-25 23:28:02', '2021-06-26 07:40:19', 1),
('TRX-KNT-000000002', '202106', 'PL-0002', 'JP-0001', 'CB-0003', NULL, NULL, '2021-06-26 00:08:07', NULL, 2, 900, 3564000000, 324000000, 3240000000, 1069200000, 'contract', NULL, NULL, 2, '2021-06-26 00:08:07', '2021-06-26 07:42:01', 1),
('TRX-KNT-000000003', '202106', 'PL-0003', 'JP-0001', 'CB-0003', NULL, NULL, '2021-06-26 07:27:19', NULL, 2, 900, 3564000000, 324000000, 3240000000, 1069200000, 'contract', NULL, NULL, 2, '2021-06-26 07:27:19', '2021-06-26 07:46:57', 1),
('TRX-MPP-000000001', '202106', NULL, 'JP-0001', NULL, NULL, NULL, '2021-06-25 10:00:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mapping', NULL, 'Pemetaan Proyek Rumah Permanen Dua Lantai Tipe 70', 0, '2021-06-25 10:00:19', '2021-06-26 04:07:44', 0),
('TRX-PYM-000000001', '202106', 'PL-0001', NULL, NULL, NULL, 'TRX-KNT-000000001', '2021-06-25 23:28:02', '2021-06-26', NULL, NULL, 594000000, NULL, NULL, NULL, 'payment', NULL, 'Pembayaran Down Payment (DP)', 0, '2021-06-25 23:28:02', NULL, 1),
('TRX-PYM-000000002', '202106', 'PL-0002', NULL, NULL, NULL, 'TRX-KNT-000000002', '2021-06-26 00:08:07', '2021-06-26', NULL, NULL, 1069200000, NULL, NULL, NULL, 'payment', NULL, 'Pembayaran Down Payment (DP)', 0, '2021-06-26 00:08:07', NULL, 1),
('TRX-PYM-000000003', '202106', NULL, NULL, NULL, NULL, 'TRX-KNT-000000001', '2021-06-26 02:46:22', '2021-06-26', NULL, NULL, 277200000, NULL, NULL, NULL, 'payment', NULL, 'Pembayaran Angsuran Proyek 1 (Angsuran Ke 2)', 0, '2021-06-26 02:46:22', '2021-06-26 04:07:24', 0),
('TRX-PYM-000000004', '202106', NULL, NULL, NULL, NULL, 'TRX-KNT-000000001', '2021-06-26 05:14:06', '2021-06-26', NULL, NULL, 831600000, NULL, NULL, NULL, 'payment', NULL, 'Pembayaran Angsuran Proyek 1 (Angsuran 3, 4 dan 5)', 0, '2021-06-26 05:14:06', NULL, 0),
('TRX-PYM-000000005', '202106', NULL, NULL, NULL, NULL, 'TRX-KNT-000000002', '2021-06-26 06:16:11', '2021-06-26', NULL, NULL, 997920000, NULL, NULL, NULL, 'payment', NULL, 'Pembayaran Proyek 2 Angsuran 2 dan 3 ', 0, '2021-06-26 06:16:11', NULL, 0),
('TRX-PYM-000000006', '202106', 'PL-0003', NULL, NULL, NULL, 'TRX-KNT-000000003', '2021-06-26 07:27:19', '2021-06-26', NULL, NULL, 1069200000, NULL, NULL, NULL, 'payment', NULL, 'Pembayaran Down Payment (DP)', 0, '2021-06-26 07:27:19', NULL, 1),
('TRX-RLS-000000001', '202106', NULL, NULL, NULL, 'TRX-KNT-000000001', NULL, '2021-06-26 07:40:19', NULL, NULL, NULL, 181800000, NULL, NULL, NULL, 'realitation', NULL, NULL, 0, '2021-06-26 07:40:19', NULL, 0),
('TRX-RLS-000000002', '202106', NULL, NULL, NULL, 'TRX-KNT-000000002', NULL, '2021-06-26 07:42:01', NULL, NULL, NULL, 565250000, NULL, NULL, NULL, 'realitation', NULL, NULL, 0, '2021-06-26 07:42:01', NULL, 0),
('TRX-RLS-000000003', '202106', NULL, NULL, NULL, 'TRX-KNT-000000003', NULL, '2021-06-26 07:46:57', NULL, NULL, NULL, 326750000, NULL, NULL, NULL, 'realitation', NULL, NULL, 0, '2021-06-26 07:46:57', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_project`
--

CREATE TABLE `type_of_project` (
  `t_project_id` varchar(20) NOT NULL,
  `t_project_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
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

INSERT INTO `type_of_project` (`t_project_id`, `t_project_name`, `type`, `t_project_estimation`, `t_project_price`, `date_created`, `created_by`, `date_updated`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
('JP-0001', 'Pembangunan Rumah Permanen Dua Lantai', 'Tipe 70', '360', 3600000, '2020-12-11 12:57:25', 1, '2020-12-11 12:58:18', 1, NULL, NULL),
('JP-0002', 'Pembangunan Rumah Permanen Dua Lantai', 'Tipe 21', '90', 2500000, '2020-12-11 12:59:39', 1, NULL, NULL, NULL, NULL);

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
-- Indexes for table `material_budget`
--
ALTER TABLE `material_budget`
  ADD PRIMARY KEY (`mb_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `work_group_id` (`work_group_id`);

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
-- Indexes for table `project_material`
--
ALTER TABLE `project_material`
  ADD PRIMARY KEY (`pjm_id`),
  ADD KEY `trans_id` (`trans_id`),
  ADD KEY `work_group_id` (`work_group_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `project_realitations`
--
ALTER TABLE `project_realitations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `project_timeline`
--
ALTER TABLE `project_timeline`
  ADD PRIMARY KEY (`pt_id`),
  ADD KEY `trans_id` (`trans_id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`material_id`);

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
  MODIFY `gl_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `material_budget`
--
ALTER TABLE `material_budget`
  MODIFY `mb_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_budget`
--
ALTER TABLE `project_budget`
  MODIFY `pb_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project_mapping`
--
ALTER TABLE `project_mapping`
  MODIFY `pm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_material`
--
ALTER TABLE `project_material`
  MODIFY `pjm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_realitations`
--
ALTER TABLE `project_realitations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `project_timeline`
--
ALTER TABLE `project_timeline`
  MODIFY `pt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `general_ledger_ibfk_2` FOREIGN KEY (`gl_ref`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `general_ledger_ibfk_3` FOREIGN KEY (`account_no`) REFERENCES `chart_of_account` (`account_no`);

--
-- Constraints for table `material_budget`
--
ALTER TABLE `material_budget`
  ADD CONSTRAINT `material_budget_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_budget_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `raw_materials` (`material_id`),
  ADD CONSTRAINT `material_budget_ibfk_3` FOREIGN KEY (`work_group_id`) REFERENCES `work_group` (`work_group_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_budget`
--
ALTER TABLE `project_budget`
  ADD CONSTRAINT `project_budget_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_budget_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `type_of_work` (`work_id`);

--
-- Constraints for table `project_mapping`
--
ALTER TABLE `project_mapping`
  ADD CONSTRAINT `project_mapping_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_mapping_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `type_of_work` (`work_id`);

--
-- Constraints for table `project_material`
--
ALTER TABLE `project_material`
  ADD CONSTRAINT `project_material_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_material_ibfk_2` FOREIGN KEY (`work_group_id`) REFERENCES `work_group` (`work_group_id`),
  ADD CONSTRAINT `project_material_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `raw_materials` (`material_id`);

--
-- Constraints for table `project_realitations`
--
ALTER TABLE `project_realitations`
  ADD CONSTRAINT `project_realitations_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project_timeline`
--
ALTER TABLE `project_timeline`
  ADD CONSTRAINT `project_timeline_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
