-- DROP TABLE IF EXISTS `sys_searchdict`;
CREATE TABLE IF NOT EXISTS `sys_searchdict` (
  `key` smallint(5) unsigned NOT NULL,
  `value` char(3) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_searchindex`;
CREATE TABLE IF NOT EXISTS `sys_searchindex` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `objectType` char(20) NOT NULL,
  `objectID` mediumint(9) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `addedDate` datetime NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object` (`objectType`,`objectID`),
  KEY `addedDate` (`addedDate`),
  FULLTEXT KEY `content` (`title`,`content`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `sys_workflowversion`;
CREATE TABLE IF NOT EXISTS `sys_workflowversion` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(30) NOT NULL,
  `version` varchar(10) NOT NULL,
  `fields` text NOT NULL,
  `actions` text NOT NULL,
  `layouts` text NOT NULL,
  `sqls` text NOT NULL,
  `menus` text NOT NULL,
  `table` text NOT NULL,
  `datas` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `moduleversion` (`module`, `version`),
  KEY `module` (`module`),
  KEY `version` (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

ALTER TABLE `sys_workflow` CHANGE `parent` `parent` varchar(30) NOT NULL DEFAULT '';
ALTER TABLE `sys_workflow` ADD `child` varchar(30) NOT NULL DEFAULT '' AFTER `parent`;
ALTER TABLE `sys_workflow` ADD `version` varchar(10) NOT NULL DEFAULT '1.0' AFTER `desc`;

ALTER TABLE `sys_workflowfield` CHANGE `module` `module` varchar(30) NOT NULL DEFAULT '';
ALTER TABLE `sys_workflowfield` CHANGE `options` `options` text NOT NULL DEFAULT '';
ALTER TABLE `sys_workflowfield` ADD `type` varchar(20) NOT NULL DEFAULT 'varchar' AFTER `field`;
ALTER TABLE `sys_workflowfield` ADD `length` varchar(10) NOT NULL DEFAULT '' AFTER `type`;

ALTER TABLE `sys_workflowaction` CHANGE `module` `module` varchar(30) NOT NULL DEFAULT '';

ALTER TABLE `sys_workflowlayout` CHANGE `module` `module` varchar(30) NOT NULL DEFAULT '';
ALTER TABLE `sys_workflowlayout` CHANGE `action` `action` varchar(50) NOT NULL DEFAULT '';
ALTER TABLE `sys_workflowlayout` ADD `mobileShow` enum('1', '0') NOT NULL DEFAULT '0' AFTER `position`;

ALTER TABLE `sys_workflowsql` CHANGE `module` `module` varchar(30) NOT NULL DEFAULT '';
ALTER TABLE `sys_workflowsql` CHANGE `action` `action` varchar(50) NOT NULL DEFAULT '';
ALTER TABLE `sys_workflowsql` CHANGE `field`  `field`  varchar(50) NOT NULL DEFAULT '';

ALTER TABLE `sys_workflowmenu` CHANGE `module` `module` varchar(30) NOT NULL DEFAULT '';

UPDATE `sys_workflow` SET `parent` = '' WHERE `parent` = 0;
UPDATE `sys_workflowfield` SET `type` = 'mediumint', `length` = 8 WHERE `field` IN ('id', 'parent');
UPDATE `sys_workflowfield` SET `type` = 'date'     WHERE `control` = 'date';
UPDATE `sys_workflowfield` SET `type` = 'datetime' WHERE `control` = 'datetime';
UPDATE `sys_workflowfield` SET `length` = 200 WHERE `type` = 'varchar';
UPDATE `sys_workflowfield` SET `length` = 30  WHERE `type` = 'varchar' AND `field` IN ('createdBy', 'editedBy');

UPDATE `sys_config` SET `section` = '' WHERE `module` = 'wechat' AND `section` = 'page';
DELETE FROM `sys_config` WHERE `module` = 'wechat' AND `section` = 'message';
