-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 17 avr. 2022 à 16:03
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
-- Base de données : `dramatik`
--

-- --------------------------------------------------------

--
-- Structure de la table `choices`
--

DROP TABLE IF EXISTS `choices`;
CREATE TABLE IF NOT EXISTS `choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ch_question_id` int(11) NOT NULL,
  `ch_choice` longtext COLLATE utf8mb4_unicode_ci,
  `ch_true` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5CE96394EB85828` (`ch_question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2845 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `choices`
--

INSERT INTO `choices` (`id`, `ch_question_id`, `ch_choice`, `ch_true`) VALUES
(1, 1, 'nam joo hyuk', 1),
(2, 1, 'Kim Tea ri', 0),
(3, 1, 'Bona', 0),
(4, 1, 'Choi Hyun-wook', 0),
(5, 2, 'Kim Tae Ri', 1),
(6, 2, 'Kim Yu Rim', 0),
(7, 2, 'Ji seung wan', 0),
(8, 2, 'Kim min chae', 0),
(9, 3, 'Escrime', 1),
(10, 3, 'Tennis', 0),
(11, 3, 'Tir à l\'arc', 0),
(12, 3, 'Basket', 0),
(13, 4, 'Na Hee Do', 1),
(14, 4, 'Kim Yu Rim', 0),
(15, 4, 'Ji seung wan', 0),
(16, 4, 'Kim min chae', 0),
(17, 5, 'Full House', 1),
(18, 5, 'Fool House', 0),
(19, 5, 'Full Mouse', 0),
(20, 5, 'Fabulous House', 0),
(41, 11, 'CornDog', 1),
(42, 11, 'Hot Dog', 0),
(43, 11, 'Tteokboki', 0),
(44, 11, 'Mandu', 0),
(45, 12, 'Yeo Jin Goo', 1),
(46, 12, 'Kim So hyun', 0),
(47, 12, 'Ji chang wook', 0),
(48, 12, 'Park Hyun Sik', 0),
(49, 13, 'My dear Love', 1),
(50, 13, 'My dear Sunshine', 0),
(51, 13, 'My dear friend', 0),
(52, 13, 'My dear Dad', 0),
(53, 14, '17 mai', 1),
(54, 14, '7 mai', 0),
(55, 14, '10 mai', 0),
(56, 14, '27 mai', 0),
(57, 15, 'Follow your dream', 1),
(58, 15, 'Follow me', 0),
(59, 15, 'Follow Your heart', 0),
(60, 15, 'Follow your mind', 0),
(61, 16, 'Kim Tae Ri', 1),
(62, 16, 'Kim Ta Ri', 0),
(63, 16, 'Kim Nae Ri', 0),
(64, 16, 'Kim min chae', 0),
(65, 17, 'Full House', 1),
(66, 17, 'Fool House', 0),
(67, 17, 'Full Mouse', 0),
(68, 17, 'Fabulous House', 0),
(69, 18, '29 ans', 1),
(70, 18, '28 ans', 0),
(71, 18, '30 ans', 0),
(72, 18, '25ans', 0),
(73, 19, 'Maladie', 1),
(74, 19, 'Accident de la route', 0),
(75, 19, 'En jouant à de l\'escrime', 0),
(76, 19, 'Il n\'est pas mort', 0),
(77, 20, 'Dalkongi', 1),
(78, 20, 'Balkongi', 0),
(79, 20, 'Alkongi', 0),
(80, 20, 'Elkongi', 0),
(81, 21, 'NETFLIX', 1),
(82, 21, 'TVN', 0),
(83, 21, 'SBS', 0),
(84, 21, 'JTBC', 0),
(85, 22, 'A cause d\'une souris', 1),
(86, 22, 'A cause d\'un rat', 0),
(87, 22, 'A cause d\'un aliment', 0),
(88, 22, 'A cause d\'une autre maladie', 0),
(89, 23, 'Nam Ra', 1),
(90, 23, 'On jo', 0),
(91, 23, 'Na Yeon', 0),
(92, 23, 'Yi Sak', 0),
(93, 24, 'Pompier', 1),
(94, 24, 'Policier', 0),
(95, 24, 'Inspecteur', 0),
(96, 24, 'Vendeur', 0),
(97, 25, 'Chimie', 1),
(98, 25, 'Math', 0),
(99, 25, 'Biologie', 0),
(100, 25, 'Science du corps', 0),
(101, 26, 'Artiste', 1),
(102, 26, 'Peintre', 0),
(103, 26, 'Chanteur', 0),
(104, 26, 'Ecrivain', 0),
(105, 27, 'Choi Ung et Kook Yen-Soo', 1),
(106, 27, 'Choi Ung et NJ', 0),
(107, 27, 'Kim Ji Wung et Kook Yen-Soo', 0),
(108, 27, 'Gu Eun Ho et NJ', 0),
(109, 28, 'Guk Yeon Su', 1),
(110, 28, 'NJ', 0),
(111, 28, 'An Mi Yeon', 0),
(112, 28, 'Jeong Chae Ran', 0),
(113, 29, 'Thibaud Herem', 1),
(114, 29, 'Thibaud Harem', 0),
(115, 29, 'Thibaud Heram', 0),
(116, 29, 'Thibaud Herim', 0),
(117, 30, 'Car c\'est le seul qui lui montre peu d\'intérêt.', 1),
(118, 30, 'Il lui a dit de beau mot.', 0),
(119, 30, 'Elle arrive à le trainer partout.', 0),
(120, 30, 'C\'est un artiste , elle aime que les artistes.', 0),
(121, 31, 'Car elle a des difficultés financières.', 1),
(122, 31, 'Car elle ne l\'aime plus.', 0),
(123, 31, 'Car elle doit s\'en aller.', 0),
(124, 31, 'Car Choi Ung la trompé.', 0),
(125, 32, 'Nua', 1),
(126, 32, 'Nuo', 0),
(127, 32, 'Nui', 0),
(128, 32, 'Nunim', 0),
(129, 33, 'Beak Yi Jin', 1),
(130, 33, 'Choach-nim', 0),
(131, 33, 'La mère de Moon Ji-ung', 0),
(132, 33, 'Yu rim', 0),
(133, 34, 'Hee Do et Yu rim l\'ont dit durant l\'interview', 1),
(134, 34, 'Hee Do et Yu rim on demandaient au coach', 0),
(135, 34, 'Bona l\'a dit à Beak Yi Jin', 0),
(136, 34, 'Car Hee Do et Yu rim ont gagné un tournoi', 0),
(137, 35, 'Voiture', 1),
(138, 35, 'Train', 0),
(139, 35, 'AutoCar', 0),
(140, 35, 'Bateau', 0),
(141, 36, 'Rouge', 1),
(142, 36, 'Vert', 0),
(143, 36, 'Jaune', 0),
(144, 36, 'Bleu', 0),
(145, 37, 'Hee Do', 1),
(146, 37, 'Yu rim', 0),
(147, 37, 'Seung Wan', 0),
(148, 37, 'Ji-Ung', 0),
(149, 38, 'Sa famille a fait faillite', 1),
(150, 38, 'Sa famille est morte', 0),
(151, 38, 'Son père a fait faillite', 0),
(152, 38, 'Ses parents ont divorcé', 0),
(153, 39, 'Chez L\'oncle de Beak-YiJin', 1),
(154, 39, 'Dans un Motel', 0),
(155, 39, 'Avec le petit frère de Yi Jin', 0),
(156, 39, 'Elle s\'est enfuit avec son mari', 0),
(157, 40, 'Entrer dans la NASA', 1),
(158, 40, 'Etre journaliste', 0),
(159, 40, 'Etre Présentateur télé', 0),
(160, 40, 'Etre vendeur de livre', 0),
(161, 41, '2001', 1),
(162, 41, '2002', 0),
(163, 41, '1999', 0),
(164, 41, '2011', 0),
(165, 42, 'Livreur de journeau', 1),
(166, 42, 'Buveur d\'alcool', 0),
(167, 42, 'Vendeur de livre', 0),
(168, 42, 'Vendeur de poisson', 0),
(2629, 78, 'Yoon Se-ri', 1),
(2630, 78, 'Ri Jeong Hyeok', 0),
(2631, 78, 'Seo Dan', 0),
(2632, 78, 'Park Kwang-beom', 0),
(2633, 79, 'Militaire', 1),
(2634, 79, 'Secouriste', 0),
(2635, 79, 'Gendarme', 0),
(2636, 79, 'Politicien', 0),
(2637, 80, 'La plage', 1),
(2638, 80, 'En fôret', 0),
(2639, 80, 'Sur la lune', 0),
(2640, 80, 'Dans le désert', 0),
(2641, 81, 'Seri\'s Choice', 1),
(2642, 81, 'Yoon Seri', 0),
(2643, 81, 'Seri & Co', 0),
(2644, 81, 'Y.S', 0),
(2645, 82, 'Le piano', 1),
(2646, 82, 'Le violon', 0),
(2647, 82, 'La lutte', 0),
(2648, 82, 'Le judo', 0),
(2649, 83, 'Fraise', 1),
(2650, 83, 'Peche', 0),
(2651, 83, 'Pasteque', 0),
(2652, 83, 'Aucun', 0),
(2653, 84, 'Cha Yu-Ri', 1),
(2654, 84, 'Jo Kang-Hwa', 0),
(2655, 84, 'Cha Yeon-Ji', 0),
(2656, 84, 'Oh Min-Jung', 0),
(2657, 85, '49 jours', 1),
(2658, 85, '2 semaines', 0),
(2659, 85, '180 jours', 0),
(2660, 85, '30 jours', 0),
(2661, 86, '2004', 1),
(2662, 86, '2002', 0),
(2663, 86, '2000', 0),
(2664, 86, '2008', 0),
(2665, 87, '2014', 1),
(2666, 87, '2018', 0),
(2667, 87, '2016', 0),
(2668, 87, '2008', 0),
(2669, 88, 'Soigner et protéger sa fille qui a acquis la faculté de voir les fantômes', 0),
(2670, 88, 'aider ses proches à faire le deuil', 1),
(2671, 88, 'aider son mari à se reprendre en main et refaire des chirurgie', 0),
(2672, 88, 'pour connaitre sa fille', 0),
(2673, 89, 'Ko Hyun-Jung', 1),
(2674, 89, 'Ms. Mi-Dong', 0),
(2675, 89, 'Seo Bong-Yeon', 0),
(2676, 89, 'Jang Young-Sim', 0),
(2677, 90, 'La garderie', 1),
(2678, 90, 'Le parc', 0),
(2679, 90, 'L\'appartement', 0),
(2680, 90, 'Au supermarché', 0),
(2681, 91, 'Kim Tae-Hee', 1),
(2682, 91, 'Seo Dan', 0),
(2683, 91, 'Kim Tae ri', 0),
(2684, 91, 'Han Yeo-Jin', 0),
(2685, 92, '1', 1),
(2686, 92, '4', 0),
(2687, 92, '3', 0),
(2688, 92, '2', 0),
(2697, 95, '2004', 1),
(2698, 95, '1923', 0),
(2699, 95, '2008', 0),
(2700, 95, '1934', 0),
(2701, 96, '16', 1),
(2702, 96, '12', 0),
(2703, 96, '10', 0),
(2704, 96, '17', 0),
(2705, 97, 'Fraises', 1),
(2706, 97, 'Amande', 0),
(2707, 97, 'Myrtilles', 0),
(2708, 97, 'Peche', 0),
(2709, 98, 'Cha Yu ri', 1),
(2710, 98, 'Cha Yeon-Ji', 0),
(2711, 98, 'Cha Seri', 0),
(2712, 98, 'Ko Hyun-Jung', 0),
(2713, 99, '2019', 1),
(2714, 99, '2018', 0),
(2715, 99, '2006', 0),
(2716, 99, '2020', 0),
(2717, 100, 'dans sa montre', 1),
(2718, 100, 'dans son journal', 0),
(2719, 100, 'dans sa bibliothèque', 0),
(2720, 100, 'dans le piano de Ri Jeong Hyuk', 0),
(2721, 101, 'au stand de pret sur gage', 1),
(2722, 101, 'au stand de produit de beauté', 0),
(2723, 101, 'dans le jardin de la maison', 0),
(2724, 101, 'dans le piano de Ri Jeong Hyuk', 0),
(2725, 102, 'En corée du nord', 1),
(2726, 102, 'en chine', 0),
(2727, 102, 'au japon', 0),
(2728, 102, 'en Russie', 0),
(2729, 103, 'à cause d\'un ouragan', 1),
(2730, 103, 'à cause d\'un tsunami', 0),
(2731, 103, 'à cause d\'un kidnapping', 0),
(2732, 103, 'à cause de la pluie torrentielle', 0),
(2733, 104, '1919', 1),
(2734, 104, '1912', 0),
(2735, 104, '1930', 0),
(2736, 104, '1924', 0),
(2737, 105, 'Parapente', 1),
(2738, 105, 'Skydiving', 0),
(2739, 105, 'Bungee Jumping', 0),
(2740, 105, 'Pilates', 0),
(2741, 106, 'Scandale', 1),
(2742, 106, 'Publicité dans les transports', 0),
(2743, 106, 'publicité sur les réseaux', 0),
(2744, 106, 'Promotions', 0),
(2745, 107, 'Zombie Boy', 1),
(2746, 107, 'The cheerful Dog', 0),
(2747, 107, 'The hand, The monkfish', 0),
(2748, 107, 'the boy who fed on nightmares', 0),
(2749, 108, 'cerf', 1),
(2750, 108, 'chien', 0),
(2751, 108, 'perroquet', 0),
(2752, 108, 'sanglier', 0),
(2753, 109, 'Beyond Imagination', 1),
(2754, 109, 'Make A wish', 0),
(2755, 109, 'Shiny Castle Books', 0),
(2756, 109, 'Nightmare Tales', 0),
(2757, 110, 'Mang Tae', 1),
(2758, 110, 'Sang Tae', 0),
(2759, 110, 'Tae Tae', 0),
(2760, 110, 'Moon Tae', 0),
(2761, 111, 'écrivaine', 1),
(2762, 111, 'chanteuse', 0),
(2763, 111, 'influenceuse', 0),
(2764, 111, 'manager', 0),
(2765, 112, 'Papillon', 1),
(2766, 112, 'Libellule', 0),
(2767, 112, 'Abeille', 0),
(2768, 112, 'Mouche', 0),
(2769, 113, 'dinosaures', 1),
(2770, 113, 'papillons', 0),
(2771, 113, 'poissons', 0),
(2772, 113, 'écureuil', 0),
(2773, 114, 'agent de santé communautaire', 1),
(2774, 114, 'banquier', 0),
(2775, 114, 'psychologue', 0),
(2776, 114, 'baby-sitter', 0),
(2777, 115, 'le Styx', 1),
(2778, 115, 'L\'achéron', 0),
(2779, 115, 'La Haine', 0),
(2780, 115, 'Le Pygmalion', 0),
(2781, 116, 'Artémis', 1),
(2782, 116, 'Aphrodite', 0),
(2783, 116, 'Hera', 0),
(2784, 116, 'Athéna', 0),
(2785, 117, 'feignons', 1),
(2786, 117, '5', 0),
(2787, 117, 'océan austral', 0),
(2788, 117, 'lune', 0),
(2789, 118, 'Le printemps', 1),
(2790, 118, 'L\'hiver', 0),
(2791, 118, 'L\'été', 0),
(2792, 118, 'L\'automne', 0),
(2793, 119, 'vérité', 1),
(2794, 119, 'soleil', 0),
(2795, 119, 'pluie', 0),
(2796, 119, 'eau', 0),
(2797, 120, 'Helsinki', 1),
(2798, 120, 'Oslo', 0),
(2799, 120, 'Copenhague', 0),
(2800, 120, 'Berlin', 0),
(2801, 121, 'L\'Amazone', 1),
(2802, 121, 'fleur', 0),
(2803, 121, 'la seine', 0),
(2804, 121, 'le Nil', 0),
(2805, 122, 'Cha Yu-Ri', 1),
(2806, 122, 'Cha Yeon-Ji', 0),
(2807, 122, 'Oh Min-Jung', 0),
(2808, 122, 'Jo Kang-Hwa', 0),
(2809, 123, 'fraise', 1),
(2810, 123, 'peche', 0),
(2811, 123, 'amande', 0),
(2812, 123, 'papaye', 0),
(2813, 124, '2014', 1),
(2814, 124, '2010', 0),
(2815, 124, '2009', 0),
(2816, 124, '2012', 0),
(2817, 125, '2019', 1),
(2818, 125, '2020', 0),
(2819, 125, '2009', 0),
(2820, 125, '2014', 0),
(2821, 126, '16', 1),
(2822, 126, '12', 0),
(2823, 126, '13', 0),
(2824, 126, '8', 0),
(2825, 127, '49 jours', 1),
(2826, 127, '2 semaines', 0),
(2827, 127, '3 mois', 0),
(2828, 127, '30 jours', 0),
(2829, 128, 'Chirurgien', 1),
(2830, 128, 'Opticien', 0),
(2831, 128, 'Infirmier', 0),
(2832, 128, 'Père', 0),
(2833, 129, 'Jo Seo-Woo', 1),
(2834, 129, 'Jo Seola', 0),
(2835, 129, 'Jo Yu-Ri', 0),
(2836, 129, 'Jo Min-Jung', 0),
(2837, 130, '2004', 1),
(2838, 130, '2019', 0),
(2839, 130, '2018', 0),
(2840, 130, '2002', 0),
(2841, 131, 'Ko Hyun-Jung', 1),
(2842, 131, 'Ms. Mi-Dong', 0),
(2843, 131, 'Seo Bong-Yeon', 0),
(2844, 131, 'Jang Young-Sim', 0);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cm_comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cm_date` datetime NOT NULL,
  `cm_drama_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9474526CBC85CCB6` (`cm_drama_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `cm_comment`, `cm_date`, `cm_drama_id`) VALUES
