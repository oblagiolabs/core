/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : oblagio

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-01-21 02:36:46
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
INSERT INTO actions VALUES ('2', 'create', 'Create', '2015-12-24 00:11:45', '2015-12-24 00:19:02');
INSERT INTO actions VALUES ('3', 'update', 'Update', '2015-12-24 00:17:24', '2015-12-24 00:17:24');
INSERT INTO actions VALUES ('4', 'delete', 'Delete', '2015-12-24 00:21:12', '2015-12-24 00:21:12');
INSERT INTO actions VALUES ('5', 'view', 'View', '2015-12-24 00:21:24', '2015-12-24 00:21:24');
INSERT INTO actions VALUES ('6', 'publish', 'Publish and Un Publish', '2015-12-24 00:21:40', '2015-12-24 00:21:40');
INSERT INTO actions VALUES ('7', 'index', 'Index', '2015-12-24 00:23:33', '2015-12-24 00:23:33');

-- ----------------------------
-- Table structure for `cruds`
-- ----------------------------
DROP TABLE IF EXISTS `cruds`;
CREATE TABLE `cruds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cruds
-- ----------------------------

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
INSERT INTO menus VALUES ('9', '0', '#', 'Media Library', '##', '#', '', '2', '2015-12-27 12:45:03', '2015-12-27 12:45:03');
INSERT INTO menus VALUES ('10', '9', 'Backend\\MediaController', 'Media Library', 'media-library', '', '', '1', '2015-12-27 12:45:36', '2015-12-27 12:45:36');

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
INSERT INTO menu_actions VALUES ('31', '8', '2', '2015-12-26 02:00:34', '2015-12-26 02:00:34');
INSERT INTO menu_actions VALUES ('32', '8', '3', '2015-12-26 02:00:34', '2015-12-26 02:00:34');
INSERT INTO menu_actions VALUES ('33', '8', '4', '2015-12-26 02:00:34', '2015-12-26 02:00:34');
INSERT INTO menu_actions VALUES ('34', '8', '5', '2015-12-26 02:00:34', '2015-12-26 02:00:34');
INSERT INTO menu_actions VALUES ('35', '8', '7', '2015-12-26 02:00:34', '2015-12-26 02:00:34');
INSERT INTO menu_actions VALUES ('46', '2', '2', '2015-12-26 02:01:52', '2015-12-26 02:01:52');
INSERT INTO menu_actions VALUES ('47', '2', '3', '2015-12-26 02:01:52', '2015-12-26 02:01:52');
INSERT INTO menu_actions VALUES ('48', '2', '4', '2015-12-26 02:01:52', '2015-12-26 02:01:52');
INSERT INTO menu_actions VALUES ('49', '2', '7', '2015-12-26 02:01:52', '2015-12-26 02:01:52');
INSERT INTO menu_actions VALUES ('50', '4', '2', '2015-12-26 02:02:22', '2015-12-26 02:02:22');
INSERT INTO menu_actions VALUES ('51', '4', '3', '2015-12-26 02:02:22', '2015-12-26 02:02:22');
INSERT INTO menu_actions VALUES ('52', '4', '4', '2015-12-26 02:02:22', '2015-12-26 02:02:22');
INSERT INTO menu_actions VALUES ('53', '4', '7', '2015-12-26 02:02:22', '2015-12-26 02:02:22');
INSERT INTO menu_actions VALUES ('60', '6', '2', '2015-12-26 02:06:21', '2015-12-26 02:06:21');
INSERT INTO menu_actions VALUES ('61', '6', '3', '2015-12-26 02:06:21', '2015-12-26 02:06:21');
INSERT INTO menu_actions VALUES ('62', '6', '4', '2015-12-26 02:06:21', '2015-12-26 02:06:21');
INSERT INTO menu_actions VALUES ('63', '6', '5', '2015-12-26 02:06:21', '2015-12-26 02:06:21');
INSERT INTO menu_actions VALUES ('64', '6', '7', '2015-12-26 02:06:21', '2015-12-26 02:06:21');
INSERT INTO menu_actions VALUES ('65', '7', '2', '2015-12-26 02:06:58', '2015-12-26 02:06:58');
INSERT INTO menu_actions VALUES ('66', '7', '3', '2015-12-26 02:06:58', '2015-12-26 02:06:58');
INSERT INTO menu_actions VALUES ('67', '7', '4', '2015-12-26 02:06:58', '2015-12-26 02:06:58');
INSERT INTO menu_actions VALUES ('68', '7', '7', '2015-12-26 02:06:58', '2015-12-26 02:06:58');
INSERT INTO menu_actions VALUES ('69', '10', '7', '2015-12-27 12:47:37', '2015-12-27 12:47:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rights
-- ----------------------------
INSERT INTO rights VALUES ('251', '1', '69', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('252', '1', '60', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('253', '1', '61', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('254', '1', '62', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('255', '1', '63', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('256', '1', '64', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('257', '1', '65', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('258', '1', '66', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('259', '1', '67', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('260', '1', '68', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('261', '1', '31', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('262', '1', '32', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('263', '1', '33', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('264', '1', '34', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('265', '1', '35', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('266', '1', '46', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('267', '1', '47', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('268', '1', '48', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('269', '1', '49', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('270', '1', '50', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('271', '1', '51', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('272', '1', '52', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('273', '1', '53', '2015-12-27 12:48:15', '2015-12-27 12:48:15');
INSERT INTO rights VALUES ('294', '5', '60', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('295', '5', '61', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('296', '5', '62', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('297', '5', '63', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('298', '5', '64', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('299', '5', '65', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('300', '5', '66', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('301', '5', '67', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('302', '5', '68', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('303', '5', '31', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('304', '5', '32', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('305', '5', '33', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('306', '5', '34', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('307', '5', '35', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('308', '5', '46', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('309', '5', '47', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('310', '5', '49', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('311', '5', '50', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('312', '5', '51', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('313', '5', '52', '2015-12-28 01:57:06', '2015-12-28 01:57:06');
INSERT INTO rights VALUES ('314', '5', '53', '2015-12-28 01:57:06', '2015-12-28 01:57:06');

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
INSERT INTO roles VALUES ('1', 'Super Admin', '2015-12-25 15:31:31', '2015-12-25 15:31:31');
INSERT INTO roles VALUES ('5', 'Administrator', '2015-12-25 15:31:53', '2015-12-25 15:31:53');

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
INSERT INTO users VALUES ('1', 'Muhamad Reza Abdul Rohim', 'reza.wikrama3@gmail.com', '$2y$10$A7cy5fCCKZqMKWUf2cB12u5j0rRNqZ0EDoTj6xRny.tIBMNlKaPpe', 'DcaKMCuz0y5FHABRApRaHVGVauZaVQJUfY15RgTz0LrbLPSvxCI1GaxhgaHP', '2015-12-25 15:52:22', '2015-12-28 01:56:30', 'reza', '1');
INSERT INTO users VALUES ('5', 'admin ganteng', 'reza.wikrama2@gmail.com', '$2y$10$dDFeAJWlS6Vbnpc3hcj41OFXvrgtux0lElH/7rnjsN61ZsULMsZ6C', 'nrNyScamjebTrHdmiWxp9wQkzGzWbJhUvlr7ulcrU0g1D0peaW7QnpdrLU0M', '2015-12-26 01:09:12', '2015-12-26 02:53:56', 'admin', '5');

