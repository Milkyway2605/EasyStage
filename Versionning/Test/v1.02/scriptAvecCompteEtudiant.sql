-- phpMyAdmin SQL Dump
-- version 4.0.10.9
-- http://www.phpmyadmin.net
--
-- Client: db577617087.db.1and1.com
-- Généré le: Sam 07 Novembre 2015 à 15:04
-- Version du serveur: 5.1.73-log
-- Version de PHP: 5.5.30

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `employes`
--

INSERT INTO `employes` (`codeEmploye`, `nom`, `prenom`, `telephone`, `email`, `fonction`, `codeOrganisme`, `typeEmploye`) VALUES
(3, 'Tricquet', 'Sylvain', '06.81.95.25.83', 'sylvain.tricquet@do-good.fr', 'Chef d''entreprise', 2, 1),
(4, 'Tricquet', 'Sylvain', '06.81.95.25.83', 'sylvain.tricquet@do-good.fr', 'Chef d''entreprise', 2, 2),
(9, 'Montewis', 'Arnaud', '03.91.80.18.18', 'arnaud@waigeo.fr', 'Président/Fondateur', 5, 1),
(10, 'Montewis', 'Arnaud', '03.91.80.18.18', 'arnaud@waigeo.fr', 'Président/Fondateur', 5, 2),
(13, 'Depraetere', 'Cedric', '06.95.89.74.86', 'cd@zetark.fr', 'Commercial', 7, 1),
(14, 'Aernout', 'Sélène', '06.03.29.89.70', 'sa@zetark.fr', 'Directrice ', 7, 2);

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
('jean-francois.renaut@ac-lille.fr'),
('jean-jacques.hanot@ac-lille.fr'),
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
(1, 'jean-francois.renaut@ac-lille.fr', 1),
(1, 'jean-jacques.hanot@ac-lille.fr', 1),
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
('antho.le2n@gmail.com', '06.62.09.73.60', '254 rue de général de gaulle', 'Billy-berclau', 62138, '1995-01-24', 0),
('arn.gillon@gmail.com', '06.29.24.76.33', '18 rue des Berceaux', 'Richebourg', 62136, '1995-12-16', 0),
('bailly.alexandre62@gmail.com', '06.06.80.36.90', '5 rue d''Hezecques', 'Senlis', 62310, '1996-11-07', 0),
('bauduin.lucas@gmail.com', '06.49.75.82.64', '19 Rue Matisse', 'Villeneuve d''Ascq', 59493, '1995-02-02', 0),
('bekaertloic62196@gmail.com', '06.09.43.49.31', '12 Ruelle Choquet', 'Hesdigneul les Bethune', 62196, '1994-02-24', 0),
('bernard.marine62330@gmail.com', '06.89.65.91.31', '15 rue Jean Macé', 'Isbergues', 62330, '1995-10-15', 1),
('bultel.theo2@gmail.com', '06.95.20.90.32', '11 grand rue', 'Mametz', 62120, '2015-11-30', 0),
('cantraine.clement@gmail.com', '07.52.63.35.76', '31 rue de la mairie', 'Conchil le temple', 62180, '1996-04-14', 0),
('christianmontois2@gmail.com', '06.37.33.83.35', '1 rue du parc a bois', 'Lievin', 62800, '1995-09-05', 0),
('christophe.poulain3@gmail.com', '06.27.16.72.47', '364 Rue Du Bois', 'Richebourg', 62136, '1995-12-04', 0),
('elodiegambet@gmail.com', '06.81.66.98.63', '2B, rue de Frévent', 'Croisette', 62130, '1995-01-28', 1),
('fleury.quentin1@gmail.com', '06.27.48.06.02', '419 hameau de belval Rue principale', 'TROISVAUX', 62130, '1996-12-12', 0),
('guillaume.lespagnol26@gmail.com', '07.81.70.84.85', '21 rue Jean Jacques Rousseau', 'Sains-en-Gohelle', 62114, '1994-05-26', 0),
('kevin.paillart62@gmail.com', '06.51.36.95.85', '3 Résidence robert schumann, rue de l''europe', 'Arques', 62510, '1994-02-17', 0),
('kevinpetitpre62@gmail.com', '06.68.30.03.61', '10 rue emile basly', 'Hersin-coupigny', 62530, '1995-04-16', 0),
('leroy.thomas1996@gmail.com', '06.58.06.12.48', '4, rue Saint Arnaud', 'Noeux-les-Mines', 62290, '1996-02-02', 0),
('mathis.deleau77144@gmail.com', '06.59.06.43.09', '11 rue Marx Dormoy', 'Barlin', 62620, '1996-05-14', 0),
('matthieu.delarue1s@gmail.com', '06.98.95.40.68', '17 rue des frères montgolfier', 'Beuvry', 62660, '1994-04-07', 0),
('mlenoir.dev@gmail.com', '06.15.19.09.39', '22 rue Edmond Mille', 'Isbergues', 62330, '1994-11-18', 0),
('nico.albert59136@gmail.com', '06.34.76.40.88', '5 residence les Ormes', 'Wavrin', 59136, '1995-01-02', 0),
('paul.legrain5@gmail.com', '06.32.96.07.90', '80 rue du grand montant', 'Béthune', 62400, '1996-01-08', 0),
('picavet.frederic@gmail.com', '06.46.22.71.24', '23 rue de la Bibarne', 'Blendecques', 62575, '1994-11-25', 0),
('pierre.desutter1@gmail.com', '07.87.15.34.27', '261 rue de Gauchin', 'Croix en ternois', 62130, '1996-07-21', 0),
('regnier.yohan@gmail.com', '06.46.24.32.36', '23,rue des champs', 'Noyelles-les-Vermelles', 62980, '1995-11-20', 0),
('thomasleleu5@gmail.com', '06.86.69.90.08', '658 rue de l''Eglise', 'Hautecloque', 62130, '1996-11-25', 0),
('vienne.dam@gmail.com', '06.12.15.05.99', '161 rue Robert Aylé', 'Hénin-Beaumont', 62110, '1994-12-29', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`codeInscription`, `codeClasse`, `email`, `dateDebut`) VALUES
(1, 2, 'guillaume.lespagnol26@gmail.com', 2015),
(2, 2, 'nico.albert59136@gmail.com', 2015),
(3, 2, 'bailly.alexandre62@gmail.com', 2015),
(4, 2, 'bauduin.lucas@gmail.com', 2015),
(5, 2, 'bekaertloic62196@gmail.com', 2015),
(6, 2, 'bernard.marine62330@gmail.com', 2015),
(7, 2, 'bultel.theo2@gmail.com', 2015),
(8, 2, 'cantraine.clement@gmail.com', 2015),
(9, 2, 'matthieu.delarue1s@gmail.com', 2015),
(10, 2, 'mathis.deleau77144@gmail.com', 2015),
(11, 2, 'pierre.desutter1@gmail.com', 2015),
(12, 2, 'fleury.quentin1@gmail.com', 2015),
(13, 2, 'elodiegambet@gmail.com', 2015),
(14, 2, 'arn.gillon@gmail.com', 2015),
(15, 2, 'paul.legrain5@gmail.com', 2015),
(16, 2, 'thomasleleu5@gmail.com', 2015),
(17, 2, 'kevinpetitpre62@gmail.com', 2015),
(18, 2, 'antho.le2n@gmail.com', 2015),
(19, 2, 'kevin.paillart62@gmail.com', 2015),
(20, 2, 'picavet.frederic@gmail.com', 2015),
(21, 2, 'christophe.poulain3@gmail.com', 2015),
(22, 2, 'mlenoir.dev@gmail.com', 2015),
(23, 2, 'leroy.thomas1996@gmail.com', 2015),
(24, 2, 'regnier.yohan@gmail.com', 2015),
(25, 2, 'vienne.dam@gmail.com', 2015),
(26, 2, 'christianmontois2@gmail.com', 2015);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `organisme`
--

