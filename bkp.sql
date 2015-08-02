-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2015 at 12:52 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a4866257_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `privatechat`
--
-- Creation: Aug 02, 2015 at 03:41 AM
-- Last update: Aug 02, 2015 at 10:17 AM
--

CREATE TABLE `privatechat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chatdate` datetime NOT NULL,
  `msg` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `sender` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `receiver` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `privatechat`
--

INSERT INTO `privatechat` VALUES(23, '2015-08-02 19:40:59', 'Hai ', 'Muthu ', 'Vicky');
INSERT INTO `privatechat` VALUES(24, '2015-08-02 19:47:38', 'Hai', 'Muthu', 'bala');

-- --------------------------------------------------------

--
-- Table structure for table `publicchat`
--
-- Creation: Aug 02, 2015 at 03:44 AM
-- Last update: Aug 02, 2015 at 10:00 AM
--

CREATE TABLE `publicchat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chatdate` datetime NOT NULL,
  `msg` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `sender` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `publicchat`
--


-- --------------------------------------------------------

--
-- Table structure for table `reg`
--
-- Creation: Aug 02, 2015 at 03:38 AM
-- Last update: Aug 02, 2015 at 10:10 AM
--

CREATE TABLE `reg` (
  `fname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `lname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `gender` varchar(6) COLLATE latin1_general_ci NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `usrname` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `pswrd` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `ontag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` VALUES('Muthuraj', 'M', 'Male', '1995-07-05', 'muthu.sattur@gmail.com', 'muthu', '*EC80AEDAD3D8A61A183A0D5C8FEDEF0EC315D312', 1);
INSERT INTO `reg` VALUES('Domidov', 'S', 'Male', '1994-12-27', 'manikp1110@gmail.com', 'domidov', '*5BA3BFE8981441939DB5E3640178D23214943F33', 0);
INSERT INTO `reg` VALUES('balasms', 's', 'Male', '1994-12-27', 'balasubramaniyan886@gmail.com', 'bala', '*126B694136754D777248FD9965CBBB254B39301D', 1);
INSERT INTO `reg` VALUES('Muthu', 'Vignesh.R', 'Male', '1994-09-30', 'vicky940930@gmail.com', 'Vicky', '*C314C36E8C84655297C829FABA8861B5DA6A6B98', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`a4866257_muthu`@`10.1.1.42` SQL SECURITY DEFINER VIEW `a4866257_chat`.`test` AS select distinct `a4866257_chat`.`privatechat`.`receiver` AS `sender` from `a4866257_chat`.`privatechat` where (`a4866257_chat`.`privatechat`.`sender` = 'Muthu ') union all select distinct `a4866257_chat`.`privatechat`.`sender` AS `sender` from `a4866257_chat`.`privatechat` where (`a4866257_chat`.`privatechat`.`receiver` = 'Muthu ');

--
-- Dumping data for table `test`
--

INSERT INTO `test` VALUES('Vicky');
INSERT INTO `test` VALUES('bala');
