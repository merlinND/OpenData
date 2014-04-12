-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 12 Avril 2014 à 12:22
-- Version du serveur: 5.5.35-0ubuntu0.13.10.2
-- Version de PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `opendata`
--

-- --------------------------------------------------------

--
-- Structure de la table `catchphrases`
--

CREATE TABLE IF NOT EXISTS `catchphrases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `table` enum('types','places') COLLATE utf8_unicode_ci NOT NULL,
  `idTable` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `catchphrases`
--

INSERT INTO `catchphrases` (`id`, `key`, `table`, `idTable`, `created_at`, `updated_at`) VALUES
(1, 'catchphrases.typeMuseum1', 'types', 1, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(2, 'catchphrases.typeMuseum2', 'types', 1, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(3, 'catchphrases.typeArtwork1', 'types', 2, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(4, 'catchphrases.typeViewpoint1', 'types', 3, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(5, 'catchphrases.typeThemePark1', 'types', 4, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(6, 'catchphrases.typeMediatheque1', 'types', 6, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(7, 'catchphrases.typeLieuCulturel1', 'types', 2, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(8, 'catchphrases.typeLieuCulturel1', 'types', 2, '2014-04-12 10:22:07', '2014-04-12 10:22:07');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_04_11_190113_create_places_table', 1),
('2014_04_11_191040_create_types_table', 1),
('2014_04_11_191254_create_photos_table', 1),
('2014_04_11_192224_create_times_table', 1),
('2014_04_11_210817_create_catchphrases_table', 1),
('2014_04_11_232304_create_places_counters_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `idPlace` int(10) unsigned NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `url`, `idPlace`, `width`, `height`, `created_at`, `updated_at`) VALUES
(1, 'http://farm9.staticflickr.com/8463/8085414030_a4b29cb384_b.jpg', 1, 1024, 1024, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(2, 'http://farm8.staticflickr.com/7296/9828237966_31b729e80e_b.jpg', 2, 1024, 680, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(3, 'http://farm9.staticflickr.com/8055/8091368581_3e63eee948_b.jpg', 3, 1024, 1024, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(4, 'http://farm6.staticflickr.com/5047/5224622980_329afb50f7_b.jpg', 4, 800, 536, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(5, 'http://farm3.staticflickr.com/2678/4430968125_fbe3fa554a_b.jpg', 5, 678, 1024, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(6, 'http://farm6.staticflickr.com/5013/5542293997_c8296c31e5_b.jpg', 6, 768, 1024, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(7, 'http://farm6.staticflickr.com/5304/5615732649_178d4b6559_b.jpg', 10, 1024, 677, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(8, 'http://farm4.staticflickr.com/3186/3024836725_147195ef60_b.jpg', 11, 1024, 680, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(9, 'http://farm4.staticflickr.com/3713/9010488577_c42f62976d_b.jpg', 12, 1024, 740, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(10, 'http://farm9.staticflickr.com/8329/8418130362_e7706230df_b.jpg', 13, 1024, 680, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(11, 'http://farm5.staticflickr.com/4116/4850680155_93cc83a6d0_b.jpg', 14, 683, 1024, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(12, 'http://farm4.staticflickr.com/3726/10298184263_994160dd0e_b.jpg', 15, 1024, 682, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(13, 'http://farm6.staticflickr.com/5332/9533873752_bb090c623c_b.jpg', 16, 768, 1024, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(14, 'http://farm4.staticflickr.com/3726/10298184263_994160dd0e_b.jpg', 17, 1024, 682, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(15, 'http://farm3.staticflickr.com/2883/9203958326_bfd382d416_b.jpg', 18, 1024, 683, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(16, 'http://farm5.staticflickr.com/4037/4538770301_75e73b6109_b.jpg', 19, 1024, 771, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(17, 'http://farm4.staticflickr.com/3831/9070299429_8191aeca4b_b.jpg', 20, 1024, 576, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(18, 'http://farm9.staticflickr.com/8045/8116645460_2d936720db_b.jpg', 21, 1024, 1024, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(19, 'http://farm6.staticflickr.com/5052/5722458235_93edc928dc_b.jpg', 22, 683, 1024, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(20, 'http://farm3.staticflickr.com/2506/3889513133_03b08f7915_b.jpg', 23, 1024, 731, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(21, 'http://farm6.staticflickr.com/5520/10582195373_810bba46c9_b.jpg', 24, 1024, 1024, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(22, 'http://farm9.staticflickr.com/8349/8163278871_1872ebcb66_b.jpg', 25, 683, 1024, '2014-04-12 10:22:08', '2014-04-12 10:22:08'),
(23, 'http://farm9.staticflickr.com/8349/8163278871_1872ebcb66_b.jpg', 26, 683, 1024, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(24, 'http://farm8.staticflickr.com/7107/8163267685_24e9ed6e63_b.jpg', 27, 683, 1024, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(25, 'http://farm9.staticflickr.com/8202/8163292796_01dcb8774b_b.jpg', 28, 683, 1024, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(26, 'http://farm8.staticflickr.com/7063/6813891922_4b2f6c2ce8_b.jpg', 29, 1024, 683, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(27, 'http://farm9.staticflickr.com/8210/8163263339_3022d604c9_b.jpg', 30, 683, 1024, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(28, 'http://farm8.staticflickr.com/7358/9546738259_d5889d193f_b.jpg', 31, 1024, 683, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(29, 'http://farm6.staticflickr.com/5470/9553601038_e080c57394_b.jpg', 34, 1024, 768, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(30, 'http://farm4.staticflickr.com/3335/3215759125_fb8b975843_b.jpg', 36, 1024, 671, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(31, 'http://farm8.staticflickr.com/7154/6702968203_1f06bf1745_b.jpg', 37, 1024, 648, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(32, 'http://farm9.staticflickr.com/8326/8116558082_d1682ae1c5_b.jpg', 38, 800, 600, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(33, 'http://farm6.staticflickr.com/5489/9568733537_4294467fe1_b.jpg', 39, 1024, 333, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(34, 'http://farm3.staticflickr.com/2239/5796231314_c3cf303dfc_b.jpg', 40, 1024, 297, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(35, 'http://farm5.staticflickr.com/4030/4469786989_5f46db901b_b.jpg', 42, 1024, 683, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(36, 'http://farm2.staticflickr.com/1303/4708964920_cb97b2f2be_b.jpg', 43, 1024, 768, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(37, 'http://farm2.staticflickr.com/1336/5133375822_0bee9b828e_b.jpg', 44, 1024, 681, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(38, 'http://farm8.staticflickr.com/7265/6931742126_3b1df92e7a_b.jpg', 45, 1024, 683, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(39, 'http://farm3.staticflickr.com/2811/11357663653_4f8a7afa0b_b.jpg', 46, 1024, 685, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(40, 'http://farm7.staticflickr.com/6020/5923045807_b650efbc17_b.jpg', 47, 1024, 683, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(41, 'http://farm8.staticflickr.com/7039/6985306433_722780a154_b.jpg', 48, 1021, 1024, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(42, 'http://farm5.staticflickr.com/4084/4986575750_c23328bd96_b.jpg', 49, 1024, 765, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(43, 'http://farm6.staticflickr.com/5529/9418645356_ee9a8aec27_b.jpg', 50, 1024, 768, '2014-04-12 10:22:09', '2014-04-12 10:22:09'),
(44, 'http://farm7.staticflickr.com/6148/5985013761_194244e2ab_b.jpg', 52, 765, 1024, '2014-04-12 10:22:10', '2014-04-12 10:22:10'),
(45, 'http://farm8.staticflickr.com/7416/9188861937_95c3abcd9a_b.jpg', 53, 1024, 680, '2014-04-12 10:22:10', '2014-04-12 10:22:10'),
(46, 'http://farm3.staticflickr.com/2843/9668164871_795c8deba0_b.jpg', 54, 1024, 765, '2014-04-12 10:22:10', '2014-04-12 10:22:10'),
(47, 'http://farm5.staticflickr.com/4037/4539363310_6e3373e0fc_b.jpg', 56, 1024, 771, '2014-04-12 10:22:10', '2014-04-12 10:22:10'),
(48, 'http://farm9.staticflickr.com/8223/8342879660_1259d911af_b.jpg', 57, 765, 1024, '2014-04-12 10:22:10', '2014-04-12 10:22:10');

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(8,6) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idType` int(10) unsigned NOT NULL,
  `idTime` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

