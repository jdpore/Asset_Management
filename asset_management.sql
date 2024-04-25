-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 08:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asset_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountability_details`
--

CREATE TABLE `accountability_details` (
  `id` int(200) NOT NULL,
  `employee_number` varchar(200) NOT NULL,
  `asset_id` varchar(200) NOT NULL,
  `date_allocation` date NOT NULL DEFAULT current_timestamp(),
  `control_number` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `branch_encoded` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountability_details`
--

INSERT INTO `accountability_details` (`id`, `employee_number`, `asset_id`, `date_allocation`, `control_number`, `location`, `branch_encoded`, `status`) VALUES
(31, '011997224', '11', '2024-04-12', 'UBX-MKT-240412-001', 'HO 4th Flr', 'Head Office', 'Deployed'),
(32, '011997224', '12', '2024-04-12', 'UBX-MKT-240412-001', 'HO 4th Flr', 'Head Office', 'Deployed'),
(33, '011839111', '14', '2024-04-12', 'UBX-MKT-240412-004', 'HO Show Room', 'Head Office', 'Deployed'),
(34, '011995124', '17', '2024-04-12', 'UBX-MKT-240412-005', 'HO Show Room', 'Head Office', 'Deployed'),
(35, '011995124', '16', '2024-04-12', 'UBX-MKT-240412-005', 'HO Show Room', 'Head Office', 'Deployed'),
(36, '011995024', '15', '2024-04-12', 'UBX-MKT-240412-007', 'HO 2nd Flr', 'Head Office', 'Deployed'),
(37, '011992924', '18', '2024-04-12', 'UBX-MKT-240412-008', 'HO Show Room', 'Head Office', 'Deployed'),
(38, '011992924', '19', '2024-04-12', 'UBX-MKT-240412-008', 'HO Show Room', 'Head Office', 'Deployed'),
(39, '011992924', '13', '2024-04-12', 'UBX-MKT-240412-008', 'HO Show Room', 'Head Office', 'Deployed'),
(40, '011997024', '20', '2024-04-15', 'UBX-MKT-240415-001', 'Pet Plans', 'Head Office', 'Deployed'),
(41, '011997024', '21', '2024-04-15', 'UBX-MKT-240415-001', 'Pet Plans', 'Head Office', 'Deployed'),
(42, '011997024', '22', '2024-04-15', 'UBX-MKT-240415-001', 'Pet Plans', 'Head Office', 'Deployed'),
(43, '011996624', '23', '2024-04-15', 'UBX-MKT-240415-004', 'Pet Plans', 'Head Office', 'Deployed'),
(44, '011996624', '24', '2024-04-15', 'UBX-MKT-240415-004', 'Pet Plans', 'Head Office', 'Deployed'),
(45, '011996624', '25', '2024-04-15', 'UBX-MKT-240415-004', 'Pet Plans', 'Head Office', 'Deployed'),
(46, '011995324', '26', '2024-04-15', 'UBX-MKT-240415-007', 'HO 4th Flr', 'Head Office', 'Deployed'),
(47, '011995324', '27', '2024-04-15', 'UBX-MKT-240415-007', 'HO 4th Flr', 'Head Office', 'Deployed'),
(48, '011995324', '28', '2024-04-15', 'UBX-MKT-240415-007', 'HO 4th Flr', 'Head Office', 'Deployed'),
(49, '011995324', '29', '2024-04-15', 'UBX-MKT-240415-007', 'HO 4th Flr', 'Head Office', 'Deployed'),
(50, '013045323', '30', '2024-04-15', 'UBX-MKT-240415-011', 'HO 3rd Flr', 'Head Office', 'Deployed'),
(51, '011912717', '31', '2024-04-15', 'UBX-MKT-240415-012', 'HO Show Room', 'Head Office', 'Deployed'),
(52, '011912717', '33', '2024-04-15', 'UBX-MKT-240415-012', 'HO Show Room', 'Head Office', 'Deployed'),
(53, '011912717', '34', '2024-04-15', 'UBX-MKT-240415-012', 'HO Show Room', 'Head Office', 'Deployed'),
(54, '011992023', '35', '2024-04-15', 'UBX-MKT-240415-015', 'HO 4th Flr', 'Head Office', 'Deployed'),
(55, '011945619', '36', '2024-04-15', 'UBX-MKT-240415-016', 'HO 4th Flr', 'Head Office', 'Deployed'),
(56, '011945619', '37', '2024-04-15', 'UBX-MKT-240415-016', 'HO 4th Flr', 'Head Office', 'Deployed'),
(57, '011988923', '38', '2024-04-15', 'UBX-MKT-240415-018', 'HO 4th Flr', 'Head Office', 'Deployed'),
(58, '011974522', '39', '2024-04-16', 'UBX-SCT-240416-001', 'Sucat Warehouse', 'Sucat', 'Deployed'),
(59, '013044323', '40', '2024-04-16', 'UBX-SCT-240416-002', 'Sucat Warehouse', 'Sucat', 'Deployed'),
(60, '013044323', '41', '2024-04-16', 'UBX-SCT-240416-003', 'Sucat Warehouse', 'Sucat', 'Deployed'),
(61, '013039422', '42', '2024-04-16', 'UBX-MKT-240416-004', 'HO 2nd Flr', 'Head Office', 'Deployed'),
(62, '013039422', '43', '2024-04-16', 'UBX-MKT-240416-004', 'HO 2nd Flr', 'Head Office', 'Deployed'),
(63, '013039422', '44', '2024-04-16', 'UBX-MKT-240416-004', 'HO 2nd Flr', 'Head Office', 'Deployed'),
(64, '011994724', '45', '2024-04-16', 'UBX-MKT-240416-007', 'HO 5th Flr', 'Head Office', 'Deployed'),
(65, '011991423', '48', '2024-04-16', 'UBX-MKT-240416-008', 'HO 4th Flr', 'Head Office', 'Deployed'),
(66, '011991623', '49', '2024-04-16', 'UBX-MKT-240416-009', 'HO 4th Flr', 'Head Office', 'Deployed'),
(67, '011974522', '50', '2024-04-16', 'UBX-SCT-240416-010', 'Sucat Warehouse', 'Sucat', 'Deployed'),
(68, '011974522', '51', '2024-04-16', 'UBX-SCT-240416-010', 'Sucat Warehouse', 'Sucat', 'Deployed'),
(69, '011974522', '52', '2024-04-16', 'UBX-SCT-240416-010', 'Sucat Warehouse', 'Sucat', 'Deployed'),
(70, '013042923', '53', '2024-04-17', 'UBX-MKT-240417-001', 'HO 3rd Flr', 'Head Office', 'Deployed'),
(71, '013043125', '54', '2024-04-17', 'UBX-MKT-240417-002', 'HO 3rd Flr', 'Head Office', 'Deployed'),
(72, '013044223', '55', '2024-04-17', 'UBX-MKT-240417-003', 'HO 3rd Flr', 'Head Office', 'Deployed'),
(73, '011990723', '59', '2024-04-18', 'UBX-MKT-240418-001', 'HO 2nd Flr', 'Head Office', 'Deployed'),
(74, '011990723', '58', '2024-04-18', 'UBX-MKT-240418-001', 'HO 2nd Flr', 'Head Office', 'Deployed'),
(75, '013045523', '65', '2024-04-18', 'UBX-MKT-240418-003', 'HO 3rd Flr', 'Head Office', 'Deployed'),
(76, '011977122', '63', '2024-04-18', 'UBX-SCT-240418-004', 'Sucat Okamura 3rd Fl', 'Sucat', 'Deployed'),
(77, '011977122', '61', '2024-04-18', 'UBX-SCT-240418-004', 'Sucat Okamura 3rd Fl', 'Sucat', 'Deployed'),
(78, '011977122', '62', '2024-04-18', 'UBX-SCT-240418-004', 'Sucat Okamura 3rd Fl', 'Sucat', 'Deployed'),
(79, '011977122', '60', '2024-04-18', 'UBX-SCT-240418-007', 'Sucat Okamura 3rd Fl', 'Sucat', 'Deployed'),
(80, '203044624', '66', '2024-04-18', 'UBX-MKT-240418-008', 'HO 5th Flr', 'Head Office', 'Deployed'),
(81, '011988223', '67', '2024-04-18', 'UBX-MKT-240418-009', 'HO 4th Flr', 'Head Office', 'Deployed');

