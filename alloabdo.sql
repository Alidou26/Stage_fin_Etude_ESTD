-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 30 mai 2024 à 16:58
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `alloabdo`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateurs`
--

CREATE TABLE `administrateurs` (
  `id_admin` int(11) NOT NULL,
  `nom_utilisateur` varchar(255) NOT NULL,
  `mot_de_passe` text NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateurs`
--

INSERT INTO `administrateurs` (`id_admin`, `nom_utilisateur`, `mot_de_passe`, `nom`, `prenom`) VALUES
(1, 'Admin', '$2y$10$nvYZWL3MPNI0WP2tJnY7eeaHvdPqBmkebn4dwuNp4d2v4KUuJ6rNy', 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(255) NOT NULL,
  `adresse_client` text NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `telephone_client` varchar(255) NOT NULL,
  `logo_client` text NOT NULL,
  `commission` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom_client`, `adresse_client`, `email_client`, `telephone_client`, `logo_client`, `commission`) VALUES
(1, 'LUMIA EXPRESS', '', '', '', 'image-entreprise/entreprise.jpg', 20),
(2, 'EAGLES EXPRESS', '', '', '', 'image-entreprise/entreprise.jpg', 20),
(3, 'ONESTA', '', '', '', 'image-entreprise/entreprise.jpg', 25),
(4, 'SAMDAY DELIVERY', '', '', '', 'image-entreprise/entreprise.jpg', 20),
(6, 'COLIS PRIVÉ', '', '', '', 'image-entreprise/entreprise.jpg', 10),
(7, 'ALI FES', '', '', '', 'image-entreprise/entreprise.jpg', 20),
(8, 'JAKOUM', '', '', '', 'image-entreprise/entreprise.jpg', 20),
(9, 'ABDELILLAH AGADIR', '', '', '', 'image-entreprise/entreprise.jpg', 25),
(10, 'MAGHLAHA', '', '', '', 'image-entreprise/entreprise.jpg', 10),
(11, 'ALDM', 'Bingerak', 'Admin1@gmail.com', '', 'image-entreprise/ALDME-commerce.jpg', 25),
(12, 'SSSSS', '', '', '', 'image-entreprise/entreprise.jpg', 15),
(13, 'SSSSS1', '', '', '', 'image-entreprise/entreprise.jpg', 15);

-- --------------------------------------------------------

--
-- Structure de la table `colis`
--

CREATE TABLE `colis` (
  `id_colis` int(11) NOT NULL,
  `references` text NOT NULL,
  `valeur` float NOT NULL,
  `nom_recepteur` varchar(255) NOT NULL,
  `prenom_recepteur` varchar(255) NOT NULL,
  `adresse_recepteur` text NOT NULL,
  `telephone_recepteur` varchar(255) NOT NULL,
  `etat` varchar(255) NOT NULL,
  `date_reception` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modif` datetime NOT NULL DEFAULT current_timestamp(),
  `id_client` int(11) NOT NULL,
  `commission` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `colis`
--

INSERT INTO `colis` (`id_colis`, `references`, `valeur`, `nom_recepteur`, `prenom_recepteur`, `adresse_recepteur`, `telephone_recepteur`, `etat`, `date_reception`, `date_modif`, `id_client`, `commission`) VALUES
(1, '123456abcdef234', 80, 'KI', 'ALIDOU', 'Kassam', '06 05 04 03', 'Livre', '2023-04-04 04:55:33', '2023-05-13 05:50:19', 2, 20),
(2, '123456abcdef234', 90, 'KI', 'ALIDOU', 'Kassam', '06 05 04 03', 'Livre', '2023-04-05 00:00:00', '2023-05-26 05:18:16', 4, 20),
(3, '123456abcdef23456', 120, 'KI', 'ALASSANE', 'Wahada', '06 05 04 03', 'Refuse', '2023-04-13 04:56:56', '2023-04-13 05:09:49', 6, 10),
(4, '123456abcdef23456', 160, 'KI', 'LAWANKILIA', 'Cocody', '06 05 04 03', 'Annule', '2023-04-13 04:57:34', '2023-04-13 05:10:11', 9, 25),
(5, '123456abcdef23456', 50, 'KI', 'MARIAM', 'Bingerville', '06 05 04 03', 'Injoignable', '2023-04-13 04:58:23', '2023-04-13 05:10:14', 8, 20),
(6, '123456abcdef23456', 210, 'KI', 'TIDIANE', 'Akouedo', '06 05 04 03', 'Livre', '2023-03-13 04:58:49', '2023-03-13 05:09:57', 7, 20),
(7, '123456abcdef234563', 90, 'SALTANI', 'AMINE', 'Moulay Rachid', '06 05 04 03', 'Reporte', '2023-03-13 04:59:34', '2023-03-13 05:09:31', 2, 20),
(8, '123456abcdef2345631', 30, 'DARO', 'FALL', 'Moulay Rachid', '06 05 04 03', 'Livre', '2023-03-13 05:00:08', '2023-03-13 05:09:38', 4, 20),
(9, '123456abcdef23456311', 100, 'ABDOUL', 'FLAYOU', 'Centre ville', '06 05 04 03', 'Injoignable', '2023-03-13 05:00:57', '2023-03-13 05:10:05', 8, 20),
(11, '123456abcdef23456311e', 190, 'MAHJOUBA', 'MAHAMOUD', 'Kassam', '06 05 04 03', 'Injoignable', '2023-02-13 05:02:07', '2023-05-28 00:39:57', 9, 25),
(12, '123456abcdef23456311e3', 90, 'MAHJOUBA', 'MAHAMOUD', 'Kassam', '06 05 04 03', 'Refuse', '2023-02-13 05:02:23', '2023-02-13 05:09:25', 3, 25),
(13, '123456abcdef23456311e31', 80, 'MAHJOUBA', 'MAHAMOUD', 'Kassam', '06 05 04 03', 'Livre', '2023-02-13 05:02:43', '2023-05-28 06:33:39', 6, 10),
(14, '123456abcdef23456311e312', 180, 'HAMZI', 'YOUSSOUF', 'Kassam', '06 05 04 03', 'Reporte', '2023-02-13 05:03:28', '2023-05-29 03:31:10', 6, 10),
(15, '123456abcdef23456311e312', 120, 'HAMZI', 'YOUSSOUF', 'Kassam', '06 05 04 03', 'Livre', '2023-02-13 05:03:49', '2023-02-13 05:10:00', 3, 25),
(16, '123456abcdef2345631e312', 195, 'KABBAJ', 'YASSINE', 'Maali', '06 05 04 03', 'Livre', '2023-01-13 05:05:20', '2023-01-13 05:09:10', 1, 20),
(17, '123456bcdef2345631e312', 185, 'KABBAJ', 'YASSINE', 'Maali', '06 05 04 03', 'Livre', '2023-01-13 05:05:40', '2023-01-13 05:10:08', 8, 20),
(18, '123456bcdef2345631e312', 205, 'AYA', 'BOUJGHOUAD', 'Maali', '06 05 04 03', 'Livre', '2023-01-13 05:06:31', '2023-01-13 05:09:34', 3, 25),
(19, '123456bcdef2345631e3123', 105, 'AYA', 'JABRANE', 'Maali', '06 05 04 03', 'Annule', '2023-01-13 05:07:00', '2023-01-13 05:09:45', 4, 20),
(20, '123456bcdef2345631e3123', 105, 'AYA', 'JABRANE', 'Maali', '06 05 04 03', 'Livre', '2023-01-13 05:07:11', '2023-01-13 05:09:20', 2, 20),
(21, '123456bcdef2345631e31234', 105, 'AYA', 'JABRANE', 'Maali', '06 05 04 03', 'Annule', '2023-05-13 05:07:22', '2023-05-13 05:10:02', 7, 20),
(22, '12456bcdef2345631e31234', 305, 'ZAHIRA', 'EL HARB', 'wahada', '06 05 04 03', 'Livre', '2023-05-13 05:08:01', '2023-05-13 05:09:07', 1, 20),
(23, '12456bcdef2345631e31234', 205, 'ZAHIRA', 'EL HARB', 'wahada', '06 05 04 03', 'Retour', '2023-05-13 05:08:12', '2023-05-13 05:09:29', 2, 20),
(24, '12456bcdef2345631e31234', 105, 'ZAHIRA', 'EL HARB', 'wahada', '06 05 04 03', 'Injoignable', '2023-05-13 05:08:22', '2023-05-13 05:09:02', 6, 10),
(26, 'ddf3456tgdsw245672', 120, 'ALI', 'BIENKOMAN', 'bingerak', '12345678', 'Livre', '2023-05-28 02:09:15', '2023-05-28 00:40:02', 4, 20),
(27, '123345fderrt678866', 120, 'EL JI', 'HU', 'Bingerville', '123689', 'Livre', '2023-05-26 05:17:06', '2023-05-26 05:26:21', 6, 10),
(28, '123345fderrt678866sd', 145, 'EL JI', 'HU', 'Bingerville', '123689', 'Livre', '2023-05-26 05:21:47', '2023-05-28 00:01:59', 2, 20),
(29, '123345fderrt678866sd1', 145, 'EL JI', 'HU', 'Bingerville', '123689', 'Livre', '2023-05-26 05:24:57', '2023-05-28 17:25:24', 2, 20),
(30, '123345fderrt678866', 190, 'ALASSANE', 'SOUKROUMDE', 'Bingerville', '123689', 'Livre', '2023-05-28 00:38:57', '2023-05-28 00:39:50', 11, 25);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `colis`
--
ALTER TABLE `colis`
  ADD PRIMARY KEY (`id_colis`),
  ADD KEY `fk1` (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateurs`
--
ALTER TABLE `administrateurs`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `colis`
--
ALTER TABLE `colis`
  MODIFY `id_colis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `colis`
--
ALTER TABLE `colis`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