--
-- Contenu de la table `places`
--

INSERT INTO `places` (`id`, `name`, `description`, `latitude`, `longitude`, `zipcode`, `city`, `idType`, `idTime`, `created_at`, `updated_at`) VALUES
(1, 'Terre-Neuvas et de la Pêche', '', 49.761220, 0.363497, 76400, 'Saint-Guillaume-de-Fécamp', 1, NULL, '2014-04-12 10:21:37', '2014-04-12 10:21:37'),
(2, 'Palais Bénédictine', '', 49.758829, 0.368046, 76400, 'Saint-Guillaume-de-Fécamp', 1, NULL, '2014-04-12 10:21:37', '2014-04-12 10:21:37'),
(3, 'Futur Musée des Pêcheries', '', 49.761678, 0.368255, 76400, 'Saint-Guillaume-de-Fécamp', 1, NULL, '2014-04-12 10:21:37', '2014-04-12 10:21:37'),
(4, 'Musée du Chocolat', '', 49.750651, 0.416871, 76400, 'Saint-Guillaume-de-Fécamp', 1, NULL, '2014-04-12 10:21:38', '2014-04-12 10:21:38'),
(5, 'Ecomusée de la Pomme et du Cidre', '', 49.656139, 0.378558, 76110, 'Bretteville-du-Grand-Caux', 1, NULL, '2014-04-12 10:21:38', '2014-04-12 10:21:38'),
(6, 'Musée d''Art Moderne André Malraux', '', 49.484959, 0.102606, 76600, 'Le Havre', 1, NULL, '2014-04-12 10:21:38', '2014-04-12 10:21:38'),
(7, 'Salon des Navigateurs', '', 49.488710, 0.113471, 76600, 'Le Havre', 1, NULL, '2014-04-12 10:21:38', '2014-04-12 10:21:38'),
(8, 'Musée de l''ancien Havre', '', 49.489049, 0.114452, 76600, 'Le Havre', 1, NULL, '2014-04-12 10:21:38', '2014-04-12 10:21:38'),
(9, 'Muséum d''Histoire Naturelle', '', 49.487775, 0.109069, 76600, 'Le Havre', 1, NULL, '2014-04-12 10:21:38', '2014-04-12 10:21:38'),
(10, 'Musée Louis Phillipe', '', 50.049273, 1.417017, 76260, 'Eu', 1, NULL, '2014-04-12 10:21:38', '2014-04-12 10:21:38'),
(11, 'H2O', '', 49.441928, 1.077560, 76000, 'Rouen', 1, NULL, '2014-04-12 10:21:39', '2014-04-12 10:21:39'),
(12, 'Musée des Traditions Vérrières', '', 50.054805, 1.427940, 80880, 'Oust-Marest', 1, NULL, '2014-04-12 10:21:39', '2014-04-12 10:21:39'),
(13, 'Muséum d''Histoire Naturelle', '', 49.446974, 1.099877, 76000, 'Rouen', 1, NULL, '2014-04-12 10:21:39', '2014-04-12 10:21:39'),
(14, 'Musée Mathon-Durand', '', 49.731122, 1.439293, 76270, 'Neufchâtel-en-Bray', 1, NULL, '2014-04-12 10:21:39', '2014-04-12 10:21:39'),
(15, 'Musée de la faïence', '', 49.613272, 1.545747, 76440, 'Forges-les-Eaux', 1, NULL, '2014-04-12 10:21:39', '2014-04-12 10:21:39'),
(16, 'Musée de la Résistance et de la Déportation', '', 49.613136, 1.547321, 76440, 'Forges-les-Eaux', 1, NULL, '2014-04-12 10:21:39', '2014-04-12 10:21:39'),
(17, 'musée des maquettes hippomobiles', '', 49.613659, 1.545757, 76440, 'Forges-les-Eaux', 1, NULL, '2014-04-12 10:21:40', '2014-04-12 10:21:40'),
(18, 'Musée Industriel de la Corderie Vallois', '', 49.495107, 1.047977, 76960, 'Notre-Dame-de-Bondeville', 1, NULL, '2014-04-12 10:21:40', '2014-04-12 10:21:40'),
(19, 'Musée des sapeurs-pompiers de France', '', 49.547489, 1.075778, 76710, 'Montville', 1, NULL, '2014-04-12 10:21:40', '2014-04-12 10:21:40'),
(20, 'Maison des Templiers', '', 49.525351, 0.725883, 76490, 'Caudebec-en-Caux', 1, NULL, '2014-04-12 10:21:41', '2014-04-12 10:21:41'),
(21, 'Galerie Unbekandt', '', 49.759489, 0.368083, 76400, 'Saint-Guillaume-de-Fécamp', 2, NULL, '2014-04-12 10:21:41', '2014-04-12 10:21:41'),
(22, 'Sur la trace des Vikings', '', 49.321272, 1.101764, 76410, 'Tourville-la-Rivière', 2, NULL, '2014-04-12 10:21:41', '2014-04-12 10:21:41'),
(23, 'Espace Simohé', '', 49.815966, 0.511798, 76540, 'Saint-Pierre-en-Port', 2, NULL, '2014-04-12 10:21:41', '2014-04-12 10:21:41'),
(24, 'La Liberté', '', 49.535091, 0.964074, 76360, 'Barentin', 2, NULL, '2014-04-12 10:21:41', '2014-04-12 10:21:41'),
(25, 'La Bienvenue', '', 49.545906, 0.951961, 76360, 'Barentin', 2, NULL, '2014-04-12 10:21:42', '2014-04-12 10:21:42'),
(26, 'Abbé Cochet', '', 49.546051, 0.951881, 76360, 'Barentin', 2, NULL, '2014-04-12 10:21:42', '2014-04-12 10:21:42'),
(27, 'Gustave Flaubert', '', 49.547999, 0.954090, 76360, 'Barentin', 2, NULL, '2014-04-12 10:21:42', '2014-04-12 10:21:42'),
(28, 'Hector Malot', '', 49.548166, 0.953697, 76360, 'Barentin', 2, NULL, '2014-04-12 10:21:42', '2014-04-12 10:21:42'),
(29, 'Vincent Auriol', '', 49.554754, 0.936995, 76360, 'Barentin', 2, NULL, '2014-04-12 10:21:42', '2014-04-12 10:21:42'),
(30, 'Louis Leseigneur', '', 49.543610, 0.955368, 76360, 'Barentin', 2, NULL, '2014-04-12 10:21:42', '2014-04-12 10:21:42'),
(31, 'Panorama Rouen Est', '', 49.433541, 1.109992, 76240, 'Bonsecours', 3, NULL, '2014-04-12 10:21:43', '2014-04-12 10:21:43'),
(32, 'Panorama sur la vallée de la Varenne', '', 49.836809, 1.161858, 76590, 'Le Bois-Robert', 3, NULL, '2014-04-12 10:21:43', '2014-04-12 10:21:43'),
(33, 'Mairie Oissel', '', 49.339564, 1.089677, 76350, 'Oissel', 3, NULL, '2014-04-12 10:21:43', '2014-04-12 10:21:43'),
(34, 'EANA', '', 49.537290, 0.506444, 76210, 'Gruchet-le-Valasse', 4, NULL, '2014-04-12 10:21:43', '2014-04-12 10:21:43'),
(35, 'Jardin Jungle Karlostachys', '', 50.025696, 1.450854, 76260, 'Saint-Pierre-en-Val', 4, NULL, '2014-04-12 10:21:43', '2014-04-12 10:21:43'),
(36, 'Jardins Jean de Verrazane', '', 49.444487, 1.078928, 76000, 'Rouen', 5, NULL, '2014-04-12 10:21:43', '2014-04-12 10:21:43'),
(37, 'Square La Fontaine', '', 49.472160, 1.120043, 76230, 'Bois-Guillaume', 5, NULL, '2014-04-12 10:21:44', '2014-04-12 10:21:44'),
(38, 'Petit bois de Guibaré', '', 49.426595, 1.122915, 76240, 'Bonsecours', 5, NULL, '2014-04-12 10:21:44', '2014-04-12 10:21:44'),
(39, 'Parc De Galleville', '', 49.731069, 0.789287, 76560, 'Fultot', 5, NULL, '2014-04-12 10:21:44', '2014-04-12 10:21:44'),
(40, 'Parc Lacoste', '', 49.409997, 1.124163, 76920, 'Amfreville-la-Mi-Voie', 5, NULL, '2014-04-12 10:21:44', '2014-04-12 10:21:44'),
(41, 'Musée des impressionismes', '', 49.076348, 1.531326, 27620, 'Giverny', 1, NULL, '2014-04-12 10:21:44', '2014-04-12 10:21:44'),
(42, 'musée', '', 49.023786, 1.150843, 27000, 'Évreux', 1, NULL, '2014-04-12 10:21:44', '2014-04-12 10:21:44'),
(43, 'Musée Alphonse Georges Poulain', '', 49.094892, 1.485018, 27200, 'Vernon', 1, NULL, '2014-04-12 10:21:45', '2014-04-12 10:21:45'),
(44, 'Musée des beaux-arts de Bernay', '', 49.089088, 0.598649, 27300, 'Bernay', 1, NULL, '2014-04-12 10:21:45', '2014-04-12 10:21:45'),
(45, 'Fondation Claude Monet', '', 49.075349, 1.533788, 27620, 'Giverny', 1, NULL, '2014-04-12 10:21:45', '2014-04-12 10:21:45'),
(46, 'Jean De La Varende', '', 48.988501, 0.543813, 27270, 'Chamblac', 1, NULL, '2014-04-12 10:21:48', '2014-04-12 10:21:48'),
(47, 'Musée Nicolas Poussin', '', 49.245999, 1.419693, 27700, 'Les Andelys', 1, NULL, '2014-04-12 10:21:48', '2014-04-12 10:21:48'),
(48, 'Statue de Pierre Mendès-France', '', 49.159621, 1.338918, 27600, 'Gaillon', 2, NULL, '2014-04-12 10:21:48', '2014-04-12 10:21:48'),
(49, 'Panorama', '', 49.387616, 0.847957, 27310, 'Barneville-sur-Seine', 3, NULL, '2014-04-12 10:21:48', '2014-04-12 10:21:48'),
(50, 'Roche de l''Ermite', '', 49.251062, 1.386740, 27700, 'Les Andelys', 3, NULL, '2014-04-12 10:21:48', '2014-04-12 10:21:48'),
(51, 'Château de Hermite', '', 48.848974, 0.729958, 27250, 'Ambenay', 3, NULL, '2014-04-12 10:21:49', '2014-04-12 10:21:49'),
(52, 'Belvédère', '', 49.167296, 0.864643, 27890, 'La Neuville-du-Bosc', 3, NULL, '2014-04-12 10:21:49', '2014-04-12 10:21:49'),
(53, 'Table d''orientation de la cote des deux amants', '', 49.316412, 1.244380, 27590, 'Romilly-sur-Andelle', 3, NULL, '2014-04-12 10:21:49', '2014-04-12 10:21:49'),
(54, 'Bibliotheque yvecrique loisirs', '', 49.688111, 0.810148, 76560, 'Yvecrique', 6, NULL, '2014-04-12 10:21:51', '2014-04-12 10:21:51'),
(55, 'Mediatheque municipale "leopold sedar senghor"', '', 49.491740, 0.140149, 76600, 'Le+havre', 6, NULL, '2014-04-12 10:21:56', '2014-04-12 10:21:56'),
(56, 'Bibliotheque municipale "la post''strophe"', '', 49.632134, 0.270229, 76280, 'Criquetot+l''esneval', 6, NULL, '2014-04-12 10:21:58', '2014-04-12 10:21:58'),
(57, 'Bibliotheque municipale "daniel et victor banse"', '', 49.755722, 0.380527, 76400, 'Fecamp', 6, NULL, '2014-04-12 10:22:00', '2014-04-12 10:22:00');