-- --------------------------------------------------------

--
-- Table structure for table `accountability_history`
--

CREATE TABLE `accountability_history` (
  `id` int(200) NOT NULL,
  `asset_id` varchar(200) NOT NULL,
  `employee_id` varchar(200) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `control_number` varchar(200) NOT NULL,
  `person_incharge` varchar(200) NOT NULL,
  `date_time_transaction` datetime NOT NULL DEFAULT current_timestamp(),
  `reason` varchar(200) NOT NULL DEFAULT 'N/A',
  `location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountability_history`
--

INSERT INTO `accountability_history` (`id`, `asset_id`, `employee_id`, `transaction`, `control_number`, `person_incharge`, `date_time_transaction`, `reason`, `location`) VALUES
(21, '10', '011997224', 'Deployed', 'UBX-MKT-240412-001', '011995024', '2024-04-12 10:43:21', 'N/A', 'HO 4th Flr'),
(22, '11', '011997224', 'Deployed', 'UBX-MKT-240412-001', '011995024', '2024-04-12 10:43:22', 'N/A', 'HO 4th Flr'),
(23, '12', '011997224', 'Deployed', 'UBX-MKT-240412-001', '011995024', '2024-04-12 10:43:22', 'N/A', 'HO 4th Flr'),
(24, '14', '011839111', 'Deployed', 'UBX-MKT-240412-004', '011995024', '2024-04-12 13:18:01', 'N/A', 'HO Show Room'),
(25, '17', '011995124', 'Deployed', 'UBX-MKT-240412-005', '011995024', '2024-04-12 13:40:22', 'N/A', 'HO Show Room'),
(26, '16', '011995124', 'Deployed', 'UBX-MKT-240412-005', '011995024', '2024-04-12 13:40:23', 'N/A', 'HO Show Room'),
(27, '15', '011995024', 'Deployed', 'UBX-MKT-240412-007', '011995024', '2024-04-12 13:40:58', 'N/A', 'HO 2nd Flr'),
(28, '18', '011992924', 'Deployed', 'UBX-MKT-240412-008', '011995024', '2024-04-12 14:00:00', 'N/A', 'HO Show Room'),
(29, '19', '011992924', 'Deployed', 'UBX-MKT-240412-008', '011995024', '2024-04-12 14:00:00', 'N/A', 'HO Show Room'),
(30, '13', '011992924', 'Deployed', 'UBX-MKT-240412-008', '011995024', '2024-04-12 14:00:00', 'N/A', 'HO Show Room'),
(31, '20', '011997024', 'Deployed', 'UBX-MKT-240415-001', '011995024', '2024-04-15 08:31:44', 'N/A', 'Pet Plans'),
(32, '21', '011997024', 'Deployed', 'UBX-MKT-240415-001', '011995024', '2024-04-15 08:31:44', 'N/A', 'Pet Plans'),
(33, '22', '011997024', 'Deployed', 'UBX-MKT-240415-001', '011995024', '2024-04-15 08:31:44', 'N/A', 'Pet Plans'),
(34, '23', '011996624', 'Deployed', 'UBX-MKT-240415-004', '011995024', '2024-04-15 08:51:04', 'N/A', 'Pet Plans'),
(35, '24', '011996624', 'Deployed', 'UBX-MKT-240415-004', '011995024', '2024-04-15 08:51:04', 'N/A', 'Pet Plans'),
(36, '25', '011996624', 'Deployed', 'UBX-MKT-240415-004', '011995024', '2024-04-15 08:51:04', 'N/A', 'Pet Plans'),
(37, '26', '011995324', 'Deployed', 'UBX-MKT-240415-007', '011995024', '2024-04-15 09:40:13', 'N/A', 'HO 4th Flr'),
(38, '27', '011995324', 'Deployed', 'UBX-MKT-240415-007', '011995024', '2024-04-15 09:40:13', 'N/A', 'HO 4th Flr'),
(39, '28', '011995324', 'Deployed', 'UBX-MKT-240415-007', '011995024', '2024-04-15 09:40:13', 'N/A', 'HO 4th Flr'),
(40, '29', '011995324', 'Deployed', 'UBX-MKT-240415-007', '011995024', '2024-04-15 09:40:13', 'N/A', 'HO 4th Flr'),
(41, '30', '013045323', 'Deployed', 'UBX-MKT-240415-011', '011995024', '2024-04-15 10:21:24', 'N/A', 'HO 3rd Flr'),
(42, '31', '011912717', 'Deployed', 'UBX-MKT-240415-012', '011995024', '2024-04-15 15:07:15', 'N/A', 'HO Show Room'),
(43, '33', '011912717', 'Deployed', 'UBX-MKT-240415-012', '011995024', '2024-04-15 15:07:15', 'N/A', 'HO Show Room'),
(44, '34', '011912717', 'Deployed', 'UBX-MKT-240415-012', '011995024', '2024-04-15 15:07:15', 'N/A', 'HO Show Room'),
(45, '35', '011992023', 'Deployed', 'UBX-MKT-240415-015', '011995024', '2024-04-15 17:31:40', 'N/A', 'HO 4th Flr'),
(46, '36', '011945619', 'Deployed', 'UBX-MKT-240415-016', '011995024', '2024-04-15 17:36:30', 'N/A', 'HO 4th Flr'),
(47, '37', '011945619', 'Deployed', 'UBX-MKT-240415-016', '011995024', '2024-04-15 17:36:30', 'N/A', 'HO 4th Flr'),
(48, '38', '011988923', 'Deployed', 'UBX-MKT-240415-018', '011995024', '2024-04-15 17:38:37', 'N/A', 'HO 4th Flr'),
(49, '39', '011974522', 'Deployed', 'UBX-SCT-240416-001', '011974522', '2024-04-16 12:07:56', 'N/A', 'Sucat Warehouse'),
(50, '40', '013044323', 'Deployed', 'UBX-SCT-240416-002', '011974522', '2024-04-16 12:28:00', 'N/A', 'Sucat Warehouse'),
(51, '41', '013044323', 'Deployed', 'UBX-SCT-240416-003', '011974522', '2024-04-16 12:30:22', 'N/A', 'Sucat Warehouse'),
(52, '42', '013039422', 'Deployed', 'UBX-MKT-240416-004', '011995024', '2024-04-16 13:19:46', 'N/A', 'HO 2nd Flr'),
(53, '43', '013039422', 'Deployed', 'UBX-MKT-240416-004', '011995024', '2024-04-16 13:19:46', 'N/A', 'HO 2nd Flr'),
(54, '44', '013039422', 'Deployed', 'UBX-MKT-240416-004', '011995024', '2024-04-16 13:19:46', 'N/A', 'HO 2nd Flr'),
(55, '45', '011994724', 'Deployed', 'UBX-MKT-240416-007', '011995024', '2024-04-16 14:15:23', 'N/A', 'HO 5th Flr'),
(56, '48', '011991423', 'Deployed', 'UBX-MKT-240416-008', '011995024', '2024-04-16 15:41:46', 'N/A', 'HO 4th Flr'),
(57, '49', '011991623', 'Deployed', 'UBX-MKT-240416-009', '011995024', '2024-04-16 16:09:13', 'N/A', 'HO 4th Flr'),
(58, '50', '011974522', 'Deployed', 'UBX-SCT-240416-010', '011974522', '2024-04-16 16:47:18', 'N/A', 'Sucat Warehouse'),
(59, '51', '011974522', 'Deployed', 'UBX-SCT-240416-010', '011974522', '2024-04-16 16:47:18', 'N/A', 'Sucat Warehouse'),
(60, '52', '011974522', 'Deployed', 'UBX-SCT-240416-010', '011974522', '2024-04-16 16:47:19', 'N/A', 'Sucat Warehouse'),
(61, '53', '013042923', 'Deployed', 'UBX-MKT-240417-001', '011995024', '2024-04-17 09:17:28', 'N/A', 'HO 3rd Flr'),
(62, '54', '013043125', 'Deployed', 'UBX-MKT-240417-002', '011995024', '2024-04-17 09:17:46', 'N/A', 'HO 3rd Flr'),
(63, '55', '013044223', 'Deployed', 'UBX-MKT-240417-003', '011995024', '2024-04-17 09:34:40', 'N/A', 'HO 3rd Flr'),
(64, '59', '011990723', 'Deployed', 'UBX-MKT-240418-001', '011995024', '2024-04-18 08:29:36', 'N/A', 'HO 2nd Flr'),
(65, '58', '011990723', 'Deployed', 'UBX-MKT-240418-001', '011995024', '2024-04-18 08:29:37', 'N/A', 'HO 2nd Flr'),
(66, '65', '013045523', 'Deployed', 'UBX-MKT-240418-003', '011995024', '2024-04-18 11:01:36', 'N/A', 'HO 3rd Flr'),
(67, '63', '011977122', 'Deployed', 'UBX-SCT-240418-004', '011974522', '2024-04-18 11:02:07', 'N/A', 'Sucat Okamura 3rd Fl'),
(68, '61', '011977122', 'Deployed', 'UBX-SCT-240418-004', '011974522', '2024-04-18 11:02:08', 'N/A', 'Sucat Okamura 3rd Fl'),
(69, '62', '011977122', 'Deployed', 'UBX-SCT-240418-004', '011974522', '2024-04-18 11:02:08', 'N/A', 'Sucat Okamura 3rd Fl'),
(70, '60', '011977122', 'Deployed', 'UBX-SCT-240418-007', '011974522', '2024-04-18 11:03:25', 'N/A', 'Sucat Okamura 3rd Fl'),
(71, '66', '203044624', 'Deployed', 'UBX-MKT-240418-008', '011995024', '2024-04-18 15:02:18', 'N/A', 'HO 5th Flr'),
(72, '67', '011988223', 'Deployed', 'UBX-MKT-240418-009', '011995024', '2024-04-18 15:54:43', 'N/A', 'HO 4th Flr'),
(73, '68', '013045423', 'Deployed', 'UBX-MKT-240419-001', '011995024', '2024-04-19 11:03:07', 'N/A', 'HO 5th Flr'),
(74, '68', '013045423', 'Pull-Out', 'UBX-MKT-240419-001', '011990723', '2024-04-23 17:43:06', 'N/A', 'HO 2nd Flr'),
(75, '10', '011997224', 'Pull-Out', 'UBX-MKT-240412-001', '011990723', '2024-04-25 09:34:43', 'N/A', 'HO 2nd Flr');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(200) NOT NULL,
  `field` varchar(200) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `field`, `category_name`) VALUES
