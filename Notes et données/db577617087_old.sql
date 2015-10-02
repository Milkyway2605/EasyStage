-- phpMyAdmin SQL Dump
-- version 4.0.10.9
-- http://www.phpmyadmin.net
--
-- Client: db577617087.db.1and1.com
-- Généré le: Ven 25 Septembre 2015 à 16:40
-- Version du serveur: 5.1.73-log
-- Version de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `db577617087`
--

-- --------------------------------------------------------

--
-- Structure de la table `ANNEEUNIVERSITAIRE`
--

CREATE TABLE IF NOT EXISTS `ANNEEUNIVERSITAIRE` (
  `debutAnneeUniversitaire` year(4) NOT NULL,
  `finAnneeUniversitaire` year(4) NOT NULL,
  PRIMARY KEY (`debutAnneeUniversitaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ANNEEUNIVERSITAIRE`
--

INSERT INTO `ANNEEUNIVERSITAIRE` (`debutAnneeUniversitaire`, `finAnneeUniversitaire`) VALUES
(2014, 2015);

-- --------------------------------------------------------

--
-- Structure de la table `CLASSE`
--

CREATE TABLE IF NOT EXISTS `CLASSE` (
  `codeClasse` int(11) NOT NULL AUTO_INCREMENT,
  `codeSection` smallint(6) NOT NULL,
  `niveau` tinyint(4) NOT NULL,
  `anneeUniversitaire` year(4) NOT NULL,
  PRIMARY KEY (`codeClasse`),
  KEY `codeSection` (`codeSection`,`anneeUniversitaire`),
  KEY `anneeUniversitaire` (`anneeUniversitaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `CLASSE`
--

INSERT INTO `CLASSE` (`codeClasse`, `codeSection`, `niveau`, `anneeUniversitaire`) VALUES
(1, 1, 1, 2014),
(2, 1, 2, 2014);

-- --------------------------------------------------------

--
-- Structure de la table `EMPLOYE`
--

CREATE TABLE IF NOT EXISTS `EMPLOYE` (
  `codeEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `codeEntreprise` int(11) NOT NULL,
  `estTuteur` tinyint(1) NOT NULL,
  `estSignataire` tinyint(1) NOT NULL,
  PRIMARY KEY (`codeEmploye`),
  KEY `codeEntreprise` (`codeEntreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Contenu de la table `EMPLOYE`
--

INSERT INTO `EMPLOYE` (`codeEmploye`, `nom`, `fonction`, `email`, `telephone`, `codeEntreprise`, `estTuteur`, `estSignataire`) VALUES
(61, 'Quesque', 'Enseignante', 'severinequesque@gmail.com', '06-60-48-52-15', 9, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ENSEIGNER`
--

CREATE TABLE IF NOT EXISTS `ENSEIGNER` (
  `loginProfesseur` varchar(50) NOT NULL,
  `codeSection` smallint(6) NOT NULL,
  `codeOption` int(11) DEFAULT NULL,
  PRIMARY KEY (`loginProfesseur`,`codeSection`),
  KEY `fk_codeSection_ENSEIGNER` (`codeSection`),
  KEY `codeOption` (`codeOption`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ENSEIGNER`
--

INSERT INTO `ENSEIGNER` (`loginProfesseur`, `codeSection`, `codeOption`) VALUES
('severinequesque@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ENTREPRISE`
--

CREATE TABLE IF NOT EXISTS `ENTREPRISE` (
  `codeEntreprise` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSociale` varchar(30) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `metierPrincipal` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  PRIMARY KEY (`codeEntreprise`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `ENTREPRISE`
--

INSERT INTO `ENTREPRISE` (`codeEntreprise`, `raisonSociale`, `telephone`, `metierPrincipal`, `adresse`) VALUES
(2, 'OVH', '0972101007', 'Hébergement, réseau et télécom', '2 Rue Kellermann, 59100 Roubaix'),
(9, 'Lycée André Malraux', '03-21-64-61-61', 'Enseignement', '314 Rue Jules Massenet, 62400 Béthune');

-- --------------------------------------------------------

--
-- Structure de la table `ETUDIANT`
--

CREATE TABLE IF NOT EXISTS `ETUDIANT` (
  `loginEtudiant` varchar(50) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  PRIMARY KEY (`loginEtudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ETUDIANT`
--

INSERT INTO `ETUDIANT` (`loginEtudiant`, `telephone`) VALUES
('guillaume.lespagnol26@gmail.com', '07-81-70-84-85');

-- --------------------------------------------------------

--
-- Structure de la table `INSCRIPTION`
--

CREATE TABLE IF NOT EXISTS `INSCRIPTION` (
  `codeInscription` int(11) NOT NULL AUTO_INCREMENT,
  `codeClasse` int(11) NOT NULL,
  `loginEtudiant` varchar(50) NOT NULL,
  `codeOption` int(11) DEFAULT NULL,
  PRIMARY KEY (`codeInscription`),
  KEY `codeClasse` (`codeClasse`,`loginEtudiant`),
  KEY `loginEtudiant` (`loginEtudiant`),
  KEY `codeOption` (`codeOption`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `INSCRIPTION`
--

INSERT INTO `INSCRIPTION` (`codeInscription`, `codeClasse`, `loginEtudiant`, `codeOption`) VALUES
(8, 1, 'guillaume.lespagnol26@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `OPTION`
--

CREATE TABLE IF NOT EXISTS `OPTION` (
  `codeOption` int(11) NOT NULL AUTO_INCREMENT,
  `codeSection` smallint(6) NOT NULL,
  `libelleOption` varchar(50) NOT NULL,
  PRIMARY KEY (`codeOption`),
  KEY `codeSection` (`codeSection`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `OPTION`
--

INSERT INTO `OPTION` (`codeOption`, `codeSection`, `libelleOption`) VALUES
(1, 1, 'SLAM');

-- --------------------------------------------------------

--
-- Structure de la table `PERIODESTAGE`
--

CREATE TABLE IF NOT EXISTS `PERIODESTAGE` (
  `codePeriodeStage` int(11) NOT NULL AUTO_INCREMENT,
  `codeClasse` int(11) NOT NULL,
  `dateDebutStage` date DEFAULT NULL,
  `dateFinStage` date DEFAULT NULL,
  PRIMARY KEY (`codePeriodeStage`),
  KEY `codeClasse` (`codeClasse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `PERIODESTAGE`
--

INSERT INTO `PERIODESTAGE` (`codePeriodeStage`, `codeClasse`, `dateDebutStage`, `dateFinStage`) VALUES
(1, 1, '2015-05-26', '2015-06-25');

-- --------------------------------------------------------

--
-- Structure de la table `PROFESSEUR`
--

CREATE TABLE IF NOT EXISTS `PROFESSEUR` (
  `loginProfesseur` varchar(50) NOT NULL,
  PRIMARY KEY (`loginProfesseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `PROFESSEUR`
--

INSERT INTO `PROFESSEUR` (`loginProfesseur`) VALUES
('severinequesque@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `SECTION`
--

CREATE TABLE IF NOT EXISTS `SECTION` (
  `codeSection` smallint(6) NOT NULL AUTO_INCREMENT,
  `libelleSection` varchar(30) NOT NULL,
  PRIMARY KEY (`codeSection`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `SECTION`
--

INSERT INTO `SECTION` (`codeSection`, `libelleSection`) VALUES
(1, 'SIO');

-- --------------------------------------------------------

--
-- Structure de la table `STAGE`
--

CREATE TABLE IF NOT EXISTS `STAGE` (
  `codeStage` int(11) NOT NULL AUTO_INCREMENT,
  `codeInscription` int(11) NOT NULL,
  `loginProfesseur` varchar(50) NOT NULL,
  `codePeriodeStage` int(11) NOT NULL,
  `codeEntreprise` int(11) NOT NULL,
  `codeTuteur` int(11) NOT NULL,
  `codeSignataire` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `descriptif` longtext NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`codeStage`),
  KEY `codeInscription` (`codeInscription`,`codePeriodeStage`,`codeTuteur`),
  KEY `codePeriodeStage` (`codePeriodeStage`),
  KEY `codeTuteur` (`codeTuteur`),
  KEY `codeEntreprise` (`codeEntreprise`),
  KEY `codeSignataire` (`codeSignataire`),
  KEY `loginProfesseur` (`loginProfesseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `STAGE`
--

INSERT INTO `STAGE` (`codeStage`, `codeInscription`, `loginProfesseur`, `codePeriodeStage`, `codeEntreprise`, `codeTuteur`, `codeSignataire`, `libelle`, `descriptif`, `statut`) VALUES
(40, 8, 'severinequesque@gmail.com', 1, 9, 61, 61, 'Développement web', 'Développement d''une application web pour la gestion de stage', 0);

-- --------------------------------------------------------

--
-- Structure de la table `TYPEUTILISATEUR`
--

CREATE TABLE IF NOT EXISTS `TYPEUTILISATEUR` (
  `codeType` tinyint(4) NOT NULL,
  `libelleType` varchar(30) NOT NULL,
  PRIMARY KEY (`codeType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `TYPEUTILISATEUR`
--

INSERT INTO `TYPEUTILISATEUR` (`codeType`, `libelleType`) VALUES
(1, 'Etudiant'),
(2, 'Professeur');

-- --------------------------------------------------------

--
-- Structure de la table `UTILISATEURS`
--

CREATE TABLE IF NOT EXISTS `UTILISATEURS` (
  `login` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `typeUtilisateur` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`login`),
  KEY `typeUtilisateur` (`typeUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `UTILISATEURS`
--

INSERT INTO `UTILISATEURS` (`login`, `password`, `nom`, `prenom`, `typeUtilisateur`) VALUES
('guillaume.lespagnol26@gmail.com', 'root', 'Lespagnol', 'Guillaume', 1),
('severinequesque@gmail.com', 'root', 'Quesque', 'Séverine', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `CLASSE`
--
ALTER TABLE `CLASSE`
  ADD CONSTRAINT `fk_codeSection_CLASSE` FOREIGN KEY (`codeSection`) REFERENCES `SECTION` (`codeSection`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_dateDebutAnneeUniversitaire_CLASSE` FOREIGN KEY (`anneeUniversitaire`) REFERENCES `ANNEEUNIVERSITAIRE` (`debutAnneeUniversitaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `EMPLOYE`
--
ALTER TABLE `EMPLOYE`
  ADD CONSTRAINT `fk_codeEntreprise_EMPLOYE` FOREIGN KEY (`codeEntreprise`) REFERENCES `ENTREPRISE` (`codeEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ENSEIGNER`
--
ALTER TABLE `ENSEIGNER`
  ADD CONSTRAINT `fk_codeOption_ENSEIGNER` FOREIGN KEY (`codeOption`) REFERENCES `OPTION` (`codeOption`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codeSection_ENSEIGNER` FOREIGN KEY (`codeSection`) REFERENCES `SECTION` (`codeSection`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loginProfesseur_ENSEIGNER` FOREIGN KEY (`loginProfesseur`) REFERENCES `PROFESSEUR` (`loginProfesseur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ETUDIANT`
--
ALTER TABLE `ETUDIANT`
  ADD CONSTRAINT `fk_loginUtilisateur_ETUDIANT` FOREIGN KEY (`loginEtudiant`) REFERENCES `UTILISATEURS` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `INSCRIPTION`
--
ALTER TABLE `INSCRIPTION`
  ADD CONSTRAINT `fk_codeClasse_INSCRIPTION` FOREIGN KEY (`codeClasse`) REFERENCES `CLASSE` (`codeClasse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codeOption_INSCRIPTION` FOREIGN KEY (`codeOption`) REFERENCES `OPTION` (`codeOption`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loginEtudiant_INSCRIPTION` FOREIGN KEY (`loginEtudiant`) REFERENCES `ETUDIANT` (`loginEtudiant`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `OPTION`
--
ALTER TABLE `OPTION`
  ADD CONSTRAINT `fk_codeSection_OPTION` FOREIGN KEY (`codeSection`) REFERENCES `SECTION` (`codeSection`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `PERIODESTAGE`
--
ALTER TABLE `PERIODESTAGE`
  ADD CONSTRAINT `fk_codeClasse_PERIODESTAGE` FOREIGN KEY (`codeClasse`) REFERENCES `CLASSE` (`codeClasse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `PROFESSEUR`
--
ALTER TABLE `PROFESSEUR`
  ADD CONSTRAINT `fk_loginProfesseur_PROFESSEUR` FOREIGN KEY (`loginProfesseur`) REFERENCES `UTILISATEURS` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `STAGE`
--
ALTER TABLE `STAGE`
  ADD CONSTRAINT `fk_codeEmploye_signataire_STAGE` FOREIGN KEY (`codeSignataire`) REFERENCES `EMPLOYE` (`codeEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codeEmploye_tuteur_STAGE` FOREIGN KEY (`codeTuteur`) REFERENCES `EMPLOYE` (`codeEmploye`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codeEntreprise_STAGE` FOREIGN KEY (`codeEntreprise`) REFERENCES `ENTREPRISE` (`codeEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codeInscription_STAGE` FOREIGN KEY (`codeInscription`) REFERENCES `INSCRIPTION` (`codeInscription`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codePeriodeStage_STAGE` FOREIGN KEY (`codePeriodeStage`) REFERENCES `PERIODESTAGE` (`codePeriodeStage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loginProfesseur_STAGE` FOREIGN KEY (`loginProfesseur`) REFERENCES `PROFESSEUR` (`loginProfesseur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `UTILISATEURS`
--
ALTER TABLE `UTILISATEURS`
  ADD CONSTRAINT `fk_typeUtilisateur` FOREIGN KEY (`typeUtilisateur`) REFERENCES `TYPEUTILISATEUR` (`codeType`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
