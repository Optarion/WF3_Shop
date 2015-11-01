-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 01 Novembre 2015 à 23:34
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `wf3_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(60) NOT NULL,
  `cdate` datetime NOT NULL,
  `mdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `password`, `cdate`, `mdate`) VALUES
(6, 'Nibbler', 'a@a.fr', '$2y$10$QKkDds7sSbY5dTb97Gb1pOwH66kKyX8.VY/lSE4YltEx4ANj4f7Ta', '2015-11-01 17:26:40', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category` int(3) DEFAULT '0',
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `rating` decimal(1,1) DEFAULT '0.0',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `description`, `price`, `picture`, `rating`, `date`) VALUES
(1, 5, 'lorem ipsum dolor sit amet, consectetur adipiscing elit', 'tiam fermentum laoreet nisl sit amet ullamcorper. donec ultricies feugiat odio et consectetur. duis et facilisis mi. aenean tempus massa tellus, ut posuere magna luctus at. fusce egestas massa purus, eu tempor est vulputate eleifend. phasellus sollicitudin, turpis id venenatis rhoncus, erat lectus eleifend risus, at interdum sem dolor vitae tellus. duis dui risus, auctor eget metus ullamcorper, tincidunt ornare nisi. quisque luctus faucibus eleifend.', '40.90', 'product1.jpg', '0.2', '2015-11-01 13:59:44'),
(2, 1, 'phasellus at justo iaculis arcu hendrerit euismod sit amet a nibh', 'liquam eleifend dolor vel molestie pulvinar. donec vestibulum metus id neque pellentesque, ac pulvinar est luctus. aliquam faucibus sem et risus eleifend, at venenatis massa fringilla. sed sit amet posuere urna, non molestie enim. donec fringilla arcu et urna pellentesque, et viverra arcu aliquet. nunc dapibus hendrerit ante vitae bibendum. duis commodo felis nec diam venenatis luctus. fusce tempus dolor eu orci vulputate, eu blandit mi rutrum.', '35.50', 'product2.jpg', '0.0', '2015-10-29 13:59:44'),
(3, 1, 'quisque non est et mauris ornare viverra', 'unc a orci eget sem tincidunt pulvinar. vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. in et hendrerit ipsum, a semper magna. suspendisse convallis leo at fermentum imperdiet. maecenas pretium sollicitudin ligula eu tempus. vestibulum accumsan, massa et laoreet bibendum, justo arcu mattis libero, eget ullamcorper nisl arcu sit amet tortor. morbi a justo sollicitudin, ornare erat ac, sagittis tortor. nunc orci sapien, facilisis ut tincidunt a, mattis eget neque.', '105.79', 'product3.jpg', '0.9', '2015-10-22 13:59:44'),
(4, 3, 'mauris aliquet lorem arcu, vel semper ex posuere quis', 'ras ac nulla mattis, elementum velit eu, tristique tellus. in rhoncus elit at erat efficitur vestibulum. quisque euismod fermentum accumsan. pellentesque id ullamcorper quam. vestibulum vehicula sit amet lectus gravida porta. pellentesque feugiat dignissim ultricies.', '105.79', 'product4.jpg', '0.0', '2015-10-15 13:59:44'),
(5, 3, 'etiam vitae justo ante', 'urabitur gravida in justo dictum commodo. in hac habitasse platea dictumst. nulla eget dui vehicula, venenatis magna a, tincidunt turpis. donec a aliquam mi, eget interdum diam. nullam turpis elit, mattis id porttitor nec, aliquet vitae mi. mauris vel sem quis libero tempor posuere. nunc non aliquet nisl, at accumsan diam. phasellus vitae viverra quam. nam iaculis, arcu eu aliquam dictum, mi leo pharetra nunc, eu luctus sapien tellus sed erat. nullam tempus sapien vel ipsum accumsan, in porttitor elit varius. vestibulum vel tortor sed justo vehicula pretium. praesent magna purus, euismod et vestibulum vitae, condimentum a mauris. interdum et malesuada fames ac ante ipsum primis in faucibus. aenean ultrices nibh in nunc rhoncus, ac aliquet ante mollis.', '35.50', 'product5.jpg', '0.0', '2015-10-01 13:59:44'),
(6, 4, 'class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos', 'ed maximus eros eget sem mollis bibendum. donec convallis viverra metus a mattis. vivamus consectetur ultrices justo nec sollicitudin. vivamus nibh est, faucibus id nulla vel, sodales interdum sem. pellentesque congue et magna quis vehicula. cras sagittis lacinia sapien.', '35.50', 'product6.jpg', '0.0', '2015-09-24 13:59:44'),
(7, 1, 'aliquam quis dui nec augue pharetra sodales', 'uisque vehicula ut nibh sed imperdiet. fusce ut leo nunc. vivamus id tortor at lorem ullamcorper malesuada. suspendisse tempor nisi orci, vitae rhoncus neque egestas vitae. vestibulum nisi magna, placerat a orci et, elementum condimentum nisl. integer semper purus orci, non volutpat turpis gravida eu. sed nec sagittis purus, at mattis metus. donec suscipit tellus enim, a sollicitudin sem vulputate quis. donec vitae euismod nisl. vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. suspendisse vehicula mauris nunc, et fermentum elit malesuada vel. vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae. integer est risus, scelerisque ut ipsum sed, vulputate pellentesque libero. fusce et diam ut urna tincidunt porttitor eu in ex. suspendisse potenti.', '105.79', 'product7.jpg', '0.0', '2015-09-10 13:59:44'),
(8, 5, 'cras molestie non metus in posuere', 'tiam sollicitudin augue sit amet luctus tincidunt. in dapibus nulla sit amet elit molestie, id viverra nunc blandit. in tortor nibh, scelerisque sit amet imperdiet non, feugiat sit amet eros. fusce porttitor vitae dui in placerat. aenean non malesuada ligula. morbi sit amet tortor vel tortor tincidunt posuere. praesent elit sem, ultricies vitae auctor venenatis, volutpat mattis ex. maecenas iaculis mi et sem finibus tristique. morbi ut luctus enim. integer posuere sem turpis. quisque maximus diam aliquam dui imperdiet, nec cursus quam pellentesque. duis ipsum nibh, tristique nec nulla eget, auctor interdum lectus. phasellus quis fringilla mauris. integer ex nisi, rhoncus ac ullamcorper a, maximus in justo. ut in nunc dictum, lacinia risus ut, mattis sem.', '40.90', 'product8.jpg', '0.5', '2015-09-09 13:59:44'),
(9, 3, 'vestibulum tempor euismod lacus', 't bibendum, diam in laoreet eleifend, nisi leo fermentum lacus, ut vulputate nulla mauris nec mi. ut rutrum libero sit amet mi imperdiet luctus. fusce rhoncus enim lobortis metus pulvinar luctus. pellentesque pharetra auctor lacus, nec venenatis odio tempus euismod. donec ut mi orci. donec semper consectetur turpis, et consectetur ex viverra id.', '25.50', 'product9.jpg', '0.0', '2015-09-08 13:59:44'),
(10, 5, 'nam aliquet eros eu erat tincidunt imperdiet', 'unc id mi a libero consequat blandit lobortis nec erat. duis eget elit vulputate, viverra nulla ac, aliquam neque. praesent neque nulla, pretium vitae dolor consectetur, porttitor consequat risus. duis dictum ac urna ut mattis. suspendisse id quam ut tellus viverra facilisis sit amet et odio. in tempor, lorem quis lobortis hendrerit, dui nisi hendrerit metus, vitae tristique enim mauris eu nisi.', '25.50', 'product10.jpg', '0.0', '2015-09-05 13:59:44');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