(1, 'department', 'MIS'),
(10, 'branch', 'Head Office'),
(11, 'branch', 'Pet Plans'),
(12, 'branch', 'Sucat'),
(13, 'branch', 'Angeles'),
(14, 'branch', 'Batangas'),
(15, 'branch', 'Cabanatuan'),
(16, 'branch', 'Cavite'),
(17, 'branch', 'La Union'),
(18, 'branch', 'Laguna'),
(19, 'branch', 'Naga'),
(20, 'branch', 'Subic'),
(21, 'branch', 'Bacolod'),
(22, 'branch', 'Dumaguete'),
(23, 'branch', 'Cebu'),
(24, 'branch', 'IloIlo'),
(25, 'branch', 'Tacloban'),
(26, 'branch', 'Cagayan De Oro'),
(27, 'branch', 'Davao'),
(28, 'branch', 'General Santos'),
(29, 'branch', 'Zamboanga'),
(30, 'department', 'Marketing'),
(31, 'department', 'Purchasing'),
(32, 'department', 'Material Management'),
(33, 'department', 'Audit'),
(34, 'department', 'Billing'),
(35, 'department', 'Treasury'),
(36, 'department', 'Sales Admin'),
(37, 'department', 'Admin'),
(38, 'department', 'Tax'),
(39, 'department', 'Accounting'),
(40, 'department', 'Accounting Affiliates'),
(41, 'department', 'Sales Consumables'),
(42, 'department', 'OP Sales'),
(43, 'department', 'PP Sales'),
(44, 'department', 'MFP Sales'),
(45, 'department', 'Riso Sales'),
(46, 'department', 'General Management'),
(47, 'department', 'UIC'),
(48, 'department', 'Okamura'),
(49, 'department', 'Transport and Warehouse'),
(50, 'department', 'Refurbishing'),
(51, 'department', 'Field Service'),
(52, 'department', 'Credit and Collection'),
(53, 'location', 'HO Show Room'),
(54, 'location', 'HO 2nd Flr'),
(55, 'location', 'HO 3rd Flr'),
(56, 'location', 'HO 4th Flr'),
(57, 'location', 'HO 5th Flr'),
(58, 'location', 'Pet Plans'),
(59, 'location', 'Sucat Okamura 3rd Fl'),
(63, 'location', 'Sucat Warehouse'),
(64, 'department', 'HR'),
(65, 'department', 'Customer Service');

-- --------------------------------------------------------

--
-- Table structure for table `employee_data`
--

