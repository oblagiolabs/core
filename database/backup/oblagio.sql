/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : oblagio

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2015-12-26 14:40:24
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `actions`
-- ----------------------------
DROP TABLE IF EXISTS `actions`;
CREATE TABLE `actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `actions_action_index` (`action`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of actions
-- ----------------------------
INSERT INTO actions VALUES ('2', 'create', 'Create', '2015-12-23 09:11:45', '2015-12-23 09:19:02');
INSERT INTO actions VALUES ('3', 'update', 'Update', '2015-12-23 09:17:24', '2015-12-23 09:17:24');
INSERT INTO actions VALUES ('4', 'delete', 'Delete', '2015-12-23 09:21:12', '2015-12-23 09:21:12');
INSERT INTO actions VALUES ('5', 'view', 'View', '2015-12-23 09:21:24', '2015-12-23 09:21:24');
INSERT INTO actions VALUES ('6', 'publish', 'Publish and Un Publish', '2015-12-23 09:21:40', '2015-12-23 09:21:40');
INSERT INTO actions VALUES ('7', 'index', 'Index', '2015-12-23 09:23:33', '2015-12-23 09:23:33');

-- ----------------------------
-- Table structure for `cruds`
-- ----------------------------
DROP TABLE IF EXISTS `cruds`;
CREATE TABLE `cruds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cruds
-- ----------------------------
INSERT INTO cruds VALUES ('1', 'Janet Morissette', 'Deckow Inc', '056 Deckow Plain Suite 565\nWest Lesley, KS 73394', '2015-12-21 08:31:32', '2015-12-21 08:31:32');
INSERT INTO cruds VALUES ('2', 'Dr. Marc Jast III', 'Carroll Inc', '79082 Waldo Cliff\nEast Stone, WV 41502-2637', '2015-12-21 08:32:05', '2015-12-21 08:32:05');
INSERT INTO cruds VALUES ('3', 'Prof. Giovanni Hartmann MD', 'Kulas-Fritsch', '844 Santina Greens\nLake Eribertoton, FL 93211-9209', '2015-12-21 08:32:50', '2015-12-21 08:32:50');
INSERT INTO cruds VALUES ('4', 'Ivah Casper DDS', 'Murazik, Waters and Kuphal', '593 Harris Streets\nSouth Fionachester, CA 00701-8932', '2015-12-21 08:32:50', '2015-12-21 08:32:50');
INSERT INTO cruds VALUES ('5', 'Bert Gusikowski', 'Robel, Bogisich and Hamill', '59576 Beahan Turnpike\nKellieside, NH 02062', '2015-12-21 08:32:51', '2015-12-21 08:32:51');
INSERT INTO cruds VALUES ('6', 'Amira Adams', 'Kuvalis, Stracke and Rice', '314 Rogahn Mall\nOmarichester, OH 37146-8216', '2015-12-21 08:32:52', '2015-12-21 08:32:52');
INSERT INTO cruds VALUES ('7', 'Prof. Ulices Bogisich', 'Ankunding-Abshire', '6229 Bradtke Views\nNew Micaela, PA 28992', '2015-12-21 08:32:53', '2015-12-21 08:32:53');
INSERT INTO cruds VALUES ('8', 'Prof. Robb Barrows II', 'Miller, Considine and Runolfsson', '153 Koss Fork Suite 967\nLake Amparo, NV 24252', '2015-12-21 08:32:53', '2015-12-21 08:32:53');
INSERT INTO cruds VALUES ('9', 'Savanna Kutch', 'Ryan, Dare and Reilly', '34449 Bartoletti Loaf Apt. 845\nNew Tad, CA 97414-2889', '2015-12-21 08:32:54', '2015-12-21 08:32:54');
INSERT INTO cruds VALUES ('10', 'Ernie Witting', 'Koch Ltd', '84614 Verna Field\nPort Malika, LA 70079', '2015-12-21 08:32:54', '2015-12-21 08:32:54');
INSERT INTO cruds VALUES ('11', 'Peggie Strosin III', 'Murray-Becker', '583 Kuphal Fork Apt. 714\nLake Christop, ND 46871', '2015-12-21 08:32:55', '2015-12-21 08:32:55');
INSERT INTO cruds VALUES ('12', 'Kim Toy PhD', 'Legros, Quitzon and Homenick', '1276 Bartell Creek Suite 375\nLake Pierremouth, SD 68292', '2015-12-21 08:32:55', '2015-12-21 08:32:55');
INSERT INTO cruds VALUES ('13', 'Tanner Jones', 'Schneider, Koss and Weber', '014 Muller Land\nPort Mayaton, AZ 40072-2892', '2015-12-21 08:32:55', '2015-12-21 08:32:55');
INSERT INTO cruds VALUES ('14', 'Ms. Ciara Boyer', 'Kohler LLC', '11843 Jammie Bridge Apt. 349\nLueilwitzshire, MD 88157-2592', '2015-12-21 08:32:56', '2015-12-21 08:32:56');
INSERT INTO cruds VALUES ('15', 'Osborne Okuneva', 'Boehm, O\'Keefe and Cronin', '866 Goyette Harbors\nPort Myriam, MS 30292', '2015-12-21 08:32:56', '2015-12-21 08:32:56');
INSERT INTO cruds VALUES ('16', 'Amparo Erdman IV', 'Harber, Gerlach and Schinner', '59620 Elmira Trail Apt. 775\nBarrowstown, NJ 31624-1146', '2015-12-21 08:32:57', '2015-12-21 08:32:57');
INSERT INTO cruds VALUES ('17', 'Wilfred Kessler', 'Wuckert, Hickle and Zulauf', '392 Danielle Road\nGerrychester, WV 90012', '2015-12-21 08:32:57', '2015-12-21 08:32:57');
INSERT INTO cruds VALUES ('18', 'Maia Upton', 'Leuschke-Hoeger', '734 Langworth Island\nLake Clare, WI 95808', '2015-12-21 08:32:58', '2015-12-21 08:32:58');
INSERT INTO cruds VALUES ('19', 'Creola Wisoky', 'Lowe, Glover and Hartmann', '6604 Lonie Inlet\nPort Drake, TX 99796-5724', '2015-12-21 08:32:58', '2015-12-21 08:32:58');
INSERT INTO cruds VALUES ('20', 'Estel Bins', 'Reichel Inc', '615 Schulist Tunnel\nNorth Zula, OR 60258-9459', '2015-12-21 08:32:58', '2015-12-21 08:32:58');
INSERT INTO cruds VALUES ('21', 'Elian Watsica', 'Schowalter, Reynolds and Kshlerin', '719 Gulgowski Neck\nNew Gussie, DC 66506-3787', '2015-12-21 08:32:59', '2015-12-21 08:32:59');
INSERT INTO cruds VALUES ('22', 'Muhamad Reza Abdul Rohim', 'Web Developer', 'bogorl', '2015-12-22 09:22:11', '2015-12-22 09:22:11');
INSERT INTO cruds VALUES ('26', 'reza', 'wase', 'asew', '2015-12-22 09:48:03', '2015-12-22 09:48:03');
INSERT INTO cruds VALUES ('27', 'tes', 'tes@tes.com', 'wase', '2015-12-26 01:05:24', '2015-12-26 01:05:24');

