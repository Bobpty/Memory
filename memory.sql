-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 11 Février 2018 à 19:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `memory`
--

-- --------------------------------------------------------

--
-- Structure de la table `choisir`
--

CREATE TABLE IF NOT EXISTS `choisir` (
  `numImage` int(11) NOT NULL,
  `numPartie` int(11) NOT NULL,
  PRIMARY KEY (`numImage`,`numPartie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(11) NOT NULL AUTO_INCREMENT,
  `chemin` varchar(255) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`idImage`, `chemin`) VALUES
(1, 'src/Images/Belzebuth.png'),
(2, 'src/Images/Biloute.png'),
(3, 'src/Images/Don_de_dieu.png'),
(4, 'src/Images/Fin_du_monde.png'),
(5, 'src/Images/Jacquie&Michel.png'),
(6, 'src/Images/Kekette.png'),
(7, 'src/Images/La_Cagole.png'),
(8, 'src/Images/La_mere_vertus.png'),
(9, 'src/Images/Levrette.png'),
(10, 'src/Images/Levrette_cherry.png'),
(11, 'src/Images/Maudite.png'),
(12, 'src/Images/Nessies_Monster_Mash.png'),
(13, 'src/Images/Rince_Cochon.png'),
(14, 'src/Images/Trois_pistoles.png'),
(15, 'src/Images/Dos.png');

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `idJoueur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  PRIMARY KEY (`idJoueur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`idJoueur`, `pseudo`) VALUES
(16, 'Bobby'),
(17, 'Doe'),
(18, 'Moi'),
(19, 'Abe'),
(20, 'Shrykull'),
(21, 'moimoi');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE IF NOT EXISTS `partie` (
  `idPartie` int(11) NOT NULL AUTO_INCREMENT,
  `nbCoups` int(10) NOT NULL,
  `temps` int(3) NOT NULL,
  `idJoueur` int(11) NOT NULL,
  PRIMARY KEY (`idPartie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Contenu de la table `partie`
--

INSERT INTO `partie` (`idPartie`, `nbCoups`, `temps`, `idJoueur`) VALUES
(33, 6, 26, 16),
(34, 7, 30, 17),
(35, 8, 26, 18),
(36, 5, 20, 19),
(37, 6, 22, 20),
(38, 6, 24, 21);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
