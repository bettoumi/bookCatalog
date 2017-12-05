-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 05 Décembre 2017 à 11:13
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bookCatalog`
--

-- --------------------------------------------------------

--
-- Structure de la table `bookPicture`
--

CREATE TABLE `bookPicture` (
  `id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `bookPicture`
--

INSERT INTO `bookPicture` (`id`, `src`) VALUES
(31, '../assets/img/livre2.jpg'),
(58, '../assets/img/livre3.jpg'),
(64, '../assets/img/livre2.jpg'),
(65, '../assets/img/livre5.jpg'),
(66, '../assets/img/livre5.jpg'),
(67, '../assets/img/livre5.jpg'),
(68, '../assets/img/livre4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `abstractb` text NOT NULL,
  `realiseDate` text NOT NULL,
  `borrowed` tinyint(1) DEFAULT '0',
  `id_user` int(11) DEFAULT NULL,
  `id_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `abstractb`, `realiseDate`, `borrowed`, `id_user`, `id_picture`) VALUES
(3, 'titre3', 'auteur3', 'comic', 'description3', '13-15-2010', 0, NULL, 31),
(37, 'titre5', 'auteur5', 'novel', 'desc', '12-14-2005', 1, 1, 58),
(38, 'titre4', 'auteur1', 'novel', 'uhygyg', '12/10/2010', 0, NULL, 64),
(40, 'titre6', 'auteur6', 'comic', 'description6', '13-12-2008', 1, 2, 65),
(44, 'titre7', 'auteur7', 'hobbies', 'description7', '13-05-2013', 0, NULL, 68);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `adresse`) VALUES
(1, 'user1', 'adresse1'),
(2, 'user3', 'adresse3'),
(3, 'user4', 'adressse4');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `bookPicture`
--
ALTER TABLE `bookPicture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_user`),
  ADD KEY `fk_picture_id` (`id_picture`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `bookPicture`
--
ALTER TABLE `bookPicture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_picture_id` FOREIGN KEY (`id_picture`) REFERENCES `bookPicture` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
