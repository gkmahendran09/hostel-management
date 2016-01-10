-- Adminer 4.2.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `role`) VALUES
(1,	'Admin',	'admin',	'd033e22ae348aeb5660fc2140aec35850c4da997',	'Administrator');

DROP TABLE IF EXISTS `governing_council`;
CREATE TABLE `governing_council` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `governing_council` (`id`, `name`, `designation`) VALUES
(2,	'Name',	'Designation');

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(3) NOT NULL,
  `space` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `rooms` (`id`, `room_number`, `space`) VALUES
(7,	'1',	'10');

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student` (`id`, `name`, `username`, `password`, `role`) VALUES
(9,	'Raj',	'raj',	'3055effa054a24f84cf42cea946db4cdf445cb76',	'101'),
(10,	'Ramu',	'ramu',	'2c5280f16cfa61571602a788d525c0b27d5b5163',	'102'),
(11,	'Mohan',	'mohan',	'abee2cb38f12d53e4682bab140e8f4b568816eee',	'103');

DROP TABLE IF EXISTS `student_fee`;
CREATE TABLE `student_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `fee` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `student_fee_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_fee` (`id`, `student_id`, `fee`) VALUES
(11,	11,	'3000'),
(12,	10,	'7000'),
(13,	9,	'5000');

DROP TABLE IF EXISTS `student_room`;
CREATE TABLE `student_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `student_room_ibfk_4` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `student_room_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_room` (`id`, `student_id`, `room_id`) VALUES
(14,	9,	7),
(15,	10,	7),
(16,	11,	7);

-- 2016-01-10 04:12:53