(1, 'Un drama qui nous transporte au delà des frontières. Les paysages suisses sont magnifiques et ajoute à l\'atmosphère apaisante du drama.', '2022-04-13 21:06:10', 5),
(2, 'Les personnages secondaires auraient pu être un peu plus développés.', '2022-04-13 21:17:28', 5),
(3, 'un plaisir de découvrir le folklore avec une intrigue bien mise en place !', '2022-04-13 21:18:35', 11),
(4, 'Une histoire qui met du baume au coeur.', '2022-04-13 21:23:38', 36);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ct_fname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ct_lname` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ct_mail` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ct_tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ct_message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `critic`
--

DROP TABLE IF EXISTS `critic`;
CREATE TABLE IF NOT EXISTS `critic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cr_created_at` datetime NOT NULL,
  `cr_updated_at` datetime DEFAULT NULL,
  `cr_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cr_critic` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cr_like` int(11) DEFAULT NULL,
  `cr_story` decimal(3,1) NOT NULL,
  `cr_music` decimal(3,1) NOT NULL,
  `cr_casting` decimal(3,1) NOT NULL,
  `cr_rate` decimal(3,1) NOT NULL,
  `cr_user_id` int(11) NOT NULL,
  `cr_drama_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C9E2F7F1B10BD1D7` (`cr_user_id`),
  KEY `IDX_C9E2F7F16A2016D3` (`cr_drama_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `critic`
