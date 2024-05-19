-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 19 mai 2024 à 22:12
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `transportManager`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Administrateur`
--

INSERT INTO `Administrateur` (`id`, `address`, `password`) VALUES
(1, 'root@gmail.com', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785');

-- --------------------------------------------------------

--
-- Structure de la table `chauffeurs`
--

CREATE TABLE `chauffeurs` (
  `chauffeur_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `disponible` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chauffeurs`
--

INSERT INTO `chauffeurs` (`chauffeur_id`, `nom`, `prenoms`, `telephone`, `sexe`, `disponible`) VALUES
(1, 'CODJO', 'jean', '58989874', 'Masculin', 1),
(2, 'HOUNGA', 'Euphrem', '68986588', 'Masculin', 0),
(3, 'DA-SILVA', 'Jonathan', '58454847', 'Masculin', 0),
(4, 'LAPLACE', 'Simon', '59874547', 'Masculin', 1);

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `point_depart` varchar(150) NOT NULL,
  `point_arrivee` varchar(150) NOT NULL,
  `date_heure` datetime NOT NULL,
  `chauffeur_id` int(11) DEFAULT NULL,
  `statut` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`course_id`, `point_depart`, `point_arrivee`, `date_heure`, `chauffeur_id`, `statut`) VALUES
(1, 'kpota', 'seme', '2024-05-24 05:05:00', NULL, 'En cours'),
(2, 'parakou', 'cotonou', '2024-05-17 12:45:00', NULL, 'En cours'),
(3, 'parakou', 'seme', '2024-05-22 12:45:00', NULL, 'En cours'),
(4, 'parakou', 'cotonou', '2024-05-09 12:05:00', NULL, 'En cours'),
(5, 'parakou', 'cotonou', '2024-05-15 04:01:00', NULL, 'En cours'),
(6, 'parakou', 'Dantokpa', '2024-05-24 07:04:00', 1, 'Terminée'),
(8, 'parakou', 'cotonou', '2024-05-17 04:42:00', NULL, 'En cours'),
(9, 'cotonou', 'calavi', '2024-05-23 15:45:00', 2, 'En cours'),
(10, 'Djevali', 'Dantokpa', '2024-05-24 07:45:00', 3, 'Terminée');

-- --------------------------------------------------------

--
-- Structure de la table `Personnel`
--

CREATE TABLE `Personnel` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Personnel`
--

INSERT INTO `Personnel` (`id`, `address`, `password`) VALUES
(1, 'eli@gmail.com', '3ca62a2ad87376be2697209a1770e1afdbbba220'),
(2, 'kami@gmail.com', 'ae1acefdf2dcf5970ec82ed6b0b5750975431be0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  ADD PRIMARY KEY (`chauffeur_id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `chauffeur_id` (`chauffeur_id`);

--
-- Index pour la table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `chauffeurs`
--
ALTER TABLE `chauffeurs`
  MODIFY `chauffeur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `Personnel`
--
ALTER TABLE `Personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`chauffeur_id`) REFERENCES `chauffeurs` (`chauffeur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
