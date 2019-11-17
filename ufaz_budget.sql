-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Octobre 2019 à 09:02
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ufaz_budget`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounting`
--

DROP TABLE IF EXISTS `accounting`;
CREATE TABLE `accounting` (
  `idAccounting` tinyint(4) NOT NULL,
  `accountingType` varchar(10) NOT NULL,
  `multiplierCoefficient` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `accounting`
--

INSERT INTO `accounting` (`idAccounting`, `accountingType`, `multiplierCoefficient`) VALUES
(1, 'income', 1),
(2, 'expense', -1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `idCategory` tinyint(4) NOT NULL,
  `category` varchar(15) NOT NULL,
  `idAccounting` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`idCategory`, `category`, `idAccounting`) VALUES
(1, 'Transportation', 2),
(2, 'Entertainment', 2),
(3, 'Rent', 2),
(4, 'Phone', 2),
(5, 'Food', 2),
(6, 'Restaurant', 2),
(7, 'Cinema', 2),
(8, 'Theater', 2),
(9, 'Gas', 2),
(10, 'Postage', 2),
(11, 'Travel', 2),
(12, 'Leisure', 2),
(13, 'Salary', 1),
(14, 'Scholarship', 1),
(15, 'Pocket money', 1);

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `idPayment` tinyint(4) NOT NULL,
  `paymentMethod` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `payments`
--

INSERT INTO `payments` (`idPayment`, `paymentMethod`) VALUES
(1, 'Cash'),
(2, 'Check'),
(3, 'Bank card'),
(4, 'Bank transfer');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `idTransaction` int(11) NOT NULL,
  `transactionAmount` float NOT NULL,
  `transactionDate` date NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idPayment` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`idAccounting`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategory`),
  ADD KEY `idAccounting` (`idAccounting`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`idPayment`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`idTransaction`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idPayment` (`idPayment`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accounting`
--
ALTER TABLE `accounting`
  MODIFY `idAccounting` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategory` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `idPayment` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `idTransaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
