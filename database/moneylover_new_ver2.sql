-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2016 at 02:51 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moneylover`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tokenhash` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `created_at`, `tokenhash`, `activate`) VALUES
(1, ':username', ':email', ':password', '2016-06-11 15:12:02', ':tokenhash', 1),
(26, 'cancat95', 'ninjameo9x@gmail.com', 'a73f5deded39a18c33cb1ad91215a1e557b7564e', '2016-06-12 17:01:20', '43795247cf724d7bced50e7a5c53759de4df6a0e', 1),
(27, 'cancat952', 'khuattrang999@gmail.com', 'fff4a511e0b94c5f83799908594988e768033424', '2016-06-13 05:58:11', '6898b90169036c3eed3579107ab1ac4a8f8665c0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE IF NOT EXISTS `budgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `goal` double NOT NULL DEFAULT '0',
  `spent` double NOT NULL DEFAULT '0',
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `wallet_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `category_id` (`category_id`),
  KEY `wallet_id` (`wallet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE IF NOT EXISTS `categorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `type`, `customer_id`) VALUES
(1, 'Transportations', 'fa-taxi', NULL),
(2, 'Shopping', 'fa-shopping-cart', NULL),
(3, 'Food', 'fa-cutlery', NULL),
(4, 'Love', 'fa-heart', NULL),
(5, 'Friend', 'fa-users', NULL),
(6, 'Education', 'fa-graduation-cap', NULL),
(7, 'Family', 'fa-home', NULL),
(8, 'Work', 'fa-briefcase', NULL),
(9, 'Entertainment', 'fa-gamepad', NULL),
(10, 'Others', 'fa-cube', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `default_wallet` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `university` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `highschool` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `job` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_customer_customer_id` (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `account_id`, `username`, `email`, `name`, `gender`, `dob`, `default_wallet`, `address`, `city`, `country`, `phone`, `university`, `highschool`, `job`, `company`) VALUES
(20, 26, 'cancat95', 'ninjameo9x@gmail.com', 'Duy Cat, Can', 1, '1995-09-14', NULL, 'Cum 3 Phung Thuong Phuc Tho', 'Ha Noi', 'Vietnam', '0969422782', 'University of Engineering and Technology', 'Ngoc Tao Hightschool', 'Student', 'Google'),
(21, 27, 'cancat952', 'khuattrang999@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `debts`
--

CREATE TABLE IF NOT EXISTS `debts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `debt_type` tinyint(1) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `paid` double NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` datetime NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `partner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `wallet_id` (`wallet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ending_date` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `customer_id`, `detail`, `created_at`) VALUES
(1, 1, 20, 'Your account is created! Check your email to verify!', '2016-06-12 05:30:00'),
(2, 1, 20, 'Verified email successfully!', '2016-06-12 06:00:00'),
(3, 1, 20, 'We created a new wallet for you. Check wallet to edit total money!', '2016-06-12 05:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `recurring_transactions`
--

CREATE TABLE IF NOT EXISTS `recurring_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `unit_id` int(11) NOT NULL,
  `wallet_id` tinyint(4) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `repeat_type` tinyint(4) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `every` tinyint(4) NOT NULL DEFAULT '1',
  `monthly` tinyint(1) DEFAULT '0',
  `weekly` bit(7) DEFAULT b'0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `customer_id` int(11) NOT NULL,
  `displayed_amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `date_format` varchar(8) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ddmmyyyy',
  `first_day_of_week` tinyint(4) NOT NULL DEFAULT '0',
  `first_day_of_month` tinyint(4) NOT NULL DEFAULT '0',
  `first_month_of_year` tinyint(4) NOT NULL DEFAULT '0',
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `event_id` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `partner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `category_id` (`category_id`),
  KEY `wallet_id` (`wallet_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `exchange_rate` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `exchange_rate`) VALUES
(1, 'USD', 1),
(2, 'VND', 0.000045);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE IF NOT EXISTS `wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `customer_id`, `name`, `description`, `type`, `amount`, `unit_id`, `created_at`) VALUES
(1, 20, 'Cash', 'Cash', 'fa-money', 20000, 1, '2016-06-13 07:40:20'),
(2, 20, 'BIDV', 'BIDV Cau Giay', 'fa-credit-card-alt', 5000000, 2, '2016-06-13 07:40:20');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `fk_budget_category_id` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_budget_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_budget_wallet_id` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `categorys`
--
ALTER TABLE `categorys`
  ADD CONSTRAINT `fk_category_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customer_customer_id` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customer_email` FOREIGN KEY (`email`) REFERENCES `accounts` (`email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customer_username` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `debts`
--
ALTER TABLE `debts`
  ADD CONSTRAINT `fk_dept_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dept_wallet_id` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_event_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notification_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `recurring_transactions`
--
ALTER TABLE `recurring_transactions`
  ADD CONSTRAINT `fk_recurring_transaction_category_id` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recurring_transaction_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `fk_setting_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transaction_category_id` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_wallet_id` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `fk_wallet_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
