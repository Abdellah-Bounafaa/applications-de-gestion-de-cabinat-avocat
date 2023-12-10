-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 04 oct. 2023 à 12:38
-- Version du serveur : 10.2.44-MariaDB-cll-lve
-- Version de PHP : 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gtdevelopp_lgca`
--

-- --------------------------------------------------------

--
-- Structure de la table `acces`
--

CREATE TABLE `acces` (
  `ID_ACCES` int(11) NOT NULL,
  `TYPE_ACCES` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `acl`
--

CREATE TABLE `acl` (
  `ID_ACCES` int(11) NOT NULL,
  `ID_NIVEAU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `adversaires`
--

CREATE TABLE `adversaires` (
  `ID_ADVERSAIRE` int(11) NOT NULL,
  `ID_VILLE` int(11) NOT NULL,
  `ID_TYPET` smallint(6) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `ADRESSE` text DEFAULT NULL,
  `ADRESSE1` text DEFAULT NULL,
  `ADRESSE2` text DEFAULT NULL,
  `ADRESSE3` text DEFAULT NULL,
  `TEL` text DEFAULT NULL,
  `TEl2` text DEFAULT NULL,
  `MOBILE` text DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `IDENTIFIANT` varchar(15) DEFAULT NULL,
  `CAUTION` tinyint(1) DEFAULT NULL,
  `DATE_CLT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adversaires`
--

INSERT INTO `adversaires` (`ID_ADVERSAIRE`, `ID_VILLE`, `ID_TYPET`, `NOM`, `PRENOM`, `ADRESSE`, `ADRESSE1`, `ADRESSE2`, `ADRESSE3`, `TEL`, `TEl2`, `MOBILE`, `EMAIL`, `IDENTIFIANT`, `CAUTION`, `DATE_CLT`) VALUES
(1, 1, 2, 'hicham', 'imad', 'hay larab', 'sasas', NULL, NULL, '614573980', NULL, NULL, 'ssyouss@hotmail.fr', '05shic', 0, '2020-02-07 16:12:01'),
(2, 4, 2, 'jalal', 'jalal', 'atlas', 'hay aza', 'hay zaz', 'hay zaza', '614573980', '614573980', NULL, 'ssyouss@hotmail.fr', 'SD457898', 0, '2020-02-07 23:33:40'),
(3, 1, 1, 'bilal', 'fouad', 'hay chefhawni', NULL, NULL, NULL, '614573980', '614573980', NULL, 'ssyouss@hotmail.fr', 'QS7879', 0, '2020-02-07 23:35:37'),
(4, 1, 1, 'zaza', 'zz', 'zz', 'sasa', NULL, NULL, '666', '77', NULL, 'ssyouss@hotmail.fr', 'DD456456', 0, '2020-02-07 23:37:41'),
(5, 2, 3, 'TEST', 'TEST', 'JJJJJJ', NULL, NULL, NULL, '786989888', NULL, NULL, NULL, '67895', 1, '2020-02-08 09:44:53'),
(6, 1, 1, 'mourad', 'mourad', 'hay adarissa', NULL, NULL, NULL, '0612345687', NULL, NULL, 'ssyouss@hotmail.fr', 'LM4545', 0, '2020-02-08 15:38:13'),
(7, 2, 1, 'Abdelghani El mestouri', 'HHHHH', 'Burau salma 2 ,N° 9 bd mohamed V', 'Burau salma 2 ,N° 9 bd mohamed VI', 'Burau salma 2 ,N° 9 bd mohamed V', 'Burau salma 2 ,N° 9 bd mohamed V', '788889', NULL, NULL, 'a.elmestouri@gmail.com', '67895', 1, '2020-02-10 16:23:41'),
(8, 1, 1, 'rai', 'soufian', 'fes-centre ville', 'fes-hai amal', 'fes-hai amal', 'fes-hai amal', '0678232434', '0678293434', NULL, 'soufian@gmail.com', 'cb89342', 0, '2022-10-03 11:29:30'),
(9, 1, 3, 'tijani', 'ossama', 'fes-centre ville', 'fes-ressif', 'fes-hai amal', 'fes-hai amal', '0678232434', '0678293434', NULL, 'ossama@gmail.com', 'cb89342', 1, '2022-10-03 11:45:15'),
(10, 1, 1, 'rai', 'ossama', 'fes-centre ville', NULL, NULL, NULL, '0678232434', NULL, NULL, 'soufian@gmail.com', 'cb89342', 0, '2022-10-03 14:04:26');

-- --------------------------------------------------------

--
-- Structure de la table `audiance`
--

CREATE TABLE `audiance` (
  `ID_AUDIANCE` int(11) NOT NULL,
  `ID_TRIBUNAL` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `DATE_CREATION` datetime DEFAULT NULL,
  `DATE_AUDIANCE` datetime DEFAULT NULL,
  `SALLE` varchar(254) DEFAULT NULL,
  `JUGE_AUD` varchar(1024) DEFAULT NULL,
  `OBSERVATION_AUD` text DEFAULT NULL,
  `ETAT_AUD` smallint(6) DEFAULT NULL,
  `URL_AUD` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `audiance`
--

INSERT INTO `audiance` (`ID_AUDIANCE`, `ID_TRIBUNAL`, `CIN`, `ID_DOSSIER`, `ID_PROCEDURE`, `DATE_CREATION`, `DATE_AUDIANCE`, `SALLE`, `JUGE_AUD`, `OBSERVATION_AUD`, `ETAT_AUD`, `URL_AUD`) VALUES
(1, 2, 'CD323456', 3, 3, NULL, NULL, '101', 'imad bibah', 'ok', 1, 'public/audiance/2c2Z3xjBu0m5YLZ5TpSSf3ZwGeHhAjkoyqMhdldF.jpeg'),
(2, 1, 'CD323456', 3, 3, '2020-12-07 00:00:00', NULL, '105', 'halmza', 'cool', 0, 'public/audiance/1vungUgMjm7GcCzqTU3aAqrkDjq2jIJ4lIRhZCKp.rtf'),
(3, 1, 'CD112233', 5, 3, NULL, '2022-05-26 00:00:00', '2', 'test', NULL, NULL, NULL),
(4, 1, 'CD112233', 5, 3, NULL, '2022-05-26 00:00:00', '2', 'test', NULL, 1, NULL),
(5, 1, 'CD112233', 5, 3, NULL, '2022-05-28 00:00:00', '2', 'test', NULL, 1, NULL),
(6, 1, 'CD112233', 5, 3, NULL, '2022-05-30 00:00:00', '3', 'test', NULL, 0, NULL),
(7, 1, 'CD112233', 23, 8, '2023-10-02 00:00:00', '2023-10-04 00:00:00', '5', 'ghyt', NULL, 0, NULL),
(8, 1, 'CD112233', 23, 8, '2023-10-11 00:00:00', '2023-10-11 00:00:00', '5', 'ghyt', NULL, 0, NULL),
(9, 1, 'CD112233', 23, 8, '2023-10-10 00:00:00', '2023-10-07 00:00:00', '5', 'simohaded', NULL, 0, NULL),
(10, 1, 'CD112233', 23, 8, '2023-10-18 00:00:00', '2023-10-20 00:00:00', '6', 'simohaded', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cautionnaire`
--

CREATE TABLE `cautionnaire` (
  `ID_CAUTIONNAIRE` int(11) NOT NULL,
  `ID_ADVERSAIRE` int(255) NOT NULL,
  `ID_TYPET` smallint(6) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `ADRESSE` text DEFAULT NULL,
  `TEL2` text DEFAULT NULL,
  `TEL` text DEFAULT NULL,
--   `MOBILE` text DEFAULT NULL,
  `IDENTIFIANT` varchar(15) DEFAULT NULL,
  `EMAIL_CAUTIONNAIRE` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cautionnaire`
--

INSERT INTO `cautionnaire` (`ID_CAUTIONNAIRE`, `ID_ADVERSAIRE`, `ID_TYPET`, `NOM`, `PRENOM`, `ADRESSE`, `TEL2`, `TEL`, `MOBILE`, `IDENTIFIANT`, `EMAIL_CAUTIONNAIRE`) VALUES
(1, 4, 2, 'aa', 'hamid', 'hay chefhawni', '614573980', '614573980', '614573980', 'MM45454', 'ssyouss@hotmail.fr'),
(2, 5, 2, 'YTYYU', 'JKJHKJ', 'JKJLKLJK', NULL, '7689789', NULL, '222222', NULL),
(3, 7, 2, 'cuass', 'JKJHKJ', 'kjkljk', '0669155299', '0669155299', NULL, '7890897', 'a.elmestouri@gtdeveloppement.com'),
(4, 9, 1, 'salmi', 'anas', 'fes-nrjis', NULL, '0689433254', '0789534674', 'c84934', 'anas@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `ID_CLIENT` int(11) NOT NULL,
  `ID_VILLE` int(11) NOT NULL,
  `ID_TYPET` smallint(6) NOT NULL,
  `DATE_CLT` datetime DEFAULT NULL,
  `IDENTIFIANT` varchar(15) DEFAULT NULL,
  `NOM` varchar(100) DEFAULT NULL,
  `PRENOM` varchar(100) DEFAULT NULL,
  `ADRESSE` text DEFAULT NULL,
  `TEL` text DEFAULT NULL,
  `TEL2` text DEFAULT NULL,
  `Fax` text DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `MOBILE_IN` text DEFAULT NULL,
  `EMAIL_IN` varchar(100) DEFAULT NULL,
  `INTERLOCUTEUR` varchar(50) DEFAULT NULL,
  `CAPITALE` float(15,2) DEFAULT NULL,
  `SITUATION` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`ID_CLIENT`, `ID_VILLE`, `ID_TYPET`, `DATE_CLT`, `IDENTIFIANT`, `NOM`, `PRENOM`, `ADRESSE`, `TEL`, `TEL2`, `Fax`, `EMAIL`, `MOBILE_IN`, `EMAIL_IN`, `INTERLOCUTEUR`, `CAPITALE`, `SITUATION`) VALUES
(1, 1, 1, '2020-02-06 11:18:28', 'CD453434', 'hicham', 'msi', 'soukaina', '932323232', NULL, NULL, 'hicham@gmail.com', NULL, NULL, 'ahmed', 2590.00, NULL),
(2, 1, 2, '2020-02-07 22:11:23', 'cd48055', 'msi', 'hamza', 'atlas', '6145739', NULL, NULL, 'ssyouss@hotmail.fr', NULL, NULL, NULL, 2004.00, NULL),
(3, 4, 2, '2022-05-24 12:17:18', '50000', 'SAHAM', 'assurance', '6 rue daaaaa', '066666666', NULL, NULL, NULL, NULL, NULL, 'test', 30000.00, NULL),
(4, 1, 3, '2022-10-03 10:49:27', 'cb89324', 'wassim', 'hani', 'fes-centre vielle', '0674837422', '0679324294', '0578432321', 'wassim@gmail.com', NULL, NULL, NULL, 7500.00, NULL),
(5, 1, 2, '2022-10-03 11:37:16', 'cb89324', 'alami', 'soufian', 'fes-centre vielle', '0674837422', '0679324294', '0578432321', 'wassim@gmail.com', '0689437843', 'mehdi@gmail.com', 'mehdi el bahi', 7500.00, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cna`
--

CREATE TABLE `cna` (
  `ID_CNA` int(11) NOT NULL,
  `ID_TRIBUNAL` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `REF_CNA` char(254) DEFAULT NULL,
  `DATE_DEM_CNA` date DEFAULT NULL,
  `DATE_RET_CNA` date DEFAULT NULL,
  `N_NOTIFICATION` char(254) DEFAULT NULL,
  `OBS_CNA` text DEFAULT NULL,
  `URL_CNA` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `currateur`
--

CREATE TABLE `currateur` (
  `ID_CURRATEUR` bigint(20) NOT NULL,
  `ID_TRIBUNAL` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `REF_TRIBUNALE` varchar(100) DEFAULT NULL,
  `DATE_ORDONANCE` date DEFAULT NULL,
  `DATE_DEM_NOTIFICATION` date DEFAULT NULL,
  `NOM_CURRATEUR` text DEFAULT NULL,
  `DATE_NOT_CURRATEUR` date DEFAULT NULL,
  `DATE_INSERTION_JOURNALE` date DEFAULT NULL,
  `NOM_JOURNALE` char(254) DEFAULT NULL,
  `DATE_RETOUR` date DEFAULT NULL,
  `OBS_CUR` text DEFAULT NULL,
  `ETAT_CURATEUR` tinyint(1) DEFAULT NULL,
  `URL_CURRATEUR` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `demande_dexpertise`
--

CREATE TABLE `demande_dexpertise` (
  `ID_DEMANDE_DEXPERTISE` int(11) NOT NULL,
  `ID_EXPERT` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `Nom` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `ID_DOCUMENT` int(11) NOT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `NOM_DOCUMENT` varchar(254) DEFAULT NULL,
  `DATE_DOC` datetime DEFAULT NULL,
  `CHEMINE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`ID_DOCUMENT`, `ID_DOSSIER`, `NOM_DOCUMENT`, `DATE_DOC`, `CHEMINE`) VALUES
(1, 1, 'objecto.PNG', '2020-02-09 16:20:10', 'public/documents/WNCVxyReR0BL9pmA9SwHdsxrSitDYme8cF9Myl6X.png'),
(2, 1, 'fail.PNG', '2020-02-09 16:20:10', 'public/documents/JpHElvHdKIgnwemse0KOk9kjKSnxgMrySioWJ8U9.png'),
(3, 2, 'Iveco Stralis EURO6 2013.pdf', '2020-02-10 16:06:01', 'public/documents/o4uDIuHdlTsCg1k9qpsKmpy6IqOTOERom3GuLcXz.pdf'),
(4, 2, 'MCD.pdf', '2020-02-10 16:06:01', 'public/documents/QxNBOP2QOTcYqUgcJgR0AJpwRu7n3LmztWpWROgq.pdf'),
(5, 3, 'progrmmation.pdf', '2020-02-11 10:33:18', 'public/documents/nq1u0PSeMlKBGW6pOQYxxbYNvSKo3neROv2g8S8n.pdf'),
(6, 3, 'L\'unesco 2016.pptx', '2020-02-11 10:33:18', 'public/documents/Z4H34jNGf3D2Yc9MHGOs0is9WsVhQGAXeI9oBW2B.pptx'),
(7, 3, 'main.cpp', '2020-02-11 19:57:48', 'public/documents/E6vWacqEGePikkJPRRSrhXI9YXuL3srOWKVMsBTj.c'),
(8, 3, '1.jpg', '2020-02-15 17:48:39', 'public/documents/wlifRPulqm9yoY8m5vYnwBrvbSyUTaT4MCyZQWtJ.jpeg'),
(9, 5, '20220420_135251.jpg', '2022-05-24 12:19:52', 'public/documents/xJVX6XfSBPlaG0hVvAPMLeTuMKOLq9by0IAY1cI8.jpeg'),
(10, 19, 'attestation de stage.pdf', '2022-10-03 13:16:12', 'public/documents/fwsOOYsnZ41c2J9KOaiK7TmS227k4671avrkFeoc.pdf'),
(11, 20, 'attestation de stage.pdf', '2022-10-03 13:17:04', 'public/documents/Xh6S5jc8bW9U4Lf5wxaiNaKZEVJjtpAvSz3wS03S.pdf'),
(12, 21, 'attestation de stage.pdf', '2022-10-03 13:31:34', 'public/documents/QSsreqjbR4iso6TL2AOzQbI4jHXVKxmEPlmYr6lK.pdf'),
(13, 21, 'attestation de réussite.pdf', '2022-10-03 13:31:34', 'public/documents/G1PzCzj0C1gdsX1KJ2NDvfFaaCeAa4c4c3clxDqA.pdf'),
(14, 23, 'ferme.png', '2023-10-03 10:56:53', 'public/documents/G2XA1aSWbXcnV8Zt3d4I6uZncPsi5OPAI4dlFQmC.png'),
(15, 23, 'Google Maps zone sedre.pdf', '2023-10-03 10:56:53', 'public/documents/f3VfAn4VVercS5x0QYgATjiO6W3SwU21fhCc8s9X.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE `dossier` (
  `NUM_DOSSIER` varchar(100) NOT NULL,
  `R_CABINET` varchar(254) NOT NULL,
  `R_CLIENT` varchar(254) NOT NULL,
  `DATE_OUVERTURE` datetime DEFAULT NULL,
  `DATE_FERMETURE` datetime DEFAULT NULL,
  `MNT_CREANCE` float(15,2) DEFAULT NULL,
  `SUSPENTION` tinyint(1) DEFAULT NULL,
  `SUSPENTION_ARRANGEMENT` tinyint(1) DEFAULT NULL,
  `MANQUE_PIECE` tinyint(1) DEFAULT NULL,
  `OBSERVATION` text DEFAULT NULL,
  `MODIFICATION` datetime DEFAULT NULL,
  `NUM_ARCHIVAGE` varchar(50) DEFAULT NULL,
  `DATE_ARCHIVAGE` date DEFAULT NULL,
  `DIRECTION` char(254) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_NATURE` int(11) NOT NULL,
  `ID_TYPEDOSSIER` int(11) NOT NULL,
  `ID_ADVERSAIRE` int(11) NOT NULL,
  `CIN` varchar(15) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `AGENCE` char(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`NUM_DOSSIER`, `R_CABINET`, `R_CLIENT`, `DATE_OUVERTURE`, `DATE_FERMETURE`, `MNT_CREANCE`, `SUSPENTION`, `SUSPENTION_ARRANGEMENT`, `MANQUE_PIECE`, `OBSERVATION`, `MODIFICATION`, `NUM_ARCHIVAGE`, `DATE_ARCHIVAGE`, `DIRECTION`, `ID_DOSSIER`, `ID_NATURE`, `ID_TYPEDOSSIER`, `ID_ADVERSAIRE`, `CIN`, `ID_CLIENT`, `AGENCE`) VALUES
('123456', '1231', '788888', '2020-02-09 16:20:09', NULL, 9000.00, NULL, NULL, NULL, NULL, '2020-02-17 11:03:51', NULL, NULL, '10', 1, 1, 1, 3, 'CD323456', 2, 'attijari'),
('5727287', '6677', '56667', '2020-02-10 16:06:00', NULL, 300000.00, NULL, NULL, NULL, NULL, '2020-02-15 14:18:30', NULL, NULL, '0', 2, 11, 1, 2, 'CD112233', 1, 'carama'),
('45', '450', 'zaz123', '2020-02-11 10:33:18', NULL, 5004.00, NULL, NULL, 1, 'manque des documents', '2020-12-16 19:02:47', '152', '2020-12-16', '100', 3, 1, 1, 4, 'CD323456', 2, 'rabat'),
('6555', '555555', '56666', '2022-05-24 12:19:14', NULL, 30000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'casa', 4, 7, 3, 2, 'CD112233', 3, 'casa'),
('6555', '555555', '56666', '2022-05-24 12:19:52', NULL, 30000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'casa', 5, 7, 3, 2, 'CD112233', 3, 'casa'),
('25411', '4877', '45666', '2022-10-03 09:39:56', NULL, 50000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fes', 6, 1, 2, 1, 'CD112233', 3, 'narjiss'),
('1', '6677', 'test', '2022-10-03 12:38:06', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 7, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 12:53:33', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 8, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:02:46', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 9, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:06:19', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 10, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:06:24', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 11, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:06:30', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 12, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:10:18', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 13, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:11:54', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 14, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:12:08', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 15, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:14:40', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 16, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:15:02', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 17, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:15:52', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 18, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:16:12', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 19, 12, 2, 8, 'CD112233', 5, 'ALTEN'),
('1', '6677', 'test', '2022-10-03 13:17:04', NULL, 6000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 20, 9, 3, 3, 'CD112233', 4, 'ALTEN'),
('2', '6677', 'test', '2022-10-03 13:31:34', NULL, 5500.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rabat', 21, 9, 3, 8, 'CD112233', 5, 'web help'),
('4654', '435353', '254656', '2023-10-03 10:55:36', NULL, 100000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fes', 22, 1, 1, 2, 'CD112233', 3, 'fes'),
('4654', '435353', '254656', '2023-10-03 10:56:52', NULL, 100000.00, NULL, NULL, 1, 'jhjkhjjhk\r\nkl:', '2023-10-03 11:04:36', NULL, NULL, 'fes', 23, 1, 1, 2, 'CD112233', 3, 'fes');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `ID_ETAPE` int(11) NOT NULL,
  `CONDITIONNE` varchar(254) DEFAULT NULL,
  `NOM_ETAPE` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`ID_ETAPE`, `CONDITIONNE`, `NOM_ETAPE`) VALUES
(1, '0', 'Requete'),
(2, '0', 'Audiance'),
(3, '0', 'Jugement'),
(4, '0', 'Notification'),
(5, '0', 'CNA'),
(6, '0', 'Curateur'),
(7, '0', 'Execution'),
(8, '0', 'CNC'),
(9, '0', 'SPH'),
(10, '0', 'LMD'),
(11, '0', 'PLAINTE');

-- --------------------------------------------------------

--
-- Structure de la table `execution`
--

CREATE TABLE `execution` (
  `ID_EXECUTION` int(11) NOT NULL,
  `ID_HUISSIER` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `REF_EXECUTION` varchar(254) DEFAULT NULL,
  `DATE_ENVOI` date DEFAULT NULL,
  `DATE_EXECUTION` date DEFAULT NULL,
  `SORT` varchar(254) DEFAULT NULL,
  `PV` text DEFAULT NULL,
  `OBSERVATION` text DEFAULT NULL,
  `ETAT_EXEC` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `expert`
--

CREATE TABLE `expert` (
  `ID_EXPERT` int(11) NOT NULL,
  `NOM` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `huissier`
--

CREATE TABLE `huissier` (
  `ID_HUISSIER` int(11) NOT NULL,
  `NOM` varchar(254) DEFAULT NULL,
  `PRENOM` varchar(254) DEFAULT NULL,
  `ADRESS` varchar(254) DEFAULT NULL,
  `TELEPHONE` int(11) DEFAULT NULL,
  `EMAIL` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ip`
--

CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ip`
--

INSERT INTO `ip` (`id`, `email`, `ip`, `date`, `device`) VALUES
(1, 'msi.hamza95@gmail.com', '196.77.138.50', '2021-01-16 12:17:23', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36'),
(2, 'abdel.abdel@gmail.com', '102.101.214.251', '2023-10-04 09:38:13', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36');

-- --------------------------------------------------------

--
-- Structure de la table `jugement`
--

CREATE TABLE `jugement` (
  `ID_JUGEMENT` int(11) NOT NULL,
  `ID_TRIBUNAL` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `REF_TRIBU` varchar(254) DEFAULT NULL,
  `JUGE` varchar(254) DEFAULT NULL,
  `DATE_JUGEMENT` date DEFAULT NULL,
  `SORT` varchar(254) DEFAULT NULL,
  `URL_JUGEMENT` varchar(254) DEFAULT NULL,
  `OBSERVATION` text DEFAULT NULL,
--   `ETAT_JUGEMENT` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jugement`
--

INSERT INTO `jugement` (`ID_JUGEMENT`, `ID_TRIBUNAL`, `CIN`, `ID_DOSSIER`, `ID_PROCEDURE`, `REF_TRIBU`, `JUGE`, `DATE_JUGEMENT`, `SORT`, `URL_JUGEMENT`, `OBSERVATION`, `ETAT_JUGEMENT`) VALUES
(1, 1, 'CD323456', 3, 3, 'reunion', 'hamid', '2020-12-21 00:00:00', 'vvv', 'public/jugement/EhQWfiHX5oSzeGs24fVkorOarBecZEY4b6gcK0BF.jpeg', 'ok', 0),
(2, 1, 'CD112233', 5, 3, '5222', 'test', '2022-05-28 00:00:00', 'fav', NULL, NULL, NULL),
(3, 1, 'CD112233', 23, 8, 'jhjhnj', 'jghkjhgkj', '2023-10-05 00:00:00', NULL, NULL, NULL, NULL),
(4, 1, 'CD112233', 23, 8, 'jhjhnj', 'jghkjhgkj', '2023-10-11 00:00:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lmd`
--

CREATE TABLE `lmd` (
  `ID_LMD` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `DATE_ENVOI` date DEFAULT NULL,
  `PJ` varchar(254) DEFAULT NULL,
  `DATE_RETOUR` date DEFAULT NULL,
  `SORT` varchar(254) DEFAULT NULL,
  `ETAT_MLD` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `nature`
--

CREATE TABLE `nature` (
  `ID_NATURE` int(11) NOT NULL,
  `NOM` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `nature`
--

INSERT INTO `nature` (`ID_NATURE`, `NOM`) VALUES
(1, 'BANQUE'),
(2, 'CIVIL'),
(3, 'CONSULTATION'),
(4, 'FAMILLE'),
(5, 'LOYER'),
(6, 'PENAL'),
(7, 'RECOUVREMENT'),
(8, 'RESPONSAB'),
(9, 'SOCIAL'),
(10, 'SOMMATION'),
(11, 'TAXATION'),
(12, 'COMMERCIAL');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `ID_NIVEAU` int(11) NOT NULL,
  `NOM_NIVEAU` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`ID_NIVEAU`, `NOM_NIVEAU`) VALUES
(1, 'Administrateur'),
(2, 'Superviseur');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `ID_NOTIFICATION` int(11) NOT NULL,
  `ID_HUISSIER` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `NUM_NOTIFICATION` varchar(254) DEFAULT NULL,
  `DATE_ENVOI_NOT` date DEFAULT NULL,
  `DATE_SORT` date DEFAULT NULL,
  `SORT` varchar(254) DEFAULT NULL,
  `PV_SORT` text DEFAULT NULL,
  `OBSERVATION` text DEFAULT NULL,
  `ETAT_NOTIF` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `plainte`
--

CREATE TABLE `plainte` (
  `ID_PLAINTE` int(11) NOT NULL,
  `ID_TRIBUNAL` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `REF_PLAINTE` char(254) DEFAULT NULL,
  `DATE_DEPOT` date DEFAULT NULL,
  `DATE_ENVOI_P` date DEFAULT NULL,
  `PROCUREURE` char(254) DEFAULT NULL,
  `ARRENDISSEMENT_POLICE` date DEFAULT NULL,
  `SORT_PLAINTE` char(254) DEFAULT NULL,
  `TYPE_PLAINTE` char(254) DEFAULT NULL,
  `ETAT_PLAINTE` tinyint(1) DEFAULT NULL,
  `URL_PLAINT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `procedures`
--

CREATE TABLE `procedures` (
  `ID_PROCEDURE` int(11) NOT NULL,
  `NOM_PROCEDURE` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `procedures`
--

INSERT INTO `procedures` (`ID_PROCEDURE`, `NOM_PROCEDURE`) VALUES
(1, 'SPH'),
(2, 'LMD'),
(3, 'Action en paiement'),
(4, 'Action paulienne'),
(5, 'Action Expulsion'),
(6, 'Action Rectification d\'erreur'),
(7, 'Action en restitution'),
(8, 'Injoction de payer'),
(9, 'Nantissement sur F.C'),
(10, 'Nantissement sur MAT et Uts'),
(11, 'Plainte'),
(12, 'SCFC'),
(13, 'SCM'),
(14, 'SCI'),
(15, 'SCV'),
(16, 'SCA');

-- --------------------------------------------------------

--
-- Structure de la table `requete`
--

CREATE TABLE `requete` (
  `ID_REQUETE` int(11) NOT NULL,
  `ID_TRIBUNAL` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `REFERANCE_TRIBUNALE` varchar(100) DEFAULT NULL,
  `OBSERVATION` text DEFAULT NULL,
  `DATE_DEPOT` date DEFAULT NULL,
  `DATE_RETRAIT` date DEFAULT NULL,
  `JUGE` varchar(254) DEFAULT NULL,
  `URL_SCAN` text DEFAULT NULL,
  `ETAT_REQUETE` smallint(6) DEFAULT NULL,
  `DATE_JUGEMENT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `requete`
--

INSERT INTO `requete` (`ID_REQUETE`, `ID_TRIBUNAL`, `CIN`, `ID_DOSSIER`, `ID_PROCEDURE`, `REFERANCE_TRIBUNALE`, `OBSERVATION`, `DATE_DEPOT`, `DATE_RETRAIT`, `JUGE`, `URL_SCAN`, `ETAT_REQUETE`, `DATE_JUGEMENT`) VALUES
(1, 1, 'CD112233', 3, 3, '1', 'ok', '2020-02-19', NULL, NULL, 'public/requete/dkPMWtA7dvZ7Em9QTcpK2kiYEkOiyTtWwyAqds2v.rtf', NULL, NULL),
(2, 2, 'CD112233', 3, 3, '4845123', 'bravo', '2020-02-20', '2020-02-18', NULL, 'public/requete/dTNwqUZdsauB4zvwRov40OrOUVgktmM4U6VwdPhI.rtf', NULL, '2020-02-02'),
(3, 1, 'CD112233', 2, 3, 'jhjhj', 'kljkjkj,', '2020-02-12', '2020-02-15', NULL, 'public/requete/fyBIf3VafEgmdzQ8Ba1VVPGlsFyp44hnALsABIlb.pdf', NULL, NULL),
(4, 1, 'CD112233', 2, 3, 'jhjhj', 'kljkjkj,', '2020-02-12', '2020-02-15', NULL, 'public/requete/tCW7jnqiAjzh8K3dtQ3OvYPPp7U6MCTIO0EMWKMK.pdf', NULL, '2020-02-27'),
(5, 1, 'CD112233', 1, 3, '5677', NULL, '2020-03-05', '2020-03-12', NULL, 'public/requete/yrbLje0jpAfXXI57A850KI8b1kgHNBbwgjNzzEIG.pdf', NULL, '2020-03-06'),
(6, 1, 'CD112233', 1, 3, '5677', NULL, '2020-03-05', '2020-03-12', NULL, 'public/requete/uRomcHTUXb7phcdVxyWM35chm10lpnNnmdiyLR8N.pdf', 0, '2020-03-06'),
(7, 1, 'CD112233', 1, 3, '5677', 'nnnnn', '2020-03-05', '2020-03-12', NULL, 'public/requete/1bn2YXkxJfz3nZ3LD1orrruVtPrTfTMHjPM2b56h.pdf', 0, '2020-03-06'),
(8, 1, 'CD323456', 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 2, 'CD323456', 3, 3, 'sasa', 'okl', '2020-12-16', '2020-12-23', 'sasa', 'public/requete/nsqvHwwReirrYf2oYCZKnDRz9hhGTA5B2jJK58G5.jpeg', 0, '2020-12-15'),
(10, 2, 'CD323456', 5, 3, '6544', NULL, '2022-05-12', '2022-05-25', NULL, NULL, NULL, NULL),
(11, 1, 'CD112233', 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(12, 1, 'CD112233', 23, 2, '45685656', NULL, '2023-10-02', '2023-10-12', NULL, NULL, NULL, NULL),
(13, 1, 'CD112233', 23, 2, '45685656', NULL, '2023-10-02', '2023-10-12', NULL, 'public/requete/qB0D1TxqR8SaQYAx4aUL7Shn1o9UXtZle5vIxI74.png', 0, '2023-10-19'),
(14, 1, 'CD323456', 23, 2, '45685656', NULL, '2023-10-02', '2023-10-12', NULL, 'public/requete/tb3cybUuvt6TU9CYfeBkTCAtwYXWWFRSghRhD8SQ.png', 0, '2023-10-19'),
(15, 1, 'CD112233', 23, 8, NULL, NULL, '2023-10-11', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `saisie`
--

CREATE TABLE `saisie` (
  `ID_SAISIE` int(11) NOT NULL,
  `ID_TRIBUNAL` int(11) NOT NULL,
  `ID_HUISSIER` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `REF_TRUBUNAL_EXE` VARCHAR(100) DEFAULT NULL,
  `DATE_DEPOT` date DEFAULT NULL,
  `DATE_RETRAIT` date DEFAULT NULL,
  `DATE_EXCECUTION` datetime DEFAULT NULL,
  `SORT` varchar(254) DEFAULT NULL,
  `PJ` text DEFAULT NULL,
  `DATE_DEMANDE` date DEFAULT NULL,
  `N_TITRE_F` char(254) DEFAULT NULL,
  `CONSERVATION` tinyint(1) DEFAULT NULL,
  `DATE_INSC_CONSERVATION` date DEFAULT NULL,
  `N_RC_` char(254) DEFAULT NULL,
  `DATE_INSC_RC` date DEFAULT NULL,
  `MATRICULE` char(254) DEFAULT NULL,
  `DATE_INSC_SERMIN` date DEFAULT NULL,
  `DATE_NOTIF_TIERRE` date DEFAULT NULL,
  `DATE_NOTIF_BANQUE` date DEFAULT NULL,
  `DATE_NOTIF_DEBUTEUR` date DEFAULT NULL,
  `ETAT_SAISI` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sph`
--

CREATE TABLE `sph` (
  `ID_SOMATION` int(11) NOT NULL,
  `ID_HUISSIER` int(11) NOT NULL,
  `CIN` varchar(15) DEFAULT NULL,
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `DEMANDE` varchar(254) DEFAULT NULL,
  `DATE_ENVOI` date DEFAULT NULL,
  `DATE_RETOUR` date DEFAULT NULL,
  `PV` varchar(254) DEFAULT NULL,
  `SORT` varchar(254) DEFAULT NULL,
  `ETAT_SPH` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `suivi`
--

CREATE TABLE `suivi` (
  `ID_PROCEDURE` int(11) NOT NULL,
  `ID_ETAPE` int(11) NOT NULL,
  `CLASSEMENT` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `suivi`
--

INSERT INTO `suivi` (`ID_PROCEDURE`, `ID_ETAPE`, `CLASSEMENT`) VALUES
(1, 1, 9),
(2, 1, 10),
(3, 1, 1),
(3, 2, 2),
(3, 3, 3),
(3, 4, 4),
(3, 5, 5),
(3, 7, 6),
(4, 1, 1),
(4, 2, 2),
(4, 3, 3),
(4, 4, 4),
(4, 5, 5),
(4, 7, 6),
(5, 1, 1),
(5, 2, 2),
(5, 3, 3),
(5, 4, 4),
(5, 5, 5),
(5, 7, 6),
(6, 1, 1),
(6, 2, 2),
(6, 3, 3),
(6, 4, 4),
(6, 5, 5),
(6, 7, 6),
(7, 1, 1),
(7, 2, 2),
(7, 3, 3),
(7, 4, 4),
(7, 5, 5),
(7, 6, 6),
(7, 7, 7),
(8, 1, 1),
(8, 2, 2),
(8, 3, 3),
(8, 4, 4),
(8, 5, 5),
(8, 7, 6),
(9, 1, 1),
(9, 2, 2),
(9, 3, 3),
(9, 4, 4),
(9, 5, 5),
(9, 7, 6),
(10, 1, 1),
(10, 2, 2),
(10, 3, 3),
(10, 4, 4),
(10, 5, 5),
(10, 7, 6),
(11, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

CREATE TABLE `traitement` (
  `ID_DOSSIER` int(11) NOT NULL,
  `ID_PROCEDURE` int(11) NOT NULL,
  `DATE_MISE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `traitement`
--

INSERT INTO `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`, `DATE_MISE`) VALUES
(1, 1, '2020-02-19'),
(1, 2, '2020-02-19'),
(1, 3, '2020-02-19'),
(1, 7, '2020-11-23'),
(1, 12, '2020-11-23'),
(1, 13, '2020-02-19'),
(2, 3, '2020-02-19'),
(2, 5, '2020-02-19'),
(2, 8, '2022-05-24'),
(2, 13, '2020-02-19'),
(3, 1, '2022-10-03'),
(3, 3, '2020-02-19'),
(3, 13, '2020-02-19'),
(5, 2, '2022-05-24'),
(5, 3, '2022-05-24'),
(5, 6, '2022-05-24'),
(5, 7, '2022-05-24'),
(5, 8, '2022-05-24'),
(5, 12, '2022-05-24'),
(5, 13, '2022-05-24'),
(5, 14, '2022-05-24'),
(5, 15, '2022-05-24'),
(5, 16, '2022-05-24'),
(23, 2, '2023-10-03'),
(23, 4, '2023-10-03'),
(23, 5, '2023-10-03'),
(23, 7, '2023-10-03'),
(23, 8, '2023-10-03'),
(23, 9, '2023-10-03'),
(23, 13, '2023-10-03'),
(23, 14, '2023-10-03');

-- --------------------------------------------------------

--
-- Structure de la table `tribunal`
--

CREATE TABLE `tribunal` (
  `ID_TRIBUNAL` int(11) NOT NULL,
  `ID_VILLE` int(11) NOT NULL,
  `ID_TTRIBUNAL` int(11) NOT NULL,
  `NOM_TRIBUNAL` varchar(254) DEFAULT NULL,
  `LIBELLE` varchar(50) DEFAULT NULL,
  `NUM_TRIBUNAL` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tribunal`
--

INSERT INTO `tribunal` (`ID_TRIBUNAL`, `ID_VILLE`, `ID_TTRIBUNAL`, `NOM_TRIBUNAL`, `LIBELLE`, `NUM_TRIBUNAL`) VALUES
(1, 4, 1, 'TPI CASABLANCA', 'TPI CASABLANCA', NULL),
(2, 5, 1, 'TPI RABAT', 'TPI RABAT', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_dossier`
--

CREATE TABLE `type_dossier` (
  `ID_TYPEDOSSIER` int(11) NOT NULL,
  `NOM` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_dossier`
--

INSERT INTO `type_dossier` (`ID_TYPEDOSSIER`, `NOM`) VALUES
(1, 'CONFRERE'),
(2, 'TIRES'),
(3, 'MASSE CLIENT'),
(4, 'MASSE FFC'),
(5, 'EXONERE'),
(6, 'REPRISE'),
(7, 'FORFAITAIRE');

-- --------------------------------------------------------

--
-- Structure de la table `type_tiere`
--

CREATE TABLE `type_tiere` (
  `ID_TYPET` smallint(6) NOT NULL,
  `LIBELLE_TYPET` char(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_tiere`
--

INSERT INTO `type_tiere` (`ID_TYPET`, `LIBELLE_TYPET`) VALUES
(1, 'Particulier'),
(2, 'Entreprise'),
(3, 'Professionel');

-- --------------------------------------------------------

--
-- Structure de la table `type_tribunal`
--

CREATE TABLE `type_tribunal` (
  `ID_TRIBUNAL` int(11) NOT NULL,
  `NOM` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_tribunal`
--

INSERT INTO `type_tribunal` (`ID_TRIBUNAL`, `NOM`) VALUES
(1, 'Tribunaux de 1ère instance');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `CIN` varchar(15) NOT NULL,
  `ID_NIVEAU` int(11) NOT NULL,
  `NOM` varchar(50) DEFAULT NULL,
  `PRENOM` varchar(50) DEFAULT NULL,
  `ADRESSE` text DEFAULT NULL,
  `TEL` int(11) DEFAULT NULL,
  `MOBILE` int(11) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `POSTE` varchar(254) DEFAULT NULL,
  `LOGIN` varchar(50) DEFAULT NULL,
  `MDP` varchar(254) DEFAULT NULL,
  `CREATED` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`CIN`, `ID_NIVEAU`, `NOM`, `PRENOM`, `ADRESSE`, `TEL`, `MOBILE`, `EMAIL`, `POSTE`, `LOGIN`, `MDP`, `CREATED`) VALUES
('CD112233', 1, 'abdel', 'ghani', 'hay atlas', 612345678, NULL, 'a.elmestouri@gmail.com', '3000', 'abdel', '$2y$10$J73olMt9gmxMyXc5NfE4quJIjQlmD0hoospMFlR0e7rNH1Cuo6xoW', '2020-02-07 12:20:12'),
('CD323456', 1, 'MASSOUSSI', 'HAMZA', 'hay soukaina', 691658345, NULL, 'a.elmestouri@gmail.com', '3000', 'hamza_msi', '$2y$10$u9SYbwGEJjUUhkHwU.ZevuLxvGbFopRyZo4gGuzxNM7fZkzbBV/46', '2020-02-07 12:20:12');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `ID_VILLE` int(11) NOT NULL,
  `NOM_VILLE` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`ID_VILLE`, `NOM_VILLE`) VALUES
(1, 'Fès'),
(2, 'Meknès'),
(3, 'Marrakech'),
(4, 'Casablanca'),
(5, 'Rabat'),
(6, 'Tanger'),
(7, 'Imouzer'),
(8, 'El Kelaa des Srarhna'),
(9, 'Sale'),
(10, 'Mediouna'),
(11, 'Oujda-Angad'),
(12, 'Kenitra'),
(13, 'Agadir'),
(14, 'Tétouan'),
(15, 'Taourirt'),
(16, 'Temara'),
(17, 'Safi'),
(18, 'Khénifra'),
(19, 'Laâyoune'),
(20, 'Mohammedia'),
(21, 'Kouribga'),
(22, 'El Jadid'),
(23, 'Béni Mellal'),
(24, 'Ait Melloul'),
(25, 'Nador'),
(26, 'Taza'),
(27, 'Settat'),
(28, 'Barrechid'),
(29, 'Al Khmissat'),
(30, 'Inezgane'),
(31, 'Ksar El Kebir'),
(32, 'Larache'),
(33, 'Guelmim'),
(34, 'Berkane'),
(35, 'Khemis Sahel'),
(36, 'Ad Dakhla'),
(37, 'Bouskoura'),
(38, 'Al Fqih Ben Çalah'),
(39, 'Oued Zem'),
(40, 'Sidi Slimane'),
(41, 'Errachidia'),
(42, 'Guercif'),
(43, 'Oulad Teïma'),
(44, 'Ben Guerir'),
(45, 'Sefrou'),
(46, 'Fnidq'),
(47, 'Sidi Qacem'),
(48, 'Moulay Abdallah'),
(49, 'Youssoufia'),
(50, 'Martil'),
(51, 'Aïn Harrouda'),
(52, 'Skhirate'),
(53, 'Ouezzane'),
(54, 'Sidi Yahya Zaer'),
(55, 'Al Hoceïma'),
(56, 'M’diq'),
(57, 'Sidi Bennour'),
(58, 'Midalt'),
(59, 'Azrou'),
(60, 'My Drarga'),
(61, 'Ain El Aouda'),
(62, 'Beni Yakhlef'),
(63, 'Ad Darwa'),
(64, 'Al Aaroui'),
(65, 'Qasbat Tadla'),
(66, 'Boujad'),
(67, 'Jerada'),
(68, 'Mrirt'),
(69, 'El Aïoun'),
(70, 'Azemmour'),
(71, 'Temsia'),
(72, 'Zagora'),
(73, 'Ait Ourir'),
(74, 'Aziylal'),
(75, 'Sidi Yahia El Gharb'),
(76, 'Biougra'),
(77, 'Zaïo'),
(78, 'Aguelmous'),
(79, 'El Hajeb'),
(80, 'Zeghanghane'),
(81, 'Imzouren'),
(82, 'Tit Mellil'),
(83, 'Mechraa Bel Ksiri'),
(84, 'Al ’Attawia'),
(85, 'Demnat'),
(86, 'Arfoud'),
(87, 'Tameslouht'),
(88, 'Bou Arfa'),
(89, 'Sidi Smai’il'),
(90, 'Souk et Tnine Jorf el Mellah'),
(91, 'Mehdya'),
(92, 'Aïn Taoujdat'),
(93, 'Chichaoua'),
(94, 'Tahla'),
(95, 'Oulad Yaïch'),
(96, 'Moulay Bousselham'),
(97, 'Iheddadene'),
(98, 'Missour'),
(99, 'Zawyat ech Cheïkh'),
(100, 'Bouknadel'),
(101, 'Oulad Tayeb'),
(102, 'Oulad Barhil'),
(103, 'Bir Jdid'),
(104, 'Tifariti');
--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acces`
--
ALTER TABLE `acces`
  ADD PRIMARY KEY (`ID_ACCES`);

--
-- Index pour la table `acl`
--
ALTER TABLE `acl`
  ADD PRIMARY KEY (`ID_ACCES`,`ID_NIVEAU`),
  ADD KEY `ID_NIVEAU` (`ID_NIVEAU`);

--
-- Index pour la table `adversaires`
--
ALTER TABLE `adversaires`
  ADD PRIMARY KEY (`ID_ADVERSAIRE`),
  ADD KEY `ID_VILLE` (`ID_VILLE`),
  ADD KEY `ID_TYPET` (`ID_TYPET`);

--
-- Index pour la table `audiance`
--
ALTER TABLE `audiance`
  ADD PRIMARY KEY (`ID_AUDIANCE`),
  ADD KEY `ID_TRIBUNAL` (`ID_TRIBUNAL`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`);

--
-- Index pour la table `cautionnaire`
--
ALTER TABLE `cautionnaire`
  ADD PRIMARY KEY (`ID_CAUTIONNAIRE`),
  ADD KEY `ID_ADVERSAIRE` (`ID_ADVERSAIRE`),
  ADD KEY `ID_TYPET` (`ID_TYPET`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID_CLIENT`),
  ADD KEY `ID_TYPET` (`ID_TYPET`),
  ADD KEY `ID_VILLE` (`ID_VILLE`);

--
-- Index pour la table `cna`
--
ALTER TABLE `cna`
  ADD PRIMARY KEY (`ID_CNA`),
  ADD KEY `ID_TRIBUNAL` (`ID_TRIBUNAL`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`);

--
-- Index pour la table `currateur`
--
ALTER TABLE `currateur`
  ADD PRIMARY KEY (`ID_CURRATEUR`),
  ADD KEY `ID_TRIBUNAL` (`ID_TRIBUNAL`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`);

--
-- Index pour la table `demande_dexpertise`
--
ALTER TABLE `demande_dexpertise`
  ADD PRIMARY KEY (`ID_DEMANDE_DEXPERTISE`),
  ADD KEY `ID_EXPERT` (`ID_EXPERT`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`ID_DOCUMENT`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`);

--
-- Index pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`ID_DOSSIER`),
  ADD KEY `ID_NATURE` (`ID_NATURE`),
  ADD KEY `ID_TYPEDOSSIER` (`ID_TYPEDOSSIER`),
  ADD KEY `ID_ADVERSAIRE` (`ID_ADVERSAIRE`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_CLIENT` (`ID_CLIENT`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`ID_ETAPE`);

--
-- Index pour la table `execution`
--
ALTER TABLE `execution`
  ADD PRIMARY KEY (`ID_EXECUTION`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`),
  ADD KEY `ID_HUISSIER` (`ID_HUISSIER`);

--
-- Index pour la table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`ID_EXPERT`);

--
-- Index pour la table `huissier`
--
ALTER TABLE `huissier`
  ADD PRIMARY KEY (`ID_HUISSIER`);

--
-- Index pour la table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jugement`
--
ALTER TABLE `jugement`
  ADD PRIMARY KEY (`ID_JUGEMENT`),
  ADD KEY `ID_TRIBUNAL` (`ID_TRIBUNAL`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`);

--
-- Index pour la table `lmd`
--
ALTER TABLE `lmd`
  ADD PRIMARY KEY (`ID_LMD`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`);

--
-- Index pour la table `nature`
--
ALTER TABLE `nature`
  ADD PRIMARY KEY (`ID_NATURE`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`ID_NIVEAU`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID_NOTIFICATION`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`),
  ADD KEY `ID_HUISSIER` (`ID_HUISSIER`);

--
-- Index pour la table `plainte`
--
ALTER TABLE `plainte`
  ADD PRIMARY KEY (`ID_PLAINTE`),
  ADD KEY `ID_TRIBUNAL` (`ID_TRIBUNAL`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`);

--
-- Index pour la table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`ID_PROCEDURE`);

--
-- Index pour la table `requete`
--
ALTER TABLE `requete`
  ADD PRIMARY KEY (`ID_REQUETE`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`),
  ADD KEY `ID_TRIBUNAL` (`ID_TRIBUNAL`);

--
-- Index pour la table `saisie`
--
ALTER TABLE `saisie`
  ADD PRIMARY KEY (`ID_SAISIE`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`),
  ADD KEY `ID_HUISSIER` (`ID_HUISSIER`),
  ADD KEY `ID_TRIBUNAL` (`ID_TRIBUNAL`);

--
-- Index pour la table `sph`
--
ALTER TABLE `sph`
  ADD PRIMARY KEY (`ID_SOMATION`),
  ADD KEY `CIN` (`CIN`),
  ADD KEY `ID_DOSSIER` (`ID_DOSSIER`,`ID_PROCEDURE`),
  ADD KEY `ID_HUISSIER` (`ID_HUISSIER`);

--
-- Index pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD PRIMARY KEY (`ID_PROCEDURE`,`ID_ETAPE`),
  ADD KEY `ID_ETAPE` (`ID_ETAPE`);

--
-- Index pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD PRIMARY KEY (`ID_DOSSIER`,`ID_PROCEDURE`),
  ADD KEY `ID_PROCEDURE` (`ID_PROCEDURE`);

--
-- Index pour la table `tribunal`
--
ALTER TABLE `tribunal`
  ADD PRIMARY KEY (`ID_TRIBUNAL`),
  ADD KEY `ID_TTRIBUNAL` (`ID_TTRIBUNAL`),
  ADD KEY `ID_VILLE` (`ID_VILLE`);

--
-- Index pour la table `type_dossier`
--
ALTER TABLE `type_dossier`
  ADD PRIMARY KEY (`ID_TYPEDOSSIER`);

--
-- Index pour la table `type_tiere`
--
ALTER TABLE `type_tiere`
  ADD PRIMARY KEY (`ID_TYPET`);

--
-- Index pour la table `type_tribunal`
--
ALTER TABLE `type_tribunal`
  ADD PRIMARY KEY (`ID_TRIBUNAL`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`CIN`),
  ADD KEY `ID_NIVEAU` (`ID_NIVEAU`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`ID_VILLE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acl`
--
ALTER TABLE `acl`
  ADD CONSTRAINT `acl_ibfk_1` FOREIGN KEY (`ID_ACCES`) REFERENCES `acces` (`ID_ACCES`),
  ADD CONSTRAINT `acl_ibfk_2` FOREIGN KEY (`ID_NIVEAU`) REFERENCES `niveau` (`ID_NIVEAU`);

--
-- Contraintes pour la table `adversaires`
--
ALTER TABLE `adversaires`
  ADD CONSTRAINT `adversaires_ibfk_1` FOREIGN KEY (`ID_VILLE`) REFERENCES `ville` (`ID_VILLE`),
  ADD CONSTRAINT `adversaires_ibfk_2` FOREIGN KEY (`ID_TYPET`) REFERENCES `type_tiere` (`ID_TYPET`);

--
-- Contraintes pour la table `audiance`
--
ALTER TABLE `audiance`
  ADD CONSTRAINT `audiance_ibfk_1` FOREIGN KEY (`ID_TRIBUNAL`) REFERENCES `tribunal` (`ID_TRIBUNAL`),
  ADD CONSTRAINT `audiance_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `audiance_ibfk_3` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`);

--
-- Contraintes pour la table `cautionnaire`
--
ALTER TABLE `cautionnaire`
  ADD CONSTRAINT `cautionnaire_ibfk_1` FOREIGN KEY (`ID_ADVERSAIRE`) REFERENCES `adversaires` (`ID_ADVERSAIRE`),
  ADD CONSTRAINT `cautionnaire_ibfk_2` FOREIGN KEY (`ID_TYPET`) REFERENCES `type_tiere` (`ID_TYPET`);

--
-- Contraintes pour la table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`ID_TYPET`) REFERENCES `type_tiere` (`ID_TYPET`),
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`ID_VILLE`) REFERENCES `ville` (`ID_VILLE`);

--
-- Contraintes pour la table `cna`
--
ALTER TABLE `cna`
  ADD CONSTRAINT `cna_ibfk_1` FOREIGN KEY (`ID_TRIBUNAL`) REFERENCES `tribunal` (`ID_TRIBUNAL`),
  ADD CONSTRAINT `cna_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `cna_ibfk_3` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`);

--
-- Contraintes pour la table `currateur`
--
ALTER TABLE `currateur`
  ADD CONSTRAINT `currateur_ibfk_1` FOREIGN KEY (`ID_TRIBUNAL`) REFERENCES `tribunal` (`ID_TRIBUNAL`),
  ADD CONSTRAINT `currateur_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `currateur_ibfk_3` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`);

--
-- Contraintes pour la table `demande_dexpertise`
--
ALTER TABLE `demande_dexpertise`
  ADD CONSTRAINT `demande_dexpertise_ibfk_1` FOREIGN KEY (`ID_EXPERT`) REFERENCES `expert` (`ID_EXPERT`),
  ADD CONSTRAINT `demande_dexpertise_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `demande_dexpertise_ibfk_3` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`ID_DOSSIER`) REFERENCES `dossier` (`ID_DOSSIER`);

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `dossier_ibfk_1` FOREIGN KEY (`ID_NATURE`) REFERENCES `nature` (`ID_NATURE`),
  ADD CONSTRAINT `dossier_ibfk_2` FOREIGN KEY (`ID_TYPEDOSSIER`) REFERENCES `type_dossier` (`ID_TYPEDOSSIER`),
  ADD CONSTRAINT `dossier_ibfk_3` FOREIGN KEY (`ID_ADVERSAIRE`) REFERENCES `adversaires` (`ID_ADVERSAIRE`),
  ADD CONSTRAINT `dossier_ibfk_4` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `dossier_ibfk_5` FOREIGN KEY (`ID_CLIENT`) REFERENCES `clients` (`ID_CLIENT`);

--
-- Contraintes pour la table `execution`
--
ALTER TABLE `execution`
  ADD CONSTRAINT `execution_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `execution_ibfk_2` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`),
  ADD CONSTRAINT `execution_ibfk_3` FOREIGN KEY (`ID_HUISSIER`) REFERENCES `huissier` (`ID_HUISSIER`);

--
-- Contraintes pour la table `jugement`
--
ALTER TABLE `jugement`
  ADD CONSTRAINT `jugement_ibfk_1` FOREIGN KEY (`ID_TRIBUNAL`) REFERENCES `tribunal` (`ID_TRIBUNAL`),
  ADD CONSTRAINT `jugement_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `jugement_ibfk_3` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`);

--
-- Contraintes pour la table `lmd`
--
ALTER TABLE `lmd`
  ADD CONSTRAINT `lmd_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `lmd_ibfk_2` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`);

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`),
  ADD CONSTRAINT `notification_ibfk_3` FOREIGN KEY (`ID_HUISSIER`) REFERENCES `huissier` (`ID_HUISSIER`);

--
-- Contraintes pour la table `plainte`
--
ALTER TABLE `plainte`
  ADD CONSTRAINT `plainte_ibfk_1` FOREIGN KEY (`ID_TRIBUNAL`) REFERENCES `tribunal` (`ID_TRIBUNAL`),
  ADD CONSTRAINT `plainte_ibfk_2` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `plainte_ibfk_3` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`);

--
-- Contraintes pour la table `requete`
--
ALTER TABLE `requete`
  ADD CONSTRAINT `requete_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `requete_ibfk_2` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`),
  ADD CONSTRAINT `requete_ibfk_3` FOREIGN KEY (`ID_TRIBUNAL`) REFERENCES `tribunal` (`ID_TRIBUNAL`);

--
-- Contraintes pour la table `saisie`
--
ALTER TABLE `saisie`
  ADD CONSTRAINT `saisie_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `saisie_ibfk_2` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`),
  ADD CONSTRAINT `saisie_ibfk_3` FOREIGN KEY (`ID_HUISSIER`) REFERENCES `huissier` (`ID_HUISSIER`),
  ADD CONSTRAINT `saisie_ibfk_4` FOREIGN KEY (`ID_TRIBUNAL`) REFERENCES `tribunal` (`ID_TRIBUNAL`);

--
-- Contraintes pour la table `sph`
--
ALTER TABLE `sph`
  ADD CONSTRAINT `sph_ibfk_1` FOREIGN KEY (`CIN`) REFERENCES `utilisateurs` (`CIN`),
  ADD CONSTRAINT `sph_ibfk_2` FOREIGN KEY (`ID_DOSSIER`,`ID_PROCEDURE`) REFERENCES `traitement` (`ID_DOSSIER`, `ID_PROCEDURE`),
  ADD CONSTRAINT `sph_ibfk_3` FOREIGN KEY (`ID_HUISSIER`) REFERENCES `huissier` (`ID_HUISSIER`);

--
-- Contraintes pour la table `suivi`
--
ALTER TABLE `suivi`
  ADD CONSTRAINT `suivi_ibfk_1` FOREIGN KEY (`ID_ETAPE`) REFERENCES `etape` (`ID_ETAPE`),
  ADD CONSTRAINT `suivi_ibfk_2` FOREIGN KEY (`ID_PROCEDURE`) REFERENCES `procedures` (`ID_PROCEDURE`);

--
-- Contraintes pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD CONSTRAINT `traitement_ibfk_1` FOREIGN KEY (`ID_DOSSIER`) REFERENCES `dossier` (`ID_DOSSIER`),
  ADD CONSTRAINT `traitement_ibfk_2` FOREIGN KEY (`ID_PROCEDURE`) REFERENCES `procedures` (`ID_PROCEDURE`);

--
-- Contraintes pour la table `tribunal`
--
ALTER TABLE `tribunal`
  ADD CONSTRAINT `tribunal_ibfk_1` FOREIGN KEY (`ID_TTRIBUNAL`) REFERENCES `type_tribunal` (`ID_TRIBUNAL`),
  ADD CONSTRAINT `tribunal_ibfk_2` FOREIGN KEY (`ID_VILLE`) REFERENCES `ville` (`ID_VILLE`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`ID_NIVEAU`) REFERENCES `niveau` (`ID_NIVEAU`);
ALTER TABLE notification
    ADD COLUMN ville varchar(50) AFTER `ETAT_NOTIF`;
ALTER table cna
ADD COLUMN cna_etat int after `URL_CNA`;
ALTER table requete
ADD COLUMN sortRequete int after `DATE_JUGEMENT`;
Alter table audiance
add COLUMN ref_tribunal varchar(100) DEFAULT NULL after `ID_AUDIANCE`;
Alter table audiance
add COLUMN audianceRetrait date DEFAULT NULL after `DATE_AUDIANCE`;
Alter table expert
add COLUMN ID_VILLE int DEFAULT NULL;
alter table expert
ADD FOREIGN KEY (ID_VILLE) REFERENCES ville(ID_VILLE);
Alter table huissier
add COLUMN ID_VILLE int DEFAULT NULL;
alter table huissier
ADD FOREIGN KEY (ID_VILLE) REFERENCES ville(ID_VILLE);
ALTER table requete
ADD COLUMN UPDATED_AT datetime;
ALTER table audiance
ADD COLUMN UPDATED_AT datetime;
ALTER table jugement
ADD COLUMN UPDATED_AT datetime;
ALTER table notification
ADD COLUMN UPDATED_AT datetime;
ALTER table cna
ADD COLUMN UPDATED_AT datetime;
ALTER table execution
ADD COLUMN UPDATED_AT datetime;
ALTER table currateur
ADD COLUMN UPDATED_AT datetime;
Alter table requete
add COLUMN MODIFIE_PAR varchar(15) DEFAULT NULL;
Alter table audiance
add COLUMN MODIFIE_PAR varchar(15) DEFAULT NULL;
Alter table jugement
add COLUMN MODIFIE_PAR varchar(15) DEFAULT NULL;
Alter table notification
add COLUMN MODIFIE_PAR varchar(15) DEFAULT NULL;
Alter table cna
add COLUMN MODIFIE_PAR varchar(15) DEFAULT NULL;
Alter table execution
add COLUMN MODIFIE_PAR varchar(15) DEFAULT NULL;
Alter table currateur
add COLUMN MODIFIE_PAR varchar(15) DEFAULT NULL;
Alter table     audiance
add COLUMN HEURE_AUDIANCE TIME DEFAULT NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
