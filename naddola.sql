-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- 호스트: localhost
-- 처리한 시간: 14-04-03 22:45 
-- 서버 버전: 5.5.35
-- PHP 버전: 5.3.10-1ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 데이터베이스: `naddola`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `member_id` int(11) NOT NULL,
  `sell_list_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`member_id`,`sell_list_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `car_list`
--

CREATE TABLE IF NOT EXISTS `car_list` (
  `code` varchar(50) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `car_list`
--

INSERT INTO `car_list` (`code`, `make`, `model`) VALUES
('AUDA3', 'Audi', 'A3'),
('AUDQ5', 'Audi', 'Q5'),
('AUDS5', 'Audi', 'S5'),
('BMW335I', 'BMW', '335i'),
('BMW328I', 'BMW', '328i'),
('BMW328D', 'BMW', '328d'),
('BENCLA250', 'Benz', 'CLA250'),
('BENC250', 'Benz', 'C250'),
('BENE350', 'Benz', 'E350'),
('AUDRS7', 'Audi', 'RS7'),
('AUDRS5', 'Audi', 'RS5'),
('AUDR8', 'Audi', 'R8'),
('BMW740I', 'BMW', '740i'),
('BMW750I', 'BMW', '750i'),
('BMW760LI', 'BMW', '760Li'),
('BENS550', 'Benz', 'S550'),
('BENCLS550', 'Benz', 'CLS550'),
('BENG550', 'Benz', 'G550');

-- --------------------------------------------------------

--
-- 테이블 구조 `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `code` varchar(7) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `color`
--

INSERT INTO `color` (`code`, `name`) VALUES
('#ffffff', 'White'),
('#000000', 'Black'),
('#ff0000', 'Red'),
('#00ff00', 'Green'),
('#0000ff', 'Blue'),
('#ffff00', 'Yellow'),
('#ff00ff', 'Purple'),
('#00ffff', 'Cyan'),
('#bfbfbf', 'Light Gray'),
('#5f5f5f', 'Dark Gray');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`id`, `email`, `password`, `name`, `phone`) VALUES
(1, 'neopjm109@naver.com', 'white109', 'Joon Min Park', '01012341234'),
(2, 'naddola@naver.com', 'qkqhek', 'Hyeon Cheol Cheon', '01012341234'),
(3, 'sopathos@naver.com', 'sksqhdRns', 'Woo Sik Moon', '01092698509');

-- --------------------------------------------------------

--
-- 테이블 구조 `sell_list`
--

CREATE TABLE IF NOT EXISTS `sell_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `car_code` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `transmission` varchar(10) NOT NULL,
  `mileage` double NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `report` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 테이블의 덤프 데이터 `sell_list`
--

INSERT INTO `sell_list` (`id`, `title`, `seller_id`, `car_code`, `year`, `color`, `price`, `transmission`, `mileage`, `description`, `date`, `report`) VALUES
(1, 'Audi A3 is good', 1, 'AUDA3', 2013, '#ffffff', 200, 'auto', 2000, 'It''s good. plz buy my car.\r\nI wanna new car. so I need a money.', '2014-04-03 12:40:38', 1),
(2, 'My A3 is better than Joon Min''s A3', 2, 'AUDRS7', 2013, '#ff0000', 170, 'auto', 1200, 'Yeah, My car is pretty, cheap and that status is good', '2014-04-03 15:35:41', 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `sell_photo`
--

CREATE TABLE IF NOT EXISTS `sell_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sell_list_id` int(11) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 테이블의 덤프 데이터 `sell_photo`
--

INSERT INTO `sell_photo` (`id`, `sell_list_id`, `photo_url`) VALUES
(1, 1, 'img/pjm_audi_2013_a3.jpg'),
(2, 2, 'img/pjm109_audi_2012_a7.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