INSERT INTO `organisme` (`codeOrganisme`, `nom`, `adresse`, `ville`, `codePostal`, `metierPrincipal`, `telephone`) VALUES
(2, 'DO-GOOD SERVICES', '5 rue du Colonel Herry', 'Wattignies', 59139, 'Développement', '06.81.95.25.83'),
(5, 'Waigéo', 'Village d''Entreprises, Rue des Dames', 'Ruitz', 62620, 'Assistance et services informatiques', '03.91.80.18.18'),
(7, 'ZETARK', '2 route de Bergues', 'Coudekerque Branche', 59210, 'Assistance et services informatiques', '03.28.60.64.50');

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
(3),
(9),
(13);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `stage`
--

INSERT INTO `stage` (`codeStage`, `conventionImprimee`, `conventionRetournee`, `codeTuteur`, `codeSignataire`, `codeInscription`, `codeOrganisme`, `codePeriode`, `libelle`, `descriptif`, `statut`, `enseignantReferent`) VALUES
(3, 0, 0, 4, 3, 4, 2, 1, 'Stage dans l''entreprise DO-GOOD SERVICES', 'Stage de développement dans l''entreprise DO-GOOD SERVICES.', 1, 'severinequesque@gmail.com'),
(6, 0, 0, 10, 9, 1, 5, 1, 'Waigéo', 'Développement d''une application web', 1, 'severinequesque@gmail.com'),
(8, 0, 0, 14, 13, 19, 7, 1, 'Mainteance Réseau et DataCenter ', 'Maintenance Camera video surveillance, solution de sauvegarde et de synchronisation , hébergement, fibre optique ', 1, 'jean-francois.renaut@ac-lille.fr');

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
(4),
(10),
(14);

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
('antho.le2n@gmail.com', '0134981d2fe64e547df474403a7c61f90ddd182e', 'LENNE', 'Anthony', NULL, 3, NULL),
('arn.gillon@gmail.com', 'a33ab23ae295433b9248cf63498d7d9599b05638', 'Gillon', 'Arnaud', NULL, 3, NULL),
('bailly.alexandre62@gmail.com', 'aaa86891968e729174ce59872be2c12aa73d9dfb', 'Bailly', 'Alexandre', NULL, 3, NULL),
('bauduin.lucas@gmail.com', 'ff2ee5deb55399926ca9806fab416ebde124b4af', 'Bauduin', 'Lucas', NULL, 3, NULL),
('bekaertloic62196@gmail.com', 'd2044e425a0c4911f8bfbd022405e95b26ae2e1a', 'Bekaert', 'Loïc', NULL, 3, NULL),
('bernard.marine62330@gmail.com', 'f9cac63f24f97538b6c1c9dbccdeeb5dea162244', 'Bernard', 'Marine', NULL, 3, NULL),
('bultel.theo2@gmail.com', '0b0afbc908bef13a19c731ee3a5f825fa9c716a0', 'Bultel', 'Théo', NULL, 3, NULL),
('cantraine.clement@gmail.com', 'ec439c2258a614942f3bd96baec0042c83bad06b', 'Cantraine', 'Clément', NULL, 3, NULL),
('christianmontois2@gmail.com', '19bf44189798a16263b136d4d67fe9abcb44a9a6', 'montois', 'christian', NULL, 3, NULL),
('christophe.poulain3@gmail.com', 'd4a2cea5c8bb10bd7b651a71df4b40b9337216f5', 'POULAIN', 'Christophe', NULL, 3, NULL),
('elodiegambet@gmail.com', '05ee9dcd3713c47c686f0007fcad5ef33a2257af', 'Gambet', 'Elodie', NULL, 3, NULL),
('fleury.quentin1@gmail.com', 'f2b1eb76ac1fefc7704905d2e2e5b0a4814a9cd4', 'Fleury', 'Quentin', NULL, 3, NULL),
('guillaume.lespagnol26@gmail.com', '24cfd59ea5d12ea9c4aa9eb5130ddd06426d5a81', 'Lespagnol', 'Guillaume', 'de5d37190b0490e8665fe947348271b4', 3, '2015-11-06 16:20:38'),
('jean-francois.renaut@ac-lille.fr', '0f8c6ddbf3e581af49cc75a1888dc661bd9fca72', 'Renaut', 'Jean-François', NULL, 2, NULL),
('jean-jacques.hanot@ac-lille.fr', 'root', 'Hanot', 'Jean-Jacques', NULL, 2, NULL),
('kevin.paillart62@gmail.com', '8de9decdc804d771389b2eae6c5b2cce4dc16918', 'Paillart', 'Kevin', NULL, 3, NULL),
('kevinpetitpre62@gmail.com', '7ad7a603592ab4b9f7ca9d4018e665c4f3a33207', 'petitpre', 'kevin', NULL, 3, NULL),
('leroy.thomas1996@gmail.com', '59da9d9e1f54730d104b6a9e348755b3f1b3ad17', 'LEROY', 'Thomas', NULL, 3, NULL),
('mathis.deleau77144@gmail.com', 'f5090ee6f38d4a6493294f074677b98747f86340', 'Deleau', 'Mathis', NULL, 3, NULL),
('matthieu.delarue1s@gmail.com', '5ef5d39b7e18651e39e8e9e91908d48da0c523e3', 'Delarue', 'Matthieu', NULL, 3, NULL),
('mlenoir.dev@gmail.com', 'a7626f4148947d6ee553f1ddcf10e40b78aa326d', 'LENOIR', 'Maxime', NULL, 3, NULL),
('nico.albert59136@gmail.com', '880c32c838b814b1b358e2cf4a23cb4948d68aeb', 'Albert', 'Nicolas', NULL, 3, NULL),
('paul.legrain5@gmail.com', 'f2f4017ec672c20ff6cbb8b3b18a23f6b9a7a6ad', 'Legrain', 'Paul', NULL, 3, NULL),
('picavet.frederic@gmail.com', '440cf6a820c7a5115d71463702ecc906f9733b02', 'Picavet', 'Frédéric', NULL, 3, NULL),
('pierre.desutter1@gmail.com', 'be81f3219de8ca89ba16a3d2391bdefc61af67b0', 'DESUTTER', 'Pierre', NULL, 3, NULL),
('regnier.yohan@gmail.com', '75c00ec88b2ae3bf025f0365f98be9064cc525f1', 'Regnier', 'Yohan', NULL, 3, NULL),
('severinequesque@gmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', 'Quesque', 'Séverine', '91088fd7589d07d0adb29ae7aa8bbd7d', 2, '2015-11-05 08:28:22'),
('thomasleleu5@gmail.com', '99a6e4c6f442a34e3310f6328cd085b7ac45b275', 'Leleu', 'Thomas', NULL, 3, NULL),
('vienne.dam@gmail.com', '1ac8844e4ab7ca23d0c080f32a839287e66d6fbb', 'Vienne', 'Damien', NULL, 3, NULL);

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
