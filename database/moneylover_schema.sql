-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2016 at 05:20 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moneylover`
--
CREATE DATABASE IF NOT EXISTS `moneylover` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `moneylover`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
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

DROP TABLE IF EXISTS `categorys`;
CREATE TABLE IF NOT EXISTS `categorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `icon` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `group_id` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `wallet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debts`
--

DROP TABLE IF EXISTS `debts`;
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

DROP TABLE IF EXISTS `events`;
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
-- Table structure for table `recurring_transactions`
--

DROP TABLE IF EXISTS `recurring_transactions`;
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

DROP TABLE IF EXISTS `settings`;
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

DROP TABLE IF EXISTS `transactions`;
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

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `exchange_rate` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

DROP TABLE IF EXISTS `wallets`;
CREATE TABLE IF NOT EXISTS `wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` tinyint(4) DEFAULT NULL,
  `ammount` double NOT NULL DEFAULT '0',
  `unit_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `fk_budget_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_budget_category_id` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_customer_email` FOREIGN KEY (`email`) REFERENCES `accounts` (`email`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customer_customer_id` FOREIGN KEY (`id`) REFERENCES `accounts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customer_username` FOREIGN KEY (`username`) REFERENCES `accounts` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customer_wallet` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `debts`
--
ALTER TABLE `debts`
  ADD CONSTRAINT `fk_dept_wallet_id` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dept_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_event_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `recurring_transactions`
--
ALTER TABLE `recurring_transactions`
  ADD CONSTRAINT `fk_recurring_transaction_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_recurring_transaction_category_id` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `settings`
--
ALTER TABLE `settings`
  ADD CONSTRAINT `fk_setting_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_transaction_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_category_id` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON UPDATE CASCADE,
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
