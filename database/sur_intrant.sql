-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 07 mai 2020 à 19:12
-- Version du serveur :  5.7.27-0ubuntu0.16.04.1
-- Version de PHP :  7.3.11-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sur_intrant`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--


--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id`, `nom_acteur`, `created_at`, `updated_at`, `secteur_ou_commune_id`) VALUES
(1, 'NKUSU', '2020-05-07 11:20:22', '2020-05-07 11:20:22', 1);

-- --------------------------------------------------------


--
-- Structure de la table `fss_intrants`
--

--
-- Déchargement des données de la table `fss_intrants`
--

INSERT INTO `fss_intrants` (`id`, `nom_fss_intrant`, `created_at`, `updated_at`, `secteur_ou_commune_id`) VALUES
(1, 'agri_congo', '2020-05-07 13:32:02', '2020-05-07 13:32:02', 1),
(2, 'mbimbi_agri', '2020-05-07 13:39:43', '2020-05-07 13:39:43', 1);

-- --------------------------------------------------------

--
-- Structure de la table `fss_intrant_intrant`
--


--
-- Déchargement des données de la table `fss_intrant_intrant`
--

INSERT INTO `fss_intrant_intrant` (`id`, `fss_intrant_id`, `intrant_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-05-06 23:00:00', '2020-05-06 23:00:00'),
(2, 2, 1, '2020-05-06 23:00:00', '2020-05-06 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `id_appels`
--


--
-- Déchargement des données de la table `id_appels`
--

INSERT INTO `id_appels` (`id`, `valeur`, `fss_intrant_id`, `type_appel_id`, `created_at`, `updated_at`) VALUES
(1, '+243824019836', 1, 1, '2020-05-07 18:14:00', '2020-05-06 23:00:00'),
(2, '+243824513503', 2, 1, '2020-05-06 23:00:00', '2020-05-06 23:00:00'),
(3, '555444', 1, 2, '2020-05-06 23:00:00', '2020-05-06 23:00:00'),
(4, '444555', 2, 2, '2020-05-06 23:00:00', '2020-05-06 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `intrants`
--


--
-- Déchargement des données de la table `intrants`
--

INSERT INTO `intrants` (`id`, `nom_intrant`, `created_at`, `updated_at`) VALUES
(1, 'tracteur', '2020-05-07 11:21:43', '2020-05-07 11:21:43');

-- --------------------------------------------------------

--
-- Structure de la table `secteur_ou_communes`
--

--
-- Déchargement des données de la table `secteur_ou_communes`
--

INSERT INTO `secteur_ou_communes` (`id`, `nom_secteur_ou_commune`, `created_at`, `updated_at`) VALUES
(1, 'NSELE', '2020-05-07 12:03:19', '2020-05-07 12:03:19');

-- --------------------------------------------------------
--
-- Déchargement des données de la table `secteur_ou_commune_fss_intrants`
--

INSERT INTO `secteur_ou_commune_fss_intrants` (`id`, `secteur_ou_commune_id`, `fss_intrant_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_appels`
--

--
-- Déchargement des données de la table `type_appels`
--

INSERT INTO `type_appels` (`id`, `nom_type_appel`, `created_at`, `updated_at`) VALUES
(1, 'appel_telephonique', '2020-05-06 23:00:00', '2020-05-06 23:00:00'),
(2, 'appel_ip', '2020-05-06 23:00:00', '2020-05-06 23:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--
--
-- Index pour les tables déchargées
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
