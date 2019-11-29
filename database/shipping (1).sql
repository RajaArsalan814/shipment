-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 02:38 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `code` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(140) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(64) COLLATE latin1_general_ci NOT NULL,
  `contact_no` int(15) NOT NULL,
  `fax_no` int(15) NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `contact_person` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `port_id` int(11) NOT NULL,
  `user_name` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `code`, `name`, `address`, `contact_no`, `fax_no`, `email`, `contact_person`, `user_id`, `port_id`, `user_name`, `created_at`, `updated_at`) VALUES
(8, '345', 'test test', 'Afghanistan', 1112223333, 3424, 'test@gmail.com', '324234', 1, 20, 'asdasd', '2019-11-28 08:57:38.383094', '2019-11-28 08:57:38.383094');

-- --------------------------------------------------------

--
-- Table structure for table `agent_charges`
--

CREATE TABLE `agent_charges` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `charges_id` int(11) DEFAULT NULL,
  `amount` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_charges`
--

INSERT INTO `agent_charges` (`id`, `agent_id`, `charges_id`, `amount`) VALUES
(35, 8, 1, 342),
(36, 8, 2, 432),
(37, 8, NULL, NULL),
(38, 8, 5, 234),
(39, 8, 6, 432),
(40, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bl`
--

CREATE TABLE `bl` (
  `BL_ID` int(120) NOT NULL,
  `CRO_ID` int(10) NOT NULL,
  `CONSIGNEE_ID` int(10) NOT NULL,
  `NOTIFY_TO_ID` int(10) NOT NULL,
  `GOODS_PKGS_DESC` varchar(500) DEFAULT NULL,
  `MOVEMENT_TYPE_ID` int(10) NOT NULL,
  `BL_DATE` date NOT NULL,
  `AGENT_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bl_detail`
--

CREATE TABLE `bl_detail` (
  `BL_ID` int(10) NOT NULL,
  `CONTAINER_ID` int(10) NOT NULL,
  `SEAL_NO` varchar(20) NOT NULL,
  `QTY` int(10) DEFAULT NULL,
  `UOM` int(10) DEFAULT NULL,
  `GROSS_WGHT` int(10) DEFAULT NULL,
  `CONTAINER_DETAIL` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `id` int(10) NOT NULL,
  `code` varchar(6) NOT NULL,
  `description` varchar(100) NOT NULL,
  `user_id` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `charge_type` varchar(2) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `code`, `description`, `user_id`, `created_at`, `charge_type`, `updated_at`) VALUES
(1, '542', 'FCL', '1', '2019-10-27 19:51:22.632606', 'I', '2019-10-27 19:51:47.964482'),
(2, '343', 'LCL', '1', '2019-10-28 03:00:11.203036', 'I', '2019-10-28 03:00:11.203036'),
(5, '435', 'RETO', '1', '2019-11-21 08:43:55.160493', 'E', '2019-11-21 08:43:55.160493'),
(6, '435', 'BCC', '1', '2019-11-21 08:43:55.160493', 'E', '2019-11-21 08:43:55.160493');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(10) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `fax_no` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `url` varchar(30) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `code`, `name`, `address`, `contact_no`, `fax_no`, `email`, `url`, `user_id`, `created_at`, `updated_at`) VALUES
(4, '342', 'asd', 'Afghanistan', '234234', '234234', 'test@gmail.com', 'asdasd', '1', '2019-11-27 12:03:25.053254', '2019-11-27 12:03:25.053254');

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE `consignee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `fax_no` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`id`, `name`, `address`, `contact_no`, `fax_no`, `email`, `contact_person`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', '342', '234', 'admin@admin.com', '3', '1', '2019-10-26 17:25:57.231195', '2019-10-26 17:25:57.231195');

-- --------------------------------------------------------

--
-- Table structure for table `container_master`
--

CREATE TABLE `container_master` (
  `id` int(11) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `container_type_id` int(11) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `pur_port_id` int(11) DEFAULT NULL,
  `supplier` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container_master`
--

INSERT INTO `container_master` (`id`, `code`, `description`, `container_type_id`, `cost`, `company_id`, `pur_port_id`, `supplier`) VALUES
(8, '345', 'asdasd', 2, 324, 4, 20, 'sadasd');

-- --------------------------------------------------------

--
-- Table structure for table `container_movement`
--

