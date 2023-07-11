-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 11 juil. 2023 à 13:45
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `fake_reponse`
--

DROP TABLE IF EXISTS `fake_reponse`;
CREATE TABLE IF NOT EXISTS `fake_reponse` (
  `id_fake_reponse` int NOT NULL AUTO_INCREMENT,
  `fake_reponse` text NOT NULL,
  PRIMARY KEY (`id_fake_reponse`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `fake_reponse`
--

INSERT INTO `fake_reponse` (`id_fake_reponse`, `fake_reponse`) VALUES
(1, 'Lifan'),
(2, 'Venucia'),
(3, 'Hongqi'),
(4, 'Everus'),
(5, 'Leopaard'),
(6, '7'),
(7, '8'),
(8, '11'),
(9, '10'),
(10, '12'),
(11, 'Chine'),
(12, 'Inde'),
(13, 'Egypte'),
(14, 'Arabie-saoudite'),
(15, 'Mexique'),
(16, 'La liberté de la presse'),
(17, 'La liberté syndicale'),
(18, 'L\'abolition de la peine de mort '),
(19, 'La laïcité de l\'état et liberté des cultes'),
(20, 'L\'attribution de la citoyenneté à tous les ressortissants des territoires d\'outre-mer'),
(21, 'Les jardins suspendus de Babylone'),
(22, 'Bannf National Park'),
(23, 'Semuc Champey'),
(24, 'Les chutes Victoria'),
(25, 'Monteverde'),
(26, 'Philadelphie'),
(27, 'Boston'),
(28, 'Détroit'),
(29, 'Dallas'),
(30, 'Atlanta'),
(31, '11'),
(32, '10'),
(33, '9'),
(34, '13'),
(35, '8'),
(36, 'Wilhem Conrad'),
(37, 'Maxime'),
(38, 'Wilson Tink'),
(39, 'Alfred Nobel'),
(40, 'TheKairi78'),
(41, 'En l\'an 749'),
(42, 'En l\'an 771'),
(43, 'En l\'an 811'),
(44, 'En l\'an 871'),
(45, 'En l\'an 891'),
(46, 'Martinez Valero'),
(47, 'La romareda'),
(48, 'Benito-Villamarin'),
(49, 'Wanda Metropolitano'),
(50, 'Camp Nou'),
(51, 'La Chine'),
(52, 'Le Japon'),
(53, 'La Hongrie'),
(54, 'Le Brésil'),
(55, 'L\'allemagne'),
(56, 'Mimie Mathy '),
(57, 'Francis Ngannou'),
(58, 'Lionel Messi'),
(59, 'Angelina Jolie'),
(60, 'Squeezie'),
(61, '8 ans '),
(62, '4 ans'),
(63, '7 ans '),
(64, '6 ans '),
(65, '9 ans '),
(66, 'Pinocchio'),
(67, 'Fantasia'),
(68, 'Le dragon récalcitrant'),
(69, 'Dumbo'),
(70, 'Bambi');

-- --------------------------------------------------------

--
-- Structure de la table `id_question_reponse`
--

DROP TABLE IF EXISTS `id_question_reponse`;
CREATE TABLE IF NOT EXISTS `id_question_reponse` (
  `id_question` int NOT NULL,
  `id_fake_reponse` int NOT NULL,
  PRIMARY KEY (`id_question`,`id_fake_reponse`),
  KEY `id_fake_reponse` (`id_fake_reponse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `id_question_reponse`
--

INSERT INTO `id_question_reponse` (`id_question`, `id_fake_reponse`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(4, 16),
(4, 17),
(4, 18),
(4, 19),
(4, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(6, 26),
(6, 27),
(6, 28),
(6, 29),
(6, 30),
(7, 31),
(7, 32),
(7, 33),
(7, 34),
(7, 35),
(8, 36),
(8, 37),
(8, 38),
(8, 39),
(8, 40),
(9, 41),
(9, 42),
(9, 43),
(9, 44),
(9, 45),
(10, 46),
(10, 47),
(10, 48),
(10, 49),
(10, 50),
(11, 51),
(11, 52),
(11, 53),
(11, 54),
(11, 55),
(12, 56),
(12, 57),
(12, 58),
(12, 59),
(12, 60),
(13, 61),
(13, 62),
(13, 63),
(13, 64),
(13, 65),
(14, 66),
(14, 67),
(14, 68),
(14, 69),
(14, 70);

-- --------------------------------------------------------

--
-- Structure de la table `id_user_question`
--

DROP TABLE IF EXISTS `id_user_question`;
CREATE TABLE IF NOT EXISTS `id_user_question` (
  `id_user` int NOT NULL,
  `id_question` int NOT NULL,
  PRIMARY KEY (`id_user`,`id_question`),
  KEY `id_question` (`id_question`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `id_user_score`
--

DROP TABLE IF EXISTS `id_user_score`;
CREATE TABLE IF NOT EXISTS `id_user_score` (
  `id_user` int NOT NULL,
  `id_score` int NOT NULL,
  PRIMARY KEY (`id_user`,`id_score`),
  KEY `id_score` (`id_score`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `id_user_score`
--

INSERT INTO `id_user_score` (`id_user`, `id_score`) VALUES
(1, 3),
(2, 6),
(3, 2),
(4, 1),
(4, 5),
(5, 4);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id_question`, `question`, `reponse`) VALUES
(1, 'Parmis ces quatre marques de voiture, une n\'existe pas, laquelle ? ', 'Yagu'),
(2, 'Combien y a-t-il de joueurs sur le terrain dans une équipe de base-ball ?', '9'),
(3, 'De quel pays sont originaires les chats de type siamois ?', 'Thaïlande'),
(4, 'Qu’a autorisé la loi Neuwirth en 1967 en France ?', 'La contraception'),
(5, 'Qu\'appelle-t-on la Canopée ?', 'Le sommet de la forêt amazonienne'),
(6, 'Quelle ville est surnommée \"Big apple\" aux Etats-Unis ?', 'New York'),
(7, 'De combien de syllabes est constitué u alexandrin ?', '12'),
(8, 'Qui a inventé l\'avion ?', 'Les frères Wright'),
(9, 'En quelle année l\'invasion arabe de l\'Espagne a-t-elle commencé ?', 'En l\'an 711'),
(10, 'Comment s\'appelle le stade de football du Real Madrid ? ', 'Santiago Barnabeu'),
(11, 'Où a été inventé le ping-pong ?', 'L\'Angleterre'),
(12, 'La quelle de ces célébrités a été videur de boîte de nuit dans sa jeunesse ?', 'Le pape François'),
(13, 'Combien d\'années dure un lustre ? ', '5 ans'),
(14, 'Quel est le premier film de disney ?', 'Blanche-neige');

-- --------------------------------------------------------

--
-- Structure de la table `scores`
--

DROP TABLE IF EXISTS `scores`;
CREATE TABLE IF NOT EXISTS `scores` (
  `id_score` int NOT NULL AUTO_INCREMENT,
  `point` bigint NOT NULL,
  `dateTime` datetime NOT NULL,
  PRIMARY KEY (`id_score`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `scores`
--

INSERT INTO `scores` (`id_score`, `point`, `dateTime`) VALUES
(1, 450, '2023-07-09 16:25:08'),
(2, 35, '2023-07-13 10:11:30'),
(3, 860, '2023-07-02 18:11:30'),
(4, 425, '2023-07-08 20:11:30'),
(5, 380, '2023-07-04 23:11:30'),
(6, 115, '2023-07-10 17:41:30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(150) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `pseudo`) VALUES
(1, 'JeanPseudo'),
(2, 'test'),
(3, 'ok'),
(4, 'Hakim de la street fofolle'),
(5, 'Zak'),
(6, 'aupif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
