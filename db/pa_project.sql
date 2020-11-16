-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 16, 2020 at 08:19 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8
SET
	SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
	time_zone = "+00:00";

--
-- Database: `pa_project`
--
-- --------------------------------------------------------
--
-- Table structure for table `chart_of_accout`
--
CREATE TABLE `chart_of_accout` (
	`account_no` int(11) NOT NULL,
	`account_name` varchar(100) NOT NULL,
	`normal_balance` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------
--
-- Table structure for table `clients`
--
CREATE TABLE `clients` (
	`client_id` varchar(20) NOT NULL,
	`client_name` varchar(100) NOT NULL,
	`client_company` varchar(100) DEFAULT NULL,
	`client_address` text NOT NULL,
	`cliient_phone` varchar(13) NOT NULL,
	`clieny_email` varchar(100) NOT NULL,
	`status` int(1) NOT NULL DEFAULT '1',
	`created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`created_by` bigint(20) NOT NULL,
	`updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
	`updated_by` bigint(20) DEFAULT NULL,
	`deleted_at` timestamp NULL DEFAULT NULL,
	`deleted_by` bigint(20) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------
--
-- Table structure for table `general_ledger`
--
CREATE TABLE `general_ledger` (
	`gl_id` bigint(20) NOT NULL,
	`acoount_no` int(11) NOT NULL,
	`gl_ref` varchar(50) NOT NULL,
	`gl_balance` varchar(1) NOT NULL,
	`gl_nominal` double NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------
--
-- Table structure for table `payment_method`
--
CREATE TABLE `payment_method` (
	`p_method_id` varchar(20) NOT NULL,
	`p_method_name` varchar(100) NOT NULL,
	`p_method_step` int(11) NOT NULL,
	`p_method_total` int(11) NOT NULL DEFAULT '100'
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------
--
-- Table structure for table `project`
--
CREATE TABLE `project` (
	`project_id` varchar(50) NOT NULL,
	`trans_id` varchar(50) NOT NULL,
	`project_name` varchar(100) NOT NULL,
	`project_start` date NOT NULL,
	`project_due_date` date NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------
--
-- Table structure for table `project_mapping`
--
CREATE TABLE `project_mapping` (
	`pm_id` bigint(20) NOT NULL,
	`trans_id` varchar(50) NOT NULL,
	`work_id` varchar(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

-- --------------------------------------------------------
--
-- Table structure for table `project_timline`
--
CREATE TABLE `project_timline` (
	`pt_id` bigint(20) NOT NULL,
	`trans_id` varchar(50) NOT NULL,
	`pt_name` varchar(100) NOT NULL,
	`done` int(11) NOT NULL,
	`date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`created_by` bigint(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

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
	`total` double NOT NULL,
	`status` int(1) NOT NULL DEFAULT '1',
	`date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`created_by` bigint(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Dumping data for table `type_of_project`
--
INSERT INTO
	`type_of_project` (
		`t_project_id`,
		`t_project_name`,
		`t_project_estimation`,
		`t_project_price`,
		`date_created`,
		`created_by`,
		`date_updated`,
		`updated_by`,
		`deleted_at`,
		`deleted_by`
	)
VALUES
	(
		'JP-0001',
		'Renovasi Rumah Permanen Satu Lantai',
		'60',
		25000000,
		'2020-11-16 19:40:14',
		1,
		'2020-11-16 20:10:50',
		1,
		NULL,
		NULL
	),
	(
		'JP-0002',
		'Renovasi Rumah Permanen Dua Lantai',
		'90',
		50000000,
		'2020-11-16 19:57:38',
		1,
		NULL,
		NULL,
		NULL,
		NULL
	),
	(
		'JP-0003',
		'Renovasi Rumah Permanen Tiga Lantai',
		'180',
		90000000,
		'2020-11-16 19:57:59',
		1,
		NULL,
		NULL,
		NULL,
		NULL
	);

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Dumping data for table `users`
--
INSERT INTO
	`users` (
		`user_id`,
		`name`,
		`username`,
		`password`,
		`role`,
		`status`,
		`date_created`
	)
VALUES
	(
		1,
		'Super Admin',
		'superadmin',
		'$2y$10$pfs8OfIQbLy3vgc2dYuzrOwZXA46cvPMfGsp/yOYPgRDgL3YYoaqu',
		1,
		1,
		'2020-11-16 18:48:32'
	);

-- --------------------------------------------------------
--
-- Table structure for table `work_group`
--
CREATE TABLE `work_group` (
	`work_group_id` varchar(20) NOT NULL,
	`work_group_name` int(11) NOT NULL,
	`status` int(1) NOT NULL DEFAULT '1',
	`date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`created_by` bigint(20) NOT NULL,
	`date_updated` timestamp NULL DEFAULT NULL,
	`updated_by` bigint(20) DEFAULT NULL,
	`deleted_at` timestamp NULL DEFAULT NULL,
	`deleted_by` bigint(20) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Indexes for dumped tables
--
--
-- Indexes for table `chart_of_accout`
--
ALTER TABLE
	`chart_of_accout`
ADD
	PRIMARY KEY (`account_no`);

--
-- Indexes for table `clients`
--
ALTER TABLE
	`clients`
ADD
	PRIMARY KEY (`client_id`),
ADD
	KEY `created_by` (`created_by`),
ADD
	KEY `updated_by` (`updated_by`),
ADD
	KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `general_ledger`
--
ALTER TABLE
	`general_ledger`
ADD
	PRIMARY KEY (`gl_id`),
ADD
	KEY `acoount_no` (`acoount_no`),
ADD
	KEY `gl_ref` (`gl_ref`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE
	`payment_method`
ADD
	PRIMARY KEY (`p_method_id`);

--
-- Indexes for table `project`
--
ALTER TABLE
	`project`
ADD
	PRIMARY KEY (`project_id`),
ADD
	KEY `trans_id` (`trans_id`);

--
-- Indexes for table `project_budget`
--
ALTER TABLE
	`project_budget`
ADD
	PRIMARY KEY (`pb_id`),
ADD
	KEY `trans_id` (`trans_id`),
ADD
	KEY `work_id` (`work_id`);

--
-- Indexes for table `project_mapping`
--
ALTER TABLE
	`project_mapping`
ADD
	PRIMARY KEY (`pm_id`),
ADD
	KEY `trans_id` (`trans_id`),
ADD
	KEY `work_id` (`work_id`);

--
-- Indexes for table `project_timline`
--
ALTER TABLE
	`project_timline`
ADD
	PRIMARY KEY (`pt_id`),
ADD
	KEY `trans_id` (`trans_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE
	`transactions`
ADD
	PRIMARY KEY (`trans_id`),
ADD
	KEY `t_project_id` (`t_project_id`),
ADD
	KEY `p_method_id` (`p_method_id`),
ADD
	KEY `client_id` (`client_id`);

--
-- Indexes for table `type_of_project`
--
ALTER TABLE
	`type_of_project`
ADD
	PRIMARY KEY (`t_project_id`),
ADD
	KEY `created_by` (`created_by`),
ADD
	KEY `updated_by` (`updated_by`),
ADD
	KEY `deleted_by` (`deleted_by`);

--
-- Indexes for table `type_of_work`
--
ALTER TABLE
	`type_of_work`
ADD
	PRIMARY KEY (`work_id`),
ADD
	KEY `created_by` (`created_by`),
ADD
	KEY `deleted_by` (`deleted_by`),
ADD
	KEY `updated_by` (`updated_by`),
ADD
	KEY `work_group_id` (`work_group_id`);

--
-- Indexes for table `users`
--
ALTER TABLE
	`users`
ADD
	PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_group`
--
ALTER TABLE
	`work_group`
ADD
	PRIMARY KEY (`work_group_id`),
ADD
	KEY `created_by` (`created_by`),
ADD
	KEY `updated_by` (`updated_by`),
ADD
	KEY `deleted_by` (`deleted_by`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `general_ledger`
--
ALTER TABLE
	`general_ledger`
MODIFY
	`gl_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_budget`
--
ALTER TABLE
	`project_budget`
MODIFY
	`pb_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_mapping`
--
ALTER TABLE
	`project_mapping`
MODIFY
	`pm_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_timline`
--
ALTER TABLE
	`project_timline`
MODIFY
	`pt_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE
	`users`
MODIFY
	`user_id` bigint(20) NOT NULL AUTO_INCREMENT,
	AUTO_INCREMENT = 2;

--
-- Constraints for dumped tables
--
--
-- Constraints for table `clients`
--
ALTER TABLE
	`clients`
ADD
	CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `clients_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `general_ledger`
--
ALTER TABLE
	`general_ledger`
ADD
	CONSTRAINT `general_ledger_ibfk_1` FOREIGN KEY (`acoount_no`) REFERENCES `chart_of_accout` (`account_no`),
ADD
	CONSTRAINT `general_ledger_ibfk_2` FOREIGN KEY (`gl_ref`) REFERENCES `transactions` (`trans_id`);

--
-- Constraints for table `project`
--
ALTER TABLE
	`project`
ADD
	CONSTRAINT `project_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`);

--
-- Constraints for table `project_budget`
--
ALTER TABLE
	`project_budget`
ADD
	CONSTRAINT `project_budget_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`),
ADD
	CONSTRAINT `project_budget_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `type_of_work` (`work_id`);

--
-- Constraints for table `project_mapping`
--
ALTER TABLE
	`project_mapping`
ADD
	CONSTRAINT `project_mapping_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`),
ADD
	CONSTRAINT `project_mapping_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `type_of_work` (`work_id`);

--
-- Constraints for table `project_timline`
--
ALTER TABLE
	`project_timline`
ADD
	CONSTRAINT `project_timline_ibfk_1` FOREIGN KEY (`trans_id`) REFERENCES `transactions` (`trans_id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE
	`transactions`
ADD
	CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`t_project_id`) REFERENCES `type_of_project` (`t_project_id`),
ADD
	CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`p_method_id`) REFERENCES `payment_method` (`p_method_id`),
ADD
	CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`);

--
-- Constraints for table `type_of_project`
--
ALTER TABLE
	`type_of_project`
ADD
	CONSTRAINT `type_of_project_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `type_of_project_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `type_of_project_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `type_of_work`
--
ALTER TABLE
	`type_of_work`
ADD
	CONSTRAINT `type_of_work_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `type_of_work_ibfk_2` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `type_of_work_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `type_of_work_ibfk_4` FOREIGN KEY (`work_group_id`) REFERENCES `work_group` (`work_group_id`);

--
-- Constraints for table `work_group`
--
ALTER TABLE
	`work_group`
ADD
	CONSTRAINT `work_group_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `work_group_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`),
ADD
	CONSTRAINT `work_group_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`user_id`);
