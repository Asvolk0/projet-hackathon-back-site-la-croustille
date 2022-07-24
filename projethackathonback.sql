-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 24 juil. 2022 à 10:43
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projethackathonback`
--

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220409115119', '2022-04-09 11:51:34', 65),
('DoctrineMigrations\\Version20220416125155', '2022-04-16 12:52:59', 143),
('DoctrineMigrations\\Version20220416125759', '2022-04-16 12:58:02', 72),
('DoctrineMigrations\\Version20220416130157', '2022-04-16 13:02:02', 71),
('DoctrineMigrations\\Version20220416130509', '2022-04-16 13:05:37', 99),
('DoctrineMigrations\\Version20220416130833', '2022-04-16 13:08:37', 42),
('DoctrineMigrations\\Version20220416133154', '2022-04-16 13:31:57', 49),
('DoctrineMigrations\\Version20220419101408', '2022-04-19 10:14:24', 246),
('DoctrineMigrations\\Version20220419101438', '2022-04-19 10:14:40', 95),
('DoctrineMigrations\\Version20220419203638', '2022-04-19 20:36:45', 224),
('DoctrineMigrations\\Version20220419203859', '2022-04-19 20:39:01', 62),
('DoctrineMigrations\\Version20220419204036', '2022-04-19 20:40:38', 92),
('DoctrineMigrations\\Version20220419204200', '2022-04-19 20:42:02', 120),
('DoctrineMigrations\\Version20220420063130', '2022-04-20 06:31:38', 76),
('DoctrineMigrations\\Version20220420064111', '2022-04-20 06:41:16', 142),
('DoctrineMigrations\\Version20220421113112', '2022-04-21 11:31:21', 247),
('DoctrineMigrations\\Version20220424180331', '2022-04-24 18:03:38', 282),
('DoctrineMigrations\\Version20220426110807', '2022-04-26 11:08:15', 266),
('DoctrineMigrations\\Version20220427072443', '2022-04-27 07:24:51', 233),
('DoctrineMigrations\\Version20220427104638', '2022-04-27 10:46:40', 728),
('DoctrineMigrations\\Version20220427105050', '2022-04-27 10:50:52', 98),
('DoctrineMigrations\\Version20220427125917', '2022-04-27 12:59:20', 102);

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `unity_id` int(11) NOT NULL,
  `ingredient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4B60114F59D8A214` (`recipe_id`),
  KEY `IDX_4B60114FF6859C8C` (`unity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `recipe_id`, `unity_id`, `ingredient`, `quantity`) VALUES
