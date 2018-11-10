-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2018 at 11:25 PM
-- Server version: 10.0.35-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andimpex_ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_list`
--

CREATE TABLE `ac_list` (
  `code` int(222) NOT NULL,
  `date` varchar(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `type` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ac_list`
--

INSERT INTO `ac_list` (`code`, `date`, `title`, `type`) VALUES
(2, '2018-05-30', 'Raw Materials', 't'),
(3, '2018-05-30', 'Raw Materials Purchase', 't'),
(4, '2018-05-30', 'Vat & Godown Charge', 't'),
(6, '2018-05-31', 'Salaries', 'p'),
(7, '2018-05-31', 'Salaries & Wages', 'p'),
(8, '2018-05-31', 'Office Expense', 'p'),
(9, '2018-05-31', 'Rent & Tax', 'p'),
(10, '2018-05-31', 'Unproductive Wages', 'p'),
(11, '2018-05-31', 'Insurance', 'p'),
(12, '2018-05-31', 'Printing & Stationery', 'p'),
(13, '2018-05-31', 'Rent Received', 'p'),
(15, '2018-05-31', 'Apprentice Premium', 'p'),
(16, '2018-05-31', 'Income From Investment', 'p'),
(17, '2018-05-31', 'Postage & Telegram', 'p'),
(18, '2018-05-31', 'Telephone Expense', 'p'),
(19, '2018-05-31', 'Legal Charge', 'p'),
(20, '2018-05-31', 'General Expenese', 'p'),
(21, '2018-05-31', 'Travelling Expense', 'p'),
(22, '2018-05-31', 'Advertisement', 'p'),
(23, '2018-05-31', 'Warehouse Rent', 'p'),
(26, '2018-05-31', 'Carriage Outward', 'p'),
(27, '2018-05-31', 'Duty & Dock Charges', 'p'),
(28, '2018-05-31', 'Repair & Renewal', 'p'),
(29, '2018-05-31', 'Depreciation', 'p'),
(30, '2018-05-31', 'Audit Fee', 'p'),
(31, '2018-05-31', 'Discount Allowed', 'p'),
(32, '2018-05-31', 'Commission Allowed', 'p'),
(33, '2018-05-31', 'Interest on Capital', 'p'),
(34, '2018-05-31', 'Interest on Loan', 'p'),
(35, '2018-05-31', 'Interest on Drawing', 'p'),
(36, '2018-05-31', 'Discount Received', 'p'),
(37, '2018-05-31', 'Commission received', 'p'),
(38, '2018-05-31', 'Interest on Deposits', 'p'),
(39, '2018-05-31', 'Vat Received', 'p'),
(40, '2018-05-31', 'internal transport', 't'),
(41, '2018-05-31', 'Work in Process', 't'),
(42, '2018-05-31', 'Machine Repair', 't'),
(43, '2018-05-31', 'Plant Repair', 't'),
(44, '2018-05-31', 'Factory Premices Repair', 't'),
(45, '2018-05-31', 'Depreciation of Plant', 't'),
(46, '2018-05-31', 'Depreciation of Machinery  ', 't'),
(47, '2018-05-31', 'Depreciation of Machinery Tools', 't'),
(48, '2018-05-31', 'Depreciation of Factory Building', 't'),
(49, '2018-05-31', 'Spcial Packing', 't'),
(50, '2018-05-31', 'Factory Manager Salary ', 't'),
(51, '2018-05-31', 'Factory Supervisor Salary ', 't'),
(52, '2018-05-31', 'Finished Good', 't'),
(53, '2018-05-31', 'Raw Material Return', 't'),
(54, '2018-05-31', 'Raw Material Dock Rent', 't'),
(55, '2018-05-31', 'Carriage in ward', 't'),
(56, '2018-05-31', 'Production Wages', 't'),
(57, '2018-05-31', 'Mills Rent and Tax', 't'),
(58, '2018-05-31', 'Factory light and Energy', 't'),
(59, '2018-05-31', 'Other Production Cost', 't'),
(60, '2018-05-31', 'Vat Expenditure ', 't'),
(61, '2018-05-31', 'Royality', 't'),
(62, '2018-05-31', 'Return', 't'),
(63, '2018-05-31', 'Sale', 't'),
(64, '2018-05-31', 'Closing Stock', 't'),
(65, '2018-05-31', 'Cole , Wood & Energy', 't'),
(66, '2018-05-31', 'Fuel', 't'),
(67, '2018-05-31', 'Outstanding Wages', 'b'),
(68, '2018-05-31', 'Outstanding Rent', 'b'),
(69, '2018-05-31', 'Outstanding Office Expense', 'b'),
(70, '2018-05-31', 'Outstanding Salary', 'b'),
(71, '2018-05-31', 'Outstanding Advertisement ', 'b'),
(72, '2018-05-31', 'Outstanding Loan Interest  ', 'b'),
(73, '2018-05-31', 'Withdrawn ', 'b'),
(74, '2018-05-31', 'Capital ', 'b'),
(75, '2018-05-31', 'Good Will ', 'b'),
(76, '2018-05-31', 'Leasing Assets  ', 'b'),
(77, '2018-05-31', 'Land Buildings ', 'b'),
(78, '2018-05-31', 'Machinery  ', 'b'),
(79, '2018-05-31', 'Office Furniture ', 'b'),
(80, '2018-05-31', 'Furniture', 'b'),
(81, '2018-05-31', 'Investment', 'b'),
(82, '2018-05-31', 'Outstanding Investment Interest', 'b'),
(83, '2018-05-31', 'Accrued Bad Debts', 'b'),
(84, '2018-05-31', 'Cash in Hand', 'b'),
(85, '2018-05-31', 'Advance Expense', 'b'),
(86, '2018-05-31', 'Outstanding Income', 'b'),
(87, '2018-05-31', 'Bills Receiveable', 'b'),
(88, '2018-05-31', 'Income Tax Reserve', 'b'),
(89, '2018-05-31', 'Employee Welfare Fund', 'b'),
(90, '2018-05-31', 'Sundry Debtors REserve', 'b'),
(91, '2018-05-31', 'Sundry Creditors', 'b'),
(92, '2018-05-31', 'Bills Payable ', 'b'),
(93, '2018-05-31', 'Bank Overdraft', 'b'),
(94, '2018-05-31', 'Mortgage Loan', 'b'),
(95, '2018-05-31', 'Bank Loan', 'b'),
(96, '2018-05-31', 'General Reserve', 'b'),
(97, '2018-06-04', 'Etoken Collection', 'p'),
(98, '2018-06-04', 'Debts Collection', 'b'),
(99, '2018-06-04', 'Courier Charge', 'p'),
(100, '2018-06-04', 'Conveyance', 'p'),
(101, '2018-06-04', 'Donation', 'p'),
(102, '2018-06-04', 'Office Entertainment', 'p'),
(103, '2018-06-04', 'Office Expense', 'p'),
(104, '2018-06-04', 'Repairing & Maintainance', 'p'),
(105, '2018-06-04', 'Etoken Charge', 'p'),
(106, '2018-06-04', 'Grocery', 'p'),
(107, '2018-06-04', 'Cash Deposite', 'b'),
(108, '2018-06-04', 'Bkash Cash Out', 'b'),
(109, '2018-06-04', 'Medicine Purchase', 'p'),
(110, '2018-06-04', 'Rent Advance', 'p'),
(111, '2018-06-04', 'Locker Charge', 'p'),
(112, '2018-06-04', 'Bank Deposite', 'p'),
(113, '2018-06-04', 'Bkash Payment', 'p'),
(114, '2018-06-04', 'Generator Bill', 'p'),
(115, '2018-06-04', 'Tender Purchase', 'p'),
(116, '2018-06-04', 'Stationary', 'p'),
(117, '2018-06-04', 'Photocopy', 'p'),
(118, '2018-06-04', 'Telephone Bill', 'p'),
(119, '2018-06-04', 'Advertisement', 'p'),
(120, '2018-06-04', 'Garments Sell', 'p'),
(121, '2018-06-04', 'Other Expense', 'p'),
(122, '2018-06-04', 'Water Bill', 'p'),
(123, '2018-06-04', 'Bank Wthdrwan', 'b'),
(124, '2018-06-04', 'Residental Rent', 'p'),
(125, '2018-06-04', 'Internet Bill', 'p'),
(126, '2018-06-04', 'Office Rent', 'p'),
(127, '2018-06-04', 'Mobile Bill', 'p'),
(128, '2018-06-04', 'Electricity Bill', 'p'),
(129, '2018-06-04', 'Furniture & Fixture', 'p'),
(130, '2018-06-04', 'Licence Fees', 'p'),
(131, '2018-06-04', 'Advance Received', 'b'),
(132, '2018-06-04', 'Etoken Bill', 'b'),
(133, '2018-06-04', 'House Repair', 'p'),
(134, '2018-06-04', 'Printing Charge', 'p'),
(135, '2018-06-04', 'Gas Purchase', 'p'),
(136, '2018-06-04', 'Tour Expense', 'p'),
(137, '2018-06-04', 'Cash A/C', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(22) NOT NULL,
  `user` varchar(44) NOT NULL,
  `pass` varchar(44) NOT NULL,
  `type` enum('ADMIN','USER') NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `user`, `pass`, `type`) VALUES
