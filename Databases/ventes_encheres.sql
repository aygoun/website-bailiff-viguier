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
-- Structure de la table `ventes_encheres`
--

CREATE TABLE `ventes_encheres` (
  `id` int(11) NOT NULL,
  `choice` varchar(20) NOT NULL,
  `num_page` int(11) NOT NULL,
  `title` text NOT NULL,
  `heure` time NOT NULL,
  `date_bd` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `link_media` text NOT NULL,
  `link_cartesGrises` text NOT NULL,
  `link_materiel` text NOT NULL,
  `link_controle_technique` text NOT NULL,
  `reglement_jeu_tirage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ventes_encheres`
--

INSERT INTO `ventes_encheres` (`id`, `choice`, `num_page`, `title`, `heure`, `date_bd`, `lieu`, `link_media`, `link_cartesGrises`, `link_materiel`, `link_controle_technique`, `reglement_jeu_tirage`) VALUES
(46, 'jeu', 279153562, '\"CHEZ LAFORET, LE FONCIER C\'EST REGLE\" du 15 Novembre 2020 au 15 Décembre 2020', '00:00:00', '2020-11-15', '15 November 2020 au 15 Décembre 2020', 'none', 'none', 'none', 'none', 'upload/photos_controle_technique/1098290208/REGLEMENT-DU-JEU-CHEZ-LAFORET-LE-FONCIER-C-EST-REGLE.pdf'),
(50, 'vente', 1940581523, 'Vente du mobilier et matériel de boucherie/charcuterie garnissant le local commercial', '14:30:00', '2020-11-30', 'GUILLESTRE (05560) 37 rue Maurice Petsche', 'none', 'none', 'upload/photos_materiel/12873380/Liste-du-maty-riel-de-la-vente-du-30-11-2020.pdf', 'none', 'none'),
(57, 'jeu', 1382109033, 'test', '00:00:00', '0000-00-00', '/', 'none', 'none', 'none', 'none', 'none'),
(58, 'jeu', 2021091839, 'test', '00:00:00', '0000-00-00', '/', 'none', 'none', 'none', 'none', 'none'),
(59, 'jeu', 1042828186, 'test', '00:00:00', '2009-02-15', '/', 'none', 'none', 'none', 'none', 'none'),
(63, 'vente', 871610699, 'Test', '10:00:00', '2020-12-24', 'EMBRUN', 'none', 'none', 'none', 'none', 'none'),
(64, 'vente', 1524537034, 'Vente d\'une machine sous-vide inox MAFTER MIDI année 2016', '11:00:00', '2021-05-12', 'Sis en mon Etude (05200) EMBRUN, 3 Rue du Sénateur Bonniard', 'none', 'none', 'upload/photos_materiel/144611347/01621f86b2ab47e5b59b9a8796b5e7eb45bdac36ae.jpg', 'none', 'none'),
(65, 'vente', 1352293662, 'Vente aux enchères publiques de divers véhicules, important matériel de charpente et d\'outillage...', '14:00:00', '2021-09-22', 'EMBRUN (05) Allée du Méal, La Clapière', 'none', 'upload/photos_cartes_grises/1803249331/Cartes-grises-de-la-vente.pdf', 'upload/photos_materiel/1488704740/Liste-du-maty-riel-yy-la-vente.pdf', 'none', 'none'),
(66, 'vente', 696539557, 'Vente aux enchères publiques de divers véhicules, important matériel de charpente et d\'outillage...', '14:00:00', '2021-09-22', 'EMBRUN (05) Allée du Méal, La Clapière', 'none', 'upload/photos_cartes_grises/165378251/Liste-du-maty-riel-yy-la-vente.pdf', 'upload/photos_materiel/997392492/Liste-du-maty-riel-yy-la-vente.pdf', 'upload/photos_controle_technique/1254033754/Liste-du-maty-riel-yy-la-vente.pdf', 'none');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ventes_encheres`
--
ALTER TABLE `ventes_encheres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ventes_encheres`
--
ALTER TABLE `ventes_encheres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