CREATE TABLE `container_movement` (
  `TRANSACTION_ID` int(11) DEFAULT NULL,
  `TRANSACTION_DATE` date DEFAULT NULL,
  `CONTAINER_ID` int(11) DEFAULT NULL,
  `TRANSACTION_REF_NO` int(11) DEFAULT NULL,
  `IN_OUT` varchar(1) DEFAULT NULL,
  `DEPOT_ID` int(11) DEFAULT NULL,
  `RC_USER_ID` varchar(15) DEFAULT NULL,
  `RC_DT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `container_release`
--

CREATE TABLE `container_release` (
  `CRO_ID` int(11) DEFAULT NULL,
  `CONTAINER_ID` int(11) DEFAULT NULL,
  `REMARKS` varchar(200) DEFAULT NULL,
  `RC_USER_ID` varchar(15) DEFAULT NULL,
  `RC_DT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `container_type`
--

CREATE TABLE `container_type` (
  `id` int(11) NOT NULL,
  `container_size` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container_type`
--

INSERT INTO `container_type` (`id`, `container_size`) VALUES
(1, '20 refregierators'),
(2, '40 refregierator'),
(3, '30 refrigerators');

-- --------------------------------------------------------

--
-- Table structure for table `cro`
--

CREATE TABLE `cro` (
  `CRO_ID` int(11) DEFAULT NULL,
  `SHIPPER_ID` int(11) DEFAULT NULL,
  `FORWARDER_ID` int(11) DEFAULT NULL,
  `VOYAGE_ID` int(11) DEFAULT NULL,
  `SALES_PERSON` varchar(100) DEFAULT NULL,
  `DEPOT_ID` int(11) DEFAULT NULL,
  `HAULIER_CODE` varchar(20) DEFAULT NULL,
  `REMARKS` varchar(500) DEFAULT NULL,
  `CRO_DATE` date DEFAULT NULL,
  `COMPANY_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cro_charges`
--

CREATE TABLE `cro_charges` (
  `CRO_ID` int(11) DEFAULT NULL,
  `CHARGES_ID` int(11) DEFAULT NULL,
  `AMOUNT` int(11) DEFAULT NULL,
  `CURRENCY_ID` int(11) DEFAULT NULL,
  `RC_USER_ID` varchar(15) DEFAULT NULL,
  `RC_DT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cro_container`
--

CREATE TABLE `cro_container` (
  `CRO_ID` int(11) DEFAULT NULL,
  `CONTAINER_TYPE_ID` int(11) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `depot`
--

CREATE TABLE `depot` (
  `id` int(11) NOT NULL,
  `code` varchar(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `contact_person` varchar(30) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depot`
--

INSERT INTO `depot` (`id`, `code`, `name`, `address`, `contact_no`, `contact_person`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '32', 'asdawsd', 'asd', '23', '234', '1', '2019-10-26 17:57:28.463241', '2019-10-26 17:57:34.230200');

-- --------------------------------------------------------

--
-- Table structure for table `forwarder`
--

CREATE TABLE `forwarder` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `fax_no` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forwarder`
--

INSERT INTO `forwarder` (`id`, `name`, `address`, `contact_no`, `fax_no`, `email`, `contact_person`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'asd', 'asd', '23', '23', 'asd@gmail.com', '231', '1', '2019-10-26 17:37:38.566745', '2019-10-26 17:37:38.566745');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_import`
--

CREATE TABLE `invoice_import` (
  `id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `bl_id` int(11) DEFAULT NULL,
  `consignee_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `currency_rate` int(10) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movement_type`
--

CREATE TABLE `movement_type` (
  `movement_type_id` int(11) DEFAULT NULL,
  `description` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `id` int(11) NOT NULL,
  `code` varchar(15) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `port`
--

INSERT INTO `port` (`id`, `code`, `name`, `address`, `created_at`, `updated_at`) VALUES
(20, '345', 'jebebl ali', 'dubai', '2019-11-28 08:56:29.361241', '2019-11-28 08:56:29.361241');

-- --------------------------------------------------------

--
-- Table structure for table `port_charges`
--

CREATE TABLE `port_charges` (
  `id` int(11) NOT NULL,
  `port_id` int(11) DEFAULT NULL,
  `charges_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `port_charges`
--

INSERT INTO `port_charges` (`id`, `port_id`, `charges_id`, `amount`, `created_at`, `updated_at`) VALUES
(81, 20, 1, 432, '2019-11-28 08:57:00.733059', '2019-11-28 08:57:00.733059'),
(82, 20, 2, 423, '2019-11-28 08:57:00.782913', '2019-11-28 08:57:00.782913'),
(83, 20, NULL, NULL, '2019-11-28 08:57:00.824518', '2019-11-28 08:57:00.824518'),
(84, 20, 6, 324, '2019-11-28 08:57:00.846543', '2019-11-28 08:57:00.846543'),
(85, 20, 5, 4234, '2019-11-28 08:57:00.879293', '2019-11-28 08:57:00.879293'),
(86, 20, NULL, NULL, '2019-11-28 08:57:00.907303', '2019-11-28 08:57:00.907303');

-- --------------------------------------------------------

--
-- Table structure for table `shipper`
--

CREATE TABLE `shipper` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `fax_no` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipper`
--

INSERT INTO `shipper` (`id`, `name`, `address`, `contact_no`, `fax_no`, `email`, `contact_person`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'dsfsss', 'asd', '32', '56', 'arsalan@gmail.com', '65', '1', '2019-10-26 17:10:53.111555', '2019-10-26 17:11:47.107743'),
(2, 'asd', 'asd', '342', '342', 'admin@admin.com', '654', '1', '2019-10-26 17:24:57.895626', '2019-10-26 17:24:57.895626');

-- --------------------------------------------------------

--
-- Table structure for table `slot_operator`
--

CREATE TABLE `slot_operator` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slot_operator_payment`
--

CREATE TABLE `slot_operator_payment` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `slot_operator_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `cheque_no` varchar(30) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `so_payment_detail`
--

CREATE TABLE `so_payment_detail` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `voyage_id` int(11) DEFAULT NULL,
  `invoice_no` varchar(20) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `description` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vessel`
--

CREATE TABLE `vessel` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `owner` varchar(100) DEFAULT NULL,
  `user_id` varchar(15) DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vessel`
--

INSERT INTO `vessel` (`id`, `code`, `name`, `owner`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1234', 'vessel 1', 'asd', NULL, '2019-10-30 13:36:42.285249', '2019-10-30 13:36:42.285249'),
(2, '345', 'sdf', 'sdf', NULL, '2019-11-21 08:54:35.842771', '2019-11-21 08:54:35.842771');

-- --------------------------------------------------------

--
-- Table structure for table `voyage`
--

CREATE TABLE `voyage` (
  `id` int(11) NOT NULL,
  `code` varchar(15) DEFAULT NULL,
  `vessel_id` int(11) DEFAULT NULL,
  `etd_date` date DEFAULT NULL,
  `eta_date` date DEFAULT NULL,
  `loading_port_id` int(11) DEFAULT NULL,
  `destination_port_id` int(11) DEFAULT NULL,
  `final_destination` varchar(100) DEFAULT NULL,
  `slot_payment_by` varchar(151) DEFAULT NULL,
  `slot_operator_id` int(11) DEFAULT NULL,
  `slot_rate` int(11) DEFAULT NULL,
  `terminal_name` varchar(100) DEFAULT NULL,
  `thc_amount` int(10) DEFAULT NULL,
  `thc_to_shipper` int(10) DEFAULT NULL,
  `slot_operation_paid` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voyage`
--

INSERT INTO `voyage` (`id`, `code`, `vessel_id`, `etd_date`, `eta_date`, `loading_port_id`, `destination_port_id`, `final_destination`, `slot_payment_by`, `slot_operator_id`, `slot_rate`, `terminal_name`, `thc_amount`, `thc_to_shipper`, `slot_operation_paid`) VALUES
(1, 'aaaaa', 1, '2019-11-14', '2019-11-15', 20, 20, 'ads', NULL, NULL, 342, 'asd', 342, NULL, 'sad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_charges`
--
ALTER TABLE `agent_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bl`
--
ALTER TABLE `bl`
  ADD PRIMARY KEY (`BL_ID`);

--
-- Indexes for table `bl_detail`
--
ALTER TABLE `bl_detail`
  ADD PRIMARY KEY (`BL_ID`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `container_master`
--
ALTER TABLE `container_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `container_type`
--
ALTER TABLE `container_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forwarder`
--
ALTER TABLE `forwarder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_import`
--
ALTER TABLE `invoice_import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port_charges`
--
ALTER TABLE `port_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipper`
--
ALTER TABLE `shipper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot_operator`
--
ALTER TABLE `slot_operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot_operator_payment`
--
ALTER TABLE `slot_operator_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so_payment_detail`
--
ALTER TABLE `so_payment_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vessel`
--
ALTER TABLE `vessel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `agent_charges`
--
ALTER TABLE `agent_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `container_master`
--
ALTER TABLE `container_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `container_type`
--
ALTER TABLE `container_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `depot`
--
ALTER TABLE `depot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forwarder`
--
ALTER TABLE `forwarder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_import`
--
ALTER TABLE `invoice_import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `port_charges`
--
ALTER TABLE `port_charges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `shipper`
--
ALTER TABLE `shipper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slot_operator`
--
ALTER TABLE `slot_operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot_operator_payment`
--
ALTER TABLE `slot_operator_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `so_payment_detail`
--
ALTER TABLE `so_payment_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vessel`
--
ALTER TABLE `vessel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