-- --------------------------------------------------------

--
-- Structure de la table `places_counters`
--

CREATE TABLE IF NOT EXISTS `places_counters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `display` int(11) NOT NULL,
  `go` int(11) NOT NULL,
  `skip` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Contenu de la table `places_counters`
--

INSERT INTO `places_counters` (`id`, `display`, `go`, `skip`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 16, '2014-04-12 10:22:01', '2014-04-12 10:22:02'),
(2, 13, 17, 29, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(3, 22, 0, 44, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(4, 48, 16, 22, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(5, 37, 21, 41, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(6, 7, 15, 41, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(7, 37, 26, 43, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(8, 41, 22, 31, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(9, 0, 4, 46, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(10, 33, 2, 36, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(11, 35, 4, 44, '2014-04-12 10:22:02', '2014-04-12 10:22:02'),
(12, 0, 12, 21, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(13, 30, 26, 23, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(14, 23, 24, 50, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(15, 46, 16, 34, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(16, 36, 21, 8, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(17, 27, 13, 2, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(18, 19, 7, 39, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(19, 50, 7, 46, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(20, 46, 27, 0, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(21, 31, 18, 8, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(22, 24, 18, 29, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(23, 46, 6, 21, '2014-04-12 10:22:03', '2014-04-12 10:22:03'),
(24, 19, 20, 11, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(25, 19, 17, 39, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(26, 2, 9, 24, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(27, 10, 25, 45, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(28, 12, 6, 6, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(29, 1, 6, 19, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(30, 48, 3, 13, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(31, 48, 22, 43, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(32, 5, 6, 23, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(33, 34, 4, 34, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(34, 5, 15, 17, '2014-04-12 10:22:04', '2014-04-12 10:22:04'),
(35, 17, 27, 46, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(36, 6, 28, 10, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(37, 30, 4, 1, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(38, 25, 12, 12, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(39, 32, 13, 22, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(40, 0, 11, 27, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(41, 14, 9, 13, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(42, 7, 13, 24, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(43, 30, 3, 30, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(44, 13, 6, 6, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(45, 31, 17, 0, '2014-04-12 10:22:05', '2014-04-12 10:22:05'),
(46, 26, 21, 47, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(47, 37, 9, 3, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(48, 39, 24, 24, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(49, 0, 13, 45, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(50, 22, 13, 13, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(51, 50, 22, 30, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(52, 12, 26, 1, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(53, 37, 14, 6, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(54, 16, 22, 18, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(55, 22, 10, 47, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(56, 23, 26, 31, '2014-04-12 10:22:06', '2014-04-12 10:22:06'),
(57, 19, 18, 47, '2014-04-12 10:22:06', '2014-04-12 10:22:07'),
(58, 0, 0, 0, '2014-04-12 10:22:07', '2014-04-12 10:22:07');

-- --------------------------------------------------------

--
-- Structure de la table `times`
--

CREATE TABLE IF NOT EXISTS `times` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `minimum` int(11) NOT NULL,
  `maximum` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `times`
--

INSERT INTO `times` (`id`, `minimum`, `maximum`, `created_at`, `updated_at`) VALUES
(1, 7200, 14400, '2014-04-12 10:21:24', '2014-04-12 10:21:24'),
(2, 900, 3600, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(3, 0, 3600, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(4, 14400, 28800, '2014-04-12 10:21:25', '2014-04-12 10:21:25');

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idTime` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `category`, `value`, `idTime`, `created_at`, `updated_at`) VALUES
(1, 'tourism', 'museum', 1, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(2, 'tourism', 'artwork', 2, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(3, 'tourism', 'viewpoint', 2, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(4, 'tourism', 'theme_park', 3, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(5, 'leisure', 'park', 4, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(6, 'opendata', 'ExportOpenData', 1, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(7, 'opendata', 'lieuxdediffusion', 1, '2014-04-12 10:21:25', '2014-04-12 10:21:25'),
(8, 'opendata', 'ENSpoint', 1, '2014-04-12 10:21:25', '2014-04-12 10:21:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
