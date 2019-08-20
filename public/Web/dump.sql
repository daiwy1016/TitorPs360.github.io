/*
Navicat MySQL Data Transfer

Source Server         : 192.168.4.13
Source Server Version : 50717
Source Host           : 192.168.4.13:3306
Source Database       : manga2

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2019-08-20 18:06:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activations
-- ----------------------------
DROP TABLE IF EXISTS `activations`;
CREATE TABLE `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activations
-- ----------------------------
INSERT INTO `activations` VALUES ('1', '1', 'xreOuWRGvXZJmCAtb3fgqc0az9xwbU3Y', '1', '2019-08-20 06:56:00', '2019-08-20 06:56:00', null);

-- ----------------------------
-- Table structure for ad
-- ----------------------------
DROP TABLE IF EXISTS `ad`;
CREATE TABLE `ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bloc_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad
-- ----------------------------

-- ----------------------------
-- Table structure for ad_placement
-- ----------------------------
DROP TABLE IF EXISTS `ad_placement`;
CREATE TABLE `ad_placement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ad_id` int(10) unsigned NOT NULL,
  `placement_id` int(10) unsigned NOT NULL,
  `placement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ad_placement
-- ----------------------------

-- ----------------------------
-- Table structure for author
-- ----------------------------
DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of author
-- ----------------------------

-- ----------------------------
-- Table structure for author_manga
-- ----------------------------
DROP TABLE IF EXISTS `author_manga`;
CREATE TABLE `author_manga` (
  `manga_id` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`manga_id`,`author_id`,`type`),
  KEY `author_manga_author_id_foreign` (`author_id`),
  CONSTRAINT `author_manga_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE,
  CONSTRAINT `author_manga_manga_id_foreign` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of author_manga
-- ----------------------------

-- ----------------------------
-- Table structure for bookmarks
-- ----------------------------
DROP TABLE IF EXISTS `bookmarks`;
CREATE TABLE `bookmarks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manga_id` int(10) unsigned NOT NULL,
  `chapter_id` int(10) unsigned DEFAULT NULL,
  `page_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bookmarks_manga_id_foreign` (`manga_id`),
  CONSTRAINT `bookmarks_manga_id_foreign` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bookmarks
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '连载漫画', '连载', '2019-08-20 09:29:12', '2019-08-20 09:29:12');
INSERT INTO `category` VALUES ('2', 'action', 'Action', '2019-08-20 09:45:04', null);
INSERT INTO `category` VALUES ('3', 'adventure', 'Adventure', '2019-08-20 09:45:04', null);
INSERT INTO `category` VALUES ('4', 'comedy', 'Comedy', '2019-08-20 09:45:04', null);
INSERT INTO `category` VALUES ('5', 'doujinshi', 'Doujinshi', '2019-08-20 09:45:04', null);
INSERT INTO `category` VALUES ('6', 'drama', 'Drama', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('7', 'ecchi', 'Ecchi', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('8', 'fantasy', 'Fantasy', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('9', 'gender-bender', 'Gender Bender', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('10', 'harem', 'Harem', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('11', 'historical', 'Historical', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('12', 'horror', 'Horror', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('13', 'josei', 'Josei', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('14', 'martial-arts', 'Martial Arts', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('15', 'mature', 'Mature', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('16', 'mecha', 'Mecha', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('17', 'mystery', 'Mystery', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('18', 'one-shot', 'One Shot', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('19', 'psychological', 'Psychological', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('20', 'romance', 'Romance', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('21', 'school-life', 'School Life', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('22', 'sci-fi', 'Sci-fi', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('23', 'seinen', 'Seinen', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('24', 'shoujo', 'Shoujo', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('25', 'shoujo-ai', 'Shoujo Ai', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('26', 'shounen', 'Shounen', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('27', 'shounen-ai', 'Shounen Ai', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('28', 'slice-of-life', 'Slice of Life', '2019-08-20 09:45:05', null);
INSERT INTO `category` VALUES ('29', 'sports', 'Sports', '2019-08-20 09:45:06', null);
INSERT INTO `category` VALUES ('30', 'supernatural', 'Supernatural', '2019-08-20 09:45:06', null);
INSERT INTO `category` VALUES ('31', 'tragedy', 'Tragedy', '2019-08-20 09:45:06', null);
INSERT INTO `category` VALUES ('32', 'yaoi', 'Yaoi', '2019-08-20 09:45:06', null);
INSERT INTO `category` VALUES ('33', 'yuri', 'Yuri', '2019-08-20 09:45:06', null);

-- ----------------------------
-- Table structure for category_manga
-- ----------------------------
DROP TABLE IF EXISTS `category_manga`;
CREATE TABLE `category_manga` (
  `manga_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`manga_id`,`category_id`),
  KEY `category_manga_category_id_foreign` (`category_id`),
  CONSTRAINT `category_manga_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  CONSTRAINT `category_manga_manga_id_foreign` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category_manga
-- ----------------------------
INSERT INTO `category_manga` VALUES ('1', '1');
INSERT INTO `category_manga` VALUES ('2', '1');
INSERT INTO `category_manga` VALUES ('3', '1');
INSERT INTO `category_manga` VALUES ('4', '1');
INSERT INTO `category_manga` VALUES ('1', '2');
INSERT INTO `category_manga` VALUES ('2', '2');
INSERT INTO `category_manga` VALUES ('3', '2');
INSERT INTO `category_manga` VALUES ('4', '2');

-- ----------------------------
-- Table structure for chapter
-- ----------------------------
DROP TABLE IF EXISTS `chapter`;
CREATE TABLE `chapter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `volume` int(11) DEFAULT NULL,
  `manga_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chapter_manga_id_foreign` (`manga_id`),
  KEY `chapter_user_id_foreign` (`user_id`),
  CONSTRAINT `chapter_manga_id_foreign` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`id`),
  CONSTRAINT `chapter_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chapter
-- ----------------------------

-- ----------------------------
-- Table structure for comictype
-- ----------------------------
DROP TABLE IF EXISTS `comictype`;
CREATE TABLE `comictype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comictype
-- ----------------------------

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8_unicode_ci,
  `post_id` int(10) unsigned DEFAULT NULL,
  `post_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `parent_comment` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_parent_comment_foreign` (`parent_comment`),
  CONSTRAINT `comments_parent_comment_foreign` FOREIGN KEY (`parent_comment`) REFERENCES `comments` (`id`) ON DELETE SET NULL,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for item_ratings
-- ----------------------------
DROP TABLE IF EXISTS `item_ratings`;
CREATE TABLE `item_ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `score` tinyint(4) NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_ratings_item_id_index` (`item_id`),
  KEY `item_ratings_ip_address_index` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of item_ratings
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for manga
-- ----------------------------
DROP TABLE IF EXISTS `manga`;
CREATE TABLE `manga` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otherNames` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `releaseDate` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci,
  `cover` tinyint(1) DEFAULT NULL,
  `hot` tinyint(1) DEFAULT NULL,
  `caution` tinyint(1) DEFAULT '0',
  `views` int(11) DEFAULT '0',
  `rate` int(11) DEFAULT '0',
  `bulkStatus` text COLLATE utf8_unicode_ci,
  `type_id` int(10) unsigned DEFAULT NULL,
  `status_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `manga_slug_index` (`slug`),
  KEY `manga_type_id_foreign` (`type_id`),
  KEY `manga_status_id_foreign` (`status_id`),
  CONSTRAINT `manga_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `manga_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `comictype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of manga
-- ----------------------------
INSERT INTO `manga` VALUES ('1', '动作', '我的病毒女友', '我的女友是丧尸', '2019-08-20', '', null, null, '0', '0', '0', null, null, '1', '1', '2019-08-20 10:00:29', '2019-08-20 10:00:29');
INSERT INTO `manga` VALUES ('2', 'bingdunvyou', '我的病毒女友', '我的女友是丧尸', '2019-08-20', '', null, null, '0', '0', '0', null, null, '1', '1', '2019-08-20 10:01:33', '2019-08-20 10:01:33');
INSERT INTO `manga` VALUES ('3', '连载漫画', '我的病毒女友', '我的女友是丧尸', '2019-08-20', '', null, null, '0', '0', '0', null, null, '1', '1', '2019-08-20 10:03:59', '2019-08-20 10:03:59');
INSERT INTO `manga` VALUES ('4', 'okbang', '我的病毒女友', '我的女友是丧尸', '2019-08-20', '', null, null, '0', '0', '0', null, null, '1', '1', '2019-08-20 10:04:55', '2019-08-20 10:04:55');

-- ----------------------------
-- Table structure for manga_tag
-- ----------------------------
DROP TABLE IF EXISTS `manga_tag`;
CREATE TABLE `manga_tag` (
  `manga_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`manga_id`,`tag_id`),
  KEY `manga_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `manga_tag_manga_id_foreign` FOREIGN KEY (`manga_id`) REFERENCES `manga` (`id`) ON DELETE CASCADE,
  CONSTRAINT `manga_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of manga_tag
-- ----------------------------

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO `menus` VALUES ('1', 'Main', 'main', '1', '2019-08-20 06:53:41', null);
INSERT INTO `menus` VALUES ('2', 'Footer', 'footer', '1', '2019-08-20 06:53:41', null);
INSERT INTO `menus` VALUES ('3', 'Main with Icons', 'main_icons', '1', '2019-08-20 06:53:41', null);
INSERT INTO `menus` VALUES ('4', 'Main', 'main', '1', '2019-08-20 06:54:52', null);
INSERT INTO `menus` VALUES ('5', 'Footer', 'footer', '1', '2019-08-20 06:54:52', null);
INSERT INTO `menus` VALUES ('6', 'Main with Icons', 'main_icons', '1', '2019-08-20 06:54:52', null);

-- ----------------------------
-- Table structure for menu_nodes
-- ----------------------------
DROP TABLE IF EXISTS `menu_nodes`;
CREATE TABLE `menu_nodes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `related_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_font` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `css_class` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_nodes_menu_id_foreign` (`menu_id`),
  KEY `menu_nodes_parent_id_foreign` (`parent_id`),
  CONSTRAINT `menu_nodes_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  CONSTRAINT `menu_nodes_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menu_nodes` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_nodes
-- ----------------------------
INSERT INTO `menu_nodes` VALUES ('1', null, 'route', 'front.index', 'Home', null, null, null, '0', null, '1', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('2', null, 'route', 'front.manga.list', 'Manga List', null, null, null, '1', null, '1', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('3', null, 'route', 'front.manga.latestRelease', 'Latest release', null, null, null, '2', null, '1', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('4', null, 'route', 'front.manga.random', 'Random Manga', null, null, null, '3', null, '1', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('5', null, 'route', 'front.index', 'Home', null, null, null, '0', null, '2', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('6', null, 'route', 'front.manga.list', 'Manga List', null, null, null, '1', null, '2', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('7', null, 'route', 'front.manga.latestRelease', 'Latest release', null, null, null, '2', null, '2', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('8', null, 'route', 'front.index', 'Home', 'fa fa-home', null, null, '0', null, '3', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('9', null, 'route', 'front.manga.list', 'Manga List', 'fa fa-th-large', null, null, '1', null, '3', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('10', null, 'route', 'front.manga.latestRelease', 'Latest release', 'fa fa-list', null, null, '2', null, '3', '2019-08-20 06:53:42', null);
INSERT INTO `menu_nodes` VALUES ('11', null, 'route', 'front.manga.random', 'Random Manga', 'fa fa-random', null, null, '3', null, '3', '2019-08-20 06:53:42', null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2017_11_15_211247_create_ads_tables', '1');
INSERT INTO `migrations` VALUES ('2', '2017_11_15_203242_create_base_tables', '2');
INSERT INTO `migrations` VALUES ('3', '2017_11_27_231656_create_jobs_table', '2');
INSERT INTO `migrations` VALUES ('4', '2017_11_27_231954_create_failed_jobs_table', '2');
INSERT INTO `migrations` VALUES ('5', '2014_07_02_230147_create_user_tables', '3');
INSERT INTO `migrations` VALUES ('6', '2017_11_17_154243_create_notification_tables', '4');
INSERT INTO `migrations` VALUES ('7', '2017_11_15_223242_create_blog_tables', '5');
INSERT INTO `migrations` VALUES ('8', '2017_11_15_213242_create_manga_tables', '6');
INSERT INTO `migrations` VALUES ('9', '2017_11_15_223242_create_myspace_tables', '7');

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`),
  CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for notif_settings
-- ----------------------------
DROP TABLE IF EXISTS `notif_settings`;
CREATE TABLE `notif_settings` (
  `user_id` int(10) unsigned NOT NULL,
  `manga` tinyint(4) DEFAULT NULL,
  `post` tinyint(4) DEFAULT NULL,
  `chapter` tinyint(4) DEFAULT NULL,
  UNIQUE KEY `notif_settings_user_id_unique` (`user_id`),
  CONSTRAINT `notif_settings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of notif_settings
-- ----------------------------

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `options_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES ('1', 'site.name', '漫漫污友', '2019-08-20 06:53:41', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('2', 'site.slogan', 'Read Manga Online for Free', '2019-08-20 06:53:41', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('3', 'site.description', 'Read your favorite manga scans and scanlations online at my Manga Reader. Read Manga Online, Absolutely Free and Updated Daily.', '2019-08-20 06:53:41', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('4', 'site.theme', 'default.united', '2019-08-20 06:53:41', null);
INSERT INTO `options` VALUES ('5', 'site.lang', 'en', '2019-08-20 06:53:41', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('6', 'site.subscription', '{\"subscribe\":\"false\",\"admin_confirm\":\"false\",\"email_confirm\":\"false\",\"default_role\":\"3\",\"address\":\"admin@mydomain.com\",\"name\":\"admin\",\"mailing\":\"sendmail\",\"host\":\"\",\"port\":\"\",\"username\":\"\",\"password\":\"\"}', '2019-08-20 06:53:41', null);
INSERT INTO `options` VALUES ('7', 'site.orientation', 'ltr', '2019-08-20 06:53:41', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('8', 'site.comment', '{\"disqusUrl\":\"\"}', '2019-08-20 06:53:41', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('9', 'site.pagination', '{\"homepage\":\"40\",\"mangalist\":\"20\",\"latest_release\":\"40\",\"news_homepage\":\"10\",\"newslist\":\"15\"}', '2019-08-20 06:53:41', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('10', 'site.widgets', '{\"0\":{\"type\":\"site_description\"},\"1\":{\"type\":\"top_rates\",\"title\":\"Top Manga\",\"number\":\"10\"}}', '2019-08-20 06:53:41', null);
INSERT INTO `options` VALUES ('11', 'site.cache', '{\"reader\":\"120\"}', '2019-08-20 06:53:41', null);
INSERT INTO `options` VALUES ('12', 'site.gdrive', '', '2019-08-20 06:53:41', null);
INSERT INTO `options` VALUES ('13', 'site.captcha', '{\"secret_key\":\"\",\"site_key\":\"\"}', '2019-08-20 06:53:41', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('14', 'site.theme.options', '{\"reader_theme\":\"darkly\",\"main_menu\":\"1\",\"footer_menu\":\"2\",\"boxed\":\"1\",\"logo\":null,\"icon\":null}', '2019-08-20 06:53:41', null);
INSERT INTO `options` VALUES ('15', 'manga.options', '', '2019-08-20 06:53:42', null);
INSERT INTO `options` VALUES ('16', 'reader.type', 'ppp', '2019-08-20 06:53:42', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('17', 'reader.mode', 'noreload', '2019-08-20 06:53:42', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('18', 'storage.type', 'server', '2019-08-20 06:53:42', '2019-08-20 09:26:46');
INSERT INTO `options` VALUES ('19', 'seo.keywords', 'manga,read manga,read manga online,manga online,online manga,manga reader, manga scans,english manga,naruto manga,bleach manga, one piece manga,manga chapter,read free manga,free manga,read free manga online,manga viewer', '2019-08-20 06:53:42', null);
INSERT INTO `options` VALUES ('20', 'seo.google.analytics', '', '2019-08-20 06:53:42', null);
INSERT INTO `options` VALUES ('21', 'seo.google.webmaster', '', '2019-08-20 06:53:42', null);
INSERT INTO `options` VALUES ('22', 'seo.title', 'My Manga Reader - Read Manga Online for Free', '2019-08-20 06:53:42', null);
INSERT INTO `options` VALUES ('23', 'seo.description', 'Read your favorite manga scans and scanlations online at my Manga Reader. Read Manga Online, Absolutely Free and Updated Daily.', '2019-08-20 06:53:42', null);
INSERT INTO `options` VALUES ('24', 'seo.advanced', '{\"info\":{\"title\":{\"value\":\"%manga_name% by %manga_author% - Info Page\"},\"description\":{\"value\":\"%manga_description%\"},\"keywords\":{\"value\":\"%manga_name%, %manga_author%, %manga_categories%\"}},\"reader\":{\"title\":{\"value\":\"%manga_name% Chapter %chapter_number% - Page %page_number%\"},\"description\":{\"value\":\"%manga_name% Chapter %chapter_number%:  %chapter_title% - Page %page_number%\"},\"keywords\":{\"value\":\"%manga_name%, %manga_author%, %manga_categories%\"}},\"news\":{\"title\":{\"value\":\"%post_title%\"},\"description\":{\"value\":\"%post_content%\"},\"keywords\":{\"value\":\"%post_keywords%\"}},\"mangalist\":{\"title\":{\"global\":\"1\",\"value\":\"\"},\"description\":{\"global\":\"1\",\"value\":\"\"},\"keywords\":{\"global\":\"1\",\"value\":\"\"}},\"latestrelease\":{\"title\":{\"global\":\"1\",\"value\":\"\"},\"description\":{\"global\":\"1\",\"value\":\"\"},\"keywords\":{\"global\":\"1\",\"value\":\"\"}},\"latestnews\":{\"title\":{\"global\":\"1\",\"value\":\"\"},\"description\":{\"global\":\"1\",\"value\":\"\"},\"keywords\":{\"global\":\"1\",\"value\":\"\"}}}', '2019-08-20 06:53:42', null);

-- ----------------------------
-- Table structure for page
-- ----------------------------
DROP TABLE IF EXISTS `page`;
CREATE TABLE `page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `external` tinyint(1) NOT NULL DEFAULT '0',
  `chapter_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_chapter_id_foreign` (`chapter_id`),
  CONSTRAINT `page_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapter` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of page
-- ----------------------------

-- ----------------------------
-- Table structure for page_cms
-- ----------------------------
DROP TABLE IF EXISTS `page_cms`;
CREATE TABLE `page_cms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_cms_user_id_foreign` (`user_id`),
  CONSTRAINT `page_cms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of page_cms
-- ----------------------------

-- ----------------------------
-- Table structure for persistences
-- ----------------------------
DROP TABLE IF EXISTS `persistences`;
CREATE TABLE `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of persistences
-- ----------------------------
INSERT INTO `persistences` VALUES ('1', '1', 'qReDBvaIJIiDY7jvlECMEQW7PZbI3lXl', '2019-08-20 06:57:33', '2019-08-20 06:57:33');
INSERT INTO `persistences` VALUES ('2', '1', 'HsTpYpUYUBFMEBsxUW8tXYGb47qv8Y4b', '2019-08-20 08:36:25', '2019-08-20 08:36:25');

-- ----------------------------
-- Table structure for placement
-- ----------------------------
DROP TABLE IF EXISTS `placement`;
CREATE TABLE `placement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of placement
-- ----------------------------
INSERT INTO `placement` VALUES ('1', 'READER', '2019-08-20 07:05:49', null);
INSERT INTO `placement` VALUES ('2', 'HOMEPAGE', '2019-08-20 07:05:49', null);
INSERT INTO `placement` VALUES ('3', 'MANGAINFO', '2019-08-20 07:05:49', null);

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `manga_id` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for reminders
-- ----------------------------
DROP TABLE IF EXISTS `reminders`;
CREATE TABLE `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of reminders
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', 'Administrator', '{\"dashboard.index\":true,\"settings.edit_general\":true,\"settings.edit_themes\":true,\"blog.manage_posts\":true,\"blog.manage_pages\":true,\"gdrive.manage_gdrive\":true,\"manga.manga.index\":true,\"manga.manga.create\":true,\"manga.manga.edit\":true,\"manga.manga.destroy\":true,\"manga.manga.hot\":true,\"manga.chapter.index\":true,\"manga.chapter.create\":true,\"manga.chapter.edit\":true,\"manga.chapter.destroy\":true,\"manga.chapter.scrap\":true,\"taxonomies.manage_categories\":true,\"taxonomies.manage_tags\":true,\"taxonomies.manage_types\":true,\"taxonomies.manage_authors\":true,\"user.users.index\":true,\"user.users.create\":true,\"user.users.edit\":true,\"user.users.destroy\":true,\"user.roles.index\":true,\"user.roles.create\":true,\"user.roles.edit\":true,\"user.roles.destroy\":true,\"user.profile\":true}', '2019-08-20 06:56:00', null);
INSERT INTO `roles` VALUES ('2', 'contributor', 'Contributor', '{\"settings.edit_general\":false,\"settings.edit_themes\":false,\"blog.manage_posts\":false,\"blog.manage_pages\":false,\"gdrive.manage_gdrive\":false,\"manga.manga.index\":true,\"manga.manga.create\":true,\"manga.manga.edit\":true,\"manga.manga.destroy\":true,\"manga.manga.hot\":false,\"manga.chapter.index\":true,\"manga.chapter.create\":true,\"manga.chapter.edit\":true,\"manga.chapter.destroy\":true,\"manga.chapter.scrap\":false,\"taxonomies.manage_categories\":false,\"taxonomies.manage_tags\":false,\"taxonomies.manage_types\":false,\"taxonomies.manage_authors\":false,\"user.users.index\":false,\"user.users.create\":false,\"user.users.edit\":false,\"user.users.destroy\":false,\"user.roles.index\":false,\"user.roles.create\":false,\"user.roles.edit\":false,\"user.roles.destroy\":false,\"user.profile\":true}', '2019-08-20 06:56:00', null);
INSERT INTO `roles` VALUES ('3', 'guest', 'Guest', '{\"settings.edit_general\":false,\"settings.edit_themes\":false,\"blog.manage_posts\":false,\"blog.manage_pages\":false,\"gdrive.manage_gdrive\":false,\"manga.manga.index\":false,\"manga.manga.create\":false,\"manga.manga.edit\":false,\"manga.manga.destroy\":false,\"manga.manga.hot\":false,\"manga.chapter.index\":false,\"manga.chapter.create\":false,\"manga.chapter.edit\":false,\"manga.chapter.destroy\":false,\"manga.chapter.scrap\":false,\"taxonomies.manage_categories\":false,\"taxonomies.manage_tags\":false,\"taxonomies.manage_types\":false,\"taxonomies.manage_authors\":false,\"user.users.index\":false,\"user.users.create\":false,\"user.users.edit\":false,\"user.users.destroy\":false,\"user.roles.index\":false,\"user.roles.create\":false,\"user.roles.edit\":false,\"user.roles.destroy\":false,\"user.profile\":true}', '2019-08-20 06:56:00', null);

-- ----------------------------
-- Table structure for role_users
-- ----------------------------
DROP TABLE IF EXISTS `role_users`;
CREATE TABLE `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_users
-- ----------------------------
INSERT INTO `role_users` VALUES ('1', '1', '2019-08-20 06:56:00', null);

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('1', '连载中', '2019-08-20 09:45:04', null);
INSERT INTO `status` VALUES ('2', '完结', '2019-08-20 09:45:04', null);

-- ----------------------------
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tag
-- ----------------------------

-- ----------------------------
-- Table structure for throttle
-- ----------------------------
DROP TABLE IF EXISTS `throttle`;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of throttle
-- ----------------------------
INSERT INTO `throttle` VALUES ('1', null, 'global', null, '2019-08-20 06:55:08', '2019-08-20 06:55:08');
INSERT INTO `throttle` VALUES ('2', null, 'ip', '127.0.0.1', '2019-08-20 06:55:08', '2019-08-20 06:55:08');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notify` tinyint(1) DEFAULT '0',
  `avatar` tinyint(1) DEFAULT '0',
  `permissions` text COLLATE utf8_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Administrator', 'admin', 'admin@yourdomain.com', '$2y$10$68L/jA405KNKD5Au7PIqiuNfssuwEfG1hlpfaRqG7p5ZwNgGIZ1NS', '0', '0', null, '2019-08-20 08:36:25', '2019-08-20 06:56:00', '2019-08-20 08:36:25');
