-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : viguierhywadmweb.mysql.db
-- Généré le : mer. 24 nov. 2021 à 23:22
-- Version du serveur : 5.6.50-log
-- Version de PHP : 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `viguierhywadmweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `num_page` int(255) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `num_page`, `file_name`, `uploaded_on`, `status`) VALUES
(3, 1940551686, 'DSC_0159.jpg', '2020-12-03 19:06:10', '1'),
(4, 1352293662, 'FIAT DUCATO.jpg', '2021-09-02 14:50:14', '1'),
(5, 696539557, 'Remorque.jpg', '2021-10-01 11:19:29', '1'),
(6, 1402988288, 'Camion MAN de profil.jpg', '2021-10-01 11:21:23', '1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