CREATE TABLE `employee_data` (
  `id` int(200) NOT NULL,
  `employee_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_data`
--

INSERT INTO `employee_data` (`id`, `employee_number`, `email`, `last_name`, `first_name`, `department`, `branch`, `location`, `designation`) VALUES
(1, '011990723', 'johndexter.pore@ubix.com.ph', 'Pore', 'John Dexter', 'MIS', 'Head Office', 'HO 2nd Flr', 'Programmer'),
(6, '011995024', 'junedale.gayeta@ubix.com.ph', 'Gayeta', 'Junedale', 'MIS', 'Head Office', 'HO 2nd Flr', 'IT Support'),
(7, '011997224', 'kurtnicole.torres@ubix.com.ph', 'Torres', 'Kurt Nicole', 'Riso Sales', 'Head Office', 'HO 4th Flr', 'Customer Service Officer'),
(8, '011912717', 'jr.bubon@ubix.com.ph', 'Bubon', 'Jhay-R', 'Marketing', 'Head Office', 'HO Show Room', 'Graphic Artist'),
(9, '011992924', 'edrecgene.rapsing@ubix.com.ph', 'Rapsing', 'Edrec Gene', 'Marketing', 'Head Office', 'HO Show Room', 'Graphic Artist'),
(10, '011839111', 'carla.azura@ubix.com.ph', 'Azura', 'Carla', 'HR', 'Head Office', 'HO Show Room', 'Info Desk'),
(11, '011995124', 'ubix.marketing@gmail.com', 'Sinad', 'Mariella', 'Marketing', 'Head Office', 'HO Show Room', 'Marketing Assistant'),
(12, '011997024', 'genfrix.genido@ubix.com.ph', 'Genido', 'Genfrix Lorenz', 'Okamura', 'Pet Plans', 'Pet Plans', 'Customer Service Officer'),
(13, '011996624', 'erick.lopez@ubix.com.ph', 'Lopez', 'Carl Erick', 'Okamura', 'Pet Plans', 'Pet Plans', 'Customer Service Officer'),
(14, '011995324', 'allison.livara@ubix.com.ph', 'Livara', 'Allison', 'OP Sales', 'Head Office', 'HO 4th Flr', 'Account Executive'),
(15, '011991423', 'sophialei.ramos@ubix.com.ph', 'Ramos', 'Sophia Lei', 'Customer Service', 'Head Office', 'HO 4th Flr', 'Customer Service Officer'),
(16, '013045323', 'danielle.alejandro@ubix.com.ph', 'Alejandro', 'Danielle', 'General Management', 'Head Office', 'HO 3rd Flr', 'Management Trainee'),
(17, '011994724', 'genevieve.durango@ubix.com.ph', 'Durango', 'Genevieve', 'Treasury', 'Head Office', 'HO 5th Flr', 'Treasury Assistant'),
(18, '011988223', 'reymund.rodelas@ubix.com.ph', 'Rodelas', 'Reymund', 'Customer Service', 'Head Office', 'HO 4th Flr', 'Customer Service Officer'),
(19, '011991623', 'jadelorenz.cruz@ubix.com.ph', 'Cruz', 'Jade Lorenz', 'Customer Service', 'Head Office', 'HO 4th Flr', 'Customer Service Officer'),
(20, '011992023', 'hannahpatricia.resuello@ubix.com.ph', 'Resuello', 'Hannah Patricia', 'Customer Service', 'Head Office', 'HO 4th Flr', 'Customer Service Officer'),
(21, '011988923', 'maryjoy.valencia@ubix.com.ph', 'Valencia', 'Mary Joy', 'Customer Service', 'Head Office', 'HO 4th Flr', 'Customer Service Officer'),
(22, '013040523', 'maryann.ventura@ubix.com.ph', 'Ventura', 'Mary Ann', 'HR', 'Head Office', 'HO 2nd Flr', 'Recruitment Manager'),
(23, '011972622', 'sheryl.delima@ubix.com.ph', 'Durante', 'Sheryl', 'Accounting', 'Head Office', 'HO 5th Flr', 'Accounting Assistant'),
(24, '011993724', 'camille.payawal@ubix.com.ph', 'Payawal', 'Camille', 'Treasury', 'Head Office', 'HO 5th Flr', 'Treasury Assistant'),
(25, '011995224', 'paolamae.amar@ubix.com.ph', 'Amar', 'Paola Mae', 'Treasury', 'Head Office', 'HO 5th Flr', 'Treasury Assistant'),
(26, '011964621', 'heaven.cruz@ubix.com.ph', 'Cruz', 'Heaven', 'Treasury', 'Head Office', 'HO 5th Flr', 'Treasury Specialist'),
(27, '011984723', 'reimieraven.perez@ubix.com.ph', 'Perez', 'Reimie Raven', 'Treasury', 'Head Office', 'HO 5th Flr', 'Treasury Assistant'),
(28, '011993224', 'zylenejanela.arcenal@ubix.com.ph', 'Arcenal', 'Zylene Janela', 'OP Sales', 'Head Office', 'HO 4th Flr', 'Customer Service Officer'),
(29, '011951420', 'csd.admin@ubix.com.ph', 'Corcuera', 'Charlotte', 'Sales Admin', 'Head Office', 'HO 4th Flr', 'Sr. Admin Assistant'),
(30, '011945619', 'reynaldo.franciso@ubix.com.ph', 'Fransisco', 'Reynaldo', 'OP Sales', 'Head Office', 'HO 4th Flr', 'Business Solutions Officer'),
(31, '011974522', 'jutham.igana@ubix.com.ph', 'Igana', 'Jutham', 'MIS', 'Sucat', 'Sucat Warehouse', 'IT Support'),
(32, '013044323', 'mondito.panelo@ubix.com.ph', 'Panelo', 'Mondito', 'Transport and Warehouse', 'Sucat', 'Sucat Warehouse', 'Manager'),
(33, '013039422', 'jewel.adduru@ubix.com.ph', 'Adduru', 'Jewel', 'HR', 'Head Office', 'HO 2nd Flr', 'HR Assistant'),
(34, '011997124', 'mj.tejana@ubix.com.ph', 'Tejana', 'MJ Edmon', 'Accounting', 'Head Office', 'HO 5th Flr', 'Accounting Assistant'),
(35, '013042923', 'erikajane.macapagal@ubix.com.ph', 'Macapagal', 'Erika Jane', 'General Management', 'Head Office', 'HO 3rd Flr', 'Management Trainee'),
(36, '013043125', 'princessashley.luche@ubix.com.ph', 'Luche', 'Princess Ashley', 'General Management', 'Head Office', 'HO 3rd Flr', 'Management Trainee'),
(37, '013044223', 'excelmarie.villanueva@ubix.com.ph', 'Villanueva', 'Excel Marie', 'General Management', 'Head Office', 'HO 3rd Flr', 'Management Trainee'),
(38, '011977122', 'agatona.arellano@ubix.com.ph', 'Arellano', 'Agatona', 'Material Management', 'Sucat', 'Sucat Okamura 3rd Fl', 'Analyst'),
(39, '203044624', 'maryann.franco@duckdonutsph.com', 'Franco', 'Mary Ann', 'General Management', 'Head Office', 'HO 5th Flr', 'Operations Manager'),
(40, '013045523', 'patricia.pascor@ubix.com.ph', 'Pascor', 'Patricia France', 'General Management', 'Head Office', 'HO 3rd Flr', 'Management Trainee'),
(41, '013045423', 'micaela.delvalle@ubix.com.ph', 'Del Valle', 'Micaela Faye', 'General Management', 'Head Office', 'HO 5th Flr', 'Management Trainee'),
(42, '011915917', 'jerico.duguran@ubix.com.ph', 'Duguran', 'Jerico', 'OP Sales', 'Head Office', 'HO 4th Flr', 'Customer Service Officer');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(200) NOT NULL,
  `asset_number` varchar(200) NOT NULL,
  `asset_name` varchar(200) NOT NULL,
  `asset_type` varchar(200) NOT NULL,
  `asset_category` varchar(200) NOT NULL,
  `asset_serial_number` varchar(200) NOT NULL,
  `asset_sticker_number` varchar(200) NOT NULL,
  `asset_status` varchar(200) NOT NULL,
  `asset_condition` varchar(200) NOT NULL,
  `asset_description` varchar(200) NOT NULL,
  `asset_acquired_date` date NOT NULL,
  `asset_brand_model` varchar(200) NOT NULL,
  `asset_processor` varchar(200) NOT NULL,
  `asset_storage` varchar(200) NOT NULL,
  `asset_ram` varchar(200) NOT NULL,
  `asset_operating_system` varchar(200) NOT NULL,
  `asset_branch` varchar(200) NOT NULL,
  `date_time_encoded` datetime NOT NULL DEFAULT current_timestamp(),
  `asset_location` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `asset_number`, `asset_name`, `asset_type`, `asset_category`, `asset_serial_number`, `asset_sticker_number`, `asset_status`, `asset_condition`, `asset_description`, `asset_acquired_date`, `asset_brand_model`, `asset_processor`, `asset_storage`, `asset_ram`, `asset_operating_system`, `asset_branch`, `date_time_encoded`, `asset_location`) VALUES
