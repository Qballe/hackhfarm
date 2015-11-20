-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2015 at 04:30 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `my_hteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `coffees`
--

CREATE TABLE IF NOT EXISTS `coffees` (
  `id` int(11) NOT NULL,
  `user_id_1` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`id`,`user_id_1`,`user_id_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text,
  `contacts` text,
  PRIMARY KEY (`id`),
  KEY `name` (`name`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `description`, `contacts`) VALUES
(1, 'Responsa', 'hello@goresponsa.com', 'Responsa S.r.l', 'hello@goresponsa.com'),
(2, 'Google', 'google@google.it', 'Google!', 'Google it..!');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `message` text,
  `readed` smallint(2) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `company_id` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`id`,`user_id`,`company_id`),
  KEY `company_id` (`company_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `user_id`, `company_id`, `note`) VALUES
(1, 5, 1, NULL),
(2, 6, 1, NULL),
(3, 7, 2, NULL),
(4, 8, 1, NULL),
(5, 9, 2, NULL),
(6, 10, 1, NULL),
(7, 11, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(1, 'Designer'),
(2, 'Developer'),
(3, 'God'),
(4, 'Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(5, '127.0.0.1', NULL, '$2y$08$DzApJdMmOMz5BEtQBkp6i.YUtPlt2zYr1Olid/dRW9Gfd7aHXB.TW', NULL, 'azanardo@goresponsa.com', NULL, NULL, NULL, NULL, 1448032719, NULL, 1, 'Alex', 'Zanardo', NULL, NULL),
(6, '127.0.0.1', NULL, '$2y$08$CZ8WW.XHE0OIxlWcWZl3feYt84pN8YWKpUQ.1EBeaZGIY2VM.oiri', NULL, 'gantoniazzi@goresponsa.com', NULL, NULL, NULL, NULL, 1448032719, NULL, 1, 'Gabriele', 'Antoniazzi', NULL, NULL),
(7, '127.0.0.1', NULL, '$2y$08$nhmm1zNERgZVFtRTxWw1NeU5DbzNgpuloH.TBwuaV4IzdrTwrrdLS', NULL, 'fguerra@goresponsa.com', NULL, NULL, NULL, NULL, 1448032719, NULL, 1, 'Francesco', 'Guerra', NULL, NULL),
(8, '127.0.0.1', NULL, '$2y$08$2pm9Nd9pVQkrjQEqX0jGhe21x7NulRhHDqN6sQdHyW5sGubOqTqFe', NULL, 'chiara.bigarella1@gmail.com', NULL, NULL, NULL, NULL, 1448032719, NULL, 1, 'Chiara', 'Bigarella', NULL, NULL),
(9, '127.0.0.1', NULL, '$2y$08$CoD7xKDhLsZacKVUWBU2o.2iMuoLI7T3iSJLdbo2pZ6vKDwEi74XG', NULL, 'fabio.ros90@gmail.com', NULL, NULL, NULL, NULL, 1448032719, NULL, 1, 'Fabio', 'Ros', NULL, NULL),
(10, '127.0.0.1', NULL, '$2y$08$JPVrteW641iokJoF755azuF2xkf/AOw8/WxGTDx3fvkwE.eblpC2C', NULL, 'sfranchetto@digitalaccademia.com', NULL, NULL, NULL, NULL, 1448032719, NULL, 1, 'Stefano', 'Franchetto', NULL, NULL),
(11, '127.0.0.1', NULL, '$2y$08$eVShTRaVQW9ixcg2AEj2hudZShmDqRzkzdc7v8cNzTrSJWZWAtf0G', NULL, 'mgaravet@digitalaccademia.com', NULL, NULL, NULL, NULL, 1448032719, NULL, 1, 'Massimo', 'Garavet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE IF NOT EXISTS `users_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` text,
  `contacts` text,
  `role` text,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `description`, `contacts`, `role`) VALUES
(1, 5, 'Lorem ipsum dolor sit amet...', 'Lorem ipsum dolor sit amet!!', 'God'),
(2, 6, 'Lorem ipsum dolor sit amet...', 'Lorem ipsum dolor sit amet!!', 'God'),
(3, 7, 'Lorem ipsum dolor sit amet...', 'Lorem ipsum dolor sit amet!!', 'God'),
(4, 8, 'Lorem ipsum dolor sit amet...', 'Lorem ipsum dolor sit amet!!', 'God'),
(5, 9, 'Lorem ipsum dolor sit amet...', 'Lorem ipsum dolor sit amet!!', 'God'),
(6, 10, 'Lorem ipsum dolor sit amet...', 'Lorem ipsum dolor sit amet!!', 'God'),
(7, 11, 'Lorem ipsum dolor sit amet...', 'Lorem ipsum dolor sit amet!!', 'God');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 5, 2),
(2, 6, 2),
(3, 7, 2),
(4, 8, 2),
(5, 9, 2),
(6, 10, 2),
(7, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_skills`
--

CREATE TABLE IF NOT EXISTS `users_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `skill_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`,`skill_id`),
  KEY `skill_id` (`skill_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_skills`
--
ALTER TABLE `users_skills`
  ADD CONSTRAINT `users_skills_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_skills_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