(29, 41, 15, 'Pates', 10),
(30, 41, 1, 'Sauce tomate', 300),
(31, 41, 1, 'Viande', 500),
(32, 41, 15, 'Oignon', 2),
(37, 43, 1, 'Pomme de terre', 900),
(38, 43, 15, 'Tranche de lard', 10),
(39, 43, 1, 'Champignon', 200),
(40, 43, 1, 'Beurre', 20),
(41, 43, 15, 'Oignon', 1),
(42, 43, 1, 'Sauce soja', 30),
(43, 43, 1, 'Vin rouge', 200),
(44, 43, 15, 'Carotte ', 2),
(49, 46, 15, 'test', 10),
(50, 46, 15, 'test', 10),
(51, 47, 15, 'test', 10),
(52, 47, 15, 'test', 10),
(53, 48, 15, 'test', 10),
(54, 48, 15, 'test', 10),
(55, 49, 15, 'etst', 10),
(56, 49, 15, 'test', 10),
(57, 50, 15, 'test', 10),
(58, 50, 15, 'test', 10),
(59, 63, 3, 'test', 10),
(60, 63, 1, 'test', 20),
(61, 63, 15, 'test', 20),
(62, 64, 2, 'test', 10),
(63, 64, 1, 'test 2', 50),
(64, 65, 3, 'test', 10),
(65, 65, 3, 'test', 10);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B6BD307FA76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `lastname`, `email`, `message`) VALUES
(16, NULL, 'Une personne', 'Un Nom', 'machin@gmail.com', 'Bonjour, \r\nje cherche à créer un compte sur votre site, mais je n\'y arrive pas'),
(17, 8, 'carl', 'pennequin', 'carl@gmail.com', 'tres bien');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
CREATE TABLE IF NOT EXISTS `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `type_id` int(11) NOT NULL,
  `preparation_time` int(11) NOT NULL,
  `nb_personne` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DA88B137C54C8C93` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recipe`
--

INSERT INTO `recipe` (`id`, `title`, `img`, `active`, `type_id`, `preparation_time`, `nb_personne`) VALUES
(41, 'Lasagne', '526c6339fd6707224d00b9d91ac1ddee.jpg', 1, 2, 50, 4),
(43, 'Faux roti', '1a547beef6e0cd767f01f6d60975e13a.jpg', 1, 2, 50, 4),
(46, 'Un plat', '526c6339fd6707224d00b9d91ac1ddee.jpg', 1, 1, 10, 10),
(47, 'Un plat', 'baa7c98fc279c42437f33eea3cc98f07.jpg', 1, 1, 10, 10),
(48, 'Un plat', 'cbd9244180d6f0033cbcd2067bf3198f.jpg', 1, 1, 10, 10),
(49, 'Un plat ', 'fbfa025f9d19ed5e0addad6428620a33.jpg', 1, 1, 10, 10),
(50, 'Un plat', 'bffe9bf1cc64dd0f298c8549684bc9c9.jpg', 1, 1, 10, 10),
(52, 'Un plat', '706a4747f1b7ba879b550e04361ad147.jpg', 1, 1, 10, 10),
(53, 'Un plat', 'baa7c98fc279c42437f33eea3cc98f07.jpg', 1, 1, 10, 10),
(54, 'Un plat', '526c6339fd6707224d00b9d91ac1ddee.jpg', 1, 1, 10, 10),
(55, 'Un plat ', 'fbfa025f9d19ed5e0addad6428620a33.jpg', 1, 1, 10, 10),
(56, 'Un plat', 'bffe9bf1cc64dd0f298c8549684bc9c9.jpg', 1, 1, 10, 10),
(57, 'un plat', 'bffe9bf1cc64dd0f298c8549684bc9c9.jpg', 1, 1, 10, 10),
(58, 'Un plat', '706a4747f1b7ba879b550e04361ad147.jpg', 1, 1, 10, 10),
(59, 'Un plat', '526c6339fd6707224d00b9d91ac1ddee.jpg', 1, 1, 10, 10),
(60, 'Un plat', '526c6339fd6707224d00b9d91ac1ddee.jpg', 1, 1, 10, 10),
(61, 'Un plat ', 'fbfa025f9d19ed5e0addad6428620a33.jpg', 1, 1, 10, 10),
(62, 'Un plat', 'bffe9bf1cc64dd0f298c8549684bc9c9.jpg', 1, 1, 10, 10),
(63, 'Un plat', '685acba609ab80a957712ef7ffcbdcfc.jpg', 1, 1, 10, 10),
(64, 'test', '86856d99b9478434d9fb1e17623e5f81.jpg', 1, 1, 10, 10),
(65, 'test', '3559aa3b770d43a9421bc41c3217e94a.jpg', 1, 1, 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `recipe_user`
--

DROP TABLE IF EXISTS `recipe_user`;
CREATE TABLE IF NOT EXISTS `recipe_user` (
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`,`user_id`),
  KEY `IDX_F2888C9659D8A214` (`recipe_id`),
  KEY `IDX_F2888C96A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recipe_user`
--

INSERT INTO `recipe_user` (`recipe_id`, `user_id`) VALUES
(41, 2),
(41, 3),
(43, 8),
(46, 8);

-- --------------------------------------------------------

--
-- Structure de la table `step`
--

