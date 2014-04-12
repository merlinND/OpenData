-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 12 Avril 2014 à 13:26
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

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
(8, 'catchphrases.typeLieuCulturel1', 'types', 2, '2014-04-12 10:22:07', '2014-04-12 10:22:07'),
(9, 'catchphrases.typeMuseum1', 'types', 25, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(10, 'catchphrases.typeMuseum2', 'types', 25, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(11, 'catchphrases.typeArtwork1', 'types', 26, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(12, 'catchphrases.typeViewpoint1', 'types', 27, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(13, 'catchphrases.typeThemePark1', 'types', 28, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(14, 'catchphrases.typeMediatheque1', 'types', 30, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(15, 'catchphrases.typeLieuCulturel1', 'types', 2, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(16, 'catchphrases.typeLieuCulturel1', 'types', 2, '2014-04-12 11:11:29', '2014-04-12 11:11:29');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=97 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id`, `url`, `idPlace`, `width`, `height`, `created_at`, `updated_at`) VALUES
(49, 'http://farm9.staticflickr.com/8463/8085414030_a4b29cb384_b.jpg', 115, 1024, 1024, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(50, 'http://farm8.staticflickr.com/7296/9828237966_31b729e80e_b.jpg', 116, 1024, 680, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(51, 'http://farm9.staticflickr.com/8055/8091368581_3e63eee948_b.jpg', 117, 1024, 1024, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(52, 'http://farm6.staticflickr.com/5047/5224622980_329afb50f7_b.jpg', 118, 800, 536, '2014-04-12 11:11:29', '2014-04-12 11:11:29'),
(53, 'http://farm3.staticflickr.com/2678/4430968125_fbe3fa554a_b.jpg', 119, 678, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(54, 'http://farm6.staticflickr.com/5013/5542293997_c8296c31e5_b.jpg', 120, 768, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(55, 'http://farm6.staticflickr.com/5304/5615732649_178d4b6559_b.jpg', 124, 1024, 677, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(56, 'http://farm4.staticflickr.com/3186/3024836725_147195ef60_b.jpg', 125, 1024, 680, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(57, 'http://farm4.staticflickr.com/3713/9010488577_c42f62976d_b.jpg', 126, 1024, 740, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(58, 'http://farm9.staticflickr.com/8329/8418130362_e7706230df_b.jpg', 127, 1024, 680, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(59, 'http://farm5.staticflickr.com/4116/4850680155_93cc83a6d0_b.jpg', 128, 683, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(60, 'http://farm4.staticflickr.com/3726/10298184263_994160dd0e_b.jpg', 129, 1024, 682, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(61, 'http://farm6.staticflickr.com/5332/9533873752_bb090c623c_b.jpg', 130, 768, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(62, 'http://farm4.staticflickr.com/3726/10298184263_994160dd0e_b.jpg', 131, 1024, 682, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(63, 'http://farm3.staticflickr.com/2883/9203958326_bfd382d416_b.jpg', 132, 1024, 683, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(64, 'http://farm5.staticflickr.com/4037/4538770301_75e73b6109_b.jpg', 133, 1024, 771, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(65, 'http://farm4.staticflickr.com/3831/9070299429_8191aeca4b_b.jpg', 134, 1024, 576, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(66, 'http://farm9.staticflickr.com/8045/8116645460_2d936720db_b.jpg', 135, 1024, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(67, 'http://farm6.staticflickr.com/5052/5722458235_93edc928dc_b.jpg', 136, 683, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(68, 'http://farm3.staticflickr.com/2506/3889513133_03b08f7915_b.jpg', 137, 1024, 731, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(69, 'http://farm6.staticflickr.com/5520/10582195373_810bba46c9_b.jpg', 138, 1024, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(70, 'http://farm9.staticflickr.com/8349/8163278871_1872ebcb66_b.jpg', 139, 683, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(71, 'http://farm9.staticflickr.com/8349/8163278871_1872ebcb66_b.jpg', 140, 683, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(72, 'http://farm8.staticflickr.com/7107/8163267685_24e9ed6e63_b.jpg', 141, 683, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(73, 'http://farm9.staticflickr.com/8202/8163292796_01dcb8774b_b.jpg', 142, 683, 1024, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(74, 'http://farm8.staticflickr.com/7063/6813891922_4b2f6c2ce8_b.jpg', 143, 1024, 683, '2014-04-12 11:11:30', '2014-04-12 11:11:30'),
(75, 'http://farm9.staticflickr.com/8210/8163263339_3022d604c9_b.jpg', 144, 683, 1024, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(76, 'http://farm8.staticflickr.com/7358/9546738259_d5889d193f_b.jpg', 145, 1024, 683, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(77, 'http://farm6.staticflickr.com/5470/9553601038_e080c57394_b.jpg', 148, 1024, 768, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(78, 'http://farm4.staticflickr.com/3335/3215759125_fb8b975843_b.jpg', 150, 1024, 671, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(79, 'http://farm8.staticflickr.com/7154/6702968203_1f06bf1745_b.jpg', 151, 1024, 648, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(80, 'http://farm9.staticflickr.com/8326/8116558082_d1682ae1c5_b.jpg', 152, 800, 600, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(81, 'http://farm6.staticflickr.com/5489/9568733537_4294467fe1_b.jpg', 153, 1024, 333, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(82, 'http://farm3.staticflickr.com/2239/5796231314_c3cf303dfc_b.jpg', 154, 1024, 297, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(83, 'http://farm5.staticflickr.com/4030/4469786989_5f46db901b_b.jpg', 156, 1024, 683, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(84, 'http://farm2.staticflickr.com/1303/4708964920_cb97b2f2be_b.jpg', 157, 1024, 768, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(85, 'http://farm2.staticflickr.com/1336/5133375822_0bee9b828e_b.jpg', 158, 1024, 681, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(86, 'http://farm8.staticflickr.com/7265/6931742126_3b1df92e7a_b.jpg', 159, 1024, 683, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(87, 'http://farm3.staticflickr.com/2811/11357663653_4f8a7afa0b_b.jpg', 160, 1024, 685, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(88, 'http://farm7.staticflickr.com/6020/5923045807_b650efbc17_b.jpg', 161, 1024, 683, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(89, 'http://farm8.staticflickr.com/7039/6985306433_722780a154_b.jpg', 162, 1021, 1024, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(90, 'http://farm5.staticflickr.com/4084/4986575750_c23328bd96_b.jpg', 163, 1024, 765, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(91, 'http://farm6.staticflickr.com/5529/9418645356_ee9a8aec27_b.jpg', 164, 1024, 768, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(92, 'http://farm7.staticflickr.com/6148/5985013761_194244e2ab_b.jpg', 166, 765, 1024, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(93, 'http://farm8.staticflickr.com/7416/9188861937_95c3abcd9a_b.jpg', 167, 1024, 680, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(94, 'http://farm3.staticflickr.com/2843/9668164871_795c8deba0_b.jpg', 168, 1024, 765, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(95, 'http://farm5.staticflickr.com/4037/4539363310_6e3373e0fc_b.jpg', 170, 1024, 771, '2014-04-12 11:11:31', '2014-04-12 11:11:31'),
(96, 'http://farm9.staticflickr.com/8223/8342879660_1259d911af_b.jpg', 171, 765, 1024, '2014-04-12 11:11:31', '2014-04-12 11:11:31');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=172 ;

--
-- Contenu de la table `places`
--

INSERT INTO `places` (`id`, `name`, `description`, `latitude`, `longitude`, `zipcode`, `city`, `idType`, `idTime`, `created_at`, `updated_at`) VALUES
(126, 'Musée des Traditions Vérrières', 'Ce musée retrace l’histoire du verre, de ses origines en Egypte il y a quelque 7000 ans jusqu’aux machines automatiques de nos jours.\r\n \r\nLa Vallée de la Bresle réalise 80% de la production mondiale des flacons de haute parfumerie… Ceci méritait qu’on fasse connaître la « Glass Valley ».', 50.054805, 1.427940, 80880, 'Oust-Marest', 25, NULL, '2014-04-12 11:11:01', '2014-04-12 11:11:01'),
(128, 'Musée Mathon-Durand', 'Maison bourgeoise du XVIe siècle. Cinq salles consacrées aux arts et traditions populaires du Pays de Bray. Bible manuscrite du XIIIe siècle, chasubles, mobilier, faïences, poteries, verrerie, meubles, travaux des champs et fabrication du fromage de Neufchâtel. Ateliers de bourrelier, bonnetier, sabotier.', 49.731122, 1.439293, 76270, 'Neufchâtel-en-Bray', 25, NULL, '2014-04-12 11:11:02', '2014-04-12 11:11:02'),
(132, 'Musée Industriel de la Corderie Vallois', 'Le Musée industriel de la corderie Vallois est un musée situé dans une ancienne corderie du xixe siècle de la vallée du Cailly à Notre-Dame-de-Bondeville (Seine-Maritime). Il a le label musée de France.\r\n\r\nLe fondateur de l''usine, Jules Vallois, qui était cordier à Saint-Martin-du-Vivier, dut changer d''usine à la suite du captage du Robec, le cours d''eau local, pour alimenter la ville de Rouen. D''abord locataire de la propriété Rondeau, il en devient propriétaire. En 1880, la filature disparaît, remplacée par une corderie mécanique. Jules Vallois installe dans le bâtiment des machines anglaises et françaises. Ces anciennes machines sont actionnées encore aujourd''hui par une roue hydraulique.', 49.495107, 1.047977, 76960, 'Notre-Dame-de-Bondeville', 25, NULL, '2014-04-12 11:11:02', '2014-04-12 11:11:02'),
(136, 'Sur la trace des Vikings', 'Sur la trace des vikings est une signature sans signature visible. Georges Saulterre, son auteur, proroge ainsi la tradition des maîtres bâtisseurs des cathédrales. (Alexandre Broniarski). Sur la trace des vikings n''est pas à proprement parler une œuvre abstraite, mais plutôt non figurative. Elle a valeur de signe, elle est donc porteuse de sens. Mais sa signification n''est pas enfermée, réduite à un discours définitif, figée à jamais.', 49.321272, 1.101764, 76410, 'Tourville-la-Rivière', 26, NULL, '2014-04-12 11:11:03', '2014-04-12 11:11:03');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=200 ;

--
-- Contenu de la table `places_counters`
--

INSERT INTO `places_counters` (`id`, `display`, `go`, `skip`, `created_at`, `updated_at`) VALUES
(126, 0, 0, 0, '2014-04-12 11:11:25', '2014-04-12 11:11:25'),
(128, 0, 0, 0, '2014-04-12 11:11:25', '2014-04-12 11:11:25'),
(132, 0, 0, 0, '2014-04-12 11:11:25', '2014-04-12 11:11:25'),
(136, 0, 0, 0, '2014-04-12 11:11:26', '2014-04-12 11:11:26');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `category`, `value`, `idTime`, `created_at`, `updated_at`) VALUES
(25, 'tourism', 'museum', 1, '2014-04-12 11:10:46', '2014-04-12 11:10:46'),
(26, 'tourism', 'artwork', 2, '2014-04-12 11:10:46', '2014-04-12 11:10:46'),
(27, 'tourism', 'viewpoint', 2, '2014-04-12 11:10:46', '2014-04-12 11:10:46'),
(28, 'tourism', 'theme_park', 3, '2014-04-12 11:10:46', '2014-04-12 11:10:46'),
(29, 'leisure', 'park', 4, '2014-04-12 11:10:46', '2014-04-12 11:10:46'),
(30, 'opendata', 'ExportOpenData', 1, '2014-04-12 11:10:46', '2014-04-12 11:10:46'),
(31, 'opendata', 'lieuxdediffusion', 1, '2014-04-12 11:10:46', '2014-04-12 11:10:46'),
(32, 'opendata', 'ENSpoint', 1, '2014-04-12 11:10:46', '2014-04-12 11:10:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