--

INSERT INTO `critic` (`id`, `cr_created_at`, `cr_updated_at`, `cr_title`, `cr_critic`, `cr_like`, `cr_story`, `cr_music`, `cr_casting`, `cr_rate`, `cr_user_id`, `cr_drama_id`) VALUES
(1, '2022-04-04 21:09:31', NULL, 'Drama trop triste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit', NULL, '10.0', '9.0', '9.0', '9.3', 2, 5),
(2, '2022-04-04 22:47:43', NULL, 'Le réalisateur est trop fort', 'J\'ai presque bingé #TwentyFiveTwentyOne aujourd\'hui pour le final et même avec des réserves sur la fin, j\'ai aimé découvrir les persos, les voir évoluer et l\'amitié entre eux. Bon point aussi pour les détails des années 90/2000 ! C\'est pas un coup de coeur mais un bon visionnage', NULL, '10.0', '10.0', '10.0', '10.0', 1, 4),
(3, '2022-04-04 23:28:07', NULL, 'J\'ai acheté l\'album', 'Je suis à jour et c\'est incroyable ! Je le recommande ++, l\'alchimie entre les deux acteurs sont incroyables ( en plus ils jouent tous super bien ), la musique incroyable ( V merci !!), les paysages, la façon dont les plans sont pris, etc. Tout est parfaitement contrôlé et j\'espère une fin à la hauteur de ces épisodes vraiment incroyables', NULL, '10.0', '9.0', '9.0', '9.3', 2, 35),
(4, '2022-04-05 09:52:26', NULL, 'Vous laisse sans mots', 'Une série qui narre les évènements d\'une certaine période du passé du personnage principal mettant en scène sa passion pour l\'escrime et sa carrière. Une passion si tangible qu\'on voudrait nous même nous y mettre.', NULL, '10.0', '10.0', '10.0', '10.0', 3, 4),
(5, '2022-04-05 12:02:56', NULL, 'la famille', 'J\'ai presque bingé #TwentyFiveTwentyOne aujourd\'hui pour le final et même avec des réserves sur la fin, j\'ai aimé découvrir les persos, les voir évoluer et l\'amitié entre eux. Bon point aussi pour les détails des années 90/2000 ! C\'est pas un coup de coeur mais un bon visionnage', NULL, '10.0', '7.0', '9.0', '8.7', 13, 4),
(6, '2022-04-13 21:21:26', NULL, 'Découverte', 'Nous pouvons apprendre plus sur le folklore coréen avec cette représentation de légendes urbaines et anciennes. Le jeu d\'acteur est vraiment appréciables. Mais le script reste le plus attrayant.', NULL, '8.0', '8.0', '8.0', '8.0', 3, 11),
(7, '2022-04-13 21:43:49', NULL, 'feel good', 'Un drama léger, à regarder pour passer le temps. Une bonne dose d\'humour qui nous fait oublier le temps.', NULL, '7.0', '5.0', '9.0', '7.0', 3, 9);

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
('DoctrineMigrations\\Version20220215172157', '2022-04-17 12:13:01', 706),
('DoctrineMigrations\\Version20220228031755', '2022-04-17 12:13:01', 80),
('DoctrineMigrations\\Version20220313183836', '2022-04-17 12:13:02', 1423),
('DoctrineMigrations\\Version20220313194011', '2022-04-17 12:13:03', 154),
('DoctrineMigrations\\Version20220315091358', '2022-04-17 12:13:03', 77),
('DoctrineMigrations\\Version20220315093445', '2022-04-17 12:13:03', 149),
('DoctrineMigrations\\Version20220315163322', '2022-04-17 12:13:03', 101),
('DoctrineMigrations\\Version20220321151845', '2022-04-17 12:13:03', 117),
('DoctrineMigrations\\Version20220331162617', '2022-04-17 12:13:04', 76),
('DoctrineMigrations\\Version20220331164306', '2022-04-17 12:13:04', 80),
('DoctrineMigrations\\Version20220331164700', '2022-04-17 12:13:04', 76),
('DoctrineMigrations\\Version20220331191707', '2022-04-17 12:13:04', 74),
('DoctrineMigrations\\Version20220401154205', '2022-04-17 12:13:04', 155),
('DoctrineMigrations\\Version20220401155054', '2022-04-17 12:13:04', 188),
('DoctrineMigrations\\Version20220401163800', '2022-04-17 12:13:04', 82),
('DoctrineMigrations\\Version20220401164144', '2022-04-17 12:13:04', 62),
('DoctrineMigrations\\Version20220402235212', '2022-04-17 12:13:04', 88),
('DoctrineMigrations\\Version20220404224709', '2022-04-17 12:13:04', 93),
('DoctrineMigrations\\Version20220417121455', '2022-04-17 12:15:12', 59);