DROP TABLE IF EXISTS `step`;
CREATE TABLE IF NOT EXISTS `step` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `steps` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_43B9FE3C59D8A214` (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `step`
--

INSERT INTO `step` (`id`, `steps`, `recipe_id`) VALUES
(81, 'Faire cuire les lasagnes', 41),
(82, 'Sortir les lasagnes', 41),
(83, 'Manger les lasagnes', 41),
(84, '', 41),
(89, 'Éplucher et couper les oignons, carottes et champignons très finement et faites les revenir dans du beurre ou de l\'huile.\r\nPendant ce temps mettez les pommes de terre dans l\'eau à ébullition. ', 43),
(90, 'Une fois bien cuite, sortez les pommes de terre et mixez les afin d\'obtenir une purée.\r\nDans un récipient (rectangulaire de préférence) ajoutez les oignons, les carottes et les champignon avec la purée.\r\nMettre la préparation 15 min au frigo.', 43),
(91, 'Préchauffez le four à 180°C\r\n\r\nPendant que le four préchauffe, sortez la purée du plat (mettez le contenu sur du film plastique, que vous aurez préparé au préalable) et enroulez la de bacon.\r\n\r\nUne fois ceci fait mettre la préparation au four pour 30 minute\r\n', 43),
(92, 'Pour la sauce, ajoutez dans une casserole petit à petit, le beurre, le vin et la sauce soja, faite mijoter à feu doux.\r\nSortez la préparation du four, dressez et dégustez', 43),
(101, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 46),
(102, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 46),
(103, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 46),
(104, '', 46),
(105, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 47),
(106, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 47),
(107, '', 47),
(108, '', 47),
(109, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 48),
(110, '', 48),
(111, '', 48),
(112, '', 48),
(113, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 49),
(114, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 49),
(115, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 49),
(116, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 49),
(117, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 50),
(118, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 50),
(119, '', 50),
(120, '', 50),
(121, 'test', 63),
(122, 'test', 63),
(123, 'test', 63),
(124, 'test', 63),
(125, 'dfjhgvcukhjqs', 64),
(126, 'vqbsdv', 64),
(127, '', 64),
(128, '', 64),
(129, 'sgdfgfqsd', 65),
(130, '', 65),
(131, '', 65),
(132, '', 65);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Plats froids'),
(2, 'Plats chauds'),
(3, 'Cocktails');

-- --------------------------------------------------------

--
-- Structure de la table `unity`
--

DROP TABLE IF EXISTS `unity`;
CREATE TABLE IF NOT EXISTS `unity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `unity`
--

INSERT INTO `unity` (`id`, `mesure`) VALUES
(1, 'g'),
(2, 'cl'),
(3, 'ml'),
(4, 'dl'),
(15, ' ');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `lastname`, `is_verified`) VALUES
(2, 'carl@gmail.com', '[\"ROLE_SUPERADMIN\"]', '$2y$13$riEn43IuO/TV1fvGSATPD.N9pymAmDvoa28rbNWK3UcbMpU6RoSfq', 'Carl', 'Pennequin', 0),
(3, 'adam@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$lTFZiGh4VR.nqsDZry5ZmOhA2R2PZ.sUyNJNdiON6nw3uVJq6FaEi', 'Adam', 'Comte', 0),
(4, 'anton@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$0jfhcg.ipUe4FXzNQxIJ2OAqCjJKGwQTmaGe7rcftmDyzrS3ZQ3gi', 'Anton', 'Lukusa', 0),
(7, 'melwyne@gmail.com', '[\"ROLE_USER\"]', '$2y$13$qdP8Slk9IiE5QM2ZFIrYCehz8.B5U2L61LO/5iflK1gfrATzNRUVi', 'Melwyne', 'Mouroux', 0),
(8, 'test@gmail.com', '[\"ROLE_USER\"]', '$2y$13$W.AjwDRP.NOKL0REB0dtuejyfrUeAk.8RCeX6Zg7R2Qyw8wOux/WW', 'test', 'test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_recipe`
--

DROP TABLE IF EXISTS `user_recipe`;
CREATE TABLE IF NOT EXISTS `user_recipe` (
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`recipe_id`),
  KEY `IDX_BFDAAA0AA76ED395` (`user_id`),
  KEY `IDX_BFDAAA0A59D8A214` (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_recipe`
--

INSERT INTO `user_recipe` (`user_id`, `recipe_id`) VALUES
(2, 41),
(2, 43),
(2, 46);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `FK_4B60114F59D8A214` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_4B60114FF6859C8C` FOREIGN KEY (`unity_id`) REFERENCES `unity` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_B6BD307FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `FK_DA88B137C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `recipe_user`
--
ALTER TABLE `recipe_user`
  ADD CONSTRAINT `FK_F2888C9659D8A214` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_F2888C96A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `step`
--
ALTER TABLE `step`
  ADD CONSTRAINT `FK_43B9FE3C59D8A214` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_recipe`
--
ALTER TABLE `user_recipe`
  ADD CONSTRAINT `FK_BFDAAA0A59D8A214` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_BFDAAA0AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
