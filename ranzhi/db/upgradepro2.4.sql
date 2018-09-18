ALTER TABLE `ameba_budget` ADD `line` varchar(60) NOT NULL AFTER `amebaAccount`;
ALTER TABLE `cash_depositor` ADD `company` mediumint(8) unsigned NOT NULL AFTER `id`;
ALTER TABLE `cash_invoice` ADD `company` mediumint(8) unsigned NOT NULL AFTER `sn`;
ALTER TABLE `cash_invoice` ADD `deleted` enum('0','1') NOT NULL DEFAULT '0';
ALTER TABLE `cash_trade`   ADD `sharedDate` datetime NOT NULL AFTER `shareStatus`;
ALTER TABLE `crm_contract` ADD `company` mediumint(8) unsigned NOT NULL AFTER `id`;
ALTER TABLE `sys_user` ADD `parent` mediumint(8) unsigned NOT NULL AFTER `id`;
ALTER TABLE `sys_user` ADD `unofficial` enum('0', '1') NOT NULL DEFAULT '0' AFTER `parent`;

UPDATE `sys_grouppriv` SET `method` = 'deleteAmebaCategory' WHERE `method` = 'deleteAmebaAccount';

UPDATE `sys_workflowdatasource` SET `type` = 'system', `datasource` = '{\"app\":\"sys\",\"module\":\"product\",\"method\":\"getLines\",\"methodDesc\":\"Get product line list.\",\"params\":[]}' WHERE `type` = 'lang' AND `datasource` = 'productLine';
UPDATE `ameba_budget`, `sys_category` SET `ameba_budget`.line = `sys_category`.id WHERE `ameba_budget`.line = `sys_category`.alias AND `sys_category`.type = 'product' AND `sys_category`.alias != '';
UPDATE `hr_salarycommission`, `sys_category` SET `hr_salarycommission`.line = `sys_category`.id WHERE `hr_salarycommission`.line = `sys_category`.alias AND `sys_category`.type = 'product' AND `sys_category`.alias != '';
UPDATE `sys_product` SET `category` = `line` WHERE `category` = 0 AND `line` != '';

ALTER TABLE `sys_product` DROP `line`;

-- DROP TABLE IF EXISTS `sys_company`;
CREATE TABLE IF NOT EXISTS `sys_company` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `major` enum('0', '1') NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `taxNumber` char(20) NOT NULL,
  `registedAddress` varchar(255) NOT NULL,
  `phone` char(20) NOT NULL,
  `bankName` char(30) NOT NULL,
  `bankAccount` char(90) NOT NULL,
  `status` char(90) NOT NULL,
  `createdBy` char(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` char(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_dept`;
CREATE TABLE IF NOT EXISTS `ameba_dept` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `dept` mediumint(8) unsigned NOT NULL,
  `month` char(6) NOT NULL,
  `name` char(30) NOT NULL,
  `root` mediumint(8) unsigned NOT NULL,
  `parent` mediumint(8) unsigned NOT NULL,
  `path` char(255) NOT NULL,
  `grade` tinyint(3) unsigned NOT NULL,
  `order` smallint(5) unsigned NOT NULL,
  `moderators` varchar(255) NOT NULL,
  `isAmebaDept` enum('0', '1') NOT NULL DEFAULT '0',
  `amebaDept` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `amebaDept` (`dept`, `month`),
  KEY `dept` (`dept`),
  KEY `month` (`month`),
  KEY `parent` (`parent`),
  KEY `path` (`path`),
  KEY `grade` (`grade`),
  KEY `order` (`order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `ameba_setting`;
CREATE TABLE IF NOT EXISTS `ameba_setting` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `month` char(6) NOT NULL,
  `taxRate` decimal(5, 2) NOT NULL,
  `shareDepts` varchar(255) NOT NULL,
  `excludeCategories` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `month` (`month`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
