-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 08 Novembre 2014 à 15:54
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pixhub`
--

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user_id`),
  KEY `fk_album_user_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `albums`
--

INSERT INTO `albums` (`id`, `name`, `user_id`) VALUES
(1, 'Panorama', 35),
(4, 'Macro', 65);

-- --------------------------------------------------------

--
-- Structure de la table `exifs`
--

CREATE TABLE IF NOT EXISTS `exifs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `height` int(5) NOT NULL,
  `width` int(5) NOT NULL,
  `cameraModel` varchar(25) NOT NULL,
  `cameraBrand` varchar(25) NOT NULL,
  `iso` varchar(15) NOT NULL,
  `aperture` varchar(15) NOT NULL,
  `exposure` varchar(15) NOT NULL,
  `focal` varchar(15) NOT NULL,
  `flash` tinyint(1) NOT NULL DEFAULT '0',
  `orientation` varchar(15) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `exifs`
--

INSERT INTO `exifs` (`id`, `height`, `width`, `cameraModel`, `cameraBrand`, `iso`, `aperture`, `exposure`, `focal`, `flash`, `orientation`, `date`) VALUES
(1, 100, 100, 'Nikon', '', '', '', '', '', 0, '', NULL),
(2, 200, 200, 'Canon', '', '', '', '', '', 0, '', NULL),
(3, 300, 300, 'Nikon', '', '', '', '', '', 0, '', NULL),
(4, 400, 400, 'Minolta', '', '', '', '', '', 0, '', NULL),
(5, 500, 500, 'Apple iPhone', '', '', '', '', '', 0, '', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `dateUpload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `album_id` int(11) NOT NULL,
  `exif_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `exif_id_UNIQUE` (`exif_id`),
  KEY `fk_image_album_idx` (`album_id`),
  KEY `fk_image_exif_idx` (`exif_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `name`, `description`, `dateUpload`, `album_id`, `exif_id`) VALUES
(1, 'img1', '', '2014-11-06 15:12:12', 1, 1),
(2, 'img3', '', '2014-11-06 15:12:28', 1, 3),
(4, 'img4', '', '2014-11-06 15:12:51', 1, 4),
(5, 'img5', '', '2014-11-06 15:12:59', 1, 5),
(6, 'macro.png', '', '2014-11-07 15:26:38', 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `image_has_tag`
--

CREATE TABLE IF NOT EXISTS `image_has_tag` (
  `image_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`,`tag_id`),
  KEY `fk_image_has_tag_tag_idx` (`tag_id`),
  KEY `fk_image_has_tag_image_idx` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image_has_tag`
--

INSERT INTO `image_has_tag` (`image_id`, `tag_id`) VALUES
(1, 1),
(2, 1),
(4, 1),
(1, 2),
(2, 2),
(1, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'yolo'),
(2, 'swag'),
(3, 'filter');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `password` varchar(64) NOT NULL,
  `cover` varchar(20) NOT NULL,
  `site` varchar(20) NOT NULL,
  `mail` varchar(35) NOT NULL,
  `location` varchar(50) NOT NULL DEFAULT '-',
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `cover`, `site`, `mail`, `location`, `description`) VALUES
(35, 'Jack', '$2y$10$f/5r3wrHmKpMrv8PDYQV/e5pOd1qx61kJ9v4ckGFpYGBlyYzjOAHS', '', '', 'c@c.com', '-', 'sdfd'),
(65, 'Eddy', '$2y$10$2T/6EuFYAskSH87mB85F7OmARTxSU1OXCGgyuh0n5CAT/DBdXaxt2', '-', '', 'ed.strambini@bluewin.ch', 'Suisse', 'Bla bla bla '),
(66, 'Marc', '$2y$10$wKsQnp4skJx/QR2FBF9/U.1W6eCdhbTU4Z/34X9osHCt7AS1al5JS', '-', '', 'marc@marc.com', '', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `fk_album_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_image_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_image_exif` FOREIGN KEY (`exif_id`) REFERENCES `exifs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_has_tag`
--
ALTER TABLE `image_has_tag`
  ADD CONSTRAINT `fk_image_has_tag_image` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_image_has_tag_tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