(10, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'MMV0CSP001402007884HA1', '02503', 'Available', 'Brand New', ' ', '2024-04-12', 'ACER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-12 10:34:22', 'HO 2nd Flr'),
(11, '', 'AVR', 'Office Equipment', 'Accessories', 'EP2023051208218', '02501', 'Deployed', 'Brand New', ' ', '2024-04-12', 'ECO POWER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-12 10:38:11', 'HO 4th Flr'),
(12, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '02502', 'Deployed', 'Brand New', ' ', '2024-04-12', 'OVATION', 'I5-10400', '500GB', '8GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-12 10:42:18', 'HO 4th Flr'),
(13, '', 'AVR', 'Office Equipment', 'Accessories', 'N/A', '14862', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-12', 'SUNSTAR', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-12 13:07:24', 'HO Show Room'),
(14, '', 'LAPTOP', 'Office Equipment', 'Unit', 'WB13385581', '14666', 'Deployed', 'Working-poor Condition', ' ', '2024-04-12', 'LENOVO', 'I3-40100U', '500GB', '4GB', 'WINDOWS 10 PRO', 'Head Office', '2024-04-12 13:17:42', 'HO Show Room'),
(15, '', 'LAPTOP', 'Office Equipment', 'Unit', 'MP1Q7E1L', '02315', 'Deployed', 'Working-Good Condition', ' ', '2024-04-12', 'LENOVO', 'I5-1035G1', '500GB', '8GB', 'WINDOWS 10 PRO', 'Head Office', '2024-04-12 13:26:31', 'HO 2nd Flr'),
(16, '', 'AVR', 'Office Equipment', 'Accessories', 'N/A', '14314', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-12', 'SECURE', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-12 13:37:09', 'HO Show Room'),
(17, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '02504', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-12', 'GENERIC', 'I7-2600', '500GB', '8GB', 'WINDOWS 10 PRO', 'Head Office', '2024-04-12 13:38:52', 'HO Show Room'),
(18, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '02508', 'Deployed', 'Working-Good Condition', ' ', '2024-04-12', 'GENERIC', 'R5-5600', '500GB + 1TB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-12 13:58:14', 'HO Show Room'),
(19, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'UBP03N7T', '02505', 'Deployed', 'Working-Good Condition', ' ', '2024-04-12', 'LENOVO', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-12 13:59:15', 'HO Show Room'),
(20, '', 'AVR', 'Office Equipment', 'Accessories', 'EP2023051208124', '02905', 'Deployed', 'Brand New', ' ', '2024-04-15', 'ECO POWER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 08:27:09', 'Pet Plans'),
(21, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '02903', 'Deployed', 'Brand New', ' ', '2024-04-15', 'OVATION', 'I5-10400', '500GB', '8GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-15 08:28:21', 'Pet Plans'),
(22, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'MMV0CSP001343006C04HA1', '02907', 'Deployed', 'Brand New', ' ', '2024-04-15', 'ACER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 08:29:37', 'Pet Plans'),
(23, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'MMLY0SS0038310A9E08507', '14649', 'Deployed', 'Brand New', ' ', '2024-04-15', 'ACER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 08:47:47', 'Pet Plans'),
(24, '', 'AVR', 'Office Equipment', 'Accessories', 'EP2023051208132', '02906', 'Deployed', 'Brand New', ' ', '2024-04-15', 'ECO POWER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 08:48:48', 'Pet Plans'),
(25, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '02904', 'Deployed', 'Brand New', ' ', '2024-04-15', 'OVATION', 'I5-10400', '500GB', '8GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-15 08:50:25', 'Pet Plans'),
(26, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'MMV0CSP001343006BD4HA1', '02314', 'Deployed', 'Brand New', ' ', '2024-04-15', 'ACER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 09:35:41', 'HO 4th Flr'),
(27, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '02311', 'Deployed', 'Brand New', ' ', '2024-04-15', 'OVATION', 'I5-10400', '500GB', '8GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-15 09:36:30', 'HO 4th Flr'),
(28, '', 'AVR', 'Office Equipment', 'Accessories', 'EP2023051208133', '02308', 'Deployed', 'Brand New', ' ', '2024-04-15', 'ECO POWER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 09:38:22', 'HO 4th Flr'),
(29, '', 'UPS', 'Office Equipment', 'Accessories', '9B1934A15938', '14733', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-15', 'APC', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 09:39:31', 'HO 4th Flr'),
(30, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF4PZM49', '02901', 'Deployed', 'Working-Good Condition', ' ', '2024-04-15', 'LENOVO', 'I5-12450H', '500GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-15 10:21:00', 'HO 3rd Flr'),
(31, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'V88GH9NZ2187920', '14646', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-15', 'SAMSUNG', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 10:50:27', 'HO Show Room'),
(33, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '13041', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-15', 'GENERIC', 'I7-2600K', '1 TB', '8GB', 'WINDOWS 10 PRO', 'Head Office', '2024-04-15 15:03:55', 'HO Show Room'),
(34, '', 'AVR', 'Office Equipment', 'Accessories', 'N/A', '14180', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-15', 'GENERIC', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 15:05:26', 'HO Show Room'),
(35, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF9XB7528107', '14099', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-15', 'LENOVO', 'I5-8250U', '256GB', '8GB', 'WINDOWS 11 HOME', 'Head Office', '2024-04-15 17:31:21', 'HO 4th Flr'),
(36, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF4PLOK02', '14986', 'Deployed', 'Working-Good Condition', ' ', '2024-04-15', 'LENOVO', 'I5-12450H', '500GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-15 17:35:02', 'HO 4th Flr'),
(37, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'MMLY0SS0038160371B8507', '14440', 'Deployed', 'Working-Good Condition', ' ', '2024-04-15', 'ACER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-15 17:36:13', 'HO 4th Flr'),
(38, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF0Z5SEQ', '14668', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-15', 'LENOVO', 'I3-6006U', '500GB', '8GB', 'WINDOWS 11 HOME', 'Head Office', '2024-04-15 17:38:15', 'HO 4th Flr'),
(39, 'N/A', 'MONITOR', 'Office Equipment', 'Unit', 'GCRF21A002950', '2120', 'Deployed', 'Working-Good Condition', 'AOC MONITOR ', '2024-04-16', 'AOC', 'N/A', 'N/A', 'N/A', 'N/A', 'Sucat', '2024-04-16 12:06:54', 'Sucat Warehouse'),
(40, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF4PW93X', '2156', 'Deployed', 'Brand New', 'LENOVO LAPTOP', '2024-01-10', 'LENOVO', 'I5 12TH GEN', '500 GB SSD', '8gb', 'WIN 11 HOME', 'Sucat', '2024-04-16 12:12:50', 'Sucat Warehouse'),
(41, 'N/A', 'Mouse', 'Office Equipment', 'Peripherals', 'N/A', 'N/A', 'Deployed', 'Brand New', 'A4-tech Mouse', '2024-01-10', 'A4-tech', 'N/A', 'N/A', 'N/A', 'N/A', 'Sucat', '2024-04-16 12:29:56', 'Sucat Warehouse'),
(42, '', 'AVR', 'Office Equipment', 'Accessories', 'N/A', '14300', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-16', 'GENERIC', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-16 13:08:38', 'HO 2nd Flr'),
(43, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '14297', 'Deployed', 'Working-poor Condition', ' ', '2024-04-16', 'GENERIC', 'I3-4130', '500GB', '4GB', 'WINDOWS 7', 'Head Office', '2024-04-16 13:17:03', 'HO 2nd Flr'),
(44, '', 'MONITOR', 'Office Equipment', 'Accessories', 'MY17HMFS902648R', '14296', 'Deployed', 'Working-poor Condition', ' ', '2024-04-16', 'SAMSUNG', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-16 13:19:01', 'HO 2nd Flr'),
(45, '', 'LAPTOP', 'Office Equipment', 'Unit', 'N/A', '14247', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-16', 'LENOVO', 'I3-6006U', '256GB', '6GB', 'WINDOWS 10 HOME', 'Head Office', '2024-04-16 14:05:12', 'HO 5th Flr'),
(46, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'MMLY0SS0038380A7788507', '14893', 'Available', 'Working-Good Condition', ' ', '2024-04-16', 'ACER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-16 14:47:05', 'HO 2nd Flr'),
(47, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF4PTJ37', '14985', 'Available', 'Working-Good Condition', ' ', '2024-04-16', 'LENOVO', 'I5-12450H', '500GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-16 15:20:46', 'HO 2nd Flr'),
(48, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF1KL9B1', '14722', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-16', 'LENOVO', 'I5-8250U', '256GB', '8GB', 'WINDOWS 11 HOME', 'Head Office', '2024-04-16 15:25:35', 'HO 4th Flr'),
(49, '', 'LAPTOP', 'Office Equipment', 'Unit', 'N/A', '14782', 'Deployed', 'Working-Fair Condition', ' ', '2024-04-16', 'LENOVO', 'I5-3320M', '256GB', '8GB', 'WINDOWS 10 HOME', 'Head Office', '2024-04-16 16:08:51', 'HO 4th Flr'),
(50, '', 'PCU/CPU', 'Office Equipment', 'Unit', 'N/A', '2123', 'Deployed', 'Working-Fair Condition', 'Desktop PC ', '2024-04-16', 'Generic', 'Intel core i3', '1TB', '12GB', 'Windows 10 Pro', 'Sucat', '2024-04-16 16:42:51', 'Sucat Warehouse'),
(51, '', 'MONITOR', 'Office Equipment', 'Unit', 'DRXC7IA001910', '2121', 'Deployed', 'Working-Fair Condition', 'AOC MONITOR', '2024-04-16', 'AOC', 'N/A', 'N/A', 'N/A', 'N/A', 'Sucat', '2024-04-16 16:44:33', 'Sucat Warehouse'),
(52, 'N/A', 'MONITOR', 'Office Equipment', 'Unit', 'MY17HMDS900876B', '2122', 'Deployed', 'Working-poor Condition', 'SAMSUNG MONITOR', '2024-04-16', 'SAMSUNG', 'N/A', 'N/A', 'N/A', 'N/A', 'Sucat', '2024-04-16 16:46:26', 'Sucat Warehouse'),
(53, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF3SY50G', '14976', 'Deployed', 'Working-Good Condition', 'LENOVO IDEAPAD SLIM 3 15IAH8', '2024-04-17', 'LENOVO', 'I5-12450H', '512GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-17 09:08:16', 'HO 3rd Flr'),
(54, '', 'LENOVO', 'Office Equipment', 'Unit', 'PF35V941', '14978', 'Deployed', 'Working-Good Condition', 'LENOVO IDEAPAD SLIM 3 I5IAH8', '2024-04-17', 'LENOVO', 'I5-12450H', '512GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-17 09:13:12', 'HO 3rd Flr'),
(55, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF3SN3JT', '02316', 'Deployed', 'Working-Good Condition', 'LENOVO IDEAPAD SLIM 3 I5IAH8', '2024-04-17', 'LENOVO', 'I5-12450H', '512GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-17 09:34:12', 'HO 3rd Flr'),
(56, 'N/A', 'PCU/CPU', 'Office Equipment', 'Unit', 'N/A', 'N/A', 'Available', 'Working-Fair Condition', 'Intel core i3 4GB ram 500 GB internal', '2024-04-14', 'Generic', 'Intel core i3', '500GB HDD', '4gb', 'Windows 10 Pro', 'Sucat', '2024-04-17 10:24:44', 'Sucat Warehouse'),
(57, 'N/A', 'PCU/CPU', 'Office Equipment', 'Unit', 'N/A', 'N/A', 'Available', 'Working-Fair Condition', 'Intel core i3 4gb RAM 500Gb internal storage', '2024-04-17', 'Generic', 'Intel core i3', '500GB HDD', '4gb', 'Windows 10 Pro', 'Sucat', '2024-04-17 10:26:10', 'Sucat Warehouse'),
(58, '', 'LAPTOP', 'Office Equipment', 'Unit', 'MP1Q7DRP', '14949', 'Deployed', 'Working-Good Condition', 'LENOVO IDEAPAD S340', '2024-04-18', 'LENOVO', 'I5-1035G1', '512GB', '8GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-18 08:26:06', 'HO 2nd Flr'),
(59, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'MMLY0S5038160371B8507', '14824', 'Deployed', 'Working-Good Condition', ' ', '2024-04-18', 'ACER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-18 08:28:37', 'HO 2nd Flr'),
(60, 'N/A', 'PCU/CPU', 'Office Equipment', 'Unit', 'N/A', '6643', 'Deployed', 'Working-Fair Condition', 'Computer CPU', '2024-04-18', 'Generic', 'Intel core i3', '500 GB HDD', '4gb', 'Windows 10 Pro', '', '2024-04-18 10:56:35', 'Sucat Okamura 3rd Fl'),
(61, 'N/A', 'MONITOR', 'Office Equipment', 'Peripherals', '102UXQA17924', '7567', 'Deployed', 'Working-Fair Condition', 'LG monitor', '2024-04-18', 'LG', 'N/A', 'N/A', 'N/A', 'N/A', 'Sucat', '2024-04-18 10:58:35', 'Sucat Okamura 3rd Fl'),
(62, 'N/A', 'AVR', 'Office Equipment', 'Peripherals', 'N/A', '7498', 'Deployed', 'Working-Fair Condition', 'AVR ', '2024-04-18', 'Generic', 'N/A', 'N/A', 'N/A', 'N/A', 'Sucat', '2024-04-18 10:59:28', 'Sucat Okamura 3rd Fl'),
(63, 'N/A', 'MOuse', 'Office Equipment', 'Accessories', 'N/A', 'N/A', 'Deployed', 'Working-Good Condition', 'MMD Mouse', '2024-04-18', 'A4-tech', 'N/A', 'N/A', 'N/A', 'N/A', 'Sucat', '2024-04-18 11:00:16', 'Sucat Warehouse'),
(64, 'N/A', 'MOuse', 'Office Equipment', 'Accessories', 'N/A', 'N/A', 'Available', 'Working-Good Condition', 'MMD Mouse', '2024-04-18', 'A4-tech', 'N/A', 'N/A', 'N/A', 'N/A', 'Sucat', '2024-04-18 11:00:29', 'Sucat Warehouse'),
(65, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF3SV3NZ', '14975', 'Deployed', 'Working-Good Condition', 'LENOVO IDEAPAD SLIM 3 15IAH8', '2024-04-18', 'LENOVO', 'I5-12450H', '512GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-18 11:01:11', 'HO 3rd Flr'),
(66, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF3S2H8', '14980', 'Deployed', 'Brand New', 'LENOVO IDEAPAD SLIM 3 15IAH8', '2024-04-18', 'LENOVO', 'I5-12450H', '512GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-18 15:01:54', 'HO 5th Flr'),
(67, '', 'LAPTOP', 'Office Equipment', 'Unit', 'N/A', '02318', 'Deployed', 'Working-poor Condition', ' ', '2024-04-18', 'LENOVO', 'I5-8250U', '256GB', '8GB', 'WINDOWS 11 HOME', 'Head Office', '2024-04-18 15:53:42', 'HO 4th Flr'),
(68, '', 'LAPTOP', 'Office Equipment', 'Unit', 'PF4Q0YAW', '02319', 'Available', 'Brand New', 'LENOVO IDEAPAD SLIM 3 15IAH8', '2024-04-19', 'LENOVO', 'I5-12450H', '512GB', '16GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-19 11:02:44', 'HO 2nd Flr'),
(69, '', 'MONITOR', 'Office Equipment', 'Peripherals', 'V88GH9N7220042D', '14553', 'Available', 'Working-Fair Condition', ' ', '2024-04-22', 'SAMSUNG', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-22 14:36:00', 'HO 2nd Flr'),
(70, '', 'PC', 'Office Equipment', 'Unit', 'N/A', '02310', 'Available', 'Brand New', ' ', '2024-04-22', 'OVATION', 'I5-10400', '512GB', '8GB', 'WINDOWS 11 PRO', 'Head Office', '2024-04-22 14:37:41', 'HO 2nd Flr'),
(71, '', 'AVR', 'Office Equipment', 'Accessories', 'EP2023051208114', '02309', 'Available', 'Brand New', 'ECO POWER AVR', '2024-04-22', 'ECO POWER', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-22 14:38:57', 'HO 2nd Flr'),
(72, '', 'MOUSE', 'Office Equipment', 'Peripherals', 'N/A', 'N/A', 'Available', 'Brand New', ' ', '2024-04-22', 'A4TECH', 'N/A', 'N/A', 'N/A', 'N/A', 'Head Office', '2024-04-22 14:40:54', 'HO 2nd Flr');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(200) NOT NULL,
  `transaction` varchar(200) NOT NULL,
  `person_incharge` varchar(200) NOT NULL,
  `date_time_transaction` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `transaction`, `person_incharge`, `date_time_transaction`) VALUES
(23, 'Added Employee: Junedale Gayeta', 'John Dexter Pore', '2024-04-12 08:09:30'),
(24, 'Activated Account: Junedale Gayeta', 'John Dexter Pore', '2024-04-12 08:09:39'),
(25, 'Added Employee: Kurt Nicole Torres', 'Junedale Gayeta', '2024-04-12 10:30:29'),
(26, 'Added Asset: 02503', 'Junedale Gayeta', '2024-04-12 10:34:22'),
(27, 'Edited Asset: 02503', 'Junedale Gayeta', '2024-04-12 10:35:57'),
(28, 'Edited Asset: 02503', 'Junedale Gayeta', '2024-04-12 10:36:07'),
(29, 'Edited Asset: 02503', 'Junedale Gayeta', '2024-04-12 10:37:11'),
(30, 'Added Asset: 02501', 'Junedale Gayeta', '2024-04-12 10:38:12'),
(31, 'Added Asset: 02502', 'Junedale Gayeta', '2024-04-12 10:42:18'),
(32, 'Added Employee: Jhay-R Bubon', 'Junedale Gayeta', '2024-04-12 13:03:48'),
(33, 'Added Asset: 14862', 'Junedale Gayeta', '2024-04-12 13:07:24'),
(34, 'Added Employee: Edrec Gene Rapsing', 'Junedale Gayeta', '2024-04-12 13:09:09'),
(35, 'Created a category: HR', 'Junedale Gayeta', '2024-04-12 13:14:26'),
(36, 'Added Employee: Carla Azura', 'Junedale Gayeta', '2024-04-12 13:15:24'),
(37, 'Added Asset: 14666', 'Junedale Gayeta', '2024-04-12 13:17:42'),
(38, 'Added Asset: 02315', 'Junedale Gayeta', '2024-04-12 13:26:31'),
(39, 'Added Employee: Mariella Sinad', 'Junedale Gayeta', '2024-04-12 13:34:33'),
(40, 'Added Asset: 14314', 'Junedale Gayeta', '2024-04-12 13:37:09'),
(41, 'Added Asset: 02504', 'Junedale Gayeta', '2024-04-12 13:38:52'),
(42, 'Edited Asset: 02504', 'Junedale Gayeta', '2024-04-12 13:40:01'),
(43, 'Added Asset: 02508', 'Junedale Gayeta', '2024-04-12 13:58:14'),
(44, 'Added Asset: 02505', 'Junedale Gayeta', '2024-04-12 13:59:15'),
(45, 'Added Employee: Genfrix Lorenz Genido', 'Junedale Gayeta', '2024-04-15 08:25:29'),
(46, 'Added Asset: 02905', 'Junedale Gayeta', '2024-04-15 08:27:09'),
(47, 'Added Asset: 02903', 'Junedale Gayeta', '2024-04-15 08:28:21'),
(48, 'Added Asset: 02907', 'Junedale Gayeta', '2024-04-15 08:29:37'),
(49, 'Edited Employee: 011997024', 'Junedale Gayeta', '2024-04-15 08:31:23'),
(50, 'Added Employee: Carl Erick Lopez', 'Junedale Gayeta', '2024-04-15 08:40:49'),
(51, 'Added Asset: 14649', 'Junedale Gayeta', '2024-04-15 08:47:47'),
(52, 'Added Asset: 02906', 'Junedale Gayeta', '2024-04-15 08:48:48'),
(53, 'Added Asset: 02904', 'Junedale Gayeta', '2024-04-15 08:50:25'),
(54, 'Added Employee: Allison Livara', 'Junedale Gayeta', '2024-04-15 09:33:28'),
(55, 'Added Asset: 02314', 'Junedale Gayeta', '2024-04-15 09:35:41'),
(56, 'Added Asset: 02311', 'Junedale Gayeta', '2024-04-15 09:36:30'),
(57, 'Added Asset: 02308', 'Junedale Gayeta', '2024-04-15 09:38:22'),
(58, 'Added Asset: 14733', 'Junedale Gayeta', '2024-04-15 09:39:31'),
(59, 'Created a category: Customer Service', 'Junedale Gayeta', '2024-04-15 10:07:55'),
(60, 'Added Employee: Sophia Lei Ramos', 'Junedale Gayeta', '2024-04-15 10:08:48'),
(61, 'Added Employee: Danielle Alejandro', 'Junedale Gayeta', '2024-04-15 10:18:49'),
(62, 'Added Asset: 02901', 'Junedale Gayeta', '2024-04-15 10:21:00'),
(63, 'Added Employee: Genevieve Durango', 'Junedale Gayeta', '2024-04-15 10:46:16'),
(64, 'Added Asset: 1464-', 'Junedale Gayeta', '2024-04-15 10:50:27'),
(65, 'Added Employee: Reymund Rodelas', 'Junedale Gayeta', '2024-04-15 11:05:09'),
(66, 'Added Employee: Jade Lorenz Cruz', 'Junedale Gayeta', '2024-04-15 11:06:03'),
(67, 'Added Employee: Hannah Patricia Resuello', 'Junedale Gayeta', '2024-04-15 11:25:51'),
(68, 'Added Employee: Mary Joy Valencia', 'Junedale Gayeta', '2024-04-15 11:46:19'),
(69, 'Added Employee: Mary Ann Ventura', 'Junedale Gayeta', '2024-04-15 11:50:29'),
(70, 'Added Employee: Sheryl Durante', 'Junedale Gayeta', '2024-04-15 11:53:18'),
(71, 'Added Employee: Camille Payawal', 'Junedale Gayeta', '2024-04-15 13:48:26'),
(72, 'Added Employee: Paola Mae Amar', 'Junedale Gayeta', '2024-04-15 13:49:52'),
(73, 'Added Employee: Heaven Cruz', 'Junedale Gayeta', '2024-04-15 13:50:49'),
(74, 'Added Employee: Reimie Raven Perez', 'Junedale Gayeta', '2024-04-15 13:51:52'),
(75, 'Added Asset: 13041', 'Junedale Gayeta', '2024-04-15 14:08:01'),
(76, 'Deleted a Asset: 13041', 'Junedale Gayeta', '2024-04-15 14:09:38'),
(77, 'Edited Asset: 14646', 'Junedale Gayeta', '2024-04-15 14:10:51'),
(78, 'Edited Asset: 14645', 'Junedale Gayeta', '2024-04-15 14:14:13'),
(79, 'Edited Asset: 14645', 'John Dexter Pore', '2024-04-15 14:17:16'),
(80, 'Edited Asset: 14645', 'John Dexter Pore', '2024-04-15 14:22:20'),
(81, 'Edited Asset: 14646', 'John Dexter Pore', '2024-04-15 14:22:29'),
(82, 'Edited Asset: 14645', 'Junedale Gayeta', '2024-04-15 14:22:41'),
(83, 'Edited Asset: 14645', 'Junedale Gayeta', '2024-04-15 14:22:52'),
(84, 'Edited Asset: 14646', 'Junedale Gayeta', '2024-04-15 14:23:04'),
(85, 'Added Asset: 13041', 'Junedale Gayeta', '2024-04-15 15:03:55'),
(86, 'Added Asset: 14180', 'Junedale Gayeta', '2024-04-15 15:05:26'),
(87, 'Edited Asset: 13041', 'Junedale Gayeta', '2024-04-15 15:06:47'),
(88, 'Added Employee: Zylene Janela Arcenal', 'Junedale Gayeta', '2024-04-15 15:18:13'),
(89, 'Added Employee: Charlotte Corcuera', 'Junedale Gayeta', '2024-04-15 15:29:46'),
(90, 'Added Asset: 14099', 'Junedale Gayeta', '2024-04-15 17:31:21'),
(91, 'Added Employee: Reynaldo Fransisco', 'Junedale Gayeta', '2024-04-15 17:33:36'),
(92, 'Added Asset: 14986', 'Junedale Gayeta', '2024-04-15 17:35:02'),
(93, 'Added Asset: 14440', 'Junedale Gayeta', '2024-04-15 17:36:13'),
(94, 'Added Asset: 14668', 'Junedale Gayeta', '2024-04-15 17:38:15'),
(95, 'Added Employee: Jutham Igana', 'John Dexter Pore', '2024-04-16 11:45:02'),
(96, 'Activated Account: Jutham Igana', 'John Dexter Pore', '2024-04-16 11:45:19'),
(97, 'Added Asset: 2120', 'Jutham Igana', '2024-04-16 12:06:54'),
(98, 'Added Asset: 2156', 'Jutham Igana', '2024-04-16 12:12:50'),
(99, 'Added Employee: Mondito Panelo', 'Jutham Igana', '2024-04-16 12:26:40'),
(100, 'Added Asset: N/A', 'Jutham Igana', '2024-04-16 12:29:56'),
(101, 'Added Employee: Jewel Adduru', 'Junedale Gayeta', '2024-04-16 13:06:06'),
(102, 'Added Asset: 14300', 'Junedale Gayeta', '2024-04-16 13:08:38'),
(103, 'Added Asset: 14297', 'Junedale Gayeta', '2024-04-16 13:17:03'),
(104, 'Added Asset: 14296', 'Junedale Gayeta', '2024-04-16 13:19:01'),
(105, 'Added Asset: 14247', 'Junedale Gayeta', '2024-04-16 14:05:12'),
(106, 'Added Employee: MJ Edmon Tejana', 'Junedale Gayeta', '2024-04-16 14:08:03'),
(107, 'Added Asset: 14893', 'Junedale Gayeta', '2024-04-16 14:47:05'),
(108, 'Added Asset: 14985', 'Junedale Gayeta', '2024-04-16 15:20:46'),
(109, 'Added Asset: 14722', 'Junedale Gayeta', '2024-04-16 15:25:36'),
(110, 'Added Asset: 14782', 'Junedale Gayeta', '2024-04-16 16:08:52'),
(111, 'Added Asset: 2123', 'Jutham Igana', '2024-04-16 16:42:51'),
(112, 'Added Asset: 2121', 'Jutham Igana', '2024-04-16 16:44:33'),
(113, 'Added Asset: 2122', 'Jutham Igana', '2024-04-16 16:46:26'),
(114, 'Added Asset: 1976', 'Junedale Gayeta', '2024-04-17 09:08:16'),
(115, 'Added Asset: 14978', 'Junedale Gayeta', '2024-04-17 09:13:12'),
(116, 'Added Employee: Erika Jane Macapagal', 'Junedale Gayeta', '2024-04-17 09:14:55'),
(117, 'Added Employee: Princess Ashley Luche', 'Junedale Gayeta', '2024-04-17 09:15:47'),
(118, 'Edited Asset: 14976', 'Junedale Gayeta', '2024-04-17 09:16:58'),
(119, 'Added Employee: Excel Marie Villanueva', 'Junedale Gayeta', '2024-04-17 09:31:50'),
(120, 'Added Asset: 02316', 'Junedale Gayeta', '2024-04-17 09:34:12'),
(121, 'Added Employee: Agatona Arellano', 'Jutham Igana', '2024-04-17 10:22:06'),
(122, 'Added Asset: N/A', 'Jutham Igana', '2024-04-17 10:24:45'),
(123, 'Added Asset: N/A', 'Jutham Igana', '2024-04-17 10:26:10'),
(124, 'Added Employee: Mary Ann Franco', 'Junedale Gayeta', '2024-04-17 13:44:27'),
(125, 'Added Asset: 14949', 'Junedale Gayeta', '2024-04-18 08:26:06'),
(126, 'Added Asset: 14824', 'Junedale Gayeta', '2024-04-18 08:28:37'),
(127, 'Added Employee: Patricia France Pascor', 'Junedale Gayeta', '2024-04-18 10:56:11'),
(128, 'Added Asset: 6643', '', '2024-04-18 10:56:35'),
(129, 'Added Asset: 7567', 'Jutham Igana', '2024-04-18 10:58:35'),
(130, 'Added Asset: 7498', 'Jutham Igana', '2024-04-18 10:59:28'),
(131, 'Added Asset: N/A', 'Jutham Igana', '2024-04-18 11:00:16'),
(132, 'Added Asset: N/A', 'Jutham Igana', '2024-04-18 11:00:29'),
(133, 'Added Asset: 14975', 'Junedale Gayeta', '2024-04-18 11:01:11'),
(134, 'Added Asset: 14980', 'Junedale Gayeta', '2024-04-18 15:01:54'),
(135, 'Added Asset: 02318', 'Junedale Gayeta', '2024-04-18 15:53:42'),
(136, 'Added Employee: Micaela Faye Del Valle', 'Junedale Gayeta', '2024-04-19 11:00:03'),
(137, 'Added Asset: 02319', 'Junedale Gayeta', '2024-04-19 11:02:44'),
(138, 'Added Employee: Jerico Duguran', 'Junedale Gayeta', '2024-04-22 14:27:53'),
(139, 'Added Asset: 14553', 'Junedale Gayeta', '2024-04-22 14:36:00'),
(140, 'Added Asset: 02310', 'Junedale Gayeta', '2024-04-22 14:37:41'),
(141, 'Added Asset: 02309', 'Junedale Gayeta', '2024-04-22 14:38:57'),
(142, 'Added Asset: N/A', 'Junedale Gayeta', '2024-04-22 14:40:54'),
(143, 'Added Asset: N/A', 'Junedale Gayeta', '2024-04-22 14:42:21'),
(144, 'Added Asset: N/A', 'Junedale Gayeta', '2024-04-22 14:42:59'),
(145, 'Added Asset: N/A', 'John Dexter Pore', '2024-04-22 15:31:28'),
(146, 'Deleted a Asset: 75', 'John Dexter Pore', '2024-04-22 15:51:07'),
(147, 'Deleted a Asset: 74', 'John Dexter Pore', '2024-04-22 15:51:16'),
(148, 'Deleted a Asset: 73', 'John Dexter Pore', '2024-04-22 15:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `pull_out_data`
--

CREATE TABLE `pull_out_data` (
  `id` int(200) NOT NULL,
  `employee_number` varchar(200) NOT NULL,
  `asset_id` varchar(200) NOT NULL,
  `date_allocation` date NOT NULL,
  `date_pull_out` date NOT NULL DEFAULT current_timestamp(),
  `control_number` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `branch_encoded` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(200) NOT NULL,
  `employee_number` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role` int(200) NOT NULL,
  `branch` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `employee_number`, `email`, `password`, `user_role`, `branch`) VALUES
(1, '011990723', 'johndexter.pore@ubix.com.ph', '031801', 0, 'Head Office'),
(6, '011995024', 'junedale.gayeta@ubix.com.ph', 'Ubix@1234', 1, 'Head Office'),
(7, '011974522', 'jutham.igana@ubix.com.ph', 'Ubix@1234', 1, 'Sucat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountability_details`
--
ALTER TABLE `accountability_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accountability_history`
--
ALTER TABLE `accountability_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_data`
--
ALTER TABLE `employee_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pull_out_data`
--
ALTER TABLE `pull_out_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountability_details`
--
ALTER TABLE `accountability_details`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `accountability_history`
--
ALTER TABLE `accountability_history`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `employee_data`
--
ALTER TABLE `employee_data`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `pull_out_data`
--
ALTER TABLE `pull_out_data`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