(1, 'admin', '123', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(111) NOT NULL,
  `date` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `debit` double NOT NULL DEFAULT '0',
  `credit` double NOT NULL DEFAULT '0',
  `reverse` varchar(222) NOT NULL,
  `type` varchar(22) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `date`, `code`, `title`, `debit`, `credit`, `reverse`, `type`, `description`) VALUES
(15, '2016-12-21', '137', 'Cash A/C', 3000, 0, 'Etoken Collection', 'b', 'Komoles Kaka'),
(16, '2016-12-21', '97', 'Etoken Collection', 0, 3000, 'Cash A/C', 'p', 'Komoles Kaka'),
(17, '2016-12-21', '137', 'Cash A/C', 500, 0, 'Debts Collection', 'b', 'Adhunik'),
(18, '2016-12-21', '98', 'Debts Collection', 0, 500, 'Cash A/C', 'b', 'Adhunik'),
(19, '2016-12-22', '137', 'Cash A/C', 1000, 0, 'Debts Collection', 'b', 'Oisi'),
(20, '2016-12-22', '98', 'Debts Collection', 0, 1000, 'Cash A/C', 'b', 'Oisi'),
(21, '2016-12-22', '137', 'Cash A/C', 1500, 0, 'Debts Collection', 'b', 'Adhunik'),
(22, '2016-12-22', '98', 'Debts Collection', 0, 1500, 'Cash A/C', 'b', 'Adhunik'),
(23, '2016-12-20', '99', 'Courier Charge', 120, 0, 'Cash A/C', 'p', 'pat bosta sample'),
(24, '2016-12-20', '137', 'Cash A/C', 0, 120, 'Courier Charge', 'b', 'pat bosta sample'),
(25, '2016-12-21', '100', 'Conveyance', 200, 0, 'Cash A/C', 'p', 'Baba Bagerhat  Travel'),
(26, '2016-12-21', '137', 'Cash A/C', 0, 200, 'Conveyance', 'b', 'Baba Bagerhat  Travel'),
(27, '2016-12-21', '101', 'Donation', 500, 0, 'Cash A/C', 'p', 'Dipu Da & Boudi'),
(28, '2016-12-21', '137', 'Cash A/C', 0, 500, 'Donation', 'b', 'Dipu Da & Boudi'),
(29, '2016-12-21', '6', 'Salaries', 600, 0, 'Cash A/C', 'p', 'bua o jharudar'),
(30, '2016-12-21', '137', 'Cash A/C', 0, 600, 'Salaries', 'b', 'bua o jharudar'),
(31, '2016-12-20', '102', 'Office Entertainment', 30, 0, 'Cash A/C', 'p', 'stuff'),
(32, '2016-12-20', '137', 'Cash A/C', 0, 30, 'Office Entertainment', 'b', 'stuff'),
(33, '2016-12-20', '103', 'Office Expense', 100, 0, 'Cash A/C', 'p', 'dipu da'),
(34, '2016-12-20', '137', 'Cash A/C', 0, 100, 'Office Expense', 'b', 'dipu da'),
(37, '2016-12-19', '100', 'Conveyance', 20, 0, 'Cash A/C', 'p', 'dipu da jatayat office'),
(38, '2016-12-19', '137', 'Cash A/C', 0, 20, 'Conveyance', 'b', 'dipu da jatayat office'),
(39, '2016-12-22', '104', 'Repairing & Maintainance', 500, 0, 'Cash A/C', 'p', 'tv'),
(40, '2016-12-22', '137', 'Cash A/C', 0, 500, 'Repairing & Maintainance', 'b', 'tv'),
(43, '2016-12-22', '105', 'Etoken Charge', 700, 0, 'Cash A/C', 'p', 'debanjon'),
(44, '2016-12-22', '137', 'Cash A/C', 0, 700, 'Etoken Charge', 'b', 'debanjon'),
(45, '2016-12-22', '106', 'Grocery', 1000, 0, 'Cash A/C', 'p', 'bazar dipu da'),
(46, '2016-12-22', '137', 'Cash A/C', 0, 1000, 'Grocery', 'b', 'bazar dipu da'),
(47, '2016-12-22', '100', 'Conveyance', 50, 0, 'Cash A/C', 'p', 'samim , moloy'),
(48, '2016-12-22', '137', 'Cash A/C', 0, 50, 'Conveyance', 'b', 'samim , moloy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_list`
--
ALTER TABLE `ac_list`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
