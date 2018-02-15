-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 29 Janvier 2018 à 20:08
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `citation`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `nom` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`nom`) VALUES
('Albert Einstein'),
('Coluche'),
('Confucius'),
('Victor'),
('Victor Hugo');

-- --------------------------------------------------------

--
-- Structure de la table `citation`
--

CREATE TABLE `citation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(150) NOT NULL,
  `auteur_nom` varchar(45) NOT NULL,
  `ouvrage` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 KEY_BLOCK_SIZE=2;

--
-- Contenu de la table `citation`
--

INSERT INTO `citation` (`id`, `libelle`, `auteur_nom`, `ouvrage`) VALUES
(1, 'Pour critiquer les gens il faut les connaître, et pour les connaître, il faut les aimer.', 'Coluche', ''),
(2, 'On passe une moitié de sa vie à attendre ceux qu\'on aimera et l\'autre moitié à quitter ceux qu\'on aime.', 'Victor Hugo', ''),
(3, 'Le monde est dangereux à vivre ! Non pas tant à cause de ceux qui font le mal, mais à cause de ceux qui regardent et laissent faire.', 'Albert Einstein', NULL),
(4, 'La vie, c\'est comme une bicyclette, il faut avancer pour ne pas perdre l\'équilibre.', 'Albert Einstein', 'Comment je vois le monde '),
(5, 'Choisissez un travail que vous aimez et vous n\'aurez pas à travailler un seul jour de votre vie.', 'Confucius', NULL),
(6, 'Il vient une heure où protester ne suffit plus : après la philosophie, il faut l’action.', 'Victor Hugo', 'Les Misérables'),
(7, 'Dieu n’avait fait que l’eau, mais l’homme a fait le vin.', 'Victor Hugo', 'Les Contemplations');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `citation`
--
ALTER TABLE `citation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_citation_auteur_idx` (`auteur_nom`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `citation`
--
ALTER TABLE `citation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `citation`
--
ALTER TABLE `citation`
  ADD CONSTRAINT `fk_citation_auteur` FOREIGN KEY (`auteur_nom`) REFERENCES `auteur` (`nom`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
