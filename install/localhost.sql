-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 18 Septembre 2018 à 23:52
-- Version du serveur :  5.7.23-0ubuntu0.18.04.1
-- Version de PHP :  7.1.20-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test_ceetiz`
--
CREATE DATABASE IF NOT EXISTS `test_ceetiz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test_ceetiz`;

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `entreprise_id` int(11) NOT NULL,
  `siret` varchar(500) NOT NULL,
  `denomination` varchar(500) NOT NULL,
  `adresse_siege_social` text,
  `chiffre_affaire` decimal(15,2) NOT NULL,
  `type` varchar(50) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`entreprise_id`, `siret`, `denomination`, `adresse_siege_social`, `chiffre_affaire`, `type`, `date_creation`) VALUES
(1, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'SAS', '2018-09-17 23:47:41'),
(2, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'SAS', '2018-09-17 23:47:41'),
(3, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'SAS', '2018-09-17 23:47:41'),
(4, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'SAS', '2018-09-17 23:47:41'),
(5, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'SAS', '2018-09-17 23:47:41'),
(6, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'AE', '2018-09-17 23:47:41'),
(7, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'AE', '2018-09-17 23:47:41'),
(8, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'AE', '2018-09-17 23:47:41'),
(9, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'AE', '2018-09-18 01:01:53'),
(10, '362 521 879 00034', 'La mutuelle du castor', '13, Avenue Joseph Kessel, 78180, Montigny-le-Bretonneux', '1000000.00', 'AE', '2018-09-17 23:47:41'),
(11, '362 521 879 00034', 'WebFactory', NULL, '1200000.00', 'AE', '2018-09-18 12:39:50'),
(14, '000 521 879 00034', 'La bonne compagnie', NULL, '1900000.00', 'AE', '2018-09-18 13:21:50'),
(16, '362 521 879 00034', 'Entreprise du chef', NULL, '1200000.00', 'AE', '2018-09-18 20:41:17'),
(17, '362 521 879 00034', 'Entreprise du chef', NULL, '1200000.00', 'AE', '2018-09-18 20:41:49'),
(18, '362 521 879 00034AAAA', 'Entreprise du chef', NULL, '1200000.00', 'AE', '2018-09-18 20:44:31'),
(19, '362 521 879 00034', 'Entreprise du chef', NULL, '1200000.00', 'AE', '2018-09-18 20:44:50'),
(20, '362 521 879 00034', 'Entreprise du chef', NULL, '0.00', 'AE', '2018-09-18 20:45:16');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`entreprise_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `entreprise_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
