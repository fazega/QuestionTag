-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 14 Juin 2016 à 16:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `questiontag`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat_messages`
--

CREATE TABLE IF NOT EXISTS `chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chat` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status_message` varchar(100) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `id_chat`, `pseudo`, `message`, `status_message`, `date`) VALUES
(1, 1, 'fazega', 'yo', 'normal', '2016-06-12 22:06:20'),
(2, 1, 'fazega', 'lol', 'normal', '2016-06-14 12:08:35'),
(3, 1, 'fazega', 'treztrz', 'normal', '2016-06-14 12:56:03');

-- --------------------------------------------------------

--
-- Structure de la table `chat_users`
--

CREATE TABLE IF NOT EXISTS `chat_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chat` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `chat_users`
--

INSERT INTO `chat_users` (`id`, `id_chat`, `pseudo`, `status`) VALUES
(1, 1, 'fazega', 'main'),
(2, 1, 'jean-marc', 'normal');

-- --------------------------------------------------------

--
-- Structure de la table `live_questions`
--

CREATE TABLE IF NOT EXISTS `live_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `question` text NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `live_questions`
--

INSERT INTO `live_questions` (`id`, `id_user`, `question`, `date`) VALUES
(1, 1, 'Quelles sont les réponses au qcm d''eco ? #polytechnique #eco', '2016-05-31 09:13:11');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` text NOT NULL,
  `creation_date` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `mail`, `creation_date`) VALUES
(1, 'fazega', '0000', 'fazegame@hotmail.fr', '2016-05-20 10:03:13'),
(2, 'pad', '1111', 'pad@caca', '2016-05-20 10:03:32'),
(3, 'allo123', 'caca', 'csdfezar', '2016-05-20 15:49:47');

-- --------------------------------------------------------

--
-- Structure de la table `users_domains`
--

CREATE TABLE IF NOT EXISTS `users_domains` (
  `id_user` int(11) NOT NULL,
  `domain` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users_domains`
--

INSERT INTO `users_domains` (`id_user`, `domain`) VALUES
(1, '#informatique'),
(1, '#python'),
(1, '#piano');

-- --------------------------------------------------------

--
-- Structure de la table `users_questions`
--

CREATE TABLE IF NOT EXISTS `users_questions` (
  `id_user` int(11) NOT NULL,
  `question` text NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users_questions`
--

INSERT INTO `users_questions` (`id_user`, `question`, `date`) VALUES
(1, 'Comment monter son raspberry pi ? #raspberry #informatique #linux', '2016-05-10 13:16:47');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
