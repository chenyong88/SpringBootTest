-- DROP TABLE IF EXISTS `sys_usercontact`;
CREATE TABLE IF NOT EXISTS `sys_usercontact` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `member` text NOT NULL,
  `public` enum('0', '1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `account` (`account`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `sys_entry` ADD `version` VARCHAR(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `buildin`;
ALTER TABLE `sys_entry` ADD `platform` VARCHAR(255) NOT NULL DEFAULT 'ranzhi' AFTER `version`;
ALTER TABLE `sys_entry` ADD `package` INT(11)  NOT NULL DEFAULT 0  AFTER `platform`;
ALTER TABLE `sys_entry` ADD `status` ENUM('online','offline') NOT NULL DEFAULT 'online' AFTER `category`;
