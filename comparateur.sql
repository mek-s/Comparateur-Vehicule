-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 jan. 2024 à 06:22
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comparateur`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(60) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

DROP TABLE IF EXISTS `avis`;
CREATE TABLE IF NOT EXISTS `avis` (
  `avis_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `vehicule_id` int DEFAULT NULL,
  `marque_id` int DEFAULT NULL,
  `status` enum('ettente','valide') DEFAULT NULL,
  `commentaire` char(1) DEFAULT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`avis_id`),
  KEY `user_id` (`user_id`),
  KEY `vehicule_id` (`vehicule_id`),
  KEY `marque_id` (`marque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

DROP TABLE IF EXISTS `caracteristiques`;
CREATE TABLE IF NOT EXISTS `caracteristiques` (
  `carac_id` int NOT NULL AUTO_INCREMENT,
  `carac_nom` varchar(40) DEFAULT NULL,
  `unite_mesure` varchar(10) NOT NULL,
  `image_id` int DEFAULT NULL,
  PRIMARY KEY (`carac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `caracteristiques`
--

INSERT INTO `caracteristiques` (`carac_id`, `carac_nom`, `unite_mesure`, `image_id`) VALUES
(8, 'Type Moteur', '', 20),
(9, 'Consommation', 'kpl', 22),
(10, 'Transmission', '', 21),
(11, 'Type Essance', '', 19),
(12, 'Prix', 'dzd', 18);

-- --------------------------------------------------------

--
-- Structure de la table `carac_vehicule`
--

DROP TABLE IF EXISTS `carac_vehicule`;
CREATE TABLE IF NOT EXISTS `carac_vehicule` (
  `carac_id` int NOT NULL,
  `vehicule_id` int NOT NULL,
  `value` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`carac_id`,`vehicule_id`),
  KEY `vehicule_id` (`vehicule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `carac_vehicule`
--

INSERT INTO `carac_vehicule` (`carac_id`, `vehicule_id`, `value`) VALUES
(7, 49, '829 760 000'),
(4, 49, 'Diesel'),
(3, 49, 'Automatic'),
(2, 49, '10.13'),
(1, 49, 'Electric'),
(7, 43, '679 860 000'),
(4, 43, 'Diesel'),
(3, 43, 'Automatic'),
(2, 43, '10.13'),
(1, 43, 'Electric'),
(7, 37, '579 960 000'),
(4, 37, 'Diesel'),
(3, 37, 'Automatic'),
(2, 37, '10.13'),
(1, 37, 'Electric'),
(7, 25, '479 560 000'),
(4, 25, 'Diesel'),
(3, 25, 'Automatic'),
(2, 25, '10.13'),
(1, 25, 'Electric'),
(7, 20, '379 560 000'),
(4, 20, 'Diesel'),
(3, 20, 'Automatic'),
(2, 20, '10.13'),
(1, 20, 'Electric'),
(7, 5, '289 350 000'),
(4, 5, 'Diesel'),
(3, 5, 'Automatic'),
(2, 5, '10.13'),
(1, 5, 'Electric'),
(7, 19, '675 990 000'),
(4, 19, 'Diesel'),
(3, 19, 'Automatic'),
(2, 19, '10.13'),
(1, 19, 'Electric'),
(7, 13, '879 560 000'),
(4, 13, 'Diesel'),
(3, 13, 'Automatic'),
(2, 13, '10.13'),
(1, 13, 'Electric'),
(7, 7, '900 500 000'),
(4, 7, 'Diesel'),
(3, 7, 'Automatic'),
(2, 7, '10.13'),
(1, 7, 'Electric'),
(7, 1, '150 000 000'),
(4, 1, 'Diesel'),
(3, 1, 'Automatic'),
(2, 1, '10.13'),
(1, 1, 'Electric'),
(1, 3, 'Electric'),
(2, 3, '10.13'),
(3, 3, 'Automatic'),
(4, 3, 'Diesel'),
(7, 3, '839 660 000'),
(1, 61, 'Electric'),
(2, 61, '10.13'),
(3, 61, 'Automatic'),
(4, 61, 'Diesel'),
(7, 61, '849 560 000'),
(1, 10, 'Electric'),
(2, 10, '10.13'),
(3, 10, 'Automatic'),
(4, 10, 'Diesel'),
(7, 10, '859 460 000'),
(1, 40, 'Electric'),
(2, 40, '10.13'),
(3, 40, 'Automatic'),
(4, 40, 'Diesel'),
(7, 40, '869 360 000'),
(1, 9, 'Electric'),
(2, 9, '10.13'),
(3, 9, 'Automatic'),
(4, 9, 'Diesel'),
(7, 9, '889 260 000'),
(12, 88, '1000000'),
(11, 88, 'Diesel'),
(10, 88, 'Manuel'),
(9, 88, '1800'),
(8, 88, 'Diesel'),
(8, 89, 'Diesel'),
(9, 89, '1800'),
(10, 89, 'Manuel'),
(11, 89, 'Diesel'),
(12, 89, '1000000'),
(8, 90, 'Electric'),
(9, 90, '2200'),
(10, 90, 'Auto'),
(11, 90, 'Electric'),
(12, 90, '98000000');

-- --------------------------------------------------------

--
-- Structure de la table `comparaisons`
--

DROP TABLE IF EXISTS `comparaisons`;
CREATE TABLE IF NOT EXISTS `comparaisons` (
  `vehicule_1` int NOT NULL,
  `vehicule_2` int NOT NULL,
  `vehicule_3` int DEFAULT NULL,
  `vehicule_4` int DEFAULT NULL,
  `rech` int DEFAULT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`vehicule_1`,`vehicule_2`),
  KEY `vehicule_1` (`vehicule_1`,`vehicule_2`,`vehicule_3`,`vehicule_4`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `contact_nom` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  `image_id` int DEFAULT NULL,
  PRIMARY KEY (`contact_id`),
  KEY `image_id` (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `contact_nom`, `value`, `image_id`) VALUES
(1, 'facebook', 'http://www.facebook.com/fordfrance', 6),
(2, 'email', 'https://www.gmail.com', 7),
(3, 'instagram', 'https://www.instagram.com/fordfrance/', 8);

-- --------------------------------------------------------

--
-- Structure de la table `diaporama`
--

DROP TABLE IF EXISTS `diaporama`;
CREATE TABLE IF NOT EXISTS `diaporama` (
  `diapo_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`diapo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris_marques`
--

DROP TABLE IF EXISTS `favoris_marques`;
CREATE TABLE IF NOT EXISTS `favoris_marques` (
  `user_id` int NOT NULL,
  `marque_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`marque_id`),
  KEY `marque_id` (`marque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favoris_vehicules`
--

DROP TABLE IF EXISTS `favoris_vehicules`;
CREATE TABLE IF NOT EXISTS `favoris_vehicules` (
  `user_id` int NOT NULL,
  `vehicule_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`vehicule_id`),
  KEY `vehicule_id` (`vehicule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `guides`
--

DROP TABLE IF EXISTS `guides`;
CREATE TABLE IF NOT EXISTS `guides` (
  `guide_id` int NOT NULL AUTO_INCREMENT,
  `conseils` char(1) DEFAULT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`guide_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `chemin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`image_id`, `chemin`) VALUES
(9, 'ford.png'),
(8, 'instagram.png'),
(7, 'email.png'),
(6, 'facebook.png'),
(10, 'hyundai.png'),
(11, 'skoda.jpg'),
(12, 'suzuki.png'),
(13, 'toyota.jpg'),
(14, 'suzuki.png'),
(15, 'toyota.png'),
(16, 'ford.jpg'),
(17, 'hyundai.png'),
(18, 'Price.png'),
(19, 'Fuel.png'),
(20, 'Engine.png'),
(21, 'Transmission.png'),
(22, 'Conso.png'),
(27, 'skoda.jpg'),
(26, 'bmw.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `marque_id` int NOT NULL AUTO_INCREMENT,
  `marque_nom` varchar(50) NOT NULL,
  `pays_origine` varchar(50) DEFAULT NULL,
  `siege_social` varchar(50) DEFAULT NULL,
  `annee_creation` year DEFAULT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  `principale` tinyint(1) DEFAULT NULL,
  `guide_id` int DEFAULT NULL,
  `image_id` int DEFAULT NULL,
  PRIMARY KEY (`marque_id`),
  KEY `image_id` (`image_id`),
  KEY `guide_id` (`guide_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`marque_id`, `marque_nom`, `pays_origine`, `siege_social`, `annee_creation`, `supp`, `principale`, `guide_id`, `image_id`) VALUES
(4, 'Hyundai', 'États-Unis', 'Californie', 1986, 0, 1, NULL, 10),
(3, 'Skoda', 'Tchequie', 'Boleslav', 0000, 0, 1, NULL, 11),
(5, 'Ford', 'États-Unis', 'Michigan', 1903, 0, 1, NULL, 9),
(6, 'Suzuki', 'Japon', 'Hamamatsu', 1909, 0, 1, NULL, 12),
(7, 'Toyota', 'Japon', 'Aichi', 1926, 0, 1, NULL, 13);

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `modele_id` int NOT NULL AUTO_INCREMENT,
  `modele_nom` varchar(100) DEFAULT NULL,
  `marque_id` int NOT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`modele_id`),
  KEY `marque_id` (`marque_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`modele_id`, `modele_nom`, `marque_id`, `supp`) VALUES
(1, 'Focus', 5, 0),
(2, 'Escape', 5, 0),
(3, 'Ranger', 5, 0),
(4, 'Swift', 6, 0),
(5, 'Vitara', 6, 0),
(6, 'Jimny', 6, 0),
(7, 'Corolla', 7, 0),
(8, 'RAV4', 7, 0),
(9, 'Hilux', 7, 0),
(10, 'i30', 4, 0),
(11, 'Kona', 4, 0),
(12, 'Santa Fe', 4, 0),
(13, 'Coupé', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `descprition` char(1) DEFAULT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `note_marques`
--

DROP TABLE IF EXISTS `note_marques`;
CREATE TABLE IF NOT EXISTS `note_marques` (
  `user_id` int NOT NULL,
  `marque_id` int NOT NULL,
  `note` float DEFAULT NULL,
  PRIMARY KEY (`user_id`,`marque_id`),
  KEY `marque_id` (`marque_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `note_marques`
--

INSERT INTO `note_marques` (`user_id`, `marque_id`, `note`) VALUES
(1, 3, 3.5),
(2, 3, 2.5),
(3, 3, 4),
(1, 4, 2.5),
(2, 4, 3),
(3, 4, 3.5),
(1, 5, 5),
(2, 5, 4),
(3, 5, 4.5),
(1, 6, 1.5),
(2, 6, 2.5),
(3, 6, 3.5),
(1, 7, 3),
(2, 7, 3.5),
(3, 7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `note_vehicules`
--

DROP TABLE IF EXISTS `note_vehicules`;
CREATE TABLE IF NOT EXISTS `note_vehicules` (
  `user_id` int NOT NULL,
  `vehicule_id` int NOT NULL,
  `note` float DEFAULT NULL,
  PRIMARY KEY (`user_id`,`vehicule_id`),
  KEY `vehicule_id` (`vehicule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `note_vehicules`
--

INSERT INTO `note_vehicules` (`user_id`, `vehicule_id`, `note`) VALUES
(1, 1, 4),
(2, 4, 4),
(3, 7, 4),
(1, 10, 4),
(2, 13, 4),
(3, 16, 4),
(1, 19, 4),
(2, 21, 4),
(3, 24, 4),
(1, 27, 4),
(2, 30, 4),
(3, 33, 4),
(1, 36, 4),
(2, 39, 4),
(3, 41, 4),
(1, 44, 4),
(2, 47, 4),
(3, 50, 4),
(1, 53, 4),
(2, 56, 4),
(3, 59, 4),
(1, 61, 4),
(2, 64, 4),
(3, 67, 4),
(1, 70, 4),
(2, 73, 4),
(3, 76, 4),
(1, 79, 4),
(2, 81, 4),
(3, 20, 4),
(1, 40, 4),
(2, 55, 4),
(2, 1, 3.5),
(3, 1, 2),
(1, 49, 3.5),
(5, 49, 5);

-- --------------------------------------------------------

--
-- Structure de la table `pubs`
--

DROP TABLE IF EXISTS `pubs`;
CREATE TABLE IF NOT EXISTS `pubs` (
  `pub_id` int NOT NULL AUTO_INCREMENT,
  `pub_link` int NOT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`pub_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `style`
--

DROP TABLE IF EXISTS `style`;
CREATE TABLE IF NOT EXISTS `style` (
  `style_id` int NOT NULL AUTO_INCREMENT,
  `primary_color` varchar(50) DEFAULT NULL,
  `secondary_color` varchar(50) DEFAULT NULL,
  `teritiary_color` varchar(50) DEFAULT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`style_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_nom` varchar(50) NOT NULL,
  `user_prenom` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sexe` enum('masculin','feminin') DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `status` enum('bloque','confirme','attente') DEFAULT NULL,
  `mdp` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_nom`, `user_prenom`, `email`, `sexe`, `date_naissance`, `status`, `mdp`) VALUES
(1, 'Mekki', 'Soumeya', 'email1@gmail.com', 'feminin', '0000-00-00', '', '12345678'),
(2, 'Mekki', 'Mohamed', 'email2@gmail.com', 'masculin', '0000-00-00', '', 'abc123'),
(3, 'Mekki', 'Ali', 'email3@gmail.com', 'masculin', '0000-00-00', '', '123abc');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `vehicule_id` int NOT NULL AUTO_INCREMENT,
  `vehicule_nom` varchar(100) NOT NULL,
  `type` enum('voiture','moto','camion') DEFAULT NULL,
  `version_id` int NOT NULL,
  `annee` year DEFAULT NULL,
  `principal` tinyint(1) DEFAULT '0',
  `supp` tinyint(1) DEFAULT '0',
  `image_id` int DEFAULT NULL,
  `guide_id` int DEFAULT NULL,
  PRIMARY KEY (`vehicule_id`),
  KEY `image_id` (`image_id`),
  KEY `version_id` (`version_id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`vehicule_id`, `vehicule_nom`, `type`, `version_id`, `annee`, `principal`, `supp`, `image_id`, `guide_id`) VALUES
(1, 'Focus Trend 1.0 EcoBoost', 'voiture', 1, 2020, 1, 0, 16, NULL),
(2, 'Focus Trend 1.0 EcoBoost', 'voiture', 1, 2021, 0, 0, 16, NULL),
(3, 'Focus Trend 1.0 EcoBoost', 'voiture', 1, 2022, 0, 0, 16, NULL),
(4, 'Focus Titanium 1.5 EcoBoost', 'voiture', 2, 2019, 0, 0, 16, NULL),
(5, 'Focus Titanium 1.5 EcoBoost', 'voiture', 2, 2020, 1, 0, 16, NULL),
(6, 'Focus Titanium 1.5 EcoBoost', 'voiture', 2, 2021, 0, 0, 16, NULL),
(7, 'Focus ST 2.3 EcoBoost', 'voiture', 3, 2021, 1, 0, 16, NULL),
(8, 'Focus ST 2.3 EcoBoost', 'voiture', 3, 2022, 0, 0, 16, NULL),
(9, 'Focus ST 2.3 EcoBoost', 'voiture', 3, 2023, 0, 0, 16, NULL),
(10, 'Escape S 2.5 Duratec', 'voiture', 4, 2020, 1, 0, 16, NULL),
(11, 'Escape S 2.5 Duratec', 'voiture', 4, 2021, 0, 0, 16, NULL),
(12, 'Escape S 2.5 Duratec', 'voiture', 4, 2022, 0, 0, 16, NULL),
(13, 'Escape SE 1.5 EcoBoost', 'voiture', 5, 2019, 1, 0, 16, NULL),
(14, 'Escape SE 1.5 EcoBoost', 'voiture', 5, 2020, 0, 0, 16, NULL),
(15, 'Escape SE 1.5 EcoBoost', 'voiture', 5, 2021, 0, 0, 16, NULL),
(16, 'Escape Titanium 2.0 EcoBoost', 'voiture', 6, 2021, 1, 0, 16, NULL),
(17, 'Escape Titanium 2.0 EcoBoost', 'voiture', 6, 2022, 0, 0, 16, NULL),
(18, 'Escape Titanium 2.0 EcoBoost', 'voiture', 6, 2023, 0, 0, 16, NULL),
(19, 'Ranger XL 2.3 EcoBoost', 'voiture', 7, 2020, 1, 0, 16, NULL),
(20, 'Ranger XL 2.3 EcoBoost', 'voiture', 7, 2021, 0, 0, 16, NULL),
(21, 'Ranger XL 2.3 EcoBoost', 'voiture', 7, 2022, 0, 0, 16, NULL),
(22, 'Ranger XLT 2.0 EcoBlue', 'voiture', 8, 2019, 1, 0, 16, NULL),
(23, 'Ranger XLT 2.0 EcoBlue', 'voiture', 8, 2020, 0, 0, 16, NULL),
(24, 'Ranger XLT 2.0 EcoBlue', 'voiture', 8, 2021, 0, 0, 16, NULL),
(25, 'Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, 2021, 1, 0, 16, NULL),
(26, 'Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, 2022, 0, 0, 16, NULL),
(27, 'Ranger Wildtrak 3.0 Power Stroke', 'voiture', 9, 2023, 0, 0, 16, NULL),
(28, 'Swift GL 1.2 Dualjet', 'voiture', 10, 2019, 1, 0, 14, NULL),
(29, 'Swift GL 1.2 Dualjet', 'voiture', 10, 2020, 0, 0, 14, NULL),
(30, 'Swift GL 1.2 Dualjet', 'voiture', 10, 2021, 0, 0, 14, NULL),
(31, 'Swift GLX 1.4 Boosterjet', 'voiture', 11, 2020, 1, 0, 14, NULL),
(32, 'Swift GLX 1.4 Boosterjet', 'voiture', 11, 2021, 0, 0, 14, NULL),
(33, 'Swift GLX 1.4 Boosterjet', 'voiture', 11, 2022, 0, 0, 14, NULL),
(34, 'Swift Sport 1.4 Boosterjet', 'voiture', 12, 2021, 1, 0, 14, NULL),
(35, 'Swift Sport 1.4 Boosterjet', 'voiture', 12, 2022, 0, 0, 14, NULL),
(36, 'Swift Sport 1.4 Boosterjet', 'voiture', 12, 2023, 0, 0, 14, NULL),
(37, 'Vitara GL 1.6 VVT', 'voiture', 13, 2020, 1, 0, 14, NULL),
(38, 'Vitara GL 1.6 VVT', 'voiture', 13, 2021, 0, 0, 14, NULL),
(39, 'Vitara GL 1.6 VVT', 'voiture', 13, 2022, 0, 0, 14, NULL),
(40, 'Vitara SZ-T 1.4 Boosterjet', 'voiture', 14, 2019, 1, 0, 14, NULL),
(41, 'Vitara SZ-T 1.4 Boosterjet', 'voiture', 14, 2020, 0, 0, 14, NULL),
(42, 'Vitara SZ-T 1.4 Boosterjet', 'voiture', 14, 2021, 0, 0, 14, NULL),
(43, 'Vitara SZ5 1.4 Boosterjet', 'voiture', 15, 2021, 1, 0, 14, NULL),
(44, 'Vitara SZ5 1.4 Boosterjet', 'voiture', 15, 2022, 0, 0, 14, NULL),
(45, 'Vitara SZ5 1.4 Boosterjet', 'voiture', 15, 2023, 0, 0, 14, NULL),
(46, 'Jimny SZ4 1.5', 'voiture', 16, 2020, 1, 0, 14, NULL),
(47, 'Jimny SZ4 1.5', 'voiture', 16, 2021, 0, 0, 14, NULL),
(48, 'Jimny SZ4 1.5', 'voiture', 16, 2022, 0, 0, 14, NULL),
(49, 'Jimny SZ5 1.5 AllGrip', 'voiture', 17, 2019, 1, 0, 14, NULL),
(50, 'Jimny SZ5 1.5 AllGrip', 'voiture', 17, 2020, 0, 0, 14, NULL),
(51, 'Jimny SZ5 1.5 AllGrip', 'voiture', 17, 2021, 0, 0, 14, NULL),
(52, 'Jimny Sierra 1.5 AllGrip', 'voiture', 18, 2021, 1, 0, 14, NULL),
(53, 'Jimny Sierra 1.5 AllGrip', 'voiture', 18, 2022, 0, 0, 14, NULL),
(54, 'Jimny Sierra 1.5 AllGrip', 'voiture', 18, 2023, 0, 0, 14, NULL),
(55, 'i10 SE 1.0 T-GDI', 'voiture', 28, 2020, 1, 0, 17, NULL),
(56, 'i10 SE 1.0 T-GDI', 'voiture', 28, 2021, 0, 0, 17, NULL),
(57, 'i10 SE 1.0 T-GDI', 'voiture', 28, 2022, 0, 0, 17, NULL),
(58, 'i10 N Line 1.5 T-GDI', 'voiture', 29, 2019, 1, 0, 17, NULL),
(59, 'i10 N Line 1.5 T-GDI', 'voiture', 29, 2020, 0, 0, 17, NULL),
(60, 'i10 N Line 1.5 T-GDI', 'voiture', 29, 2021, 0, 0, 17, NULL),
(61, 'i10 Fastback N 2.0 T-GDI', 'voiture', 30, 2021, 1, 0, 17, NULL),
(62, 'i10 Fastback N 2.0 T-GDI', 'voiture', 30, 2022, 0, 0, 17, NULL),
(63, 'i10 Fastback N 2.0 T-GDI', 'voiture', 30, 2023, 0, 0, 17, NULL),
(64, 'Kona SE 2.0L', 'voiture', 31, 2020, 1, 0, 17, NULL),
(65, 'Kona SE 2.0L', 'voiture', 31, 2021, 0, 0, 17, NULL),
(66, 'Kona SE 2.0L', 'voiture', 31, 2022, 0, 0, 17, NULL),
(67, 'Kona SEL 1.6T', 'voiture', 32, 2019, 1, 0, 17, NULL),
(68, 'Kona SEL 1.6T', 'voiture', 32, 2020, 0, 0, 17, NULL),
(69, 'Kona SEL 1.6T', 'voiture', 32, 2021, 0, 0, 17, NULL),
(70, 'Kona Ultimate 1.6T', 'voiture', 33, 2021, 1, 0, 17, NULL),
(71, 'Kona Ultimate 1.6T', 'voiture', 33, 2022, 0, 0, 17, NULL),
(72, 'Kona Ultimate 1.6T', 'voiture', 33, 2023, 0, 0, 17, NULL),
(73, 'Santa Fe SE 2.4L', 'voiture', 34, 2020, 1, 0, 17, NULL),
(74, 'Santa Fe SE 2.4L', 'voiture', 34, 2021, 0, 0, 17, NULL),
(75, 'Santa Fe SE 2.4L', 'voiture', 34, 2022, 0, 0, 17, NULL),
(76, 'Santa Fe SEL 2.0T', 'voiture', 34, 2019, 1, 0, 17, NULL),
(77, 'Santa Fe SEL 2.0T', 'voiture', 34, 2020, 0, 0, 17, NULL),
(78, 'Santa Fe SEL 2.0T', 'voiture', 34, 2021, 0, 0, 17, NULL),
(79, 'Santa Fe Limited 2.2 CRDi', 'voiture', 34, 2021, 1, 0, 17, NULL),
(80, 'Santa Fe Limited 2.2 CRDi', 'voiture', 34, 2022, 0, 0, 17, NULL),
(81, 'Santa Fe Limited 2.2 CRDi', 'voiture', 34, 2023, 0, 0, 17, NULL),
(90, 'Skoda Enyaq Coupé iV', 'voiture', 37, 2022, 1, 0, 27, NULL),
(89, 'Bmw Sedan ', 'voiture', 10, 2023, 0, 0, 26, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `versions`
--

DROP TABLE IF EXISTS `versions`;
CREATE TABLE IF NOT EXISTS `versions` (
  `version_id` int NOT NULL AUTO_INCREMENT,
  `version_nom` varchar(100) NOT NULL,
  `modele_id` int NOT NULL,
  `date_debut` year DEFAULT NULL,
  `date_fin` year DEFAULT NULL,
  `supp` tinyint(1) DEFAULT NULL,
  `guide_id` int DEFAULT NULL,
  PRIMARY KEY (`version_id`,`version_nom`),
  KEY `guide_id` (`guide_id`),
  KEY `modele_id` (`modele_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `versions`
--

INSERT INTO `versions` (`version_id`, `version_nom`, `modele_id`, `date_debut`, `date_fin`, `supp`, `guide_id`) VALUES
(1, 'Trend 1.0 EcoBoost', 1, 2020, 2023, 0, NULL),
(2, 'Titanium 1.5 EcoBoost', 1, 2019, 2021, 0, NULL),
(3, 'ST 2.3 EcoBoost', 1, 2021, 2023, 0, NULL),
(4, 'S 2.5 Duratec', 2, 2020, 2022, 0, NULL),
(5, 'SE 1.5 EcoBoost', 2, 2019, 2021, 0, NULL),
(6, 'Titanium 2.0 EcoBoost', 2, 2021, 2023, 0, NULL),
(7, 'XL 2.3 EcoBoost', 3, 2020, 2022, 0, NULL),
(8, 'XLT 2.0 EcoBlue', 3, 2019, 2021, 0, NULL),
(9, 'Wildtrak 3.0 Power Stroke', 3, 2021, 2023, 0, NULL),
(10, 'GL 1.2 Dualjet', 4, 2019, 2021, 0, NULL),
(11, 'GLX 1.4 Boosterjet', 4, 2020, 2022, 0, NULL),
(12, 'Sport 1.4 Boosterjet', 4, 2021, 2023, 0, NULL),
(13, 'GL 1.6 VVT', 5, 2020, 2022, 0, NULL),
(14, 'SZ-T 1.4 Boosterjet', 5, 2019, 2021, 0, NULL),
(15, 'SZ5 1.4 Boosterjet', 5, 2021, 2023, 0, NULL),
(16, 'SZ4 1.5', 6, 2020, 2022, 0, NULL),
(17, 'SZ5 1.5 AllGrip', 6, 2019, 2021, 0, NULL),
(18, 'Sierra 1.5 AllGrip', 6, 2021, 2023, 0, NULL),
(19, 'L 1.8L', 7, 2020, 2022, 0, NULL),
(20, 'LE 1.8L Hybrid', 7, 2019, 2021, 0, NULL),
(21, 'XSE 2.0L', 7, 2021, 2023, 0, NULL),
(22, 'LE 2.5L', 8, 2020, 2022, 0, NULL),
(23, 'XLE 2.5L Hybrid', 8, 2019, 2021, 0, NULL),
(24, 'Limited 2.5L', 8, 2021, 2023, 0, NULL),
(25, 'SR5 2.8L Diesel', 9, 2020, 2022, 0, NULL),
(26, 'Invincible X 2.8L Diesel', 9, 2019, 2021, 0, NULL),
(27, 'Rogue 3.0L Diesel', 9, 2021, 2023, 0, NULL),
(28, 'SE 1.0 T-GDI', 10, 2020, 2022, 0, NULL),
(29, 'N Line 1.5 T-GDI', 10, 2019, 2021, 0, NULL),
(30, 'Fastback N 2.0 T-GDI', 10, 2021, 2023, 0, NULL),
(31, 'SE 2.0L', 11, 2020, 2022, 0, NULL),
(32, 'SEL 1.6T', 11, 2019, 2021, 0, NULL),
(33, 'Ultimate 1.6T', 11, 2021, 2023, 0, NULL),
(34, 'SE 2.4L', 12, 2020, 2022, 0, NULL),
(35, 'SEL 2.0T', 12, 2019, 2021, 0, NULL),
(36, 'Limited 2.2 CRDi', 12, 2021, 2023, 0, NULL),
(37, 'Enyaq', 13, 2020, 2025, 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
