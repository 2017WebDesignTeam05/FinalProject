-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2018 年 01 月 13 日 04:32
-- 伺服器版本: 5.7.20-0ubuntu0.16.04.1
-- PHP 版本： 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `team05`
--
CREATE DATABASE IF NOT EXISTS `team05` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `team05`;

-- --------------------------------------------------------

--
-- 資料表結構 `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `idNumber` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `permission` int(11) DEFAULT '2',
  `email` varchar(50) DEFAULT NULL,
  `SessionIP` varchar(17) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `accounts`
--

INSERT INTO `accounts` (`account_id`, `name`, `password`, `idNumber`, `gender`, `birthday`, `permission`, `email`, `SessionIP`) VALUES
(1, 'admin', 'admin', NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `cart`
--

CREATE TABLE `cart` (
  `order_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `checkout` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `forum`
--

CREATE TABLE `forum` (
  `post_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `mall`
--

CREATE TABLE `mall` (
  `ticket_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `park_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `parks`
--

CREATE TABLE `parks` (
  `park_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `URL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `permission`
--

CREATE TABLE `permission` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `permission`
--

INSERT INTO `permission` (`permission_id`, `permission_name`) VALUES
(1, 'administrator'),
(2, 'customer');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- 資料表索引 `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`order_id`);

--
-- 資料表索引 `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`post_id`);

--
-- 資料表索引 `mall`
--
ALTER TABLE `mall`
  ADD PRIMARY KEY (`ticket_id`);

--
-- 資料表索引 `parks`
--
ALTER TABLE `parks`
  ADD PRIMARY KEY (`park_id`);

--
-- 資料表索引 `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
