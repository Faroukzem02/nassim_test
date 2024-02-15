-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 15 fév. 2024 à 23:54
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nassim_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`) VALUES
(1, 'nassim', 'nassim_admin', 'nassim000'),
(2, 'farouk', 'farouk_admin', 'farouk000');

-- --------------------------------------------------------

--
-- Structure de la table `commands`
--

CREATE TABLE `commands` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adresse` varchar(1000) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commands`
--

INSERT INTO `commands` (`id`, `name`, `phone`, `adresse`, `product_id`, `product_price`) VALUES
(458929995, 'Lord Farouk', '+46-582-111558', 'Fhzhfz 2 Xhzvfvz', 2, 1159),
(694229300, 'farouk', '000000000000', 'Fhzhfz 2 Xhzvfvz', 1, 749);

-- --------------------------------------------------------

--
-- Structure de la table `histories`
--

CREATE TABLE `histories` (
  `id` int(11) NOT NULL,
  `command_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `adresse` varchar(1000) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `histories`
--

INSERT INTO `histories` (`id`, `command_id`, `name`, `phone`, `adresse`, `product_id`, `product_price`) VALUES
(370203633, 458929995, 'Lord Farouk', '+46-582-111558', 'Fhzhfz 2 Xhzvfvz', 2, 1159);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `price`, `image`) VALUES
(1, 'machines', 'قلاية هوائية فقط ب 749 درهم + التوصيل مجاني', 749, 'air_fryer.jpg'),
(2, 'machines', 'آلة صنع قهوة فقط ب 1159 درهم + التوصيل مجاني', 1159, 'machine-a-cafe.png'),
(3, 'machines', 'قطاعة خضراوات و لحوم كهربائية فقط ب 199 درهم + التوصيل مجاني', 199, 'vegetable_cutter.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commands`
--
ALTER TABLE `commands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=705404819;

--
-- AUTO_INCREMENT pour la table `commands`
--
ALTER TABLE `commands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=995793698;

--
-- AUTO_INCREMENT pour la table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370203634;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