-- ----------------------------
-- Table structure for `menus`
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `controller` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menus_parent_id_controller_permalink_order_index` (`parent_id`,`controller`,`permalink`,`order`),
  KEY `menus_model_index` (`model`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menus
-- ----------------------------
INSERT INTO menus VALUES ('1', '0', '#', 'Developer', '#', '', '', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('2', '1', 'Backend\\CrudController', 'Crud Example', 'crud-example', 'Crud', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('3', '0', 'Backend\\DefaultController', 'Home', 'default', '', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('4', '1', 'Backend\\ActionController', 'Action', 'actions', 'Action', '', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('5', '0', '#', 'User', '#', '', '', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('6', '5', 'Backend\\RoleController', 'Role', 'roles', 'Role', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('7', '5', 'Backend\\UserController', 'User', 'users', 'User', '', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('8', '1', 'Backend\\MenuController', 'Menu', 'menus', 'Menu', '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO menus VALUES ('9', '0', '#', 'Media Library', '##', '#', '', '2', '2015-12-26 21:45:03', '2015-12-26 21:45:03');
INSERT INTO menus VALUES ('10', '9', 'Backend\\MediaController', 'Media Library', 'media-library', '', '', '1', '2015-12-26 21:45:36', '2015-12-26 21:45:36');

-- ----------------------------
-- Table structure for `menu_actions`
-- ----------------------------
DROP TABLE IF EXISTS `menu_actions`;
CREATE TABLE `menu_actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `action_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `menu_actions_menu_id_foreign` (`menu_id`),
  KEY `menu_actions_action_id_foreign` (`action_id`),
  CONSTRAINT `menu_actions_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `menu_actions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of menu_actions
-- ----------------------------
INSERT INTO menu_actions VALUES ('31', '8', '2', '2015-12-25 11:00:34', '2015-12-25 11:00:34');
INSERT INTO menu_actions VALUES ('32', '8', '3', '2015-12-25 11:00:34', '2015-12-25 11:00:34');
INSERT INTO menu_actions VALUES ('33', '8', '4', '2015-12-25 11:00:34', '2015-12-25 11:00:34');
INSERT INTO menu_actions VALUES ('34', '8', '5', '2015-12-25 11:00:34', '2015-12-25 11:00:34');
INSERT INTO menu_actions VALUES ('35', '8', '7', '2015-12-25 11:00:34', '2015-12-25 11:00:34');
INSERT INTO menu_actions VALUES ('46', '2', '2', '2015-12-25 11:01:52', '2015-12-25 11:01:52');
INSERT INTO menu_actions VALUES ('47', '2', '3', '2015-12-25 11:01:52', '2015-12-25 11:01:52');
INSERT INTO menu_actions VALUES ('48', '2', '4', '2015-12-25 11:01:52', '2015-12-25 11:01:52');
INSERT INTO menu_actions VALUES ('49', '2', '7', '2015-12-25 11:01:52', '2015-12-25 11:01:52');
INSERT INTO menu_actions VALUES ('50', '4', '2', '2015-12-25 11:02:22', '2015-12-25 11:02:22');
INSERT INTO menu_actions VALUES ('51', '4', '3', '2015-12-25 11:02:22', '2015-12-25 11:02:22');
INSERT INTO menu_actions VALUES ('52', '4', '4', '2015-12-25 11:02:22', '2015-12-25 11:02:22');
INSERT INTO menu_actions VALUES ('53', '4', '7', '2015-12-25 11:02:22', '2015-12-25 11:02:22');
INSERT INTO menu_actions VALUES ('60', '6', '2', '2015-12-25 11:06:21', '2015-12-25 11:06:21');
INSERT INTO menu_actions VALUES ('61', '6', '3', '2015-12-25 11:06:21', '2015-12-25 11:06:21');
INSERT INTO menu_actions VALUES ('62', '6', '4', '2015-12-25 11:06:21', '2015-12-25 11:06:21');
INSERT INTO menu_actions VALUES ('63', '6', '5', '2015-12-25 11:06:21', '2015-12-25 11:06:21');
INSERT INTO menu_actions VALUES ('64', '6', '7', '2015-12-25 11:06:21', '2015-12-25 11:06:21');
INSERT INTO menu_actions VALUES ('65', '7', '2', '2015-12-25 11:06:58', '2015-12-25 11:06:58');
INSERT INTO menu_actions VALUES ('66', '7', '3', '2015-12-25 11:06:58', '2015-12-25 11:06:58');
INSERT INTO menu_actions VALUES ('67', '7', '4', '2015-12-25 11:06:58', '2015-12-25 11:06:58');
INSERT INTO menu_actions VALUES ('68', '7', '7', '2015-12-25 11:06:58', '2015-12-25 11:06:58');
INSERT INTO menu_actions VALUES ('69', '10', '7', '2015-12-26 21:47:37', '2015-12-26 21:47:37');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO migrations VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO migrations VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO migrations VALUES ('2015_12_21_070415_create_menus_table', '1');
INSERT INTO migrations VALUES ('2015_12_21_081823_create_cruds_table', '2');
INSERT INTO migrations VALUES ('2015_12_22_082950_add_field_menus_table', '3');
INSERT INTO migrations VALUES ('2015_12_22_100123_create_actions_table', '4');
INSERT INTO migrations VALUES ('2015_12_25_001954_create_roles_table', '5');
INSERT INTO migrations VALUES ('2015_12_25_003323_add_field_users_table', '6');
INSERT INTO migrations VALUES ('2015_12_25_061206_create_menu_actions_table', '7');
INSERT INTO migrations VALUES ('2015_12_25_063726_create_rights_table', '8');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `rights`
-- ----------------------------
DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `menu_action_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `rights_role_id_foreign` (`role_id`),
  KEY `rights_menu_action_id_foreign` (`menu_action_id`),
  CONSTRAINT `rights_menu_action_id_foreign` FOREIGN KEY (`menu_action_id`) REFERENCES `menu_actions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rights_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rights
-- ----------------------------
INSERT INTO rights VALUES ('229', '5', '60', '2015-12-26 09:11:00', '2015-12-26 09:11:00');
INSERT INTO rights VALUES ('230', '5', '61', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('231', '5', '62', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('232', '5', '63', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('233', '5', '64', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('234', '5', '65', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('235', '5', '66', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('236', '5', '67', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('237', '5', '68', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('238', '5', '31', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('239', '5', '32', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('240', '5', '33', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('241', '5', '34', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('242', '5', '35', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('243', '5', '46', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('244', '5', '47', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('245', '5', '48', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('246', '5', '49', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('247', '5', '50', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('248', '5', '51', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('249', '5', '52', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('250', '5', '53', '2015-12-26 09:11:01', '2015-12-26 09:11:01');
INSERT INTO rights VALUES ('251', '1', '69', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('252', '1', '60', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('253', '1', '61', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('254', '1', '62', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('255', '1', '63', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('256', '1', '64', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('257', '1', '65', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('258', '1', '66', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('259', '1', '67', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('260', '1', '68', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('261', '1', '31', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('262', '1', '32', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('263', '1', '33', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('264', '1', '34', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('265', '1', '35', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('266', '1', '46', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('267', '1', '47', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('268', '1', '48', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('269', '1', '49', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('270', '1', '50', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('271', '1', '51', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('272', '1', '52', '2015-12-26 21:48:15', '2015-12-26 21:48:15');
INSERT INTO rights VALUES ('273', '1', '53', '2015-12-26 21:48:15', '2015-12-26 21:48:15');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO roles VALUES ('1', 'Super Admin', '2015-12-25 00:31:31', '2015-12-25 00:31:31');
INSERT INTO roles VALUES ('5', 'Administrator', '2015-12-25 00:31:53', '2015-12-25 00:31:53');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_username_index` (`username`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'Muhamad Reza Abdul Rohim', 'reza.wikrama3@gmail.com', '$2y$10$A7cy5fCCKZqMKWUf2cB12u5j0rRNqZ0EDoTj6xRny.tIBMNlKaPpe', '3uWwkYh9bwZ2cFdghcuanWqdFnDp3Fh7Jhe4xCx6TZQVJy9MXEcziSOxlv10', '2015-12-25 00:52:22', '2015-12-26 01:56:25', 'reza', '1');
INSERT INTO users VALUES ('5', 'admin ganteng', 'reza.wikrama2@gmail.com', '$2y$10$dDFeAJWlS6Vbnpc3hcj41OFXvrgtux0lElH/7rnjsN61ZsULMsZ6C', 'nrNyScamjebTrHdmiWxp9wQkzGzWbJhUvlr7ulcrU0g1D0peaW7QnpdrLU0M', '2015-12-25 10:09:12', '2015-12-25 11:53:56', 'admin', '5');