-- --------------------------------------------------------

--
-- Structure de la table `drama`
--

DROP TABLE IF EXISTS `drama`;
CREATE TABLE IF NOT EXISTS `drama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dr_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_date` date NOT NULL,
  `dr_nb_ep` int(11) NOT NULL,
  `dr_rate` decimal(3,1) DEFAULT NULL,
  `dr_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_banner_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dr_video` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `dr_date_end` date DEFAULT NULL,
  `dr_genre_id` int(11) DEFAULT NULL,
  `dr_admin_id_id` int(11) NOT NULL,
  `dr_plot` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C855ABB4F3698322` (`dr_genre_id`),
  KEY `IDX_C855ABB46464A106` (`dr_admin_id_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `drama`
--

INSERT INTO `drama` (`id`, `dr_name`, `dr_date`, `dr_nb_ep`, `dr_rate`, `dr_img`, `dr_banner_img`, `dr_video`, `created_at`, `updated_at`, `dr_date_end`, `dr_genre_id`, `dr_admin_id_id`, `dr_plot`) VALUES
(4, 'Twenty Five Twenty One', '2022-02-12', 16, '9.3', '59b9194bdee1f6fb77eafa719622a2ce.jpg', 'dd95ef0e8ecbc6cfd0b047c4b771cbf0.png', 'https://www.youtube.com/embed/gYp4cKumTwU', '2022-04-01 16:49:27', '2022-04-03 15:13:03', '2022-04-03', 2, 1, 'L’histoire se déroule en 1998 et raconte l’histoire de jeunes qui trouvent une nouvelle direction et une nouvelle croissance après avoir perdu leurs rêves. Deux personnes se rencontrent pour la première fois à l’âge de 22 et 18 ans et tombent amoureuses des années plus tard, à l’âge de 25 et 21 ans.\r\n\r\nNa Hee Do fait partie de son équipe d’escrime du secondaire. En raison de la crise financière sud-coréenne, l’équipe d’escrime du secondaire est dissoute. Elle surmonte toutes les difficultés\r\nest membre de l’équipe nationale d’escrime.\r\nLa crise financière sud-coréenne provoque également la faillite de l’entreprise du père de Baek Yi Jin. Cela conduit à un changement de vie pour Baek Yi Jin, de vivre la vie d’une personne riche à une personne pauvre. Pendant ses études, il travaille à temps partiel comme livreur de journaux. Plus tard, il devient journaliste sportif pour un réseau de radiodiffusion.'),
(5, 'Crash Landing On You', '2019-12-14', 16, '9.0', '9b972aaaedd9b4981669a23f6a9d7682.jpg', 'ea057fb3517eb0859c6361a8875c3ac3.jpg', 'https://www.youtube.com/embed/eXMjTXL2Vks', '2022-04-03 00:26:12', NULL, '2020-02-16', 1, 11, 'Yoon Se-Ri (Son Ye-Jin) is an heiress to a conglomerate in South Korea. One day, while paragliding, an accident caused by strong winds leads Yoon Se-Ri to make an emergency landing in North Korea. There, she meets Ri Jeong-Hyeok (Hyun-Bin), who is a North Korean army officer. He tries to protect her and hide her. Soon, Ri Jeong-Hyeok falls in love with Yoon Se-Ri.'),
(7, 'The K2', '2016-09-23', 16, '8.5', '9bc0c90a2c91bc460780edefb35d584b.jpg', 'e4d9bfd197770a8ec160fe6d4c9309e8.jpg', 'https://www.youtube.com/embed/fC9vxwFkuVo', '2022-04-04 22:28:40', NULL, '2016-11-12', 1, 1, 'Kim Je Ha est un ex-agent secret abandonné aussi bien par ses collègues que par son pays. Accusé à tort du meurtre de sa petite amie, il n\'a alors d\'autre choix que de vivre caché afin de survivre. Au cours de sa cavale, c\'est en Espagne qu\'il vient en aide à Go An Na, la fille cachée de Jang Se Jun, candidat aux futures élections présidentielles. Issue d\'une relation précédent le mariage de son père et enfermée sous surveillance depuis la mort de sa mère, elle vit désormais recluse car souffrant de troubles de panique à la suite d\'un traumatisme survenu durant son enfance.\r\n\r\nDe retour en Corée, Je Ha sauve la vie de Choi Yu Jin, fille d\'une famille de chaebol et mariée à Jang Se Jun. Sous la façade d\'une épouse parfaite et aimante, celle-ci souffre pourtant des multiples actes indécents de son mari qu\'elle se retrouve généralement à couvrir, cachant son ambition démesurée derrière son charisme et sa personnalité bienveillante.\r\n\r\nC\'est ainsi que Yu Jin proposera à Je Ha de travailler comme son garde du corps et de rejoindre les forces spéciales de la JSS, société privée chargée de la sécurité de leur famille, au sein de laquelle il sera connu sous le nom de code K2. D\'abord réfractaire à son offre, celui-ci finit par accepter à la condition qu\'elle lui serve d\'arme afin de se venger de tous ceux qui l\'ont trahi et fait de lui un fugitif.'),
(8, 'Military Prosecutor Doberman', '2022-02-28', 16, '9.0', '0bd95845db4c9b3e874c3ceac07f2fd6.jpg', '5ca939597e064e33973f314ab095b41d.jpg', 'https://www.youtube.com/embed/iweMe58XpgI', '2022-04-04 22:31:44', '2022-04-04 22:52:06', '2022-04-26', 4, 1, 'Do Bae Man est un homme qui ne voit pas d\'autre intérêt à être devenu procureur militaire que l\'argent. Cha Wu In, elle, vient de devenir procureure militaire par vengeance et avec un fort sens de la justice.\r\nMalgré leurs visions opposées du métier, ils vont devoir faire équipe pour lutter contre la corruption, découvrir les sombres secrets de l\'armée et peut-être, s\'influencer l\'un l\'autre pour devenir de \"véritables\" procureurs militaires.\r\n\r\nDescription'),
(9, 'Clean With Passion For Now', '2018-11-26', 16, '7.0', 'f38ea9d5c8555f18646b515d6063f8c1.jpg', '392fe50388dc6c1d37cde4a20656235d.jpg', 'https://www.youtube.com/embed/CVywAZZ8v9g', '2022-04-04 22:36:11', NULL, '2019-02-04', 1, 1, 'Clean With Passion For Now est basé sur le webcomic du même titre, écrit par Aaengo.\r\n\r\nJang Seon Gyeol est le dirigeant d\'une entreprise de nettoyage. Il est jeune, beau et riche mais est également mysophobe. Cette particularité fait de lui un obsédé du nettoyage et de la propreté.\r\n\r\nGil Oh Sol est une jeune femme dotée d\'une personnalité enjouée, un peu désordonnée et qui n\'a pas peur de se salir.\r\n\r\nQue se passera-t-il lorsque ces deux personnes se rencontreront et changeront peu à peu l\'univers de l\'autre ?'),
(10, 'Guardian: The Lonely and Great God', '2016-12-02', 16, '8.7', '42e6034da69b69da9bc0073d6626b71d.jpg', 'b67745d7b5f7c0cf7ec59db2b48e0ca0.jpg', 'https://www.youtube.com/embed/8AcNEVUzV4o', '2022-04-04 22:56:42', NULL, '2017-01-21', 6, 1, 'Durant l\'ère de Goryeo, Kim Sin était un général de guerre invincible et jalousé du jeune roi. Poignardé par celui-ci, il survit mais devient alors un gobelin immortel.\r\n\r\n900 années ont passé et Kim Sin est toujours à la recherche d\'une prêtresse humaine qui l\'aidera à mettre fin à son immortalité. Celui-ci vit désormais aux côtés d\'un sinistre faucheur souffrant d\'amnésie et ayant pour mission de conduire les âmes récemment décédées dans l\'autre monde. Un soir, Sin sauve la vie d\'une jeune femme enceinte se trouvant au seuil de la mort. Cette dernière donnera naissance à une petite fille nommée Ji Eun Tak et 9 années plus tard, Eun Tak qui vit toujours avec sa mère acquiert la faculté particulière de voir les esprits. Une nuit, sa mère décède soudainement et c\'est à ce moment-là qu\'elle fera la rencontre du faucheur d\'âmes.\r\n\r\nAujourd\'hui, Eun Tak est une étudiante vivant aux côtés de la famille de sa tante mais constamment abusée par ceux-ci. Un jour, alors qu\'elle célèbre son anniversaire en bord de mer, Kim Sin apparaît soudainement devant elle et sans en connaître la raison, il se voit capable d\'entendre la voix de la jeune fille. C\'est ainsi que celle-ci lui révèlera qu\'il est en réalité un Dokkaebi (gobelin), clamant également être sa fiancée.\r\n\r\nD\'autre part, Kim Seon est une femme brillante et séduisante propriétaire d\'un restaurant de poulet, tandis que Yu Deok Hwa, lui est le neveu de Sin et héritier rebelle d\'un chaebol dont la famille a été gardienne du gobelin durant des générations.'),
(11, 'Korean Odyssey', '2017-12-23', 20, '7.8', '573996f397ae3b173499d92dbd17d40a.jpg', '73cc054d9281bf729443c764d694706c.jpg', 'https://www.youtube.com/embed/n2Y8EeHEkDE', '2022-04-04 22:59:39', NULL, '2018-03-04', 6, 1, 'A Korean Odyssey est une réinterprétation moderne du roman chinois \"Journey To The West\" du célèbre écrivain \"Wu Cheng\'en\".\r\n\r\nJin Seon Mi est une PDG de l\'immobilier qui a le pouvoir d\'exorciser des démons vivants dans les biens immobiliers hantés. Elle est aussi connue sous le nom de Sam Jang à cause de son odeur irrésistible de fleur de lotus et du grand pouvoir qu\'elle procure lorsqu\'elle est dévorée par un démon.\r\n\r\nLorsque Seon Mi était petite, elle a été piégée par Son Oh Gong, un dieu mineur, puissant et vif d\'esprit, mais aussi de nature colérique et espiègle.\r\nCe dernier, étant emprisonné dans un château, lui propose sa protection à chaque fois qu\'elle prononcera son nom et ce en échange de sa liberté. Mais Oh Gong ne respecte pas son contrat et efface son nom de l\'esprit de Seon Mi.\r\n\r\nDe nos jours, Oh Gong vit aux crochets de Wu Hwi Cheol, un PDG d\'une agence de divertissement qui essaye d\'obtenir une promotion de rang de Dieu.\r\nIl est aussi à la recherche de Sam Jang afin de pouvoir la manger et devenir le plus puissant des dieux. Cependant, il découvre que Sam Jang n\'est d\'autre que Jin Seon Mi et se verra dans l\'obligation de la protéger des autres démons pour la garder pour lui-même...'),
(12, 'All of Us Are Dead', '2022-01-28', 12, '8.7', '5642a291722c262489c08f194478458d.jpg', 'e3f81230fedec381e5b93e9103d9f0c1.jpg', 'https://www.youtube.com/embed/y3VzeVtMZyE', '2022-04-04 23:03:27', NULL, '2022-01-28', 5, 1, 'Le drama est une adaptation du webtoon du même nom de Ju Dong Geun.\r\n\r\nDans une petite ville tranquille, où rien ne se passe habituellement, un étrange virus apparaît, transformant les personnes en zombie. Sa propagation se multiplie d\'heures en heures, et alors que la population essaye d\'y faire face, un groupe de jeunes, dont Cheong San et On Jo, se retrouve piégé dans leur école. S\'ensuit alors une course pour sortir d\'ici, tout en évitant d\'être contaminé.'),
(13, 'Weightlifting Fairy Kim Bok-joo', '2016-11-16', 16, '9.9', '844f44a082c65e19ff70204ba94a91f6.jpg', '93b5bd2ae3012d6ba198d6fe582dbdeb.jpg', 'https://www.youtube.com/embed/6t5dLenA85Y', '2022-04-04 23:06:14', NULL, '2017-01-05', 2, 1, 'Kim Bok Ju fait partie de ces athlètes dont la spécialité est l\'haltérophilie. Elle en est passionnée depuis son enfance et possède une grande force, influencée par son père qui était autrefois spécialisé dans ce domaine. Jeong Jun Hyeong est quant à lui le meilleur ami de celle-ci, bien que leurs retrouvailles ne semblent pas heureuses. C\'est un nageur né, mais depuis qu\'il a été disqualifié de sa première compétition internationale, il souffre d\'un trauma appelé le \"trauma des départs\". Enfin, Song Si Ho, l\'ex-petite amie de Jun Hyeong, est une gymnaste qui a commencé à exercer cette activité depuis l\'âge de 5 ans.\r\n\r\nCe drama s\'inspire de la vie de la médaillée d\'or d\'haltérophilie aux Jeux Olympiques sud-coréens, Jang Mi Ran, et celui-ci raconte l\'histoire d\'une école d\'athlètes poursuivant leurs rêves.'),
(14, 'Start Up', '2020-10-17', 16, '9.3', '6a0b785b30dc3fb0a526a80e2a2d5fd9.jpg', '5056178ff58b6d6e4328b8753b86cf28.jpg', 'https://www.youtube.com/embed/BemKyzbLDDc', '2022-04-04 23:08:44', NULL, '2020-12-06', 1, 1, 'Nam Do San, fondateur de Samsan Tech, est au bord de la faillite et se retrouve à devenir le premier amour de Seo Dal Mi, jeune femme ayant abandonné ses études dans l\'espoir d\'ouvrir sa propre entreprise, et rêvant de devenir comme Steve Jobs.\r\nDo San et Dal Mi vont évoluer aux environs de la Silicon Valley coréenne, où les entreprises affluent, rêvant de devenir les futures Google et Amazon.'),
(35, 'Hi bye mama!', '2020-02-22', 16, '8.0', '4e32a11461c225a8e9d3056030961626.jpg', '73dbf630ad80baf34d384d0d235c9e39.jpg', 'https://www.youtube.com/embed/1EWJt4L58UM', '2022-04-01 20:11:07', NULL, '2020-04-19', 3, 1, 'C’est l’histoire d’une mère qui est morte et commence un projet de réincarnation de 49 jours, et d’un mari qui a à peine commencé à vivre une nouvelle vie après avoir surmonté la douleur de perdre sa femme. \n\nJo Kang Hwa est un chirurgien thoracique expérimenté. Après avoir perdu sa femme il y a quatre ans, il avait travaillé comme père célibataire jusqu’à ce qu’il se remarie il y a deux ans. Bien qu’il semble être une personne attentionnée, il ne donne pas un coup de main et n’intervient pas au besoin.'),
(36, 'Our beloved summer', '2021-12-06', 16, '9.3', 'c1103a8c90e177168b7ab92f610fb967.jpg', '1a2a5e874e8df6930ff87b998af023e1.png', 'https://www.youtube.com/embed/wpW6aVWgvMc', '2022-04-03 18:45:22', NULL, '0022-01-23', 1, 1, 'Choi Wung est un esprit libre immature qui fait ressortir sa sincérité lorsqu\'il trouve ce qu\'il veut dans la vie pour la première fois.\r\nGuk Yeon Su, qui avait pour seul rêve d\'être numéro 1 pendant ses études, essaie aujourd\'hui de devenir adulte tout en vivant sa vie avec acharnement et en s\'adaptant à la réalité avec une blessure au cœur.\r\nKim Ji Wung est un réalisateur de documentaires solitaire qui observe le monde derrière sa caméra. Il a eu un point de vue omniscient toute sa vie mais commence à changer lorsqu\'il réalise un documentaire sur Choi Wung et Guk Yeon Su.\r\nNJ est une idol belle et talentueuse. Après avoir travaillé avec acharnement en tant que star, elle se rend compte qu\'elle redevient lentement normale et se prépare à vivre sa vraie vie. Elle s\'intéresse aux œuvres de Choi Wung et devient naturellement curieuse à son sujet.');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gr_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `gr_name`) VALUES
(1, 'Romance'),
(2, 'Comédie'),
(3, 'Melodrama'),
(4, 'Science Fiction'),
(5, 'Action-Aventure'),
(6, 'Fantastique');

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qt_question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `qt_quizz_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8ADC54D5D9D3033E` (`qt_quizz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `qt_question`, `qt_quizz_id`) VALUES
(1, 'Qui est le main lead ?', 2),
(2, 'Qui est la main lead ?', 2),
(3, 'Quel est le sport pratiqué par Yu rim et Hee do?', 2),
(4, 'Qui a gagné le tournois d\'escrime d\'Espagne?', 2),
(5, 'Quel est le livre favorie de Hee Do et Yu Rim', 2),
(11, 'La mamie de Dal mi tient un restaurant de :', 5),
(12, 'Qui fait la voice over de Al Yeong Sil?', 5),
(13, 'Suzy a participez à l\'un des OST de l\'album. Lequel?', 5),
(14, 'Quand est l\'anniversaire de Han Ji-Pyeong', 5),
(15, 'Mr Han avait reçu un balle signé par un base Ball Player. Quel était le messsage?', 5),
(16, 'Quel est le nom de l\'actrice?', 6),
(17, 'Quel est son livre préferé?', 6),
(18, 'A quel âge a-t-elle arrêté l\'escrime?', 6),
(19, 'Comment est décédé le père de Na hee do?', 6),
(20, 'Quel surnom son premier petit copain lui a donné?', 6),
(21, 'Qui a diffusé la serie?', 7),
(22, 'Comment l\'infection s\'est propagé dans l\'ecole?', 7),
(23, 'Comment s\'appelle la fille qui a été nommé présidente de la classe?', 7),
(24, 'Quel métier fait le père de On Jo?', 7),
(25, 'quelle matière enseigne Byeong-Chan (le proffesseur)?', 7),
(26, 'Quel est le job de Choi Ung?', 8),
(27, 'Qui sont les protagonistes?', 8),
(28, 'De qui le producteur était amoureux?', 8),
(29, 'Comment s\'appelle l\'artiste derrière les œuvre de Choi Ung?', 8),
(30, 'Pourquoi NJ aime Choi Ung?', 8),
(31, 'Pourquoi Yeon Su a mis fin à la relation?', 8),
(32, 'Qui a usurpé le travail de Choi Un?', 8),
(33, 'Qui les a emmené en voyage?', 9),
(34, 'Pourquoi ont-ils fait ce voyage?', 9),
(35, 'Ils sont allé à la plage comment?', 9),
(36, 'De quelle couleur était la voiture?', 9),
(37, 'Qui a eu l\'idée de laver les aliments avec de la javel?', 9),
(38, 'Que lui est-il arrivé?', 11),
(39, 'Ou vit la mère de Beak Yi Jin?', 11),
(40, 'Quel était le rêve de Yi Jin?', 11),
(41, 'En quel année est-il allé à NYC?', 11),
(42, 'Son first job?', 11),
(78, 'Qui est le personnage principal de la série', 24),
(79, 'Quel est la profession du male lead ?', 24),
(80, 'Où Se-ri a failli être abandonné enfant ?', 24),
(81, 'Quel est le nom de l\'entreprise de Se-ri ?', 24),
(82, 'Quel est la passion de Ri Jeong Hyeok ?', 24),
(83, 'A quel fruit Seo-Woo est allergique ?', 25),
(84, 'Qui est le personnage principal de la série ?', 25),
(85, 'Combien de jours Yu ri a pour rectifier les problèmes créés ?', 25),
(86, 'En quelle année Yuri rencontre Jo Kang Hwa ?', 25),
(87, 'En quel année Yuri est morte ?', 25),
(88, 'Pourquoi Yuri reprend vie ?', 25),
(89, 'Qui est la meilleure ami de Yu ri ?', 25),
(90, 'Où Yuri voit sa fille, une fois revenu à la vie ?', 25),
(91, 'Quelle actrice jour le personnage principale ?', 25),
(92, 'Combien de frere et soeur a la lead ?', 25),
(95, 'En quelle année Yuri rencontre Jo Kang Hwa ?', 29),
(96, 'Combien d\'épisodes compte le drama ?', 29),
(97, 'A quoi est allegique Seo Woo ?', 29),
(98, 'Quel est le personnage principal ?', 29),
(99, 'En quelle année se déroule le drama ?', 29),
(100, 'Où le frere de Ri Jeong Hyuk a placé les preuves pour inculper les officiers ?', 30),
(101, 'Où Seri retrouve les preuves laissé par Mu Hyeok ?', 30),
(102, 'Où Yoon Seri atteri ?', 30),
(103, 'Comment Yoon Seri se retrouve dans un nouveau pays ?', 30),
(104, 'En quelle année s\'est effectuée la première traversée de l\'atlantique en avion sans escale ?', 30),
(105, 'Quel activité pratique Yoon Seri ?', 30),
(106, 'Quel technique marketing Yoon Seri a employé dans les premiers episodes ?', 30),
(107, 'lequel n\'est pas un livre de Moon Young ?', 31),
(108, 'quel animal dérange Moon Young a tout bout de champ ?', 31),
(109, 'Quel était le nom de la maison d\'édition de Moon Young ?', 31),
(110, 'Quel était le nom de la peluche offerte en cadeau à Moon Young ?', 31),
(111, 'Quel était la profession de Moon Young ?', 31),
(112, 'Quel insecte est récurrent dans la série ?', 31),
(113, 'Le motif du T-shirt de famille était', 31),
(114, 'Quel était la profession de Gang Tae ?', 31),
(115, 'Comment s\'appelle le fleuve qui sépare le monde terrestre des Enfers ? (mythologie grecque)', 31),
(116, 'Quelle déesse est assimilé à Diane dans la mythologie Romaine ?', 31),
(117, 'Que signifie Snowdrop ?', 35),
(118, 'Quel saison est mise en avant ?', 35),
(119, 'ce qui ne peut être caché', 35),
(120, 'Quelle est la capitale de la Finlande ?', 35),
(121, 'Quel est le fleuve le plus long du monde ?', 35),
(122, 'Qui est le personnage principal de la série ?', 32),
(123, 'A quel fruit Seo-Woo est allergique ?', 32),
(124, 'En quel année Yuri est morte ?', 32),
(125, 'En quelle année se déroule le drama ?', 32),
(126, 'Combien d\'épisodes compte le drama ?', 32),
(127, 'Combien de jours Yu ri a pour rectifier les problèmes créés ?', 32),
(128, 'Quel est la profession de Jo Kang-Hwa ?', 32),
(129, 'Quel est le nom de la fille de Cha Yu-Ri ?', 32),
(130, 'En quelle année Yuri rencontre Jo Kang Hwa ?', 32),
(131, 'Qui est la meilleure ami de Yu ri ?', 32);

-- --------------------------------------------------------

--
-- Structure de la table `quizz`
--

DROP TABLE IF EXISTS `quizz`;
CREATE TABLE IF NOT EXISTS `quizz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qz_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qz_user_id` int(11) NOT NULL,
  `qz_drama_id` int(11) NOT NULL,
  `qz_created_at` datetime NOT NULL,
  `qz_updated_at` datetime DEFAULT NULL,
  `qz_format` enum('5','7','10') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:enumFormat)',
  `qz_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qz_approved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_7C77973D2988221A` (`qz_user_id`),
  KEY `IDX_7C77973D8F6D2B2D` (`qz_drama_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quizz`
--

INSERT INTO `quizz` (`id`, `qz_name`, `qz_user_id`, `qz_drama_id`, `qz_created_at`, `qz_updated_at`, `qz_format`, `qz_img`, `qz_approved`) VALUES
(2, 'How much do you like them?', 2, 4, '2022-04-01 20:56:29', NULL, '5', 'Capture-d-ecran-73-6248ed9b138f1.png', 1),
(5, 'Connais tu vraiment Start Up?', 2, 14, '2022-04-05 14:55:07', '2022-04-05 15:15:12', '5', '5623840-624c584b05f1e.jpg', 1),
(6, 'Na Hee Doo Quizz', 2, 4, '2022-04-05 15:16:12', NULL, '5', 'Capture-d-ecran-73-6248ed9b138f1.png', 1),
(7, 'Connais-tu vraiment AOUAD?', 4, 12, '2022-04-10 11:38:37', NULL, '5', 'Safeimagekit-resized-imgpng-6252c1bdea4d2.png', 1),
(8, 'Un été d\'amour The quizz. (OBS)', 4, 36, '2022-04-10 11:56:14', NULL, '7', '7824878-6252c5deac793.jpg', 1),
(9, 'Summer Break 25-21', 2, 4, '2022-04-15 21:13:19', NULL, '5', '8165264-6259dfefe6725.jpg', 1),
(11, 'Beak Yi Jin Quizz (25-21)', 4, 4, '2022-04-15 21:35:37', NULL, '5', '8165269-6259e52944455.webp', 1),
(24, 'Souvenir', 3, 5, '2022-04-03 00:34:30', '2022-04-17 11:31:18', '5', 'wp4580492-6248eb961cf08.jpg', 1),
(25, 'Glitch Mode', 3, 35, '2022-04-03 00:43:07', '2022-04-17 11:51:15', '10', 'Capture-d-ecran-73-6248ed9b138f1.png', 1),
(29, 'Treasure', 3, 35, '2022-04-04 22:52:16', '2022-04-17 11:55:38', '5', 'b81f807f4099f6ca5d4f4b374ddefd76-625375b0d7188.jpg', 1),
(30, 'Papillon', 3, 5, '2022-04-04 22:58:19', '2022-04-17 15:41:31', '7', 'ERAAIE9U4AEkOZi-625c352b60ff2.jpg', 1),
(31, 'Grey Suit', 3, 35, '2022-04-17 23:13:48', NULL, '10', 'EcA-FG1U8AAujZb-624b7bac48595.jpg', 1),
(32, 'Nox', 3, 35, '2022-04-04 23:33:02', '2022-04-17 12:53:38', '10', 'a79a1efa2621372a94f1618eca9a7ee5-624b802ea36c4.jpg', 1),
(35, 'cercle', 3, 5, '2022-04-04 23:43:51', NULL, '5', 'YXim56-624b82b798452.webp', 0);

-- --------------------------------------------------------

--
-- Structure de la table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
CREATE TABLE IF NOT EXISTS `reset_password_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_score` int(11) DEFAULT NULL,
  `sc_user_id` int(11) NOT NULL,
  `sc_quizz_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_329937512D1E060D` (`sc_user_id`),
  KEY `IDX_3299375144CD206E` (`sc_quizz_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `sc_score`, `sc_user_id`, `sc_quizz_id`) VALUES
