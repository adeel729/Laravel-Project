-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 12:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hashir_enterprises`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `userid` bigint(20) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userid`, `username`, `email`, `password`) VALUES
(1, 'Dilawar', 'na@gmail.com', '123456'),
(2, 'Fawad', 'fawad@gmail.com', '$2y$10$thL7KVXxmmPZNZVwwgWCMOf4XoXZeEJw7YXALZsX0gae6ANR7kPLC'),
(3, 'Faheeem', 'faheem@gmail.com', '$2y$10$wQ2E3ydFa7hR/JC/q.P/dee5AmOhun263/8Dm2I3A4l4/byLgXefu');

-- --------------------------------------------------------

--
-- Table structure for table `account_group`
--

CREATE TABLE `account_group` (
  `account_group_id` bigint(20) UNSIGNED NOT NULL,
  `account_group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_group_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_group`
--

INSERT INTO `account_group` (`account_group_id`, `account_group_name`, `account_group_type`, `created_at`, `updated_at`) VALUES
(1, 'Assets', 'BS', NULL, NULL),
(2, 'Liability', 'Bs', NULL, NULL),
(3, 'Capital', 'BS', NULL, NULL),
(4, 'Revenue', 'IS', NULL, NULL),
(5, 'Expence', 'IS', NULL, NULL),
(6, 'Cost', 'IS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_sub_group`
--

CREATE TABLE `account_sub_group` (
  `account_sub_group_id` bigint(20) UNSIGNED NOT NULL,
  `account_sub_group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_group_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_sub_group`
--

INSERT INTO `account_sub_group` (`account_sub_group_id`, `account_sub_group_name`, `account_group_id`, `created_at`, `updated_at`) VALUES
(1, 'Cash & Bank Balance', '1', NULL, NULL),
(2, 'Cash & Bank Balance', '1', NULL, NULL),
(3, 'Current Asset', '1', NULL, NULL),
(4, 'Long Term Asset', '1', NULL, NULL),
(5, 'Account Receivable', '1', NULL, NULL),
(6, 'Account Payable', '2', NULL, NULL),
(7, 'Current Liability', '2', NULL, NULL),
(8, 'Long Term Liability', '2', NULL, NULL),
(9, 'Capital', '3', NULL, NULL),
(10, 'Drawing', '3', NULL, NULL),
(11, 'Drawing', '4', NULL, NULL),
(12, 'Administrative expenses', '5', NULL, NULL),
(13, 'Other overhead expenses', '5', NULL, NULL),
(14, 'CGS', '6', NULL, NULL),
(15, 'Material', '6', NULL, NULL),
(16, 'Labour', '6', NULL, NULL),
(17, 'Salaries & Rent', '5', NULL, NULL),
(18, 'Vendors', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cateogaries`
--

CREATE TABLE `cateogaries` (
  `categoryid` bigint(20) UNSIGNED NOT NULL,
  `categoryname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cateogaries`
--

INSERT INTO `cateogaries` (`categoryid`, `categoryname`, `created_at`, `updated_at`) VALUES
(1, 'abc', '2021-10-14 01:27:24', '2021-10-14 01:27:24'),
(2, 'imi', '2021-10-14 01:28:45', '2021-10-14 01:28:45'),
(3, 'def', '2021-10-14 01:31:01', '2021-10-14 01:31:01'),
(4, 'fgh', '2021-10-14 01:32:48', '2021-10-14 01:32:48'),
(5, 'hij', '2021-10-14 01:34:10', '2021-10-14 01:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactperson` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactpersonemail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ntn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creditlimit` double(8,2) DEFAULT NULL,
  `previousbalance` double(30,3) DEFAULT NULL,
  `credittime` int(11) DEFAULT NULL,
  `discountrate` double(8,2) DEFAULT NULL,
  `landlinecustomer` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prevoius_balance` double(30,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `name`, `address`, `province`, `city`, `contactperson`, `email`, `contactpersonemail`, `ntn`, `stn`, `creditlimit`, `previousbalance`, `credittime`, `discountrate`, `landlinecustomer`, `prevoius_balance`, `created_at`, `updated_at`) VALUES
(2, 'CIRIN PHARMACEUTICALS PVT LTD HATTAR', 'NA', 'NA', 'NA', '1245', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(3, 'THE DIABBETES CENTER (TDC)', 'ISLAMABAD', 'Punjab', 'ISLAMABAD', 'NA', NULL, 'na@gmail.com', 'NS', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(4, 'GLOBAL Pharmaceuticals(pvt.) limied', 'NA', 'Na', 'NA', 'NA', NULL, 'na@gmail.com', 'NAq', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(5, 'Shaigan Pharmaceuticals (pvt.)Limited', 'NA', 'NA', 'NA', 'NA', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(6, 'BAHRIA UNIVERSITY ISB', 'ISLAMABAD', 'Punjab', 'ISLAMABAD', '125365', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(7, 'Pak EPA', 'ISLAMABAD', 'Punjab', 'ISLAMABAD', 'NA', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(8, 'NATIONAL INSTITUTE OF HEALTH ISLAMABAD', 'ISLAMABAD', 'Punjab', 'NA', 'Na', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(9, 'DIRECTOR FOOT & MOUTH DISEASE Vaccine Research center', 'Peshawar', 'KPK', 'Peshawar', 'NA', NULL, 'na@gmail.com', 'NA', 'SN', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(10, 'PROTEX PHARMACEUTICAL , ISLAMABAD', 'ISLAMABAD', 'Punjab', 'ISLAMABAD', 'NA', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(11, 'DR TAYYABA, BIO CHEMISTRY PMAS', 'Rawal Pindi', 'Punjab', 'Rawal Pindi', 'NA', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(12, 'WATER TESTING LAB', 'G10/4 ISLAMABAD', 'Punjab', 'ISLAMABAD', 'NA', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 2, 0.00, NULL, NULL, NULL, NULL),
(13, 'COMSATS INSTITUTE OF INGORMATION TECHNOLOGY ISLAMABAD', 'ISLAMABAD', 'Punjab', 'ISLAMABAD`', 'NA', NULL, 'na@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(14, 'ATTA-UR-RAHMAN SCHOOL OF BIOSCIENCES (NUST)', 'Rawal Pindi', 'Punjab', 'Rawal Pindi\\', '123', NULL, 'nave@gmail.com', 'NA', 'NA', 0.00, 0.000, 1, 0.00, NULL, NULL, NULL, NULL),
(16, 'NATIONAL RURAL SUPPORT PROGRAMME (NRSP)', 'ISLAMABAD', 'PUNJAB', 'ISLAMABAD', 'NA', NULL, 'nave@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'University of Arid agriculture rawalpindi', 'Rawalpindi', 'Punjab', 'Rawalpindi', 'NA', NULL, 'nave@gmail.com', 'NA', 'na', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'ARMED FORCED INSTITIUTE OF PATHALOGY AFIP', 'NA', 'PUNJAB', 'Rawalpindi', 'NA', NULL, 'lk@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'PUBLIC HEALTH ENGINEERING DIVISION MUZAFFARABAD', 'MUZAFFARABAD', 'AJK', 'MUZAFFARABAD', 'NA', NULL, 'nave@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'DEPUTY DIRECTOR PRODUCTION', 'Rawalpindi', 'PUNJAB', 'Rawalpindi', 'NA', NULL, 'nave@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'NUST ISLAMABAD USPCAS-E', 'ISLAMABAD', 'PUNJAB', 'ISLAMABAD', 'NA', NULL, 'nave@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'ALZA PHARMACEUTICAL RAWALPINDI', 'Rawalpindi', 'PUNJAB', 'Rawalpindi', 'NA', NULL, 'nave@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'FEROZSON\'S LABORTORY LTD', 'NA', 'NA', 'NA', 'N', NULL, 'nave@gmail.com', '29-17-0657289-8', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'PAK INSTITUTE OF NECULAR SCIENCE & TECHNOLOGY', 'ISLAMABAD', 'PUNJAB', 'ISLAMABAD', 'NA', NULL, 'nave@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'REIANCE PHARMA', 'RAWAR', 'PUNJAB', 'Rawalpindi', 'NA', NULL, 'nave@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'ICI PAKISTAN LTD.', 'Hattar Industrial Estate,', 'Khyber Pakhtunkhwa', 'Haripur,', '0515495860', NULL, 'muhammad.hanif3@ici.com.pk', '0710672-6', '0206280000182', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'INNVOTEK PHARMA', 'Rawalpindi', 'PUNJAB', 'Rawalpindi', '00', NULL, 'nave@gmail.com', '016', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'PROMED SOLUTION', 'Rawalpindi', 'PUNJAB', 'Rawalpindi', '00', NULL, 'nave@gmail.com', '255', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Customer 1', 'scjdsjc;c', 'SINDH', 'Mirpur khass', 'dsfdsfd', NULL, 'lk@gmail.com', '242332543', '32443245', NULL, NULL, NULL, NULL, '5464456', NULL, NULL, NULL),
(30, 'National Agriculture Research Centre (NARC)', 'ISLAMABAD', 'CAPITAL', 'ISLAMABAD', '051-90733046-48', NULL, 'nave@gmail.com', 'NA', 'NA', NULL, NULL, NULL, NULL, '051-90733046-48', NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Medical Superintendent', 'DHQ, Hospital Narowal', NULL, 'Lahore', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Adil', 'Bagh', 'AJK', 'Bagh', 'NA', 'asif@GMAIL.com', 'NA', 'NA', 'stn', NULL, NULL, NULL, NULL, '123456654321', 15000.000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_children`
--

CREATE TABLE `dc_children` (
  `dcChildid` bigint(20) UNSIGNED NOT NULL,
  `dcparentid` int(11) DEFAULT NULL,
  `warehouseid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `quantity` double(8,2) DEFAULT NULL,
  `dcdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dc_children`
--

INSERT INTO `dc_children` (`dcChildid`, `dcparentid`, `warehouseid`, `categoryid`, `itemid`, `quantity`, `dcdate`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 2, 2.00, '2021-10-15', NULL, NULL),
(2, 2, 1, NULL, NULL, 2.00, '2021-10-14', NULL, NULL),
(3, 3, 1, 1, 1, 2.00, '2021-10-16', NULL, NULL),
(4, 4, 1, 1, 1, 3.00, '2021-10-15', NULL, NULL),
(5, 5, 1, NULL, 0, 1.00, '2021-11-11', NULL, NULL),
(6, 6, 1, NULL, 0, 1.00, '2021-11-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dc_parents`
--

CREATE TABLE `dc_parents` (
  `dcparentid` bigint(20) UNSIGNED NOT NULL,
  `warehouseid` int(11) DEFAULT NULL,
  `dcnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `quotationdate` date DEFAULT NULL,
  `totalwithouttax` double(8,2) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dcdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dc_parents`
--

INSERT INTO `dc_parents` (`dcparentid`, `warehouseid`, `dcnumber`, `customerid`, `quotationdate`, `totalwithouttax`, `status`, `dcdate`, `created_at`, `updated_at`) VALUES
(1, 1, 'dc#1', 2, NULL, NULL, 'close', '2021-10-15', NULL, NULL),
(2, 1, 'dc#2', 2, NULL, NULL, 'open', '2021-10-14', NULL, NULL),
(3, 1, 'dc#3', 2, NULL, NULL, 'close', '2021-10-16', NULL, NULL),
(4, 1, 'dc#4', 2, NULL, NULL, 'close', '2021-10-15', NULL, NULL),
(5, 1, 'dc#5', 2, NULL, NULL, 'open', '2021-11-11', NULL, NULL),
(6, 1, 'dc#6', 3, NULL, NULL, 'open', '2021-11-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeid` bigint(20) UNSIGNED NOT NULL,
  `departmentid` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobilenumber` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeid`, `departmentid`, `name`, `fathername`, `dateofbirth`, `salary`, `gender`, `address`, `email`, `cnic`, `mobilenumber`, `status`, `created_at`, `updated_at`) VALUES
(5, NULL, 'hh', 'hhh', '2021-10-15', '333', NULL, 'cb-625 st.no 03 faisal cly tecnhch bhatta', 'engrimrankhan.khan51@gmail.com', '3740556059282', '0925152246', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `financial_offers`
--

CREATE TABLE `financial_offers` (
  `id` bigint(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ref_no` varchar(255) NOT NULL,
  `total_amount` float NOT NULL,
  `header` tinyint(4) NOT NULL,
  `certification` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financial_offers`
--

INSERT INTO `financial_offers` (`id`, `customer_id`, `date`, `ref_no`, `total_amount`, `header`, `certification`) VALUES
(4, 35, '2021-09-13', '1', 2980, 0, 1),
(5, 32, '2021-09-14', '1', 480, 1, 1),
(6, 22, '2021-10-02', '545456656546', 3500, 1, 0),
(7, 35, '2021-10-02', '545456656', 8000, 0, 0),
(8, 23, '2021-10-04', '5454544', 25000, 0, NULL),
(9, 22, '2021-10-11', '01', 170000, 1, NULL),
(10, 22, '2021-10-13', '1250', 13500, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `financial_offer_children`
--

CREATE TABLE `financial_offer_children` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `rate_per_peice` float NOT NULL,
  `quantity` float NOT NULL,
  `totalprice` float NOT NULL,
  `rate_per_pack` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financial_offer_children`
--

INSERT INTO `financial_offer_children` (`id`, `parent_id`, `categoryid`, `itemid`, `rate_per_peice`, `quantity`, `totalprice`, `rate_per_pack`) VALUES
(3, 4, 2, 5, 40, 2, 80, 240),
(4, 4, 2, 6, 40, 8, 2000, 250),
(5, 5, 2, 5, 240, 2, 480, 480),
(6, 6, 2, 5, 2, 1000, 0, 2000),
(7, 6, 2, 5, 3, 500, 0, 1500),
(8, 7, 2, 5, 7, 1000, 0, 7000),
(9, 7, 2, 5, 2, 500, 0, 1000),
(10, 8, 2, 5, 25, 1000, 0, 25000),
(11, 9, 2, 1, 300, 500, 0, 150000),
(12, 9, 3, 2, 20, 1000, 0, 20000),
(13, 10, 2, 1, 3, 500, 0, 1500),
(14, 10, 2, 1, 9, 500, 0, 4500),
(15, 10, 2, 1, 15, 500, 0, 7500);

-- --------------------------------------------------------

--
-- Table structure for table `generalledgers`
--

CREATE TABLE `generalledgers` (
  `ledgerid` bigint(20) UNSIGNED NOT NULL,
  `inventoryid` int(11) DEFAULT NULL,
  `imasterid` int(11) DEFAULT NULL,
  `billnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `accountid` int(11) DEFAULT NULL,
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actiondate` date DEFAULT NULL,
  `debit` double(20,2) DEFAULT NULL,
  `credit` double(20,2) DEFAULT NULL,
  `balance` double(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalledgers`
--

INSERT INTO `generalledgers` (`ledgerid`, `inventoryid`, `imasterid`, `billnumber`, `purchase_order_id`, `customerid`, `accountid`, `discription`, `actiondate`, `debit`, `credit`, `balance`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, NULL),
(2, 32, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 27000.00, NULL, -27000.00, NULL, NULL),
(3, 33, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -51000.00, NULL, NULL),
(4, 34, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 12000.00, NULL, -63000.00, NULL, NULL),
(5, 35, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 12000.00, NULL, -75000.00, NULL, NULL),
(6, 36, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 15000.00, NULL, -90000.00, NULL, NULL),
(7, 37, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 23000.00, NULL, -113000.00, NULL, NULL),
(8, 38, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 28000.00, NULL, -141000.00, NULL, NULL),
(9, 39, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14000.00, NULL, -155000.00, NULL, NULL),
(10, 40, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 15000.00, NULL, -170000.00, NULL, NULL),
(11, 41, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 15000.00, NULL, -185000.00, NULL, NULL),
(12, 42, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14000.00, NULL, -199000.00, NULL, NULL),
(13, 43, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 11000.00, NULL, -210000.00, NULL, NULL),
(14, 44, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 19000.00, NULL, -229000.00, NULL, NULL),
(15, 45, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 9600.00, NULL, -238600.00, NULL, NULL),
(16, 46, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 12000.00, NULL, -250600.00, NULL, NULL),
(17, 47, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 20000.00, NULL, -270600.00, NULL, NULL),
(18, 48, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14400.00, NULL, -285000.00, NULL, NULL),
(19, 49, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -309000.00, NULL, NULL),
(20, 50, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 27000.00, NULL, -336000.00, NULL, NULL),
(21, 51, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 80000.00, NULL, -416000.00, NULL, NULL),
(22, 52, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 80000.00, NULL, -496000.00, NULL, NULL),
(23, 53, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 4800.00, NULL, -500800.00, NULL, NULL),
(24, 54, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 160000.00, NULL, -660800.00, NULL, NULL),
(25, 55, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -692800.00, NULL, NULL),
(26, 56, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -724800.00, NULL, NULL),
(27, 57, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -748800.00, NULL, NULL),
(28, 58, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -772800.00, NULL, NULL),
(29, 59, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 28000.00, NULL, -800800.00, NULL, NULL),
(30, 60, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 44000.00, NULL, -844800.00, NULL, NULL),
(31, 61, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 10000.00, NULL, -854800.00, NULL, NULL),
(32, 62, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 30000.00, NULL, -884800.00, NULL, NULL),
(33, 63, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -916800.00, NULL, NULL),
(34, 64, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -948800.00, NULL, NULL),
(35, 65, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -972800.00, NULL, NULL),
(36, 66, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14000.00, NULL, -986800.00, NULL, NULL),
(37, 67, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14000.00, NULL, -1000800.00, NULL, NULL),
(38, 68, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 28000.00, NULL, -1028800.00, NULL, NULL),
(39, 69, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 22000.00, NULL, -1050800.00, NULL, NULL),
(40, 70, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -1082800.00, NULL, NULL),
(41, 71, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 28000.00, NULL, -1110800.00, NULL, NULL),
(42, 72, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -1134800.00, NULL, NULL),
(43, 73, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 70000.00, NULL, -1204800.00, NULL, NULL),
(44, 74, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 7000.00, NULL, -1211800.00, NULL, NULL),
(45, 75, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 20000.00, NULL, -1231800.00, NULL, NULL),
(46, 76, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 12000.00, NULL, -1243800.00, NULL, NULL),
(47, 77, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 16000.00, NULL, -1259800.00, NULL, NULL),
(48, 78, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 280000.00, NULL, -1539800.00, NULL, NULL),
(49, 79, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 6000.00, NULL, -1545800.00, NULL, NULL),
(50, 80, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 72000.00, NULL, -1617800.00, NULL, NULL),
(51, 81, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 22500.00, NULL, -1640300.00, NULL, NULL),
(52, 82, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 2500.00, NULL, -1642800.00, NULL, NULL),
(53, 83, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 3000.00, NULL, -1645800.00, NULL, NULL),
(54, 84, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 5000.00, NULL, -1650800.00, NULL, NULL),
(55, 85, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 9000.00, NULL, -1659800.00, NULL, NULL),
(56, 86, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 2800.00, NULL, -1662600.00, NULL, NULL),
(57, 87, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 6500.00, NULL, -1669100.00, NULL, NULL),
(58, 88, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 3000.00, NULL, -1672100.00, NULL, NULL),
(59, 89, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 2800.00, NULL, -1674900.00, NULL, NULL),
(60, 90, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 34000.00, NULL, -1708900.00, NULL, NULL),
(61, 91, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 15000.00, NULL, -1723900.00, NULL, NULL),
(62, 92, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 2100.00, NULL, -1726000.00, NULL, NULL),
(63, 93, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 600000.00, NULL, -2326000.00, NULL, NULL),
(64, 94, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 96000.00, NULL, -2422000.00, NULL, NULL),
(65, 95, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 61000.00, NULL, -2483000.00, NULL, NULL),
(66, 96, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 224000.00, NULL, -2707000.00, NULL, NULL),
(67, 97, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 10000.00, NULL, -2717000.00, NULL, NULL),
(68, 98, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 18000.00, NULL, -2735000.00, NULL, NULL),
(69, 99, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 13500.00, NULL, -2748500.00, NULL, NULL),
(70, 100, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 6400.00, NULL, -2754900.00, NULL, NULL),
(71, 101, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 21900.00, NULL, -2776800.00, NULL, NULL),
(72, 102, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 143000.00, NULL, -2919800.00, NULL, NULL),
(73, 103, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 45000.00, NULL, -2964800.00, NULL, NULL),
(74, 104, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 488.00, NULL, -2965288.00, NULL, NULL),
(75, 105, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 20000.00, NULL, -2985288.00, NULL, NULL),
(76, 106, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 87000.00, NULL, -3072288.00, NULL, NULL),
(77, 107, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 36000.00, NULL, -3108288.00, NULL, NULL),
(78, 108, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 28000.00, NULL, -3136288.00, NULL, NULL),
(79, 109, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 40000.00, NULL, -3176288.00, NULL, NULL),
(80, 110, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 33000.00, NULL, -3209288.00, NULL, NULL),
(81, 111, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 33000.00, NULL, -3242288.00, NULL, NULL),
(82, 112, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 36000.00, NULL, -3278288.00, NULL, NULL),
(83, 113, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 80000.00, NULL, -3358288.00, NULL, NULL),
(84, 114, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 48000.00, NULL, -3406288.00, NULL, NULL),
(85, 115, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 15000.00, NULL, -3421288.00, NULL, NULL),
(86, 116, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 50000.00, NULL, -3471288.00, NULL, NULL),
(87, 117, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 140000.00, NULL, -3611288.00, NULL, NULL),
(88, 118, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 8000.00, NULL, -3619288.00, NULL, NULL),
(89, 119, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 20000.00, NULL, -3639288.00, NULL, NULL),
(90, 120, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 15000.00, NULL, -3654288.00, NULL, NULL),
(91, 121, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 44000.00, NULL, -3698288.00, NULL, NULL),
(92, 122, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 28000.00, NULL, -3726288.00, NULL, NULL),
(93, 123, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 28000.00, NULL, -3754288.00, NULL, NULL),
(94, 124, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14000.00, NULL, -3768288.00, NULL, NULL),
(95, 125, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 10000.00, NULL, -3778288.00, NULL, NULL),
(96, 126, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 40000.00, NULL, -3818288.00, NULL, NULL),
(97, 127, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 12000.00, NULL, -3830288.00, NULL, NULL),
(98, NULL, 408, NULL, NULL, 26, NULL, NULL, '2021-01-05', NULL, 0.00, -3830288.00, NULL, NULL),
(99, NULL, 409, NULL, NULL, 3, NULL, NULL, '2021-01-06', NULL, 0.00, -3830288.00, NULL, NULL),
(100, NULL, 410, NULL, NULL, 26, NULL, NULL, '2021-01-05', NULL, 0.00, -3830288.00, NULL, NULL),
(101, 128, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 57600.00, NULL, -3887888.00, NULL, NULL),
(102, NULL, 411, NULL, NULL, 23, NULL, NULL, '2021-01-11', NULL, 0.00, -3887888.00, NULL, NULL),
(103, NULL, 412, NULL, NULL, 4, NULL, NULL, '2021-01-11', NULL, 0.00, -3887888.00, NULL, NULL),
(104, 129, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32500.00, NULL, -3920388.00, NULL, NULL),
(105, 130, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32500.00, NULL, -3952888.00, NULL, NULL),
(106, 131, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 30000.00, NULL, -3982888.00, NULL, NULL),
(107, NULL, 413, NULL, NULL, 23, NULL, NULL, '2021-01-11', NULL, 0.00, -3982888.00, NULL, NULL),
(108, NULL, 414, NULL, NULL, 26, NULL, NULL, '2021-01-13', NULL, 0.00, -3982888.00, NULL, NULL),
(109, 132, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 4800.00, NULL, -3987688.00, NULL, NULL),
(110, NULL, 415, NULL, NULL, 4, NULL, NULL, '2021-01-25', NULL, 0.00, -3987688.00, NULL, NULL),
(111, NULL, 416, NULL, NULL, 24, NULL, NULL, '2021-01-27', NULL, 0.00, -3987688.00, NULL, NULL),
(112, 133, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 40000.00, NULL, -4027688.00, NULL, NULL),
(113, 134, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -4059688.00, NULL, NULL),
(114, 135, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -4091688.00, NULL, NULL),
(115, 136, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -4115688.00, NULL, NULL),
(116, 137, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -4139688.00, NULL, NULL),
(117, 138, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 44000.00, NULL, -4183688.00, NULL, NULL),
(118, 139, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 28000.00, NULL, -4211688.00, NULL, NULL),
(119, 140, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 10000.00, NULL, -4221688.00, NULL, NULL),
(120, 141, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 26000.00, NULL, -4247688.00, NULL, NULL),
(121, 142, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -4279688.00, NULL, NULL),
(122, 143, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 32000.00, NULL, -4311688.00, NULL, NULL),
(123, 144, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -4335688.00, NULL, NULL),
(124, 145, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14000.00, NULL, -4349688.00, NULL, NULL),
(125, 146, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14000.00, NULL, -4363688.00, NULL, NULL),
(126, 147, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 14000.00, NULL, -4377688.00, NULL, NULL),
(127, 148, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 27000.00, NULL, -4404688.00, NULL, NULL),
(128, 149, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 38000.00, NULL, -4442688.00, NULL, NULL),
(129, 150, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 26000.00, NULL, -4468688.00, NULL, NULL),
(130, 151, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-12', 65000.00, NULL, -4533688.00, NULL, NULL),
(131, 152, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 24000.00, NULL, -4557688.00, NULL, NULL),
(132, 153, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 7000.00, NULL, -4564688.00, NULL, NULL),
(133, 154, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 40000.00, NULL, -4604688.00, NULL, NULL),
(134, NULL, 417, NULL, NULL, 3, NULL, NULL, '2021-02-08', NULL, 0.00, -4604688.00, NULL, NULL),
(135, NULL, 418, NULL, NULL, 24, NULL, NULL, '2021-02-10', NULL, 0.00, -4604688.00, NULL, NULL),
(136, NULL, 419, NULL, NULL, 4, NULL, NULL, '2021-02-16', NULL, 0.00, -4604688.00, NULL, NULL),
(137, NULL, 420, NULL, NULL, 26, NULL, NULL, '2021-02-17', NULL, 0.00, -4604688.00, NULL, NULL),
(138, NULL, 421, NULL, NULL, 26, NULL, NULL, '2021-02-17', NULL, 0.00, -4604688.00, NULL, NULL),
(139, NULL, 422, NULL, NULL, 24, NULL, NULL, '2021-02-24', NULL, 0.00, -4604688.00, NULL, NULL),
(140, NULL, 423, NULL, NULL, 27, NULL, NULL, '2021-03-04', NULL, 0.00, -4604688.00, NULL, NULL),
(141, 155, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 50000.00, NULL, -4654688.00, NULL, NULL),
(142, 156, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 11000.00, NULL, -4665688.00, NULL, NULL),
(143, NULL, 424, NULL, NULL, 28, NULL, NULL, '2021-03-08', NULL, 0.00, -4665688.00, NULL, NULL),
(144, NULL, 425, NULL, NULL, 26, NULL, NULL, '2021-03-09', NULL, 0.00, -4665688.00, NULL, NULL),
(145, NULL, 426, NULL, NULL, 16, NULL, NULL, '2021-03-15', NULL, 0.00, -4665688.00, NULL, NULL),
(146, NULL, 427, NULL, NULL, 4, NULL, NULL, '2021-03-15', NULL, 0.00, -4665688.00, NULL, NULL),
(147, NULL, 428, NULL, NULL, 3, NULL, NULL, '2021-03-17', NULL, 0.00, -4665688.00, NULL, NULL),
(148, NULL, 429, NULL, NULL, 24, NULL, NULL, '2021-03-17', NULL, 0.00, -4665688.00, NULL, NULL),
(149, NULL, 430, NULL, NULL, 27, NULL, NULL, '2021-03-18', NULL, 0.00, -4665688.00, NULL, NULL),
(150, NULL, 431, NULL, NULL, 26, NULL, NULL, '2021-03-29', NULL, 0.00, -4665688.00, NULL, NULL),
(151, NULL, 432, NULL, NULL, 26, NULL, NULL, '2021-03-29', NULL, 0.00, -4665688.00, NULL, NULL),
(152, NULL, 433, NULL, NULL, 27, NULL, NULL, '2021-03-31', NULL, 0.00, -4665688.00, NULL, NULL),
(153, NULL, 434, NULL, NULL, 26, NULL, NULL, '2021-04-07', NULL, 0.00, -4665688.00, NULL, NULL),
(154, NULL, 435, NULL, NULL, 4, NULL, NULL, '2021-04-07', NULL, 0.00, -4665688.00, NULL, NULL),
(155, NULL, 436, NULL, NULL, 24, NULL, NULL, '2021-04-08', NULL, 0.00, -4665688.00, NULL, NULL),
(156, 157, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 12000.00, NULL, -4677688.00, NULL, NULL),
(157, NULL, 437, NULL, NULL, 3, NULL, NULL, '2021-04-14', NULL, 0.00, -4677688.00, NULL, NULL),
(158, 158, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 22500.00, NULL, -4700188.00, NULL, NULL),
(159, NULL, 438, NULL, NULL, 4, NULL, NULL, '2021-04-26', NULL, 0.00, -4700188.00, NULL, NULL),
(160, NULL, 408, NULL, NULL, 26, NULL, 'installment', '2021-01-22', NULL, 40224.60, -4659963.40, NULL, NULL),
(161, NULL, 409, NULL, NULL, 3, NULL, 'installment', '2021-01-25', NULL, 266637.91, -4393325.49, NULL, NULL),
(162, NULL, 410, NULL, NULL, 26, NULL, 'installment', '2021-01-22', NULL, 199927.43, -4193398.06, NULL, NULL),
(163, NULL, 412, NULL, NULL, 4, NULL, 'installment', '2121-02-18', NULL, 142216.30, -4051181.76, NULL, NULL),
(164, NULL, 414, NULL, NULL, 26, NULL, 'installment', '2021-02-02', NULL, 139668.75, -3911513.01, NULL, NULL),
(165, NULL, 419, NULL, NULL, 4, NULL, 'installment', '2021-03-15', NULL, 9385.74, -3902127.27, NULL, NULL),
(166, NULL, 420, NULL, NULL, 26, NULL, 'installment', '2021-03-06', NULL, 10726.60, -3891400.67, NULL, NULL),
(167, NULL, 421, NULL, NULL, 26, NULL, 'installment', '2021-03-19', NULL, 33520.50, -3857880.17, NULL, NULL),
(168, NULL, 424, NULL, NULL, 28, NULL, 'installment', '2021-03-24', NULL, 87265.03, -3770615.14, NULL, NULL),
(169, NULL, 411, NULL, NULL, 23, NULL, 'installment', '2021-02-27', NULL, 64359.36, -3706255.78, NULL, NULL),
(170, NULL, 413, NULL, NULL, 23, NULL, 'installment', '2021-02-27', NULL, 131847.30, -3574408.48, NULL, NULL),
(171, NULL, 416, NULL, NULL, 24, NULL, 'installment', '2021-01-27', NULL, 280231.38, -3294177.10, NULL, NULL),
(172, NULL, 420, NULL, NULL, 26, NULL, 'installment', '2021-03-06', NULL, 96539.00, -3197638.10, NULL, NULL),
(173, NULL, 425, NULL, NULL, 26, NULL, 'installment', '2021-03-29', NULL, 2346.43, -3195291.67, NULL, NULL),
(174, NULL, 426, NULL, NULL, 16, NULL, 'installment', '2021-04-01', NULL, 668510.50, -2526781.17, NULL, NULL),
(175, NULL, 428, NULL, NULL, 3, NULL, 'installment', '2021-03-29', NULL, 438089.77, -2088691.40, NULL, NULL),
(176, NULL, 429, NULL, NULL, 24, NULL, 'installment', '2021-03-17', NULL, 308754.00, -1779937.40, NULL, NULL),
(177, NULL, 436, NULL, NULL, 24, NULL, 'installment', '2021-04-08', NULL, 545.26, -1779392.14, NULL, NULL),
(178, NULL, 429, NULL, NULL, 24, NULL, 'installment', '2021-03-01', NULL, 9690.75, -1769701.39, NULL, NULL),
(179, 159, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-20', 2500.00, NULL, -1772201.39, NULL, NULL),
(180, 160, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-20', 2500.00, NULL, -1774701.39, NULL, NULL),
(181, NULL, 439, NULL, NULL, 26, NULL, NULL, '2021-04-26', NULL, 0.00, -1774701.39, NULL, NULL),
(182, 161, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 3600.00, NULL, -1778301.39, NULL, NULL),
(183, 162, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 3600.00, NULL, -1781901.39, NULL, NULL),
(184, 163, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 1800.00, NULL, -1783701.39, NULL, NULL),
(185, NULL, 440, NULL, NULL, 4, NULL, NULL, '2021-05-04', NULL, 0.00, -1783701.39, NULL, NULL),
(186, 164, NULL, NULL, NULL, NULL, NULL, NULL, '2121-04-29', 40000.00, NULL, -1823701.39, NULL, NULL),
(187, 165, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-29', 75000.00, NULL, -1898701.39, NULL, NULL),
(188, NULL, 437, NULL, NULL, 3, NULL, 'installment', '2021-04-27', NULL, 764618.30, -1134083.09, NULL, NULL),
(189, NULL, 434, NULL, NULL, 26, NULL, 'installment', '2021-04-29', NULL, 159781.00, -974302.09, NULL, NULL),
(190, NULL, 415, NULL, NULL, 4, NULL, 'installment', '2021-05-04', NULL, 6685.00, -967617.09, NULL, NULL),
(191, NULL, 427, NULL, NULL, 4, NULL, 'installment', '2021-05-04', NULL, 142216.30, -825400.79, NULL, NULL),
(192, 166, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-03', 67275.00, NULL, -892675.79, NULL, NULL),
(193, 167, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-03', 30000.00, NULL, -922675.79, NULL, NULL),
(194, NULL, 441, NULL, NULL, 30, NULL, NULL, '2021-05-05', NULL, 0.00, -922675.79, NULL, NULL),
(195, 168, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-06', 5000.00, NULL, -927675.79, NULL, NULL),
(196, NULL, 442, NULL, NULL, 7, NULL, NULL, '2021-05-06', NULL, 0.00, -927675.79, NULL, NULL),
(197, 169, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17', 30000.00, NULL, -957675.79, NULL, NULL),
(198, 170, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-17', 35000.00, NULL, -992675.79, NULL, NULL),
(199, 171, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 5000.00, NULL, -997675.79, NULL, NULL),
(200, 172, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 8000.00, NULL, -1005675.79, NULL, NULL),
(201, 173, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 2000.00, NULL, -1007675.79, NULL, NULL),
(202, 174, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 2000.00, NULL, -1009675.79, NULL, NULL),
(203, 175, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 2300.00, NULL, -1011975.79, NULL, NULL),
(204, NULL, 443, NULL, NULL, 7, NULL, NULL, '2021-05-18', NULL, 0.00, -1011975.79, NULL, NULL),
(205, 176, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 15000.00, NULL, -1026975.79, NULL, NULL),
(206, 177, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 30000.00, NULL, -1056975.79, NULL, NULL),
(207, 178, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 30000.00, NULL, -1086975.79, NULL, NULL),
(208, 179, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 10500.00, NULL, -1097475.79, NULL, NULL),
(209, 180, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 4500.00, NULL, -1101975.79, NULL, NULL),
(210, 181, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 4500.00, NULL, -1106475.79, NULL, NULL),
(211, 182, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 18000.00, NULL, -1124475.79, NULL, NULL),
(212, 183, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 5000.00, NULL, -1129475.79, NULL, NULL),
(213, 184, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 1500.00, NULL, -1130975.79, NULL, NULL),
(214, 185, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 2500.00, NULL, -1133475.79, NULL, NULL),
(215, 186, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 2900.00, NULL, -1136375.79, NULL, NULL),
(216, 187, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 3000.00, NULL, -1139375.79, NULL, NULL),
(217, 188, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 4200.00, NULL, -1143575.79, NULL, NULL),
(218, 189, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 1400.00, NULL, -1144975.79, NULL, NULL),
(219, 190, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 4500.00, NULL, -1149475.79, NULL, NULL),
(220, 191, NULL, NULL, NULL, NULL, NULL, NULL, '0001-01-01', 27000.00, NULL, -1176475.79, NULL, NULL),
(221, 192, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-31', 25000.00, NULL, -1201475.79, NULL, NULL),
(222, NULL, NULL, '1204', 1, NULL, NULL, NULL, '2021-06-18', 0.00, 0.00, -1201475.79, NULL, NULL),
(223, NULL, NULL, '7987', 2, NULL, NULL, NULL, '2021-06-16', 0.00, 0.00, -1201475.79, NULL, NULL),
(224, NULL, 444, NULL, NULL, 22, NULL, NULL, '2021-06-16', NULL, 1100.00, -1200375.79, NULL, NULL),
(225, NULL, 445, NULL, NULL, 18, NULL, NULL, '2021-06-17', NULL, 0.00, -1200375.79, NULL, NULL),
(226, NULL, NULL, 'nill', 8, NULL, NULL, NULL, '2021-06-18', 2000.00, 0.00, -1202375.79, NULL, NULL),
(227, NULL, NULL, 'nill', 9, NULL, NULL, NULL, '2021-06-18', 0.00, 0.00, -1202375.79, NULL, NULL),
(228, NULL, NULL, 'BILL-01', 1, NULL, NULL, NULL, '2021-06-19', 0.00, 0.00, -1202375.79, NULL, NULL),
(229, NULL, NULL, 'B-01', 1, NULL, NULL, NULL, '2021-06-19', 0.00, 0.00, -1202375.79, NULL, NULL),
(230, NULL, NULL, 'b-03', 3, NULL, NULL, NULL, '2021-06-05', 0.00, 0.00, -1202375.79, NULL, NULL),
(231, NULL, NULL, 'B-07', 2, NULL, NULL, NULL, '2021-06-19', 0.00, 0.00, -1202375.79, NULL, NULL),
(232, NULL, NULL, 'kh-1', 4, NULL, NULL, NULL, '2021-06-19', 0.00, 0.00, -1202375.79, NULL, NULL),
(233, NULL, NULL, 'b-01', 1, NULL, NULL, NULL, '2021-06-02', 0.00, 0.00, -1202375.79, NULL, NULL),
(234, NULL, NULL, 'bill-0978', 1, NULL, NULL, NULL, '2021-06-01', 0.00, 0.00, -1202375.79, NULL, NULL),
(235, NULL, NULL, 'nill', 2, NULL, NULL, NULL, '2021-06-16', 0.00, 0.00, -1202375.79, NULL, NULL),
(236, NULL, NULL, 'a-098', 3, NULL, NULL, NULL, '2021-06-03', 0.00, 0.00, -1202375.79, NULL, NULL),
(237, NULL, 446, NULL, NULL, 22, NULL, NULL, '2021-07-16', NULL, 0.00, -1202375.79, NULL, NULL),
(238, NULL, 447, NULL, NULL, 7, NULL, NULL, '2021-06-27', NULL, 363.80, -1202011.99, NULL, NULL),
(239, NULL, 448, NULL, NULL, 22, NULL, NULL, '2021-07-31', NULL, 3762.00, -1198249.99, NULL, NULL),
(240, NULL, 449, NULL, NULL, 22, NULL, NULL, '2021-07-31', NULL, 3762.00, -1194487.99, NULL, NULL),
(241, 207, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-01', 1000.00, NULL, -1195487.99, NULL, NULL),
(242, NULL, NULL, '4415522', 6, NULL, NULL, NULL, '2021-09-15', 0.00, 0.00, -1195487.99, NULL, NULL),
(243, NULL, NULL, '10101', 8, NULL, NULL, NULL, '2021-09-15', 0.00, 0.00, -1195487.99, NULL, NULL),
(244, 213, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-05', 20000.00, NULL, -1215487.99, NULL, NULL),
(245, NULL, 450, NULL, NULL, 2, NULL, NULL, '2021-10-08', NULL, 60.00, -1215427.99, NULL, NULL),
(246, NULL, 451, NULL, NULL, 2, NULL, NULL, '2021-10-08', NULL, 0.00, -1215427.99, NULL, NULL),
(247, NULL, 452, NULL, NULL, 7, NULL, NULL, '2021-10-08', NULL, 3000.00, -1212427.99, NULL, NULL),
(248, NULL, 453, NULL, NULL, 2, NULL, NULL, '2021-10-08', NULL, 80000.00, -1132427.99, NULL, NULL),
(249, NULL, NULL, '7555785785', 9, NULL, NULL, NULL, '2021-09-20', 0.00, 0.00, -1132427.99, NULL, NULL),
(250, NULL, 454, NULL, NULL, 2, NULL, NULL, '2021-10-09', NULL, 0.00, -1132427.99, NULL, NULL),
(251, NULL, 455, NULL, NULL, 2, NULL, NULL, '2021-10-09', NULL, 0.00, -1132427.99, NULL, NULL),
(252, NULL, 456, NULL, NULL, 2, NULL, NULL, '2021-10-09', NULL, 8000.00, -1124427.99, NULL, NULL),
(253, NULL, 457, NULL, NULL, 2, NULL, NULL, '2021-10-09', NULL, 8000.00, -1116427.99, NULL, NULL),
(254, NULL, 458, NULL, NULL, 12, NULL, NULL, '2021-10-09', NULL, 6000.00, -1110427.99, NULL, NULL),
(255, NULL, 459, NULL, NULL, 4, NULL, NULL, '2021-10-09', NULL, 8000.00, -1102427.99, NULL, NULL),
(256, NULL, 460, NULL, NULL, 2, NULL, NULL, '2021-10-09', NULL, 0.00, -1102427.99, NULL, NULL),
(257, NULL, 461, NULL, NULL, 3, NULL, NULL, '2021-10-20', NULL, 0.00, -1102427.99, NULL, NULL),
(258, NULL, 462, NULL, NULL, 2, NULL, NULL, '2021-10-09', NULL, 4566.00, -1097861.99, NULL, NULL),
(259, NULL, 463, NULL, NULL, 7, NULL, NULL, '2021-10-09', NULL, 0.00, -1097861.99, NULL, NULL),
(260, NULL, 464, NULL, NULL, 20, NULL, NULL, '2021-10-09', NULL, 0.00, -1097861.99, NULL, NULL),
(261, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 5000.00, NULL, -1102861.99, NULL, NULL),
(262, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-01', 7000.00, NULL, -1109861.99, NULL, NULL),
(263, NULL, 465, NULL, NULL, 3, NULL, NULL, '2021-10-11', NULL, 0.00, -1109861.99, NULL, NULL),
(264, NULL, 466, NULL, NULL, 11, NULL, NULL, '2021-09-01', NULL, 0.00, -1109861.99, NULL, NULL),
(265, NULL, 446, NULL, NULL, 22, NULL, 'installment', NULL, NULL, NULL, -1109861.99, NULL, NULL),
(266, NULL, 445, NULL, NULL, 18, NULL, 'installment', NULL, NULL, NULL, -1109861.99, NULL, NULL),
(267, NULL, 450, NULL, NULL, 2, NULL, 'installment', NULL, NULL, NULL, -1109861.99, NULL, NULL),
(268, NULL, 451, NULL, NULL, 2, NULL, 'installment', NULL, NULL, NULL, -1109861.99, NULL, NULL),
(269, NULL, 453, NULL, NULL, 2, NULL, 'installment', NULL, NULL, NULL, -1109861.99, NULL, NULL),
(270, NULL, 454, NULL, NULL, 2, NULL, 'installment', NULL, NULL, NULL, -1109861.99, NULL, NULL),
(271, NULL, 455, NULL, NULL, 2, NULL, 'installment', NULL, NULL, NULL, -1109861.99, NULL, NULL),
(272, NULL, 415, NULL, NULL, 4, NULL, 'installment', NULL, NULL, NULL, -1109861.99, NULL, NULL),
(273, 1, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-17', 8000.00, NULL, -1117861.99, NULL, NULL),
(274, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-27', 40000.00, NULL, -1157861.99, NULL, NULL),
(275, 3, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-15', 7000000.00, NULL, -8157861.99, NULL, NULL),
(276, 4, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-22', 466620000.00, NULL, -474777861.99, NULL, NULL),
(277, 5, NULL, NULL, NULL, NULL, NULL, NULL, '2021-10-15', 58608.00, NULL, -474836469.99, NULL, NULL),
(278, NULL, NULL, '555', 1, NULL, NULL, NULL, '2021-10-15', 0.00, 0.00, -474836469.99, NULL, NULL),
(279, NULL, 1, NULL, NULL, 2, NULL, NULL, '2021-10-15', NULL, 2.00, -474836467.99, NULL, NULL),
(280, NULL, 2, NULL, NULL, 2, NULL, NULL, '2021-10-16', NULL, 3.00, -474836464.99, NULL, NULL),
(281, NULL, 3, NULL, NULL, 2, NULL, NULL, '2021-10-15', NULL, 12.00, -474836452.99, NULL, NULL),
(282, 10, NULL, NULL, NULL, NULL, NULL, NULL, '2021-11-01', 3000.00, NULL, -474839452.99, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gl_account`
--

CREATE TABLE `gl_account` (
  `gl_id` bigint(20) UNSIGNED NOT NULL,
  `a_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_date` date DEFAULT NULL,
  `folio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` double(100,2) DEFAULT NULL,
  `credit` double(8,2) DEFAULT NULL,
  `balance` double(8,2) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gl_account`
--

INSERT INTO `gl_account` (`gl_id`, `a_id`, `description`, `t_date`, `folio`, `debit`, `credit`, `balance`, `status`, `voucher_no`, `p_id`, `created_at`, `updated_at`) VALUES
(1, 26, 'Expertise in subfertility treatment and other gynaecological issue  obstetrician', '2021-06-16', NULL, 8000.00, NULL, NULL, NULL, 'R-v-1', NULL, NULL, NULL),
(2, 7, 'Expertise in subfertility treatment and other gynaecological issue  obstetrician', '2021-06-16', NULL, NULL, 8000.00, NULL, NULL, 'R-v-1', NULL, NULL, NULL),
(3, 26, 'MBBS (pak) ,MCPS(isb),RMP Expertise in subfertility treatment and other gynaecological issue  obstetrician', '2021-06-25', NULL, 369.00, NULL, NULL, NULL, 'R-v-3', NULL, NULL, NULL),
(4, 3, 'MBBS (pak) ,MCPS(isb),RMP Expertise in subfertility treatment and other gynaecological issue  obstetrician', '2021-06-25', NULL, NULL, 369.00, NULL, NULL, 'R-v-3', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `installments`
--

CREATE TABLE `installments` (
  `installmentid` bigint(20) UNSIGNED NOT NULL,
  `imasterid` int(11) DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installmentdate` date DEFAULT NULL,
  `previousbalance` double(20,2) DEFAULT NULL,
  `totalbill` double DEFAULT NULL,
  `installmentamount` double(20,2) DEFAULT NULL,
  `currentremainig` double(20,2) DEFAULT NULL,
  `chequenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installments`
--

INSERT INTO `installments` (`installmentid`, `imasterid`, `customerid`, `invoicenumber`, `installmentdate`, `previousbalance`, `totalbill`, `installmentamount`, `currentremainig`, `chequenumber`, `created_at`, `updated_at`) VALUES
(1, 47, 2, '#047', '2018-03-06', NULL, NULL, 0.00, 105300.00, NULL, NULL, NULL),
(2, 48, 2, '#048', '2018-03-06', NULL, NULL, 0.00, 231660.00, NULL, NULL, NULL),
(3, 49, 9, '#049', '2018-03-06', NULL, NULL, 0.00, 99300.24, NULL, NULL, NULL),
(4, 50, 16, '#050', '2018-03-08', NULL, NULL, 0.00, 399192.30, NULL, NULL, NULL),
(5, 51, 2, '#051', '2018-03-12', NULL, NULL, 0.00, 87750.00, NULL, NULL, NULL),
(6, 52, 9, '#052', '2018-03-13', NULL, NULL, 0.00, 47502.00, NULL, NULL, NULL),
(7, 53, 2, '#053', '2018-03-15', NULL, NULL, 0.00, 98280.00, NULL, NULL, NULL),
(8, 54, 2, '#054', '2018-03-19', NULL, NULL, 0.00, 106470.00, NULL, NULL, NULL),
(9, 55, 2, '#055', '2018-03-22', NULL, NULL, 0.00, 5499.00, NULL, NULL, NULL),
(10, 56, 4, '#056', '2018-03-22', NULL, NULL, 0.00, 28080.00, NULL, NULL, NULL),
(11, 57, 4, '#057', '2018-03-26', NULL, NULL, 0.00, 42120.00, NULL, NULL, NULL),
(12, 58, 2, '#058', '2018-03-26', NULL, NULL, 0.00, 105300.00, NULL, NULL, NULL),
(13, 59, 11, '#059', '2018-03-26', NULL, NULL, 0.00, 23600.00, NULL, NULL, NULL),
(14, 60, 11, '#060', '2018-03-26', NULL, NULL, 0.00, 13180.00, NULL, NULL, NULL),
(15, 61, 14, '#061', '2018-04-03', NULL, NULL, 0.00, 18164.25, NULL, NULL, NULL),
(16, 62, 4, '#062', '2018-04-09', NULL, NULL, 0.00, 25000.00, NULL, NULL, NULL),
(17, 63, 16, '#063', '2018-04-16', NULL, NULL, 0.00, 195975.00, NULL, NULL, NULL),
(18, 64, 16, '#064', '2018-04-16', NULL, NULL, 0.00, 9636.12, NULL, NULL, NULL),
(19, 66, 4, '#066', '2018-04-19', NULL, NULL, 0.00, 42120.00, NULL, NULL, NULL),
(20, 67, 13, '#067', '2018-04-23', NULL, NULL, 0.00, 24453.00, NULL, NULL, NULL),
(21, 68, 13, '#068', '2018-04-23', NULL, NULL, 0.00, 21703.50, NULL, NULL, NULL),
(22, 69, 13, '#069', '2018-04-23', NULL, NULL, 0.00, 4750.20, NULL, NULL, NULL),
(23, 70, 2, '#070', '2018-05-04', NULL, NULL, 0.00, 11115.00, NULL, NULL, NULL),
(24, 71, 2, '#071', '2018-05-04', NULL, NULL, 0.00, 70668.00, NULL, NULL, NULL),
(25, 72, 13, '#072', '2018-05-14', NULL, NULL, 0.00, 11232.00, NULL, NULL, NULL),
(26, 73, 2, '#073', '2018-05-14', NULL, NULL, 0.00, 40950.00, NULL, NULL, NULL),
(27, 74, 2, '#074', '2018-05-14', NULL, NULL, 0.00, 115198.20, NULL, NULL, NULL),
(28, 75, 11, '#075', '2018-05-02', NULL, NULL, 0.00, 19500.00, NULL, NULL, NULL),
(29, 76, 11, '#076', '2018-05-02', NULL, NULL, 0.00, 23000.00, NULL, NULL, NULL),
(30, 77, 9, '#077', '2018-05-14', NULL, NULL, 0.00, 98000.37, NULL, NULL, NULL),
(31, 78, 13, '#078', '2018-05-02', NULL, NULL, 0.00, 17550.00, NULL, NULL, NULL),
(32, 79, 13, '#079', '2018-05-14', NULL, NULL, 0.00, 17550.00, NULL, NULL, NULL),
(33, 80, 8, '#080', '2018-05-17', NULL, NULL, 0.00, 162864.00, NULL, NULL, NULL),
(34, 84, 2, '#084', '2018-05-17', NULL, NULL, 0.00, 60255.00, NULL, NULL, NULL),
(35, 85, 13, '#085', '2018-05-22', NULL, NULL, 0.00, 85263.75, NULL, NULL, NULL),
(36, 86, 7, '#086', '2018-06-01', NULL, NULL, 0.00, 63629.28, NULL, NULL, NULL),
(37, 87, 7, '#087', '2018-06-01', NULL, NULL, 0.00, 239733.00, NULL, NULL, NULL),
(38, 88, 14, '#088', '2018-06-05', NULL, NULL, 0.00, 100620.00, NULL, NULL, NULL),
(39, 89, 2, '#089', '2018-06-05', NULL, NULL, 0.00, 55575.00, NULL, NULL, NULL),
(40, 90, 5, '#090', '2018-06-05', NULL, NULL, 0.00, 9360.00, NULL, NULL, NULL),
(41, 91, 2, '#091', '2018-06-21', NULL, NULL, 0.00, 22230.00, NULL, NULL, NULL),
(42, 92, 8, '#092', '2018-06-21', NULL, NULL, 0.00, 316953.00, NULL, NULL, NULL),
(43, 93, 8, '#093', '2018-06-21', NULL, NULL, 0.00, 1755.00, NULL, NULL, NULL),
(44, 94, 7, '#094', '2018-06-25', NULL, NULL, 0.00, 5850.00, NULL, NULL, NULL),
(45, 95, 4, '#095', '2018-07-02', NULL, NULL, 0.00, 29484.00, NULL, NULL, NULL),
(46, 96, 2, '#096', '2018-01-07', NULL, NULL, 0.00, 15912.00, NULL, NULL, NULL),
(47, 97, 2, '#097', '2018-07-17', NULL, NULL, 0.00, 49140.00, NULL, NULL, NULL),
(48, 98, 17, '#098', '2018-07-18', NULL, NULL, 0.00, 80999.10, NULL, NULL, NULL),
(49, 99, 7, '#099', '2018-08-02', NULL, NULL, 0.00, 97765.20, NULL, NULL, NULL),
(50, 100, 4, '#0100', '2018-08-10', NULL, NULL, 0.00, 40365.00, NULL, NULL, NULL),
(51, 101, 4, '#0101', '2018-08-16', NULL, NULL, 0.00, 7488.00, NULL, NULL, NULL),
(52, 102, 4, '#0102', '2018-08-16', NULL, NULL, 0.00, 7488.00, NULL, NULL, NULL),
(53, 103, 2, '#0103', '2018-09-05', NULL, NULL, 0.00, 20919.60, NULL, NULL, NULL),
(54, 104, 2, '#0104', '2018-09-05', NULL, NULL, 0.00, 13455.00, NULL, NULL, NULL),
(55, 105, 2, '#0105', '2018-09-12', NULL, NULL, 0.00, 28080.00, NULL, NULL, NULL),
(56, 106, 4, '#0106', '2018-10-08', NULL, NULL, 0.00, 113490.00, NULL, NULL, NULL),
(57, 107, 2, '#0107', '2018-10-10', NULL, NULL, 0.00, 3042.00, NULL, NULL, NULL),
(58, 108, 16, '#0108', '2018-10-16', NULL, NULL, 0.00, 118063.53, NULL, NULL, NULL),
(59, 109, 6, '#0109', '2018-10-16', NULL, NULL, 0.00, 5265.00, NULL, NULL, NULL),
(60, 110, 8, '#0110', '2018-10-24', NULL, NULL, 0.00, 130377.78, NULL, NULL, NULL),
(61, 115, 2, '#0115', '2018-11-05', NULL, NULL, 0.00, 56160.00, NULL, NULL, NULL),
(62, 116, 2, '#0116', '2018-11-05', NULL, NULL, 0.00, 58523.40, NULL, NULL, NULL),
(63, 117, 2, '#0117', '2019-01-28', NULL, NULL, 0.00, 10354.50, NULL, NULL, NULL),
(64, 116, 2, '#0116', '2018-11-27', 58523.40, NULL, 55889.00, 2634.40, NULL, NULL, NULL),
(65, 115, 2, '#0111', '2018-12-18', 56160.00, NULL, 52453.00, 3707.00, NULL, NULL, NULL),
(66, 110, 8, '#0110', '2019-02-11', 130377.78, NULL, 125814.00, 4563.78, NULL, NULL, NULL),
(67, 108, 16, '#0108', '2018-11-12', 118063.53, NULL, 110761.00, 7302.53, NULL, NULL, NULL),
(68, 107, 2, '#0107', '2018-12-06', 3042.00, NULL, 2887.00, 155.00, NULL, NULL, NULL),
(69, 106, 4, '#0106', '2019-01-28', 113490.00, NULL, 108383.00, 5107.00, NULL, NULL, NULL),
(70, 105, 2, '#0105', '2019-01-26', 28080.00, NULL, 26816.00, 1264.00, NULL, NULL, NULL),
(71, 104, 2, '#0104', '2018-12-28', 13455.00, NULL, 12849.00, 606.00, NULL, NULL, NULL),
(72, 103, 2, '#0103', '2019-03-12', 20919.60, NULL, 19978.00, 941.60, NULL, NULL, NULL),
(73, 102, 4, '#0102', '2019-01-28', 7488.00, NULL, 7151.00, 337.00, NULL, NULL, NULL),
(74, 101, 4, '#0101', '2019-01-28', 7488.00, NULL, 7151.00, 337.00, NULL, NULL, NULL),
(75, 100, 4, '#0100', '2019-01-28', 40365.00, NULL, 38549.00, 1816.00, NULL, NULL, NULL),
(76, 99, 7, '#099', '2019-03-27', 97765.20, NULL, 91164.00, 6601.20, NULL, NULL, NULL),
(77, 97, 2, '#097', '2018-09-08', 49140.00, NULL, 46928.00, 2212.00, NULL, NULL, NULL),
(78, 96, 2, '#096', '2019-04-18', 15912.00, NULL, 15195.00, 717.00, NULL, NULL, NULL),
(79, 94, 7, '#094', '2018-10-05', 5850.00, NULL, 5455.00, 395.00, NULL, NULL, NULL),
(80, 93, 8, '#093', '2018-10-10', 1755.00, NULL, 1676.00, 79.00, NULL, NULL, NULL),
(81, 92, 8, '#092', '2018-06-28', 316953.00, NULL, 301907.00, 15046.00, NULL, NULL, NULL),
(82, 90, 5, '#090', '2018-08-09', 9360.00, NULL, 8939.00, 421.00, NULL, NULL, NULL),
(83, 88, 14, '#088', '2018-09-05', 100620.00, NULL, 96092.00, 4528.00, NULL, NULL, NULL),
(84, 87, 7, '#087', '2018-10-24', 239733.00, NULL, 221978.00, 17755.00, NULL, NULL, NULL),
(85, 86, 7, '#086', '2018-06-26', 63629.28, NULL, 59333.00, 4296.28, NULL, NULL, NULL),
(86, 85, 13, '#085', '2018-07-02', 85263.75, NULL, 78949.00, 6314.75, NULL, NULL, NULL),
(87, 80, 8, '#080', '2018-10-10', 162864.00, NULL, 155535.00, 7329.00, NULL, NULL, NULL),
(88, 75, 11, '#075', '2018-10-10', 19500.00, NULL, 18622.00, 878.00, NULL, NULL, NULL),
(89, 72, 13, '#072', '2018-07-02', 11232.00, NULL, 10401.00, 831.00, NULL, NULL, NULL),
(90, 66, 4, '#066', '2018-07-24', 42120.00, NULL, 40226.00, 1894.00, NULL, NULL, NULL),
(91, 65, 2, '#065', '2018-07-17', 16146.00, NULL, 15419.00, 727.00, NULL, NULL, NULL),
(92, 63, 16, '#063', '2018-04-30', 195975.00, NULL, 193037.00, 2938.00, NULL, NULL, NULL),
(93, 61, 14, '#061', '2018-06-12', 18164.25, NULL, 16819.00, 1345.25, NULL, NULL, NULL),
(94, 60, 11, '#060', '2019-03-27', 13180.00, NULL, 12451.00, 729.00, NULL, NULL, NULL),
(95, 57, 4, '#057', '2018-05-24', 42120.00, NULL, 40225.00, 1895.00, NULL, NULL, NULL),
(96, 56, 4, '#056', '2018-05-14', 28080.00, NULL, 26816.00, 1264.00, NULL, NULL, NULL),
(97, 55, 2, '#055', '2018-07-17', 5499.00, NULL, 5251.00, 248.00, NULL, NULL, NULL),
(98, 48, 2, '#048', '2018-06-04', 231660.00, NULL, 221235.00, 10425.00, NULL, NULL, NULL),
(99, 46, 2, '#046', '2019-03-12', 158535.00, NULL, 151400.00, 7135.00, NULL, NULL, NULL),
(100, 43, 11, '#043', '2018-10-10', 21574.00, NULL, 20528.00, 1046.00, NULL, NULL, NULL),
(101, 41, 14, '#041', '2018-04-11', 95186.52, NULL, 88137.00, 7049.52, NULL, NULL, NULL),
(102, 40, 13, '#040', '2018-03-27', 12004.20, NULL, 11115.00, 889.20, NULL, NULL, NULL),
(103, 34, 13, '#034', '2018-04-25', 9360.00, NULL, 8667.00, 693.00, NULL, NULL, NULL),
(104, 27, 4, '#027', '2018-04-26', 40365.00, NULL, 38549.00, 1816.00, NULL, NULL, NULL),
(105, 23, 8, '#023', '2019-02-11', 202410.00, NULL, 193301.00, 9109.00, NULL, NULL, NULL),
(106, 21, 2, '#021', '2019-02-15', 10354.50, NULL, 9888.00, 466.50, NULL, NULL, NULL),
(107, 16, 8, '#016', '2018-07-03', 99918.00, NULL, 92518.00, 7400.00, NULL, NULL, NULL),
(108, 15, 2, '#015', '2018-06-01', 16146.00, NULL, 15419.00, 727.00, NULL, NULL, NULL),
(109, 95, 4, '#095', '2018-07-25', 29484.00, NULL, 28157.00, 1327.00, NULL, NULL, NULL),
(110, 7, 2, '#07', '2018-10-15', 48789.00, NULL, 46593.00, 2196.00, NULL, NULL, NULL),
(111, 8, 5, '#08', '2018-12-08', 1825.20, NULL, 1743.00, 82.20, NULL, NULL, NULL),
(112, 9, 2, '#09', '2018-10-06', 19656.00, NULL, 18771.00, 885.00, NULL, NULL, NULL),
(113, 10, 2, '#010', '2018-06-06', 13455.00, NULL, 12849.00, 606.00, NULL, NULL, NULL),
(114, 24, 10, '#024', '2018-02-27', 21060.00, NULL, 21060.00, 0.00, NULL, NULL, NULL),
(115, 25, 11, '#025', '2018-08-16', 19012.50, NULL, 17606.00, 1406.50, NULL, NULL, NULL),
(116, 35, 11, '#035', '2018-08-16', 17140.50, NULL, 15872.00, 1268.50, NULL, NULL, NULL),
(117, 50, 16, '#050', '2018-04-04', 399192.30, NULL, 369626.00, 29566.30, NULL, NULL, NULL),
(118, 36, 13, '#036', '2018-04-04', 322920.00, NULL, 289005.00, 33915.00, NULL, NULL, NULL),
(119, 42, 14, '#042', '2018-04-11', 91137.32, NULL, 85674.00, 5463.32, NULL, NULL, NULL),
(120, 47, 2, '#047', '2018-04-12', 105300.00, NULL, 100561.00, 4739.00, NULL, NULL, NULL),
(121, 51, 2, '#051', '2018-04-12', 87750.00, NULL, 83801.00, 3949.00, NULL, NULL, NULL),
(122, 53, 2, '#053', '2018-04-12', 98280.00, NULL, 93857.00, 4423.00, NULL, NULL, NULL),
(123, 54, 2, '#054', '2018-04-12', 106470.00, NULL, 101678.00, 4792.00, NULL, NULL, NULL),
(124, 76, 11, '#076', '2018-06-01', 23000.00, NULL, 21965.00, 1035.00, NULL, NULL, NULL),
(125, 38, 11, '#038', '2018-03-28', 24862.50, NULL, 23022.00, 1840.50, NULL, NULL, NULL),
(126, 59, 11, '#059', '2018-05-22', 23600.00, NULL, 22538.00, 1062.00, NULL, NULL, NULL),
(127, 68, 13, '#068', '2018-07-14', 21703.50, NULL, 20095.00, 1608.50, NULL, NULL, NULL),
(128, 67, 13, '#067', '2018-07-14', 24453.00, NULL, 22642.00, 1811.00, NULL, NULL, NULL),
(129, 37, 13, '#037', '2018-07-14', 23540.40, NULL, 21797.00, 1743.40, NULL, NULL, NULL),
(130, 69, 13, '#069', '2018-07-14', 4750.20, NULL, 4398.00, 352.20, NULL, NULL, NULL),
(131, 39, 11, '#039', '2018-04-26', 23224.50, NULL, 23129.00, 95.50, NULL, NULL, NULL),
(132, 73, 2, '#073', '2018-02-01', 40950.00, NULL, 39107.00, 1843.00, NULL, NULL, NULL),
(133, 74, 2, '#074', '2018-08-02', 115198.20, NULL, 110014.00, 5184.20, NULL, NULL, NULL),
(134, 84, 2, '#084', '2018-08-02', 60255.00, NULL, 57543.00, 2712.00, NULL, NULL, NULL),
(135, 89, 2, '#089', '2018-08-02', 55575.00, NULL, 53074.00, 2501.00, NULL, NULL, NULL),
(136, 91, 2, '#091', '2018-08-02', 22230.00, NULL, 21229.00, 1001.00, NULL, NULL, NULL),
(137, 33, 13, '#033', '2018-11-19', 10530.00, NULL, 9750.00, 780.00, NULL, NULL, NULL),
(138, 98, 17, '#098', '2018-12-12', 80999.10, NULL, 66901.00, 14098.10, NULL, NULL, NULL),
(139, 14, 2, '#014', '2018-12-18', 19000.00, NULL, 17197.00, 1803.00, NULL, NULL, NULL),
(140, 71, 2, '#071', '2019-01-01', 70668.00, NULL, 67487.00, 3181.00, NULL, NULL, NULL),
(141, 26, 12, '#026', '2018-02-21', 24885.90, NULL, 23042.00, 1843.90, NULL, NULL, NULL),
(142, 28, 4, '#028', '2018-03-06', 50544.00, NULL, 48270.00, 2274.00, NULL, NULL, NULL),
(143, 30, 9, '#030', '2018-01-26', 49825.00, NULL, 47085.00, 2740.00, NULL, NULL, NULL),
(144, 31, 8, '#031', '2018-03-09', 3978.00, NULL, 3741.00, 237.00, NULL, NULL, NULL),
(145, 32, 2, '#032', '2018-02-12', 42120.00, NULL, 40224.00, 1896.00, NULL, NULL, NULL),
(146, 44, 11, '#044', '2018-03-19', 24862.50, NULL, 23022.00, 1840.50, NULL, NULL, NULL),
(147, 70, 2, '#070', '2018-03-29', 11115.00, NULL, 11115.00, 0.00, NULL, NULL, NULL),
(148, 77, 9, '#077', '2018-05-07', 98000.37, NULL, 92518.00, 5482.37, NULL, NULL, NULL),
(149, 78, 13, '#078', '2018-06-14', 17550.00, NULL, 16819.00, 731.00, NULL, NULL, NULL),
(150, 64, 16, '#064', '2018-08-17', 9636.12, NULL, 8939.00, 697.12, NULL, NULL, NULL),
(151, 62, 18, '#062', '2018-04-03', 25000.00, NULL, 23875.00, 1125.00, NULL, NULL, NULL),
(152, 52, 9, '#052', '2018-04-17', 47502.00, NULL, 43474.00, 4028.00, NULL, NULL, NULL),
(153, 49, 9, '#049', '2018-03-26', 99300.24, NULL, 90153.00, 9147.24, NULL, NULL, NULL),
(154, 11, 4, '#011', '2019-01-28', 7488.00, NULL, 7151.00, 337.00, NULL, NULL, NULL),
(155, 29, 4, '#029', '2019-01-28', 7488.00, NULL, 7151.00, 337.00, NULL, NULL, NULL),
(156, 118, 4, '#0118', '2019-01-28', NULL, NULL, 119556.00, 5634.00, NULL, NULL, NULL),
(157, 119, 2, '#0119', '2019-01-28', NULL, NULL, 0.00, 13455.00, NULL, NULL, NULL),
(158, 120, 2, '#0120', '2019-01-29', NULL, NULL, 6704.00, 316.00, NULL, NULL, NULL),
(159, 121, 19, '#0121', '2019-01-29', NULL, NULL, 15790.00, 2532.20, NULL, NULL, NULL),
(160, 122, 2, '#0122', '2019-02-06', NULL, NULL, 26816.00, 1264.00, NULL, NULL, NULL),
(161, 123, 3, '#0123', '2019-02-09', NULL, NULL, 536663.00, 25288.00, NULL, NULL, NULL),
(162, 124, 5, '#0124', '2019-01-08', NULL, NULL, 83801.00, 3949.00, NULL, NULL, NULL),
(163, 125, 3, '#0125', '2019-01-08', NULL, NULL, 478449.00, 22545.00, NULL, NULL, NULL),
(164, 126, 2, '#0126', '2019-01-17', NULL, NULL, 79610.00, 3752.50, NULL, NULL, NULL),
(165, 127, 2, '#0127', '2018-11-11', NULL, NULL, 53632.00, 2528.00, NULL, NULL, NULL),
(166, 128, 11, '#0128', '2018-11-13', NULL, NULL, 15280.00, 720.00, NULL, NULL, NULL),
(167, 129, 4, '#0129', '2018-11-14', NULL, NULL, 154976.00, 7303.00, NULL, NULL, NULL),
(168, 130, 2, '#0130', '2018-11-14', NULL, NULL, 23010.00, 1086.15, NULL, NULL, NULL),
(169, 131, 4, '#0131', '2018-11-26', NULL, NULL, 129613.00, 6107.00, NULL, NULL, NULL),
(170, 132, 2, '#0132', '2018-11-26', NULL, NULL, 300678.00, 14169.00, NULL, NULL, NULL),
(171, 133, 2, '#0133', '2018-11-26', NULL, NULL, 24708.00, 1164.21, NULL, NULL, NULL),
(172, 134, 2, '#0134', '2018-11-26', NULL, NULL, 8939.00, 421.00, NULL, NULL, NULL),
(173, 137, 3, '#0137', '2018-12-06', NULL, NULL, 353780.00, 16670.00, NULL, NULL, NULL),
(174, 138, 21, '#0138', '2018-12-10', NULL, NULL, 3209.00, 354.82, NULL, NULL, NULL),
(175, 139, 2, '#0139', '2018-12-10', NULL, NULL, 60057.00, 2830.50, NULL, NULL, NULL),
(176, 140, 2, '#0140', '2018-12-10', NULL, NULL, 33240.00, 1567.50, NULL, NULL, NULL),
(177, 141, 2, '#0141', '2018-12-12', NULL, NULL, 5866.00, 276.50, NULL, NULL, NULL),
(178, 142, 22, '#0142', '2018-12-13', NULL, NULL, 4621.00, 0.50, NULL, NULL, NULL),
(179, 143, 17, '#0143', '2018-12-18', NULL, NULL, 17334.00, 1386.00, NULL, NULL, NULL),
(180, 146, 13, '#0146', '2018-12-19', NULL, NULL, 98708.00, 9326.29, NULL, NULL, NULL),
(181, 147, 8, '#0147', '2018-12-19', NULL, NULL, 35751.00, 2859.00, NULL, NULL, NULL),
(182, 148, 17, '#0148', '2019-01-15', NULL, NULL, 12132.00, 0.90, NULL, NULL, NULL),
(183, 150, 4, '#0150', '2019-02-12', NULL, NULL, 41901.00, 1974.00, NULL, NULL, NULL),
(184, 151, 2, '#0151', '2019-02-19', NULL, NULL, 83362.50, 0.00, NULL, NULL, NULL),
(185, 152, 4, '#0152', '2019-02-21', NULL, NULL, 7206.00, 340.50, NULL, NULL, NULL),
(186, 155, 4, '#0155', '2019-02-26', NULL, NULL, 127283.00, 5998.72, NULL, NULL, NULL),
(187, 157, 2, '#0157', '2019-03-05', NULL, NULL, 140400.00, 0.00, NULL, NULL, NULL),
(188, 158, 2, '#0158', '2019-03-05', NULL, NULL, 36738.00, 0.00, NULL, NULL, NULL),
(189, 159, 2, '#0159', '2019-03-05', NULL, NULL, 121095.00, 0.00, NULL, NULL, NULL),
(190, 160, 19, '#0160', '2019-03-15', NULL, NULL, 0.00, 72540.00, NULL, NULL, NULL),
(191, 161, 23, '#0161', '2019-03-06', NULL, NULL, 34632.00, 0.00, NULL, NULL, NULL),
(192, 162, 3, '#0162', '2019-03-11', NULL, NULL, 479705.00, 0.00, NULL, NULL, NULL),
(193, 163, 4, '#0163', '2019-03-13', NULL, NULL, 5922.00, 279.00, NULL, NULL, NULL),
(194, 164, 4, '#0164', '2019-03-13', NULL, NULL, 15643.00, 737.00, NULL, NULL, NULL),
(195, 165, 4, '#0165', '2019-03-13', NULL, NULL, 34638.00, 1632.00, NULL, NULL, NULL),
(196, 166, 24, '#0166', '2019-04-29', NULL, NULL, 200000.97, 0.00, NULL, NULL, NULL),
(197, 167, 4, '#0167', '2019-03-21', NULL, NULL, 83801.00, 3949.00, NULL, NULL, NULL),
(198, 168, 4, '#0168', '2019-03-21', NULL, NULL, 111969.00, 0.00, NULL, NULL, NULL),
(199, 169, 4, '#0169', '2019-03-21', NULL, NULL, 77935.00, 3672.50, NULL, NULL, NULL),
(200, 170, 3, '#0170', '2019-04-03', NULL, NULL, 373673.00, 9917.00, NULL, NULL, NULL),
(201, 171, 23, '#0171', '2019-04-04', NULL, NULL, 11162.00, 526.30, NULL, NULL, NULL),
(202, 172, 25, '#0172', '2019-04-23', NULL, NULL, 71955.00, 0.00, NULL, NULL, NULL),
(203, 174, 4, '#0174', '2019-04-25', NULL, NULL, 22626.00, 1066.50, NULL, NULL, NULL),
(204, 175, 4, '#0175', '2019-04-29', NULL, NULL, 245594.00, 11572.00, NULL, NULL, NULL),
(205, 176, 3, '#0176', '2019-05-06', NULL, NULL, 338528.00, 15952.00, NULL, NULL, NULL),
(206, 1, 26, '#01', '2021-01-05', NULL, NULL, 4022.00, 38098.00, NULL, NULL, NULL),
(207, 2, 26, '#02', '2021-01-05', NULL, NULL, 40224.00, 1896.00, NULL, NULL, NULL),
(208, 408, 4, '#0408', '0202-01-06', NULL, NULL, 0.00, 142294.52, NULL, NULL, NULL),
(209, 409, 3, '#0409', '2021-06-01', NULL, NULL, 266637.91, 0.00, NULL, NULL, NULL),
(210, 410, 26, '#0410', '2021-01-08', NULL, NULL, 168552.24, 0.00, NULL, NULL, NULL),
(211, 411, 23, '#0411', '2021-01-11', NULL, NULL, 131847.30, 0.00, NULL, NULL, NULL),
(212, 412, 26, '#0412', '2021-01-13', NULL, NULL, 139668.75, 0.00, NULL, NULL, NULL),
(213, 413, 4, '#0413', '2021-01-13', NULL, NULL, 6684.97, 0.00, NULL, NULL, NULL),
(214, 414, 24, '#0414', '2021-01-27', NULL, NULL, 280231.38, 0.00, NULL, NULL, NULL),
(215, 415, 3, '#0415', '2021-02-08', NULL, NULL, 808739.55, 0.00, NULL, NULL, NULL),
(216, 416, 3, '#0416', '2021-02-08', NULL, NULL, 37245.00, 0.00, NULL, NULL, NULL),
(217, 417, 24, '#0417', '2021-02-10', NULL, NULL, 300620.63, 0.00, NULL, NULL, NULL),
(218, 418, 4, '#0418', '2021-02-16', NULL, NULL, 9385.74, 0.00, NULL, NULL, NULL),
(219, 419, 26, '#0419', '2021-02-17', NULL, NULL, 107265.60, 0.00, NULL, NULL, NULL),
(220, 420, 26, '#0420', '2021-02-17', NULL, NULL, 33520.50, 0.00, NULL, NULL, NULL),
(221, 421, 24, '#0421', '2021-02-24', NULL, NULL, 11184.67, 0.00, NULL, NULL, NULL),
(222, 422, 27, '#0422', '2021-03-04', NULL, NULL, 7151.04, 0.00, NULL, NULL, NULL),
(223, 423, 28, '#0423', '2021-03-08', NULL, NULL, 87265.03, 0.00, NULL, NULL, NULL),
(224, 424, 26, '#0424', '2021-03-09', NULL, NULL, 2346.43, 0.00, NULL, NULL, NULL),
(225, 425, 16, '#0425', '2021-03-15', NULL, NULL, 668510.50, 0.00, NULL, NULL, NULL),
(226, 426, 4, '#0426', '2021-03-15', NULL, NULL, 142294.07, 0.00, NULL, NULL, NULL),
(227, 427, 3, '#0427', '2021-03-17', NULL, NULL, 438089.77, 0.00, NULL, NULL, NULL),
(228, 428, 24, '#0428', '2021-03-17', NULL, NULL, 318444.75, 0.00, NULL, NULL, NULL),
(229, 429, 27, '#0429', '2021-03-18', NULL, NULL, 11173.50, 0.00, NULL, NULL, NULL),
(230, 430, 26, '#0430', '2021-03-29', NULL, NULL, 26816.40, 0.00, NULL, NULL, NULL),
(231, 431, 26, '#0431', '2021-03-29', NULL, NULL, 20112.30, 0.00, NULL, NULL, NULL),
(232, 432, 27, '#0432', '2021-03-29', NULL, NULL, 31621.00, 0.00, NULL, NULL, NULL),
(233, 433, 26, '#0433', '2021-04-07', NULL, NULL, 159781.05, 0.00, NULL, NULL, NULL),
(234, 434, 4, '#0434', '2021-04-07', NULL, NULL, 61007.31, 0.00, NULL, NULL, NULL),
(235, 435, 24, '#0435', '2021-04-08', NULL, NULL, 545.26, 0.00, NULL, NULL, NULL),
(236, 436, 3, '#0436', '2021-04-14', NULL, NULL, 764618.31, 0.00, NULL, NULL, NULL),
(237, 2, 26, '#02', '2021-04-07', 1896.00, NULL, 1896.00, 0.00, NULL, NULL, NULL),
(238, 1, 26, '#01', '2021-01-06', 38098.00, NULL, 38098.00, 0.00, NULL, NULL, NULL),
(239, 438, 22, '#0438', '2021-02-03', NULL, NULL, 0.00, 36313.87, NULL, NULL, NULL),
(240, 438, 22, '#0438', '2021-02-03', 36313.87, NULL, 313.00, 36000.87, '1254', NULL, NULL),
(241, 408, 26, '#0408', '2021-01-05', NULL, NULL, 0.00, 40224.60, NULL, NULL, NULL),
(242, 409, 3, '#0409', '2021-01-06', NULL, NULL, 0.00, 266637.91, NULL, NULL, NULL),
(243, 410, 26, '#0410', '2021-01-05', NULL, NULL, 0.00, 199927.43, NULL, NULL, NULL),
(244, 411, 23, '#0411', '2021-01-11', NULL, NULL, 0.00, 64359.36, NULL, NULL, NULL),
(245, 412, 4, '#0412', '2021-01-11', NULL, NULL, 0.00, 142216.30, NULL, NULL, NULL),
(246, 413, 23, '#0413', '2021-01-11', NULL, NULL, 0.00, 131847.30, NULL, NULL, NULL),
(247, 414, 26, '#0414', '2021-01-13', NULL, NULL, 0.00, 139668.75, NULL, NULL, NULL),
(248, 415, 4, '#0415', '2021-01-25', NULL, NULL, 0.00, 6704.10, NULL, NULL, NULL),
(249, 416, 24, '#0416', '2021-01-27', NULL, NULL, 0.00, 280231.38, NULL, NULL, NULL),
(250, 417, 3, '#0417', '2021-02-08', NULL, NULL, 0.00, 837994.35, NULL, NULL, NULL),
(251, 418, 24, '#0418', '2021-02-10', NULL, NULL, 0.00, 351726.50, NULL, NULL, NULL),
(252, 419, 4, '#0419', '2021-02-16', NULL, NULL, 0.00, 9385.74, NULL, NULL, NULL),
(253, 420, 26, '#0420', '2021-02-17', NULL, NULL, 0.00, 107265.60, NULL, NULL, NULL),
(254, 421, 26, '#0421', '2021-02-17', NULL, NULL, 0.00, 33520.50, NULL, NULL, NULL),
(255, 422, 24, '#0422', '2021-02-24', NULL, NULL, 0.00, 11184.67, NULL, NULL, NULL),
(256, 423, 27, '#0423', '2021-03-04', NULL, NULL, 0.00, 7151.04, NULL, NULL, NULL),
(257, 424, 28, '#0424', '2021-03-08', NULL, NULL, 0.00, 79921.08, NULL, NULL, NULL),
(258, 425, 26, '#0425', '2021-03-09', NULL, NULL, 0.00, 2346.43, NULL, NULL, NULL),
(259, 426, 16, '#0426', '2021-03-15', NULL, NULL, 0.00, 668510.50, NULL, NULL, NULL),
(260, 427, 4, '#0427', '2021-03-15', NULL, NULL, 0.00, 142216.30, NULL, NULL, NULL),
(261, 428, 3, '#0428', '2021-03-17', NULL, NULL, 0.00, 438089.77, NULL, NULL, NULL),
(262, 429, 24, '#0429', '2021-03-17', NULL, NULL, 0.00, 318444.75, NULL, NULL, NULL),
(263, 430, 27, '#0430', '2021-03-18', NULL, NULL, 0.00, 11173.50, NULL, NULL, NULL),
(264, 431, 26, '#0431', '2021-03-29', NULL, NULL, 0.00, 26816.40, NULL, NULL, NULL),
(265, 432, 26, '#0432', '2021-03-29', NULL, NULL, 0.00, 20112.30, NULL, NULL, NULL),
(266, 433, 27, '#0433', '2021-03-31', NULL, NULL, 0.00, 31621.00, NULL, NULL, NULL),
(267, 434, 26, '#0434', '2021-04-07', NULL, NULL, 0.00, 159781.05, NULL, NULL, NULL),
(268, 435, 4, '#0435', '2021-04-07', NULL, NULL, 0.00, 61007.31, NULL, NULL, NULL),
(269, 436, 24, '#0436', '2021-04-08', NULL, NULL, 0.00, 545.26, NULL, NULL, NULL),
(270, 437, 3, '#0437', '2021-04-14', NULL, NULL, 0.00, 764618.30, NULL, NULL, NULL),
(271, 438, 4, '#0438', '2021-04-26', NULL, NULL, 0.00, 130623.32, NULL, NULL, NULL),
(272, 408, 26, '#0408', '2021-01-22', 40224.60, NULL, 40224.60, 0.00, '00884853', NULL, NULL),
(273, 409, 3, '#0409', '2021-01-25', 266637.91, NULL, 266637.91, 0.00, 'D-92471740', NULL, NULL),
(274, 410, 26, '#0410', '2021-01-22', 199927.43, NULL, 199927.43, 0.00, '00884829', NULL, NULL),
(275, 412, 4, '#0412', '2121-02-18', 142216.30, NULL, 142216.30, 0.00, '1792416824', NULL, NULL),
(276, 414, 26, '#0414', '2021-02-02', 139668.75, NULL, 139668.75, 0.00, '00884914', NULL, NULL),
(277, 419, 4, '#0419', '2021-03-15', 9385.74, NULL, 9385.74, 0.00, '1795066198', NULL, NULL),
(278, 420, 26, '#0420', '2021-03-06', 107265.60, NULL, 10726.60, 96539.00, '00885360', NULL, NULL),
(279, 421, 26, '#0421', '2021-03-19', 33520.50, NULL, 33520.50, 0.00, '00885480', NULL, NULL),
(280, 424, 28, '#0424', '2021-03-24', 87265.03, NULL, 87265.03, 0.00, 'D-95832974', NULL, NULL),
(281, 411, 23, '#0411', '2021-02-27', 64359.36, NULL, 64359.36, 0.00, 'NA', NULL, NULL),
(282, 413, 23, '#0413', '2021-02-27', 131847.30, NULL, 131847.30, 0.00, 'NA', NULL, NULL),
(283, 416, 24, '#0416', '2021-01-27', 280231.38, NULL, 280231.38, 0.00, 'Cash', NULL, NULL),
(284, 420, 26, '#0420', '2021-03-06', 96539.00, NULL, 96539.00, 0.00, '00885360', NULL, NULL),
(285, 425, 26, '#0425', '2021-03-29', 2346.43, NULL, 2346.43, 0.00, '0034491', NULL, NULL),
(286, 426, 16, '#0426', '2021-04-01', 668510.50, NULL, 668510.50, 0.00, '0000000137', NULL, NULL),
(287, 428, 3, '#0428', '2021-03-29', 438089.77, NULL, 438089.77, 0.00, '00000534', NULL, NULL),
(288, 429, 24, '#0429', '2021-03-17', 318444.75, NULL, 308754.00, 9690.75, 'cash', NULL, NULL),
(289, 436, 24, '#0436', '2021-04-08', 545.26, NULL, 545.26, 0.00, 'NA', NULL, NULL),
(290, 429, 24, '#0429', '2021-03-01', 9690.75, NULL, 9690.75, 0.00, 'NA', NULL, NULL),
(291, 439, 26, '#0439', '2021-04-26', NULL, NULL, 0.00, 7151.04, NULL, NULL, NULL),
(292, 440, 4, '#0440', '2021-05-04', NULL, NULL, 0.00, 11423.78, NULL, NULL, NULL),
(293, 437, 3, '#0437', '2021-04-27', 764618.30, NULL, 764618.30, 0.00, '00000604', NULL, NULL),
(294, 434, 26, '#0434', '2021-04-29', 159781.05, NULL, 159781.00, 0.05, '00885955', NULL, NULL),
(295, 415, 4, '#0415', '2021-05-04', 6704.10, NULL, 6685.00, 19.10, '1795064829', NULL, NULL),
(296, 427, 4, '#0427', '2021-05-04', 142216.30, NULL, 142216.30, 0.00, '1799096386', NULL, NULL),
(297, 441, 30, '#0441', '2021-05-05', NULL, NULL, 0.00, 115999.97, NULL, NULL, NULL),
(298, 442, 7, '#0442', '2021-05-06', NULL, NULL, 0.00, 18145.76, NULL, NULL, NULL),
(299, 443, 7, '#0443', '2021-05-18', NULL, NULL, 0.00, 162239.22, NULL, NULL, NULL),
(300, 449, 22, '#0449', '2021-07-31', NULL, 3762, 3762.00, 0.00, NULL, NULL, NULL),
(301, 450, 2, '#0450', '2021-10-08', NULL, 460, 60.00, 400.00, NULL, NULL, NULL),
(302, 451, 2, '#0451', '2021-10-08', NULL, 5960, 0.00, 5960.00, NULL, NULL, NULL),
(303, 452, 7, '#0452', '2021-10-08', NULL, 35140, 3000.00, 32140.00, NULL, NULL, NULL),
(304, 453, 2, '#0453', '2021-10-08', NULL, 82000, 80000.00, 2000.00, NULL, NULL, NULL),
(305, 454, 2, '#0454', '2021-10-09', NULL, 234, 0.00, 234.00, NULL, NULL, NULL),
(306, 455, 2, '#0455', '2021-10-09', NULL, 5850, 0.00, 5850.00, NULL, NULL, NULL),
(307, 456, 2, '#0456', '2021-10-09', NULL, 58000, 8000.00, 50000.00, NULL, NULL, NULL),
(308, 457, 2, '#0457', '2021-10-09', NULL, 58000, 8000.00, 50000.00, NULL, NULL, NULL),
(309, 458, 12, '#0458', '2021-10-09', NULL, 116000, 6000.00, 110000.00, NULL, NULL, NULL),
(310, 459, 4, '#0459', '2021-10-09', NULL, 58000, 8000.00, 50000.00, NULL, NULL, NULL),
(311, 460, 2, '#0460', '2021-10-09', NULL, 24250, 0.00, 24250.00, NULL, NULL, NULL),
(312, 461, 3, '#0461', '2021-10-20', NULL, 29250, 0.00, 29250.00, NULL, NULL, NULL),
(313, 462, 2, '#0462', '2021-10-09', NULL, 129987, 4566.00, 125421.00, NULL, NULL, NULL),
(314, 463, 7, '#0463', '2021-10-09', NULL, 654440, 0.00, 654440.00, NULL, NULL, NULL),
(315, 464, 20, '#0464', '2021-10-09', NULL, 127147, 0.00, 127147.00, NULL, NULL, NULL),
(316, 465, 3, '#0465', '2021-10-11', NULL, 5148, 0.00, 2340.00, NULL, NULL, NULL),
(317, 466, 11, '#0466', '2021-09-01', NULL, 15795, 0.00, 15795.00, NULL, NULL, NULL),
(318, 446, 22, '#0446', NULL, 17784.00, 0, NULL, NULL, NULL, NULL, NULL),
(319, 445, 18, '#0445', NULL, 2328.30, 0, NULL, NULL, NULL, NULL, NULL),
(320, 450, 2, '#0450', NULL, 400.00, 0, NULL, NULL, NULL, NULL, NULL),
(321, 451, 2, '#0451', NULL, 5960.00, 0, NULL, NULL, NULL, NULL, NULL),
(322, 453, 2, '#0453', NULL, 2000.00, 0, NULL, NULL, NULL, NULL, NULL),
(323, 454, 2, '#0454', NULL, 234.00, 0, NULL, NULL, NULL, NULL, NULL),
(324, 455, 2, '#0455', NULL, 5850.00, 0, NULL, NULL, NULL, NULL, NULL),
(325, 415, 4, '#0415', NULL, 19.10, 0, NULL, NULL, NULL, NULL, NULL),
(326, 1, 2, '#01', '2021-10-15', NULL, 8.1, 2.00, 6.10, NULL, NULL, NULL),
(327, 2, 2, '#02', '2021-10-16', NULL, 40.6, 3.00, 37.60, NULL, NULL, NULL),
(328, 3, 2, '#03', '2021-10-15', NULL, 12.12, 12.00, 0.12, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `inventoryid` bigint(20) UNSIGNED NOT NULL,
  `supplierid` int(11) DEFAULT NULL,
  `warehouseid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `batchnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unitprice` double(20,2) DEFAULT NULL,
  `quantity` double(8,2) DEFAULT NULL,
  `totalprice` double(20,2) DEFAULT NULL,
  `saleprice` double(20,2) DEFAULT NULL,
  `catalognumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serialnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchasedate` date DEFAULT NULL,
  `manufactureddate` date DEFAULT NULL,
  `expirydate` date DEFAULT NULL,
  `billnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`inventoryid`, `supplierid`, `warehouseid`, `categoryid`, `itemid`, `batchnumber`, `unitprice`, `quantity`, `totalprice`, `saleprice`, `catalognumber`, `serialnumber`, `purchasedate`, `manufactureddate`, `expirydate`, `billnumber`, `purchase_order_id`, `created_at`, `updated_at`) VALUES
(1, 17, 1, 1, 1, '33F69331', 1000.00, 5.00, 8000.00, 14000.00, NULL, NULL, '2021-10-17', '2021-10-15', '2021-10-28', NULL, NULL, NULL, NULL),
(3, 17, 1, 1, 1, '43807331', 1000.00, 7000.00, 7000000.00, 80000000.00, NULL, NULL, '2021-10-15', '2021-10-15', '2021-10-29', NULL, NULL, NULL, NULL),
(4, 26, 1, 5, 4, 'D1471F2C', 6666.00, 70000.00, 466620000.00, 80000000000.00, NULL, NULL, '2021-10-22', '2021-10-01', '2021-10-31', NULL, NULL, NULL, NULL),
(5, 26, 1, 4, 3, '33FC8C31', 666.00, 88.00, 58608.00, 90000000.00, NULL, NULL, '2021-10-15', '2021-10-15', '2021-10-31', NULL, NULL, NULL, NULL),
(6, 3, 1, 1, 1, '33F69331', 44.00, 0.00, 88.00, 7000.00, NULL, NULL, '2021-10-15', '2021-10-15', '2021-10-21', '555', 1, NULL, NULL),
(7, 3, 1, 3, 2, '43807331', 555.00, 3.00, 2775.00, 50000.00, NULL, NULL, '2021-10-15', '2021-10-15', '2021-10-31', '555', 1, NULL, NULL),
(8, 3, 1, 4, 3, 'D1471F2C', 555.00, 5.00, 2775.00, 6000.00, NULL, NULL, '2021-10-15', '2021-10-15', '2021-10-31', '555', 1, NULL, NULL),
(9, 3, 1, 5, 4, '33FC8C31', 6666.00, 6.00, 39996.00, 20000.00, NULL, NULL, '2021-10-15', '2021-10-15', '2021-10-31', '555', 1, NULL, NULL),
(10, 17, 1, 1, 1, '33F69331', 1000.00, 3.00, 3000.00, 14000.00, NULL, NULL, '2021-11-01', '2021-09-02', '2021-11-11', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoicechildren`
--

CREATE TABLE `invoicechildren` (
  `ichildid` bigint(20) UNSIGNED NOT NULL,
  `imasterid` int(11) DEFAULT NULL,
  `warehouseid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `unitprice` double(8,2) DEFAULT NULL,
  `quantity` double(8,2) DEFAULT NULL,
  `totalprice` double(8,2) DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `aftertax` double(8,2) DEFAULT NULL,
  `discount` double(30,3) DEFAULT NULL,
  `afterDiscount` double(30,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoicechildren`
--

INSERT INTO `invoicechildren` (`ichildid`, `imasterid`, `warehouseid`, `categoryid`, `itemid`, `unitprice`, `quantity`, `totalprice`, `tax`, `aftertax`, `discount`, `afterDiscount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 2, 5.00, 2.00, 10.00, 1.00, 10.10, 2.000, 8.100, NULL, NULL),
(2, 2, 1, 1, 1, 20.00, 2.00, 40.00, 4.00, 41.60, 1.000, 40.600, NULL, NULL),
(3, 3, 1, 1, 1, 4.00, 3.00, 12.00, 1.00, 12.12, 0.000, 12.120, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoicemasters`
--

CREATE TABLE `invoicemasters` (
  `imasterid` bigint(20) UNSIGNED NOT NULL,
  `warehouseid` int(11) DEFAULT NULL,
  `invoicennumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qmasterid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dcparentid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ponumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `customerntnno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customergstno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoicedate` date DEFAULT NULL,
  `totalbeforetax` double(30,3) DEFAULT NULL,
  `gsttaxamount` double(30,3) DEFAULT NULL,
  `incometaxamount` double(30,3) DEFAULT NULL,
  `saletaxgovernmentamount` double(30,3) DEFAULT NULL,
  `totalaftertax` double(30,3) DEFAULT NULL,
  `totalafterdiscount` double(30,3) DEFAULT NULL,
  `nettotal` double(30,3) DEFAULT NULL,
  `paid` double(30,3) DEFAULT NULL,
  `remaining` double(30,3) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoicemasters`
--

INSERT INTO `invoicemasters` (`imasterid`, `warehouseid`, `invoicennumber`, `qmasterid`, `dcparentid`, `ponumber`, `customerid`, `customerntnno`, `customergstno`, `invoicedate`, `totalbeforetax`, `gsttaxamount`, `incometaxamount`, `saletaxgovernmentamount`, `totalaftertax`, `totalafterdiscount`, `nettotal`, `paid`, `remaining`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '#01', NULL, '1', NULL, 2, NULL, NULL, '2021-10-15', 10.000, 0.000, 0.000, 0.000, 10.100, 8.100, 8.100, 2.000, 6.100, 'open', NULL, NULL),
(2, 1, '#02', NULL, '3', NULL, 2, NULL, NULL, '2021-10-16', 40.000, 0.000, 0.000, 0.000, 41.600, 40.600, 40.600, 3.000, 37.600, 'open', NULL, NULL),
(3, 1, '#03', NULL, '4', NULL, 2, NULL, NULL, '2021-10-15', 12.000, 0.000, 0.000, 0.000, 12.120, 12.120, 12.120, 12.000, 0.120, 'open', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemid` bigint(20) UNSIGNED NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `itemname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `minimumlevel` int(11) DEFAULT NULL,
  `unitid` int(11) DEFAULT NULL,
  `subUnit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catalognumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batchnumber` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemid`, `categoryid`, `itemname`, `minimumlevel`, `unitid`, `subUnit`, `created_at`, `updated_at`, `make`, `catalognumber`, `discription`, `certification`, `batchnumber`) VALUES
(1, 1, 'choloplast', 1, 2, 500, '2021-10-14 01:30:47', '2021-10-14 01:30:47', 'merc', '123d', 'na', '2010', 'D1471F2C'),
(2, 3, 'chemicals', 1, 3, 5, '2021-10-14 01:32:01', '2021-10-14 01:32:01', 'iso', '456d', 'na', '2000', ''),
(3, 4, 'tea', 1, 2, 5, '2021-10-14 01:34:00', '2021-10-14 01:34:00', 'kocept', '4567', 'na', '2000', ''),
(4, 5, 'green tea', 1, 16, 3, '2021-10-14 01:35:35', '2021-10-14 01:35:35', 'yahoo', '123456g', 'na', '2222', '');

-- --------------------------------------------------------

--
-- Table structure for table `macounts`
--

CREATE TABLE `macounts` (
  `a_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `account_group_id` int(11) DEFAULT NULL,
  `account_sub_group_id` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `macounts`
--

INSERT INTO `macounts` (`a_id`, `name`, `description`, `code`, `date`, `account_group_id`, `account_sub_group_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bricks', 'abc', 'na', NULL, 6, 15, 1, NULL, NULL),
(2, 'steel', 'abc', 'NA', NULL, 6, 15, 1, NULL, NULL),
(3, 'Cement', 'abc', 'NA', NULL, 6, 15, 1, NULL, NULL),
(4, 'Crush', 'abs', 'NA', NULL, 6, 15, 1, NULL, NULL),
(5, 'Sand', 'abc', 'NA', NULL, 6, 15, 1, NULL, NULL),
(6, 'Block', 'abc', NULL, NULL, 6, 15, 1, NULL, NULL),
(7, 'Salary Expence', 'abc', 'NA', NULL, 5, 17, 1, NULL, NULL),
(8, 'Farm work', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(9, 'Mason', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(10, 'Bricks Work', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(11, 'Plaster work', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(12, 'Electrician', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(13, 'Shuttering', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(14, 'Steel Fixer', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(15, 'Chowkedar', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(16, 'Excavation', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(17, 'poring', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(18, 'Plumber', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(19, 'MIsc Labour', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(20, 'Site ENgineer', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(21, 'Utility bills', 'abc', 'NA', NULL, 5, 12, 1, NULL, NULL),
(22, 'Misc Expense', 'abc', 'NA', NULL, 5, 12, 1, NULL, NULL),
(23, 'Services', 'abc', 'NA', NULL, 5, 12, 1, NULL, NULL),
(24, 'Falls Ceiling', 'abc', 'NA', NULL, 6, 16, 1, NULL, NULL),
(25, 'TIle fxer', 'abc', 'na', NULL, 6, 16, 1, NULL, NULL),
(26, 'cash', 'Cash in Hand', 'NA', NULL, 1, 1, 1, NULL, NULL),
(27, 'Test', 'Test For ENtry', NULL, '2021-06-16', 1, 1, NULL, NULL, NULL),
(28, 'Abc', 'Abc', NULL, '2021-06-16', 1, 1, NULL, NULL, NULL),
(29, 'Checked', 'Checked', '1', NULL, 1, 1, NULL, NULL, NULL),
(30, 'Muhammad Junaid', 'MBBS (pak) ,MCPS(isb),RMP Expertise in subfertility treatment and other gynaecological issue  obstetrician', 'NA', NULL, 6, 14, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_03_12_060408_add_customerntn_to_invoicemasters_table', 1),
(2, '2021_03_30_055058_create_dc_parents_table', 2),
(3, '2021_03_30_055136_create_dc_children_table', 3),
(6, '2021_02_24_050505_create_stocktransactions_table', 4),
(7, '2021_02_22_073654_create_invoicemasters_table', 5),
(8, '2021_02_22_074029_create_invoicechildren_table', 6),
(12, '2021_04_10_061044_create_invoicemasters_table', 7),
(13, '2021_04_10_125521_add_discription_to_items_table', 8),
(14, '2021_03_22_063350_create_purchase_orders_table', 9),
(15, '2021_03_22_100844_create_purchase_order_children_table', 10),
(16, '2021_03_24_123739_create_supplier_legders_table', 11),
(17, '2021_06_09_093224_create_macounts_table', 12),
(18, '2021_06_09_094047_create_account_group_table', 13),
(19, '2021_06_09_102040_create_account_sub_group_table', 14),
(20, '2021_06_11_091423_create_gl_account_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `purchase_order_id` bigint(20) UNSIGNED NOT NULL,
  `po_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `potype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplierid` int(11) DEFAULT NULL,
  `purchase_order_date` date DEFAULT NULL,
  `totalbill` double(30,2) DEFAULT NULL,
  `current_payment` double(30,2) DEFAULT NULL,
  `remaining` double(30,2) DEFAULT NULL,
  `billnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postatus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `refrence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`purchase_order_id`, `po_number`, `potype`, `supplierid`, `purchase_order_date`, `totalbill`, `current_payment`, `remaining`, `billnumber`, `postatus`, `payment_type`, `discription`, `created_at`, `updated_at`, `refrence`) VALUES
(1, 'PO-1', NULL, 3, '2021-10-15', 45634.00, 0.00, 45634.00, '555', 'recieved', 'Cash', 'na', NULL, NULL, '34');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order_children`
--

CREATE TABLE `purchase_order_children` (
  `purchase_oredr_child_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `po_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategoryid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `unit_price` double(30,2) DEFAULT NULL,
  `quantity` double(30,2) DEFAULT NULL,
  `total` double(30,2) DEFAULT NULL,
  `sale_price` double(30,2) DEFAULT NULL,
  `batchnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufactureddate` date DEFAULT NULL,
  `expirydate` date DEFAULT NULL,
  `serialnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_order_children`
--

INSERT INTO `purchase_order_children` (`purchase_oredr_child_id`, `purchase_order_id`, `po_number`, `categoryid`, `subcategoryid`, `itemid`, `unit_price`, `quantity`, `total`, `sale_price`, `batchnumber`, `manufactureddate`, `expirydate`, `serialnumber`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, NULL, 1, 44.00, 2.00, 88.00, 7000.00, '33F69331', '2021-10-15', '2021-10-21', NULL, NULL, NULL),
(2, 1, NULL, 3, NULL, 2, 555.00, 5.00, 2775.00, 50000.00, '43807331', '2021-10-15', '2021-10-31', NULL, NULL, NULL),
(3, 1, NULL, 4, NULL, 3, 555.00, 5.00, 2775.00, 6000.00, 'D1471F2C', '2021-10-15', '2021-10-31', NULL, NULL, NULL),
(4, 1, NULL, 5, NULL, 4, 6666.00, 6.00, 39996.00, 20000.00, '33FC8C31', '2021-10-15', '2021-10-31', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotationchildren`
--

CREATE TABLE `quotationchildren` (
  `qchildid` bigint(20) UNSIGNED NOT NULL,
  `qmasterid` int(11) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `unitprice` double(8,2) DEFAULT NULL,
  `quantity` double(8,2) DEFAULT NULL,
  `totalprice` double(8,2) DEFAULT NULL,
  `tax` double(8,2) DEFAULT NULL,
  `aftertax` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotationmasters`
--

CREATE TABLE `quotationmasters` (
  `qmasterid` bigint(20) UNSIGNED NOT NULL,
  `warehouseid` int(11) DEFAULT NULL,
  `quotationnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pricevalidity` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentterm` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deliver` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `quotationdate` date DEFAULT NULL,
  `totalwithouttax` double(8,2) DEFAULT NULL,
  `discount` double(8,2) DEFAULT NULL,
  `afterdiscount` double(8,2) DEFAULT NULL,
  `taxamount` double(8,2) DEFAULT NULL,
  `totalaftertax` double(8,2) DEFAULT NULL,
  `nettotal` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocktransactions`
--

CREATE TABLE `stocktransactions` (
  `transactionid` bigint(20) UNSIGNED NOT NULL,
  `supplierid` int(11) DEFAULT NULL,
  `inventoryid` int(11) DEFAULT NULL,
  `warehouseid` int(11) DEFAULT NULL,
  `dcnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `itemid` int(11) DEFAULT NULL,
  `batchnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stockinquantity` int(11) DEFAULT NULL,
  `unitprice` decimal(30,3) DEFAULT NULL,
  `saleprice` decimal(30,3) DEFAULT NULL,
  `totalprice` decimal(30,2) DEFAULT NULL,
  `sotckindate` date DEFAULT NULL,
  `customerid` int(11) DEFAULT NULL,
  `invoiceid` int(11) DEFAULT NULL,
  `invoicenumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stockoutquantity` int(11) DEFAULT NULL,
  `stockoutdate` date DEFAULT NULL,
  `billnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocktransactions`
--

INSERT INTO `stocktransactions` (`transactionid`, `supplierid`, `inventoryid`, `warehouseid`, `dcnumber`, `categoryid`, `itemid`, `batchnumber`, `stockinquantity`, `unitprice`, `saleprice`, `totalprice`, `sotckindate`, `customerid`, `invoiceid`, `invoicenumber`, `stockoutquantity`, `stockoutdate`, `billnumber`, `purchase_order_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 29, 1, NULL, 2, 146, NULL, 6, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 30, 1, NULL, 2, 146, NULL, 6, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 31, 1, NULL, 2, 146, NULL, 6, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 32, 1, NULL, 2, 146, NULL, 6, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, 33, 1, NULL, 7, 99, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, 34, 1, NULL, 7, 72, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 35, 1, NULL, 7, 71, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, 36, 1, NULL, 7, 103, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 37, 1, NULL, 7, 74, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 38, 1, NULL, 7, 68, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, 39, 1, NULL, 7, 78, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 40, 1, NULL, 7, 89, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, 41, 1, NULL, 7, 90, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 42, 1, NULL, 7, 91, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 43, 1, NULL, 8, 124, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 44, 1, NULL, 7, 101, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 45, 1, NULL, 2, 514, NULL, 12, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 46, 1, NULL, 2, 515, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 47, 1, NULL, 2, 516, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 48, 1, NULL, 2, 146, NULL, 8, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, 49, 1, NULL, 2, 517, NULL, 8, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, 50, 1, NULL, 2, 518, NULL, 3, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, 51, 1, NULL, 2, 5, NULL, 80, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, 52, 1, NULL, 3, 56, NULL, 5, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, 53, 1, NULL, 2, 22, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, 54, 1, NULL, 3, 469, NULL, 8000, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, 55, 1, NULL, 7, 99, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, 56, 1, NULL, 7, 112, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, 57, 1, NULL, 7, 72, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, 58, 1, NULL, 7, 71, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, 59, 1, NULL, 7, 103, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, 60, 1, NULL, 7, 74, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, 61, 1, NULL, 7, 70, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, 62, 1, NULL, 7, 68, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, 63, 1, NULL, 7, 92, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, 64, 1, NULL, 7, 73, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, 65, 1, NULL, 7, 78, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, 66, 1, NULL, 7, 89, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, 67, 1, NULL, 7, 90, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, 68, 1, NULL, 7, 91, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, 69, 1, NULL, 8, NULL, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, 70, 1, NULL, 7, 101, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, 71, 1, NULL, 7, 77, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, 72, 1, NULL, 7, 83, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, NULL, 73, 1, NULL, 7, 67, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, NULL, 74, 1, NULL, 7, 163, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, NULL, 75, 1, NULL, 7, 79, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, NULL, 76, 1, NULL, 7, 470, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, NULL, 77, 1, NULL, 7, 471, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, NULL, 78, 1, NULL, 6, 472, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, NULL, 79, 1, NULL, 3, 52, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, NULL, 80, 1, NULL, 3, 281, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, NULL, 81, 1, NULL, 2, 146, NULL, 5, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, NULL, 82, 1, NULL, 10, 389, NULL, 2500, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, NULL, 83, 1, NULL, 10, 473, NULL, 3000, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, NULL, 84, 1, NULL, 3, 481, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, NULL, 85, 1, NULL, 2, 474, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, NULL, 86, 1, NULL, 2, 514, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, NULL, 87, 1, NULL, 2, 8, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, NULL, 88, 1, NULL, 2, 475, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, NULL, 89, 1, NULL, 2, 15, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, NULL, 90, 1, NULL, 4, 519, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, NULL, 91, 1, NULL, 4, 520, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, NULL, 92, 1, NULL, 13, 311, NULL, 10, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, NULL, 93, 1, NULL, 5, 478, NULL, 2000, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, NULL, 94, 1, NULL, 2, 5, NULL, 80, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, NULL, 95, 1, NULL, 3, 480, NULL, 500, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, NULL, 96, 1, NULL, 3, 481, NULL, 200, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, NULL, 97, 1, NULL, 2, 133, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, NULL, 98, 1, NULL, 2, 146, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, NULL, 99, 1, NULL, 2, 146, NULL, 3, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, 100, 1, NULL, 3, 469, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, NULL, 101, 1, NULL, 3, 482, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(74, NULL, 102, 1, NULL, 3, 483, NULL, 5, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, NULL, 103, 1, NULL, 2, 42, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, NULL, 104, 1, NULL, 3, 480, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, NULL, 105, 1, NULL, 3, 482, NULL, 5, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, NULL, 106, 1, NULL, 3, 482, NULL, 10, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(79, NULL, 107, 1, NULL, 7, 99, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, NULL, 108, 1, NULL, 7, 77, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, NULL, 109, 1, NULL, 7, 112, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, NULL, 110, 1, NULL, 7, 72, NULL, 3, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, NULL, 111, 1, NULL, 7, 71, NULL, 3, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, NULL, 112, 1, NULL, 7, 83, NULL, 3, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, NULL, 113, 1, NULL, 7, 74, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, NULL, 114, 1, NULL, 7, 103, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, NULL, 115, 1, NULL, 7, 70, NULL, 3, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, NULL, 116, 1, NULL, 7, 68, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, NULL, 117, 1, NULL, 7, 67, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, NULL, 118, 1, NULL, 7, 161, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(91, NULL, 119, 1, NULL, 7, 79, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, NULL, 120, 1, NULL, 7, 92, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(93, NULL, 121, 1, NULL, 7, 73, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(94, NULL, 122, 1, NULL, 7, 89, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, NULL, 123, 1, NULL, 7, 90, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(96, NULL, 124, 1, NULL, 7, 91, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(97, NULL, 125, 1, NULL, 8, 124, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, NULL, 126, 1, NULL, 7, 101, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, NULL, 127, 1, NULL, 7, 479, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, NULL, NULL, 1, 'dc#34', 2, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2021-01-05', NULL, NULL, NULL, NULL),
(101, NULL, NULL, 1, 'dc#1', 2, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, '2021-01-05', NULL, NULL, NULL, NULL),
(102, NULL, NULL, 1, 'dc#2', 7, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(103, NULL, NULL, 1, 'dc#2', 7, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(104, NULL, NULL, 1, 'dc#2', 7, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(105, NULL, NULL, 1, 'dc#2', 7, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(106, NULL, NULL, 1, 'dc#2', 7, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(107, NULL, NULL, 1, 'dc#2', 7, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(108, NULL, NULL, 1, 'dc#2', 7, 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(109, NULL, NULL, 1, 'dc#2', 7, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(110, NULL, NULL, 1, 'dc#2', 7, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(111, NULL, NULL, 1, 'dc#2', 7, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(112, NULL, NULL, 1, 'dc#2', 8, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(113, NULL, NULL, 1, 'dc#2', 7, 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-01-06', NULL, NULL, NULL, NULL),
(114, NULL, NULL, 1, 'dc#3', 2, 514, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, '2021-01-08', NULL, NULL, NULL, NULL),
(115, NULL, NULL, 1, 'dc#3', 2, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-01-08', NULL, NULL, NULL, NULL),
(116, NULL, NULL, 1, 'dc#3', 2, 516, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-01-08', NULL, NULL, NULL, NULL),
(117, NULL, NULL, 1, 'dc#3', 2, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '2021-01-08', NULL, NULL, NULL, NULL),
(118, NULL, NULL, 1, 'dc#3', 2, 517, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '2021-01-08', NULL, NULL, NULL, NULL),
(119, NULL, NULL, 1, 'dc#3', 2, 518, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-01-08', NULL, NULL, NULL, NULL),
(120, NULL, 128, 1, NULL, 3, 44, NULL, 12, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, NULL, NULL, 1, 'dc#4', 3, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, '2021-01-11', NULL, NULL, NULL, NULL),
(122, NULL, NULL, 1, 'dc#5', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 80, '2021-01-11', NULL, NULL, NULL, NULL),
(123, NULL, 129, 1, NULL, 3, 468, NULL, 5, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, NULL, 130, 1, NULL, 3, 145, NULL, 5, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, NULL, 131, 1, NULL, 3, 414, NULL, 5, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, NULL, NULL, 1, 'dc#6', 3, 468, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-01-11', NULL, NULL, NULL, NULL),
(127, NULL, NULL, 1, 'dc#6', 3, 145, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-01-11', NULL, NULL, NULL, NULL),
(128, NULL, NULL, 1, 'dc#6', 3, 414, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-01-11', NULL, NULL, NULL, NULL),
(129, NULL, NULL, 1, 'dc#7', 3, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-01-13', NULL, NULL, NULL, NULL),
(130, NULL, 132, 1, NULL, 2, 22, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, NULL, NULL, 1, 'dc#8', 2, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-01-25', NULL, NULL, NULL, NULL),
(132, NULL, NULL, 1, 'dc#9', 3, 469, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, '2021-01-27', NULL, NULL, NULL, NULL),
(133, NULL, 133, 1, NULL, 8, 124, NULL, 4, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, NULL, NULL, 1, 'dc#10', 7, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(135, NULL, NULL, 1, 'dc#10', 7, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(136, NULL, NULL, 1, 'dc#10', 7, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(137, NULL, NULL, 1, 'dc#10', 7, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(138, NULL, NULL, 1, 'dc#10', 7, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(139, NULL, NULL, 1, 'dc#10', 7, 129, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(140, NULL, 134, 1, NULL, 7, 99, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, NULL, 135, 1, NULL, 7, 112, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, NULL, 136, 1, NULL, 7, 72, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, NULL, 137, 1, NULL, 7, 71, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, NULL, 138, 1, NULL, 7, 74, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, NULL, 139, 1, NULL, 7, 103, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, NULL, 140, 1, NULL, 7, 70, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, NULL, 141, 1, NULL, 7, 68, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, NULL, 142, 1, NULL, 7, 92, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, NULL, 143, 1, NULL, 7, 73, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, NULL, 144, 1, NULL, 7, 78, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, NULL, 145, 1, NULL, 7, 89, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, NULL, 146, 1, NULL, 7, 90, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, NULL, 147, 1, NULL, 7, 91, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, NULL, 148, 1, NULL, 8, 124, NULL, 3, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, NULL, 149, 1, NULL, 7, 101, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, NULL, 150, 1, NULL, 7, 77, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, NULL, 151, 1, NULL, 7, 67, NULL, 1, NULL, NULL, NULL, '2021-01-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, NULL, 152, 1, NULL, 7, 83, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, NULL, 153, 1, NULL, 7, 163, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, NULL, 154, 1, NULL, 7, 79, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, NULL, NULL, 1, 'dc#11', 7, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(162, NULL, NULL, 1, 'dc#11', 7, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(163, NULL, NULL, 1, 'dc#11', 7, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(164, NULL, NULL, 1, 'dc#11', 7, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(165, NULL, NULL, 1, 'dc#11', 7, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(166, NULL, NULL, 1, 'dc#11', 7, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(167, NULL, NULL, 1, 'dc#11', 7, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(168, NULL, NULL, 1, 'dc#11', 7, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(169, NULL, NULL, 1, 'dc#11', 7, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(170, NULL, NULL, 1, 'dc#11', 7, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(171, NULL, NULL, 1, 'dc#11', 7, 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(172, NULL, NULL, 1, 'dc#11', 7, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-08', NULL, NULL, NULL, NULL),
(173, NULL, NULL, 1, 'dc#11', 7, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-08', NULL, NULL, NULL, NULL),
(174, NULL, NULL, 1, 'dc#11', 7, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-08', NULL, NULL, NULL, NULL),
(175, NULL, NULL, 1, 'dc#11', 8, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(176, NULL, NULL, 1, 'dc#11', 7, 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(177, NULL, NULL, 1, 'dc#11', 7, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(178, NULL, NULL, 1, 'dc#11', 7, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-08', NULL, NULL, NULL, NULL),
(179, NULL, NULL, 1, 'dc#11', 7, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-08', NULL, NULL, NULL, NULL),
(180, NULL, NULL, 1, 'dc#11', 7, 163, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-08', NULL, NULL, NULL, NULL),
(181, NULL, NULL, 1, 'dc#11', 7, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-08', NULL, NULL, NULL, NULL),
(182, NULL, NULL, 1, 'dc#11', 7, 470, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-08', NULL, NULL, NULL, NULL),
(183, NULL, NULL, 1, 'dc#11', 7, 471, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-08', NULL, NULL, NULL, NULL),
(184, NULL, NULL, 1, 'dc#12', 6, 472, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-02-10', NULL, NULL, NULL, NULL),
(185, NULL, NULL, 1, 'dc#13', 3, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-02-16', NULL, NULL, NULL, NULL),
(186, NULL, NULL, 1, 'dc#14', 3, 281, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-02-17', NULL, NULL, NULL, NULL),
(187, NULL, NULL, 1, 'dc#15', 2, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-02-17', NULL, NULL, NULL, NULL),
(188, NULL, NULL, 1, 'dc#16', 10, 389, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2500, '2021-02-24', NULL, NULL, NULL, NULL),
(189, NULL, NULL, 1, 'dc#16', 10, 473, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3000, '2021-02-24', NULL, NULL, NULL, NULL),
(190, NULL, NULL, 1, 'dc#17', 3, 469, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-03-04', NULL, NULL, NULL, NULL),
(191, NULL, 155, 1, NULL, 10, 477, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, NULL, 156, 1, NULL, 10, 476, NULL, 2, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, NULL, NULL, 1, 'dc#18', 2, 474, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-08', NULL, NULL, NULL, NULL),
(194, NULL, NULL, 1, 'dc#18', 2, 514, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-08', NULL, NULL, NULL, NULL),
(195, NULL, NULL, 1, 'dc#18', 2, 515, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-08', NULL, NULL, NULL, NULL),
(196, NULL, NULL, 1, 'dc#18', 2, 475, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-08', NULL, NULL, NULL, NULL),
(197, NULL, NULL, 1, 'dc#18', 2, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-08', NULL, NULL, NULL, NULL),
(198, NULL, NULL, 1, 'dc#18', 10, 477, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-08', NULL, NULL, NULL, NULL),
(199, NULL, NULL, 1, 'dc#18', 10, 476, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-03-08', NULL, NULL, NULL, NULL),
(200, NULL, NULL, 1, 'dc#19', 13, 311, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-03-09', NULL, NULL, NULL, NULL),
(201, NULL, NULL, 1, 'dc#20', 5, 478, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2000, '2021-03-15', NULL, NULL, NULL, NULL),
(202, NULL, NULL, 1, 'dc#21', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 80, '2021-02-15', NULL, NULL, NULL, NULL),
(203, NULL, NULL, 1, 'dc#22', 7, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(204, NULL, NULL, 1, 'dc#22', 7, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(205, NULL, NULL, 1, 'dc#22', 7, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(206, NULL, NULL, 1, 'dc#22', 7, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(207, NULL, NULL, 1, 'dc#22', 7, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(208, NULL, NULL, 1, 'dc#22', 7, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-03-17', NULL, NULL, NULL, NULL),
(209, NULL, NULL, 1, 'dc#22', 7, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(210, NULL, NULL, 1, 'dc#22', 7, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(211, NULL, NULL, 1, 'dc#22', 7, 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(212, NULL, NULL, 1, 'dc#22', 7, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(213, NULL, NULL, 1, 'dc#22', 7, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(214, NULL, NULL, 1, 'dc#22', 7, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(215, NULL, NULL, 1, 'dc#22', 7, 163, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(216, NULL, NULL, 1, 'dc#22', 7, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(217, NULL, NULL, 1, 'dc#22', 7, 479, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-17', NULL, NULL, NULL, NULL),
(218, NULL, NULL, 1, 'dc#22', 7, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-03-17', NULL, NULL, NULL, NULL),
(219, NULL, NULL, 1, 'dc#23', 3, 480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500, '2021-03-17', NULL, NULL, NULL, NULL),
(220, NULL, NULL, 1, 'dc#23', 3, 481, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, '2021-03-17', NULL, NULL, NULL, NULL),
(221, NULL, NULL, 1, 'dc#24', 2, 133, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-03-18', NULL, NULL, NULL, NULL),
(222, NULL, NULL, 1, 'dc#25', 2, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-03-29', NULL, NULL, NULL, NULL),
(223, NULL, NULL, 1, 'dc#26', 2, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-03-29', NULL, NULL, NULL, NULL),
(224, NULL, NULL, 1, 'dc#27', 3, 469, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-03-31', NULL, NULL, NULL, NULL),
(225, NULL, NULL, 1, 'dc#27', 3, 482, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-03-31', NULL, NULL, NULL, NULL),
(226, NULL, NULL, 1, 'dc#28', 3, 483, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-04-07', NULL, NULL, NULL, NULL),
(227, NULL, NULL, 1, 'dc#29', 2, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-07', NULL, NULL, NULL, NULL),
(228, NULL, NULL, 1, 'dc#30', 3, 480, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-04-08', NULL, NULL, NULL, NULL),
(229, NULL, 157, 1, NULL, 7, 103, NULL, 1, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(230, NULL, NULL, 1, 'dc#31', 7, 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(231, NULL, NULL, 1, 'dc#31', 7, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(232, NULL, NULL, 1, 'dc#31', 7, 112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-04-14', NULL, NULL, NULL, NULL),
(233, NULL, NULL, 1, 'dc#31', 7, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-04-14', NULL, NULL, NULL, NULL),
(234, NULL, NULL, 1, 'dc#31', 7, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-04-14', NULL, NULL, NULL, NULL),
(235, NULL, NULL, 1, 'dc#31', 7, 83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(236, NULL, NULL, 1, 'dc#31', 7, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-04-14', NULL, NULL, NULL, NULL),
(237, NULL, NULL, 1, 'dc#31', 7, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-04-14', NULL, NULL, NULL, NULL),
(238, NULL, NULL, 1, 'dc#31', 7, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-04-14', NULL, NULL, NULL, NULL),
(239, NULL, NULL, 1, 'dc#31', 7, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(240, NULL, NULL, 1, 'dc#31', 7, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(241, NULL, NULL, 1, 'dc#31', 7, 161, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(242, NULL, NULL, 1, 'dc#31', 7, 79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(243, NULL, NULL, 1, 'dc#31', 7, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(244, NULL, NULL, 1, 'dc#31', 7, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-04-14', NULL, NULL, NULL, NULL),
(245, NULL, NULL, 1, 'dc#31', 7, 78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-04-14', NULL, NULL, NULL, NULL),
(246, NULL, NULL, 1, 'dc#31', 7, 89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(247, NULL, NULL, 1, 'dc#31', 7, 90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(248, NULL, NULL, 1, 'dc#31', 7, 91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(249, NULL, NULL, 1, 'dc#31', 8, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(250, NULL, NULL, 1, 'dc#31', 7, 101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-04-14', NULL, NULL, NULL, NULL),
(251, NULL, NULL, 1, 'dc#31', 7, 479, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-14', NULL, NULL, NULL, NULL),
(252, NULL, 158, 1, NULL, 3, 59, NULL, 5, NULL, NULL, NULL, '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, NULL, NULL, 1, 'dc#32', 3, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-04-26', NULL, NULL, NULL, NULL),
(254, NULL, NULL, 1, 'dc#32', 3, 482, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-04-26', NULL, NULL, NULL, NULL),
(255, NULL, 159, 1, NULL, 2, 522, NULL, 1, NULL, NULL, NULL, '2021-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, NULL, 160, 1, NULL, 2, 521, NULL, 1, NULL, NULL, NULL, '2021-04-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, NULL, NULL, 1, 'dc#33', 2, 522, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-26', NULL, NULL, NULL, NULL),
(258, NULL, NULL, 1, 'dc#33', 2, 521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-26', NULL, NULL, NULL, NULL),
(259, NULL, 161, 1, NULL, 2, 391, NULL, 2, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(260, NULL, 162, 1, NULL, 2, 391, NULL, 2, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(261, NULL, 163, 1, NULL, 2, 391, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(262, NULL, NULL, 1, 'dc#34', 2, 391, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2121-04-26', NULL, NULL, NULL, NULL),
(263, NULL, 164, 1, NULL, 3, 59, NULL, 10, NULL, NULL, NULL, '2121-04-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(264, NULL, 165, 1, NULL, 3, 489, NULL, 10, NULL, NULL, NULL, '2021-04-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(265, NULL, 166, 1, NULL, 2, 532, NULL, 5, NULL, NULL, NULL, '2021-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(266, NULL, 167, 1, NULL, 2, 531, NULL, 2, NULL, NULL, NULL, '2021-05-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(267, NULL, NULL, 1, 'dc#35', 2, 532, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-05-05', NULL, NULL, NULL, NULL),
(268, NULL, NULL, 1, 'dc#35', 2, 531, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-05-05', NULL, NULL, NULL, NULL),
(269, NULL, 168, 1, NULL, 2, 312, NULL, 1, NULL, NULL, NULL, '2021-05-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(270, NULL, NULL, 1, 'dc#37', 2, 146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-06', NULL, NULL, NULL, NULL),
(271, NULL, NULL, 1, 'dc#37', 2, 312, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-06', NULL, NULL, NULL, NULL),
(272, NULL, 169, 1, NULL, 6, 533, NULL, 1, NULL, NULL, NULL, '2021-05-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, NULL, 170, 1, NULL, 6, 534, NULL, 1, NULL, NULL, NULL, '2021-05-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, NULL, 171, 1, NULL, 2, 535, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(275, NULL, 172, 1, NULL, 2, 536, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, NULL, 173, 1, NULL, 2, 138, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, NULL, 174, 1, NULL, 2, 17, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(278, NULL, 175, 1, NULL, 2, 537, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(279, NULL, NULL, 1, 'dc#38', 6, 533, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-18', NULL, NULL, NULL, NULL),
(280, NULL, NULL, 1, 'dc#38', 6, 534, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-18', NULL, NULL, NULL, NULL),
(284, NULL, NULL, 1, 'dc#38', 2, 535, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-18', NULL, NULL, NULL, NULL),
(285, NULL, NULL, 1, 'dc#38', 2, 536, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-18', NULL, NULL, NULL, NULL),
(287, NULL, 176, 1, NULL, 2, 538, NULL, 3, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(288, NULL, 177, 1, NULL, 2, 539, NULL, 6, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(289, NULL, 178, 1, NULL, 2, 544, NULL, 5, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(290, NULL, 179, 1, NULL, 2, 40, NULL, 5, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(291, NULL, 180, 1, NULL, 2, 135, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(292, NULL, 181, 1, NULL, 2, 135, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(293, NULL, 182, 1, NULL, 2, 25, NULL, 6, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(294, NULL, 183, 1, NULL, 2, 16, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(295, NULL, 184, 1, NULL, 2, 136, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(296, NULL, 185, 1, NULL, 2, 137, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(297, NULL, 186, 1, NULL, 2, 38, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(298, NULL, 187, 1, NULL, 2, 547, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(299, NULL, 188, 1, NULL, 2, 423, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(300, NULL, 189, 1, NULL, 2, 5, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(301, NULL, 190, 1, NULL, 5, 160, NULL, 9, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(302, NULL, 191, 1, NULL, 2, 42, NULL, 1, NULL, NULL, NULL, '0001-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(303, NULL, 192, 1, NULL, 8, 124, NULL, 500, '50.000', '100.000', '25000.00', '2021-12-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(304, 4, NULL, 1, NULL, 2, 5, 'Bat-0987', 50, '500.000', '100.000', '25000.00', '2021-06-18', NULL, NULL, NULL, NULL, NULL, '1204', 1, NULL, NULL),
(305, 3, NULL, 1, NULL, 15, 548, 'niill', 100, '50.000', '110.000', '5000.00', '2021-06-16', NULL, NULL, NULL, NULL, NULL, '7987', 2, NULL, NULL),
(306, NULL, NULL, 1, 'dc#39', 15, 548, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-06-16', NULL, NULL, NULL, NULL),
(307, NULL, NULL, 1, 'dc#40', 15, 548, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-06-17', NULL, NULL, NULL, NULL),
(308, 4, NULL, 1, NULL, 2, 5, 'b-7098', 100, '1000.000', '2000.000', '100000.00', '2021-06-18', NULL, NULL, NULL, NULL, NULL, 'nill', 8, NULL, NULL),
(309, 4, NULL, 1, NULL, 2, 8, 'b-098', 100, '2500.000', '3000.000', '250000.00', '2021-06-18', NULL, NULL, NULL, NULL, NULL, 'nill', 9, NULL, NULL),
(310, 3, NULL, 1, NULL, 2, 5, 'B-0987', 10, '100.000', '110.000', '1000.00', '2021-06-19', NULL, NULL, NULL, NULL, NULL, 'BILL-01', 1, NULL, NULL),
(311, 3, NULL, 1, NULL, 3, 18, 'BILL-0987', 100, '200.000', '210.000', '20000.00', '2021-06-19', NULL, NULL, NULL, NULL, NULL, 'BILL-01', 1, NULL, NULL),
(312, 4, NULL, 1, NULL, 2, 5, 'B-098', 100, '200.000', '210.000', '20000.00', '2021-06-19', NULL, NULL, NULL, NULL, NULL, 'B-01', 1, NULL, NULL),
(313, 5, NULL, 1, NULL, 3, 44, 'b-0987', 100, '150.000', '1222.000', '15000.00', '2021-06-05', NULL, NULL, NULL, NULL, NULL, 'b-03', 3, NULL, NULL),
(314, 4, NULL, 1, NULL, 3, 18, 'b-0987', 100, '200.000', '220.000', '20000.00', '2021-06-19', NULL, NULL, NULL, NULL, NULL, 'B-07', 2, NULL, NULL),
(315, 6, NULL, 1, NULL, 2, 5, 'kh-098', 100, '200.000', '220.000', '20000.00', '2021-06-19', NULL, NULL, NULL, NULL, NULL, 'kh-1', 4, NULL, NULL),
(316, 4, NULL, 1, NULL, 2, 5, 'b-098', 100, '100.000', '110.000', '10000.00', '2021-06-02', NULL, NULL, NULL, NULL, NULL, 'b-01', 1, NULL, NULL),
(317, 4, NULL, 1, NULL, 2, 5, 'niil', 100, '500.000', '600.000', '50000.00', '2021-06-01', NULL, NULL, NULL, NULL, NULL, 'bill-0978', 1, NULL, NULL),
(318, 5, NULL, 1, NULL, 2, 6, '9999', 100, '200.000', '250.000', '20000.00', '2021-06-16', NULL, NULL, NULL, NULL, NULL, 'nill', 2, NULL, NULL),
(319, 14, NULL, 1, NULL, 2, 5, 'b-0987', 100, '140.000', '240.000', '14000.00', '2021-06-03', NULL, NULL, NULL, NULL, NULL, 'a-098', 3, NULL, NULL),
(321, NULL, NULL, 1, 'dc#42', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, '2021-06-30', NULL, NULL, NULL, NULL),
(322, NULL, NULL, 1, 'dc#43', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, '2021-06-30', NULL, NULL, NULL, NULL),
(323, NULL, NULL, 1, 'dc#44', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-05-18', NULL, NULL, NULL, NULL),
(324, NULL, NULL, 1, 'dc#38', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-05-18', NULL, NULL, NULL, NULL),
(325, NULL, NULL, 1, 'dc#45', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-06-27', NULL, NULL, NULL, NULL),
(326, NULL, NULL, 1, 'dc#45', 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-06-27', NULL, NULL, NULL, NULL),
(327, NULL, NULL, 1, 'dc#45', 2, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(328, NULL, NULL, 1, 'dc#45', 2, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, '2021-06-27', NULL, NULL, NULL, NULL),
(329, NULL, NULL, 1, 'dc#45', 3, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-06-27', NULL, NULL, NULL, NULL),
(330, NULL, NULL, 1, 'dc#45', 3, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-06-27', NULL, NULL, NULL, NULL),
(331, NULL, NULL, 1, 'dc#45', 3, 489, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(332, NULL, NULL, 1, 'dc#45', 2, 544, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(333, NULL, NULL, 1, 'dc#45', 15, 548, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-06-27', NULL, NULL, NULL, NULL),
(334, NULL, NULL, 1, 'dc#45', 3, 489, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(335, NULL, NULL, 1, 'dc#45', 2, 538, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(336, NULL, NULL, 1, 'dc#45', 7, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(337, NULL, NULL, 1, 'dc#45', 7, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(338, NULL, NULL, 1, 'dc#45', 7, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(339, NULL, NULL, 1, 'dc#45', 8, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-06-27', NULL, NULL, NULL, NULL),
(340, NULL, NULL, 1, 'dc#45', 2, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-06-27', NULL, NULL, NULL, NULL),
(341, NULL, NULL, 1, 'dc#45', 2, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(342, NULL, NULL, 1, 'dc#45', 3, 481, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(343, NULL, NULL, 1, 'dc#45', 2, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(344, NULL, NULL, 1, 'dc#45', 2, 538, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(345, NULL, NULL, 1, 'dc#45', 2, 547, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(346, NULL, NULL, 1, 'dc#45', 2, 539, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-27', NULL, NULL, NULL, NULL),
(347, NULL, 207, 1, NULL, 2, 9, NULL, 10, '100.000', '200.000', '1000.00', '2021-02-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(348, NULL, NULL, 1, 'dc#46', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-08-10', NULL, NULL, NULL, NULL),
(349, NULL, NULL, 1, 'dc#46', 3, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-08-10', NULL, NULL, NULL, NULL),
(350, 3, NULL, 1, NULL, 2, 5, '521221215313', 4, '150.000', '250.000', '600.00', '2021-09-15', NULL, NULL, NULL, NULL, NULL, '4415522', 6, NULL, NULL),
(351, 3, NULL, 1, NULL, 2, 6, '48445454', 10, '200.000', '300.000', '2000.00', '2021-09-15', NULL, NULL, NULL, NULL, NULL, '4415522', 6, NULL, NULL),
(352, 3, NULL, 1, NULL, 2, 5, '13213516565', 4, '250.000', '300.000', '1000.00', '2021-09-15', NULL, NULL, NULL, NULL, NULL, '10101', 8, NULL, NULL),
(353, 3, NULL, 1, NULL, 2, 6, '4651665654654', 3, '300.000', '350.000', '900.00', '2021-09-15', NULL, NULL, NULL, NULL, NULL, '10101', 8, NULL, NULL),
(354, 3, NULL, 1, NULL, 2, 7, '46566', 1, '400.000', '500.000', '400.00', '2021-09-15', NULL, NULL, NULL, NULL, NULL, '10101', 8, NULL, NULL),
(355, NULL, 213, 3, NULL, 2, 553, NULL, 200, '100.000', '200.000', '20000.00', '2021-10-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(356, NULL, NULL, 1, 'dc#47', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-08', NULL, NULL, NULL, NULL),
(357, NULL, NULL, 1, 'dc#47', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-08', NULL, NULL, NULL, NULL),
(358, NULL, NULL, 1, 'dc#48', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-08', NULL, NULL, NULL, NULL),
(359, NULL, NULL, 1, 'dc#48', 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-08', NULL, NULL, NULL, NULL),
(360, NULL, NULL, 3, 'dc#49', 3, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-08', NULL, NULL, NULL, NULL),
(361, NULL, NULL, 1, 'dc#50', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-08', NULL, NULL, NULL, NULL),
(362, NULL, NULL, 1, 'dc#50', 3, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, '2021-10-08', NULL, NULL, NULL, NULL),
(363, NULL, NULL, 1, 'dc#51', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, '2021-10-08', NULL, NULL, NULL, NULL),
(364, 3, NULL, 1, NULL, 2, 5, '00', 10, '50.000', '100.000', '500.00', '2021-09-20', NULL, NULL, NULL, NULL, NULL, '7555785785', 9, NULL, NULL),
(365, 3, NULL, 1, NULL, 3, 18, '00', 4, '100.000', '200.000', '400.00', '2021-09-20', NULL, NULL, NULL, NULL, NULL, '7555785785', 9, NULL, NULL),
(366, 3, NULL, 1, NULL, 2, 9, '00', 2, '1500.000', '2500.000', '3000.00', '2021-09-20', NULL, NULL, NULL, NULL, NULL, '7555785785', 9, NULL, NULL),
(367, 3, NULL, 1, NULL, 4, 428, '00', 6, '450.000', '700.000', '2700.00', '2021-09-20', NULL, NULL, NULL, NULL, NULL, '7555785785', 9, NULL, NULL),
(368, NULL, NULL, 1, 'dc#52', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, '2021-10-09', NULL, NULL, NULL, NULL),
(369, NULL, NULL, 1, 'dc#52', 3, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 200, '2021-10-09', NULL, NULL, NULL, NULL),
(370, NULL, NULL, 1, 'dc#53', 5, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-10-09', NULL, NULL, NULL, NULL),
(371, NULL, NULL, 1, 'dc#54', 3, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(372, NULL, NULL, 1, 'dc#55', 3, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(373, NULL, NULL, 1, 'dc#56', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-09', NULL, NULL, NULL, NULL),
(374, NULL, NULL, 1, 'dc#57', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(375, NULL, NULL, 1, 'dc#58', 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(376, NULL, NULL, 1, 'dc#59', 6, 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(377, NULL, NULL, 1, 'dc#60', 6, 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(378, NULL, NULL, 1, 'dc#61', 4, 61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-10-09', NULL, NULL, NULL, NULL),
(379, NULL, NULL, 1, 'dc#62', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(380, NULL, NULL, 1, 'dc#63', 8, 124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-09', NULL, NULL, NULL, NULL),
(381, NULL, NULL, 1, 'dc#64', 3, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(382, NULL, NULL, 1, 'dc#65', 6, 122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(383, NULL, NULL, 1, 'dc#66', 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-10-09', NULL, NULL, NULL, NULL),
(384, NULL, NULL, 1, 'dc#67', 2, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-10-20', NULL, NULL, NULL, NULL),
(385, NULL, NULL, 1, 'dc#68', 2, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, '2021-10-09', NULL, NULL, NULL, NULL);
INSERT INTO `stocktransactions` (`transactionid`, `supplierid`, `inventoryid`, `warehouseid`, `dcnumber`, `categoryid`, `itemid`, `batchnumber`, `stockinquantity`, `unitprice`, `saleprice`, `totalprice`, `sotckindate`, `customerid`, `invoiceid`, `invoicenumber`, `stockoutquantity`, `stockoutdate`, `billnumber`, `purchase_order_id`, `created_at`, `updated_at`) VALUES
(386, NULL, NULL, 1, 'dc#69', 2, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(387, NULL, NULL, 1, 'dc#70', 2, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, '2021-10-09', NULL, NULL, NULL, NULL),
(388, NULL, NULL, 1, 'dc#71', 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(389, NULL, NULL, 1, 'dc#72', 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-09', NULL, NULL, NULL, NULL),
(390, NULL, NULL, 1, 'dc#73', 2, 521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-09', NULL, NULL, NULL, NULL),
(391, NULL, NULL, 1, 'dc#74', 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-10-09', NULL, NULL, NULL, NULL),
(392, NULL, NULL, 1, 'dc#75', 2, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-10-09', NULL, NULL, NULL, NULL),
(393, NULL, NULL, 1, 'dc#76', 2, 521, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2021-10-09', NULL, NULL, NULL, NULL),
(394, NULL, 1, 1, NULL, 2, 1, NULL, 10, '500.000', '1000.000', '5000.00', '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(395, NULL, 2, 1, NULL, 3, 2, NULL, 10, '700.000', '1200.000', '7000.00', '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(396, NULL, NULL, 1, 'dc#77', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-11', NULL, NULL, NULL, NULL),
(397, NULL, NULL, 1, 'dc#77', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-11', NULL, NULL, NULL, NULL),
(398, NULL, NULL, 1, 'dc#78', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-09-01', NULL, NULL, NULL, NULL),
(399, NULL, NULL, 1, 'dc#78', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, '2021-09-01', NULL, NULL, NULL, NULL),
(400, NULL, NULL, 1, 'dc#79', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-11', NULL, NULL, NULL, NULL),
(401, NULL, NULL, 1, 'dc#80', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10, '2021-10-05', NULL, NULL, NULL, NULL),
(402, NULL, NULL, 1, 'dc#81', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, '2021-10-11', NULL, NULL, NULL, NULL),
(403, NULL, NULL, 1, 'dc#82', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-10-11', NULL, NULL, NULL, NULL),
(404, NULL, NULL, 1, 'dc#83', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-15', NULL, NULL, NULL, NULL),
(405, NULL, NULL, 1, 'dc#84', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-15', NULL, NULL, NULL, NULL),
(406, NULL, NULL, 1, 'dc#85', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-15', NULL, NULL, NULL, NULL),
(407, NULL, NULL, 1, 'dc#86', 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-15', NULL, NULL, NULL, NULL),
(408, NULL, 1, 1, NULL, 1, 1, NULL, 8, '1000.000', '14000.000', '8000.00', '2021-10-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(409, NULL, 2, 1, NULL, 5, 4, NULL, 40, '1000.000', '14000.000', '40000.00', '2021-10-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(410, NULL, 3, 1, NULL, 1, 1, NULL, 7000, '1000.000', '80000000.000', '7000000.00', '2021-10-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(411, NULL, 4, 1, NULL, 5, 4, NULL, 70000, '6666.000', '80000000000.000', '466620000.00', '2021-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(412, NULL, 5, 1, NULL, 4, 3, NULL, 88, '666.000', '90000000.000', '58608.00', '2021-10-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(413, 3, NULL, 1, NULL, 1, 1, '33F69331', 2, '44.000', '7000.000', '88.00', '2021-10-15', NULL, NULL, NULL, NULL, NULL, '555', 1, NULL, NULL),
(414, 3, NULL, 1, NULL, 3, 2, '43807331', 5, '555.000', '50000.000', '2775.00', '2021-10-15', NULL, NULL, NULL, NULL, NULL, '555', 1, NULL, NULL),
(415, 3, NULL, 1, NULL, 4, 3, 'D1471F2C', 5, '555.000', '6000.000', '2775.00', '2021-10-15', NULL, NULL, NULL, NULL, NULL, '555', 1, NULL, NULL),
(416, 3, NULL, 1, NULL, 5, 4, '33FC8C31', 6, '6666.000', '20000.000', '39996.00', '2021-10-15', NULL, NULL, NULL, NULL, NULL, '555', 1, NULL, NULL),
(417, NULL, NULL, 1, 'dc#1', 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-15', NULL, NULL, NULL, NULL),
(418, NULL, NULL, 1, 'dc#2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-14', NULL, NULL, NULL, NULL),
(419, NULL, NULL, 1, 'dc#3', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2021-10-16', NULL, NULL, NULL, NULL),
(420, NULL, NULL, 1, 'dc#4', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2021-10-15', NULL, NULL, NULL, NULL),
(421, NULL, NULL, 1, 'dc#5', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-11-11', NULL, NULL, NULL, NULL),
(422, NULL, 10, 1, NULL, 1, 1, NULL, 3, '1000.000', '14000.000', '3000.00', '2021-11-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(423, NULL, NULL, 1, 'dc#6', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-11-11', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplierid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `companylandline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ntn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previousbalance` double(30,3) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplierid`, `name`, `address`, `country`, `province`, `city`, `email`, `contact`, `companylandline`, `ntn`, `stn`, `previousbalance`, `created_at`, `updated_at`) VALUES
(3, 'CHEMICA-S (PVT) LTD', 'B-270,Sector 6F EBM Cause Way Mehran Town Karachi', 'Pakistan', 'Sindh', 'Karachi', 'info@chemica-s.com', '932132710432', 'NA', '00', '000', 58534.000, '2021-03-05 01:22:27', '2021-03-05 01:22:27'),
(4, 'bin Yaseen Trader', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 473000.000, '2021-03-11 05:26:21', '2021-03-11 05:26:21'),
(5, 'The Science Shop', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 35000.000, '2021-03-11 05:54:47', '2021-03-11 05:54:47'),
(6, 'kohinoor Sceitific', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'Na', 'NA', 'NA', 20000.000, '2021-03-11 05:57:48', '2021-03-11 05:57:48'),
(7, 'Saad Surgical Scientific Store', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:02:51', '2021-03-11 06:02:51'),
(8, 'Aqua City Water Filters', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:06:31', '2021-03-11 06:06:31'),
(9, 'Multi Links Enterprises', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:08:49', '2021-03-11 06:08:49'),
(10, 'SMUK Enterpriser', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:11:14', '2021-03-11 06:11:14'),
(11, 'Imran Scientific Compny', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:13:28', '2021-03-11 06:13:28'),
(12, 'Shalimar Scietific Store', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:18:35', '2021-03-11 06:18:35'),
(13, 'Bio Care Enterprises', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:21:23', '2021-03-11 06:21:23'),
(14, 'Aziz Garments', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 14000.000, '2021-03-11 06:32:04', '2021-03-11 06:32:04'),
(15, 'City Sceintific', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:35:16', '2021-03-11 06:35:16'),
(16, 'GM Scientific Store', 'Multan', 'Pakistan', 'Punjab', 'Multan', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 06:56:19', '2021-03-11 06:56:19'),
(17, 'AHMAD TRADERS', 'Peshawar', 'Pakistan', 'KPK', 'Peshawar', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 21:38:07', '2021-03-11 21:38:07'),
(18, 'Pak Glorious Enterprises', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 21:47:31', '2021-03-11 21:47:31'),
(19, 'Sanwa trading Corporatipn', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 21:57:40', '2021-03-11 21:57:40'),
(20, 'New Scientific Center', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 22:08:10', '2021-03-11 22:08:10'),
(21, 'ASIA SCIENTIFIC STORE', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 22:29:43', '2021-03-11 22:29:43'),
(22, 'MUSA JI ADAM & SONS', 'Rawalpindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'na', 'na', 'na', 'na', 0.000, '2021-03-11 22:35:16', '2021-03-11 22:35:16'),
(23, 'ARSLAN BIOCHEMICAL COMPANY', 'LAHORE', 'Pakistan', 'Punjab', 'Lahore', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-11 23:13:24', '2021-03-11 23:13:24'),
(24, 'Bio Care Enterprises', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-12 02:31:29', '2021-03-12 02:31:29'),
(25, 'RSS', 'Rawal Pindi', 'PakistanA', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-12 02:45:35', '2021-03-12 02:45:35'),
(26, 'AMIR SCEINTIFIC STORE', 'Multan', 'Pakistan', 'Punjab', 'Multan', 'na@gmail.com', 'NA', 'NA', NULL, NULL, NULL, '2021-03-12 02:47:17', '2021-03-12 02:47:17'),
(27, 'MAGMA INTERNATIONAL', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-12 03:00:02', '2021-03-12 03:00:02'),
(28, 'GM Scientific Store', 'Multan', 'Pakistan', 'Punjab', 'Multan', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-12 03:02:21', '2021-03-12 03:02:21'),
(29, 'WORLD WIDE SCIENTIFIC', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-12 03:44:35', '2021-03-12 03:44:35'),
(30, 'MID LAB', 'Rawal Pindi', 'Pakistan', 'Punjab', 'Rawal Pindi', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-12 03:51:15', '2021-03-12 03:51:15'),
(31, 'LAB MASTER', 'LAHORE', 'Pakistan', 'Punjab', 'Lahore', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-13 03:26:08', '2021-03-13 03:26:08'),
(32, 'QUALITY ASSURANCE SERVICES', '2ND FLOOR AHSAN ESTATE DULIDING AZIZ PUL CANAL ROAD FATEH GARH', 'PAKISTAN', 'PUNJAB', 'LAHORE', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-24 15:14:31', '2021-03-24 15:14:31'),
(33, 'CHEMPURE', 'ALI PLAZA MOZANG ROAD', 'PAKISTAN', 'PUNJAB', 'LAHORE', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-24 15:39:49', '2021-03-24 15:39:49'),
(34, 'REAGEN CHEM SCIENTIFIC', 'KARACHI', 'PAKISTAN', 'SINDH', 'KARACHI', 'na@gmail.com', 'NA', 'NA', 'NA', 'NA', 0.000, '2021-03-24 16:35:00', '2021-03-24 16:35:00'),
(35, 'CHEMICAL CENTER', 'SUITE #410 4TH FLOOR MASHRIQ CENTER', 'PAKISTAN', 'SINDH', 'KARACHI', 'na@gmail.com', 'NA', 'NA', '1108600-9', '11-00-2800-329-82', 0.000, '2021-03-24 16:51:11', '2021-03-24 16:51:11'),
(36, 'MICRO SCIENTIFIC CO.', 'KARACHI', 'PAKISTAN', 'SI', 'KARACHI', 'na@gmail.com', 'NA', 'NA', '3244039-2', 'NA', 0.000, '2021-03-24 17:09:27', '2021-03-24 17:09:27'),
(37, 'DIAGNOSTIC SYSTEMS', 'KARACHI', 'PAKISTAN', 'SINDH', 'KARACHI', 'na@gmail.com', 'NA', 'NA', '0691115-3', '12-00-9018-045-28', 0.000, '2021-03-24 17:17:10', '2021-03-24 17:17:10'),
(38, 'KEMISK SPECIALTIES PVT LTD.', 'LAHORE', 'PAK', 'PUNJAB', 'LAHORE', 'na@gmail.com', 'NA', 'NA', '7257593-2', '3277876127661', 0.000, '2021-03-24 17:24:24', '2021-03-24 17:24:24'),
(39, 'Fazal E Rabi', '141/1 westwood colony canal bank road lahore', 'PAKISTAN', 'PUNJAB', 'LAHORE', 'info@fzrb.pk', 'NA', '042-37498431', 'NA', 'na', 0.000, '2021-03-27 08:52:32', '2021-03-27 08:52:32'),
(40, 'DIAG.M. (PRIVATE) LIMITED', 'B-270,SECTOR 6-F EBM CAUSEWAY , MEHRAN TOWN , KORANGI', 'PAKISTAN', 'SINDH', 'KARACHI', 'info@diag-m.com', '92-21-35141448', 'NA', 'NA', 'NA', 0.000, '2021-03-27 09:29:03', '2021-03-27 09:29:03'),
(41, 'KERN CHEMICALS CO', 'H# 9/1, ST# 62,Naseerabad sher shah Road, Hussain Chowk Shaimar Town Lahore', 'PAKISTAN', 'PUNJAB', 'LAHORE', 'kernscientific@yahoo.com', 'NA', 'NA', 'NA', NULL, NULL, '2021-05-04 12:27:18', '2021-05-04 12:27:18'),
(42, 'LABTECH', '1st Floor, 47th Commercial Area, Cavalry Ground Lahore Cantt. 54810 Lahore - Pakistan', 'PAKISTAN', 'PUNJAB', 'LAHORE', 'info@labtech-me.com', '0322-8404846', '+92-42-36677 186 & 187,', 'NA', 'NA', 0.000, '2021-05-18 10:05:14', '2021-05-18 10:05:14'),
(43, 'Musa Khan', 'address', 'country', 'Sindh', 'city', 'email', 'contact', 'companylandline', 'ntn', 'stn', 500.000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_legders`
--

CREATE TABLE `supplier_legders` (
  `supplier_legder_id` bigint(20) UNSIGNED NOT NULL,
  `supplierid` int(11) DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `vocher_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` double(30,2) DEFAULT NULL,
  `credit` double(30,2) DEFAULT NULL,
  `balance` double(100,3) DEFAULT NULL,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_legders`
--

INSERT INTO `supplier_legders` (`supplier_legder_id`, `supplierid`, `purchase_order_id`, `vocher_no`, `debit`, `credit`, `balance`, `po_number`, `payment_date`, `payment_type`, `discription`, `created_at`, `updated_at`) VALUES
(1, 4, 1, NULL, 0.00, 50000.00, 50000.000, 'PO-1', '2021-06-01', 'Cash', 'gf', NULL, NULL),
(2, 4, 1, 'VB-Pay-2', 10000.00, 0.00, 40000.000, NULL, '2021-06-17', 'Bank', 'null', NULL, NULL),
(3, 5, 2, NULL, 0.00, -20000.00, 20000.000, 'PO-2', '2021-06-16', 'Cash', 'nill', NULL, NULL),
(4, 14, 3, NULL, 0.00, 14000.00, -14000.000, 'PO-3', '2021-06-03', 'Bank', 'null', NULL, NULL),
(5, 14, 3, 'VB-Pay-5', 1000.00, 0.00, -13000.000, NULL, '2021-07-06', 'Cash', 'fdsfdsfdsf', NULL, NULL),
(6, 3, 6, NULL, 0.00, 2600.00, -2600.000, 'PO-6', '2021-09-15', 'Cash', 'vv', NULL, NULL),
(7, 3, 8, NULL, 0.00, 1700.00, -4300.000, 'PO-8', '2021-09-15', NULL, NULL, NULL, NULL),
(8, 3, 9, NULL, 0.00, 6600.00, -10900.000, 'PO-9', '2021-09-20', 'Bank', 'na', NULL, NULL),
(9, 3, 1, NULL, 0.00, 45634.00, -56534.000, 'PO-1', '2021-10-15', 'Cash', 'na', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `useremail` varchar(100) DEFAULT NULL,
  `userpassword` varchar(100) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userid`, `username`, `useremail`, `userpassword`, `roleid`) VALUES
(5, 'Dilawar Sab', 'ss@gmail.com', '$2y$10$W4UcAWi7NIKZuIJxmSUIVOpjiXl/Ee0S2tVsj67oMcllpJF2zcs7i', NULL),
(6, 'Dilawar Ali', 'dilawar.ali.se@outlook.com', '$2y$10$onDeKf3eE0F4JpD17WEbu.cYBL3M8zH6/uESeztjKspf8np0rlo7S', NULL),
(0, 'saeed', 'saeed@gmail.com', '$2y$10$WHCKA51QE6MeL2sNGLM8ze5K/8dsU75KSvZ2R89cW83OvA13AF0XO', NULL),
(0, 'new user', 'new@gmail.com', '$2y$10$n9RhTlkqNP7cf1dqI8t0eeCz/8FkfFL2C/yFxoPRCWJYa.Q.R2pku', NULL),
(0, NULL, 'dilawar.ali.se@outlook.com', '$2y$10$YBqtMUldqQXe9Pwup71fDe3deKAVUtd1Nigyi3fzGSrApB7Rvrige', NULL),
(0, 'Khan', 'khan.ali.se@outlook.com', '$2y$10$iLUfQepSmnnqjDY5Mcm/0OU5RDCNe9acbFZkJFROAU4evI/HSff2O', NULL),
(0, 'aziz@demo.com', 'aziz@demo.com', '$2y$10$hvFOHdK185lnjngpmggQGulZyJ/ghOAQKVo6VBRMMzq44YOSjXOL.', NULL),
(0, 'admin', NULL, 'admin', NULL),
(0, NULL, 'imi@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unitid` bigint(20) UNSIGNED NOT NULL,
  `unitname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitid`, `unitname`, `created_at`, `updated_at`) VALUES
(2, 'liter', '2021-03-04 04:40:48', '2021-03-04 04:40:48'),
(3, 'KG', '2021-03-04 04:41:01', '2021-03-04 04:41:01'),
(4, 'Gram', '2021-03-04 21:38:53', '2021-03-04 21:38:53'),
(5, 'ML', '2021-03-04 21:56:55', '2021-03-04 21:56:55'),
(6, 'P', '2021-03-04 22:01:40', '2021-03-04 22:01:40'),
(7, 'Unit', '2021-03-04 22:19:26', '2021-03-04 22:19:26'),
(8, 'Set', '2021-03-04 22:19:43', '2021-03-04 22:19:43'),
(9, 'Each', '2021-03-10 21:52:43', '2021-03-10 21:52:43'),
(10, 'Miligram', NULL, NULL),
(11, 'Device', '2021-10-13 04:08:56', '2021-10-13 04:08:56'),
(12, 'ml', '2021-10-14 01:27:38', '2021-10-14 01:27:38'),
(13, 'mililitre', '2021-10-14 01:28:58', '2021-10-14 01:28:58'),
(14, 'kg', '2021-10-14 01:31:12', '2021-10-14 01:31:12'),
(15, 'liter', '2021-10-14 01:33:01', '2021-10-14 01:33:01'),
(16, 'mg', '2021-10-14 01:34:34', '2021-10-14 01:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `unit_children`
--

CREATE TABLE `unit_children` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_children`
--

INSERT INTO `unit_children` (`id`, `unit_id`, `name`) VALUES
(1, 2, 1000),
(2, 2, 500),
(3, 0, 250),
(4, 11, 0),
(5, 2, 5),
(6, 3, 5),
(7, 2, 4),
(8, 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouseid` bigint(20) UNSIGNED NOT NULL,
  `warehousename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehousecity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehousearea` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouseaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`warehouseid`, `warehousename`, `warehousecity`, `warehousearea`, `warehouseaddress`, `created_at`, `updated_at`) VALUES
(1, 'pak golorious', 'Rawalpindi', 'Rawwalpindi', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `account_group`
--
ALTER TABLE `account_group`
  ADD PRIMARY KEY (`account_group_id`);

--
-- Indexes for table `account_sub_group`
--
ALTER TABLE `account_sub_group`
  ADD PRIMARY KEY (`account_sub_group_id`);

--
-- Indexes for table `cateogaries`
--
ALTER TABLE `cateogaries`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `dc_children`
--
ALTER TABLE `dc_children`
  ADD PRIMARY KEY (`dcChildid`);

--
-- Indexes for table `dc_parents`
--
ALTER TABLE `dc_parents`
  ADD PRIMARY KEY (`dcparentid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeid`);

--
-- Indexes for table `financial_offers`
--
ALTER TABLE `financial_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_offer_children`
--
ALTER TABLE `financial_offer_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalledgers`
--
ALTER TABLE `generalledgers`
  ADD PRIMARY KEY (`ledgerid`);

--
-- Indexes for table `gl_account`
--
ALTER TABLE `gl_account`
  ADD PRIMARY KEY (`gl_id`);

--
-- Indexes for table `installments`
--
ALTER TABLE `installments`
  ADD PRIMARY KEY (`installmentid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `invoicechildren`
--
ALTER TABLE `invoicechildren`
  ADD PRIMARY KEY (`ichildid`);

--
-- Indexes for table `invoicemasters`
--
ALTER TABLE `invoicemasters`
  ADD PRIMARY KEY (`imasterid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `macounts`
--
ALTER TABLE `macounts`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `purchase_order_children`
--
ALTER TABLE `purchase_order_children`
  ADD PRIMARY KEY (`purchase_oredr_child_id`);

--
-- Indexes for table `quotationchildren`
--
ALTER TABLE `quotationchildren`
  ADD PRIMARY KEY (`qchildid`);

--
-- Indexes for table `quotationmasters`
--
ALTER TABLE `quotationmasters`
  ADD PRIMARY KEY (`qmasterid`);

--
-- Indexes for table `stocktransactions`
--
ALTER TABLE `stocktransactions`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplierid`);

--
-- Indexes for table `supplier_legders`
--
ALTER TABLE `supplier_legders`
  ADD PRIMARY KEY (`supplier_legder_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitid`);

--
-- Indexes for table `unit_children`
--
ALTER TABLE `unit_children`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouseid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `account_group`
--
ALTER TABLE `account_group`
  MODIFY `account_group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `account_sub_group`
--
ALTER TABLE `account_sub_group`
  MODIFY `account_sub_group_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cateogaries`
--
ALTER TABLE `cateogaries`
  MODIFY `categoryid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `dc_children`
--
ALTER TABLE `dc_children`
  MODIFY `dcChildid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dc_parents`
--
ALTER TABLE `dc_parents`
  MODIFY `dcparentid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `financial_offers`
--
ALTER TABLE `financial_offers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `financial_offer_children`
--
ALTER TABLE `financial_offer_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `generalledgers`
--
ALTER TABLE `generalledgers`
  MODIFY `ledgerid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `gl_account`
--
ALTER TABLE `gl_account`
  MODIFY `gl_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `installments`
--
ALTER TABLE `installments`
  MODIFY `installmentid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `inventoryid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `invoicechildren`
--
ALTER TABLE `invoicechildren`
  MODIFY `ichildid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoicemasters`
--
ALTER TABLE `invoicemasters`
  MODIFY `imasterid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `macounts`
--
ALTER TABLE `macounts`
  MODIFY `a_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `purchase_order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase_order_children`
--
ALTER TABLE `purchase_order_children`
  MODIFY `purchase_oredr_child_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quotationchildren`
--
ALTER TABLE `quotationchildren`
  MODIFY `qchildid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotationmasters`
--
ALTER TABLE `quotationmasters`
  MODIFY `qmasterid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocktransactions`
--
ALTER TABLE `stocktransactions`
  MODIFY `transactionid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplierid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `supplier_legders`
--
ALTER TABLE `supplier_legders`
  MODIFY `supplier_legder_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unitid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `unit_children`
--
ALTER TABLE `unit_children`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouseid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
