-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2014 at 05:45 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `travelcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` int(11) NOT NULL COMMENT '0-enquiry, 1-feedback, 2-comment',
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `p_name` varchar(25) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0-pending, 1-done, 2-cancel',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `days` int(11) NOT NULL,
  `nights` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `image`, `date`, `days`, `nights`) VALUES
(1, 'Genting Highlands', 'Genting Highlands otherwise known as Resorts World Genting, is a hill resort in Malaysia developed by Genting Group.\n\nThe hill resort is at an average elevation of 1,740 metres (5,710 ft) within the Titiwangsa Mountains on the border between the states of Pahang and Selangor of Malaysia. Resorts World Genting is operated by Genting Malaysia Berhad (formerly known as Resorts World Bhd), which also operates Awana chain of resorts ', 350, 'img/products/1393759304_genting.jpg', '2014-04-02', 2, 3),
(2, 'Langkawi Island', 'Langkawi, officially known as Langkawi the Jewel of Kedah (Malay: Langkawi Permata Kedah) is an archipelago of 104 islands in the Andaman Sea, some 30 km off the mainland coast of northwestern Malaysia. The islands are a part of the state of Kedah, which is adjacent to the Thai border. On July 15, 2008, Sultan Abdul Halim of Kedah had consented to the change of name to Langkawi Permata Kedah in conjunction with his Golden Jubilee Celebration. By far the largest of the islands is the eponymous Pulau Langkawi with a population of some 64,792, the only other inhabited island being nearby Pulau Tuba. Langkawi is also an administrative district with the town of Kuah as largest town. Langkawi is a duty-free island.abc', 450, 'img/products/langkawi.png', '2014-04-02', 4, 3),
(4, 'Kuala Lumpur', 'Kuala Lumpur sometimes abbreviated as K.L.,[6] is the federal capital and most populous city in Malaysia.[7] The city covers an area of 243 km2 (94 sq mi) and has an estimated population of 1.6 million as of 2012.[7] Greater Kuala Lumpur, also known as the Klang Valley, is an urban agglomeration of 5.7 million as of 2010.[3] It is among the fastest growing metropolitan regions in the country, in terms of population and economy.', 250, 'img/products/kl.png', '2014-04-03', 3, 2),
(5, 'Penang island', 'Penang Island is part of the state of Penang, on the west coat of Peninsular Malaysia. It was named Prince of Wales Island when it was occupied by the British East India Company on 12 August 1786, in honour of the birthday of the Prince of Wales, later King George IV. The capital, George Town, was named after the reigning King George III.\n\nMalaysia has another island called "Pulau Pinang", which is a diving site located in South China Sea and part of the Johor Marine Park, which consists of a group of islands: Pulau Aur, Pulau Dayang, Pulau Lang, and Pulau Pinang itself.', 300, 'img/products/penang.png', '2014-04-03', 2, 2),
(10, 'Malacca', 'Malacca sometimes abbreviated as K.L.,[6] is the federal capital and most populous city in Malaysia.[7] The city covers an area of 243 km2 (94 sq mi) and has an estimated population of 1.6 million as of 2012.[7] Greater Kuala Lumpur, also known as the Klang Valley, is an urban agglomeration of 5.7 million as of 2010.[3] It is among the fastest growing metropolitan regions in the country, in terms of population and economy.', 250, 'img/products/1394104262_malacca.jpg', '2014-04-01', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `role`) VALUES
(10, 'admin', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'admin', 'admin'),
(12, 'customer', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Fayzan', 'member'),
(36, 'fayzan@hotmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'Fayzan Siddiqui', 'member');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
