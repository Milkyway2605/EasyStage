-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 25 Septembre 2015 à 16:41
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `easystage`
--

-- --------------------------------------------------------

--
-- Structure de la table `typeutilisateurs`
--

CREATE TABLE IF NOT EXISTS `typeutilisateurs` (
  `codeTypeUtilisateur` tinyint(4) NOT NULL,
  `libelleTypeUtilisateur` varchar(50) NOT NULL,
  PRIMARY KEY (`codeTypeUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeutilisateurs`
--

INSERT INTO `typeutilisateurs` (`codeTypeUtilisateur`, `libelleTypeUtilisateur`) VALUES
(1, 'Administrateur'),
(2, 'Enseignant'),
(3, 'Etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `email` varchar(50) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `typeUtilisateur` tinyint(4) NOT NULL COMMENT 'Correspond au type d''utilisateur',
  `cle` varchar(32) DEFAULT NULL,
  `sexe` enum('masculin','feminin') NOT NULL,
  PRIMARY KEY (`email`),
  KEY `typeUtilisateur` (`typeUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`email`, `password`, `prenom`, `nom`, `typeUtilisateur`, `cle`, `sexe`) VALUES
('guillaume.lespagnol26@gmail.com', '24cfd59ea5d12ea9c4aa9eb5130ddd06426d5a81', 'Guillaume', 'Lespagnol', 2, '01', 'masculin');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_typeUtilisateur` FOREIGN KEY (`typeUtilisateur`) REFERENCES `typeutilisateurs` (`codeTypeUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
