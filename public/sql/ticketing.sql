-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 03 avr. 2024 à 23:21
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ticketing`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `observation` text NOT NULL,
  `id_clients` bigint NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_clients`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `priorite`
--

DROP TABLE IF EXISTS `priorite`;
CREATE TABLE IF NOT EXISTS `priorite` (
  `id_priority` bigint NOT NULL AUTO_INCREMENT,
  `priority` varchar(255) NOT NULL,
  PRIMARY KEY (`id_priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `num_demande` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_type_demande` bigint NOT NULL,
  `id_priority` bigint NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `message` text NOT NULL,
  `piece_jointe` varchar(255) NOT NULL,
  `id_tickets` bigint NOT NULL AUTO_INCREMENT,
  `id_clients` bigint NOT NULL,
  PRIMARY KEY (`id_tickets`),
  UNIQUE KEY `num_demande` (`num_demande`),
  KEY `id_clients` (`id_clients`),
  KEY `id_priority` (`id_priority`),
  KEY `id_type_demande` (`id_type_demande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `type_demande`
--

DROP TABLE IF EXISTS `type_demande`;
CREATE TABLE IF NOT EXISTS `type_demande` (
  `id_demande` bigint NOT NULL AUTO_INCREMENT,
  `type_demande` varchar(255) NOT NULL,
  PRIMARY KEY (`id_demande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_tickets_clients` FOREIGN KEY (`id_clients`) REFERENCES `clients` (`id_clients`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tickets_demande` FOREIGN KEY (`id_type_demande`) REFERENCES `type_demande` (`id_demande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tickets_priority` FOREIGN KEY (`id_priority`) REFERENCES `priorite` (`id_priority`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
