-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2018 at 10:33 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `labproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pickLoc` varchar(255) DEFAULT NULL,
  `dropLoc` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `phoneno` varchar(255) DEFAULT NULL,
  `hasStart` int(11) DEFAULT '0',
  `hasEnd` int(11) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `customer`
--


-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT '0',
  `phoneno` varchar(255) DEFAULT NULL,
  `bikeno` varchar(255) DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `isA` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `rating`, `phoneno`, `bikeno`, `license`, `isA`) VALUES
(10, 'Ramesh', 0, '9787888015', 'UK06 AD 3283', 'UA45832FT', 1),
(11, 'Suresh', 0, '8527104555', 'UP08 AD 5721', 'UA45823YI', 1),
(12, 'kla', 0, '9787888089', 'UK06 AD 3267', 'Tamil Nadu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback`) VALUES
('Nice');

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE IF NOT EXISTS `matchs` (
  `cid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`cid`, `id`, `otp`) VALUES
(49, 10, '8085'),
(50, 11, '9307');
