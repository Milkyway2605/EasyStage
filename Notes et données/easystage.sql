-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 01 Décembre 2015 à 16:28
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
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annee_scolaire`
--

CREATE TABLE IF NOT EXISTS `annee_scolaire` (
  `dateDebut` year(4) NOT NULL,
  `dateFin` year(4) NOT NULL,
  PRIMARY KEY (`dateDebut`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annee_scolaire`
--

INSERT INTO `annee_scolaire` (`dateDebut`, `dateFin`) VALUES
(2015, 2016);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `codeClasse` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` tinyint(4) NOT NULL,
  `codeSection` int(11) NOT NULL,
  PRIMARY KEY (`codeClasse`),
  KEY `FK_Classe_codeSection` (`codeSection`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`codeClasse`, `niveau`, `codeSection`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE IF NOT EXISTS `employes` (
  `codeEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `codeOrganisme` int(11) NOT NULL,
  `typeEmploye` tinyint(4) NOT NULL,
  PRIMARY KEY (`codeEmploye`),
  KEY `FK_Employes_codeEntreprise` (`codeOrganisme`),
  KEY `FK_Employes_typeEmploye_idx` (`typeEmploye`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `employes`
--

INSERT INTO `employes` (`codeEmploye`, `nom`, `prenom`, `telephone`, `email`, `fonction`, `codeOrganisme`, `typeEmploye`) VALUES
(26, 'erey', 'erhh', '00.00.00.00.00', 'severinequesque@gmail.com', 'erheh', 10, 1),
(27, 'erey', 'erhh', '00.00.00.00.00', 'severinequesque@gmail.com', 'erheh', 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE IF NOT EXISTS `enseignant` (
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enseignant`
--

INSERT INTO `enseignant` (`email`) VALUES
('guillaume.lespagnol@yahoo.com'),
('jean-francois.renaut@ac-lille.fr'),
('severinequesque@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE IF NOT EXISTS `enseigne` (
  `estReferent` tinyint(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `codeSection` int(11) NOT NULL,
  PRIMARY KEY (`email`,`codeSection`),
  KEY `FK_ENSEIGNE_codeSection` (`codeSection`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `enseigne`
--

INSERT INTO `enseigne` (`estReferent`, `email`, `codeSection`) VALUES
(1, 'guillaume.lespagnol@yahoo.com', 1),
(1, 'jean-francois.renaut@ac-lille.fr', 1),
(1, 'severinequesque@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `email` varchar(50) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `dateNaissance` date NOT NULL,
  `sexe` tinyint(4) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`email`, `telephone`, `adresse`, `ville`, `codePostal`, `dateNaissance`, `sexe`) VALUES
('guillaume.lespagnol26@gmail.com', '07.81.70.84.85', '21 rue Jean Jacques Rousseau', 'Sains-en-Gohelle', 62114, '1994-05-26', 0);

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE IF NOT EXISTS `inscrit` (
  `codeInscription` int(11) NOT NULL AUTO_INCREMENT,
  `codeClasse` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateDebut` year(4) NOT NULL,
  PRIMARY KEY (`codeInscription`),
  KEY `FK_Inscrit_codeClasse` (`codeClasse`),
  KEY `FK_Inscrit_email` (`email`),
  KEY `FK_Inscrit_dateDebut` (`dateDebut`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`codeInscription`, `codeClasse`, `email`, `dateDebut`) VALUES
(1, 2, 'guillaume.lespagnol26@gmail.com', 2015);

-- --------------------------------------------------------

--
-- Structure de la table `organisme`
--

CREATE TABLE IF NOT EXISTS `organisme` (
  `codeOrganisme` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `metierPrincipal` varchar(50) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  PRIMARY KEY (`codeOrganisme`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `organisme`
--

INSERT INTO `organisme` (`codeOrganisme`, `nom`, `adresse`, `ville`, `codePostal`, `metierPrincipal`, `telephone`) VALUES
(10, 'gsdg', 'dsg', 'dgs', 0, 'dsgsdg', '00.00.00.00.00');

-- --------------------------------------------------------

--
-- Structure de la table `periode_stage`
--

CREATE TABLE IF NOT EXISTS `periode_stage` (
  `codePeriode` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `codeClasse` int(11) NOT NULL,
  `anneeScolaire` year(4) NOT NULL,
  PRIMARY KEY (`codePeriode`),
  KEY `FK_Periode_stage_codeClasse` (`codeClasse`),
  KEY `FK_Periode_stage_dateDebut_Annee_scolaire` (`anneeScolaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `periode_stage`
--

INSERT INTO `periode_stage` (`codePeriode`, `dateDebut`, `dateFin`, `codeClasse`, `anneeScolaire`) VALUES
(1, '2016-01-11', '2016-03-04', 2, 2015);

-- --------------------------------------------------------

--
-- Structure de la table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `codeSection` int(11) NOT NULL AUTO_INCREMENT,
  `libelleSection` varchar(50) NOT NULL,
  `nbNiveau` int(11) NOT NULL,
  PRIMARY KEY (`codeSection`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `section`
--

INSERT INTO `section` (`codeSection`, `libelleSection`, `nbNiveau`) VALUES
(1, 'SIO', 2);

-- --------------------------------------------------------

--
-- Structure de la table `signataire`
--

CREATE TABLE IF NOT EXISTS `signataire` (
  `codeSignataire` int(11) NOT NULL,
  PRIMARY KEY (`codeSignataire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `signataire`
--

INSERT INTO `signataire` (`codeSignataire`) VALUES
(26);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `codeStage` int(11) NOT NULL AUTO_INCREMENT,
  `conventionImprimee` tinyint(1) NOT NULL DEFAULT '0',
  `conventionRetournee` tinyint(1) NOT NULL DEFAULT '0',
  `codeTuteur` int(11) NOT NULL,
  `codeSignataire` int(11) NOT NULL,
  `codeInscription` int(11) NOT NULL,
  `codeOrganisme` int(11) NOT NULL,
  `codePeriode` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL,
  `descriptif` longtext NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0',
  `enseignantReferent` varchar(50) NOT NULL,
  PRIMARY KEY (`codeStage`),
  KEY `FK_Stage_codeInscription` (`codeInscription`),
  KEY `fk_stage_entreprise1_idx` (`codeOrganisme`),
  KEY `fk_stage_periode_stage1_idx` (`codePeriode`),
  KEY `FK_Stage_codeTuteur_idx` (`codeTuteur`),
  KEY `FK_Stage_codeSignataire_idx` (`codeSignataire`),
  KEY `fk_stage_enseignant1_idx` (`enseignantReferent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `stage`
--

INSERT INTO `stage` (`codeStage`, `conventionImprimee`, `conventionRetournee`, `codeTuteur`, `codeSignataire`, `codeInscription`, `codeOrganisme`, `codePeriode`, `libelle`, `descriptif`, `statut`, `enseignantReferent`) VALUES
(31, 0, 0, 27, 26, 1, 10, 1, 'TEST', 'TEST', 0, 'guillaume.lespagnol@yahoo.com'),
(32, 0, 0, 27, 26, 1, 10, 1, 'zeff', 'zefgzef', 0, 'guillaume.lespagnol@yahoo.com'),
(33, 0, 0, 27, 26, 1, 10, 1, 'dsvVa', 'zfazfa', 0, 'severinequesque@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `tuteur`
--

CREATE TABLE IF NOT EXISTS `tuteur` (
  `codeTuteur` int(11) NOT NULL,
  PRIMARY KEY (`codeTuteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tuteur`
--

INSERT INTO `tuteur` (`codeTuteur`) VALUES
(27);

-- --------------------------------------------------------

--
-- Structure de la table `typeemploye`
--

CREATE TABLE IF NOT EXISTS `typeemploye` (
  `codeTypeEmploye` tinyint(4) NOT NULL,
  `libelle` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`codeTypeEmploye`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `typeemploye`
--

INSERT INTO `typeemploye` (`codeTypeEmploye`, `libelle`) VALUES
(1, 'Signataire'),
(2, 'Tuteur');

-- --------------------------------------------------------

--
-- Structure de la table `typeutilisateur`
--

CREATE TABLE IF NOT EXISTS `typeutilisateur` (
  `codeTypeUtilisateurs` tinyint(4) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`codeTypeUtilisateurs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `typeutilisateur`
--

INSERT INTO `typeutilisateur` (`codeTypeUtilisateurs`, `libelle`) VALUES
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
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `cle` varchar(32) DEFAULT NULL,
  `typeUtilisateur` tinyint(4) NOT NULL,
  `finValidite` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `FK_Utilisateurs_codeTypeUtilisateurs` (`typeUtilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`email`, `password`, `nom`, `prenom`, `cle`, `typeUtilisateur`, `finValidite`) VALUES
('guillaume.lespagnol26@gmail.com', '24cfd59ea5d12ea9c4aa9eb5130ddd06426d5a81', 'Lespagnol', 'Guillaume', 'f70d9366042df3a7fae31432f11d69ff', 3, '2015-11-07 19:00:46'),
('guillaume.lespagnol@yahoo.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'Lespagnol', 'Guillaume', NULL, 2, NULL),
('jean-francois.renaut@ac-lille.fr', '0f8c6ddbf3e581af49cc75a1888dc661bd9fca72', 'Renaut', 'Jean-François', NULL, 2, NULL),
('severinequesque@gmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'Quesque', 'Séverine', '91088fd7589d07d0adb29ae7aa8bbd7d', 2, '2015-11-05 08:28:22');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `FK_Administrateur_email` FOREIGN KEY (`email`) REFERENCES `utilisateurs` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `FK_Classe_codeSection` FOREIGN KEY (`codeSection`) REFERENCES `section` (`codeSection`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `FK_Employes_codeEntreprise` FOREIGN KEY (`codeOrganisme`) REFERENCES `organisme` (`codeOrganisme`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Employes_typeEmploye` FOREIGN KEY (`typeEmploye`) REFERENCES `typeemploye` (`codeTypeEmploye`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `FK_Enseignant_email` FOREIGN KEY (`email`) REFERENCES `utilisateurs` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD CONSTRAINT `FK_ENSEIGNE_codeSection` FOREIGN KEY (`codeSection`) REFERENCES `section` (`codeSection`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ENSEIGNE_email` FOREIGN KEY (`email`) REFERENCES `enseignant` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Etudiant_email` FOREIGN KEY (`email`) REFERENCES `utilisateurs` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inscrit`
--
ALTER TABLE `inscrit`
  ADD CONSTRAINT `FK_Inscrit_codeClasse` FOREIGN KEY (`codeClasse`) REFERENCES `classe` (`codeClasse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Inscrit_dateDebut` FOREIGN KEY (`dateDebut`) REFERENCES `annee_scolaire` (`dateDebut`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Inscrit_email` FOREIGN KEY (`email`) REFERENCES `etudiant` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `periode_stage`
--
ALTER TABLE `periode_stage`
  ADD CONSTRAINT `FK_Periode_stage_codeClasse` FOREIGN KEY (`codeClasse`) REFERENCES `classe` (`codeClasse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Periode_stage_dateDebut` FOREIGN KEY (`anneeScolaire`) REFERENCES `annee_scolaire` (`dateDebut`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `signataire`
--
ALTER TABLE `signataire`
  ADD CONSTRAINT `FK_Signataire_codeSalarie` FOREIGN KEY (`codeSignataire`) REFERENCES `employes` (`codeEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `fk_stage_codeEntreprise` FOREIGN KEY (`codeOrganisme`) REFERENCES `organisme` (`codeOrganisme`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Stage_codeInscription` FOREIGN KEY (`codeInscription`) REFERENCES `inscrit` (`codeInscription`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Stage_codeSignataire` FOREIGN KEY (`codeSignataire`) REFERENCES `signataire` (`codeSignataire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Stage_codeTuteur` FOREIGN KEY (`codeTuteur`) REFERENCES `tuteur` (`codeTuteur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_stage_enseignantReferent` FOREIGN KEY (`enseignantReferent`) REFERENCES `enseignant` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stage_periode_stage1` FOREIGN KEY (`codePeriode`) REFERENCES `periode_stage` (`codePeriode`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tuteur`
--
ALTER TABLE `tuteur`
  ADD CONSTRAINT `FK_Tuteur_codeSalarie` FOREIGN KEY (`codeTuteur`) REFERENCES `employes` (`codeEmploye`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `fk_typeutilisateur_codeTypeUtilisateurs` FOREIGN KEY (`typeUtilisateur`) REFERENCES `typeutilisateur` (`codeTypeUtilisateurs`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