(1, 3, 3, 24),
(2, 0, 13, 24),
(3, 6, 3, 25),
(4, 9, 3, 31),
(5, 2, 3, 29);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `us_lname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_fname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_ban_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `us_img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `us_lname`, `us_fname`, `us_ban_img`, `us_img`, `email`, `roles`, `password`, `username`) VALUES
(1, 'Kleo', 'Franken', '', '', '', 'null', '', 'maniac'),
(2, 'Lore', 'Jane', NULL, NULL, 'ricardo@gmail.com', '[]', '$2y$13$jZfBbUZwuR6Q6MBsIqKvAeWInNmTrXeG/PuTqDio.76VLE7yMvwnO', 'Riri809'),
(3, 'Treasure', 'Stay', '72ce3dd5a065840b78e952d68130c76a.jpg', '27a5a1b6a0a3b66308053802fcddab91.jpg', 'mithunah.mathikaran@etu.univ-paris1.fr', '[]', '$2y$13$Hgy9MBa7CMPxFW.9ZiuUp.Mesg.zv88E2OmvQa6rm4VeaRHtii5OO', 'delight'),
(4, 'Jun', 'Paul', '9fb78a201680e497b87d53fdd5ee5309.png', 'a7b8efe3d49aa824bc8257df4df29f96.png', 'wabec12188@jooffy.com', '[]', '$2y$13$pk.f3kcQEKpTAy/inMGv5eKm9.7SOagOcDuHz9rQyZYQktDMHWZym', 'Meli'),
(11, NULL, NULL, NULL, NULL, 'noreply.dramatik@gmail.com', '[\"ROLE_ADMIN\"]', '$2y$13$IxGT0cDx5GomEwKyojSz5.H76tE/vApeG7KHfnoW3GZ.Xu0fHtwF6', 'admin'),
(12, NULL, NULL, NULL, NULL, 'mimi@gmail.com', '[]', '$2y$13$w2VllUVa/aUIK6m8AcLSEOd1CzYGGtA3YEf.lE/JHC/eBrsBrYdpu', 'Mamie'),
(13, 'Sutharsan', 'Maanuja', 'fcdad270f260f23218e51d2d942a3b93.jpg', 'f45087933fe2ece67f196980fa38a198.jpg', 'kaloxof195@sartess.com', '[]', '$2y$13$bTtFsR9b6p58CtzxOtppXufcf3Dwh3g5d2F0.bkaInXZrhgjl7VWi', 'Maanu');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `FK_5CE96394EB85828` FOREIGN KEY (`ch_question_id`) REFERENCES `questions` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CBC85CCB6` FOREIGN KEY (`cm_drama_id`) REFERENCES `drama` (`id`);

--
-- Contraintes pour la table `critic`
--
ALTER TABLE `critic`
  ADD CONSTRAINT `FK_C9E2F7F16A2016D3` FOREIGN KEY (`cr_drama_id`) REFERENCES `drama` (`id`),
  ADD CONSTRAINT `FK_C9E2F7F1B10BD1D7` FOREIGN KEY (`cr_user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `drama`
--
ALTER TABLE `drama`
  ADD CONSTRAINT `FK_C855ABB46464A106` FOREIGN KEY (`dr_admin_id_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_C855ABB4F3698322` FOREIGN KEY (`dr_genre_id`) REFERENCES `genre` (`id`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `FK_8ADC54D5D9D3033E` FOREIGN KEY (`qt_quizz_id`) REFERENCES `quizz` (`id`);

--
-- Contraintes pour la table `quizz`
--
ALTER TABLE `quizz`
  ADD CONSTRAINT `FK_7C77973D2988221A` FOREIGN KEY (`qz_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_7C77973D8F6D2B2D` FOREIGN KEY (`qz_drama_id`) REFERENCES `drama` (`id`);

--
-- Contraintes pour la table `reset_password_request`
--
ALTER TABLE `reset_password_request`
  ADD CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `FK_329937512D1E060D` FOREIGN KEY (`sc_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_3299375144CD206E` FOREIGN KEY (`sc_quizz_id`) REFERENCES `quizz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
